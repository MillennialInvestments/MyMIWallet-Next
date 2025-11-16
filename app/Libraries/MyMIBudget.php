<?php

namespace App\Libraries;

use App\Config\{SiteSettings};
use App\Libraries\{BaseLoader, MyMIUser};
use App\Models\{AccountsModel, BudgetModel, WalletModel, MgmtBudgetModel}; // Replace with actual model names and paths
use App\Services\BudgetService;
use App\DTO\Budget\{BudgetRecord, CashFlowSnapshot};
use DateInterval;
use DateTimeImmutable;
use DateTimeZone;
use CodeIgniter\Session\Session;
use function budget_normalize_money;

#[\AllowDynamicProperties]
class MyMIBudget
{   

    protected $auth;
    protected $cuID;
    protected $db;
    protected $debug;
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $accountsModel;
    protected $budgetModel;
    protected $mgmtBudgetModel;
    protected $MyMIUser;
    protected $walletModel;
    protected BudgetService $budgetService;
    
    public function __construct()
    {
        $this->auth                             = service('authentication');
        $this->db                               = \Config\Database::connect();
        $this->request                          = service('request');
        $this->session                          = service('session');
        $this->siteSettings                     = config('SiteSettings');
        $this->debug                            = $this->siteSettings->debug; 
        $this->accountsModel                    = new AccountsModel();
        $this->budgetModel                      = new BudgetModel();
        $this->walletModel                      = new WalletModel();
        $this->mgmtBudgetModel                  = new MgmtBudgetModel();
        $this->cuID                             = $this->session->get('user_id') ?? $this->auth->id() ?? 0;

        // Initialize MyMIUser library or model
        $this->MyMIUser                         = new MyMIUser();
        $this->budgetService                    = new BudgetService();
    }

    private function getAccountSummary($cuID, $type) {
        // Assuming $type can be 'income' or 'expense'
        $accountSummary = $this->budgetModel->getSummaryByType($cuID, $type);
        return $accountSummary;
    }


    /**
     * @param BudgetRecord[] $records
     * @return BudgetRecord[]
     */
    private function filterRecordsByWindow(array $records, DateTimeImmutable $start, DateTimeImmutable $end): array
    {
        return array_values(array_filter(
            $records,
            static fn (BudgetRecord $record) => $record->date >= $start && $record->date < $end
        ));
    }

    private function snapshotToArray(CashFlowSnapshot $snapshot): array
    {
        return [
            'income'             => $snapshot->income,
            'expenses'           => $snapshot->expenses,
            'net'                => $snapshot->net,
            'debtService'        => $snapshot->debtService,
            'availableToInvest'  => $snapshot->availableToInvest,
        ];
    }

    public function allUserBudgetInfo($cuID)
    {
        $incomeAccountSummary = $this->getIncomeAccountSummary($cuID);
        $expenseAccountSummary = $this->getExpenseAccountSummary($cuID);
        $userAccount = $this->MyMIUser->getUserInformation($cuID);

        $userBudgetRecords = $this->budgetModel->getUserBudgetRecords($cuID) ?? [];
        $userActiveBudgetRecords = $this->budgetModel->getUserActiveBudgetRecords($cuID) ?? [];
        $userSourceRecords = $this->request->getUri()->getSegment(2) === 'Account-Overview'
            ? ($this->budgetModel->getSourceRecords($cuID) ?? [])
            : [];

        $normalizedRecords = array_map(fn ($row) => $this->budgetService->normalizeBudgetRecord($row, $cuID), $userBudgetRecords);
        $debtRecords = [];

        $tz = new DateTimeZone('America/Chicago');
        $currentStart = (new DateTimeImmutable('first day of this month', $tz))->setTime(0, 0);
        $nextStart = $currentStart->add(new DateInterval('P1M'));
        $previousStart = $currentStart->sub(new DateInterval('P1M'));
        $afterNextStart = $nextStart->add(new DateInterval('P1M'));

        $periodSnapshots = [
            'thisMonth' => $this->budgetService->summarizeCashFlow(
                $this->filterRecordsByWindow($normalizedRecords, $currentStart, $nextStart),
                $debtRecords
            ),
            'lastMonth' => $this->budgetService->summarizeCashFlow(
                $this->filterRecordsByWindow($normalizedRecords, $previousStart, $currentStart),
                $debtRecords
            ),
            'nextMonth' => $this->budgetService->summarizeCashFlow(
                $this->filterRecordsByWindow($normalizedRecords, $nextStart, $afterNextStart),
                $debtRecords
            ),
            'lifetime'  => $this->budgetService->summarizeCashFlow($normalizedRecords, $debtRecords),
        ];

        return [
            'userAccount'             => $userAccount,
            'incomeAccountSummary'    => $incomeAccountSummary,
            'expenseAccountSummary'   => $expenseAccountSummary,
            'userBudgetRecords'       => $userBudgetRecords,
            'userActiveBudgetRecords' => $userActiveBudgetRecords,
            'userSourceRecords'       => $userSourceRecords,
            'periodSummaries'         => array_map([$this, 'snapshotToArray'], $periodSnapshots),
        ];
    }

    
    // public function allUserBudgetInfo($cuID)
    // {        
    //     $incomeAccountSummary                   = $this->getIncomeAccountSummary($cuID);
    //     $expenseAccountSummary                  = $this->getExpenseAccountSummary($cuID);
    //     $userAccount                            = $this->MyMIUser->getUserInformation($cuID); // Assuming MyMIUser is integrated in CI4

    //     $monthlySavingsPercentage               = 0.2;
    //     $monthlySavingsPercentageFMT            = number_format($monthlySavingsPercentage * 100, 0) . '%';

    //     $userBudgetRecords                      = $this->budgetModel->getUserBudgetRecords($cuID);
    //     $userActiveBudgetRecords                = $this->budgetModel->getUserActiveBudgetRecords($cuID);
    //     if ($this->request->getUri()->getSegment(2) === 'Account-Overview') {
    //         $userSourceRecords                  = $this->budgetModel->getSourceRecords($cuID); 
    //     } else {
    //         $userSourceRecords                  = [];
    //     }
    //     // Calculations for this month
    //     $thisMonthsIncomeResult                 = $this->budgetModel->getThisMonthsIncome($cuID);
    //     $thisMonthsExpenseResult                = $this->budgetModel->getThisMonthsExpense($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $thisMonthsIncome                       = abs($thisMonthsIncomeResult['net_amount'] ?? 0);
    //     if ($thisMonthsIncome < 0) {
    //         $thisMonthsIncomeFMT                = '-$' . number_format(abs($thisMonthsIncome), 2);
    //     } else {
    //         $thisMonthsIncomeFMT                = '$' . number_format($thisMonthsIncome, 2);
    //     }   
    //     $thisMonthsExpense                      = abs($thisMonthsExpenseResult['net_amount'] ?? 0);
    //     if ($thisMonthsExpense > 0) {
    //         $thisMonthsExpenseFMT               = '-$' . number_format(abs($thisMonthsExpense),2);
    //     } else {
    //         $thisMonthsExpenseFMT               = '$' . number_format($thisMonthsExpense,2);
    //     }
        
