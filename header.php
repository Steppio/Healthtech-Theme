<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css?v18">

		<?php $seo_keywords = get_theme_mod('seo_keywords'); ?>
		<?php $seo_description = get_theme_mod('seo_description'); ?>

		<meta name="keywords" content="<?php echo $seo_keywords; ?>" />
		<meta name="description" content="<?php echo $seo_description; ?>" />

		<?php wp_head(); ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

	</head>
<body <?php body_class(); ?>>

	<?php $nova_theme_header_options = get_option('nova_header_settings'); ?>
	<?php $nova_header_mobile_padding = get_option('nova_header_mobile_padding'); ?>

	<?php
		/**
		* 
		* header bg 				: nova_header_colour
		* header anchor colour 		: nova_header_menu_colour
		* header anchor hover 		: nova_header_menu_hover_colour
		* header mob padding 		: nova_header_mobile_padding
		* header tab padding 		: nova_header_tablet_padding
		* header desk padding 		: nova_header_desktop_padding
		*
		*/

	?>

	<style>
		@media (min-width: 0px) and (max-width: 767px) {
			#menu {
				background: <?php echo $nova_theme_header_options['nova_header_mobile_menu_background_colour']; ?>;
			}
		}
		@media (min-width: 0px) {
			#menu li a {
				color: <?php echo $nova_theme_header_options['nova_header_mobile_menu_text_colour'] ?>;
			}			
			.nova_global_header_container {
			    padding: <?php echo $nova_theme_header_options['nova_header_mobile_padding'] ?>;
			    background: <?php echo $nova_theme_header_options['nova_header_colour']; ?>;
			}
		}
		@media (min-width: 768px) {
			#menu li a {
				color: <?php echo $nova_theme_header_options['nova_header_menu_colour'] ?>;
			}
			#menu li a:hover {
				color: <?php echo $nova_theme_header_options['nova_header_menu_hover_colour'] ?>;
			}
			.nova_global_header_container {
			    padding: <?php echo $nova_theme_header_options['nova_header_tablet_padding'] ?>;
			}
		}
		@media (min-width: 1024px) {
			.nova_global_header_container {
			    padding: <?php echo $nova_theme_header_options['nova_header_desktop_padding'] ?>;
			}
		}
	</style>

	<div class="nova_global_header_container clearfix">

		<header class="nova_global_header nova-mobile-stack">

			<div>

				<a title="Go to homepage" class="nova_logo" href="<?php echo get_site_url(); ?>">
					<img class="acorn-site-logo mobile-show" src="<?php echo $nova_theme_header_options['nova_mobile_logo']; ?>" />
					<img class="acorn-site-logo mobile-hide" src="<?php echo $nova_theme_header_options['nova_logo']; ?>" />
				</a>
				<nav id="menu" role="navigation">
					<a class="replacement_logo" href="<?php echo get_site_url(); ?>">
						<img class="acorn-site-logo" src="<?php echo $nova_theme_header_options['nova_replacement_logo']; ?>" alt="Mobile Menu" />
					</a>					
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					<a class="close-button tablet-hide" href="#">
						<img class="acorn-close-button" src="<?php echo $nova_theme_header_options['nova_close_icon_upload']; ?>" alt="Mobile Menu" />
					</a>
				</nav>
				<div class="burger-menu">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>

		</header>

	</div>