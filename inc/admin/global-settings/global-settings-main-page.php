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

$aosblocks_admin = new AOSBLOCKS_Admin;

?>
<div class="aosblocks-admin">
	<div class="aosblocks-container">
		<div class="aosblocks-loading-bar"></div>
		<div id="aosblocks-output" class="notice is-dismissible aosblocks-output"></div>
		<?php settings_errors( 'aosblocks_global_settings_errors' ); ?>

		<div class="aosblocks-pro">
			<h4>
				<?php echo esc_html__( 'Get the PRO version today!', 'animate-blocks' ); ?>
			</h4>

			<p>
				<?php echo esc_html__( 'With the PRO version you will get a lot more features with better performance and quicker recovery process.', 'animate-blocks' ); ?>
			</p>

			<table>
				<tr>
					<th><?php echo esc_html__( 'Feature', 'animate-blocks' ); ?></th>
					<th><?php echo esc_html__( 'Free', 'animate-blocks' ); ?></th>
					<th><?php echo esc_html__( 'PRO', 'animate-blocks' ); ?></th>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Custom Animation Block', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Custom Animation Editor', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'User Defined Blocks', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Supported Blocks', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'limited', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'extened', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Animation Global Settings', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'limited', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'full', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Overflow hidden to Parent Elements', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Video and Gallery Blocks', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Animation Effects' ); ?></td>
					<td><?php echo esc_html__( '20', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( '100+', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Block Preview Mode', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Once and Mirror Animation Options', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Reset all Blocks', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Search Animation Effects with Select2	', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Reduce Page Loading and Load Animations as Needed', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Priority email support', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'no', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'animate-blocks' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Regular plugin updates', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'delayed', 'animate-blocks' ); ?></td>
					<td><?php echo esc_html__( 'first release', 'animate-blocks' ); ?></td>
				</tr>
			</table>

			<p class="button-group">
				<a
					class="button button-primary button-pro"
					href="https://bit.ly/3TgRyNt"
					target="_blank"
				>
					<?php echo esc_html__( 'GET PRO VERSION', 'animate-blocks' ); ?>
				</a>
				<a
					class="button button-primary button-watch-video"
					href="https://www.youtube.com/watch?v=cI6AeJeOm7o"
					target="_blank"
				>
					<?php echo esc_html__( 'Watch Video', 'animate-blocks' ); ?>
				</a>
			</p>
		</div>

		<p>
			<?php
			printf(
				wp_kses(
					/* translators: %1$s is replaced with Important */
					/* translators: %2$s is replaced with Save */
					__( '%1$s: Ensure to click the "%2$s" button below after making any changes to the settings.', 'animate-blocks' ),
					json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
				),
				'<strong>' . esc_html__( 'Important', 'animate-blocks' ) . '</strong>',
				'<strong>' . esc_html__( 'Save', 'animate-blocks' ) . '</strong>'
			);
			?>
		</p>

		<form method="post" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>">
			<?php wp_nonce_field( 'aosblocks_security', 'aosblocks_nonce' ); ?>
			<?php
				settings_fields( AOSBLOCKS_GLOBAL_SETTINGS_SLUG );
				do_settings_sections( AOSBLOCKS_GLOBAL_SETTINGS_SLUG );
			?>
			<p class="submit button-group">
				<button
					type="submit"
					class="button button-primary"
					id="aosblocks-save-global-settings"
					name="aosblocks-save-global-settings"
				>
					<?php echo esc_html__( 'Save', 'animate-blocks' ); ?>
				</button>
				<button
					type="button"
					class="button"
					id="aosblocks-reset-global-settings"
					name="aosblocks-reset-global-settings"
				>
					<?php echo esc_html__( 'Reset', 'animate-blocks' ); ?>
				</button>
			</p>
		</form>

		<br clear="all" />
		<hr />

		<p>
			<?php
			echo esc_html__( '• Elements global animation settings and can be overridden on per-element basis, within the controls inside the Block Editor for each animation.', 'animate-blocks' );
			?>
		</p>
	</div>
</div>
