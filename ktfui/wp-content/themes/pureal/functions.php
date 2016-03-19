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


	/* add new widget location */
	function init_widget(){
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-item-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => 'Footer Area 1',
			'id' => 'footer1'
		));
		register_sidebar(array(
			'name' => 'Footer Area 2',
			'id' => 'footer2'
		));
		register_sidebar(array(
			'name' => 'Footer Area 3',
			'id' => 'footer3'
		));
		register_sidebar(array(
			'name' => 'Footer Area 4',
			'id' => 'footer4'
		));
	}
	add_action('widgets_init', 'init_widget');


	/* Customize excerpt word length */
	function set_excerpt_length(){
		return 30;
	}
	add_filter('excerpt_length', 'set_excerpt_length');
?>