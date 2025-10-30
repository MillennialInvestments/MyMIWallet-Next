<?php 
$subViewData = [
    'investDashboard' => $investDashboard,
    'userInvestments' => $userInvestments,
];
echo view('UserModule\Views\Investments\resources\goal_based_investing', $subViewData); 
?>