<?php

// Register Custom Post Type
function register_event_cpt() {

	$labels = array(
		'name'                  => _x( 'Event', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Events', 'govnet' ),
		'name_admin_bar'        => __( 'Events', 'govnet' ),
		'archives'              => __( 'Event Archives', 'govnet' ),
		'attributes'            => __( 'Event Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Event:', 'govnet' ),
		'all_items'             => __( 'All Events', 'govnet' ),
		'add_new_item'          => __( 'Add New Event', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Event', 'govnet' ),
		'edit_item'             => __( 'Edit Event', 'govnet' ),
		'update_item'           => __( 'Update Event', 'govnet' ),
		'view_item'             => __( 'View Event', 'govnet' ),
		'view_items'            => __( 'View Events', 'govnet' ),
		'search_items'          => __( 'Search Event', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'govnet' ),
		'description'           => __( 'Events', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'location' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'register_event_cpt', 0 );

// Register Custom Post Type
function register_team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Team', 'govnet' ),
		'name_admin_bar'        => __( 'Team', 'govnet' ),
		'archives'              => __( 'Team Member Archives', 'govnet' ),
		'attributes'            => __( 'Team Member Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'govnet' ),
		'all_items'             => __( 'All Team Members', 'govnet' ),
		'add_new_item'          => __( 'Add New Team Member', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Team Member', 'govnet' ),
		'edit_item'             => __( 'Edit Team Member', 'govnet' ),
		'update_item'           => __( 'Update Team Member', 'govnet' ),
		'view_item'             => __( 'View Team Member', 'govnet' ),
		'view_items'            => __( 'View Team Members', 'govnet' ),
		'search_items'          => __( 'Search Team Member', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'govnet' ),
		'description'           => __( 'Team Members', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'division' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team-member', $args );

}
add_action( 'init', 'register_team_cpt', 0 );

// Register Custom Post Type
function register_faq_cpt() {

	$labels = array(
		'name'                  => _x( 'Questions', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Question', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'FAQ', 'govnet' ),
		'name_admin_bar'        => __( 'FAQ', 'govnet' ),
		'archives'              => __( 'Question Archives', 'govnet' ),
		'attributes'            => __( 'Question Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Question:', 'govnet' ),
		'all_items'             => __( 'All Questions', 'govnet' ),
		'add_new_item'          => __( 'Add New Question', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Question', 'govnet' ),
		'edit_item'             => __( 'Edit Question', 'govnet' ),
		'update_item'           => __( 'Update Question', 'govnet' ),
		'view_item'             => __( 'View Question', 'govnet' ),
		'view_items'            => __( 'View Questions', 'govnet' ),
		'search_items'          => __( 'Search Question', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Question', 'govnet' ),
		'description'           => __( 'FAQ - Questions & Answers', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'faq-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'question', $args );

}
add_action( 'init', 'register_faq_cpt', 0 );

// Register Custom Taxonomy
function register_faq_categories() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Question Categories', 'govnet' ),
		'all_items'                  => __( 'All Categories', 'govnet' ),
		'parent_item'                => __( 'Parent Category', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Category:', 'govnet' ),
		'new_item_name'              => __( 'New Category Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Category', 'govnet' ),
		'edit_item'                  => __( 'Edit Category', 'govnet' ),
		'update_item'                => __( 'Update Category', 'govnet' ),
		'view_item'                  => __( 'View Category', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Categories', 'govnet' ),
		'search_items'               => __( 'Search Categories', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No Categories', 'govnet' ),
		'items_list'                 => __( 'Category list', 'govnet' ),
		'items_list_navigation'      => __( 'Category list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'faq-category', array( 'question' ), $args );

}
add_action( 'init', 'register_faq_categories', 0 );




// Register Custom Post Type
function register_vacancy_cpt() {

	$labels = array(
		'name'                  => _x( 'Vacancies', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Vacancy', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Vacancies', 'govnet' ),
		'name_admin_bar'        => __( 'Vacancies', 'govnet' ),
		'archives'              => __( 'Vacancy Archives', 'govnet' ),
		'attributes'            => __( 'Vacancy Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Vacancy:', 'govnet' ),
		'all_items'             => __( 'All Vacancies', 'govnet' ),
		'add_new_item'          => __( 'Add New Vacancy', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Vacancy', 'govnet' ),
		'edit_item'             => __( 'Edit Vacancy', 'govnet' ),
		'update_item'           => __( 'Update Vacancy', 'govnet' ),
		'view_item'             => __( 'View Vacancy', 'govnet' ),
		'view_items'            => __( 'View Vacancies', 'govnet' ),
		'search_items'          => __( 'Search Vacancy', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Vacancy', 'govnet' ),
		'description'           => __( 'GovNet Internal Vacancies', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'location','division' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'vacancy', $args );

}
add_action( 'init', 'register_vacancy_cpt', 0 );

// Register Custom Taxonomy
function register_vacancy_locations() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Locations', 'govnet' ),
		'all_items'                  => __( 'All Locations', 'govnet' ),
		'parent_item'                => __( 'Parent Locations', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Location:', 'govnet' ),
		'new_item_name'              => __( 'New Location Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Location', 'govnet' ),
		'edit_item'                  => __( 'Edit Location', 'govnet' ),
		'update_item'                => __( 'Update Location', 'govnet' ),
		'view_item'                  => __( 'View Location', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Categories', 'govnet' ),
		'search_items'               => __( 'Search Categories', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No Categories', 'govnet' ),
		'items_list'                 => __( 'Category list', 'govnet' ),
		'items_list_navigation'      => __( 'Category list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'location', array( 'vacancy','team-member','event' ), $args );

}
add_action( 'init', 'register_vacancy_locations', 0 );


// Register Custom Taxonomy
function register_vacancy_divisions() {

	$labels = array(
		'name'                       => _x( 'Divisions', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Division', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Divisions', 'govnet' ),
		'all_items'                  => __( 'All Divisions', 'govnet' ),
		'parent_item'                => __( 'Parent Divisions', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Division:', 'govnet' ),
		'new_item_name'              => __( 'New Division Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Division', 'govnet' ),
		'edit_item'                  => __( 'Edit Division', 'govnet' ),
		'update_item'                => __( 'Update Division', 'govnet' ),
		'view_item'                  => __( 'View Division', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Categories', 'govnet' ),
		'search_items'               => __( 'Search Categories', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No Categories', 'govnet' ),
		'items_list'                 => __( 'Category list', 'govnet' ),
		'items_list_navigation'      => __( 'Category list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'division', array( 'vacancy','team-member' ), $args );

}
add_action( 'init', 'register_vacancy_divisions', 0 );


// Register Custom Post Type
function register_offices_cpt() {

	$labels = array(
		'name'                  => _x( 'Offices', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Office', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Offices', 'govnet' ),
		'name_admin_bar'        => __( 'Offices', 'govnet' ),
		'archives'              => __( 'Office Archives', 'govnet' ),
		'attributes'            => __( 'Office Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Office:', 'govnet' ),
		'all_items'             => __( 'All Offices', 'govnet' ),
		'add_new_item'          => __( 'Add New Office', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Office', 'govnet' ),
		'edit_item'             => __( 'Edit Office', 'govnet' ),
		'update_item'           => __( 'Update Office', 'govnet' ),
		'view_item'             => __( 'View Office', 'govnet' ),
		'view_items'            => __( 'View Offices', 'govnet' ),
		'search_items'          => __( 'Search Office', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Office', 'govnet' ),
		'description'           => __( 'GovNet office locations', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'office', $args );

}
add_action( 'init', 'register_offices_cpt', 0 );


// Register Custom Post Type
function register_guides_cpt() {

	$labels = array(
		'name'                  => _x( 'Guides', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Guides', 'govnet' ),
		'name_admin_bar'        => __( 'Guides', 'govnet' ),
		'archives'              => __( 'Guide Archives', 'govnet' ),
		'attributes'            => __( 'Guide Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Guide:', 'govnet' ),
		'all_items'             => __( 'All Guides', 'govnet' ),
		'add_new_item'          => __( 'Add New Guide', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Guide', 'govnet' ),
		'edit_item'             => __( 'Edit Guide', 'govnet' ),
		'update_item'           => __( 'Update Guide', 'govnet' ),
		'view_item'             => __( 'View Guide', 'govnet' ),
		'view_items'            => __( 'View Guides', 'govnet' ),
		'search_items'          => __( 'Search Guide', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Guide', 'govnet' ),
		'description'           => __( 'Guides', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'guide', $args );

}
add_action( 'init', 'register_guides_cpt', 0 );

// Register Custom Taxonomy
function register_guide_cat() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Category', 'govnet' ),
		'all_items'                  => __( 'All Categories', 'govnet' ),
		'parent_item'                => __( 'Parent Category', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Category:', 'govnet' ),
		'new_item_name'              => __( 'New Category Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Category', 'govnet' ),
		'edit_item'                  => __( 'Edit Category', 'govnet' ),
		'update_item'                => __( 'Update Category', 'govnet' ),
		'view_item'                  => __( 'View Category', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Items', 'govnet' ),
		'search_items'               => __( 'Search Items', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No items', 'govnet' ),
		'items_list'                 => __( 'Items list', 'govnet' ),
		'items_list_navigation'      => __( 'Items list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'guide-category', array( 'guide' ), $args );

}
add_action( 'init', 'register_guide_cat', 0 );




// Register Custom Post Type
function register_documents_cpt() {

	$labels = array(
		'name'                  => _x( 'Documents', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Documents', 'govnet' ),
		'name_admin_bar'        => __( 'Documents', 'govnet' ),
		'archives'              => __( 'Document Archives', 'govnet' ),
		'attributes'            => __( 'Document Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Document:', 'govnet' ),
		'all_items'             => __( 'All Documents', 'govnet' ),
		'add_new_item'          => __( 'Add New Document', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Document', 'govnet' ),
		'edit_item'             => __( 'Edit Document', 'govnet' ),
		'update_item'           => __( 'Update Document', 'govnet' ),
		'view_item'             => __( 'View Document', 'govnet' ),
		'view_items'            => __( 'View Documents', 'govnet' ),
		'search_items'          => __( 'Search Document', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Document', 'govnet' ),
		'description'           => __( 'Document downloads', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'document', $args );

}
add_action( 'init', 'register_documents_cpt', 0 );

// Register Custom Taxonomy
function register_document_categories() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Category', 'govnet' ),
		'all_items'                  => __( 'All Categories', 'govnet' ),
		'parent_item'                => __( 'Parent Category', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Category:', 'govnet' ),
		'new_item_name'              => __( 'New Category Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Category', 'govnet' ),
		'edit_item'                  => __( 'Edit Category', 'govnet' ),
		'update_item'                => __( 'Update Category', 'govnet' ),
		'view_item'                  => __( 'View Category', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Items', 'govnet' ),
		'search_items'               => __( 'Search Items', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No items', 'govnet' ),
		'items_list'                 => __( 'Items list', 'govnet' ),
		'items_list_navigation'      => __( 'Items list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'document-category', array( 'document' ), $args );

}
add_action( 'init', 'register_document_categories', 0 );



// Register Custom Post Type
function register_useful_links() {

	$labels = array(
		'name'                  => _x( 'Useful Links', 'Post Type General Name', 'govnet' ),
		'singular_name'         => _x( 'Useful Link', 'Post Type Singular Name', 'govnet' ),
		'menu_name'             => __( 'Useful Links', 'govnet' ),
		'name_admin_bar'        => __( 'Useful Links', 'govnet' ),
		'archives'              => __( 'Useful Links Archives', 'govnet' ),
		'attributes'            => __( 'Useful Link Attributes', 'govnet' ),
		'parent_item_colon'     => __( 'Parent Useful Link:', 'govnet' ),
		'all_items'             => __( 'All Useful Links', 'govnet' ),
		'add_new_item'          => __( 'Add New Useful Link', 'govnet' ),
		'add_new'               => __( 'Add New', 'govnet' ),
		'new_item'              => __( 'New Useful Link', 'govnet' ),
		'edit_item'             => __( 'Edit Useful Link', 'govnet' ),
		'update_item'           => __( 'Update Useful Link', 'govnet' ),
		'view_item'             => __( 'View Useful Link', 'govnet' ),
		'view_items'            => __( 'View Useful Links', 'govnet' ),
		'search_items'          => __( 'Search Useful Link', 'govnet' ),
		'not_found'             => __( 'Not found', 'govnet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'govnet' ),
		'featured_image'        => __( 'Featured Image', 'govnet' ),
		'set_featured_image'    => __( 'Set featured image', 'govnet' ),
		'remove_featured_image' => __( 'Remove featured image', 'govnet' ),
		'use_featured_image'    => __( 'Use as featured image', 'govnet' ),
		'insert_into_item'      => __( 'Insert into item', 'govnet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'govnet' ),
		'items_list'            => __( 'Items list', 'govnet' ),
		'items_list_navigation' => __( 'Items list navigation', 'govnet' ),
		'filter_items_list'     => __( 'Filter items list', 'govnet' ),
	);
	$args = array(
		'label'                 => __( 'Useful Link', 'govnet' ),
		'description'           => __( 'Useful Links', 'govnet' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-links',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'useful-link', $args );

}
add_action( 'init', 'register_useful_links', 0 );


// Register Custom Taxonomy
function register_link_categories() {

	$labels = array(
		'name'                       => _x( 'Link Categories', 'Taxonomy General Name', 'govnet' ),
		'singular_name'              => _x( 'Link Category', 'Taxonomy Singular Name', 'govnet' ),
		'menu_name'                  => __( 'Link Category', 'govnet' ),
		'all_items'                  => __( 'All Link Categories', 'govnet' ),
		'parent_item'                => __( 'Parent Link Category', 'govnet' ),
		'parent_item_colon'          => __( 'Parent Link Category:', 'govnet' ),
		'new_item_name'              => __( 'New Link Category Name', 'govnet' ),
		'add_new_item'               => __( 'Add New Link Category', 'govnet' ),
		'edit_item'                  => __( 'Edit Link Category', 'govnet' ),
		'update_item'                => __( 'Update Link Category', 'govnet' ),
		'view_item'                  => __( 'View Link Category', 'govnet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'govnet' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'govnet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'govnet' ),
		'popular_items'              => __( 'Popular Items', 'govnet' ),
		'search_items'               => __( 'Search Items', 'govnet' ),
		'not_found'                  => __( 'Not Found', 'govnet' ),
		'no_terms'                   => __( 'No items', 'govnet' ),
		'items_list'                 => __( 'Items list', 'govnet' ),
		'items_list_navigation'      => __( 'Items list navigation', 'govnet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'link-category', array( 'useful-link' ), $args );

}
add_action( 'init', 'register_link_categories', 0 );
?>