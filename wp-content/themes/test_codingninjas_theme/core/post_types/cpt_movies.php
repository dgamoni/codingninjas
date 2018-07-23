<?php

if ( ! function_exists('bgt_cpt_movies') ) {

// Register Custom Post Type
function bgt_cpt_movies() {

	$labels = array(
		'name'                  => _x( 'Movies', 'Movies', 'test-codingninjas-child' ),
		'singular_name'         => _x( 'Movies', 'Movies', 'test-codingninjas-child' ),
		'menu_name'             => __( 'Movies', 'test-codingninjas-child' ),
		'name_admin_bar'        => __( 'Movies', 'test-codingninjas-child' ),
		'archives'              => __( 'Item Archives', 'test-codingninjas-child' ),
		'attributes'            => __( 'Item Attributes', 'test-codingninjas-child' ),
		'parent_item_colon'     => __( 'Parent Item:', 'test-codingninjas-child' ),
		'all_items'             => __( 'All Items', 'test-codingninjas-child' ),
		'add_new_item'          => __( 'Add New Item', 'test-codingninjas-child' ),
		'add_new'               => __( 'Add New', 'test-codingninjas-child' ),
		'new_item'              => __( 'New Item', 'test-codingninjas-child' ),
		'edit_item'             => __( 'Edit Item', 'test-codingninjas-child' ),
		'update_item'           => __( 'Update Item', 'test-codingninjas-child' ),
		'view_item'             => __( 'View Item', 'test-codingninjas-child' ),
		'view_items'            => __( 'View Items', 'test-codingninjas-child' ),
		'search_items'          => __( 'Search Item', 'test-codingninjas-child' ),
		'not_found'             => __( 'Not found', 'test-codingninjas-child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'test-codingninjas-child' ),
		'featured_image'        => __( 'Featured Image', 'test-codingninjas-child' ),
		'set_featured_image'    => __( 'Set featured image', 'test-codingninjas-child' ),
		'remove_featured_image' => __( 'Remove featured image', 'test-codingninjas-child' ),
		'use_featured_image'    => __( 'Use as featured image', 'test-codingninjas-child' ),
		'insert_into_item'      => __( 'Insert into item', 'test-codingninjas-child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'test-codingninjas-child' ),
		'items_list'            => __( 'Items list', 'test-codingninjas-child' ),
		'items_list_navigation' => __( 'Items list navigation', 'test-codingninjas-child' ),
		'filter_items_list'     => __( 'Filter items list', 'test-codingninjas-child' ),
	);
	$args = array(
		'label'                 => __( 'Movies', 'test-codingninjas-child' ),
		'description'           => __( 'Movies', 'test-codingninjas-child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'cat_movies' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   			=> 'dashicons-video-alt2',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'movies', $args );

}
add_action( 'init', 'bgt_cpt_movies', 0 );

}