<?php
/**
 * The active callbacks used for theme options.
 *
 * @package UpeoThemes
 */
 
function upeo_customizer_callback_active_global( $control ) {

	global $upeo_prefix;

	$prefix_name = $upeo_prefix;
	$control_id  = $control->id;

	// ==========================================================================================
	// 1. CALLBACK SECTION - GET DEPENDENT VALUES
	// ==========================================================================================

	// General Settings
	$upeo_general_layout            = $control->manager->get_setting('upeo_redux_variables[upeo_general_layout]')->value();
	$upeo_general_breadcrumbswitch  = $control->manager->get_setting('upeo_redux_variables[upeo_general_breadcrumbswitch]')->value();

	// Homepage
	$upeo_homepage_layout           = $control->manager->get_setting('upeo_redux_variables[upeo_homepage_layout]')->value();
	$upeo_homepage_sliderswitch     = $control->manager->get_setting('upeo_redux_variables[upeo_homepage_sliderswitch]')->value();
	$upeo_homepage_introactionlink1 = $control->manager->get_setting('upeo_redux_variables[upeo_homepage_introactionlink1]')->value();

	// Social Media
	$upeo_header_facebookswitch      = $control->manager->get_setting('upeo_redux_variables[upeo_header_facebookswitch]')->value();
	$upeo_header_twitterswitch       = $control->manager->get_setting('upeo_redux_variables[upeo_header_twitterswitch]')->value();
	$upeo_header_googleswitch        = $control->manager->get_setting('upeo_redux_variables[upeo_header_googleswitch]')->value();
	$upeo_header_instagramswitch     = $control->manager->get_setting('upeo_redux_variables[upeo_header_instagramswitch]')->value();
	$upeo_header_tumblrswitch        = $control->manager->get_setting('upeo_redux_variables[upeo_header_tumblrswitch]')->value();
	$upeo_header_linkedinswitch      = $control->manager->get_setting('upeo_redux_variables[upeo_header_linkedinswitch]')->value();
	$upeo_header_flickrswitch        = $control->manager->get_setting('upeo_redux_variables[upeo_header_flickrswitch]')->value();
	$upeo_header_pinterestswitch     = $control->manager->get_setting('upeo_redux_variables[upeo_header_pinterestswitch]')->value();
	$upeo_header_xingswitch          = $control->manager->get_setting('upeo_redux_variables[upeo_header_xingswitch]')->value();
	$upeo_header_paypalswitch        = $control->manager->get_setting('upeo_redux_variables[upeo_header_paypalswitch]')->value();
	$upeo_header_vimeoswitch         = $control->manager->get_setting('upeo_redux_variables[upeo_header_vimeoswitch]')->value();
	$upeo_header_youtubeswitch       = $control->manager->get_setting('upeo_redux_variables[upeo_header_youtubeswitch]')->value();
	$upeo_header_rssswitch           = $control->manager->get_setting('upeo_redux_variables[upeo_header_rssswitch]')->value();
	$upeo_header_emailswitch         = $control->manager->get_setting('upeo_redux_variables[upeo_header_emailswitch]')->value();

	// Blog
	$upeo_blog_layout               = $control->manager->get_setting('upeo_redux_variables[upeo_blog_layout]')->value();
	$upeo_post_layout               = $control->manager->get_setting('upeo_redux_variables[upeo_post_layout]')->value();


	// ==========================================================================================
	// 2. CALLBACK CONTROLS - SHOW / HIDE CONTROLS
	// ==========================================================================================

	// General Settings - Page Layout
	if ( ( $upeo_general_layout == 'option2' or $upeo_general_layout == 'option3' ) and 
			$control_id == 'upeo_general_sidebars' ) {
		return true;
	}

	// General Settings - Enable Breadcrumbs
	if ( $upeo_general_breadcrumbswitch == '1' and
			$control_id == 'upeo_general_breadcrumbdelimeter' ) {
		return true;
	}

	// Homepage - Homepage Layout
	if ( ( $upeo_homepage_layout == 'option2' or $upeo_homepage_layout == 'option3' ) and 
			$control_id == 'upeo_homepage_sidebars' ) {
		return true;
	}

	// Homepage - Choose Homepage Slider
	if ( $upeo_homepage_sliderswitch == 'option4' and
			( $control_id == 'upeo_homepage_sliderimage1_info' or 
			  $control_id == 'upeo_homepage_sliderimage1_image' or 
			  $control_id == 'upeo_homepage_sliderimage1_title' or 
			  $control_id == 'upeo_homepage_sliderimage1_desc' or 
			  $control_id == 'upeo_homepage_sliderimage1_link' or 
			  $control_id == 'upeo_homepage_sliderimage2_info' or 
			  $control_id == 'upeo_homepage_sliderimage2_image' or 
			  $control_id == 'upeo_homepage_sliderimage2_title' or 
			  $control_id == 'upeo_homepage_sliderimage2_desc' or 
			  $control_id == 'upeo_homepage_sliderimage2_link' or 
			  $control_id == 'upeo_homepage_sliderimage3_info' or 
			  $control_id == 'upeo_homepage_sliderimage3_image' or 
			  $control_id == 'upeo_homepage_sliderimage3_title' or 
			  $control_id == 'upeo_homepage_sliderimage3_desc' or 
			  $control_id == 'upeo_homepage_sliderimage3_link' or 
			  $control_id == 'upeo_homepage_sliderpageinfo' or 
			  $control_id == 'upeo_homepage_sliderpresetheight' or
			  $control_id == 'upeo_homepage_sliderpresetwidth' ) ) {
		return true;
	}

	// Homepage - Call To Action - Intro
	if ( $upeo_homepage_introactionlink1 == 'option1' and
			$control_id == 'upeo_homepage_introactionpage1' ) {
		return true;
	} else if ( $upeo_homepage_introactionlink1 == 'option2' and
			$control_id == 'upeo_homepage_introactioncustom1' ) {
		return true;
	}

// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
// ====================================================================================================
// ====================================================================================================

	// Social Media - Facebook
	if ( $upeo_header_facebookswitch == '1' and
			( $control_id == 'upeo_header_facebooklink' or 
			  $control_id == 'upeo_header_facebookiconswitch' or
			  $control_id == 'upeo_header_facebookcustomicon' ) ) {
		return true;
	}

	// Social Media - Twitter
	if ( $upeo_header_twitterswitch == '1' and
			( $control_id == 'upeo_header_twitterlink' or 
			  $control_id == 'upeo_header_twittericonswitch' or
			  $control_id == 'upeo_header_twittercustomicon' ) ) {
		return true;
	}

	// Social Media - Google
	if ( $upeo_header_googleswitch == '1' and
			( $control_id == 'upeo_header_googlelink' or 
			  $control_id == 'upeo_header_googleiconswitch' or
			  $control_id == 'upeo_header_googlecustomicon' ) ) {
		return true;
	}

	// Social Media - Instagram
	if ( $upeo_header_instagramswitch == '1' and
			( $control_id == 'upeo_header_instagramlink' or 
			  $control_id == 'upeo_header_instagramiconswitch' or
			  $control_id == 'upeo_header_instagramcustomicon' ) ) {
		return true;
	}

	$upeo_header_tumblrswitch        = $control->manager->get_setting('upeo_redux_variables[upeo_header_tumblrswitch]')->value();
	// Social Media - Tumblr
	if ( $upeo_header_tumblrswitch == '1' and
			( $control_id == 'upeo_header_tumblrlink' or 
			  $control_id == 'upeo_header_tumblriconswitch' or
			  $control_id == 'upeo_header_tumblrcustomicon' ) ) {
		return true;
	}

	// Social Media - LinkedIn
	if ( $upeo_header_linkedinswitch == '1' and
			( $control_id == 'upeo_header_linkedinlink' or 
			  $control_id == 'upeo_header_linkediniconswitch' or
			  $control_id == 'upeo_header_linkedincustomicon' ) ) {
		return true;
	}

	// Social Media - Flickr
	if ( $upeo_header_flickrswitch == '1' and
			( $control_id == 'upeo_header_flickrlink' or 
			  $control_id == 'upeo_header_flickriconswitch' or
			  $control_id == 'upeo_header_flickrcustomicon' ) ) {
		return true;
	}

	// Social Media - Pinterest
	if ( $upeo_header_pinterestswitch == '1' and
			( $control_id == 'upeo_header_pinterestlink' or 
			  $control_id == 'upeo_header_pinteresticonswitch' or
			  $control_id == 'upeo_header_pinterestcustomicon' ) ) {
		return true;
	}

	// Social Media - Xing
	if ( $upeo_header_xingswitch == '1' and
			( $control_id == 'upeo_header_xinglink' or 
			  $control_id == 'upeo_header_xingiconswitch' or
			  $control_id == 'upeo_header_xingcustomicon' ) ) {
		return true;
	}

	// Social Media - PayPal
	if ( $upeo_header_paypalswitch == '1' and
			( $control_id == 'upeo_header_paypallink' or 
			  $control_id == 'upeo_header_paypaliconswitch' or
			  $control_id == 'upeo_header_paypalcustomicon' ) ) {
		return true;
	}

	// Social Media - Vimeo
	if ( $upeo_header_vimeoswitch == '1' and
			( $control_id == 'upeo_header_vimeolink' or 
			  $control_id == 'upeo_header_vimeoiconswitch' or
			  $control_id == 'upeo_header_vimeocustomicon' ) ) {
		return true;
	}

	// Social Media - YouTube
	if ( $upeo_header_youtubeswitch == '1' and
			( $control_id == 'upeo_header_youtubelink' or 
			  $control_id == 'upeo_header_youtubeiconswitch' or
			  $control_id == 'upeo_header_youtubecustomicon' ) ) {
		return true;
	}

	// Social Media - RSS
	if ( $upeo_header_rssswitch == '1' and
			( $control_id == 'upeo_header_rsslink' or 
			  $control_id == 'upeo_header_rssiconswitch' or
			  $control_id == 'upeo_header_rsscustomicon' ) ) {
		return true;
	}

	// Social Media - Email
	if ( $upeo_header_emailswitch == '1' and
			( $control_id == 'upeo_header_emaillink' or 
			  $control_id == 'upeo_header_emailiconswitch' or
			  $control_id == 'upeo_header_emailcustomicon' ) ) {
		return true;
	}

	// Blog - Blog Layout
	if ( ( $upeo_blog_layout == 'option2' or $upeo_blog_layout == 'option3' ) and 
			$control_id == 'upeo_blog_sidebars' ) {
		return true;
	}

	// Blog - Post Layout
	if ( ( $upeo_post_layout == 'option2' or $upeo_post_layout == 'option3' ) and 
			$control_id == 'upeo_post_sidebars' ) {
		return true;
	}

	return false;
}