<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Analytics & KPIs</h6>
                <p>Important analytics and key performance indicators.</p>
            </div>
        </div>
        <ul class="nk-block-tools g-3">
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">User Growth</div>
                    <div class="nk-wg1-amount"><?php echo $usersPercentage; ?>%</div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Approved Assets</div>
                    <div class="nk-wg1-amount"><?php echo $totalApprovedAssets; ?></div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Pending Assets</div>
                    <div class="nk-wg1-amount"><?php echo $totalPendingAssets; ?></div>
                </div>
            </li>
            <li>
                <div class="nk-wg1">
                    <div class="nk-wg1-title">Goals Progress</div>
                    <div class="nk-wg1-amount"><?php echo count($userGoals); ?> Goals</div>
                </div>
            </li>
        </ul>
    </div>
</div>
