<?php
	
// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
		
	
	// GET RID OF WORDPRESS IMAGE SIZES

	add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
	// Remove default image sizes here. 
	function prefix_remove_default_images( $sizes ) {
	 //unset( $sizes['small']); // 150px
	 unset( $sizes['medium']); // 300px
	 unset( $sizes['large']); // 1024px
	 unset( $sizes['medium_large']); // 768px
	 return $sizes;
	}

	// Disable WordPRess responsive srcset images
	//add_filter('max_srcset_image_width', create_function('', 'return 1;'));
	
	add_image_size( 'news-update-wide', 800, 415, true ); 
	add_image_size( 'news-update-standard', 800, 500, true ); 
	
	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 
	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );	
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );