<?php
global $post;

if (get_field('video_upload', $post->ID)): ?>
	<div class="videoWrapper">
		<?php the_field('video_upload', $post->ID); ?>
	</div>
<?php endif; ?>


<?php
$images = get_field('upload-image', $post->ID);
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if ($images): ?>
	<div class='project-gallery'>
		<?php foreach ($images as $image): ?>
			<?php echo wp_get_attachment_image($image['ID'], $size); ?>
			<p class="img-title"><?php echo $image['title']; ?></p>
		<?php endforeach; ?>
	</div>
<?php endif; ?>