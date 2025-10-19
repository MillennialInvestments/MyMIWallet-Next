<?php
// app/Modules/Management/Views/Marketing/Add.php

$errorClass = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;
log_message('debug', 'Marketing\Add L7 - $uri-getSegment: ' . $uri->getSegment(6));
$configMode = $uri->getSegment(4); 
$formMode = $uri->getSegment(5); 
$accountID = ($uri->getTotalSegments() >= 2) ? $uri->getSegment(2) : $cuID;
$pageType = ($configMode === 'addCampaign') ? 'Add a New Campaign' : 
            (($configMode === 'addIdea') ? 'Add a New Idea' : 'Add a New Schedule');

$accountType = ($configMode === 'addCampaign') ? 'Campaign' : 
               (($configMode === 'addIdea') ? 'Idea' : 'Schedule');

$viewFileLink = ($configMode === 'addCampaign') ? 'ManagementModule\Views\Marketing\Add\campaign_fields' : 
                (($configMode === 'addIdea') ? 'ManagementModule\Views\Marketing\Add\idea_fields' : 'Management/Marketing/Add/schedule_fields');

// Field data for the form
$fieldData = [
    'siteSettings' => $siteSettings,
    'uri' => $uri,
    'redirectURL' => $redirectURL ?? site_url('/Management/Marketing'),
    'errorClass' => $errorClass,
    'controlClass' => $controlClass,
    'cuID' => $cuID,
    'cuEmail' => $cuEmail,
    'configMode' => $configMode,
    'formMode' => $formMode,
    'accountID' => $accountID,
    'accountType' => $accountType,
    'managementTeam' => $managementTeam ?? [],
];

?>
<div class="modal-header">
    <h3 class="modal-title" id="addCampaignModalLabel"><?= $pageType; ?></h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="card px-2 pb-4">
                    <div class="card-body">
                        <!-- <form id="add_marketing_form" > -->
                        <form id="add_marketing_form" method="POST" action="<?= site_url('Management/Marketing/Add/' . $accountType) ?>">
                            <?php echo csrf_field() ?>
                            <?php echo view($viewFileLink, $fieldData); ?>
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </form>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger fade in">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for form handling -->
<script <?= $nonce['script'] ?? '' ?>>
$('#add_marketing_form').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    const formData = new FormData(this);
    const formAction = $(this).attr('action'); // Use the action URL defined in the form

    $.ajax({
        url: formAction, // Use the form's dynamic action URL
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                // Display success message with a download link
                alert(response.message);
            } else {
                // Display error message
                alert(response.message);
            }
        },
        error: function () {
            alert('An error occurred while submitting the form.');
        },
    });
});

</script>
<!-- <script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#add_marketing_form");

    if (form) {
        form.addEventListener("submit", async function (e) {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const response = await fetch("<?= site_url('Management/Marketing/SubmitForm'); ?>", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    credentials: "same-origin",
                });

                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const data = await response.json();
                if (data.success) {
                    // Close the modal programmatically
                    $('#addCampaignModal').modal('hide'); // Assuming the modal has this ID
                    // Optionally, reload the page or redirect to update the UI
                    window.location.href = "<?= site_url('/Management/Marketing/Campaigns'); ?>";
                } else {
                    alert('Failed to submit the form. Please try again.');
                }
            } catch (error) {
                console.error("Error:", error);
            }
        });
    }
});

</script> -->
