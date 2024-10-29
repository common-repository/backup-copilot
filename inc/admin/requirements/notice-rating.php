<?php
/**
 * [Short description]
 *
 * @package    DEVRY\AOSBLOCKS
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\AOSBLOCKS;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Display a notice encouraging users to rate the plugin
 * on WordPress.org and provide options to dismiss the notice.
 */
function aosblocks_display_rating_notice() {
	if ( ! get_option( 'aosblocks_rating_notice' ) ) {
		$aosblocks = new Animate_Blocks();

		$admin_page = ( '' === $aosblocks->compact_mode ) ? 'admin.php' : 'themes.php';
		?>
			<div class="notice notice-info is-dismissible aosblocks-admin">
				<h3><?php echo esc_html( AOSBLOCKS_PLUGIN_NAME ); ?></h3>
				<p>
					<?php
					printf(
						wp_kses(
							/* translators: %1$s is replaced with by giving it 5 stars rating */
							__( '✨💪🔌 Could you please kindly help the plugin in your turn %1$s? (Thank you in advance) ' ),
							json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
						),
						'<strong>' . esc_html__( 'by giving it 5 stars rating', 'animate-blocks' ) . '</strong>'
					);
					?>
				</p>
				<div class="button-group">
					<a href="<?php echo esc_url( AOSBLOCKS_PLUGIN_WPORG_RATE ); ?>" target="_blank" class="button button-primary">
						<?php echo esc_html__( 'Rate us @ WordPress.org', 'animate-blocks' ); ?>
						<i class="dashicons dashicons-external"></i>
					</a>
					<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'aosblocks_global_settings', 'action' => 'aosblocks_dismiss_rating_notice', '_wpnonce' => wp_create_nonce( 'aosblocks_rating_notice_nonce' ) ), admin_url( $admin_page ) ) ); ?>" class="button">
						<?php echo esc_html__( 'I already did', 'animate-blocks' ); ?>
					</a>
					<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'aosblocks_global_settings', 'action' => 'aosblocks_dismiss_rating_notice', '_wpnonce' => wp_create_nonce( 'aosblocks_rating_notice_nonce' ) ), admin_url( $admin_page ) ) ); ?>" class="button">
						<?php echo esc_html__( "Don't show this notice again!", 'animate-blocks' ); ?>
					</a>
				</div>
			</div>
		<?php
	}
}

add_action( 'admin_notices', __NAMESPACE__ . '\aosblocks_display_rating_notice' );
