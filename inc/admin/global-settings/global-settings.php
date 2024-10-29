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

define( __NAMESPACE__ . '\AOSBLOCKS_GLOBAL_SETTINGS_SLUG', 'aosblocks_global_settings' );

require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/global-settings-menu.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/global-settings-page.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/global-settings-actions.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/global-settings-register.php';

require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/offset.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/delay.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/global-settings/duration.php';
