<div class="site-search">
	<div class="row">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<div class="search-form-container">
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'govnet' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'govnet' ) ?>" />
				<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Go', 'govnet' ) ?>" />
			</div>
		</form>
	</div>
</div>