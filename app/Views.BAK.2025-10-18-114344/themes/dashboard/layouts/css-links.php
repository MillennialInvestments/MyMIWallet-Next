<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/1.11.5/css/jquery.dataTables.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css') . '?v=' . (is_file(FCPATH.'assets/css/dashlite.css') ? filemtime(FCPATH.'assets/css/dashlite.css') : '1'); ?>" <?= $nonce['style'] ?? '' ?>>
<link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css') . '?v=' . (is_file(FCPATH.'assets/css/theme.css') ? filemtime(FCPATH.'assets/css/theme.css') : '1'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/dashlite-new.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/website.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/libs/bootstrap-icons.css') . '?v=' . (is_file(FCPATH.'assets/css/libs/bootstrap-icons.css') ? filemtime(FCPATH.'assets/css/libs/bootstrap-icons.css') : '1'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="stylesheet" href="<?= base_url('assets/css/responsive-overrides.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<link rel="shortcut icon" href="<?= base_url('dev/public/favicon.ico') ?>" type="image/x-icon">
<link rel="stylesheet" href="<?= base_url('assets/css/inline-fixes.css'); ?>" <?= $nonce['style'] ?? '' ?>>
<script <?= $nonce['script'] ?? '' ?>>window.__CSP_NONCE__='<?= esc($csp['script'] ?? '') ?>'</script>