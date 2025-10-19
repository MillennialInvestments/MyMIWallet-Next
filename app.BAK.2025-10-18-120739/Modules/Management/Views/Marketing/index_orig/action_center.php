<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Action Center</h6>
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
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-users"></em>
                    <div class="title">Active Users</div>
                    <p><a href="<?php echo site_url('/Management/Users'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
                </div>
                <a href="<?php echo site_url('/Management/Users'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-target"></em>
                    <div class="title">Marketing Campaigns</div>
                    <p>There is <a href="<?php echo site_url('/Management/Marketing/Campaigns'); ?>"><strong><?php //echo $totalActiveCampaigns; ?></strong></a> Marketing Campaigns. View more <a href="<?php echo site_url('/Management/Assets/Support'); ?>"><strong>Analytics</strong></a> to track their progress. </p>
                </div>
                <a href="<?php echo site_url('/Management/Marketing/Campaigns'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-property-add"></em>
                    <div class="title"><?php echo $department; ?> Tasks</div>
                    <p>There are currently <a href="<?php echo site_url('Management/Marketing/Tasks'); ?>"><strong><?php //echo $totalDepartmentTasks; ?> Total Tasks</strong></a> pending for the team.</p>
                </div>
                <a href="<?php echo site_url('Management/Marketing/Tasks'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-property-add"></em>
                    <div class="title"><?php echo $department; ?> Tools</div>
                    <p>Utilize Marketing Tools to promote our services and reach more potential members.</p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-icon btn-trigger me-n2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <em class="icon ni ni-forward-ios"></em>
                    </button>
                </div>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-property-add"></em>
                    <div class="title"><?php // echo $department; ?> Tools</div>
                    <p>Utilize Marketing Tools to promote our services and reach more potential members.</p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-icon btn-trigger me-n2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <em class="icon ni ni-forward-ios"></em>
                    </button>
                    <div class="dropdown-menu" style="width: max-content !important; left: -53em;">
                        <!-- Dropdown items styled as cards -->
                        <div class="card-inner dropdown-item">
                            <div class="nk-wg-action">
                                <div class="nk-wg-action-content">
                                    <em class="icon ni ni-property-add"></em>
                                    <div class="title"><?php //echo $department; ?> Tools</div>
                                    <p>Utilize Marketing Tools to promote our services and reach more potential members.</p>
                                </div>
                                <div class="btn-group">
                                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#toolModal" data-content="Create Email Content">
                                        <em class="icon ni ni-forward-ios"></em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner dropdown-item">
                            <div class="nk-wg-action">
                                <div class="nk-wg-action-content">
                                    <em class="icon ni ni-property-add"></em>
                                    <div class="title"><?php //echo $department; ?> Tools</div>
                                    <p>Utilize Marketing Tools to promote our services and reach more potential members.</p>
                                </div>
                                <div class="btn-group">
                                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#toolModal" data-content="Create Email Content">
                                        <em class="icon ni ni-forward-ios"></em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Add more dropdown items as needed -->
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->