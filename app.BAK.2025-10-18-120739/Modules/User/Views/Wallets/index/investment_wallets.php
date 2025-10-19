<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content"><h5 class="nk-block-title title">Investment &amp; Accounts</h5></div>
        <a href="<?php echo site_url('/Wallets/Investments'); ?>"><small>View All</small></a>
	</div>
</div>
<div class="row">
<?php
    $MyMIWalletData									= array(
        'walletTitle'								=> 'MyMI Wallet',
        'walletFunds'								=> $walletFunds,
        'walletGains'                               => $walletGains ?? 0,
    );
    echo view('Wallets\index\investment_wallets\MyMIWallet', $MyMIWalletData);
    if (!empty($getUserInvestAccounts)) {
        foreach ($getUserInvestAccounts as $accountInfo) {
            $btnID                                  = 'editInvestAccount';
            $accountID							    = $accountInfo['id'];
            $accountWalletID					    = $accountInfo['wallet_id'];
            $accountType                            = $accountInfo['account_type']; 
            $accountBroker  					    = $accountInfo['broker'];
            $accountName					        = $accountInfo['nickname'];
            $accountAccountNumber                   = $accountInfo['account_id'];
            $accountNetWorth                        = $accountInfo['net_worth']; 
            
            $walletData							    = array(
                'btnID'                             => $btnID,
                'accountID'						    => $accountID,
                'accountWalletID'				    => $accountWalletID,
                'accountType'				        => $accountType,
                'accountBroker'				        => $accountBroker,
                'accountName'				        => $accountName,
                'accountAccountNumber'		        => $accountAccountNumber,
                'accountNetWorth'		            => $accountNetWorth,
            );
            echo view('Wallets\index\investment_wallets\Wallet_Listing', $walletData);
        }
    }
    $btnID				                            = 'addInvestAccount';
    $elementTitle		                            = 'Add Investment Account';
    $elementText		                            = 'Connect your Investment Account to include to your Financial Investments.';
    $purchaseWalletData					            = array(
        'btnID'							            => $btnID,
        'elementTitle'					            => $elementTitle,
        'elementText'					            => $elementText,
    );
    echo view('Wallets\index\Purchase_Wallet', $purchaseWalletData);
?>
</div>
