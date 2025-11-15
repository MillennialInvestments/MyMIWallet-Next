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
<?php if ($pageURIA === 'Dashboard') : ?>
    <div class="modal-header">
    <h3 class="modal-title" id="addProjectModalLabel">Add New Project</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="add_new_project_form" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div id="form-errors" class="alert alert-danger d-none"></div>

        <!-- Project Information Section -->
        <div class="nk-block">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Project Information</h4>
                        <p class="sub-text">Please fill out the project details below!</p>
                    </div>
                </div>
            </div>
            <hr>
            <fieldset>
                <?php echo view('UserModule\Views\Projects\Add\user_fields_test', $fieldData); ?>
            </fieldset>
            <fieldset>
                <div class="pricing-action mt-0">
                    <input class="btn btn-primary btn-sm" type="submit" name="add_project" id="addProjectSubmit" value="Submit" />
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
                <h3 class="nk-block-title page-title">Add New MyMI Project</h3>
                <div class="nk-block-des text-soft">
                    <p>Submit a project for review and approval by the MyMI Management Team.</p>
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
                                <a href="<?= $userAgent->getReferrer(); ?>" class="btn btn-danger btn-dim btn-outline-primary text-white">
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
            <!-- Project Details Section -->
            <div class="col-lg-6 border-right pr-3">
                <div class="nk-block nk-block-lg">
                    <div class="card px-2 pb-4">
                        <div class="card-head">
                            <div class="card-title">
                                <h4 class="title">Project Information</h4>
                                <p class="sub-text">Provide details about your project.</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" id="add_new_project_form" method="POST">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <div id="form-errors" class="alert alert-danger d-none"></div>
                                <fieldset>
                                    <?php echo view('UserModule\Views\Projects\Add\user_fields', $subViewData); ?>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="Submit Project">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approval Guidelines Section -->
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="nk-block nk-block-lg">
                    <div class="card px-2 pb-4 mt-4">
                        <div class="card-head">
                            <div class="card-title">
                                <h4 class="title">Approval Requirements</h4>
                                <p class="sub-text">Ensure your project meets the following criteria:</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Clear Objective:</strong> The project must have a well-defined goal and purpose.
                                </li>
                                <li class="list-group-item">
                                    <strong>Feasibility:</strong> The project should demonstrate realistic financial and operational feasibility.
                                </li>
                                <li class="list-group-item">
                                    <strong>Financial Plan:</strong> Provide detailed financial projections and use of funds.
                                </li>
                                <li class="list-group-item">
                                    <strong>Target Audience:</strong> Clearly define the target investors and expected returns.
                                </li>
                                <li class="list-group-item">
                                    <strong>Compliance:</strong> Ensure the project complies with local regulations and MyMI Wallet standards.
                                </li>
                                <li class="list-group-item">
                                    <strong>Supporting Documents:</strong> Include any relevant documentation, such as business plans or market analyses.
                                </li>
                                <li class="list-group-item">
                                    <strong>Innovative Value:</strong> Highlight what makes this project unique and beneficial for the MyMI community.
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
        $('#add_new_project_form').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: '<?= site_url('Projects/Add'); ?>', // Controller method to handle the form submission
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status === 'success') {
                        // Close the modal if the submission is successful
                        $('#addProjectModalLabel').closest('.modal').modal('hide');
                        // Optionally, refresh the project list or show a success message
                        alert('Project submitted successfully!');
                        location.reload(); // Refresh the dashboard/project list
                    } else {
                        // Show validation or server errors
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
