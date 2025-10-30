<div class="card card-bordered mt-4">
    <div class="card-header">
        <h4 class="card-title">Analytics Dashboard</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-xxl-6">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title">Email Open Rates</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="emailOpenRateChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xxl-6">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title">User Engagement</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="userEngagementChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Email Open Rate Chart
    var ctx = document.getElementById('emailOpenRateChart').getContext('2d');
    var emailOpenRateChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Email Open Rate',
                data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // User Engagement Chart
    var ctx2 = document.getElementById('userEngagementChart').getContext('2d');
    var userEngagementChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'User Engagement',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>