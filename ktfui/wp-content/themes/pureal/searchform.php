<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
	<button type="submit" class="search-submit submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentysixteen' ); ?></span></button>
</form>