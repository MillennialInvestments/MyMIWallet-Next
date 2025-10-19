<?php log_message('debug', 'Projects\index\project_chart - $chartData: ' . json_encode($chartData, JSON_PRETTY_PRINT)); ?>
<div class="card card-bordered">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Project Growth Overview</h6>
                <p>Visualize month-to-month and year-to-year performance metrics.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-primary full-width" data-bs-toggle="dropdown">
                        Chart Settings
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-3">
                        <ul class="link-list-opt no-bdr">
                            <li class="p-1">
                                <label>Start Date</label>
                                <input type="date" id="start-date" class="form-control">
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <label>Historical Timeline</label>
                                <ul class="link-list-opt no-bdr" id="chart-lower-options">
                                    <li data-value="-12" class="option active">Past 12 Months</li>
                                    <li data-value="-6" class="option">Past 6 Months</li>
                                    <li data-value="-3" class="option">Past 3 Months</li>
                                    <li data-value="-1" class="option">Past 1 Month</li>
                                    <li data-value="0" class="option">Only Forward</li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <label>Forward-Looking</label>
                                <ul class="link-list-opt no-bdr" id="chart-upper-options">
                                    <li data-value="12" class="option active">12 Months</li>
                                    <li data-value="6" class="option">6 Months</li>
                                    <li data-value="3" class="option">3 Months</li>
                                    <li data-value="1" class="option">1 Month</li>
                                    <li data-value="0" class="option">Only Backward</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <canvas id="project-growth-chart" class="h-100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const projectData = <?= json_encode($chartData, JSON_HEX_TAG); ?>;
    console.log('Project Data:', projectData);

    const initializeChart = () => {
        const ctx = document.getElementById('project-growth-chart').getContext('2d');
        return new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(projectData),
                datasets: [
                    {
                        label: 'Revenue',
                        data: Object.values(projectData).map(item => item.revenue),
                        borderColor: '#3E61BC',
                        borderWidth: 2,
                        fill: false,
                    },
                    {
                        label: 'Investments',
                        data: Object.values(projectData).map(item => item.investments),
                        borderColor: '#1ee0ac',
                        borderWidth: 2,
                        fill: false,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => `$${value.toLocaleString()}`,
                        },
                    },
                },
            },
        });
    };

    const updateChartData = (chart) => {
        const lowerRange = parseInt(document.querySelector('#chart-lower-options .option.active')?.dataset.value || -12);
        const upperRange = parseInt(document.querySelector('#chart-upper-options .option.active')?.dataset.value || 12);

        const startDate = new Date();
        startDate.setMonth(startDate.getMonth() + lowerRange);
        const endDate = new Date();
        endDate.setMonth(endDate.getMonth() + upperRange);

        const labels = [];
        const revenueData = [];
        const investmentData = [];

        for (let d = new Date(startDate); d <= endDate; d.setMonth(d.getMonth() + 1)) {
            const label = `${d.toLocaleString('default', { month: 'short' })} ${d.getFullYear()}`;
            labels.push(label);

            const month = d.getMonth() + 1;
            const year = d.getFullYear();
            const dataKey = `${year}-${month.toString().padStart(2, '0')}`;
            const revenue = projectData[dataKey]?.revenue || 0;
            const investment = projectData[dataKey]?.investments || 0;

            revenueData.push(revenue);
            investmentData.push(investment);
        }

        chart.data.labels = labels;
        chart.data.datasets[0].data = revenueData;
        chart.data.datasets[1].data = investmentData;
        chart.update();
    };

    const chart = initializeChart();

    document.querySelectorAll('#chart-lower-options .option, #chart-upper-options .option').forEach(option => {
        option.addEventListener('click', function () {
            this.closest('ul').querySelectorAll('.option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            updateChartData(chart);
        });
    });

    updateChartData(chart);
});
</script>
