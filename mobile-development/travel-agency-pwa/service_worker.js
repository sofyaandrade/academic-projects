const CACHE_NAME = 'travel-agency-cache-v2';

const urlsToCache = [
  './',
  './index.html',
  './style.css',
  './manifest.json',
  './img/banner.jpg',
  './img/icon.svg',
  './img/img1.jpg',
  './img/servico1.jpg',
  './img/servico2.jpg',
  './img/servico3.jpg'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
  );
  self.skipWaiting();
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(name => {
          if (name !== CACHE_NAME) {
            return caches.delete(name);
          }
        })
      );
    })
  );
  self.clients.claim();
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
  );
});
