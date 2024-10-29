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

function aosblocks_register_global_settings_fields() {
	// All animation Element settings fields.
	register_setting( AOSBLOCKS_GLOBAL_SETTINGS_SLUG, 'aosblocks_offset', __NAMESPACE__ . '\aosblocks_sanitize_offset' );
	register_setting( AOSBLOCKS_GLOBAL_SETTINGS_SLUG, 'aosblocks_delay', __NAMESPACE__ . '\aosblocks_sanitize_delay' );
	register_setting( AOSBLOCKS_GLOBAL_SETTINGS_SLUG, 'aosblocks_duration', __NAMESPACE__ . '\aosblocks_sanitize_duration' );
}

add_action( 'admin_init', __NAMESPACE__ . '\aosblocks_register_global_settings_fields' );
