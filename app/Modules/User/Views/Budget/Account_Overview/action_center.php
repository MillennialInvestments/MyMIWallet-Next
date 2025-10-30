<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title"><?php echo $accountType; ?> Action Center</h6>
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
                    <em class="icon ni ni-cc-alt-fill"></em>
                    <div class="title">Add <?php echo $accountType; ?></div>
                    <p><a href="<?php echo site_url('/Budget/Add/' . $accountType); ?>"><strong>Create <?php echo $accountType; ?> Record</strong></a> to include in your Monthly <?php echo $accountType; ?> Accounts.</p>
                </div>
                <a href="<?php echo site_url('/Budget/Add/' . $accountType); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-help-fill"></em>
                    <div class="title">View Account Ledger</div>
                    <p><a href="<?php echo site_url('/Budget/History/' . $accountType); ?>"><strong>Manage <?= $accountType; ?> Accounts</strong></a> in your Monthly Budget.</p>
                </div>
                <a href="<?php echo site_url('/Budget/History/' . $accountType); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-wallet-fill"></em>
                    <div class="title"><?php echo $accountType; ?> Settings</div>
                    <p>View and Manage your <a href="<?php echo site_url('Budget/Settings/' . $budgetType); ?>"><strong><?= $accountType; ?> Settings</strong></a>.</p>
                </div>
                <a href="<?php echo site_url('Budget/Settings/' . $budgetType); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div> 
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-wallet-fill"></em>
                    <div class="title">Need Support?</div>
                    <p>View and Manage your <a href="<?php echo site_url('Support/Budget'); ?>"><strong><?php //echo $totalTransactions; ?>Active Support Requests</strong></a>.</p>
                </div>
                <a href="<?php echo site_url('Support/Budget'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->