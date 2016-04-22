<?php
	if(is_singular()){
		if(get_post_type()=='post'){
			echo '<h1>'.get_the_title().'</h1>';
			echo '<h3>'.get_the_time('F j, Y g:i a').'</h3>';
		}
		the_content();
	}else{
		echo '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail();
		echo '<h1>'.get_the_title().'</h1>';
		echo '<h3>'.get_the_time('F j, Y g:i a').'</h3>';
		echo wpautop(preg_replace('/<(.+?)[\s]*\/?[\s]*>/si','', get_the_excerpt(null, ''))).'</a>';
		echo '<div><a class="yellow-flat-button" href="'.get_the_permalink().'">READ MORE</a></div>';
		//echo '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().wpautop(preg_replace('/<iframe.*?\/iframe>/i','', get_the_excerpt(null, ''))).'</a>';
	}
?>