<?php
/*
	Template Name: Next Steps
*/
?>

<?php get_header('steps'); ?>


	<!-- Section #1 -->

	<?php $section_next_steps_image = get_theme_mod('section_next_steps_image'); ?>

	<section class="section_1 section clearfix" style="background-image: url('<?php echo $section_next_steps_image; ?>')">
		&nbsp;
	</section>

	<div class="constrain_me">

		<!-- Section #2 -->

		<?php $section_next_steps_heading = get_theme_mod('section_next_steps_heading'); ?>
		<?php $section_next_steps_description = get_theme_mod('section_next_steps_description'); ?>

		<section class="section_2 section clearfix">
			<h1 style="margin-bottom: 25px;"><?php echo $section_next_steps_heading; ?></h1>
			<p><?php echo $section_next_steps_description; ?></p>

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
		</section>

	</div>

<?php get_footer(); ?>