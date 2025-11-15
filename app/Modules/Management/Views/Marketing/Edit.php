<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$this->load->library('user_agent');

$redirectURL = $this->agent->referrer() === $this->uri->uri_string() ? site_url('/Management/Marketing/Exchanges') : $this->agent->referrer();
$errorClass  = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;

$userAccount = $_SESSION['allSessionData']['userAccount'];
$cuID        = $userAccount['cuID'];
$cuEmail     = $userAccount['cuEmail'];
$cuUsername  = $userAccount['cuUsername'];
$cuUserType  = $userAccount['cuUserType'];

$department  = 'Marketing';
$configMode  = 'Exchanges';
$formMode    = 'Edit';
$accountID   = isset($token['id']) ? $token['id'] : '';
$formTitle   = 'Edit Exchange Information';
$addModalTitle = $formMode . ' ' . $configMode . ': #' . $accountID;

$fieldData = [
    'redirectURL' => $redirectURL,
    'errorClass'  => $errorClass,
    'controlClass'=> $controlClass,
    'cuID'        => $cuID,
    'cuEmail'     => $cuEmail,
    'cuUsername'  => $cuUsername,
    'cuUserType'  => $cuUserType,
    'department'  => $department,
    'configMode'  => $configMode,
    'formMode'    => $formMode,
    'accountID'   => $accountID,
    'token'       => $token
];
?>
<div class="nk-block">    
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"><?= $addModalTitle; ?></h3>
                <div class="nk-block-des text-soft">
                    <p>Edit the Exchange Token Information.</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="<?php echo $redirectURL; ?>" class="btn btn-danger btn-dim btn-outline-primary text-white"><em class="icon ni ni-cross"></em><span>Cancel</span></a></li>
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
                                <h4 class="card-title title"><?php echo $formTitle; ?></h4>
                                <p class="sub-text">Please update the information below!</p>
                            </div>
                        </div>
                        <div class="pricing-body">                                
                            <form class="form-horizontal" id="edit_exchange_form" method="post">
                                <fieldset>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
 
                                    <?php
                                    // Dynamic Form Fields based on $fieldData
                                    Template::block($viewFileLink, $viewFileLink, $fieldData);
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <div class="pricing-action mt-0">
                                        <p class="sub-text"></p>
                                        <input class="btn btn-primary btn-sm" type="submit" name="submit" id="editExchangeSubmit" value="Update" />
                                    </div>
                                </fieldset>
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
                <!-- Additional content can be added here -->
            </div>
        </div>        
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    const editExchangeForm = document.querySelector("#edit_exchange_form");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (editExchangeForm) {
        editExchangeForm.addEventListener("submit", async (e) => {
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
        const formElement = document.querySelector("#edit_exchange_form");

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
        const response = await fetch("<?php echo site_url('Management/Marketing/Exchanges/Edit/'.$token['id']); ?>", {
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
        const redirectURL = `<?php echo $redirectURL; ?>`;
        location.href = redirectURL;
    }
</script>
