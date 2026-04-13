<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordActivationAnnouncement extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:discord-activation';
    protected $description = 'Send one-time Discord activation announcement for marketing stream channels.';

    public function run(array $params)
    {
        $withEveryone = CLI::getOption('everyone') !== null;
        $result = service('marketingDistributionService')->sendActivationAnnouncement($withEveryone);

        CLI::write(json_encode([
            'status' => 'success',
            'command' => $this->name,
            'result' => $result,
        ], JSON_PRETTY_PRINT));

        return EXIT_SUCCESS;
    }
}
