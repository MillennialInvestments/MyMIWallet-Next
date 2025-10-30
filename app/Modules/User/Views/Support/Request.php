<?php
$errorClass                             = empty($errorClass) ? ' error' : $errorClass;
$controlClass                           = empty($controlClass) ? 'span6' : $controlClass;
$beta                                   = $siteSettings->beta;
// if (!empty($_SESSION['allSessionData'])) {
//     $userAccount                            = $_SESSION['allSessionData']['userAccount'];
//     if (!empty($userAccount)) {
//         $cuID                                   = $userAccount['cuID'];
//         $this->mymilogger
//                 ->user($cuID) //Set UserID, who created this  Action
//                 ->beta($beta) //Set whether in Beta or nto
//                 ->type('Support') //Entry type like, Post, Page, Entry
//                 ->controller($this->router->fetch_class())
//                 ->method($this->router->fetch_method())
//                 ->url($this->uri->uri_string())
//                 ->full_url(current_url())
//                 ->comment('Request') //Token identify Action
//                 ->log(); //Add Database Entry
//     }
// }
$fieldData = array(
    'errorClass'                        => $errorClass,
    'controlClass'                      => $controlClass,
    'uri'                               => $uri,
);    
?>
<div id="alert-container"></div>
<div class="nk-block-head nk-block-head-lg wide-md pb-1">
    <div class="nk-block-head-content">
        <div class="nk-block-head-sub"><span>Customer Support</span></div>
        <h2 class="nk-block-title fw-normal">Submit Request</h2>
        <div class="nk-block-des">
            <p class="lead"></p>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-inner p-0">
        <div class="nk-block-content">
            <div class="row justify-content-center">
                <div class="col-12">
                    <form class="form-horizontal" id="customer_support_request">
                        <fieldset>
                            <?php echo view('UserModule\Views\Support\Request\user_fields', $fieldData); ?>
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
    </div><!-- .card-inner -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
const customerSupportRequest = document.querySelector("#customer_support_request");
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

if (customerSupportRequest) {
    customerSupportRequest.addEventListener("submit", async (e) => {
        e.preventDefault(); // Prevent form submission

        const formData = {};
        customerSupportRequest.querySelectorAll(".form-control").forEach((inputField) => {
            formData[inputField.name] = inputField.value;
        });

        try {
            const response = await fetch("<?php echo site_url('Support/Manager'); ?>", {
                method: "POST",
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
                },
            });

            const data = await response.json();

            if (data.status === "success") {
                showAlert("success", data.message);
                setTimeout(() => {
                    location.href = "<?php echo site_url('/Support'); ?>";
                }, 3000); // Redirect after 3 seconds
            } else {
                showAlert("error", "There was an issue submitting your request. Please try again.");
            }
        } catch (error) {
            showAlert("error", "An unexpected error occurred. Please check your connection and try again.");
            console.error(error);
        }
    });
}

// Function to display alert messages
function showAlert(type, message) {
    const alertContainer = document.querySelector("#alert-container");
    if (alertContainer) {
        alertContainer.innerHTML = `
            <div class="alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    }
}

</script> 
