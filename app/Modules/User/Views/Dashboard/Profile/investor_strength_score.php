<div class="card card-bordered">
    <div class="card-inner">
        <h6 class="title">Investor Strength Score</h6>
        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
            <div class="nk-sale-data-group flex-md-nowrap g-4">
                <div class="nk-sale-data">
                    <span class="amount">1,429.59 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                    <span class="sub-title">This Month</span>
                </div>
            </div>
            <div class="nk-sale-data-group flex-md-nowrap g-4">
                <div class="nk-sale-data">
                    <span class="amount">729.59 <span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                    <span class="sub-title">This Week</span>
                </div>
            </div>
            <!-- <div class="nk-sales-ck sales-revenue">
                <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
            </div> -->
        </div>
    </div>
    <div class="card-inner">
        <h4>Achievements & Highlights</h4>
        <?php if (!$completedGoals) : ?>                        
            <ul>
                <li>No Achievements Yet! <a href="<?= site_url('/MyMI-Gold/Goals/Daily') ?>">Get Started Here!</a></li>
            </ul>
        <?php else : ?>
            <ul>
                <li><em class="icon ni ni-check-circle"></em> 100 Trade Calls</li>
                <li><em class="icon ni ni-check-circle"></em> Top Investor Badge</li>
                <li><em class="icon ni ni-check-circle"></em> Early Adopter</li>
            </ul>
        <?php endif; ?>
        <!-- <h6 class="title">Favorite Assets</h6>
        <ul>
            <li>Crypto</li>
            <li>Stocks</li>
            <li>Real Estate</li>
        </ul> -->
    </div>
</div>