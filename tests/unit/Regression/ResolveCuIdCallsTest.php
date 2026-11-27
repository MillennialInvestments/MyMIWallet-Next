<?php

declare(strict_types=1);

namespace Tests\Unit\Regression;

use App\Modules\User\Controllers\MyMICoinOfferingController;
use CodeIgniter\Config\Services;
use CodeIgniter\Test\CIUnitTestCase;
use Psr\Log\NullLogger;

/**
 * Regression: three controllers called $this->resolveCuID(), which UserController
 * does not define, so POST /Offerings/MyMI-Coin/Interest (and Swaps / Paper
 * Exchange actions) died with HTTP 500 on staging (2026-11-27 form test).
 */
final class ResolveCuIdCallsTest extends CIUnitTestCase
{
    private const FILES = [
        'Modules/User/Controllers/MyMICoinOfferingController.php',
        'Modules/User/Controllers/SwapsController.php',
        'Modules/Exchange/Controllers/PaperExchangeController.php',
    ];

    public function testNoControllerCallsUndefinedResolveCuIdWithoutArguments(): void
    {
        foreach (self::FILES as $file) {
            $src = (string) file_get_contents(APPPATH . $file);
            $this->assertStringNotContainsString('$this->resolveCuID()', $src, $file);
        }
    }

    public function testInterestWithoutSessionReturns401NotFatal(): void
    {
        $request = Services::request();
        $response = Services::response();
        $controller = new MyMICoinOfferingController();
        $controller->initController($request, $response, new NullLogger());

        $result = $controller->interest();

        $this->assertSame(401, $result->getStatusCode());
    }
}
