<?php //app/Views/themes/dashboard/layouts/header-information.php ?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="author" content="MyMI Wallet, LLC."> 
<link rel="shortcut icon" href="https://www.mymiwallet.com/favicon.ico" type="image/x-icon">
<meta name="copyright" content="MyMI Wallet ,LLC. @<?= date('Y'); ?>">
<meta name="image" property="og:image" content="<?= config('SiteSettings')->companyLogo; ?>">
<meta property="og:image:width" content="1200" >
<meta property="og:image:height" content="630" >
<meta property="og:site_name" content="<?= config('SiteSettings')->companyMetaTitle ?>">
<meta property="og:type" content="website" >
<meta name="theme-color" content="#ffffff">
<meta name="twitter:card" content="summary" >
<meta name="twitter:site" content="<?= config('SocialMedia')->twitter; ?>" >
<meta name="twitter:creator" content="<?= config('SocialMedia')->twitter; ?>" >
<meta name="apple-mobile-app-capable" content="yes">
<meta name="apple-mobile-app-status-bar-style" content="default">
<meta name="format-detection" content="telephone=no">
<meta name="msapplication-tap-highlight" content="no">
<meta name="referrer" content="strict-origin-when-cross-origin">
<?php if ($siteSettings->csrfEnabled === 1) : ?>
<meta name="csrf_token_name" content="<?= csrf_token() ?>">
<meta name="csrf_token_value" content="<?= csrf_hash() ?>">

<script <?= $nonce['script'] ?? '' ?>>
    console.log("CSRF Token " + "<?= csrf_token() ?>" + " | $CSRF Hash " + "<?= csrf_hash() ?>");
    // Make CSRF token and name available globally for JavaScript
    window.CSRF_TOKEN = {
        name: '<?= csrf_token() ?>',
        hash: '<?= csrf_hash() ?>'
    };
</script>
<?php endif; ?>
