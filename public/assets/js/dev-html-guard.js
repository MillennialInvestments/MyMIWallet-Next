(() => {
  if (typeof window === 'undefined') {
    return;
  }

  const docEl = document.documentElement;
  if (!docEl || (docEl.dataset.env || '').toLowerCase() === 'production') {
    return;
  }

  const logPrefix = '[HTML-INSTEAD-OF-JS]';
  const SKIP_HOSTS = new Set([
    'connect.facebook.net',
    'www.googletagmanager.com',
    'www.google-analytics.com',
  ]);

  async function checkScript(src) {
    if (!src) {
      return;
    }

    try {
      const url = new URL(src, window.location.href);
      if (url.origin !== window.location.origin || SKIP_HOSTS.has(url.hostname)) {
        return;
      }

      const response = await fetch(url.toString(), {
        cache: 'no-store',
        credentials: 'same-origin',
      });
      const preview = (await response.clone().text()).slice(0, 160).trim();

      if (!response.ok) {
        console.error(`${logPrefix} ${url} → HTTP ${response.status}. Preview:`, preview);
        return;
      }

      const contentType = response.headers.get('content-type') || '';
      if (!contentType.includes('javascript') && preview.startsWith('<')) {
        console.error(`${logPrefix} ${url} → ${contentType || 'unknown'} (starts with "<")`);
      }
    } catch (error) {
      console.warn(`${logPrefix} Failed to fetch ${src}:`, error);
    }
  }

  function runGuard() {
    Array.from(document.scripts)
      .map((script) => script.src)
      .filter(Boolean)
      .forEach((src) => {
        if (src.includes('dev-html-guard.js')) {
          return;
        }
        checkScript(src);
      });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runGuard);
  } else {
    runGuard();
  }
})();