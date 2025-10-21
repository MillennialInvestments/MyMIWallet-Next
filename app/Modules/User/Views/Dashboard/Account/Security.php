<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">            
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Security Settings</h4>
                            <div class="nk-block-des">
                                <p>These settings are helps you keep your account secure.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-head-content">
                        <h6>Change Password</h6>
                        <p>Set a unique password to protect your account.</p>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block-content">
                    <div class="gy-3">
                        <div class="g-item">
                            <div class="custom-control custom-switch">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                    <li class="order-md-last">
                                        <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#resetUserPasswordModal">Change Password</a>
                                    </li>
                                    <li>
                                        <!-- <em class="text-soft text-date fs-12px">Last changed: <span>Oct 2, 2019</span></em> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-content -->
            </div>
            <?php 
            $controlCenterData = [];
            echo view('Dashboard/Account/ControlCenter', $controlCenterData); 
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->