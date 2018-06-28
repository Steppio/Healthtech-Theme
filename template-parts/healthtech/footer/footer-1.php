	<?php
		/**
		* 
		* nova_footer_background_colour
		* nova_footer_text_colour
		* nova_footer_logo
		* nova_footer_mobile_padding
		* nova_footer_tablet_padding
		* nova_footer_desktop_padding
		* nova_footer_show_cofounded_with_nova (?)
		* nova_footer_show_terms_and_conditions_setting (?)
		* nova_footer_show_privacy_statement_setting (?)
		*
		*/

	$nova_theme_footer_options = get_option('nova_footer_settings');
	$nova_theme_social_options = get_option('nova_social_settings');
	?>

	<style>
		@media (min-width: 0px) and (max-width: 767px) {

		}
		@media (min-width: 0px) {
			footer {
				background: <?php echo $nova_theme_footer_options['nova_footer_background_colour'] ?>;
			}
			footer a, footer p {
				color: <?php echo $nova_theme_footer_options['nova_footer_text_colour'] ?> !important;
			}
			footer {
				padding: <?php echo $nova_theme_footer_options['nova_footer_mobile_padding'] ?>;
			}
		}
		@media (min-width: 768px) {
			footer {
				padding: <?php echo $nova_theme_footer_options['nova_footer_tablet_padding'] ?>;
			}
		}
		@media (min-width: 1024px) {
			footer {
				padding: <?php echo $nova_theme_footer_options['nova_footer_desktop_padding'] ?>;
			}
		}
	</style>

	<footer class="clearfix">

		<div class="footer">		
			<div class="constrain_me clearfix">
				<div class="social-icons">
					<?php if($nova_theme_social_options['nova_social_twitter_url'] != null) { ?>
						<a target="_blank" href="<?php echo $nova_theme_social_options['nova_social_twitter_url']; ?>">
							<i class="fa fa-twitter">&nbsp;</i>
						</a>
					<?php } ?> 
					<?php if($nova_theme_social_options['nova_social_facebook_url'] != null) { ?>
						<a target="_blank" href="<?php echo $nova_theme_social_options['nova_social_facebook_url']; ?>">
							<i class="fa fa-facebook">&nbsp;</i>
						</a>
					<?php } ?> 
					<?php if($nova_theme_social_options['nova_social_instagram_url'] != null) { ?>
						<a target="_blank" href="<?php echo $nova_theme_social_options['nova_social_instagram_url']; ?>">
							<i class="fa fa-instagram">&nbsp;</i>
						</a>
					<?php } ?> 
					<?php if($nova_theme_social_options['nova_social_linkedin_url'] != null) { ?>
						<a target="_blank" href="<?php echo $nova_theme_social_options['nova_social_linkedin_url']; ?>">
							<i class="fa fa-linkedin">&nbsp;</i>
						</a>
					<?php } ?>
				</div>					
				<?php if($nova_theme_footer_options['nova_footer_logo'] != null) { ?>
					<a class="footer-logo" href="<?php echo get_site_url(); ?>">				
						<img class="acorn-site-logo" src="<?php echo $nova_theme_footer_options['nova_footer_logo']; ?>" alt="Lumii Logo" />
					</a>
				<?php } ?>
				<div class="cofounded_with">
					<p>Cofounded with <a target="_blank" href="https://www.wearenova.co.uk">We Are Nova</a></p>
				</div>
				<div class="terms-and-privacy">
					<div class="terms-and-conditions">
						<a target="_blank" class="footer-terms" href="<?php echo $nova_theme_footer_options['nova_footer_terms_and_conditions_url']; ?>"><?php echo $nova_theme_footer_options['nova_footer_terms_and_conditions_text']; ?></a>
					</div>
					<div class="privacy-statement">
						<a target="_blank" class="footer-privacy" href="<?php echo $nova_theme_footer_options['nova_footer_privacy_statement_url']; ?>"><?php echo $nova_theme_footer_options['nova_footer_privacy_statement_text']; ?>
						</a>
					</div>
				</div>
				<div class="copyright">
					<p>&copy; <?php echo get_bloginfo( 'name' ); ?> <?php echo date('Y'); ?>
				</div>
			</div>
		</div>

	</footer>