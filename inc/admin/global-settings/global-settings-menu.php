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

function aosblocks_add_global_settings_menu() {
	$aosblocks = new Animate_Blocks();

	if ( '' === $aosblocks->compact_mode ) {
		add_menu_page(
			esc_html__( 'Global Settings', 'animate-blocks' ),
			esc_html__( 'Animate Blocks', 'animate-blocks' ),
			'manage_options',
			AOSBLOCKS_GLOBAL_SETTINGS_SLUG,
			__NAMESPACE__ . '\aosblocks_display_global_settings_page',
			'dashicons-block-default'
		);
	} else {
		add_submenu_page(
			'themes.php',
			esc_html__( 'Global Settings', 'animate-blocks' ),
			esc_html__( 'Animate Blocks', 'animate-blocks' ),
			'manage_options',
			AOSBLOCKS_GLOBAL_SETTINGS_SLUG,
			__NAMESPACE__ . '\aosblocks_display_global_settings_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\aosblocks_add_global_settings_menu', 1000 );
