<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$redirectURL = $this->agent->referrer();
$errorClass = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;
$configMode = $this->uri->segment(2);
$accountType = $this->uri->segment(3);
$beta = $siteSettings->beta;
$userAccount = $_SESSION['allSessionData']['userAccount'];
$cuID = $userAccount['cuID'];
$addModalTitle = $configMode . ' ' . $accountType . ' Account';

if ($accountType === 'Income') {
    $accountTypeAltText = 'Switch to Expense';
    $accountTypeAltURl = site_url('/Budget/Add/Expense');
} elseif ($accountType === 'Expense') {
    $accountTypeAltText = 'Switch to Income';
    $accountTypeAltURl = site_url('/Budget/Add/Income');
}

$this->mymilogger
     ->user($cuID) //Set UserID, who created this Action
     ->beta($beta) //Set whether in Beta or not
     ->type('Budget - ' . $configMode) //Entry type like Post, Page, Entry
     ->controller($this->router->fetch_class())
     ->method($this->router->fetch_method())
     ->url($this->uri->uri_string())
     ->full_url(current_url())
     ->comment($accountType) //Token identify Action
     ->log(); //Add Database Entry

$fieldData = array(
    'errorClass' => $errorClass,
    'controlClass' => $controlClass,
    'redirectURL' => $redirectURL,
    'configMode' => $configMode,
    'userID' => '',
    'userEmail' => '',
    'userName' => '',
    'accountPaidStatus' => '',
    'accountMonth' => '',
    'accountDay' => '',
    'accountYear' => '',
    'accountTime' => '',
    'accountName' => '',
    'accountNetAmount' => '',
    'accountGrossAmount' => '',
    'accountRecurringAccount' => '',
    'accountType' => $accountType,
    'accountSourceType' => '',
    'accountIntervals' => '',
    'accountDesignatedDate' => '',
    'accountWeeksLeft' => '',
);

?>
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
                            <li><a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-danger btn-dim btn-outline-primary"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="nk-content-body">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="nk-block nk-block-lg">   
                    <div class="card card-bordered pricing px-2 pb-4">
                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">Account Information</h4>
                                <p class="sub-text">Please fill out information below!</p>
                            </div>
                        </div>
                        <div class="pricing-body">                                
                            <form class="form-horizontal" id="add_user_budgeting_account">
                                <fieldset>
                                    <?php
                                    Template::block('User/Budget/Add/user_fields', 'User/Budget/Add/user_fields', $fieldData);
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <?php
                                    // Allow modules to render custom fields. No payload is passed
                                    // since the user has not been created, yet.
                                    Events::trigger('render_user_form');
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
            <div class="col-lg-8 col-sm-6 col-12">
                <?php echo view('UserModule/Knowledgebase/Tutorials\Categories\Budget\Add'); ?>
            </div>
        </div>        
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    function showDiv(select) {
        if (select.value == "Yes") {
            document.getElementById('recurring_fields').style.display = "block";
            // redirectURL = '<?php echo site_url('/Budget/Recurring-Account/Schedule'); ?>';
        } else if (select.value == "No") {
            document.getElementById('recurring_fields').style.display = "none";
            // redirectURL = '<?php echo site_url('/Budget'); ?>';
        }
    }
    const addAccountForm = document.querySelector("#add_user_budgeting_account");

    if (addAccountForm) {
        addAccountForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(addAccountForm);

            const recurringAccountSelect = document.getElementById("recurring_account");
            const recurringAccount = recurringAccountSelect ? recurringAccountSelect.value : null;
            console.log("recurringAccount: ", recurringAccount);

            try {
                const response = await fetch("<?php echo site_url('User/Budget/Account_Manager'); ?>", {
                    method: "POST",
                    body: JSON.stringify(Object.fromEntries(formData)),
                    headers: { "Content-Type": "application/json" },
                    credentials: "same-origin",
                    redirect: "manual",
                });

                if (response.ok) {
                    const responseData = await response.json();
                    console.log("Response Data:", responseData);
                    const accountID = responseData.accountID;

                    if (!accountID && recurringAccount === "Yes") {
                        console.error("No accountID received for a recurring account");
                        return;
                    }

                    let redirectURL;
                    if (recurringAccount === "Yes") {
                        // Define the redirectURL based on recurringAccount value
                        const redirectURL = recurringAccount === "Yes" ? "<?php echo site_url('/Budget/Recurring-Account/Schedule/'); ?>${accountID}" : "<?php echo site_url('/Budget/Recurring-Account/Schedule'); ?>";
                    } else {
                        // Redirect to a different URL for non-recurring accounts
                        redirectURL = '<?php echo site_url('/Budget'); ?>';
                    }

                    console.log("Redirecting to:", redirectURL);
                    location.href = redirectURL;
                } else {
                    console.error("Server responded with status: ", response.status);
                }
            } catch (err) {
                console.error("Error occurred:", err);
            }
        });
    }
</script>




