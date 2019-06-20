<?php
/**
 * Setup theme options used in customizer.
 *
 * @package UpeoThemes
 */

function upeo_customizer_theme_options( $wp_customize ) {

	global $upeo_prefix;

	$prefix_name = $upeo_prefix;

	// ==========================================================================================
	// 1. ADD PANELS / SECTIONS
	// ==========================================================================================

	// Add Upgrade Section
	$wp_customize->add_section(
		new upeo_customizer_customswitch_button_link(
			$wp_customize,
			'upeo_customizer_section_upgrade_top',
			array(
				'title'        => __( 'Upeo Pro', 'upeo' ),
				'priority'     => 1,
				'button_text' => __( 'Upgrade Now', 'upeo' ),
				'button_url'  => 'https://upeothemes.com/features/',
				'button_class' => 'button-primary',
			)
		)
	);

	// Add Documentation Section
	$wp_customize->add_section(
		new upeo_customizer_customswitch_button_link(
			$wp_customize,
			'upeo_customizer_section_docs',
			array(
				'title'        => __( 'Documentation', 'upeo' ),
				'priority'     => 1,
				'button_text' => __( 'View Docs', 'upeo' ),
				'button_url'  => admin_url( 'themes.php?page=upeo-welcome&tab=documentation' ),
				'button_class' => 'button-secondary',
			)
		)
	);

	// Add Theme Options Panel
	$wp_customize->add_panel(
		'upeo_customizer_section_themeoptions',
		array(
			'title'       => __( 'Theme Options', 'upeo' ),
			'description' => __( 'Use the options below to customize your theme!', 'upeo' ),
			'priority'    => 2,
		)
	);

	// Add General Settings Section
	$wp_customize->add_section(
		'upeo_customizer_section_generalsettings',
		array(
			'title'    => __( 'General Settings', 'upeo' ),
			'priority' => 10,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Homepage Section
	$wp_customize->add_section(
		'upeo_customizer_section_homepage',
		array(
			'title'    => __( 'Homepage', 'upeo' ),
			'priority' => 20,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Homepage (Featured) Section
	$wp_customize->add_section(
		'upeo_customizer_section_homepagefeatured',
		array(
			'title'    => __( 'Homepage (Featured)', 'upeo' ),
			'priority' => 30,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Header Section
	$wp_customize->add_section(
		'upeo_customizer_section_header',
		array(
			'title'    => __( 'Header', 'upeo' ),
			'priority' => 40,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Footer Section
	$wp_customize->add_section(
		'upeo_customizer_section_footer',
		array(
			'title'    => __( 'Footer', 'upeo' ),
			'priority' => 50,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Social Media Section
	$wp_customize->add_section(
		'upeo_customizer_section_socialmedia',
		array(
			'title'    => __( 'Social Media', 'upeo' ),
			'priority' => 60,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Blog Section
	$wp_customize->add_section(
		'upeo_customizer_section_blog',
		array(
			'title'    => __( 'Blog', 'upeo' ),
			'priority' => 70,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);

	// Add Upgrade (10% off) Section
	$wp_customize->add_section(
		'upeo_customizer_section_upgrade_inner',
		array(
			'title'    => __( 'Upgrade (10% off)', 'upeo' ),
			'priority' => 80,
			'panel'    => 'upeo_customizer_section_themeoptions',
		)
	);


	// ==========================================================================================
	// 2. ADD CONTROLS
	// ==========================================================================================

	//----------------------------------------------------
	// 2.1. Add General Settings Controls
	//----------------------------------------------------

	// Add Logo Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_general_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_general_heading',
			array(
				'label'           => __( 'Logo Settings', 'upeo' ),
				'section'         => 'upeo_customizer_section_generalsettings',
				'settings'        => 'upeo_redux_variables[upeo_section_general_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Logo Info Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_logosetting]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_raw(
			$wp_customize,
			'upeo_general_logosetting',
			array(
				'label'           => __( 'Since WordPress v4.5 you can now add a site logo using the native WordPress options. To add a site logo go the "Site Identitiy" settings on the main customizer screen.', 'upeo' ),
				'section'         => 'upeo_customizer_section_generalsettings',
				'settings'        => 'upeo_redux_variables[upeo_general_logosetting]',
				'active_callback' => '',
			)
		)
	);

	// Add General Page Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_general_page]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_general_page',
			array(
				'label'           => __( 'Page Structure', 'upeo' ),
				'section'         => 'upeo_customizer_section_generalsettings',
				'settings'        => 'upeo_redux_variables[upeo_section_general_page]',
				'active_callback' => '',
			)
		)
	);

	// Add Page Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_general_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_general_layout]',
				'section'		  => 'upeo_customizer_section_generalsettings',
				'label'			  => __( 'Page Layout', 'upeo' ),
				'description'	  => __( 'Select page layout. This will only be applied to published Pages.', 'upeo' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add General Sidebar Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'upeo_general_sidebars',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_general_sidebars]',
			'section'		  => 'upeo_customizer_section_generalsettings',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'upeo' ),
			'description'	  => __( 'Choose a sidebar to use with the page layout.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_sidebar(),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Enable Fixed Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_fixedlayoutswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_general_fixedlayoutswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_general_fixedlayoutswitch]',
				'section'         => 'upeo_customizer_section_generalsettings',
				'label'           => __( 'Enable Fixed Layout', 'upeo' ),
				'description'	  => __( '(i.e. Disable responsive layout)', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Breadcrumbs Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_breadcrumbswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_general_breadcrumbswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_general_breadcrumbswitch]',
				'section'         => 'upeo_customizer_section_generalsettings',
				'label'           => __( 'Enable Breadcrumbs', 'upeo' ),
				'description'	  => __( 'Switch on to enable breadcrumbs.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Backup Theme Options Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_general_backup]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_general_backup',
			array(
				'label'           => __( 'Backup Theme Options', 'upeo' ),
				'section'         => 'upeo_customizer_section_generalsettings',
				'settings'        => 'upeo_redux_variables[upeo_section_general_backup]',
				'active_callback' => '',
			)
		)
	);

	// Add Backup Theme Options Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_general_backupswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_general_backupswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_general_backupswitch]',
				'section'         => 'upeo_customizer_section_generalsettings',
				'label'           => __( 'Backup Theme Options', 'upeo' ),
				'description'	  => __( 'Switch on to backup your theme options settings each time the customizer is updated and saved. If enabled then a new page called "Upeo Created Content Backup" will be created where the option values can be found.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.2. Homepage
	//----------------------------------------------------

	// Add Homepage Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_homepage_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_homepage_heading',
			array(
				'label'           => __( 'Control Homepage Layout', 'upeo' ),
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_section_homepage_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Homepage Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_homepage_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_homepage_layout]',
				'section'		  => 'upeo_customizer_section_homepage',
				'label'			  => __( 'Homepage Layout', 'upeo' ),
				'description'	  => __( 'Select page layout. This will only be applied to static homepages (front page) and not to homepage blogs.', 'upeo' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Homepage Select a Sidebar Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sidebars',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sidebars]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'upeo' ),
			'description'	  => __( 'Choose a sidebar to use with the layout.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_sidebar(),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Homepage Slider Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_homepage_slider]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_homepage_slider',
			array(
				'settings'        => 'upeo_redux_variables[upeo_section_homepage_slider]',
				'section'         => 'upeo_customizer_section_homepage',
				'label'           => __( 'Homepage Slider', 'upeo' ),
				'active_callback' => '',
			)
		)
	);

	// Add Choose Homepage Slider Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderswitch]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'radio',
			'label'			  => __( 'Choose Homepage Slider', 'upeo' ),
			'description'	  => __( 'Switch on to enable home page slider.', 'upeo' ),
			'choices'		  => array(
				'option4' => 'Image Slider',
				'option3' => 'Disable'
			),
			'active_callback' => '',
		)
	);

	// Add Image Slide 1 - Info
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage1_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_raw(
			$wp_customize,
			'upeo_homepage_sliderimage1_info',
			array(
				'label'           => __( 'Slide 1', 'upeo' ),
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage1_info]',
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 1 - Image
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage1_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_homepage_sliderimage1_image',
			array(
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage1_image][url]',
				'label'	          => '',
				'description'	  => __( 'Image', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 1 - Title
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage1_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage1_title',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage1_title]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 1 - Title', 'upeo' ),
			'description'	  => __( 'Title', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Image Slide 1 - Description
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage1_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage1_desc',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage1_desc]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 1 - Description', 'upeo' ),
			'description'	  => __( 'Description', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Slide 1 - Page Link
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage1_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage1_link',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage1_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => '',
			'description'	  => __( 'URL', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Image Slide 2 - Info
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage2_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_raw(
			$wp_customize,
			'upeo_homepage_sliderimage2_info',
			array(
				'label'           => __( 'Slide 2', 'upeo' ),
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage2_info]',
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 2 - Image
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage2_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_homepage_sliderimage2_image',
			array(
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage2_image][url]',
				'label'	          => '',
				'description'	  => __( 'Image', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 2 - Title
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage2_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage2_title',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage2_title]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 2 - Title', 'upeo' ),
			'description'	  => __( 'Title', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Image Slide 2 - Description
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage2_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage2_desc',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage2_desc]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 2 - Description', 'upeo' ),
			'description'	  => __( 'Description', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Slide 2 - Page Link
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage2_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage2_link',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage2_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => '',
			'description'	  => __( 'URL', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Image Slide 3 - Info
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage3_info]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_raw(
			$wp_customize,
			'upeo_homepage_sliderimage3_info',
			array(
				'label'           => __( 'Slide 3', 'upeo' ),
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage3_info]',
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 3 - Image
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage3_image][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_homepage_sliderimage3_image',
			array(
				'section'         => 'upeo_customizer_section_homepage',
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderimage3_image][url]',
				'label'	          => '',
				'description'	  => __( 'Image', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Image Slide 3 - Title
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage3_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage3_title',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage3_title]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 2 - Title', 'upeo' ),
			'description'	  => __( 'Title', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Image Slide 3 - Description
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage3_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage3_desc',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage3_desc]',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Slider Image 3 - Description', 'upeo' ),
			'description'	  => __( 'Description', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Slide 3 - Page Link
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderimage3_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderimage3_link',
		array(
			'section'		  => 'upeo_customizer_section_homepage',
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderimage3_link]',
			'type'			  => 'dropdown-pages',
			'label'			  => '',
			'description'	  => __( 'URL', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Enable Full-Width Slider Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderpresetwidth]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_homepage_sliderpresetwidth',
			array(
				'settings'        => 'upeo_redux_variables[upeo_homepage_sliderpresetwidth]',
				'section'         => 'upeo_customizer_section_homepage',
				'label'           => __( 'Enable Full-Width Slider', 'upeo' ),
				'description'	  => __( 'Switch on to enable full-width slider.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Add Slider Height (Max) Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sliderpresetheight]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'absint',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_sliderpresetheight',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_sliderpresetheight]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Slider Height (Max)', 'upeo' ),
			'description'	  => __( 'Specify the maximum slider height (px).', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Call To Action - Intro Section Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_homepage_ctaintro]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_homepage_ctaintro',
			array(
				'settings'        => 'upeo_redux_variables[upeo_section_homepage_ctaintro]',
				'section'         => 'upeo_customizer_section_homepage',
				'label'           => __( 'Call To Action - Intro', 'upeo' ),
				'active_callback' => '',
			)
		)
	);

	// Add Homepage - Intro Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introswitch]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'checkbox',
			'label'			  => __( 'Message', 'upeo' ),
			'description'	  => __( 'Check to enable intro on home page.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Title Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introaction]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introaction',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introaction]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Intro CTA - Title', 'upeo' ),
			'description'	  => __( 'Enter a <strong>title</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Teaser Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introactionteaser]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introactionteaser',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introactionteaser]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'textarea',
			'label'	          => __( 'HIDDEN_LABEL_Intro CTA - Teaser', 'upeo' ),
			'description'	  => __( 'Enter a <strong>teaser</strong> message.<br /><br />Use this to provide more details about what you offer.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Button Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introactiontext1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introactiontext1',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introactiontext1]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Intro CTA Button - Text', 'upeo' ),
			'description'	  => __( 'Specify a text for button 1.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Link Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introactionlink1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introactionlink1',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introactionlink1]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'radio',
			'label'			  => __( 'Button - Link', 'upeo' ),
			'description'	  => __( 'Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'upeo' ),
			'choices'		  => array(
				'option1' => __( 'Link to a Page', 'upeo' ),
				'option2' => __( 'Specify Custom link', 'upeo' ),
				'option3' => __( 'Disable Link', 'upeo' ),
			),
			'active_callback' => '',
		)
	);

	// Add Homepage - Intro Page Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introactionpage1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introactionpage1',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introactionpage1]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'dropdown-pages',
			'label'			  => __( 'Button - Link to a page', 'upeo' ),
			'description'	  => __( 'Select a target page for action button link.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Homepage - Intro Custom Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_introactioncustom1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_introactioncustom1',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_introactioncustom1]',
			'section'		  => 'upeo_customizer_section_homepage',
			'type'			  => 'text',
			'label'			  => __( 'Intro CTA Button - Custom link', 'upeo' ),
			'description'	  => __( 'Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);


	//----------------------------------------------------
	// 2.3. Homepage (Featured)
	//----------------------------------------------------

	// Add Homepage (Featured) Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_homepagefeatured_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_homepagefeatured_heading',
			array(
				'label'           => __( 'Display Pre-Designed Homepage Layout', 'upeo' ),
				'section'         => 'upeo_customizer_section_homepagefeatured',
				'settings'        => 'upeo_redux_variables[upeo_section_homepagefeatured_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Enable Pre-Made Homepage Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_sectionswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_homepage_sectionswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_homepage_sectionswitch]',
				'section'         => 'upeo_customizer_section_homepagefeatured',
				'label'           => __( 'Enable Pre-Made Homepage', 'upeo' ),
				'description'	  => __( 'switch on to enable pre-designed homepage layout.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Content Area 1 Icon Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section1_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section1_icon',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section1_icon]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 1', 'upeo' ),
			'description'	  => __( 'Choose an icon for the section background.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Title Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section1_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section1_title',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section1_title]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 1 - Title', 'upeo' ),
			'description'	  => __( 'Add a title to the section.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Description Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section1_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section1_desc',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section1_desc]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'textarea',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 1 - Description', 'upeo' ),
			'description'	  => __( 'Add some text to featured section 1.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 1 Link Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section1_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section1_link',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_homepage_section1_link]',
			'section'		=> 'upeo_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'upeo' ),
		)
	);

	// Add Content Area 2 Icon Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section2_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section2_icon',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section2_icon]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 2', 'upeo' ),
			'description'	  => __( 'Choose an icon for the section background.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Title Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section2_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section2_title',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section2_title]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 2 - Title', 'upeo' ),
			'description'	  => __( 'Add a title to the section.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Description Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section2_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section2_desc',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section2_desc]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'textarea',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 2 - Description', 'upeo' ),
			'description'	  => __( 'Add some text to featured section 2.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 2 Link Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section2_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section2_link',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_homepage_section2_link]',
			'section'		=> 'upeo_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'upeo' ),
		)
	);

	// Add Content Area 3 Icon Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section3_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section3_icon',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section3_icon]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 3', 'upeo' ),
			'description'	  => __( 'Choose an icon for the section background.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Title Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section3_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section3_title',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section3_title]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 3 - Title', 'upeo' ),
			'description'	  => __( 'Add a title to the section.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Description Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section3_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section3_desc',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section3_desc]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'textarea',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 3 - Description', 'upeo' ),
			'description'	  => __( 'Add some text to featured section 3.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 3 Link Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section3_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section3_link',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_homepage_section3_link]',
			'section'		=> 'upeo_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'upeo' ),
		)
	);

	// Add Content Area 4 Icon Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section4_icon]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_faicons',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section4_icon',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section4_icon]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'select',
			'label'			  => __( 'Content Area 4', 'upeo' ),
			'description'	  => __( 'Choose an icon for the section background.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_faicons(),
			'active_callback' => '',
		)
	);

	// Add Content Area 4 Title Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section4_title]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section4_title',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section4_title]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 4 - Title', 'upeo' ),
			'description'	  => __( 'Add a title to the section.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 4 Description Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section4_desc]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section4_desc',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_homepage_section4_desc]',
			'section'		  => 'upeo_customizer_section_homepagefeatured',
			'type'			  => 'textarea',
			'label'	          => __( 'HIDDEN_LABEL_Content Area 4 - Description', 'upeo' ),
			'description'	  => __( 'Add some text to featured section 4.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Content Area 4 Link Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_homepage_section4_link]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'upeo_homepage_section4_link',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_homepage_section4_link]',
			'section'		=> 'upeo_customizer_section_homepagefeatured',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Link to a page', 'upeo' ),
		)
	);


	//----------------------------------------------------
	// 2.4. Header
	//----------------------------------------------------

	// Add Header Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_header_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_header_heading',
			array(
				'label'           => __( 'Header Style', 'upeo' ),
				'section'         => 'upeo_customizer_section_header',
				'settings'        => 'upeo_redux_variables[upeo_section_header_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Enable Search (Main Header) Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_stickyswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_stickyswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_stickyswitch]',
				'section'         => 'upeo_customizer_section_header',
				'label'           => __( 'Sticky Header', 'upeo' ),
				'description'	  => __( 'Switch on to fix header to top of page.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Control Header Content Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_header_content]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_header_content',
			array(
				'settings'        => 'upeo_redux_variables[upeo_section_header_content]',
				'section'         => 'upeo_customizer_section_header',
				'label'           => __( 'Control Header Content', 'upeo' ),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Search (Main Header) Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_searchswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_searchswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_searchswitch]',
				'section'         => 'upeo_customizer_section_header',
				'label'           => __( 'Enable Search (Main Header)', 'upeo' ),
				'description'	  => __( 'Switch on to enable header search.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.5. Footer
	//----------------------------------------------------

	// Add Footer Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_footer_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_footer_heading',
			array(
				'label'           => __( 'Control Footer Content', 'upeo' ),
				'section'         => 'upeo_customizer_section_footer',
				'settings'        => 'upeo_redux_variables[upeo_section_footer_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Footer Widgets Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_footer_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_footer_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_footer_layout]',
				'section'		  => 'upeo_customizer_section_footer',
				'label'			  => __( 'Footer Widgets Layout', 'upeo' ),
				'description'	  => __( 'Select footer layout. Take complete control of the footer content by adding widgets.', 'upeo' ),
				'choices'		  => array(
					'option1'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option01.png',
					'option2'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option02.png',
					'option3'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option03.png',
					'option4'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option04.png',
					'option5'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option05.png',
					'option6'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option06.png',
					'option7'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option07.png',
					'option8'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option08.png',
					'option9'  => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option09.png',
					'option10' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option10.png',
					'option11' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option11.png',
					'option12' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option12.png',
					'option13' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option13.png',
					'option14' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option14.png',
					'option15' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option15.png',
					'option16' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option16.png',
					'option17' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option17.png',
					'option18' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/footer/option18.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Disable Footer Widgets Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_footer_widgetswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_footer_widgetswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_footer_widgetswitch]',
			'section'		  => 'upeo_customizer_section_footer',
			'type'			  => 'checkbox',
			'label'			  => __( 'Disable Footer Widgets', 'upeo' ),
			'description'	  => __( 'Check to disable footer widgets.', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Enable Scroll To Top Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_footer_scroll]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_footer_scroll',
			array(
				'settings'        => 'upeo_redux_variables[upeo_footer_scroll]',
				'section'         => 'upeo_customizer_section_footer',
				'label'           => __( 'Enable Scroll To Top', 'upeo' ),
				'description'	  => __( 'Check to enable scroll to top.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Sub Footer Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_subfooter_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_subfooter_heading',
			array(
				'label'           => __( 'Control Sub Footer Content', 'upeo' ),
				'section'         => 'upeo_customizer_section_footer',
				'settings'        => 'upeo_redux_variables[upeo_section_subfooter_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Post-Footer Widgets Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_subfooter_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_subfooter_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_subfooter_layout]',
				'section'		  => 'upeo_customizer_section_footer',
				'label'			  => __( 'Post-Footer Widgets Layout', 'upeo' ),
				'description'	  => __( 'Select post-footer layout. Take complete control of the post-footer content by adding widgets.', 'upeo' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option03.png',
					'option4' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option04.png',
					'option5' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option05.png',
					'option6' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option06.png',
					'option7' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option07.png',
					'option8' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/sub-footer/option08.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Disable Post-Footer Widgets Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_subfooter_widgetswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_subfooter_widgetswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_subfooter_widgetswitch]',
			'section'		  => 'upeo_customizer_section_footer',
			'type'			  => 'checkbox',
			'label'			  => __( 'Disable Post-Footer Widgets', 'upeo' ),
			'description'	  => __( 'Check to disable post-footer widgets.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Enable Widget Close Button Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_subfooter_widgetclose]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_subfooter_widgetclose',
			array(
				'settings'        => 'upeo_redux_variables[upeo_subfooter_widgetclose]',
				'section'         => 'upeo_customizer_section_footer',
				'label'           => __( 'Enable Widget Close Button', 'upeo' ),
				'description'	  => __( 'Switch on to enable button to hide post-footer widgets.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	//----------------------------------------------------
	// 2.6. Social Media
	//----------------------------------------------------

	// Add Social Media Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_socialmedia_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_socialmedia_heading',
			array(
				'label'           => __( 'Social Media Control', 'upeo' ),
				'section'         => 'upeo_customizer_section_socialmedia',
				'settings'        => 'upeo_redux_variables[upeo_section_socialmedia_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Social Media Content Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_socialswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_socialswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_socialswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Enable Social Media Links (Pre Header)', 'upeo' ),
				'description'	  => __( 'Switch on to enable links to social media pages.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Enable Social Media Links (footer) Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_socialswitchfooter]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_socialswitchfooter',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_socialswitchfooter]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Enable Social Media Links (footer)', 'upeo' ),
				'description'	  => __( 'Switch on to enable links to social media pages.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Add Social Media Content Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_header_social]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_header_social',
			array(
				'settings'        => 'upeo_redux_variables[upeo_section_header_social]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Social Media Content', 'upeo' ),
				'active_callback' => '',
			)
		)
	);

	// Add Social Media Display Message Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_socialmessage]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'upeo_header_socialmessage',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_socialmessage]',
			'section'         => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media Message', 'upeo' ),
			'description'	  => __( 'Add a message here. E.g. &#34;Follow Us&#34;.<br />(Only shown in header)', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Facebook social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_facebookswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_facebookswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_facebookswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Facebook', 'upeo' ),
				'description'	  => __( 'Enable link to Facebook profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_facebooklink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_facebooklink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_facebooklink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Facebook Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Facebook page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_facebookiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_facebookiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_facebookiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Facebook icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_facebookcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_facebookcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_facebookcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Twitter social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_twitterswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_twitterswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_twitterswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Twitter', 'upeo' ),
				'description'	  => __( 'Enable link to Twitter profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_twitterlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_twitterlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_twitterlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Twitter Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Twitter page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_twittericonswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_twittericonswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_twittericonswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Twitter icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_twittercustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_twittercustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_twittercustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Google+ social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_googleswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_googleswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_googleswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Google+', 'upeo' ),
				'description'	  => __( 'Enable link to Google+ profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_googlelink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_googlelink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_googlelink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Google+ Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Google+ page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_googleiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_googleiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_googleiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Google+ icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_googlecustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_googlecustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_googlecustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Instagram social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_instagramswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_instagramswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_instagramswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Instagram', 'upeo' ),
				'description'	  => __( 'Enable link to Instagram profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_instagramlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_instagramlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_instagramlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Instagram Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Instagram page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_instagramiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_instagramiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_instagramiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Instagram Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Instagram icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_instagramcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_instagramcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_instagramcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Tumblr social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_tumblrswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_tumblrswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_tumblrswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Tumblr', 'upeo' ),
				'description'	  => __( 'Enable link to Tumblr profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_tumblrlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_tumblrlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_tumblrlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Tumblr Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Tumblr page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_tumblriconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_tumblriconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_tumblriconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Tumblr Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Tumblr icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_tumblrcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_tumblrcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_tumblrcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// LinkedIn social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_linkedinswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_linkedinswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_linkedinswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'LinkedIn', 'upeo' ),
				'description'	  => __( 'Enable link to LinkedIn profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_linkedinlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_linkedinlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_linkedinlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - LinkedIn Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your LinkedIn page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_linkediniconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_linkediniconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_linkediniconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom LinkedIn icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_linkedincustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_linkedincustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_linkedincustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Flickr social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_flickrswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_flickrswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_flickrswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Flickr', 'upeo' ),
				'description'	  => __( 'Enable link to Flickr profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_flickrlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_flickrlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_flickrlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Flickr Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Flickr page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_flickriconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_flickriconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_flickriconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Flickr icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_flickrcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_flickrcustomicon',
			array(
				'settings'		=> 'upeo_redux_variables[upeo_header_flickrcustomicon][url]',
				'section'		=> 'upeo_customizer_section_socialmedia',
				'description'	=> __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Pinterest social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_pinterestswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_pinterestswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_pinterestswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Pinterest', 'upeo' ),
				'description'	  => __( 'Enable link to Pinterest profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_pinterestlink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_pinterestlink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_pinterestlink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Pinterest Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Pinterest page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_pinteresticonswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_pinteresticonswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_pinteresticonswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Pinterest Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Pinterest icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_pinterestcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_pinterestcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_pinterestcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Xing social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_xingswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_xingswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_xingswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Xing', 'upeo' ),
				'description'	  => __( 'Enable link to Xing profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_xinglink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_xinglink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_xinglink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Xing Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Xing page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_xingiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_xingiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_xingiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Xing Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Xing icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_xingcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_Xingcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_xingcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// PayPal social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_paypalswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_paypalswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_paypalswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'PayPal', 'upeo' ),
				'description'	  => __( 'Enable link to PayPal profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_paypallink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_paypallink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_paypallink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - PayPal Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your PayPal page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_paypaliconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_paypaliconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_paypaliconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom PayPal Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom PayPal icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_paypalcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_paypalcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_paypalcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// YouTube social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_youtubeswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_youtubeswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_youtubeswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'YouTube', 'upeo' ),
				'description'	  => __( 'Enable link to YouTube profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_youtubelink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_youtubelink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_youtubelink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - YouTube Custom URL', 'upeo' ),
			'description'     => __( 'Input the url to your YouTube page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_youtubeiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_youtubeiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_youtubeiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Custom Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom YouTube icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_youtubecustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_youtubecustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_youtubecustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Vimeo social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_vimeoswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_vimeoswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_vimeoswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Vimeo', 'upeo' ),
				'description'	  => __( 'Enable link to Vimeo profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_vimeolink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_vimeolink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_vimeolink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Vimeo Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your Vimeo page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_vimeoiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_vimeoiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_vimeoiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Vimeo Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Vimeo icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_vimeocustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_vimeocustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_vimeocustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// RSS social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_rssswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_rssswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_rssswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'RSS', 'upeo' ),
				'description'	  => __( 'Enable link to RSS profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_rsslink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_rsslink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_rsslink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - RSS Custom URL', 'upeo' ),
			'description'	  => __( 'Input the url to your RSS page.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_rssiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_rssiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_rssiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom RSS Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom RSS icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_rsscustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_rsscustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_rsscustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);

	// Email social settings
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_emailswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_header_emailswitch',
			array(
				'settings'        => 'upeo_redux_variables[upeo_header_emailswitch]',
				'section'         => 'upeo_customizer_section_socialmedia',
				'label'           => __( 'Email', 'upeo' ),
				'description'	  => __( 'Enable link to Email profile.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_emaillink]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'upeo_header_emaillink',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_emaillink]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'text',
			'label'	          => __( 'HIDDEN_LABEL_Social Media - Email Custom URL', 'upeo' ),
			'description'	  => __( 'Input your email address. <strong>Note:</strong> Add mailto: as prefix to open link as email.', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_emailiconswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_header_emailiconswitch',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_header_emailiconswitch]',
			'section'		  => 'upeo_customizer_section_socialmedia',
			'type'			  => 'checkbox',
			'label'			  => __( 'Use Custom Email Icon', 'upeo' ),
			'description'	  => __( 'Check to use custom Email icon', 'upeo' ),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_header_emailcustomicon][url]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upeo_header_emailcustomicon',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_header_emailcustomicon][url]',
				'section'		  => 'upeo_customizer_section_socialmedia',
				'description'	  => __( 'Add a link to the image or upload one from your desktop. The image will be resized.', 'upeo' ),
				'active_callback' => 'upeo_customizer_callback_active_global',
			)
		)
	);


	// -----------------------------------------------------------------------------------
	//	5.	Blog
	// -----------------------------------------------------------------------------------

	// Add Blog Heading
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_blog_heading]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_blog_heading',
			array(
				'label'           => __( 'Control Blog (Archive) Pages', 'upeo' ),
				'section'         => 'upeo_customizer_section_blog',
				'settings'        => 'upeo_redux_variables[upeo_section_blog_heading]',
				'active_callback' => '',
			)
		)
	);

	// Add Blog Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_blog_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_blog_layout]',
				'section'		  => 'upeo_customizer_section_blog',
				'label'			  => __( 'Blog Layout', 'upeo' ),
				'description'	  => __( 'Select blog page layout. Only applied to the main blog page and not individual posts.', 'upeo' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Blog Select a Sidebar Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'upeo_blog_sidebars',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_blog_sidebars]',
			'section'		  => 'upeo_customizer_section_blog',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'upeo' ),
			'description'	  => __( 'Note: Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_sidebar(),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Blog Traditional Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_style1layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'upeo_blog_style1layout',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_blog_style1layout]',
			'section'		=> 'upeo_customizer_section_blog',
			'type'			=> 'radio',
			'label'			=> __( 'Blog Traditional Layout', 'upeo' ),
			'description'	=> __( 'Select a layout for your blog page. This will also be applied to all pages set using the blog template.', 'upeo' ),
			'choices'		=> array(
				'option1' => __( 'Style 1 (Quarter Width)', 'upeo' ),
				'option2' => __( 'Style 2 (Full Width)', 'upeo' ),
			)
		)
	);

	// Add Blog Links Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_hovercheck][option1]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_blog_hovercheck_option1',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_blog_hovercheck][option1]',
			'section'		  => 'upeo_customizer_section_blog',
			'type'			  => 'checkbox',
			'label'			  => __( 'Blog Links - Lightbox', 'upeo' ),
			'description'	  => __( 'Check to show lightbox link', 'upeo' ),
			'active_callback' => '',
		)
	);
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_hovercheck][option2]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'upeo_blog_hovercheck_option2',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_blog_hovercheck][option2]',
			'section'		  => 'upeo_customizer_section_blog',
			'type'			  => 'checkbox',
			'label'			  => __( 'Blog Links - Post', 'upeo' ),
			'description'	  => __( 'Check to show post link', 'upeo' ),
			'active_callback' => '',
		)
	);

	// Add Post Content Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_blog_postswitch]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		'upeo_blog_postswitch',
		array(
			'settings'		=> 'upeo_redux_variables[upeo_blog_postswitch]',
			'section'		=> 'upeo_customizer_section_blog',
			'type'			=> 'radio',
			'label'			=> __( 'Post Content', 'upeo' ),
			'description'	=> __( 'Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'upeo' ),
			'choices'		=> array(
				'option1' => __( 'Show excerpt', 'upeo' ),
				'option2' => __( 'Show full article', 'upeo' ),
				'option3' => __( 'Hide article', 'upeo' ),
			)
		)
	);

	// Add Control Single Post Page Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_section_post_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_section(
			$wp_customize,
			'upeo_section_post_layout',
			array(
				'settings'        => 'upeo_redux_variables[upeo_section_post_layout]',
				'section'         => 'upeo_customizer_section_blog',
				'label'           => __( 'Control Single Post Page', 'upeo' ),
				'active_callback' => '',
			)
		)
	);

	// Add Post Layout Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_post_layout]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'sanitize_key',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_radio_image(
			$wp_customize,
			'upeo_post_layout',
			array(
				'settings'		  => 'upeo_redux_variables[upeo_post_layout]',
				'section'		  => 'upeo_customizer_section_blog',
				'label'			  => __( 'Post Layout', 'upeo' ),
				'description'	  => __( 'Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'upeo' ),
				'choices'		  => array(
					'option1' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option01.png',
					'option2' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option02.png',
					'option3' => trailingslashit( get_template_directory_uri() ) . 'admin/main/assets/img/layout/blog/option03.png',
				),
				'active_callback' => '',
			)
		)
	);

	// Add Post Select a Sidebar Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_post_sidebars]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_select_sidebar',
		)
	);
	$wp_customize->add_control(
		'upeo_post_sidebars',
		array(
			'settings'		  => 'upeo_redux_variables[upeo_post_sidebars]',
			'section'		  => 'upeo_customizer_section_blog',
			'type'			  => 'select',
			'label'			  => __( 'Select a Sidebar', 'upeo' ),
			'description'	  => __( 'Choose a sidebar to use with the layout.', 'upeo' ),
			'choices'		  => upeo_customizer_select_array_sidebar(),
			'active_callback' => 'upeo_customizer_callback_active_global',
		)
	);

	// Add Show Author Bio Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_post_authorbio]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'upeo_customizer_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_switch(
			$wp_customize,
			'upeo_post_authorbio',
			array(
				'settings'        => 'upeo_redux_variables[upeo_post_authorbio]',
				'section'         => 'upeo_customizer_section_blog',
				'label'           => __( 'Show Author Bio', 'upeo' ),
				'description'	  => __( 'Check to enable the author biography.', 'upeo' ),
				'choices'		  => array(
					'1'      => __( 'On', 'upeo' ),
					'off'    => __( 'Off', 'upeo' ),
				),
				'active_callback' => '',
			)
		)
	);


	//----------------------------------------------------
	// 2.9. Upgrade Section (10% off)
	//----------------------------------------------------

	// Add Upgrade Control
	$wp_customize->add_setting(
		'upeo_redux_variables[upeo_upgrade_content]',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'wp_filter_post_kses',
		)
	);
	$wp_customize->add_control(
		new upeo_customizer_customcontrol_upgrade_inner(
			$wp_customize,
			'upeo_upgrade_content',
			array(
				'settings'        => 'upeo_redux_variables[upeo_upgrade_content]',
				'section'         => 'upeo_customizer_section_upgrade_inner',
				'upgrade_url'     => 'https://upeothemes.com/features/',
				'price_discount'  => __( 'Upgrade Now (10% off)', 'upeo' ),
				'price_normal'	  => __( 'Use coupon at checkout for 10% off.', 'upeo' ),
				'coupon'	      => __( 'upeo10', 'upeo' ),
				'button'	      => __( 'Upgrade Now', 'upeo' ),
				'title_main'	  => __( 'So&hellip; Why upgrade?', 'upeo' ),
				'title_secondary' => __( 'We&#39;re glad you asked! Here&#39;s just some of the amazing features you&#39;ll get when you upgrade&hellip;', 'upeo' ),
				'images'		  => array(
					'%s/admin/main/inc/controls/upgrade_inner/img/1_trusted_team.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/2_page_builder.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/3_premium_support.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/4_theme_options.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/5_shortcodes.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/6_unlimited_colors.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/7_parallax_pages.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/8_typography.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/9_backgrounds.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/10_responsive.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/11_retina_ready.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/12_site_layout.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/13_translation_ready.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/14_rtl_support.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/15_infinite_sidebars.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/16_portfolios.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/17_seo_optimized.png',
					'%s/admin/main/inc/controls/upgrade_inner/img/18_demo_content.png',
				),
				'active_callback' => '',
			)
		)
	);

}
add_action( 'customize_register', 'upeo_customizer_theme_options' );