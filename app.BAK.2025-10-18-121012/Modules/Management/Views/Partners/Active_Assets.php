
<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Active Partner Assets</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="link py-3" href="<?php echo site_url('Management/Assets/Create'); ?>"><i class="icon ni ni-plus-circle"></i> Add Asset</a>
                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-block">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-bordered defaultDTTable" id="activeAssetsDatatable">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zipcode</th>
                                    <th>More Details..</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($getApprovedPartnerAssets as $partnerAssets) {
                                    if ($partner['partner'] === 1) {
                                        echo '
                                        <tr>
                                            <td>' . $partnerAssets['organization'] . '</td>
                                            <td>' . $partnerAssets['first_name'] . ' ' . $partnerAssets['last_name'] . ' ' . $partnerAssets['name_suffix'] . '</td>
                                            <td>' . $partnerAssets['phone'] . '</td>
                                            <td>' . $partnerAssets['email'] . '</td>
                                            <td>' . $partnerAssets['address'] . '</td>
                                            <td>' . $partnerAssets['city'] . '</td>
                                            <td>' . $partnerAssets['state'] . '</td>
                                            <td>' . $partnerAssets['country'] . '</td>
                                            <td>' . $partnerAssets['zipcode'] . '</td>
                                            <td>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#activeAssetsDatatable').DataTable( {
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        }	
        );
    } );
</script>