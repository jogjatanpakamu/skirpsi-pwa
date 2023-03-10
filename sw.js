const version = 12;
const CACHE_NAME = `my-cache-${version}`;
const toCache = ['/', '/katalog.php', '/assets/extensions/jquery/jquery.min.js', '/assets/js/app.js', '/assets/js/main.js', '/sw.js'];

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches
      .open(CACHE_NAME)
      .then(function (cache) {
        return cache.addAll(toCache);
      })
      .then(self.skipWaiting())
  );
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    (async function () {
      const cache = await caches.open(CACHE_NAME);
      const cacheMatch = await cache.match(event.request);

      if (navigator.onLine) {
        const request = fetch(event.request);
        event.waitUntil(
          (async function () {
            const response = await request;
            await cache.put(event.request, await response.clone());
          })()
        );

        return request || cacheMatch;
      }

      return cacheMatch || caches.match('/katalog.php');
    })()
  );
});

self.addEventListener('message', function (event) {
  console.log('Message received from client ->', event.data);
  //   self.clients.matchAll().then(clients => {
  //     clients.forEach(client => client.postMessage('Hello from SW!'));
  //   });
});

self.addEventListener('activate', function (event) {
  event.waitUntil(
    caches
      .keys()
      .then(keyList => {
        return Promise.all(
          keyList.map(key => {
            if (key !== CACHE_NAME) {
              console.log('[ServiceWorker] Removing old cache', key);
              return caches.delete(key);
            }
          })
        );
      })
      .then(() => self.clients.claim())
  );
});
