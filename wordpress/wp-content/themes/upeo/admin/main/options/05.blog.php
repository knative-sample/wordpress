<?php
/**
 * Blog functions.
 *
 * @package UpeoThemes
 */


 /* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function upeo_input_blogclass($classes){

// Get theme options values.
$upeo_blog_style        = upeo_var ( 'upeo_blog_style' );
$upeo_blog_style1layout = upeo_var ( 'upeo_blog_style1layout' );

	if ( upeo_check_isblog() ) {
		if ( empty( $upeo_blog_style ) or $upeo_blog_style == 'option1' ) {
			if ( $upeo_blog_style1layout !== 'option2' ) {
				$classes[] = 'blog-style1 blog-style1-layout1';
			} else {
				$classes[] = 'blog-style1 blog-style1-layout2';
			}
		} else {
			$classes[] = 'blog-style2';
		}
	}
	return $classes;
}
add_action( 'body_class', 'upeo_input_blogclass');


/* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function upeo_input_stylelayout() {

// Get theme options values.
$upeo_blog_style        = upeo_var ( 'upeo_blog_style' );
$upeo_blog_style2layout = upeo_var ( 'upeo_blog_style2layout' );

	if ( $upeo_blog_style !== 'option2' ) {
		echo ' column-1';
	} else if ( $upeo_blog_style == 'option2' ) {			
		if ( empty($upeo_blog_style2layout) or $upeo_blog_style2layout == 'option1' ) {
			echo ' column-1';
		} else if ( $upeo_blog_style2layout == 'option2' ) {
			echo ' column-2';
		} else if ( $upeo_blog_style2layout == 'option3' ) {
			echo ' column-3';
		} else if ( $upeo_blog_style2layout == 'option4' ) {
			echo ' column-4';
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG STYLE - CLASSES FOR STYLE 1
---------------------------------------------------------------------------------- */

function upeo_input_stylelayout_class1() {
global $post;

// Get theme options values.
$upeo_blog_style        = upeo_var ( 'upeo_blog_style' );
$upeo_blog_style1layout = upeo_var ( 'upeo_blog_style1layout' );

	if ( has_post_thumbnail( $post->ID ) ) {
		if ( $upeo_blog_style !== 'option2' and $upeo_blog_style1layout !== 'option2' ) {
			echo ' one_third';
		}
	}
}

function upeo_input_stylelayout_class2() {
global $post;

// Get theme options values.
$upeo_blog_style        = upeo_var ( 'upeo_blog_style' );
$upeo_blog_style1layout = upeo_var ( 'upeo_blog_style1layout' );

	if ( has_post_thumbnail( $post->ID ) ) {
		if ( $upeo_blog_style !== 'option2' and $upeo_blog_style1layout !== 'option2' ) {
			echo ' two_third last';
		}
	}
}


/* ----------------------------------------------------------------------------------
	HIDE POST TITLE
---------------------------------------------------------------------------------- */

function upeo_input_blogtitle() {

// Get theme options values.
$upeo_blog_title = upeo_var ( 'upeo_blog_title' );

	if ( $upeo_blog_title !== '1' ) {
		echo	'<h2 class="blog-title">',
				// translators: Permalink attribute text
				'<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'upeo' ), the_title_attribute( 'echo=0' ) ) ) . '">' . esc_html( get_the_title() ) . '</a>',
				'</h2>';
	}
}


/* ----------------------------------------------------------------------------------
	BLOG CONTENT
---------------------------------------------------------------------------------- */

