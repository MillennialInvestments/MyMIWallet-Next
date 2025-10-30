<div class="nk-block">
    <div class="row">
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Users</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                            <i class="icon icon-md ni ni-coins"></i>
                            </div>
                            <div class="align-self-center text-end">
                            <h6>
                                <small class="fs-14px"><?php echo number_format($totalActiveUsers,0); ?> / <?php echo $targetUsers . ' (' . $usersPercentage . ')'; ?></small>
                                <br>
                                <small class="fs-14px">Active Users</small>
                            </h6>
                            <!-- <p class="mb-0">Total Assets</p> -->
                            </div>
                        </div>
                        <a href="#active-assets-overview" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Partners</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                                <i class="icon icon-md ni ni-users"></i>
                            </div>
                            <div class="align-self-center text-end">
                                <h6>
                                    <small class="fs-14px"><?php //echo number_format($totalActivePartners,0); ?> / <?php //echo $targetPartners . ' (' . $partnerPercentage . ')'; ?></small>
                                    <br>
                                    <small class="fs-14px">Active Partners</small>
                                </h6>
                            </div>
                        </div>
                        <a href="<?php echo site_url('/Management/Assets/Applications'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Partners</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Wallets</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                                <i class="icon icon-md ni ni-tranx"></i>
                            </div>
                            <div class="align-self-center text-end">
                                <h6>
                                    <small class="fs-14px"><?php // echo number_format($totalWalletsCreated,0); ?> / <?php //echo $targetWallets . ' (' . $walletsPercentage . ')'; ?></small>
                                    <br>
                                    <small class="fs-14px">Total Wallets</small>
                                </h6>
                            </div>
                        </div>
                        <a href="#active-assets-overview" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Wallets</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Assets</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                                <i class="icon icon-md ni ni-reports"></i>
                            </div>
                            <div class="align-self-center text-end">
                                <h6>                                                
                                    <small class="fs-14px"><?php //echo $totalApprovedAssets; //number_format($totalTransTotals,0); ?> / <?php // echo $targetAssets . ' (' . $assetPercentage . ')'; ?></small>
                                    <br>
                                    <small class="fs-14px">Total Assets</small>
                                </h6>
                            </div>
                        </div>
                        <a href="<?php echo site_url('/Management/Assets/Transactions'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Assets</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Spend</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                                <i class="icon icon-md ni ni-users"></i>
                            </div>
                            <div class="align-self-center text-end">
                                <h6>
                                    <small class="fs-14px"><?php //echo $totalMarketingBudget; ?>$0 / $0 (0%)<?php //echo $targetMarketingBudget . ' (' . $marketingBudgetPercentage . ')'; ?></small>
                                    <br>
                                    <small class="fs-14px">Monthly Spend</small>
                                </h6>
                            </div>
                        </div>
                        <a href="<?php echo site_url('/Management/Marketing/Campaigns'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Fees</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo $managementActionItems; ?>">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tasks</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="<?php echo site_url('Management/Marketing/Support'); ?>"><em class="icon ni ni-setting"></em><span>View Support</span></a></li>
                                            <li><a href="<?php echo site_url('Management/Services/Support/Requests'); ?>"><em class="icon ni ni-notify"></em><span>Pending Requests</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="d-flex pb-md-4">
                            <div class="align-self-center pr-2">
                                <i class="icon icon-md ni ni-wallet"></i>
                            </div>
                            <div class="align-self-center text-end">
                                <h6>
                                    <small class="fs-14px"><?php // echo number_format($totalDepartmentTasks,0); ?> Total Tasks</small>
                                    <br
                                    ><small class="fs-14px"><?php echo '0'; ?> Task Resolved</small>
                                </h6>
                            </div>
                        </div>
                        <a href="<?php echo site_url('Management/Services/Support/Requests'); ?>" class="btn btn-primary btn-block"><i class="icon ni ni-eye"></i> View Tasks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>