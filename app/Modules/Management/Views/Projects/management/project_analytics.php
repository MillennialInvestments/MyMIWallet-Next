<?php
// log_message('debug', 'Management\Projects\project_analytics L2 - $analyticsData Array: ' . (print_r($analyticsData, true)));
?>

<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title">Project Investment Analytics</h5>
        <canvas id="projectAnalyticsChart"></canvas>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById("projectAnalyticsChart").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: <?= json_encode(array_column($analyticsData, 'name')); ?>,
            datasets: [{
                label: "Total Investments",
                data: <?= json_encode(array_column($analyticsData, 'total_investment')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
});
</script>
