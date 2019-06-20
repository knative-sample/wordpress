<?php
/**
 * The template for displaying image attachments.
 *
 * @package UpeoThemes
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<div class="entry-meta">
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( esc_html__( 'Published ', 'upeo') . '<span><time datetime="%1$s">%2$s</time></span> ' . esc_html__( 'at', 'upeo' ) . ' <a href="%3$s" title="' . esc_attr__( 'Link to full-size image', 'upeo' ) . '">%4$s &times; %5$s</a> ' . esc_html__( 'in', 'upeo' ) . ' <a href="%6$s" title="' . esc_attr__( 'Return to ', 'upeo' ) . '%7$s" rel="gallery">%8$s</a>',
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									esc_html( $metadata['width'] ),
									esc_html( $metadata['height'] ),
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( get_the_title( $post->post_parent ) ),
									get_the_title( $post->post_parent )
								);
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
								<?php
									/* Get ID of all image attachments */
									$attachments = array_values( get_children( array(
										'post_parent'    => $post->post_parent,
										'post_status'    => 'inherit',
										'post_type'      => 'attachment',
										'post_mime_type' => 'image',
										'order'          => 'ASC',
										'orderby'        => 'menu_order ID'
									) ) );
									foreach ( $attachments as $k => $attachment ) {
										if ( $attachment->ID == $post->ID )
											break;
									}
									$k++;
									/* Perform if there is more than 1 attachment in a gallery */
									if ( count( $attachments ) > 1 ) {
										if ( isset( $attachments[ $k ] ) )
											$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
										else
											$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
									} else {
										$next_attachment_url = wp_get_attachment_url();
									}
								?>
								<p><?php echo wp_get_attachment_image( $post->ID, array( 1200, 1200 ) ); ?></p>
							</div><!-- .attachment -->

							<?php if ( ! empty( $post->post_excerpt ) ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
							<?php endif; ?>
						</div><!-- .entry-attachment -->
						
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'upeo'), 'after' => '</div>' ) ); ?>

					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php upeo_input_imagesnav(); ?>
				
				<?php comments_template(); ?>

			<?php endwhile; ?>

<?php get_footer(); ?>