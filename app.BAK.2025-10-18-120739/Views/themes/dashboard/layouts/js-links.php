<?php
$nonce = $nonce ?? ['style' => '', 'script' => ''];
$csp   = $csp   ?? ['style' => '', 'script' => ''];
$needsMarketCharts = $needsMarketCharts ?? false;
$useSummernote = $useSummernote ?? false;

$scriptNonceAttr  = $nonce['script'] ?? '';
$scriptNonceValue = $csp['script'] ?? '';
if (! $scriptNonceValue && is_string($scriptNonceAttr) && $scriptNonceAttr !== '') {
    $scriptNonceValue = trim(str_replace(['nonce="', '"'], '', $scriptNonceAttr));
}
?>

<script src="<?= base_url('assets/vendor/jquery/jquery-3.6.0.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/bootstrap5/bootstrap.bundle.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/js/app-bootstrap-init.js'); ?>" <?= $scriptNonceAttr ?> defer></script>

<script src="<?= base_url('assets/vendor/bootstrap-select/bootstrap-select.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/jquery-knob/jquery.knob.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<script src="<?= base_url('assets/vendor/flatpickr/js/flatpickr.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>

<?= vite_tags('app', $scriptNonceValue ?: null); ?>
<script src="<?= base_url('assets/js/scripts.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<?php
$navbarSearch = FCPATH . 'assets/js/navbar-search.js';
$navbarSearchV = is_file($navbarSearch) ? filemtime($navbarSearch) : time();
?>
<script src="<?= base_url('assets/js/navbar-search.js') . '?v=' . $navbarSearchV; ?>" <?= $scriptNonceAttr ?> defer></script>

<?php if ($needsMarketCharts): ?>
<script src="<?= base_url('assets/js/vendor/chart.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<?php endif; ?>
<?php
$gdInvest = FCPATH . 'assets/js/charts/gd-invest.js';
$gdInvestV = is_file($gdInvest) ? filemtime($gdInvest) : '1';
?>
<script src="<?= base_url('assets/js/charts/gd-invest.js') . '?v=' . $gdInvestV; ?>" <?= $scriptNonceAttr ?> defer></script>

<?php if ($useSummernote): ?>
<script src="<?= base_url('assets/vendor/summernote/js/summernote.min.js'); ?>" <?= $scriptNonceAttr ?> defer></script>
<?php endif; ?>

<script <?= $scriptNonceAttr ?>>
(function startWhenReady(){
  if (typeof window.jQuery === 'undefined') {
    return setTimeout(startWhenReady, 50);
  }

  (function ($) {
    $(document).ajaxComplete(function (_event, xhr) {
      var newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
      var newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');
      if (!newCsrfName || !newCsrfHash) {
        return;
      }

      window.CSRF_TOKEN = window.CSRF_TOKEN || {};
      window.CSRF_TOKEN.name = newCsrfName;
      window.CSRF_TOKEN.hash = newCsrfHash;

      var csrfMeta = document.querySelector('meta[name="' + newCsrfName + '"]');
      if (csrfMeta) {
        csrfMeta.setAttribute('content', newCsrfHash);
      }
    });
  })(window.jQuery);
})();
</script>