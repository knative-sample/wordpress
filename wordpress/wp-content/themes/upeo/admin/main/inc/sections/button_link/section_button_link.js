( function( api ) {

	// Extends our custom "upeo-button-link" section.
	api.sectionConstructor['upeo-button-link'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
