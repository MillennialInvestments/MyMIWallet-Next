<?php
$totalSegments  = $uri->getTotalSegments();

$pageURIA       = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB       = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC       = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID       = $totalSegments >= 4 ? $uri->getSegment(4) : null;
?>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('.defaultDTTable')) {
        initDataTableSafe($('.defaultDTTable'),{
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#supportRequestOverview').length && !$.fn.DataTable.isDataTable('#supportRequestOverview')) {
        initDataTableSafe($('#supportRequestOverview'),{
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userActivityLoggerDatatable').length && !$.fn.DataTable.isDataTable('#userActivityLoggerDatatable')) {
        initDataTableSafe($('#userActivityLoggerDatatable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#contentCreator').length && !$.fn.DataTable.isDataTable('.contentCreator')) {
        initDataTableSafe($('.contentCreator'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], ["All", 10, 25, 50, 100, 250, 500, 1000]]
        });
    }

    // Continue in similar fashion for other tables...

    if ($('#dashboardTasksDatatable').length && !$.fn.DataTable.isDataTable('#dashboardTasksDatatable')) {
        initDataTableSafe($('#dashboardTasksDatatable'),{
            "order": [[ 0, "desc" ]]
        });
    }
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('.defaultDTTable')) {
        initDataTableSafe($('.defaultDTTable'),{
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#supportRequestOverview').length && !$.fn.DataTable.isDataTable('#supportRequestOverview')) {
        initDataTableSafe($('#supportRequestOverview'),{
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userActivityLoggerDatatable').length && !$.fn.DataTable.isDataTable('#userActivityLoggerDatatable')) {
        initDataTableSafe($('#userActivityLoggerDatatable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#contentCreator').length && !$.fn.DataTable.isDataTable('.contentCreator')) {
        initDataTableSafe($('.contentCreator'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], ["All", 10, 25, 50, 100, 250, 500, 1000]]
        });
    }

    if ($('#bankAccountTransactionHistory').length && !$.fn.DataTable.isDataTable('#bankAccountTransactionHistory')) {
        initDataTableSafe($('#bankAccountTransactionHistory'),{
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userBudgetingDetailsDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingDetailsDatatable')) {
        initDataTableSafe($('#userBudgetingDetailsDatatable'),{
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]]
        });
    }

    if ($('#userBudgetingHistoricalDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingHistoricalDatatable')) {
        initDataTableSafe($('#userBudgetingHistoricalDatatable'),{
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]]
        });
    }

    if ($('#alertOverviewDatatable').length && !$.fn.DataTable.isDataTable('#alertOverviewDatatable')) {
        initDataTableSafe($('#alertOverviewDatatable'),{
            "order": [[ 5, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#tradeTrackerDatatable').length && !$.fn.DataTable.isDataTable('#tradeTrackerDatatable')) {
        initDataTableSafe($('#tradeTrackerDatatable'),{
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#walletTradeOverviewDatatable').length && !$.fn.DataTable.isDataTable('#walletTradeOverviewDatatable')) {
        initDataTableSafe($('#walletTradeOverviewDatatable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('.accountingDatatable').length && !$.fn.DataTable.isDataTable('.accountingDatatable')) {
        initDataTableSafe($('.accountingDatatable'),{
            "order": [[ 3, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#activeTradeDataTable').length && !$.fn.DataTable.isDataTable('#activeTradeDataTable')) {
        initDataTableSafe($('#activeTradeDataTable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    // if ($('#watchListDataTable').length && !$.fn.DataTable.isDataTable('#watchListDataTable')) {
    //     initDataTableSafe($('#watchListDataTable'),{
    //         "order": [[ 0, "desc" ]],     
    //         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    //     });
    // }

    if ($('#walletTransactionDatabase').length && !$.fn.DataTable.isDataTable('#walletTransactionDatabase')) {
        initDataTableSafe($('#walletTransactionDatabase'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#userInvestmentTable').length && !$.fn.DataTable.isDataTable('#userInvestmentTable')) {
        initDataTableSafe($('#userInvestmentTable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#exchangeOverviewDataTable').length && !$.fn.DataTable.isDataTable('#exchangeOverviewDataTable')) {
        initDataTableSafe($('#exchangeOverviewDataTable'),{
            "order": [[ 2, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#userActivityDatatable').length && !$.fn.DataTable.isDataTable('#userActivityDatatable')) {
        initDataTableSafe($('#userActivityDatatable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#myReferralsDatatable').length && !$.fn.DataTable.isDataTable('#myReferralsDatatable')) {
        initDataTableSafe($('#myReferralsDatatable'),{
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#exchangeBuyOrders').length && !$.fn.DataTable.isDataTable('#exchangeBuyOrders')) {
        initDataTableSafe($('#exchangeBuyOrders'),{
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#exchangeSellOrders').length && !$.fn.DataTable.isDataTable('#exchangeSellOrders')) {
        initDataTableSafe($('#exchangeSellOrders'),{
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 1, "desc" ]]
        });
    }

    if ($('#exchangeTradeHistory').length && !$.fn.DataTable.isDataTable('#exchangeTradeHistory')) {
        initDataTableSafe($('#exchangeTradeHistory'),{
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#dashboardTasksDatatable').length && !$.fn.DataTable.isDataTable('#dashboardTasksDatatable')) {
        initDataTableSafe($('#dashboardTasksDatatable'),{
            "order": [[ 0, "desc" ]]
        });
    }

    // Add more conditions as needed
});
</script>
