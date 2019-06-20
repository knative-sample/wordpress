<?php
/**
 * Control - Section.
 *
 * @package UpeoThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class upeo_customizer_customcontrol_upgrade_inner extends WP_Customize_Control {
 
 		// Declare the control type.
		public $type            = 'upgrade';
		public $upgrade_url     = '';
		public $price_discount  = '';
		public $price_normal    = '';
		public $coupon          = '';
		public $button          = '';
		public $title_main      = '';
		public $title_secondary = '';
		public $images          = '';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {
			wp_enqueue_style( 'upeo-control-upgrade', trailingslashit( get_template_directory_uri() ) . 'admin/main/inc/controls/upgrade_inner/control_upgrade_inner.css', '', time() );
		}

		// Render the control to be displayed in the Customizer.
		public function render_content() {

			// -------------------------------------------------------------------------------------
			// 1. Intro section
			// -------------------------------------------------------------------------------------

				echo	'<div id="upeo-promotion-field-header">';
				
					echo	'<div id="promotion-table">';
					echo	'<div id="promotion-header">';
					echo	'<p class="main-title">' . esc_html( $this->price_discount ) . '</p>';
					echo	'<a href="' . esc_url( $this->upgrade_url ) . '" target="_blank" class="promotion-button">' . esc_html( $this->button ) . '</a>';
					echo	'</div>';

					echo	'<div id="promotion-coupon">';
					echo	'<a href="' . esc_url( $this->upgrade_url ) . '" target="_blank">' . esc_html( $this->coupon ) . '<span>' . esc_html( $this->price_normal ) . '</span></a>';
					echo	'</div>';
					echo	'</div>';

					echo	'<p class="main-title">' . esc_html( $this->title_main ) . '</p>';
					echo	'<p class="secondary-title">' . esc_html( $this->title_secondary ) . '</p>';

				echo	'</div>';


			// -------------------------------------------------------------------------------------
			// 2. Image section
			// -------------------------------------------------------------------------------------

				// Output upgrade images
				foreach ( $this->images as $image ) {

					printf(
						'<div class="upeo-promotion-field-item">
						 <div class="has-screenshot">
						 <a href="%s" target="_blank" class="promotion-image"><img src="%s" alt="" /></a>
						 </div>
						 </div>',
						esc_url( $this->upgrade_url ),
						esc_url( sprintf( $image, get_template_directory_uri(), get_stylesheet_directory_uri() ) )
					);
				}

		}
	}
}