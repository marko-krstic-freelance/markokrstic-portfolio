<?php

// Load all blocks 
function create_block_dpluginsblocks_block_init() {
    // Use MULTIBLOCK_DIR to point to the `build` directory from anywhere in your plugin
    $folders = glob(MULTIBLOCK_DIR . 'build/*', GLOB_ONLYDIR);
    
    foreach ($folders as $folder) {
        register_block_type($folder);
    }
}

add_action('init', 'create_block_dpluginsblocks_block_init');
