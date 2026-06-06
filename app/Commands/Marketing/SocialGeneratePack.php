<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialGeneratePack extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:generate-pack';
    protected $description = 'Generate a multi-platform social content pack from CLI topic input.';

    public function run(array $params)
    {
        $topic = $params[0] ?? 'MyMI Wallet financial wellness tools';
        $audience = $params[1] ?? 'beginner';
        $ctaType = $params[2] ?? 'join_discord';

        $service = new \App\Services\SocialContentGenerationService();
        $pack = $service->generateFromManualInput($topic, $audience, $ctaType);
        $saved = $service->saveGeneratedPack($pack, 'manual_cli', 0);

        CLI::write(json_encode(['status' => 'success', 'items' => count($pack['items'] ?? []), 'saved' => $saved], JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
