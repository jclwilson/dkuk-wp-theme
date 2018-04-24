	</div>
</main>
<footer class="footer row center-xs stripes">
	<div class="footer__container col-xs">
		<div class="row">  <!-- Necessary for col beneath -->
			<div class="col-xs col-sm-10 col-sm-offset-1">  <!-- This second wrapper contains the article content and ensures it doesn't go right to the edges of the larger white box -->
				<nav class="footer__nav row">
					<div class="col-xs">
						<?php
							wp_nav_menu(
								array(
								'theme_location' => 'social-menu',
								'fallback_cb' => false
								)
							);
						?>
					</div>
				</nav>
				<div class="footer__sidebar row">
					<div class="col-xs">
						<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
							<?php dynamic_sidebar( 'footer-widget' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php if ( is_singular() ) : ?>
	<script>
		// Only load below if it's on a singular page
		document.addEventListener("DOMContentLoaded", function() {
			// init Reframe.js
			reframe('iframe');
		});
	</script>
<?php else : ?>
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
					percentPosition: true,
				});

				// init Infinite Scroll
				var infScroll = new InfiniteScroll( '.scroll', {
					// Infinite Scroll options...
				  append: '.scroll__item',
				  outlayer: msnry,
				  path: '.prev-post__link',
				  hideNav: '.pagination',
				  // disable loading on scroll
				  loadOnScroll: false,
				  status: '.page-load-status',
				});

				// load next page & enable loading on scroll on button click
				var viewMoreButton = document.querySelector('.view-more__button');

				if (viewMoreButton !== undefined && viewMoreButton !== null) {
					viewMoreButton.addEventListener( 'click', function() {
					  // load next page
					  infScroll.loadNextPage();
					  // enable loading on scroll
					  infScroll.options.loadOnScroll = true;
					  // hide page
					  viewMoreButton.style.display = 'none';
					});
				}
				// Ends Infinite Scroll Init
			});
		});
	</script>
<?php endif; ?>
<script>
	if ('serviceWorker' in navigator) {
	  window.addEventListener('load', () => {
		  navigator.serviceWorker.register('/sw.js')
	  		.then(function(reg) {
	  	    // registration worked
	  	    console.log('Service Worker registered');
	  	  }).catch(function(error) {
	  	    console.error(error);
	  	  });
	  });
	}
</script>
<?php wp_footer(); ?>
</body>
</html>
