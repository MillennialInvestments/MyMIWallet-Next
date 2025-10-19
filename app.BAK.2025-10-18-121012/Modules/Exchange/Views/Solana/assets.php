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
$cuSolanaDefaultWallet = $userSolana['cuSolanaDefaultWallet'] ?? null;
$cuSolanaTransactions = $userSolana['cuSolanaTransactions'] ?? [];
$cuSolanaDW = $cuSolanaDefaultWallet;
$cuSolanaTotal = $userSolana['cuSolanaTotal'] ?? 0;
$cuSolanaValue = $userSolana['cuSolanaValue'] ?? 0;
$cuSolanaPercentage = $userSolana['cuSolanaPercentage'] ?? 0;
$solanaPrice = $userSolana['solanaPrice'] ?? 0;
$solanaMTDPL = $userSolana['solanaMTDPL'] ?? 0;
$solanaDailyPL = $userSolana['solanaDailyPL'] ?? 0;
$solanaHourlyPL = $userSolana['solanaHourlyPL'] ?? 0;
$solanaMarketCap = $userSolana['solanaMarketCap'] ?? 0;
$solanaDailyVolume = $userSolana['solanaDailyVolume'] ?? 0;
$solanaHourlyVolume = $userSolana['solanaHourlyVolume'] ?? 0;
$cuSolanaAssets = $userSolana['cuSolanaAssets'] ?? [];
$cuSolanaTopPerformers = $userSolana['cuSolanaTopPerformers'] ?? [];
$cuSolanaNotification = $cuSolanaTransactions;

