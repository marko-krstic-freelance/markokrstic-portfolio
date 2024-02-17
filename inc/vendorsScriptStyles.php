<?php

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

