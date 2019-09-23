<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Beetle
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function beetle_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'beetle_section_general', array(
		'title'    => esc_html__( 'General Settings', 'beetle' ),
		'priority' => 10,
		'panel' => 'beetle_options_panel',
		)
	);

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'beetle_theme_options[layout]', array(
		'default'           => 'right-sidebar',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_select',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'beetle' ),
		'section'  => 'beetle_section_general',
		'settings' => 'beetle_theme_options[layout]',
		'type'     => 'radio',
		'priority' => 1,
		'choices'  => array(
			'left-sidebar' => esc_html__( 'Left Sidebar', 'beetle' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'beetle' ),
			),
		)
	);

	// Add Title for latest posts setting.
	$wp_customize->add_setting( 'beetle_theme_options[blog_title]', array(
		'default'           => esc_html__( 'Latest Posts', 'beetle' ),
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'beetle' ),
		'section'  => 'beetle_section_general',
		'settings' => 'beetle_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 1,
		)
	);

}
add_action( 'customize_register', 'beetle_customize_register_general_settings' );
