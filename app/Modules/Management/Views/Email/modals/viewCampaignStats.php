<div class="modal-header">
    <h5 class="modal-title">📊 Campaign Analytics</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <div class="text-center mb-3">
        <canvas id="campaignStatsChart" height="180"></canvas>
    </div>

    <div class="row text-center">
        <div class="col">
            <h6>✅ Opens</h6>
            <div class="h5" id="stat-opens">0</div>
        </div>
        <div class="col">
            <h6>📨 Sent</h6>
            <div class="h5" id="stat-sent">0</div>
        </div>
        <div class="col">
            <h6>❌ Bounced</h6>
            <div class="h5" id="stat-bounced">0</div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/chart.js/2.1.2/Chart.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>

<script <?= $nonce['script'] ?? '' ?>>
function renderCampaignStatsChart(stats) {
    const ctx = document.getElementById('campaignStatsChart').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Opens', 'Bounced', 'Not Opened'],
            datasets: [{
                data: [stats.opens, stats.bounced, stats.sent - stats.opens - stats.bounced],
                backgroundColor: ['#28a745', '#dc3545', '#6c757d'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    document.getElementById('stat-opens').textContent = stats.opens;
    document.getElementById('stat-sent').textContent = stats.sent;
    document.getElementById('stat-bounced').textContent = stats.bounced;
}
</script>
