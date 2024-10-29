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

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Don't allow to have both Free and Pro active at the same time.
 */
function aosblocks_check_pro_plugin() {
	// Deactitve the Pro version if active.
	if ( is_plugin_active( 'animate-blocks/animate-blocks.php' ) ) {
		deactivate_plugins( 'animate-blocks/animate-blocks.php', true );
	}
}

register_activation_hook( AOSBLOCKS_PLUGIN_BASENAME, __NAMESPACE__ . '\aosblocks_check_pro_plugin' );

/**
 * Display a promotion for the pro plugin.
 */
function aosblocks_display_upgrade_notice() {
	if ( get_option( 'aosblocks_upgrade_notice' ) && get_transient( 'aosblocks_upgrade_plugin' ) ) {
		return;
	}

	$aosblocks = new Animate_Blocks();

	$admin_page = ( '' === $aosblocks->compact_mode ) ? 'admin.php' : 'themes.php';
	?>
		<div class="notice notice-success is-dismissible aosblocks-admin">
			<h3><?php echo esc_html__( 'Animate Blocks PRO 🚀' ); ?></h3>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with Found the free version helpful */
						/* translators: %2$s is replaced with Animate Blocks Pro */
						__( '✨🎉📢 %1$s? Would you be interested in learning more about the benefits of upgrading to the %2$s? ' ),
						json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<strong>' . esc_html__( 'Found the free version helpful', 'animate-blocks' ) . '</strong>',
					'<strong>' . esc_html__( 'Animate Blocks Pro', 'animate-blocks' ) . '</strong>'
				);
				?>
				<!-- <br /> -->
				<?php
				// printf(
				// 	wp_kses(
				// 		/* translators: %1$s is replaced with promo code */
				// 		/* translators: %2$s is replaced with 10% off */
				// 		__( 'Use the %1$s code and get %2$s your purchase!' ),
				// 		json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
				// 	),
				// 	'<code>' . esc_html__( 'AOSBLOCKS10', 'animate-blocks' ) . '</code>',
				// 	'<strong>' . esc_html__( '10% off', 'animate-blocks' ) . '</strong>'
				// );
				?>
			</p>
			<div class="button-group">
				<a href="https://bit.ly/3PIDgED" target="_blank" class="button button-primary button-success">
					<?php echo esc_html__( 'Go Pro', 'animate-blocks' ); ?>
					<i class="dashicons dashicons-external"></i>
				</a>
				<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'aosblocks_global_settings', 'action' => 'aosblocks_dismiss_upgrade_notice', '_wpnonce' => wp_create_nonce( 'aosblocks_upgrade_notice_nonce' ) ), admin_url( $admin_page ) ) ); ?>" class="button">
					<?php echo esc_html__( 'I already did', 'animate-blocks' ); ?>
				</a>
				<a href="<?php echo esc_url( add_query_arg( array( 'page' => 'aosblocks_global_settings', 'action' => 'aosblocks_dismiss_upgrade_notice', '_wpnonce' => wp_create_nonce( 'aosblocks_upgrade_notice_nonce' ) ), admin_url( $admin_page ) ) ); ?>" class="button">
					<?php echo esc_html__( "Don't show this notice again!", 'animate-blocks' ); ?>
				</a>
			</div>
		</div>
	<?php
	delete_option( 'aosblocks_upgrade_notice' );

	// Set the transient to last for 30 days.
	set_transient( 'aosblocks_upgrade_plugin', true, 30 * DAY_IN_SECONDS );
}

add_action( 'admin_notices', __NAMESPACE__ . '\aosblocks_display_upgrade_notice' );
