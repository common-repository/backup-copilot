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

function aosblocks_add_settings_menu() {
	add_submenu_page(
		'themes.php',
		esc_html__( 'Options', 'animate-blocks' ),
		null,
		'manage_options',
		AOSBLOCKS_SETTINGS_SLUG,
		__NAMESPACE__ . '\aosblocks_display_settings_page'
	);
}

add_action( 'admin_menu', __NAMESPACE__ . '\aosblocks_add_settings_menu', 1000 );
