<?php 

	/**
	 * This class is Loader Class we are using for Enqueue Scrips Style and including other Classes and Files 
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'WS_Loader' ) ) {

	/**
	 * Class WS_Loader. ()
	 */
	
	class WS_Loader {

		/**
		 *  Constructor.
		 */

		public function __construct() {
			$this->includes();
			add_action( 'admin_enqueue_scripts', array( $this, 'WS_enqueue_scripts_admin' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'WS_enqueue_scripts_client' ) );
		} 
		
		/**
		 * Function for Enqueue Scripts on and Style Admin side 
		 */

		public function WS_enqueue_scripts_admin() {
			wp_enqueue_script( 'WS_admin_js',  plugin_dir_url( __DIR__ ). '/assets/js/admin.js',   array('jquery') , wp_rand() );
			wp_localize_script( 'WS_admin_js', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
			wp_enqueue_style( 'WS_plugin_style', plugin_dir_url( __DIR__ ). '/assets/css/style.css');
		}

		/**
		 * Function for Enqueue Scripts and Style on Client side
		 */

		public function WS_enqueue_scripts_client() {
			wp_enqueue_script( 'WS_client_js',  plugin_dir_url( __DIR__ ). '/assets/js/client.js',   array('jquery') , wp_rand() );
			wp_localize_script( 'WS_client_js', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
			wp_enqueue_style( 'WS_plugin_style', plugin_dir_url( __DIR__ ). '/assets/css/clientstyle.css');
		}


		/**
		 * Function for Including Files and Classes
		 */

		public function includes() {
			include_once 'class-WS-SwitchesTab.php';
			include_once 'class-WS-Variations.php';
		}
	}
}
new WS_Loader();
?>