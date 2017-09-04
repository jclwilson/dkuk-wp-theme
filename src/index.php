	<?php get_header(); ?>
	<main class="main grid">
		<div class="grid__sizer"></div>
		<div class="grid__gutter-sizer"></div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'grid__item' ); ?>>
					<?php get_template_part( 'content', 'title' ); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="thumbnail__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<section class="post__excerpt">
						<?php the_excerpt(); ?>
					</section>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
			<nav class="pagination">
				<div class="pagination__older"><?php next_posts_link( 'Older posts' ); ?></div>
				<div class="pagination__newer"><?php previous_posts_link( 'Newer posts' ); ?></div>
			</nav>
		<?php else : ?>
			<article class="grid__item">
				<?php _e('Sorry, no posts matched your criteria.'); ?>
			</article>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>
