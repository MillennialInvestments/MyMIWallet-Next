<?php 
$subViewData = [
    'investDashboard' => $investDashboard,
    'userInvestments' => $userInvestments,
];
echo view('Investments/resources/goal_based_investing', $subViewData); 
?>