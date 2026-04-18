<?php
?>
<script src="<?= base_url('assets/vendor/datatables/1.11.5/js/jquery.dataTables.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script src="<?= base_url('assets/vendor/datatables/1.11.5/js/dataTables.bootstrap5.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<?php
$dataTablesHelperPath = FCPATH . 'assets/js/datatables-helper.js';
$dataTablesHelperVersion = is_file($dataTablesHelperPath) ? filemtime($dataTablesHelperPath) : time();
?>
<script src="<?= base_url('assets/js/datatables-helper.js') . '?v=' . $dataTablesHelperVersion; ?>" <?= $nonce['script'] ?? '' ?>></script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('.defaultDTTable')) {
        initDataTableSafe($('.defaultDTTable'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#supportRequestOverview').length && !$.fn.DataTable.isDataTable('#supportRequestOverview')) {
        initDataTableSafe($('#supportRequestOverview'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#userActivityLoggerDatatable').length && !$.fn.DataTable.isDataTable('#userActivityLoggerDatatable')) {
        initDataTableSafe($('#userActivityLoggerDatatable'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#contentCreator').length && !$.fn.DataTable.isDataTable('.contentCreator')) {
        initDataTableSafe($('.contentCreator'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,100,250,500,1000,-1],["All",10,25,50,100,250,500,1000]]
        });
    }
    if ($('#dashboardTasksDatatable').length && !$.fn.DataTable.isDataTable('#dashboardTasksDatatable')) {
        initDataTableSafe($('#dashboardTasksDatatable'),{
            "order": [[0, "desc"]]
        });
    }
    if ($('#bankAccountTransactionHistory').length && !$.fn.DataTable.isDataTable('#bankAccountTransactionHistory')) {
        initDataTableSafe($('#bankAccountTransactionHistory'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#userBudgetingDetailsDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingDetailsDatatable')) {
        initDataTableSafe($('#userBudgetingDetailsDatatable'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[25,50,100,500,-1],[25,50,100,500,"All"]]
        });
    }
    if ($('#userBudgetingHistoricalDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingHistoricalDatatable')) {
        initDataTableSafe($('#userBudgetingHistoricalDatatable'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[25,50,100,500,-1],[25,50,100,500,"All"]]
        });
    }
    if ($('#alertOverviewDatatable').length && !$.fn.DataTable.isDataTable('#alertOverviewDatatable')) {
        initDataTableSafe($('#alertOverviewDatatable'),{
            "order": [[5, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#tradeTrackerDatatable').length && !$.fn.DataTable.isDataTable('#tradeTrackerDatatable')) {
        initDataTableSafe($('#tradeTrackerDatatable'),{
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#walletTradeOverviewDatatable').length && !$.fn.DataTable.isDataTable('#walletTradeOverviewDatatable')) {
        initDataTableSafe($('#walletTradeOverviewDatatable'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('.accountingDatatable').length && !$.fn.DataTable.isDataTable('.accountingDatatable')) {
        initDataTableSafe($('.accountingDatatable'),{
            "order": [[3, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#activeTradeDataTable').length && !$.fn.DataTable.isDataTable('#activeTradeDataTable')) {
        initDataTableSafe($('#activeTradeDataTable'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    }
    if ($('#walletTransactionDatabase').length && !$.fn.DataTable.isDataTable('#walletTransactionDatabase')) {
        initDataTableSafe($('#walletTransactionDatabase'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]],
        });
    }
    if ($('#userInvestmentTable').length && !$.fn.DataTable.isDataTable('#userInvestmentTable')) {
        initDataTableSafe($('#userInvestmentTable'),{
            "order": [[0, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]],
        });
    }
    if ($('#exchangeOverviewDataTable').length && !$.fn.DataTable.isDataTable('#exchangeOverviewDataTable')) {
        initDataTableSafe($('#exchangeOverviewDataTable'),{
            "order": [[2, "desc"]],
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]],
        });
    }
    if ($('#MyMIProjectsListingTable').length && !$.fn.DataTable.isDataTable('#MyMIProjectsListingTable')) {
        initDataTableSafe($('#MyMIProjectsListingTable'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]]
        });
    }
    if ($('#MyMIPendingProjectsTable').length && !$.fn.DataTable.isDataTable('#MyMIPendingProjectsTable')) {
        initDataTableSafe($('#MyMIPendingProjectsTable'),{
            "order": [[0, "asc"]],
            "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]]
        });
    }
});
</script>
