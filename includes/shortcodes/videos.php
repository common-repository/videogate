<?php

/**
 * @since      1.0.0
 * @package    VideoGate
 * @subpackage VideoGate/includes/shortcodes
 * @author     servigate <servigate.inc@gmail.com>
 */
class VideoGate_Videos extends VIDEOGATE_Post {
	public $query;
	public function init($args = array()) {
	
		
			/* if (get_query_var('page'))
			$paged = get_query_var('page');
			elseif (get_query_var('paged'))
				$paged = get_query_var('paged');
			else
				$paged = 1; */
		
		$shortcode_atts = array_merge(array(
				'perpage' => 10,
				'onepage' => 0,
				'order_by' => 'post_date',
				'order' => 'ASC',
				'author' => '',
				'paged' => 1,
				'post__not_in' => '',
				'column' => 1,
				'uid' => null,
		), $args);
		$shortcode_atts = apply_filters('videogate_related_shortcode_args', $shortcode_atts, $args);
		
		$this->args = $shortcode_atts;
		$args = array(
				'post_type' => 'videogate_video',
				'post_status' => 'publish',
				'posts_per_page' => $shortcode_atts['perpage'],
				'paged' => 1,
		);
		//$args['paged'] = $paged;
		if ($shortcode_atts['author'])
			$args['author'] = $shortcode_atts['author'];
		
		// render just one page - all found listings on one page
		if ($shortcode_atts['onepage'])
			$args['posts_per_page'] = -1;

		if (!empty($this->args['post__in'])) {
			if (is_string($this->args['post__in'])) {
				$args = array_merge($args, array('post__in' => explode(',', $this->args['post__in'])));
			} elseif (is_array($this->args['post__in'])) {
				$args['post__in'] = $this->args['post__in'];
			}
		}
		if (!empty($this->args['post__not_in'])) {
			$args = array_merge($args, array('post__not_in' => explode(',', $this->args['post__not_in'])));
		}
		$this->query = new WP_Query($args);
		ob_start();
		 $this->output();
		return ob_get_clean();
	}
	
	public function output(){
		
		$i = 0;
		
		echo '<div id="videogate-container">';
			echo '<div id="videogate-row">';
				if ($this->query->have_posts()):
					while ($this->query->have_posts()):
						$this->query->the_post();
						$i++;
						$excerpt = '';
						$source = (get_post_meta(get_the_ID(), '_videogate_video_source', true) && !empty(get_post_meta(get_the_ID(), '_videogate_video_source', true)))? get_post_meta(get_the_ID(), '_videogate_video_source', true): 'youtube';
						$video_id = (get_post_meta(get_the_ID(), '_videogate_video_id', true) && !empty(get_post_meta(get_the_ID(), '_videogate_video_id', true)))? get_post_meta(get_the_ID(), '_videogate_video_id', true): '';
						
						videogate_display_template('templates/grid1.php', array('source' => $source,  'video_id' => $video_id, 'column' => $this->args['column']));
						
					endwhile;
				endif;
				wp_reset_postdata();
			echo '</div>';
		echo '</div>';
		echo "<script>
		jQuery(document).ready(function(){
			
		});
		</script>";
		
	}

}
