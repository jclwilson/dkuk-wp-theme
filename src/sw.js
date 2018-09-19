var CACHE_VERSION = 'DKUK-5';
var CACHE_FILES = [
	'/wp-content/themes/dkuk-wp-theme/style.css',
	'/wp-content/themes/dkuk-wp-theme/assets/fonts/WorkSans-Regular.ttf',
	'/wp-content/themes/dkuk-wp-theme/assets/fonts/WorkSans-Bold.ttf',
	'/wp-content/themes/dkuk-wp-theme/assets/js/main.min.js',
	'/wp-content/themes/dkuk-wp-theme/assets/img/logo.svg'
];

self.addEventListener('install', event => {
	event.waitUntil(
		caches.open(CACHE_VERSION).then(function(cache) {
			return cache.addAll(CACHE_FILES);
		})
	);
});

self.addEventListener('fetch', function(event) {
	// Stop the service worker chrome devtools bug
	// https://bugs.chromium.org/p/chromium/issues/detail?id=823392
	if (event.request.cache === 'only-if-cached' && event.request.mode !== 'same-origin') {
		return;
	}

	//This service worker won't touch non-get requests
	if (event.request.method != 'GET') {
		return;
	}
	
	//This service worker won't touch the admin area and preview pages
	if (event.request.url.match(/wp-admin/) || event.request.url.match(/preview=true/)) {
		return;
	}

	// Then check cache, and then network if no cache.
	event.respondWith(
		caches.match(event.request).then(function(response) {
			return response || fetch(event.request);
		})
	);
});

self.addEventListener('activate', event => {
	event.waitUntil(
		caches.keys().then(function(keys) {
			return Promise.all(
				keys.map(function(key, i) {
					if (key !== CACHE_VERSION) {
						return caches.delete(keys[i]);
					}
				})
			)
		})
	);
});
