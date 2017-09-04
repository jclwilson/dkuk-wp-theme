<?php
	$images = get_field('gallery');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)

	if( $images ): ?>
	<section>
		<ul>
			<?php foreach( $images as $image ): ?>
				<li>
					<picture>
						<?php echo wp_get_attachment_image( $image["id"], $size ); ?>
						<p><?php echo $image['caption']; ?></p>
					</picture>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>
