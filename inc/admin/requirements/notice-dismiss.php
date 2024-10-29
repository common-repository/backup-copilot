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
 * Dismiss the admin notice related to Rating if the user chooses to do so.
 */
function aosblocks_dismiss_admin_notice() {
	if ( isset( $_REQUEST['action'] )
		&& 'aosblocks_dismiss_rating_notice' === $_REQUEST['action']
		&& isset( $_REQUEST['_wpnonce'] )
	) {
		if ( wp_verify_nonce( $_REQUEST['_wpnonce'], 'aosblocks_rating_notice_nonce' ) ) {
			add_option( 'aosblocks_rating_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\aosblocks_dismiss_admin_notice' );

/**
 * Dismiss the admin notice related to Upgrade if the user chooses to do so.
 */
function aosblocks_dismiss_upgrade_notice() {
	if ( isset( $_REQUEST['action'] )
		&& 'aosblocks_dismiss_upgrade_notice' === $_REQUEST['action']
		&& isset( $_REQUEST['_wpnonce'] )
	) {
		if ( wp_verify_nonce( $_REQUEST['_wpnonce'], 'aosblocks_upgrade_notice_nonce' ) ) {
			add_option( 'aosblocks_upgrade_notice', true );
		}
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\aosblocks_dismiss_upgrade_notice' );
