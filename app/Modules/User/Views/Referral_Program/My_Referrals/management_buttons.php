<div class="<?php echo $siteSettings->managementActionItems; ?>">
    <div class="card card-bordered h-100">
        <div class="card-inner-group">
            <div class="card-inner card-inner-md">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Alerts Overview</h6>
                    </div>
                    <div class="card-tools me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <div class="d-flex pb-md-4">
                    <div class="align-self-center pr-2">
                        <i class="icon icon-md ni ni-alert-circle"></i>
                    </div>
                    <div class="align-self-center text-end">
                        <h6>
                            <small class="fs-14px"><?php //echo $pendingTradeAlertsCount; ?> / <?php //echo $totalAlertsCount; ?> Alerts Pending</small>
                            <br>
                            <small class="fs-14px">Pending Alerts</small>
                        </h6>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-block"><i class="icon ni ni-eye mr-1"></i> Review Alerts</a>
            </div>
        </div>
    </div>
</div>

<div class="<?php echo $siteSettings->managementActionItems; ?>">
    <div class="card card-bordered h-100">
        <div class="card-inner-group">
            <div class="card-inner card-inner-md">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Alert Trends</h6>
                    </div>
                    <div class="card-tools me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <div class="d-flex pb-md-4">
                    <div class="align-self-center pr-2">
                        <i class="icon icon-md ni ni-chart"></i>
                    </div>
                    <div class="align-self-center text-end">
                        <h6>
                            <small class="fs-14px"><?php //echo implode(', ', $alertTrends); ?></small>
                            <br>
                            <small class="fs-14px">Recent Trends</small>
                        </h6>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> View Trends</a>
            </div>
        </div>
    </div>
</div>

<div class="<?php echo $siteSettings->managementActionItems; ?>">
    <div class="card card-bordered h-100">
        <div class="card-inner-group">
            <div class="card-inner card-inner-md">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Alert Sources</h6>
                    </div>
                    <div class="card-tools me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <div class="d-flex pb-md-4">
                    <div class="align-self-center pr-2">
                        <i class="icon icon-md ni ni-notify"></i>
                    </div>
                    <div class="align-self-center text-end">
                        <h6>
                            <small class="fs-14px"><?php //echo implode(', ', array_keys($alertsBySource)); ?></small>
                            <br>
                            <small class="fs-14px">Sources: <?php //echo implode(', ', array_values($alertsBySource)); ?></small>
                        </h6>
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Explore Sources</a>
            </div>
        </div>
    </div>
</div>