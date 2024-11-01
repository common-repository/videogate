<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
get_header();
global $post;
$i = 0;
	
echo '<div class="videogate-container">';
	echo '<div id="videogate-row">';
		if (have_posts()):
			while (have_posts()):
				the_post();
				$i++;
				$videogate_video_source = (get_post_meta(get_the_ID(), '_videogate_video_source', true) && !empty(get_post_meta(get_the_ID(), '_videogate_video_source', true)))? get_post_meta(get_the_ID(), '_videogate_video_source', true): 'youtube';
				$videogate_video_id = (get_post_meta(get_the_ID(), '_videogate_video_id', true) && !empty(get_post_meta(get_the_ID(), '_videogate_video_id', true)))? get_post_meta(get_the_ID(), '_videogate_video_id', true): '';
				echo '<div class="videogate-col-3">';
					echo '<div class="player" data-id="'. get_the_ID() .'" data-plyr-provider="'. esc_attr($videogate_video_source) .'" data-plyr-embed-id="'. esc_attr($videogate_video_id) .'"></div>';
					echo '<a href="'. esc_url(get_permalink()) .'">'. esc_html(get_the_title()) .'</a>';
				echo '</div>';
			endwhile;
		endif;
		wp_reset_postdata();
	echo '</div>';
echo '</div>';
echo "<script>
	jQuery(document).ready(function(){
		jQuery('.player').each( function() {
			var el = jQuery(this);
			const player = new Plyr(el);
		}); 
	});
</script>";
get_footer();