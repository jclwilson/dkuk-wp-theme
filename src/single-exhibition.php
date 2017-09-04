<?php get_header(); ?>
<main>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<?php get_template_part( 'content', 'title' ); ?>
				<section>
					<div>
						<h1><span><?php the_field('exhibition_title'); ?></span><span><?php the_field('exhibition_artist'); ?></span></h1>
					</div>
					<div>
						<?php if (get_field('start_date')):
							$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
							$format_out = 'd/m/Y'; // the format you want to end up with
							$start_date = DateTime::createFromFormat($format_in, get_field('start_date'));
							$end_date = DateTime::createFromFormat($format_in, get_field('end_date'));
						?>
							<time><p>Start Date: <?php echo $start_date->format( $format_out ); ?></p></time>
							<time><p>End Date: <?php echo $end_date->format( $format_out ); ?></p></time>
						<?php endif ?>
					</div>
				</section>
				<!-- Gallery content -->
				<?php get_template_part( 'content', 'gallery' ); ?>
				<section>
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; ?>
		<!-- End of the main loop -->
	<?php endif; ?>
</main>
<?php get_footer(); ?>
