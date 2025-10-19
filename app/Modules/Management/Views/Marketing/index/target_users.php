<?php
// Parameters
$start_date = new DateTime('2024-11-01');
$end_date = new DateTime('2025-11-01');
$target_users = 550; // Adjustable target user count
$start_users = 1; // Starting user base

// Calculate months between dates
$months = $start_date->diff($end_date)->m + ($start_date->diff($end_date)->y * 12);

// Calculate growth rate
$growth_rate = pow($target_users / $start_users, 1 / $months);

// Generate user growth data
$user_data = [];
$total_users = $start_users;
for ($month = 0; $month <= $months; $month++) {
    $monthly_users = round($total_users);
    $user_data[] = [
        'month' => $start_date->modify('+1 month')->format('F Y'),
        'new_users' => $month == 0 ? $monthly_users : round($total_users - $user_data[$month - 1]['new_users']),
        'total_users' => $monthly_users
    ];
    $total_users *= $growth_rate;
}
?>

<!-- HTML Structure -->
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start">
            <div class="card-title">
                <h6 class="title">Projected Monthly User Growth</h6>
                <p>Dynamically calculated user growth over the selected timeframe.</p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="userGrowthTable">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>New Users</th>
                    <th>Total Users</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_data as $data): ?>
                <tr>
                    <td><?= $data['month'] ?></td>
                    <td><?= $data['new_users'] ?></td>
                    <td><?= $data['total_users'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
