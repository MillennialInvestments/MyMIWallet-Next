<?php

declare(strict_types=1);

namespace Tests\Unit\TbiChat;

use App\Libraries\TbiChat\TbiChatLink;
use PHPUnit\Framework\TestCase;

/**
 * The one-time sign-in link to the MyMI AI chat on TBI AIOps must match what
 * the chat checks (timothyburks TenantToken): HS256, iss/aud/tenant, a plain
 * numeric sub, a known tier, a lifetime of at most 300 s and a fresh jti.
 *
 * @internal
 */
final class TbiChatLinkTest extends TestCase
{
    private const KEY = 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk';
    private const NOW = 1_800_000_000;

    private static function decode(string $part): array
    {
        return json_decode((string) base64_decode(strtr($part, '-_', '+/'), true), true) ?? [];
    }

    public function testLinkCarriesAValidHs256TokenForTheChat(): void
    {
        $link = (new TbiChatLink(true, self::KEY))->linkFor(42, 'premium', self::NOW);
        $this->assertNotNull($link);
        $this->assertStringStartsWith('https://chat.mymiwallet.com/enter?token=', $link);

        $token = substr($link, strlen('https://chat.mymiwallet.com/enter?token='));
        $parts = explode('.', $token);
        $this->assertCount(3, $parts);
        $this->assertSame(['alg' => 'HS256', 'typ' => 'JWT'], self::decode($parts[0]));
        $expected = rtrim(strtr(base64_encode(hash_hmac('sha256', $parts[0] . '.' . $parts[1], self::KEY, true)), '+/', '-_'), '=');
        $this->assertTrue(hash_equals($expected, $parts[2]), 'signature');

        $c = self::decode($parts[1]);
        $this->assertSame('https://www.mymiwallet.com', $c['iss']);
        $this->assertSame('chat.mymiwallet.com', $c['aud']);
        $this->assertSame('mymi', $c['tenant']);
        $this->assertSame('42', $c['sub']);
        $this->assertSame('premium', $c['tier']);
        $this->assertSame(self::NOW, $c['iat']);
        $this->assertLessThanOrEqual(300, $c['exp'] - $c['iat']);
        $this->assertGreaterThan(0, $c['exp'] - $c['iat']);
        $this->assertMatchesRegularExpression('/^[a-f0-9]{32}$/', $c['jti']);
        $this->assertSame(['iss', 'aud', 'tenant', 'sub', 'tier', 'iat', 'exp', 'jti'], array_keys($c), 'no personal data in the token');
        $this->assertDoesNotMatchRegularExpression('/[+\/=]/', $token, 'base64url without padding');
    }

    public function testEveryLinkHasItsOwnJti(): void
    {
        $chat = new TbiChatLink(true, self::KEY);
        $a = self::decode(explode('.', (string) $chat->token(7, 'public', self::NOW))[1]);
        $b = self::decode(explode('.', (string) $chat->token(7, 'public', self::NOW))[1]);
        $this->assertNotSame($a['jti'], $b['jti']);
    }

    public function testOffUnlessEnabledWithALongKeyAndHttps(): void
    {
        $this->assertFalse((new TbiChatLink(false, self::KEY))->enabled());
        $this->assertFalse((new TbiChatLink(true, str_repeat('k', 31)))->enabled());
        $this->assertFalse((new TbiChatLink(true, self::KEY, 'http://chat.mymiwallet.com'))->enabled());
        $this->assertTrue((new TbiChatLink(true, str_repeat('k', 32)))->enabled());
        $this->assertNull((new TbiChatLink(false, self::KEY))->linkFor(1, 'public', self::NOW));
    }

    public function testRefusesBadUsersAndTiers(): void
    {
        $chat = new TbiChatLink(true, self::KEY);
        $this->assertNull($chat->linkFor(0, 'public', self::NOW));
        $this->assertNull($chat->linkFor(-3, 'public', self::NOW));
        $this->assertNull($chat->linkFor(5, 'council', self::NOW));
        $this->assertNull($chat->linkFor(5, 'Premium', self::NOW));
    }

    public function testTierFollowsTheMembership(): void
    {
        $this->assertSame('premium', TbiChatLink::tierFor(true));
        $this->assertSame('public', TbiChatLink::tierFor(false));
    }

    public function testFromEnvIsOffByDefault(): void
    {
        putenv('TBI_CHAT_ENABLED');
        putenv('TBI_CHAT_SIGNING_KEY');
        unset($_ENV['TBI_CHAT_ENABLED'], $_SERVER['TBI_CHAT_ENABLED'], $_ENV['TBI_CHAT_SIGNING_KEY'], $_SERVER['TBI_CHAT_SIGNING_KEY']);
        $this->assertFalse(TbiChatLink::fromEnv()->enabled());
    }

    public function testRouteNeedsALoginAndTheSidebarLinkIsHiddenWhileOff(): void
    {
        $root = dirname(__DIR__, 3);
        $routes = (string) file_get_contents($root . '/app/Config/Routes.php');
        $this->assertStringContainsString("\$routes->get('AI-Chat', '\\App\\Controllers\\AIChatController::open', ['filter' => ['login', 'noStore']]);", $routes);
        $sidebar = (string) file_get_contents($root . '/app/Views/themes/dashboard/layouts/sidebar.php');
        $this->assertStringContainsString("<?php if (\\App\\Libraries\\TbiChat\\TbiChatLink::fromEnv()->enabled()): ?>", $sidebar);
        $controller = (string) file_get_contents($root . '/app/Controllers/AIChatController.php');
        $this->assertStringContainsString('$this->cuID', $controller, 'member id from the session only');
        $this->assertStringNotContainsString('getPost(', $controller);
        $this->assertStringNotContainsString('getGet(', $controller);
        $this->assertDoesNotMatchRegularExpression('/log_message\([^;]*\$link/', $controller, 'the link is never logged');
    }
}
