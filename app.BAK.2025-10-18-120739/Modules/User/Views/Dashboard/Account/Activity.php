<?php // echo view('App/Views/errors\html\under_construction'); ?>
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Login Activity</h4>
                            <div class="nk-block-des">
                                <p>Here is your last 20 login activities log. <span class="text-soft"><em class="icon ni ni-info"></em></span></p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-toggle-body="true" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block card">
                    <table class="table table-ulogs display" id="userLoginActivityTable">
                        <thead class="table-light">
                            <tr>
                                <th class="tb-col-os"><span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span></th>
                                <th class="tb-col-time"><span class="overline-title">Time</span></th>
                                <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //log_message('debug', 'Dashboard\Account\Activity L30 - $loginActivity: ' . (print_r($loginActivity, true))); ?>
                            <?php foreach($loginActivity as $activity) {
                                echo '
                                <tr>
                                    <td>' . date('Y-m-d', strtotime($activity['date'])) . '</td>
                                    <td>' . date('h:i:s A', strtotime($activity['date'])) . '</td>
                                    <td>' . $activity['ip_address'] . '</td>
                                </tr>
                                ';
                            } ?>
                        </tbody>
                    </table>
                </div><!-- .nk-block-head -->
            </div>
            <?php 
            $controlCenterData = [];
            echo view('Dashboard\Account\ControlCenter', $controlCenterData); 
            ?>
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#userLoginActivityTable').DataTable({
            "order": [[ 2, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>