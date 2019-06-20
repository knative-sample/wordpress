<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package UpeoThemes
 */


/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. */
function upeo_input_pagemenuargs( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'upeo_input_pagemenuargs' );


/* Adds custom classes to the array of body classes. */
function upeo_input_bodyclasses( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'upeo_input_bodyclasses' );


/* Filter in a link to a content ID attribute for the next/previous image links on image attachment pages. */
function upeo_input_enhancedimagenav( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'upeo_input_enhancedimagenav', 10, 2 );