// Input post thumbnail / featured media
function upeo_input_blogimage() {
global $post;

// Get theme options values.
$upeo_blog_style        = upeo_var ( 'upeo_blog_style' );
$upeo_blog_style1layout = upeo_var ( 'upeo_blog_style1layout' );
$upeo_blog_style2layout = upeo_var ( 'upeo_blog_style2layout' );
$upeo_blog_lightbox     = upeo_var ( 'upeo_blog_hovercheck', 'option1' );
$upeo_blog_link         = upeo_var ( 'upeo_blog_hovercheck', 'option2' );

	$size  = NULL;
	$link  = NULL;
	$media = NULL;

	$blog_lightbox = NULL;
	$blog_link     = NULL;
	$blog_class    = NULL;
	$blog_overlay  = NULL;

	// Set image size for blog thumbnail
	if ( $upeo_blog_style !== 'option2' ) {
		if ( empty($upeo_blog_style1layout) or $upeo_blog_style1layout == 'option1' ) {
			$size = 'upeo-column2-3/4';
		} else {
			$size = 'upeo-column1-1/3';
		}
	} else if ( $upeo_blog_style == 'option2' ) {			
		if ( empty($upeo_blog_style2layout) or $upeo_blog_style2layout == 'option1' ) {
			$size = 'upeo-column1-1/3';
		} else if ( $upeo_blog_style2layout == 'option2' ) {
			$size = 'upeo-column2-1/2';
		} else if ( $upeo_blog_style2layout == 'option3' ) {
			$size = 'upeo-column3-2/3';
		} else if ( $upeo_blog_style2layout == 'option4' ) {
			$size = 'upeo-column4-2/3';
		}
	}

	$featured_id  = get_post_thumbnail_id( $post->ID );
	$featured_img = wp_get_attachment_image_src( $featured_id, 'full', true );

	// Determine featured media to input
	$link  = esc_url( $featured_img[0] );
	$media = get_the_post_thumbnail( $post->ID, $size );

	// Determine which links to show on hover
	if ( $upeo_blog_lightbox =='1' ) {
		$blog_lightbox = '<a class="hover-zoom prettyPhoto" href="' . esc_url( $link ) . '"><i class="dashicons dashicons-editor-distractionfree"></i></a>';
	}
	if ( $upeo_blog_link =='1' ) {
		$blog_link = '<a class="hover-link" href="' . esc_url( get_permalink() ) . '"><i class="dashicons dashicons-arrow-right-alt2"></i></a>';
	}

	// Determine which if single link animation should be shown
	if ( ( $upeo_blog_lightbox =='1' and $upeo_blog_link !== '1' ) 
		or ( $upeo_blog_lightbox !=='1' and $upeo_blog_link == '1' ) ) {
		$blog_class = ' style2';
	}

	if ( $upeo_blog_lightbox =='1' or $upeo_blog_link =='1' ) {
		$blog_overlay .= '<div class="image-overlay' . $blog_class . '">';
		$blog_overlay .= '<div class="image-overlay-inner"><div class="prettyphoto-wrap">';
		$blog_overlay .= $blog_lightbox;
		$blog_overlay .= $blog_link;
		$blog_overlay .= '</div></div>';
		$blog_overlay .= '</div>';
	}

	// Output media on blog page
	if ( ! empty( $featured_id ) ) {
		echo '<div class="blog-thumb">',
			 '<a href="'. esc_url( get_permalink( $post->ID ) ) . '">' . $media . '</a>',
			 $blog_overlay,
			 '</div>';
	}
}

// Input post excerpt / content to blog page
function upeo_input_blogtext() {
global $post;

// Get theme options values.
$upeo_blog_postswitch = upeo_var ( 'upeo_blog_postswitch' );

	// Output full content - EDD plugin compatibility
	if( function_exists( 'EDD' ) and is_post_type_archive( 'download' ) ) {
		the_content();
		return;
	}

	// Output post content
	if ( is_search() ) {
		the_excerpt();
	} else if ( ! is_search() ) {
		if ( ( empty( $upeo_blog_postswitch ) or $upeo_blog_postswitch == 'option1' ) ) {
			if( ! is_numeric( strpos( $post->post_content, '<!--more-->' ) ) ) {
				the_excerpt();
			} else {
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'upeo' ), 'after'  => '</div>', ) );
			}
		} else if ( $upeo_blog_postswitch == 'option2' ) {
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'upeo' ), 'after'  => '</div>', ) );
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG META CONTENT & POST META CONTENT
---------------------------------------------------------------------------------- */

