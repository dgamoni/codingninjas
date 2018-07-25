<?php

function bgt_custom_setup_fields() {
    $fields = array(
        array(
            'key' => 'user_skype',
            'label' =>  _x( 'Skype', 'test-codingninjas-child' ),
            'placeholder' => _x( 'Skype', 'test-codingninjas-child' ),
            'error' => _x( 'Do not forget Skype', 'test-codingninjas-child' ),
            //'required'	=> true
        ),
    );
   
   
    return $fields;
}




/**
 * Add custom fields to user / checkout
 */
add_action( 'woocommerce_after_order_notes', 'bgt_custom_checkout_field' );
 
function bgt_custom_checkout_field( $checkout ) {
    $fields = bgt_custom_setup_fields();
 
 
    if ( ! empty( $fields ) ) {
       
        foreach ($fields as $field) {
            woocommerce_form_field(
                $field['key'],
                array(
                    'type'          => 'text',
                    'class'         => array('bgt_custom_checkout_field form-row-wide'),
                    'label'         => __($field['label']),
                    'placeholder'   => __($field['placeholder']),
                ),
                get_user_meta( get_current_user_id(), $field['key'] , true  )
            );
        }

    }
}


/**
 * Verification
 */
add_action('woocommerce_checkout_process', 'bgt_custom_checkout_field_process');
 
function bgt_custom_checkout_field_process() {
    $fields = bgt_custom_setup_fields();
   
    if ( ! empty( $fields ) ) {
        foreach($fields as $field) {
            $key = $field['key'];
               
            if ( ! $_POST[$key] ) {
                wc_add_notice( __( $field['error'] ), 'error' );
            }
        }
    }
}

/*
 * Update field
 */
add_action( 'woocommerce_checkout_update_order_meta', 'bgt_custom_checkout_field_update_order_meta' );
 
function bgt_custom_checkout_field_update_order_meta( $order_id ) {
    $fields = bgt_custom_setup_fields();
   
    if ( ! empty( $fields ) ) {
        foreach($fields as $field) {
            $key = $field['key'];
           
            if ( ! empty( $_POST[$key] ) ) {
                update_user_meta( get_current_user_id(), $key, sanitize_text_field( $_POST[$key], '' ));
            }
        }
    }
}

// add to profile

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _x("Extra profile information", 'test-codingninjas-child'); ?></h3>

    <table class="form-table">
	    <tr>
	        <th><label for="user_skype"><?php _e( 'Skype', 'test-codingninjas-child' ); ?></label></th>
	        <td>
	            <input type="text" name="user_skype" id="user_skype" value="<?php echo esc_attr( get_user_meta( $user->ID, 'user_skype', true ) ); ?>" class="regular-text" /><br />
	            <span class="description"><?php _e("Please enter your skype."); ?></span>
	        </td>
	    </tr>

    </table>
<?php }


// save
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
add_action( 'woocommerce_save_account_details', 'save_extra_user_profile_fields', 12, 1 );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
}

/**
 * Add custom fields to register
 */
add_action( 'woocommerce_register_form', 'bgt_extra_register_fields' );
function bgt_extra_register_fields() {
    ?>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="user_skype"><?php esc_html_e( 'Skype', 'test-codingninjas-child' ); ?></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="user_skype" id="user_skype" autocomplete="user_skype" value="<?php echo ( ! empty( $_POST['user_skype'] ) ) ? esc_attr( wp_unslash( $_POST['user_skype'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        </p>
    <?php
}

// validate
//add_action( 'woocommerce_register_post', 'bgt_validate_extra_register_fields', 10, 3 );
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
       if ( isset( $_POST['user_skype'] ) && empty( $_POST['user_skype'] ) ) {
              $validation_errors->add( 'user_skype_error', __( '<strong>Error</strong>: Skype is required!.', 'test-codingninjas-child' ) );
       }
    return $validation_errors;
}

// save
add_action('woocommerce_created_customer', 'bgt_save_extra_register_fields', 10 , 3);
function bgt_save_extra_register_fields( $customer_id, $new_customer_data, $password_generated) {
   if ( isset( $_POST['user_skype'] ) ) {
        update_user_meta( $customer_id, 'user_skype', sanitize_text_field($_POST['user_skype'])  );
    }
}