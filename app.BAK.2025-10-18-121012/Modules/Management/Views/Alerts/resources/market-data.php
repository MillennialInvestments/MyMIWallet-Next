<!-- app/Modules/Management/Views/Alerts/resources/overview-chart.php -->
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Alert Analytics Overview</h6>
                <p>Performance metrics on alert handling and resolution.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><span>Last 15 Days</span></a></li>
                            <li><a href="#"><span>Last 30 Days</span></a></li>
                            <li><a href="#"><span>Last 3 Months</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- .card-title-group -->

        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-xxl-8">
                    <div class="nk-order-ovwg-ck">
                        <canvas class="order-overview-chart" id="orderOverview"></canvas>
                    </div>
                </div><!-- .col -->
                <div class="col-xxl-4">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xxl-12">
                            <div class="nk-order-ovwg-data buy">
                                <div class="amount"><?php echo $pendingTradeAlertsCount; ?></div>
                                <div class="info">Pending Alerts: <strong><?php echo $pendingTradeAlertsCount; ?></strong></div>
                                <div class="title"><em class="icon ni ni-alert-circle"></em> Total Pending Alerts</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-12">
                            <div class="nk-order-ovwg-data sell">
                                <div class="amount"><?php echo $resolvedAlertsCount; ?></div>
                                <div class="info">Resolved Alerts: <strong><?php echo $resolvedAlertsCount; ?></strong></div>
                                <div class="title"><em class="icon ni ni-check-circle"></em> Total Resolved Alerts</div>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->