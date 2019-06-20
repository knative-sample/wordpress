<?php
/**
 * The template for displaying content on the search results page.
 *
 * @package UpeoThemes
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

						<?php upeo_input_blogtitle(); ?>

						<div class="entry-content">
							<div class="entry-meta">
								<?php upeo_input_blogauthor(); ?>
								<?php upeo_input_blogdate(); ?>
								<?php upeo_input_blogcomment(); ?>
								<?php upeo_input_blogcategory(); ?>
								<?php upeo_input_blogtag(); ?>
							</div>

							<?php the_excerpt(); ?>
						</div>

					<div class="clearboth"></div>
					</article><!-- #post-<?php get_the_ID(); ?> -->	