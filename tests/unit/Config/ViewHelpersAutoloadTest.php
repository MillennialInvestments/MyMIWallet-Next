<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Dashboard partials (today_news modal, marketing summaries) call text and
 * inflector helper functions without loading them. A missing helper fatals the
 * whole dashboard ("System temporarily unavailable"), so they are autoloaded.
 *
 * @internal
 */
final class ViewHelpersAutoloadTest extends CIUnitTestCase
{
    public function testTextAndInflectorHelpersAreAutoloaded(): void
    {
        $helpers = (new \Config\Autoload())->helpers;

        $this->assertContains('text', $helpers);
        $this->assertContains('inflector', $helpers);
    }

    public function testViewHelperFunctionsExistAfterBoot(): void
    {
        foreach ((new \Config\Autoload())->helpers as $helper) {
            helper($helper);
        }

        foreach (['character_limiter', 'word_limiter', 'humanize'] as $function) {
            $this->assertTrue(function_exists($function), $function . ' must be available to views');
        }
    }
}
