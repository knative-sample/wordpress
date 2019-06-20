<?php
/**
 * Footer functions.
 *
 * @package UpeoThemes
 */

/* ----------------------------------------------------------------------------------
	FOOTER WIDGETS LAYOUT
---------------------------------------------------------------------------------- */

/* Assign function for widget area 1 */
function upeo_input_footerw1() {
	echo	'<div id="footer-col1" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w1' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 1.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Assign function for widget area 2 */
function upeo_input_footerw2() {
	echo	'<div id="footer-col2" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w2' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 2.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Assign function for widget area 3 */
function upeo_input_footerw3() {
	echo	'<div id="footer-col3" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w3' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 3.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 4 */
function upeo_input_footerw4() {
	echo	'<div id="footer-col4" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w4' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 4.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 5 */
function upeo_input_footerw5() {
	echo	'<div id="footer-col5" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w5' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 5.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 6 */
function upeo_input_footerw6() {
	echo	'<div id="footer-col6" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w6' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 6.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}


/* Add Custom Footer Layout */
function upeo_input_footerlayout() {	

// Get theme options values.
$upeo_footer_layout       = upeo_var ( 'upeo_footer_layout' );
$upeo_footer_widgetswitch = upeo_var ( 'upeo_footer_widgetswitch' );

	if ( $upeo_footer_widgetswitch != "1" and ! empty( $upeo_footer_layout )  ) {
		echo	'<div id="footer">';
			if ( $upeo_footer_layout == "option1" ) {
				echo	'<div id="footer-core" class="option1">';
						upeo_input_footerw1();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option2" ) {
				echo	'<div id="footer-core" class="option2">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option3" ) {
				echo	'<div id="footer-core" class="option3">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option4" ) {
				echo	'<div id="footer-core" class="option4">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option5" ) {
				echo	'<div id="footer-core" class="option5">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
						upeo_input_footerw5();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option6" ) {
				echo	'<div id="footer-core" class="option6">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
						upeo_input_footerw5();
						upeo_input_footerw6();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option7" ) {
				echo	'<div id="footer-core" class="option7">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option8" ) {
				echo	'<div id="footer-core" class="option8">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option9" ) {
				echo	'<div id="footer-core" class="option9">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option10" ) {
				echo	'<div id="footer-core" class="option10">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option11" ) {
				echo	'<div id="footer-core" class="option11">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option12" ) {
				echo	'<div id="footer-core" class="option12">';
						upeo_input_footerw1();
						upeo_input_footerw2();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option13" ) {
				echo	'<div id="footer-core" class="option13">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option14" ) {
				echo	'<div id="footer-core" class="option14">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option15" ) {
				echo	'<div id="footer-core" class="option15">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option16" ) {
				echo	'<div id="footer-core" class="option16">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option17" ) {
				echo	'<div id="footer-core" class="option17">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
						upeo_input_footerw5();
				echo	'</div>';
			} else if ( $upeo_footer_layout == "option18" ) {
				echo	'<div id="footer-core" class="option18">';
						upeo_input_footerw1();
						upeo_input_footerw2();
						upeo_input_footerw3();
						upeo_input_footerw4();
						upeo_input_footerw5();

				echo	'</div>';
			}
		echo	'</div>';
	}
}


/* ----------------------------------------------------------------------------------
	SUB-FOOTER WIDGETS LAYOUT
---------------------------------------------------------------------------------- */

/* Assign function for widget area 1 */
function upeo_input_subfooterw1() {
	echo	'<div id="sub-footer-col1" class="widget-area">';
	if ( ! dynamic_sidebar( 'sub-footer-w1' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 1.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Assign function for widget area 2 */
function upeo_input_subfooterw2() {
	echo	'<div id="sub-footer-col2" class="widget-area">';
	if ( ! dynamic_sidebar( 'sub-footer-w2' ) and current_user_can( 'edit_theme_options' ) ) {
	echo	'<h3 class="widget-title">' . esc_html__( 'Please Add Widgets', 'upeo') . '</h3>',
			'<div class="error-icon">',
			'<p>' . esc_html__( 'Remove this message by adding widgets to Footer Widget Area 2.', 'upeo') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . esc_attr__( 'No Widgets Selected', 'upeo' ) . '">' . esc_html__( 'Click here to go to Widget area.', 'upeo') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Add Custom Sub-Footer Layout */
function upeo_input_subfooterlayout() {	

// Get theme options values.
$upeo_subfooter_layout       = upeo_var ( 'upeo_subfooter_layout' );
$upeo_subfooter_widgetswitch = upeo_var ( 'upeo_subfooter_widgetswitch' );
$upeo_subfooter_widgetclose  = upeo_var ( 'upeo_subfooter_widgetclose' );

	if ( $upeo_subfooter_widgetswitch !== "1" and ! empty( $upeo_subfooter_layout )  ) {

		// Output sub-footer widgets close button
		if ( $upeo_subfooter_widgetclose == '1' ) {
			echo '<div id="sub-footer-close"><div id="sub-footer-close-core"></div></div>';	
		}
		
		// Output sub-footer widgets
		if ( $upeo_subfooter_layout == "option1" ) {
			echo	'<div id="sub-footer-widgets" class="option1">';
					upeo_input_subfooterw1();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option2" ) {
			echo	'<div id="sub-footer-widgets" class="option2">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option3" ) {
			echo	'<div id="sub-footer-widgets" class="option3">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option4" ) {
			echo	'<div id="sub-footer-widgets" class="option4">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option5" ) {
			echo	'<div id="sub-footer-widgets" class="option5">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option6" ) {
			echo	'<div id="sub-footer-widgets" class="option6">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option7" ) {
			echo	'<div id="sub-footer-widgets" class="option7">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		} else if ( $upeo_subfooter_layout == "option8" ) {
			echo	'<div id="sub-footer-widgets" class="option8">';
					upeo_input_subfooterw1();
					upeo_input_subfooterw2();
			echo	'</div>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	SCROLL TO TOP
---------------------------------------------------------------------------------- */
function upeo_input_footerscroll( $classes ) {

// Get theme options values.
$upeo_footer_scroll = upeo_var ( 'upeo_footer_scroll' );

	if ( $upeo_footer_scroll == '1' ) {
		$classes[] = 'scrollup-on';
	}
	return $classes;
}
add_action( 'body_class', 'upeo_input_footerscroll');


/* ----------------------------------------------------------------------------------
	COPYRIGHT TEXT
---------------------------------------------------------------------------------- */

function upeo_input_copyright() {

	// translators: Copyright text
	printf( esc_html__( 'Developed by %1$s. Powered by %2$s.', 'upeo' ) , '<a href="https://upeothemes.com/" target="_blank">Upeo Themes</a>', '<a href="//www.wordpress.org/" target="_blank">WordPress</a>'); 
}

