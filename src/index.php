	<?php get_header(); ?>
	<main class="grid">
		<div class="grid__sizer"></div>
		<div class="grid__gutter-sizer"></div>
		<?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
		        <article class="grid__item">
					<header>
						<h1>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link">
								<?php the_title(); ?>
							</a>
						</h1>
					</header>
					<?php if ( has_post_thumbnail() ) : ?>
					    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					        <?php the_post_thumbnail(); ?>
					    </a>
					<?php endif; ?>
					<section>
						<?php the_excerpt(); ?>
					</section>
					<section>
						<?php if (get_field('start_date')):
							$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
							$format_out = 'd/m/Y'; // the format you want to end up with
							$start_date = DateTime::createFromFormat($format_in, get_field('start_date'));
							$end_date = DateTime::createFromFormat($format_in, get_field('end_date'));
						?>
							<time><p>Start Date: <?php echo $start_date->format( $format_out ); ?></p></time>
							<time><p>End Date: <?php echo $end_date->format( $format_out ); ?></p></time>
						<?php endif ?>
					</section>
					<section>
						<?php the_content(); ?>
					</section>
					<?php
						$images = get_field('gallery');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)

						if( $images ): ?>
						<section>
							<ul>
								<?php foreach( $images as $image ): ?>
									<li>
										<picture>
											<?php echo wp_get_attachment_image( $image["id"], $size ); ?>
											<p><?php echo $image['caption']; ?></p>
										</picture>
									</li>
									<?php endforeach; ?>
								</ul>
							</section>
						<?php endif; ?>
				</article>
    		<?php endwhile; ?>
			<!-- End of the main loop -->
			<nav class="pagination">
				<div><?php next_posts_link( 'Older posts' ); ?></div>
				<div><?php previous_posts_link( 'Newer posts' ); ?></div>
			</nav>
		<?php else : ?>
			<article class="grid__item">
				<?php _e('Sorry, no posts matched your criteria.'); ?>
			</article>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>
