<?php
/**
 * Custom sanitisation callback - Checkbox.
 *
 * @package UpeoThemes
 */

function upeo_customizer_callback_sanitize_checkbox( $value ) {

	return ( ( isset( $value ) && true == $value ) ? true : false );
}