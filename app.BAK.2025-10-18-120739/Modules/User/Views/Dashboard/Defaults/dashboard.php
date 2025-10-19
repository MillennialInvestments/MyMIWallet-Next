<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">Admin Dashboard</h1>
                    </div>
                </div>
            </div>

            <!-- Display Notifications -->
            <?php if (isset($messages) && !empty($messages)): ?>
                <div class="alert-container">
                    <?php foreach ($messages as $type => $messageArray): ?>
                        <?php foreach ($messageArray as $message): ?>
                            <div class="alert alert-<?= esc($type) ?> mb-3">
                                <em class="icon ni ni-info"></em> <?= esc($message) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <h6 class="title">System Overview</h6>
                                <p>Quick summary of recent activities and key metrics.</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <h6 class="title">Performance Metrics</h6>
                                <p>Analyze user activities, alerts, and transactions.</p>
                                <canvas class="order-overview-chart" id="orderOverview"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
