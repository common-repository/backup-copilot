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

function aosblocks_display_duration() {
	$aosblocks = new Animate_Blocks();

	$duration = get_option( 'aosblocks_duration', $aosblocks->duration );

	printf(
		'<input
			type="number"
			class="regular-text"
			id="aosblocks-duration"
			name="aosblocks_duration"
			value="%1$s"
			minlength="1"
			maxlength="4"
			min="0"
			max="3000"
			step="100"
		/> ms',
		esc_attr( $duration )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Animation duration values from 0 to 3000, with step 100ms.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

function aosblocks_sanitize_duration( $duration ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	$aosblocks = new Animate_Blocks();

	if ( empty( $duration ) || $duration > 3000 ) {
		$duration = 600;
	}

	if ( get_option( 'aosblocks_duration', '' ) !== $duration ) {
		add_settings_error(
			'aosblocks_global_settings_errors',
			'aosblocks_duration',
			esc_html__( 'Duration option was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return sanitize_text_field( $duration );
}
