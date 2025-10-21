<?php
$subViewData = []; 
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('Advisors/index/control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Certified Financial Advisors</h6>
                            <p>Find the best Certified Financial Advisors based on your financial forecast and needs.</p>
                        </div>
                    </div>
                    <table class="advisorRecommendationTable table table-default" id="certifiedAdviorsTable">
                        <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Advisor</th>
                                <th>Specialty</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($advisors as $advisor): ?>
                                <tr>
                                    <td class="d-none"><?= $advisor['id'] ?></td>
                                    <td><?= $advisor['name'] ?></td>
                                    <td><?= $advisor['specialty'] ?></td>
                                    <td><?= $advisor['location'] ?></td>
                                    <td><?= $advisor['contact'] ?></td>
                                    <td>
                                        <a href="<?= site_url('/CertifiedAdvisor/view/'.$advisor['id']) ?>">View</a> |
                                        <a href="<?= site_url('/CertifiedAdvisor/edit/'.$advisor['id']) ?>">Edit</a> |
                                        <a href="<?= site_url('/CertifiedAdvisor/delete/'.$advisor['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $(".certifiedAdviorsTable").DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            "columnDefs": [
                {
                    "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                    "visible": false,
                }
            ],
        });
    });
</script>