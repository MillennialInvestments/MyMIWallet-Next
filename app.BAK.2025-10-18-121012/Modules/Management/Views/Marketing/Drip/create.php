<?php // /app/Modules/Management/Views/Marketing/Drip/create.php ?>
<div class="container mt-5">
    <h1 class="mb-4">📤 Create New Drip Campaign</h1>
    <form method="post" action="<?= site_url('Management/Drip-Campaigns/store') ?>" id="dripCampaignForm">

        <!-- 🎯 Campaign Basics -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Campaign Name</label>
                <input type="text" name="name" class="form-control" required placeholder="e.g. Welcome Series">
            </div>
            <div class="col-md-6">
                <label for="trigger_event" class="form-label">Trigger Event(s)</label>
                <select name="trigger_event[]" class="form-select" multiple required>
                    <?php
                    $events = [
                        'user_registration', 'email_verified', 'account_funded', 'first_investment',
                        'portfolio_threshold_reached', 'premium_upgrade', 'investment_activity',
                        'budget_completed', 'exchange_connected', 'referral_signup', 'referral_activated',
                        'user_inactive_30d', 'user_inactive_90d', 'my_projects_submission',
                        'trader_mode_enabled', 'wallet_backed_up', 'goal_created', 'debt_paid_off'
                    ];
                    foreach ($events as $e) echo "<option value=\"$e\">".ucwords(str_replace('_', ' ', $e))."</option>";
                    ?>
                </select>
                <div class="form-text">Hold Ctrl/Cmd to select multiple.</div>
            </div>
        </div>

        <!-- 🎯 Audience -->
        <div class="mb-3">
            <label for="audience_tags" class="form-label">Target Audience Tags</label>
            <input type="text" name="audience_tags" class="form-control" placeholder="e.g. beginners, crypto, premium">
        </div>

        <div class="mb-3">
            <label for="segment_id" class="form-label">User Segment</label>
            <select name="segment_id" class="form-select">
                <option value="">-- Optional Segment --</option>
                <option value="1">Active Investors (30d)</option>
                <option value="2">Inactive Users (90d+)</option>
                <option value="3">Budgeting Users</option>
                <option value="4">Premium Subscribers</option>
                <option value="5">Crypto-Only</option>
                <option value="6">Referrers w/o Referrals</option>
                <option value="7">No Investment Activity</option>
                <option value="8">Solana Traders</option>
                <option value="9">Desktop Users</option>
                <option value="10">Overdue Goals</option>
            </select>
        </div>

        <!-- 📝 Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Campaign Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Purpose, use case, goals."></textarea>
        </div>

        <!-- 🛠 Content Settings -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="content_type" class="form-label">Content Type</label>
                <select name="content_type" class="form-select" required>
                    <option value="email">Email</option>
                    <option value="discord">Discord Alert</option>
                    <option value="blog">Blog Post</option>
                    <option value="social">Social Media Post</option>
                    <option value="in_app">In-App Notification</option>
                    <option value="sms">SMS Text</option>
                    <option value="video">Video Script Prompt</option>
                    <option value="webhook">Webhook Trigger</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="template_id" class="form-label">Select Template</label>
                <select name="template_id" class="form-select">
                    <option value="">-- Template --</option>
                    <?php
                    $templates = [
                        'welcome_default' => 'Welcome Series',
                        'getting_started_guide' => 'Getting Started Guide',
                        'budget_tips' => 'Budget Tips Series',
                        'portfolio_milestone' => 'Portfolio Milestone',
                        'premium_upsell' => 'Premium Promo',
                        'investment_checkin' => 'Investment Check-In',
                        'crypto_watchlist' => 'Crypto Watchlist',
                        'referral_rewards' => 'Referral Rewards',
                        'inactive_reengage' => 'Re-Engagement Series',
                        'market_digest' => 'Weekly Digest',
                        'project_pitch_promo' => 'MyMI Projects Promo',
                        'custom' => 'Custom (Write Your Own)'
                    ];
                    foreach ($templates as $key => $label) echo "<option value=\"$key\">$label</option>";
                    ?>
                </select>
            </div>
        </div>
        <div id="templatePreview" class="mt-3 alert alert-secondary small"></div>

        <!-- 🔗 UTM Tracking -->
        <div class="row mb-3">
            <div class="col-md-4"><label class="form-label">UTM Source</label><input type="text" name="utm_source" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">UTM Medium</label><input type="text" name="utm_medium" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">UTM Campaign</label><input type="text" name="utm_campaign" class="form-control"></div>
        </div>

        <!-- 🤖 AI Options -->
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="enable_ai" id="enable_ai" value="1" checked>
            <label class="form-check-label" for="enable_ai">Enable AI-Enhanced Personalization</label>
        </div>

        <!-- ⏱ Scheduling -->
        <div class="row mb-4">
            <div class="col-md-4"><label class="form-label">Delay (hours)</label><input type="number" name="send_delay" class="form-control" min="0" value="0"></div>
            <div class="col-md-4"><label class="form-label">Send Time</label><input type="time" name="schedule_time" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">Send Window</label><input type="text" name="send_window" class="form-control" placeholder="e.g. 09:00–17:00"></div>
        </div>

        <!-- 📦 Optional JSON Logic -->
        <div class="mb-3">
            <label for="logic_json" class="form-label">Advanced Trigger Logic (JSON)</label>
            <textarea name="logic_json" class="form-control" placeholder='e.g. {"if":"budget_completed","then":"send"}'></textarea>
        </div>

        <!-- ✅ Status -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">Activate Immediately</label>
        </div>

        <!-- 🔘 Submit -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">💾 Save Campaign</button>
            <a href="<?= site_url('Management/DripCampaigns') ?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>


