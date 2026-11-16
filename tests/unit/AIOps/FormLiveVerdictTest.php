<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Services\AIOps\FormTestExecutor;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * STAGING-002: how one live form submit on staging is judged.
 *
 * @internal
 */
final class FormLiveVerdictTest extends CIUnitTestCase
{
    public function testRedirectIsPassUnlessToLogin(): void
    {
        $this->assertFalse(FormTestExecutor::classify(303, 'https://staging.mymiwallet.com/Budget', '', [])['fail']);
        $this->assertTrue(FormTestExecutor::classify(303, 'https://staging.mymiwallet.com/login', '', [])['fail']);
    }

    public function testValidationRejectionIsPass(): void
    {
        $this->assertFalse(FormTestExecutor::classify(422, '', '{"errors":{}}', [])['fail']);
        $this->assertFalse(FormTestExecutor::classify(400, '', 'bad input', [])['fail']);
    }

    public function testServerErrorsAndNewLogErrorsFail(): void
    {
        $this->assertTrue(FormTestExecutor::classify(500, '', '', [])['fail']);
        $this->assertTrue(FormTestExecutor::classify(404, '', '', [])['fail']);
        $this->assertTrue(FormTestExecutor::classify(0, '', 'Submit exception: x', [])['fail']);
        $verdict = FormTestExecutor::classify(200, '', 'ok', ['CRITICAL Undefined index']);
        $this->assertTrue($verdict['fail']);
        $this->assertStringContainsString('Undefined index', $verdict['note']);
        $this->assertTrue(FormTestExecutor::classify(200, '', '<b>Fatal error</b>', [])['fail']);
        $this->assertFalse(FormTestExecutor::classify(200, '', '<p>Saved</p>', [])['fail']);
    }

    public function testGuestAuthForms(): void
    {
        foreach (['/login', '/register', 'https://staging.mymiwallet.com/index.php/forgot', '/register/resend-activation', '/resend-activation'] as $a) {
            $this->assertTrue(FormTestExecutor::isGuestAuthForm($a), $a);
        }
        foreach (['/Wallets/Add', '/Support/Feedback', '/Dashboard/onboarding/profile'] as $a) {
            $this->assertFalse(FormTestExecutor::isGuestAuthForm($a), $a);
        }
    }

    public function testOnlyNewErrorLinesCount(): void
    {
        $dir = sys_get_temp_dir() . '/formverdict-' . bin2hex(random_bytes(3));
        mkdir($dir);
        file_put_contents($dir . '/log-2026-11-15.php', implode("\n", [
            'ERROR - 2026-11-15 22:00:00 --> old error',
            'INFO - 2026-11-15 23:00:01 --> fine',
            'CRITICAL - 2026-11-15 23:00:02 --> new failure',
        ]));

        $this->assertSame(['CRITICAL new failure'], FormTestExecutor::errorLinesSince('2026-11-15 23:00:00', $dir));
        array_map('unlink', glob($dir . '/*'));
        rmdir($dir);
    }

    public function testErrorLinesAfterOffsetIgnoreEarlierSubmits(): void
    {
        $file = sys_get_temp_dir() . '/formverdict-' . bin2hex(random_bytes(3)) . '.php';
        file_put_contents($file, "ERROR - 2026-11-15 23:00:00 --> earlier form\n");
        $offset = (int) filesize($file);
        file_put_contents($file, "INFO - 2026-11-15 23:00:00 --> fine\nCRITICAL - 2026-11-15 23:00:00 --> this form\n", FILE_APPEND);

        $this->assertSame(['CRITICAL this form'], FormTestExecutor::errorLinesAfter($file, $offset));
        $this->assertSame([], FormTestExecutor::errorLinesAfter($file, (int) filesize($file)));
        unlink($file);
    }

    public function testAdminOnlyRefusalAndFeatureOffArePass(): void
    {
        $denied = ['ERROR [ROLE_FILTER] ACCESS DENIED', 'ERROR [AUTH FAILURE]'];
        $this->assertFalse(FormTestExecutor::classify(303, 'https://staging.mymiwallet.com/Dashboard', '', $denied)['fail']);
        $this->assertTrue(FormTestExecutor::classify(303, '/Dashboard', '', ['ERROR [ROLE_FILTER] ACCESS DENIED', 'CRITICAL boom'])['fail']);
        $this->assertTrue(FormTestExecutor::classify(500, '', '', $denied)['fail']);

        $off = '{"status":"disabled","feature":"project_investing","message":"' . \App\Filters\FeatureFlagFilter::DISABLED_MESSAGE . '"}';
        $this->assertFalse(FormTestExecutor::classify(503, '', $off, [])['fail']);
        $this->assertTrue(FormTestExecutor::classify(503, '', '{"status":"error","message":"This is not available yet."}', [])['fail']);
    }

    public function testHandlerJsonNotFoundIsPassButBare404Fails(): void
    {
        $this->assertFalse(FormTestExecutor::classify(404, '', '{"status":"error","message":"That project was not found."}', [])['fail']);
        $this->assertTrue(FormTestExecutor::classify(404, '', '<h1>404 Page Not Found</h1>', [])['fail']);
    }

    public function testServerErrorNoteShowsBodyText(): void
    {
        $v = FormTestExecutor::classify(500, '', '<html><style>x{}</style><h1>Oops</h1> <p>Table missing</p></html>', []);
        $this->assertTrue($v['fail']);
        $this->assertSame('HTTP 500: Oops Table missing', $v['note']);
    }

    public function testEmergencyLogLinesAfterOffset(): void
    {
        $file = sys_get_temp_dir() . '/emergency-' . uniqid() . '.log';
        file_put_contents($file, json_encode(['message' => 'BOOT FAILURE: old']) . PHP_EOL);
        $offset = (int) filesize($file);
        file_put_contents($file, json_encode(['message' => 'BOOT FAILURE: Attempt to read property "chains" on null', 'context' => ['trace' => "#0 /srv/rel/app/Libraries/MyMIExchange.php(63): x\n#1 y"]]) . PHP_EOL, FILE_APPEND);

        $this->assertSame(
            ['EMERGENCY BOOT FAILURE: Attempt to read property "chains" on null at app/Libraries/MyMIExchange.php:63'],
            FormTestExecutor::emergencyLinesAfter($file, $offset)
        );
        unlink($file);
    }
}
