<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content">
            <h5 class="nk-block-title title">
                Credit Cards - <?= $creditAvailableFMT ?? '0.00'; ?> / <?= $creditLimitFMT ?? '0.00'; ?>  
                <small>(<?= $creditLimitPercentage ?? '0.00%'; ?> Used)</small>
            </h5>
            <a href="<?= site_url('/Wallets/Credit'); ?>"><small>View All</small></a>
        </div>
	</div>
</div>

<div class="row">
<?php
    if (!empty($getUserCreditAccounts)) {
        log_message('info', 'Wallets\index\credit_wallets - L13 $getUserCreditAccounts: ' . print_r($getUserCreditAccounts, true)); 
        foreach ($getUserCreditAccounts as $accountInfo) {
            $btnID                                  = 'editCreditAccount';
            $accountID                              = $accountInfo['id'] ?? null;
            $accountStatus                          = $accountInfo['status'] ?? 'Active';
            $accountWalletID                        = $accountInfo['wallet_id'] ?? '';
            $accountType                            = $accountInfo['account_type'] ?? 'Unknown';
            $accountBankName                        = $accountInfo['bank_name'] ?? 'Unknown Bank';
            $accountName                            = $accountInfo['nickname'] ?? 'Untitled';
            $accountAccountNumber                   = $accountInfo['account_number'] ?? 'N/A';
            $accountBalance                         = $accountInfo['available_balance'] ?? '0.00';
            
            $walletData = [
                'btnID'                 => $btnID,
                'accountID'             => $accountID,
                'accountStatus'         => $accountStatus,
                'accountWalletID'       => $accountWalletID,
                'accountType'           => $accountType,
                'accountBankName'       => $accountBankName,
                'accountName'           => $accountName,
                'accountAccountNumber'  => $accountAccountNumber,
                'accountBalance'        => $accountBalance,
            ];

            echo view('UserModule\Views\Wallets\index\credit_wallets\Wallet_Listing', $walletData);
        }
    }

    $btnID                  = 'addCreditAccount';
    log_message('info', 'Wallets/index/credit_wallets L59: $btnID: ' . $btnID);
    $btnEndpoint            = 'Wallets/Add/Credit';
    $elementTitle           = 'Add Credit Card Account';
    $elementText            = 'Connect your Credit Card to include in your financial forecast.';

    $purchaseWalletData = [
        'btnID'             => $btnID,
        'btnEndpoint'       => $btnEndpoint,
        'elementTitle'      => $elementTitle,
        'elementText'       => $elementText,
    ];

    echo view('UserModule\Views\Wallets\index\Purchase_Wallet', $purchaseWalletData);
?>
</div>
