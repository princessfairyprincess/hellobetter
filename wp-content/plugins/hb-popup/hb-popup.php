<?php
/**
 * @link              https://example.com
 * @since             1.0.0
 * @package           HB_PopUp
 *
 * @wordpress-plugin
 * Plugin Name:       HB PopUp
 * Plugin URI:        https://example.com
 * Description:       Test
 * Version:           1.0.0
 * Author:            Jessica Michaels
 * Author URI:        https://example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hb-popup
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Current plugin version.
 */
define('HB_POPUP_VERSION', '1.0.0');

/**
 * Load up plugin files
 */
require plugin_dir_path(__FILE__) . 'includes/class-hb-popup.php';

function hb_load_plugin()
{
    $plugin = new HB_PopUp();
    $plugin->enqueue_scripts();
    $plugin->enqueue_styles();
    $plugin->load_hb_popup();
}


/**
 * Run plugin
 */

add_action('wp_body_open', 'hb_load_plugin');

