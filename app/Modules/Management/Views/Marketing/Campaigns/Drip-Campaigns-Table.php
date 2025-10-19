<!-- app/Modules/Management/Views/Marketing/Campaigns/Drip-Campaigns-Table.php -->
<div class="card card-bordered h-100" id="active-campaigns-overview">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Marketing - Drip Campaigns</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="btn btn-primary text-white dynamicModalLoader" data-formtype="Marketing" data-endpoint="addCampaign" data-category="Add" data-accountid="<?= $cuID; ?>">
                                <i class="icon ni ni-plus-circle"></i>
                                <span class="pl-0" style="padding-top:3px;">Add Campaign</span>
                            </a>
                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
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
                        <table class="table table-striped table-bordered" id="marketingActiveDripCampaignsOverview">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Trigger</th>
                                    <th>Audience Tags</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if (isset($getActiveDripCampaigns['result']) && is_array($getActiveDripCampaigns['result'])) {
                                foreach ($getActiveDripCampaigns['result'] as $campaign) {
                                    echo '
                                    <tr>
                                        <td>' . $campaign['id'] . '</td>
                                        <td><a class="btn text-primary dynamicModalLoader" data-formtype="Marketing" data-endpoint="viewCampaign" data-category="View" data-accountid="' . $campaign['id'] . '">' . $campaign['name'] . '</a></td>
                                        <td>' . ($campaign['trigger_event'] ?? 'n/a') . '</td>
                                        <td>' . ($campaign['audience_tags'] ?? '-') . '</td>
                                        <td>' . ucfirst($campaign['priority'] ?? 'low') . '</td>
                                        <td>' . ($campaign['is_active'] ? 'Active' : 'Inactive') . '</td>
                                        <td>' . date('M d, Y', strtotime($campaign['created_at'])) . '</td>
                                        <td>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="viewCampaign" data-accountid="' . $campaign['id']. '"><i class="icon myfs-md ni ni-eye"></i></a>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="editCampaign" data-accountid="' . $campaign['id']. '"><i class="icon myfs-md ni ni-edit"></i></a>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="generateCampaignContent" data-accountid="' . $campaign['id']. '"><i class="icon myfs-md ni ni-spark"></i></a>
                                            <a class="dynamicModalLoader text-red" data-formtype="Drip-Campaign" data-endpoint="deleteCampaign" data-accountid="' . $campaign['id']. '"><i class="icon myfs-md ni ni-trash"></i></a>
                                        </td>
                                    </tr>';
                                }
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
    $(document).ready(function () {
        $('#marketingActiveDripCampaignsOverview').DataTable({
            "order": [[0, "asc"]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
