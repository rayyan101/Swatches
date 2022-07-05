<?php
/**
 * Plugin Name:       Woocommerce Switches
 * Description:       Applying Switches on Variable Product
 * Version:           1.1.1.0
 * Author:            Codup
 * Author URI:        https://codup.co
 * License:           GPL v2 or later

 * @package           Woocommerce Switches
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WS_PLUGIN_DIR' ) ) {
	define( 'WS_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'WS_PLUGIN_DIR_URL' ) ) {
	define( 'WS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WS_ABSPATH' ) ) {
	define( 'WS_ABSPATH', dirname( __FILE__ ) );
}

	require_once WS_ABSPATH . '/includes/class-WS-loader.php';

