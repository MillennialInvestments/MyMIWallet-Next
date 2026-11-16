<?php

declare(strict_types=1);

namespace Tests\Unit\Budget;

use App\DTO\Budget\BudgetRecord;
use App\DTO\Budget\CashFlowSnapshot;
use App\DTO\Budget\DebtAccount;
use App\Models\BudgetModel;
use App\Services\BudgetService;
use CodeIgniter\Test\CIUnitTestCase;
use DateTimeImmutable;
use ReflectionClass;

/**
 * GTM-037: Certification tests for Budget, Debt, Credit and Repayment flows.
 *
 * Verifies:
 * - Positive amortization math (calculateDebtPayoff, calculateDebtRepayment).
 * - Negative amortization guards & infinite-loop prevention (payment <= accrued interest).
 * - Boundary condition handling (0 debt, 0 payment, negative values).
 * - Credit account repayment schedule calculations.
 * - Budget variance calculations.
 * - Overspending detection and category alerts.
 * - Multi-account debt repayment projections (avalanche priority).
 * - Cash flow summarization (income, expenses, debt service, net, investable surplus).
 * - Payment recording IDOR authorization guards (non-owner rejection).
 * - Controller authorization enforcement for budget record lifecycle.
 */
final class BudgetCrudAndMathTest extends CIUnitTestCase
{
    private BudgetService $service;

    protected function setUp(): void
    {
        parent::setUp();
        helper(['budget']);
        $this->service = new BudgetService(101);
    }

    /**
     * Positive test: Debt payoff calculates correct months and interest for standard amortization.
     * Debt = $1,000, 12% APR (1% monthly), $100/month payment.
     * Starts at $1,000; month 1: interest = 10, bal = 910; month 2: interest = 9.10, bal = 819.10...
     * Pays off in 11 months.
     */
    public function testCalculateDebtPayoffStandardAmortization(): void
    {
        $result = $this->service->calculateDebtPayoff(1000.0, 0.12, 100.0);

        $this->assertIsArray($result);
        $this->assertSame(11, $result['monthsToPayOff']);
        $this->assertGreaterThan(50.0, $result['totalInterest']);
        $this->assertLessThan(70.0, $result['totalInterest']);
        $this->assertArrayNotHasKey('negativeAmortization', $result);
    }

    /**
     * Negative test: Debt payoff halts immediately when monthly payment is less than or equal to monthly interest.
     * Debt = $10,000, 12% APR (interest is $100/mo), Payment = $50/mo.
     * Must not enter an infinite loop; must return negativeAmortization = true and monthsToPayOff = null.
     */
    public function testCalculateDebtPayoffNegativeAmortizationHalt(): void
    {
        $result = $this->service->calculateDebtPayoff(10000.0, 0.12, 50.0);

        $this->assertIsArray($result);
        $this->assertNull($result['monthsToPayOff']);
        $this->assertTrue($result['negativeAmortization'] ?? false);
        $this->assertSame(0.0, $result['totalInterest']);
    }

    /**
     * Boundary test: Zero debt or zero payment returns 0 months without looping.
     */
    public function testCalculateDebtPayoffZeroOrNegativeInputs(): void
    {
        $zeroDebt = $this->service->calculateDebtPayoff(0.0, 0.12, 100.0);
        $this->assertSame(0, $zeroDebt['monthsToPayOff']);
        $this->assertSame(0.0, $zeroDebt['totalInterest']);

        $zeroPayment = $this->service->calculateDebtPayoff(1000.0, 0.12, 0.0);
        $this->assertSame(0, $zeroPayment['monthsToPayOff']);
        $this->assertSame(0.0, $zeroPayment['totalInterest']);
    }

    /**
     * Positive test: calculateDebtRepayment uses percentage APR (e.g. 18 for 18%).
     * Debt = $5,000, 18% APR, $250/mo payment.
     */
    public function testCalculateDebtRepaymentStandard(): void
    {
        $result = $this->service->calculateDebtRepayment(5000.0, 18.0, 250.0);

        $this->assertIsArray($result);
        $this->assertIsInt($result['monthsToPayOff']);
        $this->assertGreaterThan(0, $result['monthsToPayOff']);
        $this->assertLessThan(30, $result['monthsToPayOff']);
        $this->assertGreaterThan(500.0, $result['totalInterestPaid']);
    }

