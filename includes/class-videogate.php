<?php

/**
 * @since      1.0.0
 * @package    VideoGate
 * @subpackage VideoGate/includes
 * @author     servigate <servigate.inc@gmail.com>
 */
class VideoGate {
	
	protected $loader;
	protected $plugin_name;
	protected $version;
	
	public function __construct() {
		if ( defined( 'VIDEOGATE_VERSION' ) ) {
			$this->version = VIDEOGATE_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'videogate';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		
	}
	
	private function load_dependencies() {

		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-videogate-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-videogate-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/posttypes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-videogate-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-videogate-metaboxes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-videogate-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/post.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shortcodes/videos.php';
		
		$this->loader = new VideoGate_Loader();
		
	}
	
	private function set_locale() {

		$plugin_i18n = new VideoGate_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}
	
	private function define_admin_hooks() {

		$plugin_admin = new VideoGate_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}
	
	private function define_public_hooks() {

		$plugin_public = new VideoGate_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
	
	public function run() {
		add_action('init', 'videogate_register_post_type', 0);
		$this->init_classes();
		if(!is_admin()){
			$VideoGate_Videos = new VideoGate_Videos();
			add_shortcode( 'videogate_videos', array( $VideoGate_Videos, 'init' ) );
		}
		$this->loader->run();
	}
	public function init_classes() {
		
	}
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	
	public function get_loader() {
		return $this->loader;
	}
	
	public function get_version() {
		return $this->version;
	}

}
