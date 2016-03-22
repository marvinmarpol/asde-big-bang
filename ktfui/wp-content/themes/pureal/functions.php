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


	/* theme customization */
	function init_theme_customization($wp_customize){
		/* Panel for header options */
		$wp_customize->add_panel('header_options', array(
			'title' => __('Header Options'),
			'priority' => 30
		));

		/* Panel for header colors */
		$wp_customize->add_section('header_colors', array(
			'title' => __('Header Colors', 'pureal'),
			'panel' => 'header_options',
			'priority' => 1
		));

		/* Header Link Color */
		$wp_customize->add_setting('header_link_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color_control', array(
			'label' => __('Header Link Color', 'pureal'),
			'section' => 'header_colors',
			'settings' => 'header_link_color'
		)) );

		/* Header Background Color */
		$wp_customize->add_setting('header_bg_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bgcolor_control', array(
			'label' => __('Header Background Color', 'pureal'),
			'section' => 'header_colors',
			'settings' => 'header_bg_color'
		)) );
	}
	add_action('customize_register', 'init_theme_customization');


	/* output theme customization css */
	function update_custom_css(){
?>
	<style type="text/css">
		#header-navigation{
			background-color: <?php echo get_theme_mod('header_bg_color'); ?>;
		}

		#header-navigation a{
			color: <?php echo get_theme_mod('header_link_color'); ?>;
		}
	</style>
<?php
	}
	add_action('wp_head', 'update_custom_css');
	

	/* enable live preview */
	function my_preview_js() {
		wp_enqueue_script( 'custom_css_preview', get_template_directory_uri().'/js/customizepreview.js', array( 'jquery','customize-preview' ) );
	}
	add_action( 'customize_preview_init', 'my_preview_js' );
?>