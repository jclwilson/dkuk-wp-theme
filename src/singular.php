<?php get_header(); ?>
<div class="row">
	<div class="singular__container col-xs col-sm-8 col-sm-offset-2">
		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class('col-xs col-sm-10 col-sm-offset-1 singular'); ?>
						<header class="post__header">
							<h1 class="post__title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link">
										<?php if (get_field('exhibition_title') || get_field('exhibition_organiser')) : ?>
											<?php if (get_field('exhibition_title')):?><div class="exhibition__title"><?php the_field('exhibition_title'); ?></div><?php endif; ?>
											<?php if (get_field('exhibition_organiser')):?><div class="exhibition__organiser">By <?php the_field('exhibition_organiser'); ?></div><?php endif; ?>
										<?php else: ?>
											<?php the_title(); ?>
										<?php endif; ?>
									</a>
								</h1>
							<?php if (get_field('start_date') || get_field('end_date')) : ?>
								<div class="exhibition__dates">
									<!-- Start Date -->
									<?php if (get_field('start_date')):
										// get raw start date
										$start_date = get_field('start_date', false, false);
										// make date object
										$start_date = new DateTime($start_date);
									?>
										<time class="exhibition__start">
											<!-- Conditional tags to switch between full date or month-year -->
											<?php echo $start_date->format('F–Y'); ?>
										</time>
									<?php endif; ?>
									<!-- End Date -->
									<?php if (get_field('end_date')):
										// get raw end date
										$end_date = get_field('end_date', false, false);
										// make date object
										$end_date = new DateTime($end_date);
									?>
										<span>to </span><time class="exhibition__end">
											<!-- Conditional tags to switch between full date or month-year -->
											<?php echo $end_date->format('F–Y'); ?>
										</time>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</header>
						<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
						<?php if ( get_field( "gallery" ) ) : ?>
							<?php get_template_part( 'content', 'gallery' ); ?>
						<?php elseif ( has_post_thumbnail() ) : ?>
							<section class="gallery">
								<?php the_post_thumbnail(); ?>
							</section>
						<?php endif; ?>
						<?php if ( have_rows('podcast_links') || get_field("podcast_file") ) : ?>
							<?php get_template_part( 'content', 'podcast' ); ?>
						<?php endif; ?>
						<section class="post__content">
							<?php the_content(); ?>
						</section>
						<?php if ( have_rows('colours') || have_rows('haircuts') ) : ?>
							<?php get_template_part( 'content', 'salon' ); ?>
						<?php endif; ?>
					</article>
				<?php endwhile; ?>
				<!-- End of the main loop -->
			</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