    //     $thisMonthsSurplus                      = abs(($thisMonthsIncome - $thisMonthsExpense) ?? 0);
    //     if ($thisMonthsSurplus < 0) {
    //         $thisMonthsSurplusFMT               = '-$' . number_format($thisMonthsSurplus,2);
    //     } else {
    //         $thisMonthsSurplusFMT               = '$' . number_format($thisMonthsSurplus,2);
    //     }

    //     $thisMonthsInvestments                  = abs(($thisMonthsSurplus * $monthlySavingsPercentage) ?? 0);
    //     if ($thisMonthsInvestments < 0) {
    //         $thisMonthsInvestmentsFMT           = '-$' . number_format($thisMonthsInvestments,2);
    //         $thisMonthsInvestmentsSplitFMT      = '-$' . number_format($thisMonthsInvestments/2,2);
    //     } else {
    //         $thisMonthsInvestmentsFMT           = '$' . number_format($thisMonthsInvestments,2);
    //         $thisMonthsInvestmentsSplitFMT      = '$' . number_format($thisMonthsInvestments/2,2);
    //     }      

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $lastMonthsIncomeResult                 = $this->budgetModel->getLastMonthsIncome($cuID);
    //     $lastMonthsExpenseResult                = $this->budgetModel->getLastMonthsExpense($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $lastMonthsIncome                       = abs($lastMonthsIncomeResult['net_amount'] ?? 0);
    //     // $lastMonthsIncome                       = $getLastMonthsIncome[0]['net_amount'] ?? 0; 
    //     if ($lastMonthsIncome < 0) {
    //         $lastMonthsIncomeFMT                = '-$' . number_format(abs($lastMonthsIncome),2);
    //     } else {
    //         $lastMonthsIncomeFMT                = '$' . number_format($lastMonthsIncome,2);
    //     }
        
    //     $lastMonthsExpense                      = abs($lastMonthsExpenseResult['net_amount'] ?? 0);
    //     if ($lastMonthsExpense > 0) {
    //         $lastMonthsExpenseFMT               = '-$' . number_format(abs($lastMonthsExpense),2);
    //     } else {
    //         $lastMonthsExpenseFMT               = '$' . number_format($lastMonthsExpense,2);
    //     }
        
    //     $lastMonthsSurplus                      = abs(($lastMonthsIncome - $lastMonthsExpense) ?? 0);
    //     if ($lastMonthsSurplus < 0) {
    //         $lastMonthsSurplusFMT               = '-$' . number_format($lastMonthsSurplus,2);
    //     } else {
    //         $lastMonthsSurplusFMT               = '$' . number_format($lastMonthsSurplus,2);
    //     }

    //     $lastMonthsInvestments                  = abs(($lastMonthsSurplus * $monthlySavingsPercentage) ?? 0);
    //     if ($lastMonthsInvestments < 0) {
    //         $lastMonthsInvestmentsFMT           = '-$' . number_format($lastMonthsInvestments,2);
    //     } else {
    //         $lastMonthsInvestmentsFMT           = '$' . number_format($lastMonthsInvestments,2);
    //     }      

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $nextMonthsIncomeResult                 = $this->budgetModel->getNextMonthsIncome($cuID);
    //     $nextMonthsExpenseResult                = $this->budgetModel->getNextMonthsExpense($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $nextMonthsIncome                       = abs($nextMonthsIncomeResult['net_amount'] ?? 0);
    //     if ($nextMonthsIncome < 0) {
    //         $nextMonthsIncomeFMT                = '-$' . number_format(abs($nextMonthsIncome),2);
    //     } else {
    //         $nextMonthsIncomeFMT                = '$' . number_format($nextMonthsIncome,2);
    //     }

    //     $nextMonthsExpense                      = abs($nextMonthsExpenseResult['net_amount'] ?? 0);
    //     if ($nextMonthsExpense > 0) {
    //         $nextMonthsExpenseFMT               = '-$' . number_format(abs($nextMonthsExpense),2);
    //     } else {
    //         $nextMonthsExpenseFMT               = '$' . number_format($nextMonthsExpense,2);
    //     }
        
    //     $nextMonthsSurplus                      = abs(($nextMonthsIncome - $nextMonthsExpense) ?? 0);
    //     if ($nextMonthsSurplus < 0) {
    //         $nextMonthsSurplusFMT               = '-$' . number_format($nextMonthsSurplus,2);
    //     } else {
    //         $nextMonthsSurplusFMT               = '$' . number_format($nextMonthsSurplus,2);
    //     }

    //     $nextMonthsInvestments                  = abs(($nextMonthsSurplus * $monthlySavingsPercentage) ?? 0);     
    //     if ($nextMonthsInvestments < 0) {
    //         $nextMonthsInvestmentsFMT           = '-$' . number_format($nextMonthsInvestments,2);
    //     } else {
    //         $nextMonthsInvestmentsFMT           = '$' . number_format($nextMonthsInvestments,2);
    //     } 

    //     // !! ---- HERE --- !! //        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $totalIncome                            = $incomeAccountSummary['income'] ?? 0;
    //     if ($totalIncome < 0) {
    //         $totalIncomeFMT                     = '-$' . number_format(abs($totalIncome),2);
    //     } else {
    //         $totalIncomeFMT                     = '$' . number_format($totalIncome,2);
    //     }
    //     $totalExpense                           = $expenseAccountSummary['expenses'] ?? 0;
    //     if ($totalExpense > 0) {
    //         $totalExpenseFMT                    = '-$' . number_format(abs($totalExpense),2);
    //     } else {
    //         $totalExpenseFMT                    = '$' . number_format($totalExpense,2);
    //     }
        
    //     $totalSurplus                           = $totalIncome - $totalExpense;
    //     if ($totalSurplus < 0) {
    //         $totalSurplusFMT                    = '-$' . number_format($totalSurplus,2);
    //     } else {
    //         $totalSurplusFMT                    = '$' . number_format($totalSurplus,2);
    //     }