// Input sticky post
function upeo_input_sticky() {
	printf( '<span class="sticky"><i class="fa fa-thumb-tack"></i><a href="%1$s" title="%2$s">' . esc_html__( 'Sticky', 'upeo' ) . '</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() )
	);
}

// Input blog date
function upeo_input_blogdate() {
	// translators: Date tags
	printf( '<span class="date"><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'M j, Y' ) )
	);
}

// Input blog comments
function upeo_input_blogcomment() {

	if ( '0' != get_comments_number() ) {
		echo	'<span class="comment">';
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {;
				comments_popup_link( __( '<i class="fa fa-comments"></i><span class="comment-count">0</span> <span class="comment-text">Comments</span>', 'upeo' ), __( '<i class="fa fa-comments"></i><span class="comment-count">1</span> <span class="comment-text">Comment</span>', 'upeo' ), __( '<i class="fa fa-comments"></i><span class="comment-count">%</span> <span class="comment-text">Comments</span>', 'upeo' ) );
			};
		echo	'</span>';
	}
}

// Input blog categories
function upeo_input_blogcategory() {
$categories_list = get_the_category_list( __( ', ', 'upeo' ) );

	if ( $categories_list && upeo_input_categorizedblog() ) {
		echo	'<span class="category"><i class="fa fa-list"></i>';
		printf( '%1$s', $categories_list );
		echo	'</span>';
	};
}

// Input blog tags
function upeo_input_blogtag() {
$tags_list = get_the_tag_list( '', __( ', ', 'upeo' ) );

	if ( $tags_list ) {
		echo	'<span class="tags"><i class="fa fa-tags"></i>';
		printf( '%1$s', $tags_list );
		echo	'</span>';
	};
}

// Input blog author
function upeo_input_blogauthor() {
	// translators: Author tags
	printf( '<span class="author"><a href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		// translators: View all posts
		esc_attr( sprintf( __( 'View all posts by %s', 'upeo' ), get_the_author() ) ), 
		get_the_author()
	);
}


//----------------------------------------------------------------------------------
//	CUSTOM READ MORE BUTTON.
//----------------------------------------------------------------------------------

function upeo_input_readmore( $link ) {
global $post;

	// Make no changes if in admin area
	if ( is_admin() ) {
		return $link;
	}

	$link = '<span class="post-excerpt-end">&hellip;</span><p class="more-link"><a href="'. esc_url( get_permalink( $post->ID ) ) . '" class="themebutton">' . __( 'Read More', 'upeo') . '</a></p>';

	return $link;
}
add_filter( 'excerpt_more', 'upeo_input_readmore' );
add_filter( 'the_content_more_link', 'upeo_input_readmore' );



/* ----------------------------------------------------------------------------------
	INPUT BLOG META COMMENT CLASS
---------------------------------------------------------------------------------- */

// Input blog comments
function upeo_input_blogcommentclass() {

// Get theme options values.
$upeo_blog_style   = upeo_var ( 'upeo_blog_style' );
$upeo_blog_comment = upeo_var ( 'upeo_blog_comment' );

	// Only output for blog layout 1
	if ( '0' != get_comments_number() ) {
		if ( ( empty( $upeo_blog_style ) or $upeo_blog_style == 'option1' ) and $upeo_blog_comment !== '1' ) {
			echo ' comment-icon';
		}
	}
}


/* ----------------------------------------------------------------------------------
	INPUT BLOG META CONTENT
---------------------------------------------------------------------------------- */

// Add format-media class to post article for featured image, gallery and video
function upeo_input_blogmediaclass($classes) {
global $post;

// Get theme options values.
$upeo_blog_postswitch = upeo_var ( 'upeo_blog_postswitch' );

	$featured_id = get_post_thumbnail_id( $post->ID );

	// Determine featured media to input
	if ( upeo_check_isblog() ) {
		if ( empty( $featured_id ) or $upeo_blog_postswitch == 'option2' ) {
			$classes[] = 'format-nomedia';	
		} else if( has_post_thumbnail() ) {
			$classes[] = 'format-media';
		}
	}
	return $classes;
}
add_action( 'post_class', 'upeo_input_blogmediaclass' );

