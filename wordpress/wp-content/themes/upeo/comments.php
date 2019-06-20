<?php
/**
 * The template for displaying Comments.
 *
 * @package UpeoThemes
 */
?>

<?php
	/* Exit if the post is password protected & user is not logged in */
	if ( post_password_required() )
		return;
?>

	<div id="comments">
	<div id="comments-core" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<div id="comments-title">
			<h3>
				<?php
					// translators: Comments
					printf( wp_kses_post( _n( 'Comments <span>(%1$s)</span> ', 'Comments <span>(%1$s)</span>', get_comments_number(), 'upeo' ) ),
						number_format_i18n( get_comments_number() ) );
				?>
			</h3>
			<span class="sep"><span class="sep-core"></span></span>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav role="navigation" id="comment-nav-above" class="comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'upeo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'upeo' ) ); ?></div>
		</nav><!-- #comment-nav-before .comment-navigation -->
		<?php endif;?>

			<ol class="commentlist">
				<?php /* List Comments */ upeo_input_comments(); ?>
			</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav role="navigation" id="comment-nav-below" class="comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'upeo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'upeo' ) ); ?></div>
		</nav><!-- #comment-nav-below .comment-navigation -->
		<?php endif; ?>

	<?php endif; ?>

	<?php
		/* Message to display when comments are closed */
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<div id="nocomments" class="notification info">
			<div class="icon"><?php esc_html_e( 'Comments are closed.', 'upeo' ); ?></div>
		</div>

	<?php endif; ?>

	<?php 
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$comments_args = array(
			'label_submit' => __( 'Submit Now', 'upeo' ),
			'title_reply'  => __( 'Leave a comment', 'upeo'  ),
			'comment_notes_after' => '',
			'comment_field' =>  
				'<p class="comment-form-comment">' .
				'<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Your Message', 'upeo' ) . '" cols="45" rows="8" aria-required="true">' .
				'</textarea></p>',
			'fields' => apply_filters( 'comment_form_default_fields', array (
				'author' =>
					'<p class="comment-form-author one_third">' .
					'<input id="author" name="author" placeholder="' . esc_attr__( 'Your Name (Required)', 'upeo' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30" /></p>',
				'email' =>
					'<p class="comment-form-email one_third">' .
					'<input id="email" name="email" placeholder="' . esc_attr__( 'Your Email (Required)', 'upeo' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30" /></p>',
				'url' =>
					'<p class="comment-form-url one_third last">' .
					'<input id="url" name="url" placeholder="' . esc_attr__( 'Your Website', 'upeo' ). '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
					'" size="30" /></p>'
			) ),
		);
		comment_form( $comments_args );
	?>
</div>
</div><div class="clearboth"></div><!-- #comments .comments-area -->