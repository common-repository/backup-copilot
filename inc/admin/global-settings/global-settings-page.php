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

function aosblocks_display_global_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	$elements_global_settings_slug = 'aosblocks_element_global_settings';

	add_settings_section(
		$elements_global_settings_slug,
		'Elements',
		'',
		AOSBLOCKS_GLOBAL_SETTINGS_SLUG
	);

	// 2. Animate Element Settings.
	add_settings_field(
		'aosblocks_offset',
		'<label for="aosblocks-offset">'
			. esc_html__( 'Offset', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_offset',
		AOSBLOCKS_GLOBAL_SETTINGS_SLUG,
		$elements_global_settings_slug
	);

	add_settings_field(
		'aosblocks_delay',
		'<label for="aosblocks-delay">'
			. esc_html__( 'Delay', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_delay',
		AOSBLOCKS_GLOBAL_SETTINGS_SLUG,
		$elements_global_settings_slug
	);

	add_settings_field(
		'aosblocks_duration',
		'<label for="aosblocks-duration">'
			. esc_html__( 'Duration', 'animate-blocks' )
			. '</label>',
		__NAMESPACE__ . '\aosblocks_display_duration',
		AOSBLOCKS_GLOBAL_SETTINGS_SLUG,
		$elements_global_settings_slug
	);

	require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/nav.php';
	require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/global-settings-main-page.php';
}
