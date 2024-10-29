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
 * Enqueue admin assets (styles and scripts) for the plugin.
 */
function aosblocks_enqueue_admin_assets() {
	if ( ! is_admin() ) {
		return;
	}

	$aosblocks = new Animate_Blocks;

	// Load assets only for page page staring with prefix aosblocks-.
	// $screen = get_current_screen();
	// if ( strpos( $screen->id, 'aosblocks_' ) ) {}

	wp_enqueue_style(
		'aosblocks-admin',
		AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dist/css/aosblocks-admin.min.css',
		array(),
		AOSBLOCKS_PLUGIN_VERSION,
		'all'
	);

	wp_enqueue_script(
		'aosblocks-admin',
		AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dist/js/aosblocks-admin.min.js',
		array( 'jquery' ),
		AOSBLOCKS_PLUGIN_VERSION,
		true
	);

	wp_localize_script(
		'aosblocks-admin',
		'aosblocks',
		array(
			'plugin_url'    => AOSBLOCKS_PLUGIN_DIR_URL,
			'plugin_domain' => AOSBLOCKS_PLUGIN_DOMAIN,
			'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
			'ajax_nonce'    => wp_create_nonce( 'aosblocks-ajax-nonce' ),
		)
	);
}

/**
 * Enqueue frontend assets (styles and scripts) for the plugin.
 */
function aosblocks_enqueue_frontend_assets() {
	global $post;

	$aosblocks       = new Animate_Blocks;
	$aosblocks_admin = new AOSBLOCKS_Admin;

	if ( ! is_admin() ) {
		wp_enqueue_style(
			'aosblocks-frontend',
			AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dist/css/aosblocks-frontend.min.css',
			array(),
			AOSBLOCKS_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'aosblocks-init',
			AOSBLOCKS_PLUGIN_DIR_URL . '/assets/dist/js/aosblocks.min.js',
			array(),
			AOSBLOCKS_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'aosblocks-frontend',
			AOSBLOCKS_PLUGIN_DIR_URL . '/assets/dist/js/aosblocks-frontend.min.js',
			array( 'jquery' ),
			AOSBLOCKS_PLUGIN_VERSION,
			true
		);

		// Localize the defaults for the frontend.
		wp_localize_script(
			'aosblocks-frontend',
			'aosblocks',
			array(
				// Global animation settings.
				'animate_settings_disable'         => $aosblocks->disable,
				'animate_settings_start_event'     => $aosblocks->start_event,
				'animate_settings_overflow_hidden' => $aosblocks->overflow_hidden,
			)
		);
	}
}

/**
 * Hook into the theme setup process to enqueue frontend assets for the plugin.
 */
function aosblocks_after_theme_setup() {
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\aosblocks_enqueue_frontend_assets', 1001 );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\aosblocks_after_theme_setup' );

/**
 * Enqueue block assets (styles and scripts) for the plugin.
 */
function aosblocks_enqueue_block_assets() {
	if ( ! is_admin() ) {
		return;
	}

	global $post;

	$aosblocks       = new Animate_Blocks;
	$aosblocks_admin = new AOSBLOCKS_Admin;

	if ( null !== $post
		&& property_exists( $post, 'post_type' )
		&& in_array( $post->post_type, $aosblocks->types_supported, true ) // Post type supported.
		&& array_intersect( wp_get_current_user()->roles, $aosblocks->user_access ) ) { // Has user access.
		wp_enqueue_style(
			'aosblocks-animation-block',
			AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dist/css/aosblocks-animation-block.min.css',
			array(),
			AOSBLOCKS_PLUGIN_VERSION,
			'all'
		);

		wp_enqueue_script(
			'aosblocks-init',
			AOSBLOCKS_PLUGIN_DIR_URL . '/assets/dist/js/aosblocks.min.js',
			array(),
			AOSBLOCKS_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'aosblocks-animation-block',
			AOSBLOCKS_PLUGIN_DIR_URL . '/assets/dist/js/aosblocks-animation-block.min.js',
			array( 'aosblocks-init', 'wp-block-editor', 'wp-blocks', 'wp-editor', 'wp-i18n', 'wp-data', 'wp-element', 'wp-components', 'wp-compose' ),
			AOSBLOCKS_PLUGIN_VERSION,
			true
		);

		// Localize the defaults for the block editor.
		wp_localize_script(
			'aosblocks-animation-block',
			'aosblocks',
			array(
				'plugin_url'                        => AOSBLOCKS_PLUGIN_DIR_URL,
				'plugin_domain'                     => AOSBLOCKS_PLUGIN_DOMAIN,
				'site_url'                          => esc_url( home_url() ),
				'admin_url'                         => esc_url( admin_url() ),
				'ajax_url'                          => esc_url( admin_url( 'admin-ajax.php' ) ),
				'ajax_nonce'                        => wp_create_nonce( 'aosblocks-ajax-nonce' ),
				// Supported settings.
				'supported_animations'              => (array) json_decode( AOSBLOCKS_SUPPORTED_ANIMATIONS, true ),
				'supported_repeat'                  => (array) json_decode( AOSBLOCKS_SUPPORTED_REPEAT, true ),
				'supported_easing'                  => (array) json_decode( AOSBLOCKS_SUPPORTED_EASING, true ),
				'supported_anchor_placement'        => (array) json_decode( AOSBLOCKS_SUPPORTED_ANCHOR_PLACEMENT, true ),
				'supported_blocks'                  => (array) json_decode( AOSBLOCKS_SUPPORTED_BLOCKS, true ),
				// Global animation settings.
				'animate_settings_disable'          => $aosblocks->disable,
				'animate_settings_start_event'      => $aosblocks->start_event,
				// Load up the default/user specified global settings.
				'animate_settings_offset'           => $aosblocks->offset,
				'animate_settings_delay'            => $aosblocks->delay,
				'animate_settings_duration'         => $aosblocks->duration,
				'animate_settings_repeat'           => $aosblocks->repeat,
				'animate_settings_easing'           => $aosblocks->easing,
				'animate_settings_once'             => $aosblocks->once,
				'animate_settings_mirror'           => $aosblocks->mirror,
				'animate_settings_anchor_placement' => $aosblocks->anchor_placement,
			)
		);
	}
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\aosblocks_enqueue_block_assets' );
