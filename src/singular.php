<?php get_header(); ?>
	<main class="main row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('col-md-6 col-md-offset-3 singular'); ?>>
					<?php get_template_part( 'content', 'title' ); ?>
					<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
					<?php if ( get_field( "gallery" ) ) : ?>
						<?php get_template_part( 'content', 'gallery' ); ?>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
					<?php if ( get_field( "podcast_link") || get_field("podcast_file") ) : ?>
						<?php get_template_part( 'content', 'podcast' ); ?>
					<?php endif; ?>
					<section class="post__content">
						<?php the_content(); ?>
					</section>
					<?php if ( get_field( "salon_prices" ) ) : ?>
						<?php get_template_part( 'content', 'salon' ); ?>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
		<?php endif; ?>
	</main>
<?php get_footer(); ?>
