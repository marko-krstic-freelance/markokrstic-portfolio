<?php

// Create custom blocks category

function dplugins_block_category($block_categories)
{

	$block_categories[] = array(
		'slug' => 'biotech-general',
		'title' => 'Biotech Blocks',
	);

	return $block_categories;
}
add_filter('block_categories_all', 'dplugins_block_category');