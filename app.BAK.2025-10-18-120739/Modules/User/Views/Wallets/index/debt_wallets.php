<div class="nk-block nk-block-lg">
	<div class="nk-block-head-sm">
		<div class="nk-block-head-content">
            <h5 class="nk-block-title title">Debt Accounts - <?php echo $debtSummaryFMT; ?></h5>
            <a href="<?php echo site_url('/Wallets/Debt'); ?>"><small>View All</small></a>
        </div>
	</div>
</div>
<div class="row">
<?php
    // $this->load->model('User/Wallet_model');   
    if (!empty($getUserDebtAccounts)) {
        foreach ($getUserDebtAccounts as $accountInfo) {
            $btnID                                  = 'editDebtAccount';
            $accountID							    = $accountInfo['id'];
            $accountWalletID					    = $accountInfo['wallet_id'];
            $accountType                            = $accountInfo['account_type']; 
            $accountBankName					    = $accountInfo['debtor'];
            $accountName					        = $accountInfo['nickname'];
            $accountAccountNumber                   = $accountInfo['account_number'];
            $accountBalance                         = $accountInfo['current_balance']; 
            
            $walletData							    = array(
                'btnID'                             => $btnID,
                'accountID'						    => $accountID,
                'accountWalletID'				    => $accountWalletID,
                'accountType'				        => $accountType,
                'accountBankName'				    => $accountBankName,
                'accountName'				        => $accountName,
                'accountAccountNumber'		        => $accountAccountNumber,
                'accountBalance'		            => $accountBalance,
            );
            echo view('Wallets\index\debt_wallets\Wallet_Listing', $walletData);
        }
    }
    $btnID				                            = 'addDebtAccount';
    $btnEndpoint		                            = 'Wallets/Add/Debt';
    $elementTitle		                            = 'Add Debt Account';
    $elementText		                            = 'Create an account for your Debt to include to your Financial Forecasting.';
    $purchaseWalletData					            = array(
        'btnID'							            => $btnID,
        'btnEndpoint'							    => $btnEndpoint,
        'elementTitle'					            => $elementTitle,
        'elementText'					            => $elementText,
    );
    echo view('Wallets\index\Purchase_Wallet', $purchaseWalletData);
?>
</div>
