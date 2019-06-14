<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package UpeoThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php /* Add comments */ upeo_input_allowcomments(); ?>

			<?php endwhile; wp_reset_postdata(); ?>

<?php
get_footer();