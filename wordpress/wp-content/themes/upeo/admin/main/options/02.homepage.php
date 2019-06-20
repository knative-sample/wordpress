<?php
/**
 * Homepage functions.
 *
 * @package UpeoThemes
 */

/* ----------------------------------------------------------------------------------
	ENABLE SLIDER - HOMEPAGE & INNER-PAGES
---------------------------------------------------------------------------------- */

// Add full width slider class to body
function upeo_input_sliderclass($classes){

// Get theme options values.
$upeo_homepage_sliderswitch      = upeo_var ( 'upeo_homepage_sliderswitch' );
$upeo_homepage_sliderpresetwidth = upeo_var ( 'upeo_homepage_sliderpresetwidth' );

	if ( is_front_page() ) {
		if ( empty( $upeo_homepage_sliderswitch ) or $upeo_homepage_sliderswitch == 'option1' or $upeo_homepage_sliderswitch == 'option4' ) {
			if ( empty( $upeo_homepage_sliderpresetwidth ) or $upeo_homepage_sliderpresetwidth == '1' ) {
				$classes[] = 'slider-full';
			} else {
				$classes[] = 'slider-boxed';
			}
		}
	}
	return $classes;
}
add_action( 'body_class', 'upeo_input_sliderclass');


/* ----------------------------------------------------------------------------------
	ENABLE HOMEPAGE SLIDER
---------------------------------------------------------------------------------- */

