<?php
	/* init stylesheet */
	function pureal_init_style(){
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/animate.js', array ( 'jquery' ), null, true);
		/*echo get_template_directory_uri ();
		echo (get_theme_mod('header_pad_top_bottom', '10')*0.5).'px';*/
	}
	add_action('wp_enqueue_scripts', 	'pureal_init_style');


	/* init script */
	/*function pureal_init_scripts(){
		// Register the script like this for a plugin:
		//wp_register_script( 'custom-script', plugins_url( '/js/custom-script.js', __FILE__ ) );

		// Register the script like this for a theme:
		wp_register_script( 'custom-script', get_template_directory_uri() . '/js/toast.js' );
		
		// For either a plugin or a theme, you can then enqueue the script:
		wp_enqueue_script( 'custom-script' );
	}
	add_action( 'wp_enqueue_scripts', 'pureal_init_scripts');*/


	/* init wp setup */
	function pureal_init_wp_setup(){
		/* Navigation Menus */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu' ),
			'footer' => __( 'Footer Menu' )
		) );

		/* add feature image support */
		add_theme_support('post-thumbnails');
		//add_image_size('small-thumbnail', 180, 120, true); //hardcrop=true
		//add_image_size('fullwidth-banner', 920, 210, array('left', 'top'));

		/* add post format support */
		//add_theme_support('post-formats', array('aside', 'gallery', 'link'));
		add_theme_support('post-formats', array('gallery'));
	}
	add_action('after_setup_theme', 'pureal_init_wp_setup');


	/* image upload sanitize callback */
	function pureal_sanitize_image( $image, $setting ) {
		/*
		* Array of valid image file types.
		* The array includes image mime types that are included in wp_get_mime_types()
		*/
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon'
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


	/* add new widget location */
	function pureal_init_widget(){
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
	add_action('widgets_init', 'pureal_init_widget');


	/* Customize excerpt word length */
	function pureal_set_excerpt_length(){
		return 50;
	}
	add_filter('excerpt_length', 'pureal_set_excerpt_length');

	function pureal_new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'pureal_new_excerpt_more');


	/* theme customization */
	function pureal_init_theme_customization($wp_customize){
		/* Panel for header options */
		$wp_customize->add_panel('header_options', array(
			'title' => __('Header Options'),
			'priority' => 30
		));

		/* Panel for footer options */
		$wp_customize->add_panel('footer_options', array(
			'title' => __('Footer Options'),
			'priority' => 40
		));

		/* Section for header colors */
		$wp_customize->add_section('header_colors', array(
			'title' => __('Header Colors', 'pureal'),
			'panel' => 'header_options',
			'priority' => 2
		));

		/* Section for header size */
		$wp_customize->add_section('header_sizes', array(
			'title' => __('Header Sizes', 'pureal'),
			'panel' => 'header_options',
			'priority' => 3
		));

		/* Section for header logo */
		$wp_customize->add_section('head_logo', array(
			'title' => __('Header Logo', 'pureal'),
			'panel' => 'header_options',
			'priority' => 1
		));

		/* Section for footer colors */
		$wp_customize->add_section('footer_colors', array(
			'title' => __('Footer Colors', 'pureal'),
			'panel' => 'footer_options',
			'priority' => 1
		));

		/* Section for footer size */
		$wp_customize->add_section('footer_sizes', array(
			'title' => __('Footer Sizes', 'pureal'),
			'panel' => 'footer_options',
			'priority' => 2
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

		/* Header Link Hover Color and opacity */
		$wp_customize->add_setting('header_link_hover_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_link_hover_control', array(
			'label' => __('Header Link Hover Color', 'pureal'),
			'section' => 'header_colors',
			'settings' => 'header_link_hover_color'
		)) );
		$wp_customize->add_setting('header_link_hover_opacity', array(
			'default' => 70,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('header_link_hover_opacity_control', array(
			'label' => __('Header Link Hover Opacity', 'pureal'),
			'type' => 'range',
			'section' => 'header_colors',
			'settings' => 'header_link_hover_opacity'
		));

		/* Header Text Color */
		$wp_customize->add_setting('header_text_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color_control', array(
			'label' => __('Header Text Color', 'pureal'),
			'section' => 'header_colors',
			'settings' => 'header_text_color'
		)) );

		/* Header Background Color */
		$wp_customize->add_setting('header_bg_color', array(
			'default' => '#4c1b1b',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bgcolor_control', array(
			'label' => __('Header Background Color', 'pureal'),
			'section' => 'header_colors',
			'settings' => 'header_bg_color'
		)) );

		/* Header paddings */
		$wp_customize->add_setting('header_pad_top_bottom', array(
			'default' => 25,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('header_pad_top_bottom_control', array(
			'label' => __('Header Height', 'pureal'),
			'type' => 'range',
			'section' => 'header_sizes',
			'settings' => 'header_pad_top_bottom'
		));
		$wp_customize->add_setting('header_pad_left_right', array(
			'default' => 10,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('header_pad_left_right_control', array(
			'label' => __('Header Left and Right Padding', 'pureal'),
			'type' => 'range',
			'section' => 'header_sizes',
			'settings' => 'header_pad_left_right'
		));

		/* Header logo */
		$wp_customize->add_setting('header_logo', array(
			'transport' => 'postMessage',
			'default-image' => 'http://gwenty.com/example/wp-content/themes/gwenty/images/HalfShotbw.jpg',
			'sanitize' => 'pureal_sanitize_image'
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo_control', array(
			'label' => __( 'Header Logo', 'pureal' ),
			'section' => 'head_logo',
			'mime_type' => 'image',
			'settings' => 'header_logo'
		)) );

		/* Header logo height */
		$wp_customize->add_setting('header_logo_height', array(
			'default' => 50,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('header_logo_height_control', array(
			'label' => __('Header Logo Height', 'pureal'),
			'type' => 'range',
			'section' => 'head_logo',
			'settings' => 'header_logo_height'
		));

		/* Footer paddings */
		$wp_customize->add_setting('footer_pad_top_bottom', array(
			'default' => 25,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('footer_pad_top_bottom_control', array(
			'label' => __('Footer Height', 'pureal'),
			'type' => 'range',
			'section' => 'footer_sizes',
			'settings' => 'footer_pad_top_bottom'
		));
		$wp_customize->add_setting('footer_pad_left_right', array(
			'default' => 10,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('footer_pad_left_right_control', array(
			'label' => __('Footer Left and Right Padding', 'pureal'),
			'type' => 'range',
			'section' => 'footer_sizes',
			'settings' => 'footer_pad_left_right'
		));

		/* Footer Background Color */
		$wp_customize->add_setting('footer_bg_color', array(
			'default' => '#212121',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bgcolor_control', array(
			'label' => __('Footer Background Color', 'pureal'),
			'section' => 'footer_colors',
			'settings' => 'footer_bg_color'
		)) );

		/* Footer Text Color */
		$wp_customize->add_setting('footer_text_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color_control', array(
			'label' => __('Footer Text Color', 'pureal'),
			'section' => 'footer_colors',
			'settings' => 'footer_text_color'
		)) );

		/* Footer Link Color */
		$wp_customize->add_setting('footer_link_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color_control', array(
			'label' => __('Footer Link Color', 'pureal'),
			'section' => 'footer_colors',
			'settings' => 'footer_link_color'
		)) );

		/* Footer Link Hover Color and opacity */
		$wp_customize->add_setting('footer_link_hover_color', array(
			'default' => '#fff',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_hover_control', array(
			'label' => __('Footer Link Hover Color', 'pureal'),
			'section' => 'footer_colors',
			'settings' => 'footer_link_hover_color'
		)) );
		$wp_customize->add_setting('footer_link_hover_opacity', array(
			'default' => 70,
			'transport' => 'postMessage'
		));
		$wp_customize->add_control('footer_link_hover_opacity_control', array(
			'label' => __('Footer Link Hover Opacity', 'pureal'),
			'type' => 'range',
			'section' => 'footer_colors',
			'settings' => 'footer_link_hover_opacity'
		));
	}
	add_action('customize_register', 'pureal_init_theme_customization');


	/* output theme customization css */
	function pureal_update_custom_css(){
?>
	<style type="text/css">
		#header-navigation-container{
			background-color: <?php echo get_theme_mod('header_bg_color', '#4c1b1b'); ?>;
		}
		#header-navigation{
			padding: <?php echo '0 '.(get_theme_mod('header_pad_left_right', 10)*0.25).'%'; ?>;
			background-color: <?php echo get_theme_mod('header_bg_color', '#4c1b1b'); ?>;
			color: <?php echo get_theme_mod('header_text_color', '#fff'); ?>;
		}

		#header-navigation-shadow{
			padding: <?php echo '0 '.(get_theme_mod('header_pad_left_right', 10)*0.25).'%'; ?>;
		}

		#header-navigation a{
			color: <?php echo get_theme_mod('header_link_color', '#fff'); ?>;
		}

		#header-navigation a:hover{
			color: <?php echo get_theme_mod('header_link_hover_color', '#fff'); ?>;
			opacity: <?php echo (get_theme_mod('header_link_hover_opacity', 70))*0.01; ?>;
			filter: alpha(opacity=<?php echo get_theme_mod('header_link_hover_opacity', 70); ?>);
		}

		#logo-image, #logo-image-shadow{
			height: <?php echo (get_theme_mod('header_logo_height', 50)+50).'px'; ?>;
		}

		#header-menu, #header-menu-shadow{
			padding-top: <?php echo get_theme_mod('header_pad_top_bottom', 25);?>;
		}

		#header-menu ul ul {
			background-color: <?php echo get_theme_mod('header_bg_color', '#4c1b1b'); ?>;
		}

		#header-menu ul li+li:before{
			color: <?php echo get_theme_mod('header_link_color', '#fff'); ?>;
		}

		#footer-navigation{
			padding: <?php echo get_theme_mod('footer_pad_top_bottom', 25).'px '.(get_theme_mod('footer_pad_left_right', 10)*0.25).'%'; ?>;
			background-color: <?php echo get_theme_mod('footer_bg_color', '#212121'); ?>;
			color: <?php echo get_theme_mod('footer_text_color', '#fff'); ?>;
		}

		#footer-navigation a{
			color: <?php echo get_theme_mod('footer_link_color', '#fff'); ?>;
		}

		#footer-navigation a:hover{
			color: <?php echo get_theme_mod('footer_link_hover_color', '#fff'); ?>;
			opacity: <?php echo (get_theme_mod('footer_link_hover_opacity', 80))*0.01; ?>;
			filter: alpha(opacity=<?php echo get_theme_mod('footer_link_hover_opacity', 80); ?>);
		}

		@media (max-width: 768px) {
			/* General */
			.row-container{
				padding: 1% 5%;
			}

			.row, .col-12, .col-11, .col-10, .col-9, .col-8, .col-7, .col-6, .col-5, .col-4, .col-3, .col-2, .col-1{
				display: block;
				width: initial;
			}

			#header-navigation,
			#header-navigation-shadow,
			#footer-navigation {
				padding: 0 1%;
				text-align: center;
			}

			/* General Gallery */
			.gallery-item{
				width: 100% !important;
			}

			/* General Post */
			.post-container{
				margin: 20px 0;
			}

			/* Header */
			#logo, #logo-shadow{
				display: block;
				width: initial;
				text-align: center;
			}

			#header-menu, #header-menu-shadow{
				display: none;
				width: initial;
			}

			#header-menu ul li, #header-menu-shadow ul li{
				display: block;
				border-top: 1px solid #ccc;
			}

			#header-menu ul li a{
				display: block;
			}

			#header-menu ul li a:hover{
				background-color: #f0b900;
				color: #fff;
			}

			#header-menu ul li:first-child{
				border: none;
			}

			#header-menu ul li+li:before{
				content: none;
			}

			#header-menu ul ul {
				position: static;
			}

			#dropdown-button, #dropdown-button-shadow{
				display: inline-block;
			}

			#profile img{
				max-width: 100%;
				margin-bottom: 40px;
			}
		}
	</style>
<?php
	}
	add_action('wp_head', 'pureal_update_custom_css');
	

	/* enable live preview */
	function pureal_preview_js() {
		wp_enqueue_script( 'custom_css_preview', get_template_directory_uri().'/js/customizepreview.js', array( 'jquery','customize-preview' ) );
	}
	add_action( 'customize_preview_init', 'pureal_preview_js' );