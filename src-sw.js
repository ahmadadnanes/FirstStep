importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js');

self.addEventListener('install' , event => {
    workbox.precaching.precacheAndRoute(self.__WB_MANIFEST);
})

workbox.routing.registerRoute(
    ({request}) => request.destination === 'image',
    new workbox.strategies.CacheFirst()
);

workbox.routing.registerRoute(
    ({request}) => request.destination !== 'image',
    new workbox.strategies.NetworkFirst()
);
