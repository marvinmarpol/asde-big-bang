		<?php wp_footer(); ?>
		<div id="footer-navigation">
			<?php
				$args = array(
					'theme_location' => 'footer'
				);
				wp_nav_menu( $args );
			?>
		</div>	
	</body>

</html>