<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function videogate_is_template($template) {
	$templates = array(
			$template
	);

	foreach ($templates AS $template_to_check) {
		if (is_file($template_to_check)) {
			return $template_to_check;
		} elseif (is_file(get_stylesheet_directory() . '/videogate/public/' . $template_to_check)) {
			return get_stylesheet_directory() . '/videogate/public/' . $template_to_check;
		} elseif (is_file(VIDEOGATE_TEMPLATES_PATH . $template_to_check)) {
			return VIDEOGATE_TEMPLATES_PATH . $template_to_check;
		}
	}

	return false;
}

if (!function_exists('videogate_display_template')) {
	function videogate_display_template($template, $args = array(), $return = false) {
	
		if ($args) {
			extract($args);
		}
		
		$template = apply_filters('videogate_display_template', $template, $args);
		
		if (is_array($template)) {
			$template_path = $template[0];
			$template_file = $template[1];
			$template = $template_path . $template_file;
		}
		
		$template = videogate_is_template($template);

		if ($template) {
			if ($return) {
				ob_start();
			}
		
			include($template);
			
			if ($return) {
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}
		}
	}
}


add_filter( 'template_include', 'videogate_core_load_template', 99 );
function videogate_core_load_template( $template ) {
    global $post;
	if($post){
		if ( is_singular('videogate_video')) {
			$new_template = videogate_display_template('templates/single.php');
			return $new_template;
		}elseif(is_post_type_archive('videogate_video')){
			$new_template = videogate_display_template('templates/archive.php');
			return $new_template;
		}
	}

    return $template;

}

/* === Video Maturity Ratting === */

function videogate_maturity_ratting($video_id){
	$terms = wp_get_post_terms($video_id, VIDEOGATE_AGE_TAX);
	$output = array();
    foreach ( $terms as $term ) {
        $output[] = '<a class="videogate-video-maturity-ratting" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
	return implode('', $output);
}

/* === Video Quality === */

function videogate_video_quality($video_id){
	$terms = wp_get_post_terms($video_id, VIDEOGATE_QUALITY_TAX);
	$output = array();
    foreach ( $terms as $term ) {
        $output[] = '<a class="videogate-video-quality" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
	return implode('', $output);
}

/* === Video Type === */

function videogate_video_type($video_id){
	$terms = wp_get_post_terms($video_id, VIDEOGATE_TYPES_TAX);
	$output = array();
    foreach ( $terms as $term ) {
        $output[] = '<a class="videogate-video-type" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
	return implode('', $output);
}

/* === Video Genres === */

function videogate_video_genres($video_id){
	$terms = wp_get_post_terms($video_id, VIDEOGATE_GENRES_TAX);
	$output = array();
    foreach ( $terms as $term ) {
        $output[] = '<a class="videogate-video-genres" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
	return implode('', $output);
}


/* === Video Cast === */

function videogate_video_cast($video_id){
	$terms = wp_get_post_terms($video_id, VIDEOGATE_CAST_TAX);
	$output = array();
    foreach ( $terms as $term ) {
        $output[] = '<a class="videogate-video-cast" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
	return implode('', $output);
}


add_action('wp_footer', 'videogate_video_modal_larg');

function videogate_video_modal_larg(){
	echo '<div class="hystmodal" id="videogate-modal" aria-hidden="true">';
		echo '<div class="hystmodal__wrap">';
			echo '<div class="hystmodal__window" role="dialog" aria-modal="true">';
				echo '<button data-hystclose class="hystmodal__close">Close</button>';  
				echo '<div id="videogate-modal-large"></div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
}