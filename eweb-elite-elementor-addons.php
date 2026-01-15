<?php
/**
 * Plugin Name: EWEB - Elite Elementor Addons
 * Description: Premium Elementor widgets with advanced animations and glassmorphism effects.
 * Version: 1.0.2
 * Author: Yisus Develop
 * Author URI: https://github.com/Yisus-Develop
 * Plugin URI: https://github.com/Yisus-Develop/elite-elementor-addons
 * License: GPL v2 or later
 * Requires at least: 6.2
 * Requires PHP: 8.1
 * Tested up to: 6.4
 * Text Domain: eweb-elite-addons
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants
define( 'EWEB_ELITE_VERSION', '1.0.2' );
define( 'EWEB_ELITE_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWEB_ELITE_URL', plugin_dir_url( __FILE__ ) );

// Load Core Class
require_once EWEB_ELITE_PATH . 'includes/class-eweb-elite-core.php';
EWEB_Elite_Core::get_instance();
