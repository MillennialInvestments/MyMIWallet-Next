<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Financial Reports</h6>
                            <p>Detailed financial reports of your investments.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Profit & Loss Statement</h6>
                        <table class="table" id="profitLossTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Purchase Price</th>
                                    <th>Current Price</th>
                                    <th>Quantity</th>
                                    <th>Profit/Loss</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($investDashboard['financialReports']['profit_loss_statement'] as $item): ?>
                                    <tr>
                                        <td><?= $item['symbol'] ?></td>
                                        <td><?= $item['purchase_price'] ?></td>
                                        <td><?= $item['current_price'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= $item['profit_loss'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">sset Allocation</h6>
                            <p>Detailed financial reports of your investments.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <ul>
                            <?php foreach ($investDashboard['financialReports']['asset_allocation'] as $type => $value): ?>
                                <li><?= $type ?>: <?= $value ?>%</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">sset Allocation</h6>
                            <p>Detailed financial reports of your investments.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Historical Performance</h6>
                        <table class="table" id="performanceTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Purchase Date</th>
                                    <th>Purchase Price</th>
                                    <th>Current Price</th>
                                    <th>Quantity</th>
                                    <th>Profit/Loss</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($investDashboard['financialReports']['historical_performance'] as $item): ?>
                                    <tr>
                                        <td><?= $item['symbol'] ?></td>
                                        <td><?= $item['purchase_date'] ?></td>
                                        <td><?= $item['purchase_price'] ?></td>
                                        <td><?= $item['current_price'] ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td><?= $item['profit_loss'] ?></td>
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
        $("#profitLossTable").DataTable({});
        $("#performanceTable").DataTable({});
    });
</script>