<!-- app/Modules/User/Views/Budget/Add.php -->
<?php
// print_r($_SESSION['allSessionData']); 
$redirectURL                            = $userAgent->getReferrer(); 
$errorClass                             = empty($errorClass) ? ' error' : $errorClass;
$controlClass                           = empty($controlClass) ? 'span6' : $controlClass;
$pageURIA                               = $uri->getSegment(1);
$beta                                   = $siteSettings->beta;
if ($pageURIA === 'Dashboard') {
    $configMode                             = $uri->getSegment(4);
    $accountType                            = $uri->getSegment(6);
    if ($accountType === 'Income') {
        $accountTypeAltText                 = 'Switch to Expense';
        $accountTypeAltURl                  = site_url('/Budget/Add/Expense');
    } elseif ($accountType === 'Expense') {
        $accountTypeAltText                 = 'Switch to Income';
        $accountTypeAltURl                  =  site_url('/Budget/Add/Income');
    } else {
        $accountTypeAltText                 = 'Switch to Expense';
        $accountTypeAltURl                  = site_url('/Budget/Add/Expense');
    }
    $addModalTitle                          = $configMode . ' ' . $accountType . ' Account';
    log_message('debug', 'Budget\Add - L12: MADE IT HERE!');
} else {
    $accountType                            = $uri->getSegment(3);
    if ($accountType === 'Income') {
        $accountTypeAltText                 = 'Switch to Expense';
        $accountTypeAltURl                  = site_url('/Budget/Add/Expense');
    } elseif ($accountType === 'Expense') {
        $accountTypeAltText                 = 'Switch to Income';
        $accountTypeAltURl                  =  site_url('/Budget/Add/Income');
    } else {
        $accountTypeAltText                 = 'Switch to Expense';
        $accountTypeAltURl                  = site_url('/Budget/Add/Expense');
    }
    $configMode                             = $uri->getSegment(2);
    $addModalTitle                          = $configMode . ' ' . $accountType . ' Account';
}
// !! - REACTIVATE MyMILogger HERE!!! !! //
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
    'redirectURL'                       => $redirectURL,
    'configMode'	                    => $configMode,
    'siteSettings'                      => $siteSettings,
    'uri'                               => $uri,
    'cuID'                              => $cuID,
    'cuEmail'                           => $cuEmail,
    'cuUsername'                        => $cuUsername,
    'cuUserType'                        => $cuUserType,
    'accountPaidStatus'                 => '',
    'accountMonth'                      => '',
    'accountDay'                        => '',
    'accountYear'                       => '',
    'accountTime'                       => '',
    'accountName'                       => '',
    'accountNetAmount'                  => '',
    'accountGrossAmount'                => '',
    'accountRecurringAccount'           => '',
    'accountType'                       => $accountType,
    'accountSourceType'                 => '',
    'accountIntervals'                  => '',
    'accountDesignatedDate'             => '',
    'accountWeeksLeft'                  => '',
);
// print_r($fieldData); 
?>
<?php if ($pageURIA === 'Dashboard') : ?>
    <div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel"><?= $addModalTitle; ?></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="add_user_budgeting_account" action="<?= site_url('Wallets/Add'); ?>" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <!-- Account Information Section -->
        <div class="nk-block">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Account Information</h4>
                        <p class="sub-text">Please fill out the information below!</p>
                    </div>
                </div>
            </div>
            <hr>
            <fieldset>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <?php echo view('UserModule\Views\Budget\Add\user_fields', $fieldData); ?>
            </fieldset>
            <fieldset>
                <div class="pricing-action mt-0">
                    <input class="btn btn-primary btn-sm" type="submit" name="register" id="addAccountSubmit" value="Submit" />
                </div>
            </fieldset>
        </div>
        
        <!-- Validation Errors -->
        <?php if (validation_errors()) : ?>
        <div class="alert alert-error fade in">
            <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>
    </form>

    <!-- Budgeting Tips Section -->
    <div class="nk-block">
        <div class="card guidance px-2 pb-4 mt-4">
            <div class="guidance-head">
                <div class="guidance-title">
                    <h4 class="card-title title">Budgeting Tips & Examples</h4>
                    <p class="sub-text">Make the most of your budget records with these tips.</p>
                </div>
            </div>
            <div class="guidance-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Track Every Expense:</strong> Ensure you record every expense, no matter how small. This helps in understanding where your money goes.
                    </li>
                    <li class="list-group-item">
                        <strong>Set Realistic Goals:</strong> Define clear and achievable financial goals, such as saving for a vacation or paying off debt.
                    </li>
                    <li class="list-group-item">
                        <strong>Use Categories:</strong> Categorize your expenses (e.g., groceries, utilities, entertainment) to see where you can cut back.
                    </li>
                    <li class="list-group-item">
                        <strong>Review Regularly:</strong> Regularly review your budget to ensure you’re on track and make adjustments as needed.
                    </li>
                    <li class="list-group-item">
                        <strong>Emergency Fund:</strong> Always allocate a portion of your budget to an emergency fund for unexpected expenses.
                    </li>
                    <li class="list-group-item">
                        <strong>Recurring Expenses:</strong> Identify and plan for recurring expenses like monthly bills and subscriptions.
                    </li>
                    <li class="list-group-item">
                        <strong>Investment Allocation:</strong> Consider allocating part of your budget towards investments to grow your wealth over time.
                    </li>
                    <li class="list-group-item">
                        <strong>Example:</strong>
                        <p>For instance, if your monthly income is $3,000, you could allocate:</p>
                        <ul>
                            <li>$1,000 for rent/mortgage</li>
                            <li>$400 for groceries</li>
                            <li>$200 for utilities</li>
                            <li>$100 for transportation</li>
                            <li>$300 for savings and investments</li>
                            <li>$200 for entertainment</li>
                            <li>$800 for other expenses</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
