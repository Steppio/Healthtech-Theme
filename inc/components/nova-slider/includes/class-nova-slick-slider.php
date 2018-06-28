<?php 

/**
 * Nova Slider Script Class
 * 
 * @package Nova Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Nova_Slider_Script {

	function __construct() {

		// Action to add style to front end
		add_action( 'wp_enqueue_scripts', array($this, 'nova_slider_front_style') );

		// Action to add script to front end
		add_action( 'wp_enqueue_scripts', array($this, 'nova_slider_front_script') );

	}

	/**
	 * Enqueue our front end styles 
	 * 
	 * @package Nova Slider
	 * @since 1.0.0
	 */
	function nova_slider_front_style() {

		if( !wp_style_is( 'nova-slick-style', 'registered' ) ) {
			wp_register_style( 'nova-slick-style', get_template_directory_uri() .'/inc/components/nova-slider/frontend/css/slick.css', array(), NOVA_SLIDER_VERSION );
			wp_enqueue_style( 'nova-slick-style' );
		}

		wp_register_style( 'nova-public-style', get_template_directory_uri() .'/inc/components/nova-slider/frontend/css/nova-slider-style.css', array(), NOVA_SLIDER_VERSION );
		wp_enqueue_style( 'nova-public-style' );		

	}

	/**
	 * Enqueue our front end scripts
	 * 
	 * @package Nova Slider
	 * @since 1.0.0
	 */

	function nova_slider_front_script() {

		// Registring slick slider script
		if( !wp_script_is( 'nova-slider-slick-jquery', 'registered' ) ) {
			wp_register_script( 'nova-slider-slick-jquery', get_template_directory_uri() .'/inc/components/nova-slider/frontend/javascript/slick.min.js', array('jquery'), NOVA_SLIDER_VERSION, true );
		}

		wp_register_script( 'nova-slider-public-script', get_template_directory_uri() .'/inc/components/nova-slider/frontend/javascript/nova-public.js', array('jquery'), NOVA_SLIDER_VERSION, true );
		wp_localize_script( 'nova-slider-public-script', 'Nova', array(
			'is_mobile' => (wp_is_mobile()) ? 1 : 0,
			'is_rtl' 	=> (is_rtl()) 		? 1 : 0,
			));
	}


}

$nova_script = new Nova_Slider_Script();