<?php
	/* init stylesheet */
	function init_style(){
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}
	add_action('wp_enqueue_scripts', 'init_style');


	/* init wp setup */
	function init_wp_setup(){
		/* Navigation Menus */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu' ),
			'footer' => __( 'Footer Menu' )
		) );

		/* add feature image support */
		add_theme_support('post-thumbnails');
		add_image_size('small-thumbnail', 180, 120, true); //hardcrop=true
		add_image_size('fullwidth-banner', 920, 210, array('left', 'top'));

		/* add post format support */
		//add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	}
	add_action('after_setup_theme', 'init_wp_setup');


	/* Customize excerpt word length */
	function set_excerpt_length(){
		return 30;
	}
	add_filter('excerpt_length', 'set_excerpt_length');
?>