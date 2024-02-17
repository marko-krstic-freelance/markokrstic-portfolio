<?php

// Create custom blocks category

function custom_block_category($block_categories)
{

	$block_categories[] = array(
		'slug' => 'custom-blocks',
		'title' => 'Custom Blocks',
	);

	return $block_categories;
}
add_filter('block_categories_all', 'custom_block_category');