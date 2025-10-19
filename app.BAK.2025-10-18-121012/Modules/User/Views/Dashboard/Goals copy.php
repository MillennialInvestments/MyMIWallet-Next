<?php
echo view('App/Views/errors\html\under_construction');

// Logging for debugging
log_message('debug', 'Dashboard\Goals L2 - $userNextGoal array: ' . print_r($userNextGoal, true));

// Setting up variables
$userGoals = $pendingGoals;
$userCompletions = $completedGoals;
?>
<div class="nk-content-body pt-0">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">MyMI Gold - <?= htmlspecialchars($taskCategory); ?> Checklist</h3>
                <div class="nk-block-des text-soft">
                    <p>Earn <strong>FREE</strong> MyMI Gold to gain access to Premium Services & Tools.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Block -->
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner p-0">
                    <table class="nk-tb-list nk-tb-ulist">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="pid-all">
                                        <label class="custom-control-label" for="pid-all"></label>
                                    </div>
                                </th>
                                <th class="nk-tb-col tb-col-xxl"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Gold Rewards</span></th>
                                <th class="nk-tb-col tb-col-xxl"><span class="sub-text">Category</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Earn</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Filter goals by type (e.g., daily, weekly, etc.) based on $taskCategory
                            $filteredGoals = array_filter($userGoals, function ($goal) use ($taskCategory) {
                                return strtolower($goal['goal_type']) === strtolower($taskCategory);
                            });

                            // Identify completed goals
                            $completedGoals = array_column($userCompletions, 'goal_id');

                            // Locate the next incomplete goal
                            $nextGoal = null;
                            foreach ($filteredGoals as $goal) {
                                if (!in_array($goal['id'], $completedGoals)) {
                                    $nextGoal = $goal;
                                    break;
                                }
                            }

                            // Render the next goal if available
                            //if ($nextGoal) { 
                                ?>
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="pid-<?= htmlspecialchars($nextGoal['id']); ?>">
                                            <label class="custom-control-label" for="pid-<?= htmlspecialchars($nextGoal['id']); ?>"></label>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-xxl">
                                        <span>Not Started</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-xxl">
                                        <a href="html/apps-kanban.html" class="project-title">
                                            <div class="user-avatar sq bg-blue">
                                                <span><?= htmlspecialchars(number_format($nextGoal['gold_reward'], 0)); ?></span>
                                            </div>
                                            <div class="project-info">
                                                <h6 class="title">MyMI Gold</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="nk-tb-col tb-col-xxl">
                                        <span><?= htmlspecialchars(ucfirst($nextGoal['category'])); ?></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <a class="badge badge-dim bg-primary" data-bs-toggle="collapse" href="#collapseExample<?= htmlspecialchars($nextGoal['id']); ?>" aria-expanded="false" aria-controls="collapseExample">
                                            <em class="icon ni ni-clock"></em><span>Start</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="collapse" id="collapseExample<?= htmlspecialchars($nextGoal['id']); ?>">
                                    <td colspan="5">
                                        <div class="card card-body">
                                            <h6>Goal Description: <small><?= htmlspecialchars($nextGoal['goal_description']); ?></small></h6>
                                        </div>
                                    </td>
                                </tr>
                            <?php // } else { ?>
                                <!-- <tr>
                                    <td colspan="5" class="text-center">
                                        <em>No goals available for this category.</em>
                                    </td>
                                </tr> -->
                            <?php //} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>