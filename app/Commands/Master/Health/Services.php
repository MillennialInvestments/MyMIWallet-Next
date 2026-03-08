<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Services extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:services';
    protected $description = 'Inspect service classes and app/Config/Services.php references.';

    public function run(array $params)
    {
        $serviceFiles = glob(APPPATH . 'Services/*.php') ?: [];
        $servicesConfig = APPPATH . 'Config/Services.php';
        $servicesContent = is_file($servicesConfig) ? file_get_contents($servicesConfig) : '';

        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'services'     => [],
            'issues'       => [],
        ];

        foreach ($serviceFiles as $file) {
            $name = basename($file, '.php');
            $registered = stripos($servicesContent, 'function ' . lcfirst($name)) !== false
                || stripos($servicesContent, 'function ' . $name) !== false;

            $report['services'][] = [
                'name'       => $name,
                'path'       => str_replace(ROOTPATH, '', $file),
                'registered' => $registered,
            ];

            if (!$registered) {
                $report['issues'][] = $name . ' may not be registered in Services.php';
            }
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_services.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Service health report written: docs/_health_services.json', 'green');
    }
}