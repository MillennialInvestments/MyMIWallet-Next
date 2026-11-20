<?php

declare(strict_types=1);

namespace Tests\Unit\Onboarding;

use App\Libraries\Onboarding\FirstLoginTour;
use App\Services\OnboardingProgressService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * First-login how-to tour: welcome, dashboard, an overview and a quick start
 * for each free module that is open, then first moves. It opens by itself
 * once per member and "Take the tour" replays it.
 *
 * @internal
 */
final class FirstLoginTourTest extends CIUnitTestCase
{
    private const USER = 6101;
    private const ALL  = ['budget' => true, 'wallets' => true, 'crypto' => true];

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_user_onboarding');
        $db->query('CREATE TABLE bf_user_onboarding (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, steps_json TEXT, first_verified_login_at TEXT, walkthrough_started_at TEXT, walkthrough_completed_at TEXT, created_at TEXT, updated_at TEXT)');
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_user_onboarding');
        $db->resetDataCache();
        $this->setWalletsEnv(null);
        parent::tearDown();
    }

    public function testSlidesRunWelcomeDashboardEachModuleThenFinish(): void
    {
        $keys = array_column(FirstLoginTour::slides(self::ALL), 'key');

        $this->assertSame([
            'welcome', 'dashboard',
            'budget-overview', 'budget-quickstart',
            'wallets-overview', 'wallets-quickstart',
            'crypto-overview', 'crypto-quickstart',
            'finish',
        ], $keys);
    }

    public function testEveryModuleSlideHasStepsAndALink(): void
    {
        foreach (FirstLoginTour::slides(self::ALL) as $slide) {
            if (! in_array($slide['module'], ['budget', 'wallets', 'crypto'], true)) {
                continue;
            }
            $this->assertNotEmpty($slide['title'], $slide['key']);
            $this->assertCount(3, $slide['steps'], $slide['key']);
            $this->assertNotEmpty($slide['cta']['url'], $slide['key']);
        }

        $finish = FirstLoginTour::slides(self::ALL);
        $finish = end($finish);
        $this->assertSame(['Budget/Add/Income', 'Wallets/Add/Bank', 'Wallets/Add/Crypto'], array_column($finish['moves'], 'url'));
    }

    public function testSwitchedOffModulesAreLeftOut(): void
    {
        $slides = FirstLoginTour::slides(['budget' => true, 'wallets' => false, 'crypto' => false]);
        $modules = array_unique(array_column($slides, 'module'));

        $this->assertNotContains('wallets', $modules);
        $this->assertNotContains('crypto', $modules);
        $this->assertStringContainsString('free tools you can use today: Budget.', $slides[0]['body']);
        $finish = end($slides);
        $this->assertSame(['Budget/Add/Income'], array_column($finish['moves'], 'url'));
    }

    public function testWalletsAndCryptoFollowTheWalletsControllerGuard(): void
    {
        $this->setWalletsEnv(null);
        $this->assertTrue(FirstLoginTour::availableModules()['wallets'], 'unset means on, like WalletsController');

        $this->setWalletsEnv('false');
        $modules = FirstLoginTour::availableModules();
        $this->assertFalse($modules['wallets']);
        $this->assertFalse($modules['crypto']);

        $guard = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/WalletsController.php');
        $this->assertStringContainsString("env('FEATURE_WALLETS', true)", $guard, 'Tour gating must change with the wallet guard.');
    }

    public function testEveryLinkPointsAtARealPage(): void
    {
        $routes = service('routes');
        $routes->resetRoutes();
        require APPPATH . 'Config/Routes.php';
        $patterns = array_keys($routes->getRoutes('GET'));

        foreach (FirstLoginTour::slides(self::ALL) as $slide) {
            $urls = [];
            if (is_array($slide['cta'] ?? null)) {
                $urls[] = $slide['cta']['url'];
            }
            foreach ($slide['moves'] ?? [] as $move) {
                $urls[] = $move['url'];
            }
            foreach ($urls as $url) {
                $found = false;
                foreach ($patterns as $pattern) {
                    $regex = '#^' . str_replace('#', '\#', (string) $pattern) . '$#i';
                    if (@preg_match($regex, $url) === 1) {
                        $found = true;
                        break;
                    }
                }
                $this->assertTrue($found, "No GET route for {$url}");
            }
        }
    }

    public function testTourOpensOnceThenRemembersTheFirstAnswer(): void
    {
        $service = new OnboardingProgressService(db_connect());

        $this->assertTrue($service->getFirstLoginTourState(self::USER)['show']);

        $state = $service->markFirstLoginTour(self::USER, 'skipped');
        $this->assertFalse($state['show']);
        $this->assertSame('skipped', $state['action']);
        $this->assertNotNull($state['completedAt']);

        // A replay that is finished later keeps the first answer.
        $state = $service->markFirstLoginTour(self::USER, 'completed');
        $this->assertSame('skipped', $state['action']);
        $this->assertFalse($service->getFirstLoginTourState(self::USER)['show']);

        // Another member still gets it.
        $this->assertTrue($service->getFirstLoginTourState(self::USER + 1)['show']);
    }

    public function testUnknownActionCountsAsCompleted(): void
    {
        $service = new OnboardingProgressService(db_connect());
        $this->assertSame('completed', $service->markFirstLoginTour(self::USER, '<script>')['action']);
    }

    public function testMissingTableNeverOpensItByItself(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_user_onboarding');
        $db->resetDataCache();

        $service = new OnboardingProgressService($db);
        $this->assertFalse($service->getFirstLoginTourState(self::USER)['show']);
        $this->assertFalse($service->markFirstLoginTour(self::USER)['show']);
    }

    public function testViewRendersSlidesEscapesTheNameAndAutoOpensOnlyWhenDue(): void
    {
        $slides = FirstLoginTour::slides(self::ALL);
        $html = view('App\Modules\User\Views\Dashboard\index\first-login-tour', [
            'firstLoginTour'       => ['show' => true],
            'firstLoginTourSlides' => $slides,
            'tourDisplayName'      => 'Sam <b>',
            'nonce'                => ['script' => ''],
        ]);

        $this->assertSame(count($slides), substr_count($html, 'data-tour-slide="'));
        $this->assertStringContainsString('Welcome to MyMI Wallet, Sam &lt;b&gt;', $html);
        $this->assertStringContainsString('autoOpen: true', $html);
        $this->assertStringContainsString('Dashboard\\/onboarding\\/tour\\/complete', $html);
        $this->assertStringContainsString('href="' . site_url('Budget/Add/Income') . '"', $html);

        $html = view('App\Modules\User\Views\Dashboard\index\first-login-tour', [
            'firstLoginTour'       => ['show' => false],
            'firstLoginTourSlides' => $slides,
            'nonce'                => ['script' => ''],
        ]);
        $this->assertStringContainsString('autoOpen: false', $html);
    }

    public function testDashboardWiring(): void
    {
        $routes = (string) file_get_contents(APPPATH . 'Config/Routes.php');
        $this->assertStringContainsString("\$routes->post('onboarding/tour/complete', 'OnboardingWalkthroughController::completeFirstLoginTour'", $routes);

        $view = (string) file_get_contents(APPPATH . 'Modules/User/Views/Dashboard/index.php');
        $this->assertStringContainsString('data-first-login-tour-open', $view);
        $this->assertStringContainsString('Dashboard\\\\index\\\\first-login-tour', $view);

        // The setup walkthrough and daily news wait for the tour.
        $walkthrough = (string) file_get_contents(APPPATH . 'Modules/User/Views/Dashboard/modals/onboarding.php');
        $this->assertStringContainsString("'mymi:first-login-tour-closed'", $walkthrough);
        $news = (string) file_get_contents(APPPATH . 'Modules/User/Views/Dashboard/modals/today_news.php');
        $this->assertStringContainsString('!tourPending', $news);
    }

    private function setWalletsEnv(?string $value): void
    {
        if ($value === null) {
            unset($_SERVER['FEATURE_WALLETS'], $_ENV['FEATURE_WALLETS']);
            putenv('FEATURE_WALLETS');

            return;
        }
        $_SERVER['FEATURE_WALLETS'] = $_ENV['FEATURE_WALLETS'] = $value;
        putenv("FEATURE_WALLETS={$value}");
    }
}
