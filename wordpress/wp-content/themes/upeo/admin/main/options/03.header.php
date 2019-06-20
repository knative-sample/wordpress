<?php
/**
 * Social media functions.
 *
 * @package UpeoThemes
 */


/* ----------------------------------------------------------------------------------
	HEADER STYLE
---------------------------------------------------------------------------------- */
function upeo_input_headerstyle($classes) {

// Get theme options values.
$upeo_header_styleswitch    = upeo_var ( 'upeo_header_styleswitch' );
$upeo_header_locationswitch = upeo_var ( 'upeo_header_locationswitch' );

	// Check which header style should be output
	if ( empty( $upeo_header_styleswitch ) or $upeo_header_styleswitch == 'option1' ) {
		$classes[] = 'header-style1';

			// Check whether header should be output above or below header
			if ( $upeo_header_locationswitch == 'option2' ) {
				$classes[] = 'header-below';
			}

	} else if ( $upeo_header_styleswitch == 'option2' ) {	
		$classes[] = 'header-style2';
	}

	return $classes;
}
add_action( 'body_class', 'upeo_input_headerstyle');


/* ----------------------------------------------------------------------------------
	HEADER LOCATION (ALSO OUTPUTS FULL #HEADER HTML
---------------------------------------------------------------------------------- */

function upeo_input_headerlocation() {
?>
		<div id="header">
		<div id="header-core">

			<div id="logo">
			<?php /* Custom Logo */ echo upeo_custom_logo(); ?>
			</div>

			<div id="header-links" class="main-navigation">
			<div id="header-links-inner" class="header-links">

				<?php $walker = new upeo_menudescription;
				wp_nav_menu(array( 'container' => false, 'theme_location'  => 'header_menu', 'walker' => new upeo_menudescription() ) ); ?>
				
				<?php /* Header Search */ upeo_input_headersearch(); ?>
			</div>
			</div>
			<!-- #header-links .main-navigation -->

			<?php /* Add responsive header menu */ upeo_input_responsivehtml1(); ?>

		</div>
		</div>
		<!-- #header -->
<?php
}

// Input #header before slider
function upeo_input_headerlocationabove() {

// Get theme options values.
$upeo_header_styleswitch    = upeo_var ( 'upeo_header_styleswitch' );
$upeo_header_locationswitch = upeo_var ( 'upeo_header_locationswitch' );

	if ( $upeo_header_styleswitch == 'option1' and $upeo_header_locationswitch == 'option2' ) {
		echo '';
	} else {
		upeo_input_headerlocation();
	}
}

// Input #header after slider
function upeo_input_headerlocationbelow() {

// Get theme options values.
$upeo_header_styleswitch    = upeo_var ( 'upeo_header_styleswitch' );
$upeo_header_locationswitch = upeo_var ( 'upeo_header_locationswitch' );

	if ( ( empty( $upeo_header_styleswitch ) or $upeo_header_styleswitch == 'option1' ) and $upeo_header_locationswitch == 'option2' ) {
		upeo_input_headerlocation();
	}
}

/* ----------------------------------------------------------------------------------
	HEADER - STICK HEADER
---------------------------------------------------------------------------------- */

function upeo_input_headersticky() {

// Get theme options values.
$upeo_header_stickyswitch    = upeo_var ( 'upeo_header_stickyswitch' );
$upeo_general_logolinksticky = upeo_var ( 'upeo_general_logolinksticky' );

$output_stickylogo = NULL;

	if ( $upeo_header_stickyswitch == '1' ) {

		// Output sticky header logo if set
		if ( ! empty( $upeo_general_logolinksticky ) ) {
			$output_stickylogo = '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $upeo_general_logolinksticky ) . '" alt="' . esc_attr__( 'Logo', 'upeo' ) . '"></a>';
		} else {
			$output_stickylogo = upeo_custom_logo();	
		}
	?>
		<div id="header-sticky">
		<div id="header-sticky-core">

			<div id="logo-sticky">
			<?php /* Custom Logo */ echo $output_stickylogo; ?>
			</div>

			<div id="header-sticky-links" class="main-navigation">
			<div id="header-sticky-links-inner" class="header-links">

				<?php $walker = new upeo_menudescription;
				wp_nav_menu(array( 'container' => false, 'theme_location'  => 'header_menu', 'walker' => new upeo_menudescription() ) ); ?>
				
				<?php /* Header Search */ upeo_input_headersearch(); ?>
			</div>
			</div><div class="clearboth"></div>
			<!-- #header-sticky-links .main-navigation -->

		</div>
		</div>
		<!-- #header-sticky -->
	<?php
	}
}


