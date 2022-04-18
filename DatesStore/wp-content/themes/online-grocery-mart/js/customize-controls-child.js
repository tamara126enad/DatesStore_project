( function( api ) {

	// Extends our custom "online-grocery-mart" section.
	api.sectionConstructor['online-grocery-mart'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );