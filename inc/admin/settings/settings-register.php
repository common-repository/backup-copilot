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

function aosblocks_register_setting_fields() {
	register_setting( AOSBLOCKS_SETTINGS_SLUG, 'aosblocks_types_supported', __NAMESPACE__ . '\aosblocks_sanitize_types_supported' );
	register_setting( AOSBLOCKS_SETTINGS_SLUG, 'aosblocks_user_access', __NAMESPACE__ . '\aosblocks_sanitize_user_access' );
	register_setting( AOSBLOCKS_SETTINGS_SLUG, 'aosblocks_compact_mode', __NAMESPACE__ . '\aosblocks_sanitize_compact_mode' );
}

add_action( 'admin_init', __NAMESPACE__ . '\aosblocks_register_setting_fields' );
