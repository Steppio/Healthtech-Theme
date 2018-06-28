<?php
/*
	Template Name: base-template
*/
?>

<?php get_header(); ?>

		<!-- Section #2 -->

		<?php $section_2_heading = get_theme_mod('section_2_heading'); ?>
		<?php $section_2_description = get_theme_mod('section_2_description'); ?>

		<section class="section_2 section clearfix">
			<div class="constrain_me">
				<h1><?php echo $section_2_heading; ?></h1>

				<?php 

				$args = array(
					'post_type' => 'city_benefits',
					'order' => 'ASC'
				); 

				$the_query = new WP_Query($args); 

				?>

				<?php if( have_posts() ) : while($the_query->have_posts()) : $the_query->the_post() ;?>

				<?php $title = get_the_title() ?>
				<?php $content = get_the_content() ?>


					<div class="testimonial">
						<h3 class="title"><?php echo $title; ?></h3>
						<hr />
						<p class="content"><?php echo $content; ?></p>
					</div>

				<?php endwhile; else: ?>
				<?php endif; ?>
			</div>
		</section>

		<!-- Section #3 -->

	<?php $section_3_heading = get_theme_mod('section_3_heading'); ?>
	<?php $section_3_description = get_theme_mod('section_3_description'); ?>
	<?php $section_3_button_link = get_theme_mod('section_3_button_link'); ?>
	<?php $section_3_button_text = get_theme_mod('section_3_button_text'); ?>

	<section class="section_3_container clearfix">
		<div class="section_3 section">
			<div class="constrain_me">
				<h1><?php echo $section_3_heading; ?></h1>
				<p><?php echo $section_3_description; ?></p>
				<a class="future_button" href="<?php echo $section_3_button_link; ?>"><?php echo $section_3_button_text; ?></a>
			</div>
		</div>
	</section>


	<?php $section_4_image = get_theme_mod('section_4_image'); ?>

	<section class="section_4 section clearfix" style="background-image: url('<?php echo $section_4_image; ?>')">
		&nbsp;
	</section>

	<?php $section_5_title = get_theme_mod('section_5_title'); ?>
	<?php $section_5_description = get_theme_mod('section_5_description'); ?>
	<?php $section_5_deadline = get_theme_mod('section_5_deadline'); ?>

	<div class="section_5_container">
		<div class="section_5 section">
			<div class="constrain_me">
				<h1><?php echo $section_5_title; ?></h1>
				<p><?php echo $section_5_description; ?></p>
				<p class="orange"><?php echo $section_5_deadline; ?></p>
			</div>
		</div>
	</div>

	<!-- Contact Section -->

	<?php $contact_section_heading = get_theme_mod('contact_section_heading'); ?>
	<?php $contact_section_description = get_theme_mod('contact_section_description'); ?>

	<section class="contact_form signup">
		<div class="constrain_me clearfix">
			<div class="contact_section_left_side">
				<h1><?php echo $contact_section_heading; ?></h1>
			</div>
			<div class="contact_section_right_side">
				<?php echo do_shortcode( '[contact-form-7 id="222" title="Secure Your Place Today!"]' ); ?>
			</div>
		</div>
	</section>


	<?php $section_6_heading = get_theme_mod('section_6_heading'); ?>
	<?php $section_6_description = get_theme_mod('section_6_description'); ?>
	<?php $section_6_button_link = get_theme_mod('section_6_button_link'); ?>
	<?php $section_6_button_text = get_theme_mod('section_6_button_text'); ?>

	<section class="section_6_container clearfix">
		<div class="section_6 section">
			<div class="constrain_me">
				<div class="section_2">
					<h1><?php echo $section_6_heading; ?></h1>
					<p><?php echo $section_6_description; ?></p>

						<?php $section_next_steps_heading = get_theme_mod('section_next_steps_heading'); ?>
						<?php $section_next_steps_description = get_theme_mod('section_next_steps_description'); ?>

						<h1 class="how-to-prepare" style="margin-bottom: 25px;"><?php echo $section_next_steps_heading; ?></h1>
						<h3 class="how-to-prepare-h3"><?php echo $section_next_steps_description; ?></h3>



						<?php 

						$args = array(
							'post_type' => 'how_to_prepare',
							'order' => 'ASC'
						); 

						$the_query = new WP_Query($args); 

						?>

						<?php if( have_posts() ) : while($the_query->have_posts()) : $the_query->the_post() ;?>

						<?php $title = get_the_title() ?>
						<?php $content = get_the_content() ?>


							<div class="testimonial">
								<h3 class="title"><?php echo $title; ?></h3>
								<hr />
								<p class="content"><?php echo $content; ?></p>
							</div>

						<?php endwhile; else: ?>
						<?php endif; ?>

						<a href="#" class="future_button">Join the Programme</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>