<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package Beetle
 */

?>
	
	</div><!-- #content -->
	
	<?php do_action( 'beetle_before_footer' ); ?>

	<div id="footer" class="footer-wrap">
	
		<footer id="colophon" class="site-footer clearfix" role="contentinfo">

			<div id="footer-text" class="site-info">
				<?php do_action( 'beetle_footer_text' ); ?>
			</div><!-- .site-info -->
			
			<?php do_action( 'beetle_footer_menu' ); ?>

		</footer><!-- #colophon -->
		
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
