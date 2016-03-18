<?php

	function init_style(){
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}

	add_action('wp_enqueue_scripts', 'init_style');

	/* Navigation Menus */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' ),
		'footer' => __( 'Footer Menu' )
	) );
?>