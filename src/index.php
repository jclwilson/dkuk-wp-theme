<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="grid scroll">
			<div class="grid__sizer"></div>
			<div class="grid__gutter-sizer"></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'grid__item scroll__item article article__preview' ); ?>>
					<header class="article__header col-xs-10 col-xs-offset-1">
						<h1 class="article__title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article__link">
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
						<section class="article__excerpt col-xs-10 col-xs-offset-1">
							<?php the_excerpt(); ?>
						</section>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
		</div>
		<!-- End of the main loop -->
		<nav class="post__nav">
			<div class="pagination">
				<div class="pagination__older"><?php next_posts_link( 'Older posts' ); ?></div>
				<div class="pagination__newer"><?php previous_posts_link( 'Newer posts' ); ?></div>
			</div>
			<div class="view-more"><button class="view-more__button">View more</button></div>
		</nav>
	<?php else : ?>
		<div class="row">
			<article <?php post_class('col-xs col-sm-8 col-sm-offset-2 article'); ?>>
				<header class="article__header">
					<h1 class="article__title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article__link">
							<?php the_title(); ?>
						</a>
					</h1>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				</header>
			</article>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
