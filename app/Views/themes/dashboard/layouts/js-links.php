<?php

$nonce = $nonce ?? ['style' => '', 'script' => ''];
$csp   = $csp   ?? ['style' => '', 'script' => ''];
$needsMarketCharts = $needsMarketCharts ?? true;
$useSummernote     = $useSummernote ?? false;

// Extract a plain nonce value if you only have the attr.
$scriptNonceAttr  = $nonce['script'] ?? '';
$scriptNonceValue = $csp['script'] ?? '';
if (!$scriptNonceValue && is_string($scriptNonceAttr) && $scriptNonceAttr !== '') {
    $scriptNonceValue = trim(str_replace(['nonce="', '"'], '', $scriptNonceAttr));
}

// helper: return URL if file exists in /public, else null
function asset_if_exists(string $publicPath): ?string {
    $file = FCPATH . ltrim($publicPath, '/');
    return is_file($file) ? base_url($publicPath) : null;
}

// 1) jQuery FIRST (NO defer)
?>
<script src="<?= base_url('assets/vendor/jquery/jquery-3.6.0.min.js'); ?>" <?= $scriptNonceAttr ?>></script>

<?php // 2) Bootstrap bundle & core helpers (can stay deferred) ?>
<script src="<?= base_url('assets/vendor/bootstrap5/bootstrap.bundle.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>

<?php // 3) Theme base (defines NioApp) BEFORE any code that requires it ?>
<script src="<?= base_url('assets/js/scripts.js'); ?>" <?= $scriptNonceAttr ?> defer></script>

<?php // 4) Form/UI vendors that depend on jQuery (safe deferred after jQuery is non-deferred) ?>
<script src="<?= base_url('assets/vendor/bootstrap-select/bootstrap-select.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-knob/jquery.knob.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/flatpickr/js/flatpickr.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>

<?php // 5) Vite entry (if you actually use Vite; otherwise remove this line) ?>
<?php if (function_exists('vite_tags')): ?>
  <?= vite_tags('app', $scriptNonceValue ?: null); ?>
<?php endif; ?>

<?php // 6) Navbar search (local file cache-busted) ?>
<?php
$navbarSearch = FCPATH . 'assets/js/navbar-search.js';
$navbarSearchV = is_file($navbarSearch) ? filemtime($navbarSearch) : time();
?>
<script src="<?= base_url('assets/js/navbar-search.js') . '?v=' . $navbarSearchV; ?>" <?= $scriptNonceAttr ?> defer></script>

<?php // 7) Chart.js only if requested; prefer local, fallback to CDN ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js" <?= $scriptNonceAttr ?> defer></script>


<?php // 8) Your chart initializers (cache-busted) ?>
<?php
$gdInvest = FCPATH . 'assets/js/charts/gd-invest.js';
$gdInvestV = is_file($gdInvest) ? filemtime($gdInvest) : '1';
?>
<script src="<?= base_url('assets/js/charts/gd-invest.js') . '?v=' . $gdInvestV; ?>" <?= $scriptNonceAttr ?> defer></script>

<?php // 9) Summernote (optional) ?>
<?php if ($useSummernote): ?>
  <script src="<?= base_url('assets/vendor/summernote/js/summernote.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<?php endif; ?>

<?php // 10) Crypto adapters: ONLY include if the file exists to avoid 404 ?>
<?php if ($u = asset_if_exists('assets/js/crypto/digibyte-adapter.js')): ?>
  <script src="<?= $u ?>" <?= $scriptNonceAttr ?> defer></script>
<?php endif; ?>
<?php if ($u = asset_if_exists('assets/js/crypto/dgb-send-flow.js')): ?>
  <script src="<?= $u ?>" <?= $scriptNonceAttr ?> defer></script>
<?php endif; ?>

<?php // 11) Global AJAX CSRF header updater (after jQuery present) ?>
<script <?= $nonce['script'] ?? '' ?>>
(function startWhenReady(){
  if (typeof window.jQuery === 'undefined') {
    return setTimeout(startWhenReady, 50);
  }
  (function ($) {
    $(document).ajaxComplete(function (_event, xhr) {
      var newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
      var newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');
      if (!newCsrfName || !newCsrfHash) return;

      window.CSRF_TOKEN = window.CSRF_TOKEN || {};
      window.CSRF_TOKEN.name = newCsrfName;
      window.CSRF_TOKEN.hash = newCsrfHash;

      var meta = document.querySelector('meta[name="' + newCsrfName + '"]');
      if (meta) meta.setAttribute('content', newCsrfHash);
    });
  })(window.jQuery);
})();
</script>
<!-- AOS (Animate On Scroll) -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" <?= $nonce['style'] ?? '' ?>>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js" <?= $nonce['script'] ?? '' ?> defer></script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
  if (window.AOS && typeof AOS.init === 'function') {
    AOS.init({ once: true, duration: 600 });
  } else {
    console.warn('AOS not available; skipping init.');
  }
});
</script>

