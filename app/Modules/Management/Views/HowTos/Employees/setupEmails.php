<?php 
// Management Module Configurations
$actionItems = $siteSettings->managementActionItems; 
$currentDate = $siteSettings->date;
$currentMonth = $siteSettings->month;
$currentYear = $siteSettings->year;

$subViewData = [

];
?>
<div class="nk-block">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-12 col-lg-3">
                <?php echo view('HowTos/Employees/action_center', $subViewData); ?>
            </div>
            <div class="col-12 col-lg-9">
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered pb-4 guide px-2">
                        <div class="card-inner">
                            <div class="card-title-group text-center mb-4">
                                <h4 class="card-title">Connect Dreamhost Account to Gmail</h4>
                                <p class="sub-text">Step-by-step guide to configure Gmail for sending and receiving emails via Dreamhost.</p>
                            </div>
                            <div class="guide-body">
                                <div class="container-fluid mb-5 mt-3">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Step 1: Enable IMAP Access on Dreamhost</strong>
                                            <p>Log in to your Dreamhost panel and ensure IMAP access is enabled for your email account.</p>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Step 2: Open Gmail Settings</strong>
                                            <p>In your Gmail app, go to <em>Settings</em> > <em>Accounts and Import</em> > <em>Add a mail account</em>.</p>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Step 3: Enter Your Email Address</strong>
                                            <p>Input your full Dreamhost email address (e.g., yourname@yourdomain.com).</p>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Step 4: Configure Incoming Mail Server</strong>
                                            <p>Use the following details:</p>
                                            <ul>
                                                <li><strong>IMAP Server:</strong> imap.dreamhost.com</li>
                                                <li><strong>Port:</strong> 993</li>
                                                <li><strong>Security:</strong> SSL/TLS</li>
                                                <li><strong>Username:</strong> Full email address</li>
                                                <li><strong>Password:</strong> Your email password</li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Step 5: Configure Outgoing Mail Server (SMTP)</strong>
                                            <p>Use these settings for outgoing emails:</p>
                                            <ul>
                                                <li><strong>SMTP Server:</strong> smtp.dreamhost.com</li>
                                                <li><strong>Port:</strong> 465</li>
                                                <li><strong>Security:</strong> SSL/TLS</li>
                                                <li><strong>Username:</strong> Full email address</li>
                                                <li><strong>Password:</strong> Your email password</li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Step 6: Test Connection</strong>
                                            <p>Complete the setup and test by sending and receiving a test email to ensure everything is connected properly.</p>
                                        </li>
                                    </ul>
                                    <div class="text-end mt-4">
                                        <a href="<?= site_url('Support/Guides'); ?>" class="btn btn-primary">
                                            <em class="icon ni ni-help"></em><span>More Help Guides</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-content-body -->
</div><!-- .nk-block -->

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Script to handle interactive elements, if needed
});
</script>
