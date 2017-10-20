	</div>
</main>
<footer class="footer row center-xs large align stripes">
	<div class="footer__container col-xs-10 col-sm-8">
		<nav class="footer__nav row">
			<div class="col-xs col-sm-10 col-sm-offset-1">
				<?php
					wp_nav_menu(
						array(
						'theme_location' => 'social-menu'
						)
					);
				?>
			</div>
		</nav>
		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<?php dynamic_sidebar( 'footer-widget' ); ?>
		<?php endif; ?>
	</div>
</footer>
<script>
// check to see whether the document has loaded
document.addEventListener("DOMContentLoaded", function() {
	// Checks to see whether all images have loaded in .main
	imagesLoaded( document.querySelector('.main'), function( instance ) {
		// init Masonry
		var msnry = new Masonry( '.grid', {
			// Masonry options...
			itemSelector: '.grid__item',
			columnWidth: '.grid__sizer',
			gutter: '.grid__gutter-sizer',
			horizontalOrder: true,
			percentPosition: true,
		});

		// init Infinite Scroll
		var infScroll = new InfiniteScroll( '.grid', {
			// Infinite Scroll options...
			append: '.grid__item',
			outlayer: msnry,
			path: '.prev-post__link',
			hideNav: '.pagination'
		});

		// init Reframe.js
		reframe('iframe');

		// Init FLickity
		var flkty = new Flickity( '.gallery__list', {
			cellSelector: '.gallery__item',
			wrapAround: true,
			autoPlay: true,
		});
	});
});
</script>
<?php wp_footer(); ?>
</body>
</html>
