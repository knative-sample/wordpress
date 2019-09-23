<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Beetle
 */

?>

<li id="slide-<?php the_ID(); ?>" class="zeeslide clearfix">

	<?php beetle_slider_image( 'beetle-header-image', array( 'class' => 'slide-image' ) ); ?>

	<div class="slide-post clearfix">

		<div class="slide-content container clearfix">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</div>

	</div>

</li>
