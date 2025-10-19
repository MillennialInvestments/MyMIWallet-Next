<?php 
use CodeIgniter\HTTP\URI;
use Config\Services;

$log = Services::logger();
$log->info('Loading Add Chart Modal');
?>

<div class="modal-header">
    <h3 class="modal-title">Add Chart</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

<div class="modal-body">
    <form id="addChartForm" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="form-group">
            <label for="chartType">Chart Type</label>
            <select class="form-control" id="chartType" name="chart_type">
                <option value="url">TradingView URL</option>
                <option value="embed">Embed Code</option>
                <option value="file">Upload File</option>
            </select>
        </div>

        <div class="form-group">
            <label for="chartData">Chart Data</label>
            <input type="text" class="form-control" id="chartData" name="chart_data" placeholder="Paste URL or Embed Code">
        </div>

        <div class="form-group">
            <label for="chartFile">Upload Chart Image</label>
            <input type="file" class="form-control" id="chartFile" name="chart_file">
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save Chart</button>
        </div>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function(){
    $("#chartType").on('change', function(){
        if ($(this).val() === 'file') {
            $("#chartFile").closest('.form-group').show();
            $("#chartData").closest('.form-group').hide();
        } else {
            $("#chartFile").closest('.form-group').hide();
            $("#chartData").closest('.form-group').show();
        }
    }).trigger('change');
});
</script>
