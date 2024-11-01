<?php

/**
 * @package    Wp_Causes
 * @subpackage Wp_Causes/admin
 * @author     Designinvento <team@designinvento.net>
 */
class VideoGate_Metaboxes{
	
	public function __construct( ) {
		add_action('add_meta_boxes', array($this, 'add_video_metabox'));
		add_action( 'save_post',      array( $this, 'save_videogate_video_metaboxes' ) );

	}
	
	public function add_video_metabox($post_type) {
		if ($post_type == 'videogate_video') {
			add_meta_box('videogate_video_metaboxs',
					__('Video data', 'videogate'),
					array($this, 'videogate_video_metaboxes'),
					'videogate_video',
					'side',
					'low');
		}
	}
	
	public function videogate_video_metaboxes($post) {
		global $post;
		$selected = 'selected';
		$videogate_video_id = (get_post_meta($post->ID, '_videogate_video_id', true) && !empty(get_post_meta($post->ID, '_videogate_video_id', true)))? get_post_meta($post->ID, '_videogate_video_id', true): '';
		$videogate_video_source = (get_post_meta($post->ID, '_videogate_video_source', true) && !empty(get_post_meta($post->ID, '_videogate_video_source', true)))? get_post_meta($post->ID, '_videogate_video_source', true): 'youtube';
		
		echo '<div class="inside">';
			echo '<div class="videogate-metabox">';
				echo '<label>'.esc_html__('Select A Video Source', 'videogate').'</label>';
				echo '<select name="_videogate_video_source">';
					echo '<option value="youtube" '. (($videogate_video_source == 'youtube')? 'selected' : '') .'>'. esc_html__('Youtube', 'videogate') .'</option>';
					echo '<option value="vimeo" '. (($videogate_video_source == 'vimeo')? 'selected' : '') .'>'. esc_html__('Vimeo', 'videogate') .'</option>';
				echo '</select>';
			echo '</div>';
			echo '<div class="videogate-metabox">';
				echo '<label>'.esc_html__('Youtube Video Embed ID', 'videogate').'</label>';
				echo '<input name="_videogate_video_id" placeholder="'. esc_attr__('Insert ID', 'videogate') .'" value="'. esc_attr($videogate_video_id) .'"/>';
			echo '</div>';
		echo '</div>';
		
	}
	
	public function save_videogate_video_metaboxes() {
		if(current_user_can( 'manage_options' ) && isset($_POST['post_ID']) && !empty($_POST['post_ID'])  && (isset($_POST['_wpnonce']) && wp_verify_nonce(sanitize_text_field( wp_unslash ( $_POST['_wpnonce'] ) ), 'update-post_'. sanitize_text_field($_POST['post_ID'])))){
			$post_id = sanitize_text_field($_POST['post_ID']);
			
			
			if(isset($_POST['_videogate_video_id'])){
				$videogate_video_id = sanitize_text_field($_POST['_videogate_video_id']);
				update_post_meta($post_id, '_videogate_video_id', $videogate_video_id);
			}
			if(isset($_POST['_videogate_video_source'])){
				$videogate_video_source = sanitize_text_field($_POST['_videogate_video_source']);
				update_post_meta($post_id, '_videogate_video_source', $videogate_video_source);
			}
		}
	}
	

}
