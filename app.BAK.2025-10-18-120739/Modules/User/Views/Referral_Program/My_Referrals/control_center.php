<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Referral Summary</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown">
                            <em class="icon ni ni-more-h"></em>
                        </a>
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
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-user-add"></em>
                    <div class="title">Create New Referral</div>
                    <p>Start creating new referrals by clicking the button below.</p>
                </div>
                <a href="<?php echo site_url('Referrals/Create'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-plus"></em></a>

                <!-- Button triggers the modal loader instead of a direct link
                <a href="#" 
                    class="btn btn-icon btn-trigger me-n2 dynamicModalLoader" 
                    data-formtype="Referrals" 
                    data-endpoint="createReferral" 
                    data-accountid="<?php echo $cuID; ?>" 
                    data-bs-toggle="modal" 
                    data-bs-target="#dynamicModal">
                    <em class="icon ni ni-plus text-success"></em>
                </a> -->


            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-users"></em>
                    <div class="title">Active Referrals - <span id="activeReferrals">0</span></div>
                    <p>Manage your <a href="<?php echo site_url('Referral/Active'); ?>">Active Referrals</a> to view detailed information.</p>
                </div>
                <a href="<?php echo site_url('Referral/Active'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-user-check"></em>
                    <div class="title">Pending Referrals - <span id="pendingReferrals">0</span></div>
                    <p>Manage your <a href="<?php echo site_url('Referral/Pending'); ?>">Pending Referrals</a> to view detailed information.</p>
                </div>
                <a href="<?php echo site_url('Referral/Pending'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-file-text"></em>
                    <div class="title">Referral Reports</div>
                    <p>View detailed referral reports for performance analysis.</p>
                </div>
                <a href="<?php echo site_url('Referral/Reports'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div>
    </div>
</div>