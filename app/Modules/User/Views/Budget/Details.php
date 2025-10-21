<?php
// $redirect_url				        = $this->uri->uri_string();
// $today						        = date('h:i A');
$pageAccountType                    = $uri->getSegment(1);
if ($pageAccountType === 'Banking') {
    echo $pageAccountType . '<br>'; 
    $accountID                      = $uri->getSegment(3);
    // $getBankAccountInfo             = $this->wallet_model->get_bank_account_information($accountID); 
    $this->db->from('bf_users_bank_accounts'); 
    $this->db->where('id', $accountID);
    $getBankAccountInfo             = $this->db->get();
    print_r($getBankAccountInfo->result_array()); 
    foreach ($getBankAccountInfo->result_array() as $bankInfo) {
        $accountType                = $bankInfo['account_type']; 
        $accountWalletID            = $bankInfo['wallet_id']; 
        $accountBankName            = $bankInfo['bank_name'];
        if (!empty($bankInfo['nickname'])) {
            $accountName            = $bankInfo['nickname'];
            $accountTitle           = $accountBankName . ' - ' . $accountName;
        } else {
            $accountName            = '';
            $accountTitle           = $accountName;
        }
        $accountRouting             = $bankInfo['routing_number'];
        $accountNumber              = $bankInfo['account_number']; 
        $accountBalance             = $bankInfo['balance']; 
    }
    $accountInformation             = array(
        'accountID'                 => $accountID,
        'accountType'               => $accountType,
        'accountWalletID'           => $accountWalletID,
        'accountBankName'           => $accountBankName,
        'accountName'               => $accountName,
        'accountTitle'              => $accountTitle,
        'accountRouting'            => $accountRouting,
        'accountNumber'             => $accountNumber,
        'accountBalance'            => $accountBalance,
    );
    echo view('UserModule/Wallets/Details/bank_accounts', $accountInformation);
} elseif ($pageAccountType === 'Budget') {
    $accountTypeText = 'Budget';
    // Other variables
    $pageView = 'User/Budget/Edit/user_fields';
    $tutorialView = 'User/Budget/Details/wallets';
    $recordID = $uri->getSegment(3);
    // log_message('info', 'Budget\Details L46 - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
    $recordID = $userBudgetRecord['accountID'] ?? null;
    $recordDesDate = $userBudgetRecord['accountDesDate'] ?? null;
    $recordType = $userBudgetRecord['accountType'] ?? null;
    $recordSource = $userBudgetRecord['accountSource'] ?? null;
    $recordName = $userBudgetRecord['accountName'] ?? null;
    $recordBalance = $userBudgetRecord['accountNetAmount'] ?? null;
    $recordRecurring = $userBudgetRecord['accountRecurring'] ?? null;
    $recordRecAccount = $userBudgetRecord['accountRecurringPrimary'] ?? null;
    $recordIntervals = $userBudgetRecord['accountIntervals'] ?? null;
    $budgetRelatedRecords = $userRelatedBudgetAccounts ?? [];
    // log_message('info', 'Budget\Details L57 - $budgetRelatedRecords: ' . print_r($budgetRelatedRecords, true));

    $accountInformation = [
        'cuID' => $cuID,
        'recordID' => $recordID,
        'recordDesDate' => $recordDesDate,
        'recordType' => $recordType,
        'recordSource' => $recordSource,
        'recordName' => $recordName,
        'recordBalance' => $recordBalance !== null ? number_format($recordBalance) : '0.00',
        'recordRecurring' => $recordRecurring,
        'recordRecAccount' => $recordRecAccount,
        'recordIntervals' => $recordIntervals,
        'budgetRelatedRecords' => $budgetRelatedRecords,
    ];
    // log_message('info', 'Budget\Details L70 - $accountInformation: ' . print_r($accountInformation, true));
    echo view('Budget/Details/accounts', $accountInformation); 
}
    // } elseif ($pageAccountType === 'Wallets') {
    
