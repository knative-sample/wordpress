<?php
/**
 * Setup theme functions for Upeo.
 *
 * @package UpeoThemes
 */

// Declare latest theme version
$GLOBALS['upeo_theme_version'] = '1.0.5';

// Setup content width 
function upeo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'upeo_content_width', 1170 );
}
add_action( 'after_setup_theme', 'upeo_content_width', 0 );


//----------------------------------------------------------------------------------
//	Add Theme Options Panel & Assign Variable Values
//----------------------------------------------------------------------------------

	// Add Customizer Framework
	require_once( get_template_directory() . '/admin/main/framework.php' );
	require_once( get_template_directory() . '/admin/main/options.php' );

	// Add Toolbox Framework
	require_once( get_template_directory() . '/admin/main-toolbox/toolbox.php' );

	// Add Theme Options Features.
	require_once( get_template_directory() . '/admin/main/options/00.theme-setup.php' ); 
	require_once( get_template_directory() . '/admin/main/options/01.general-settings.php' ); 
	require_once( get_template_directory() . '/admin/main/options/02.homepage.php' ); 
	require_once( get_template_directory() . '/admin/main/options/03.header.php' ); 
	require_once( get_template_directory() . '/admin/main/options/04.footer.php' );
	require_once( get_template_directory() . '/admin/main/options/05.blog.php' ); 


//----------------------------------------------------------------------------------
//	Assign Theme Specific Functions
//----------------------------------------------------------------------------------

// Setup theme features, register menus and scripts.
if ( ! function_exists( 'upeo_themesetup' ) ) {

	function upeo_themesetup() {

		// Load required files
		require_once ( get_template_directory() . '/lib/functions/extras.php' );
		require_once ( get_template_directory() . '/lib/functions/template-tags.php' );

		// Make theme translation ready.
		load_theme_textdomain( 'upeo', get_template_directory() . '/languages' );

		// Add default theme functions.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'audio', 'status', 'quote', 'link', 'chat' ) );
		add_theme_support( 'title-tag' );

		// Add support for custom background
		add_theme_support( 'custom-background' );

		// Add support for custom header
		$upeo_header_args = apply_filters( 'upeo_custom_header', array( 'height' => 200, 'width'  => 1600, 'header-text' => false, 'flex-height' => true ) );
		add_theme_support( 'custom-header', $upeo_header_args );

		// Add support for custom logo
		add_theme_support( 'custom-logo', array( 'height' => 90, 'width' => 200, 'flex-width' => true, 'flex-height' => true ) );

		// Add WooCommerce functions.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add excerpt support to pages.
		add_post_type_support( 'page', 'excerpt' );

		// Register theme menu's.
		register_nav_menus( array( 'pre_header_menu' => __( 'Pre Header Menu', 'upeo' ) ) );
		register_nav_menus( array( 'header_menu'     => __( 'Primary Header Menu', 'upeo' ) ) );
		register_nav_menus( array( 'sub_footer_menu' => __( 'Footer Menu', 'upeo' ) ) );
	}
}
add_action( 'after_setup_theme', 'upeo_themesetup' );


//----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
//----------------------------------------------------------------------------------

function upeo_frontscripts() {

	global $upeo_theme_version;

	// Add 3rd party stylesheets
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/lib/extentions/prettyPhoto/css/prettyPhoto.css', '', '3.1.6' );

	// Add 3rd party stylesheets - Prefixed to prevent conflict between library versions
	wp_enqueue_style( 'upeo-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/css/bootstrap.min.css', '', '2.3.2' );

	// Add 3rd party Font Packages
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	// Add 3rd party scripts
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'prettyPhoto', ( get_template_directory_uri().'/lib/extentions/prettyPhoto/js/jquery.prettyPhoto.js' ), array( 'jquery' ), '3.1.6', 'true' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/lib/scripts/modernizr.js', array( 'jquery' ), '2.6.2', 'true'  );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/lib/scripts/plugins/sticky/jquery.sticky.js', '1.0.0', 'true' );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/lib/scripts/plugins/waypoints/waypoints.min.js', array( 'jquery' ), '2.0.3', 'true'  );
	wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/lib/scripts/plugins/waypoints/waypoints-sticky.min.js', array( 'jquery' ), '2.0.3', 'true'  );	
	wp_enqueue_script( 'jquery-scrollup', get_template_directory_uri() . '/lib/scripts/plugins/scrollup/jquery.scrollUp.min.js', array( 'jquery' ), '2.4.1', 'true' );

	// Add 3rd party scripts - Prefixed to prevent conflict between library versions
	wp_enqueue_script( 'upeo-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/js/bootstrap.js', array( 'jquery' ), '2.3.2', 'true' );

	// Add theme stylesheets
	wp_enqueue_style( 'upeo-shortcodes', get_template_directory_uri() . '/styles/style-shortcodes.css', '', $upeo_theme_version );
	wp_enqueue_style( 'upeo-style', get_stylesheet_uri(), '', $upeo_theme_version );

	// Add theme scripts
	wp_enqueue_script( 'upeo-frontend', get_template_directory_uri() . '/lib/scripts/main-frontend.js', array( 'jquery' ), $upeo_theme_version, 'true' );

	// Register theme stylesheets
	wp_register_style( 'upeo-responsive', get_template_directory_uri() . '/styles/style-responsive.css', '', $upeo_theme_version );

	// Add Masonry script to all archive pages
	if ( upeo_check_isblog() or is_page_template( 'template-blog.php' ) or is_archive() ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Add UpeoSlider scripts
	if ( is_front_page() ) {
		wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
		wp_enqueue_script( 'upeo-responsiveslides', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), $upeo_theme_version, 'true' );
	}

	// Add comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'upeo_frontscripts', 10 );


//----------------------------------------------------------------------------------
//	Register Back-End Styles And Scripts
//----------------------------------------------------------------------------------

function upeo_adminscripts() {

	if ( is_customize_preview() ) {

		global $upeo_theme_version;

		// Add theme stylesheets
		wp_enqueue_style( 'upeo-backend', get_template_directory_uri() . '/styles/backend/style-backend.css', '', $upeo_theme_version );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

		// Add theme scripts
		wp_enqueue_script( 'upeo-backend', get_template_directory_uri() . '/lib/scripts/main-backend.js', array( 'jquery' ), $upeo_theme_version );

	}
}
add_action( 'admin_enqueue_scripts', 'upeo_adminscripts' );


//----------------------------------------------------------------------------------
//	Register Theme Widgets
//----------------------------------------------------------------------------------

function upeo_widgets_init() {

	// Register default sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'upeo' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Register footer sidebars
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'upeo' ),
        'id'            => 'footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'upeo' ),
        'id'            => 'footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'upeo' ),
        'id'            => 'footer-w3',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 4', 'upeo' ),
        'id'            => 'footer-w4',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 5', 'upeo' ),
        'id'            => 'footer-w5',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 6', 'upeo' ),
        'id'            => 'footer-w6',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

	// Register sub-footer sidebars
    register_sidebar( array(
        'name'          => __( 'Sub-Footer Column 1', 'upeo' ),
        'id'            => 'sub-footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="sub-footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sub-Footer Column 2', 'upeo' ),
        'id'            => 'sub-footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="sub-footer-widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'upeo_widgets_init' );