<!-- app/Modules/Management/Views/TradeAnalysis/index.php -->
<?php
// Trade Analysis Data
$assetName = $tradeData['assetName'] ?? 'N/A';
$currentPrice = $tradeData['currentPrice'] ?? 'N/A';
$supportLevels = $tradeData['supportLevels'] ?? 'N/A';
$resistanceLevels = $tradeData['resistanceLevels'] ?? 'N/A';
$keyTrends = $tradeData['keyTrends'] ?? 'N/A';
$chartImage = $tradeData['chartImage'] ?? '';
$nextPriceTarget = $tradeData['nextPriceTarget'] ?? 'N/A';
$indicators = $tradeData['indicators'] ?? 'N/A';
$analysisDate = $tradeData['analysisDate'] ?? date('Y-m-d');
$ctaLink = site_url('/X/register');
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h1 class="nk-block-title title">Trade Analysis: <?= esc($assetName); ?></h1>
                    <p class="text-muted">Date: <?= esc($analysisDate); ?></p>
                    <a href="<?php echo site_url('/Trade-Tracker'); ?>" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
            <div class="nk-block">
                <!-- Key Highlights Section -->
                <div class="card card-bordered">
                    <div class="card-inner">
                        <h6 class="title">Key Highlights</h6>
                        <p><strong>Asset Name:</strong> <?= esc($assetName); ?></p>
                        <p><strong>Current Price:</strong> <?= esc($currentPrice); ?></p>
                        <p><strong>Support Levels:</strong> <?= esc($supportLevels); ?></p>
                        <p><strong>Resistance Levels:</strong> <?= esc($resistanceLevels); ?></p>
                        <p><strong>Key Trends:</strong> <?= esc($keyTrends); ?></p>
                    </div>
                </div>

                <!-- Chart Visualization Section -->
                <div class="card card-bordered mt-3">
                    <div class="card-inner">
                        <h6 class="title">Chart Visualization</h6>
                        <?php if ($chartImage): ?>
                            <img src="<?= esc($chartImage); ?>" alt="<?= esc($assetName); ?> Chart" class="img-fluid">
                        <?php else: ?>
                            <p>No chart available.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Price Levels and Trends Section -->
                <div class="card card-bordered mt-3">
                    <div class="card-inner">
                        <h6 class="title">Price Levels & Trends</h6>
                        <p><strong>Next Price Target:</strong> <?= esc($nextPriceTarget); ?></p>
                        <p><strong>Indicators:</strong> <?= esc($indicators); ?></p>
                    </div>
                </div>

                <!-- Call-to-Action Section -->
                <div class="card card-bordered mt-3">
                    <div class="card-inner">
                        <h6 class="title">Take Action</h6>
                        <p>Get started with your financial growth using MyMI Wallet’s tools for smarter investing.</p>
                        <a href="<?= $ctaLink; ?>" class="btn btn-success">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