<?php else : ?>
<div class="nk-block">    
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"><?= $addModalTitle; ?></h3>
                <div class="nk-block-des text-soft">
                    <p>Add Your <?= $accountType; ?> Account</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="<?php echo $accountTypeAltURl; ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-swap"></em><span><?php echo $accountTypeAltText; ?></span></a></li>
                            <li><a href="<?php echo $userAgent->getReferrer(); ?>" class="btn btn-danger btn-dim btn-outline-primary"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="nk-content-body">
        <div class="row">
            <div class="col-lg-6 border-right pr-3">
                <div class="nk-block nk-block-lg">   
                    <div class="card pricing px-2 pb-4">
                    <!-- <div class="card card-bordered pricing px-2 pb-4"> -->
                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">Account Information</h4>
                                <p class="sub-text">Please fill out information below!</p>
                            </div>
                        </div>
                        <div class="pricing-body">                                
                            <form class="form-horizontal" id="add_user_budgeting_account">
                                <fieldset>
                                    <?php echo view('UserModule\Views\Budget\Add\user_fields', $fieldData); ?>
                                </fieldset>
                                <fieldset>
                                    <?php
                                    // Allow modules to render custom fields. No payload is passed
                                    // since the user has not been created, yet.
                                    // Events::trigger('render_user_form');
                                    ?>
                                    <!-- Start of User Meta -->
                                    <?php //$this->load->view('users/user_meta', array('frontend_only' => true));?>
                                    <!-- End of User Meta -->
                                </fieldset>
                                <fieldset>
                                    <div class="pricing-action mt-0">
                                        <p class="sub-text"></p>
                                        <input class="btn btn-primary btn-sm" type="submit" name="register" id="addAccountSubmit" value="Submit" />
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
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="nk-block nk-block-lg">   
                    <div class="card guidance px-2 pb-4 mt-4">
                        <div class="guidance-head">
                            <div class="guidance-title">
                                <h4 class="card-title title">Budgeting Tips & Examples</h4>
                                <p class="sub-text">Make the most of your budget records with these tips.</p>
                            </div>
                        </div>
                        <div class="guidance-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Track Every Expense:</strong> Ensure you record every expense, no matter how small. This helps in understanding where your money goes.
                                </li>
                                <li class="list-group-item">
                                    <strong>Set Realistic Goals:</strong> Define clear and achievable financial goals, such as saving for a vacation or paying off debt.
                                </li>
                                <li class="list-group-item">
                                    <strong>Use Categories:</strong> Categorize your expenses (e.g., groceries, utilities, entertainment) to see where you can cut back.
                                </li>
                                <li class="list-group-item">
                                    <strong>Review Regularly:</strong> Regularly review your budget to ensure you’re on track and make adjustments as needed.
                                </li>
                                <li class="list-group-item">
                                    <strong>Emergency Fund:</strong> Always allocate a portion of your budget to an emergency fund for unexpected expenses.
                                </li>
                                <li class="list-group-item">
                                    <strong>Recurring Expenses:</strong> Identify and plan for recurring expenses like monthly bills and subscriptions.
                                </li>
                                <li class="list-group-item">
                                    <strong>Investment Allocation:</strong> Consider allocating part of your budget towards investments to grow your wealth over time.
                                </li>
                                <li class="list-group-item">
                                    <strong>Example:</strong> 
                                    <p>For instance, if your monthly income is $3,000, you could allocate:</p>
                                    <ul>
                                        <li>$1,000 for rent/mortgage</li>
                                        <li>$400 for groceries</li>
                                        <li>$200 for utilities</li>
                                        <li>$100 for transportation</li>
                                        <li>$300 for savings and investments</li>
                                        <li>$200 for entertainment</li>
                                        <li>$800 for other expenses</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div>
