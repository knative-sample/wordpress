<?php
/**
 * Section - Button Link.
 *
 * @package UpeoThemes
 */

if( class_exists( 'WP_Customize_Control' ) ) {
	class upeo_customizer_customswitch_button_link extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'upeo-button-link';

		// Custom button text to output.
		public $button_text = '';

		// Custom pro button URL.
		public $button_url = '';

		// Custom pro button class.
		public $button_class = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['button_text'] = esc_html( $this->button_text );
			$json['button_url']  = html_entity_decode( esc_url( $this->button_url ) );
			$json['button_class'] = esc_attr( $this->button_class );

			return $json;
		}

		// Outputs the Underscore.js template.
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.button_text && data.button_url ) { #>
						<a href="{{ data.button_url }}" class="button {{ data.button_class }} alignright" target="_blank">{{ data.button_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}