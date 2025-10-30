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
                            <form class="form-horizontal" id="addTradeAlertForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <fieldset>
                                    <?php echo view('ManagementModule\Views\Alerts\add\user_fields', $fieldData); ?>
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
                    <div class="card pricing px-2 pb-4">
                    <!-- <div class="card card-bordered pricing px-2 pb-4"> -->
                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">Copy -OR- Quick-Add</h4>
                                <p class="sub-text">Choose from an existing Budget Account!</p>
                            </div>
                        </div>
                        <div class="pricing-body text-center">                                
                            <h5>{ENTER QUICK-ADD BUTTONS HERE}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('addTradeAlertForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    const form = new FormData(event.target);
    const formObject = Object.fromEntries(form.entries());
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch('/Management/Alerts/addTradeAlert', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "<?= csrf_hash(); ?>"
            },
            body: form
        });
        
        const result = await response.json();
        
        if (response.ok) {
            alert('Trade alert added successfully!');
            event.target.reset(); // Clear the form
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('Error: ' + error.message);
    }
});
</script>
