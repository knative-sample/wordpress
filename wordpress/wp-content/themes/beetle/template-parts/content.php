<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @package Beetle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php beetle_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php beetle_post_image(); ?>

	<div class="entry-content clearfix">

		<?php beetle_post_content(); ?>

	</div><!-- .entry-content -->

</article>
