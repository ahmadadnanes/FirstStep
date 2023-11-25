const staticCacheName = 'site-static-v3';
const dynamicCacheName = 'site-dynamic-v1';
const assets = [
    '/',
    '/index.php',
    '/app/resources/views/Home.php',
    '/app/resources/views/404.php',
    '/app/Model/connect.php',
    '/app/Model/router.php',
    '/app/resources/components/error.php',
    '/app/resources/components/footer.html',
    '/app/resources/components/header.php',
    '/app/resources/components/layout.php',
    '/app/resources/components/logo.html',
    '/app/resources/components/up.html',
    '/app/resources/css/sass/main.css',
    '/app/resources/css/all.min.css',
    '/app/resources/css/bootstrap.min.css',
    '/app/resources/css/brands.min.css',
    '/app/resources/css/normal.css',
    '/app/resources/js/app.js',
    '/app/resources/js/up.js',
    '/app/resources/js/navbar.js',
    '/app/resources/js/Home.js',
    '/app/resources/img/android-chrome-192x192.png',
    '/app/resources/img/android-chrome-512x512.png',
    '/app/resources/img/apple-touch-icon.png',
    '/app/resources/img/bars-solid.svg',
    '/app/resources/img/browserconfig.xml',
    '/app/resources/img/depression-test-min.jpg',
    '/app/resources/img/Diary_img-min.jpg',
    '/app/resources/img/favicon-16x16.png',
    '/app/resources/img/favicon-32x32.png',
    '/app/resources/img/favicon.ico',
    '/app/resources/img/hands-min.jpg',
    '/app/resources/img/logo.jpg',
    '/app/resources/img/logo-removebg-preview.png',
    '/app/resources/img/logo-72x72.png',
    '/app/resources/img/logo-96x96.png',
    '/app/resources/img/logo-128x128.png',
    '/app/resources/img/logo-144x144.png',
    '/app/resources/img/logo-152x152.png',
    '/app/resources/img/logo-192x192.png',
    '/app/resources/img/logo-384x384.png',
    '/app/resources/img/logo-512x512.png',
    '/app/resources/img/mouse_keyboard-min.jpg',
    '/app/resources/img/mstile-150x150.png',
    '/app/resources/img/notepad-pencils-left-min.jpg',
    '/app/resources/img/notepad-pencils-left-large-min.jpg',
    '/app/resources/img/notepad-pencils-left-medium-min.jpg',
    '/app/resources/img/notepad-pencils-left-small-min.jpg',
    '/app/resources/img/therapy-min.jpg',
    'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
    'app/resources/views/webfonts/fa-brands-400.woff2',
    'app/resources/views/webfonts/fa-solid-900.woff2'
];
// install service worker
self.addEventListener('install', evt => {
    //console.log('service worker installed');
    evt.waitUntil(
        caches.open(staticCacheName).then((cache) => {
        console.log('caching shell assets');
        cache.addAll(assets);
    })
    );
});

self.addEventListener('activate', evt => {
    //console.log('service worker activated');
    evt.waitUntil(
        caches.keys().then(keys => {
            //console.log(keys);
            return Promise.all(keys
                .filter(key => key !== staticCacheName)
                .map(key => caches.delete(key))
            );
        })
    );
});

// fetch event
addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
            .then(function(response) {
                if (response) {
                    return response;     // if valid response is found in cache return it
                } else {
                    console.log(event.request);
                    return fetch(event.request)     //fetch from internet
                    .then(function(res) {
                        return caches.open(dynamicCacheName)
                        .then(function(cache) {
                            cache.put(event.request.url, res.clone());    //save the response for future
                            return res;   // return the fetched data
                        })
                    })
                //     .catch(function(err) {       // fallback mechanism
                //         return caches.open(CACHE_CONTAINING_ERROR_MESSAGES)
                //         .then(function(cache) {
                //             return cache.match('/offline.html');
                //         });
                //     });
                // }
            }}
    ));
  });          
