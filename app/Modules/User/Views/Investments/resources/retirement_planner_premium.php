<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Retirement Planner Premium</h6>
                        </div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <label for="current_age">Current Age</label>
                            <input type="number" class="form-control" name="current_age" id="current_age" value="<?= $plan['current_age'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="retirement_age">Retirement Age</label>
                            <input type="number" class="form-control" name="retirement_age" id="retirement_age" value="<?= $plan['retirement_age'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="monthly_savings">Monthly Savings</label>
                            <input type="number" class="form-control" name="monthly_savings" id="monthly_savings" value="<?= $plan['monthly_savings'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="current_savings">Current Savings</label>
                            <input type="number" class="form-control" name="current_savings" id="current_savings" value="<?= $plan['current_savings'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="estimated_annual_return">Estimated Annual Return (%)</label>
                            <input type="number" class="form-control" name="estimated_annual_return" id="estimated_annual_return" value="<?= $plan['estimated_annual_return'] ?? '6' ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Plan</button>
                    </form>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Detailed Retirement Projection</h6>
                        <ul>
                            <li>Years to Retirement: <?= $detailedProjection['years_to_retirement'] ?></li>
                            <li>Estimated Savings at Retirement: $<?= number_format($detailedProjection['estimated_savings'], 2) ?></li>
                            <li>Required Monthly Savings to Meet Goals: $<?= number_format($detailedProjection['required_monthly_savings'], 2) ?></li>
                            <li>Projected Annual Income Post-Retirement: $<?= number_format($detailedProjection['projected_annual_income'], 2) ?></li>
                        </ul>
                    </div>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Premium Retirement Recommendations</h6>
                        <ul>
                            <?php foreach ($premiumRecommendations as $recommendation): ?>
                                <li><?= $recommendation ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Advanced Retirement Savings Projection</h6>
                        <canvas id="advancedRetirementProjectionChart"></canvas>
                        <script <?= $nonce['script'] ?? '' ?>>
                            document.addEventListener('DOMContentLoaded', function () {
                                const ctx = document.getElementById('advancedRetirementProjectionChart').getContext('2d');
                                const chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: <?= json_encode($advancedVisualizations['age']) ?>,
                                        datasets: [
                                            {
                                                label: 'Estimated Savings',
                                                data: <?= json_encode($advancedVisualizations['savings']) ?>,
                                                borderColor: '#1ee0ac',
                                                borderWidth: 2,
                                                fill: false
                                            },
                                            {
                                                label: 'Savings Goal',
                                                data: <?= json_encode($advancedVisualizations['goal']) ?>,
                                                borderColor: '#e85347',
                                                borderWidth: 2,
                                                fill: false,
                                                borderDash: [5, 5]
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    callback: function(value) {
                                                        return '$' + value.toLocaleString(undefined, {
                                                            minimumFractionDigits: 2,
                                                            maximumFractionDigits: 2
                                                        });
                                                    }
                                                }
                                            }
                                        },
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem) {
                                                    let value = tooltipItem.yLabel;
                                                    return '$' + value.toLocaleString(undefined, {
                                                        minimumFractionDigits: 2,
                                                        maximumFractionDigits: 2
                                                    });
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
