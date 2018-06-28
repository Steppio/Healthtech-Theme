<?php get_header(); ?>

	<?php
	$category = get_the_category(); 
	$cat_name = $category[0]->cat_name;
	?>

	<div class="desktop-container">

		<section class="graph_bg clearfix">
			<div id="wrapper">
				<h1>Articles about happy homelife leading to a happy worklife.</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>

				<?php echo get_search_form( $echo ); ?>
			</div>
		</section>		

		<div class="list_categories clearfix <?php echo $category[0]->cat_name; ?>">
			<div id="wrapper">
				<div class="cats">
					<ul>
						<?php
						$categories = get_categories( array(
						    'orderby' => 'name',
						    'parent'  => 0
						) );
						 
						foreach ( $categories as $category ) {
						    printf( '<li><a href="%1$s">%2$s</a></li>',
						        esc_url( get_category_link( $category->term_id ) ),
						        esc_html( $category->name )
						    );
						}
						?>
					</ul>
				</div>
				<?php echo get_search_form( $echo ); ?>
			</div>
		</div>

		<div class="latest_post_container clearfix">
			<?php
				$query1 = new WP_Query( 'post_type=post&posts_per_page=2&category_name=' . $cat_name );
				while ( $query1->have_posts() ) {
				    $query1->the_post();
				    ?>

					<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
					$thumb_url = $thumb_url_array[0];
					$all_cats = '';
					$category = get_the_category(); 
					?>

					<?php

					foreach($category as $cat) {
					    $all_cats .= $cat->name . ' ';
					}

					?>


				    <div class="latest_posts <?php echo $all_cats; ?>" style="background: url(<?php echo $thumb_url; ?>) no-repeat;">
				    	<div class="coloured-triangle">
				    		&nbsp;
				    	</div>
						<div class="excerpt">
							<h3><?php echo get_the_title(); ?></h3>
							<p><?php echo get_excerpt(); ?></p>
						</div>
				    </div>
				    
				    <?php
				}
				wp_reset_postdata();
			?>
		</div>

		<?php 
		if(isset($category[1]->cat_name)) {
			$cat_name = 'View All';
		} 
		?>

		<div class="featured-posts clearfix" id="questions">
			<div id="wrapper">

				<div class="featured_post">

					<?php echo do_shortcode("[ajax_load_more category=' . $cat_name . ' repeater='default' posts_per_page='4' transition='fade' scroll='false' button_label='Load More' button_loading_label='Loading' offset='2']"); ?>

				</div>
			</div>
		</div>

	</div>

	<div class="signup green clearfix" id="contact">

		<div class="backtotop">
			<a href=".graph_bg" id="whatistheproblem" class="top" onclick='return false;'>
				<img src="<?php echo get_template_directory_uri(); ?>/img/backtotop.png" />
			</a>
		</div>


		<div class="eclipse top-eclipse">
			&nbsp;
		</div>

		<div id="wrapper" class="features">
			<h2>Improve your employee's productivity now</h2>
			<p>You really can make everyone happy! If anything remains unclear, you want to understand more about PinPoint or think it’s time to book a free demo, enter your details below and we will be in touch.</p>
			<?php echo do_shortcode( '[contact-form-7 id="29" title="Newsletter"]' ); ?>
		</div>


	</div>

<?php get_footer(); ?>