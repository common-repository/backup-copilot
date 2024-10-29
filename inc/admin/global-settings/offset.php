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

function aosblocks_display_offset() {
	$aosblocks = new Animate_Blocks();

	$offset = get_option( 'aosblocks_offset', $aosblocks->offset );

	printf(
		'<input
			type="number"
			class="regular-text"
			id="aosblocks-throttle-delay"
			name="aosblocks_offset"
			value="%1$s"
			minlength="1"
			maxlength="4"
			min="0"
			max="2000"
			step="10"
		/> px',
		esc_attr( $offset )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Element animation offset (in px) from the original trigger point. From 0 to 2000 with step 10px.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

function aosblocks_sanitize_offset( $offset ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	$aosblocks = new Animate_Blocks();

	if ( empty( $offset ) || $offset > 2000 ) {
		$offset = 120;
	}

	if ( get_option( 'aosblocks_offset', '' ) !== $offset ) {
		add_settings_error(
			'aosblocks_global_settings_errors',
			'aosblocks_offset',
			esc_html__( 'Offset option was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return sanitize_text_field( $offset );
}
