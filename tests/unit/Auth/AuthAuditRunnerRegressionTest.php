<?php

declare(strict_types=1);

namespace Tests\Unit\Auth;

use App\Services\Spark\AuthAuditRunner;
use CodeIgniter\Test\CIUnitTestCase;
use ReflectionMethod;

final class AuthAuditRunnerRegressionTest extends CIUnitTestCase
{
    public function testPasswordHashVerifierAcceptsValidHash(): void
    {
        $runner = new AuthAuditRunner();
        $method = new ReflectionMethod($runner, 'isPasswordHashVerifiable');
        $method->setAccessible(true);

        $password = 'Strong!Pass123';
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertTrue($method->invoke($runner, $password, $hash));
        $this->assertFalse($method->invoke($runner, $password, ''));
        $this->assertFalse($method->invoke($runner, '', $hash));
    }

    public function testResetPayloadNormalizationUsesExpectedKeys(): void
    {
        $runner = new AuthAuditRunner();
        $method = new ReflectionMethod($runner, 'buildResetPayload');
        $method->setAccessible(true);

        $payload = $method->invoke($runner, '  USER@Example.COM ', ' token-abc ', 'Reset!Pass123');

        $this->assertSame('user@example.com', $payload['email']);
        $this->assertSame('token-abc', $payload['token']);
        $this->assertSame('Reset!Pass123', $payload['password']);
        $this->assertSame('Reset!Pass123', $payload['pass_confirm']);
    }
}

