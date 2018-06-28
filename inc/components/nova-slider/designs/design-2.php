<?php 
$sliderbg = get_post_meta( get_the_ID(),'nova_slider_background', true ); 
$slidertext = get_post_meta( get_the_ID(),'nova_slider_read_more_text', true);
?>
<div class="slick-image-slide design-2-slide" <?php echo $slider_height_css ; ?> style="background: <?php echo $sliderbg; ?>">

	<div class="constrain_me">

		<div class="slider-top">
			
			<div class="title">
				<h2><?php the_title(); ?></h2>
				<span class="sub-heading"><?php esc_html_e( $slidertext, 'wp-slick-slider-and-image-carousel' ); ?></span>
			</div>

		</div>

		<div class="slider-left">

				<img src="<?php echo $slider_img; ?>" alt="<?php the_title(); ?>" />

		</div>

		<div class="slider-right">

			<div class="content">
				<p><?php the_content(); ?></p>
			</div>

		</div>

	</div>

</div>