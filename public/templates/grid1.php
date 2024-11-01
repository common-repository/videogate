<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
echo '<div class="videogate-col-'. esc_attr($column) .'">';
	echo '<div class="videogate-item-holder" data-id="'.get_the_ID().'">';
		echo '<a class="videogate-video-thumb" href="#" data-id="'. get_the_ID().'">';
			the_post_thumbnail('sitka-grid-post-thumb');
		echo '</a>';
			echo '<div class="videogate-grid-modal">';
				echo '<div class="videogate-grid-modal-holder">';
					//echo '<div class="player" data-id="'. esc_attr(get_the_ID()) .'" data-plyr-provider="'. esc_attr($source) .'" data-plyr-embed-id="'. esc_attr($video_id) .'" autoplay></div>';
					echo '<div class="grid-button-panel videogate-clearfix">';
						echo '<div class="grid-buttons-left">';
							echo '<a class="videogate-play-button" href="'.esc_url(get_permalink(get_the_ID())).'">';
								echo '<svg width="16px" height="38px" viewBox="0 0 22.00 28.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>play</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-419.000000, -571.000000)" fill="#000000"> <path d="M440.415,583.554 L421.418,571.311 C420.291,570.704 419,570.767 419,572.946 L419,597.054 C419,599.046 420.385,599.36 421.418,598.689 L440.415,586.446 C441.197,585.647 441.197,584.353 440.415,583.554" id="play" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>';
							echo '</a>';
							echo '<a class="videogate-fav-button" href="">';
								echo '<svg width="36px" height="36px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="0" y="0" width="24.00" height="24.00" rx="12" fill="" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill=""></rect> <path d="M12 6V18" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 12H18" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>';
							echo '</a>';
						echo '</div>';
						echo '<div class="grid-buttons-right">';
							echo '<a class="videogate-detail-button" href="#" data-id="'.get_the_ID().'" data-hystmodal="#videogate-modal">';
								echo '<svg width="28px" height="42px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 10L12 15L17 10" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>';
							echo '</a>';
						echo '</div>';
					echo '</div>';
					echo '<div class="grid-video-info">';
						echo '<div class="grid-video-maturity-wrapper">';
							echo wp_kses_post(videogate_maturity_ratting(get_the_ID()));
						echo '</div>';
						echo '<div class="grid-video-quality-wrapper">';
							echo wp_kses_post(videogate_video_quality(get_the_ID()));
						echo '</div>';
						echo '<div class="grid-video-type-wrapper">';
							echo wp_kses_post(videogate_video_type(get_the_ID()));
						echo '</div>';
					echo '</div>';
					echo '<div class="grid-video-genres-wrapper">';	
						echo wp_kses_post(videogate_video_genres(get_the_ID()));
					echo '</div>';
				echo '</div>';
			echo '</div>';
		
	echo '</div>';
echo '</div>';