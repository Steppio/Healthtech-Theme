<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css?v27">

		<?php $seo_keywords = get_theme_mod('seo_keywords'); ?>
		<?php $seo_description = get_theme_mod('seo_description'); ?>

		<meta name="keywords" content="<?php echo $seo_keywords; ?>" />
		<meta name="description" content="<?php echo $seo_description; ?>" />

		<?php wp_head(); ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

	</head>
<body <?php body_class(); ?>>

	<div class="top_parallax">
		<header class="clearfix">
			<div class="constrain_me">
				
				<?php
				if (has_site_icon()) {
					$var = get_site_icon_url( $size = 512, $url = '', $blog_id = 0 );
				}
				else {
					// User didn't set a Site Icon, do something else. But still awesome.
				}
				?>

				<?php $main_image = get_theme_mod('header_image'); ?>
				<?php $mobile_main_image = get_theme_mod('mobile_header_image'); ?>
				<?php $header_title = get_the_title(); ?>
				<?php $section_next_steps_description = get_theme_mod('section_next_steps_subheading'); ?>

				<nav class="mobile-hide">
					<img class="acorn-site-logo" src="<?php echo $main_image; ?>" />
					<nav id="menu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					</nav>			
				</nav>

				<nav class="mobile-show">
					<img class="acorn-site-logo" src="<?php echo $mobile_main_image; ?>" alt="Lumii Logo" />
				</nav>

				<div class="section_detail">
					<h1><?php echo $header_title; ?></h1>
					<h2><?php echo $section_next_steps_description; ?></h2>
				</div>


			</div>
		</header>
	</div>