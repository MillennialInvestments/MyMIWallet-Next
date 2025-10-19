<?php
$errorClass                                 = empty($errorClass) ? ' error' : $errorClass;
$controlClass                               = empty($controlClass) ? 'span6' : $controlClass;
// $beta                                       = $siteSettings->beta;
// // $userAccount                                = $_SESSION['allSessionData']['userAccount'];
// // $cuID                                       = $userAccount['cuID'];
// // $cuEmail                                    = $userAccount['cuEmail'];
// // $cuUsername                                 = $userAccount['cuUsername'];
// // $cuUserType                                 = $userAccount['cuUserType'];
// $manActivate                                = $uri->segment(1);
// if ($manActivate === 'Management') {
//     $department                             = $uri->segment(2);
//     $configMode                             = $uri->segment(3);
//     $formMode                               = $uri->segment(4);
    // // $getManagementTeam                      = $this->management_model->get_team($department); 
    // // if (!empty($getManagementTeam)) {
    // //     $managementTeam                     = $getManagementTeam;
    // // } else {
    // //     $managementTeam                     = array(); 
    // // }
    // if (!empty($uri->segment(5))) {
    //     $accountID                          = $uri->segment(5);
    //     $addModalTitle                      = $formMode . ' ' . $configMode . ': #' . $accountID;
    // } else {
    //     $accountID                          = '';
    //     $addModalTitle                      = $formMode . ' Marketing ' . $configMode;
    // }
    // if ($formMode === 'Add') {
    //     if ($configMode === 'Blog') {
    //         $formTitle                      = 'Blog Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/blog_fields';
    //     } elseif ($configMode === 'Campaigns') {
    //         $formTitle                      = 'Campaign Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/campaign_fields';
    //     } elseif ($configMode === 'Email') {
    //         $formTitle                      = 'Email Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/email_fields';
    //     } elseif ($configMode === 'Notification') {
    //         $formTitle                      = 'Notification Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/notification_fields';
    //     } elseif ($configMode === 'Post') {
    //         $formTitle                      = 'Post Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/post_fields';
    //     } elseif ($configMode === 'Schedule') {
    //         $formTitle                      = 'Schedule Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/schedule_fields';
    //     } else {
    //         $formTitle                      = 'Provide ' . $department . ' Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/standard_fields';
    //     }
    //     $getAccountInfo                     = array(); 
    // } elseif ($formMode === 'Edit') {
    //     if ($configMode === 'Blog') {
    //         $formTitle                      = 'Campaign Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/blog_fields';
    //         $getAccountInfo                 = $this->marketing_model->get_blog_information($accountID);
    //     } elseif ($configMode === 'Campaigns') {
    //         $formTitle                      = 'Campaign Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/campaign_fields';
    //         $getAccountInfo                 = $this->marketing_model->get_campaign_information($accountID);
    //     } elseif ($configMode === 'Email') {
    //         $formTitle                      = 'Email Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/email_fields';
    //     } elseif ($configMode === 'Notification') {
    //         $formTitle                      = 'Notification Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/notification_fields';
    //     } elseif ($configMode === 'Post') {
    //         $formTitle                      = 'Post Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/post_fields';
    //     } else {
    //         $formTitle                      = 'Provide ' . $department . ' Information';
    //         $viewFileLink                   = 'Management/Marketing/Add/standard_fields';
    //     }
    // } else {
    //     $formTitle                          = 'Add ' . $department . ' Information';
    // }

