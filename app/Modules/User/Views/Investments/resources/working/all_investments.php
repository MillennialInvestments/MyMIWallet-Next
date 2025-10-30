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
                            <h6 class="title">All User Investments</h6>
                            <p>Overview of all your active investments and their performance.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Investment Records</h6>
                        <table class="table" id="userInvestmentsTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                    <th>Entry Price</th>
                                    <th>Current Price</th>
                                    <th>Shares</th>
                                    <th>Total Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userInvestments['totalUserInvestments'] as $record): ?>
                                    <tr>
                                        <td><?= $record['symbol'] ?></td>
                                        <td><?= $record['entry_price'] ?></td>
                                        <td><?= $record['current_price'] ?></td>
                                        <td><?= $record['shares'] ?></td>
                                        <td><?= $record['total_value'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <?php 
                        // !! - Fix the Investment Overview to be more of an easy-to-read analytical view and perspective on the front-end !! 
                        ?>
                        <h6>Investment Overview</h6>
                        <ul>
                            <li>Total Active Investments: <?= $userInvestments['totalTradeCount'] ?></li>
                            <li>Total Trade Value: <?= $userInvestments['totalTradeValueSum'] ?></li>
                            <li>Total Asset Value: <?= $userInvestments['totalAssetValueSum'] ?></li>
                            <li>Total Last Trade Value: <?= $userInvestments['totalLastTradeValueSum'] ?></li>
                            <li>Total Annual Trade Value: <?= $userInvestments['totalAnnualTradeValueSum'] ?></li>
                            <li>Total Annual Trade Performance: <?= $userInvestments['totalAnnualTradePerformance'] ?></li>
                            <li>This Month Trade Performance: <?= $userInvestments['thisMonthTradePerformance'] ?></li>
                            <li>Last Month Trade Performance: <?= $userInvestments['lastMonthTradePerformance'] ?></li>
                            <li>Total Active Trade Count: <?= $userInvestments['totalActiveTradeCount'] ?></li>
                            <li>User Watchlist: <?= json_encode($userInvestments['userWatchlist']) ?></li>
                            <li>User Top Gainers: <?= json_encode($userInvestments['userTopGainers']) ?></li>
                            <li>User Top Losers: <?= json_encode($userInvestments['userTopLosers']) ?></li>
                            <li>User Current Annual Value: <?= $userInvestments['userCurrentAnnualValue'] ?></li>
                            <li>User Current Annual Performance: <?= $userInvestments['userCurrentAnnualPerformance'] ?></li>
                            <li>User Current Annual Target: <?= $userInvestments['userCurrentAnnualTarget'] ?></li>
                            <li>Total User Assets Value: <?= $userInvestments['totalUserAssetsValue'] ?></li>
                            <li>Total User Assets Count: <?= $userInvestments['totalUserAssetsCount'] ?></li>
                            <li>Total User Asset Performance: <?= $userInvestments['totalUserAssetPerformance'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $("#userInvestmentsTable").DataTable({});
    });
</script>