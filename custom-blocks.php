<?php
/**
 * Plugin Name:       Nuevos bloques
 * Description:       bloques de consulta y filtrado
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Version:           1.0
 * Author:            Jose Córdoba
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       new-blocks
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once MY_PLUGIN_PATH . 'styles/register-styles.php';
require_once MY_PLUGIN_PATH . 'utilities/register-utilities.php';
require_once MY_PLUGIN_PATH . 'API/register-api.php';
require_once MY_PLUGIN_PATH . 'admin/register-admin.php';
require_once MY_PLUGIN_PATH . 'blocks/register-blocks.php';

