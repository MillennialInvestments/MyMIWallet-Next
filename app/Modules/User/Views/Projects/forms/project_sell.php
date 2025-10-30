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
);
// print_r($fieldData); 
?>
<?php if ($uri->getSegment(1) === 'Dashboard') : ?>
    <div class="modal-header">
        <h3 class="modal-title" id="sellProjectModalLabel">Sell Your Investment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" id="sell_project_form" method="POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div id="form-errors" class="alert alert-danger d-none"></div>

            <!-- Sale Details Section -->
            <div class="nk-block">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Sell Details</h4>
                            <p class="sub-text">Specify the details of your investment sale.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <fieldset>
                    <?php echo view('UserModule\Views\Projects\forms\fields\sell_fields', $fieldData); ?>
                </fieldset>
                <fieldset>
                    <div class="pricing-action mt-0">
                        <input class="btn btn-primary btn-sm" type="submit" name="sell_project" id="sellProjectSubmit" value="Submit Sale" />
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
    </div>
<?php else : ?>
    <div class="nk-block">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Sell Your Investment</h3>
                    <div class="nk-block-des text-soft">
                        <p>Provide the details of your investment sale and ensure compliance with our guidelines.</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu">
                            <em class="icon ni ni-more-v"></em>
                        </a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <a href="<?= site_url('Projects/List'); ?>" class="btn btn-white btn-dim btn-outline-primary">
                                        <em class="icon ni ni-arrow-left"></em><span>Back to Projects</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $userAgent->getReferrer(); ?>" class="btn btn-danger btn-dim btn-outline-primary">
                                        <em class="icon ni ni-cross"></em><span>Cancel</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="nk-content-body">
            <div class="row">
                <!-- Sale Details Section -->
                <div class="col-lg-6 border-right pr-3">
                    <div class="nk-block nk-block-lg">
                        <div class="card px-2 pb-4">
                            <div class="card-head">
                                <div class="card-title">
                                    <h4 class="title">Sale Details</h4>
                                    <p class="sub-text">Provide details about the investment sale.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" id="sell_project_form" method="POST">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div id="form-errors" class="alert alert-danger d-none"></div>
                                    <fieldset>
                                        <?php echo view('UserModule\Views\Projects\forms\fields\sell_fields', $subViewData); ?>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Submit Sale">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guidelines Section -->
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="nk-block nk-block-lg">
                        <div class="card px-2 pb-4 mt-4">
                            <div class="card-head">
                                <div class="card-title">
                                    <h4 class="title">Sale Guidelines</h4>
                                    <p class="sub-text">Ensure your sale aligns with these requirements:</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Accurate Information:</strong> Provide accurate details about the investment being sold.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Ownership Verification:</strong> Ensure you have ownership of the investment being sold.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Pricing:</strong> Set a realistic and competitive price for the sale.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Compliance:</strong> Adhere to any regulatory requirements for selling investments.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Documentation:</strong> Prepare any necessary documents required for the sale.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Approval:</strong> The sale may be subject to approval by MyMI Wallet administrators.
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
    $(document).ready(function () {
        $('#sell_project_form').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: '<?= site_url('User/Projects/SubmitSell'); ?>', // SubmitSell controller method
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status === 'success') {
                        alert('Sell request submitted successfully!');
                        location.reload(); // Reload the page or refresh data
                    } else {
                        alert(response.message || 'An error occurred. Please try again.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('An unexpected error occurred. Please try again later.');
                }
            });
        });
    });
</script>
