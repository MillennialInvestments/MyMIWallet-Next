<?php

declare(strict_types=1);

namespace Tests\Unit\Options;

use App\Commands\Options\OptionsReconcileExpiries;
use CodeIgniter\Test\CIUnitTestCase;

final class OptionsReconcileExpiriesTest extends CIUnitTestCase
{
    public function testOptionsReconcileExpiriesInstantiationAndConfig(): void
    {
        $command = new OptionsReconcileExpiries(service('logger'), service('commands'));

        $this->assertSame('Options', $command->group);
        $this->assertSame('options:reconcile-expiries', $command->name);
        $this->assertStringContainsString('Audit and reconcile expired options positions', $command->description);
    }
}
