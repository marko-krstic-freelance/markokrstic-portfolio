<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php
	$next_post = get_next_post();
	if (! empty($next_post)): ?>
		<a
			class="nav-next"
			href="<?php echo get_permalink($next_post->ID); ?>">

			<span class="meta-nav">←</span> Next

			<h2><?php echo apply_filters('the_title', $next_post->post_title); ?></h2>
		</a>
	<?php else: ?>
		<div class="empty"></div>
	<?php endif; ?>


	<?php
	$prev_post = get_previous_post();
	if (! empty($prev_post)): ?>
		<a
			class="nav-previous"
			href="<?php echo get_permalink($prev_post->ID); ?>">

			Previous <span class="meta-nav">→</span>

			<h2><?php echo apply_filters('the_title', $prev_post->post_title); ?></h2>
		</a>
	<?php else: ?>
		<div class="empty"></div>
	<?php endif; ?>

</div>