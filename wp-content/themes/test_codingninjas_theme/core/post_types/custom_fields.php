<?php
// snippet from https://wp-kama.ru/function/add_meta_box

//init
add_action('add_meta_boxes', 'bgt_add_custom_box');
function bgt_add_custom_box(){
	$screens = array( 'movies' );
	add_meta_box( 'bgt_movies_box', 'Additional settings', 'bgt_movies_meta_box_callback', $screens );
}

// HTML 
function bgt_movies_meta_box_callback( $post, $meta ){
	$screens = $meta['args'];

	// nonce
	wp_nonce_field(basename(__FILE__), "bgt_movies_meta_box-nonce");
	$featured = get_post_meta($post->ID, 'mov_favorites', 1);
	// fileds
	echo '<p style="display: flex; justify-content: space-around;">';
		echo '<label for="mov_subheading" style="width: 20%;" >' . __("Subheading: ", 'test-codingninjas-child' ) . '</label> ';
		echo '<input type="text" id="mov_subheading" name="mov_subheading" value="' . get_post_meta($post->ID, 'mov_subheading', 1) . '" size="30" style="width:80%;" />';
	echo '</p><p style="display: flex; justify-content: space-around;">';
		echo '<label for="mov_price" style="width: 20%;" >' . __("Price: ", 'test-codingninjas-child' ) . '</label> ';
		echo '<input type="text" id="mov_price" name="mov_price" value="' . get_post_meta($post->ID, 'mov_price', 1) . '" size="10" style="width:80%;" />';
	echo '</p><p style="display: flex; ">';
		echo '<label for="mov_favorites" style="width: 20%;" >' . __("Favorites: ", 'test-codingninjas-child' ) . '</label> ';
		echo '<input type="checkbox" id="mov_favorites" name="mov_favorites" value="1" '. checked( 1, $featured, false) .' style="" />';
	echo '</p>';	
}

// save
add_action( 'save_post', 'bgt_save_postdata' );
function bgt_save_postdata( $post_id ) {

	if ( ! isset( $_POST['mov_price'] ) || ! isset( $_POST['mov_subheading'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['bgt_movies_meta_box-nonce'], basename(__FILE__) ) )
		return;


	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return;


	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	if(isset($_POST['mov_price'])){
		$mov_price = sanitize_text_field( $_POST['mov_price'] );
		update_post_meta( $post_id, 'mov_price', $mov_price );
	}

	if(isset($_POST['mov_subheading'])){
		$mov_subheading = sanitize_text_field( $_POST['mov_subheading'] );
		update_post_meta( $post_id, 'mov_subheading', $mov_subheading );
	}

	if( isset($_POST['mov_favorites'])){
		update_post_meta( $post_id, 'mov_favorites', $_POST['mov_favorites'] );
	} else {
        delete_post_meta( $post_id, 'mov_favorites' );
	}

}