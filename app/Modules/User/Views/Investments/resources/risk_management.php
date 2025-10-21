<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('Investments/index/control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Risk Management Tools</h6>
                            <p>Manage and analyze your investment risks.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Volatility Analysis</h6>
                        <ul>
                            <?php foreach ($investDashboard['riskManagement']['volatility_analysis'] as $analysis): ?>
                                <li><?= $analysis['symbol'] ?>: <?= $analysis['volatility'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                        <h6>Scenario Planning</h6>
                        <ul>
                            <?php foreach ($investDashboard['riskManagement']['scenario_planning'] as $scenario): ?>
                                <li><?= $scenario['symbol'] ?> - <?= $scenario['scenario'] ?>: <?= $scenario['value_change'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                        <h6>Stress Testing</h6>
                        <ul>
                            <?php foreach ($investDashboard['riskManagement']['stress_testing'] as $test): ?>
                                <li><?= $test['symbol'] ?> - <?= $test['scenario'] ?>: <?= $test['value_change'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>