<?php

declare(strict_types=1);

namespace App\Database\Seeds;

use App\Services\Marketing\MarketingVideoService;
use CodeIgniter\Database\Seeder;

class MarketingVideoStudioSeeder extends Seeder
{
    public function run(): void
    {
        (new MarketingVideoService())->ensureDefaultTemplates();
    }
}
