<?php
$channels        = $discordChannels ?? [];
$templates       = $discordTemplates ?? [];
$subscriptions   = $discordSubscriptions ?? [];
$policies        = $discordPolicies ?? [];
$recentKeys      = $discordTemplateKeys ?? [];
$channelOptions  = $discordChannelOptions ?? [];
$templateOptions = $discordTemplateOptions ?? [];
$eventOptions    = $discordEventOptions ?? [];
$health          = $discordHealth ?? [];
$queued          = (int)($health['queued'] ?? 0);
$failed24h       = (int)($health['failed24h'] ?? 0);
$dead7d          = (int)($health['dead7d'] ?? 0);
$nextQuiet       = $health['nextQuietResume'] ?? null;
$tzLabel         = $health['timezone'] ?? 'America/Chicago';
$policyRuleTypes = ['blocklist' => 'Blocklist', 'allowlist' => 'Allowlist'];
$policyActions   = ['drop' => 'Drop', 'mask' => 'Mask'];
?>
<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title">Discord Administration</h3>
            <div class="nk-block-des text-soft">
                <p>Manage webhook channels, templates, and subscription routing for the Discord queue.</p>
            </div>
        </div>
    </div>

    <?php if ($message = session()->getFlashdata('message')): ?>
        <div class="alert alert-success alert-icon">
            <em class="icon ni ni-check-circle"></em>
            <strong><?php echo esc($message); ?></strong>
        </div>
    <?php endif; ?>

    <?php if ($error = session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-icon">
            <em class="icon ni ni-alert-circle"></em>
            <strong><?php echo esc($error); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row g-gs">
        <div class="col-12">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                        <h5 class="card-title">Queue Health</h5>
                        <span class="badge bg-outline-primary">Timezone: <?php echo esc($tzLabel); ?></span>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-3 col-6">
                            <div class="nk-order-ovwg-data p-2 bg-light rounded">
                                <div class="amount h4 mb-0"><?php echo number_format($queued); ?></div>
                                <div class="title text-soft">Queued</div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="nk-order-ovwg-data p-2 bg-light rounded">
                                <div class="amount h4 mb-0"><?php echo number_format($failed24h); ?></div>
                                <div class="title text-soft">Failed (24h)</div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="nk-order-ovwg-data p-2 bg-light rounded">
                                <div class="amount h4 mb-0"><?php echo number_format($dead7d); ?></div>
                                <div class="title text-soft">Dead (7d)</div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="nk-order-ovwg-data p-2 bg-light rounded">
                                <div class="amount h6 mb-0"><?php echo $nextQuiet ? esc(date('M j, g:i A', strtotime($nextQuiet))) : 'Active'; ?></div>
                                <div class="title text-soft">Next Quiet-End</div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Name</th>
                                    <th>Last Sent</th>
                                    <th>Min Interval (s)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($channels as $channel): ?>
                                    <tr>
                                        <td><?php echo esc($channel['channel_key'] ?? ''); ?></td>
                                        <td><?php echo esc($channel['name'] ?? ''); ?></td>
                                        <td><?php echo $channel['last_sent_at'] ? esc(date('M j, g:i A', strtotime($channel['last_sent_at']))) : '<span class="text-soft">never</span>'; ?></td>
                                        <td><?php echo esc((int)($channel['min_interval_sec'] ?? 0)); ?></td>
                                        <td>
                                            <?php if (!empty($channel['is_enabled'])): ?>
                                                <span class="badge bg-success">Enabled</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Disabled</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered card-full" id="channels">
                <div class="card-inner">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title">Channels</h5>
                        <p class="text-soft small mb-0">Channel keys should stay unique; webhook URLs override the default Discord config.</p>
                        <button class="btn btn-sm btn-outline-primary" type="button" data-discord-test="default" data-template="news.daily_digest">Send Test Digest</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>Key</th>
                                    <th>Name</th>
                                    <th>Channel ID</th>
                                    <th>Role ID</th>
                                    <th>Category</th>
                                    <th>Priority</th>
                                    <th>Webhook URL</th>
                                    <th>Embeds</th>
                                    <th>Enabled</th>
                                    <th>Min Interval</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($channels as $channel): ?>
                                    <form method="post" action="<?php echo site_url('Management/Discord/Channels/Save'); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo esc($channel['id']); ?>">
                                        <tr>
                                            <td><input type="text" name="channel_key" class="form-control form-control-sm" value="<?php echo esc($channel['channel_key']); ?>" required></td>
                                            <td><input type="text" name="name" class="form-control form-control-sm" value="<?php echo esc($channel['name']); ?>"></td>
                                            <td><input type="text" name="channel_id" class="form-control form-control-sm" value="<?php echo esc($channel['channel_id']); ?>"></td>
                                            <td><input type="text" name="role_id" class="form-control form-control-sm" value="<?php echo esc($channel['role_id'] ?? ''); ?>" placeholder="123456789"></td>
                                            <td><input type="text" name="category" class="form-control form-control-sm" value="<?php echo esc($channel['category'] ?? ''); ?>" placeholder="alerts"></td>
                                            <td><input type="number" name="priority" class="form-control form-control-sm" value="<?php echo esc((int)($channel['priority'] ?? 5)); ?>" min="0"></td>
                                            <td><input type="text" name="webhook_url" class="form-control form-control-sm" value="<?php echo esc($channel['webhook_url']); ?>"></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="allow_embeds" value="1" <?php echo !empty($channel['allow_embeds']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_enabled" value="1" <?php echo !empty($channel['is_enabled']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td><input type="number" name="min_interval_sec" min="0" class="form-control form-control-sm" value="<?php echo esc((int)($channel['min_interval_sec'] ?? 90)); ?>"></td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="submit" class="btn btn-outline-danger" formaction="<?php echo site_url('Management/Discord/Channels/Delete'); ?>" onclick="return confirm('Delete channel <?php echo esc(addslashes($channel['channel_key'])); ?>?');">Delete</button>
                                                    <button type="button" class="btn btn-outline-secondary" data-discord-test="<?php echo esc($channel['channel_key']); ?>" data-template="news.daily_digest">Test</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                                <form method="post" action="<?php echo site_url('Management/Discord/Channels/Save'); ?>">
                                    <?php echo csrf_field(); ?>
                                    <tr class="table-light">
                                        <td><input type="text" name="channel_key" class="form-control form-control-sm" placeholder="new_channel" required></td>
                                        <td><input type="text" name="name" class="form-control form-control-sm" placeholder="Display name"></td>
                                        <td><input type="text" name="channel_id" class="form-control form-control-sm" placeholder="123456"></td>
                                        <td><input type="text" name="role_id" class="form-control form-control-sm" placeholder="987654321"></td>
                                        <td><input type="text" name="category" class="form-control form-control-sm" placeholder="alerts"></td>
                                        <td><input type="number" name="priority" class="form-control form-control-sm" value="5" min="0"></td>
                                        <td><input type="text" name="webhook_url" class="form-control form-control-sm" placeholder="https://discord.com/api/webhooks/..."></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="allow_embeds" value="1" checked>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_enabled" value="1" checked>
                                            </div>
                                        </td>
                                        <td><input type="number" name="min_interval_sec" class="form-control form-control-sm" value="120" min="0"></td>
                                        <td class="text-end"><button type="submit" class="btn btn-sm btn-success">Add Channel</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" id="templates">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <h5 class="card-title">Templates</h5>
                    <?php if (!empty($recentKeys)): ?>
                        <p class="text-soft small mb-3">Recent data keys: <?php echo esc(implode(', ', $recentKeys)); ?></p>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Embed JSON</th>
                                    <th>Enabled</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($templates as $template): ?>
                                    <form method="post" action="<?php echo site_url('Management/Discord/Templates/Save'); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo esc($template['id']); ?>">
                                        <tr>
                                            <td><input type="text" name="template_key" class="form-control form-control-sm" value="<?php echo esc($template['template_key']); ?>" readonly></td>
                                            <td><input type="text" name="title" class="form-control form-control-sm" value="<?php echo esc($template['title']); ?>"></td>
                                            <td><textarea name="content" class="form-control form-control-sm" rows="3" required><?php echo esc($template['content']); ?></textarea></td>
                                            <td><textarea name="embed_json" class="form-control form-control-sm" rows="3" placeholder='{"color":12345}'><?php echo esc($template['embed_json']); ?></textarea></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_enabled" value="1" <?php echo !empty($template['is_enabled']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="submit" class="btn btn-outline-danger" formaction="<?php echo site_url('Management/Discord/Templates/Delete'); ?>" onclick="return confirm('Delete template <?php echo esc(addslashes($template['template_key'])); ?>?');">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                                <form method="post" action="<?php echo site_url('Management/Discord/Templates/Save'); ?>">
                                    <?php echo csrf_field(); ?>
                                    <tr class="table-light">
                                        <td><input type="text" name="template_key" class="form-control form-control-sm" placeholder="marketing.post.ready" required></td>
                                        <td><input type="text" name="title" class="form-control form-control-sm" placeholder="Title"></td>
                                        <td><textarea name="content" class="form-control form-control-sm" rows="3" placeholder="Message body" required></textarea></td>
                                        <td><textarea name="embed_json" class="form-control form-control-sm" rows="3" placeholder='{"color":5814783}'></textarea></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_enabled" value="1" checked>
                                            </div>
                                        </td>
                                        <td class="text-end"><button type="submit" class="btn btn-sm btn-success">Add Template</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" id="subscriptions">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <h5 class="card-title">Subscriptions</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Key</th>
                                    <th>Channel</th>
                                    <th>Template</th>
                                    <th>Role Key</th>
                                    <th>Mention Role</th>
                                    <th>Priority</th>
                                    <th>Coalesce Key</th>
                                    <th>Digest Window (s)</th>
                                    <th>Max / Window</th>
                                    <th>Digest Template</th>
                                    <th>Quiet Bypass</th>
                                    <th>Filters JSON</th>
                                    <th>Enabled</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subscriptions as $subscription): ?>
                                    <form method="post" action="<?php echo site_url('Management/Discord/Subscriptions/Save'); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo esc($subscription['id']); ?>">
                                        <tr>
                                            <td><input type="text" name="event_key" class="form-control form-control-sm" value="<?php echo esc($subscription['event_key']); ?>" required></td>
                                            <td>
                                                <select name="channel_key" class="form-select form-select-sm">
                                                    <?php foreach ($channelOptions as $option): ?>
                                                        <option value="<?php echo esc($option); ?>" <?php echo ($option === ($subscription['channel_key'] ?? '')) ? 'selected' : ''; ?>><?php echo esc($option); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="template_key" class="form-select form-select-sm">
                                                    <?php foreach ($templateOptions as $option): ?>
                                                        <option value="<?php echo esc($option); ?>" <?php echo ($option === ($subscription['template_key'] ?? '')) ? 'selected' : ''; ?>><?php echo esc($option); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="role_key" class="form-control form-control-sm" value="<?php echo esc($subscription['role_key'] ?? ''); ?>" placeholder="alerts.role"></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="mention_role" value="1" <?php echo !empty($subscription['mention_role']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td><input type="number" name="priority" class="form-control form-control-sm" value="<?php echo esc((int)($subscription['priority'] ?? 5)); ?>" min="0"></td>
                                            <td><input type="text" name="coalesce_key" class="form-control form-control-sm" value="<?php echo esc($subscription['coalesce_key'] ?? ''); ?>" placeholder="news.digest"></td>
                                            <td><input type="number" name="digest_window_sec" class="form-control form-control-sm" value="<?php echo esc((int)($subscription['digest_window_sec'] ?? 0)); ?>" min="0"></td>
                                            <td><input type="number" name="max_per_window" class="form-control form-control-sm" value="<?php echo esc((int)($subscription['max_per_window'] ?? 0)); ?>" min="0"></td>
                                            <td><input type="text" name="digest_template_key" class="form-control form-control-sm" value="<?php echo esc($subscription['digest_template_key'] ?? ''); ?>" placeholder="digest.market_news.15m"></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="quiet_bypass" value="1" <?php echo !empty($subscription['quiet_bypass']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td><textarea name="filters_json" class="form-control form-control-sm" rows="2" placeholder='{"tickers":["SPY"]}'><?php echo esc($subscription['filters_json']); ?></textarea></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_enabled" value="1" <?php echo !empty($subscription['is_enabled']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="submit" class="btn btn-outline-danger" formaction="<?php echo site_url('Management/Discord/Subscriptions/Delete'); ?>" onclick="return confirm('Delete subscription for <?php echo esc(addslashes($subscription['event_key'])); ?>?');">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                                <form method="post" action="<?php echo site_url('Management/Discord/Subscriptions/Save'); ?>">
                                    <?php echo csrf_field(); ?>
                                    <tr class="table-light">
                                        <td>
                                            <select name="event_key" class="form-select form-select-sm">
                                                <?php foreach ($eventOptions as $option): ?>
                                                    <option value="<?php echo esc($option); ?>"><?php echo esc($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="channel_key" class="form-select form-select-sm">
                                                <?php foreach ($channelOptions as $option): ?>
                                                    <option value="<?php echo esc($option); ?>"><?php echo esc($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="template_key" class="form-select form-select-sm">
                                                <?php foreach ($templateOptions as $option): ?>
                                                    <option value="<?php echo esc($option); ?>"><?php echo esc($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="role_key" class="form-control form-control-sm" placeholder="alerts.role"></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="mention_role" value="1">
                                            </div>
                                        </td>
                                        <td><input type="number" name="priority" class="form-control form-control-sm" value="5" min="0"></td>
                                        <td><input type="text" name="coalesce_key" class="form-control form-control-sm" placeholder="news.digest"></td>
                                        <td><input type="number" name="digest_window_sec" class="form-control form-control-sm" value="0" min="0"></td>
                                        <td><input type="number" name="max_per_window" class="form-control form-control-sm" value="0" min="0"></td>
                                        <td><input type="text" name="digest_template_key" class="form-control form-control-sm" placeholder="digest.market_news.15m"></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="quiet_bypass" value="1">
                                            </div>
                                        </td>
                                        <td><textarea name="filters_json" class="form-control form-control-sm" rows="2" placeholder='{"tickers":["SPY"]}'></textarea></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_enabled" value="1" checked>
                                            </div>
                                        </td>
                                        <td class="text-end"><button type="submit" class="btn btn-sm btn-success">Add Subscription</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12" id="policies">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <h5 class="card-title">Policies</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Rule</th>
                                    <th>Pattern</th>
                                    <th>Channel</th>
                                    <th>Action</th>
                                    <th>Mask With</th>
                                    <th>Enabled</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($policies as $policy): ?>
                                    <form method="post" action="<?php echo site_url('Management/Discord/Policies/Save'); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo esc($policy['id']); ?>">
                                        <tr>
                                            <td>
                                                <select name="rule_type" class="form-select form-select-sm">
                                                    <?php foreach ($policyRuleTypes as $value => $label): ?>
                                                        <option value="<?php echo esc($value); ?>" <?php echo ($value === ($policy['rule_type'] ?? 'blocklist')) ? 'selected' : ''; ?>><?php echo esc($label); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="pattern" class="form-control form-control-sm" value="<?php echo esc($policy['pattern'] ?? ''); ?>" required></td>
                                            <td>
                                                <select name="channel_key" class="form-select form-select-sm">
                                                    <option value="">All Channels</option>
                                                    <?php foreach ($channelOptions as $option): ?>
                                                        <option value="<?php echo esc($option); ?>" <?php echo ($option === ($policy['channel_key'] ?? '')) ? 'selected' : ''; ?>><?php echo esc($option); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="action" class="form-select form-select-sm">
                                                    <?php foreach ($policyActions as $value => $label): ?>
                                                        <option value="<?php echo esc($value); ?>" <?php echo ($value === ($policy['action'] ?? 'drop')) ? 'selected' : ''; ?>><?php echo esc($label); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="mask_with" class="form-control form-control-sm" value="<?php echo esc($policy['mask_with'] ?? ''); ?>" placeholder="***"></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_enabled" value="1" <?php echo !empty($policy['is_enabled']) ? 'checked' : ''; ?>>
                                                </div>
                                            </td>
                                            <td><?php echo esc(!empty($policy['created_at']) ? date('M j, g:i A', strtotime($policy['created_at'])) : ''); ?></td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="submit" class="btn btn-outline-danger" formaction="<?php echo site_url('Management/Discord/Policies/Delete'); ?>" onclick="return confirm('Delete policy <?php echo esc(addslashes($policy['pattern'] ?? '')); ?>?');">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                                <form method="post" action="<?php echo site_url('Management/Discord/Policies/Save'); ?>">
                                    <?php echo csrf_field(); ?>
                                    <tr class="table-light">
                                        <td>
                                            <select name="rule_type" class="form-select form-select-sm">
                                                <?php foreach ($policyRuleTypes as $value => $label): ?>
                                                    <option value="<?php echo esc($value); ?>"><?php echo esc($label); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="pattern" class="form-control form-control-sm" placeholder="/badword/i" required></td>
                                        <td>
                                            <select name="channel_key" class="form-select form-select-sm">
                                                <option value="">All Channels</option>
                                                <?php foreach ($channelOptions as $option): ?>
                                                    <option value="<?php echo esc($option); ?>"><?php echo esc($option); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="action" class="form-select form-select-sm">
                                                <?php foreach ($policyActions as $value => $label): ?>
                                                    <option value="<?php echo esc($value); ?>"><?php echo esc($label); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="mask_with" class="form-control form-control-sm" placeholder="[redacted]"></td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_enabled" value="1" checked>
                                            </div>
                                        </td>
                                        <td><span class="text-soft">—</span></td>
                                        <td class="text-end"><button type="submit" class="btn btn-sm btn-success">Add Policy</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function(){
    const buttons = document.querySelectorAll('[data-discord-test]');
    buttons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const channel = btn.getAttribute('data-discord-test');
            const template = btn.getAttribute('data-template');
            if (!channel || !template) {
                return;
            }
            btn.disabled = true;
            const originalText = btn.textContent;
            btn.textContent = 'Sending...';
            try {
                const body = new URLSearchParams();
                if (channel !== 'default') {
                    body.append('channel_key', channel);
                }
                body.append('template_key', template);
                body.append('data[items][0][headline]', 'Hello MyMI — Discord Test');
                body.append('data[items][0][url]', 'https://www.mymiwallet.com/');
                const response = await fetch('<?php echo site_url('API/Discord/broadcast'); ?>', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    credentials: 'same-origin',
                    body: body.toString()
                });
                const result = await response.json();
                if (result.status === 'queued') {
                    btn.textContent = 'Queued!';
                } else {
                    btn.textContent = 'Check Logs';
                }
            } catch (err) {
                console.error('Discord test failed', err);
                btn.textContent = 'Error';
            }
            setTimeout(() => {
                btn.disabled = false;
                btn.textContent = originalText;
            }, 2500);
        });
    });
})();
</script>