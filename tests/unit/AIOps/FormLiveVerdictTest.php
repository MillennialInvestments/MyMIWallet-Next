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
}
