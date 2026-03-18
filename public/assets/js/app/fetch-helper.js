import { authFetch, PremiumAccessError } from '/assets/js/helpers/authFetch.js';

function redirectToUpgrade(payload = {}) {
  const upgradeUrl = payload?.data?.upgrade_url || payload?.upgrade_url || '/Memberships';
  const message = payload?.message || 'Premium access required.';
  window.dispatchEvent(new CustomEvent('mymi:premium-required', { detail: { upgradeUrl, message, payload } }));
  if (typeof window !== 'undefined' && typeof window.alert === 'function') {
    window.alert(message);
  }
  window.location.assign(upgradeUrl);
}

export async function fetchJSON(url, opts = {}) {
  const headers = new Headers(opts.headers || {});
  if (!headers.has('Accept')) {
    headers.set('Accept', 'application/json');
  }

  const response = await authFetch(url, {
    ...opts,
    headers,
  });

  const contentType = response.headers.get('content-type') || '';
  if (!contentType.includes('application/json')) {
    const text = await response.text();
    const snippet = text.slice(0, 250);
    const error = new Error(`Non-JSON response (${response.status}) from ${url}: ${snippet}`);
    error.status = response.status;
    error.body = snippet;
    throw error;
  }

  const json = await response.json();
  if (!response.ok || (json && json.status === 'error')) {
    const message = (json && json.message) || `Request failed (${response.status}) for ${url}`;
    if (response.status === 403 && json?.data?.upgrade_url) {
      throw new PremiumAccessError(message, json, response.status);
    }
    const error = new Error(message);
    error.status = response.status;
    error.payload = json;
    throw error;
  }

  return json.data ?? json;
}
window.addEventListener('mymi:premium-required', (event) => {
  console.warn('Premium access required', event.detail || {});
});

window.MyMIFetch = window.MyMIFetch || {};
window.MyMIFetch.redirectToUpgrade = redirectToUpgrade;
window.MyMIFetch.PremiumAccessError = PremiumAccessError;
