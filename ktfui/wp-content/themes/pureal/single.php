<?php get_header(); ?>
	<div id="main-content">
		<div id="post-content">
			<div class="row-container">
				<div class="single-container rounded-5">
					<?php
						while(have_posts()) : the_post(); get_template_part('content', get_post_format()); ?>
					<?php endwhile; ?>
				</div>
			</div>
		<div id="main-content">
	</div>
<?php get_footer(); ?>