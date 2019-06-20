jQuery( document ).ready( function() {

    /* === Slider Switch Control === */

	if( jQuery( 'body' ).hasClass( 'wp-customizer' ) ) {

		// ----------------------------------------------------------------------------------------------------------
		// 1. SLIDER RADIO BUTTONS
		// ----------------------------------------------------------------------------------------------------------

		jQuery( 'body.wp-customizer [id*="upeo_homepage_sliderswitch"] input:radio' ).click(function(e){ 
			jQuery( this ).closest( 'li' ).find( 'label' ).removeClass( 'checked' );
			jQuery( this ).closest( 'label' ).addClass( 'checked' );
		});
		jQuery( 'body.wp-customizer [id*="upeo_homepage_sliderswitch"] input:radio:checked' ).closest( 'label' ).addClass( 'checked' );

		// ----------------------------------------------------------------------------------------------------------
		// 2. SLIDER RADIO TOGGLE
		// ----------------------------------------------------------------------------------------------------------

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_image"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_title"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_desc"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_link"]' ).css( 'display', '' );

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_image"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_title"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_desc"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_link"]' ).css( 'display', '' );

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_image"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_title"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_desc"]' ).css( 'display', '' );
		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_link"]' ).css( 'display', '' );

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_info"]' ).click(function(e){ 
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_image"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_title"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_desc"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage1_link"]' ).fadeToggle(300);

			if ( jQuery ( this ).hasClass( 'sliderimage_open' ) ) {
				jQuery( this).removeClass( 'sliderimage_open' );
			} else {
				jQuery( this).addClass( 'sliderimage_open' );				
			}
		});

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_info"]' ).click(function(e){ 
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_image"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_title"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_desc"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage2_link"]' ).fadeToggle(300);

			if ( jQuery ( this ).hasClass( 'sliderimage_open' ) ) {
				jQuery( this).removeClass( 'sliderimage_open' );
			} else {
				jQuery( this).addClass( 'sliderimage_open' );				
			}
		});

		jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_info"]' ).click(function(e){ 
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_image"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_title"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_desc"]' ).fadeToggle(300);
			jQuery( 'body.wp-customizer li[id*="upeo_homepage_sliderimage3_link"]' ).fadeToggle(300);

			if ( jQuery ( this ).hasClass( 'sliderimage_open' ) ) {
				jQuery( this).removeClass( 'sliderimage_open' );
			} else {
				jQuery( this).addClass( 'sliderimage_open' );				
			}
		});

	}

} ); // jQuery( document ).ready