<?php
// CSS (Bootstrap 5 has no glyphicons; ensure your CSS doesn’t reference them)
$styleNonce = $nonce['style'] ?? '';
?>
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/jquery.dataTables.min.css'); ?>" <?= $styleNonce ?>>

<link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css') . '?v=' . (is_file(FCPATH.'assets/css/dashlite.css') ? filemtime(FCPATH.'assets/css/dashlite.css') : '1'); ?>" <?= $styleNonce ?>>
<link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css') . '?v=' . (is_file(FCPATH.'assets/css/theme.css') ? filemtime(FCPATH.'assets/css/theme.css') : '1'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite-new.css'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/website.css'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/libs/bootstrap-icons.css') . '?v=' . (is_file(FCPATH.'assets/css/libs/bootstrap-icons.css') ? filemtime(FCPATH.'assets/css/libs/bootstrap-icons.css') : '1'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/responsive-overrides.css'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/inline-fixes.css'); ?>" <?= $styleNonce ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/mymiwallet-custom.css'); ?>" <?= $styleNonce ?>>

<link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">

<!-- Expose nonce to client if you need it -->
<script <?= $nonce['script'] ?? '' ?>>window.__CSP_NONCE__='<?= esc($csp['script'] ?? '') ?>'</script>
