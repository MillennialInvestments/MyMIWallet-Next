/* MyMI SW v1.2 (tolerant precache + logging) */
const VERSION = 'v1.2';
const CACHE   = `mymi-shell-${VERSION}`;

/**
 * IMPORTANT: Replace these with real, existing URLs under your origin.
 * If you're using Vite, swap /css/app.css & /js/app.js for your hashed build paths,
 * e.g. /build/assets/app-123abc.css and /build/assets/app-456def.js
 */
const ASSETS = [
  '/',                          // ok to keep
  '/manifest.webmanifest',      // ensure it exists at the root
  // Replace the next two to match Vite output, or remove them until you set real paths:
  // '/css/app.css',
  // '/js/app.js',
  '/assets/icons/icon-192.png', // ensure these exist (use .png if that's what you ship)
  '/assets/icons/icon-512.png'
];

// Resolve a path relative to this SW's scope
const toAbs = (p) => new URL(p, self.registration.scope).toString();
// public/sw.js
self.addEventListener('install', () => self.skipWaiting());
self.addEventListener('activate',  () => self.clients.claim());

// self.addEventListener('install', (event) => {
//   event.waitUntil((async () => {
//     const cache = await caches.open(CACHE);
//     const urls  = ASSETS.map(toAbs);

//     // Fetch & cache one-by-one; skip failures (log them)
//     await Promise.allSettled(urls.map(async (url) => {
//       try {
//         const res = await fetch(url, { cache: 'reload' });
//         if (!res || !res.ok) throw new Error(`${res && res.status} ${res && res.statusText}`);
//         await cache.put(url, res.clone());
//         // console.log('SW precached:', url);
//       } catch (err) {
//         console.warn('SW precache skipped:', url, String(err));
//       }
//     }));
//   })());
//   self.skipWaiting();
// });

// self.addEventListener('activate', (event) => {
//   event.waitUntil((async () => {
//     const keys = await caches.keys();
//     await Promise.all(keys
//       .filter(k => k.startsWith('mymi-shell-') && k !== CACHE)
//       .map(k => caches.delete(k)));
//   })());
//   self.clients.claim();
// });

// Stale-while-revalidate for text assets; pass-through for others
self.addEventListener('fetch', (event) => {
  const req = event.request;
  if (req.method !== 'GET') return;

  event.respondWith((async () => {
    const cached = await caches.match(req);
    if (cached) {
      // SWR: update in background for text-like responses
      event.waitUntil((async () => {
        try {
          const res = await fetch(req);
          const ct  = res && res.headers.get('Content-Type') || '';
          if (res && res.ok && /text|javascript|json|css|svg|xml/.test(ct)) {
            const cache = await caches.open(CACHE);
            await cache.put(req, res.clone());
          }
        } catch {}
      })());
      return cached;
    }
    try {
      const res = await fetch(req);
      const ct  = res && res.headers.get('Content-Type') || '';
      if (res && res.ok && /text|javascript|json|css|svg|xml/.test(ct)) {
        const cache = await caches.open(CACHE);
        await cache.put(req, res.clone());
      }
      return res;
    } catch {
      return new Response('Offline', { status: 503, statusText: 'Offline' });
    }
  })());
});

self.addEventListener('push', (event) => {
  let data = {};
  try { data = event.data ? event.data.json() : {}; } catch {}
  const title = data.title || 'MyMI';
  const options = {
    body:  data.body || '',
    icon:  data.icon  || '/assets/icons/icon-192.png',
    badge: data.badge || '/assets/icons/icon-192.png',
    tag:   data.tag   || 'mymi',
    data:  { url: data.url || '/' }
  };
  event.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener('notificationclick', (event) => {
  event.notification.close();
  const url = (event.notification.data && event.notification.data.url) || '/';
  event.waitUntil((async () => {
    const list = await clients.matchAll({ type: 'window', includeUncontrolled: true });
    for (const c of list) {
      if (c.url && c.url.startsWith(self.location.origin)) { c.focus(); c.navigate(url); return; }
    }
    await clients.openWindow(url);
  })());
});
