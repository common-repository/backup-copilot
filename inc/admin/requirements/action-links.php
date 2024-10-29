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
 * Add custom action links to the plugin on the Plugins page.
 */
function aosblocks_add_action_links( $links, $file_path ) {
	if ( AOSBLOCKS_PLUGIN_BASENAME === $file_path ) {
		$aosblocks = new Animate_Blocks();

		$admin_page = ( '' === $aosblocks->compact_mode )
			? 'admin.php?page=aosblocks_global_settings'
			: 'themes.php?page=aosblocks_global_settings';

		$links['aosblocks-settings'] = '<a href="' . esc_url( admin_url( $admin_page ) ) . '">'
			. esc_html__( 'Settings', 'animate-blocks' )
			. '</a>';
		$links['aosblocks-upgrade']  = '<a href="https://bit.ly/3vaFLZ0" target="_blank">'
			. esc_html__( 'Go Pro', 'animate-blocks' )
			. '</a>';

		return array_reverse( $links );
	}

	return $links;
}
