<?php get_header(); ?>
	<div id="main-content">
		<?php
			while(have_posts()) : the_post(); get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>
	</div>
<?php get_footer(); ?>