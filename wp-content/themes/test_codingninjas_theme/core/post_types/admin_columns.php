<?php

add_filter( 'manage_edit-movies_columns', 'add_movies_columns' );
add_action( 'manage_movies_posts_custom_column', 'manage_movies_columns', 10, 2 );
add_filter( "manage_edit-movies_sortable_columns", "movies_sortable_columns" );

function add_movies_columns( $columns ) {

	return array_merge(
		$columns,
		array(
			'price' => _x( 'Price', 'test-codingninjas-child' ),
		));
}


function manage_movies_columns( $column_name, $id ) {

	switch ( $column_name ) {
		case 'id':
			echo $id;
			break;

		case 'price':
				echo get_post_meta( $id, 'mov_price', true );
			break;

		default:
			break;
	} // end switch
}

// Make these columns sortable
function movies_sortable_columns($columns) {
	return array_merge(
		$columns,
		array(
			'price' => _x( 'Price', 'test-codingninjas-child' ),
		));	
}