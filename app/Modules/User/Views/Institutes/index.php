<?php $subViewData = []; ?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('UserModule\Views\Institutes\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Financial Institutions</h6>
                            <p>Find the best financial institutions based on your needs.</p>
                        </div>
                    </div>
                    <table class="institutionRecommendationTable table table-default" id="financialInstitutesTable">
                        <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Institution</th>
                                <th>Specialty</th>
                                <th>Location</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($institutes as $institute): ?>
                                <tr>
                                    <td class="d-none"><?= $institute['id'] ?></td>
                                    <td><?= $institute['name'] ?></td>
                                    <td><?= $institute['specialty'] ?></td>
                                    <td><?= $institute['location'] ?></td>
                                    <td><?= $institute['contact'] ?></td>
                                    <td>
                                        <a href="<?= site_url('/Institutes/view/' . $institute['id']) ?>">View</a> |
                                        <a href="<?= site_url('/Institutes/edit/' . $institute['id']) ?>">Edit</a> |
                                        <a href="<?= site_url('/Institutes/delete/' . $institute['id']) ?>" onclick='return confirm("Are you sure?")'>Delete</a>
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
        $(".institutionRecommendationTable").DataTable({
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "columnDefs": [
                {
                    "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                    "visible": false,
                }
            ],
        });
    });
</script>
