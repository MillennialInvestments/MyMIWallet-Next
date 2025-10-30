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
        $('.defaultDTTable').DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#supportRequestOverview').length && !$.fn.DataTable.isDataTable('#supportRequestOverview')) {
        $('#supportRequestOverview').DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userActivityLoggerDatatable').length && !$.fn.DataTable.isDataTable('#userActivityLoggerDatatable')) {
        $('#userActivityLoggerDatatable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#contentCreator').length && !$.fn.DataTable.isDataTable('.contentCreator')) {
        $('.contentCreator').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], ["All", 10, 25, 50, 100, 250, 500, 1000]]
        });
    }

    // Continue in similar fashion for other tables...

    if ($('#dashboardTasksDatatable').length && !$.fn.DataTable.isDataTable('#dashboardTasksDatatable')) {
        $('#dashboardTasksDatatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('.defaultDTTable')) {
        $('.defaultDTTable').DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#supportRequestOverview').length && !$.fn.DataTable.isDataTable('#supportRequestOverview')) {
        $('#supportRequestOverview').DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userActivityLoggerDatatable').length && !$.fn.DataTable.isDataTable('#userActivityLoggerDatatable')) {
        $('#userActivityLoggerDatatable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#contentCreator').length && !$.fn.DataTable.isDataTable('.contentCreator')) {
        $('.contentCreator').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, 100, 250, 500, 1000, -1], ["All", 10, 25, 50, 100, 250, 500, 1000]]
        });
    }

    if ($('#bankAccountTransactionHistory').length && !$.fn.DataTable.isDataTable('#bankAccountTransactionHistory')) {
        $('#bankAccountTransactionHistory').DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#userBudgetingDetailsDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingDetailsDatatable')) {
        $('#userBudgetingDetailsDatatable').DataTable({
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]]
        });
    }

    if ($('#userBudgetingHistoricalDatatable').length && !$.fn.DataTable.isDataTable('#userBudgetingHistoricalDatatable')) {
        $('#userBudgetingHistoricalDatatable').DataTable({
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]]
        });
    }

    if ($('#alertOverviewDatatable').length && !$.fn.DataTable.isDataTable('#alertOverviewDatatable')) {
        $('#alertOverviewDatatable').DataTable({
            "order": [[ 5, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#tradeTrackerDatatable').length && !$.fn.DataTable.isDataTable('#tradeTrackerDatatable')) {
        $('#tradeTrackerDatatable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#walletTradeOverviewDatatable').length && !$.fn.DataTable.isDataTable('#walletTradeOverviewDatatable')) {
        $('#walletTradeOverviewDatatable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('.accountingDatatable').length && !$.fn.DataTable.isDataTable('.accountingDatatable')) {
        $('.accountingDatatable').DataTable({
            "order": [[ 3, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    if ($('#activeTradeDataTable').length && !$.fn.DataTable.isDataTable('#activeTradeDataTable')) {
        $('#activeTradeDataTable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }

    // if ($('#watchListDataTable').length && !$.fn.DataTable.isDataTable('#watchListDataTable')) {
    //     $('#watchListDataTable').DataTable({
    //         "order": [[ 0, "desc" ]],     
    //         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    //     });
    // }

    if ($('#walletTransactionDatabase').length && !$.fn.DataTable.isDataTable('#walletTransactionDatabase')) {
        $('#walletTransactionDatabase').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#userInvestmentTable').length && !$.fn.DataTable.isDataTable('#userInvestmentTable')) {
        $('#userInvestmentTable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#exchangeOverviewDataTable').length && !$.fn.DataTable.isDataTable('#exchangeOverviewDataTable')) {
        $('#exchangeOverviewDataTable').DataTable({
            "order": [[ 2, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#userActivityDatatable').length && !$.fn.DataTable.isDataTable('#userActivityDatatable')) {
        $('#userActivityDatatable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#myReferralsDatatable').length && !$.fn.DataTable.isDataTable('#myReferralsDatatable')) {
        $('#myReferralsDatatable').DataTable({
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],    
        });
    }

    if ($('#exchangeBuyOrders').length && !$.fn.DataTable.isDataTable('#exchangeBuyOrders')) {
        $('#exchangeBuyOrders').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#exchangeSellOrders').length && !$.fn.DataTable.isDataTable('#exchangeSellOrders')) {
        $('#exchangeSellOrders').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 1, "desc" ]]
        });
    }

    if ($('#exchangeTradeHistory').length && !$.fn.DataTable.isDataTable('#exchangeTradeHistory')) {
        $('#exchangeTradeHistory').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "order": [[ 0, "desc" ]]
        });
    }

    if ($('#dashboardTasksDatatable').length && !$.fn.DataTable.isDataTable('#dashboardTasksDatatable')) {
        $('#dashboardTasksDatatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    }

    // Add more conditions as needed
});
</script>
