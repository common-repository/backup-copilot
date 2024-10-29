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
 * Handle actions upon activation of the plugin, such as
 * displaying notices or performing specific tasks.
 */
function aosblocks_activate_plugin( $plugin_file_path ) {
	if ( AOSBLOCKS_PLUGIN_BASENAME === $plugin_file_path ) {
	}
}

add_action( 'activated_plugin', __NAMESPACE__ . '\aosblocks_activate_plugin' );

/**
 * Handle actions upon deactivation of the plugin,
 * such as removing stored notices or performing cleanup tasks.
 */
function aosblocks_deactivate_plugin( $plugin_file_path ) {
	if ( AOSBLOCKS_PLUGIN_BASENAME === $plugin_file_path ) {
		delete_option( 'aosblocks_rating_notice' );
		delete_option( 'aosblocks_upgrade_notice' );
	}
}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\aosblocks_deactivate_plugin' );
