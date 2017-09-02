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
