<?php

	if( have_posts() ) :
		get_header();
		/*while( have_posts() ) :
			the_post();
			the_title();
			the_content();
		endwhile;*/
		get_footer();
?>

<?php
	else:
		echo '<p>No Content Found</p>';
	endif;
?>