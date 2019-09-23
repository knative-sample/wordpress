<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Beetle
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function beetle_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'beetle_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'beetle' ),
		'priority' => 70,
		'panel' => 'beetle_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'beetle_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Beetle_Customize_Upgrade_Control(
		$wp_customize, 'beetle_theme_options[upgrade]', array(
		'section' => 'beetle_section_upgrade',
		'settings' => 'beetle_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'beetle_customize_register_upgrade_settings' );
