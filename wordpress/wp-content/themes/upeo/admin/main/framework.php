<?php
/**
 * Setup theme customizer options.
 *
 * @package UpeoThemes
 */

// Declare prefix global variable
$GLOBALS['upeo_prefix'] = 'upeo_';

// Add Button Link script (used for top level upgrade button)
require_once( trailingslashit( dirname(__FILE__) ) . 'inc/sections/button_link/section_button_link_register.php' );

// Setup custom sections / controls / callbacks
function upeo_customizer_setup() {

	// Load all custom customizer arrays
	$array_folder = trailingslashit( dirname(__FILE__) ) . 'inc/arrays';
	$array_files  = scandir($array_folder);

	foreach ($array_files as $array_file) {

		if ($array_file === '.' or $array_file === '..') continue;

		if (is_dir($array_folder . '/' . $array_file)) {
			require_once( $array_folder . '/' . $array_file . '/array_' . $array_file . '.php' );
		}
	}

	// Load all custom customizer sections
	$section_folder = trailingslashit( dirname(__FILE__) ) . 'inc/sections';
	$section_files  = scandir($section_folder);

	foreach ($section_files as $section_file) {

		if ($section_file === '.' or $section_file === '..') continue;

		if (is_dir($section_folder . '/' . $section_file)) {
			require_once( $section_folder . '/' . $section_file . '/section_' . $section_file . '.php' );
		}
	}

	// Load all custom customizer controls
	$control_folder = trailingslashit( dirname(__FILE__) ) . 'inc/controls';
	$control_files  = scandir($control_folder);

	foreach ($control_files as $control_file) {

		if ($control_file === '.' or $control_file === '..') continue;

		if (is_dir($control_folder . '/' . $control_file)) {
			require_once( $control_folder . '/' . $control_file . '/control_' . $control_file . '.php' );
		}
	}

	// Load all active callbacks
	$active_callback_folder = trailingslashit( dirname(__FILE__) ) . 'inc/callbacks/active_callback';
	$active_callback_files  = scandir($active_callback_folder);

	foreach ($active_callback_files as $active_callback_file) {

		if ($active_callback_file === '.' or $active_callback_file === '..') continue;

		if (is_dir($active_callback_folder . '/' . $active_callback_file)) {
			require_once( $active_callback_folder . '/' . $active_callback_file . '/active_callback_' . $active_callback_file . '.php' );
		}
	}

	// Load all sanitization callbacks
	$sanitize_callback_folder = trailingslashit( dirname(__FILE__) ) . 'inc/callbacks/sanitize_callback';
	$sanitize_callback_files  = scandir($sanitize_callback_folder);

	foreach ($sanitize_callback_files as $sanitize_callback_file) {

		if ($sanitize_callback_file === '.' or $sanitize_callback_file === '..') continue;

		if (is_dir($sanitize_callback_folder . '/' . $sanitize_callback_file)) {
			require_once( $sanitize_callback_folder . '/' . $sanitize_callback_file . '/sanitize_callback_' . $sanitize_callback_file . '.php' );
		}
	}
}
add_action( 'customize_register', 'upeo_customizer_setup' );

// Enqueue customizer scripts / styles
function upeo_customizer_adminscripts() {

	global $upeo_theme_version;

	// Add theme stylesheets.
	wp_enqueue_style( 'upeo-customizer', get_template_directory_uri() . '/admin/main/assets/css/upeo-customizer.css', '', $upeo_theme_version );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.6.3' );

	// Add theme scripts.
	wp_enqueue_script( 'upeo-customizer', get_template_directory_uri() . '/admin/main/assets/js/upeo-customizer.js', array( 'jquery' ), $upeo_theme_version, true );

}
add_action( 'customize_controls_enqueue_scripts', 'upeo_customizer_adminscripts' );

// Assign custom function to fetch variable values
if ( !function_exists( 'upeo_var' ) ) {
	function upeo_var( $name, $key = false ) {

		global $upeo_prefix;

		$prefix_name = $upeo_prefix;

		$upeo_redux_variables = get_option( 'upeo_redux_variables' );
		$options = $upeo_redux_variables;

		// Set this to your preferred default value
		$var = '';

		if ( empty( $name ) && !empty( $options ) ) {
			$var = $options;
		} else {
			if ( !empty( $options[$name] ) ) {
				if ( !empty( $key ) && !empty( $options[$name][$key] ) && $key !== true ) {
					$var = $options[$name][$key];
				} else if (  !empty( $key ) && empty( $options[$name][$key] ) && $key !== true  ) {
					$var = '0';
				} else {
					$var = $options[$name];
				}
			}
		}

		return $var;
	}
}