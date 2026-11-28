<?php

declare(strict_types=1);

namespace App\Libraries\TbiChat;

/**
 * Sign-in link to the MyMI AI chat that runs on TBI AIOps
 * (https://chat.mymiwallet.com, docs/aiops/tbi-tenant-chat.md).
 *
 * MyMI Wallet is the identity provider: for a signed-in member it signs a
 * short-lived, single-use HS256 JWT that the chat checks
 * (timothyburks app/Services/AIOps/Tenants/TenantToken.php):
 *
 *   iss https://www.mymiwallet.com   aud chat.mymiwallet.com   tenant mymi
 *   sub the member's numeric id      tier public|premium
 *   iat now   exp now + TTL (<= 300 s)   jti 128 random bits
 *
 * Optional: name, the member's first name, so the chat can greet them
 * (only a plain name; TBI_CHAT_SEND_NAME=off leaves it out). The token
 * carries no email or account data. reportToken() signs the server-to-server
 * token that reads MyMI's own usage report (scope usage.read, no member).
 * Off until
 * TBI_CHAT_ENABLED=on and TBI_CHAT_SIGNING_KEY (the same value as
 * TENANT_MYMI_SIGNING_KEY on the TBI side, at least 32 bytes) are set.
 */
final class TbiChatLink
{
    public const TENANT = 'mymi';
    public const AUDIENCE = 'chat.mymiwallet.com';
    public const DEFAULT_URL = 'https://chat.mymiwallet.com';
    public const DEFAULT_ISSUER = 'https://www.mymiwallet.com';
    public const TTL = 120;
    public const MIN_KEY_BYTES = 32;
    public const TIERS = ['public', 'premium'];

    public function __construct(
        private readonly bool $enabled,
        private readonly string $key,
        private readonly string $url = self::DEFAULT_URL,
        private readonly string $issuer = self::DEFAULT_ISSUER,
        private readonly bool $sendName = true,
    ) {
    }

    public static function fromEnv(): self
    {
        $read = static function (string $name, string $default = ''): string {
            $value = function_exists('env') ? env($name) : getenv($name);

            return is_string($value) && trim($value) !== '' ? trim($value) : $default;
        };

        return new self(
            strtolower($read('TBI_CHAT_ENABLED', 'off')) === 'on',
            $read('TBI_CHAT_SIGNING_KEY'),
            rtrim($read('TBI_CHAT_URL', self::DEFAULT_URL), '/'),
            $read('TBI_CHAT_ISSUER', self::DEFAULT_ISSUER),
            strtolower($read('TBI_CHAT_SEND_NAME', 'on')) !== 'off',
        );
    }

    /** On, with a key long enough to sign, and an https chat address. */
    public function enabled(): bool
    {
        return $this->enabled
            && strlen($this->key) >= self::MIN_KEY_BYTES
            && str_starts_with($this->url, 'https://');
    }

    /** The chat tier for a member: premium while a paid or trial membership is active. */
    public static function tierFor(bool $activeMembership): string
    {
        return $activeMembership ? 'premium' : 'public';
    }

    /**
     * One-time sign-in URL for $userId. Null when the link is off or the
     * input is not valid (never a half-signed link).
     */
    public function linkFor(int $userId, string $tier, int $now, ?string $firstName = null): ?string
    {
        $token = $this->token($userId, $tier, $now, $firstName);

        return $token === null ? null : rtrim($this->url, '/') . '/enter?token=' . $token;
    }

    /** The chat's base address (https), for the usage report. */
    public function url(): string
    {
        return rtrim($this->url, '/');
    }

    /**
     * A plain first name (letters in any language, marks, spaces, ' . -,
     * at most 30 characters and three words), or null. The chat applies the same rule.
     */
    public static function firstName(?string $name): ?string
    {
        if ($name === null) {
            return null;
        }
        $name = trim((string) preg_replace('/\s+/u', ' ', $name));
        if ($name === '' || mb_strlen($name) > 30 || substr_count($name, ' ') > 2 || ! preg_match("/^\p{L}[\p{L}\p{M}' .-]*$/u", $name)) {
            return null;
        }

        return $name;
    }

    /** Server-to-server token for GET <chat>/usage (scope usage.read); null while off. */
    public function reportToken(int $now): ?string
    {
        if (! $this->enabled()) {
            return null;
        }

        return $this->sign([
            'iss' => $this->issuer,
            'aud' => self::AUDIENCE,
            'tenant' => self::TENANT,
            'scope' => 'usage.read',
            'iat' => $now,
            'exp' => $now + self::TTL,
            'jti' => bin2hex(random_bytes(16)),
        ]);
    }

    public function token(int $userId, string $tier, int $now, ?string $firstName = null): ?string
    {
        if (! $this->enabled() || $userId <= 0 || ! in_array($tier, self::TIERS, true)) {
            return null;
        }
        $claims = [
            'iss' => $this->issuer,
            'aud' => self::AUDIENCE,
            'tenant' => self::TENANT,
            'sub' => (string) $userId,
            'tier' => $tier,
            'iat' => $now,
            'exp' => $now + self::TTL,
            'jti' => bin2hex(random_bytes(16)),
        ];
        $name = $this->sendName ? self::firstName($firstName) : null;
        if ($name !== null) {
            $claims['name'] = $name;
        }

        return $this->sign($claims);
    }

    private function sign(array $claims): string
    {
        $header = ['alg' => 'HS256', 'typ' => 'JWT'];
        $signing = self::b64(json_encode($header, JSON_UNESCAPED_SLASHES)) . '.' . self::b64(json_encode($claims, JSON_UNESCAPED_SLASHES));

        return $signing . '.' . self::b64(hash_hmac('sha256', $signing, $this->key, true));
    }

    private static function b64(string $raw): string
    {
        return rtrim(strtr(base64_encode($raw), '+/', '-_'), '=');
    }
}
