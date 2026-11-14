<?php

namespace Tests\Unit\Security;

use App\Libraries\Security\PlaidWebhookVerifier;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-035: Plaid webhooks are accepted only with a valid ES256 Plaid-Verification JWT.
 */
final class PlaidWebhookVerifierTest extends CIUnitTestCase
{
    private $key;
    private array $jwk;

    protected function setUp(): void
    {
        parent::setUp();
        $this->key = openssl_pkey_new(['curve_name' => 'prime256v1', 'private_key_type' => OPENSSL_KEYTYPE_EC]);
        $d = openssl_pkey_get_details($this->key);
        $b64 = static fn (string $v): string => rtrim(strtr(base64_encode($v), '+/', '-_'), '=');
        // OpenSSL drops leading zero bytes; a JWK coordinate is always 32 bytes (RFC 7518 6.2.1.2).
        $pad = static fn (string $v): string => str_pad($v, 32, "\x00", STR_PAD_LEFT);
        $this->jwk = ['kty' => 'EC', 'crv' => 'P-256', 'kid' => 'k1', 'x' => $b64($pad($d['ec']['x'])), 'y' => $b64($pad($d['ec']['y'])), 'expired_at' => null];
    }

    public function testValidSignatureAccepted(): void
    {
        $body = '{"webhook_type":"TRANSACTIONS","webhook_code":"SYNC_UPDATES_AVAILABLE"}';
        $this->assertTrue($this->verifier()->verify($body, $this->jwt($body, time()), time()));
    }

    public function testTamperedBodyRejected(): void
    {
        $body = '{"webhook_type":"TRANSACTIONS"}';
        $this->assertFalse($this->verifier()->verify($body . ' ', $this->jwt($body, time()), time()));
    }

    public function testStaleTokenRejected(): void
    {
        $body = '{}';
        $this->assertFalse($this->verifier()->verify($body, $this->jwt($body, time() - 600), time()));
    }

    public function testWrongKeyRejected(): void
    {
        $body = '{}';
        $other = openssl_pkey_new(['curve_name' => 'prime256v1', 'private_key_type' => OPENSSL_KEYTYPE_EC]);
        $this->assertFalse($this->verifier()->verify($body, $this->jwt($body, time(), $other), time()));
    }

    public function testGarbageRejected(): void
    {
        $this->assertFalse($this->verifier()->verify('{}', 'not.a.jwt', time()));
        $this->assertFalse($this->verifier()->verify('{}', '', time()));
    }

    private function verifier(): PlaidWebhookVerifier
    {
        return new PlaidWebhookVerifier(fn (string $kid): ?array => $kid === 'k1' ? $this->jwk : null);
    }

    private function jwt(string $body, int $iat, $key = null): string
    {
        $b64 = static fn (string $v): string => rtrim(strtr(base64_encode($v), '+/', '-_'), '=');
        $h = $b64(json_encode(['alg' => 'ES256', 'kid' => 'k1', 'typ' => 'JWT']));
        $p = $b64(json_encode(['iat' => $iat, 'request_body_sha256' => hash('sha256', $body)]));
        openssl_sign("{$h}.{$p}", $der, $key ?? $this->key, OPENSSL_ALGO_SHA256);

        return "{$h}.{$p}." . $b64(self::derToRaw($der));
    }

    private static function derToRaw(string $der): string
    {
        $off = 2;
        $rLen = ord($der[$off + 1]);
        $r = substr($der, $off + 2, $rLen);
        $off += 2 + $rLen;
        $s = substr($der, $off + 2, ord($der[$off + 1]));

        return str_pad(ltrim($r, "\x00"), 32, "\x00", STR_PAD_LEFT) . str_pad(ltrim($s, "\x00"), 32, "\x00", STR_PAD_LEFT);
    }
}
