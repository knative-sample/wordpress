<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beetle
 */

get_header();

// Get Theme Options from Database.
$theme_options = beetle_theme_options();

// Display Slider.
if ( true === $theme_options['slider_blog'] ) :

	get_template_part( 'template-parts/post-slider' );

endif;
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		beetle_magazine_widgets();

		if ( have_posts() ) :

			// Display Latest Posts Title.
			if ( '' !== $theme_options['blog_title'] ) : ?>

				<header class="page-header">

					<h1 class="archive-title"><?php echo esc_html( $theme_options['blog_title'] ); ?></h1>

				</header><!-- .page-header -->

			<?php endif;

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', $theme_options['post_layout'] );

			endwhile;

			// Display Pagination.
			beetle_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
