<?php get_header(); ?>
<div class="center-xs">
	<noscript><h1>Exhibitions</h1></noscript>
	<?php if ( have_posts() ) : ?>
		<ul class="exhibition-list scroll">
			<?php while ( have_posts() ) : the_post();?>
				<li class="scroll__item exhibition-list__item exhibition-list__title">
					<a href="<?php the_permalink(); ?>" title="<?php the_field('exhibition_organiser'); ?>" class="exhibition-list__link">
						<?php the_field('exhibition_organiser'); ?>
					</a>
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
		<?php get_template_part( 'search', 'no-posts' ); ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
