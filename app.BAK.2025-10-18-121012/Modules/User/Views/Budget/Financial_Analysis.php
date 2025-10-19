<?php
$current_year = date('Y');
$months = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];
$subViewData = [

]; 
?>
<?php $current_year = date('Y'); ?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('Budget\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Financial Analysis Report</h6>
                            <p>Yearly financial summary for the current year.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <div class="row g-4 align-end">
                            <div class="col-12">
                                <h6>Monthly Performance</h6>
                                <p>A quick visual summary of your incomes and expenses each month.</p>
                                <div class="nk-order-ovwg-ck" style="height:100%">
                                    <canvas id="monthlyPerformanceChart"></canvas>
                                    <script <?= $nonce['script'] ?? '' ?>>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const ctx = document.getElementById('monthlyPerformanceChart').getContext('2d');
                                            const chart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: <?= json_encode($months) ?>,
                                                    datasets: [
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
                                                        },
                                                        {
                                                            label: 'Surplus',
                                                            type: 'line',
                                                            data: <?= json_encode($surpluses) ?>,
                                                            borderColor: '#3E61BC',
                                                            borderWidth: 3,
                                                            pointBackgroundColor: '#3E61BC',
                                                            pointRadius: 7.5,
                                                            fill: true
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true,
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return (value < 0 ? '-$' : '$') + Math.abs(value).toLocaleString(undefined, {
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
                                                                return (value < 0 ? '-$' : '$') + Math.abs(value).toLocaleString(undefined, {
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
                    <hr>
                    <div class="nk-order-ovwg">
                        <div class="row g-4 align-top">
                            <div class="col-12 col-md-4">
                                <h6>Yearly Summary</h6>
                                <p>Overview of income, expenses, and surplus for the year.</p>
                                <div class="nk-order-ovwg-ck" style="height:100%">
                                    <canvas id="yearlySummaryChart"></canvas>
                                    <script <?= $nonce['script'] ?? '' ?>>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const ctx = document.getElementById('yearlySummaryChart').getContext('2d');
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
                                                                    return tooltipItem.label + ': $' + tooltipItem.raw.toLocaleString(undefined, {
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
                                <table class="table table-default financialAnalysisTable" id="financialAnalysisTable">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Income</th>
                                            <th>Expenses</th>
                                            <th>Surplus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($months as $index => $month) : ?>
                                            <tr>
                                                <td><?= $month ?></td>
                                                <td>$<?= number_format($incomes[$index], 2) ?></td>
                                                <td>$<?= number_format($expenses[$index], 2) ?></td>
                                                <td>$<?= number_format($surpluses[$index], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td><strong>Totals</strong></td>
                                            <td><strong>$<?= number_format($totalIncome, 2) ?></strong></td>
                                            <td><strong>$<?= number_format($totalExpenses, 2) ?></strong></td>
                                            <td><strong>$<?= number_format($totalSurplus, 2) ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $(".financialAnalysisTable").DataTable({});
    });
</script> -->
