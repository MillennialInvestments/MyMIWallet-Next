<!-- app/Modules/Management/Views/Marketing/index.php -->
<?php
// ⏱️ Load Page Context
// $managementActionItems = $siteSettings->managementActionItems;
// $department = $uri->getSegment(2);
// $viewFileData = [
//     'managementActionItems' => $managementActionItems,
//     'targetUsers' => $targetUsers ?? 0,
//     'totalActiveUsers' => $totalActiveUsers ?? 0,
//     'totalActivePartners' => $totalActivePartners ?? 0,
//     'totalActiveCampaigns' => $totalActiveCampaigns ?? [],
//     'getTasksByDepartment' => $getTasksByDepartment ?? [],
//     'totalDepartmentTasks' => $totalDepartmentTasks ?? [],
//     'totalPageSEOTasks' => $totalPageSEOTasks ?? [],
//     'totalTransFees' => $totalTransFees ?? 0,
//     'totalLastTransFees' => $totalLastTransFees ?? 0,
//     'usersPercentage' => $usersPercentage ?? 0,
//     'getActiveCampaigns' => $getActiveCampaigns ?? [],
//     'totalApprovedAssets' => $totalApprovedAssets ?? 0,
//     'totalPendingAssets' => $totalPendingAssets ?? 0,
//     'userGoals' => $userGoals ?? [],
//     'newsUpdates' => $newsUpdates ?? [],
//     'getBlogPosts' => $getBlogPosts ?? [],
//     'recentMarketingPosts' => $recentMarketingPosts ?? [],
//     'todaysStory' => $todaysStory ?? [],
// ];
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12">
            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h1 class="title nk-block-title">MyMI Management</h1>
                    <a href="<?= site_url('/Management'); ?>">← Back to Management Dashboard</a>
                </div>
            </div>
        </div>

        <!-- 🧩 Primary Marketing Interface -->
        <div class="col-12 col-xxl-4">
            <?php // echo view('ManagementModule\Views\Marketing\index\action_center_new', $viewFileData); ?>
        </div>
        <div class="col-12 col-xxl-8">
        <?php // echo view('ManagementModule\Views\Marketing\index\control_center', $viewFileData); ?>
        </div>
    </div>
</div>