    //     $totalInvestments                       = $totalSurplus * $monthlySavingsPercentage;   
    //     if ($totalInvestments < 0) {
    //         $totalInvestmentsFMT                = '-$' . number_format($totalInvestments,2);
    //     } else {
    //         $totalInvestmentsFMT                = '$' . number_format($totalInvestments,2);
    //     }  

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $incomeYTDResult                        = $this->budgetModel->getIncomeYTDSummary($cuID);
    //     $expenseYTDResult                       = $this->budgetModel->getExpenseYTDSummary($cuID);
    //     $lastYearIncomeResult                   = $this->budgetModel->getLastYTDIncomeSummary($cuID); 
    //     $lastYearExpenseResult                  = $this->budgetModel->getLastYTDExpenseSummary($cuID); 
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $totalIncome                            = $incomeYTDResult[0]['ytd_income'] ?? 0;
    //     $totalExpense                           = $expenseYTDResult[0]['ytd_expense'] ?? 0; 
    //     $lastYTDTotalIncome                     = $lastYearIncomeResult[0]['ytd_income'] ?? 0;
    //     if ($lastYTDTotalIncome < 0) {
    //         $lastYTDTotalIncomeFMT              = '<span class="statusRed">-$' . number_format(abs($lastYTDTotalIncome),2) . '</span>';
    //     } else {
    //         $lastYTDTotalIncomeFMT              = '$' . number_format($lastYTDTotalIncome,2);
    //     }  
    //     $lastYTDTotalExpense                    = $lastYearExpenseResult[0]['ytd_expense'] ?? 0;
    //     if ($lastYTDTotalExpense < 0) {
    //         $lastYTDTotalExpenseFMT              = '<span class="statusRed">-$' . number_format(abs($lastYTDTotalExpense),2) . '</span>';
    //     } else {
    //         $lastYTDTotalExpenseFMT              = '$' . number_format($lastYTDTotalExpense,2);
    //     }  
    //     $lastYTDTotalSurplus                    = $lastYTDTotalIncome - $lastYTDTotalExpense; 
    //     if ($lastYTDTotalSurplus > 0) {
    //         $lastYTDTotalSurplusFMT              = '<span class="statusRed">-$' . number_format(abs($lastYTDTotalSurplus),2) . '</span>';
    //     } else {
    //         $lastYTDTotalSurplusFMT              = '$' . number_format($lastYTDTotalSurplus,2);
    //     }  
    //     $lastYTDTotalInvestments                = $lastYTDTotalSurplus * $monthlySavingsPercentage; 
    //     if ($lastYTDTotalInvestments < 0) {
    //         $lastYTDTotalInvestmentsFMT         = '<span class="statusRed">-$' . number_format(abs($lastYTDTotalInvestments),2) . '</span>';
    //     } else {
    //         $lastYTDTotalInvestmentsFMT         = '$' . number_format($lastYTDTotalInvestments,2);
    //     }     

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $checkingSummaryResult                  = $this->budgetModel->getCheckingSummary($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $checkingSummary                        = $checkingSummaryResult['balance'];
    //     if ($checkingSummary < 0) {
    //         $checkingSummaryFMT                 = '-$' . number_format(abs($checkingSummary ?? 0),2);
    //     } else {
    //         $checkingSummaryFMT                 = '$' . number_format(abs($checkingSummary ?? 0),2);
    //     }

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $creditAvailableResult                  = $this->budgetModel->getCreditAccountsSummary($cuID);
    //     $debtSummaryResult                      = $this->budgetModel->getDebtAccountsSummary($cuID);
    //     $investSummaryResult                    = $this->budgetModel->getInvestAccountsSummary($cuID);
    //     $cryptoSummaryResult                    = $this->budgetModel->getCryptoAccountsSummary($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $creditLimit                            = $creditAvailableResult['credit_limit'] ?? 0;
    //     if ($creditLimit < 0) {
    //         $creditLimitFMT                     = '<span class="statusRed">-$' . number_format(abs($creditLimit),2) . '</span>';
    //     } else {
    //         $creditLimitFMT                     = '$' . number_format($creditLimit,2);
    //     }      
    //     // Assuming some logic to get $creditAvailableResult and $creditLimit
    //     $creditAvailable                        = $creditAvailableResult['available_balance'];

    //     if (is_null($creditAvailable)) {
    //         $creditAvailable                    = 0; // Handle null case
    //     }

    //     if ($creditAvailable > $creditLimit) {
    //         $creditAvailableFMT                 = '$' . number_format($creditAvailable, 2);
    //     } else {
    //         $creditAvailableFMT                 = '<span>$' . number_format(abs($creditAvailable), 2) . '</span>';
    //     }
    //     $debtSummary                            = $debtSummaryResult['current_balance'] ?? 0;   
    //     if ($debtSummary > 0) {
    //         $debtSummaryFMT                     = '-$' . number_format(abs($debtSummary),2);
    //     } else {
    //         $debtSummaryFMT                     = '$' . number_format($debtSummary,2);
    //     } 
    //     // !! ---- HERE --- !! //
    //     $cryptoSummary                          = $cryptoSummaryResult['net_worth'] ?? 0; 
    //     if ($cryptoSummary < 0) {
    //         $cryptoSummaryFMT                   = '-$' . number_format(abs($cryptoSummary), 2); 
    //     } else {
    //         $cryptoSummaryFMT                   = '$' . number_format($cryptoSummary, 2); 
    //     }
    //     $investSummary                          = $investSummaryResult['net_worth'] ?? 0;   
    //     if ($investSummary < 0) {
    //         $investSummaryFMT                   = '-$' . number_format(abs($investSummary),2);
    //     } else {
    //         $investSummaryFMT                   = '$' . number_format($investSummary,2);
    //     }  


    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $incomeYTDSummaryResult                 = $this->budgetModel->getIncomeYTDSummary($cuID);
    //     // log_message('debug', 'MyMIBudget L283 - $incomeYTDSummaryResult: ' . (print_r($incomeYTDSummaryResult, true)));
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $incomeYTDSummary                       = $incomeYTDSummaryResult[0]['ytd_income'];
    //     // log_message('debug', 'MyMIBudget L283 - $incomeYTDSummary: ' . (print_r($incomeYTDSummary, true)));
    //     if ($incomeYTDSummary === null) {
    //         $incomeYTDSummaryFMT                = '$0.00'; // or any other default value you'd like to use
    //     } else {
    //         if ($incomeYTDSummary < 0) {
    //             $incomeYTDSummaryFMT            = '-$' . number_format($incomeYTDSummary, 2);
    //         } else {
    //             $incomeYTDSummaryFMT            = '$' . number_format($incomeYTDSummary, 2);
    //         }
    //     }

    //     // !! ---- HERE --- !! //
    //     // Calculations for this month
    //     $expenseYTDSummaryResult                  = $this->budgetModel->getExpenseYTDSummary($cuID);
        
    //     // Assuming the result is an array and 'net_amount' is the sum you need
    //     $expenseYTDSummary                        = $expenseYTDSummaryResult[0]['ytd_expense'] ?? 0;
    //     if ($expenseYTDSummary === null) {
    //         $expenseYTDSummaryFMT = '$0.00'; // or any other default value you'd like to use
    //     } else {
    //         if ($expenseYTDSummary < 0) {
    //             $expenseYTDSummaryFMT = '-$' . number_format($expenseYTDSummary, 2);
    //         } else {
    //             $expenseYTDSummaryFMT = '$' . number_format($expenseYTDSummary, 2);
    //         }
    //     }

    //     // !! ---- HERE --- !! //
    //     $allAccounts                            = $this->mgmtBudgetModel->getAccounts(); // Assuming getAccounts() method returns an array
    //     $totalAccountBalance                    = $checkingSummary + $creditAvailable + $creditLimit;
    //     if ($totalAccountBalance < 0) {
    //         $totalAccountBalanceFMT             = '-$' . number_format($totalAccountBalance,2);
    //     } else {
    //         $totalAccountBalanceFMT             = '$' . number_format($totalAccountBalance,2);
    //     }
    //     if ($this->debug === 1) {
    //         // log_message('debug', 'MyMIBudget Debug L314); 
    //         // log_message('debug', 'MyMIBudget L41 - $incomeAccountSummary: ' . print_r($incomeAccountSummary, true));
    //         // log_message('debug', 'MyMIBudget L43 - $expenseAccountSummary: ' . print_r($expenseAccountSummary, true));
    //         // log_message('debug', 'MyMIBudget L244 - $creditAvailable: ' . $creditAvailable);
    //         // log_message('debug', 'MyMIBudget L162 - $totalIncome: ' . $totalIncome); 
    //         // log_message('debug', 'MyMIBudget L173 - $totalIncome: ' . $totalIncome);
    //         // log_message('debug', 'MyMIBudget L162 - $totalExpense: ' . $totalExpense); 
    //         // log_message('debug', 'MyMIBudget L173 - $totalExpense: ' . $totalExpense);
    //         // log_message('debug', 'MyMIBudget L197 - $getIncomeYTDSummary: ' . print_r($incomeYTDResult, true));
    //         // log_message('debug', 'MyMIBudget L198 - $lastYearIncomeResult: ' . print_r($lastYearIncomeResult, true));
    //         // log_message('debug', 'MyMIBudget - L209 - $debtSummaryResult: ' . print_r($debtSummaryResult, true));
    //         // log_message('debug', 'MyMIBudget L265 - $checkingSummaryResult: ' . print_r($checkingSummaryResult, true));
    //         // log_message('debug', 'MyMIBudget L252 - $incomeYTDSummary: ' . $incomeYTDSummary);
    //         // log_message('debug', 'MyMIBudget L252 - $expenseYTDSummary: ' . $expenseYTDSummary);
    //         // log_message('debug', 'MyMIBudget L250 - $incomeYTDSummaryResult: ' . print_r($incomeYTDSummaryResult, true));
    //         // log_message('debug', 'MyMIBudget L267 - $expenseYTDSummaryResult: ' . print_r($expenseYTDSummaryResult, true));
    //     }
    //     $allUserBudgets = [
    //         'message_type'                      => 'Success',
    //         'message'                           => 'Data Retrieved Successfully',
    //         'allAccounts'                       => $allAccounts,
    //         'userBudgetRecords'                 => $userBudgetRecords,
    //         'userActiveBudgetRecords'           => $userActiveBudgetRecords,
    //         'userSourceRecords'                 => $userSourceRecords,
    //         // !! Start This Month Here:
    //         'thisMonthsIncome'                  => $thisMonthsIncome,
    //         'thisMonthsIncomeFMT'               => $thisMonthsIncomeFMT,
    //         'thisMonthsExpense'                 => $thisMonthsExpense,
    //         'thisMonthsExpenseFMT'              => $thisMonthsExpenseFMT,
    //         'thisMonthsSurplus'                 => $thisMonthsSurplus,
    //         'thisMonthsSurplusFMT'              => $thisMonthsSurplusFMT,
    //         'thisMonthsInvestments'             => $thisMonthsInvestments,
    //         'thisMonthsInvestmentsFMT'          => $thisMonthsInvestmentsFMT,
    //         'thisMonthsInvestmentsSplitFMT'     => $thisMonthsInvestmentsSplitFMT,
    //         // !! Start Last Month Here:
    //         'lastMonthsIncome'                  => $lastMonthsIncome,
    //         'lastMonthsIncomeFMT'               => $lastMonthsIncomeFMT,
    //         'lastMonthsExpense'                 => $lastMonthsExpense,
    //         'lastMonthsExpenseFMT'              => $lastMonthsExpenseFMT,
    //         'lastMonthsSurplus'                 => $lastMonthsSurplus,
    //         'lastMonthsSurplusFMT'              => $lastMonthsSurplusFMT,
    //         'lastMonthsInvestments'             => $lastMonthsInvestments,
    //         'lastMonthsInvestmentsFMT'          => $lastMonthsInvestmentsFMT,
    //         // !! Start Last Year Here:
    //         'lastYTDTotalIncome'                => $lastYTDTotalIncome,
    //         'lastYTDTotalIncomeFMT'             => $lastYTDTotalIncomeFMT,
    //         'lastYTDTotalExpense'               => $lastYTDTotalExpense,
    //         'lastYTDTotalExpenseFMT'            => $lastYTDTotalExpenseFMT,
    //         'lastYTDTotalSurplus'               => $lastYTDTotalSurplus,
    //         'lastYTDTotalSurplusFMT'            => $lastYTDTotalSurplusFMT,
    //         'lastYTDTotalInvestments'           => $lastYTDTotalInvestments,
    //         'lastYTDTotalInvestmentsFMT'        => $lastYTDTotalInvestmentsFMT,
    //         // !! Start Next Month Here:
    //         'nextMonthsIncome'                  => $nextMonthsIncome,
    //         'nextMonthsIncomeFMT'               => $nextMonthsIncomeFMT,
    //         'nextMonthsExpense'                 => $nextMonthsExpense,
    //         'nextMonthsExpenseFMT'              => $nextMonthsExpenseFMT,
    //         'nextMonthsSurplus'                 => $nextMonthsSurplus,
    //         'nextMonthsSurplusFMT'              => $nextMonthsSurplusFMT,
    //         'nextMonthsInvestments'             => $nextMonthsInvestments,
    //         'nextMonthsInvestmentsFMT'          => $nextMonthsInvestmentsFMT,
    //         'totalIncome'                       => $totalIncome,
    //         'totalIncomeFMT'                    => $totalIncomeFMT,
    //         'totalExpense'                      => $totalExpense,
    //         'totalExpenseFMT'                   => $totalExpenseFMT,
    //         'totalSurplus'                      => $totalSurplus,
    //         'totalSurplusFMT'                   => $totalSurplusFMT,
    //         'totalInvestments'                  => $totalInvestments,
    //         'totalInvestmentsFMT'               => $totalInvestmentsFMT,
    //         'checkingSummary'                   => $checkingSummary,
    //         'checkingSummaryFMT'                => $checkingSummaryFMT,
    //         'incomeYTDSummary'                  => $incomeYTDSummary,
    //         'incomeYTDSummaryFMT'               => $incomeYTDSummaryFMT,
    //         'expenseYTDSummary'                 => $expenseYTDSummary,
    //         'expenseYTDSummaryFMT'              => $expenseYTDSummaryFMT,
    //         'creditLimit'                       => $creditLimit,
    //         'creditLimitFMT'                    => $creditLimitFMT,
    //         'creditAvailable'                   => $creditAvailable,
    //         'creditAvailableFMT'                => $creditAvailableFMT,
    //         'debtSummary'                       => $debtSummary,
    //         'debtSummaryFMT'                    => $debtSummaryFMT,
    //         'cryptoSummary'                     => $cryptoSummary,
    //         'cryptoSummaryFMT'                  => $cryptoSummaryFMT,
    //         'investSummary'                     => $investSummary,
    //         'investSummaryFMT'                  => $investSummaryFMT,
    //         'totalAccountBalance'               => $totalAccountBalance, 
    //         'totalAccountBalanceFMT'            => $totalAccountBalanceFMT, 
    //     ];
    //     if ($this->debug === 1) {
    //         // log_message('debug', 'MyMIBudget L355 - $allUserBudgets-creditAvailable: ' . $allUserBudgets['creditAvailable']); 
    //     }; 
    //     return $allUserBudgets;
    // }

    // public function userBudgetInfo($cuID)
    // {
    //     $financialAccountSummary                = $this->getAccountSummary($cuID, 'financial');
    //     $incomeAccountSummary                   = $this->getIncomeAccountSummary($cuID);
    //     $expenseAccountSummary                  = $this->getExpenseAccountSummary($cuID);
    //     $debtAccountSummary                     = $this->getDebtAccountSummary($cuID);
    
    //     $accountSurplus                         = $incomeAccountSummary['income'] - $expenseAccountSummary['expenses'];
    
    //     $userBudgetRecords                      = $this->allUserBudgetInfo($cuID);
    
    //     $userBudget = [
    //         'cuID' => $cuID,
    //         'incomeAccountSummary'              => $incomeAccountSummary,
    //         'debtAccountSummary'                => $debtAccountSummary,
    //         'expenseAccountSummary'             => $expenseAccountSummary,
    //         'accountSurplus'                    => $accountSurplus,
    //         'accountTotalSurplus'               => number_format($accountSurplus, 2),
    //         'userBudgetRecords'                 => $userBudgetRecords,
    //     ];
    
    //     return $userBudget;
    // }   

    // public function calculateMonthlyData($budgetData) {
    //     $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    //     $incomes = array_fill(0, 12, 0);
    //     $expenses = array_fill(0, 12, 0);
    //     $surpluses = array_fill(0, 12, 0);
    
    //     foreach ($budgetData as $item) {
    //         $monthIndex = date('n', strtotime($item['designated_date'])) - 1; // Get month index (0-11)
    
    //         log_message('debug', 'Processing item: ' . print_r($item, true));
    
    //         if ($item['account_type'] === 'Income') {
    //             $incomes[$monthIndex] += $item['net_amount'];
    //         } elseif ($item['account_type'] === 'Expense') {
    //             $expenses[$monthIndex] += $item['net_amount'];
    //         }
    //     }
    
    //     for ($i = 0; $i < 12; $i++) {
    //         $surpluses[$i] = $incomes[$i] - $expenses[$i];
    //     }
    
    //     log_message('debug', 'Monthly Incomes: ' . print_r($incomes, true));
    //     log_message('debug', 'Monthly Expenses: ' . print_r($expenses, true));
    //     log_message('debug', 'Monthly Surpluses: ' . print_r($surpluses, true));
    
    //     return [
    //         'months' => $months,
    //         'incomes' => $incomes,
    //         'expenses' => $expenses,
    //         'surpluses' => $surpluses,
    //     ];
    // }

    // public function calculateForecastData($budgetData, $years) {
    //     $months = [];
    //     $incomes = [];
    //     $expenses = [];
    //     $surpluses = [];
    
    //     // Start with initial income and expense values
    //     $initialIncome = array_sum(array_column(array_filter($budgetData, function ($item) {
    //         return $item['account_type'] === 'Income';
    //     }), 'net_amount'));
    
    //     $initialExpense = array_sum(array_column(array_filter($budgetData, function ($item) {
    //         return $item['account_type'] === 'Expense';
    //     }), 'net_amount'));
    
    //     for ($i = 0; $i < $years * 12; $i++) {
    //         $monthIndex = $i % 12;
    //         $yearIndex = floor($i / 12);
    //         $monthName = date('F', mktime(0, 0, 0, $monthIndex + 1, 10)) . ' ' . (date('Y') + $yearIndex);
    //         $months[] = $monthName;
    
    //         // Apply a growth factor (e.g., 3% annual growth)
    //         $growthFactor = pow(1.03, $yearIndex);
    //         $monthlyIncome = $initialIncome * $growthFactor;
    //         $monthlyExpense = $initialExpense * $growthFactor;
    
    //         $incomes[] = $monthlyIncome;
    //         $expenses[] = $monthlyExpense;
    //         $surpluses[] = $monthlyIncome - $monthlyExpense;
    //     }
    
    //     return [
    //         'months' => $months,
    //         'incomes' => $incomes,
    //         'expenses' => $expenses,
    //         'surpluses' => $surpluses,
    //     ];
    // }
         
    // private function formatBudgetData($budgetData) {
    //     // Use null coalescing operator ?? 0 to ensure no null values are passed
    //     $budgetData['thisMonthsIncomeFMT'] = number_format($budgetData['thisMonthsIncome'] ?? 0, 2);
    //     $budgetData['thisMonthsExpenseFMT'] = number_format($budgetData['thisMonthsExpense'] ?? 0, 2);
    //     $budgetData['thisMonthsSurplusFMT'] = number_format($budgetData['thisMonthsSurplus'] ?? 0, 2);
    //     $budgetData['thisMonthsInvestmentsFMT'] = number_format($budgetData['thisMonthsInvestments'] ?? 0, 2);
    //     $budgetData['thisMonthsInvestmentsSplitFMT'] = number_format(($budgetData['thisMonthsInvestments'] ?? 0) / 2, 2);
    
    //     $budgetData['lastMonthsIncomeFMT'] = number_format($budgetData['lastMonthsIncome'] ?? 0, 2);
    //     $budgetData['lastMonthsExpenseFMT'] = number_format($budgetData['lastMonthsExpense'] ?? 0, 2);
    //     $budgetData['lastMonthsSurplusFMT'] = number_format($budgetData['lastMonthsSurplus'] ?? 0, 2);
    //     $budgetData['lastMonthsInvestmentsFMT'] = number_format($budgetData['lastMonthsInvestments'] ?? 0, 2);
    
    //     $budgetData['nextMonthsIncomeFMT'] = number_format($budgetData['nextMonthsIncome'] ?? 0, 2);
    //     $budgetData['nextMonthsExpenseFMT'] = number_format($budgetData['nextMonthsExpense'] ?? 0, 2);
    //     $budgetData['nextMonthsSurplusFMT'] = number_format($budgetData['nextMonthsSurplus'] ?? 0, 2);
    //     $budgetData['nextMonthsInvestmentsFMT'] = number_format($budgetData['nextMonthsInvestments'] ?? 0, 2);
    
    //     $budgetData['totalIncomeFMT'] = number_format($budgetData['totalIncome'] ?? 0, 2);
    //     $budgetData['totalExpenseFMT'] = number_format($budgetData['totalExpense'] ?? 0, 2);
    //     $budgetData['totalSurplusFMT'] = number_format($budgetData['totalSurplus'] ?? 0, 2);
    //     $budgetData['totalInvestmentsFMT'] = number_format($budgetData['totalInvestments'] ?? 0, 2);
    
    //     $budgetData['checkingSummaryFMT'] = number_format($budgetData['checkingSummary'] ?? 0, 2);
    //     $budgetData['incomeYTDSummaryFMT'] = number_format($budgetData['incomeYTDSummary'] ?? 0, 2);
    //     $budgetData['expenseYTDSummaryFMT'] = number_format($budgetData['expenseYTDSummary'] ?? 0, 2);
    
    //     $budgetData['creditLimitFMT'] = number_format($budgetData['creditLimit'] ?? 0, 2);
    //     $budgetData['creditAvailableFMT'] = number_format($budgetData['creditAvailable'] ?? 0, 2);
    //     $budgetData['cryptoSummaryFMT'] = number_format($budgetData['cryptoSummary'] ?? 0, 2);
    //     $budgetData['debtSummaryFMT'] = number_format($budgetData['debtSummary'] ?? 0, 2);
    //     $budgetData['debtAvailableFMT'] = number_format($budgetData['debtAvailable'] ?? 0, 2);
    //     $budgetData['investSummaryFMT'] = number_format($budgetData['investSummary'] ?? 0, 2);
    //     $budgetData['totalAccountBalanceFMT'] = number_format($budgetData['totalAccountBalance'] ?? 0, 2);
    
    //     return $budgetData;
    // }

    // private function getMonthlyIncome($budgetData, $month) {
    //     // Calculate the total income for the month
    //     return array_sum(array_map(function($item) use ($month) {
    //         return ($item['account_type'] === 'income' && date('m', strtotime($item['month'] . '/' . $item['day'] . '/' . $item['year'])) == $month) ? $item['net_amount'] : 0;
    //     }, $budgetData));
    // }
    
    // private function getMonthlyExpense($budgetData, $month) {
    //     // Calculate the total expense for the month
    //     return array_sum(array_map(function($item) use ($month) {
    //         return ($item['account_type'] === 'expense' && date('m', strtotime($item['month'] . '/' . $item['day'] . '/' . $item['year'])) == $month) ? $item['net_amount'] : 0;
    //     }, $budgetData));
    // }
    
    public function getIncomeAccountSummary($cuID)
    {
        $income = $thisMonthIncome = $lastMonthIncome = 0.00;
        $momIncomeAverages = 0.00;

        // Ensuring default array to avoid null
        $getIncomeAccountSummary = $this->budgetModel->getIncomeAccountsSummary($cuID) ?? [];
        foreach ($getIncomeAccountSummary as $incomeAccount) {
            $income = max($income, $incomeAccount['net_amount'] ?? 0.00);
        }

        $sourceType = $incomeAccount['source_type'];
        // Ensuring a default value for calculation and avoiding null
        $getTMIncomeAccountSummary = $this->budgetModel->getThisMonthIncomeAccountSummary($cuID) ?? ['net_amount' => 0];
        $thisMonthIncome = $getTMIncomeAccountSummary['net_amount'] ?? 0.00;

        // Similar approach for last month's income
        $getLMIncomeAccountSummary = $this->budgetModel->getLastMonthIncomeAccountSummary($cuID) ?? ['net_amount' => 0];
        $lastMonthIncome = $getLMIncomeAccountSummary['net_amount'] ?? 0.00;

        // Calculation with proper checking to avoid division by zero
        if ($lastMonthIncome > 0) {
            $momIncomeAverages = ($thisMonthIncome - $lastMonthIncome) / $lastMonthIncome * 100;
        } else {
            $momIncomeAverages = 0.00;
        }

        $incomeAccountSummary = [
            'income' => $income,
            'sourceType' => $sourceType,
            'thisMonthIncome' => $thisMonthIncome,
            'lastMonthIncome' => $lastMonthIncome,
            'momIncomeAverages' => $momIncomeAverages,
        ];

        return $incomeAccountSummary;
    }

    public function getBudgetRecordsIsDebt($userId) {
        // Assuming you have a method in your model to retrieve debt-related budget records
        return $this->budgetModel->getDebtRecordsByUser($userId); // Adjust this to your model's method
    }
    
    public function getExpenseAccountSummary($cuID)
    {
        $expenses = $thisMonthExpenses = $lastMonthExpenses = 0.00;
        $momExpenseAverages = 0.00;

        $getExpenseAccountSummary = $this->budgetModel->getExpenseAccountsSummary($cuID) ?? ['total_expense' => 0];
        $expenses = $getExpenseAccountSummary['total_expense'] ?? 0.00;

        $getTMExpenseAccountSummary = $this->budgetModel->getThisMonthExpenseAccountSummary($cuID) ?? ['net_amount' => 0];
        $thisMonthExpenses = $getTMExpenseAccountSummary['net_amount'] ?? 0.00;

        $getLMExpenseAccountSummary = $this->budgetModel->getLastMonthExpenseAccountSummary($cuID) ?? ['net_amount' => 0];
        $lastMonthExpenses = $getLMExpenseAccountSummary['net_amount'] ?? 0.00;

        if (!empty($lastMonthExpenses)) {
            $momExpenseAverages = ($thisMonthExpenses - $lastMonthExpenses) / $lastMonthExpenses * 100;
        } else {
            $momExpenseAverages = 0.00;
        }

        $expenseAccountSummary = [
            'expenses' => $expenses,
            'thisMonthExpenses' => $thisMonthExpenses,
            'lastMonthExpenses' => $lastMonthExpenses,
            'momExpenseAverages' => $momExpenseAverages,
        ];

        return $expenseAccountSummary;
    }

    public function getDebtAccountSummary($cuID) {
        $totalDebt = 0.00;
    
        $getDebtAccounts = $this->budgetModel->getDebtAccounts($cuID);
        
        // Ensure $getDebtAccounts is an array before iteration
        if (is_array($getDebtAccounts)) {
            foreach ($getDebtAccounts as $thisDebtAccount) {
                $totalDebt += $thisDebtAccount['available_balance'] ?? 0.00;
            }
        }
    
        $debtAccountSummary = [
            'totalDebt' => $totalDebt,
        ];
    
        return $debtAccountSummary;
    }   

    public function getTotalAccountBalance($userId) {
        // Fetch the income accounts
        $incomeAccounts = $this->budgetModel->getIncomeAccountsSummary($userId);
        $totalIncome = 0;

        foreach ($incomeAccounts as $incomeAccount) {
            $totalIncome += (float)$incomeAccount['net_amount'];
        }

        // Fetch the expense accounts
        $expenseAccounts = $this->budgetModel->getExpenseAccountsSummary($userId);
        $totalExpenses = 0;

        foreach ($expenseAccounts as $expenseAccount) {
            $totalExpenses += (float)$expenseAccount['net_amount'];
        }

        // Calculate the total account balance
        $totalBalance = $totalIncome - $totalExpenses;

        return $totalBalance;
    }

    public function getUserBudget($userId) {
        $userBudget = [];

        // Get budget records
        $userBudget['userBudgetRecords'] = $this->budgetModel->getUserBudgetRecords($userId);
        $userBudget['userActiveBudgetRecords'] = $this->budgetModel->getUserActiveBudgetRecords($userId);

        // Get this month's income, expense, and investments
        $userBudget['thisMonthsIncome'] = $this->budgetModel->getThisMonthsIncome($userId)['net_amount'] ?? 0;
        $userBudget['thisMonthsExpense'] = $this->budgetModel->getThisMonthsExpense($userId)['net_amount'] ?? 0;
        $userBudget['thisMonthsInvestments'] = $this->budgetModel->getThisMonthsInvestments($userId)['net_amount'] ?? 0;  // Add investment-related data
        $userBudget['thisMonthsSurplus'] = $userBudget['thisMonthsIncome'] - $userBudget['thisMonthsExpense'];

        // Get last month's income, expense, and investments
        $userBudget['lastMonthsIncome'] = $this->budgetModel->getLastMonthsIncome($userId)['net_amount'] ?? 0;
        $userBudget['lastMonthsExpense'] = $this->budgetModel->getLastMonthsExpense($userId)['net_amount'] ?? 0;
        $userBudget['lastMonthsInvestments'] = $this->budgetModel->getLastMonthsInvestments($userId)['net_amount'] ?? 0;  // Add investment-related data
        $userBudget['lastMonthsSurplus'] = $userBudget['lastMonthsIncome'] - $userBudget['lastMonthsExpense'];

        // Get next month's income, expense, and investments
        $userBudget['nextMonthsIncome'] = $this->budgetModel->getNextMonthsIncome($userId)['net_amount'] ?? 0;
        $userBudget['nextMonthsExpense'] = $this->budgetModel->getNextMonthsExpense($userId)['net_amount'] ?? 0;
        $userBudget['nextMonthsInvestments'] = $this->budgetModel->getNextMonthsInvestments($userId)['net_amount'] ?? 0;  // Add investment-related data
        $userBudget['nextMonthsSurplus'] = $userBudget['nextMonthsIncome'] - $userBudget['nextMonthsExpense'];

        // Total income, expense, surplus, and investments
        $userBudget['totalIncome'] = $this->budgetModel->getAnnualIncome($userId)['net_amount'] ?? 0;
        $userBudget['totalExpense'] = $this->budgetModel->getAnnualExpense($userId)['net_amount'] ?? 0;
        $userBudget['totalSurplus'] = $userBudget['totalIncome'] - $userBudget['totalExpense'];
        $userBudget['totalInvestments'] = $this->budgetModel->getTotalInvestments($userId)['net_amount'] ?? 0;  // Add total investment-related data

        // YTD summaries
        $userBudget['incomeYTDSummary'] = $this->budgetModel->getAnnualIncomeYTD($userId)['net_amount'] ?? 0;
        $userBudget['expenseYTDSummary'] = $this->budgetModel->getAnnualExpenseYTD($userId)['net_amount'] ?? 0;

        // Account summaries
        $userBudget['checkingSummary'] = $this->budgetModel->getCheckingSummary($userId)['balance'] ?? 0;
        $userBudget['cryptoSummary'] = $this->budgetModel->getCryptoSummary($userId) ?? 0;

        $debtSummaryRow = $this->budgetModel->getDebtAccountsSummary($userId) ?? [];
        $userBudget['debtSummary']      = $debtSummaryRow['current_balance'] ?? $debtSummaryRow['available_balance'] ?? 0;
        $userBudget['debtAvailable']    = $debtSummaryRow['available_balance'] ?? 0;
        $userBudget['debtCreditLimit']  = $debtSummaryRow['credit_limit'] ?? 0;
        $userBudget['investSummary'] = $this->budgetModel->getInvestAccountsSummary($userId)['net_worth'] ?? 0;

        // Credit limit and available credit
        $userBudget['creditLimit'] = $this->budgetModel->getCreditLimitSummary($userId)['credit_limit'] ?? 0;
        $userBudget['creditAvailable'] = $this->budgetModel->getCreditAvailableSummary($userId)['available_balance'] ?? 0;

        // Total account balance
        $userBudget['totalAccountBalance'] = $this->budgetModel->getTotalAccountBalance($userId);

        // Format values
        $userBudget = $this->formatBudgetData($userBudget);

        return $userBudget;
    }

    /**
     * Normalize and format user budget data for downstream consumers.
     */
    protected function formatBudgetData(array $userBudget): array
    {
        $defaults = [
            'thisMonthsIncome'           => 0.0,
            'thisMonthsExpense'          => 0.0,
            'thisMonthsSurplus'          => 0.0,
            'thisMonthsInvestments'      => 0.0,
            'thisMonthsInvestmentsSplit' => 0.0,
            'lastMonthsIncome'           => 0.0,
            'lastMonthsExpense'          => 0.0,
            'lastMonthsSurplus'          => 0.0,
            'lastMonthsInvestments'      => 0.0,
            'nextMonthsIncome'           => 0.0,
            'nextMonthsExpense'          => 0.0,
            'nextMonthsSurplus'          => 0.0,
            'nextMonthsInvestments'      => 0.0,
            'totalIncome'                => 0.0,
            'totalExpense'               => 0.0,
            'totalSurplus'               => 0.0,
            'totalInvestments'           => 0.0,
            'incomeYTDSummary'           => 0.0,
            'expenseYTDSummary'          => 0.0,
            'checkingSummary'            => 0.0,
            'savingsSummary'             => 0.0,
            'investmentSummary'          => 0.0,
            'cryptoSummary'              => 0.0,
            'debtSummary'                => 0.0,
            'debtAvailable'              => 0.0,
            'debtCreditLimit'            => 0.0,
            'investSummary'              => 0.0,
            'creditLimit'                => 0.0,
            'creditAvailable'            => 0.0,
            'totalAccountBalance'        => 0.0,
            'initialBankBalance'         => 0.0,
        ];

        foreach ($defaults as $key => $default) {
            $userBudget[$key] = $this->normalizeMoney($userBudget[$key] ?? $default);
        }

        if (!array_key_exists('investmentSummary', $userBudget)) {
            $userBudget['investmentSummary'] = $userBudget['investSummary'];
        }

        $formatMap = [
            'thisMonthsIncome'           => 'thisMonthsIncomeFMT',
            'thisMonthsExpense'          => 'thisMonthsExpenseFMT',
            'thisMonthsSurplus'          => 'thisMonthsSurplusFMT',
            'thisMonthsInvestments'      => 'thisMonthsInvestmentsFMT',
            'thisMonthsInvestmentsSplit' => 'thisMonthsInvestmentsSplitFMT',
            'lastMonthsIncome'           => 'lastMonthsIncomeFMT',
            'lastMonthsExpense'          => 'lastMonthsExpenseFMT',
            'lastMonthsSurplus'          => 'lastMonthsSurplusFMT',
            'lastMonthsInvestments'      => 'lastMonthsInvestmentsFMT',
            'nextMonthsIncome'           => 'nextMonthsIncomeFMT',
            'nextMonthsExpense'          => 'nextMonthsExpenseFMT',
            'nextMonthsSurplus'          => 'nextMonthsSurplusFMT',
            'nextMonthsInvestments'      => 'nextMonthsInvestmentsFMT',
            'totalIncome'                => 'totalIncomeFMT',
            'totalExpense'               => 'totalExpenseFMT',
            'totalSurplus'               => 'totalSurplusFMT',
            'totalInvestments'           => 'totalInvestmentsFMT',
            'incomeYTDSummary'           => 'incomeYTDSummaryFMT',
            'expenseYTDSummary'          => 'expenseYTDSummaryFMT',
            'checkingSummary'            => 'checkingSummaryFMT',
            'savingsSummary'             => 'savingsSummaryFMT',
            'investmentSummary'          => 'investmentSummaryFMT',
            'cryptoSummary'              => 'cryptoSummaryFMT',
            'debtSummary'                => 'debtSummaryFMT',
            'debtAvailable'              => 'debtAvailableFMT',
            'debtCreditLimit'            => 'debtCreditLimitFMT',
            'investSummary'              => 'investSummaryFMT',
            'creditLimit'                => 'creditLimitFMT',
            'creditAvailable'            => 'creditAvailableFMT',
            'totalAccountBalance'        => 'totalAccountBalanceFMT',
            'initialBankBalance'         => 'initialBankBalanceFMT',
        ];

        foreach ($formatMap as $key => $formattedKey) {
            $userBudget[$formattedKey] = $this->formatCurrency($userBudget[$key] ?? 0.0);
        }

        return $userBudget;
    }

    protected function normalizeMoney($value): float
    {
        return budget_normalize_money($value ?? 0.0);
    }

    protected function formatCurrency(float $amount): string
    {
        $prefix = $amount < 0 ? '-$' : '$';

        return $prefix . number_format(abs($amount), 2, '.', ',');
    }

    public function getUserBudgetRecord($cuID, $accountID) {
        $accountInformation = $this->budgetModel->getUserBudgetRecord($cuID, $accountID);
        $userBudgetRecord = array();
        if ($this->debug === 1) {
            // log_message('debug', '$accountInformation: ' . print_r($accountInformation, true));
        }
        if ($accountInformation === null) {
            return null; // Ensure we return an empty array if no record is found
        } else {
            foreach ($accountInformation as $accountInfo) {
                $userBudgetRecord = array(
                    'accountID' => $accountInfo['id'],
                    'accountPaidStatus' => $accountInfo['paid'] ?? 0,
                    'accountDesDate' => $accountInfo['designated_date'],
                    'accountMonth' => $accountInfo['month'],
                    'accountDay' => $accountInfo['day'],
                    'accountYear' => $accountInfo['year'],
                    'accountTime' => $accountInfo['time'],
                    'accountCreator' => $accountInfo['created_by'],
                    'accountCreatorEmail' => $accountInfo['created_by_email'],
                    'accountName' => $accountInfo['name'],
                    'accountNetAmount' => $accountInfo['net_amount'],
                    'accountGrossAmount' => $accountInfo['gross_amount'] ?? 0, // Assuming you might also need this
                    'accountSummary' => $accountInfo['account_summary'],
                    'accountWallet' => $accountInfo['wallet_id'],
                    'accountRecurring' => $accountInfo['recurring_account'],
                    'accountRecurringPrimary' => $accountInfo['recurring_account_primary'] ?? 'No', // Assuming you might also need this
                    'accountRecurringID' => $accountInfo['recurring_account_id'],
                    'accountRecurringSchedule' => $accountInfo['recurring_schedule'],
                    'accountType' => $accountInfo['account_type'],
                    'accountSource' => $accountInfo['source_type'],
                    'accountIsDebt' => $accountInfo['is_debt'] ?? 0, // Assuming you might also need this
                    'accountIsCCPay' => $accountInfo['is_cc_payment'] ?? 0, // Assuming you might also need this
                    'accountIntervals' => $accountInfo['intervals'],
                    'accountWeeksLeft' => $accountInfo['initial_weeks_left'],
                );
            }
        }
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIBudget L539 - $userBudgetRecord: ' . print_r($userBudgetRecord, true));
        }
        return $userBudgetRecord;
    }    
    
