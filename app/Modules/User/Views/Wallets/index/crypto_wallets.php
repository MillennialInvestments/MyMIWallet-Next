<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content">
            <h5 class="nk-block-title title">Crypto Accounts - <?php echo $cryptoSummaryFMT; ?></h5>
            <a href="<?php echo site_url('/Wallets/Crypto'); ?>"><small>View All</small></a>
        </div>
	</div>
</div>
<div class="row">
<?php
    $MyMIWalletData									= array(
        'accountID'                                 => $walletID,
        'walletTitle'								=> 'MyMI Gold',
        'walletFunds'								=> $walletFunds,
        'walletCoins'                               => $walletCoins,
    );
    echo view('UserModule\Views\Wallets\index\crypto_wallets\MyMIGold', $MyMIWalletData);
    if (!empty($getUserCryptoAccounts)) {
        foreach ($getrCryptoWallets as $walletInfo) {
            $wallet_default							= $walletInfo['default_wallet'];
            if ($wallet_default === 'No') {
                $walletID							= $walletInfo['id'];
                $walletTradingAccountID             = $walletInfo['account_id'];
                $wallet_broker						= $walletInfo['broker'];
                $wallet_type						= $walletInfo['wallet_type'];
                $wallet_nickname					= $walletInfo['nickname'];
                if (!empty($wallet_nickname)) {
                    $addWalletTitle					= $wallet_nickname;
                } else {
                    $addWalletTitle					= $walletInfo['broker'];
                }
                // Get Individual Wallet Withdrawals
                $getSingleWalletDeposits			= $this->wallet_model->get_single_wallet_deposits($walletID);
                foreach ($getSingleWalletDeposits->result_array() as $walletDeposits) {
                    $walletDeposits					= $walletDeposits['amount'];
                }
                $getSingleWalletWithdrawals			= $this->wallet_model->get_single_wallet_withdrawals($walletID);
                foreach ($getSingleWalletWithdrawals->result_array() as $walletWithdrawals) {
                    $walletWithdrawals				= $walletWithdrawals['amount'];
                }
                $getWalletTrades					= $this->tracker_model->get_wallet_trades($walletID);
                foreach ($getWalletTrades->result_array() as $walletTrades) {
                    $perWalletGains					= $walletTrades['net_gains'];
                    if ($perWalletGains > 0) {
                        $perWalletGains				= '<span class="statusGreen">' . $perWalletGains . '</span>';
                    } elseif ($perWalletGains < 0) {
                        $perWalletGains				= '<span class="statusRed">' . $perWalletGains . '</span>';
                    } else {
                        $perWalletGains				= '0.00';
                    }
                }
                $perWalletGains                     = 0;
                $walletInitialAmount				= $walletInfo['amount'] + $walletDeposits - $walletWithdrawals;
                $walletTotalAmount					= $walletInfo['amount'] + $perWalletGains + $walletDeposits - $walletWithdrawals;
                if (!empty($walletInitialAmount)) {
                    // $walletPercentChange				= number_format(($walletTotalAmount - $walletInitialAmount) / $walletInitialAmount, 2);
                    // if ($walletPercentChange > 0) {
                    // 	$walletPercentChangeDisplay     = '<span class="statusGreen">' . $walletPercentChange . '</span>';
                    // } elseif ($walletPerchange < 0) {
                    // 	$walletPercentChangeDisplay     = '<span class="statusGreen">' . $walletPercentChange . '</span>';
                    // } else {
                    // 	$walletPercentChangeDisplay     = '0.00%';
                    // }
                } else {
                    $walletPercentChangeDisplay     = '0.00%';
                }
                $walletData							= array(
                    'walletID'						=> $walletID,
                    'addWalletTitle'				=> $addWalletTitle,
                    'wallet_broker'					=> $wallet_broker,
                    'walletTotalAmount'				=> $walletTotalAmount,
                    'perWalletGains'                => $perWalletGains,
                );
                echo view('UserModule\Wallets\index\crypto_wallets\Wallet_Listing', $walletData);
            }
        }
    }
    $btnID    	                                    = 'addCryptoAccount';
    $btnEndpoint    	                            = 'Wallets/Add/Crypto';
    $elementTitle		                            = 'Add Crypto Account';
    $elementText		                            = 'Connect your Crypto Account to include in your financial forecast.';
    $purchaseWalletData					            = array(
        'btnID'							            => $btnID,
        'btnEndpoint'							    => $btnEndpoint,
        'elementTitle'					            => $elementTitle,
        'elementText'					            => $elementText,
    );
    echo view('UserModule\Views\Wallets\index\Purchase_Wallet', $purchaseWalletData);
?>
</div>
