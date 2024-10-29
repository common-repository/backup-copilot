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

function aosblocks_display_delay() {
	$aosblocks = new Animate_Blocks();

	$delay = get_option( 'aosblocks_delay', $aosblocks->delay );

	printf(
		'<input
			type="number"
			class="regular-text"
			id="aosblocks-delay"
			name="aosblocks_delay"
			value="%1$s"
			minlength="1"
			maxlength="4"
			min="0"
			max="3000"
			step="100"
		/> ms',
		esc_attr( $delay )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Animation delay values from 0 to 3000, with step 100ms.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

function aosblocks_sanitize_delay( $delay ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	$aosblocks = new Animate_Blocks();

	if ( empty( $delay ) || $delay > 3000 ) {
		$delay = 0;
	}

	if ( get_option( 'aosblocks_delay', '' ) !== $delay ) {
		add_settings_error(
			'aosblocks_global_settings_errors',
			'aosblocks_delay',
			esc_html__( 'Delay option was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return sanitize_text_field( $delay );
}