    public function getUserRelatedBudgetRecords($cuID, $accountName) {
        $getUserRelatedBudgetAccounts           = $this->budgetModel->getUserRelatedBudgetRecords($cuID, $accountName); 
        return $getUserRelatedBudgetAccounts; 
    }

    public function getUserBudgetAccounts($cuID) {
        $getUserBudgetAccounts                  = $this->budgetModel->getAccounts($cuID);
        
        $userBudgetAccounts                     = array(
            'getUserBudgetAccounts'             => $getUserBudgetAccounts, 
        );

        return $userBudgetAccounts;
    }

    public function getUserRiskProfile(int $userId): array
    {
        $forecast = $this->getForecastForUser($userId);
        $disposable = $forecast['disposable_monthly'];

        if ($disposable >= 1000) {
            return ['risk_level' => 'Aggressive', 'min_score' => 8];
        } elseif ($disposable >= 500) {
            return ['risk_level' => 'Moderate', 'min_score' => 5];
        } else {
            return ['risk_level' => 'Conservative', 'min_score' => 2];
        }
    }

    public function getUserRiskProfileSafe($userId): array
    {
        $id = is_numeric($userId) ? (int) $userId : 0;

        if ($id <= 0) {
            return [
                'profile'     => 'neutral',
                'score'       => 50,
                'volatility'  => 'medium',
                'notes'       => 'Default risk profile (anonymous).',
            ];
        }

        return $this->getUserRiskProfile($id);
    }