// Content for slider layout - Standard
function upeo_input_sliderhomepage() {

// Get theme options values.
$upeo_homepage_sliderimage1_info  = upeo_var ( 'upeo_homepage_sliderimage1_info' );
$upeo_homepage_sliderimage1_image = upeo_var ( 'upeo_homepage_sliderimage1_image', 'url' );
$upeo_homepage_sliderimage1_title = upeo_var ( 'upeo_homepage_sliderimage1_title' );
$upeo_homepage_sliderimage1_desc  = upeo_var ( 'upeo_homepage_sliderimage1_desc' );
$upeo_homepage_sliderimage1_link  = upeo_var ( 'upeo_homepage_sliderimage1_link' );
$upeo_homepage_sliderimage2_info  = upeo_var ( 'upeo_homepage_sliderimage2_info' );
$upeo_homepage_sliderimage2_image = upeo_var ( 'upeo_homepage_sliderimage2_image', 'url' );
$upeo_homepage_sliderimage2_title = upeo_var ( 'upeo_homepage_sliderimage2_title' );
$upeo_homepage_sliderimage2_desc  = upeo_var ( 'upeo_homepage_sliderimage2_desc' );
$upeo_homepage_sliderimage2_link  = upeo_var ( 'upeo_homepage_sliderimage2_link' );
$upeo_homepage_sliderimage3_info  = upeo_var ( 'upeo_homepage_sliderimage3_info' );
$upeo_homepage_sliderimage3_image = upeo_var ( 'upeo_homepage_sliderimage3_image', 'url' );
$upeo_homepage_sliderimage3_title = upeo_var ( 'upeo_homepage_sliderimage3_title' );
$upeo_homepage_sliderimage3_desc  = upeo_var ( 'upeo_homepage_sliderimage3_desc' );
$upeo_homepage_sliderimage3_link  = upeo_var ( 'upeo_homepage_sliderimage3_link' );

	// Set output variable to avoid php errors
	$slide1_link = NULL;
	$slide2_link = NULL;
	$slide3_link = NULL;

	// Get url of featured images in slider pages
	$slide1_image_url = $upeo_homepage_sliderimage1_image;
	$slide2_image_url = $upeo_homepage_sliderimage2_image;
	$slide3_image_url = $upeo_homepage_sliderimage3_image;

	// Get titles of slider pages
	$slide1_title = $upeo_homepage_sliderimage1_title;
	$slide2_title = $upeo_homepage_sliderimage2_title;
	$slide3_title = $upeo_homepage_sliderimage3_title;

	// Get descriptions (excerpt) of slider pages
	$slide1_desc = $upeo_homepage_sliderimage1_desc;
	$slide2_desc = $upeo_homepage_sliderimage2_desc;
	$slide3_desc = $upeo_homepage_sliderimage3_desc;

	// Get url of slider pages
	if( ! empty( $upeo_homepage_sliderimage1_link ) ) {
		$slide1_link = get_permalink( $upeo_homepage_sliderimage1_link );
	}
	if( ! empty( $upeo_homepage_sliderimage2_link ) ) {
		$slide2_link = get_permalink( $upeo_homepage_sliderimage2_link );
	}
	if( ! empty( $upeo_homepage_sliderimage3_link ) ) {
		$slide3_link = get_permalink( $upeo_homepage_sliderimage3_link );
	}

	// Create array for slider content
	$upeo_homepage_sliderpage = array(
		array(
			'slide_image_url'   => $slide1_image_url,
			'slide_title'       => $slide1_title,
			'slide_desc'        => $slide1_desc,
			'slide_link'        => $slide1_link
		),
		array(
			'slide_image_url'   => $slide2_image_url,
			'slide_title'       => $slide2_title,
			'slide_desc'        => $slide2_desc,
			'slide_link'        => $slide2_link
		),
		array(
			'slide_image_url'   => $slide3_image_url,
			'slide_title'       => $slide3_title,
			'slide_desc'        => $slide3_desc,
			'slide_link'        => $slide3_link
		),
	);

	foreach ($upeo_homepage_sliderpage as $slide) {

		if ( ! empty( $slide['slide_image_url'] ) ) {

			// Get url of background image or set video overlay image
			$slide_image = 'background: url(' . esc_url( $slide['slide_image_url'] ) . ') no-repeat center; background-size: cover;';

			// Used for slider image alt text
			if ( ! empty( $slide['slide_title'] ) ) {
				$slide_alt = $slide['slide_title'];
			} else {
				$slide_alt = __( 'Slider Image', 'upeo' );
			}

			echo '<li>',
				 '<img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" style="' . esc_attr( $slide_image ) . '" alt="' . esc_attr( $slide_alt ) . '" />',
				 '<div class="rslides-content">',
				 '<div class="wrap-safari">',
				 '<div class="rslides-content-inner">',
				 '<div class="featured">';

				if ( ! empty( $slide['slide_title'] ) ) {

					// Wrap text in <span> tags
					$slide['slide_title'] = '<span>' . esc_html( $slide['slide_title'] ) . '</span>';
					$slide['slide_title'] = str_replace( '<br />', '</span><br /><span>', $slide['slide_title'] );
					$slide['slide_title'] = str_replace( '<br/>', '</span><br/><span>', $slide['slide_title'] );

					echo '<div class="featured-title">',
						 $slide['slide_title'],
						 '</div>';
				}
				if ( ! empty( $slide['slide_desc'] ) ) {
					$slide_desc = '<p><span>' . esc_html( wp_strip_all_tags( $slide['slide_desc'] ) ) . '</span></p>';

					// Wrap text in <span> tags
					$slide_desc = str_replace( '<br />', '</span><br /><span>', $slide_desc );
					$slide_desc = str_replace( '<br/>', '</span><br/><span>', $slide_desc );

					echo '<div class="featured-excerpt">',
						 $slide_desc,
						 '</div>';
				}
				if ( ! empty( $slide['slide_link'] ) ) {

					if ( empty( $slide['slide_button'] ) ) {
						$slide['slide_button'] = __( 'Read More', 'upeo' );
					}

					echo '<div class="featured-link">',
						 '<a href="' . esc_url( $slide['slide_link'] ) . '"><span>' . esc_html( $slide['slide_button'] ) . '</span></a>',
						 '</div>';
				}

			echo '</div>',
				  '</div>',
				  '</div>',
				  '</div>',
				  '</li>';
		}
	}
}

