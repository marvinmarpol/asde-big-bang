( function( $ ) {
	/* header background color */
	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#header-navigation' ).css("background-color", to);
		} );
	} );

	/* Header link color */
	wp.customize( 'header_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#header-navigation a' ).css("color", to);
		} );
	} );
} )( jQuery );