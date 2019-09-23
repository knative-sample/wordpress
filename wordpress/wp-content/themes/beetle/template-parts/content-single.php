<?php
/**
 * The template for displaying single posts
 *
 * @package Beetle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php beetle_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php beetle_post_image_single(); ?>

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beetle' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php beetle_entry_tags(); ?>
		<?php beetle_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>
