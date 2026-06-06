<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialGenerateSamplePack extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:generate-sample-pack';
    protected $description = 'Generate and save a sample multi-platform social content pack.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialContentGenerationService();
        $pack = $service->generateFromManualInput('Build better financial habits with MyMI Wallet free tools', 'beginner', 'free_tools');
        $saved = $service->saveGeneratedPack($pack, 'sample', 0);

        CLI::write(json_encode(['status' => 'success', 'items' => count($pack['items'] ?? []), 'saved' => $saved], JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
