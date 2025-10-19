<?php 
$beta = $siteSettings->beta;
$debug = $siteSettings->debug;
$createSolanaStatus = $siteSettings->createSolanaStatus;
$solanaNetwork = $siteSettings->solanaNetwork;
$solanaNotifications = $siteSettings->solanaNotifications;
$solanaUserAssets = $siteSettings->solanaUserAssets;
$swapSolanaStatus = $siteSettings->swapSolanaStatus;
$tradeSolanaStatus = $siteSettings->tradeSolanaStatus;
$transactionsSolanaStatus = $siteSettings->transactionsSolanaStatus;
// $cuSolanaDW = $userSolana['cuSolanaDW'] ?? null;
// $cuSolanaTotal = $userSolana['cuSolanaTotal'] ?? null;
// $cuSolanaValue = $userSolana['cuSolanaValue'] ?? null; 
// $cuSolanaPercentage = $userSolana['cuSolanaPercentage'] ?? null; 
// $solanaPrice = $userSolana['solanaPrice'];
// $solanaMTDPL = $userSolana['solanaMTDPL'] ?? 0;
// $solanaDailyPL = $userSolana['solanaDailyPL'] ?? 0;
// $solanaHourlyPL = $userSolana['solanaHourlyPL'] ?? 0;
// $solanaMarketCap = $userSolana['solanaMarketCap'] ?? 0;
// $solanaDailyVolume = $userSolana['solanaDailyVolume'] ?? 0;
// $solanaHourlyVolume = $userSolana['solanaHourlyVolume'] ?? 0;
// // Ensure solanaNetworkStatus is an array
// $solanaNetworkStatus = $userSolana['solanaNetworkStatus'] ?? [];
// $solanaNetworkStatusStatus = $solanaNetworkStatus['status'] ?? 'N/A';
// $solanaTransSpeed = $solanaNetworkStatus['transactionSpeed'] ?? 'N/A';
// $solanaNetworkThroughput = $solanaNetworkStatus['networkThroughput'] ?? 'N/A';
// log_message('debug', 'Solana\index L31 - $cryptoDetails Array: ' . (print_r($cryptoDetails,true))); 
if ($debug === 1) {
    // log_message('debug', 'Solana\index L31 - ' . (print_r($cuSolanaTopPerformers,true))); 
    // log_message('debug', 'Exchange\Views\Solana\index - L18: Network Status: ' . (print_r($userSolana['solanaNetworkStatus'],true)));
} 
log_message('debug', 'Solana\index L32 - $cryptoDetails Array: ' . (print_r($cryptoDetails,true))); 
if (!empty($cryptoDetails['volume'])) {
    $volume = $cryptoDetails['volume'];
} else {
    $volume = $cryptoDetails['volume_array']['h24'];
}
?>
<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">Solana Token Overview</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12 mt-0">
                <div class="card card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="subtitle">Token Details</h6>
                            </div>
                        </div>
                        <div class="card-amount d-inline-flex align-items-center">
                            <div class="user-avatar user-avatar-sm bg-light d-inline-flex">
                                <img class="solanaTickerLogo" src="<?= $cryptoDetails['coin_logo']; ?>" onerror="this.onerror=null;this.src='https://www.mymiwallet.com/assets/images/MyMI-Wallet.png'" alt="<?= $cryptoDetails['coin_name'] . ' (' . $cryptoDetails['symbol'] . ')'; ?>"/>
                            </div>
                            <span class="amount"><?= esc($cryptoDetails['coin_name']) ?> <span class="currency currency-usd">(<?= esc($cryptoDetails['symbol']) ?>)</span></span>
                        </div>
                        <div class="invest-data">
                            <div class="g-2 invest-data-amount">
                                <div class="invest-data-history">
                                    <div class="title">Price</div>
                                    <div class="amount">$<?= number_format($cryptoDetails['coin_value'], 8) ?> <span class="currency currency-usd">USD</span></div>
                                </div>
                                <div class="invest-data-history">
                                    <div class="title">Market Cap</div>
                                    <div class="amount">$<?= number_format($cryptoDetails['fdv'], 2) ?> <span class="currency currency-usd">USD</span></div>
                                </div>
                                <div class="invest-data-history">
                                    <div class="title">24-Hr Volume</div>
                                    <div class="amount">$<?= number_format($volume, 2) ?? 0 ?> <span class="currency currency-usd">USD</span></div>
                                </div>
                            </div>
                            <div class="invest-data-ck">
                                <canvas class="iv-data-chart" id="tokenOverview"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-0">
                <div class="card card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="subtitle">Description</h6>
                            </div>
                        </div>
                        <div class="invest-data">
                            <div class="user-card">
                                <?= esc($cryptoDetails['description'] . ' | Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.' ?? 'Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-0">
                <div class="card card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="subtitle">Social Media & Links</h6>
                            </div>
                        </div>
                        <div class="invest-data">
                            <div class="user-card">
                                <?php if (!empty($cryptoDetails['discord'])): ?>
                                    <a href="<?= esc($cryptoDetails['discord']) ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon bi-discord"></em></a>
                                <?php endif; ?>
                                <?php if (!empty($cryptoDetails['facebook'])): ?>
                                    <a href="<?= esc($cryptoDetails['facebook']) ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-facebook-f"></em></a>
                                <?php endif; ?>
                                <?php if (!empty($cryptoDetails['telegram'])): ?>
                                    <a href="<?= esc($cryptoDetails['telegram']) ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-telegram"></em></a>
                                <?php endif; ?>
                                <?php if (!empty($cryptoDetails['twitter'])): ?>
                                    <a href="<?= esc($cryptoDetails['twitter']) ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-twitter"></em></a>
                                <?php endif; ?>
                                <?php if (!empty($cryptoDetails['website'])): ?>
                                    <a href="<?= esc($cryptoDetails['website']) ?>" target="_blank"><em class="icon ni myfs-md solanaTickerSocialIcon ni-link"></em></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-0">
                <div class="card card-full">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                                <h6 class="title">Actions</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="invest-data" style="display: block;">
                            <div class="progress-wrap">
                                <div class="progress-text">
                                    <div class="progress-label">Trade <?= esc($cryptoDetails['coin_name']) ?></div>
                                    <div class="progress-amount w-40">
                                        <a class="btn btn-block text-white btn-success"><em class="icon ni ni-plus"></em> Trade</a>
                                        <!-- <a class="btn btn-block text-white dynamicModalLoader btn-success" data-endpoint="tradeSolana" data-formtype="Solana" data-accountid="<?= esc($cryptoDetails['symbol']) ?>"><em class="icon ni ni-plus"></em> Trade</a> -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="progress-wrap">
                                <div class="progress-text">
                                    <div class="progress-label">Swap <?= esc($cryptoDetails['coin_name']) ?></div>
                                    <div class="progress-amount w-40">
                                        <a class="btn btn-block text-white btn-primary"><em class="icon ni ni-swap"></em> Swap</a>
                                        <!-- <a class="btn btn-block text-white dynamicModalLoader btn-primary" data-endpoint="swapSolana" data-formtype="Solana" data-accountid="<?= esc($cryptoDetails['symbol']) ?>"><em class="icon ni ni-swap"></em> Swap</a> -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="progress-wrap">
                                <div class="progress-text">
                                    <div class="progress-label">View Orders</div>
                                    <div class="progress-amount w-40">
                                        <a class="btn btn-block text-white btn-dark"><em class="icon ni ni-history"></em> Orders</a>
                                        <!-- <a class="btn btn-block text-white dynamicModalLoader btn-dark" data-endpoint="viewSolanaOrders" data-formtype="Solana" data-accountid="<?= esc($cryptoDetails['symbol']) ?>"><em class="icon ni ni-history"></em> Orders</a> -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="invest-data-ck mt-auto">
                                <canvas class="iv-plan-purchase" id="tokenActions"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>