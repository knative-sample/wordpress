<?php
/**
 * Custom sanitisation callback - Select Icons.
 *
 * @package UpeoThemes
 */

function upeo_customizer_callback_sanitize_select_faicons( $value ) {
	
	// Sanitize icon class.
	$value = sanitize_html_class( $value );

	// Correct class name if needed.
	$value = str_replace( 'fafa', 'fa fa', $value );

	return $value;
}