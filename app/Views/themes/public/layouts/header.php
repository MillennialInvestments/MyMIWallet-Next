<?php 
// app/Views/themes/public/layouts/header.php
// Safe defaults for view-only usage
$uri         = $uri         ?? service('uri');
$request     = $request     ?? service('request');
$meta        = $meta        ?? [];
$siteSettings= $siteSettings?? [];
$pageTitle   = $pageTitle   ?? ($meta['title'] ?? 'MyMI Wallet');
$viewFileData               = [
    'siteSettings'          => $siteSettings,
    'uri'                   => $uri,
    'request'               => $request,
    'meta'                  => $meta,
    'pageTitle'             => $pageTitle,
    'nonce'                 => $nonce ?? [],
    'csp'                   => $csp ?? [],
]; 
?>
<!doctype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" data-env="<?= esc(strtolower(ENVIRONMENT), 'attr') ?>">
<head>  
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <?= view('themes/public/layouts/metadata-information', $viewFileData); ?>
    <?= view('themes/public/layouts/header-information', $viewFileData); ?>
    <?= view('themes/public/layouts/css-links'); ?>
    <?php // echo service('assets')->css(); ?>
    <?php //if ($uri->getSegment(2) === 'register'): ?>
        <!-- <script src="https://www.google.com/recaptcha/api.js?render=<?php // echo config('App')->recaptchaSiteKey; ?>"></script> -->
    <?php //endif; ?>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <style <?= $nonce['style'] ?? '' ?>>
        .grecaptcha-badge{visibility: hidden}
    </style>
    <script <?= $nonce['script'] ?? '' ?>>
        // grecaptcha.ready(function() {
        //     grecaptcha.execute('<?php //echo RECAPTCHA_SITE_KEY; ?>', {action: 'form_submission'}).then(function(token) {
        //         document.querySelector('.g-recaptcha-response').value = token;
        //     });
        // });
    </script>
    <?php if (config('Security')->csrfProtection): ?>
        <meta name="csrf-header" content="<?= esc(config('Security')->headerName ?? 'X-CSRF-TOKEN', 'attr') ?>">
        <meta name="csrf-token"  content="<?= esc(csrf_hash(), 'attr') ?>">
    <?php endif; ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2FS4BNS0SL" <?= $nonce['script'] ?? '' ?>></script>
    <script <?= $nonce['script'] ?? '' ?>>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2FS4BNS0SL');
    </script>

    <!-- Meta Pixel Code -->
    <script <?= $nonce['style'] ?? '' ?>>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1066980131308331');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" class=" d-none"
    src="https://www.facebook.com/tr?id=1066980131308331&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <?php if (ENVIRONMENT !== 'production'): ?>
        <script src="<?= base_url('assets/js/dev-html-guard.js') ?>" defer></script>
    <?php endif; ?>
</head>
