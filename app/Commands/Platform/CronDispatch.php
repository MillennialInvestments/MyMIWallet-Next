<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;

class CronDispatch extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:cron:dispatch';
    protected $description = 'Cron-friendly wrapper for control-plane dispatch dry-run workflow.';

    public function run(array $params)
    {
        command('platform:control:collect');
        command('platform:control:analyze');
        command('platform:control:dispatch --dry-run=1');
    }
}
