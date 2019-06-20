<?php
/**
 * Array - Icons.
 *
 * @package UpeoThemes
 */

function upeo_customizer_select_array_faicons() {

	require_once( trailingslashit( get_template_directory() ) . 'admin/main/inc/arrays/select_faicons/fa-icons.php' );

	$input_icons = upeo_customizer_control_get_font_icons();

	$array_icons = array();
	foreach( $input_icons as $icon ) {
		$icon               = esc_attr( $icon );
		$array_icons[$icon] = $icon;
	}
	return $array_icons;
}
