<!-- app/Modules/Management/Views/Marketing/index/action_center_new.php -->
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start">
            <div class="card-title">
                <h6 class="title">Action Center</h6>
                <p>Quick access to important actions and tools.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-share-alt"></em>
                <div class="title">Content Generator</div>
                <p><a href="<?php echo site_url('/Marketing/Campaigns/Add'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/Campaigns/Add'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-book"></em>
                <div class="title">Generate Blog</div>
                <p><a href="<?php echo site_url('/Management/Marketing/RunContentGeneration'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/RunContentGeneration'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-book"></em>
                <div class="title">View Blogs</div>
                <p><a href="<?php echo site_url('/Management/Marketing/Blogs'); ?>"><strong><?php // echo $totalActiveUsers; ?> View & Manage</strong></a> all blog content that have been generated.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/Blogs'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-update"></em>
                <div class="title">Fetch Content</div>
                <p><a href="<?php echo site_url('/Management/Marketing/fetchEmails'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/fetchEmails'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-article"></em>
                <div class="title">Generate Newsletter</div>
                <p><a href="<?php echo site_url('Management/Marketing/generateNewsletter'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/generateNewsletter'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-calendar"></em>
                <div class="title">Schedule Newsletter</div>
                <p><a href="<?php echo site_url('Management/Marketing/scheduleNewsletters'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/scheduleNewsletters'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-briefcase"></em>
                <div class="title">Marketing Tools</div>
                <p><a href="<?php echo site_url('/Management/Marketing/Tools'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/Tools'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-eye"></em>
                <span>View</span>
            </a>
        </div>
    </div><!-- .card-inner -->
    <hr>
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-send"></em>
                <div class="title">Mass Resend Activation Emails</div>
                <p>This will resend activation emails to all inactive users who haven’t confirmed their account.</p>
            </div>
            <button class="btn btn-danger btn-md" onclick="massResendActivationEmails()">
                <em class="icon ni ni-mail"></em>
                <span>Resend Now</span>
            </button>
        </div>
        <div id="resend-status" class="mt-2 text-success"></div>
    </div>

    <!-- <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Marketing Campaigns</div>
                <p><a href="<?php echo site_url('/Management/Marketing/Campaigns/Add'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Management/Marketing/Campaigns/Add'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-plus"></em>
                <span>Add Campaign</span>
            </a>
        </div>
    </div><!-- .card-inner --
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Active Users / Partners</div>
                <p><a href="<?php echo site_url('/Marketing/SEO/Tasks'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Marketing/SEO/Tasks'); ?>" class="btn btn-warning btn-md">
                <em class="icon ni ni-browser"></em>
                <span>Manage Users</span>
            </a>
        </div>
    </div><!-- .card-inner --
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Marketing Reports</div>
                <p><a href="<?php echo site_url('/Marketing/Reports'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Marketing/Reports'); ?>" class="btn btn-info btn-md">
                <em class="icon ni ni-report"></em>
                <span>View Reports</span>
            </a>
        </div>
    </div><!-- .card-inner --
    <div class="card-inner">
        <div class="nk-wg-action">
            <div class="nk-wg-action-content">
                <em class="icon ni ni-users"></em>
                <div class="title">Marketing Tools</div>
                <p><a href="<?php echo site_url('/Marketing/Reports'); ?>"><strong><?php // echo $totalActiveUsers; ?> Active Users</strong></a> and <a href="#active-assets-overview"><strong><?php // echo $totalActivePartners; ?> Active Partners</strong></a>, thats need to be reviewed.</p>
            </div>
            <a href="<?php echo site_url('/Marketing/Tools'); ?>" class="btn btn-success btn-md">
                <em class="icon ni ni-list-index"></em>
                <span>View Tools</span>
            </a>
        </div>
    </div>.card-inner -->
</div>
