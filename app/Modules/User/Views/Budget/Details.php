<?php
// CI4 Budget Details view.
//
// Routing: /Budget/Details/(:segment) -> BudgetController::details($accountID)
// (see app/Config/Routes.php). The controller already loads the user-scoped
// $userBudgetRecord and $userRelatedBudgetAccounts via BudgetService and
// passes them in $this->data. This view renders strictly from that data.
//
// Banking-account details are served by a different route/controller
// (/Banking/Details/(:segment) -> WalletsController::details), so this view
// must NOT branch on $uri->getSegment(...) or run its own DB lookups —
// doing so previously dead-coded one branch under /Budget/Details and would
// have leaked accounts (no ownership check) under any other route.

$userBudgetRecord       = is_array($userBudgetRecord ?? null) ? $userBudgetRecord : [];
$budgetRelatedRecords   = is_array($userRelatedBudgetAccounts ?? null) ? $userRelatedBudgetAccounts : [];

$recordID               = $userBudgetRecord['accountID']                ?? null;
$recordDesDate          = $userBudgetRecord['accountDesDate']           ?? null;
$recordType             = $userBudgetRecord['accountType']              ?? null;
$recordSource           = $userBudgetRecord['accountSource']            ?? null;
$recordName             = $userBudgetRecord['accountName']              ?? null;
$recordBalance          = $userBudgetRecord['accountNetAmount']         ?? null;
$recordRecurring        = $userBudgetRecord['accountRecurring']         ?? null;
$recordRecAccount       = $userBudgetRecord['accountRecurringPrimary']  ?? null;
$recordIntervals        = $userBudgetRecord['accountIntervals']         ?? null;

$accountInformation = [
    'cuID'                  => $cuID                ?? null,
    'recordID'              => $recordID,
    'recordDesDate'         => $recordDesDate,
    'recordType'            => $recordType,
    'recordSource'          => $recordSource,
    'recordName'            => $recordName,
    'recordBalance'         => $recordBalance !== null ? number_format((float) $recordBalance, 2) : '0.00',
    'recordRecurring'       => $recordRecurring,
    'recordRecAccount'      => $recordRecAccount,
    'recordIntervals'       => $recordIntervals,
    'budgetRelatedRecords'  => $budgetRelatedRecords,
];

echo view('UserModule\Views\Budget\Details\accounts', $accountInformation);
