<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
// Password Update
if (!function_exists('videogate_grid_modal')) {

    function videogate_grid_modal() {
    	$id = sanitize_text_field($_POST['id']);
		videogate_display_template('templates/grid-modal-small.php', array('id' => $id));
        die();
    }

    add_action('wp_ajax_videogate_grid_modal', 'videogate_grid_modal');
    add_action('wp_ajax_videogate_grid_modal', 'videogate_grid_modal');
}