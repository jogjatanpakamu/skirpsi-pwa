'use strict';

const version = 2;
var isOnline = true;
var isLoggedIn = false;
var cacheName = `my-cache-${version}`;
var allPostsCaching = false;

var cacheFiles = ['/', '/katalog.php', '/sw.js'];
self.addEventListener('install', onInstall);
self.addEventListener('activate', onActivate);
self.addEventListener('message', onMessage);
self.addEventListener('fetch', onFetch);

main().catch(console.error);

async function main() {
  await sendMessage({ requestStatusUpdate: true });
}

async function onInstall(event) {
  console.log(`[Service Worker] (${version}) installed.`);
  caches.open(cacheName).then(cache => {
    return cache.addAll(cacheFiles);
  });
  self.skipWaiting();
}

function onActivate(event) {
  event.waitUntil(handleActivation());
}

async function handleActivation() {
  await caches.keys().then(cache => {
    return Promise.all(
      cache.map(cache => {
        if (cache !== cacheName) {
          return caches.delete(cache);
        }
      })
    );
  }),
    await clients.claim();
  console.log(`[Service Worker] (${version}) activated.`);
}

async function sendMessage(msg) {
  var allClients = await clients.matchAll({ includeUncontrolled: true });
  return Promise.all(
    allClients.map(function clientMsg(client) {
      var chan = new MessageChannel();
      chan.port1.onmessage = onMessage;
      return client.postMessage(msg, [chan.port2]);
    })
  );
}

function onMessage({ data }) {
  if (data.statusUpdate) {
    ({ isOnline, isLoggedIn } = data.statusUpdate);
    console.log(`[Service Worker] (v${version}) status update, isOnline:${isOnline}, isLoggedIn:${isLoggedIn}`);
  }
}

// fetch the resource from the network
const fromNetwork = (request, timeout) =>
  new Promise((fulfill, reject) => {
    const timeoutId = setTimeout(reject, timeout);
    fetch(request).then(response => {
      clearTimeout(timeoutId);
      fulfill(response);
      update(request);
    }, reject);
  });

// fetch the resource from the browser cache
const fromCache = request =>
  caches.open(cacheName).then(cache => cache.match(request).then(matching => matching || cache.match('/katalog.php')));

// cache the current page to make it available for offline
const update = request => caches.open(cacheName).then(cache => fetch(request).then(response => cache.put(request, response)));

function onFetch(event) {
  event.respondWith(fromNetwork(event.request, 10000).catch(() => fromCache(event.request)));
  event.waitUntil(update(event.request));
}
