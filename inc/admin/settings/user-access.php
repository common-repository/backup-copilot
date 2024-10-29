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

function aosblocks_display_user_access() {
	$aosblocks = new Animate_Blocks();

	$user_access = get_option( 'aosblocks_user_access', $aosblocks->user_access );

	$options_html = '';

	$roles_available = array_keys( get_editable_roles() );

	foreach ( $roles_available as $role ) {
		$role_text = ucwords( $role );
		$selected  = '';

		if ( is_array( $user_access ) && in_array( $role, $user_access, true ) ) {
			$selected = 'selected';
		}

		$options_html .= "<option value=\"{$role}\" {$selected}>{$role_text}</option>";
	}
	?>
		<select id="aosblocks-user-access" name="aosblocks_user_access[]" multiple>
			<?php echo wp_kses( $options_html, json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true ) ); ?>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Select user access capabilities.', 'animate-blocks' ); ?>
			</small>
		</p>
	<?php
}

function aosblocks_sanitize_user_access( $user_access ) {
	if ( empty( $_REQUEST['aosblocks_nonce'] )
		|| ! wp_verify_nonce( $_REQUEST['aosblocks_nonce'], 'aosblocks_security' ) ) {
		return;
	}

	if ( empty( $user_access ) ) {
		return;
	}

	if ( get_option( 'aosblocks_user_access' ) != $user_access ) {
		add_settings_error(
			'aosblocks_settings_errors',
			'aosblocks_user_access',
			esc_html__( 'User access was updated successfully.', 'animate-blocks' ),
			'updated'
		);
	}

	return array_map( 'sanitize_text_field', $user_access );
}
