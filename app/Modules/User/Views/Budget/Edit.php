<?php
// print_r($_SESSION['allSessionData']); 
$referrer = $userAgent->getReferrer() ?? session()->getFlashdata('return_to');;
$defaultRedirect = site_url('/Budget');

$basePath = parse_url(base_url(), PHP_URL_PATH) ?? '';
$refPath = '';
$relativePath = '';
$redirectURL = $defaultRedirect;

// Disallowed paths (modals, loading screens, etc.)
$disallowedPrefixes = [
    '/Dashboard/Transaction-Modal',
    '/Dashboard/LoadingScreen'
];

function isDisallowed($urlPath, $prefixes) {
    foreach ($prefixes as $prefix) {
        if (str_starts_with($urlPath, $prefix)) {
            return true;
        }
    }
    return false;
}

if (!empty($referrer)) {
    $parsedReferrer = parse_url($referrer);
    $refPath = $parsedReferrer['path'] ?? '';
    $relativePath = str_replace($basePath, '', $refPath);

    if (!isDisallowed($relativePath, $disallowedPrefixes)) {
        $redirectURL = $referrer;
    }
}

// Always log the variables for debugging, even if empty
log_message('debug', 'Budget/Views/edit: Referrer: ' . $referrer);
log_message('debug', 'Budget/Views/edit: Base path: ' . $basePath);
log_message('debug', 'Budget/Views/edit: Relative path: ' . $relativePath);
log_message('debug', 'Budget/Views/edit: Final Redirect URL: ' . $redirectURL);

$errorClass                             = empty($errorClass) ? ' error' : $errorClass;
$controlClass                           = empty($controlClass) ? 'span6' : $controlClass;
$beta                                   = $siteSettings->beta;
$uriSegmentA                            = $uri->getSegment(1); 
$uriSegmentB                            = $uri->getSegment(2); 
$uriSegmentC                            = $uri->getSegment(3); 
$uriSegmentD                            = $uri->getSegment(4); 
if ($uriSegmentB === 'Recurring-Account') {
    $accountID                          = $uriSegmentD;
    $configMode                         = $uriSegmentC; 
    $copyButtonURL                      = site_url('/Budget/Copy/' . $accountID);
    $copyButtonText                     = 'Copy';
    $copyButtonIcon                     = 'icon ni ni-copy';
} elseif ($uriSegmentB === 'Copy') {
    $accountID                          = $uriSegmentC;
    $configMode                         = $uriSegmentB;
    $copyButtonURL                      = site_url('/Budget/Copy/' . $accountID);
    $copyButtonText                     = 'Copy';
    $copyButtonIcon                     = 'icon ni ni-copy';
} elseif ($uriSegmentB === 'Edit') { 
    $accountID                          = $uriSegmentC; 
    $configMode                         = $uriSegmentB;
    $copyButtonURL                      = site_url('/Budget/Edit/' . $accountID);
    $copyButtonText                     = 'Edit';
    $copyButtonIcon                     = 'icon ni ni-pen';
}
if ($this->debug = 1) {
log_message('info', 'View File - $getAccountInfo: ' . print_r($getAccountInfo, true));
}
if(!empty($getAccountInfo)) {
    $userID                         = $getAccountInfo['accountCreator']; 
    $userEmail                      = $getAccountInfo['accountCreatorEmail']; 
    $accountPaidStatus              = $getAccountInfo['accountPaidStatus'];
    $accountMonth                   = $getAccountInfo['accountMonth']; 
    $accountDay                     = $getAccountInfo['accountDay']; 
    $accountYear                    = $getAccountInfo['accountYear']; 
    $accountTime                    = $getAccountInfo['accountTime'];
    $accountName                    = $getAccountInfo['accountName']; 
    $accountNetAmount               = $getAccountInfo['accountNetAmount']; 
    $accountGrossAmount             = $getAccountInfo['accountGrossAmount']; 
    $accountSummary                 = $getAccountInfo['accountSummary'];
    $accountRecurringAccount        = $getAccountInfo['accountRecurring']; 
    $accountRecurringPrimary        = $getAccountInfo['accountRecurringPrimary']; 
    $accountType                    = $getAccountInfo['accountType']; 
    $accountSourceType              = $getAccountInfo['accountSource']; 
    $accountIsDebt                  = $getAccountInfo['accountIsDebt']; 
    $accountIsCCPayment             = $getAccountInfo['accountIsCCPay']; 
    $accountWeeksLeft               = $getAccountInfo['accountWeeksLeft']; 
    // echo $accountIsDebt;
    if ($accountIsDebt === 1) {
        $accountIsDebtText              = 'Yes';
    } elseif ($accountIsDebt === 0) {
        $accountIsDebtText              = 'No'; 
    } else {
        $accountIsDebtText              = 'No';
    }
    // echo $accountIsDebtText;  
    $accountIntervals                   = $getAccountInfo['accountIntervals']; 
    $accountDesignatedDate              = $getAccountInfo['accountDesDate'];   
}
$accountTypeAltText                         = $accountType;
$accountTypeAltURl                          = site_url('/Budget/Add/' . $accountType);

