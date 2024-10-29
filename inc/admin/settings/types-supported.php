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

function aosblocks_display_types_supported() {
	$aosblocks = new Animate_Blocks();

	$types_supported = get_option( 'aosblocks_types_supported', $aosblocks->types_supported );

	$options_html = '';

	$types_available = array(
		'post' => 'post',
		'page' => 'page',
	);

	foreach ( $types_available as $type ) {
		$type_text = ucwords( $type );
		$selected  = '';

		if ( is_array( $types_supported ) && in_array( $type, $types_supported, true ) ) {
			$selected = 'selected';
		}

		$options_html .= "<option value=\"{$type}\" {$selected}>{$type_text}</option>";
	}
	?>
		<select id="aosblocks-types-supported" name="aosblocks_types_supported[]" multiple>
			<?php echo wp_kses( $options_html, json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true ) ); ?>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Select supported types for the plugin.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

function aosblocks_sanitize_types_supported( $types_supported ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	if ( empty( $types_supported ) ) {
		return;
	}

	// Don't use strict comparsions to check that arrays are equal.
	if ( get_option( 'aosblocks_types_supported' ) != $types_supported ) {
		add_settings_error(
			'aosblocks_settings_errors',
			'aosblocks_types_supported',
			esc_html__( 'Supported types option was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return array_map( 'sanitize_text_field', $types_supported );
}
