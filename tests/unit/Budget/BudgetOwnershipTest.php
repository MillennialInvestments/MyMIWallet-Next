<?php

declare(strict_types=1);

namespace Tests\Unit\Budget;

use App\Services\BudgetService;
use CodeIgniter\Test\CIUnitTestCase;
use ReflectionClass;

/**
 * GTM-037: budget paid/unpaid/delete must be owner-scoped.
 */
final class BudgetOwnershipTest extends CIUnitTestCase
{
    /** @var object */
    private $model;

    private function service(array $record, bool $walletOwned = true): BudgetService
    {
        $this->model = new class ($record) {
            public array $calls = [];

            public function __construct(private array $record)
            {
            }

            public function getAccountInformation($id)
            {
                return $this->record;
            }

            public function updateAccount($id, $data)
            {
                $this->calls[] = ['updateAccount', $id];

                return true;
            }

            public function updateWalletBalance($walletId, $amount)
            {
                $this->calls[] = ['updateWalletBalance', $walletId, $amount];

                return true;
            }

            public function getDebtAccountByUserAndSource($u, $s)
            {
                return null;
            }
        };

        $class = new class () extends BudgetService {
            public bool $walletOwned = true;

            public function __construct()
            {
            }

            protected function walletOwnedBy($walletID, $userID): bool
            {
                return $this->walletOwned;
            }
        };
        $svc = (new ReflectionClass($class))->newInstanceWithoutConstructor();
        $svc->walletOwned = $walletOwned;
        $prop = (new ReflectionClass(BudgetService::class))->getProperty('budgetModel');
        $prop->setAccessible(true);
        $prop->setValue($svc, $this->model);

        return $svc;
    }

    private function debt(): array
    {
        return ['id' => 77, 'created_by' => 10, 'is_debt' => 1, 'net_amount' => 40, 'wallet_id' => 5, 'source_type' => 'card'];
    }

    public function testNonOwnerCannotMarkPaidOrUnpaid(): void
    {
        $svc = $this->service($this->debt());
        $this->assertFalse($svc->markAsPaid(77, 11));
        $this->assertFalse($svc->markAsUnpaid(77, 11));
        $this->assertSame([], $this->model->calls, 'a non-owner must not touch the record or any wallet');
    }

    public function testOwnerMarkPaidMovesOwnWallet(): void
    {
        $svc = $this->service($this->debt());
        $this->assertTrue($svc->markAsPaid(77, 10));
        $this->assertContains(['updateWalletBalance', 5, -40], $this->model->calls);
        $this->assertTrue($svc->markAsUnpaid(77, 10));
        $this->assertContains(['updateWalletBalance', 5, 40], $this->model->calls);
    }

    public function testForeignWalletOnDebtRecordChangesNothing(): void
    {
        $svc = $this->service($this->debt(), false);
        $this->assertFalse($svc->markAsPaid(77, 10));
        $this->assertFalse($svc->markAsUnpaid(77, 10));
        $this->assertSame([], $this->model->calls, 'record must not be marked when the linked wallet is not the owner\'s');
    }

    public function testControllerChecksOwnershipBeforeMutating(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/BudgetController.php');
        $this->assertStringContainsString('markAsPaid($accountID, (int) $this->cuID)', $src);
        $this->assertStringContainsString('markAsUnpaid($accountID, (int) $this->cuID)', $src);

        $start = strpos($src, 'public function deleteAccount(');
        $this->assertNotFalse($start);
        $body = substr($src, $start, 4000);
        $guard = strpos($body, 'getUserBudgetRecord($this->cuID, $accountID)');
        $cancel = strpos($body, 'cancelAccount');
        $this->assertNotFalse($guard, 'deleteAccount must check ownership');
        $this->assertNotFalse($cancel);
        $this->assertLessThan($cancel, $guard, 'ownership check must run before cancelAccount');
    }
}
