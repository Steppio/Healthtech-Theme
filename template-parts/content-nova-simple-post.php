<?php
/**
 * The template part for displaying content
 *
 * @package Healthtech
 * @subpackage Nova
 * @since 1.0.0
 */
?>

<div class="nova-article-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="image"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		<?php the_content( '<p class="entry-content">', '</p>' ); ?>
	</article>
</div>