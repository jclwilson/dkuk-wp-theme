<?php get_header(); ?>
		<main class="main row">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'exhibition' ); ?>>
							<header class="exhibition__header">
								<h1><span class="exhibition__title"><?php the_field('exhibition_title'); ?></span><span class="exhibition__artist"><?php the_field('exhibition_artist'); ?></span></h1>
								<div class="exhibition__dates">
									<?php if (get_field('start_date')):
										$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
										$format_out = 'd/m/Y'; // the format you want to end up with
										$start_date = DateTime::createFromFormat($format_in, get_field('start_date'));
										$end_date = DateTime::createFromFormat($format_in, get_field('end_date'));
									?>
										<time class="exhibition__start">Start Date: <?php echo $start_date->format( $format_out ); ?></time>
										<time class="exhibition__end">End Date: <?php echo $end_date->format( $format_out ); ?></time>
									<?php endif ?>
								</div>
							</header>
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
	</div>
</div>
<?php get_footer(); ?>
