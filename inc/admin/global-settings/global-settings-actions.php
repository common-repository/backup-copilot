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
ini_set( 'display_errors', 1 );
/**
 * [AJAX] Reset plugin settings to their default values
 * and provide a success message.
 */
function aosblocks_reset_global_settings() {
	$aosblocks_admin = new AOSBLOCKS_Admin;

	$aosblocks_admin->get_invalid_nonce_token();
	$aosblocks_admin->get_invalid_user_cap();

	// All global element settings fields.
	delete_option( 'aosblocks_offset' );
	delete_option( 'aosblocks_delay' );
	delete_option( 'aosblocks_duration' );

	$aosblocks_admin->print_json_message(
		1,
		__( 'All global settings were reset to their default values.', 'animate-blocks' )
	);
}

add_action( 'wp_ajax_aosblocks_reset_global_settings', __NAMESPACE__ . '\aosblocks_reset_global_settings' );
