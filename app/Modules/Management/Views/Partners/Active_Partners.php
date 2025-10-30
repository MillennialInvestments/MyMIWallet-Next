
<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Active Partner</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="link py-3" href="<?php echo site_url('Management/Assets/Create'); ?>"><i class="icon ni ni-plus-circle"></i> Invite User</a>
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
                        <table class="table table-striped table-bordered" id="activePartnersDatatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Network</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>More Details..</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // print_r($getActivePartners->result_array());
                                foreach($getActivePartners as $partner) {
                                    if ($partner['city'] !== 'N/A' || NULL) {
                                        $partnerLocation                = $partner['city'] . ', ' . $partner['state'];
                                    } else {
                                        $partnerLocation                = 'N/A';
                                    }
                                    if ($partner['phone'] !== 'N/A' || NULL || '') {
                                        $partnerPhone                   = $partner['phone'];
                                    } else {
                                        $partnerPhone                   = 'N/A';
                                    }
                                    if ($partner['active'] === '1') {
                                        $activeStatus                   = '<span class="badge bg-success">Active</span>';
                                    } elseif ($partner['banned'] === '1') {
                                        $activeStatus                   = '<span class="badge bg-danger">Banned</span>';
                                    } else {
                                        $activeStatus                   = '<span class="badge bg-danger">Not Active</span>';
                                    }
                                    echo '
                                    <tr>
                                        <td><a href="' . site_url('/Management/Users/Profile/' . $partner['id']) . '">' . $partner['id'] . '</a></td>
                                        <td>' . $activeStatus . '</td>
                                        <td>' . $partner['referral_code'] . '</td>
                                        <td>' . $partner['organization'] . '</td>
                                        <td>' . $partner['first_name'] . ' ' . $partner['last_name'] . ' ' . $partner['name_suffix'] . '</td>
                                        <td>' . $partner['phone'] . '</td>
                                        <td>' . $partner['email'] . '</td>
                                        <td>' . $partnerLocation . '</td>
                                        <td></td>
                                    </tr>
                                    ';
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
        $('#activePartnersDatatable').DataTable( {
            "order": [[ 0, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        }	
        );
    } );
</script>