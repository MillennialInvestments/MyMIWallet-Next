<?php

namespace {
    if (! function_exists('log_message')) {
        function log_message(string $level, string $message, array $context = []): void
        {
            // No-op during isolated unit tests.
        }
    }
}

namespace Tests\Libraries;

use App\Libraries\MyMIAlerts;
use CodeIgniter\Test\CIUnitTestCase;

class MyMIAlertsSymbolExtractionTest extends CIUnitTestCase
{
    public function testExtractSymbolsFiltersDuplicatesAndStopwords(): void
    {
        $alertsModel = new class {
            public array $checked = [];

            public function ensureTickerExists(string $symbol): bool
            {
                $this->checked[] = $symbol;
                return ! in_array($symbol, ['BAD'], true);
            }
        };

        $alertsLib = new class($alertsModel) extends MyMIAlerts {
            public function __construct($alertsModel)
            {
                $this->alertsModel = $alertsModel;
            }
        };

        $text = 'Active Buy Alert: $TSLA pushing past 250 while BAD rumor fades. Watch SELL and $TSLA again plus $MSFT!';

        $symbols = $alertsLib->extractSymbolsFromText($text);

        $this->assertSame(['TSLA', 'MSFT'], $symbols);
        $this->assertContains('TSLA', $alertsModel->checked);
        $this->assertContains('BAD', $alertsModel->checked);
    }
}
