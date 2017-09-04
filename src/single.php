<?php get_header(); ?>
<main class="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<?php get_template_part( 'content', 'title' ); ?>
				<!-- Gallery content -->
				<?php get_template_part( 'content', 'gallery' ); ?>
				<section class="post__content">
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; ?>
		<!-- End of the main loop -->
	<?php endif; ?>
</main>
<?php get_footer(); ?>