// Ensure solanaNetworkStatus is an array
$solanaNetworkStatus = $userSolana['solanaNetworkStatus'] ?? [];
$solanaNetworkStatusStatus = $solanaNetworkStatus['status'] ?? 'N/A';
$solanaTransSpeed = $solanaNetworkStatus['transactionSpeed'] ?? 'N/A';
$solanaNetworkThroughput = $solanaNetworkStatus['networkThroughput'] ?? 'N/A';
if ($debug === 1) {
    // log_message('debug', 'Solana\index L31 - ' . (print_r($cuSolanaTopPerformers,true))); 
    // log_message('debug', 'Exchange\Views\Solana\index - L18: Network Status: ' . (print_r($userSolana['solanaNetworkStatus'],true)));
} 
?>
<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
    #userBudgetingDatatable_filter {
        padding-top: 1rem;
        text-align: left;
    }
}
.nk-order-ovwg-data.income {
    border-color: #8ff0d6;
}
.nk-order-ovwg-data.expenses {
    border-color: #e85347;
}
.nk-order-ovwg-data.surplus {
    border-color: #84b8ff;
}
.nk-order-ovwg-data.investments {
    border-color: #f4bd0e;
}
.nk-order-ovwg-data .amount {
    font-size: 1.25rem;
    font-weight: 700;
}
</style>
<div class="card card-bordered h-100">
    <div class="card-inner px-2 px-lg-4">
        <div class="nk-order-ovwg">
            <div class="align-end g-4 row">
                <div class="col-12">
                    <div class="mb-3 align-start card-title-group">
                        <div class="card-title">
                            <h6 class="title">Solana Blockchain Dashboard - MyMI Wallet</h6>
                            <p>Welcome to the Solana Blockchain Dashboard of MyMI Wallet. Below are quick links and short descriptions for each available service. Click on a link to proceed.</p>
                        </div>
                        <div class="d-flex justify-content-md-end card-tools flex-column flex-md-row mt-3 mt-md-0 w-100">
                            <h6 class="d-block d-md-none text-center title">Monthly Financial Overview</h6>
                            <p class="d-block d-md-none text-center mb-3">Last 12 Months of Total Monthly Financial Growth.</p>
                            <div class="d-flex justify-content-md-end flex-wrap justify-content-center">
                                <div class="mb-2 me-2 dropdown">
                                    <a class="btn btn-sm btn-success dropdown-toggle mb-2 me-2 text-white" href="#" aria-expanded="false" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-plus"></em> <span>Connect Wallet</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end mt-1">
                                        <ul class="link-check link-list-opt no-bdr">
                                            <li><span>Choose A Wallet</span></li>
                                            <li class="p-1"><a href="<?= base_url('/Exchange/Solana/Wallet/New') ?>"><em class="icon ni ni-plus"></em> New Wallet</a></li>
                                            <li class="divider"></li>
                                            <li class="p-1"><a href="<?= base_url('/Exchange/Solana/Wallet/MetaMask') ?>">MetaMask</a></li>
                                            <li class="p-1"><a href="<?= base_url('/Exchange/Solana/Wallet/Phantom') ?>">Phantom</a></li>
                                            <li class="p-1"><a href="<?= base_url('/Exchange/Solana/Wallet/Solflare') ?>">Solflare</a></li>
                                            <li class="p-1"><a href="<?= base_url('/Exchange/Solana/Wallet/TrustWallet') ?>">Trust Wallet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-end g-4 row pt-xl-3">
                        <div class="col-12 mt-0 col-md-12">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Create Solana Assets</h3>
                                    <p class="card-description">Create and List a new Solana Asset on the Solana Blockchain.</p>
                                    <a class="btn btn-primary card-link" href="<?= base_url('Exchange/Solana/Wallet/Create') ?>">Create Wallet</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-end g-4 row pt-xl-3">
                        <div class="col-12 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">My Assets</h3>
                                    <p class="card-description">View and manage all of your Solana Assets.</p>
                                    <table class="table table-striped" id="cuSolanaAssetsDatatable">
                                        <thead>
                                            <tr>
                                                <th>Solana Token</th>
                                                <th>Price</th>
                                                <th>Market Cap</th>
                                                <th>Volume</th>
                                                <th>Links</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($userSolana['cuSolanaAssets'] as $asset): ?>
                                            <tr>
                                                <td>
                                                    <div class="align-center">
                                                        <div class="user-avatar user-avatar-sm bg-light">
                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
                                                        </div>
                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],8); ?> <small>(<?php echo ($solanaTP['coin_value'] / $solanaPrice); ?> SOL)</small></span>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['fdv'],2); ?></span>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo $solanaTP['volume']['h24'] ?? 'N/A'; ?></span>
                                                </td>
                                                <td>
                                                    <div class="user-card">
                                                        <?php if (!empty($solanaTP['discord'])) : ?>
                                                        <a href="<?php echo $solanaTP['discord']; ?>"><em class="icon mbr-iconfont socicon-discord socicon solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['facebook'])) : ?>
                                                        <a href="<?php echo $solanaTP['facebook']; ?>"><em class="icon ni ni-facebook-f solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['telegram'])) : ?>
                                                        <a href="<?php echo $solanaTP['telegram']; ?>"><em class="icon ni ni-telegram solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['twitter'])) : ?>
                                                        <a href="<?php echo $solanaTP['twitter']; ?>"><em class="icon ni ni-twitter solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['website'])) : ?>
                                                        <a href="<?php echo $solanaTP['website']; ?>"><em class="icon ni ni-link solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>"><em class="icon ni ni-swap solanaTickerSocialIcon"></em></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="<?php echo site_url('Exchange/Solana/Token/' . $solanaTP['id']); ?>">View</a></li>
                                                                <li><a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>">Swap</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="align-end g-4 row pt-xl-3">
                        <div class="col-12 mt-0">
                            <div class="card card-bordered">
                                <div class="card-body">
                                    <h3 class="card-title">Top 10 Solana Assets</h3>
                                    <p class="card-description">View the Top 10 Solana Assets.</p>
                                    <table class="table solanaTopPerformersTable display">
                                        <thead>
                                            <tr>
                                                <th>Solana Token</th>
                                                <th>Price</th>
                                                <th>Market Cap</th>
                                                <th>Volume</th>
                                                <th>Links</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cuSolanaTopPerformers as $solanaTP) { ?>
                                            <tr>
                                                <td>
                                                    <div class="align-center">
                                                        <div class="user-avatar user-avatar-sm bg-light">
                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
                                                        </div>
                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],2); ?></span>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['fdv'],2); ?></span>
                                                </td>
                                                <td>
                                                    <span class="tb-sub"><?php echo $solanaTP['volume']['h24'] ?? 'N/A'; ?></span>
                                                </td>
                                                <td>
                                                    <div class="user-card">
                                                        <?php if (!empty($solanaTP['discord'])) : ?>
                                                        <a href="<?php echo $solanaTP['discord']; ?>"><em class="icon mbr-iconfont socicon-discord socicon solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['facebook'])) : ?>
                                                        <a href="<?php echo $solanaTP['facebook']; ?>"><em class="icon ni ni-facebook-f solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['telegram'])) : ?>
                                                        <a href="<?php echo $solanaTP['telegram']; ?>"><em class="icon ni ni-telegram solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['twitter'])) : ?>
                                                        <a href="<?php echo $solanaTP['twitter']; ?>"><em class="icon ni ni-twitter solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($solanaTP['website'])) : ?>
                                                        <a href="<?php echo $solanaTP['website']; ?>"><em class="icon ni ni-link solanaTickerSocialIcon"></em></a>
                                                        <?php endif; ?>
                                                        <a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>"><em class="icon ni ni-swap solanaTickerSocialIcon"></em></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="<?php echo site_url('Exchange/Solana/Token/' . $solanaTP['id']); ?>">View</a></li>
                                                                <li><a class="dynamicModalLoader" data-formtype="Solana" data-endpoint="swapSolana" data-accountid="<?php echo $solanaTP['id']; ?>">Swap</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }; ?>
                                        </tbody>
                                    </table>

                                    <script <?= $nonce['script'] ?? '' ?>>
                                        $(document).ready(function() {
                                            $('#cuSolanaAssetsDatatable').DataTable({
                                                "order": [[ 2, "desc" ]],     
                                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                                            });
                                            $('#solanaTopPerformersTable').DataTable({
                                                "order": [[ 2, "desc" ]],     
                                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
