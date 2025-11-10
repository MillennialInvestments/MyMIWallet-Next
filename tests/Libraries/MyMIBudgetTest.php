<?php

namespace Tests\Libraries;

use App\Libraries\MyMIBudget;
use App\Services\BudgetService;
use CodeIgniter\Test\CIUnitTestCase;

class MyMIBudgetTest extends CIUnitTestCase
{
    public function testAllUserBudgetInfoProducesStructuredSnapshots(): void
    {
        $library = new class extends MyMIBudget {
            public function __construct()
            {
                // Intentionally skip parent constructor.
            }

            public function setDependencies($budgetModel, $userLib, $service, $request): void
            {
                $this->budgetModel = $budgetModel;
                $this->MyMIUser = $userLib;
                $this->budgetService = $service;
                $this->request = $request;
            }
        };

        $budgetModel = new class {
            public function getUserBudgetRecords($cuID = null): array
            {
                return [
                    [
                        'id' => 1,
                        'created_by' => 7,
                        'account_type' => 'Income',
                        'source_type' => 'Salary',
                        'net_amount' => 4000,
                        'designated_date' => '2024-07-01',
                    ],
                    [
                        'id' => 2,
                        'created_by' => 7,
                        'account_type' => 'Expense',
                        'source_type' => 'Housing',
                        'net_amount' => -1500,
                        'designated_date' => '2024-07-02',
                    ],
                    [
                        'id' => 3,
                        'created_by' => 7,
                        'account_type' => 'Expense',
                        'source_type' => 'Loan',
                        'is_debt' => 1,
                        'net_amount' => -200,
                        'designated_date' => '2024-06-15',
                    ],
                ];
            }

            public function getUserActiveBudgetRecords($cuID = null): array
            {
                return [];
            }

            public function getSourceRecords($cuID = null): array
            {
                return [];
            }

            public function getIncomeAccountsSummary($cuID)
            {
                return [
                    ['net_amount' => 4000, 'source_type' => 'Salary'],
                ];
            }

            public function getThisMonthIncomeAccountSummary($cuID)
            {
                return ['net_amount' => 4000];
            }

            public function getLastMonthIncomeAccountSummary($cuID)
            {
                return ['net_amount' => 3800];
            }

            public function getExpenseAccountsSummary($cuID)
            {
                return ['total_expense' => 1500];
            }

            public function getThisMonthExpenseAccountSummary($cuID)
            {
                return ['net_amount' => 1500];
            }

            public function getLastMonthExpenseAccountSummary($cuID)
            {
                return ['net_amount' => 1400];
            }
        };

        $userLib = new class {
            public function getUserInformation($userId): array
            {
                return ['id' => $userId, 'username' => 'tester'];
            }
        };

        $request = new class {
            public function getUri()
            {
                return new class {
                    public function getSegment($segment)
                    {
                        return 'Dashboard';
                    }
                };
            }
        };

        $service = new BudgetService(7);

        $library->cuID = 7;
        $library->setDependencies($budgetModel, $userLib, $service, $request);

        $result = $library->allUserBudgetInfo(7);

        $this->assertArrayHasKey('periodSummaries', $result);
        $this->assertSame(4, count($result['periodSummaries']));
        $this->assertSame(4000.0, $result['periodSummaries']['thisMonth']['income']);
        $this->assertSame(1500.0, $result['periodSummaries']['thisMonth']['expenses']);
        $this->assertArrayHasKey('availableToInvest', $result['periodSummaries']['thisMonth']);
    }
}