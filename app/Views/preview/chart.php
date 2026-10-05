<?php
$assetTypeLabel = strtoupper((string) $assetType);
$symbolLabel = $assetType === 'crypto' ? ucfirst((string) $symbol) : (string) $symbol;
$previewBasePath = $assetType === 'crypto' ? 'Preview/Crypto' : ($assetType === 'etf' ? 'Preview/ETF' : 'Preview/Stock');
$quickMap = [
    'stock' => ['AAPL', 'NVDA', 'TSLA', 'MSFT'],
    'crypto' => ['bitcoin', 'ethereum', 'solana', 'dogecoin'],
    'etf' => ['SPY', 'QQQ', 'IWM', 'DIA'],
];
?>

<div class="container py-5" id="previewChartApp"
     data-api-url="<?= esc($apiUrl, 'attr') ?>"
     data-asset-type="<?= esc($assetType, 'attr') ?>"
     data-symbol="<?= esc($symbol, 'attr') ?>">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
                <h1 class="h3 mb-0"><?= esc($symbolLabel) ?> Chart Preview</h1>
                <span class="badge bg-primary"><?= esc($assetTypeLabel) ?></span>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <form id="preview-search-form" class="row g-2 align-items-center">
                        <div class="col-md-5">
                            <label for="symbol-input" class="form-label mb-1">Search Symbol</label>
                            <input id="symbol-input" type="text" class="form-control" value="<?= esc($symbol) ?>" required>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-primary mt-md-4" type="submit">Load Chart</button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <span class="small text-muted me-2">Timeframe:</span>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Timeframe selector">
                            <button type="button" class="btn btn-outline-secondary active" data-timeframe="1D">1D</button>
                            <button type="button" class="btn btn-outline-secondary" data-timeframe="1W">1W</button>
                            <button type="button" class="btn btn-outline-secondary" data-timeframe="1M">1M</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <div id="preview-chart" style="height: 500px;"></div>
                    <div id="chart-status" class="small text-muted mt-2">Loading chart data...</div>
                    <div id="chart-error" class="alert alert-warning d-none mt-3"></div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h2 class="h6">Related quick links</h2>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach ($quickMap[$assetType] ?? [] as $quickSymbol): ?>
                            <a href="<?= site_url($previewBasePath . '/' . $quickSymbol) ?>" class="btn btn-outline-secondary btn-sm"><?= esc($quickSymbol) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h2 class="h6">Unlock More with MyMI Wallet</h2>
                    <p class="text-muted mb-3">Create a free account for watchlists, alerts, and advanced dashboards.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-primary btn-sm" href="<?= site_url('register') ?>">Create Free Account</a>
                        <a class="btn btn-outline-primary btn-sm" href="<?= site_url('/') ?>">Explore MyMI Wallet</a>
                        <a class="btn btn-outline-secondary btn-sm" href="<?= site_url('How-It-Works') ?>">View More Tools</a>
                    </div>
                </div>
            </div>

            <div class="alert alert-secondary mb-0 small">
                Chart data is provided for informational purposes only and should not be considered financial advice.
                Market data may be delayed, limited, or temporarily unavailable depending on source API availability.
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/lightweight-charts/lightweight-charts.js') ?>"></script>
<script src="<?= base_url('assets/js/preview-chart.js') ?>"></script>
