<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('Investments\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Investment Insights</h6>
                            <p>Analyze and get recommendations for your investments.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <table class="table" id="insightTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Current Price</th>
                                    <th>Change Percent</th>
                                    <th>Recommendation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($investDashboard['insights'] as $insight): ?>
                                    <tr>
                                        <td><?= $insight['symbol'] ?></td>
                                        <td><?= $insight['current_price'] ?></td>
                                        <td><?= $insight['change_percent'] ?></td>
                                        <td><?= $insight['recommendation'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
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
        $("#insightTable").DataTable({});
    });
</script>
