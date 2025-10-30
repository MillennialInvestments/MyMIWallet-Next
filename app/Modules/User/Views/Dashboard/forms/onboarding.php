<!-- app/Modules/User/Views/Dashboard/forms/onboarding.php -->
<?php
$stepTitle = ucfirst(str_replace('_', ' ', $step));
?>

<div class="modal-header">
    <h5 class="modal-title">Complete Step: <?= $stepTitle ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <p>Please confirm that you've completed the step: <strong><?= $stepTitle ?></strong>.</p>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-success" id="confirmStepBtn" data-step="<?= $step ?>">Mark as Completed</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    $("#confirmStepBtn").on("click", function () {
        let step = $(this).data("step");

        $.ajax({
            type: "POST",
            url: "<?= site_url('/dashboard/completeOnboardingStep/') ?>" + step,
            data: { csrf_test_name: "<?= csrf_hash(); ?>" },
            success: function (response) {
                console.log("✅ Step completed:", step);
                $("#onboardingModal").modal("hide");
                location.reload(); // Refresh to update checklist
            },
            error: function () {
                alert("Error completing the step. Please try again.");
            }
        });
    });
});
</script>
