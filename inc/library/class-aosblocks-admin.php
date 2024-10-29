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

if ( ! class_exists( 'AOSBLOCKS_Admin' ) ) {

	class AOSBLOCKS_Admin {
		/**
		 * Consturtor.
		 */
		public function __construct() {}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {}

		/**
		 * Print a JSON-encoded message with specified status, message, and optional values.
		 */
		public function print_json_message( $status, $message, $values_arr = array() ) {
			echo wp_json_encode(
				array(
					array(
						'status'  => $status,
						'message' => vsprintf(
							wp_kses(
								$message,
								json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
							),
							$values_arr
						),
					),
				),
			);
			exit;
		}

		/**
		 * Check the validity of the nonce token for the plugin's AJAX requests.
		 */
		public function check_nonce_token() {
			if ( ! check_ajax_referer( 'aosblocks-ajax-nonce', 'security', false ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if the current user has the necessary capability, typically for
		 * administrative tasks in the plugin.
		 */
		public function check_user_cap() {
			if ( ! current_user_can( 'administrator' ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if the nonce token is invalid; if so, print an
		 * error message with a support email link.
		 */
		public function get_invalid_nonce_token() {
			/* translators: %1$s is replaced with Invalid security toke */
			/* translators: %2$s is replaced with link to Support email */
			$message    = esc_html__( '%1$s! Contact us @ %2$s.', 'animate-blocks' );
			$values_arr = array(
				'<strong>' . esc_html__( 'Invalid security token', 'animate-blocks' ) . '</strong>',
				'<a href="mailto:contact@' . AOSBLOCKS_PLUGIN_DOMAIN . '">contact@' . AOSBLOCKS_PLUGIN_DOMAIN . '</a>',
			);

			if ( ! $this->check_nonce_token() ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}

		/**
		 * Check if the current user has the necessary capabilities;
		 * otherwise, print an error message.
		 */
		public function get_invalid_user_cap() {
			/* translators: %1$s is replaced with Access denied */
			$message    = esc_html__( '%1$s! Current user does not have the capabilities to access this function.', 'animate-blocks' );
			$values_arr = array( '<strong>' . esc_html__( 'Access denied', 'animate-blocks' ) . '</strong>' );

			if ( ! $this->check_user_cap() ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}
	}

	$aosblocks_admin = new AOSBLOCKS_Admin;
	$aosblocks_admin->init();
}
