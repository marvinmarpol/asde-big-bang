<?php get_header(); ?>
	<div class="row">
		<?php
			while(have_posts()) : the_post(); ?>
				<div class="col-4"><?php get_template_part('content'); ?></div>
				<div class="col-4"><?php //get_template_part('content'); echo 'ij oiji oj iojio joi '; ?></div>
		<?php endwhile; ?>
	</div>
<?php get_footer(); ?>