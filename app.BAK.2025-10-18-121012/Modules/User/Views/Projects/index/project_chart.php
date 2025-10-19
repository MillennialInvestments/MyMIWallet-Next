<?php // log_message('debug', 'Projects\index\project_chart - $chartData: ' . json_encode($chartData, JSON_PRETTY_PRINT)); ?>
<div class="card card-bordered">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Project Growth Overview</h6>
                <p>Visualize month-to-month and year-to-year performance metrics.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <a class="btn btn-warning text-white me-2 dynamicModalLoader" data-formtype="Projects" data-endpoint="Add" data-category="commitProject" data-accountid="<?= $cuID; ?>">Commit</a>
                <a class="btn btn-success text-white me-2 dynamicModalLoader" data-formtype="Projects" data-endpoint="Add" data-category="investProject" data-accountid="<?= $cuID; ?>">Invest</a>
                <a class="btn btn-danger text-white me-2 dynamicModalLoader" data-formtype="Projects" data-endpoint="Add" data-category="sellProject" data-accountid="<?= $cuID; ?>">Sell</a>
                <a class="btn btn-default me-2 dynamicModalLoader" data-formtype="Projects" data-endpoint="Add" data-category="discussProject" data-accountid="<?= $cuID; ?>">Join Discussion</a>
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

    const generateDateLabels = (lowerRange, upperRange) => {
        const labels = [];
        const currentDate = new Date();

        // Generate range dynamically
        for (let i = lowerRange; i <= upperRange; i++) {
            const date = new Date(currentDate.getFullYear(), currentDate.getMonth() + i, 1);
            const label = `${date.toLocaleString('default', { month: 'short' })} ${date.getFullYear()}`;
            const key = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;

            labels.push({ label, key });
        }

        return labels;
    };

    const initializeChart = () => {
        const ctx = document.getElementById('project-growth-chart').getContext('2d');
        return new Chart(ctx, {
            type: 'line',
            data: {
                labels: [], // Initially empty
                datasets: [
                    {
                        label: 'Commitments',
                        data: [],
                        borderColor: '#FF6F61',
                        borderWidth: 2,
                        fill: false,
                    },
                    {
                        label: 'Investments',
                        data: [],
                        borderColor: '#1ee0ac',
                        borderWidth: 2,
                        fill: false,
                    },
                    {
                        label: 'Revenue',
                        data: [],
                        borderColor: '#3E61BC',
                        borderWidth: 2,
                        fill: false,
                    },
                    {
                        label: 'ROI Distributed',
                        data: [],
                        borderColor: '#FFA500',
                        borderWidth: 2,
                        fill: false,
                    },
                ],
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

    const updateChartData = (chart, lowerRange, upperRange) => {
        const dateLabels = generateDateLabels(lowerRange, upperRange);
        const commitmentsData = [];
        const investmentsData = [];
        const revenueData = [];
        const roiDistributedData = [];

        dateLabels.forEach(({ label, key }) => {
            commitmentsData.push(projectData[key]?.commitments || 0);
            investmentsData.push(projectData[key]?.investments || 0);
            revenueData.push(projectData[key]?.revenue || 0);
            roiDistributedData.push(projectData[key]?.roi_distributed || 0);
        });

        chart.data.labels = dateLabels.map(d => d.label);
        chart.data.datasets[0].data = commitmentsData;
        chart.data.datasets[1].data = investmentsData;
        chart.data.datasets[2].data = revenueData;
        chart.data.datasets[3].data = roiDistributedData;
        chart.update();
    };

    const chart = initializeChart();

    const lowerRange = -12;
    const upperRange = 12;

    updateChartData(chart, lowerRange, upperRange);

    document.querySelectorAll('#chart-lower-options .option, #chart-upper-options .option').forEach(option => {
        option.addEventListener('click', function () {
            const lower = parseInt(document.querySelector('#chart-lower-options .option.active')?.dataset.value || -12);
            const upper = parseInt(document.querySelector('#chart-upper-options .option.active')?.dataset.value || 12);

            document.querySelectorAll('.option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');

            updateChartData(chart, lower, upper);
        });
    });
});

</script>