//     $accountTypeText                = 'Wallet';
//     $purchaseType                   = $uri->getSegment(2);
//     $pageView                       = 'User/Wallets/Edit/user_fields';
//     $tutorialView                   = 'User/Wallets/Details/wallets';
//     $beta                           = $siteSettings->beta;
//     $walletID					    = $uri->getSegment(4);
//     $userWalletInfo                 = $this->mymiwallets->get_wallet_info($cuID, $walletID);
//     $walletType                     = $userWalletInfo['walletType'];
//     $walletBroker                   = $userWalletInfo['walletBroker'];
//     $walletAccountID                = $userWalletInfo['walletAccountID'];
//     $walletAccessCode               = $userWalletInfo['walletAccessCode'];
//     $walletPremium                  = $userWalletInfo['walletPremium'];
//     $walletInitialAmount            = $userWalletInfo['walletInitialAmount'];
//     $walletTitle                    = $userWalletInfo['walletTitle'];
//     $walletNickname                 = $userWalletInfo['walletNickname'];
//     $walletDefault                  = $userWalletInfo['walletDefault'];
//     $walletExchange                 = $userWalletInfo['walletExchange'];
//     $walletMarketPair               = $userWalletInfo['walletMarketPair'];
//     $walletMarket                   = $userWalletInfo['walletMarket'];
//     $getUserWalletTrades            = $userWalletInfo['getUserWalletTrades'];
//     if ($userWalletInfo['walletAmount'] > 0) {
//         $walletAmount               = '$' . number_format($userWalletInfo['walletAmount']);
//     } elseif ($userWalletInfo['walletAmount'] < 0) {
//         $walletAmount               = '-$' . number_format($userWalletInfo['walletAmount']);
//     } else {
//         $walletAmount               = '$0.00';
//     }
//     if ($userWalletInfo['walletTotalAmount'] > 0) {
//         $walletTotalAmount          = '$' . number_format($userWalletInfo['walletTotalAmount']);
//     } elseif ($userWalletInfo['walletTotalAmount'] < 0) {
//         $walletTotalAmount          = '-$' . number_format($userWalletInfo['walletTotalAmount']);
//     } else {
//         $walletTotalAmount          = '$0.00';
//     }
//     if ($userWalletInfo['walletGains'] > 0) {
//         $walletGains                = '$' . number_format($userWalletInfo['walletGains']);
//     } elseif ($userWalletInfo['walletGains'] < 0) {
//         $walletGains                = '-$' . number_format($userWalletInfo['walletGains']);
//     } else {
//         $walletGains                = '$0.00';
//     }
//     if ($userWalletInfo['depositAmount'] > 0) {
//         $depositAmount              = '$' . number_format($userWalletInfo['depositAmount']);
//     } elseif ($userWalletInfo['depositAmount'] < 0) {
//         $depositAmount              = '-$' . number_format($userWalletInfo['depositAmount']);
//     } else {
//         $depositAmount              = '$0.00';
//     }
//     if ($userWalletInfo['withdrawAmount'] > 0) {
//         $withdrawAmount             = '$' . number_format($userWalletInfo['withdrawAmount']);
//     } elseif ($userWalletInfo['withdrawAmount'] < 0) {
//         $withdrawAmount             = '-$' . number_format($userWalletInfo['withdrawAmount']);
//     } else {
//         $withdrawAmount             = '$0.00';
//     }
//     if ($userWalletInfo['percentChange'] > 0) {
//         $percentChange              = '$' . number_format($userWalletInfo['percentChange']);
//     } elseif ($userWalletInfo['percentChange'] < 0) {
//         $percentChange              = '-$' . number_format($userWalletInfo['percentChange']);
//     } else {
//         $percentChange              = '$0.00';
//     }
//     $transferBalance                = $userWalletInfo['depositAmount'] - $userWalletInfo['withdrawAmount'];
//     if ($transferBalance > 0) {
//         $transferBalance            = '$' . number_format($transferBalance);
//     } elseif ($transferBalance < 0) {
//         $transferBalance            = '-$' . number_format($transferBalance);
//     } else {
//         $transferBalance            = '$0.00';
//     }
//     $totalTrades                    = number_format($userWalletInfo['totalTrades'],0);
    
//     $this->db->select_sum('closed_perc');
//     $this->db->from('bf_users_trades');
//     $this->db->where('wallet', $walletID);
//     $getAllPercentChange		    = $this->db->get();
//     foreach ($getAllPercentChange->result_array() as $walletTrades) {
//         $percent_change			    = $walletTrades['closed_perc'];
//         if ($percent_change === null) {
//             $percentChange		    = '<span">0%</span>';
//         } elseif ($percent_change >= 0) {
//             $percentChange		    = '<span class="text-success">' . $percent_change . '%</span>';
//         } else {
//             $percentChange		    = '<span class="text-danger">' . $percent_change . '%</span>';
//         }
//     }
//     $accountInformation             = array(
//         'walletID'                  => $walletID,
//         'walletBroker'              => $walletBroker,
//         'walletAccountID'           => $walletAccountID,
//         'walletAccessCode'          => $walletAccessCode,
//         'walletPremium'             => $walletPremium,
//         'walletTitle'			    => $walletTitle,
//         'walletNickname'		    => $walletNickname,
//         'walletDefault'		        => $walletDefault,
//         'walletExchange'			=> $walletExchange,
//         'walletMarketPair'  	    => $walletMarketPair,
//         'walletMarket'			    => $walletMarket,
//         'walletGains'   		    => $walletGains,
//         'walletAmount'              => $walletAmount,
//         'walletTotalAmount'		    => $walletTotalAmount,
//         'percentChange'             => $percentChange,
//         'totalTrades'               => $totalTrades,
//         'depositAmount'             => $depositAmount,
//         'withdrawAmount'            => $withdrawAmount,
//         'transferBalance'           => $transferBalance,
//         'getUserWalletTrades'       => $getUserWalletTrades,
//     );
//     $this->load->""view('Budget/Details/accounts', $accountInformation); 
// }
// echo view('UserModule/Budget/Details/accounts', $accountInformation)
?>
