<?php
// Safe defaults
$nonce             = $nonce             ?? ['style' => '', 'script' => ''];
$needsMarketCharts = $needsMarketCharts ?? false;
$useSummernote     = $useSummernote     ?? false;

// Versioned assets (cache-busting)
$navbarSearchPath = FCPATH . 'assets/js/navbar-search.js';
$navbarSearchV    = is_file($navbarSearchPath) ? filemtime($navbarSearchPath) : time();

$gdInvestPath     = FCPATH . 'assets/js/charts/gd-invest.js';
$gdInvestV        = is_file($gdInvestPath) ? filemtime($gdInvestPath) : '1';
?>

<!-- Core vendors (LOCAL, load once) -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.6.0.min.js'); ?>"        <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/vendor/bootstrap5/bootstrap.bundle.min.js'); ?>" <?= $nonce['script'] ?> defer></script>

<!-- App bootstrap/init -->
<script src="<?= base_url('assets/js/app-bootstrap-init.js'); ?>"                  <?= $nonce['script'] ?> defer></script>

<!-- Common UI helpers -->
<script src="<?= base_url('assets/vendor/bootstrap-select/bootstrap-select.min.js'); ?>" <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>"              <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>"<?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-knob/jquery.knob.min.js'); ?>"        <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/vendor/flatpickr/js/flatpickr.min.js'); ?>"         <?= $nonce['script'] ?> defer></script>

<!-- Crypto: Bitcoin (LOCAL) -->
<script src="<?= base_url('assets/js/BitcoinJS-lib/bitcoin.js'); ?>"           <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/js/crypto/bitcoin-adapter.js'); ?>"          <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/js/crypto/btc-send-flow.js'); ?>"            <?= $nonce['script'] ?> defer></script>

<!-- Theme bundle -->
<script src="<?= base_url('assets/js/bundle.js?ver=3.0.3'); ?>"               <?= $nonce['script'] ?> defer></script>
<script src="<?= base_url('assets/js/scripts.js'); ?>"                         <?= $nonce['script'] ?> defer></script>

<!-- Versioned utilities -->
<script src="<?= base_url('assets/js/navbar-search.js') . '?v=' . $navbarSearchV; ?>" <?= $nonce['script'] ?> defer></script>

<?php if ($needsMarketCharts): ?>
  <script src="<?= base_url('assets/vendor/chartjs/chart.min.js'); ?>"             <?= $nonce['script'] ?> defer></script>
  <script src="<?= base_url('assets/js/charts/gd-invest.js') . '?v=' . $gdInvestV; ?>" <?= $nonce['script'] ?> defer></script>
<?php endif; ?>

<?php if ($useSummernote): ?>
  <script src="<?= base_url('assets/vendor/summernote/js/summernote.min.js'); ?>" <?= $nonce['script'] ?> defer></script>
<?php endif; ?>

<!-- CSRF header sync after AJAX responses -->
<script <?= $nonce['script'] ?>>
(function startWhenReady() {
  if (typeof window.jQuery === 'undefined') {
    return setTimeout(startWhenReady, 50);
  }
  (function ($) {
    $(document).ajaxComplete(function (_event, xhr) {
      var n = xhr.getResponseHeader('X-CSRF-Token-Name');
      var h = xhr.getResponseHeader('X-CSRF-Token-Hash');
      if (!n || !h) return;

      window.CSRF_TOKEN = window.CSRF_TOKEN || {};
      window.CSRF_TOKEN.name = n;
      window.CSRF_TOKEN.hash = h;

      var meta = document.querySelector('meta[name="' + n + '"]');
      if (meta) meta.setAttribute('content', h);
    });
  })(window.jQuery);
})();
</script>
