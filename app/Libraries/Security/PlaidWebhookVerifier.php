<?php

declare(strict_types=1);

namespace App\Libraries\Security;

/**
 * Verifies Plaid's "Plaid-Verification" webhook header (GTM-035):
 * an ES256 JWT whose payload carries iat and request_body_sha256.
 * https://plaid.com/docs/api/webhooks/webhook-verification/
 */
class PlaidWebhookVerifier
{
    private const MAX_AGE_SECONDS = 300;
    private const P256_SPKI_PREFIX = '3059301306072a8648ce3d020106082a8648ce3d030107034200';

    /**
     * @param callable(string $kid): ?array $keyFetcher returns the JWK for a key id
     */
    public function __construct(private $keyFetcher)
    {
    }

    public function verify(string $rawBody, string $jwt, ?int $now = null): bool
    {
        $parts = explode('.', trim($jwt));
        if (count($parts) !== 3) {
            return false;
        }
        [$h64, $p64, $s64] = $parts;
        $header  = json_decode((string) self::b64urlDecode($h64), true);
        $payload = json_decode((string) self::b64urlDecode($p64), true);
        $sig     = self::b64urlDecode($s64);
        if (! is_array($header) || ! is_array($payload) || $sig === null || strlen($sig) !== 64) {
            return false;
        }
        if (($header['alg'] ?? '') !== 'ES256' || empty($header['kid'])) {
            return false;
        }

        $jwk = ($this->keyFetcher)((string) $header['kid']);
        if (! is_array($jwk) || ($jwk['crv'] ?? '') !== 'P-256' || ! empty($jwk['expired_at'])) {
            return false;
        }
        $pem = self::jwkToPem($jwk);
        if ($pem === null) {
            return false;
        }
        if (openssl_verify($h64 . '.' . $p64, self::rawToDer($sig), $pem, OPENSSL_ALGO_SHA256) !== 1) {
            return false;
        }

        $iat = (int) ($payload['iat'] ?? 0);
        if ($iat <= 0 || abs(($now ?? time()) - $iat) > self::MAX_AGE_SECONDS) {
            return false;
        }

        return hash_equals((string) ($payload['request_body_sha256'] ?? ''), hash('sha256', $rawBody));
    }

    public static function jwkToPem(array $jwk): ?string
    {
        $x = self::b64urlDecode((string) ($jwk['x'] ?? ''));
        $y = self::b64urlDecode((string) ($jwk['y'] ?? ''));
        if ($x === null || $y === null || strlen($x) !== 32 || strlen($y) !== 32) {
            return null;
        }
        $der = hex2bin(self::P256_SPKI_PREFIX) . "\x04" . $x . $y;

        return "-----BEGIN PUBLIC KEY-----\n" . chunk_split(base64_encode($der), 64, "\n") . "-----END PUBLIC KEY-----\n";
    }

    public static function rawToDer(string $sig): string
    {
        $enc = static function (string $int): string {
            $int = ltrim($int, "\x00");
            if ($int === '' || (ord($int[0]) & 0x80)) {
                $int = "\x00" . $int;
            }

            return "\x02" . chr(strlen($int)) . $int;
        };
        $body = $enc(substr($sig, 0, 32)) . $enc(substr($sig, 32, 32));

        return "\x30" . chr(strlen($body)) . $body;
    }

    public static function b64urlDecode(string $s): ?string
    {
        $out = base64_decode(strtr($s, '-_', '+/') . str_repeat('=', (4 - strlen($s) % 4) % 4), true);

        return $out === false ? null : $out;
    }
}
