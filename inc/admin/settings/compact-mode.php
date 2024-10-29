<?php
/**
 * [Short description]
 *
 * @package    DEVRY\AOSBLOCKS
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @since      1.4
 */

namespace DEVRY\AOSBLOCKS;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Display the compact mode option.
 */
function aosblocks_display_compact_mode() {
	$aosblocks = new Animate_Blocks();

	$compact_mode = get_option( 'aosblocks_compact_mode', $aosblocks->compact_mode );

	// No if empty or non-existent, otherwise select Yes.
	if ( 'yes' === $compact_mode ) {
		$compact_mode = 'selected';
	}

	printf(
		'<select id="aosblocks-compact-mode" name="aosblocks_compact_mode">
			<option value="">No</option>
			<option value="yes" %1$s>Yes</option>
		</select>',
		esc_attr( $compact_mode )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Enable compact mode and move the plugin main link to sub menu.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update compact mode option.
 */
function aosblocks_sanitize_compact_mode( $compact_mode ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	if ( empty( $compact_mode ) ) {
		return;
	}

	// Option changed and updated.
	if ( get_option( 'aosblocks_compact_mode' ) !== $compact_mode ) {
		add_settings_error(
			'aosblocks_settings_errors',
			'aosblocks_compact_mode',
			esc_html__( 'Compact mode option was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return sanitize_text_field( $compact_mode );
}
