		<div id="footer-navigation">
			<?php
				$args = array(
					'theme_location' => 'footer'
				);
				wp_nav_menu( $args );
			?>
			<div id="social">
				<a href="#"><img src="<?php echo get_template_directory_uri().'/images/instagram.png'; ?>" /></a>
				<a href="#"><img src="<?php echo get_template_directory_uri().'/images/youtube.png'; ?>" /></a>
				<a href="#"><img src="<?php echo get_template_directory_uri().'/images/twitter.png'; ?>" /></a>
				<a href="#"><img src="<?php echo get_template_directory_uri().'/images/facebook.png'; ?>" /></a>
			</div>
			<p>Copyright &copy; KTF UI <?php echo date('Y'); ?></p>
		</div>
		<?php wp_footer(); ?>
	</body>

</html>