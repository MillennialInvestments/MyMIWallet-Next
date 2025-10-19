<?php
// app/Views/Auth/layout.php
use Config\Services;

$request = Services::request();
$subViewData = [
    'siteSettings'      => $siteSettings ?? new App\Config\SiteSettings,
    'pageTitle'         => $pageTitle ?? 'MyMI Wallet | Login',
    'uri'               => $uri ?? $request->getUri(),
    // Tell header to suppress trackers & inline styles for CSP
    'suppressTrackers'  => true,
    'nonce'             => $nonce ?? [],
    'csp'               => $csp ?? [],
    'theme'             => $theme ?? 'public',
    'authPage'          => true, // For conditional body class
    'currentUser'       => $currentUser ?? null,
    'validation'        => $validation ?? null,
    'session'           => session(),
    'config'            => $config ?? config('Auth'),
    'request'           => $request,
    'pager'             => $pager ?? null,
    'alerts'            => $alerts ?? [],
    'breadcrumbs'       => $breadcrumbs ?? [],
    'footerLinks'       => $footerLinks ?? [],
    'socialLinks'       => $socialLinks ?? [],
    'navTheme'          => $navTheme ?? 'light', // For navbar color scheme
    'footerTheme'       => $footerTheme ?? 'light', // For footer color scheme
    'bodyClass'         => $bodyClass ?? '',
    'bodyData'          => $bodyData ?? [
        'id' => 'login-page',
        'class' => 'login-page',
    ]
    
];
?>
<!doctype html>
<html lang="en">
<?= view('App/Views/themes\public\layouts\header_min', $subViewData) ?>

<body class="login">

<?= view('App/Views/themes\public\layouts\_sitenav', $subViewData) ?>

<main role="main" class="container" id="main-container">
    <?= $this->renderSection('main') ?>
</main>

<!-- Local, self-hosted JS only. No inline scripts. -->
<script src="<?= base_url('assets/vendor/bootstrap5/bootstrap.bundle.min.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>
<?php /* If you actually use AOS on this page, keep these two lines:
<link rel="stylesheet" href="<?= base_url('assets/vendor/aos/aos.css'); ?>">
<script src="<?= base_url('assets/vendor/aos/aos.js'); ?>" defer></script>
*/ ?>

<!-- Optional page init without inline: put any previous inline jQuery/DOM code here -->
<script src="<?= base_url('assets/js/login-init.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>

<?= view('App/Views/themes\public\layouts\footer', $subViewData) ?>
<?= $this->renderSection('pageScripts') ?>
</body>
</html>
