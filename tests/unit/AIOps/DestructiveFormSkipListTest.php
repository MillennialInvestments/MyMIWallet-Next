<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Services\AIOps\FormSubmissionPolicy;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * STAGING-001: the form harness must never submit to a destructive target,
 * even on an approved staging run.
 *
 * @internal
 */
final class DestructiveFormSkipListTest extends CIUnitTestCase
{
    /** @return iterable<string, array{string}> */
    public static function destructiveTargets(): iterable
    {
        foreach ([
            '/Account/Delete', '/Wallets/Unlink/5', '/logout', '/Account/Security/Password',
            '/forgot-password', '/Privacy/Request', '/Exchange/Solana/Swap', '/API/Solana/transfer',
            '/Auctions/Bid', '/Projects/SubmitInvest', '/Wallets/MyMIGPayPalCallback',
            '/Memberships/PurchaseCallback', '/API/Predictions/PlaceOrder', '/API/Mdit/deposits/initiate',
            '/API/Email/sendMassTestCampaign', '/API/Marketing/Distro/run', '/API/Wallets/Plaid/Exchange',
            '/Management/runCronManually', 'https://staging.mymiwallet.com/index.php/API/Discord/broadcast',
        ] as $t) {
            yield $t => [$t];
        }
    }

    /** @dataProvider destructiveTargets */
    public function testDestructiveTargetsAreSkipped(string $action): void
    {
        $this->assertNotNull(FormSubmissionPolicy::destructiveReason($action), "{$action} must be on the skip list.");
    }

    public function testOrdinaryFormsAreNotSkipped(): void
    {
        foreach (['/Budget/Settings/Save/Income', '/Notes/save', '/Support/Manager', '/Investments/saveRetirementPlan', '/Referral-Program/Apply', '/Search'] as $action) {
            $this->assertNull(FormSubmissionPolicy::destructiveReason($action), "{$action} should stay testable.");
        }
    }
}
