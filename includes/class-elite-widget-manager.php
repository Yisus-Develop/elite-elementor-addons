<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elite Widget Manager
 * 
 * Handles reading and registering all custom Elementor widgets.
 * Keeps the main plugin file clean.
 */
class Elite_Widget_Manager {

    /**
     * Instance
     * @var Elite_Widget_Manager
     */
    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Initialize hooks
     */
    public function __construct() {
        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
    }

    /**
     * Register Widgets
     * 
     * Include and register all Elite widgets here.
     */
    public function register_widgets( $widgets_manager ) {
        
        // 1. Service Card
        require_once dirname( __DIR__ ) . '/widgets/elite-service-card.php';
        $widgets_manager->register( new \Elite_Service_Card() );

        // 2. Section Header (Placeholder for future)
        // require_once dirname( __DIR__ ) . '/widgets/elite-section-header.php';
        // $widgets_manager->register( new \Elite_Section_Header() );

    }

}