    /**
     * Negative test: calculateDebtRepayment guards against negative amortization.
     * Debt = $5,000, 24% APR (interest is $100/mo), Payment = $80/mo.
     */
    public function testCalculateDebtRepaymentNegativeAmortization(): void
    {
        $result = $this->service->calculateDebtRepayment(5000.0, 24.0, 80.0);

        $this->assertIsArray($result);
        $this->assertNull($result['monthsToPayOff']);
        $this->assertTrue($result['negativeAmortization'] ?? false);
    }

    /**
     * Test credit card repayment schedules generation.
     */
    public function testCalculateRepaymentSchedulesNormal(): void
    {
        $creditAccounts = [
            [
                'id'              => 10,
                'bank_name'       => 'Chase Freedom',
                'current_balance' => 500.0,
                'interest_rate'   => 15.0,
                'payment_due'     => 100.0,
                'due_date'        => '2026-12-01',
            ],
        ];

        $schedules = $this->service->calculateRepaymentSchedules($creditAccounts);

        $this->assertIsArray($schedules);
        $this->assertNotEmpty($schedules);
        $lastSchedule = end($schedules);
        $this->assertSame(0.0, (float) $lastSchedule['remaining_balance']);
        $this->assertSame('Chase Freedom', $lastSchedule['bank_name']);
    }

    /**
     * Test credit repayment schedule negative amortization flag and runaway loop guard.
     */
    public function testCalculateRepaymentSchedulesNegativeAmortization(): void
    {
        $creditAccounts = [
            [
                'id'              => 11,
                'bank_name'       => 'High Interest Loan',
                'current_balance' => 10000.0,
                'interest_rate'   => 25.0,
                'payment_due'     => 50.0, // interest alone is ~$208/mo
                'due_date'        => '2026-12-01',
            ],
        ];

        $schedules = $this->service->calculateRepaymentSchedules($creditAccounts);

        $this->assertCount(1, $schedules);
        $this->assertTrue($schedules[0]['negative_amortization'] ?? false);
        $this->assertSame(10000.0, (float) $schedules[0]['remaining_balance']);
    }

    /**
     * Test calculateVariance computes delta between budget and actual amounts.
     */
    public function testCalculateVariance(): void
    {
        $budget = [
            'Groceries'     => 600.0,
            'Utilities'     => 200.0,
            'Entertainment' => 150.0,
        ];
        $actual = [
            'Groceries'     => 520.0,
            'Utilities'     => 230.0,
            'Entertainment' => 150.0,
        ];

        $variance = $this->service->calculateVariance($budget, $actual);

        $this->assertSame(80.0, (float) $variance['Groceries']);     // $80 surplus
        $this->assertSame(-30.0, (float) $variance['Utilities']);    // $30 deficit
        $this->assertSame(0.0, (float) $variance['Entertainment']);  // on target
    }

    /**
     * Test overspending alert generation when spending exceeds budgeted limit.
     */
    public function testCheckForOverspending(): void
    {
        $mockModel = new class () extends BudgetModel {
            public function __construct()
            {
            }

            public function getSpendingDataByCategory($userId)
            {
                return [
                    'Dining Out' => 450.0,
                    'Gas'        => 120.0,
                    'Shopping'   => 300.0,
                ];
            }
        };

        $ref = new ReflectionClass(BudgetService::class);
        $prop = $ref->getProperty('budgetModel');
        $prop->setAccessible(true);
        $prop->setValue($this->service, $mockModel);

        $categoryBudgets = [
            'Dining Out' => 300.0, // Exceeded: 450 >= 300
            'Gas'        => 150.0, // Within budget: 120 < 150
            'Shopping'   => 300.0, // At limit: 300 >= 300
        ];

        $alerts = $this->service->checkForOverspending(101, $categoryBudgets);

        $this->assertCount(2, $alerts);
        $this->assertStringContainsString('Dining Out', $alerts[0]);
        $this->assertStringContainsString('Shopping', $alerts[1]);
    }

    /**
     * Test projectDebtRepayment prioritizes highest APR (Avalanche method).
     */
    public function testProjectDebtRepaymentAvalanche(): void
    {
        $debts = [
            [
                'accountId'             => 1,
                'principal'             => 2000.0,
                'annualPercentageRate'  => 0.10, // 10%
                'minimumPayment'        => 100.0,
            ],
            [
                'accountId'             => 2,
                'principal'             => 1000.0,
                'annualPercentageRate'  => 0.24, // 24% - should be paid off aggressively
                'minimumPayment'        => 80.0,
            ],
        ];

        $results = $this->service->projectDebtRepayment($debts, 50.0);

        $this->assertIsArray($results);
        $this->assertCount(2, $results);

        $resultsByAccount = [];
        foreach ($results as $item) {
            $resultsByAccount[$item['accountId']] = $item;
        }

        $this->assertFalse($resultsByAccount[1]['negativeAmortization']);
        $this->assertFalse($resultsByAccount[2]['negativeAmortization']);
        $this->assertLessThan($resultsByAccount[1]['monthsToPayoff'], $resultsByAccount[2]['monthsToPayoff']);
    }