// Fetch related records based on name or source_type
$relatedRecords = array_filter($userBudget['userBudgetRecords'], function ($record) use ($accountName, $accountSourceType) {
    return $record['name'] === $accountName || $record['source_type'] === $accountSourceType;
});

// $this->mymilogger
//      ->user($cuID) //Set UserID, who created this  Action
//      ->beta($beta) //Set whether in Beta or nto
//      ->type('Budget - ' . $configMode) //Entry type like, Post, Page, Entry
//      ->controller($this->router->fetch_class())
//      ->method($this->router->fetch_method())
//      ->url($this->uri->uri_string())
//      ->full_url(current_url())
//      ->comment($accountType) //Token identify Action
//      ->log(); //Add Database Entry
$fieldData = array(
    'errorClass'                        => $errorClass,
    'controlClass'                      => $controlClass,
    'configMode'	                    => $configMode,
    'redirectURL'                       => $redirectURL,
    'cuID'                              => $cuID,
    'cuEmail'                           => $cuEmail,
    'cuUsername'                        => $cuUsername,
    'cuUserType'                        => $cuUserType,
    'accountID'                         => $accountID,
    'accountPaidStatus'                 => $accountPaidStatus,
    'accountMonth'                      => $accountMonth,
    'accountDay'                        => $accountDay,
    'accountYear'                       => $accountYear,
    'accountTime'                       => $accountTime,
    'accountName'                       => $accountName,
    'accountNetAmount'                  => $accountNetAmount,
    'accountGrossAmount'                => $accountGrossAmount,
    'accountRecurringAccount'           => $accountRecurringAccount,
    'accountRecurringPrimary'           => $accountRecurringPrimary,
    'accountType'                       => $accountType,
    'accountSourceType'                 => $accountSourceType,
    'accountIsDebt'                     => $accountIsDebt,
    'accountIsDebtText'                 => $accountIsDebtText,
    'accountIsCCPayment'                => $accountIsCCPayment,
    // 'accountIsCCPaymentText'            => $accountIsCCPaymentText,
    'accountIntervals'                  => $accountIntervals,
    'accountDesDate'                    => $accountDesignatedDate,
    'accountWeeksLeft'                  => $accountWeeksLeft,
    'accountType'	                    => $accountType,
);

$viewFileData                           = [
    'relatedRecords'                    => $relatedRecords,
];
$addModalTitle                          = $configMode . ' Your ' . $accountName . ' Account';
?>
<div class="nk-block">    
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"><?= $addModalTitle; ?></h3>
                <div class="nk-block-des text-soft">
                    <p><?= $formMode; ?> Your <?= $accountType; ?> Account</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="<?php echo $accountTypeAltURl; ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-plus"></em><span><?php echo $accountTypeAltText; ?></span></a></li>                             
                            <li><a href="<?php echo $copyButtonURL; ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="<?php echo $copyButtonIcon; ?>"></em><span><?php echo $copyButtonText; ?></span></a></li>
                            <li><a href="<?php echo site_url('/Budget'); ?>" class="btn btn-danger btn-dim btn-outline-primary"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="nk-content-body">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-12">
                <div class="nk-block nk-block-lg">   
                    <div class="card card-bordered pricing px-2">
                        <div class="pricing-body">                               
                            <form class="form-horizontal" id="edit_user_budgeting_account">
                                <fieldset>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <?php
                                    if ($uriSegmentB === 'Copy') { 
                                        echo view('Budget/Edit/user_fields', $fieldData);
                                    } else {
                                        echo view('UserModule\Views\Budget\\' . $configMode . '\user_fields', $fieldData);
                                    }
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <?php
                                    // Allow modules to render custom fields. No payload is passed
                                    // since the user has not been created, yet.
                                    // Events::trigger('render_user_form');
                                    ?>
                                    <!-- Start of User Meta -->
                                    <?php //$this->load->view('users/user_meta', array('frontend_only' => true);?>
                                    <!-- End of User Meta -->
                                </fieldset>
                                <fieldset>
                                    <div class="pricing-action mt-0">
                                        <p class="sub-text"></p>
                                        <input class="btn btn-primary btn-dim btn-outline-primary text-white mr-2" type="submit" name="register" id="addAccountSubmit" value="Submit" />
                                        <a href="<?php echo site_url('/Budget'); ?>" class="btn btn-danger btn-dim btn-outline-primary"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
                                    </div>
                                </fieldset>
                            <?php echo form_close(); ?>	
                            <?php if (validation_errors()) : ?>
                            <div class="alert alert-error fade in">
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6 col-12">
                <?php //echo view('Knowledgebase/Tutorials/Categories/Budget/Add'); ?>
                <?php echo view('Budget/Edit/related_records', $viewFileData); ?>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>> 