/* ----------------------------------------------------------------------------------
	STICKY HEADER
---------------------------------------------------------------------------------- */
function upeo_input_headerstickyclass($classes) {

// Get theme options values.
$upeo_header_stickyswitch = upeo_var ( 'upeo_header_stickyswitch' );

	if ( $upeo_header_stickyswitch == '1' ) {
		$classes[] = 'header-sticky';
	}
	return $classes;
}
add_action( 'body_class', 'upeo_input_headerstickyclass' );


/* ----------------------------------------------------------------------------------
	SEARCH - DISABLE SEARCH
---------------------------------------------------------------------------------- */
function upeo_input_headersearch() {

// Get theme options values.
$upeo_header_searchswitch = upeo_var ( 'upeo_header_searchswitch' );

	if ( $upeo_header_searchswitch == '1' ) {
		echo '<div id="header-search">',
			 '<a><div class="fa fa-search"></div></a>',
		     get_search_form(),
		     '</div>';
	}
}

/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - DISPLAY MESSAGE
---------------------------------------------------------------------------------- */

/* Message Settings */
function upeo_input_socialmessage(){

// Get theme options values.
$upeo_header_socialmessage   = upeo_var ( 'upeo_header_socialmessage' );
$upeo_header_facebookswitch  = upeo_var ( 'upeo_header_facebookswitch' );
$upeo_header_twitterswitch   = upeo_var ( 'upeo_header_twitterswitch' );
$upeo_header_googleswitch    = upeo_var ( 'upeo_header_googleswitch' );
$upeo_header_instagramswitch = upeo_var ( 'upeo_header_instagramswitch' );
$upeo_header_tumblrswitch    = upeo_var ( 'upeo_header_tumblrswitch' );
$upeo_header_linkedinswitch  = upeo_var ( 'upeo_header_linkedinswitch' );
$upeo_header_flickrswitch    = upeo_var ( 'upeo_header_flickrswitch' );
$upeo_header_pinterestswitch = upeo_var ( 'upeo_header_pinterestswitch' );
$upeo_header_xingswitch      = upeo_var ( 'upeo_header_xingswitch' );
$upeo_header_paypalswitch    = upeo_var ( 'upeo_header_paypalswitch' );
$upeo_header_youtubeswitch   = upeo_var ( 'upeo_header_youtubeswitch' );
$upeo_header_vimeoswitch     = upeo_var ( 'upeo_header_vimeoswitch' );
$upeo_header_rssswitch       = upeo_var ( 'upeo_header_rssswitch' );
$upeo_header_emailswitch     = upeo_var ( 'upeo_header_emailswitch' );

	if ( empty( $upeo_header_facebookswitch ) 
		and empty( $upeo_header_twitterswitch ) 
		and empty( $upeo_header_googleswitch ) 
		and empty( $upeo_header_instagramswitch ) 
		and empty( $upeo_header_tumblrswitch ) 
		and empty( $upeo_header_linkedinswitch ) 
		and empty( $upeo_header_flickrswitch ) 
		and empty( $upeo_header_pinterestswitch ) 
		and empty( $upeo_header_xingswitch ) 
		and empty( $upeo_header_paypalswitch ) 
		and empty( $upeo_header_lastfmswitch ) 
		and empty( $upeo_header_youtubeswitch ) 
		and empty( $upeo_header_vimeoswitch ) 
		and empty( $upeo_header_rssswitch ) 
		and empty( $upeo_header_emailswitch ) ) {	
		return '';
	} else if ( ! empty( $upeo_header_socialmessage ) ) {	
		return esc_html( $upeo_header_socialmessage );
	} else if ( empty( $upeo_header_socialmessage ) ) {
		return '';
	}
}


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - CUSTOM ICONS
---------------------------------------------------------------------------------- */

