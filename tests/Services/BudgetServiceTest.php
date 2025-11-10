<?php

namespace Tests\Services;

use App\Services\BudgetService;
use CodeIgniter\Test\CIUnitTestCase;

class BudgetServiceTest extends CIUnitTestCase
{
    private BudgetService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new BudgetService(1);
    }

    public function testSummarizeCashFlowHonorsReserveRequirement(): void
    {
        $records = [
            [
                'id'            => 1,
                'created_by'    => 1,
                'name'          => 'Salary',
                'account_type'  => 'Income',
                'source_type'   => 'Employment',
                'net_amount'    => 5200,
                'designated_date' => '2024-07-01',
            ],
            [
                'id'            => 2,
                'created_by'    => 1,
                'name'          => 'Rent',
                'account_type'  => 'Expense',
                'source_type'   => 'Housing',
                'net_amount'    => -1800,
                'designated_date' => '2024-07-05',
            ],
            [
                'id'            => 3,
                'created_by'    => 1,
                'name'          => 'Loan Payment',
                'account_type'  => 'Expense',
                'source_type'   => 'Loan',
                'is_debt'       => 1,
                'net_amount'    => -350,
                'designated_date' => '2024-07-10',
            ],
        ];

        $snapshot = $this->service->summarizeCashFlow($records, [], 500);

        $this->assertSame(5200.0, $snapshot->income);
        $this->assertSame(2150.0, $snapshot->expenses);
        $this->assertSame(3050.0, $snapshot->net);
        $this->assertSame(350.0, $snapshot->debtService);
        $this->assertSame(2200.0, $snapshot->availableToInvest);
    }

    public function testSummarizeCashFlowZeroIncomeReturnsZeroAvailability(): void
    {
        $records = [
            [
                'id'            => 4,
                'created_by'    => 1,
                'name'          => 'Utilities',
                'account_type'  => 'Expense',
                'source_type'   => 'Utilities',
                'net_amount'    => -220,
                'designated_date' => '2024-07-08',
            ],
        ];

        $snapshot = $this->service->summarizeCashFlow($records, [], 0);

        $this->assertSame(0.0, $snapshot->income);
        $this->assertSame(220.0, $snapshot->expenses);
        $this->assertSame(-220.0, $snapshot->net);
        $this->assertSame(0.0, $snapshot->availableToInvest);
    }

    public function testProjectDebtRepaymentFlagsNegativeAmortization(): void
    {
        $schedule = $this->service->projectDebtRepayment([
            [
                'account_id'       => 99,
                'current_balance'  => 1000,
                'interest_rate'    => 36,
                'minimum_payment'  => 10,
            ],
        ]);

        $this->assertCount(1, $schedule);
        $this->assertTrue($schedule[0]['negativeAmortization']);
        $this->assertNull($schedule[0]['monthsToPayoff']);
    }

    public function testProjectDebtRepaymentAvalancheExtraPayment(): void
    {
        $schedule = $this->service->projectDebtRepayment([
            [
                'account_id'       => 1,
                'current_balance'  => 3000,
                'interest_rate'    => 18,
                'minimum_payment'  => 90,
            ],
            [
                'account_id'       => 2,
                'current_balance'  => 1500,
                'interest_rate'    => 24,
                'minimum_payment'  => 45,
            ],
        ], 150);

        $this->assertCount(2, $schedule);
        $first = $schedule[0];
        $second = $schedule[1];

        $this->assertSame(2, $first['accountId']);
        $this->assertFalse($first['negativeAmortization']);
        $this->assertGreaterThan(0, $first['monthsToPayoff']);
        $this->assertGreaterThan(0.0, $first['totalInterest']);

        $this->assertSame(1, $second['accountId']);
        $this->assertFalse($second['negativeAmortization']);
        $this->assertGreaterThan($first['monthsToPayoff'], $second['monthsToPayoff']);
    }
}