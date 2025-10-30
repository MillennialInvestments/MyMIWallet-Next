<?php
$ticker = esc($ticker ?? '');
?>

<div class="modal-header">
    <h5 class="modal-title">Update Exchange for <?= $ticker ?></h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
    <label for="exchangeDropdown">Select Exchange for <strong><?= $ticker ?></strong>:</label>
    <select id="exchangeDropdown" class="form-control">
        <option value="">-- Select Exchange --</option>
        <option value="NASDAQ">NASDAQ</option>
        <option value="NYSE">NYSE</option>
        <option value="AMEX">AMEX</option>
        <option value="OTC">OTC</option>
        <option value="LSE">LSE</option>
        <option value="TSX">TSX</option>
        <option value="ASX">ASX</option>
        <option value="SKILLING">SKILLING</option>
    </select>

    <label for="exchangeInput" class="mt-2">Or Enter Manually:</label>
    <input type="text" id="exchangeInput" class="form-control" placeholder="E.g., NASDAQ, NYSE">
    
    <button class="btn btn-primary mt-3" id="saveExchange">Save Exchange</button>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    let csrfName = $('meta[name="csrf-name"]').attr('content');
    let csrfHash = $('meta[name="csrf-hash"]').attr('content');

    function updateCsrfToken(newCsrfName, newCsrfHash) {
        csrfName = newCsrfName;
        csrfHash = newCsrfHash;
        $('meta[name="csrf-name"]').attr('content', csrfName);
        $('meta[name="csrf-hash"]').attr('content', csrfHash);
    }

    $("#saveExchange").on("click", function () {
        let selectedExchange = $("#exchangeDropdown").val().trim();
        let manualExchange = $("#exchangeInput").val().trim();
        let exchange = manualExchange ? manualExchange : selectedExchange;

        if (!exchange) {
            alert("Exchange cannot be empty!");
            return;
        }

        $.ajax({
            url: "<?= site_url('API/Alerts/updateExchange') ?>",
            type: "POST",
            dataType: 'json',
            data: {
                ticker: "<?= $ticker ?>",
                exchange: exchange,
                [csrfName]: csrfHash
            },
            success: function (response) {
                if (response.status === "success") {
                    alert("Exchange updated successfully!");

                    // ✅ Close modal
                    $('#dynamicModalLoader').modal('hide');

                    // ✅ Refresh only the updated row in DataTable
                    let tradeAlertTable = $('#tradeAlertTable').DataTable();
                    let rowIndex = tradeAlertTable.rows().eq(0).filter(function (rowIdx) {
                        return tradeAlertTable.cell(rowIdx, 3).data() === "<?= $ticker ?>"; 
                    });

                    if (rowIndex.length > 0) {
                        tradeAlertTable.cell(rowIndex[0], 2).data(exchange).draw(false); 
                    } else {
                        tradeAlertTable.ajax.reload(null, false); 
                    }
                } else {
                    alert("Error: " + response.message);
                }

                if (response.csrfName && response.csrfHash) {
                    updateCsrfToken(response.csrfName, response.csrfHash);
                }
            },
            error: function (xhr) {
                alert("Failed to update exchange. Check console for details.");
                console.error(xhr.responseText);
            }
        });
    });

});

</script>
