<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Action Center</h6>
                <p>Quick access to important actions and tools.</p>
            </div>
        </div>
    </div>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Create New Guide</div>
                <p><a href="<?php echo site_url('/Management/HowTos/Create'); ?>"><strong><?php // Placeholder for count variable ?></strong></a> new guides available to create.</p>
            </div>
            <a href="<?php echo site_url('/Management/HowTos/Create'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-plus"></em>
                <span>Create Guide</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Manage Existing Guides</div>
                <p><a href="<?php echo site_url('/Management/HowTos/Manage'); ?>"><strong><?php // Placeholder for count variable ?></strong></a> existing guides need management.</p>
            </div>
            <a href="<?php echo site_url('/Management/HowTos/Manage'); ?>" class="btn btn-warning btn-md">
                <em class="icon ni ni-browser"></em>
                <span>Manage Guides</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-report"></em>
                <div class="title">View Reports</div>
                <p><a href="<?php echo site_url('/Management/HowTos/Reports'); ?>"><strong><?php // Placeholder for report count ?></strong></a> guides have related reports available.</p>
            </div>
            <a href="<?php echo site_url('/Management/HowTos/Reports'); ?>" class="btn btn-info btn-md">
                <em class="icon ni ni-report"></em>
                <span>View Reports</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-list-index"></em>
                <div class="title">Access Tools</div>
                <p>Access various tools to support the creation and management of guides.</p>
            </div>
            <a href="<?php echo site_url('/Management/HowTos/Tools'); ?>" class="btn btn-success btn-md">
                <em class="icon ni ni-list-index"></em>
                <span>View Tools</span>
            </a>
        </div>
    </div><!-- .card-inner -->
</div>
