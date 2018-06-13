<section class="podcast">
	<?php if (get_field('podcast_title')) : ?>
		<noscript>Podcast: </noscript><h1 class="podcast__title"><?php the_field('podcast_title'); ?></h1>
	<?php endif; ?>
	<?php
		$podcast_file = get_field('podcast_file');
		if( $podcast_file ): ?>
			<audio class="podcast__file" controls src="<?php echo $podcast_file['url']; ?>">
				Sadly your browser doesn't support the DKUK audio player!
			</audio>
		<?php endif; ?>
		<?php if ( have_rows('podcast_links') ): ?>
			<?php while( have_rows('podcast_links') ): the_row(); ?>
				<a class="podcast__link" href="<?php the_sub_field('podcast_link'); ?>">🔊 Listen on <?php the_sub_field('podcast_service'); ?></a>
			<?php endwhile; ?>
		<?php endif; ?>
</section>
