<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Modules\User\Tax\Controllers\Tax;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * STAGING-002: 500s found by the first live form run on staging.
 *
 * @internal
 */
final class LiveFormFixesTest extends CIUnitTestCase
{
    public function testTaxDatesAreValidatedBeforeUse(): void
    {
        $this->assertSame('2026-11-01', Tax::validDate('2026-11-01'));
        foreach (['', 'junk', '2026-13-01', '2026-02-30', '11/01/2026', null, ['x']] as $bad) {
            $this->assertNull(Tax::validDate($bad), var_export($bad, true));
        }
    }

    public function testNewsletterOnlyParsesJsonBodies(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Controllers/NewsletterController.php');
        $this->assertMatchesRegularExpression("/stripos\\(\\\$this->request->getHeaderLine\\('Content-Type'\\), 'json'\\)/", $src);
    }
}
