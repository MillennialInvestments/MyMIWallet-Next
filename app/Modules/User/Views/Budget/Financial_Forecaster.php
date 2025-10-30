<?php 
$current_year = date('Y'); 
$placeholder_actual_surplus = 0; 
$subViewData = [

]; 
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('UserModule\Views\Budget\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Financial Forecaster</h6>
                            <p>Forecast your financial performance over the next few years.</p>
                        </div>
                    </div>
                    <hr>
                    <form method="get">
                        <div class="form-group">
                            <label for="forecastPeriod">Select Forecast Period:</label>
                            <select id="forecastPeriod" name="forecastPeriod" class="form-control" onchange="this.form.submit()">
                                <?php foreach ($forecastYears as $year): ?>
                                    <option value="<?= $year ?>" <?= $forecastPeriod == $year ? 'selected' : '' ?>><?= $year ?> Year<?= $year > 1 ? 's' : '' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <div class="row g-4 align-end">
                            <div class="col-12">
                                <h6>Annual Financial Forecast &amp; Performance</h6>
                                <p>A quick visual summary of your forecasted incomes, expenses, and deviation from the forecasted path based on current performance.</p>
                                <div class="nk-order-ovwg-ck" style="height:100%">
                                    <canvas id="forecastPerformanceChart"></canvas>
                                    <script <?= $nonce['script'] ?? '' ?>>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const ctx = document.getElementById('forecastPerformanceChart').getContext('2d');
                                            const chart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: <?= json_encode($months) ?>,
                                                    datasets: [
                                                        {
                                                            label: 'Surplus',
                                                            type: 'line',
                                                            data: <?= json_encode($surpluses) ?>,
                                                            borderColor: '#3E61BC',
                                                            borderWidth: 3,
                                                            pointBackgroundColor: '#3E61BC',
                                                            pointRadius: 7.5,
                                                            fill: true
                                                        },
                                                        {
                                                            label: 'Actual Surplus',
                                                            type: 'line',
                                                            data: <?= json_encode($placeholder_actual_surplus) ?>,
                                                            borderColor: '#e85347',
                                                            borderWidth: 3,
                                                            pointBackgroundColor: '#e85347',
                                                            pointRadius: 7.5,
                                                            fill: true
                                                        },
                                                        {
                                                            label: 'Income',
                                                            data: <?= json_encode($incomes) ?>,
                                                            backgroundColor: '#1ee0ac',
                                                            borderColor: '#1ee0ac',
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Expenses',
                                                            data: <?= json_encode($expenses) ?>,
                                                            backgroundColor: '#e85347',
                                                            borderColor: '#e85347',
                                                            borderWidth: 1
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true,
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return '$' + value.toLocaleString('en-US', {
                                                                        minimumFractionDigits: 2,
                                                                        maximumFractionDigits: 2
                                                                    });
                                                                }
                                                            }
                                                        }
                                                    },
                                                    plugins: {
                                                        tooltip: {
                                                            callbacks: {
                                                                label: function(context) {
                                                                    let value = context.raw;
                                                                    return context.dataset.label + ': $' + value.toLocaleString('en-US', {
                                                                        minimumFractionDigits: 2,
                                                                        maximumFractionDigits: 2
                                                                    });
                                                                }
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
                    <hr>
                    <div class="nk-order-ovwg">
                        <div class="row g-4 align-top">
                            <div class="col-12 col-md-4">
                                <h6>Yearly Summary</h6>
                                <p>Overview of forecasted income, expenses, and surplus for the selected period.</p>
                                <div class="nk-order-ovwg-ck" style="height:100%">
                                    <canvas id="yearlyForecastSummaryChart"></canvas>
                                    <script <?= $nonce['script'] ?? '' ?>>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const ctx = document.getElementById('yearlyForecastSummaryChart').getContext('2d');
                                            const chart = new Chart(ctx, {
                                                type: 'pie',
                                                data: {
                                                    labels: ['Income', 'Expenses', 'Surplus'],
                                                    datasets: [{
                                                        data: [<?= $totalIncome ?>, <?= $totalExpenses ?>, <?= $totalSurplus ?>],
                                                        backgroundColor: ['#1ee0ac', '#e85347', '#3E61BC'],
                                                        hoverBackgroundColor: ['#1ee0ac', '#e85347', '#3E61BC']
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    plugins: {
                                                        legend: {
                                                            position: 'top',
                                                        },
                                                        tooltip: {
                                                            callbacks: {
                                                                label: function(tooltipItem) {
                                                                    return tooltipItem.label + ': $' + tooltipItem.raw.toLocaleString('en-US', {
                                                                        minimumFractionDigits: 2,
                                                                        maximumFractionDigits: 2
                                                                    });
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <table class="financialForecastTable table table-default" id="financialForecastTable">
                                    <thead>
                                        <tr>
                                            <th class="d-none">Index</th>
                                            <th>Month</th>
                                            <th>Income</th>
                                            <th>Expenses</th>
                                            <th>Surplus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($months as $index => $month): ?>
                                            <tr>
                                                <td class="d-none"><?= $i++ ?></td>
                                                <td><?= $month ?></td>
                                                <td>$<?= number_format($incomes[$index], 2) ?></td>
                                                <td>$<?= number_format($expenses[$index], 2) ?></td>
                                                <td>$<?= number_format($surpluses[$index], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>                                    
                                        <tr>
                                            <td class="d-none"></td>
                                            <td><strong>Totals</strong></td>
                                            <td><strong>$<?= number_format($totalIncome, 2) ?></strong></td>
                                            <td><strong>$<?= number_format($totalExpenses, 2) ?></strong></td>
                                            <td><strong>$<?= number_format($totalSurplus, 2) ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $(".financialForecastTable").DataTable({
            "order": [[ 0, "asc" ]],     
            "lengthMenu": [[12, 60, 120, 180, 240, 300, 360, -1], [1 + " Year", 5 + " Years", 10 + " Years", 15 + " Years", 20 + " Years", 25 + " Years", 30 + " Years", "All"]],
            "columnDefs": [
                {
                    "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                    "visible": false,
                }
            ],
        });
    });
</script>
