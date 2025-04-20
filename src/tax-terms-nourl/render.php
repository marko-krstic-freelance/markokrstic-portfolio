<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

// Get the taxonomy from attributes (default to 'project_role' if not set)
$taxonomy = isset($attributes['taxonomy']) ? $attributes['taxonomy'] : 'project_role';
$separator = isset($attributes['separator']) ? $attributes['separator'] : ', ';

// Get wrapper attributes - all styling will be automatically applied
$wrapper_attributes = get_block_wrapper_attributes();
?>

<div <?php echo $wrapper_attributes; ?>>
	<?php
	$terms = get_the_terms(get_the_ID(), $taxonomy);
	if ($terms && !is_wp_error($terms)) {
		// One term - no separator needed
		if (count($terms) === 1) {
			$term = reset($terms);
			echo '<div>' . esc_html($term->name) . '</div>';
		}
		// Multiple terms - use separator
		else {
			$term_names = array();
			foreach ($terms as $term) {
				$term_names[] = esc_html($term->name);
			}
			echo '<div>' . implode($separator, $term_names) . '</div>';
		}
	} else {
		echo '<div>' . esc_html__('No terms found', 'tax-terms-nourl') . '</div>';
	}
	?>
</div>