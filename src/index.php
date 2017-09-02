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
		<link href="http://gmpg.org/xfn/11" rel="profile" />
		<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
		<!-- CSS -->
		<style>
			/* Inline CSS */
			html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
		</style>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<!-- End of CSS -->
		<!-- Scripts -->
		<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
		<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
		<!-- wp_head
		This is necessary for plugins that need to put scripts in the head.
		It goes here to avoid us overwriting any of the scripts -->
		<?php wp_head(); ?>
		<!-- End of wp_head -->
</head>
<body>
	<header>
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    			<?php the_custom_logo(); ?>
			<?php else : ?>
    			<h1 class="site-title"><a href="<?php bloginfo('url'); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
			<?php endif; ?>
		<nav>
			<?php
				wp_nav_menu(
					array(
					'theme_location' => 'main-menu'
					)
				);
			?>
		</nav>
		<?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
			<?php dynamic_sidebar( 'header-widget' ); ?>
		<?php endif; ?>
	</header>
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
		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<?php dynamic_sidebar( 'footer-widget' ); ?>
		<?php endif; ?>
	</footer>
	<script>
	// with Masonry & vanilla JS
	// init Masonry
	var msnry = new Masonry( '.grid', {
		// Masonry options...
		itemSelector: '.grid__item',
		horizontalOrder: true,
		columnWidth: '.grid__sizer',
		gutter: '.grid__gutter-sizer',
		percentPosition: true
	});

	// init Infinite Scroll
	var infScroll = new InfiniteScroll( '.grid', {
	  // Infinite Scroll options...
	  append: '.grid__item',
	  outlayer: msnry,
	  path: '.prev-post__link',
	  hideNav: '.pagination'
	});
</script>
<?php wp_footer(); ?>
</body>
</html>
