<?php
/*
	Template Name: base-template;
*/
?>

<?php get_header(); ?>


	<!-- Section #1 -->

	<?php $section_1_image = get_theme_mod('section_1_image'); ?>
	<?php $section_1_heading = get_theme_mod('section_1_heading'); ?>
	<?php $section_1_description = get_theme_mod('section_1_description'); ?>
	<?php $section_1_app_store_link = get_theme_mod('section_1_app_store_link'); ?>
	<?php $section_1_google_play_link = get_theme_mod('section_1_google_play_link'); ?>

	<section class="section_1 section clearfix">
		<div class="constrain_me clearfix">
			<div class="section_1_left_side left_section">
				<h3><?php echo $section_1_heading; ?></h3>
				<hr />
				<p><?php echo $section_1_description; ?></p>
				<div class="left-menu">
					<a href="<?php echo $section_1_app_store_link; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/app-store.png" />
					</a>
				</div>
				<div class="right-menu">
					<a href="<?php echo $section_1_google_play_link; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/google-play.png" />
					</a>
				</div>
			</div>
			<div class="section_1_right_side">
				<img class="product_image" src="<?php echo $section_1_image; ?>" />
			</div>
		</div>
	</section>


	<!-- Section #3 -->

	<?php $section_2_image = get_theme_mod('section_2_image'); ?>
	<?php $section_2_heading = get_theme_mod('section_2_heading'); ?>
	<?php $section_2_description = get_theme_mod('section_2_description'); ?>

	<section class="section_2 section clearfix">
		<div class="constrain_me clearfix">
			<div class="section_2_left_side left_section">
				<h3><?php echo $section_2_heading; ?></h3>
				<hr />
				<p><?php echo $section_2_description; ?></p>
			</div>
			<div class="section_2_right_side">
				<img class="product_image" src="<?php echo $section_2_image; ?>" />
			</div>
		</div>
	</section>


	<!-- Section #3 -->

	<?php $section_3_image = get_theme_mod('section_3_image'); ?>
	<?php $section_3_heading = get_theme_mod('section_3_heading'); ?>
	<?php $section_3_description = get_theme_mod('section_3_description'); ?>

	<section class="section_3 section clearfix">
		<div class="constrain_me clearfix">
			<div class="section_3_left_side">
				<h3><?php echo $section_3_heading; ?></h3>
				<hr />
				<p><?php echo $section_3_description; ?></p>
			</div>
			<div class="section_3_right_side">
				<img src="<?php echo $section_3_image; ?>" />
			</div>
		</div>
	</section>

		<!-- Section #4 -->

	<?php $section_4_image = get_theme_mod('section_4_image'); ?>
	<?php $section_4_video_url = get_theme_mod('section_4_video_url'); ?>


	<section class="section_4 section clearfix">
		<div class="constrain_me clearfix">
			<a rel="wp-video-lightbox" href="<?php echo $section_4_video_url; ?>" >
				<img src="<?php echo $section_4_image; ?>" />
			</a>
		</div>
	</section>

	<!-- Colour Section -->

	<?php $colour_section_heading = get_theme_mod('colour_section_heading'); ?>
	<?php $colour_section_description = get_theme_mod('colour_section_description'); ?>

	<section class="colour_section_container section clearfix">
		<div class="colour_section">
			<div class="constrain_me clearfix">
				<div class="colour_section_left_side left_section">
					<h3><?php echo $colour_section_heading; ?></h3>
					<hr />
					<p><?php echo $colour_section_description; ?></p>
				</div>
				<div class="buy-now">
					<div class="left-menu">
						<a href="<?php echo $section_1_app_store_link; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/app-store.png" />
						</a>
					</div>
					<div class="right-menu">
						<a href="<?php echo $section_1_google_play_link; ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/google-play.png" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact Section -->

	<?php $contact_section_heading = get_theme_mod('contact_section_heading'); ?>
	<?php $contact_section_description = get_theme_mod('contact_section_description'); ?>

	<section class="contact_form">
		<div class="constrain_me clearfix">
			<div class="contact_section_left_side">
				<h3><?php echo $contact_section_heading; ?></h3>
				<hr />
				<p><?php echo $contact_section_description; ?></p>
			</div>
			<div class="contact_section_right_side">
				<?php echo do_shortcode( '[contact-form-7 id="4" title="Contact form 1"]' ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>