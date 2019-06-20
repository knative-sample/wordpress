<?php
/**
 * Array - Select Sidebar.
 *
 * @package UpeoThemes
 */

function upeo_customizer_select_array_sidebar() {

	global $wp_registered_sidebars;
	$array_sidebars = array();
	foreach ( $wp_registered_sidebars as $sidebar ) {
		if ( strpos( $sidebar['id'], 'footer' ) !== false ) {
			return;
		} else {
			$sidebar_name                  = $sidebar['name'];
			$array_sidebars[$sidebar_name] = $sidebar_name;
		}
	}
	return $array_sidebars;
}
