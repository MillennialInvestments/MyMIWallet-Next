<?php
/**
 * GT-FORM-ROUTES-001: MyMI Gold order form. The old version called the
 * CodeIgniter 3 Template::block() (a fatal error in CodeIgniter 4) and posted
 * to a route that never existed. It now shows the shared PayPal purchase form,
 * which posts the captured order to Wallets/MyMIGPayPalCallback; that handler
 * verifies the order with PayPal before any Gold is credited. With the
 * FEATURE_MYMIGOLD_PURCHASES switch off, no PayPal button is shown.
 */
$settings = $siteSettings ?? config('SiteSettings');
$purchaseData = [
    'featureType'        => 'Purchase',
    'walletType'         => '',
    'siteSettings'       => $settings,
    'transPercent'       => (float) ($transPercent ?? $settings->transPercent ?? 0),
    'transFee'           => (float) ($transFee ?? $settings->transFee ?? 0),
    'gasFee'             => (float) ($gasFee ?? $settings->gasFee ?? 0),
    'MyMIGCoinSum'       => (float) ($MyMIGCoinSum ?? 0),
    'MyMIGCoinAvailable' => (float) ($MyMIGCoinAvailable ?? 0),
    'redirect_url'       => 'Wallets/Purchase/MyMI-Gold',
    'beta'               => (int) ($settings->beta ?? 0),
    'cuID'               => (int) ($cuID ?? 0),
    'cuEmail'            => (string) ($cuEmail ?? ''),
    'cuUserType'         => (string) ($cuUserType ?? ''),
    'cuWalletID'         => (string) ($cuWalletID ?? ''),
    'nonce'              => $nonce ?? [],
];
?>
<div class="nk-block pt-1">
    <div class="row">
        <div class="col-12 mb-3">
            <?php echo view('UserModule/Wallets/MyMI_Gold/header'); ?>
        </div>
    </div>
</div>
<div class="nk-block">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-bordered p-4">
                <div class="nk-block-head-sm">
                    <h5 class="nk-block-title title">Purchase MyMI Gold</h5>
                </div>
                <form class="form-horizontal" id="purchase_mymi_gold_b" onsubmit="return false;">
                    <?= view('UserModule\Views\Wallets\Purchase\user_fields', $purchaseData) ?>
                </form>
            </div>
        </div>
    </div>
</div>
