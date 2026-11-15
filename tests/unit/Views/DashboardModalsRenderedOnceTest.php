<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * The dashboard footer rendered custom-js both through js-links and directly,
 * so every dashboard modal existed twice and opened twice (two backdrops).
 *
 * @internal
 */
final class DashboardModalsRenderedOnceTest extends CIUnitTestCase
{
    public function testCustomJsIsRenderedExactlyOncePerDashboardPage(): void
    {
        $footer  = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/layouts/footer.php');
        $jsLinks = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/layouts/js-links.php');
        $pattern = "#view\\(\\s*'themes/dashboard/layouts/custom-js#";

        $this->assertSame(1, preg_match_all("#view\\(\\s*'themes/dashboard/layouts/js-links'#", $footer));
        $this->assertSame(0, preg_match_all($pattern, $footer), 'footer must not render custom-js again');
        $this->assertSame(1, preg_match_all($pattern, $jsLinks));
    }

    public function testAutoOpeningModalsYieldToAModalThatIsAlreadyOpening(): void
    {
        foreach (['account_completion', 'today_news'] as $modal) {
            $source = (string) file_get_contents(APPPATH . 'Modules/User/Views/Dashboard/modals/' . $modal . '.php');
            $this->assertStringContainsString("document.body.classList.contains('modal-open')", $source, $modal);
        }
    }

    public function testModalsAreLiftedOutOfTheLayoutBeforeOpening(): void
    {
        $source = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/partials/custom-js/modals.php');

        $this->assertStringContainsString("addEventListener('show.bs.modal'", $source);
        $this->assertStringContainsString('document.body.appendChild(modal)', $source);
    }
}
