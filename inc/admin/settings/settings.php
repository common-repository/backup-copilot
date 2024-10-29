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

define( __NAMESPACE__ . '\AOSBLOCKS_SETTINGS_SLUG', 'aosblocks_settings' );

require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-menu.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-page.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-actions.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-register.php';

require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/types-supported.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/user-access.php';
require_once AOSBLOCKS_PLUGIN_DIR_PATH . 'inc/admin/settings/compact-mode.php';
