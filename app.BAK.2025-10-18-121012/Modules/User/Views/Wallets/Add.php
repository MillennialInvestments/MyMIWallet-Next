<?php
use CodeIgniter\HTTP\URI;
use Config\Services;
$log = Services::logger();
$errorClass                 = empty($errorClass) ? ' error' : $errorClass;
$controlClass               = empty($controlClass) ? 'span6' : $controlClass;
$beta                       = $siteSettings->beta;
$trans_fee                  = $siteSettings->transFee;
$trans_percent              = $siteSettings->transPercent;
$user_gas_fee               = $siteSettings->gasFee;
$log->info('Current URL: ' . current_url());
$addModalTitle              = '';
if ($uri->getSegment(1) === 'Dashboard') {
    $formMode               = $uri->getSegment(3);
    // log_message('info', 'Wallets/Add L13: $formMode: ' . $formMode);
    $accountType            = $uri->getSegment(4);
} else {
$formMode                   = $uri->getSegment(2);
// log_message('info', 'Wallets/Add L13: $formMode: ' . $formMode);
$accountType                = $uri->getSegment(3);
}

// $this->mymilogger // !! FIX THIS
//      ->user($cuID) //Set UserID, who created this  Action
//      ->beta($beta) //Set whether in Beta or nto
//      ->type('Wallets') //Entry type like, Post, Page, Entry
//      ->controller($this->router->fetch_class())
//      ->method($this->router->fetch_method())
//      ->url($this->uri->uri_string())
//      ->full_url(current_url())
//      ->comment('Add') //Token identify Action
//      ->log(); //Add Database Entry
log_message('info', 'Wallets/Add L33: $accountType: ' . $accountType);
if ($accountType === 'addBankAccount') {
    $addModalTitle          = 'Connect Bank Account';
    $pageView               = 'UserModule\Views\Wallets\Add_Account\banking_fields';
    log_message('info', 'Wallets/Add L33: $pageView: ' . $pageView);
    // log_message('info', 'Wallets/Add L28: $pageView: ' . $pageView);
    $redirectURL            = site_url('/Wallets');
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'formMode'          => $formMode,
        'siteSettings'      => $siteSettings,
        'purchaseType'	    => 'Free',
        'redirectURL'       => $redirectURL,
        'walletType'        => 'Bank',
        'cuID'              => $cuID,
        'cuEmail'           => $cuEmail,
        'cuUsername'        => $cuUsername,
        'walletID'          => $walletID,
        'beta'              => $beta,
    );
    log_message('info', 'Wallets/Add L33: $pageView: ' . (print_r($fieldData, true)));
    // log_message('info', 'Wallets/Add L40: $fieldData: ' . print_r($fieldData, true));
} elseif ($accountType === 'addCreditAccount') {
    // log_message('info', 'Wallets/Add L48: $accountType: ' . $accountType);
    $addModalTitle          = 'Connect Credit Account';
    $pageView               = 'UserModule\Views\Wallets\Add_Account\credit_fields';
    // log_message('info', 'Wallets/Add L51: $pageView: ' . $pageView);
    $redirectURL            = site_url('/Wallets');
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'formMode'          => $formMode,
        'siteSettings'      => $siteSettings,
        'purchaseType'	    => 'Free',
        'redirectURL'       => $redirectURL,
        'walletType'        => 'Credit',
        'cuID'              => $cuID,
        'cuEmail'           => $cuEmail,
        'walletID'          => $walletID,
        'beta'              => $beta,
    );
    // log_message('info', 'Wallets/Add L40: $fieldData: ' . print_r($fieldData, true));
} elseif ($accountType === 'addDebtAccount') {
    // log_message('info', 'Wallets/Add L48: $accountType: ' . $accountType);
    $addModalTitle          = 'Connect Debt Account';
    $pageView               = 'UserModule\Views\Wallets\Add_Account\debt_fields';
    // log_message('info', 'Wallets/Add L51: $pageView: ' . $pageView);
    $redirectURL            = site_url('/Wallets');
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'formMode'          => $formMode,
        'siteSettings'      => $siteSettings,
        'purchaseType'	    => 'Free',
        'redirectURL'       => $redirectURL,
        'walletType'        => 'Debt',
        'cuID'              => $cuID,
        'cuEmail'           => $cuEmail,
        'walletID'          => $walletID,
        'beta'              => $beta,
    );
    // log_message('info', 'Wallets/Add L40: $fieldData: ' . print_r($fieldData, true));
} elseif ($accountType === 'addCryptoAccount') {
    // log_message('info', 'Wallets/Add L48: $accountType: ' . $accountType);
    $addModalTitle          = 'Connect Crypto Account';
    $pageView               = 'UserModule\Views\Wallets\Add_Account\crypto_fields';
    // log_message('info', 'Wallets/Add L51: $pageView: ' . $pageView);
    $redirectURL            = site_url('/Wallets');
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'formMode'          => $formMode,
        'siteSettings'      => $siteSettings,
        'purchaseType'	    => 'Free',
        'redirectURL'       => $redirectURL,
        'walletType'        => 'Crypto',
        'cuID'              => $cuID,
        'cuEmail'           => $cuEmail,
        'walletID'          => $walletID,
        'beta'              => $beta,
    );
    // log_message('info', 'Wallets/Add L40: $fieldData: ' . print_r($fieldData, true));
} elseif ($accountType === 'addInvestAccount') {
    // log_message('info', 'Wallets/Add L48: $accountType: ' . $accountType);
    $addModalTitle          = 'Connect Investment Account';
    $pageView               = 'UserModule\Views\Wallets\Add_Account\investment_fields';
    // log_message('info', 'Wallets/Add L51: $pageView: ' . $pageView);
    $redirectURL            = site_url('/Wallets');
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'formMode'          => $formMode,
        'siteSettings'      => $siteSettings,
        'purchaseType'	    => 'Free',
        'redirectURL'       => $redirectURL,
        'walletType'        => 'Investment',
        'cuID'              => $cuID,
        'cuEmail'           => $cuEmail,
        'walletID'          => $walletID,
        'beta'              => $beta,
    );
    // log_message('info', 'Wallets/Add L40: $fieldData: ' . print_r($fieldData, true));
} elseif ($accountType === 'Add-Wallet') {
    $purchaseType           = $uri->getSegment(2);
    $walletType             = $uri->getSegment(3);
    $addModalTitle          = 'Add New ' . $walletType . ' Wallet';
    $pageView               = 'User/Wallets/Add/user_fields';
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'purchaseType'	    => $purchaseType,
        'walletType'	    => $walletType,
        'beta'              => $beta,
    );
} else {
    log_message('info', 'Wallets/Add L31: $accountType: ' . $accountType);
    $purchaseType           = $uri->getSegment(2);
    $walletType             = $uri->getSegment(3);
    $addModalTitle          = 'Add New ' . $walletType . ' Wallet';
    $pageView               = 'User/Wallets/Add/user_fields';
    $fieldData = array(
        'errorClass'        => $errorClass,
        'controlClass'      => $controlClass,
        'purchaseType'	    => $purchaseType,
        'walletType'	    => $walletType,
        'beta'              => $beta,
        'user_trans_fee'    => $trans_fee,
        'trans_percent'     => $trans_percent,
        'user_gas_fee'      => $user_gas_fee,
    );
}
?>
<div class="modal-header">
	<h3 class="modal-title" id="useCoinModalLabel"><?= $addModalTitle; ?></h3>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div> 
