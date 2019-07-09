<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    	
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
	
	if(is_page('blog')) {
	wp_enqueue_script( 'my-infinite-scroll', get_template_directory_uri() . '/assets/js/re_loadmore.js', array('jquery') );
	}
	
    // Register main stylesheet
	
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/scss/custom.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
	
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);


/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
	if( is_page('blog') ) { ?>
	<script>
	jQuery(document).ready(function() {
		var infinite_scroll = {
			loading: {
				img: "<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif",
				msgText: "<?php _e( '', 'custom' ); ?>",
				finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
			},
			"nextSelector":".loadmorenav .nav-previous a",
			"navSelector":".loadmorenav",
			"itemSelector":".loadpost",
			"contentSelector":"#postloadwrapper"
		};
		jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
	});	
	</script>
	<?php
	}
}
add_action( 'wp_footer', 'custom_infinite_scroll_js',100 );