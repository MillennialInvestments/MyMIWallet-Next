<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * There is no Config\Exchanges class. MyMIExchange's constructor read
 * config('Exchanges')->chains and threw, which broke every Projects request.
 *
 * @internal
 */
final class MyMIExchangeConfigTest extends CIUnitTestCase
{
    public function testConstructorToleratesMissingExchangesConfig(): void
    {
        $this->assertNull(config('Exchanges'));
        $src = (string) file_get_contents(APPPATH . 'Libraries/MyMIExchange.php');
        $this->assertStringNotContainsString("config('Exchanges')->chains", $src);
        $this->assertStringContainsString("config('Exchanges')?->chains ?? []", $src);
    }
}
