<?php
/*
Template Name: Services Cat Template
*/
?>

<?php get_header(); ?>
			
	<div class="services-container clearfix">
		<div class="services">
			<div class="constrain-me">
				<?php $args = array(
					'post_type' => 'services',
					'order' => 'ASC'
				); 
				$the_query = new WP_Query($args); ?>		
					
				<?php if( have_posts() ) : while($the_query->have_posts()) : $the_query->the_post() ;
					$title = get_field( 'title' );
					$description = get_field( 'description' );
					$link = get_field( 'link' );
					$background_colour = get_field( 'background_colour' );
					$text_colour = get_field( 'text_colour' );
				?>	


						<div class="service" style="background: <?php echo $background_colour; ?>">
							<h3 style="color: <?php echo $text_colour; ?>"><?php echo $title; ?></h3>
							<?php echo $description; ?>
							<a href="<?php echo $link; ?>">Find out more</a>
						</div>

				<?php endwhile; else: endif; ?>	
			</div>
		</div>
	</div>

	<div class="quotes-container clearfix">
		<div class="constrain-me">
			<h1>Get A Quote</h1>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="quote">
					<?php $quotes_text = get_field('quotes_text'); ?>
					<?php $quotes_guarantee = get_field('quotes_guarantee'); ?>
					<div class="big-text">
						<?php echo $quotes_text; ?>
					</div>
					<div class="whitebackground">
						<?php echo $quotes_guarantee; ?>
					</div>
					<div class="start-quote">
						<a href="#">Start Quote</a>
					</div>
				</div>

			<?php endwhile; // end of the loop. ?>
		</div>
	</div>

	<div class="review-container clearfix">
		<div class="constrain-me">
			<h1>Reviews</h1>
			<?php $args = array(
				'post_type' => 'reviews',
				'order' => 'ASC'
			); 
			$the_query = new WP_Query($args); ?>		
				
			<div class="review-slider">
				<?php if( have_posts() ) : while($the_query->have_posts()) : $the_query->the_post() ;
					$review_text = get_field( 'review_text' );
					$customer_name = get_field( 'customer_name' );
					$date = get_field( 'date' );
				?>	

					<div class="review">
						<p><?php echo $review_text; ?></p>
						<div class="review-info">
							<p><?php echo $customer_name; ?></p>
							<p>- <?php echo $date; ?></p>
						</div>
					</div>

				<?php endwhile; else: endif; ?>		
			</div>	
			<div class="review-slideshow-prevnext">
				<div class='prev'></div>
				<div class='next'></div>
			</div>
		</div>
	</div>

	<div class="partner-container clearfix">
		<div class="constrain-me">
			<h1>Our Partners</h1>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="partners-description">
					<?php $partners_text = get_field('partners_text'); ?>
					<p><?php echo $partners_text; ?></p>
				</div>

			<?php endwhile; // end of the loop. ?>		
			
			<?php $args = array(
				'post_type' => 'partners',
				'order' => 'ASC'
			); 
			$the_query = new WP_Query($args); ?>		
				
			<?php if( have_posts() ) : while($the_query->have_posts()) : $the_query->the_post() ;
				$partner_title = get_field( 'partner_title' );
				$partner_image = get_field( 'parter_image' );
				$link = get_field( 'link' );
			?>	

				<div class="partner">
					<a href="<?php echo $link; ?>">
						<div class="partner-image">
							<img src="<?php echo $partner_image['url']; ?>" />
						</div>
						<p><?php echo $partner_title; ?></p>
					</a>
				</div>

			<?php endwhile; else: endif; ?>	
		</div>		
	</div>

<?php get_footer(); ?>