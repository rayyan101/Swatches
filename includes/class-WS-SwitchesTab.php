<?php 
	/**
	 * in this class we are creating new tab (Swithces) and checkbox in variable Product for applying filters
	 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'WS_SwitchesTab' ) ) {

	/**
	 * Class WS_SwitchesTab.
	 */

	class WS_SwitchesTab {

		/**
		 *  Constructor.
		 */

		public function __construct() {
			add_filter( 'woocommerce_product_data_tabs', array($this,'WS_creating_switches_tab' ));
			add_action( 'woocommerce_product_data_panels', array($this,'WS_creating_checkbox_in_switches_tab') );
			add_action( 'woocommerce_process_product_meta',  array($this, 'WS_switches_value_saving'));      
		}

		/**
		 *  Creating Switches Tab in Variable Product (Admin Page)
		 * 
		 * @param array $swithces_data_tabs this argument have tab details.
		 * 
		 * @return array $swithces_data_tabs return with new switches tab
		 */

		public function WS_creating_switches_tab( $swithces_data_tabs ) {		
			$swithces_data_tabs['Switches'] = array(
				'label' => 'Switches',
				'target' => 'my_switches_data',
				'class'    => array( 'show_if_variable' ),
				'priority' => 40
			);
			return $swithces_data_tabs;
		}

		/**
		 *  Creating Checkbox Under the Switches Tab for Applyng Variations
		 */

		public function WS_creating_checkbox_in_switches_tab() {
			global $woocommerce, $post;
			?>
			<div id="my_switches_data" class="panel woocommerce_options_panel">
				<?php
				woocommerce_wp_checkbox( array( 
					'id'            => 'enable_variation',
					'class'    => 'show_if_variable' ,
					'label'         => 'Click Here to Apply Variations',
					'description'   => 'Check me if you want to apply variations on your variable product in Product page',
					'default'  		=> '0',
					'desc_tip'    	=> false,
				));
				?>
			</div>
			<?php
		}
	
		/**
		 * Saving value of Checkbox in Database
		 * 
		 * @param int @post_id id of post in product page
		 * 
		 */

		public function WS_switches_value_saving( $post_id ) {
			$checkbox = isset( $_POST['enable_variation'] ) ? $_POST['enable_variation'] : '';
			if ($_POST['enable_variation'] == true){
				update_post_meta( $post_id, "enable_variation", $checkbox  );
			}
			if ($_POST['enable_variation'] == false){
				update_post_meta( $post_id, "enable_variation", ""  );
					
			}	
		}	
	}	
}
new WS_SwitchesTab(); 
?>


