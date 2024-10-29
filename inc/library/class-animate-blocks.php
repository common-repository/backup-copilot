<?php
/**
 * [Short Description]
 *
 * @package    DEVRY\AOSBLOCKS
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\AOSBLOCKS;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'Animate_Blocks' ) ) {

	class Animate_Blocks {
		// Instance of the AOSBLOCKS_Admin class.
		public $aosblocks_admin;

		// Array of supported post types.
		public $types_supported;

		// Array of user access levels.
		public $user_access;

		// Compact mode for the menu options.
		public $compact_mode;

		// All animate global document settings fields.
		public $disable;
		public $start_event;
		public $overflow_hidden;

		// All animate global element settings fields.
		public $offset;
		public $delay;
		public $duration;
		public $repeat;
		public $easing;
		public $once;
		public $mirror;
		public $anchor_placement;

		/**
		 * Consturtor.
		 */
		public function __construct() {
			// Instantiate the AOSBLOCKS_Admin class.
			$this->aosblocks_admin = new AOSBLOCKS_Admin;

			// Use some defaults for the Options, for initial plugin usage.
			$this->types_supported = array( 'post', 'page' );
			$this->user_access     = array( 'administrator' );
			$this->compact_mode    = ''; // No

			// Retrieve from options, if available; otherwise, use the default values.
			$this->types_supported = get_option( 'aosblocks_types_supported', $this->types_supported );
			$this->user_access     = get_option( 'aosblocks_user_access', $this->user_access );
			$this->compact_mode    = get_option( 'aosblocks_compact_mode', $this->compact_mode );

			// Use some defaults for the global document settings, for initial plugin usage.
			$this->disable         = 'false';
			$this->start_event     = 'DOMContentLoaded';
			$this->overflow_hidden = '';

			// Use some defaults for the global element settings, for initial plugin usage (can be overrridden).
			$this->offset           = 120;
			$this->delay            = 0;
			$this->duration         = 600;
			$this->repeat           = '1';
			$this->easing           = 'ease';
			$this->once             = false;
			$this->mirror           = false;
			$this->anchor_placement = 'top-bottom';

			// Retrieve from global element settings, if available; otherwise, use the default values.
			$this->offset   = get_option( 'aosblocks_offset', $this->offset );
			$this->delay    = get_option( 'aosblocks_delay', $this->delay );
			$this->duration = get_option( 'aosblocks_duration', $this->duration );
		}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {
			add_filter( 'render_block', array( $this, 'apply_block_editor_animations' ), 10, 2 );
		}

		/**
		 * Use user-defined Blocks and use them as selections.
		 */
		public function localize_user_defined_blocks( $parent_id ) {
			if ( ! $parent_id ) {
				return;
			}

			$user_blocks = array();

			if ( $this->user_defined_blocks ) {
				// Check if user input has valid format with commas e.g., core/verse, core/code
				if ( preg_match( '/^(?:\w+\/\w+, )*(?:\w+\/\w+,?)$/', $this->user_defined_blocks ) ) {
					// Pass this array to the block editor to merge with the defaults.
					$user_blocks = explode( ',', $this->user_defined_blocks );
				}
			}

			wp_localize_script( $parent_id, 'aosblocks-user-defined-blocks', $user_blocks );
		}

		/**
		 * Apply Block Editor custom AOS Element settings for the supported blocks on the frontend/backend.
		 */
		public function apply_block_editor_animations( $block_content, $block ) {
			// Get and merger default and user-defined blocks supported.
			$supported_blocks = (array) json_decode( AOSBLOCKS_SUPPORTED_BLOCKS, true );

			$animation_attrs = array(
				'data-aosblocks'                  => isset( $block['attrs']['aosElemAimation'] ) ? $block['attrs']['aosElemAimation'] : '',
				'data-aosblocks-anchor-placement' => isset( $block['attrs']['aosElemAnchorPlacement'] ) ? $block['attrs']['aosElemAnchorPlacement'] : $this->anchor_placement,
				'data-aosblocks-once'             => isset( $block['attrs']['aosElemOnce'] ) ? $block['attrs']['aosElemOnce'] : $this->once,
				'data-aosblocks-mirror'           => isset( $block['attrs']['aosElemMirror'] ) ? $block['attrs']['aosElemMirror'] : $this->mirror,
				'data-aosblocks-overflow-hidden'  => isset( $block['attrs']['aosElemOverflowHidden'] ) ? $block['attrs']['aosElemOverflowHidden'] : '',
				'data-aosblocks-offset'           => isset( $block['attrs']['aosElemOffset'] ) ? $block['attrs']['aosElemOffset'] : $this->offset,
				'data-aosblocks-delay'            => isset( $block['attrs']['aosElemDelay'] ) ? $block['attrs']['aosElemDelay'] : $this->delay,
				'data-aosblocks-duration'         => isset( $block['attrs']['aosElemDuration'] ) ? $block['attrs']['aosElemDuration'] : $this->duration,
			);

			// Construct the data- attributes string.
			$data_attrs_string = '';

			foreach ( $animation_attrs as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$data_attrs_string .= " $attr=\"$value\"";
				}
			}

			if ( in_array( $block['blockName'], $supported_blocks, true ) ) {
				// We need to have animation effect selected to apply attrs to the block.
				if ( ! empty( $data_attrs_string ) && ! empty( $animation_attrs['data-aosblocks'] ) ) {
					// Append data- attributes to the block content.
					$block_content = str_replace( '>', $data_attrs_string . '>', $block_content );
				}
			}

			return $block_content;
		}
	}

	$aosblocks = new Animate_Blocks;
	$aosblocks->init();
}