<div class="modal-body">
    <form class="form-horizontal" id="add_user_wallet" action="<?= site_url('Wallets/Add'); ?>" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

		<fieldset>
			<?php echo view($pageView, $fieldData); ?>
		</fieldset>
	<?php echo form_close(); ?>	
	<?php if (validation_errors()) : ?>
	<div class="alert alert-error fade in">
		<?php echo validation_errors(); ?>
	</div>
	<?php endif; ?>
</div>
<!-- <script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const addWalletForm = document.querySelector("#add_user_wallet");
    if (addWalletForm) {
        addWalletForm.addEventListener("submit", async (e) => {
            e.preventDefault(); // Prevent default form submission
            const formData = new FormData(addWalletForm);
            const addWalletSubmit = {};

            formData.forEach((value, key) => {
                addWalletSubmit[key] = value;
            });

            console.log("Form data to be sent:", JSON.stringify(addWalletSubmit));

            try {
                const response = await fetch("<?= site_url('Wallets/accountManager'); ?>", {
                    method: "POST",
                    body: JSON.stringify(addWalletSubmit),
                    headers: { "Content-Type": "application/json" },
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log("Response data:", data);
                
                // Assuming "data" contains the URL for redirection
                // Adjust this line based on the actual structure of "data"
                window.location.href = "<?= site_url('/Wallets'); ?>";
            } catch (error) {
                console.error("Fetch error:", error);
            }
        });
    }
});
</script> -->