// Add Slider - Homepage
function upeo_input_sliderhome() {

// Get theme options values.
$upeo_homepage_sliderswitch       = upeo_var ( 'upeo_homepage_sliderswitch' );
$upeo_homepage_sliderimage1_image = upeo_var ( 'upeo_homepage_sliderimage1_image', 'url' );
$upeo_homepage_sliderimage2_image = upeo_var ( 'upeo_homepage_sliderimage2_image', 'url' );
$upeo_homepage_sliderimage3_image = upeo_var ( 'upeo_homepage_sliderimage3_image', 'url' );

$upeo_class_fullwidth = NULL;
$slide_image             = NULL;
$slider_default          = NULL;

	if ( is_front_page() ) {

		// Set default slider
		$slider_default .= '<li><img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" style="background: url(' . esc_url( get_stylesheet_directory_uri() ) . '/images/slideshow/slide_demo1.png) no-repeat center; background-size: cover;" alt="' . esc_attr__( 'Demo Image', 'upeo' ) . '" /></li>';
		$slider_default .= '<li><img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" style="background: url(' . esc_url( get_template_directory_uri() ) . '/images/slideshow/placeholder_image.png) no-repeat center; background-size: cover;" alt="' . esc_attr__( 'Demo Image', 'upeo' ) . '" /></li>';
		$slider_default .= '<li><img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.png" style="background: url(' . esc_url( get_template_directory_uri() ) . '/images/slideshow/placeholder_image.png) no-repeat center; background-size: cover;" alt="' . esc_attr__( 'Demo Image', 'upeo' ) . '" /></li>';

		if ( ( current_user_can( 'edit_theme_options' ) and empty( $upeo_homepage_sliderswitch ) ) or $upeo_homepage_sliderswitch == 'option1' ) {

			echo '<div id="slider"><div id="slider-core">';
			echo '<div class="rslides-container"><div class="rslides-inner"><ul class="slides">';
				echo $slider_default;
			echo '</ul></div></div>';
			echo '</div></div>';

		} else if ( $upeo_homepage_sliderswitch == 'option4' ) {

			// Check if page slider has been set
			if( empty( $upeo_homepage_sliderimage1_image ) and empty( $upeo_homepage_sliderimage2_image ) and empty( $upeo_homepage_sliderimage3_image ) ) {

				echo '<div id="slider"><div id="slider-core">';
				echo '<div class="rslides-container"><div class="rslides-inner"><ul class="slides">';
					echo $slider_default;
				echo '</ul></div></div>';
				echo '</div></div>';

			} else {

				echo '<div id="slider"><div id="slider-core">';
				echo '<div class="rslides-container"><div class="rslides-inner"><ul class="slides">';
					upeo_input_sliderhomepage();
				echo '</ul></div></div>';
				echo '</div></div>';
				
			}
		}
	}
}

// Add UpeoSlider Height - Homepage
function upeo_input_sliderhomeheight() {

// Get theme options values.
$upeo_homepage_sliderswitch       = upeo_var ( 'upeo_homepage_sliderswitch' );
$upeo_homepage_sliderpresetheight = upeo_var ( 'upeo_homepage_sliderpresetheight' );

	if ( empty( $upeo_homepage_sliderpresetheight ) ) $upeo_homepage_sliderpresetheight = '350';

	if ( is_front_page() ) {
		if ( empty( $upeo_homepage_sliderswitch ) or $upeo_homepage_sliderswitch == 'option1' or $upeo_homepage_sliderswitch == 'option4' ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
			'#slider .rslides, #slider .rslides li { height: ' . esc_attr( $upeo_homepage_sliderpresetheight ) . 'px; max-height: ' . esc_attr( $upeo_homepage_sliderpresetheight ) . 'px; }' . "\n",
			'#slider .rslides img { height: 100%; max-height: ' . esc_attr( $upeo_homepage_sliderpresetheight ) . 'px; }' . "\n",
			'</style>' . "\n";
		}
	}
}
add_action( 'wp_head','upeo_input_sliderhomeheight', '13' );


//----------------------------------------------------------------------------------
//	ENABLE HOMEPAGE CONTENT
//----------------------------------------------------------------------------------

