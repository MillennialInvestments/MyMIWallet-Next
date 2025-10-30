(function () {
  if (typeof window === 'undefined') {
    return;
  }

  const logPrefix = '[HTML-INSTEAD-OF-JS]';

  async function checkScript(src) {
    try {
      const response = await fetch(src, { cache: 'no-store', credentials: 'same-origin' });
      const text = (await response.clone().text()).slice(0, 160).trim();

      if (!response.ok) {
        console.error(`${logPrefix} ${src} → HTTP ${response.status}. Preview:`, text);
        return;
      }

      const contentType = response.headers.get('content-type') || '';
      if (!contentType.includes('javascript') && text.startsWith('<')) {
        console.error(`${logPrefix} ${src} → ${contentType || 'unknown'} (starts with "<")`);
      }
    } catch (error) {
      console.warn(`${logPrefix} Failed to fetch ${src}:`, error);
    }
  }

  function run() {
    const scripts = Array.from(document.scripts)
      .map((script) => script.src)
      .filter(Boolean);

    scripts.forEach((src) => {
      if (src.includes('dev-html-guard.js')) {
        return;
      }
      checkScript(src);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', run);
  } else {
    run();
  }
})();
