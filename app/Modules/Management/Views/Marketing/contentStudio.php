<?php
$implementationMap = $implementationMap ?? [];
$templates = $templates ?? [];
$queue = $queue ?? [];
?>
<div class="nk-block" data-marketing-content-studio data-user-id="<?= esc((string) ($cuID ?? '')) ?>" data-csrf-token="<?= esc(csrf_hash()) ?>">
    <div class="row gy-gs">
        <div class="col-12">
            <div class="nk-block-head-content">
                <h2 class="nk-block-title">Content Studio</h2>
                <p class="text-soft">TikTok-first short-form content management for MyMI Wallet marketing workflows.</p>
                <a href="<?= site_url('/Management/Marketing'); ?>">← Back to Marketing Dashboard</a>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h4 class="title mb-3">Implementation Reuse Map</h4>
                    <div class="row g-3 small">
                        <?php foreach ($implementationMap as $label => $items): ?>
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100 bg-light">
                                    <strong class="d-block text-capitalize mb-2"><?= esc(str_replace('_', ' ', $label)) ?></strong>
                                    <ul class="mb-0 ps-3">
                                        <?php foreach ((array) $items as $item): ?>
                                            <li><?= esc((string) $item) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <ul class="nav nav-tabs mb-3" role="tablist">
                <?php foreach (['Dashboard','Generate','Drafts','Review Queue','Approved','Assets','Templates','Publish Queue','Analytics Placeholder','Settings'] as $index => $tab): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#studio-tab-<?= $index ?>" type="button" role="tab"><?= esc($tab) ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="studio-tab-0" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <h5 class="title mb-3">Content Intake / Source Queue</h5>
                                    <form id="marketingVideoGeneratorForm">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Content source type</label>
                                                <select class="form-select" name="content_source_type">
                                                    <option value="manual_topic">Manual topic</option>
                                                    <option value="ticker">Ticker</option>
                                                    <option value="url">Pasted URL</option>
                                                    <option value="marketing_scraper">Stored marketing scraper summary</option>
                                                    <option value="campaign_summary">Campaign summary</option>
                                                    <option value="keyword_record">Trending keyword record</option>
                                                    <option value="watchlist_alert">Watchlist/trade alert</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Target platform</label>
                                                <select class="form-select" name="target_platform">
                                                    <?php foreach (['tiktok','youtube_shorts','facebook_reels','instagram_reels','linkedin_video','discord_teaser','x_post'] as $platform): ?>
                                                        <option value="<?= esc($platform) ?>"><?= esc(ucwords(str_replace('_', ' ', $platform))) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Ticker / symbol</label>
                                                <input class="form-control" name="symbol" placeholder="AAPL / BTC">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Topic</label>
                                                <input class="form-control" name="topic" placeholder="Why NVDA moved">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Niche / category</label>
                                                <input class="form-control" name="niche_category" value="finance_news">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Target audience</label>
                                                <input class="form-control" name="target_audience" value="retail investors">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tone</label>
                                                <select class="form-select" name="tone">
                                                    <option value="confident">Confident</option>
                                                    <option value="educational">Educational</option>
                                                    <option value="urgent">Urgent</option>
                                                    <option value="promotional">Promotional</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">CTA objective</label>
                                                <select class="form-select" name="cta_objective">
                                                    <option value="drive engagement">Drive engagement</option>
                                                    <option value="membership signup">Membership signup</option>
                                                    <option value="discord join">Discord join</option>
                                                    <option value="referral signup">Referral signup</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Video type</label>
                                                <select class="form-select" name="video_type">
                                                    <?php foreach ([
                                                        'fast_hook_stock_update','breakout_alert_video','top_movers_recap','news_reaction_why_it_moved','chart_breakdown','beginner_explainer','listicle_3_things_to_know','voiceover_explainer','caption_only_video','slideshow_image_text_post','community_promo','product_service_promo_video_for_mymi_wallet','referral_signup_promo','discord_community_promo','financial_tip_of_the_day','budgeting_tip','retirement_tip','crypto_update_short','trade_alert_explainer','faq_style_response_short','motivational_transformation_finance_short'
                                                    ] as $type): ?>
                                                        <option value="<?= esc($type) ?>"><?= esc(ucwords(str_replace('_', ' ', $type))) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Duration target</label>
                                                <input class="form-control" name="duration_target" value="15-30s">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Promotional link</label>
                                                <input class="form-control" name="promo_link" placeholder="https://...">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Notes / pasted source</label>
                                                <textarea class="form-control" name="notes" rows="5" placeholder="Paste notes, summary text, or source excerpts."></textarea>
                                            </div>
                                            <div class="col-12 d-flex gap-2">
                                                <button class="btn btn-primary" type="submit">Generate</button>
                                                <button class="btn btn-outline-secondary" type="reset">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <h5 class="title mb-3">Generated Output Panel</h5>
                                    <form id="marketingGeneratedOutputPanel">
                                        <input type="hidden" name="id">
                                        <div class="row g-2">
                                            <?php foreach ([
                                                'title' => 'Title',
                                                'platform' => 'Platform',
                                                'video_type' => 'Video type',
                                                'hook' => 'Hook',
                                                'intro_text' => 'On-screen intro text',
                                                'body_text' => 'Body talking points',
                                                'insight_text' => 'Insight',
                                                'cta_text' => 'CTA',
                                                'caption' => 'Caption',
                                                'hashtags' => 'Hashtags',
                                                'voiceover_script' => 'Voiceover script',
                                                'thumbnail_text' => 'Thumbnail text',
                                                'promo_link' => 'Promo link',
                                                'target_publish_window' => 'Target publish window',
                                                'status' => 'Status',
                                            ] as $field => $label): ?>
                                                <div class="col-12">
                                                    <label class="form-label"><?= esc($label) ?></label>
                                                    <?php if (in_array($field, ['body_text', 'caption', 'voiceover_script', 'hook', 'intro_text', 'insight_text', 'cta_text'], true)): ?>
                                                        <textarea class="form-control" rows="3" name="<?= esc($field) ?>"></textarea>
                                                    <?php else: ?>
                                                        <input class="form-control" name="<?= esc($field) ?>">
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="col-12">
                                                <label class="form-label">Overlay text JSON</label>
                                                <textarea class="form-control" rows="4" name="overlay_text_json">[]</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Scene plan JSON</label>
                                                <textarea class="form-control" rows="4" name="scene_plan_json">[]</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Asset checklist JSON</label>
                                                <textarea class="form-control" rows="4" name="asset_plan_json">[]</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Platform adaptations JSON</label>
                                                <textarea class="form-control" rows="4" name="platform_adaptations_json">{}</textarea>
                                            </div>
                                            <div class="col-12 d-flex gap-2 flex-wrap">
                                                <button class="btn btn-success" type="submit">Save Draft</button>
                                                <button class="btn btn-outline-primary" type="button" onclick="document.getElementById('marketingVideoGeneratorForm').requestSubmit();">Regenerate</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card card-bordered h-100" id="marketingPreviewPanel">
                                <div class="card-inner">
                                    <h5 class="title mb-3">Preview Panel</h5>
                                    <div class="mb-3">
                                        <strong>TikTok script preview</strong>
                                        <pre class="bg-light rounded p-2 small mb-0" data-preview="script">No script generated yet.</pre>
                                    </div>
                                    <div class="mb-3">
                                        <strong>TikTok caption preview</strong>
                                        <pre class="bg-light rounded p-2 small mb-0" data-preview="caption">No caption generated yet.</pre>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Overlay text preview</strong>
                                        <pre class="bg-light rounded p-2 small mb-0" data-preview="overlay">No overlay generated yet.</pre>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Storyboard preview</strong>
                                        <pre class="bg-light rounded p-2 small mb-0" data-preview="storyboard">No storyboard generated yet.</pre>
                                    </div>
                                    <div>
                                        <strong>Platform adaptation preview</strong>
                                        <pre class="bg-light rounded p-2 small mb-0" data-preview="adaptations">No platform adaptations generated yet.</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php for ($tabIndex = 1; $tabIndex <= 9; $tabIndex++): ?>
                    <div class="tab-pane fade <?= $tabIndex === 7 ? 'show' : '' ?>" id="studio-tab-<?= $tabIndex ?>" role="tabpanel">
                        <?php if ($tabIndex === 7): ?>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <h5 class="title mb-3">Templates</h5>
                                    <div id="marketingTemplateList">
                                        <?php foreach ($templates as $template): ?>
                                            <div class="border rounded p-2 mb-2 bg-light">
                                                <strong><?= esc($template['template_name'] ?? '') ?></strong>
                                                <div class="small text-muted"><?= esc(($template['platform'] ?? '') . ' / ' . ($template['video_type'] ?? '')) ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <p class="mb-0 text-soft">Use the main dashboard tools to manage this section. The data model is ready for future automation, scheduling, analytics, and asset management.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div>
                            <h5 class="title mb-1">Content Queue / Status Tracker</h5>
                            <p class="small text-soft mb-0">Statuses: Draft, Generated, Needs Review, Approved, Needs Assets, Ready to Record, Ready to Post, Scheduled, Posted, Archived, Failed.</p>
                        </div>
                    </div>
                    <form id="marketingQueueFilterForm" class="row g-2 mb-3">
                        <div class="col-md-2"><input class="form-control" name="platform" placeholder="Platform"></div>
                        <div class="col-md-2"><input class="form-control" name="content_type" placeholder="Content type"></div>
                        <div class="col-md-2"><input class="form-control" name="status" placeholder="Status"></div>
                        <div class="col-md-2"><input class="form-control" name="symbol_topic" placeholder="Symbol / topic"></div>
                        <div class="col-md-2"><input class="form-control" name="creator_editor" placeholder="Creator/editor"></div>
                        <div class="col-md-2"><button class="btn btn-outline-primary w-100" type="submit">Filter Queue</button></div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped" id="marketingVideoQueueTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Platform</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Symbol/Topic</th>
                                    <th>Creator/Editor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($queue as $item): ?>
                                    <tr>
                                        <td><?= esc((string) ($item['id'] ?? '')) ?></td>
                                        <td><?= esc((string) ($item['platform'] ?? '')) ?></td>
                                        <td><?= esc((string) ($item['video_type'] ?? '')) ?></td>
                                        <td><?= esc((string) ($item['title'] ?? '')) ?></td>
                                        <td><?= esc((string) ($item['status'] ?? '')) ?></td>
                                        <td><?= esc((string) (($item['symbol'] ?? '') ?: ($item['topic'] ?? ''))) ?></td>
                                        <td><?= esc((string) ($item['creator_editor'] ?? '')) ?></td>
                                        <td><span class="badge bg-secondary">Use actions after refresh</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/app/marketing-content-studio.js') ?>" <?= $nonce['script'] ?? '' ?>></script>
