<?php
	/**
	 * In this class we are Changing Variation in Variable Product (User Page) Dropdown to Redio Button.
	 *
	 * @package Woocommerce Swatches
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Variations' ) ) {

	/**
	 * Class Variations.
	 */
	class Ws_Variations {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_filter( 'woocommerce_dropdown_variation_attribute_options_html', array( $this, 'WS_variation_radio_buttons' ), 20, 2 );
		}

		/**
		 * Function to change variable product dropdown to redio button switches variations
		 *
		 * @param html  $html whole html of product page.
		 * @param array $args array of dropdown values.
		 * @return html
		 */
		public function ws_variation_radio_buttons( $html, $args ) {
			global $product;
			global $post;
			$product_id = $post->ID;
			$checbox    = get_post_meta( $product_id, 'enable_variation', true );
			if ( 'yes' === $checbox ) {
				$options   = $args['options'];
				$product   = $args['product'];
				$attribute = $args['attribute'];
				$name      = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
				$id        = $args['id'];
				$class     = $args['class'];
				$radios    = '<div class="variation-radios">';
				if ( ! empty( $options ) ) {
					foreach ( $options as $option ) {
						$id = $name . '-' . $option;
						if ( 'attribute_color' === $name ) {
							$radios .= '<label style="width:50px; display: inline-block;  margin-left:5px;" for="' . $id . '"><div class="ws_switches" style="background-color:' . $option . '"></div></label><input type="radio" class="variation_redio" id="' . $id . '" name="' . $name . '" value="' . $option . '">';
						} else {
							$radios .= '<label  style=" display: inline-block; margin-left:5px;" for="' . $id . '"><div class="ws_switches" style="display:flex; justify-content: center; align-items:center; padding-inline: 1rem;">' . $option . '</div></label><input type="radio" class="variation_redio" id="' . $id . '" name="' . $name . '" value="' . $option . '">';
						}
					}
				}
				$radios .= '</div>';
				return $html . $radios;
			} else {

				?>
			<script>
				jQuery(document).ready(function($)
				{
					$('.variations select').show();
				});
			</script>
				<?php
				return $html;
			}
		}
	}
}
new Ws_Variations();
?>
