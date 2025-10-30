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
                        <h1 class="nk-block-title title">MyMI Management - <?= $channel; ?></h1>
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
                        <?php echo view('ManagementModule\Views\Marketing\Exchanges\includes\action_center', $viewFileData); ?>
                    </div>
                    <!-- Month-to-Month Overview -->
                    <div class="col-12 col-xxl-8">
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered pb-4 pricing px-2">
                                <div class="pricing-head">
                                    <div class="pricing-title">
                                        <h4 class="card-title title"><?= $pageTitle ?></h4>
                                        <p class="sub-text">List of top communities on Websites.</p>
                                    </div>
                                    <div class="row mt-4">
                                        <!-- Discord Button -->
                                        <div class="d-none d-md-block col-md-1"></div>
                                        <!-- Market Refresh Button -->
                                        <div class="col-12 col-md-2 mb-2">
                                            <button id="marketRefreshBtn" class="btn btn-success w-100"><em class="icon ni ni-reload mr-2"></em> Market Data</button>
                                        </div>
                                        <div class="col-12 col-md-2 mb-2">
                                            <a href="<?= site_url('Management/Marketing/Exchanges/Top-Communities/Discord') ?>" class="btn btn-primary text-center w-100"><em class="icon bi bi-discord mr-2"></em> Discord</a>
                                        </div>
                                        <!-- Facebook Button -->
                                        <div class="col-12 col-md-2 mb-2">
                                            <a href="<?= site_url('Management/Marketing/Exchanges/Top-Communities/Facebook') ?>" class="btn btn-primary w-100"><em class="icon ni ni-facebook-f mr-2"></em> Facebook</a>
                                        </div>
                                        <!-- Twitter Button -->
                                        <div class="col-12 col-md-2 mb-2">
                                            <a href="<?= site_url('Management/Marketing/Exchanges/Top-Communities/Twitter') ?>" class="btn btn-primary w-100"><em class="icon ni ni-twitter mr-2"></em> Twitter</a>
                                        </div>
                                        <!-- Telegram Button -->
                                        <div class="col-12 col-md-2 mb-2">
                                            <a href="<?= site_url('Management/Marketing/Exchanges/Top-Communities/Telegram') ?>" class="btn btn-primary w-100"><em class="icon ni ni-telegram mr-2"></em> Telegram</a>
                                        </div>
                                        <div class="d-none d-md-block col-md-1"></div>
                                    </div>
                                </div>

                                <div class="pricing-body">
                                    <table id="website-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="d-none">ID</th>
                                                <th>Token</th>
                                                <th>Market Cap</th>
                                                <th>Website Link</th>
                                                <th>Social Media</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tokens as $token): ?>
                                                <tr>
                                                    <th class="d-none"><?= $token['id']; ?></th>
                                                    <td><?= $token['coin_name'] ?></td>
                                                    <td><?php echo '$' . number_format((float)$token['market_cap'], 0); ?></td>
                                                    <td>
                                                        <a href="<?= $token['website'] ?>" target="_blank">Website</a>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($token['discord'])) : ?>
                                                            <a href="<?= $token['discord'] ?>" target="_blank"><em class="icon myfs-md bi bi-discord"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($token['facebook'])) : ?>
                                                            <a href="<?= $token['facebook'] ?>" target="_blank"><em class="icon myfs-md ni ni-facebook-f"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($token['telegram'])) : ?>
                                                            <a href="<?= $token['telegram'] ?>" target="_blank"><em class="icon myfs-md ni ni-telegram"></em></a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($token['twitter'])) : ?>
                                                            <a href="<?= $token['twitter'] ?>" target="_blank"><em class="icon myfs-md ni ni-twitter"></em></a>
                                                        <?php endif; ?>
                                                        <a href="<?= site_url('Management/Marketing/Exchanges/Edit/' . $token['id']) ?>" target="_blank"><em class="icon myfs-md ni ni-plus"></em></a>
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

                                                <!-- Share Modal -->
                                                <div class="modal fade" id="shareModal<?= $token['id'] ?>" tabindex="-1" aria-labelledby="shareModalLabel<?= $token['id'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="shareModalLabel<?= $token['id'] ?>">Share <?= $token['coin_name'] ?> to Social Media</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label for="socialMediaPlatform<?= $token['id'] ?>" class="form-label">Select Platform</label>
                                                                        <select class="form-select" id="socialMediaPlatform<?= $token['id'] ?>">
                                                                            <option value="facebook">Facebook</option>
                                                                            <option value="twitter">Twitter</option>
                                                                            <option value="discord">Discord</option>
                                                                            <option value="telegram">Telegram</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="promotionalMessage<?= $token['id'] ?>" class="form-label">Promotional Message</label>
                                                                        <textarea class="form-control" id="promotionalMessage<?= $token['id'] ?>" rows="3"><?= "Check out " . $token['coin_name'] . " on our platform! Visit: " . $token['website'] ?></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Share Now</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Share Modal -->

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
        $('#website-table').DataTable({
            "order": [[ 1, "desc" ]],     
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('marketRefreshBtn').addEventListener('click', function () {
        // Fetch the latest market data
        fetch('<?= site_url('solana/market-refresh') ?>', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update the table with the new data
            const tableBody = document.querySelector('#website-table tbody');
            tableBody.innerHTML = ''; // Clear the existing table rows
            
            data.tokens.forEach(token => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${token.coin_name}</td>
                    <td>$${Number(token.market_cap).toLocaleString()}</td>
                    <td>
                        <a href="${token.website}" target="_blank">Website</a>
                        <a href="${token.website}" target="_blank"><em class="icon myfs-md ni ni-check text-green"></em></a>
                    </td>
                    <td>
                        ${token.discord ? `<a href="${token.discord}" target="_blank"><em class="icon myfs-md bi bi-discord"></em></a>` : ''}
                        ${token.facebook ? `<a href="${token.facebook}" target="_blank"><em class="icon myfs-md ni ni-facebook-f"></em></a>` : ''}
                        ${token.telegram ? `<a href="${token.telegram}" target="_blank"><em class="icon myfs-md ni ni-telegram"></em></a>` : ''}
                        ${token.twitter ? `<a href="${token.twitter}" target="_blank"><em class="icon myfs-md ni ni-twitter"></em></a>` : ''}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton${token.id}" data-bs-toggle="dropdown" aria-expanded="false">
                                Promote
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${token.id}">
                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateContent" data-accountid="${token.id}" data-category="Solana">Generate Post</a></li>
                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="generateVideo" data-accountid="${token.id}" data-category="Solana">Generate Video</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item dynamicModalLoader" href="#" data-formtype="Marketing" data-endpoint="shareTo" data-accountid="${token.id}" data-category="Solana" data-platform="Facebook">Share to</a></li>
                            </ul>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error refreshing market data:', error));
    });
</script>