    /**
     * Test summarizeCashFlow handles income, expenses, debts, and investable surplus.
     */
    public function testSummarizeCashFlow(): void
    {
        $now = new DateTimeImmutable('2026-11-16 12:00:00');
        $records = [
            new BudgetRecord(
                1,
                101,
                'Salary',
                'income',
                false,
                5000.0,
                5000.0,
                $now,
                'Income',
                'salary',
                false
            ),
            new BudgetRecord(
                2,
                101,
                'Rent',
                'expense',
                true,
                -1500.0,
                1500.0,
                $now,
                'Expense',
                'rent',
                false
            ),
            new BudgetRecord(
                3,
                101,
                'Groceries',
                'expense',
                true,
                -600.0,
                600.0,
                $now,
                'Expense',
                'groceries',
                false
            ),
        ];

        $debts = [
            new DebtAccount(
                5,
                12000.0,
                0.06,
                350.0
            ),
        ];

        $snapshot = $this->service->summarizeCashFlow($records, $debts, 500.0);

        $this->assertSame(5000.0, $snapshot->income);
        $this->assertSame(2100.0, $snapshot->expenses);
        $this->assertSame(2900.0, $snapshot->net);
        $this->assertSame(350.0, $snapshot->debtService);
        // Available to invest = income - expenses - debtService - reserve = 5000 - 2100 - 350 - 500 = 2050
        $this->assertSame(2050.0, $snapshot->availableToInvest);
    }

    /**
     * IDOR Test: recordPayment rejects non-owner mutations.
     */
    public function testRecordPaymentNonOwnerRejected(): void
    {
        $mockModel = new class () extends BudgetModel {
            public array $updated = [];

            public function __construct()
            {
            }

            public function getAccountById($table, $accountId)
            {
                return [
                    'id'              => $accountId,
                    'user_id'         => 999, // Owned by user 999
                    'current_balance' => 1000.0,
                ];
            }

            public function updateAccountBalance($table, $accountId, $newBalance)
            {
                $this->updated[] = [$table, $accountId, $newBalance];
                return true;
            }
        };

        $ref = new ReflectionClass(BudgetService::class);
        $prop = $ref->getProperty('budgetModel');
        $prop->setAccessible(true);
        $prop->setValue($this->service, $mockModel);

        // $this->service is configured with cuID = 101. Account belongs to 999.
        $result = $this->service->recordPayment(50, 200.0, false);

        $this->assertFalse($result, 'Non-owner payment update must be rejected');
        $this->assertEmpty($mockModel->updated, 'Database balance must not be updated for non-owner');
    }

    /**
     * Test recordPayment succeeds for owner and clamps balance at 0.0.
     */
    public function testRecordPaymentOwnerSuccessAndBalanceClamp(): void
    {
        $mockModel = new class () extends BudgetModel {
            public array $updated = [];

            public function __construct()
            {
            }

            public function getAccountById($table, $accountId)
            {
                return [
                    'id'              => $accountId,
                    'user_id'         => 101, // Owned by active user
                    'current_balance' => 150.0,
                ];
            }

            public function updateAccountBalance($table, $accountId, $newBalance)
            {
                $this->updated[] = [$table, $accountId, $newBalance];
                return true;
            }
        };

        $ref = new ReflectionClass(BudgetService::class);
        $prop = $ref->getProperty('budgetModel');
        $prop->setAccessible(true);
        $prop->setValue($this->service, $mockModel);

        // Paying 200 on a 150 balance should clamp newBalance to 0.0
        $result = $this->service->recordPayment(50, 200.0, false);

        $this->assertTrue($result);
        $this->assertCount(1, $mockModel->updated);
        $this->assertSame(0.0, (float) $mockModel->updated[0][2]);
    }

    /**
     * Test controller authorization safeguards: cancelAccount redirects when non-owner.
     */
    public function testControllerCancelAccountOwnershipGuard(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/BudgetController.php');

        $this->assertStringContainsString('getUserBudgetRecord($this->cuID, $accountID)', $src);
        $this->assertStringContainsString('if (empty($accountInfo))', $src);
        $this->assertStringContainsString('session()->setFlashdata(\'message\', \'Account not found.\');', $src);
    }
}