// } else {
//     $department                         = '';
//     $managementTeam                     = '';
//     $configMode                         = '';
//     $formMode                           = '';
//     $formTitle                          = 'Add ' . $department . ' Information';
//     $accountID                          = ''; 
//     $addModalTitle                      = '';
//     $getAccountInfo                     = array(); 
// }
// $this->mymilogger
//      ->user($cuID) //Set UserID, who created this  Action
//      ->beta($beta) //Set whether in Beta or nto
//      ->type($department . ' | ' . $formMode . ' - ' . $configMode) //Entry type like, Post, Page, Entry
//      ->controller($this->router->fetch_class())
//      ->method($this->router->fetch_method())
//      ->url($this->uri->uri_string())
//      ->full_url(current_url())
//      ->comment($formMode . ' ' . $configMode . 'by User: ' . $cuID) //Token identify Action
//      ->log(); //Add Database Entry
// $fieldData = array(
//     'redirectURL'                       => $redirectURL,
//     'errorClass'                        => $errorClass,
//     'controlClass'                      => $controlClass,
//     'beta'                              => $beta,
//     'cuID'                              => $cuID,
//     'cuEmail'                           => $cuEmail,
//     'cuUsername'                        => $cuUsername,
//     'cuUserType'                        => $cuUserType,
//     'department'                        => $department,
//     'managementTeam'                    => $managementTeam,
//     'configMode'                        => $configMode,
//     'formMode'  	                    => $formMode,
//     'accountID'                         => $accountID,
//     'accountPaidStatus'                 => '',
//     'accountMonth'                      => '',
//     'accountDay'                        => '',
//     'accountYear'                       => '',
//     'accountTime'                       => '',
//     'accountName'                       => '',
//     'accountNetAmount'                  => '',
//     'accountGrossAmount'                => '',
//     'accountRecurringAccount'           => '',
//     'accountType'                       => $configMode,
//     'accountSourceType'                 => '',
//     'accountIntervals'                  => '',
//     'accountDesignatedDate'             => '',
//     'accountWeeksLeft'                  => '',
// );
// print_r($fieldData); 
?>
<div class="nk-block">    
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"><?php //$addModalTitle; ?></h3>
                <div class="nk-block-des text-soft">
                    <p>Create a New Marketing <?php //$configMode; ?></p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="<?php //echo $accountTypeAltURl; ?>" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-swap"></em><span><?php //echo $accountTypeAltText; ?></span></a></li>
                            <li><a href="<?php //echo $this->agent->referrer(); ?>" class="btn btn-danger btn-dim btn-outline-primary"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
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
                                <h4 class="card-title title"><?php //echo $formTitle; ?></h4>
                                <p class="sub-text">Please fill out information below!</p>
                            </div>
                        </div>
                        <div class="pricing-body">                                
                        <form method="post" action="<?php site_url('Management/Marketing/Add/Schedule') ?>">
                            <?php csrf_field() ?>
                            <div class="form-group">
                                <label for="post_date">Post Date</label>
                                <input type="date" id="post_date" name="post_date" class="form-control" value="<?php old('post_date') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="platform">Platform</label>
                                <select id="platform" name="platform[]" class="selectpicker form-control" multiple data-live-search="true" required>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Email">Email</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content_subject">Content Subject</label>
                                <input type="text" id="content_subject" name="content_subject" class="form-control" value="<?php //old('content_subject') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="content_description">Content Description</label>
                                <textarea id="content_description" name="content_description" class="form-control" rows="3" required><?php //old('content_description') ?></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>


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
                <?php //echo view('UserModule/Knowledgebase/Tutorials/Categories/Budget/Add'); ?>
            </div>
        </div>        
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    const addAccountForm = document.querySelector("#add_marketing_campaign");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (addAccountForm) {
        addAccountForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = prepareFormData();
            
            try {
                const result = await submitForm(formData);
                handleSuccess(result);
            } catch (err) {
                console.log(err);
            }
        });
    }

    function prepareFormData() {
        const formElement = document.querySelector("#add_marketing_campaign");
        console.log("Form Element:", formElement);

        if (!formElement) {
            console.error("Form element not found");
            return;
        }

        const formData = {};
        for (const field of formElement.elements) {
            if (field.name) {
                formData[field.name] = field.value;
            }
        }
        return formData;
    }

    async function submitForm(formData) {
        const response = await fetch("<?php echo site_url('Management/Marketing/Marketing_Manager'); ?>", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: { 
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            credentials: "same-origin",
        });
        return await response.json();
    }

    function handleSuccess(responseData) {
        const parsedData = typeof responseData === 'string' ? JSON.parse(responseData) : responseData;
        console.log('Operation successful:', parsedData);
        const redirectURL = `<?php //echo $redirectURL; ?>`;
        location.href = redirectURL;
    }
</script>
