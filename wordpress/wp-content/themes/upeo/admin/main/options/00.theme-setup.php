<?php
/**
 * Theme setup functions.
 *
 * @package UpeoThemes
 */


//----------------------------------------------------------------------------------
//	ADD CUSTOM HOOKS
//----------------------------------------------------------------------------------

// Used at top of header.php
function upeo_hook_header() { 
	do_action('upeo_hook_header');
}

// Used at top of header.php within the body tag
function upeo_bodystyle() { 
	do_action('upeo_bodystyle');
}

// Used after <body> tag in header.php
function upeo_hook_bodyhtml() { 
	do_action('upeo_hook_bodyhtml');
}


//----------------------------------------------------------------------------------
//	ADD PAGE TITLE
//----------------------------------------------------------------------------------

function upeo_title_select() {
	global $post;

	if ( is_page() ) {
		printf( '<span>%s</span>', esc_html( get_the_title() ) );
	} elseif ( is_attachment() ) {
		printf( '<span>' . esc_html__( 'Blog Post Image: ', 'upeo' ) . '</span>' . '%s', esc_html( get_the_title( $post->post_parent ) ) );
	} else if ( is_single() ) {
		printf( '<span>%s</span>', esc_html( get_the_title() ) );
	} else if ( is_search() ) {
		printf( '<span><span>' . esc_html__( 'Search Results: ', 'upeo' ) . '</span>' . '%s</span>', esc_html( get_search_query() ) );
	} else if ( is_404() ) {
		printf( '<span>' . esc_html__( 'Page Not Found', 'upeo' ) . '</span>' );
	} elseif ( is_archive() ) {
		printf( esc_html( get_the_archive_title() ) );
	} elseif ( esc_html( is_tax() ) ) {
		printf( esc_html( get_queried_object()->name ) );
	} elseif ( upeo_check_isblog() ) {
		printf( '<span>' . esc_html__( 'Blog', 'upeo' ) . '</span>' );
	} else {
		printf( '<span>%s</span>', esc_html( get_the_title() ) );
	}
}

// Remove "archive" text from custom post type archive pages
function upeo_title_select_cpt($title) {
    if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'upeo_title_select_cpt' );


//----------------------------------------------------------------------------------
//	ADD BREADCRUMBS FUNCTIONALITY
//----------------------------------------------------------------------------------

function upeo_input_breadcrumb() {
global $post;

	$output           = NULL;
	$count_loop       = NULL;
	$count_categories = NULL;

	$delimiter = '<span class="delimiter">/</span>';

	$delimiter_inner   =   '<span class="delimiter_core"> &bull; </span>';
	$main              =   __( 'Home', 'upeo' );
	$maxLength         =   30;

	/* Archive variables */
	$arc_year       =   get_the_time('Y');
	$arc_month      =   get_the_time('F');
	$arc_day        =   get_the_time('d');
	$arc_day_full   =   get_the_time('l');  

	/* URL variables */
	$url_year    =   get_year_link($arc_year);
	$url_month   =   get_month_link($arc_year,$arc_month);

	/* Display breadcumbs if NOT the home page */
	if ( ! is_front_page() ) {
		$output .= '<div id="breadcrumbs"><div id="breadcrumbs-core">';
		global $post, $cat;
		$homeLink = home_url( '/' );
		$output .= '<a href="' . esc_url( $homeLink ) . '">' . esc_html( $main ) . '</a>' . $delimiter;    

		/* Display breadcrumbs for single post */
		if ( is_single() ) {
			$category = get_the_category();
			$num_cat = count($category);
			if ($num_cat <=1) {
				$output .= ' ' . html_entity_decode( esc_html( get_the_title() ) );
			} else {

				// Count Total categories
				foreach( get_the_category() as $category) {
					$count_categories++;
				}
				
				// Output Categories
				foreach( get_the_category() as $category) {
					$count_loop++;

					if ( $count_loop < $count_categories ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>' . $delimiter_inner; 
					} else {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>'; 
					}
				}
				
				if (strlen(get_the_title()) >= $maxLength) {
					$output .=  ' ' . $delimiter . esc_html( trim( substr( get_the_title(), 0, $maxLength ) ) ) . ' &hellip;';
				} else {
					$output .=  ' ' . $delimiter . esc_html( get_the_title() );
				}
			}
		} elseif ( is_search() ) {
			$output .= __( 'Search Results for: ', 'upeo' ) . esc_html( get_search_query() ) . '"';
		} elseif ( is_page() && !$post->post_parent ) {
			$output .=  esc_html( get_the_title() );
		} elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors( $post );
			krsort( $post_array ); 
			foreach( $post_array as $key=>$postid ){
				$post_ids = get_post( $postid );
				$title = $post_ids->post_title;
				$output  .= '<a href="' . esc_url( get_permalink( $post_ids ) ) . '">' . esc_html( $title ) . '</a>' . $delimiter;
			}
			$output .= esc_html( get_the_title() );
		} elseif ( is_404() ) {
			$output .= __( 'Error 404 - Not Found.', 'upeo' );
		} elseif ( is_archive() ) {
			$output .= get_the_archive_title();
		} elseif( is_tax() ) {
			$output .= esc_html( get_queried_object()->name );
		} elseif ( upeo_check_isblog() ) {
			$output .= __( 'Blog', 'upeo' );
		} else {
			$output .= html_entity_decode( esc_html( get_the_title() ) );
		}

		$output .=  '</div></div>';

		return $output;
    }
}


/* ----------------------------------------------------------------------------------
	ADD MENU DESCRIPTION FEATURE
---------------------------------------------------------------------------------- */