function upeo_input_homepagesection() {

// Get theme options values.
$upeo_homepage_sectionswitch   = upeo_var ( 'upeo_homepage_sectionswitch' );
$upeo_homepage_section1_icon   = upeo_var ( 'upeo_homepage_section1_icon' );
$upeo_homepage_section1_title  = upeo_var ( 'upeo_homepage_section1_title' );
$upeo_homepage_section1_desc   = upeo_var ( 'upeo_homepage_section1_desc' );
$upeo_homepage_section1_link   = upeo_var ( 'upeo_homepage_section1_link' );
$upeo_homepage_section2_icon   = upeo_var ( 'upeo_homepage_section2_icon' );
$upeo_homepage_section2_title  = upeo_var ( 'upeo_homepage_section2_title' );
$upeo_homepage_section2_desc   = upeo_var ( 'upeo_homepage_section2_desc' );
$upeo_homepage_section2_link   = upeo_var ( 'upeo_homepage_section2_link' );
$upeo_homepage_section3_icon   = upeo_var ( 'upeo_homepage_section3_icon' );
$upeo_homepage_section3_title  = upeo_var ( 'upeo_homepage_section3_title' );
$upeo_homepage_section3_desc   = upeo_var ( 'upeo_homepage_section3_desc' );
$upeo_homepage_section3_link   = upeo_var ( 'upeo_homepage_section3_link' );
$upeo_homepage_section4_icon   = upeo_var ( 'upeo_homepage_section4_icon' );
$upeo_homepage_section4_title  = upeo_var ( 'upeo_homepage_section4_title' );
$upeo_homepage_section4_desc   = upeo_var ( 'upeo_homepage_section4_desc' );
$upeo_homepage_section4_link   = upeo_var ( 'upeo_homepage_section4_link' );

	// Determine whether 3 column or 4 column layout should be used
	if ( empty( $upeo_homepage_section4_icon ) or $upeo_homepage_section4_icon == 'default' ) {
		$class_three_col1 = ' one_third';
		$class_three_col2 = ' one_third';
		$class_three_col3 = ' one_third last';

		$class_four_col1 = NULL;
		$class_four_col2 = NULL;
		$class_four_col3 = NULL;
		$class_four_col4 = NULL;
	} else {
		$class_three_col1 = NULL;
		$class_three_col2 = NULL;
		$class_three_col3 = NULL;

		$class_four_col1 = ' one_fourth';
		$class_four_col2 = ' one_fourth';
		$class_four_col3 = ' one_fourth';
		$class_four_col4 = ' one_fourth last';
	}

	// Set default values for icons
	if ( empty( $upeo_homepage_section1_icon ) ) $upeo_homepage_section1_icon = __( 'fa fa-thumbs-up', 'upeo' );
	if ( empty( $upeo_homepage_section2_icon ) ) $upeo_homepage_section2_icon = __( 'fa fa-desktop', 'upeo' );
	if ( empty( $upeo_homepage_section3_icon ) ) $upeo_homepage_section3_icon = __( 'fa fa-gears', 'upeo' );
	if ( empty( $upeo_homepage_section4_icon ) ) $upeo_homepage_section4_icon = __( 'fa fa-gears', 'upeo' );

	// Set default values for titles
	if ( empty( $upeo_homepage_section1_title ) ) $upeo_homepage_section1_title = __( 'Step 1 &#45; Theme Options', 'upeo' );
	if ( empty( $upeo_homepage_section2_title ) ) $upeo_homepage_section2_title = __( 'Step 2 &#45; Setup Slider', 'upeo' );
	if ( empty( $upeo_homepage_section3_title ) ) $upeo_homepage_section3_title = __( 'Step 3 &#45; Create Homepage', 'upeo' );
	if ( empty( $upeo_homepage_section4_title ) ) $upeo_homepage_section4_title = __( 'Step 4 &#45; Add Content', 'upeo' );

	// Set default values for descriptions
	if ( empty( $upeo_homepage_section1_desc ) ) 
	$upeo_homepage_section1_desc = __( 'Go to Appearance &#45;&#62; Customizer to and select Theme Options to begin customizing your site. Here you&#39;ll find custom options.', 'upeo' );

	if ( empty( $upeo_homepage_section2_desc ) ) 
	$upeo_homepage_section2_desc = __( 'Go to Theme Options &#45;&#62; Homepage and choose image slider. Add content such as an image and title to your slider that want to display.', 'upeo' );

	if ( empty( $upeo_homepage_section3_desc ) ) 
	$upeo_homepage_section3_desc = __( 'Go to Theme Options &#45;&#62; Homepage (Featured) and turn the switch on then add the content you want for each section.', 'upeo' );

	if ( empty( $upeo_homepage_section4_desc ) ) 
	$upeo_homepage_section4_desc = __( 'Go to Pages &#45;&#62; Add New To start adding page content to your site. You can add content as you normally would. Have fun!', 'upeo' );

	// Get page names for links
	$upeo_homepage_section1_link_class = NULL;
	$upeo_homepage_section2_link_class = NULL;
	$upeo_homepage_section3_link_class = NULL;
	$upeo_homepage_section4_link_class = NULL;

	if ( !empty( $upeo_homepage_section1_link ) ) {
		$upeo_homepage_section1_link       = get_permalink( $upeo_homepage_section1_link );
		$upeo_homepage_section1_link_class = ' iconlink';
	}
	if ( !empty( $upeo_homepage_section2_link ) ) {
		$upeo_homepage_section2_link       = get_permalink( $upeo_homepage_section2_link );
		$upeo_homepage_section2_link_class = ' iconlink';
	}
	if ( !empty( $upeo_homepage_section3_link ) ) {
		$upeo_homepage_section3_link       = get_permalink( $upeo_homepage_section3_link );
		$upeo_homepage_section3_link_class = ' iconlink';
	}
	if ( !empty( $upeo_homepage_section4_link ) ) {
		$upeo_homepage_section4_link       = get_permalink( $upeo_homepage_section4_link );
		$upeo_homepage_section4_link_class = ' iconlink';
	}

	// Output featured content areas
	if ( is_front_page() ) {
		if ( ( current_user_can( 'edit_theme_options' ) and empty( $upeo_homepage_sectionswitch ) ) or $upeo_homepage_sectionswitch == '1' ) {

		echo '<div id="section-home"><div id="section-home-inner">';

			echo '<article class="section1' . $class_three_col1 . $class_four_col1 . '">',
					'<div class="iconfull style1' . $upeo_homepage_section1_link_class .'">',
					'<div class="iconimage">';
					if ( empty( $upeo_homepage_section1_icon ) ) {
						echo '<i class="' . esc_attr( $upeo_homepage_section1_icon ) . ' fa-lg"></i>';
					} else {
						if ( ! empty( $upeo_homepage_section1_link ) ) {
							echo '<a href="' . esc_url( $upeo_homepage_section1_link ) . '"><i class="' . esc_attr( $upeo_homepage_section1_icon ) . ' fa-lg"></i></a>';
						} else {
							echo '<i class="' . esc_attr( $upeo_homepage_section1_icon ) . ' fa-lg"></i>';
						}
					}
			echo	'</div>',
					'<div class="iconmain">',
					'<h3>' . esc_html( $upeo_homepage_section1_title ) . '</h3>' . wpautop( do_shortcode( wp_strip_all_tags( esc_html( $upeo_homepage_section1_desc ) ) ) );
					if ( ! empty( $upeo_homepage_section1_link ) ) {
						echo '<p class="iconurl"><a class="" href="' . esc_url( $upeo_homepage_section1_link ) . '">' . esc_html__( 'Read More', 'upeo' ) . '</a></p>';
					}
			echo	'</div>',
					'</div>',
				'</article>';
			echo '<article class="section2' . $class_three_col2 . $class_four_col2 . '">',
					'<div class="iconfull style1' . $upeo_homepage_section2_link_class .'">',
					'<div class="iconimage">';
					if ( empty( $upeo_homepage_section2_icon ) ) {
						echo '<i class="' . esc_attr( $upeo_homepage_section2_icon ) . ' fa-lg"></i>';
					} else {
						if ( ! empty( $upeo_homepage_section2_link ) ) {
							echo '<a href="' . esc_url( $upeo_homepage_section2_link ) . '"><i class="' . esc_attr( $upeo_homepage_section2_icon ) . ' fa-lg"></i></a>';
						} else {
							echo '<i class="' . esc_attr( $upeo_homepage_section2_icon ) . ' fa-lg"></i>';
						}
					}
			echo	'</div>',
					'<div class="iconmain">',
					'<h3>' . esc_html( $upeo_homepage_section2_title ) . '</h3>' . wpautop( do_shortcode( wp_strip_all_tags( esc_html( $upeo_homepage_section2_desc ) ) ) );
					if ( ! empty( $upeo_homepage_section2_link ) ) {
						echo '<p class="iconurl"><a class="" href="' . esc_url( $upeo_homepage_section2_link ) . '">' . esc_html__( 'Read More', 'upeo' ) . '</a></p>';
					}
			echo	'</div>',
					'</div>',
				'</article>';

			echo '<article class="section3' . $class_three_col3 . $class_four_col3 . '">',
					'<div class="iconfull style1' . $upeo_homepage_section3_link_class .'">',
					'<div class="iconimage">';
					if ( empty( $upeo_homepage_section3_icon ) ) {
						echo '<i class="' . esc_attr( $upeo_homepage_section3_icon ) . ' fa-lg"></i>';
					} else {
						if ( ! empty( $upeo_homepage_section3_link ) ) {
							echo '<a href="' . esc_url( $upeo_homepage_section3_link ) . '"><i class="' . esc_attr( $upeo_homepage_section3_icon ) . ' fa-lg"></i></a>';
						} else {
							echo '<i class="' . esc_attr( $upeo_homepage_section3_icon ) . ' fa-lg"></i>';
						}
					}
			echo	'</div>',
					'<div class="iconmain">',
					'<h3>' . esc_html( $upeo_homepage_section3_title ) . '</h3>' . wpautop( do_shortcode( wp_strip_all_tags( esc_html( $upeo_homepage_section3_desc ) ) ) );
				if ( ! empty( $upeo_homepage_section3_link ) ) {
					echo '<p class="iconurl"><a class="" href="' . esc_url( $upeo_homepage_section3_link ) . '">' . esc_html__( 'Read More', 'upeo' ) . '</a></p>';
				}
			echo	'</div>',
					'</div>',
				'</article>';

			if ( ! empty( $class_four_col4 ) ) {
				echo '<article class="section4' . $class_four_col4 . '">',
						'<div class="iconfull style1' . $upeo_homepage_section4_link_class .'">',
						'<div class="iconimage">';
						if ( empty( $upeo_homepage_section4_icon ) ) {
							echo '<i class="' . esc_attr( $upeo_homepage_section4_icon ) . ' fa-lg"></i>';
						} else {
							if ( ! empty( $upeo_homepage_section4_link ) ) {
								echo '<a href="' . esc_url( $upeo_homepage_section4_link ) . '"><i class="' . esc_attr( $upeo_homepage_section4_icon ) . ' fa-lg"></i></a>';
							} else {
								echo '<i class="' . esc_attr( $upeo_homepage_section4_icon ) . ' fa-lg"></i>';
							}
						}
				echo	'</div>',
						'<div class="iconmain">',
						'<h3>' . esc_html( $upeo_homepage_section4_title ) . '</h3>' . wpautop( do_shortcode( wp_strip_all_tags( esc_html( $upeo_homepage_section4_desc ) ) ) );
					if ( ! empty( $upeo_homepage_section4_link ) ) {
						echo '<p class="iconurl"><a class="" href="' . esc_url( $upeo_homepage_section4_link ) . '">' . esc_html__( 'Read More', 'upeo' ) . '</a></p>';
					}
				echo	'</div>',
						'</div>',
					'</article>';
			}

		echo '<div class="clearboth"></div></div></div>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	CALL TO ACTION - INTRO
---------------------------------------------------------------------------------- */

function upeo_input_ctaintro() {

// Get theme options values.
$upeo_homepage_introswitch        = upeo_var ( 'upeo_homepage_introswitch' );
$upeo_homepage_introaction        = upeo_var ( 'upeo_homepage_introaction' );
$upeo_homepage_introactionteaser  = upeo_var ( 'upeo_homepage_introactionteaser' );
$upeo_homepage_introactiontext1   = upeo_var ( 'upeo_homepage_introactiontext1' );
$upeo_homepage_introactionlink1   = upeo_var ( 'upeo_homepage_introactionlink1' );
$upeo_homepage_introactionpage1   = upeo_var ( 'upeo_homepage_introactionpage1' );
$upeo_homepage_introactioncustom1 = upeo_var ( 'upeo_homepage_introactioncustom1' );

	if ( $upeo_homepage_introswitch == '1' and is_front_page() and ! empty( $upeo_homepage_introaction ) ) {

		echo '<div id="introaction"><div id="introaction-core">';

			echo '<div class="action-message three_fourth">';

			echo '<div class="action-text">',
				 '<h3>' . esc_html( $upeo_homepage_introaction ) . '</h3>',
				 '</div>';

			echo '<div class="action-teaser">',
				 wpautop( wp_kses_post( $upeo_homepage_introactionteaser ) ),
				 '</div>';

			echo '</div>';

			if ( ( !empty( $upeo_homepage_introactionlink1) and $upeo_homepage_introactionlink1 !== 'option3' ) ) {

				// Set default value of buttons to "Read more"
				if( empty( $upeo_homepage_introactiontext1 ) ) { $upeo_homepage_introactiontext1 = esc_html__( 'Read More', 'upeo' ); }
				
				echo '<div class="action-link one_fourth last">';
					// Add call to action button 1
					if ( $upeo_homepage_introactionlink1 == 'option1' ) {
						echo '<a class="themebutton" href="' . esc_url( get_permalink( $upeo_homepage_introactionpage1 ) ) . '">',
						esc_html( $upeo_homepage_introactiontext1 ),
						'</a>';
					} else if ( $upeo_homepage_introactionlink1 == 'option2' ) {
						echo '<a class="themebutton" href="' . esc_url( $upeo_homepage_introactioncustom1 ) . '">',
						esc_html( $upeo_homepage_introactiontext1 ),
						'</a>';
					}
				echo '</div>';
			}

		echo '</div></div>';
	}
}

