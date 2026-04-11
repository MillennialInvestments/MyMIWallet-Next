<?php

namespace App\Modules\PropFirms\Config;

use CodeIgniter\Config\BaseConfig;

class PropFirms extends BaseConfig
{
    public string $moduleName = 'PropFirms';
    public string $defaultCurrency = 'USD';
    public int $equitySyncIntervalSeconds = 60;
    public int $maxReplayEventsPerBatch = 500;
}
