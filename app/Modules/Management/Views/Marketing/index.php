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