class upeo_menudescription extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		global $wp_query;
		
		$item_output = NULL;
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li id="menu-item-' . esc_attr( $item->ID ) . '"' . $value . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) . '"' : ' href="' . esc_url( get_permalink( $item->ID ) ) . '"';

        // Insert title for top level
		if ( has_nav_menu( 'header_menu' ) ) {
			$title = ( $depth == 0 )
				? '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' : apply_filters( 'the_title', $item->title, $item->ID );
		} else {
			$title = ( $depth == 0 )
				? '<span>' . apply_filters( 'the_title', get_the_title($item->ID), $item->ID ) . '</span>' : apply_filters( 'the_title', get_the_title($item->ID), $item->ID );
		}

        // Structure of output
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $title;
		$item_output .= '</a>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


//----------------------------------------------------------------------------------
//	ADD CUSTOM FEATURED IMAGE SIZES
//----------------------------------------------------------------------------------

if ( ! function_exists( 'upeo_input_addimagesizes' ) ) {
	function upeo_input_addimagesizes() {

		/* 1 Column Layout */
		add_image_size( 'upeo-column1-1/3', 1140, 380, true );
		add_image_size( 'upeo-column1-1/4', 1140, 285, true );

		/* 2 Column Layout */
		add_image_size( 'upeo-column2-1/2', 570, 285, true );
		add_image_size( 'upeo-column2-3/4', 570, 428, true );

		/* 3 Column Layout */
		add_image_size( 'upeo-column3-1/3', 380, 107, true );
		add_image_size( 'upeo-column3-2/3', 380, 254, true );

		/* 4 Column Layout */
		add_image_size( 'upeo-column4-2/3', 285, 190, true );
	}
	add_action( 'after_setup_theme', 'upeo_input_addimagesizes' );
}

if ( ! function_exists( 'upeo_input_showimagesizes' ) ) {	 
	function upeo_input_showimagesizes($sizes) {

		// 1 Column Layout
		$sizes['upeo-column1-1/3'] = __( 'Full - 1:3', 'upeo' );
		$sizes['upeo-column1-1/4'] = __( 'Full - 1:4', 'upeo' );

		// 2 Column Layout
		$sizes['upeo-column2-1/2'] = __( 'Half - 1:2', 'upeo' );
		$sizes['upeo-column2-3/4'] = __( 'Half - 3:4', 'upeo' );

		// 3 Column Layout
		$sizes['upeo-column3-1/3'] = __( 'Third - 1:3', 'upeo' );
		$sizes['upeo-column3-2/3'] = __( 'Third - 2:3', 'upeo' );

		// 4 Column Layout
		$sizes['upeo-column4-2/3'] = __( 'Quarter - 2:3', 'upeo' );

		return $sizes;
	}
	add_filter('image_size_names_choose', 'upeo_input_showimagesizes');
}


//----------------------------------------------------------------------------------
//	CHANGE FALLBACK WP_PAGE_MENU CLASSES TO MATCH WP_NAV_MENU CLASSES
//----------------------------------------------------------------------------------

function upeo_input_menuclass( $ulclass ) {

	// Add menu class to list
	$ulclass = preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	$ulclass = str_replace( 'children', 'sub-menu', $ulclass );

	// Remove div wrapper
	$ulclass = str_replace( '<div class="menu">', '', $ulclass );
	$ulclass = str_replace( '</div>', '', $ulclass );

	return preg_replace('/<div (.*)>(.*)<\/div>/iU', '$2', $ulclass );
}
add_filter( 'wp_page_menu', 'upeo_input_menuclass' );


//----------------------------------------------------------------------------------
//	DETERMINE IF THE PAGE IS A BLOG - USEFUL FOR HOMEPAGE BLOG.
//----------------------------------------------------------------------------------

// Credit to: http://www.poseidonwebstudios.com/web-development/wordpress-is_blog-function/
function upeo_check_isblog() {
 
    global $post;
 
    //Post type must be 'post'.
    $post_type = get_post_type($post);
 
    //Check all blog-related conditional tags, as well as the current post type,
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() )
        && ($post_type == 'post')
    ) ? true : false ;
 
}


//----------------------------------------------------------------------------------
//	ADD GOOGLE FONT - OPEN SANS. (http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/)
//----------------------------------------------------------------------------------

function upeo_googlefonts_url() {
    $fonts_url = '';

    // Translators: Translate this to 'off' if there are characters in your language that are not supported by Open Sans
    $font_translate = _x( 'on', 'Open Sans font: on or off', 'upeo' );
 
    if ( 'off' !== $font_translate ) {
        $font_families = array();
  
        if ( 'off' !== $font_translate ) {
            $font_families[] = 'Arvo:300,400,600,700';
            $font_families[] = 'Lato:300,400,600,700';
            $font_families[] = 'Nunito:300,400,600,700';
            $font_families[] = 'Ubuntu:300,400,600,700';
            $font_families[] = 'Raleway:300,400,600,700';
            $font_families[] = 'Roboto:300,400,600,700';
            $font_families[] = 'PT Sans:300,400,600,700';
            $font_families[] = 'Open Sans:300,400,600,700';
            $font_families[] = 'Source Sans Pro:300,400,600,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

function upeo_googlefonts_scripts() {
   wp_enqueue_style( 'upeo-google-fonts', upeo_googlefonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'upeo_googlefonts_scripts' );


//----------------------------------------------------------------------------------
//	FIX JETPACK PHOTON IMAGE LOAD ISSUE - DISABLE CACHING FOR SPECIFIC IMAGES 
//----------------------------------------------------------------------------------

function upeo_photon_exception( $val, $src, $tag ) {
        if ( $src == get_template_directory_uri() . '/images/transparent.png' ) {
                return true;
        }
        return $val;
}
add_filter( 'jetpack_photon_skip_image', 'upeo_photon_exception', 10, 3 );

