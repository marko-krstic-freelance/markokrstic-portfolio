<?php
/**
 * Plugin Name:         gutenberg-multiblock-setup
 * Description:         Example block scaffolded with Create Block tool.
 * Requires at least:   6.1
 * Requires PHP:        7.4
 * Version:             1.0.0
 * Author:              Marko Krstic @DPlugins
 * License:             GPL-2.0-or-later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         dplugins-shop-blocks
 *
 * @package           create-block
 */

// Define the root directory for the plugin
define('MULTIBLOCK_DIR', plugin_dir_path(__FILE__));

require_once MULTIBLOCK_DIR . 'inc/blockStyles.php';
require_once MULTIBLOCK_DIR . 'inc/blockCategory.php';
















// ******************************************************************************************
// glide JS
// ******************************************************************************************

// Register CSS and JavaScript
function my_plugin_register_assets() {
    $plugin_url = plugin_dir_url(__FILE__);

    // Register CSS
    wp_register_style('slider-css', $plugin_url . 'assets/slider/flickity.css');
    
    // Register JavaScript
    wp_register_script('slider-js', $plugin_url . 'assets/slider/flickity.pkgd.min.js', array(), null, true);
}
add_action('init', 'my_plugin_register_assets');

