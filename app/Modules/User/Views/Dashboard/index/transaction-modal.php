<!-- app/Modules/User/Views/Dashboard/index/transaction-modal.php -->
<?php
$totalSegments = $uri->getTotalSegments();

$pageURIA   = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB   = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC   = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID   = $totalSegments >= 4 ? $uri->getSegment(4) : null;
$pageURIE   = $totalSegments >= 5 ? $uri->getSegment(5) : null;
$client_id  = $cuUserType === 'Beta' 
    ? 'AeFttKQS_djpAmMEFvPSinKaluT_XqJ_zE00kD8QIxIr5F76wg18Yliy7XsYl7jlsCcFbwwx9Zpp2Nnn' 
    : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';
?>

<!-- ✅ MODAL STRUCTURE -->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="trackDepositsModal" aria-hidden="true" inert>
    <div class="modal-dialog modal-xl" id="transModalDialog">
        <div class="modal-content" id="loading-content">
            <?php echo view('Dashboard/index/modal-loading-page'); ?>
        </div>
        <div class="modal-content" id="transactionContainer"></div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    console.log("✅ Document is ready!");

    $(document).on("click", ".dynamicModalLoader", function (event) {
        event.preventDefault();

        let formtype = $(this).data("formtype") || "";
        let endpoint = $(this).data("endpoint") ? "/" + $(this).data("endpoint") : "";
        let accountid = $(this).data("accountid") ? "/" + $(this).data("accountid") : "";
        let category = $(this).data("category") ? "/" + $(this).data("category") : "";
        let platform = $(this).data("platform") ? "/" + $(this).data("platform") : "";

        let url = `<?= site_url('Dashboard/Transaction-Modal/')?>${formtype}${endpoint}${accountid}${category}${platform}`;
        console.log("⏳ Fetching modal content from:", url);

        $("#transactionModal").modal("show");
        $("#loading-content").html(`
            <div class="d-flex flex-column justify-content-center align-items-center" style="height:300px;">
                <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="mt-3 small text-muted">Loading content... Please wait</div>
            </div>
        `).show();
        $("#transactionContainer").hide();
        $("#transactionModal").removeAttr("aria-hidden").removeAttr("inert");

        $.ajax({
            type: "GET",
            url: url,
            headers: { 'X-CSRF-TOKEN': '<?= csrf_hash(); ?>' },
            success: function (response, status, xhr) {
                console.log("✅ Modal content loaded successfully.");

                if (xhr.getResponseHeader("X-Session-Expired") === "1" || response.includes("login")) {
                    console.warn("⚠️ Session expired! Redirecting to login...");
                    $("#transactionModal").modal("hide");
                    window.location.href = "<?= site_url('/login'); ?>";
                    return;
                }

                $("#transactionContainer").html(response).fadeIn(300);
                $("#loading-content").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("❌ AJAX error:", textStatus, errorThrown);

                if (jqXHR.status === 401 || jqXHR.responseText.includes("login")) {
                    console.warn("⚠️ Session expired! Redirecting to login...");
                    $("#transactionModal").modal("hide");
                    window.location.href = "<?= site_url('/login'); ?>";
                    return;
                }

                $("#loading-content").hide();
                $("#transactionContainer").html("<div class='alert alert-danger text-center'>❌ Error loading content. Please try again later.</div>").fadeIn(300);
            }
        });
    });

    $("#transactionModal").on("shown.bs.modal", function () {
        $(this).removeAttr("aria-hidden").removeAttr("inert");
        $(this).find('[autofocus], button, input, a').first().focus();
    });

    $("#transactionModal").on("hidden.bs.modal", function () {
        $(this).attr("aria-hidden", "true").attr("inert", "");
        $("#transactionContainer").empty();
        $("#loading-content").show();
    });
});

// ✅ PayPal Initialization Function
function initializePayPalButton() {
    paypal.Buttons({
        createOrder: function(data, actions) {
            let transCost = parseFloat($("#transCost").text().replace(/,/g, "")) || 0;
            if (transCost <= 0) {
                console.error("❌ Invalid transaction amount");
                return Promise.reject("Invalid transaction amount");
            }
            return actions.order.create({
                purchase_units: [{ amount: { value: transCost.toFixed(2) } }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log("✅ Transaction completed by:", details.payer.name.given_name);
                let formData = new FormData();
                formData.append("transaction_id", details.id);
                formData.append("total_cost", details.purchase_units[0].amount.value);

                fetch("<?= site_url("/Wallets/MyMIGPayPalCallback") ?>", {
                    method: "POST",
                    body: formData,
                    credentials: "same-origin"
                })
                .then(response => {
                    if (!response.ok) {
                        console.error("❌ Callback failed:", response.status);
                        return Promise.reject("Failed to process transaction.");
                    }
                    return response.text();
                })
                .then(() => {
                    window.location.href = "<?= site_url("/Wallets/Purchase/Complete/MyMIGold") ?>";
                })
                .catch(error => console.error("❌ Error processing PayPal callback:", error));
            }).catch(error => console.error("❌ Error capturing order:", error));
        },
        onError: function(err) {
            console.error("❌ PayPal SDK error:", err);
        }
    }).render("#paypal-button-container");
}
</script>

<script <?= $nonce['script'] ?? '' ?>>
// ✅ Gold Coin Transaction Calculations
document.addEventListener("DOMContentLoaded", function() {
    let goldCoinsField = document.getElementById("gold_coins");

    if (goldCoinsField) {
        goldCoinsField.addEventListener("input", function() {
            let goldCoins = parseFloat(this.value) || 0;
            let transPercent = parseFloat(document.getElementById("trans_percent").value) || 0;
            let transFee = parseFloat(document.getElementById("trans_fee").value) || 0;
            let MyMIGCoinAvailable = parseFloat(document.getElementById("available_coins").value) || 0;
            let MyMIGoldValue = 1;

            function formatNumber(num, decimals = 2) {
                return num.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            let prelimCostUSD = goldCoins * MyMIGoldValue;
            document.getElementById("prelimCost").innerText = formatNumber(prelimCostUSD);

            let transactionFees = (goldCoins * transPercent) + transFee;
            let totalCostUSD = prelimCostUSD + transactionFees;

            document.getElementById("trans_cost").value = transactionFees.toFixed(8);
            document.getElementById("transCost").innerText = formatNumber(totalCostUSD);

            let remainingCoins = MyMIGCoinAvailable - transactionFees - goldCoins;
            document.querySelector(".remaining-coins-label").innerText = formatNumber(remainingCoins, 8) + " Gold";

            document.querySelector(".transaction-fees-label").innerText = formatNumber(transactionFees, 2) + " Gold";

            let totalCoinsReceived = goldCoins - transactionFees;
            document.querySelector(".transaction-subtotal-label").innerText = formatNumber(totalCoinsReceived, 8) + " Gold";
        });
    }
});
</script>
