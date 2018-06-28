<?php 
function get_nova_video( $atts, $content = null ){          

    extract(shortcode_atts(array(
	    "video_id"    		=> '',
	    "category"			=> '',
		"width" 			=> '640',
		"height" 			=> '480',
		"anchor" 			=> ''
	), $atts));	
	
	$cat 				= (!empty($category)) 				? explode(',', $category) 		: '';	

	// // Shortcode file
	// $design_file_path 	= NOVA_SLIDER_VERSION_DIR . '/designs/' . $design . '.php';
	// $design_file 		= (file_exists($design_file_path)) ? $design_file_path : '';
	
	
	// // Enqueus required script
	// wp_enqueue_script( 'nova-slider-slick-jquery' );
	// wp_enqueue_script( 'nova-slider-public-script' );
	
	// // Slider configuration
	// $slider_conf = compact('dots', 'arrows', 'autoplay', 'autoplay_interval', 'fade','speed', 'rtl');
	
	ob_start();	
	
	global $post;
	$unique 		= nova_get_unique();
	$post_type 		= 'nova_video';
	$orderby 		= 'post_date';
	$order 			= 'DESC';		

    $args = array ( 
        'post_type'      => $post_type, 
        'orderby'        => $orderby, 
        'order'          => $order,       
        );
	if($cat != ""){
    	$args['tax_query'] = array( 
    						array( 	'taxonomy' 	=> 'nova_video-category', 
    								'field' 	=> 'id', 
    								'terms' 	=> $cat) );
    }
    $query = new WP_Query($args);
    $post_count = $query->post_count;         
    if ( $query->have_posts() ) :
	?>
	<div class="nova_video-container clearfix">
		<div id="nova_video-<?php echo $unique; ?>" class="nova_video">

			<?php while ( $query->have_posts() ) : $query->the_post();	
			$videourl = get_post_meta( get_the_ID(),'nova_video_youtube_url', true );	
			$videoplaybtn = get_post_meta( get_the_ID(),'nova_file', true );	
			$video_img 	= nova_get_featured_image( $post->ID, 'full', true );
			$videowidth = get_post_meta( get_the_ID(),'nova_video_width', true ); ?>

				<div class="nova-video-inner-container" style="max-width: <?php echo $videowidth; ?>">
					<div class="play-button"><img src="<?php echo site_url() ?>/wp-content/uploads/2018/06/play-10.png" /></div>

					<?php echo do_shortcode('[video_lightbox_youtube video_id="' . $videourl . '" width="640" height="480" anchor="' . $video_img . '"]'); ?>
					<?php endwhile; ?>
				</div>
		</div>	
	</div>
	<?php
    endif; 
    wp_reset_query();
	return ob_get_clean();
}
add_shortcode('nova-video','get_nova_video');