    private function getFinancialsForPeriod($cuID, $period) {
        // Assuming there's a method in the budget_model to get financials by period
        $financials = $this->budgetModel->getFinancialsByPeriod($cuID, $period);
        return $financials;
    }

    public function getFirstBudgetAccount($cuID) {
        $getFirstBudgetAccount                  = $this->budgetModel->getFirstBudgetAccount($cuID);
        foreach($getFirstBudgetAccount as $firstAccount) {
            $firstAccountDate                   = $firstAccount['designated_date'];
            $firstAccountMonth                  = $firstAccount['month'];
            $firstAccountDay                    = $firstAccount['day'];
            $firstAccountYear                   = $firstAccount['year'];
        }
        $firstBudgetAccount                     = array(
            'getFirstBudgetAccount'             => $getFirstBudgetAccount,
            'firstAccountDate'                  => $firstAccountDate,
            'firstAccountMonth'                 => $firstAccountMonth,
            'firstAccountDay'                   => $firstAccountDay,
            'firstAccountYear'                  => $firstAccountYear,
        );
        return $firstBudgetAccount;
    }

    public function getForecastForUser(int $userId): array
    {
        try {
            $service = $this->getBudgetService();
            if (!$service) {
                throw new \RuntimeException('BudgetService not initialized.');
            }

            $forecast = $service->getForecastDataForUser($userId);
            return [
                'monthly_income' => $forecast['monthly_income'] ?? 0,
                'monthly_expenses' => $forecast['monthly_expenses'] ?? 0,
                'disposable_monthly' => ($forecast['monthly_income'] ?? 0) - ($forecast['monthly_expenses'] ?? 0),
                'annual_forecast' => $forecast['annual_forecast'] ?? [],
            ];
        } catch (\Throwable $e) {
            log_message('error', 'MyMIBudget::getForecastForUser failed: ' . $e->getMessage());
            return [
                'monthly_income' => 0,
                'monthly_expenses' => 0,
                'disposable_monthly' => 0,
                'annual_forecast' => [],
            ];
        }
    }

