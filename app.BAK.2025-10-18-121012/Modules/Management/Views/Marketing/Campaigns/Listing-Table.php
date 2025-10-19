<div class="card card-bordered h-100" id="active-campaigns-overview">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Active Marketing Campaigns</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">                            
                        <a class="btn btn-primary text-white dynamicModalLoader" data-formtype="Marketing" data-endpoint="addCampaign" data-category="Add" data-accountid="<?= $cuID; ?>"> <i class="icon ni ni-plus-circle"></i> <span class="pl-0" style="padding-top:3px;">Add Campaign</span></a>

                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
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
                        <table class="table table-striped table-bordered" id="marketingCampaignOverview">
                            <thead>
                                <tr>
                                    <th class="d-none">Campaign</th>
                                    <th>Campaign</th>
                                    <th>Stage</th>
                                    <th>Created By</th>
                                    <th>Assigned To</th>
                                    <th>Actions...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($getActiveCampaigns as $campaigns) {
                                    echo '
                                    <tr>
                                        <td class="d-none">' . $campaigns['id'] . '</td>
                                        <td><a class="btn text-primary dynamicModalLoader" data-formtype="Marketing" data-endpoint="viewCampaign" data-category="View" data-accountid="' . $campaigns['id'] . '">' . $campaigns['name'] . '</a></td>
                                        <td><a href="">' . $campaigns['stage'] . '</a></td>
                                        <td><a href="">' . $campaigns['username'] . '</a></td>
                                        <td><a href="">' . $campaigns['assigned_to'] . '</a></td>
                                        <td>
                                            <a href="' . site_url('Management/Marketing/Campaigns/View/' . $campaigns['id']) . '"><i class="icon myfs-md ni ni-eye"></i></a>
                                            <a href="' . site_url('Management/Marketing/Campaigns/Edit/' . $campaigns['id']) . '"><i class="icon myfs-md ni ni-edit"></i></a>
                                            <a href="' . site_url('Management/Marketing/Campaigns/Generate-Content/' . $campaigns['id']) . '"><i class="icon myfs-md ni ni-spark"></i></a>
                                            <a class="text-red" href="' . site_url('Management/Marketing/Campaigns/Delete/' . $campaigns['id']) . '"><i class="icon myfs-md ni ni-trash"></i></a>
                                        </td>
                                    </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- .card -->
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#marketingCampaignOverview').DataTable({
            "order": [[ 2, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>