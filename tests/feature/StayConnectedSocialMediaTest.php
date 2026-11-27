<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Regression: themes/public/resources/stayConnected read $socialMedia without
 * a fallback, and /Economic-Calendar renders it without passing one
 * ("BOOT FAILURE: Undefined variable $socialMedia", 2026-11-27).
 *
 * @internal
 */
final class StayConnectedSocialMediaTest extends CIUnitTestCase
{
    public function testRendersWithoutSocialMediaPassedIn(): void
    {
        $html = view('themes/public/resources/stayConnected', []);

        $this->assertStringContainsString(config('SocialMedia')->facebook_page, $html);
        $this->assertStringContainsString(config('SocialMedia')->discord, $html);
    }
}
