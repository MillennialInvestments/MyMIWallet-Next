<?php

namespace App\Commands\Marketing;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GeneratePackageCommand extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:generate-package';
    protected $description = 'Generate a marketing package from notification_id or headline.';

    public function run(array $params)
    {
        $service = service('marketingPackageService');

        $input = [];
        if (!empty($params[0]) && is_numeric($params[0])) {
            $input['notification_id'] = (int) $params[0];
        } else {
            $input['headline'] = (string) ($params[0] ?? 'MyMI Wallet market update');
        }

        $result = $service->generateFromInput($input);
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
    }
}
