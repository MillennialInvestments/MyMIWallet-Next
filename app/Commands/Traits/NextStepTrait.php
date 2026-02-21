<?php

namespace App\Commands\Traits;

use CodeIgniter\CLI\CLI;

trait NextStepTrait
{
    protected function nextStep(string $cmd, string $why, array $artifacts = []): void
    {
        CLI::write(str_repeat('-', 40));
        CLI::write('NEXT STEP:');
        CLI::write('  php spark ' . $cmd);
        CLI::write('WHY:');
        CLI::write('  ' . $why);

        if (! empty($artifacts)) {
            CLI::write('ARTIFACTS:');
            foreach ($artifacts as $path) {
                CLI::write('  ' . $path);
            }
        }

        CLI::write(str_repeat('-', 40));
    }
}