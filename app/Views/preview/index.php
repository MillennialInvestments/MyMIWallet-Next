<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 p-lg-5">
                    <h1 class="h3 mb-3">Free Public Market Chart Preview</h1>
                    <p class="text-muted mb-0">
                        Explore real-time style market charts for stocks, crypto, and ETFs. No login required.
                        Use this public preview tool to quickly inspect symbols before diving into advanced dashboards.
                    </p>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5">Stock Preview</h2>
                            <p class="small text-muted">Examples: AAPL, NVDA, TSLA, MSFT</p>
                            <a class="btn btn-primary btn-sm" href="<?= site_url('Preview/Stock/AAPL') ?>">Open Stock Charts</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5">Crypto Preview</h2>
                            <p class="small text-muted">Examples: bitcoin, ethereum, solana, dogecoin</p>
                            <a class="btn btn-primary btn-sm" href="<?= site_url('Preview/Crypto/bitcoin') ?>">Open Crypto Charts</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h5">ETF Preview</h2>
                            <p class="small text-muted">Examples: SPY, QQQ, IWM, DIA</p>
                            <a class="btn btn-primary btn-sm" href="<?= site_url('Preview/ETF/SPY') ?>">Open ETF Charts</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Quick Links</h2>
                    <div class="d-flex flex-wrap gap-2">
                        <?php
                        $quickLinks = [
                            ['label' => 'AAPL', 'url' => site_url('Preview/Stock/AAPL')],
                            ['label' => 'NVDA', 'url' => site_url('Preview/Stock/NVDA')],
                            ['label' => 'bitcoin', 'url' => site_url('Preview/Crypto/bitcoin')],
                            ['label' => 'ethereum', 'url' => site_url('Preview/Crypto/ethereum')],
                            ['label' => 'SPY', 'url' => site_url('Preview/ETF/SPY')],
                            ['label' => 'QQQ', 'url' => site_url('Preview/ETF/QQQ')],
                        ];
                        foreach ($quickLinks as $item):
                            ?>
                            <a href="<?= esc($item['url']) ?>" class="btn btn-outline-secondary btn-sm"><?= esc($item['label']) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-4 mb-0">
                Want watchlists, alerts, and deeper analytics? <a href="<?= site_url('register') ?>" class="alert-link">Create your free account</a>.
            </div>
        </div>
    </div>
</div>
