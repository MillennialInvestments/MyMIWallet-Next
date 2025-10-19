<!-- app/Views/themes/public/layouts/css-links.php -->
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-select/bootstrap-select.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite3.css?ver=3.0.2'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/all.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/responsive-overrides.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/jquery.dataTables.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<?php // No inline <style nonce="<?= esc($csp['style']) >"> here. Move any previous inline CSS into responsive-overrides.css ?>
<link rel="stylesheet" href="<?= base_url('assets/css/inline-fixes.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<script <?= $nonce['script'] ?? '' ?>>window.__CSP_NONCE__='<?= esc($csp['script'] ?? '') ?>'</script>