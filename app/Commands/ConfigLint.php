<?php

namespace App\Commands;

use App\Services\ConfigLintService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ConfigLint extends BaseCommand
{
    protected $group = 'config';
    protected $name = 'config:lint';
    protected $description = 'Lint Config/Services.php overrides against CI4 service signatures.';
    protected $usage = 'config:lint';

    public function run(array $params)
    {
        $service = new ConfigLintService();
        $lint = $service->lint();

        if (! $lint['ok']) {
            CLI::write('[FAIL] Config lint unavailable: ' . ($lint['error'] ?? 'Unknown error.'), 'red');
            return 1;
        }

        foreach ($lint['results'] as $serviceName => $result) {
            $label = strtoupper($result['status']);
            $color = $label === 'FAIL' ? 'red' : ($label === 'WARN' ? 'yellow' : 'green');
            $line = sprintf('[%s] Services::%s', $label, $serviceName);
            if ($result['message'] !== '') {
                $line .= ' — ' . $result['message'];
            }
            CLI::write($line, $color);
        }

        return $lint['has_failures'] ? 1 : 0;
    }
}