let redirectURL = "<?= site_url('/Budget'); ?>";
if (document.referrer && !isDisallowed(document.referrer)) {
    redirectURL = document.referrer;
}

console.log("Redirect URL: " + redirectURL);
function showDiv(select){
    if(select.value=="Yes"){
        document.getElementById('recurring_fields').style.display = "block";
        // const redirectURL                   = <?php //echo '\'' . site_url('/Budget/Recurring-Account/Schedule') . '\'';?>;
    } else if (select.value=="No"){
        document.getElementById('recurring_fields').style.display = "none";
        // const redirectURL                   = <?php //echo '\'' . site_url('/Budget') . '\'';?>;
    }
    // Temporary URL Redirect while waiting Recurring Schedule Override Feature - 11012022
    // const redirectURL                       = <?php //echo '\'' . site_url('/Budget') . '\'';?>;
} 
// Determine redirect URL client-side
function isDisallowed(referrer) {
    const disallowedPrefixes = [
        '/Dashboard/Transaction-Modal',
        '/Dashboard/LoadingScreen'
    ];
    try {
        const refPath = new URL(referrer).pathname;
        return disallowedPrefixes.some(prefix => refPath.startsWith(prefix));
    } catch (e) {
        return true;
    }
}
const csrfTokenName                         = '<?php echo csrf_token(); ?>';
const csrfTokenValue                        = '<?php echo csrf_hash(); ?>';
const addAccountForm		                = document.querySelector("#edit_user_budgeting_account");
const addAccountSubmit	                    = {};
if (addAccountForm) { 
    addAccountForm.addEventListener("submit", async (e) => {
        //Do no refresh
        e.preventDefault();
		const formData 		= new FormData(); 
        //Get Form data in object OR
		addAccountForm.querySelectorAll("input").forEach((inputField) => {
            formData.append(inputField.name,inputField.value);
            addAccountSubmit[inputField.name] = inputField.value;
        });  
        addAccountForm.querySelectorAll("select").forEach((inputField) => {
            formData.append(inputField.name,inputField.value);
            addAccountSubmit[inputField.name] = inputField.value;
        });  
        // Add CSRF token to the request
        formData[csrfTokenName] = csrfTokenValue;
        // console.log(redirectURL);
        // console.log(...formData);
        //Fetch
        try {
            const result = await fetch("<?php echo site_url('Budget/Account-Manager'); ?>", {
			
			method: "POST",
			body: JSON.stringify(addAccountSubmit),
            headers: { "Content-Type": "application/json" },
			credentials: "same-origin",
			redirect: "manual",
            });
            const data                          = await result;
            const accountID                     = document.getElementById('account_id').value;
            const formMode                      = document.getElementById('form_mode').value;
            const recurringAccountPrimary       = <?php echo '"' . $accountRecurringPrimary . '"'; ?>;
            console.log(recurringAccountPrimary);
            location.href = redirectURL;
            // location.href = <?php // echo '\'' . site_url('/Budget') . '\'';?>;
            console.log(data);
        } catch (err) {
            //If fetch doesn't work, maker 
            console.log(err);
        }
    });
}
</script> 
