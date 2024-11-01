<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
get_header();
$excerpt = '';
global $post;
$videogate_video_source = (get_post_meta($post->ID, '_videogate_video_source', true) && !empty(get_post_meta($post->ID, '_videogate_video_source', true)))? get_post_meta($post->ID, '_videogate_video_source', true): 'youtube';
$videogate_video_id = (get_post_meta($post->ID, '_videogate_video_id', true) && !empty(get_post_meta($post->ID, '_videogate_video_id', true)))? get_post_meta($post->ID, '_videogate_video_id', true): '';

if (has_excerpt()) {
	$excerpt = wp_strip_all_tags(get_the_excerpt());
}

?>

<div id="container">    
	<div id="player" data-plyr-provider="<?php echo esc_attr($videogate_video_source); ?>" data-plyr-embed-id="<?php echo esc_attr($videogate_video_id); ?>"></div>
</div>
<script>
  const player = new Plyr('#player');
</script>
<?php get_footer(); ?>