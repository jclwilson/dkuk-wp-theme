<!DOCTYPE html>
<!-- Set lang attribute according to blog default -->
<html <?php language_attributes(); ?>>
<head>
	<!-- Sets Charset according to blog default -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Sets title according to page type
		Written by @jclwilson -->
	<title>
            <?php if (function_exists('is_tag') && is_tag()) {
                echo 'Tag Archive for &quot;'.$tag.'&quot; - ';
            } elseif (is_archive()) {
                wp_title(''); echo ' Archive - ';
            } elseif (is_search()) {
                echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
            } elseif (!(is_404()) && (is_single()) || (is_page())) {
                wp_title(''); echo ' - ';
            } elseif (is_404()) {
                echo 'Not Found - ';
            } bloginfo('name'); ?>
		</title>
		<base href="<?php bloginfo('url'); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<!-- Set Google Site Verification code for Search Console -->
		<meta name="google-site-verification" content="">
		<!-- External CSS -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<link href="http://gmpg.org/xfn/11" rel="profile" />
		<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
		<!-- Scripts -->
		<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
		<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
	<header>
		<a href="<?php bloginfo('url'); ?>">
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
					echo '<img src="'. esc_url( $logo[0] ) .'">';
				} else {
					echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
				}
			?>
		</a>
		<nav>
			<?php
				wp_nav_menu(
					array(
					'theme_location' => 'main-menu'
					)
				);
			?>
		</nav>
	</header>
	<main class="grid">
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
					<?php the_post_thumbnail(); ?>
					<section>
						<?php the_excerpt(); ?>
					</section>
				</article>
    		<?php endwhile; ?>
			<!-- End of the main loop -->
			<nav class="pagination">
				<div><?php next_posts_link( 'Older posts' ); ?></div>
				<div><?php previous_posts_link( 'Newer posts' ); ?></div>
			</nav>
		<?php else : ?>
			<?php _e('Sorry, no posts matched your criteria.'); ?>
		<?php endif; ?>
	</main>
	<footer>
		<nav>
			<?php
				wp_nav_menu(
					array(
					'theme_location' => 'social-menu'
					)
				);
			?>
		</nav>
	</footer>
	<script>
	// with Masonry & vanilla JS
	// init Masonry
	var msnry = new Masonry( '.grid', {
	  // Masonry options...
	  itemSelector: '.grid__item',
	  debug: true
	});

	// init Infinite Scroll
	var infScroll = new InfiniteScroll( '.grid', {
	  // Infinite Scroll options...
	  append: '.grid__item',
	  outlayer: msnry,
	  path: '.prev-post__link',
	  hideNav: '.pagination',
	  debug: true
	});
</script>
</body>
</html>
