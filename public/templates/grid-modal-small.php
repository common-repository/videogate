<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
$source = (get_post_meta($id, '_videogate_video_source', true) && !empty(get_post_meta($id, '_videogate_video_source', true)))? get_post_meta($id, '_videogate_video_source', true): 'youtube';
$video_id = (get_post_meta($id, '_videogate_video_id', true) && !empty(get_post_meta($id, '_videogate_video_id', true)))? get_post_meta($id, '_videogate_video_id', true): '';
echo '<div id="videogate-grid-modal" class="videogate-grid-modal">';
	echo '<div class="videogate-grid-modal-holder">';
		echo '<div class="player" data-id="'. esc_attr($id) .'" data-plyr-provider="'. esc_attr($source) .'" data-plyr-embed-id="'. esc_attr($video_id) .'"></div>';
		echo '<div class="grid-video-info">';
						echo '<div class="grid-video-maturity-wrapper">';
							echo wp_kses_post(videogate_maturity_ratting(esc_attr($id)));
						echo '</div>';
						echo '<div class="grid-video-quality-wrapper">';
							echo wp_kses_post(videogate_video_quality(esc_attr($id)));
						echo '</div>';
						echo '<div class="grid-video-type-wrapper">';
							echo wp_kses_post(videogate_video_type(esc_attr($id)));
						echo '</div>';
					echo '</div>';
					echo '<div class="grid-video-genres-wrapper">';	
						echo wp_kses_post(videogate_video_genres(esc_attr($id)));
					echo '</div>';
	echo '</div>';
echo '</div>';