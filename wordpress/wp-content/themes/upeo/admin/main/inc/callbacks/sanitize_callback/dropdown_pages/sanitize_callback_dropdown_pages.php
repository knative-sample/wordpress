<?php
/**
 * Custom sanitisation callback - Dropdown Pages.
 *
 * @package UpeoThemes
 */

function upeo_customizer_callback_sanitize_dropdown_pages( $page_id, $setting ) {

	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}