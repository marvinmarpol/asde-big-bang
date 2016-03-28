<?php get_header(); ?>
	<div id="main-content">
		
			<?php
				while(have_posts()) : the_post(); ?>
				<div class="row">
					<div class="col-6">
						<?php get_template_part('content'); ?>
					</div>
					<div class="col-6">
						<?php get_template_part('content'); ?>
					</div>
					<div class="col-6">
						<?php get_template_part('content'); ?>
					</div>
					<div class="col-6">
						<?php get_template_part('content'); ?>
					</div>
				</div>
			<?php endwhile; ?>
	</div>
<?php get_footer(); ?>