<!DOCTYPE html />

<html <?php language_attributes(); ?>>
	
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<div id="header-navigation-shadow">
			<div id="logo-shadow">
				<a><img id="logo-image-shadow" class="vertical-middle" src="<?php if (get_theme_mod( 'header_logo' )) : echo get_theme_mod( 'header_logo'); else: echo get_template_directory_uri().'/images/HalfShotbw.jpg'; endif; ?>"/>
					<div id="logo-text-shadow" class="vertical-middle"><p>Komunitas Tari FISIP UI<br>Radha Sarisha</p></div>
				</a>
			</div>
			<div id="header-menu-shadow" class="vertical-bottom">
			<?php
				$args = array(
					'theme_location' => 'primary'
				);
				wp_nav_menu( $args );
			?>
			</div>
			<a id="dropdown-button-shadow">
				<div class="dropdown-rectangle-shadow"></div>
				<div class="dropdown-rectangle-shadow"></div>
				<div class="dropdown-rectangle-shadow"></div>
			</a>
	</div>
	<div id="header-navigation-container">
		<div id="header-navigation-holder">
			<div id="header-navigation">
				<div id="logo">
					<a href="<?php bloginfo( 'url' ); ?>"><img id="logo-image" class="vertical-middle" src="<?php if (get_theme_mod( 'header_logo' )) : echo get_theme_mod( 'header_logo'); else: echo get_template_directory_uri().'/images/HalfShotbw.jpg'; endif; ?>" />
						<div id="logo-text" class="vertical-middle"><p>Komunitas Tari FISIP UI<br>Radha Sarisha</p></div>
					</a>
				</div>
				<div id="header-menu" class="vertical-bottom">
				<?php
					$args = array(
						'theme_location' => 'primary'
					);
					wp_nav_menu( $args );
				?>
				</div>
				<a id="dropdown-button">
					<div class="dropdown-rectangle"></div>
					<div class="dropdown-rectangle"></div>
					<div class="dropdown-rectangle"></div>
				</a>
			</div>
		</div>
	</div>