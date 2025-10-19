<!-- app/Modules/Management/Views/Alerts/resources/action_center.php -->
<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Action Center</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
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
                    <em class="icon ni ni-account-setting"></em>
                    <div class="title">Manage Alerts</div>
                    <p>Access the Alert Management Dashboard to continue managing <strong>MyMI Alerts</strong>.</p>
                </div>
                <a href="<?php echo site_url('/Management/Alerts/Settings'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-account-setting"></em>
                    <div class="title">Alert Settings</div>
                    <p>Configure & Manage your <strong>MyMI Alert Configuration Settings</strong>.</p>
                </div>
                <a href="<?php echo site_url('/Management/Alerts/Settings'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-emails"></em>
                    <div class="title">Email Auditor</div>
                    <p>Audit and check how information is being gathered from the Alerts Email Inbox</strong>.</p>
                </div>
                <a href="<?php echo site_url('/Management/Alerts/Audit/Emails'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-help-fill"></em>
                    <div class="title">Support Messages</div>
                    <p>There are <strong><?php echo $totalPendingSupport; ?></strong> pending support messages and <strong><?php echo $totalCompleteSupport; ?></strong> completed requests. </p>
                </div>
                <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-wallet-fill"></em>
                    <div class="title">Pending Alerts</div>
                    <p>We have <strong><?php echo $pendingTradeAlertsCount; ?> Pending Alerts</strong> awaiting review and resolution.</p>
                </div>
                <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->