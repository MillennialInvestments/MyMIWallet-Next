<?php

namespace Tests\Unit\Legal;

use App\Controllers\Home;
use App\Models\SecurityModel;
use App\Services\AIOps\FormRouteMatcher;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @covers \App\Controllers\Home::terms
 * @covers \App\Controllers\Home::privacyPolicy
 * @covers \App\Controllers\Home::disclaimer
 * @covers \App\Models\SecurityModel::recordUserConsent
 * @covers \App\Models\SecurityModel::hasUserConsented
 * @covers \App\Models\SecurityModel::getUserConsents
 */
class LegalConsentComplianceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $db = db_connect();
        $db->query('CREATE TABLE IF NOT EXISTS bf_marketing_page_seo (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            page_name TEXT,
            page_title TEXT,
            page_description TEXT,
            page_url TEXT,
            page_internal_url TEXT,
            page_image TEXT,
            status TEXT,
            source TEXT,
            created_at TEXT,
            updated_at TEXT
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_user_consent (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            consent_type TEXT,
            version TEXT DEFAULT "1.0",
            ip_address TEXT NULL,
            user_agent TEXT NULL,
            consent_time TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Verify that all legal routes (Terms, Privacy, Disclaimers) are defined in Routes.php
     * and match their respective controller actions.
     */
    public function testLegalRoutesAreDefinedAndCaseAliasesExist(): void
    {
        $matcher = new FormRouteMatcher();

        // Terms of Service routes
        $this->assertTrue($matcher->match('/Terms-Of-Service', 'GET')['matched']);
        $this->assertTrue($matcher->match('/terms-of-service', 'GET')['matched']);
        $this->assertTrue($matcher->match('/terms', 'GET')['matched']);
        $this->assertTrue($matcher->match('/Legal/Terms-And-Conditions', 'GET')['matched']);
        $this->assertTrue($matcher->match('/legal/terms-and-conditions', 'GET')['matched']);
        $this->assertTrue($matcher->match('/terms-and-conditions', 'GET')['matched']);

        // Privacy Policy routes
        $this->assertTrue($matcher->match('/Privacy-Policy', 'GET')['matched']);
        $this->assertTrue($matcher->match('/privacy-policy', 'GET')['matched']);
        $this->assertTrue($matcher->match('/privacy', 'GET')['matched']);
        $this->assertTrue($matcher->match('/Legal/Privacy-Policy', 'GET')['matched']);
        $this->assertTrue($matcher->match('/legal/privacy-policy', 'GET')['matched']);

        // Disclaimer & Disclosure routes
        $this->assertTrue($matcher->match('/disclaimer', 'GET')['matched']);
        $this->assertTrue($matcher->match('/disclaimers', 'GET')['matched']);
        $this->assertTrue($matcher->match('/legal/disclaimer', 'GET')['matched']);
        $this->assertTrue($matcher->match('/disclosures', 'GET')['matched']);
    }

    /**
     * Verify that Home controller renders Terms of Service with required legal sections.
     */
    public function testHomeTermsRendersRequiredContent(): void
    {
        $controller = new Home();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/Terms-Of-Service'), null, new UserAgent());
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);
        $result = $controller->terms();

        $this->assertNotNull($result);
        $body = (string) $result;
        $this->assertStringContainsString('Terms of Service', $body);
        $this->assertStringContainsString('Limitation of Liability', $body);
        $this->assertStringContainsString('No Financial Advice', $body);
    }

    /**
     * Verify that Home controller renders Privacy Policy with required sections.
     */
    public function testHomePrivacyRendersRequiredContent(): void
    {
        $controller = new Home();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/Privacy-Policy'), null, new UserAgent());
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);
        $result = $controller->privacyPolicy();

        $this->assertNotNull($result);
        $body = (string) $result;
        $this->assertStringContainsString('Privacy Policy', $body);
        $this->assertStringContainsString('Information We Collect', $body);
    }

    /**
     * Verify that Home controller renders Disclaimer action with risk disclosures.
     */
    public function testHomeDisclaimerRendersRequiredContent(): void
    {
        $controller = new Home();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/disclaimer'), null, new UserAgent());
        $response = new Response(config('App'));
        $logger = Services::logger();

        $controller->initController($request, $response, $logger);
        $result = $controller->disclaimer();

        $this->assertNotNull($result);
        $body = (string) $result;
        $this->assertStringContainsString('Terms of Service', $body);
        $this->assertStringContainsString('No Financial Advice', $body);
    }

    /**
     * Verify SecurityModel records, checks, and retrieves user legal consent.
     */
    public function testSecurityModelRecordsAndChecksConsent(): void
    {
        $securityModel = new SecurityModel();
        $testUserId = 8801;

        // Clean slate for test ID
        $db = db_connect();
        $db->table('bf_user_consent')->where('user_id', $testUserId)->delete();

        // Initially has not consented
        $this->assertFalse($securityModel->hasUserConsented($testUserId, 'terms_of_service'));
        $this->assertFalse($securityModel->hasUserConsented($testUserId, 'privacy_policy'));
        $this->assertSame([], $securityModel->getUserConsents($testUserId));

        // Record terms consent
        $recordedTerms = $securityModel->recordUserConsent($testUserId, 'terms_of_service', '1.0', '192.168.1.100', 'PHPUnit Agent');
        $this->assertTrue($recordedTerms);

        // Record privacy consent
        $recordedPrivacy = $securityModel->recordUserConsent($testUserId, 'privacy_policy', '1.0', '192.168.1.100', 'PHPUnit Agent');
        $this->assertTrue($recordedPrivacy);

        // Verify hasUserConsented
        $this->assertTrue($securityModel->hasUserConsented($testUserId, 'terms_of_service'));
        $this->assertTrue($securityModel->hasUserConsented($testUserId, 'privacy_policy'));
        $this->assertFalse($securityModel->hasUserConsented($testUserId, 'unrelated_consent'));

        // Verify version check
        $this->assertTrue($securityModel->hasUserConsented($testUserId, 'terms_of_service', '1.0'));

        // Verify getUserConsents
        $consents = $securityModel->getUserConsents($testUserId);
        $this->assertCount(2, $consents);
        $this->assertSame('privacy_policy', $consents[0]['consent_type']);
        $this->assertSame('terms_of_service', $consents[1]['consent_type']);
        $this->assertSame('192.168.1.100', $consents[0]['ip_address']);

        // Clean up
        $db->table('bf_user_consent')->where('user_id', $testUserId)->delete();
    }

    /**
     * Verify that registration view contains accessible links to canonical legal pages.
     */
    public function testRegistrationViewLinksToLegalPages(): void
    {
        $registerFormPath = APPPATH . 'Views/Auth/register_form.php';
        $this->assertFileExists($registerFormPath);

        $content = file_get_contents($registerFormPath);
        $this->assertStringContainsString('Terms-Of-Service', $content);
        $this->assertStringContainsString('Privacy-Policy', $content);
        $this->assertStringContainsString('target="_blank"', $content);
    }

    /**
     * Verify that Solana Pay checkout view contains terms and risk disclosure links.
     */
    public function testSolanaPayViewContainsLegalNotice(): void
    {
        $solpayViewPath = APPPATH . 'Modules/User/Views/SolanaPay/index.php';
        $this->assertFileExists($solpayViewPath);

        $content = file_get_contents($solpayViewPath);
        $this->assertStringContainsString('Terms-Of-Service', $content);
        $this->assertStringContainsString('disclaimer', $content);
    }

    /**
     * Verify authoritative compliance decisions document exists and covers all required mandates.
     */
    public function testComplianceDecisionsDocumentContainsAllRequiredSections(): void
    {
        $docPath = ROOTPATH . 'docs/legal/COMPLIANCE_OWNERSHIP_AND_DECISIONS.md';
        $this->assertFileExists($docPath);

        $content = file_get_contents($docPath);
        $this->assertStringContainsString('Gate G8', $content);
        $this->assertStringContainsString('KYC', $content);
        $this->assertStringContainsString('AML', $content);
        $this->assertStringContainsString('OFAC', $content);
        $this->assertStringContainsString('Fee Schedules', $content);
        $this->assertStringContainsString('No Financial Advice', $content);
        $this->assertStringContainsString('bf_user_consent', $content);
    }
}
