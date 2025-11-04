<!DOCTYPE html>

<html lang="en" data-env="<?= esc(strtolower(ENVIRONMENT), 'attr') ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= esc($pageTitle ?? 'Dashboard'); ?></title>
    <?php echo view('themes/dashboard/layouts/metadata-information', ['pageTitle' => $pageTitle ?? null, 'pageName' => $pageName ?? null, 'siteSettings' => $siteSettings ?? null]); ?>
    <?php echo view('themes/dashboard/layouts/header-information', [
        'siteSettings' => $siteSettings ?? null,
        'nonce'        => $nonce ?? [],
    ]); ?>
    <meta name="robots" content="noindex">
    <meta http-equiv="cache-control" content="no-cache">
    <?php if (config('Security')->csrfProtection): ?>
        <meta name="csrf-header" content="<?= esc(config('Security')->headerName ?? 'X-CSRF-TOKEN', 'attr') ?>">
        <meta name="csrf-token"  content="<?= esc(csrf_hash(), 'attr') ?>">
    <?php endif; ?>
    <link rel="manifest" href="/manifest.webmanifest">
    <meta name="theme-color" content="#0ea5e9">
    <script <?= $nonce['script'] ?? '' ?>>
    window.CSRF = {
      header: 'X-CSRF-TOKEN',
      token: '<?= esc(csrf_hash(), 'js') ?>'
    };
    </script>
    <?php echo view('themes/dashboard/layouts/css-links', [
        'siteSettings' => $siteSettings ?? null,
        'nonce'        => $nonce ?? [],
        'csp'          => $csp ?? [],
    ]); ?>
    <script <?= $nonce['script'] ?? '' ?>>
      window.__CSP_NONCE__ = <?= json_encode($csp['script'] ?? '') ?>;
    </script>
    <script <?= $nonce['script'] ?? '' ?>>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => navigator.serviceWorker.register('/sw.js'));
    }
    </script>
    <?php if (ENVIRONMENT !== 'production'): ?>
        <script src="<?= base_url('assets/js/dev-html-guard.js') ?>" defer></script>
    <?php endif; ?>
</head>
