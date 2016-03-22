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
			<span id="logo" class="vertical-middle"><a href="<?php bloginfo( 'url' ); ?>">LOGO</a></span>
			<?php
				$args = array(
					'theme_location' => 'primary'
				);
				wp_nav_menu( $args );
			?>
		</div>