// Blog meta content - Blog style 1
function upeo_input_blogmeta() {

	echo '<div class="entry-meta">';
		if ( is_sticky() && is_home() && ! is_paged() ) { upeo_input_sticky(); }

		upeo_input_blogdate();
		upeo_input_blogauthor();
		upeo_input_blogcomment();
		upeo_input_blogcategory();
		upeo_input_blogtag();
	echo '</div>';
}


/* ----------------------------------------------------------------------------------
	INPUT POST META CONTENT
---------------------------------------------------------------------------------- */
function upeo_input_postmedia() {
global $post;

	if ( get_post_format() == 'image' ) {

		echo '<div class="post-thumb">' . get_the_post_thumbnail( $post->ID, 'upeo-column1-1/4' ) . '</div>';

	}
}

// Add format-media class to post article for featured image, gallery and video
function upeo_input_postmediaclass($classes) {

	if ( is_singular( 'post' ) ) {
		if ( get_post_format() == 'image' or get_post_format() == 'gallery' or get_post_format() == 'video' ) {
			if( has_post_thumbnail() ) {
				$classes[] = 'format-media';
			}
		} else {
			$classes[] = 'format-nomedia';			
		}
	}
	return $classes;
}
add_action( 'post_class', 'upeo_input_postmediaclass');

function upeo_input_postmeta() {

// Reset variable values to avoid php error
$class_comment = NULL;

	// Only output for blog layout 1
	if ( '0' != get_comments_number() ) {
		$class_comment = ' comment-icon';
	}

	echo '<header class="entry-header' . $class_comment . '">';

	echo '<div class="entry-meta">';
		upeo_input_blogdate();
		upeo_input_blogauthor();
		upeo_input_blogcomment();
		upeo_input_blogcategory();
		upeo_input_blogtag();
	echo '</div>';

	echo '<div class="clearboth"></div></header><!-- .entry-header -->';
}


/* ----------------------------------------------------------------------------------
	SHOW AUTHOR BIO
---------------------------------------------------------------------------------- */

// HTML for Author Bio
function upeo_input_postauthorbiocode() {

	echo	'<div id="author-bio">',
			'<div id="author-image">',
			get_avatar( get_the_author_meta( 'email' ), '120' ),
			'</div>',
			'<div id="author-content">',
			'<div id="author-title">',
			'<p><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"/>' . esc_attr( get_the_author() ) . '</a></p>',
			'</div>';

			if ( get_the_author_meta( 'description' ) !== '' ) {
			echo '<div id="author-text">',
				 wpautop( esc_attr( get_the_author_meta( 'description' ) ) ),
				 '</div>';
			}

	echo	'</div></div>';
}

// Output Author Bio
function upeo_input_postauthorbio() {

// Get theme options values.
$upeo_post_authorbio = upeo_var ( 'upeo_post_authorbio' );

	if ( $upeo_post_authorbio == '1' ) {
		upeo_input_postauthorbiocode();
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

/* Display comments  - Style 1 */
function upeo_input_allowcomments() {

	if ( comments_open() || '0' != get_comments_number() ) {
		comments_template( '/comments.php', true );
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */

function upeo_input_commenttemplate( $comment, $args, $depth ) {

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'upeo'); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'upeo' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
					<?php echo get_avatar( $comment, 120 ); ?>
			<header>

				<div class="comment-author">
					<h4><?php printf( '%s', sprintf( '%s', get_comment_author_link() ) ); ?></h4>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'upeo'); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( '%1$s', get_comment_date() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'upeo' ), ' ' );
					?>
				</div>

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>

			</header>

			<footer>

				<div class="comment-content"><?php comment_text(); ?></div>

			</footer><div class="clearboth"></div>

		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

// List comments in single page
function upeo_input_comments() {
	$args = array( 
		'callback' => 'upeo_input_commenttemplate', 
	);
	wp_list_comments( $args );
}

