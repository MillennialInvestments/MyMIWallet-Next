<?php 
// echo view('App\Views\errors\html\under_construction');

// Logging for debugging
// log_message('debug', 'Dashboard\Goals L2 - Initializing Goals');

// Ensure $pendingGoals and $completedGoals are initialized
$userGoals = $pendingGoals ?? [];
$userCompletions = $completedGoals ?? [];
$taskCategory = $taskCategory ?? 'Daily'; // Default task category

// log_message('debug', 'Dashboard\Goals L4 - $userGoals array: ' . print_r($userGoals, true));
// log_message('debug', 'Dashboard\Goals L5 - $taskCategory: ' . $taskCategory);

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

    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner">
                    <table class="table table-bordered display" id="userGoalsTable">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="pid-all">
                                        <label class="custom-control-label" for="pid-all"></label>
                                    </div>
                                </th>
                                <th>Status</th>
                                <th>Goal Description</th>
                                <th>Gold Rewards</th>
                                <th>Category</th>
                                <th>Earn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $filteredGoals = array_filter($userGoals, function ($goal) use ($taskCategory) {
                                return strtolower($goal['goal_type'] ?? '') === strtolower($taskCategory);
                            });

                            $completedGoals = array_column($userCompletions, 'goal_id');

                            if (!empty($filteredGoals)) {
                                foreach ($filteredGoals as $goal) {
                                    $isCompleted = in_array($goal['id'], $completedGoals);
                                    $status = $isCompleted ? 'Completed' : 'Not Started';
                                    ?>
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="pid-<?= htmlspecialchars($goal['id'] ?? ''); ?>" <?= $isCompleted ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="pid-<?= htmlspecialchars($goal['id'] ?? ''); ?>"></label>
                                            </div>
                                        </td>
                                        <td><?= htmlspecialchars($status); ?></td>
                                        <td><?= htmlspecialchars($goal['goal_description'] ?? ''); ?></td>
                                        <td><?= htmlspecialchars(number_format($goal['gold_reward'] ?? 0, 0)); ?></td>
                                        <td><?= htmlspecialchars(ucfirst($goal['category'] ?? '')); ?></td>
                                        <td>
                                            <a class="badge badge-dim bg-primary" href="#" data-bs-toggle="tooltip" title="<?= htmlspecialchars($goal['goal_description'] ?? ''); ?>">
                                                <em class="icon ni ni-clock"></em><span><?= $isCompleted ? 'View' : 'Start'; ?></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <em>No goals available for this category.</em>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Initialize DataTables
    $('#userGoalsTable').DataTable({
        "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
        "responsive": true,
        "autoWidth": false, // Prevent miscalculations
        "columnDefs": [
            {
                "targets": [0], // Exclude the checkbox column from sorting
                "orderable": false
            }
        ]
    });

    // Initialize Bootstrap tooltips (if used for descriptions)
    $('[data-bs-toggle="tooltip"]').tooltip();
});
</script>
