<?php

function my_custom_block_styles() {

    // Register custom style for the 'buttons' block
    register_block_style(
        'core/button', // Block name
        array(
            'name'         => 'external-link',
            'label'        => __('External link', 'text-domain'),
        )
    );

}
add_action('init', 'my_custom_block_styles');