</div>
<?php endif; ?>
<script <?= $nonce['script'] ?? '' ?>>
    let redirectURL; // Declare redirectURL here so it's available throughout the script

    function showDiv(select) {
        if (select.value == "Yes") {
            document.getElementById('recurring_fields').style.display = "block";
            redirectURL = '<?php echo site_url('/Budget/Recurring-Account/Schedule'); ?>';
        } else if (select.value == "No") {
            document.getElementById('recurring_fields').style.display = "none";
            redirectURL = '<?php echo site_url('/Budget'); ?>';
        }
    }

    const addAccountForm = document.querySelector("#add_user_budgeting_account");
    const addAccountSubmit = {};

    if (addAccountForm) {
        addAccountForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData();
            const designatedDate = formData.get("accountDesignatedDate"); // Ensure this field is present
            const accountID = formData.get("accountID");

            addAccountForm.querySelectorAll("input").forEach((inputField) => {
                formData.append(inputField.name, inputField.value);
                addAccountSubmit[inputField.name] = inputField.value;
            });

            addAccountForm.querySelectorAll("select").forEach((inputField) => {
                formData.append(inputField.name, inputField.value);
                addAccountSubmit[inputField.name] = inputField.value;
            });

            // Get the value from the "recurring_account" select field
            const recurringAccountSelect = document.getElementById("recurring_account");
            const recurringAccount = recurringAccountSelect ? recurringAccountSelect.value : null;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(addAccountSubmit);
            console.log("recurringAccount: ", recurringAccount);

            try {
                const response = await fetch("<?php echo site_url('Budget/Account-Manager'); ?>", {
                    method: "POST",
                    body: JSON.stringify(addAccountSubmit),
                    headers: { 
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers 
                    },
                    credentials: "same-origin",
                    redirect: "manual",
                });

                if (response.ok) {
                    const responseData = await response.json();
                    const accountID = responseData.accountID;

                    if (recurringAccount === "Yes") {
                        location.href = `<?php echo site_url('/Budget/Recurring-Account/Schedule/'); ?>${accountID}`;
                    } else {
                        location.href = `<?php echo site_url('/Budget'); ?>`;
                    }
                } else {
                    console.error("Server responded with status: ", response.status);
                }
            } catch (err) {
                console.error(err);
            }
        });
    }
</script>

