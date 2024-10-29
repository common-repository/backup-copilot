<?php
/**
 * Plugin Name: Block Editor Animate Blocks
 * Plugin URI: https://animateblocksplugin.com/
 * Description: Bring your posts and pages to life with 20 cool animations inside the Block editor.
 * Version: 1.1
 * Author: Krasen Slavov
 * Author URI: https://developry.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: animate-blocks
 * Domain Path: /lang
 *
 * Copyright (c) 2018 - 2023 Developry Ltd. (email: contact@developry.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 */

namespace DEVRY\AOSBLOCKS;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

define( __NAMESPACE__ . '\AOSBLOCKS_ENV', 'prod' ); // Use prod, dev options.

define( __NAMESPACE__ . '\AOSBLOCKS_MIN_PHP_VERSION', '7.2' );
define( __NAMESPACE__ . '\AOSBLOCKS_MIN_WP_VERSION', '5.0' );

define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_UUID', 'aosblocks' );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_TEXTDOMAIN', 'animate-blocks' );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_NAME', esc_html__( 'Block Editor Animate Blocks', 'animate-blocks' ) );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_VERSION', '1.1' );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_DOMAIN', 'animateblocksplugin.com' );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_DOCS', 'https://animateblocksplugin.com/help' );

define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_WPORG_SUPPORT', 'https://wordpress.org/support/plugin/block-editor-animate-blocks/#new-topic' );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_WPORG_RATE', 'https://wordpress.org/support/plugin/block-editor-animate-blocks/reviews/#new-post' );

define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

define(
	__NAMESPACE__ . '\AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR',
	wp_json_encode(
		array(
			'br'     => array(),
			'strong' => array(),
			'em'     => array(),
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'name'   => array(),
			),
			'option' => array(
				'value'    => array(),
				'selected' => array(),
			),
		)
	)
);

define(
	__NAMESPACE__ . '\AOSBLOCKS_SUPPORTED_ANIMATIONS',
	wp_json_encode(
		array(
			// Attention seekers.
			'attention-seekers/bounce'        => 'Bounce',
			'attention-seekers/heart-beat'    => 'Heart Beat',
			'attention-seekers/rubber-band'   => 'Rubber Band',
			'attention-seekers/shake'         => 'Shake',
			'attention-seekers/swing'         => 'Swing',
			'attention-seekers/tada'          => 'Tada',
			'attention-seekers/wobble'        => 'Wobble',
			// Back entrances.
			'back-entrances/back-in-down'     => 'Back In Down',
			'back-entrances/back-in-up'       => 'Back In Up',
			// Bouncing entrances.
			'bouncing-entrances/bounce-in'    => 'Bounce In',
			// Fading entrances.
			'fading-entrances/fade-in'        => 'Fade In',
			// Flippers.
			'flippers/flip'                   => 'Flip',
			// Lightspeed.
			'lightspeed/lightspeed-in-left'   => 'Lightspeed In Left',
			// Rotating entrances.
			'rotating-entrances/rotate-in'    => 'Rotate In',
			// Sliding entrances.
			'sliding-entrances/slide-in-down' => 'Slide In Down',
			'sliding-entrances/slide-in-up'   => 'Slide In Up',
			// Specials.
			'specials/hinge'                  => 'Hinge',
			'specials/jack-in-the-box'        => 'Jack In The Box',
			'specials/roll-in'                => 'Roll In',
			// Zooming entrances.
			'zooming-entrances/zoom-in'       => 'Zoom In',
		)
	)
);

define(
	__NAMESPACE__ . '\AOSBLOCKS_SUPPORTED_BLOCKS',
	wp_json_encode(
		array(
			// Design.
			'core/group',
			'core/column',
			'core/columns',
			// Media.
			'core/image',
			// Text.
			'core/heading',
			'core/paragraph',
			'core/button',
			'core/buttons',
		)
	)
);

define(
	__NAMESPACE__ . '\AOSBLOCKS_SUPPORTED_REPEAT',
	wp_json_encode(
		array(
			'1' => '1',
		)
	)
);

define(
	__NAMESPACE__ . '\AOSBLOCKS_SUPPORTED_EASING',
	wp_json_encode(
		array(
			'linear' => 'Linear',
			'ease'   => 'Ease',
		)
	)
);

define(
	__NAMESPACE__ . '\AOSBLOCKS_SUPPORTED_ANCHOR_PLACEMENT',
	wp_json_encode(
		array(
			'top-bottom' => 'Top Bottom',
		)
	)
);

if ( 'dev' === AOSBLOCKS_ENV ) {
	define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_IMG_URL', AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dev/images/' );
} else {
	define( __NAMESPACE__ . '\AOSBLOCKS_PLUGIN_IMG_URL', AOSBLOCKS_PLUGIN_DIR_URL . 'assets/dist/img/' );
}

require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/admin.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/library/class-aosblocks-admin.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/library/class-animate-blocks.php';
