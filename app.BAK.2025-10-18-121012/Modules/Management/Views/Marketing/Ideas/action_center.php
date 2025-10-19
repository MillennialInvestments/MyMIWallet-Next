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
                    <em class="icon ni ni-property-add"></em>
                    <div class="title">Create Campaign</div>
                    <p>Get started with a new Marketing Campaign. Collaborate with team members and partners.</p>
                </div>
                <a class="btn btn-primary btn-md text-white dynamicModalLoader" data-formtype="Marketing" data-endpoint="addCampaign" data-category="Add" data-accountid="<?= $cuID; ?>">
                    <em class="icon ni ni-plus"></em>
                    <span>Add Campaign</span>
                </a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-users"></em>
                    <div class="title">Collaborate with Team</div>
                    <p>Share and collaborate with a team or team member on the MyMI Marketing Team. </p>
                </div>
                <a class="btn btn-primary btn-md text-white dynamicModalLoader" data-formtype="Marketing" data-endpoint="addIdea" data-category="Add" data-accountid="<?= $cuID; ?>">
                    <em class="icon ni ni-plus"></em>
                    <span>Add Idea</span>
                </a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-link-group"></em>
                    <div class="title">Collaborate with Partners</div>
                    <p>Share and collaborate with a partner in our MyMI Community.</p>
                </div>
                <a href="<?php echo site_url('/Management/Partners/Collaborate'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-link-group"></em>
                    <div class="title">Collaborate with Partners</div>
                    <p>Share and collaborate with a partner in our MyMI Community.</p>
                </div>
                <a href="<?php echo site_url('/Management/Partners/Collaborate'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->