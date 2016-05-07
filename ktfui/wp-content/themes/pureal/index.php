<?php get_header(); ?>
	<div id="main-content">
		<div id="post-content">
			<div class="row-container">
					<?php
						while(have_posts()) : the_post();?>
							<div class="post-container">
								<?php get_template_part('content', get_post_format()); ?>
							</div>
					<?php endwhile; ?>
			</div>
			<div id="loadmore" data-url="<?php echo admin_url('admin-ajax.php')?>" data-page="1"><img src="<?php echo get_template_directory_uri().'/images/load.gif'; ?>" /></div>
		</div>
	</div>
<?php get_footer(); ?>