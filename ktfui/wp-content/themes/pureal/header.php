<!DOCTYPE html />

<html <?php language_attributes(); ?>>
	
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="header-navigation">
			<div id="logo" class="vertical-middle"><a href="<?php bloginfo( 'url' ); ?>"><img id="logo-image" src="<?php if (get_theme_mod( 'header_logo' )) : echo get_theme_mod( 'header_logo'); else: echo get_template_directory_uri().'/images/HalfShotbw.jpg'; endif; ?>" /></a></div>
			<div id="header-menu">
			<?php
				$args = array(
					'theme_location' => 'primary'
				);
				wp_nav_menu( $args );
			?>
			</div>
		</div>