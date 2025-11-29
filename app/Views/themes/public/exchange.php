<?php
/**
 * Public Solana Exchange landing page
 * Path: app/Views/themes/public/exchange.php
 *
 * This is a trimmed-down public version of the authenticated Solana dashboard.
 * It does NOT assume a logged-in user and uses safe defaults.
 */

/** @var object|null $siteSettings */
/** @var array $solanaTokens */
/** @var array $cuSolanaDW */
/** @var array $nonce */

$siteSettings           = $siteSettings ?? (object) [];
$beta                   = (int) ($siteSettings->beta ?? 0);
$debug                  = (int) ($siteSettings->debug ?? 0);
$createSolanaStatus     = (int) ($siteSettings->createSolanaStatus ?? 0);
$solanaNetwork          = (int) ($siteSettings->solanaNetwork ?? 0);
$solanaNotifications    = (int) ($siteSettings->solanaNotifications ?? 0);
$solanaUserAssets       = (int) ($siteSettings->solanaUserAssets ?? 0);
$swapSolanaStatus       = (int) ($siteSettings->swapSolanaStatus ?? 0);
$tradeSolanaStatus      = (int) ($siteSettings->tradeSolanaStatus ?? 0);

$solanaTokens           = $solanaTokens ?? [];
$cuSolanaDW             = (isset($cuSolanaDW) && is_array($cuSolanaDW)) ? $cuSolanaDW : [];

$subViewData = [
    'solanaTokens' => $solanaTokens,
];
?>

<div class="nk-block-head nk-block-head-sm pt-xl-5">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Solana Exchange</h3>
            <div class="nk-block-des text-soft">
                <p>Explore the Solana blockchain with MyMI Wallet. Connect a wallet or sign up to start trading.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="nk-block-tools-toggle toggle-wrap">
                <a href="#" class="btn btn-icon btn-trigger me-n1 toggle-expand" data-bs-target="pageMenu">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <?php if (empty($cuSolanaDW)) : ?>
                            <!-- Public CTA for guests -->
                            <li>
                                <a href="<?= site_url('Register'); ?>" class="btn btn-success">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Create Free Account</span>
                                </a>
                            </li>
                        <?php else : ?>
                            <!-- In case a logged-in user hits the public page -->
                            <li>
                                <?php if (is_array($cuSolanaDW) && ! empty($cuSolanaDW['address'])) : ?>
                                    <a href="#"
                                       onclick='copyAddressToClipboard("<?= esc($cuSolanaDW['address'] ?? '') ?>")'>
                                        <em class="icon ni ni-copy"></em>
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a href="<?= site_url('Exchange/Solana/Dashboard'); ?>"
                                   class="btn btn-primary text-white">
                                    <em class="icon ni ni-eye"></em>
                                    <span>Open Solana Dashboard</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">

        <!-- My Solana (public-safe, filled by JS if available) -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">My Solana (Demo)</h6>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount" id="solana-total">0.00</span>
                        <span class="currency currency-usd">SOL</span>
                    </div>
                    <div class="invest-data">
                        <div class="g-2 invest-data-amount">
                            <div class="invest-data-history">
                                <div class="title">Total Value</div>
                                <div class="amount" id="solana-value">$0.00</div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">24-Hr P/L</div>
                                <div class="amount" id="solana-pl">$0.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-soft small">
                        <em>Sign in to see your real Solana balances.</em>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current SOL Value -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Current SOL Value</h6>
                        </div>
                        <div class="card-tools">
                            <em class="icon ni card-hint ni-help-fill"
                                data-bs-toggle="tooltip"
                                data-bs-placement="left"
                                title="Live Solana market price and performance."></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount" id="solana-price">
                            $0.00 <span class="currency currency-usd">USD</span>
                        </span>
                        <span class="change down text-danger" id="mtd-pl-change">
                            <em class="icon ni ni-arrow-long-down"></em>0.00 MTD
                        </span>
                    </div>
                    <div class="invest-data">
                        <div class="g-2 invest-data-amount">
                            <div class="invest-data-history">
                                <div class="title">Daily P/L</div>
                                <div class="amount" id="daily-pl">0.00 <span class="currency currency-usd">%</span></div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">1-Hr P/L</div>
                                <div class="amount" id="hourly-pl">0.00 <span class="currency currency-usd">%</span></div>
                            </div>
                        </div>
                        <div class="invest-data-ck">
                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Solana Market Cap -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Solana Market Cap</h6>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount" id="market-cap">Loading...</span>
                        <span class="currency currency-usd">USD</span>
                    </div>
                    <div class="invest-data">
                        <div class="g-2 invest-data-amount">
                            <div class="invest-data-history">
                                <div class="title">24-Hr Volume</div>
                                <div class="amount" id="daily-volume">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create on Solana (public marketing block) -->
        <div class="col-12 col-md-4 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom d-flex flex-column h-100">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Create on Solana</h6>
                            <p>Launch tokens, NFTs, and more using MyMI Wallet’s Solana integration.</p>
                        </div>
                    </div>
                    <div class="gy-3 progress-list">
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Get Started</div>
                                <div class="progress-amount w-40">
                                    <a href="<?= site_url('Register'); ?>"
                                       class="btn btn-block btn-primary text-white">
                                        <em class="icon ni ni-plus"></em> Join MyMI Wallet
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invest-top-ck mt-auto">
                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top-Performing Tokens (reuse existing partial if present) -->
        <div class="col-12 col-md-8 col-xxl-8">
            <?php
            // This partial should already exist in your module:
            // ExchangeModule/Views/Solana/index/Top-Performing-Tokens.php
            echo view('ExchangeModule\Views\Solana\index\Top-Performing-Tokens', $subViewData);
            ?>
        </div>

        <!-- Optional: My Solana Assets (only if feature flag is enabled) -->
        <?php if ($solanaUserAssets === 1) : ?>
            <div class="col-12 col-md-4 col-xxl-4">
                <div class="card card-bordered card-full">
                    <div class="card-inner border-bottom">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">My Solana Assets</h6>
                                <p>Connect a wallet to view your top Solana assets.</p>
                            </div>
                        </div>
                    </div>
                    <ul class="nk-activity" id="solana-assets-list">
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-light">
                                <span>Loading...</span>
                            </div>
                            <div class="nk-activity-data">
                                <div class="label">Fetching Solana assets...</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <!-- Optional: Notifications -->
        <?php if ($solanaNotifications === 1) : ?>
            <div class="col-12 col-md-4 col-xxl-4">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Notifications</h6>
                                <p>Recent activity on the Solana network.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="timeline">
                            <h6 class="timeline-head"><?= date("D - F jS, Y"); ?></h6>
                            <ul class="timeline-list" id="solana-notifications-list">
                                <li class="timeline-item">
                                    <div class="timeline-status bg-light"></div>
                                    <div class="timeline-data">
                                        <div class="timeline-title">Loading notifications...</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Optional: Network performance -->
        <?php if ($solanaNetwork === 1) : ?>
            <div class="col-12 col-md-4 col-xxl-4">
                <div class="card card-bordered card-full">
                    <div class="card-inner">
                        <div class="card-title-group mb-1">
                            <div class="card-title">
                                <h6 class="title">Solana - Network Performance</h6>
                                <p>Network health and throughput overview.</p>
                            </div>
                        </div>
                        <div class="mt-0 tab-content">
                            <div class="active tab-pane" id="overview">
                                <div class="gy-2 invest-ov">
                                    <div class="subtitle">Network Status</div>
                                    <div class="invest-ov-details">
                                        <div class="invest-ov-info">
                                            <div class="amount" id="network-status">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gy-2 invest-ov">
                                    <div class="subtitle">Transaction Speed</div>
                                    <div class="invest-ov-details">
                                        <div class="invest-ov-info">
                                            <div class="amount" id="transaction-speed">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gy-2 invest-ov">
                                    <div class="subtitle">Network Throughput</div>
                                    <div class="invest-ov-details">
                                        <div class="invest-ov-info">
                                            <div class="amount" id="network-throughput">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.tab-pane -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div> <!-- /.row -->
