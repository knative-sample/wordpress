<?php
/**
 * General settings functions.
 *
 * @package UpeoThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */

function upeo_custom_logo() {

	$output = NULL;

    // Get logo image url if image has been assigned.
	$check_logoset = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	if ( ! empty( $check_logoset[0] ) ) {
	   if ( function_exists( 'the_custom_logo' ) ) {
			$output = get_custom_logo();
		}
	} else {
		$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
		$output .= '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</h1>';
		$output .= '<h2 class="site-description" title="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '">' . esc_html( get_bloginfo( 'description' ) ) . '</h2>';
		$output .= '</a>';
	}

	// Output logo is set
	if ( ! empty( $output ) ) {
		return $output;
	}
}


/* ----------------------------------------------------------------------------------
	Page Layout
---------------------------------------------------------------------------------- */

/* Add Custom Sidebar css */
function upeo_sidebar_css($classes) {

// Get theme options values.
$upeo_homepage_layout = upeo_var ( 'upeo_homepage_layout' );
$upeo_general_layout  = upeo_var ( 'upeo_general_layout' );
$upeo_blog_layout     = upeo_var ( 'upeo_blog_layout' );
$upeo_post_layout     = upeo_var ( 'upeo_post_layout' );

	$class_sidebar = NULL;

	if ( is_front_page() ) {
		if ( $upeo_homepage_layout == "option1" or empty( $upeo_homepage_layout ) ) {		
			$class_sidebar = '';
		} else if ( $upeo_homepage_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $upeo_homepage_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {	
		if ( $upeo_general_layout == "option1" or empty( $upeo_general_layout ) ) {		
			$class_sidebar = '';
		} else if ( $upeo_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $upeo_general_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( upeo_check_isblog() and ! is_single() ) {
		if ( $upeo_blog_layout == "option1" or empty( $upeo_blog_layout ) ) {		
			$class_sidebar = '';
		} else if ( $upeo_blog_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $upeo_blog_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_singular( 'post' ) ) {
		if ( $upeo_post_layout == "option1" or empty( $upeo_post_layout ) ) {		
			$class_sidebar = '';
		} else if ( $upeo_post_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $upeo_post_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		} else {
			$class_sidebar = '';
		}
	} else if ( is_search() ) {
		if ( $upeo_general_layout == "option1" or empty( $upeo_general_layout ) ) {		
			$class_sidebar = '';
		} else if ( $upeo_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ($upeo_general_layout == "option3") {
			$class_sidebar = 'layout-sidebar-right';
		}
	}

	// Output sidebar class
	if( ! empty( $class_sidebar ) ) {
		$classes[] = $class_sidebar;
	} else {
		$classes[] = 'layout-sidebar-none';
	}
	return $classes;
}
add_action( 'body_class', 'upeo_sidebar_css' );

/* Add Custom Sidebar html */
function upeo_sidebar_html() {

// Get theme options values.
$upeo_homepage_layout = upeo_var ( 'upeo_homepage_layout' );
$upeo_general_layout  = upeo_var ( 'upeo_general_layout' );
$upeo_blog_layout     = upeo_var ( 'upeo_blog_layout' );
$upeo_post_layout     = upeo_var ( 'upeo_post_layout' );

do_action('upeo_sidebar_html');

	if ( is_front_page() ) {	
		if ( $upeo_homepage_layout == "option1" or empty( $upeo_homepage_layout ) ) {		
				echo '';
		} else if ( $upeo_homepage_layout == "option2" ) {
				echo get_sidebar(); 
		} else if ( $upeo_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() ) {	
		if ( $upeo_general_layout == "option1" or empty( $upeo_general_layout ) ) {		
			echo '';
		} else if ( $upeo_general_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $upeo_general_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( upeo_check_isblog() and ! is_single() ) {
		if ( $upeo_blog_layout == "option1" or empty( $upeo_blog_layout ) ) {		
			echo '';
		} else if ( $upeo_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $upeo_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_singular( 'post' ) ) {
		if ( $upeo_post_layout == "option1" or empty( $upeo_post_layout ) ) {
			echo '';
		} else if ( $upeo_post_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $upeo_post_layout == "option3" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_search() ) {	
		if ( $upeo_general_layout == 'option1' or empty( $upeo_general_layout ) ) {		
			echo '';
		} else if ( $upeo_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $upeo_general_layout == "option3" ) {
			get_sidebar();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Select a Sidebar
---------------------------------------------------------------------------------- */

/* Add Selected Sidebar To Specific Pages */
function upeo_input_sidebars() {

// Get theme options values.
$upeo_general_sidebars  = upeo_var ( 'upeo_general_sidebars' );
$upeo_homepage_sidebars = upeo_var ( 'upeo_homepage_sidebars' );
$upeo_blog_sidebars     = upeo_var ( 'upeo_blog_sidebars' );
$upeo_post_sidebars     = upeo_var ( 'upeo_post_sidebars' );

	if ( is_front_page() ) {
		$output = esc_attr( $upeo_homepage_sidebars );
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {
		$output = $upeo_general_sidebars;
	} else if ( is_page_template( 'template-blog.php' ) ) {
		$output = $upeo_blog_sidebars;
	} else if ( upeo_check_isblog() and ! is_single() ) {
		$output = $upeo_blog_sidebars;
	} else if ( is_singular( 'post' ) ) {
		$output = $upeo_post_sidebars;
	} else if ( is_search() ) {	
		$output = $upeo_general_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

	return $output;
}


/* ----------------------------------------------------------------------------------
	Intro Default options
---------------------------------------------------------------------------------- */

/* Add custom intro section [Extend for more options in future update] */
function upeo_custom_intro() {

// Get theme options values.
$upeo_general_introswitch      = upeo_var ( 'upeo_general_introswitch' );
$upeo_general_breadcrumbswitch = upeo_var ( 'upeo_general_breadcrumbswitch' );

$class_intro = NULL;

	if ( ! is_front_page() ) {

		// Determine if breadcrumb is enables. Ensures table-cells align correctly with css
		if ( $upeo_general_breadcrumbswitch == '1' ) {
			$class_intro = 'option2';
		} else {
			$class_intro = 'option1';	
		}

		// If no breadcrumbs are available on current page then change intro class to option1
		if ( upeo_input_breadcrumbswitch() == '' ) { 
			$class_intro = 'option1'; 
		}

		// Output intro with breadcrumbs if set
		if ( empty( $upeo_general_introswitch ) or $upeo_general_introswitch == '1' ) {
			echo	'<div id="intro" class="' . esc_attr( $class_intro ) . '"><div class="wrap-safari"><div id="intro-core">',
					'<h1 class="page-title">',
					upeo_title_select(),
					'</h1>',
					upeo_input_breadcrumbswitch(),
					'</div></div></div>';
		}
	}
}

//Output header above slider - Experon specific
function upeo_custom_introabove() {

// Get theme options values.
$upeo_header_styleswitch    = upeo_var ( 'upeo_header_styleswitch' );
$upeo_header_locationswitch = upeo_var ( 'upeo_header_locationswitch' );

	if ( ( empty( $upeo_header_styleswitch ) or $upeo_header_styleswitch == 'option1' ) and $upeo_header_locationswitch == 'option2' ) {
		return;
	} else {
		upeo_custom_intro();	
	}
}

//Output header below slider - Experon specific
function upeo_custom_introbelow() {

// Get theme options values.
$upeo_header_styleswitch    = upeo_var ( 'upeo_header_styleswitch' );
$upeo_header_locationswitch = upeo_var ( 'upeo_header_locationswitch' );

	if ( ( empty( $upeo_header_styleswitch ) or $upeo_header_styleswitch == 'option1' ) and $upeo_header_locationswitch == 'option2' ) {
		upeo_custom_intro();	
	}
}

/* Add custom intro class - Determine whether intro is enabled or disabled */
function upeo_custom_introclass($classes) {

	if ( ! is_front_page() ) {
		$classes[] = 'intro-on';
	}

	return $classes;
}
add_action( 'body_class', 'upeo_custom_introclass' );


/* ----------------------------------------------------------------------------------
	Enable Breadcrumbs
---------------------------------------------------------------------------------- */

/* Toggle Breadcrumbs */
function upeo_input_breadcrumbswitch() {

// Get theme options values.
$upeo_general_breadcrumbswitch = upeo_var ( 'upeo_general_breadcrumbswitch' );

	if( ! is_front_page() ) {
		if ( $upeo_general_breadcrumbswitch == '0' or empty( $upeo_general_breadcrumbswitch ) ) {
			return '';
		} else if ( $upeo_general_breadcrumbswitch == '1' ) {
			return upeo_input_breadcrumb();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Enable Responsive Layout
---------------------------------------------------------------------------------- */

/* http://wordpress.stackexchange.com/questions/27497/how-to-use-wp-nav-menu-to-create-a-select-menu-dropdown */
class upeo_nav_menu_responsive extends Walker_Nav_Menu{

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li id="res-menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

        // Insert title for top level
		$title = ( $depth == 0 )
			? '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' : apply_filters( 'the_title', $item->title, $item->ID );

        // Insert sub-menu titles
		if ( $depth > 0 ) {
			$title = str_repeat('&#45; ', $depth ) . $item->title;
		}

        // Structure of output
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

// Fallback responsive menu when custom header menu has not been set.
function upeo_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');

	echo '<div id="header-responsive-inner" class="responsive-links nav-collapse collapse"><ul>',
		 $output,
		 '</ul></div>';
}

function upeo_input_responsivehtml1() {

// Get theme options values.
$upeo_general_fixedlayoutswitch = upeo_var ( 'upeo_general_fixedlayoutswitch' );

	if ( $upeo_general_fixedlayoutswitch !== '1' ) {

		echo '<div id="header-nav">',
		     '<a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '<span class="icon-bar"></span>',
		     '</a>',
		     '</div>';
	}
}

function upeo_input_responsivehtml2() {

// Get theme options values.
$upeo_general_fixedlayoutswitch = upeo_var ( 'upeo_general_fixedlayoutswitch' );

	if ( $upeo_general_fixedlayoutswitch !== '1' ) {

		$args =  array(
			'container_class' => 'responsive-links nav-collapse collapse', 
			'container_id'    => 'header-responsive-inner', 
			'menu_class'      => '', 
			'theme_location'  => 'header_menu', 
			'walker'          => new upeo_nav_menu_responsive(), 
			'fallback_cb'     => 'upeo_input_responsivefall',
		);

		echo '<div id="header-responsive">',
		     wp_nav_menu( $args ),
		     '</div>';
	}
}

function upeo_input_responsivecss() {

// Get theme options values.
$upeo_general_fixedlayoutswitch = upeo_var ( 'upeo_general_fixedlayoutswitch' );
	
	if ( $upeo_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'upeo-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'upeo_input_responsivecss', '12' );

function upeo_input_responsiveclass($classes){

// Get theme options values.
$upeo_general_fixedlayoutswitch = upeo_var ( 'upeo_general_fixedlayoutswitch' );

	if ( $upeo_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'upeo_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	BACK UP OPTIONS TO PAGE "UPEO CREATED CONTENT BACKUP"
---------------------------------------------------------------------------------- */

function upeo_backup_options() {
global $wp_customize;

	// Get theme options values.
	$upeo_general_backupswitch = upeo_var ( 'upeo_general_backupswitch' );

	// Only backup options is the backup option is enabled
	if ( $upeo_general_backupswitch == '1' ) {

		// Set output variable to avoid php errors
		$output_header  = NULL;
		$output_content = NULL;

		// Create post array
		$postarray = array();

		// Get Upeo options array.
		$upeo_redux_variables        = get_option( 'upeo_redux_variables' );

		// Create array of Upeo content options currently used
		foreach ( $upeo_redux_variables as $key => $value ) {
		
			// Get options type and label
			$type  = $wp_customize->get_control( $key )->type;
			$label = $wp_customize->get_control( $key )->label;
		
			// Create output content for "text" and "textarea" options
			if ( $type == 'text' or $type == 'textarea' ) {

				if (strpos($label, 'HIDDEN_LABEL_') !== false) {
					$label = str_replace( 'HIDDEN_LABEL_', '', $label );
				}

				$output_content .= '<h3>' . $label . ' (option: ' . $key . ')</h3>' . "\n";
				$output_content .= '<ul><li>' . $value . '</li></ul>' . "\n" . "\n";
			}
		}

		// Create content for start of backup page
		$output_header   = '';
		$output_header  .= '<-----------------------------------------------------------' . "\n";
		$output_header  .= esc_html__( 'Upeo Created Content Backup', 'upeo' ) . "\n";
		$output_header  .= esc_html__( 'This page contains a backup of content created by the Upeo WordPress Theme. ', 'upeo' );
		$output_header  .= esc_html__( 'The purpose for the backup is to prevent content loss on theme switch.', 'upeo' );
		$output_header  .= esc_html__( 'When a user switches themes this content will still be available to the user when setting up their site on the new theme.', 'upeo' ) . "\n";
		$output_header  .= esc_html__( 'Please note the following : ', 'upeo' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'Leave this page as private, available only to users with admin privledges.', 'upeo' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'You can delete this page any time and regenerate it from within the Upeo options menu, General section.', 'upeo' ) . "\n";
		$output_header  .= '----------------------------------------------------------->' . "\n";
		$output_header  .= "\n" . "\n";

		// Backup page setup.
		$postarray['post_title']     = 'Upeo Created Content Backup'; // translate ok.
		$postarray['post_type']      = 'page';
		$postarray['post_status']    = 'private';
		$postarray['comment_status'] = 'closed';
		$page                        = get_page_by_title( 'Upeo Created Content Backup' );
		if ( isset( $page ) && '' !== $page->ID ) {
			$postarray['ID']           = $page->ID;
			$postarray['post_content'] = $output_header . $output_content;
			wp_update_post( $postarray );
		} else {
			$postarray['ID']           = 0;
			$postarray['post_content'] = $output_header . $output_content;
			wp_insert_post( $postarray );
		}
	}
}
add_action( 'customize_save_after', 'upeo_backup_options' );

