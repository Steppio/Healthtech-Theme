<?php

add_action('init', 'nova_slider_init');
function nova_slider_init() {
    $nova_slider_labels = array(
    'name'                 => _x('Nova Slider', 'nova-addons'),
    'singular_name'        => _x('nova slider', 'nova-addons'),
    'add_new'              => _x('Add Slide', 'nova-addons'),
    'add_new_item'         => __('Add New slide', 'nova-addons'),
    'edit_item'            => __('Edit Nova Slider', 'nova-addons'),
    'new_item'             => __('New Nova Slider', 'nova-addons'),
    'view_item'            => __('View Nova Slider', 'nova-addons'),
    'search_items'         => __('Search Nova Slider', 'nova-addons'),
    'not_found'            =>  __('No Nova Slider Items found', 'nova-addons'),
    'not_found_in_trash'   => __('No Nova Slider Items found in Trash', 'nova-addons'), 
    '_builtin'             =>  false, 
    'parent_item_colon'    => '',  
	'menu_name'            => _x( 'Nova Slider', 'admin menu', 'nova-addons' )
  );

  $nova_slider_args = array(
    'labels'                => $nova_slider_labels,
    'public'                => false,    
    'show_ui'               => true,
    'show_in_menu'          => true, 
    'query_var'             => false,
    'rewrite'               => false,
    'capability_type'       => 'post',
    'has_archive'           => false,
    'hierarchical'          => false, 
	'exclude_from_search'   => true,	
    'menu_icon'             => 'dashicons-slides',
    'supports'              => array('title','editor','thumbnail')
  );

  register_post_type('nova_slider',$nova_slider_args);

}
add_action( 'init', 'nova_slider_taxonomy');
function nova_slider_taxonomy() {
    $labels = array(
        'name'              => _x( 'Category', 'nova-addons' ),
        'singular_name'     => _x( 'Category', 'nova-addons' ),
        'search_items'      => __( 'Search Category', 'nova-addons' ),
        'all_items'         => __( 'All Category', 'nova-addons' ),
        'parent_item'       => __( 'Parent Category', 'nova-addons' ),
        'parent_item_colon' => __( 'Parent Category' , 'nova-addons' ),
        'edit_item'         => __( 'Edit Category', 'nova-addons' ),
        'update_item'       => __( 'Update Category', 'nova-addons' ),
        'add_new_item'      => __( 'Add New Category', 'nova-addons' ),
        'new_item_name'     => __( 'New Category Name', 'nova-addons' ),
        'menu_name'         => __( 'Slider Category', 'nova-addons' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'nova_slider-category' ),
    );

    register_taxonomy( 'nova_slider-category', array( 'nova_slider' ), $args );
}


/* Custom meta box for slider link */
function wpsisac_add_meta_box() {
        add_meta_box('custom-metabox',__( 'Read More Link', 'wp-slick-slider-and-image-carousel' ),'wpsisac_box_callback','nova_slider');
}
add_action( 'add_meta_boxes', 'wpsisac_add_meta_box' );
function wpsisac_box_callback( $post ) {
    wp_nonce_field( 'wpsisac_save_meta_box_data', 'wpsisac_meta_box_nonce' );
    $value = get_post_meta( $post->ID, 'wpsisac_slide_link', true );
    echo '<input type="url" id="wpsisac_slide_link" name="wpsisac_slide_link" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo 'eg. http://www.google.com';
}
function wpsisac_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['wpsisac_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['wpsisac_meta_box_nonce'], 'wpsisac_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_slider' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['wpsisac_slide_link'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['wpsisac_slide_link'] );
    update_post_meta( $post_id, 'wpsisac_slide_link', $link_data );
}
add_action( 'save_post', 'wpsisac_save_meta_box_data' );


/* Custom meta box for slider text */
function nova_slider_read_more_text_metabox() {
        add_meta_box(
            'nova_slider_read_more_text',
            __( 'Read More Text', 'nova-slider' ),
            'nova_slider_read_more_text_cb',
            'nova_slider');
}
add_action( 'add_meta_boxes', 'nova_slider_read_more_text_metabox' );

function nova_slider_read_more_text_cb( $post ) {
    wp_nonce_field( 
        'nova_slider_read_more_text_save', 
        'nova_slider_read_more_text_nonce' );
    $value = get_post_meta( $post->ID, 'nova_slider_read_more_text', true );
    echo '<input type="text" id="nova_slider_read_more_text" name="nova_slider_read_more_text" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo 'eg. Find Out More';
}
function nova_slider_read_more_text_save( $post_id ) {
    if ( ! isset( $_POST['nova_slider_read_more_text_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( 
        $_POST['nova_slider_read_more_text_nonce'], 
        'nova_slider_read_more_text_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_slider' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['nova_slider_read_more_text'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['nova_slider_read_more_text'] );
    update_post_meta( $post_id, 'nova_slider_read_more_text', $link_data );
}
add_action( 'save_post', 'nova_slider_read_more_text_save' );


/* Custom meta box for slider bg */
function nova_slider_background_metabox() {
        add_meta_box('nova_slider_background',__( 'Background Colour', 'nova-slider' ),'nova_slider_background_cb','nova_slider');
}
add_action( 'add_meta_boxes', 'nova_slider_background_metabox' );

function nova_slider_background_cb( $post ) {
    wp_nonce_field( 
        'nova_slider_background_metabox_save', 
        'nova_slider_background_metabox_nonce' );
    $value = get_post_meta( $post->ID, 'nova_slider_background', true );
    echo '<input type="text" id="nova_slider_background" name="nova_slider_background" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo 'eg. #000000';
}
function nova_slider_background_metabox_save( $post_id ) {
    if ( ! isset( $_POST['nova_slider_background_metabox_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['nova_slider_background_metabox_nonce'], 'nova_slider_background_metabox_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_slider' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['nova_slider_background'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['nova_slider_background'] );
    update_post_meta( $post_id, 'nova_slider_background', $link_data );
}
add_action( 'save_post', 'nova_slider_background_metabox_save' );
