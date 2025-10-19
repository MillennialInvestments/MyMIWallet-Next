<!-- app/Modules/Management/Views/Email/campaign_dashboard.php -->
<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Campaign Manager Dashboard</h3>
            <div class="nk-block-des text-soft">
                <p>Manage all Email Campaigns — Drafts, Scheduled, Sent, Analytics.</p>
            </div>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-4 align-center">
                <div class="col-lg-8">
                    <canvas id="campaignTrendChart" height="100"></canvas>
                </div>
                <div class="col-lg-4 text-end">
                    <button class="btn btn-primary" onclick="refreshCampaigns()">🔄 Refresh</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered mt-4">
        <div class="card-inner table-responsive">
            <table class="table table-striped" id="campaignTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Scheduled</th>
                        <th>Sent</th>
                        <th>Open Rate</th>
                        <th>Bounce Rate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamically populated -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered mt-4">
        <div class="card-inner">
            <h5 class="card-title">🏷️ Top Campaign Tags</h5>
            <ul id="tagAnalyticsList" class="list-unstyled"></ul>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/chart.js/2.1.2/Chart.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>

<script <?= $nonce['script'] ?? '' ?>>
async function loadTagAnalytics() {
    try {
        const response = await fetch(`<?= site_url('API/Email/fetchTagAnalytics') ?>`);
        const data = await response.json();

        if (data.status === 'success') {
            const list = document.getElementById('tagAnalyticsList');
            list.innerHTML = '';

            Object.entries(data.tags).slice(0, 10).forEach(([tag, count]) => {
                const li = document.createElement('li');
                li.textContent = `${tag} — ${count} campaigns`;
                list.appendChild(li);
            });
        }
    } catch (err) {
        console.error('Error loading tag analytics:', err);
    }
}


async function viewCampaignStats(campaignId) {
    const modal = await dynamicModalLoader('Campaign Analytics', "<?= site_url('Management/Email/viewCampaignStats') ?>/" + campaignId);

    try {
        const res = await fetch(`<?= site_url('API/Email/getCampaignStats') ?>/${campaignId}`);
        const data = await res.json();

        if (data.status === 'success') {
            renderCampaignStatsChart(data.stats);
        } else {
            alert('❌ Failed to load stats.');
        }
    } catch (err) {
        console.error('Error fetching stats:', err);
        alert('❌ An error occurred.');
    }
}

async function refreshCampaigns() {
    try {
        const response = await fetch("<?= site_url('API/Email/fetchCampaignAnalytics') ?>");
        const data = await response.json();

        if (data.status === 'success') {
            renderCampaignTable(data.campaigns);
            renderTrendChart(data.trend);
        }
    } catch (err) {
        console.error('Failed to fetch campaigns', err);
    }
}

function renderCampaignTable(campaigns) {
    const tbody = document.querySelector('#campaignTable tbody');
    tbody.innerHTML = '';

    campaigns.forEach(campaign => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${campaign.name}</td>
            <td>${campaign.status}</td>
            <td>${campaign.scheduled_at || '-'}</td>
            <td>${campaign.sent_at || '-'}</td>
            <td>${campaign.open_rate ?? 0}%</td>
            <td>${campaign.bounce_rate ?? 0}%</td>
            <td>
                <button class="btn btn-info btn-sm" onclick="viewCampaignStats(${campaign.id})">📊 Stats</button>
                <button class="btn btn-warning btn-sm" onclick="cloneCampaign(${campaign.id})">📋 Clone</button>
                <button class="btn btn-success btn-sm" onclick="editCampaign(${campaign.id})">✏️ Edit</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function renderTrendChart(trendData) {
    const ctx = document.getElementById('campaignTrendChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: trendData.dates,
            datasets: [
                {
                    label: 'Sent Emails',
                    data: trendData.sent,
                    borderColor: 'blue',
                    fill: false,
                },
                {
                    label: 'Open Rate %',
                    data: trendData.open_rate,
                    borderColor: 'green',
                    fill: false,
                },
                {
                    label: 'Bounce Rate %',
                    data: trendData.bounce_rate,
                    borderColor: 'red',
                    fill: false,
                },
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => value + '%'
                    }
                }
            }
        }
    });
}
document.addEventListener('DOMContentLoaded', loadTagAnalytics);
refreshCampaigns();
</script>