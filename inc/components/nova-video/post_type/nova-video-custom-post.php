<?php

define('MAX_UPLOAD_SIZE', 200000);
define('TYPE_WHITELIST', serialize(array(
  'image/jpeg',
  'image/png',
  'image/gif'
  )));

add_action('init', 'nova_video_init');
function nova_video_init() {
    $nova_video_labels = array(
    'name'                 => _x('Nova Video', 'nova-addons'),
    'singular_name'        => _x('nova Video', 'nova-addons'),
    'add_new'              => _x('Add Video', 'nova-addons'),
    'add_new_item'         => __('Add New video', 'nova-addons'),
    'edit_item'            => __('Edit Nova Video', 'nova-addons'),
    'new_item'             => __('New Nova Video', 'nova-addons'),
    'view_item'            => __('View Nova Video', 'nova-addons'),
    'search_items'         => __('Search Nova Video', 'nova-addons'),
    'not_found'            =>  __('No Nova Video Items found', 'nova-addons'),
    'not_found_in_trash'   => __('No Nova Video Items found in Trash', 'nova-addons'), 
    '_builtin'             =>  false, 
    'parent_item_colon'    => '',  
	'menu_name'            => _x( 'Nova Video', 'admin menu', 'nova-addons' )
  );

  $nova_video_args = array(
    'labels'                => $nova_video_labels,
    'public'                => false,    
    'show_ui'               => true,
    'show_in_menu'          => true, 
    'query_var'             => false,
    'rewrite'               => false,
    'capability_type'       => 'post',
    'has_archive'           => false,
    'hierarchical'          => false, 
	'exclude_from_search'   => true,	
    'menu_icon'             => 'dashicons-video-alt3',
    'supports'              => array('title','thumbnail')
  );

  register_post_type('nova_video',$nova_video_args);

}
add_action( 'init', 'nova_video_taxonomy');
function nova_video_taxonomy() {
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
        'menu_name'         => __( 'Video Category', 'nova-addons' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'nova_video-category' ),
    );

    register_taxonomy( 'nova_video-category', array( 'nova_video' ), $args );
}


/* NOVA VIDEO URL */
function nova_video_youtube_url() {
        add_meta_box('nova_video_youtube_url_metabox',__( 'Youtube Video ID', 'nova_video' ),'nova_video_youtube_url_cb','nova_video');
}
add_action( 'add_meta_boxes', 'nova_video_youtube_url' );

function nova_video_youtube_url_cb( $post ) {
    wp_nonce_field( 'nova_video_youtube_save_data', 'nova_video_youtube_url_nonce' );
    $value = get_post_meta( $post->ID, 'nova_video_youtube_url', true );
    echo '<input type="text" id="nova_video_youtube_url" name="nova_video_youtube_url" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo 'eg. JnMmbBhPfGE';
}

