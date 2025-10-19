<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content"><h5 class="nk-block-title title">Fiat Investment Accounts</h5></div>
	</div>
</div>
<div class="row">
<?php
    $MyMIWalletData									= array(
        'walletTitle'								=> $walletTitle,
        'walletFunds'								=> $walletFunds,
    );
    echo view('UserModule/Wallets/index/fiat_wallets/MyMIWallet', $MyMIWalletData);
    $getFiatWallets									= $this->wallet_model->get_fiat_wallets($cuID, $limit);
    if (!empty($getFiatWallets)) {
        foreach ($getFiatWallets->result_array() as $walletInfo) {
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
                echo view('UserModule/Wallets/index/fiat_wallets/Wallet_Listing', $walletData);
            }
        }
    }
    /*
    <strong>Cost: <small>Free</small></strong><br>
    Utilize your Free Wallet to manage an additional brokerage account separately.
    */
    if ($cuWalletCount < 2) {
        $btnID				= 'walletSelectionFreeFiat';
        $elementTitle		= 'Add Free Wallet';
        $elementText		= 'Utilize your Free Wallet to manage an additional brokerage account separately.';
    } else {
        // // Per Wallet - Basis
        // $elementText		= '<strong>Cost:</strong> ' . $walletCost . ' MyMI Gold';
        // if ($MyMIGCoinSum < $walletCost) {
        //     $btnID			= 'purMyMIGold';
        //     $elementTitle	= 'Purchase MyMI Gold';
        // } else {
        //     $btnID			= 'purFiatWalletBtn';
        //     $elementTitle	= '<em class="icon ni icon-plus"></em> Add Wallet';
        // }
        // Force to Wallet Selection between Manual (Free) and Integration (Premium) Wallet Selection
        $btnID			= 'walletSelectionFreeFiat';
        $elementTitle	= '<em class="icon ni icon-plus"></em> Add Wallet';
        $elementText    = '';
    }
    $purchaseWalletData					= array(
        'btnID'							=> $btnID,
        'elementTitle'					=> $elementTitle,
        'elementText'					=> $elementText,
    );
    echo view('UserModule/Wallets/index/Purchase_Wallet', $purchaseWalletData);
?>
</div>
