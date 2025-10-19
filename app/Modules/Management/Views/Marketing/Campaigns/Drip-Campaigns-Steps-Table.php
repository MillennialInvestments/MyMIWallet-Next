<!-- app/Modules/Management/Views/Marketing/Campaigns/Drip-Campaigns-Steps-Table.php -->
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Marketing - Drip Campaign Steps</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="btn btn-primary text-white dynamicModalLoader"
                               data-formtype="Marketing"
                               data-endpoint="addCampaignStep"
                               data-category="Add"
                               data-accountid="<?= $cuID; ?>">
                                <i class="icon ni ni-plus-circle"></i>
                                <span class="pl-0" style="padding-top:3px;">Add Step</span>
                            </a>
                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Step Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
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
                        <table class="table table-striped table-bordered" id="marketingActiveDripCampaignStepsOverview">
                            <thead>
                                <tr>
                                    <th>Step #</th>
                                    <th>Campaign ID</th>
                                    <th>Step Name</th>
                                    <th>Email Subject</th>
                                    <th>Delay</th>
                                    <th>View File</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $getCampaignSteps = $getActiveDripCampaignSteps;
                            if (isset($getCampaignSteps['result']) && is_array($getCampaignSteps['result'])) {
                                foreach ($getCampaignSteps['result'] as $step) {
                                    echo '
                                    <tr>
                                        <td>' . $step['step_number'] . '</td>
                                        <td>' . $step['campaign_id'] . '-' . $step['id'] . '</td>
                                        <td>' . $step['name'] . '</td>
                                        <td>' . $step['subject'] . '</td>
                                        <td>' . $step['delay_days'] . 'd ' . $step['delay_hours'] . 'h</td>
                                        <td>' . $step['view_file'] . '</td>
                                        <td>' . ($step['is_active'] == 1 ? 'Active' : 'Inactive') . '</td>
                                        <td>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="viewCampaignStep" data-accountid="' . $step['id']. '"><i class="icon myfs-md ni ni-eye"></i></a>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="editCampaignStep" data-accountid="' . $step['id']. '"><i class="icon myfs-md ni ni-edit"></i></a>
                                            <a class="dynamicModalLoader" data-formtype="Drip-Campaign" data-endpoint="generateCampaignStepContent" data-accountid="' . $step['id']. '"><i class="icon myfs-md ni ni-spark"></i></a>
                                            <a class="dynamicModalLoader text-red" data-formtype="Drip-Campaign" data-endpoint="deleteCampaignStep" data-accountid="' . $step['id']. '"><i class="icon myfs-md ni ni-trash"></i></a>
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="8" class="text-center">No steps found.</td></tr>';
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
        $('#marketingActiveDripCampaignStepsOverview').DataTable({
            "order": [[0, "asc"]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
