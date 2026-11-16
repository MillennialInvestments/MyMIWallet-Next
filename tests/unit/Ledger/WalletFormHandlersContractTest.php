<?php

declare(strict_types=1);

namespace Tests\Unit\Ledger;

use PHPUnit\Framework\TestCase;

/**
 * MYMI-GT-FORM-LEDGER-001: source contract for the wallet form handlers.
 * Behaviour is covered by WalletBalanceServiceTest; this pins the wiring so a
 * refactor cannot silently bring back the old unscoped, non-atomic path.
 */
final class WalletFormHandlersContractTest extends TestCase
{
    private function source(): string
    {
        return (string) file_get_contents(ROOTPATH . 'app/Modules/User/Controllers/WalletsController.php');
    }

    private function method(string $name): string
    {
        $src = $this->source();
        $start = strpos($src, 'function ' . $name . '(');
        $this->assertNotFalse($start, $name . ' not found');
        $next = strpos($src, "\n    public function ", $start + 10);

        return substr($src, $start, $next === false ? null : $next - $start);
    }

    public function testDepositAndWithdrawGoThroughTheAtomicOwnerScopedService(): void
    {
        $this->assertStringContainsString('applyBalanceChange(WalletBalanceService::TYPE_DEPOSIT)', $this->method('deposit'));
        $this->assertStringContainsString('applyBalanceChange(WalletBalanceService::TYPE_WITHDRAWAL)', $this->method('withdraw'));

        $apply = $this->method('applyBalanceChange');
        $this->assertStringContainsString("!== 'post'", $apply, 'GET must not change balances');
        $this->assertStringContainsString('$this->currentWalletUserId()', $apply);
        $this->assertStringContainsString('new WalletBalanceService()', $apply);
        $this->assertStringNotContainsString("getPost('user_id')", $apply);
        $this->assertStringNotContainsString('transactionService->logTransaction', $apply);
    }

    public function testWalletCreationNeverTrustsAPostedUserId(): void
    {
        $this->assertDoesNotMatchRegularExpression("/'user_id'\\s*=>\\s*\\(int\\)\\s*\\(\\\$post\\['user_id'\\]/", $this->source());
    }

    public function testLiveAddWalletFormPostsToTheDefinedRoute(): void
    {
        $view = (string) file_get_contents(ROOTPATH . 'app/Modules/User/Views/Wallets/Add.php');
        $this->assertStringContainsString("action=\"<?= site_url('Wallets/Add') ?>\" method=\"POST\"", $view);
        $this->assertStringContainsString('csrf_field()', $view);
    }
}
