<?php

namespace Tests\Unit\Libraries;

use App\Libraries\SensitiveField;
use CodeIgniter\Test\CIUnitTestCase;

final class SensitiveFieldTest extends CIUnitTestCase
{
    public function testSsnShowsOnlyLastFour(): void
    {
        $this->assertSame('***-**-6789', SensitiveField::maskSsn('123-45-6789'));
        $this->assertSame('***-**-6789', SensitiveField::maskSsn('123456789'));
    }

    public function testPlaceholderOrEmptySsnShowsNothing(): void
    {
        $this->assertSame('', SensitiveField::maskSsn('XXX-XX-XXXX'));
        $this->assertSame('', SensitiveField::maskSsn(''));
        $this->assertSame('', SensitiveField::maskSsn(null));
    }

    public function testPrivateKeyIsNeverReturned(): void
    {
        $this->assertSame('', SensitiveField::hidePrivateKey(str_repeat('K', 52)));
        $this->assertSame('', SensitiveField::hidePrivateKey(null));
    }
}
