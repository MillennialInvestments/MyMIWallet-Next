<?php echo view('App/Views/errors\html\under_construction'); ?>
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Billing &amp; Subscriptions</h4>
                            <div class="nk-block-des">
                                <p>Manage your Account Billing, Payments, & Subscriptions. <span class="text-soft"><em class="icon ni ni-info"></em></span></p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-toggle-body="true" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block card card-bordered">
                    
                </div><!-- .nk-block-head -->
            </div>
            <?php 
            $controlCenterData = [];
            echo view('Dashboard\Account\ControlCenter', $controlCenterData); 
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->