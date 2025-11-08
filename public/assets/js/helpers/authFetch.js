// Picks CSRF token from <meta name="csrf-token" content="...">
export async function authFetch(url, options = {}) {
  const tokenMeta = document.querySelector('meta[name="csrf-token"]');
  const csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';
  const headers = new Headers(options.headers || {});
  headers.set('X-Requested-With', 'XMLHttpRequest');
  if (csrf) headers.set('X-CSRF-TOKEN', csrf);
  return fetch(url, {
    ...options,
    headers,
    credentials: 'same-origin',
    cache: 'no-cache',
  });
}