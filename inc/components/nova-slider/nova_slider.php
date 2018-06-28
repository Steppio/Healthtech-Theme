<?php
/*
Plugin Name: Nova Slider
Plugin URI: https://www.wearenova.co.uk/
Description: A component of the Nova Healthcare Framework
Version: 1.0
Author: We Are Nova
Author URI: https://www.wearenova.co.uk/
Text Domain: nova-slider
*/

if( !defined('NOVA_SLIDER_VERSION') ){
    define( 'NOVA_SLIDER_VERSION', '1' );
}
if( !defined( 'NOVA_SLIDER_VERSION_DIR' ) ) {
    define( 'NOVA_SLIDER_VERSION_DIR', dirname( __FILE__ ) );
}
if( !defined( 'NOVA_SLIDER_URL' ) ) {
    define( 'NOVA_SLIDER_URL', plugin_dir_url( __FILE__ ) );
}
if( !defined( 'NOVA_SLIDER_POST_TYPE' ) ) {
    define( 'NOVA_SLIDER_POST_TYPE', 'nova_slider' );
}

// IMPORTS
require_once( NOVA_SLIDER_VERSION_DIR . '/includes/functions.php' );
require_once( NOVA_SLIDER_VERSION_DIR . '/includes/class-nova-slick-slider.php' );
require_once( NOVA_SLIDER_VERSION_DIR . '/post_type/nova-slider-custom-post.php' );
require_once( NOVA_SLIDER_VERSION_DIR . '/shortcodes/nova-slider.php' );
// require_once( NOVA_SLIDER_VERSION_DIR . '/admin/class-nova-admin.php' );