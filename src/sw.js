    var CACHE_VERSION = 'DKUK-1';
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
  event.respondWith(
    caches.match(event.request).then(function(response) {
        return response || return fetch(event.request)
    }).catch(function(error) {
        console.error(error)
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
