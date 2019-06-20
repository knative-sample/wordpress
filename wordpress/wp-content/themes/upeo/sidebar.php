<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package UpeoThemes
 */
?>

		<div id="sidebar">
		<div id="sidebar-core">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( upeo_input_sidebars() ) and current_user_can( 'edit_theme_options' ) ) : ?>

				<aside class="widget widget_text">
					<h3 class="widget-title"><?php esc_html_e( 'Please Add Widgets', 'upeo' ); ?></h3>
					<div class="textwidget"><div class="error-icon">
						<p><?php esc_html_e( 'Remove this message by adding widgets to the Sidebar from the Widgets section of the WordPress admin area.', 'upeo' ); ?></p>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" title="<?php esc_attr_e( 'No Widgets Selected', 'upeo' ); ?>"><?php esc_html_e( 'Click here to go to Widget area.', 'upeo' ); ?></a>
					</div></div>
				</aside>

			<?php endif; ?>

		</div>
		</div><!-- #sidebar -->
				