<!-- app/Views/themes/public/layouts/js-links.php -->
<?php
// $nonce and $csp are injected by BaseController; fall back safely if missing.
$nonce = $nonce ?? ['style' => '', 'script' => ''];
$csp   = $csp   ?? ['style' => '', 'script' => ''];

$scriptNonceAttr  = $nonce['script'] ?? '';
$scriptNonceValue = $csp['script'] ?? '';
if (! $scriptNonceValue && is_string($scriptNonceAttr) && $scriptNonceAttr !== '') {
    $scriptNonceValue = trim(str_replace(['nonce="', '"'], '', $scriptNonceAttr));
}
?>

<!-- Ensure the page-wide runtime nonce is available (no-op if already set in <head>) -->
<script <?= $scriptNonceAttr ?>>
  window.__CSP_NONCE__ = window.__CSP_NONCE__ || <?= json_encode($scriptNonceValue) ?>;
</script>

<!-- Core deps (global) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" <?= $scriptNonceAttr ?> crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" <?= $scriptNonceAttr ?> defer></script>

<!-- Plugins you were already using globally -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js" <?= $scriptNonceAttr ?> defer></script>

<!-- DataTables 1.11.5 (current production set) -->
<script src="https://cdn.jsdelivr.net/npm/datatables.net@1.11.5/js/jquery.dataTables.min.js" <?= $scriptNonceAttr ?> defer></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.11.5/js/dataTables.bootstrap5.min.js" <?= $scriptNonceAttr ?> defer></script>

<!-- Chart.js (v2.1.2 per your asset list) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.1.2/dist/Chart.min.js" <?= $scriptNonceAttr ?> defer></script>

<!-- Vite application bundle -->
<?= vite_tags('app', $scriptNonceValue); ?>

<!-- AOS (already present in your file) -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" <?= $scriptNonceAttr ?> defer></script>
<?php
$navbarSearch = FCPATH . 'assets/js/navbar-search.js';
$navbarSearchV = is_file($navbarSearch) ? filemtime($navbarSearch) : time();
?>
<script defer src="<?= base_url('assets/js/navbar-search.js') . '?v=' . $navbarSearchV; ?>" <?= $scriptNonceAttr ?>></script>

<!-- TradingView library -->
<script <?= $scriptNonceAttr ?> src="https://s3.tradingview.com/tv.js" defer></script>

<!-- Optional libs (commented out until needed on a given page) -->

<?php /* Validate forms (enable where forms require it)
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* jQuery Knob (enable where dashboard dials are used)
<script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.13/dist/jquery.knob.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* Select2 (enhanced selects; enable on pages using it)
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* flatpickr (date pickers; enable where used)
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* Summernote (WYSIWYG editor; enable where used)
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* Alternative: DataTables 1.13.6 (use instead of 1.11.5, not both)
<script src="https://cdn.jsdelivr.net/npm/datatables.net@1.13.6/js/jquery.dataTables.min.js" <?= $scriptNonceAttr ?> defer></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.6/js/dataTables.bootstrap5.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<?php /* Legacy Popper 1.12.3 (DO NOT use with Bootstrap 5; BS5 bundle already includes Popper v2)
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.3/dist/umd/popper.min.js" <?= $scriptNonceAttr ?> defer></script>
*/ ?>

<!-- Existing inline initializers (kept) -->
<script <?= $scriptNonceAttr ?>>
AOS.init({ duration: 800, easing: 'slide', once: true });
</script>

<script <?= $scriptNonceAttr ?>>
(function($) {
    var $win = $(window),
        $body = $('body'),
        $introNav = $('.intro-navbar'),
        _navbar_fixed = 'navbar-fixed',
        $link = $('.link-to');

    $link.on('click', function() {
        var href = $(this).attr('href'),
            $toHash = $(href);
        if ($toHash.length) {
            $('html, body').scrollTop($toHash.offset().top - $introNav.innerHeight());
            return false;
        }
    });

    $win.on('scroll', function() {
        if ($win.scrollTop() > 0) {
            if (!$introNav.hasClass(_navbar_fixed)) {
                $introNav.addClass(_navbar_fixed);
            }
        } else {
            if ($introNav.hasClass(_navbar_fixed)) {
                $introNav.removeClass(_navbar_fixed);
            }
        }
    });
})(jQuery);
</script>
