<?php
/**
 * The Single Post content template file.
 *
 * @package UpeoThemes
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php upeo_input_postmeta(); ?>
		<?php upeo_input_postmedia(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'upeo' ), 'after'  => '</div>', ) ); ?>
		</div><!-- .entry-content -->

		</article>

		<div class="clearboth"></div>