<?php
/*
Plugin Name: Nova Video
Plugin URI: https://www.wearenova.co.uk/
Description: A component of the Nova Healthcare Framework
Version: 1.0
Author: We Are Nova
Author URI: https://www.wearenova.co.uk/
Text Domain: nova-video
*/

if( !defined('NOVA_VIDEO_VERSION') ){
    define( 'NOVA_VIDEO_VERSION', '1' );
}
if( !defined( 'NOVA_VIDEO_VERSION_DIR' ) ) {
    define( 'NOVA_VIDEO_VERSION_DIR', dirname( __FILE__ ) );
}
if( !defined( 'NOVA_VIDEO_URL' ) ) {
    define( 'NOVA_VIDEO_URL', plugin_dir_url( __FILE__ ) );
}
if( !defined( 'NOVA_VIDEO_POST_TYPE' ) ) {
    define( 'NOVA_VIDEO_POST_TYPE', 'nova_video' );
}

// IMPORTS
require_once( NOVA_VIDEO_VERSION_DIR . '/includes/functions.php' );
require_once( NOVA_VIDEO_VERSION_DIR . '/post_type/nova-video-custom-post.php' );
require_once( NOVA_VIDEO_VERSION_DIR . '/shortcodes/nova-video.php' );