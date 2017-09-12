<?php get_header(); ?>
	<main class="main row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'col-md-6 col-md-offset-3 singular exhibition' ); ?>>
					<header class="exhibition__header">
						<h1>
							<?php if (get_field('exhibition_title')):?><span class="exhibition__title"><?php the_field('exhibition_title'); ?></span><?php endif ?>
							<?php if (get_field('exhibition_organiser')):?><span class="exhibition__organiser"><?php the_field('exhibition_organiser'); ?></span><?php endif ?>
						</h1>
						<div class="exhibition__dates">
							<?php if (get_field('start_date')):
								$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
								$format_out = 'd/m/Y'; // the format you want to end up with
								$start_date = DateTime::createFromFormat($format_in, get_field('start_date'));
							?>
								<time class="exhibition__start">Start Date: <?php echo $start_date->format( $format_out ); ?></time>
							<?php endif ?>
							<?php if (get_field('end_date')):
								$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
								$format_out = 'd/m/Y'; // the format you want to end up with
								$end_date = DateTime::createFromFormat($format_in, get_field('end_date'));
							?>
								<time class="exhibition__end">End Date: <?php echo $end_date->format( $format_out ); ?></time>
							<?php endif ?>
						</div>
					</header>
					<!-- Gallery content -->
					<?php if ( get_field( "gallery" ) ) : ?>
						<?php get_template_part( 'content', 'gallery' ); ?>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
					<section class="post__content">
						<?php the_content(); ?>
					</section>
				</article>
			<?php endwhile; ?>
			<!-- End of the main loop -->
		<?php endif; ?>
	</main>
<?php get_footer(); ?>
