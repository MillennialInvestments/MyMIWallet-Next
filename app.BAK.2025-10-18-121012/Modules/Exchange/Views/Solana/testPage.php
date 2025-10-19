<!-- app/Modules/Exchange/Views/Solana/index.php -->
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
$subViewData = [
    'solanaTokens' => $solanaTokens,
];
?>

<div class="nk-block-head nk-block-head-sm pt-xl-5">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Exchange - Solana Dashboard</h3>
            <div class="nk-block-des text-soft">
                <p>Welcome to the Solana Blockchain Dashboard of MyMI Wallet.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <?php if (empty($cuSolanaDW)) : ?>
                            <li><a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                <em class="icon ni ni-plus"></em><span>Connect Wallet</span></a>
                            </li>
                        <?php else : ?>
                            <li><a class="btn btn-light" href="#" onclick="copyAddressToClipboard('<?php echo $cuSolanaDW['address'] ?? 0; ?>')">
                                <em class="icon ni ni-copy"></em></a>
                            </li>
                            <li><a class="btn btn-primary text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaWallet">
                                <em class="icon ni ni-eye"></em><span>View Wallet</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
