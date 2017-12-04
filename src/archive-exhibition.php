<?php get_header(); ?>
<div class="center-xs">
	<?php if ( have_posts() ) : ?>
		<ul class="grid exhibition-list">
			<div class="grid__sizer"></div>
			<div class="grid__gutter-sizer"></div>
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="grid__item exhibition-list__item">
					<h1 class="exhibition-list__title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="exhibition-list__link">
							<?php the_title(); ?>
						</a>
					</h1>
				</li>
			<?php endwhile; ?>
		</ul>
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
			<article <?php post_class('col-xs col-sm-8 col-sm-offset-2 singular'); ?>>
				<header class="post__header">
					<h1 class="post__title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link">
							<?php the_title(); ?>
						</a>
					</h1>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				</header>
			</article>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
