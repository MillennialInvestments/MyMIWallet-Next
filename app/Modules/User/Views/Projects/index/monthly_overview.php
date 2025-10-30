<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Monthly Overview</h6>
                <p>Key metrics and performance indicators for the current month.</p>
            </div>
        </div>
        <ul class="nk-block-tools g-3">
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Active Users</div>
                    <div class="nk-wg1-amount"><?php echo $totalActiveUsers ?? 0; ?></div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Active Partners</div>
                    <div class="nk-wg1-amount"><?php echo $totalActivePartners ?? 0; ?></div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Active Campaigns</div>
                    <div class="nk-wg1-amount"><?php echo $totalActiveCampaigns ?? 0; ?></div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Transaction Fees</div>
                    <div class="nk-wg1-amount">
                        $<?php echo is_numeric($totalTransFees) ? number_format((float)$totalTransFees, 2) : '0.00'; ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