function nova_video_youtube_save_data( $post_id ) {
    if ( ! isset( $_POST['nova_video_youtube_url_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['nova_video_youtube_url_nonce'], 'nova_video_youtube_save_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_video' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['nova_video_youtube_url'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['nova_video_youtube_url'] );
    update_post_meta( $post_id, 'nova_video_youtube_url', $link_data );
}
add_action( 'save_post', 'nova_video_youtube_save_data' );



/* NOVA VIDEO WIDTH */
function nova_video_width() {
        add_meta_box('nova_video_width_metabox',__( 'Video Width', 'nova_video' ),'nova_video_width_cb','nova_video');
}
add_action( 'add_meta_boxes', 'nova_video_width' );

function nova_video_width_cb( $post ) {
    wp_nonce_field( 'nova_video_width_save_data', 'nova_video_width_nonce' );
    $value = get_post_meta( $post->ID, 'nova_video_width', true );
    echo '<input type="text" id="nova_video_width" name="nova_video_width" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo '500px';
}

function nova_video_width_save_data( $post_id ) {
    if ( ! isset( $_POST['nova_video_width_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['nova_video_width_nonce'], 'nova_video_width_save_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_video' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['nova_video_width'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['nova_video_width'] );
    update_post_meta( $post_id, 'nova_video_width', $link_data );
}
add_action( 'save_post', 'nova_video_width_save_data' );




/* NOVA VIDEO HEIGHT */
function nova_video_height() {
        add_meta_box(
            'nova_video_height_metabox',
            __( 'Video Height', 'nova_video' ),
            'nova_video_height_cb',
            'nova_video');
}
add_action( 'add_meta_boxes', 'nova_video_height' );

function nova_video_height_cb( $post ) {
    wp_nonce_field( 'nova_video_height_save_data', 'nova_video_height_nonce' );
    $value = get_post_meta( $post->ID, 'nova_video_height', true );
    echo '<input type="text" id="nova_video_height" name="nova_video_height" value="' . esc_attr( $value ) . '" size="25" /><br />';
    echo '300px';
}

function nova_video_height_save_data( $post_id ) {
    if ( ! isset( $_POST['nova_video_height_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['nova_video_height_nonce'], 'nova_video_height_save_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'nova_video' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['nova_video_height'] ) ) {
        return;
    }
    $link_data = sanitize_text_field( $_POST['nova_video_height'] );
    update_post_meta( $post_id, 'nova_video_height', $link_data );
}
add_action( 'save_post', 'nova_video_height_save_data' );





/* NOVA VIDEO ICON */
function nova_video_play_symbol() {
        add_meta_box('nova_video_play_symbol_metabox',
            __( 'Video Play Symbol', 'nova_video' ),
            'nova_video_play_symbol_cb',
            'nova_video');
}
add_action( 'add_meta_boxes', 'nova_video_play_symbol' );

function nova_video_play_symbol_cb( $post ) {

    wp_nonce_field( 
        __FILE__, 
        'nova_video_play_symbol_nonce' 
    );
    $html = '<input id="nova_video_play_symbol_metabox" type="file" name="nova_video_play_symbol_metabox" value="" size="60" />';
    
    $html .= '<p class="description">';
    if( '' == get_post_meta( $post->ID, 'nova_file', true ) ) {
        $html .= __( 'You have no file attached to this post.', 'nova_video' );
    } else {
        $html .= get_post_meta( $post->ID, 'nova_file', true );
    } // end if
    $html .= '</p><!-- /.description -->';
    
    echo $html;

}

function nova_video_play_symbol_save_data( $post_id ) {

    // var_dump(user_can_save( $post_id, 'nova_video_play_symbol_nonce' ));

    // First, make sure the user can save the post
    if( user_can_save( $post_id, 'nova_video_play_symbol_nonce' ) ) { 

        // var_dump( $_FILES );

        // If the user uploaded an image, let's upload it to the server
        if( ! empty( $_FILES ) && isset( $_FILES['nova_video_play_symbol_metabox'] ) ) {

            

            // Upload the goal image to the uploads directory, resize the image, then upload the resized version
            $goal_image_file = wp_upload_bits( 
                $_FILES['nova_video_play_symbol_metabox']['name'], 
                null, 
                wp_remote_get( $_FILES['nova_video_play_symbol_metabox']['tmp_name'] 
            ) );

            // var_dump( $goal_image_file );

            // Set post meta about this image. Need the comment ID and need the path.
            if( false == $goal_image_file['error'] ) {
            
                // Since we've already added the key for this, we'll just update it with the file.
                update_post_meta( $post_id, 'nova_file', $goal_image_file['url'] );
    
            } // end if/else

        } // end if

    } // end if

}
add_action( 'save_post', 'nova_video_play_symbol_save_data' );

add_action('post_edit_form_tag', 'add_post_enctype');

function add_post_enctype() {
    echo ' enctype="multipart/form-data"';
}

function user_can_save( $post_id, $nonce ) {
    // var_dump($nonce);

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ $nonce ] ) && wp_verify_nonce( 
            $_POST[ $nonce ], 
            __FILE__ ) 
        );
    
    // Return true if the user is able to save; otherwise, false.
    return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
 
} // end user_can_save