<section class="podcast">
	<?php if (get_field('podcast_title')) : ?>
		<h1 class="podcast__title"><?php the_field('podcast_title'); ?></h1>
	<?php endif; ?>
	<?php
		$podcast_file = get_field('podcast_file');
		if( $podcast_file ): ?>
			<audio class="podcast__file" controls src="<?php echo $podcast_file['url']; ?>">
				Your browser does not support the audio element.
			</audio>
		<?php endif; ?>
	<?php if (get_field('podcast_link')) : ?>
		<div class="podcast__link-wrapper">
			<a class="podcast__link" href="<?php the_field('podcast_link'); ?>">Listen here</a>
		</div>
	<?php endif; ?>
</section>
