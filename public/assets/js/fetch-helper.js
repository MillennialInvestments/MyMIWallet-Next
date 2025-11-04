(async () => {
  if (typeof window === 'undefined') {
    return;
  }

  async function fetchAndStore(url, storeKey) {
    const headers = {
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
    };
    const csrfHeader = document.querySelector('meta[name="csrf-header"]')?.content;
    const csrfToken  = document.querySelector('meta[name="csrf-token"]')?.content;
    if (csrfHeader && csrfToken) {
      headers[csrfHeader] = csrfToken;
    }

    const res = await fetch(url, {
      method: 'GET',
      headers,
      credentials: 'same-origin',
      cache: 'no-store',
    });

    if (!res.ok) {
      console.warn(`API ${url} -> ${res.status}`);
      return null;
    }

    const json = await res.json();
    window.__budgetState = window.__budgetState || {};
    window.__budgetState[storeKey] = json?.data ?? json;
    return json;
  }

  window.fetchAndStore = fetchAndStore;
})();