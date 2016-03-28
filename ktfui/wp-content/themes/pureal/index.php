<?php get_header(); ?>
	<div class="row">
		<?php
			while(have_posts()) : the_post(); ?>
				<?php get_template_part('content'); ?>
		<?php endwhile; ?>
	</div>
	<div class="row">
		<?php
			while(have_posts()) : the_post(); ?>
				<?php get_template_part('content'); ?>
		<?php endwhile; ?>
	</div>
<?php get_footer(); ?>