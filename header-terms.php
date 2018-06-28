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

	<div class="fullscreen_container clearfix" style="background-color: #000; background-image: url('<?php echo $section_1_image; ?>')">

		<div class="fullscreenheader">

			<?php $main_image = get_theme_mod('header_image'); ?>
			<?php $mobile_main_image = get_theme_mod('mobile_header_image'); ?>

			<nav class="">
				<a href="<?php echo get_site_url(); ?>">
					<img class="acorn-site-logo mobile-hide" src="<?php echo $main_image; ?>" />
				</a>
				<nav id="menu" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</nav>			
			</nav>

			<nav class="mobile-show">
				<a href="<?php echo get_site_url(); ?>">
					<img class="acorn-site-logo" src="<?php echo $mobile_main_image; ?>" alt="Lumii Logo" />
				</a>
			</nav>
		</div>

	</div>
