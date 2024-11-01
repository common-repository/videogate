<?php

/**
 * Plugin Name:       VideoGate
 * Description:       A video showcasing and streaming plugin with youtube, vimeo integration.
 * Version:           1.0.1
 * Author:            servigate
 * Author URI:        https://servigate.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       videogate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('VIDEOGATE_VERSION', '1.0.1');
define('VIDEOGATE_PATH', plugin_dir_path(__FILE__));
define('VIDEOGATE_URL', plugins_url('/', __FILE__));
define('VIDEOGATE_ASSETS_PATH', VIDEOGATE_PATH . 'assets/');
define('VIDEOGATE_ASSETS_URL', VIDEOGATE_URL . 'assets/');
define('VIDEOGATE_TEMPLATES_PATH', VIDEOGATE_PATH . 'public/');
define('VIDEOGATE_POST_TYPE', 'videogate_video');
define('VIDEOGATE_CATEGORIES_TAX', 'videogate-category');
define('VIDEOGATE_TYPES_TAX', 'videogate-type');
define('VIDEOGATE_CAST_TAX', 'videogate-cast');
define('VIDEOGATE_GENRES_TAX', 'videogate-genres');
define('VIDEOGATE_AGE_TAX', 'videogate-age');
define('VIDEOGATE_QUALITY_TAX', 'videogate-quality');
define('VIDEOGATE_TAGS_TAX', 'videogate-tag');

function videogate_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-videogate-activator.php';
	VideoGate_Activator::activate();
}

function videogate_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-videogate-deactivator.php';
	VideoGate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'videogate_activate' );
register_deactivation_hook( __FILE__, 'videogate_deactivate' );

require plugin_dir_path( __FILE__ ) . 'includes/class-videogate.php';

function videogate_run() {

	$plugin = new VideoGate();
	$plugin->run();

}
videogate_run();
