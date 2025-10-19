<!-- /resources/dripCampaignBlock.php -->
<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title">📬 Drip Campaign Overview</h5>

        <ul class="list-group">
            <?php if (!empty($dripCampaigns)): ?>
                <?php foreach ($dripCampaigns as $campaign): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?= esc($campaign['name']) ?></strong>
                            <br>
                            <small class="text-muted">Trigger: <?= esc($campaign['trigger_event']) ?></small>
                        </div>
                        <a href="<?= site_url("Management/Drip-Campaigns/{$campaign['id']}/Steps") ?>"
                           class="btn btn-sm btn-outline-primary">View Steps</a>
                    </li>
                <?php endforeach ?>
            <?php else: ?>
                <li class="list-group-item text-muted">No active drip campaigns found.</li>
            <?php endif ?>
        </ul>

        <div class="mt-3">
            <a href="<?= site_url('Management/Drip-Campaigns/Create') ?>" class="btn btn-sm btn-success">
                + New Campaign
            </a>
            <a href="<?= site_url('Management/Drip-Campaigns/TestCron') ?>" class="btn btn-sm btn-warning">
                🔁 Test CRON Now
            </a>
        </div>
    </div>
</div>
