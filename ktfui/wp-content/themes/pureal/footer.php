		<div id="footer-navigation">
			<?php
				$args = array(
					'theme_location' => 'footer'
				);
				wp_nav_menu( $args );
			?>
			<p>Copyright &copy; <?php echo date('Y'); ?> KTFUI - Universitas Indonesia</p>
		</div>
		<?php wp_footer(); ?>
	</body>

</html>