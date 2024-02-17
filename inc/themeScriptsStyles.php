<?php

function multiblocks_editor_content_assets() {
    if ( is_admin() ) {
        wp_enqueue_style('multiblock-theme', MULTIBLOCK_URL . 'build/theme/index.css');
    }
}
add_action('enqueue_block_assets', 'multiblocks_editor_content_assets');


function multiblocks_scripts() {
	wp_enqueue_style('multiblock-theme', MULTIBLOCK_URL . 'build/theme/index.css');
	wp_enqueue_script('multiblock-theme', MULTIBLOCK_URL . 'build/theme/index.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'multiblocks_scripts');
