<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package Beetle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-post clearfix' ); ?>>

	<?php beetle_post_image( 'beetle-thumbnail-medium' ); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php beetle_magazine_entry_date(); ?>

	</header><!-- .entry-header -->

</article>
