<!-- app/Views/themes/public/layouts/css-links.php -->
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-select/bootstrap-select.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite3.css?ver=3.0.2'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/all.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/responsive-overrides.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/jquery.dataTables.min.css'); ?>">
<?php // No inline <style nonce="<?= esc($csp['style']) >"> here. Move any previous inline CSS into responsive-overrides.css ?>
<link rel="stylesheet" href="<?= base_url('assets/css/inline-fixes.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/mymiwallet.mobile.css') . '?v=' . (is_file(FCPATH.'assets/css/mymiwallet.mobile.css') ? filemtime(FCPATH.'assets/css/mymiwallet.mobile.css') : '1'); ?>">
<!-- <link rel="stylesheet" href="<?= base_url('assets/css/website.css'); ?>"> -->

<?php $cspNonce = $cspNonce ?? $csp['script'] ?? ''; ?>
<script nonce="<?= esc($cspNonce) ?>">window.__CSP_NONCE__='<?= esc($cspNonce) ?>'</script>
