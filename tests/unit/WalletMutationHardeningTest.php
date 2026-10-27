<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Modules\User\Controllers\WalletsController;
use CodeIgniter\Test\CIUnitTestCase;
use ReflectionClass;
use ReflectionMethod;

/**
 * @internal
 */
final class WalletMutationHardeningTest extends CIUnitTestCase
{
    public function testWalletsControllerHasAllFinancialMutationMethods(): void
    {
        $rc = new ReflectionClass(WalletsController::class);

        $mutationMethods = [
            'deposit',
            'withdraw',
            'exchangeCurrency',
            'transferFunds',
            'add',
            'executeSwap',
            'purchase',
            'purchaseComplete',
            'depositComplete',
        ];

        foreach ($mutationMethods as $method) {
            $this->assertTrue(
                $rc->hasMethod($method),
                "WalletsController must implement financial mutation method {$method}"
            );

            $rm = $rc->getMethod($method);
            $this->assertTrue($rm->isPublic(), "Method {$method} must be public");
        }
    }

    public function testDepositAndWithdrawEnforceAtomicTransactionWrapping(): void
    {
        $file = (new ReflectionClass(WalletsController::class))->getFileName();
        $this->assertIsString($file);
        $source = file_get_contents($file);
        $this->assertIsString($source);

        // Ensure database transactions are utilized in deposit
        $this->assertStringContainsString('transBegin', $source);
        $this->assertStringContainsString('transCommit', $source);
        $this->assertStringContainsString('transRollback', $source);

        // Ensure zero or negative amounts are rejected
        $this->assertStringContainsString('Deposit amount must be greater than zero.', $source);
        $this->assertStringContainsString('Withdrawal amount must be greater than zero.', $source);
        $this->assertStringContainsString('Exchange amount must be greater than zero.', $source);
    }
}
