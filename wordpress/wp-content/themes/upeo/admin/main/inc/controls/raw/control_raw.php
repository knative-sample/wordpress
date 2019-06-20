<?php
/**
 * Control - Raw.
 *
 * @package UpeoThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class upeo_customizer_customcontrol_raw extends WP_Customize_Control {

 		// Declare the control type.
		public $type = 'raw';

		// Render the control to be displayed in the Customizer.
		public function render_content() {
			echo wp_kses_post( $this->label );
		}
	}
}