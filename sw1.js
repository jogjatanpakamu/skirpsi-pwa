// // the cache version gets updated every time there is a new deployment
// const CACHE_VERSION = 121;
// const CURRENT_CACHE = `main-${CACHE_VERSION}`;
// var isOnline = true;
// var isLoggedIn = false;
// // these are the routes we are going to cache for offline support
// const cacheFiles = [
//   '/client/',
//   '/client/assets/css/pages/filepond.css',
//   '/client/assets/extensions/filepond/filepond.js',
//   '/client/assets/extensions/jquery/jquery.min.js',
//   '/client/assets/extensions/simple-datatables/umd/simple-datatables.js',
//   '/client/assets/extensions/sweetalert2/sweetalert2.min.js',
//   '/client/assets/extensions/toastify-js/src/toastify.js',
//   '/client/assets/images/logo/favicon.png',
//   '/client/assets/images/logo/favicon.svg',
//   '/client/assets/images/produk/.p1.jpeg',
//   '/client/assets/images/produk/.p2.jpeg',
//   '/client/assets/images/produk/.p3.jpeg',
//   '/client/assets/js/db/idb-keyval-iife.min.js',
//   '/client/assets/js/main.js',
//   '/client/assets/js/pages/filepond.js',
//   '/client/assets/js/pages/simple-datatables.js',
//   '/client/assets/js/sweetalert2/sweetalert2.js',
//   '/client/manifest.json',
//   '/client/sw.js'
// ];

// main().catch(console.error);

// async function main() {
//   await sendMessage({ requestStatusUpdate: true });
// }

// // on install we download the routes we want to cache for offline
// self.addEventListener('install', evt =>
//   evt.waitUntil(
//     caches.open(CURRENT_CACHE).then(cache => {
//       return cache.addAll(cacheFiles);
//     })
//   )
// );

// // on activation we clean up the previously registered service workers
// self.addEventListener('activate', evt =>
//   evt.waitUntil(
//     caches.keys().then(cacheNames => {
//       return Promise.all(
//         cacheNames.map(cacheName => {
//           if (cacheName !== CURRENT_CACHE) {
//             return caches.delete(cacheName);
//           }
//         })
//       );
//     }),
//     evt.waitUntil(clients.claim())
//   )
// );

// // fetch the resource from the network
// const fromNetwork = (request, timeout) =>
//   new Promise((fulfill, reject) => {
//     const timeoutId = setTimeout(reject, timeout);
//     fetch(request).then(response => {
//       clearTimeout(timeoutId);
//       fulfill(response);
//       update(request);
//     }, reject);
//   });

// // fetch the resource from the browser cache
// const fromCache = request =>
//   caches.open(CURRENT_CACHE).then(cache => cache.match(request).then(matching => matching || cache.match('/client/katalog.php')));

// // cache the current page to make it available for offline
// const update = request => caches.open(CURRENT_CACHE).then(cache => fetch(request).then(response => cache.put(request, response)));

// // on message
// self.addEventListener('message', evt => {
//   if (evt.data.statusUpdate) {
//     ({ isOnline, isLoggedIn } = evt.data.statusUpdate);
//     console.log(`[Service Worker] (v${CACHE_VERSION}) status update, isOnline:${isOnline} }} isOnline:${isLoggedIn}`);
//   }
// });

// async function sendMessage(msg) {
//   var allClients = await clients.matchAll({ includeUncontrolled: true });
//   return Promise.all(
//     allClients.map(function clientMsg(client) {
//       var chan = new MessageChannel();
//       chan.port1.onmessage = onMessage;
//       return client.postMessage(msg, [chan.port2]);
//     })
//   );
// }

// // general strategy when making a request (eg if online try to fetch it
// // from the network with a timeout, if something fails serve from cache)

// self.addEventListener('fetch', evt => {
//   evt.respondWith(fromNetwork(evt.request, 10000).catch(() => fromCache(evt.request)));
//   evt.waitUntil(update(evt.request));
// });
