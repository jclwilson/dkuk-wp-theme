<?php get_header(); ?>
<div class="grid">
	<div class="grid__sizer"></div>
	<div class="grid__gutter-sizer"></div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'grid__item post__preview' ); ?>>
				<header class="post__header col-xs-10 col-xs-offset-1">
					<h1 class="post__title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link">
							<?php the_title(); ?>
						</a>
					</h1>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="thumbnail__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>
				<?php if ( has_excerpt() ) : ?>
					<section class="post__excerpt col-xs-10 col-xs-offset-1">
						<?php the_excerpt(); ?>
					</section>
				<?php endif; ?>
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
</div>
<?php get_footer(); ?>
