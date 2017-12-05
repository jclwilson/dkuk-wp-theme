<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('col-xs col-sm-10 col-sm-offset-1 singular'); ?>>
					<header class="post__header">
						<h1 class="post__title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link">
								<?php the_title(); ?>
							</a>
						</h1>
					</header>
					<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
					<?php if ( get_field( "gallery" ) ) : ?>
						<?php get_template_part( 'content', 'gallery' ); ?>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<section class="gallery">
							<?php the_post_thumbnail(); ?>
						</section>
					<?php endif; ?>
					<?php if ( have_rows('podcast_links') || get_field("podcast_file") ) : ?>
						<?php get_template_part( 'content', 'podcast' ); ?>
					<?php endif; ?>
					<section class="post__content">
						<?php the_content(); ?>
					</section>
					<?php if ( have_rows('colours') || have_rows('haircuts') ) : ?>
						<?php get_template_part( 'content', 'salon' ); ?>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
