<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Validate extends SafeBaseCommand
{
    protected $group = 'AIOps - Patch';
    protected $name = 'aiops:patch:validate';
    protected $description = 'Validate PHP syntax after patch apply';

    public function run(array $params)
    {
        exec('git diff --name-only', $files);

        foreach ($files as $file) {
            if (str_ends_with($file, '.php')) {
                exec("php -l {$file}", $out, $code);
                if ($code !== 0) {
                    CLI::error("Syntax error in {$file}");
                    exit(1);
                }
            }
        }

        CLI::write('Syntax validation passed.');
    }
}
