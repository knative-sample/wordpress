<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package UpeoThemes
 */

get_header(); ?>

	<div class="entry-content title-404">
		<h2><i class="fa fa-ban"></i><?php esc_html_e( '404', 'upeo' ); ?></h2>
		<p><?php esc_html_e( 'Sorry, we could not find the page you are looking for.', 'upeo' ); ?><br/><?php esc_html_e( 'Please try using the search function.', 'upeo' ); ?></p>
		<?php echo get_search_form(); ?>
	</div>

<?php get_footer(); ?>