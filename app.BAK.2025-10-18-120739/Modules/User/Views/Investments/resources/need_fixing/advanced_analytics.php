<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Advanced Analytics</h6>
                            <p>Detailed insights and analytics of your investment portfolio.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Portfolio Diversification</h6>
                        <ul>
                            <?php foreach ($analyticsData['diversification'] as $type => $count): ?>
                                <li><?= $type ?>: <?= $count ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <h6>Average Return on Investment (ROI)</h6>
                        <p><?= number_format($analyticsData['averageROI'], 2) ?>%</p>
                        <!-- Add more analytics displays as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
