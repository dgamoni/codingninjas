<?php
if ( ! function_exists( 'bgt_cat_movies_tax' ) ) {

// Register Custom Taxonomy
function bgt_cat_movies_tax() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Categories', 'test-codingninjas-child' ),
		'singular_name'              => _x( 'Categories', 'Categories', 'test-codingninjas-child' ),
		'menu_name'                  => __( 'Categories', 'test-codingninjas-child' ),
		'all_items'                  => __( 'All Items', 'test-codingninjas-child' ),
		'parent_item'                => __( 'Parent Item', 'test-codingninjas-child' ),
		'parent_item_colon'          => __( 'Parent Item:', 'test-codingninjas-child' ),
		'new_item_name'              => __( 'New Item Name', 'test-codingninjas-child' ),
		'add_new_item'               => __( 'Add New Item', 'test-codingninjas-child' ),
		'edit_item'                  => __( 'Edit Item', 'test-codingninjas-child' ),
		'update_item'                => __( 'Update Item', 'test-codingninjas-child' ),
		'view_item'                  => __( 'View Item', 'test-codingninjas-child' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'test-codingninjas-child' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'test-codingninjas-child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'test-codingninjas-child' ),
		'popular_items'              => __( 'Popular Items', 'test-codingninjas-child' ),
		'search_items'               => __( 'Search Items', 'test-codingninjas-child' ),
		'not_found'                  => __( 'Not Found', 'test-codingninjas-child' ),
		'no_terms'                   => __( 'No items', 'test-codingninjas-child' ),
		'items_list'                 => __( 'Items list', 'test-codingninjas-child' ),
		'items_list_navigation'      => __( 'Items list navigation', 'test-codingninjas-child' ),
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
	register_taxonomy( 'cat_movies', array( 'movies' ), $args );

}
add_action( 'init', 'bgt_cat_movies_tax', 0 );

}