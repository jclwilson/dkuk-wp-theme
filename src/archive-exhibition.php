<?php get_header(); ?>
		<main class="main row center-xs">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'row' ); ?>>
						<?php get_template_part( 'content', 'title' ); ?>
					</article>
				<?php endwhile; ?>
				<!-- End of the main loop -->
				<nav class="pagination">
					<div><?php next_posts_link( 'Older posts' ); ?></div>
					<div><?php previous_posts_link( 'Newer posts' ); ?></div>
				</nav>
			<?php else : ?>
				<article class="">
					<?php _e('Sorry, no posts matched your criteria.'); ?>
				</article>
			<?php endif; ?>
		</main>
<?php get_footer(); ?>
