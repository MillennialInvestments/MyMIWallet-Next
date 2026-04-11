<?php

use CodeIgniter\Test\CIUnitTestCase;

final class RouteAndViewGuardrailsTest extends CIUnitTestCase
{
    public function testRoutesFileIncludesCriticalAliases(): void
    {
        $routes = file_get_contents(APPPATH . 'Config/Routes.php') ?: '';

        $needles = [
            "'/How-It-Works/'",
            "'/Support/Article'",
            "'Management/Run-CRON-Tasks'",
            "'Alerts/fetchEmailAlerts'",
            "'/Wallets/Purchase/Memberships/Pro'",
        ];

        foreach ($needles as $needle) {
            $this->assertStringContainsString($needle, $routes, 'Missing route alias: ' . $needle);
        }
    }

    public function testSupportArticleTemplateAndFallbackViewExist(): void
    {
        $this->assertFileExists(APPPATH . 'Modules/Support/Views/article.php');
        $this->assertFileExists(APPPATH . 'Modules/Support/Views/articles/welcome.php');
    }

    public function testHowItWorksAliasMapContainsKnownSlugs(): void
    {
        $controller = file_get_contents(APPPATH . 'Modules/Blog/Controllers/HowItWorksController.php') ?: '';

        $knownSlugs = [
            'overview',
            'investor-profile',
            'earnings',
            'alerts',
            'account-settings',
            'marketing',
            'investments',
            'mymi-wallets',
            'automated-financial-insights',
        ];

        foreach ($knownSlugs as $slug) {
            $this->assertStringContainsString("'{$slug}'", $controller, 'Known slug is not mapped: ' . $slug);
        }
    }

    public function testPremiumHelperReturnsExplicitDeniedShape(): void
    {
        $helper = file_get_contents(APPPATH . 'Helpers/premium_helper.php') ?: '';

        $this->assertStringContainsString("'code' => 'PREMIUM_REQUIRED'", $helper);
        $this->assertStringContainsString("'status' => 'denied'", $helper);
    }
}
