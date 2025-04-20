<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

// Get the taxonomy from attributes (default to 'project_role' if not set)
$taxonomy = isset($attributes['taxonomy']) ? sanitize_text_field($attributes['taxonomy']) : 'project_role';

// Get wrapper attributes
$wrapper_attributes = get_block_wrapper_attributes();
?>

<div <?php echo $wrapper_attributes; ?>>
	<?php
	$terms = get_the_terms(get_the_ID(), $taxonomy);
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			echo '<div>' . esc_html($term->name) . '</div>';
		}
	} else {
		echo '<div>' . esc_html__('No terms found', 'tax-terms-nourl') . '</div>';
	}
	?>
</div>