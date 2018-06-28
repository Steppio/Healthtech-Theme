<?php 

/**
 * Function to get plugin image sizes array
 * 
 * @package WP Slick Slider and Image Carousel
 * @since 1.2.2
 */
function nova_get_unique() {
  static $unique = 0;
  $unique++;

  return $unique;
}

/**
 * Function to get featured image
 * 
 * @package 
 * @since 
 */
function nova_get_featured_image(
	$post_id = '', 
	$image_size = 'full' ) {

	$image_size = !empty($image_size) ? $image_size : 'full';

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $image_size );

	if( !empty($image) ) {
		$image = isset($image[0]) ? $image[0] : '';
	}

	return $image;

}

/**
 * Function to retrieve our shortcodes
 * 
 * @package Nova Slider
 * @since 1.0.0
 */
function nova_get_slider_designs() {

	$design_arr = array(
		'design-1' => __('Design 1', 'nova-slider'),
		'design-2' => __('Design 2', 'nova-slider'),
		'design-3' => __('Design 3', 'nova-slider'),
		'design-4' => __('Design 4', 'nova-slider'),
		'design-5' => __('Design 5', 'nova-slider'),
		'design-6' => __('Design 6', 'nova-slider'),		
	);

	return apply_filters( 'nova_get_slider_designs', $design_arr );

}