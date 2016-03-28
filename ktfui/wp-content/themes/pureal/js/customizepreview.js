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

	/* Header link hover color */
	wp.customize( 'header_link_hover_color', function( value ) {
		var before = $('#header-navigation a').css("color");
		value.bind( function( to ) {
			$( '#header-navigation a' ).hover(
				function(){
					before = $('#header-navigation a').css("color");
					$(this).css("color", to);
				},
				function(){
					$(this).css("color", before);
				}
			);
		} );
	} );

	/* Header link hover opacity */
	wp.customize( 'header_link_hover_opacity', function( value ) {
		var before = $('#header-navigation a').css("opacity");
		value.bind( function( to ) {
			$( '#header-navigation a' ).hover(
				function(){
					$(this).css("opacity", (to*0.01).toFixed(1) );
				},
				function(){
					$(this).css("opacity", before);
				}
			);
		} );
	} );

	/* Header text color */
	wp.customize( 'header_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#header-navigation' ).css("color", to);
		} );
	} );

	/* Header padding top bottom*/
	wp.customize( 'header_pad_top_bottom', function( value ) {
		value.bind( function( to ) {
			$( '#header-navigation' ).css("padding-top", to);
			$( '#header-navigation' ).css("padding-bottom", to);
		} );
	} );

	/* Header padding left right */
	wp.customize( 'header_pad_left_right', function( value ) {
		value.bind( function( to ) {
			$( '#header-navigation' ).css("padding-left", (to*0.25)+'%');
			$( '#header-navigation' ).css("padding-right", (to*0.25)+'%');
		} );
	} );

	/* Header Logo */
	wp.customize( 'header_logo', function( value ) {
		value.bind( function( to ) {
			$( '#logo-image' ).attr("src", to);
		} );
	} );

	/* Header Logo Height*/
	wp.customize( 'header_logo_height', function( value ) {
		value.bind( function( to ) {
			$( '#logo-image' ).css("height", (parseInt(to)+50));
		} );
	} );

	/* Footer background color */
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation' ).css("background-color", to);
		} );
	} );

	/* Footer padding top bottom */
	wp.customize( 'footer_pad_top_bottom', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation' ).css("padding-top", to);
			$( '#footer-navigation' ).css("padding-bottom", to);
		} );
	} );

	/* Footer padding left right */
	wp.customize( 'footer_pad_left_right', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation' ).css("padding-left", (to*0.25)+'%');
			$( '#footer-navigation' ).css("padding-right", (to*0.25)+'%');
		} );
	} );
} )( jQuery );