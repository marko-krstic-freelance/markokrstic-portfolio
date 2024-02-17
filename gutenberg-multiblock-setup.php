<?php
/**
 * Plugin Name:         Gutenberg Multiblock Setup
 * Description:         Example block scaffolded with Create Block tool for multiblock.
 * Requires at least:   6.1
 * Requires PHP:        7.4
 * Version:             1.0.0
 * Author:              Marko Krstic @DPlugins
 * License:             GPL-2.0-or-later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         dplugins-multiblock-setup
 *
 * @package           create-block
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define the root directory for the plugin
define('MULTIBLOCK_DIR', plugin_dir_path(__FILE__));
define('MULTIBLOCK_URL', plugin_dir_url(__FILE__));

require_once MULTIBLOCK_DIR . '/inc/blockCategory.php';
require_once MULTIBLOCK_DIR . '/inc/blockStyles.php';
require_once MULTIBLOCK_DIR . '/inc/loadAllBlocks.php';
require_once MULTIBLOCK_DIR . '/inc/themeScriptsStyles.php';
require_once MULTIBLOCK_DIR . '/inc/vendorsScriptStyles.php';