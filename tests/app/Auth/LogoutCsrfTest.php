<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * GTM-019: a GET to /logout must not sign anyone out (another site could do
 * it with an image tag). It shows a confirm page that POSTs with CSRF.
 *
 * @internal
 */
final class LogoutCsrfTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testGetLogoutShowsConfirmAndKeepsTheSession(): void
    {
        \Config\Services::injectMock('authentication', new class () {
            public bool $loggedOut = false;

            public function check(): bool
            {
                return true;
            }

            public function logout(): void
            {
                $this->loggedOut = true;
            }
        });
        $result = $this->withSession(['user_id' => 42, 'logged_in' => true])->get('logout');

        $result->assertStatus(200);
        $result->assertSee('Sign out of MyMI Wallet?');
        $result->assertSee('method="post"');
        $result->assertSee('name="' . csrf_token() . '"');
        $this->assertSame(42, session('user_id'));
        $this->assertFalse(service('authentication')->loggedOut);
    }

    public function testGetLogoutWhenSignedOutGoesToLogin(): void
    {
        $result = $this->withSession([])->get('logout');

        $this->assertTrue($result->isRedirect());
        $this->assertStringContainsString('login', $result->getRedirectUrl() ?? '');
    }

    public function testLiveNavigationSignsOutWithAPostForm(): void
    {
        foreach ([
            'Views/themes/public/layouts/_sitenav.php',
            'Views/themes/dashboard/layouts/_sitenav.php',
            'Views/themes/dashboard/layouts/sidebar.php',
            'Views/Auth/two_factor_challenge.php',
        ] as $view) {
            $source = (string) file_get_contents(APPPATH . $view);
            $this->assertDoesNotMatchRegularExpression('#href=["\'][^"\']*logout#i', $source, $view . ' still links GET /logout');
            $this->assertStringContainsString('method="post"', $source, $view);
        }
    }
}
