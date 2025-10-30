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
                            <h6 class="title">Tax Report</h6>
                            <p>Details of your tax liabilities.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <table class="table" id="taxReportTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Entry Price</th>
                                    <th>Current Price</th>
                                    <th>Gain</th>
                                    <th>Tax Liability</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($investDashboard['taxReport'] as $item): ?>
                                    <tr>
                                        <td><?= $item['symbol'] ?></td>
                                        <td><?= $item['entry_price'] ?></td>
                                        <td><?= $item['current_price'] ?></td>
                                        <td><?= $item['gain'] ?></td>
                                        <td><?= $item['tax_liability'] ?></td>
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
        $("#taxReportTable").DataTable({});
    });
</script>