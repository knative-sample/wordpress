<?php
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Beetle
 */

if ( ! function_exists( 'beetle_site_logo' ) ) :
	/**
	 * Displays the site logo in the header area
	 */
	function beetle_site_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {

			the_custom_logo();

		}
	}
endif;


if ( ! function_exists( 'beetle_site_title' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function beetle_site_title() {

		// Get theme options from database.
		$theme_options = beetle_theme_options();

		if ( ( is_home() and '' === $theme_options['blog_title'] ) or is_page_template( 'template-magazine.php' )  ) : ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'beetle_site_description' ) ) :
	/**
	 * Displays the site description in the header area
	 */
	function beetle_site_description() {

		$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

		if ( $description || is_customize_preview() ) : ?>

			<p class="site-description"><?php echo $description; ?></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'beetle_header_image' ) ) :
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function beetle_header_image() {

		// Get theme options from database.
		$theme_options = beetle_theme_options();

		// Display featured image as header image on static pages.
		if ( is_page() && has_post_thumbnail() ) : ?>

			<div id="headimg" class="header-image featured-image-header">
				<?php the_post_thumbnail( 'beetle-header-image' ); ?>
			</div>

		<?php // Display default header image set on Appearance > Header.
		elseif ( get_header_image() ) :

			// Hide header image on front page.
			if ( true === $theme_options['custom_header_hide'] and is_front_page() ) {
				return;
			}
			?>

			<div id="headimg" class="header-image">

			<?php // Check if custom header image is linked.
			if ( '' !== $theme_options['custom_header_link'] ) : ?>

				<a href="<?php echo esc_url( $theme_options['custom_header_link'] ); ?>">
					<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>

			<?php else : ?>

				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

			<?php endif; ?>

			</div>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'beetle_post_content' ) ) :
	/**
	 * Displays the post content on archive pages
	 */
	function beetle_post_content() {

		// Get theme options from database.
		$theme_options = beetle_theme_options();

		// Return early if no featured image should be displayed.
		if ( 'excerpt' === $theme_options['post_content'] ) {

			the_excerpt();
			beetle_more_link();

		} else {

			the_content( esc_html__( 'Read more', 'beetle' ) );

		}
	}
endif;


if ( ! function_exists( 'beetle_post_image' ) ) :
	/**
	 * Displays the featured image on archive posts.
	 *
	 * @param string $size Post thumbnail size.
	 * @param array  $attr Post thumbnail attributes.
	 */
	function beetle_post_image( $size = 'post-thumbnail', $attr = array() ) {

		// Display Post Thumbnail.
		if ( has_post_thumbnail() ) : ?>

			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( $size, $attr ); ?>
			</a>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'beetle_post_image_single' ) ) :
	/**
	 * Displays the featured image on single posts
	 */
	function beetle_post_image_single() {

		// Get theme options from database.
		$theme_options = beetle_theme_options();

		// Display Post Thumbnail if activated.
		if ( true === $theme_options['post_image'] ) :

			the_post_thumbnail();

		endif;
	}
endif;


if ( ! function_exists( 'beetle_entry_meta' ) ) :
	/**
	 * Displays the date, author and categories of a post
	 */
	function beetle_entry_meta() {

		$postmeta = beetle_meta_date();
		$postmeta .= beetle_meta_author();
		$postmeta .= beetle_meta_category();

		echo '<div class="entry-meta">' . $postmeta . '</div>';
	}
endif;


if ( ! function_exists( 'beetle_meta_date' ) ) :
	/**
	 * Displays the post date
	 */
	function beetle_meta_date() {

		$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		return '<span class="meta-date">' . $time_string . '</span>';
	}
endif;


if ( ! function_exists( 'beetle_meta_author' ) ) :
	/**
	 * Displays the post author
	 */
	function beetle_meta_author() {

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'beetle' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		return '<span class="meta-author"> ' . $author_string . '</span>';
	}
endif;


if ( ! function_exists( 'beetle_meta_category' ) ) :
	/**
	 * Displays the category of posts
	 */
	function beetle_meta_category() {

		return '<span class="meta-category"> ' . get_the_category_list( ', ' ) . '</span>';

	}
endif;


if ( ! function_exists( 'beetle_entry_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function beetle_entry_tags() {

		// Get tags.
		$tag_list = get_the_tag_list( '', '' );

		// Display tags.
		if ( $tag_list ) : ?>

			<div class="entry-tags clearfix">
				<span class="meta-tags">
					<?php echo $tag_list; ?>
				</span>
			</div><!-- .entry-tags -->

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'beetle_more_link' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function beetle_more_link() {
		?>

		<a href="<?php echo esc_url( get_permalink() ) ?>" class="more-link"><?php esc_html_e( 'Read more', 'beetle' ); ?></a>

		<?php
	}
endif;


if ( ! function_exists( 'beetle_post_navigation' ) ) :
	/**
	 * Displays Single Post Navigation
	 */
	function beetle_post_navigation() {

		// Get theme options from database.
		$theme_options = beetle_theme_options();

		if ( true === $theme_options['post_navigation'] || is_customize_preview() ) {

			the_post_navigation( array(
				'prev_text' => '<span class="screen-reader-text">' . esc_html_x( 'Previous Post:', 'post navigation', 'beetle' ) . '</span>%title',
				'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Post:', 'post navigation', 'beetle' ) . '</span>%title',
			) );

		}
	}
endif;


if ( ! function_exists( 'beetle_breadcrumbs' ) ) :
	/**
	 * Displays ThemeZee Breadcrumbs plugin
	 */
	function beetle_breadcrumbs() {

		if ( function_exists( 'themezee_breadcrumbs' ) ) {

			themezee_breadcrumbs( array(
				'before' => '<div class="breadcrumbs-container clearfix">',
				'after' => '</div>',
			) );

		}
	}
endif;


if ( ! function_exists( 'beetle_related_posts' ) ) :
	/**
	 * Displays ThemeZee Related Posts plugin
	 */
	function beetle_related_posts() {

		if ( function_exists( 'themezee_related_posts' ) ) {

			themezee_related_posts( array(
				'class' => 'related-posts type-page clearfix',
				'before_title' => '<header class="page-header"><h2 class="archive-title related-posts-title">',
				'after_title' => '</h2></header>',
			) );

		}
	}
endif;


if ( ! function_exists( 'beetle_pagination' ) ) :
	/**
	 * Displays pagination on archive pages
	 */
	function beetle_pagination() {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&laquo<span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'beetle' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'beetle' ) . '</span>&raquo;',
		) );

	}
endif;


/**
 * Displays credit link on footer line
 */
function beetle_footer_text() {
	?>

	<span class="credit-link">
		<?php
		// translators: Theme Name and Link to ThemeZee.
		printf( esc_html__( 'WordPress Theme: %1$s by %2$s.', 'beetle' ),
			esc_html__( 'Beetle', 'beetle' ),
			'<a href="https://themezee.com/" target="_blank" rel="nofollow">ThemeZee</a>'
		);
		?>
	</span>

	<?php
}
add_action( 'beetle_footer_text', 'beetle_footer_text' );
