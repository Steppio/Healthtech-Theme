<?php
/*
	Template Name: Terms & Conditions
*/
?>

<?php get_header('terms'); ?>


	<!-- Section #1 -->

	<div class="constrain_me">

		<!-- Section #2 -->

		<section class="section_2 section clearfix">
<?php 
	if (have_posts()) {
  while (have_posts()) {
    the_post();
    the_content(); 
  }
} ?>
		</section>

	</div>

<?php get_footer(); ?>