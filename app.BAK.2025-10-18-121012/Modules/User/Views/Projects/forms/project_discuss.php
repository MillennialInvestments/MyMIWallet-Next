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
        <h3 class="modal-title" id="discussProjectModalLabel">Join the Discussion</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" id="discuss_project_form" method="POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div id="form-errors" class="alert alert-danger d-none"></div>

            <!-- Discussion Section -->
            <div class="nk-block">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Join the Conversation</h4>
                            <p class="sub-text">Share your thoughts or ask questions about this project.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <fieldset>
                    <?php echo view('Projects\forms\fields\discuss_fields', $fieldData); ?>
                </fieldset>
                <fieldset>
                    <div class="pricing-action mt-0">
                        <input class="btn btn-primary btn-sm" type="submit" name="submit_comment" id="discussProjectSubmit" value="Submit Comment" />
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
                    <h3 class="nk-block-title page-title">Join the Discussion</h3>
                    <div class="nk-block-des text-soft">
                        <p>Engage with the community and provide feedback or questions about this project.</p>
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
                <!-- Discussion Section -->
                <div class="col-lg-6 border-right pr-3">
                    <div class="nk-block nk-block-lg">
                        <div class="card px-2 pb-4">
                            <div class="card-head">
                                <div class="card-title">
                                    <h4 class="title">Discussion</h4>
                                    <p class="sub-text">Share your feedback, ask questions, or provide insights on this project.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" id="discuss_project_form" method="POST">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div id="form-errors" class="alert alert-danger d-none"></div>
                                    <fieldset>
                                        <?php echo view('Projects\forms\fields\discuss_fields', $subViewData); ?>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Submit Comment">
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
                                    <h4 class="title">Discussion Guidelines</h4>
                                    <p class="sub-text">Ensure your comments are constructive and follow our guidelines:</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Respect:</strong> Be respectful and courteous to other participants.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Relevance:</strong> Ensure your comments are relevant to the project.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Clarity:</strong> Provide clear and concise feedback or questions.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>No Spam:</strong> Avoid posting unrelated links or promotions.
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Constructive Feedback:</strong> Offer suggestions that are actionable and helpful.
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
        $('#discuss_project_form').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: '<?= site_url('User/Projects/AddComment'); ?>', // AddComment controller method
                method: 'POST',
                data: formData,
                success: function (response) {
                    if (response.status === 'success') {
                        alert('Comment added successfully!');
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
