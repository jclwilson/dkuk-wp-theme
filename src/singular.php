<?php get_header(); ?>
<div class="row">
	<div class="col-xs">
		<main class="main">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?>>
						<?php get_template_part( 'content', 'title' ); ?>
						<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
						<?php if ( get_field( "gallery" ); ) : ?>
							<?php get_template_part( 'content', 'gallery' ); ?>
						<?php elseif ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
						<section class="post__content">
							<?php the_content(); ?>
						</section>
					</article>
				<?php endwhile; ?>
				<!-- End of the main loop -->
			<?php endif; ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>
