<!-- app/Modules/Management/Views/Email/campaigns.php -->
<?php
$subViewData = [
   
]; 
?>
<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">📩 Campaign Manager</h4>
            <div class="nk-block-des">
                <p>Manage all your email campaigns: drafts, scheduled, sent!</p>
            </div>
        </div>
    </div>

    <?php echo view('Email/resources/controlPanelBlock', $subViewData); ?>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="d-flex mb-3 gap-2">
                        <button class="btn btn-danger btn-sm" onclick="bulkDeleteCampaigns()">🗑️ Bulk Delete</button>
                        <button class="btn btn-success btn-sm" onclick="bulkScheduleCampaigns()">📅 Bulk Schedule</button>
                        <button class="btn btn-warning btn-sm" onclick="bulkRescheduleCampaigns()">⏳ Bulk Reschedule</button>
                    </div>
                    <p class="text-muted small">
                        ⚠️ Yellow rows = campaigns that missed their auto-schedule window and need manual action!
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="campaignsTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllCampaigns" onclick="toggleSelectAllCampaigns()"></th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Scheduled</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($campaigns)): ?>
                                    <?php foreach ($campaigns as $campaign): ?>
                                        <tr <?php if (!empty($campaign['auto_schedule_at']) && strtotime($campaign['auto_schedule_at']) < time() && $campaign['is_draft'] == 1): ?>class="table-warning"<?php endif; ?>>
                                            <td><input type="checkbox" class="campaignCheckbox" value="<?= $campaign['id'] ?>"></td>
                                            <td><?= esc($campaign['name']) ?></td>
                                            <td>
                                                <?php if (!empty($campaign['auto_schedule_at']) && strtotime($campaign['auto_schedule_at']) < time() && $campaign['is_draft'] == 1): ?>
                                                    <span class="badge bg-info">⏳ Auto-Scheduled</span>
                                                <?php elseif ($campaign['is_draft']): ?>
                                                    <span class="badge bg-warning">Draft</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($campaign['created_at']) ?></td>
                                            <td>
                                                <?php if (!empty($campaign['scheduled_at'])): ?>
                                                    <span id="countdown-<?= $campaign['id'] ?>"></span><br>
                                                    <small class="text-muted"><?= esc($campaign['scheduled_at']) ?></small>
                                                    <script <?= $nonce['script'] ?? '' ?>>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const countdown<?= $campaign['id'] ?> = document.getElementById('countdown-<?= $campaign['id'] ?>');
                                                        function updateCountdown<?= $campaign['id'] ?>() {
                                                            const now = new Date().getTime();
                                                            const target = new Date("<?= esc($campaign['scheduled_at']) ?> UTC").getTime();
                                                            const distance = target - now;
                                                            if (distance < 0) {
                                                                countdown<?= $campaign['id'] ?>.textContent = "⏳ Waiting...";
                                                                return;
                                                            }
                                                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                                            countdown<?= $campaign['id'] ?>.textContent = `${hours}h ${minutes}m ${seconds}s`;
                                                        }
                                                        setInterval(updateCountdown<?= $campaign['id'] ?>, 1000);
                                                    });
                                                    </script>
                                                <?php else: ?>
                                                    —
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-sm btn-info" onclick="viewCampaignStats(<?= $campaign['id'] ?>)">📊 View Stats</button>
                                                    <button class="btn btn-sm btn-primary" onclick='dynamicModalLoader("Edit Campaign","<?= site_url('Management/Email/editCampaign/' . $campaign['id']) ?>',"modal-lg")'>✏️ Edit</button>
                                                    
                                                    <?php if (!empty($campaign['auto_schedule_at']) && strtotime($campaign['auto_schedule_at']) < time() && $campaign['is_draft'] == 1): ?>
                                                        <button class="btn btn-sm btn-warning" onclick="rescheduleCampaign(<?= $campaign['id'] ?>)">⏳ Reschedule</button>
                                                    <?php else: ?>
                                                        <button class="btn btn-sm btn-success" onclick="scheduleCampaign(<?= $campaign['id'] ?>)">📅 Schedule</button>
                                                    <?php endif; ?>
                                                    
                                                    <button class="btn btn-sm btn-danger" onclick="deleteCampaign(<?= $campaign['id'] ?>)">🗑️ Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <tr><td class="text-center" colspan="5">No campaigns yet.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    $('#campaignsTable').DataTable({
        pageLength: 10,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        columnDefs: [
            { orderable: false, targets: 0 } // Disable sorting on checkbox column
        ],
        order: [[2, 'desc']], // Adjust sorting (Created At desc)
    });
});