</div> <!-- /.nk-block -->

<script<?= $nonce['script'] ?? '' ?>>
/**
 * Public Solana data fetch.
 * This calls SolanaController::fetchFrontendData() and expects it to be
 * guest-safe (see controller patch below).
 */
$.ajaxSetup({
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
});

$(document).ready(function () {
    const postData = {};
    if (window.CSRF_TOKEN_NAME && window.CSRF_TOKEN_HASH) {
        postData[window.CSRF_TOKEN_NAME] = window.CSRF_TOKEN_HASH;
    }

    $.ajax({
        url: '/index.php/Exchange/Solana/fetchFrontendData',
        method: 'POST',
        data: postData,
        xhrFields: { withCredentials: true }
    })
    .done(function (response) {
        if (!response || response.status !== 'success') {
            console.warn('Failed to fetch Solana data:', response?.message || 'Unknown error');
            return;
        }

        const data = response.data || {};

        function formatCurrency(value) {
            const number = parseFloat(value) || 0;
            return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        // Overview
        $('#solana-total').text(formatCurrency(data.mySolanaData?.totalSolana ?? 0));
        $('#solana-value').text(`$${formatCurrency(data.mySolanaData?.totalValue ?? 0)}`);
        $('#solana-pl').text(`$${formatCurrency(data.mySolanaData?.profitLoss24hr ?? 0)}`);

        // Market
        $('#solana-price').html(
            `$${formatCurrency(data.marketData?.currentPrice ?? 0)} <span class="currency currency-usd">USD</span>`
        );
        $('#market-cap').text(`$${formatCurrency(data.marketData?.market_cap ?? 0)}`);
        $('#daily-volume').text(`$${formatCurrency(data.marketData?.dailyVolume ?? 0)}`);

        const mtdPL = parseFloat(data.marketData?.mtdPL) || 0;
        $('#mtd-pl-change')
            .text(`${formatCurrency(mtdPL)} MTD`)
            .removeClass('up text-success down text-danger')
            .addClass(mtdPL >= 0 ? 'up text-success' : 'down text-danger');

        $('#daily-pl').text(`${formatCurrency(data.marketData?.dailyPL ?? 0)} %`);
        $('#hourly-pl').text(`${formatCurrency(data.marketData?.hourlyPL ?? 0)} %`);

        // Network
        $('#network-status').text(data.marketData?.networkStatus ?? 'N/A');
        $('#transaction-speed').text(data.marketData?.transactionSpeed ?? 'N/A');
        $('#network-throughput').text(data.marketData?.networkThroughput ?? 'N/A');
    })
    .fail(function (xhr) {
        console.warn('Solana public fetch failed:', xhr.status, xhr.responseText || xhr.statusText);
    });
});
</script>
