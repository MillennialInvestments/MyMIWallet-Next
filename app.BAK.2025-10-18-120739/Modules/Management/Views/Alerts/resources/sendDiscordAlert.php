<div class="modal-header">
    <h5 class="modal-title">Send Discord Alert</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <p>Are you sure you want to send a Discord alert for this trade?</p>
    <button id="confirmSendDiscord" class="btn btn-primary">Send Alert</button>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$('#confirmSendDiscord').on('click', function () {
    const symbol = "<?php echo $accountid; ?>";
    $.ajax({
        url: '<?php echo site_url("API/Alerts/sendDiscordAlertsBySymbol"); ?>',
        type: 'POST',
        data: { symbol },
        success: function (response) {
            alert(response.message);
            $('#dynamicModal').modal('hide');
        },
        error: function (xhr) {
            alert('Failed to send Discord alert.');
        },
    });
});
</script>
