<?php

/**
 * @package    VideoGate
 * @subpackage VideoGate/public
 * @author     servigate <servigate.inc@gmail.com>
 */
class VideoGate_Public {

	
	private $plugin_name;
	private $version;
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/functions.php';
	}
	
	public function enqueue_styles() {
		wp_register_style('videogate-vplayer', VIDEOGATE_ASSETS_URL .'libs/plyr/css/plyr.css');
		wp_register_style('hystmodal', VIDEOGATE_ASSETS_URL .'libs/hystmodal/css/hystmodal.min.css');
		wp_register_style('videogate-styles', VIDEOGATE_ASSETS_URL .'css/public.css');
		wp_enqueue_style('videogate-styles');
		wp_enqueue_style('videogate-vplayer');
		wp_enqueue_style('hystmodal');
	}
	
	public function enqueue_scripts() {
		wp_register_script('videogate-vplayer', VIDEOGATE_ASSETS_URL .'libs/plyr/js/plyr.min.js');
		wp_register_script('hystmodal', VIDEOGATE_ASSETS_URL .'libs/hystmodal/js/hystmodal.min.js');
		wp_register_script('videogate-script', VIDEOGATE_ASSETS_URL .'js/app.js');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('videogate-vplayer');
		wp_enqueue_script('hystmodal');
		wp_enqueue_script('videogate-script');
		wp_localize_script('videogate-script', 'videogate_vars', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
		));
		wp_localize_script('videogate-vplayer', 'videogate_plyrvars', array(
			'plyricon' => VIDEOGATE_ASSETS_URL .'libs/plyr/js/plyr.svg',
		));

	}

}