/* Facebook - Custom Icon */
function upeo_input_facebookicon(){

// Get theme options values.
$upeo_header_facebookiconswitch = upeo_var ( 'upeo_header_facebookiconswitch' );
$upeo_header_facebookcustomicon = upeo_var ( 'upeo_header_facebookcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_facebookiconswitch == '1' and ! empty( $upeo_header_facebookcustomicon ) ) {
		
		// Output for header social media
		$output .= '#pre-header-social li.facebook a,';
		$output .= '#pre-header-social li.facebook a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_facebookcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.facebook i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.facebook a,';
		$output .= '#post-footer-social li.facebook a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_facebookcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.facebook i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Twitter - Custom Icon */
function upeo_input_twittericon(){

// Get theme options values.
$upeo_header_twittericonswitch = upeo_var ( 'upeo_header_twittericonswitch' );
$upeo_header_twittercustomicon = upeo_var ( 'upeo_header_twittercustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_twittericonswitch == '1' and ! empty( $upeo_header_twittercustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.twitter a,';
		$output .= '#pre-header-social li.twitter a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_twittercustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.twitter i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.twitter a,';
		$output .= '#post-footer-social li.twitter a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_twittercustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.twitter i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Google+ - Custom Icon */
function upeo_input_googleicon(){

// Get theme options values.
$upeo_header_googleiconswitch = upeo_var ( 'upeo_header_googleiconswitch' );
$upeo_header_googlecustomicon = upeo_var ( 'upeo_header_googlecustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_googleiconswitch == '1' and ! empty( $upeo_header_googlecustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.google-plus a,';
		$output .= '#pre-header-social li.google-plus a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_googlecustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.google-plus i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.google-plus a,';
		$output .= '#post-footer-social li.google-plus a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_googlecustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.google-plus i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Instagram - Custom Icon */
function upeo_input_instagramicon(){

// Get theme options values.
$upeo_header_instagramiconswitch = upeo_var ( 'upeo_header_instagramiconswitch' );
$upeo_header_instagramcustomicon = upeo_var ( 'upeo_header_instagramcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_instagramiconswitch == '1' and ! empty( $upeo_header_instagramcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.instagram a,';
		$output .= '#pre-header-social li.instagram a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_instagramcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.instagram i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.instagram a,';
		$output .= '#post-footer-social li.instagram a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_instagramcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.instagram i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Tumblr - Custom Icon */
function upeo_input_tumblricon(){

// Get theme options values.
$upeo_header_tumblriconswitch = upeo_var ( 'upeo_header_tumblriconswitch' );
$upeo_header_tumblrcustomicon = upeo_var ( 'upeo_header_tumblrcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_tumblriconswitch == '1' and ! empty( $upeo_header_tumblrcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.tumblr a,';
		$output .= '#pre-header-social li.tumblr a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_tumblrcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.tumblr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.tumblr a,';
		$output .= '#post-footer-social li.tumblr a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_tumblrcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.tumblr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* LinkedIn - Custom Icon */
function upeo_input_linkedinicon(){

// Get theme options values.
$upeo_header_linkediniconswitch = upeo_var ( 'upeo_header_linkediniconswitch' );
$upeo_header_linkedincustomicon = upeo_var ( 'upeo_header_linkedincustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_linkediniconswitch == '1' and ! empty( $upeo_header_linkedincustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.linkedin a,';
		$output .= '#pre-header-social li.linkedin a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_linkedincustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.linkedin i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.linkedin a,';
		$output .= '#post-footer-social li.linkedin a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_linkedincustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.linkedin i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Flickr - Custom Icon */
function upeo_input_flickricon(){

// Get theme options values.
$upeo_header_flickriconswitch = upeo_var ( 'upeo_header_flickriconswitch' );
$upeo_header_flickrcustomicon = upeo_var ( 'upeo_header_flickrcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_flickriconswitch == '1' and ! empty( $upeo_header_flickrcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.flickr a,';
		$output .= '#pre-header-social li.flickr a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_flickrcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.flickr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.flickr a,';
		$output .= '#post-footer-social li.flickr a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_flickrcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.flickr i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Pinterest - Custom Icon */
function upeo_input_pinteresticon(){

// Get theme options values.
$upeo_header_pinteresticonswitch = upeo_var ( 'upeo_header_pinteresticonswitch' );
$upeo_header_pinterestcustomicon = upeo_var ( 'upeo_header_pinterestcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_pinteresticonswitch == '1' and ! empty( $upeo_header_pinterestcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.pinterest a,';
		$output .= '#pre-header-social li.pinterest a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_pinterestcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.pinterest i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.pinterest a,';
		$output .= '#post-footer-social li.pinterest a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_pinterestcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.pinterest i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Xing - Custom Icon */
function upeo_input_xingicon(){

// Get theme options values.
$upeo_header_xingiconswitch = upeo_var ( 'upeo_header_xingiconswitch' );
$upeo_header_xingcustomicon = upeo_var ( 'upeo_header_xingcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_xingiconswitch == '1' and ! empty( $upeo_header_xingcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.xing a,';
		$output .= '#pre-header-social li.xing a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_xingcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.xing i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.xing a,';
		$output .= '#post-footer-social li.xing a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_xingcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.xing i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* PayPal - Custom Icon */
function upeo_input_paypalicon(){

// Get theme options values.
$upeo_header_paypaliconswitch = upeo_var ( 'upeo_header_paypaliconswitch' );
$upeo_header_paypalcustomicon = upeo_var ( 'upeo_header_paypalcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_paypaliconswitch == '1' and ! empty( $upeo_header_paypalcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.paypal a,';
		$output .= '#pre-header-social li.paypal a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_paypalcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.paypal i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.paypal a,';
		$output .= '#post-footer-social li.paypal a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_paypalcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.paypal i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* YouTube - Custom Icon */
function upeo_input_youtubeicon(){

// Get theme options values.
$upeo_header_youtubeiconswitch = upeo_var ( 'upeo_header_youtubeiconswitch' );
$upeo_header_youtubecustomicon = upeo_var ( 'upeo_header_youtubecustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_youtubeiconswitch == '1' and ! empty( $upeo_header_youtubecustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.youtube a,';
		$output .= '#pre-header-social li.youtube a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_youtubecustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.youtube i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.youtube a,';
		$output .= '#post-footer-social li.youtube a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_youtubecustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.youtube i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Vimeo - Custom Icon */
function upeo_input_vimeoicon(){

// Get theme options values.
$upeo_header_vimeoiconswitch = upeo_var ( 'upeo_header_vimeoiconswitch' );
$upeo_header_vimeocustomicon = upeo_var ( 'upeo_header_vimeocustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_vimeoiconswitch == '1' and ! empty( $upeo_header_vimeocustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.vimeo-square a,';
		$output .= '#pre-header-social li.vimeo-square a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_vimeocustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.vimeo-square i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.vimeo-square a,';
		$output .= '#post-footer-social li.vimeo-square a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_vimeocustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.vimeo-square i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* RSS - Custom Icon */
function upeo_input_rssicon(){

// Get theme options values.
$upeo_header_rssiconswitch = upeo_var ( 'upeo_header_rssiconswitch' );
$upeo_header_rsscustomicon = upeo_var ( 'upeo_header_rsscustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_rssiconswitch == '1' and ! empty( $upeo_header_rsscustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.rss a,';
		$output .= '#pre-header-social li.rss a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_rsscustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.rss i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.rss a,';
		$output .= '#post-footer-social li.rss a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_rsscustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.rss i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Email - Custom Icon */
function upeo_input_emailicon(){

// Get theme options values.
$upeo_header_emailiconswitch = upeo_var ( 'upeo_header_emailiconswitch' );
$upeo_header_emailcustomicon = upeo_var ( 'upeo_header_emailcustomicon', 'url' );

	$output = NULL;

	if ( $upeo_header_emailiconswitch == '1' and ! empty( $upeo_header_emailcustomicon ) ) {

		// Output for header social media
		$output .= '#pre-header-social li.envelope a,';
		$output .= '#pre-header-social li.envelope a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_emailcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#pre-header-social li.envelope i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

		// Output for footer social media
		$output .= '#post-footer-social li.envelope a,';
		$output .= '#post-footer-social li.envelope a:hover {';
		$output .= 'background: url("' . esc_url( $upeo_header_emailcustomicon ) . '") no-repeat center;';
		$output .= 'background-size: 25px;';
		$output .= '-webkit-border-radius: 0;';
		$output .= '-moz-border-radius: 0;';
		$output .= '-o-border-radius: 0;';
		$output .= 'border-radius: 0;';
		$output .= '}' . "\n";
		$output .= '#post-footer-social li.envelope i {';
		$output .= 'display: none;';
		$output .= '}' . "\n";

	}
	return $output;
}

/* Input Custom Social Media Icons */
function upeo_input_socialicon(){

	$output = NULL;
	
	$output .= upeo_input_facebookicon();
	$output .= upeo_input_twittericon();
	$output .= upeo_input_googleicon();
	$output .= upeo_input_instagramicon();
	$output .= upeo_input_tumblricon();
	$output .= upeo_input_linkedinicon();
	$output .= upeo_input_flickricon();
	$output .= upeo_input_pinteresticon();
	$output .= upeo_input_xingicon();
	$output .= upeo_input_paypalicon();
	$output .= upeo_input_youtubeicon();
	$output .= upeo_input_vimeoicon();
	$output .= upeo_input_rssicon();
	$output .= upeo_input_emailicon();

	if ( ! empty( $output ) ) {
		echo '<style type="text/css">' . "\n" . $output . '</style>';
	}
}
add_action( 'wp_head', 'upeo_input_socialicon', 13 );


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS (HEADER) (ADD IN LATER)
---------------------------------------------------------------------------------- */

function upeo_input_socialmediaheader() {

// Get theme options values.
$upeo_header_socialswitch    = upeo_var ( 'upeo_header_socialswitch' );
$upeo_header_socialmessage   = upeo_var ( 'upeo_header_socialmessage' );
$upeo_header_facebookswitch  = upeo_var ( 'upeo_header_facebookswitch' );
$upeo_header_facebooklink    = upeo_var ( 'upeo_header_facebooklink' );
$upeo_header_twitterswitch   = upeo_var ( 'upeo_header_twitterswitch' );
$upeo_header_twitterlink     = upeo_var ( 'upeo_header_twitterlink' );
$upeo_header_googleswitch    = upeo_var ( 'upeo_header_googleswitch' );
$upeo_header_googlelink      = upeo_var ( 'upeo_header_googlelink' );
$upeo_header_instagramswitch = upeo_var ( 'upeo_header_instagramswitch' );
$upeo_header_instagramlink   = upeo_var ( 'upeo_header_instagramlink' );
$upeo_header_tumblrswitch    = upeo_var ( 'upeo_header_tumblrswitch' );
$upeo_header_tumblrlink      = upeo_var ( 'upeo_header_tumblrlink' );
$upeo_header_linkedinswitch  = upeo_var ( 'upeo_header_linkedinswitch' );
$upeo_header_linkedinlink    = upeo_var ( 'upeo_header_linkedinlink' );
$upeo_header_flickrswitch    = upeo_var ( 'upeo_header_flickrswitch' );
$upeo_header_flickrlink      = upeo_var ( 'upeo_header_flickrlink' );
$upeo_header_pinterestswitch = upeo_var ( 'upeo_header_pinterestswitch' );
$upeo_header_pinterestlink   = upeo_var ( 'upeo_header_pinterestlink' );
$upeo_header_xingswitch      = upeo_var ( 'upeo_header_xingswitch' );
$upeo_header_xinglink        = upeo_var ( 'upeo_header_xinglink' );
$upeo_header_paypalswitch    = upeo_var ( 'upeo_header_paypalswitch' );
$upeo_header_paypallink      = upeo_var ( 'upeo_header_paypallink' );
$upeo_header_vimeoswitch     = upeo_var ( 'upeo_header_vimeoswitch' );
$upeo_header_vimeolink       = upeo_var ( 'upeo_header_vimeolink' );
$upeo_header_youtubeswitch   = upeo_var ( 'upeo_header_youtubeswitch' );
$upeo_header_youtubelink     = upeo_var ( 'upeo_header_youtubelink' );
$upeo_header_rssswitch       = upeo_var ( 'upeo_header_rssswitch' );
$upeo_header_rsslink         = upeo_var ( 'upeo_header_rsslink' );
$upeo_header_emailswitch     = upeo_var ( 'upeo_header_emailswitch' );
$upeo_header_emaillink       = upeo_var ( 'upeo_header_emaillink' );

// Reset count values used in foreach loop
$i = 0;
$j = 0;

	if ( $upeo_header_socialswitch == '1' ) {

		// Assign social media link to an array
		$social_links = array( 
			array( 'social' => 'Facebook',  'icon' => 'facebook',     'toggle' => $upeo_header_facebookswitch,  'link' => $upeo_header_facebooklink ),
			array( 'social' => 'Twitter',   'icon' => 'twitter',      'toggle' => $upeo_header_twitterswitch,   'link' => $upeo_header_twitterlink ),
			array( 'social' => 'Google+',   'icon' => 'google-plus',  'toggle' => $upeo_header_googleswitch,    'link' => $upeo_header_googlelink ),
			array( 'social' => 'Instagram', 'icon' => 'instagram',    'toggle' => $upeo_header_instagramswitch, 'link' => $upeo_header_instagramlink ),
			array( 'social' => 'Tumblr',    'icon' => 'tumblr',       'toggle' => $upeo_header_tumblrswitch,    'link' => $upeo_header_tumblrlink ),
			array( 'social' => 'LinkedIn',  'icon' => 'linkedin',     'toggle' => $upeo_header_linkedinswitch,  'link' => $upeo_header_linkedinlink ),
			array( 'social' => 'Flickr',    'icon' => 'flickr',       'toggle' => $upeo_header_flickrswitch,    'link' => $upeo_header_flickrlink ),
			array( 'social' => 'Pinterest', 'icon' => 'pinterest',    'toggle' => $upeo_header_pinterestswitch, 'link' => $upeo_header_pinterestlink ),
			array( 'social' => 'Xing',      'icon' => 'xing',         'toggle' => $upeo_header_xingswitch,      'link' => $upeo_header_xinglink ),
			array( 'social' => 'PayPal',    'icon' => 'paypal',       'toggle' => $upeo_header_paypalswitch,    'link' => $upeo_header_paypallink ),
			array( 'social' => 'Vimeo',     'icon' => 'vimeo-square', 'toggle' => $upeo_header_vimeoswitch,     'link' => $upeo_header_vimeolink ),
			array( 'social' => 'YouTube',   'icon' => 'youtube',      'toggle' => $upeo_header_youtubeswitch,   'link' => $upeo_header_youtubelink ),
			array( 'social' => 'RSS',       'icon' => 'rss',          'toggle' => $upeo_header_rssswitch,       'link' => $upeo_header_rsslink ),
			array( 'social' => 'Email',     'icon' => 'envelope',     'toggle' => $upeo_header_emailswitch,     'link' => $upeo_header_emaillink ),
		);


		// Output social media links if any link is set
		foreach( $social_links as $social ) {	
			if ( ! empty( $social['link'] ) and $j == 0 ) {
				echo '<div id="pre-header-social"><ul>'; $j = 1;

				if ( ! empty ( $upeo_header_socialmessage ) ) {
					echo '<li class="social message">' . upeo_input_socialmessage() . '</li>';
				}
			}

			if ( ! empty( $social['link'] ) and $social['toggle'] == '1' ) {

			echo '<li class="social ' . esc_attr( $social['icon'] ) . '">',
				 '<a href="' . esc_url( $social['link'] ) . '" data-tip="bottom" data-original-title="' . esc_attr( $social['social'] ) . '" target="_blank">',
				 '<i class="fa fa-' . esc_attr( $social['icon'] ) . '"></i>',
				 '</a>',
				 '</li>';
			}
		}

		// Close list output of social media links if any link is set
		if ( $j !== 0 ) echo '</ul></div>';
	}
}


/* ----------------------------------------------------------------------------------
	SOCIAL MEDIA - OUTPUT SOCIAL MEDIA SELECTIONS (FOOTER)
---------------------------------------------------------------------------------- */

function upeo_input_socialmediafooter() {

// Get theme options values.
$upeo_header_socialswitchfooter = upeo_var ( 'upeo_header_socialswitchfooter' );
$upeo_header_socialmessage      = upeo_var ( 'upeo_header_socialmessage' );
$upeo_header_facebookswitch     = upeo_var ( 'upeo_header_facebookswitch' );
$upeo_header_facebooklink       = upeo_var ( 'upeo_header_facebooklink' );
$upeo_header_twitterswitch      = upeo_var ( 'upeo_header_twitterswitch' );
$upeo_header_twitterlink        = upeo_var ( 'upeo_header_twitterlink' );
$upeo_header_googleswitch       = upeo_var ( 'upeo_header_googleswitch' );
$upeo_header_googlelink         = upeo_var ( 'upeo_header_googlelink' );
$upeo_header_instagramswitch    = upeo_var ( 'upeo_header_instagramswitch' );
$upeo_header_instagramlink      = upeo_var ( 'upeo_header_instagramlink' );
$upeo_header_tumblrswitch       = upeo_var ( 'upeo_header_tumblrswitch' );
$upeo_header_tumblrlink         = upeo_var ( 'upeo_header_tumblrlink' );
$upeo_header_linkedinswitch     = upeo_var ( 'upeo_header_linkedinswitch' );
$upeo_header_linkedinlink       = upeo_var ( 'upeo_header_linkedinlink' );
$upeo_header_flickrswitch       = upeo_var ( 'upeo_header_flickrswitch' );
$upeo_header_flickrlink         = upeo_var ( 'upeo_header_flickrlink' );
$upeo_header_pinterestswitch    = upeo_var ( 'upeo_header_pinterestswitch' );
$upeo_header_pinterestlink      = upeo_var ( 'upeo_header_pinterestlink' );
$upeo_header_xingswitch         = upeo_var ( 'upeo_header_xingswitch' );
$upeo_header_xinglink           = upeo_var ( 'upeo_header_xinglink' );
$upeo_header_paypalswitch       = upeo_var ( 'upeo_header_paypalswitch' );
$upeo_header_paypallink         = upeo_var ( 'upeo_header_paypallink' );
$upeo_header_vimeoswitch        = upeo_var ( 'upeo_header_vimeoswitch' );
$upeo_header_vimeolink          = upeo_var ( 'upeo_header_vimeolink' );
$upeo_header_youtubeswitch      = upeo_var ( 'upeo_header_youtubeswitch' );
$upeo_header_youtubelink        = upeo_var ( 'upeo_header_youtubelink' );
$upeo_header_rssswitch          = upeo_var ( 'upeo_header_rssswitch' );
$upeo_header_rsslink            = upeo_var ( 'upeo_header_rsslink' );
$upeo_header_emailswitch        = upeo_var ( 'upeo_header_emailswitch' );
$upeo_header_emaillink          = upeo_var ( 'upeo_header_emaillink' );

// Reset count values used in foreach loop
$i = 0;
$j = 0;

	if ( $upeo_header_socialswitchfooter == '1' ) {
	
		// Assign social media link to an array
		$social_links = array( 
			array( 'social' => 'Facebook',  'icon' => 'facebook',     'toggle' => $upeo_header_facebookswitch,  'link' => $upeo_header_facebooklink ),
			array( 'social' => 'Twitter',   'icon' => 'twitter',      'toggle' => $upeo_header_twitterswitch,   'link' => $upeo_header_twitterlink ),
			array( 'social' => 'Google+',   'icon' => 'google-plus',  'toggle' => $upeo_header_googleswitch,    'link' => $upeo_header_googlelink ),
			array( 'social' => 'Instagram', 'icon' => 'instagram',    'toggle' => $upeo_header_instagramswitch, 'link' => $upeo_header_instagramlink ),
			array( 'social' => 'Tumblr',    'icon' => 'tumblr',       'toggle' => $upeo_header_tumblrswitch,    'link' => $upeo_header_tumblrlink ),
			array( 'social' => 'LinkedIn',  'icon' => 'linkedin',     'toggle' => $upeo_header_linkedinswitch,  'link' => $upeo_header_linkedinlink ),
			array( 'social' => 'Flickr',    'icon' => 'flickr',       'toggle' => $upeo_header_flickrswitch,    'link' => $upeo_header_flickrlink ),
			array( 'social' => 'Pinterest', 'icon' => 'pinterest',    'toggle' => $upeo_header_pinterestswitch, 'link' => $upeo_header_pinterestlink ),
			array( 'social' => 'Xing',      'icon' => 'xing',         'toggle' => $upeo_header_xingswitch,      'link' => $upeo_header_xinglink ),
			array( 'social' => 'PayPal',    'icon' => 'paypal',       'toggle' => $upeo_header_paypalswitch,    'link' => $upeo_header_paypallink ),
			array( 'social' => 'Vimeo',     'icon' => 'vimeo-square', 'toggle' => $upeo_header_vimeoswitch,     'link' => $upeo_header_vimeolink ),
			array( 'social' => 'YouTube',   'icon' => 'youtube',      'toggle' => $upeo_header_youtubeswitch,   'link' => $upeo_header_youtubelink ),
			array( 'social' => 'RSS',       'icon' => 'rss',          'toggle' => $upeo_header_rssswitch,       'link' => $upeo_header_rsslink ),
			array( 'social' => 'Email',     'icon' => 'envelope',     'toggle' => $upeo_header_emailswitch,     'link' => $upeo_header_emaillink ),
		);


		// Output social media links if any link is set
		foreach( $social_links as $social ) {	
			if ( ! empty( $social['link'] ) and $j == 0 ) {
				echo '<div id="post-footer-social"><ul>'; $j = 1;

				if ( ! empty ( $upeo_header_socialmessage ) ) {
					echo '<li class="social message">' . upeo_input_socialmessage() . '</li>';
				}
			}

			if ( ! empty( $social['link'] ) and $social['toggle'] == '1' ) {

			echo '<li class="social ' . esc_attr( $social['icon'] ) . '">',
				 '<a href="' . esc_url( $social['link'] ) . '" data-tip="top" data-original-title="' . esc_attr( $social['social'] ) . '" target="_blank">',
				 '<i class="fa fa-' . esc_attr( $social['icon'] ) . '"></i>',
				 '</a>',
				 '</li>';
			}
		}

		// Close list output of social media links if any link is set
		if ( $j !== 0 ) echo '</ul></div>';
	}
}

