<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * 2026-11-15: the sidebar's hide arrow did nothing on the first click and
 * left no way back once the sidebar was hidden. It now drives
 * assets/js/sidebar-toggle.js, and the layout has a button to reopen it.
 *
 * @internal
 */
final class DashboardSidebarToggleTest extends CIUnitTestCase
{
    public function testArrowUsesTheSidebarToggleInsteadOfBootstrapCollapse(): void
    {
        $sidebar = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/layouts/sidebar.php');

        $this->assertStringContainsString('id="mymiSidebarToggle" data-mymi-sidebar-toggle', $sidebar);
        $this->assertStringNotContainsString('href="#collapseSidebar"', $sidebar);
    }

    public function testLayoutHasReopenButtonWithoutBreakingSidebarAdjacency(): void
    {
        $layout = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/layouts/index.php');

        $open = strpos($layout, 'id="mymiSidebarOpen"');
        $sidebar = strpos($layout, "view('themes/dashboard/layouts/sidebar'");
        $wrap = strpos($layout, 'class="nk-wrap');

        $this->assertNotFalse($open);
        // dashlite offsets content with ".nk-sidebar + .nk-wrap", so nothing
        // may sit between the sidebar and the wrap.
        $this->assertLessThan($sidebar, $open);
        $this->assertDoesNotMatchRegularExpression('/sidebar\', \$subViewData\); \?>\s*<(?!div class="nk-wrap)/', $layout);
        $this->assertGreaterThan($sidebar, $wrap);
    }

    public function testScriptAndStylesShip(): void
    {
        $js = (string) file_get_contents(FCPATH . 'assets/js/sidebar-toggle.js');
        $css = (string) file_get_contents(FCPATH . 'assets/css/inline-fixes.css');
        $links = (string) file_get_contents(APPPATH . 'Views/themes/dashboard/layouts/js-links.php');

        $this->assertStringContainsString("mymi-sidebar-collapsed", $js);
        $this->assertStringContainsString('body.mymi-sidebar-collapsed .nk-sidebar + .nk-wrap', $css);
        $this->assertStringContainsString('assets/js/sidebar-toggle.js', $links);
    }
}
