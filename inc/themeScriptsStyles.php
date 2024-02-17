<?php

function example_enqueue_editor_content_assets() {
    if ( is_admin() ) {
        wp_enqueue_style( 'bio-theme', plugins_url( './build/theme/index.css', __FILE__ ));
    }
}
add_action( 'enqueue_block_assets', 'example_enqueue_editor_content_assets' );


function wpdocs_theme_name_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );

	wp_enqueue_style( 'bio-theme',  $plugin_url . './build/theme/index.css');
	wp_enqueue_script( 'bio-theme', $plugin_url . './build/theme/index.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );