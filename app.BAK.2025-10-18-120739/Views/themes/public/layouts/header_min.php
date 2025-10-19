<?php
// app/Views/themes/public/layouts/header_min.php
$uri          = $uri          ?? service('uri');
$request      = $request      ?? service('request');
$meta         = $meta         ?? [];
$siteSettings = $siteSettings ?? [];
$pageTitle    = $pageTitle    ?? ($meta['title'] ?? 'MyMI Wallet');

// CSP nonces from BaseController
$csp   = $csp   ?? ['style' => '', 'script' => ''];
$nonce = $nonce ?? ['style' => '', 'script' => ''];
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($pageTitle) ?></title>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">

    <!-- Local, self-hosted CSS only -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap5/bootstrap.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/all.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css'); ?>" <?= $nonce['style'] ?? '' ?>>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite3.css?ver=3.0.2'); ?>" <?= $nonce['style'] ?? '' ?>>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.min.css'); ?>" <?= $nonce['style'] ?? '' ?>>
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive-overrides.css'); ?>" <?= $nonce['style'] ?? '' ?>>

    <?php // No inline <style nonce="<?= esc($csp['style']) >"> here. Move any previous inline CSS into responsive-overrides.css ?>
    <?php // echo service('assets')->css(); ?>
    <script <?= $nonce['script'] ?? '' ?>>
    window.__CSP_NONCE__ = <?= json_encode($csp['script'] ?? '') ?>;

    (function () {
        var originalAppendChild = Document.prototype.appendChild;
        Document.prototype.appendChild = function (node) {
        try {
            if (node && node.tagName === 'SCRIPT' && window.__CSP_NONCE__ && !node.nonce) {
            node.setAttribute('nonce', window.__CSP_NONCE__);
            }
        } catch (e) {}
        return originalAppendChild.call(this, node);
        };
        var headAppendChild = HTMLHeadElement.prototype.appendChild;
        HTMLHeadElement.prototype.appendChild = function (node) {
        try {
            if (node && node.tagName === 'SCRIPT' && window.__CSP_NONCE__ && !node.nonce) {
            node.setAttribute('nonce', window.__CSP_NONCE__);
            }
        } catch (e) {}
        return headAppendChild.call(this, node);
        };
    })();
    </script>

</head>
