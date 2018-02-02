<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row"> <!-- Necessary for col beneath -->
			<article <?php post_class('article col-xs col-sm-8 col-sm-offset-2')?>>  <!-- This first wrapper makes the white box that surroundings the article post -->
				<div class="row">  <!-- Necessary for col beneath -->
					<div class="article__container col-xs col-sm-10 col-sm-offset-1">  <!-- This second wrapper contains the article content and ensures it doesn't go right to the edges of the larger white box -->
						<?php if ( have_rows('colours') || have_rows('haircuts') ):?>
							<?php get_template_part( 'content', 'salon' );?>
						<?php endif ?>
						<header class="article__header"> <!-- Post header contains title, link, exhibition info, perhaps podcast info??? -->
							<h1 class="article__title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article__link">
									<?php if (get_field('exhibition_title') || get_field('exhibition_organiser')) : ?>
										<?php the_field('exhibition_title'); ?>
										<?php the_field('exhibition_organiser'); ?>
									<?php else: ?>
										<?php the_title(); ?>
									<?php endif ?>
								</a>
							</h1>
							<?php if ( get_field( "start_date" ) ): ?>
								<?php get_template_part('exhibition', 'dates'); ?>
							<?php endif ?>
						</header>
						<!-- Either Gallery, or thumbnail if no gallery, or none if neither -->
						<?php if ( get_field( "gallery" ) ) : ?>
							<?php get_template_part( 'content', 'gallery' ); ?>
						<?php elseif ( has_post_thumbnail() ) : ?>
							<section class="gallery">
								<?php the_post_thumbnail(); ?>
							</section>
						<?php endif ?>
						<!-- If it's a podcast post then the podcast player appears beneath the image -->
						<?php if ( have_rows('podcast_links') || get_field("podcast_file") ): ?>
							<?php get_template_part( 'content', 'podcast' ); ?>
						<?php endif ?>
						<!-- Conditional tags for salon content, atm just the colours and cuts info -->
						<!-- Designed to be displayed only on the about page -->
						<!-- Post content, this is used by all posts, so will display for Exhibitions, Podcasts, Posts, etc. -->
						<section class="article__content">
							<?php the_content(); ?>
						</section>
					</div>
				</div>
			</article>
		</div>
	<?php endwhile; ?>
	<!-- End of the main loop -->
<?php endif; ?>
<?php get_footer(); ?>
