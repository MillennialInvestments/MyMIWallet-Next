# Solana fetchFrontendData CSRF Hotfix Validation

- Generated: Mon Jun  1 03:20:45 PM UTC 2026
- Branch: fix/solana-fetch-frontend-csrf-token

## Purpose

Fix 500 response from /Exchange/Solana/fetchFrontendData caused by CI4 CSRF exception.

## PHP Lint
```
No syntax errors detected in app/Modules/Exchange/Views/Solana/index.php
```

## Patch Markers
```
399-                </div>
400-            </div><!-- .card -->
401-        </div><!-- .col -->
402-        <?php endif; ?>
403-    </div>
404-</div>
405-<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
406-<script <?= $nonce['script'] ?? '' ?>>
407:// MYMI_SOLANA_FETCH_FRONTEND_CSRF_20260601
408-// PHP-backed CSRF bootstrap for Solana frontend AJAX.
409-window.CSRF_TOKEN_NAME = window.CSRF_TOKEN_NAME || <?= json_encode(csrf_token()) ?>;
410-window.CSRF_TOKEN_HASH = window.CSRF_TOKEN_HASH || <?= json_encode(csrf_hash()) ?>;
411-window.CSRF_TOKEN = window.CSRF_TOKEN || {
412-    name: window.CSRF_TOKEN_NAME,
413-    hash: window.CSRF_TOKEN_HASH
414-};
415-</script>
416-
417-<script <?= $nonce['script'] ?? '' ?>>
418-// --- Global jQuery AJAX setup: send XHR header + attach CSRF automatically ---
419-// MYMI_SOLANA_AJAX_CSRF_JQUERY_READY_20260601
420-// This block must wait for jQuery because Solana pages may render inline scripts before theme JS.
421-mymiWhenJqueryReady(function () {
422-    var $ = window.jQuery;
423-
424-    if (!$) {
425-        return;
426-    }
427-
428-    // --- Global jQuery AJAX setup: send XHR header + attach CSRF automatically ---
429-    $.ajaxSetup({
430-        headers: { 'X-Requested-With': 'XMLHttpRequest' }
431-    });
432-
433-    // Refresh CSRF hash after any JSON response that includes { csrf: "..." }
434-    $(document).ajaxComplete(function (_evt, xhr) {
435-        try {
436-            const res = xhr.responseJSON;
437-            if (res && typeof res.csrf === 'string' && res.csrf.length > 0) {
438-                window.CSRF_TOKEN_HASH = res.csrf;
439-            }
440-        } catch (_) { /* ignore */ }
441-    });
442-});
--
447-  const csrfHash = window.CSRF_TOKEN_HASH || (window.CSRF_TOKEN && window.CSRF_TOKEN.hash);
448-  const postData = {};
449-
450-  if (csrfName && csrfHash) {
451-    postData[csrfName] = csrfHash;
452-  }
453-
454-  $.ajax({
455:    url: '/index.php/Exchange/Solana/fetchFrontendData',
456-    method: 'POST',
457-    type: 'POST',
458-    data: postData,
459-    dataType: 'json',
460-    headers: {
461-      'X-Requested-With': 'XMLHttpRequest',
462:      'X-CSRF-TOKEN': csrfHash || ''
463-    },
464-    xhrFields: { withCredentials: true }
465-  })
466-  .done(function (response) {
467-    if (!response || response.status !== 'success') {
468-      console.error('Failed to fetch data:', response?.message || 'Unknown error');
469-      return;
470-    }
471-
472-    const data = response.data || {};
473-
474-    // Helpers
475-    function formatCurrency(value) {
476-      const number = parseFloat(value) || 0;
477-      return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
478-    }
479-    function extractTokens(payload) {
480-      if (Array.isArray(payload)) return payload;
481-      if (payload && Array.isArray(payload.all)) return payload.all;
482-      if (payload && Array.isArray(payload.tokens)) return payload.tokens;
483-      return [];
484-    }
485-
486-    // Overview
487-    $('#solana-total').text(formatCurrency(data.mySolanaData?.totalSolana ?? 0));
488-    $('#solana-value').text(`$${formatCurrency(data.mySolanaData?.totalValue ?? 0)}`);
489-    $('#solana-pl').text(`$${formatCurrency(data.mySolanaData?.profitLoss24hr ?? 0)}`);
490-
491-    // Market
492-    $('#solana-price').html(`$${formatCurrency(data.marketData?.currentPrice ?? 0)} <span class="currency currency-usd">USD</span>`);
493-    $('#market-cap').text(`$${formatCurrency(data.marketData?.market_cap ?? 0)}`);
494-    $('#daily-volume').text(`$${formatCurrency(data.marketData?.dailyVolume ?? 0)}`);
495-
496-    const mtdPL = parseFloat(data.marketData?.mtdPL) || 0;
497-    $('#mtd-pl-change')
```

## Security Check
```

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-01 15:20:45 UTC+00:00

Solana wallet secret audit complete.
Mode: DRY-RUN
Scanned: 2
Candidates: 2
Already encrypted: 2
Plaintext found: 0
Updated: 0
Skipped: 0
Errors: 0
Report: docs/_aiops/reports/solana-security-hardening/wallet-secret-backfill-audit-20260601-152045.md
```
