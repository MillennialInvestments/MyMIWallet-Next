<?php echo view('App\Views\errors\html\under_construction'); ?>
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Connected Accounts</h4>
                            <div class="nk-block-des">
                                <p>View And Managed Your Connected Accounts.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title">Financial Accounts</h6>
                        </div>
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Test Financial Account</span>
                                <span class="data-value">-- Not Connected --</span>
                            </div>
                            <div class="data-col data-col-end"><a class="btn btn-primary" id="connectDoordashBtn" href="#">Connect</a></div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title">Investment Accounts</h6>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Test Investment Account</span>
                                <span class="data-value">-- Not Connected --</span>
                            </div>
                            <div class="data-col data-col-end"><a class="btn btn-primary" href="#">Connect</a></div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                    <div class="nk-data data-list">
                        <div class="data-head">
                            <h6 class="overline-title">Additional Apps</h6>
                        </div>
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">TradingView (Test)</span>
                                <span class="data-value">-- Not Connected --</span>
                            </div>
                            <div class="data-col data-col-end"><a class="btn btn-primary" href="#">Connect</a></div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                </div><!-- .nk-block -->
            </div>
            <?php 
            $controlCenterData = [];
            echo view('UserModule\Views\Dashboard\Account\ControlCenter', $controlCenterData); 
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('connectDoordashBtn').addEventListener('click', function() {
    // URL to initiate OAuth flow
    var oauthUrl = '<?= site_url('Account/Connect/DoorDash'); ?>';
    
    // Parameters for the popup window
    var windowName = "ConnectDoorDash";
    var windowSize = "width=800,height=600";

    // Open the popup
    window.open(oauthUrl, windowName, windowSize);
});
</script>