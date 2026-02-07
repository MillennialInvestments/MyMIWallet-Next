<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ConfigLint extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:config:lint';
    protected $description = 'Lint Config files for illegal patterns (env(), dynamic expressions, protocols).';

    public function run(array $params)
    {
        $configPath = APPPATH . 'Config';
        $errors = [];

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($configPath)
        );

        foreach ($files as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            // ❌ env() in property declarations
            if (preg_match('/public\s+(array|string|int|bool)\s+\$\w+\s*=\s*\[.*?env\s*\(/s', $contents)) {
                $errors[] = [
                    'file' => $file->getPathname(),
                    'rule' => 'env() used in property initializer',
                ];
            }

            // ❌ protocol in DB hostname
            if (preg_match('/hostname.*https?:\/\//i', $contents)) {
                $errors[] = [
                    'file' => $file->getPathname(),
                    'rule' => 'Protocol detected in hostname',
                ];
            }

            // ❌ hardcoded credentials
            if (preg_match('/password\s*=>\s*[\'"][^\'"]+[\'"]/', $contents)) {
                $errors[] = [
                    'file' => $file->getPathname(),
                    'rule' => 'Hardcoded password detected',
                ];
            }
        }

        if (! empty($errors)) {
            CLI::error('Config lint failed. Invalid patterns detected:');
            foreach ($errors as $error) {
                CLI::write('- ' . $error['file'] . ' → ' . $error['rule']);
            }

            return EXIT_ERROR;
        }

        CLI::write('Config lint passed. All Config files are clean.', 'green');
        return EXIT_SUCCESS;
    }
}
