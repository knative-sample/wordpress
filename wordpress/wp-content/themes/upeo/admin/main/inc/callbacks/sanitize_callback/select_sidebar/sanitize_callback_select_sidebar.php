<?php
/**
 * Custom sanitisation callback - Select Sidebar.
 *
 * @package UpeoThemes
 */

function upeo_customizer_callback_sanitize_select_sidebar( $value ) {

	// Strip all tags from sidebar name.
	$value = wp_strip_all_tags( $value );

	// Create array of sidebar names.
	global $wp_registered_sidebars;
	$of_sidebars = array();
	foreach ( $wp_registered_sidebars as $sidebar ) {
		$of_sidebars[] = $sidebar['name'];
	}

	// Check that sidebar is on site and return.
	foreach($of_sidebars as $sidebar) {
		if( $value == $sidebar ) {
			return $value;
		}
	}

	// If no sidebar match.
	return false;

}