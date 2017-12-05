<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'col-xs col-sm-10 col-sm-offset-1 singular exhibition' ); ?>>
					<header class="post__header">
						<h1>
							<?php if (get_field('exhibition_title')):?><div class="exhibition__title"><?php the_field('exhibition_title'); ?></div><?php endif ?>
							<?php if (get_field('exhibition_organiser')):?><div class="exhibition__organiser">By <?php the_field('exhibition_organiser'); ?></div><?php endif ?>
						</h1>
						<div class="exhibition__dates">
							<!-- Start Date -->
							<?php if (get_field('start_date')):
								// get raw start date
								$start_date = get_field('start_date', false, false);
								// make date object
								$start_date = new DateTime($start_date);
							?>
								<time class="exhibition__start"><?php echo $start_date->format('F–Y'); ?></time>
							<?php endif ?>
							<!-- End Date -->
							<?php if (get_field('end_date')):
								// get raw end date
								$end_date = get_field('end_date', false, false);
								// make date object
								$end_date = new DateTime($end_date);
							?>
								<span>to </span><time class="exhibition__end"><?php echo $end_date->format('F–Y'); ?></time>
							<?php endif ?>
						</div>
					</header>
					<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
					<?php if ( get_field( "gallery" ) ) : ?>
						<?php get_template_part( 'content', 'gallery' ); ?>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<section class="gallery">
							<?php the_post_thumbnail(); ?>
						</section>
					<?php endif; ?>
					<section class="post__content">
						<?php the_content(); ?>
					</section>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
