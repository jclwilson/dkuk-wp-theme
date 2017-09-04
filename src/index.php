	<?php get_header(); ?>
	<main class="grid">
		<div class="grid__sizer"></div>
		<div class="grid__gutter-sizer"></div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="grid__item">
					<?php get_template_part( 'content', 'title' ); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<section>
						<?php the_excerpt(); ?>
					</section>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
			<nav class="pagination">
				<div><?php next_posts_link( 'Older posts' ); ?></div>
				<div><?php previous_posts_link( 'Newer posts' ); ?></div>
			</nav>
		<?php else : ?>
			<article class="grid__item">
				<?php _e('Sorry, no posts matched your criteria.'); ?>
			</article>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>
