<section class="gallery center-xs">
	<noscript><h1>Image Gallery</h1></noscript>
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
			<script>
				// Only load below if it's on a singular page
				document.addEventListener("DOMContentLoaded", function() {
					// Init FLickity
					var flkty = new Flickity( '.gallery__list', {
						cellSelector: '.gallery__item',
						wrapAround: true,
						autoPlay: true,
						fullscreen: true,
						imagesLoaded: true,
					});
				});
			</script>
		<?php elseif ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
</section>