async function bulkDeleteCampaigns() {
    const selected = getSelectedCampaigns();
    if (selected.length === 0) return alert('⛔ Please select at least one campaign.');

    if (!confirm(`⚠️ Are you sure you want to delete ${selected.length} campaigns?`)) return;

    for (const campaignId of selected) {
        await fetch(`<?= site_url('API/Email/deleteCampaign') ?>/${campaignId}`, {
            method: 'DELETE',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
    }
    alert('✅ Bulk delete completed.');
    location.reload();
}

async function bulkRescheduleCampaigns() {
    const selected = getSelectedCampaigns();
    if (selected.length === 0) return alert('⛔ Please select at least one campaign.');

    const newScheduledAt = prompt('Enter NEW UTC Date/Time for rescheduling all (YYYY-MM-DD HH:MM:SS):');
    if (!newScheduledAt) return alert('⛔ New schedule time required.');

    for (const campaignId of selected) {
        await fetch(`<?= site_url('API/Email/scheduleCampaignApi') ?>/${campaignId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ scheduled_at: newScheduledAt })
        });
    }
    alert('✅ Bulk reschedule completed.');
    location.reload();
}

async function bulkScheduleCampaigns() {
    const selected = getSelectedCampaigns();
    if (selected.length === 0) return alert('⛔ Please select at least one campaign.');

    const scheduledAt = prompt('Enter UTC Date/Time to schedule all (YYYY-MM-DD HH:MM:SS):');
    if (!scheduledAt) return alert('⛔ Schedule time required.');

    for (const campaignId of selected) {
        await fetch(`<?= site_url('API/Email/scheduleCampaignApi') ?>/${campaignId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ scheduled_at: scheduledAt })
        });
    }
    alert('✅ Bulk scheduling completed.');
    location.reload();
}

// Clone campaign
async function cloneCampaign(campaignId) {
    if (!confirm('Clone this campaign?')) return;
    const res = await fetch(`<?= site_url('API/Email/cloneCampaign/') ?>${campaignId}`);
    const data = await res.json();
    if (data.status === 'success') {
        alert('✅ Campaign cloned. New ID: ' + data.newCampaignId);
        location.reload();
    } else {
        alert('❌ Failed to clone.');
    }
}

async function deleteCampaign(campaignId) {
    if (!confirm('⚠️ Are you sure you want to delete this campaign?')) return;

    try {
        const response = await fetch("<?= site_url('API/Email/deleteCampaign') ?>/" + campaignId, {
            method: 'DELETE',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const data = await response.json();
        if (data.status === 'success') {
            alert('✅ Campaign deleted.');
            location.reload();
        } else {
            alert('❌ Failed to delete.');
        }
    } catch (err) {
        console.error('❌ Error deleting:', err);
        alert('❌ Server error.');
    }
}

async function getSelectedCampaigns() {
    const checkboxes = document.querySelectorAll('.campaignCheckbox:checked');
    return Array.from(checkboxes).map(cb => cb.value);
}

async function rescheduleCampaign(campaignId) {
    const newTime = prompt('⏳ Enter New UTC Time (YYYY-MM-DD HH:MM:SS):');
    if (!newTime) return alert('Time is required.');

    const response = await fetch("<?= site_url('API/Email/scheduleCampaignApi') ?>/" + campaignId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ scheduled_at: newTime })
    });

    const data = await response.json();
    if (data.status === 'success') {
        alert('✅ Rescheduled successfully!');
        location.reload();
    } else {
        alert('❌ Failed to reschedule.');
    }
}

async function scheduleCampaign(campaignId) {
    const scheduledAt = prompt('Enter UTC Date/Time to schedule (YYYY-MM-DD HH:MM:SS):');
    if (!scheduledAt) return alert('⛔ Schedule time required.');

    const response = await fetch("<?= site_url('API/Email/scheduleCampaignApi') ?>/" + campaignId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ scheduled_at: scheduledAt })
    });

    const data = await response.json();
    if (data.status === 'success') {
        alert('✅ Scheduled successfully!');
        location.reload();
    } else {
        alert('❌ Error scheduling campaign.');
    }
}

async function toggleSelectAllCampaigns() {
    const master = document.getElementById('selectAllCampaigns');
    const checkboxes = document.querySelectorAll('.campaignCheckbox');
    checkboxes.forEach(cb => cb.checked = master.checked);
}

async function viewCampaignStats(campaignId) {
    const modal = await dynamicModalLoader('Campaign Analytics', "<?= site_url('Management/Email/campaignStats') ?>/" + campaignId);
}
</script>
