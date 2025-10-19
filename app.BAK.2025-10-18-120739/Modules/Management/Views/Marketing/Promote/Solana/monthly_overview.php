<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>Last 12 Months of Total Monthly Spend &amp; Total Transaction Fees.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#" class="active"><span>15 Days</span></a></li>
                            <li><a href="#"><span>30 Days</span></a></li>
                            <li><a href="#"><span>3 Months</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- .card-title-group -->
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-xxl-8">
                    <div class="nk-order-ovwg-ck">
                        <div class="chart-container" style="position: relative; height: 100%; width: 100%;">
                            <canvas class="order-overview-chart" id="orderOverview"></canvas>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-xxl-4">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xxl-12">
                            <div class="nk-order-ovwg-data buy">
                                <div class="amount"><?php // echo $totalActiveUsers; ?> <small class="currenct currency-usd">Active Users</small></div>
                                <div class="info">Active Partners <strong><?php //echo $totalActivePartners; ?> <span class="currenct currency-usd">Partners</span></strong></div>
                                <div class="title"><em class="icon ni ni-arrow-down-left"></em> Total Active Users</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-12">
                            <div class="nk-order-ovwg-data sell">
                                <div class="amount"><?php // echo $totalTransFees; ?> <small class="currenct currency-usd">Total Spend</small></div>
                                <div class="info">Avg/User <strong><?php //echo $totalLastTransFees; ?> <span class="currenct currency-usd">USD</span></strong></div>
                                <div class="title"><em class="icon ni ni-arrow-up-left"></em> Total Monthly Revenue</div>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('orderOverview').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line', // The type of chart we want to create
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // The labels on the X axis
            datasets: [{
                label: 'Orders', // The label for the dataset
                backgroundColor: 'rgba(0, 123, 255, 0.5)', // The background color for the chart (area)
                borderColor: 'rgb(0, 123, 255)', // The line color
                data: [0, 10, 5, 2, 20, 30, 45] // The data for the dataset
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Allow the chart to adjust to the container size
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Orders'
                    }
                }
            }
        }
    });
});
</script>