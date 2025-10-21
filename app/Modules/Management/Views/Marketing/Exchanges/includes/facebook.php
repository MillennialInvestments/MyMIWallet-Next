<?php
// Management Configurations
$managementActionItems              = $siteSettings->managementActionItems; 
$today                              = $siteSettings->today; 
$month                              = $siteSettings->month; 
$day                                = $siteSettings->day;
$year                               = $siteSettings->year; 
$last_month                         = strtotime($month . ' - 1 month');
$channel                            = ($uri->getTotalSegments() >= 5) ? $uri->getSegment(5) : null;

// Initialize data
$totalActiveUsers                   = 0; 
$totalActivePartners                = 0; 
$targetUsers                        = 0;
$totalActiveCampaigns               = []; 
$getTasksByDepartment               = $departmentTasks['getTasksByDepartment'] ?? [];
$totalDepartmentTasks               = $departmentTasks['totalTasks'] ?? [];
$totalPageSEOTasks                  = []; 
$totalTransFees                     = $reporting['totalTransFees'];
$totalLastTransFees                 = $reporting['totalLastTransFees'];
$usersPercentage                    = $reporting['usersPercentage'];
$getActiveCampaigns                 = []; 
$totalApprovedAssets                = 0; 
$totalPendingAssets                 = 0;
$userGoals                          = $progressGoalData['goals'] ?? [];
$newsUpdates                        = []; 
$getBlogPosts                       = []; 

$viewFileData                       = array(
    'managementActionItems'         => $managementActionItems,
    'targetUsers'                   => $targetUsers,
    'totalActiveUsers'              => $totalActiveUsers,
    'totalActivePartners'           => $totalActivePartners,
    'totalActiveCampaigns'          => $totalActiveCampaigns,
    'getTasksByDepartment'          => $getTasksByDepartment,
    'totalDepartmentTasks'          => $totalDepartmentTasks,
    'totalPageSEOTasks'             => $totalPageSEOTasks,
    'totalTransFees'                => $totalTransFees,
    'totalLastTransFees'            => $totalLastTransFees,
    'usersPercentage'               => $usersPercentage,
    'getActiveCampaigns'            => $getActiveCampaigns,
    'totalApprovedAssets'           => $totalApprovedAssets,
    'totalPendingAssets'            => $totalPendingAssets,
    'userGoals'                     => $userGoals,
    'newsUpdates'                   => $newsUpdates,
    'getBlogPosts'                  => $getBlogPosts,
);
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - <?php echo $channel; ?></h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <!-- Action Center -->
                    <div class="col-12 col-xxl-4">
                        <?php echo view('Marketing/Exchanges/includes/action_center', $viewFileData); ?>
                        <?php //echo view('Marketing/index/action_center', $viewFileData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <div class="col-12 col-xxl-8">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered pb-4 pricing px-2">
                                <div class="pricing-head">
                                    <div class="pricing-title">
                                        <h4 class="card-title title"><?= $pageTitle ?></h4>
                                        <p class="sub-text">List of top communities on Facebook.</p>
                                    </div>
                                </div>
                                <div class="pricing-body">
                                    <table id="facebook-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Token</th>
                                                <th>Market Cap</th>
                                                <th>Facebook Link</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tokens as $token): ?>
                                                <tr>
                                                    <td><?= $token['coin_name'] ?></td>
                                                    <td><?php echo '$' . number_format((float)$token['market_cap'], 0); ?></td>
                                                    <td>
                                                        <a href="<?= $token['facebook'] ?>" target="_blank">Facebook</a>
                                                        <a href="<?= $token['website'] ?>" target="_blank"><em class="icon myfs-md ni ni-check text-success text-bold pl-2"></em></a>
                                                        <a href="<?= $token['website'] ?>" target="_blank"><strong><em class="icon myfs-md ni ni-cross text-danger text-bold pl-2"></em></strong></a>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?= $token['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Promote
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $token['id'] ?>">
                                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Post</a></li>
                                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateVideo" data-accountid="<?= $token['id'] ?>" data-category="Solana">Generate Video</a></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="shareTo" data-accountid="<?= $token['id'] ?>" data-category="Solana" data-platform="Facebook">Share to</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
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
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#faceboook-table').DataTable({
            "order": [[ 2, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
