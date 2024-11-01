<?php

/**
 * @package    VideoGate
 * @subpackage VideoGate/admin
 * @author     servigate <servigate.inc@gmail.com>
 */
class VideoGate_Admin {

	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->metaboxes = new VideoGate_Metaboxes;
	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, VIDEOGATE_ASSETS_URL . 'css/admin.css', array(), $this->version, 'all' );

	}
	
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, VIDEOGATE_ASSETS_URL . 'js/admin.js', array( 'jquery' ), $this->version, false );

	}

}
