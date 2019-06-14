(function( $ ) {
	
	$(document).ready(function (){

		// Only needed on customizer page - theme options page handled using Redux core customization
		if( jQuery( 'body' ).hasClass( 'wp-customizer' ) ) {

			// ----------------------------------------------------------------------------------------------------------
			// 1. CUSTOMIZER PAGE
			// ----------------------------------------------------------------------------------------------------------

			// Add active class to customizer
			$('body.wp-customizer [id*="upeo_customizer_section_themeoptions"] > h3').click(function(e){

				var target_control       = '#customize-controls';
				var target_preview       = '#customize-preview';
				var target_preview_width = $( '#customize-preview' ).width();

				// Remove width classes
				$( target_control ).removeClass( 'upeo-width-450' );
				$( target_preview ).removeClass( 'upeo-width-450' );
				$( target_preview ).css( 'width', '' );

				// Remove width classes
				$( target_control ).addClass( 'upeo-width-450' );
				$( target_preview ).addClass( 'upeo-width-450' );
				$( target_preview ).css( 'width', ( target_preview_width - 150 ) );
			});

			// Remove width classes
			$( 'body.wp-customizer [id*="upeo_customizer_section_themeoptions"] .accordion-section > button' ).click(function(e){

				var target_control = '#customize-controls';
				var target_preview = '#customize-preview';
				var target_preview_width = $( '#customize-preview' ).width();

				$( target_control ).removeClass( 'upeo-width-450' );
				$( target_preview ).removeClass( 'upeo-width-450' );
				$( target_preview ).css( 'width', '' );
			});

			// Hide labels which contain "HIDDEN_LABEL_" text
			$( 'body.wp-customizer [id*="customize-control-upeo_"] label:contains("HIDDEN_LABEL_")' ).addClass( 'hidden-label' );
		}

	});
})( jQuery );
