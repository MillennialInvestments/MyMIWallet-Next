<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('UserModule\Views\Investments\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Symbols</h6>
                            <p>List of symbols retrieved from the API.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <table class="table table-striped" id="symbolListingTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Region</th>
                                    <th>Market Open</th>
                                    <th>Market Close</th>
                                    <th>Timezone</th>
                                    <th>Currency</th>
                                    <th>Match Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php log_message('debug', '$investDashboard[getSymbols]' . print_r($investDashboard['getSymbols'], true)); ?> 
                                <?php if (!empty($investDashboard['getSymbols']['bestMatches'])): ?>
                                    <?php foreach ($investDashboard['getSymbols']['bestMatches'] as $symbol): ?>
                                        <tr>
                                            <td><?= $symbol['1. symbol'] ?></td>
                                            <td><?= $symbol['2. name'] ?></td>
                                            <td><?= $symbol['3. type'] ?></td>
                                            <td><?= $symbol['4. region'] ?></td>
                                            <td><?= $symbol['5. marketOpen'] ?></td>
                                            <td><?= $symbol['6. marketClose'] ?></td>
                                            <td><?= $symbol['7. timezone'] ?></td>
                                            <td><?= $symbol['8. currency'] ?></td>
                                            <td><?= $symbol['9. matchScore'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9">No symbols available.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener('DOMContentLoaded', function() {
        $('#symbolListingTable').DataTable();
    });
</script>
