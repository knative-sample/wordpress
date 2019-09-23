<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Beetle
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function beetle_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'beetle_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'beetle' ),
		'priority' => 30,
		'panel' => 'beetle_options_panel',
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'beetle_theme_options[post_layout]', array(
		'default'           => 'small-image',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_select',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Post Layout (archive pages)', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 1,
		'choices'  => array(
			'small-image' => esc_html__( 'Show featured image beside content', 'beetle' ),
			'index' => esc_html__( 'Show featured image below title', 'beetle' ),
			),
		)
	);

	// Add Settings and Controls for post content.
	$wp_customize->add_setting( 'beetle_theme_options[post_content]', array(
		'default'           => 'excerpt',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_select',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[post_content]', array(
		'label'    => esc_html__( 'Post Length (archive pages)', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[post_content]',
		'type'     => 'radio',
		'priority' => 2,
		'choices'  => array(
			'full' => esc_html__( 'Show full posts', 'beetle' ),
			'excerpt' => esc_html__( 'Show post excerpts', 'beetle' ),
			),
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'beetle_theme_options[excerpt_length]', array(
		'default'           => 20,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[excerpt_length]',
		'type'     => 'text',
		'active_callback' => 'beetle_control_post_content_callback',
		'priority' => 3,
		)
	);

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'beetle_theme_options[postmeta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Beetle_Customize_Header_Control(
		$wp_customize, 'beetle_theme_options[postmeta_headline]', array(
			'label' => esc_html__( 'Post Meta', 'beetle' ),
			'section' => 'beetle_section_post',
			'settings' => 'beetle_theme_options[postmeta_headline]',
			'priority' => 4,
		)
	) );

	$wp_customize->add_setting( 'beetle_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'beetle_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'beetle_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 7,
		)
	);

	// Add Post Footer Settings.
	$wp_customize->add_setting( 'beetle_theme_options[single_posts_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Beetle_Customize_Header_Control(
		$wp_customize, 'beetle_theme_options[single_posts_headline]', array(
			'label' => esc_html__( 'Single Posts', 'beetle' ),
			'section' => 'beetle_section_post',
			'settings' => 'beetle_theme_options[single_posts_headline]',
			'priority' => 8,
		)
	) );

	$wp_customize->add_setting( 'beetle_theme_options[post_image]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[post_image]', array(
		'label'    => esc_html__( 'Display featured image on single posts', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[post_image]',
		'type'     => 'checkbox',
		'priority' => 9,
		)
	);

	$wp_customize->add_setting( 'beetle_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);
	$wp_customize->add_setting( 'beetle_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'beetle_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'beetle_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'beetle' ),
		'section'  => 'beetle_section_post',
		'settings' => 'beetle_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 11,
		)
	);

}
add_action( 'customize_register', 'beetle_customize_register_post_settings' );
