<?php
	$images = get_field('gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)

	if( $images ): ?>
	<section class="gallery row">
		<ul class="gallery__list col-xs">
			<?php foreach( $images as $image ): ?>
				<li class="gallery__item">
					<picture class="gallery__picture">
						<?php echo wp_get_attachment_image( $image["id"], $size ); ?>
						<p class="gallery__caption"><?php echo $image['caption']; ?></p>
					</picture>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>
