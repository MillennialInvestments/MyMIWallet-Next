<?php
$pageAccountType                    = $uri->getSegment(2);
if ($pageAccountType === 'Banking') {
    $accountInformation             = array(
        'accountID'                 => $previousData['id'],
        'accountType'               => $previousData['account_type'],
        'accountWalletID'           => $previousData['wallet_id'],
        'accountBankName'           => $previousData['bank_name'],
        'accountName'               => $previousData['nickname'],
        'accountTitle'              => $previousData['bank_name'] . ' - ' . $previousData['nickname'],
        'accountRouting'            => $previousData['routing_number'],
        'accountNumber'             => $previousData['account_number'],
        'accountBalance'            => $previousData['balance'],
    );
    echo view('UserModule\Views\Wallets\Details\bank_accounts', $accountInformation);
} elseif ($pageAccountType === 'Credit') {
    $accountInformation             = array(
        'accountID'                 => $previousData['id'],
        'accountType'               => $previousData['account_type'],
        'accountWalletID'           => $previousData['id'],
        'accountBankName'           => $previousData['bank_name'],
        'accountName'               => $previousData['nickname'],
        'accountTitle'              => $previousData['bank_name'] . ' - ' . $previousData['nickname'],
        'accountNumber'             => $previousData['account_number'],
        'accountCreditLimit'        => $previousData['credit_limit'],
        'accountCurrentBalance'     => $previousData['current_balance'],
        'accountAvailableBalance'   => $previousData['available_balance'],
    );
    echo view('UserModule\Views\Wallets\Details\credit_accounts', $accountInformation);
} elseif ($pageAccountType === 'Debt') {
    $accountInformation             = array(
        'accountID'                 => $previousData['id'],
        'accountType'               => $previousData['account_type'],
        'accountWalletID'           => $previousData['id'],
        'accountDebtor'             => $previousData['debtor'],
        'accountName'               => $previousData['nickname'],
        'accountTitle'              => $previousData['debtor'] . ' - ' . $previousData['nickname'],
        'accountNumber'             => $previousData['account_number'],
        'accountCreditStatus'       => $previousData['credit_status'],
        'accountCurrentBalance'     => $previousData['current_balance'],
    );
    echo view('UserModule\Views\Wallets\Details\debt_accounts', $accountInformation);
} elseif ($pageAccountType === 'Investment') {
    $accountInformation             = array(
        'accountID'                 => $previousData['id'],
        'accountType'               => $previousData['account_type'],
        'accountWalletID'           => $previousData['id'],
        'accountBroker'             => $previousData['broker'],
        'accountName'               => $previousData['nickname'],
        'accountTitle'              => $previousData['broker'] . ' - ' . $previousData['nickname'],
        'accountNumber'             => $previousData['account_number'],
        'accountNetWorth'           => $previousData['net_worth'],
    );
    echo view('UserModule\Views\Wallets\Details\investment_accounts', $accountInformation);
} elseif ($pageAccountType === 'Wallets') {
    
    $accountTypeText                = 'Wallet';
    $purchaseType                   = $this->uri->segment(2);
    $pageView                       = 'User/Wallets/Edit/user_fields';
    $tutorialView                   = 'User/Wallets/Details/wallets';
    $beta                           = $siteSettings->beta;
    $walletID					    = $this->uri->segment(4);
    // $userWalletInfo                 = $this->wallet_model->get_wallet_info($cuID, $walletID)->result_array();
    $this->db->from('bf_users_wallet');
    $this->db->where('id', $walletID);
    $userWalletInfo                 = $this->db->get()->result_array(); 
    print_r($userWalletInfo);
    foreach($userWalletInfo as $walletInfo) {
        $walletType                     = $walletInfo['walletType'];
        $walletBroker                   = $walletInfo['walletBroker'];
        $walletAccountID                = $walletInfo['walletAccountID'];
        $walletAccessCode               = $walletInfo['walletAccessCode'];
        $walletPremium                  = $walletInfo['walletPremium'];
        $walletInitialAmount            = $walletInfo['walletInitialAmount'];
        $walletTitle                    = $walletInfo['walletTitle'];
        $walletNickname                 = $walletInfo['walletNickname'];
        $walletDefault                  = $walletInfo['walletDefault'];
        $walletExchange                 = $walletInfo['walletExchange'];
        $walletMarketPair               = $walletInfo['walletMarketPair'];
        $walletMarket                   = $walletInfo['walletMarket'];
        $getUserWalletTrades            = $walletInfo['getUserWalletTrades'];
        if ($walletInfo['walletAmount'] > 0) {
            $walletAmount               = '$' . number_format($walletInfo['walletAmount']);
        } elseif ($walletInfo['walletAmount'] < 0) {
            $walletAmount               = '-$' . number_format($walletInfo['walletAmount']);
        } else {
            $walletAmount               = '$0.00';
        }
        if ($walletInfo['walletTotalAmount'] > 0) {
            $walletTotalAmount          = '$' . number_format($walletInfo['walletTotalAmount']);
        } elseif ($walletInfo['walletTotalAmount'] < 0) {
            $walletTotalAmount          = '-$' . number_format($walletInfo['walletTotalAmount']);
        } else {
            $walletTotalAmount          = '$0.00';
        }
        if ($walletInfo['walletGains'] > 0) {
            $walletGains                = '$' . number_format($walletInfo['walletGains']);
        } elseif ($walletInfo['walletGains'] < 0) {
            $walletGains                = '-$' . number_format($walletInfo['walletGains']);
        } else {
            $walletGains                = '$0.00';
        }
        if ($walletInfo['depositAmount'] > 0) {
            $depositAmount              = '$' . number_format($walletInfo['depositAmount']);
        } elseif ($walletInfo['depositAmount'] < 0) {
            $depositAmount              = '-$' . number_format($walletInfo['depositAmount']);
        } else {
            $depositAmount              = '$0.00';
        }
        if ($walletInfo['withdrawAmount'] > 0) {
            $withdrawAmount             = '$' . number_format($walletInfo['withdrawAmount']);
        } elseif ($walletInfo['withdrawAmount'] < 0) {
            $withdrawAmount             = '-$' . number_format($walletInfo['withdrawAmount']);
        } else {
            $withdrawAmount             = '$0.00';
        }
        if ($walletInfo['percentChange'] > 0) {
            $percentChange              = '$' . number_format($walletInfo['percentChange']);
        } elseif ($walletInfo['percentChange'] < 0) {
            $percentChange              = '-$' . number_format($walletInfo['percentChange']);
        } else {
            $percentChange              = '$0.00';
        }
        $transferBalance                = $walletInfo['depositAmount'] - $walletInfo['withdrawAmount'];
        if ($transferBalance > 0) {
            $transferBalance            = '$' . number_format($transferBalance);
        } elseif ($transferBalance < 0) {
            $transferBalance            = '-$' . number_format($transferBalance);
        } else {
            $transferBalance            = '$0.00';
        }
        $totalTrades                    = number_format($walletInfo['totalTrades'],0);
        $this->db->select_sum('closed_perc');
        $this->db->from('bf_users_trades');
        $this->db->where('wallet', $walletID);
        $getAllPercentChange		    = $this->db->get();
        foreach ($getAllPercentChange->result_array() as $walletTrades) {
            $percent_change			    = $walletTrades['closed_perc'];
            if ($percent_change === null) {
                $percentChange		    = '<span">0%</span>';
            } elseif ($percent_change >= 0) {
                $percentChange		    = '<span class="text-success">' . $percent_change . '%</span>';
            } else {
                $percentChange		    = '<span class="text-danger">' . $percent_change . '%</span>';
            }
        }
        $accountInformation             = array(
            'walletID'                  => $walletID,
            'walletBroker'              => $walletBroker,
            'walletAccountID'           => $walletAccountID,
            'walletAccessCode'          => $walletAccessCode,
            'walletPremium'             => $walletPremium,
            'walletTitle'			    => $walletTitle,
            'walletNickname'		    => $walletNickname,
            'walletDefault'		        => $walletDefault,
            'walletExchange'			=> $walletExchange,
            'walletMarketPair'  	    => $walletMarketPair,
            'walletMarket'			    => $walletMarket,
            'walletGains'   		    => $walletGains,
            'walletAmount'              => $walletAmount,
            'walletTotalAmount'		    => $walletTotalAmount,
            'percentChange'             => $percentChange,
            'totalTrades'               => $totalTrades,
            'depositAmount'             => $depositAmount,
            'withdrawAmount'            => $withdrawAmount,
            'transferBalance'           => $transferBalance,
            'getUserWalletTrades'       => $getUserWalletTrades,
        );
        echo view('UserModule/Wallets/Details/wallets', $accountInformation); 
    }
}
?>
