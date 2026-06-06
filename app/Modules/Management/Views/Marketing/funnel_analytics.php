<div class="container-fluid py-4">
    <h3>Social Funnel Analytics</h3>
    <p class="text-muted">Community marketing attribution from tracking links to revenue.</p>

    <div class="alert alert-info">
        Analytics only. This page does not post externally or send Zapier/TBI exports.
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <button class="btn btn-primary" onclick="loadFunnelAnalytics()">Refresh Metrics</button>
            <button class="btn btn-outline-primary" onclick="createSampleTracking()">Create Sample Tracking</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h5>Platform Metrics</h5>
            <pre id="platform-metrics" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
        <div class="col-md-4">
            <h5>Campaign Metrics</h5>
            <pre id="campaign-metrics" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
        <div class="col-md-4">
            <h5>Community Metrics</h5>
            <pre id="community-metrics" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
    </div>

    <div class="card card-bordered mt-4">
        <div class="card-inner">
            <h5>Tracking Links</h5>
            <pre id="tracking-links" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
    </div>
</div>

<script>
async function getJson(url) {
    const res = await fetch(url);
    return await res.json();
}
async function loadFunnelAnalytics() {
    document.getElementById('platform-metrics').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getPlatformMetrics') ?>'), null, 2);
    document.getElementById('campaign-metrics').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getCampaignMetrics') ?>'), null, 2);
    document.getElementById('community-metrics').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getCommunityMetrics') ?>'), null, 2);
    document.getElementById('tracking-links').textContent = JSON.stringify(await getJson('<?= site_url('API/Management/getTrackingLinks') ?>'), null, 2);
}
async function createSampleTracking() {
    const link = await getJson('<?= site_url('API/Management/createTrackingLink') ?>?platform_key=discord&source=discord&medium=community&campaign=sample-community-growth&content=sample-post&destination_url=<?= urlencode(site_url('/Register')) ?>');
    if (link.tracking_link_id) {
        await getJson('<?= site_url('API/Management/recordSocialClick') ?>?tracking_link_id=' + link.tracking_link_id);
        await getJson('<?= site_url('API/Management/recordSocialConversion') ?>?tracking_link_id=' + link.tracking_link_id + '&conversion_type=registration');
        await getJson('<?= site_url('API/Management/recordSocialConversion') ?>?tracking_link_id=' + link.tracking_link_id + '&conversion_type=revenue&conversion_value=49.99');
    }
    alert(JSON.stringify(link, null, 2));
    loadFunnelAnalytics();
}
document.addEventListener('DOMContentLoaded', loadFunnelAnalytics);
</script>
