<div class="container-fluid py-4">
    <h3>Social Campaign Calendar</h3>
    <p class="text-muted">Internal campaign planning and schedule readiness. No external posting.</p>

    <div class="alert alert-info">Scheduling rows only become internal “ready” records. Zapier/TBI exports remain disabled until explicitly enabled.</div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <input id="campaign-title" class="form-control mb-2" value="MyMI Wallet Community Growth Campaign">
            <button class="btn btn-primary" onclick="createCampaign()">Create Campaign</button>
            <button class="btn btn-outline-primary" onclick="loadCampaigns()">Refresh</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5>Campaigns</h5>
            <pre id="campaigns" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
        <div class="col-md-6">
            <h5>Schedule</h5>
            <pre id="schedule" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
    </div>
</div>

<script>
async function getJson(url) {
    const res = await fetch(url);
    return await res.json();
}
async function createCampaign() {
    const title = encodeURIComponent(document.getElementById('campaign-title').value);
    const data = await getJson('<?= site_url('API/Management/createSocialCampaign') ?>?title=' + title);
    alert(JSON.stringify(data, null, 2));
    loadCampaigns();
}
async function loadCampaigns() {
    document.getElementById('campaigns').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getSocialCampaigns') ?>'), null, 2);
    document.getElementById('schedule').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getSocialCampaignSchedule') ?>'), null, 2);
}
document.addEventListener('DOMContentLoaded', loadCampaigns);
</script>
