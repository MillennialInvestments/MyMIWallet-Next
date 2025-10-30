<?php
$current_year = date('Y');
$subViewData = [];
?>

<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Economic Data</h6>
                <p>Overview of economic data retrieved from the API.</p>
            </div>
        </div>
        <hr>
        <div class="nk-order-ovwg pb-5">
            <table class="table" id="economicDataTable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Notes</th>
                        <th>Last Updated</th>
                        <th>Source</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($economicData)): ?>
                        <?php foreach ($economicData as $data): ?>
                            <tr>
                                <td><?= esc($data['title']) ?></td>
                                <td><?= esc($data['notes']) ?></td>
                                <td><?= esc($data['last_updated']) ?></td>
                                <td><a href="<?= esc($data['source_link']) ?>" target="_blank">Source</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No data available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
$("#economicDataTable").DataTable({});
});
</script>