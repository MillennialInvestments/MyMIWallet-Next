<?php
use App\Services\MetaService;

$thisURL      = current_url();
$defaultImage = base_url('/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png');

$metaService = new MetaService();

// Controller override if provided
$pageNameFromController = isset($pageName) ? (string)$pageName : null;

// Get final SEO (controller wins)
$seoData = $metaService->getSeoData(null, $pageNameFromController);

$page_title       = $seoData['page_title']       ?? 'MyMI Wallet';
$page_description = $seoData['page_description'] ?? 'Experience the future of finance with MyMI Wallet. Budget, invest, grow.';
$page_url         = $seoData['page_url']         ?? $thisURL;
$page_image       = $seoData['page_image']       ?? $defaultImage;
$page_type        = $seoData['page_type']        ?? 'Manual';
?>
<title><?= esc($page_title) ?></title>
<meta name="description" content="<?= esc($page_description) ?>">
<meta property="og:type" content="<?= esc($page_type === 'Automated' ? 'product' : 'website') ?>">
<meta property="og:url" content="<?= esc($page_url) ?>">
<link rel="canonical" href="<?= esc($page_url) ?>">
<meta property="og:title" content="<?= esc($page_title) ?>">
<meta property="og:description" content="<?= esc($page_description) ?>">
<meta property="og:image" content="<?= esc($page_image) ?>">
<meta name="twitter:title" content="<?= esc($page_title) ?>">
<meta name="twitter:description" content="<?= esc($page_description) ?>">
<meta name="twitter:image" content="<?= esc($page_image) ?>">
<script type="application/ld+json" <?= $nonce['script'] ?? '' ?>>
<?= $metaService->getStructuredData([
    'page_title' => $page_title,
    'page_description' => $page_description,
    'page_url' => $page_url,
    'page_image' => $page_image
]) ?>
</script>