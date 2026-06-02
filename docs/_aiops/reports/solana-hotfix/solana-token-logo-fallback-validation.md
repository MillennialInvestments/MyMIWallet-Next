# Solana Token Logo Fallback Validation

- Generated: Tue Jun  2 01:29:56 AM UTC 2026
- Branch: fix/solana-token-logo-fallbacks

## Purpose

Prevent bad external token logo URLs from being appended into the Solana Exchange DOM before browser image loading.

## PHP Lint
```
No syntax errors detected in app/Modules/Exchange/Views/Solana/index.php
No syntax errors detected in app/Modules/Exchange/Views/Solana/assets.php
No syntax errors detected in app/Modules/Exchange/Views/Solana/swap.php
```

## Patch Markers
```
434-    $(document).ajaxComplete(function (_evt, xhr) {
435-        try {
436-            const res = xhr.responseJSON;
437-            if (res && typeof res.csrf === 'string' && res.csrf.length > 0) {
438-                window.CSRF_TOKEN_HASH = res.csrf;
439-            }
440-        } catch (_) { /* ignore */ }
441-    });
442-});
443-
444:// MYMI_SOLANA_TOKEN_LOGO_FALLBACKS_20260601
445-// Sanitize Solana token logo URLs before rendering token cards/tables.
446-// This prevents bad external TLS/image URLs from being appended into the DOM.
447-window.MYMI_SOLANA_TOKEN_LOGO_FALLBACK = window.MYMI_SOLANA_TOKEN_LOGO_FALLBACK || <?= json_encode(base_url('assets/images/mymi-token-placeholder.svg')) ?>;
448-
449-(function () {
450-    const fallbackLogo = window.MYMI_SOLANA_TOKEN_LOGO_FALLBACK;
451-    const blockedHosts = ['secureservercdn.net', 'myftpupload.com'];
452-    const unsafeSchemes = ['javascript:', 'data:', 'blob:'];
453-
454-    function isLogoKey(key) {
455-        return /(^|_)(coin_)?logo($|_)|logouri|logo_uri|logo_url|tokenimage|token_image|image|icon/i.test(String(key || ''));
456-    }
457-
458:    window.mymiSanitizeSolanaTokenLogoUrl = window.mymiSanitizeSolanaTokenLogoUrl || function (value) {
459-        if (typeof value !== 'string') {
460-            return fallbackLogo;
461-        }
462-
463-        const raw = value.trim();
464-        const lowered = raw.toLowerCase();
465-
466-        if (!raw || lowered === 'null' || lowered === 'undefined') {
467-            return fallbackLogo;
468-        }
469-
470-        if (lowered.startsWith('http://')) {
471-            return fallbackLogo;
472-        }
473-
474-        for (const scheme of unsafeSchemes) {
475-            if (lowered.startsWith(scheme)) {
476-                return fallbackLogo;
477-            }
478-        }
479-
480-        try {
481-            const parsed = new URL(raw, window.location.origin);
482-            const host = parsed.hostname.toLowerCase();
483-
484-            if (parsed.protocol !== 'https:' && parsed.origin !== window.location.origin) {
485-                return fallbackLogo;
486-            }
487-
488-            for (const blockedHost of blockedHosts) {
489-                if (host === blockedHost || host.endsWith('.' + blockedHost)) {
490-                    return fallbackLogo;
491-                }
492-            }
493-
494-            return parsed.href;
495-        } catch (_err) {
496-            return fallbackLogo;
497-        }
498-    };
499-
500-    window.mymiNormalizeSolanaTokenLogoPayload = window.mymiNormalizeSolanaTokenLogoPayload || function (payload) {
501-        const seen = new WeakSet();
502-
503-        function walk(node) {
504-            if (!node || typeof node !== 'object') {
505-                return node;
506-            }
507-
508-            if (seen.has(node)) {
509-                return node;
510-            }
511-
512-            seen.add(node);
513-
514-            if (Array.isArray(node)) {
515-                node.forEach(walk);
516-                return node;
517-            }
518-
519-            Object.keys(node).forEach(function (key) {
520-                const value = node[key];
521-
522-                if (typeof value === 'string' && isLogoKey(key)) {
523:                    node[key] = window.mymiSanitizeSolanaTokenLogoUrl(value);
524-                    return;
525-                }
526-
527-                if (value && typeof value === 'object') {
528-                    walk(value);
529-                }
530-            });
531-
532-            return node;
533-        }
534-
535-        return walk(payload);
536-    };
537-
538-    document.addEventListener('error', function (event) {
539-        const target = event.target;
540-
541-        if (!target || target.tagName !== 'IMG') {
542-            return;
543-        }
544-
545-        if (target.dataset && target.dataset.mymiLogoFallbackApplied === '1') {
546-            return;
547-        }
548-
549-        const currentSrc = String(target.getAttribute('src') || '');
550:        const safeSrc = window.mymiSanitizeSolanaTokenLogoUrl(currentSrc);
551-
552-        if (safeSrc && safeSrc !== currentSrc) {
553-            target.dataset.mymiLogoFallbackApplied = '1';
554-            target.src = safeSrc;
555-        }
556-    }, true);
557-})();
558-
559-
560-mymiWhenJqueryReady(function () {
561-  // Build POST data with CSRF directly from PHP-rendered globals.
562-  const csrfName = window.CSRF_TOKEN_NAME || (window.CSRF_TOKEN && window.CSRF_TOKEN.name);
563-  const csrfHash = window.CSRF_TOKEN_HASH || (window.CSRF_TOKEN && window.CSRF_TOKEN.hash);
564-  const postData = {};
565-
566-  if (csrfName && csrfHash) {
567-    postData[csrfName] = csrfHash;
568-  }
569-
570-  $.ajax({
571-    url: '/index.php/Exchange/Solana/fetchFrontendData',
572-    method: 'POST',
573-    type: 'POST',
574-    data: postData,
575-    dataType: 'json',
576-    headers: {
577-      'X-Requested-With': 'XMLHttpRequest',
578-      'X-CSRF-TOKEN': csrfHash || ''
579-    },
580-    xhrFields: { withCredentials: true }
581-  })
582-  .done(function (response) {
583:    // MYMI_SOLANA_TOKEN_LOGO_NORMALIZE_RESPONSE_20260601
584-    response = window.mymiNormalizeSolanaTokenLogoPayload
585-        ? window.mymiNormalizeSolanaTokenLogoPayload(response)
586-        : response;
587-
588-    if (!response || response.status !== 'success') {
589-      console.error('Failed to fetch data:', response?.message || 'Unknown error');
590-      return;
591-    }
592-
593-    const data = response.data || {};
594-
595-    // Helpers
596-    function formatCurrency(value) {
597-      const number = parseFloat(value) || 0;
598-      return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
599-    }
600-    function extractTokens(payload) {
601-      if (Array.isArray(payload)) return payload;
602-      if (payload && Array.isArray(payload.all)) return payload.all;
603-      if (payload && Array.isArray(payload.tokens)) return payload.tokens;
604-      return [];
605-    }
606-
607-    // Overview
608-    $('#solana-total').text(formatCurrency(data.mySolanaData?.totalSolana ?? 0));
609-    $('#solana-value').text(`$${formatCurrency(data.mySolanaData?.totalValue ?? 0)}`);
610-    $('#solana-pl').text(`$${formatCurrency(data.mySolanaData?.profitLoss24hr ?? 0)}`);
611-
612-    // Market
613-    $('#solana-price').html(`$${formatCurrency(data.marketData?.currentPrice ?? 0)} <span class="currency currency-usd">USD</span>`);
614-    $('#market-cap').text(`$${formatCurrency(data.marketData?.market_cap ?? 0)}`);
615-    $('#daily-volume').text(`$${formatCurrency(data.marketData?.dailyVolume ?? 0)}`);
616-
617-    const mtdPL = parseFloat(data.marketData?.mtdPL) || 0;
618-    $('#mtd-pl-change')
619-      .text(`${formatCurrency(mtdPL)} MTD`)
620-      .removeClass('up text-success down text-danger')
621-      .addClass(mtdPL >= 0 ? 'up text-success' : 'down text-danger');
622-
623-    $('#daily-pl').text(`${formatCurrency(data.marketData?.dailyPL ?? 0)} %`);
624-    $('#hourly-pl').text(`${formatCurrency(data.marketData?.hourlyPL ?? 0)} %`);
625-
626-    // Tokens
627-    const tokens = extractTokens(data.allSolanaToken);
628-    updateSolanaAssets(tokens);
629-    setTimeout(() => updateTopPerformingTokens(tokens), 100);
630-
631-    // Notifications + Network
632-    updateSolanaNotifications(data.marketData?.notifications || []);
633-    $('#network-status').text(data.marketData?.networkStatus ?? 'Loading...');
634-    $('#transaction-speed').text(data.marketData?.transactionSpeed ?? 'Loading...');
635-    $('#network-throughput').text(data.marketData?.networkThroughput ?? 'Loading...');
636-  })
637-  .fail(function (xhr) {
638-    if (xhr.status === 401) {
639-      console.warn('Not authenticated; prompt login or connect wallet.');
640-      // show login/connect modal here if desired
641-    } else if (xhr.status === 403) {
642-      console.warn('CSRF forbidden (403). Ensure CSRF token is rendered into the page and sent.');
643-    } else {
644-      console.error('Error fetching data:', xhr.status, xhr.responseText || xhr.statusText);
645-    }
646-  });
647-
648-  function updateSolanaAssets(tokens) {
649-    const $list = $('#solana-assets-list');
650-    $list.empty();
651-
652-    if (Array.isArray(tokens) && tokens.length > 0) {
653-      tokens.forEach(t => {
```

## Unsafe Logo Direct-Render Check
```
app/Modules/Exchange/Views/Solana/index.php:451:    const blockedHosts = ['secureservercdn.net', 'myftpupload.com'];
```

## Security Check
```

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-02 01:29:56 UTC+00:00

Solana wallet secret audit complete.
Mode: DRY-RUN
Scanned: 2
Candidates: 2
Already encrypted: 2
Plaintext found: 0
Updated: 0
Skipped: 0
Errors: 0
Report: docs/_aiops/reports/solana-security-hardening/wallet-secret-backfill-audit-20260602-012956.md
```
