<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Modules\APIs\Controllers\BrokerAPIController;
use App\Modules\APIs\Controllers\SqueezeController;
use App\Modules\APIs\Controllers\SqueezeAPIController;
use App\Modules\APIs\Controllers\ChatController;
use App\Modules\Management\Controllers\OpsController;
use App\Modules\Management\Controllers\OpsAdminController;
use App\Modules\Management\Controllers\ChatUsageController;
use App\Modules\Management\Controllers\ChatUsageAdminController;
use App\Modules\APIs\Controllers\BudgetController;
use App\Modules\User\Controllers\OnboardingWalkthroughController;
use CodeIgniter\Test\CIUnitTestCase;
use ReflectionClass;

/**
 * @internal
 */
final class BrokerAndOnboardingIntegrityTest extends CIUnitTestCase
{
    public function testBrokerAPIControllerMethodContracts(): void
    {
        $rc = new ReflectionClass(BrokerAPIController::class);

        $expectedBrokerMethods = [
            'summary',
            'credit',
            'available',
            'repayment',
            'categories',
            'transactions',
            'goals',
            'insights',
            'savingsGoals',
            'investmentAccounts',
            'linkedAccounts',
            'addLinkedAccount',
            'removeLinkedAccount',
            'refreshLinkedAccount',
            'fetchPlaidLinkToken',
            'linkPlaidAccount',
            'unlinkPlaidAccount',
            'refreshPlaidAccount',
            'fetchPlaidAccounts',
            'fetchPlaidTransactions',
            'fetchPlaidBalances',
            'fetchPlaidIncome',
            'fetchPlaidLiabilities',
            'fetchPlaidIdentity',
            'fetchPlaidInvestments',
            'fetchPlaidHoldings',
            'fetchRobinhoodAccounts',
            'fetchRobinhoodAccountDetails',
            'fetchRobinhoodPositions',
            'fetchRobinhoodPortfolio',
            'fetchRobinhoodWatchlists',
            'fetchRobinhoodOrders',
            'fetchRobinhoodOrderDetails',
            'fetchRobinhoodInstruments',
            'fetchRobinhoodQuotes',
            'fetchRobinhoodDividends',
            'fetchRobinhoodTransfers',
            'fetchRobinhoodWatchlistItems',
            'fetchRobinhoodTransactionHistory',
            'fetchRobinhoodNotifications',
            'fetchRobinhoodACHRelationships',
            'fetchRobinhoodCryptoAccounts',
            'fetchRobinhoodCryptoPositions',
            'fetchRobinhoodCryptoPortfolio',
            'fetchRobinhoodCryptoOrders',
            'fetchRobinhoodCryptoOrderDetails',
            'fetchRobinhoodCryptoTransactions',
            'fetchRobinhoodCryptoQuotes',
        ];

        foreach ($expectedBrokerMethods as $method) {
            $this->assertTrue(
                $rc->hasMethod($method),
                "BrokerAPIController must implement method {$method}"
            );
        }

        $controller = new BrokerAPIController();
        $response = $controller->summary();
        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertSame('broker_summary', $body['feature']);
    }

    public function testRouteTargetAliasesExistAndInheritCorrectly(): void
    {
        $this->assertTrue(
            is_subclass_of(SqueezeController::class, SqueezeAPIController::class),
            'SqueezeController must extend SqueezeAPIController'
        );

        $this->assertTrue(
            is_subclass_of(OpsController::class, OpsAdminController::class),
            'OpsController must extend OpsAdminController'
        );

        $this->assertTrue(
            is_subclass_of(ChatUsageController::class, ChatUsageAdminController::class),
            'ChatUsageController must extend ChatUsageAdminController'
        );

        $chatRc = new ReflectionClass(ChatController::class);
        $this->assertTrue($chatRc->hasMethod('me'));
        $this->assertTrue($chatRc->hasMethod('health'));
    }

    public function testBudgetAPIControllerHasTrendsAndSummaryMethods(): void
    {
        $rc = new ReflectionClass(BudgetController::class);

        $expected = ['trends', 'netWorth', 'cashFlow', 'budgets'];
        foreach ($expected as $m) {
            $this->assertTrue($rc->hasMethod($m), "BudgetController must implement {$m}");
        }
    }

    public function testOnboardingWalkthroughControllerEnforcesTransactionBoundaries(): void
    {
        $file = (new ReflectionClass(OnboardingWalkthroughController::class))->getFileName();
        $this->assertIsString($file);
        $source = file_get_contents($file);
        $this->assertIsString($source);

        $this->assertStringContainsString('transBegin', $source);
        $this->assertStringContainsString('transCommit', $source);
        $this->assertStringContainsString('transRollback', $source);
        $this->assertStringContainsString('First and last name are required.', $source);
        $this->assertStringContainsString('Monthly income must be greater than zero.', $source);
    }
}
