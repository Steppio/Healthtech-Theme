<?php $sliderbg = get_post_meta( get_the_ID(),'nova_slider_background', true ); 
$slidertext = get_post_meta( get_the_ID(),'nova_slider_read_more_text', true);?>
<div class="slick-image-slide design-1-slide" <?php echo $slider_height_css ; ?> style="background: <?php echo $sliderbg; ?>">

	<div class="slidermargins">
		<div class="constrain_me">

			<div class="slider-left">

				<div class="title">
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="content">
					<p><?php the_content(); ?></p>
				</div>

				<div class="readmore">
					<a href="<?php echo $sliderurl; ?>" class="slider-readmore"><?php esc_html_e( $slidertext, 'wp-slick-slider-and-image-carousel' ); ?>
					</a>
				</div>


			</div>

			<div class="slider-right">

				<?php $sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );
					if($sliderurl != '') { ?>
					<img src="<?php echo $slider_img; ?>" alt="<?php the_title(); ?>" />
				<?php } ?>	

			</div>

		</div>
	</div>

</div>