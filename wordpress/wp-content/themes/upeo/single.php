<?php
/**
 * The Template for displaying all single posts.
 *
 * @package UpeoThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'upeo' ), 'after'  => '</div>', ) ); ?>

				<?php upeo_input_nav( 'nav-below' ); ?>

				<?php /* Add Author Bio */ upeo_input_postauthorbio(); ?>

				<?php /* Add comments */ upeo_input_allowcomments(); ?>

			<?php endwhile; wp_reset_postdata(); ?>

<?php
get_footer();