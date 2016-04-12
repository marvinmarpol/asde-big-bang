( function( $ ) {
	var hColorBefore = $('#header-navigation a').css("color");
	var fColorBefore = $('#footer-navigation a').css("color");

	function toast(m){
		$('#toastbox').remove();
		var div=document.createElement('div');
		$(div).attr('id', 'toastbox');
		$(div).css({
			'position': 'fixed',
			'left' : '0',
			'bottom' : '50%',
			'padding': '5px',
			'background-color' : '#212121',
			'color' : '#fff',
			'-webkit-border-radius': '5px',
			'-moz-border-radius': '5px',
			'border-radius' : '5px'
		});
		$(div).text(m);
		$('html').append(div);
		setTimeout(function(){
			$(div).fadeOut(500, function(){$(div).remove();});
		},3000);
	}

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
		value.bind( function( to ) {
			$( '#header-navigation a' ).hover(
				function(){
					hColorBefore = $('#header-navigation a').css("color");
					$(this).css("color", to);
				},
				function(){
					$(this).css("color", hColorBefore);
				}
			);
		} );
	} );

	/* Header link hover opacity */
	wp.customize( 'header_link_hover_opacity', function( value ) {
		var before = $('#header-navigation a').css("opacity");
		value.bind( function( to ) {
			toast((to*0.01).toFixed(1));
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
			toast('+ ' + to+' px');
			$( '#header-menu' ).css("padding-top", to);
		} );
	} );

	/* Header padding left right */
	wp.customize( 'header_pad_left_right', function( value ) {
		value.bind( function( to ) {
			toast('+ ' + (to*0.25)+' %');
			$( '#header-navigation' ).css("padding-left", (to*0.25)+'%');
			$( '#header-navigation' ).css("padding-right", (to*0.25)+'%');
		} );
	} );

	/* Header Logo */
	wp.customize( 'header_logo', function( value ) {
		value.bind( function( to ) {
			toast(to);
			$( '#logo-image' ).attr("src", to);
		} );
	} );

	/* Header Logo Height*/
	wp.customize( 'header_logo_height', function( value ) {
		value.bind( function( to ) {
			toast((parseInt(to)+50)+' px');
			$( '#logo-image' ).css("height", (parseInt(to)+50));
		} );
	} );

	/* Footer background color */
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation' ).css("background-color", to);
		} );
	} );

	/* Header text color */
	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation' ).css("color", to);
		} );
	} );

	/* Footer padding top bottom */
	wp.customize( 'footer_pad_top_bottom', function( value ) {
		value.bind( function( to ) {
			toast('+ '+to+' px')
			$( '#footer-navigation' ).css("padding-top", to);
			$( '#footer-navigation' ).css("padding-bottom", to);
		} );
	} );

	/* Footer padding left right */
	wp.customize( 'footer_pad_left_right', function( value ) {
		value.bind( function( to ) {
			toast('+ '+(to*0.25)+' %')
			$( '#footer-navigation' ).css("padding-left", (to*0.25)+'%');
			$( '#footer-navigation' ).css("padding-right", (to*0.25)+'%');
		} );
	} );

	/* Footer link color */
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation a' ).css("color", to);
		} );
	} );

	/* Footer link hover color */
	wp.customize( 'footer_link_hover_color', function( value ) {
		value.bind( function( to ) {
			$( '#footer-navigation a' ).hover(
				function(){
					$(this).css("color", to);
				},
				function(){
					$(this).css("color", fColorBefore);
				}
			);
		} );
	} );

	/* Footer link hover opacity */
	wp.customize( 'footer_link_hover_opacity', function( value ) {
		var before = $('#footer-navigation a').css("opacity");
		value.bind( function( to ) {
			toast((to*0.01).toFixed(1));
			$( '#footer-navigation a' ).hover(
				function(){
					$(this).css("opacity", (to*0.01).toFixed(1) );
				},
				function(){
					$(this).css("opacity", before);
				}
			);
		} );
	} );
} )( jQuery );