<div class="modal-body">
    <canvas id="campaignStatsChart" style="height:300px"></canvas>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', async function() {
    const ctx = document.getElementById('campaignStatsChart').getContext('2d');
    const response = await fetch("<?= site_url('API/Email/getCampaignMetrics/'.$campaign['id']) ?>");
    const stats = await response.json();

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sent', 'Opened', 'Bounced'],
            datasets: [{
                label: 'Emails',
                data: [stats.sent, stats.opened, stats.bounced],
                backgroundColor: ['#007bff', '#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
