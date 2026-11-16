<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Modules\APIs\Controllers\AlertsAPIController;
use App\Modules\APIs\Controllers\EmailAPIController;
use App\Modules\APIs\Controllers\ManagementAPIController;
use App\Modules\APIs\Controllers\MarketingAPIController;
use App\Modules\Blog\Controllers\EarningsController;
use App\Modules\Blog\Controllers\SubscribeController;
use App\Modules\Management\Controllers\Marketing\EmailQueueAdminController;
use App\Modules\Management\Controllers\Marketing\EmailTemplateAdminController;
use App\Modules\Management\Controllers\MarketingAdminController;
use App\Modules\Management\Controllers\WalletsAdminController;
use App\Modules\Support\Controllers\SupportController;
use App\Modules\User\Controllers\DashboardController;
use App\Modules\User\Controllers\InvestmentsController;
use App\Modules\User\Controllers\ProjectsController;
use App\Modules\User\Controllers\WalletsController;
use App\Services\AIOps\FormRouteMatcher;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GT-FORM-ROUTES-002: Smoke tests confirming functionality and route resolution
 * for all 40 certified form routes across Waves F0–F8.
 */
final class FormCertificationSmokeTest extends CIUnitTestCase
{
    private FormRouteMatcher $matcher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->matcher = new FormRouteMatcher();
    }

    public function testInvestmentsStrategiesAndGoalsRoutesResolve(): void
    {
        $cases = [
            ['GET', 'investments/strategies', InvestmentsController::class, 'getStrategies'],
            ['POST', 'investments/strategies', InvestmentsController::class, 'createStrategy'],
            ['GET', 'investments/strategies/42', InvestmentsController::class, 'getStrategy'],
            ['PUT', 'investments/strategies/42', InvestmentsController::class, 'updateStrategy'],
            ['DELETE', 'investments/strategies/42', InvestmentsController::class, 'deleteStrategy'],
            ['GET', 'investments/goals', InvestmentsController::class, 'getGoals'],
            ['POST', 'investments/goals', InvestmentsController::class, 'createGoal'],
            ['GET', 'investments/goals/42', InvestmentsController::class, 'getGoal'],
            ['PUT', 'investments/goals/42', InvestmentsController::class, 'updateGoal'],
            ['DELETE', 'investments/goals/42', InvestmentsController::class, 'deleteGoal'],
        ];

        foreach ($cases as [$method, $uri, $class, $methodName]) {
            $result = $this->matcher->match($uri, $method);
            $this->assertTrue($result['matched'], "Failed resolving {$method} /{$uri}: " . ($result['note'] ?? ''));
            $this->assertSame('matched', $result['status']);
            $this->assertTrue(method_exists($class, $methodName), "Method {$methodName} missing on {$class}");
        }
    }

    public function testWatchlistAndModalRoutesResolve(): void
    {
        $cases = [
            ['POST', 'add-to-watchlist', InvestmentsController::class, 'addToWatchlist'],
            ['POST', 'remove-from-watchlist', InvestmentsController::class, 'removeFromWatchlist'],
            ['POST', 'add_new_wallet', WalletsController::class, 'addNewWallet'],
        ];

        foreach ($cases as [$method, $uri, $class, $methodName]) {
            $result = $this->matcher->match($uri, $method);
            $this->assertTrue($result['matched'], "Failed resolving {$method} /{$uri}");
            $this->assertTrue(method_exists($class, $methodName), "Method {$methodName} missing on {$class}");
        }

        // Timezone sync route (Closure)
        $tzResult = $this->matcher->match('YourController/setUserTimezone', 'POST');
        $this->assertTrue($tzResult['matched'], 'Failed resolving POST /YourController/setUserTimezone');
    }

    public function testOnboardingAndVerbMismatchRoutesResolve(): void
    {
        $onboarding = $this->matcher->match('dashboard/completeOnboardingStep/stage_a', 'POST');
        $this->assertTrue($onboarding['matched'], 'Failed resolving POST /dashboard/completeOnboardingStep/stage_a');
        $this->assertTrue(method_exists(DashboardController::class, 'completeOnboardingStep'));

        $subscribe = $this->matcher->match('Subscribe/Submit', 'POST');
        $this->assertTrue($subscribe['matched'], 'Failed resolving POST /Subscribe/Submit');
        $this->assertTrue(method_exists(SubscribeController::class, 'submit'));

        $dailyLog = $this->matcher->match('Management/Marketing/submitDailyLog', 'POST');
        $this->assertTrue($dailyLog['matched'], 'Failed resolving POST /Management/Marketing/submitDailyLog');
        $this->assertTrue(method_exists(MarketingAdminController::class, 'submitDailyLog'));

        $supportResp = $this->matcher->match('Support/Response', 'POST');
        $this->assertTrue($supportResp['matched'], 'Failed resolving POST /Support/Response');
        $this->assertTrue(method_exists(SupportController::class, 'submitRequest'));
    }

    public function testAdminAndMarketingRoutesResolve(): void
    {
        $cases = [
            ['POST', 'earnings/update', EarningsController::class, 'update'],
            ['POST', 'Management/Wallets/NotifyUser', WalletsAdminController::class, 'notifyUser'],
            ['POST', 'email-queue/store', EmailQueueAdminController::class, 'store'],
            ['POST', 'email-queue/processQueue', EmailQueueAdminController::class, 'processQueue'],
            ['POST', 'email-templates/store', EmailTemplateAdminController::class, 'store'],
            ['POST', 'newsletter/store', \App\Controllers\NewsletterController::class, 'store'],
            ['POST', 'marketing/sendNotification', MarketingAdminController::class, 'sendNotification'],
            ['POST', 'marketing/postToFacebook', MarketingAdminController::class, 'postToFacebook'],
            ['POST', 'marketing/postToGroup', MarketingAdminController::class, 'postToGroup'],
            ['GET', 'API/Email/fetchTagAnalytics', EmailAPIController::class, 'fetchTagAnalytics'],
            ['GET', 'API/Management/getGeneratedPostsPaginated', MarketingAPIController::class, 'getGeneratedPostsPaginated'],
            ['GET', 'API/Management/sharePost/1/twitter', ManagementAPIController::class, 'sharePost'],
            ['GET', 'API/Management/fetchBufferPaginated', MarketingAPIController::class, 'fetchBufferPaginated'],
            ['POST', 'API/Alerts/sendDiscordAlertsBySymbol', AlertsAPIController::class, 'sendDiscordAlertsBySymbol'],
        ];

        foreach ($cases as [$method, $uri, $class, $methodName]) {
            $result = $this->matcher->match($uri, $method);
            $this->assertTrue($result['matched'], "Failed resolving {$method} /{$uri}: " . ($result['note'] ?? ''));
            $this->assertTrue(method_exists($class, $methodName), "Method {$methodName} missing on {$class}");
        }
    }

    public function testProjectsMutationRoutesResolve(): void
    {
        $cases = [
            ['POST', 'Projects/Commit', ProjectsController::class, 'submitCommit'],
            ['POST', 'Projects/Create', ProjectsController::class, 'submitProposal'],
            ['POST', 'Projects/reportRevenue', ProjectsController::class, 'reportRevenue'],
        ];

        foreach ($cases as [$method, $uri, $class, $methodName]) {
            $result = $this->matcher->match($uri, $method);
            $this->assertTrue($result['matched'], "Failed resolving {$method} /{$uri}");
            $this->assertTrue(method_exists($class, $methodName), "Method {$methodName} missing on {$class}");
        }
    }

    public function testAddNewWalletScopingAndValidation(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/WalletsController.php');
        $pos = strpos($src, 'function addNewWallet');
        $this->assertNotFalse($pos, 'addNewWallet method must exist in WalletsController');
        $methodBody = substr($src, $pos, 1500);

        $this->assertStringContainsString("session('user_id')", $methodBody, 'Must obtain user_id from session');
        $this->assertStringContainsString('addInvestmentWallet', $methodBody, 'Must use addInvestmentWallet');
        $this->assertStringContainsString('invalidateWalletCache', $methodBody, 'Must invalidate cache on add');
        $this->assertStringNotContainsString("getPost('user_id')", $methodBody, 'Must never trust user_id from POST');
    }

    public function testInvestmentsControllerScoping(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/InvestmentsController.php');
        $this->assertStringContainsString('function addToWatchlist()', $src);
        $this->assertStringContainsString('function removeFromWatchlist()', $src);
        $this->assertStringContainsString('$this->cuID', $src);
    }
}
