<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * EWEB Elite Core
 * 
 * Handles Elementor dependency checks, admin notices, and widget registration.
 */
class EWEB_Elite_Core {

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const VERSION = '1.0.1';

	private static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		// Check if Elementor is active
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_elementor' ] );
			return;
		}

		// Check Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Register category and enqueue styles
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_category' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		// Load Widget Manager
		require_once EWEB_ELITE_PATH . 'includes/class-eweb-elite-widget-manager.php';
		EWEB_Elite_Widget_Manager::instance();

		// Initialize GitHub Updater
		if ( is_admin() ) {
			require_once EWEB_ELITE_PATH . 'includes/class-eweb-github-updater.php';
			new EWEB_GitHub_Updater( 
				EWEB_ELITE_PATH . 'eweb-elite-elementor-addons.php', 
				'Yisus-Develop', 
				'elite-elementor-addons' 
			);
		}
	}

	public function admin_notice_missing_elementor() {
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'eweb-elite-addons' ),
			'<strong>EWEB - Elite Elementor Addons</strong>',
			'<strong>Elementor</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'eweb-elite-addons' ),
			'<strong>EWEB - Elite Elementor Addons</strong>',
			'<strong>Elementor</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function register_category( $elements_manager ) {
		$elements_manager->add_category(
			'eweb-elite-addons',
			[
				'title' => esc_html__( 'EWEB Elite Addons', 'eweb-elite-addons' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'eweb-elite-addons-css',
			EWEB_ELITE_URL . 'assets/css/elite-addons.css',
			[],
			EWEB_ELITE_VERSION
		);
	}
}