<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('dripCampaignForm');
    form.addEventListener('submit', (e) => {
        const name = form.querySelector('[name=name]').value.trim();
        const triggers = form.querySelector('[name="trigger_event[]"]');
        if (!name || triggers.selectedOptions.length === 0) {
            e.preventDefault();
            alert('Please fill out all required fields and select at least one trigger event.');
        }
    });

    const templateSelector = document.querySelector('[name=template_id]');
    templateSelector?.addEventListener('change', e => {
        const previewContainer = document.getElementById('templatePreview') || document.createElement('div');
        previewContainer.id = 'templatePreview';
        previewContainer.className = 'mt-3 alert alert-info';
        templateSelector.parentElement.appendChild(previewContainer);
        const selected = e.target.value;
        previewContainer.innerHTML = '📦 Loading preview...';

        fetch('/API/Templates/Preview/' + selected)
            .then(res => res.ok ? res.text() : Promise.reject('Preview not available'))
            .then(html => previewContainer.innerHTML = '<strong>Template Preview:</strong><br>' + html)
            .catch(() => previewContainer.innerHTML = '⚠️ Preview not available.');
    });
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
function loadTemplatePreview(templateName) {
    fetch('/Management/DripCampaign/previewTemplate', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'template=' + encodeURIComponent(templateName)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('templatePreview').innerHTML = data.html;
    });
}

function initTagBuilder() {
    document.querySelectorAll('.tag-insert-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const tag = btn.dataset.tag;
            const textarea = document.getElementById('emailBody');
            textarea.value += `{{${tag}}}`;
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    initTagBuilder();
    const templateSelect = document.querySelector('[name="template_id"]');
    if (templateSelect) {
        templateSelect.addEventListener('change', function () {
            loadTemplatePreview(this.value);
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const targetForm = document.getElementById('dripCampaignForm');
    if (!targetForm) return;

    const logicField = document.createElement('textarea');
    logicField.name = 'logic_json';
    logicField.classList.add('form-control', 'mt-3');
    logicField.placeholder = 'Optional JSON logic builder: {"if":"budget_completed","and":"premium_upgrade","then":"send"}';

    // Add it before the submit button row
    const submitRow = targetForm.querySelector('.mt-3.d-flex.justify-content-between');
    if (submitRow) {
        targetForm.insertBefore(logicField, submitRow);
    } else {
        targetForm.appendChild(logicField);
    }
});

</script>
