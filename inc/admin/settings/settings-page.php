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

function aosblocks_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	add_settings_section(
		AOSBLOCKS_SETTINGS_SLUG,
		'',
		'',
		AOSBLOCKS_SETTINGS_SLUG
	);

	// Animate blocks settings fields.
	add_settings_field(
		'aosblocks_types_supported',
		'<label for="aosblocks-types-supported">'
			. esc_html__( 'Types Supported', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_types_supported',
		AOSBLOCKS_SETTINGS_SLUG,
		AOSBLOCKS_SETTINGS_SLUG,
	);

	add_settings_field(
		'aosblocks_user_access',
		'<label for="aosblocks-user-access">'
			. esc_html__( 'User Access', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_user_access',
		AOSBLOCKS_SETTINGS_SLUG,
		AOSBLOCKS_SETTINGS_SLUG,
	);

	add_settings_field(
		'aosblocks_compact_mode',
		'<label for="aosblocks-compact-mode">'
			. esc_html__( 'Compact Mode', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_compact_mode',
		AOSBLOCKS_SETTINGS_SLUG,
		AOSBLOCKS_SETTINGS_SLUG,
	);

	require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/nav.php';
	require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-main-page.php';
}
