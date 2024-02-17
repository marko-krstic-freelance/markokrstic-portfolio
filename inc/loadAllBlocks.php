<?php

// Load all blocks 
function create_block_dpluginsblocks_block_init() {
    $folders = glob(__DIR__ . '/build/*', GLOB_ONLYDIR);
    
    foreach ($folders as $folder) {
        register_block_type($folder);
    }
}

add_action('init', 'create_block_dpluginsblocks_block_init');