    // Add this helper inside MyMIBudget
    private function getBudgetService(): BudgetService
    {
        // If you ever change constructor wiring, this still keeps it safe.
        if (! isset($this->budgetService)) {
            $this->budgetService = new BudgetService();
        }

        return $this->budgetService;
    }

    private function getSingleAccountSummary($cuID, $type) {
        // Assuming there's a method in the wallet_model to get account summary by type
        $accountSummary = $this->walletModel->getAccountSummary($cuID, $type);
        return $accountSummary;
    }

    private function getCreditSummary($cuID) {
        // Assuming there's a method in the wallet_model to get credit summary
        $creditSummary = $this->walletModel->getCreditSummary($cuID);
        return $creditSummary;
    }

    private function calculateTotalAccountBalance($cuID) {
        // Assuming there's a method in the wallet_model to calculate total balance
        $totalBalance = $this->walletModel->calculateTotalBalance($cuID);
        return $totalBalance;
    }

    private function getAllAccountSummaries($cuID) {
        // Assuming there's a method in the mgmt_budget_model to get all account summaries
        $allAccountSummaries = $this->CI->mgmt_budget_model->getAllAccount_summaries($cuID);
        return $allAccountSummaries;
    }

    private function format_budget_info($budgetInfo) {
        // Formatting logic goes here
        // For example, formatting numbers as currency
        foreach ($budgetInfo as $key => $value) {
            if (is_numeric($value)) {
                $budgetInfo[$key] = number_format($value, 2, '.', ',');
            }
        }
        return $budgetInfo;
    }

    private function get_monthly_savings_percentage($cuID) {
        // This could be a user setting or calculated value
        // For simplicity, we're returning a fixed value here
        return 0.2; // 20%
    }

    // ! The bulkUpdate Function needs to be completely rebuilt below
    // // Library method for bulk update
    // public function bulkUpdate($ids, $newData) {
    //     $this->CI->db->where_in('id', $ids);
    //     $this->CI->db->update('bf_users_budgeting', $newData);
    // }

    // ... other private methods
}
?>
