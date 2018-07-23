<?php
//redirect to checkout
add_filter('add_to_cart_redirect', 'bgt_add_to_cart_redirect');
function bgt_add_to_cart_redirect() {
	 global $woocommerce;
	 $bgt_add_to_cart_redirect = $woocommerce->cart->get_checkout_url();
	 return $bgt_add_to_cart_redirect;
}

// After registration, logout the user and redirect to home page
function custom_registration_redirect() {
    //wp_logout();
    return home_url('/favorites');
}
add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);