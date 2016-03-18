		<div id="footer-navigation">
			<?php
				$args = array(
					'theme_location' => 'footer'
				);
				wp_nav_menu( $args );
			?>
		</div>
		<?php wp_footer(); ?>
	</body>

</html>