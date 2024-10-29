<?php
/**
 * Admin navigation/settings partial.
 *
 * @package    DEVRY\AOSBLOCKS
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\AOSBLOCKS;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

$aosblocks_admin = new AOSBLOCKS_Admin;

?>
<div class="aosblocks-admin">
	<h2>
		<?php echo esc_html__( 'Block Editor Animate Blocks', 'animate-blocks' ); ?>
	</h2>
	<p>
		<?php
		printf(
			wp_kses(
				__( 'Bring your posts and pages to life with 20 cool animation effects inside the Block editor.' ),
				json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
			),
		);
		?>
	</p>
	<nav class="aosblocks-page-nav">
		<a 
			href="<?php echo esc_url( add_query_arg( array( 'page' => AOSBLOCKS_GLOBAL_SETTINGS_SLUG, '_wpnonce' => wp_create_nonce( 'aosblocks_global_settings_nonce' ) ), admin_url( 'themes.php' ) ) ); ?>" 
			class="aosblocks-global-settings-tab <?php echo ( AOSBLOCKS_GLOBAL_SETTINGS_SLUG === $_REQUEST['page'] && isset( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'aosblocks_global_settings_nonce' ) ) ? 'current' : ''; ?>"
		>
			<?php echo esc_html__( 'Global Settings', 'animate-blocks' ); ?>
		</a>
		<a 
			href="<?php echo esc_url( add_query_arg( array( 'page' => AOSBLOCKS_SETTINGS_SLUG, '_wpnonce' => wp_create_nonce( 'aosblocks_settings_nonce' ) ), admin_url( 'themes.php' ) ) ); ?>" 
			class="aosblocks-settings-tab <?php echo ( AOSBLOCKS_SETTINGS_SLUG === $_REQUEST['page'] && isset( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'aosblocks_settings_nonce' ) ) ? 'current' : ''; ?>"
		>
			<?php echo esc_html__( 'Options', 'animate-blocks' ); ?>
		</a>
	</nav>
</div>
