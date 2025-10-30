<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content">
            <h5 class="nk-block-title title">Bank Accounts - $<?php echo $checkingSummaryFMT; ?></h5>
            <a href="<?php echo site_url('/Wallets/Banking'); ?>"><small>View All</small></a>
        </div>
	</div>
</div>
<div class="row">
<?php
    if (!empty($getUserBankAccounts)) {
        foreach ($getUserBankAccounts as $accountInfo) {
            $btnID                                  = 'editBankAccount';
            $accountID							    = $accountInfo['id'];
            $accountWalletID					    = $accountInfo['wallet_id'];
            $accountType                            = $accountInfo['account_type']; 
            $accountBankName					    = $accountInfo['bank_name'];
            $accountName					        = $accountInfo['nickname'];
            $accountRoutingNumber                   = $accountInfo['routing_number'];
            $accountAccountNumber                   = $accountInfo['account_number'];
            $accountBalance                         = $accountInfo['balance']; 
            
            $walletData							    = array(
                'btnID'                             => $btnID,
                'accountID'						    => $accountID,
                'accountWalletID'				    => $accountWalletID,
                'accountType'				        => $accountType,
                'accountBankName'				    => $accountBankName,
                'accountName'				        => $accountName,
                'accountRoutingNumber'		        => $accountRoutingNumber,
                'accountAccountNumber'		        => $accountAccountNumber,
                'accountBalance'		            => $accountBalance,
            );
            echo view('UserModule\Views\Wallets\index\financial_wallets\Wallet_Listing', $walletData);
        }
    }
    $btnID    	                                    = 'addBankAccount';
    $btnEndpoint    	                            = 'Wallets/Add/Bank';
    $elementTitle		                            = 'Add Banking Account';
    $elementText		                            = 'Connect your Bank Account to include in your financial forecast.';
    $purchaseWalletData					            = array(
        'btnID'							            => $btnID,
        'btnEndpoint'							    => $btnEndpoint,
        'elementTitle'					            => $elementTitle,
        'elementText'					            => $elementText,
    );
    echo view('UserModule\Views\Wallets\index\Purchase_Wallet', $purchaseWalletData);
?>
</div>
