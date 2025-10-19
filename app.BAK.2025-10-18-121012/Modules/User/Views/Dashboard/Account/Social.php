<?php echo view('App/Views/errors\html\under_construction'); ?>
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">            
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Connected with Social Account</h4>
                            <div class="nk-block-des">
                                <p>You can connect with your social account such as facebook, google etc to make easier to login into account.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <h6 class="lead-text">Connect to Facebook</h6>
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="media media-center gx-3 wide-xs">
                                <div class="media-object">
                                    <em class="icon icon-circle icon-circle-lg ni ni-facebook-f"></em>
                                </div>
                                <div class="media-content">
                                    <p>You can connect with your Facebook account. <em class="d-block text-soft">Not connected yet</em></p>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-0">
                                <a href="#" class="btn btn-lg btn-success">Connect</a>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                </div><!-- .nk-card -->
                <h6 class="lead-text">Connect to Google</h6>
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                            <div class="media media-center gx-3 wide-xs">
                                <div class="media-object">
                                    <em class="icon icon-circle icon-circle-lg ni ni-google"></em>
                                </div>
                                <div class="media-content">
                                    <p>You can connect with your Google account. <em class="d-block text-soft">Not connected yet</em></p>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-0">
                                <a href="#" class="btn btn-lg btn-success">Connect</a>
                            </div>
                        </div>
                    </div><!-- .nk-card-inner -->
                </div><!-- .nk-card -->
            </div>
            <?php 
            $controlCenterData = [];
            echo view('Dashboard\Account\ControlCenter', $controlCenterData); 
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->