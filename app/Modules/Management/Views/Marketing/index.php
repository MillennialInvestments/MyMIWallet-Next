<!-- app/Modules/Management/Views/Marketing/index.php -->
<?php
// ⏱️ Load Page Context
$managementActionItems = $siteSettings->managementActionItems;
$department = $uri->getSegment(2);
$viewFileData = [
    'managementActionItems' => $managementActionItems,
    'targetUsers' => $targetUsers ?? 0,
    'totalActiveUsers' => $totalActiveUsers ?? 0,
    'totalActivePartners' => $totalActivePartners ?? 0,
    'totalActiveCampaigns' => $totalActiveCampaigns ?? [],
    'getTasksByDepartment' => $getTasksByDepartment ?? [],
    'totalDepartmentTasks' => $totalDepartmentTasks ?? [],
    'totalPageSEOTasks' => $totalPageSEOTasks ?? [],
    'totalTransFees' => $totalTransFees ?? 0,
    'totalLastTransFees' => $totalLastTransFees ?? 0,
    'usersPercentage' => $usersPercentage ?? 0,
    'getActiveCampaigns' => $getActiveCampaigns ?? [],
    'totalApprovedAssets' => $totalApprovedAssets ?? 0,
    'totalPendingAssets' => $totalPendingAssets ?? 0,
    'userGoals' => $userGoals ?? [],
    'newsUpdates' => $newsUpdates ?? [],
    'getBlogPosts' => $getBlogPosts ?? [],
    'recentMarketingPosts' => $recentMarketingPosts ?? [],
    'todaysStory' => $todaysStory ?? [],
];
$newsletterWeekStart = date('Y-m-d', strtotime('saturday this week'));
$cronKey = env('CRON_SHARED_KEY');
$pipelineDashboard = $pipelineDashboard ?? [];
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12">
            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h1 class="title nk-block-title">MyMI Management - <?= esc($department) ?></h1>
                    <a href="<?= site_url('/Management'); ?>">← Back to Management Dashboard</a>
                </div>
            </div>

        <div class="col-12">
            <div class="card card-bordered mb-3">
                <div class="card-inner d-flex justify-content-between flex-wrap align-items-center">
                    <div>
                        <h5 class="title mb-1">Coffee &amp; Stocks Newsletter</h5>
                        <p class="mb-0 text-soft">Week starting <strong><?= esc($newsletterWeekStart); ?></strong></p>
                    </div>
                    <div class="btn-group" role="group" aria-label="Coffee & Stocks actions">
                        <button class="btn btn-outline-primary" id="marketingGenerateNewsletter">Generate Draft</button>
                        <button class="btn btn-primary" id="marketingEditDraft">Edit Draft</button>
                        <button class="btn btn-success" id="marketingMarkSent">Mark as Sent</button>
                        <?php if (aiKimiEnabled()): ?>
                            <button class="btn btn-info" id="marketingGenerateStoryboard">AI Storyboard</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-inner border-top" id="newsletterEditor" style="display:none;">
                    <div class="form-group mb-2">
                        <label class="form-label" for="newsletterSubject">Subject</label>
                        <input type="text" class="form-control" id="newsletterSubject" placeholder="Newsletter subject">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="newsletterBody">Body (HTML)</label>
                        <textarea class="form-control" id="newsletterBody" rows="6" placeholder="Compose the Coffee &amp; Stocks body"></textarea>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-soft small">Saving for week of <?= esc($newsletterWeekStart); ?></div>
                        <button class="btn btn-primary" id="newsletterSave">Save Draft</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php if (aiKimiEnabled()): ?>
        <div class="col-12">
            <div class="card card-bordered mb-3">
                <div class="card-inner d-flex justify-content-between flex-wrap align-items-center">
                    <div>
                        <h5 class="title mb-1">Kimi AI Boosters</h5>
                        <p class="mb-0 text-soft">Generate AI summaries and social posts from the latest scrapes.</p>
                    </div>
                    <div class="btn-group" role="group" aria-label="Kimi marketing actions">
                        <button class="btn btn-outline-primary" id="marketingKimiSummaries">Generate Kimi AI Summaries</button>
                        <button class="btn btn-outline-success" id="marketingKimiPosts">Generate Kimi Social Posts</button>
                    </div>
                </div>
                <div class="card-inner border-top" id="kimiMarketingResults" style="display:none;"></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-12">
            <div class="card card-bordered mb-3">
                <div class="card-inner">
                    <h5 class="title mb-3">🧭 Marketing News Pipeline Dashboard</h5>
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <div class="alert alert-primary mb-0">Pending Scraped Alerts: <strong><?= esc((string) ($pipelineDashboard['pending_scraped_alerts'] ?? 0)); ?></strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-info mb-0">Pending Story Generation: <strong><?= esc((string) ($pipelineDashboard['pending_story_generation'] ?? 0)); ?></strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-warning mb-0">Pending Review Queue: <strong><?= esc((string) count($pipelineDashboard['pending_review_queue'] ?? [])); ?></strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-success mb-0">Distribution Attempts: <strong><?= esc((string) count($pipelineDashboard['distribution_history'] ?? [])); ?></strong></div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h6>Latest Generated Stories</h6>
                            <ul class="list-group">
                                <?php foreach (($pipelineDashboard['latest_generated_stories'] ?? []) as $story): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span><?= esc($story['story_title'] ?? '(Untitled Story)'); ?><?= !empty($story['ticker']) ? ' (' . esc($story['ticker']) . ')' : ''; ?></span>
                                        <span class="badge bg-secondary"><?= esc($story['story_status'] ?? 'n/a'); ?></span>
                                    </li>
                                <?php endforeach; ?>
                                <?php if (empty($pipelineDashboard['latest_generated_stories'])): ?>
                                    <li class="list-group-item text-muted">No generated stories yet.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h6>Distribution History</h6>
                            <ul class="list-group">
                                <?php foreach (($pipelineDashboard['distribution_history'] ?? []) as $row): ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>#<?= esc((string) ($row['generated_content_id'] ?? 0)); ?> → <?= esc($row['platform'] ?? 'unknown'); ?></span>
                                        <span class="badge bg-dark"><?= esc($row['status'] ?? 'queued'); ?></span>
                                    </li>
                                <?php endforeach; ?>
                                <?php if (empty($pipelineDashboard['distribution_history'])): ?>
                                    <li class="list-group-item text-muted">No distribution history yet.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🧩 Primary Marketing Interface -->
        <div class="col-12 col-xxl-4">
            <?= view('ManagementModule\Views\Marketing\index\action_center_new', $viewFileData); ?>
        </div>
        <div class="col-12 col-xxl-8">
        <?= view('ManagementModule\Views\Marketing\index\control_center', $viewFileData); ?>
        </div>

        <!-- 🔘 Control Panel + Analytics -->
        <div class="col-12">
            <?php // view('ManagementModule\Views\Marketing\resources\controlPanelBlock', $viewFileData); ?>
        </div>
        <div class="col-12">            
            <?= view('ManagementModule\Views\Marketing\index\most_recent_content', $viewFileData); ?>
            <?php // view('ManagementModule\Views\Marketing\resources\analyticsSummaryBlock', $viewFileData); ?>
        </div>

        <!-- 📋 Summaries + CTA Suggestion -->
        <div class="col-12 col-xxl-12">
            <?= view('ManagementModule\Views\Marketing\resources\controlPanelBlock', $viewFileData); ?>
            <?php // view('ManagementModule\Views\Marketing\resources\generatedSummariesBlock', $viewFileData); ?>
        </div>
        <div class="col-12 col-xxl-6">
            <?php // echo view('ManagementModule\Views\Marketing\resources\ctaRecommenderModule', $viewFileData); ?>
        </div>

        <!-- 📚 Platform Libraries -->
        <div class="col-12">
            <?= view('ManagementModule\Views\Marketing\resources\platform-library'); ?>
        </div>

        <div class="col-12 mt-4">
            <h5 class="title">✅ Finalized Marketing Content</h5>
            <div id="finalizedContentBlock">
                <?= view('ManagementModule\Views\Marketing\resources\finalizedSummaries', ['finalizedContent' => $finalizedContent ?? []]) ?>
            </div>
        </div>

        <!-- 🔄 Live Refresh Toggle + View -->
        <div class="col-12 col-xxl-12 px-2">
            <div class="generated-summaries" id="generatedSummariesBlock">
                <?= view('ManagementModule\Views\Marketing\resources\generatedSummaries', $viewFileData); ?>
            </div>
        </div>

        <!-- 📰 Recent Posts -->
        <div class="col-12 col-xxl-12 mt-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5 class="title">📰 Recent Marketing Posts</h5>
                    <?php
                    $validPosts = array_filter($recentMarketingPosts, fn($p) => !empty($p->title));
                    if (!empty($validPosts)): ?>
                        <ul class="list-group">
                            <?php foreach ($validPosts as $post): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start flex-column">
                                    <div class="w-100">
                                        <strong><?= esc($post->title ?: '(Untitled Post)') ?></strong><br>
                                        <small class="text-muted"><?= date('M d, Y h:i A', strtotime($post->created_at)) ?></small><br>
                                        <?php if (!empty($post->short_description)): ?>
                                            <small class="text-secondary"><?= esc($post->short_description) ?>...</small>
                                        <?php else: ?>
                                            <small class="text-secondary">No description available.</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-sm btn-primary"
                                                onclick="dynamicModalLoader('Marketing', 'PreviewGeneratedPost', '<?= $post->id ?>')">
                                            Preview
                                        </button>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No posts with valid titles available yet. Click 'Generate' to create one!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-xxl-12">
            <?= view('ManagementModule\Views\Marketing\resources\dripCampaignBlock', $viewFileData) ?>
        </div>

        <!-- 📊 Additional Insights -->
        <div class="col-12 col-xxl-4 mt-3">
            <?= view('ManagementModule\Views\Marketing\index\exchange_action_center', $viewFileData); ?>
        </div>
        <div class="col-12 col-xxl-8 mt-3">
            <?= view('ManagementModule\Views\Marketing\index\target_users', $viewFileData); ?>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('standaloneScraperForm')?.addEventListener('submit', function (event) {
    event.preventDefault();
    const url = document.getElementById('url')?.value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (!url) {
        alert('⚠️ Please enter a valid URL.');
        return;
    }

    fetch("<?= site_url('Management/Marketing/Scrape-Link') ?>", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ url: url })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('✅ Scraped successfully! Updating view...');
            document.getElementById('url').value = ''; // Clear the input

            // Update summaries block
            fetch("<?= site_url('API/Marketing/fetchGeneratedSummariesBlock') ?>")
                .then(res => res.text())
                .then(html => {
                    document.getElementById('generatedSummariesBlock').innerHTML = html;
                });

            // Optional: reload finalized block if needed
            fetch("<?= site_url('API/Marketing/fetchFinalizedSummariesBlock') ?>")
                .then(res => res.text())
                .then(html => {
                    document.getElementById('finalizedContentBlock').innerHTML = html;
                });
        } else {
            alert(data.message || '⚠️ Scraping failed. Please check the URL and try again.');
        }
    })
    .catch(err => {
        console.error('❌ Scrape error:', err);
        alert('❌ An unexpected error occurred while scraping.');
    });
});
</script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', () => {
    const cronKey = "<?= esc($cronKey ?? ''); ?>";
    const weekStart = "<?= esc($newsletterWeekStart); ?>";
    const editor = document.getElementById('newsletterEditor');
    const subjectInput = document.getElementById('newsletterSubject');
    const bodyInput = document.getElementById('newsletterBody');
    const csrfToken = "<?= csrf_hash(); ?>";

    const buildUrl = (baseUrl) => {
        if (!cronKey) {
            return baseUrl;
        }
        const separator = baseUrl.includes('?') ? '&' : '?';
        return `${baseUrl}${separator}cronKey=${encodeURIComponent(cronKey)}`;
    };

    async function loadDraft() {
        const response = await fetch(buildUrl('<?= site_url('/API/Management/fetchCoffeeAndStocksNewsletter'); ?>?week_start_date=' + weekStart));
        const data = await response.json();
        if (data?.success && data.newsletter) {
            subjectInput.value = data.newsletter.subject || '';
            bodyInput.value = data.newsletter.body_html || '';
        }
    }

    async function saveDraft(status = 'draft') {
        const payload = {
            week_start_date: weekStart,
            subject: subjectInput.value,
            body_html: bodyInput.value,
            status: status,
        };

        const response = await fetch(buildUrl('<?= site_url('/API/Management/saveCoffeeAndStocksNewsletter'); ?>'), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
        });

        if (response.ok) {
            alert(status === 'sent' ? 'Newsletter marked as sent.' : 'Draft saved.');
        } else {
            alert('Unable to save the newsletter draft.');
        }
    }

    document.getElementById('marketingGenerateNewsletter')?.addEventListener('click', async () => {
        const response = await fetch(buildUrl('<?= site_url('/API/Management/generateCoffeeAndStocksNewsletter'); ?>'));
        if (response.ok) {
            alert('Draft generated for ' + weekStart);
            await loadDraft();
        } else {
            alert('Failed to generate draft.');
        }
    });

    document.getElementById('marketingEditDraft')?.addEventListener('click', async () => {
        editor.style.display = editor.style.display === 'none' ? 'block' : 'none';
        if (editor.style.display === 'block') {
            await loadDraft();
        }
    });

    document.getElementById('marketingMarkSent')?.addEventListener('click', async () => {
        await saveDraft('sent');
    });

    <?php if (aiKimiEnabled()): ?>
    document.getElementById('marketingGenerateStoryboard')?.addEventListener('click', async () => {
        try {
            const response = await fetch('Advisor/generateStoryboard', { method: 'POST' });
            const json = await response.json();
            const storyboard = json?.content || json?.data?.choices?.[0]?.message?.content || '';

            if (storyboard) {
                editor.style.display = 'block';
                bodyInput.value = storyboard;
                alert('Storyboard drafted. You can edit the AI output above.');
            } else if (json?.status === 'disabled') {
                alert(json.message || 'Kimi AI is disabled.');
            } else {
                alert('No storyboard content returned.');
            }
        } catch (e) {
            console.error(e);
            alert('Unable to generate storyboard right now.');
        }
    });

    const kimiResults = document.getElementById('kimiMarketingResults');
    const showKimiResults = (content) => {
        if (!kimiResults) return;
        kimiResults.style.display = 'block';
        kimiResults.innerText = typeof content === 'string' ? content : JSON.stringify(content, null, 2);
    };

    document.getElementById('marketingKimiSummaries')?.addEventListener('click', async () => {
        const res = await fetch('Marketing/generateKimiSummaries');
        const json = await res.json();
        showKimiResults(json?.data || json);
    });

    document.getElementById('marketingKimiPosts')?.addEventListener('click', async () => {
        const res = await fetch('Marketing/generateKimiPosts');
        const json = await res.json();
        showKimiResults(json?.data || json);
    });
    <?php endif; ?>

    document.getElementById('newsletterSave')?.addEventListener('click', async () => {
        await saveDraft('draft');
    });

    document.getElementById('backfillMarketingEmails')?.addEventListener('click', async (event) => {
        const button = event.currentTarget;
        button.disabled = true;
        const original = button.textContent;
        button.textContent = 'Starting backfill…';
        try {
            const response = await fetch(buildUrl('<?= site_url('/API/Management/backfillMarketingEmails'); ?>'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ days_back: 30 })
            });
            const json = await response.json();
            const summary = json.summary || json.data || {};
            alert(`Backfill complete. Inserted: ${summary.inserted ?? 0}, Duplicates: ${summary.duplicates_skipped ?? 0}`);
        } catch (e) {
            alert('Unable to run marketing backfill right now.');
            console.error(e);
        } finally {
            button.disabled = false;
            button.textContent = original;
        }
    });
});
</script>
