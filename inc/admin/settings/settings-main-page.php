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

$aosblocks_admin = new AOSBLOCKS_Admin;

?>
<div class="aosblocks-admin">
	<div class="aosblocks-container">
		<div class="aosblocks-loading-bar"></div>
		<div id="aosblocks-output" class="notice is-dismissible aosblocks-output"></div>
		<?php settings_errors( 'aosblocks_settings_errors' ); ?>

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
					__( '%1$s: Ensure to click the "%2$s" button below after making any changes to the options.', 'animate-blocks' ),
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
				settings_fields( AOSBLOCKS_SETTINGS_SLUG );
				do_settings_sections( AOSBLOCKS_SETTINGS_SLUG );
			?>
			<p class="submit button-group">
				<button
					type="submit"
					class="button button-primary"
					id="aosblocks-save-settings"
					name="aosblocks-save-settings"
				>
					<?php echo esc_html__( 'Save', 'animate-blocks' ); ?>
				</button>
				<button
					type="button"
					class="button"
					id="aosblocks-reset-settings"
					name="aosblocks-reset-settings"
				>
					<?php echo esc_html__( 'Reset', 'animate-blocks' ); ?>
				</button>
			</p>
		</form>

		<br clear="all" />

		<hr />

		<div class="aosblocks-support-credits">
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Link to WP.org support forums" */
						__( 'If something is not clear, please open a ticket on the official plugin %1$s. All tickets should be addressed within a couple of working days.', 'animate-blocks' ),
						json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<a href="' . esc_url( AOSBLOCKS_PLUGIN_WPORG_RATE ) . '" target="_blank">' . esc_html__( 'Support Forum', 'animate-blocks' ) . '</a>'
				);
				?>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Please rate us', 'animate-blocks' ); ?></strong>
				<a href="<?php echo esc_url( AOSBLOCKS_PLUGIN_WPORG_RATE ); ?>" target="_blank">
					<img src="<?php echo esc_url( AOSBLOCKS_PLUGIN_DIR_URL ); ?>assets/dist/img/rate.png" alt="Rate us @ WordPress.org" />
				</a>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Having issues?', 'animate-blocks' ); ?></strong> 
				<a href="<?php echo esc_url( AOSBLOCKS_PLUGIN_WPORG_RATE ); ?>" target="_blank">
					<?php echo esc_html__( 'Create a Support Ticket', 'animate-blocks' ); ?>
				</a>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Developed by', 'animate-blocks' ); ?></strong>
				<a href="<?php echo esc_url( 'https://' . AOSBLOCKS_PLUGIN_DOMAIN ); ?>" target="_blank">
					<?php echo esc_html__( 'Krasen Slavov @ Developry', 'animate-blocks' ); ?>
				</a>
			</p>
		</div>

		<hr />

		<p>
			<?php
			printf(
				wp_kses(
					/* translators: %1$s is replaced with Ctrl */
					/* translators: %2$s is replaced with Shift */
					/* translators: %3$s is replaced with Cmd */
					__( '• Use %1$s, %2$s, or %3$s keys to select multiple types supported or user access roles.', 'animate-blocks' ),
					json_decode( AOSBLOCKS_PLUGIN_ALLOWED_HTML_ARR, true )
				),
				'<code>Ctrl</code>',
				'<code>Shift</code>',
				'<code>Cmd</code>'
			);
			?>
		</p>
	</div>
</div>
