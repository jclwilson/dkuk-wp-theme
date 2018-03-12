<section class="gallery center-xs">
	<div class="gallery__container">
		<?php
		$images = get_field('gallery');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $images ): ?>
			<ul class="gallery__list">
				<?php foreach( $images as $image ): ?>
					<li class="gallery__item">
						<picture class="gallery__picture">
							<?php echo wp_get_attachment_image( $image["id"], $size ); ?>
							<?php if( $image['caption'] ): ?>
								<p class="gallery__caption"><?php echo $image['caption']; ?></p>
							<?php endif ?>
						</picture>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php elseif ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
</section>
