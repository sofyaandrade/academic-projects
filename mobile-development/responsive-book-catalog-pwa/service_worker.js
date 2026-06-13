const CACHE_NAME = 'catalogo-livros-cache-v2';
const urlsToCache = [
  './',
  './index.html',
  './style.css',
  './manifest.json',
  './img/icon.svg',
  './img/livro1.jpg',
  './img/livro2.jpg',
  './img/livro3.jpg',
  './img/livro4.jpg',
  './img/livro5.jpg',
  './img/livro6.jpg',
  './img/livro7.jpg',
  './img/livro8.jpg',
  './img/livro9.jpg',
  './img/livro10.jpg'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => cache.addAll(urlsToCache))
  );
  self.skipWaiting();
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames =>
      Promise.all(
        cacheNames.map(name => {
          if (name !== CACHE_NAME) return caches.delete(name);
        })
      )
    )
  );
  self.clients.claim();
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => response || fetch(event.request))
  );
});
