<!-- app/Modules/User/Views/Dashboard/modals/onboarding.php -->
<?php
$totalSegments = $uri->getTotalSegments();
$pageURIA = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID = $totalSegments >= 4 ? $uri->getSegment(4) : null;
$pageURIE = $totalSegments >= 5 ? $uri->getSegment(5) : null;
?>

<!-- ✅ MODAL STRUCTURE -->
<div class="modal fade" id="onboardingModal" tabindex="-1" aria-labelledby="onboardingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="loading-content">
            <?php echo view('Dashboard\index\modal-loading-page'); ?>
        </div>
        <div class="modal-content" id="onboardingContainer"></div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    console.log("✅ Onboarding modal script loaded.");

    $(document).on("click", ".dynamicModalLoader", function (event) {
        event.preventDefault();

        let formtype = $(this).data("formtype") || "";
        let endpoint = $(this).data("endpoint") ? "/" + $(this).data("endpoint") : "";
        let accountid = $(this).data("accountid") ? "/" + $(this).data("accountid") : "";

        let url = `<?= site_url('Dashboard/Onboarding-Modal/')?>${formtype}${endpoint}${accountid}`;
        console.log("⏳ Fetching onboarding modal content from:", url);

        $("#onboardingModal").modal("show");
        $("#loading-content").show();
        $("#onboardingContainer").hide();

        $.ajax({
            type: "GET",
            url: url,
            headers: { 'X-CSRF-TOKEN': '<?= csrf_hash(); ?>' },
            success: function (response) {
                console.log("✅ Modal content loaded successfully.");
                $("#onboardingContainer").html(response).show();
                $("#loading-content").hide();
            },
            error: function (jqXHR) {
                console.error("❌ AJAX error:", jqXHR.responseText);
                $("#loading-content").hide();
                $("#onboardingContainer").html("<p>Error loading content.</p>").show();
            }
        });
    });

    $("#onboardingModal").on("hidden.bs.modal", function () {
        $("#onboardingContainer").empty();
        $("#loading-content").show();
    });
});
</script>
