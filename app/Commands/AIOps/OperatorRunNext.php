<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RuntimeException;

final class OperatorRunNext extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:operator:run-next';
    protected $description = 'Execute only an identity-bound, read-only TBI AIOps recipe preview.';

    public function run(array $params): int
    {
        CLI::write('===== MYMI AIOPS OPERATOR RUN NEXT =====', 'yellow');
        CLI::write('MODE: read_only_preview');
        CLI::write('MUTATION_ALLOWED: false');
        if (CLI::getOption('approve') !== null || CLI::getOption('run') !== null
            || CLI::getOption('approve-mutation') !== null) {
            CLI::write('STATUS: BLOCKED', 'red');
            CLI::write('REASON: mutation_requires_separate_canonical_controller_approval');
            return EXIT_ERROR;
        }
        try {
            $context = OperatorNext::currentContext();
            $recipeId = OperatorNext::recipeIdOption('recipe-id');
            if ($recipeId === '') {
                throw new RuntimeException('exact_approved_recipe_id_required');
            }
            $command = OperatorNext::approvedPreviewCommand($context, $recipeId);
            CLI::write('CONFIG_ID: ' . $context['config_id']);
            CLI::write('WORKTREE: ' . $context['worktree']);
            CLI::write('RECIPE_ID: ' . $recipeId);
            CLI::write('RUN: ' . $command);
            $exitCode = 1;
            passthru('cd ' . escapeshellarg('/apps/TBI/repos/timothyburks') . ' && ' . $command, $exitCode);
            if ($exitCode !== 0) {
                throw new RuntimeException('canonical_controller_preview_failed:' . $exitCode);
            }
            CLI::write('STATUS: PASS', 'green');
            CLI::write('NEXT: Explicitly review the recipe and use canonical TBI AIOps governance for mutation.');
            return EXIT_SUCCESS;
        } catch (RuntimeException $e) {
            CLI::write('STATUS: BLOCKED', 'red');
            CLI::write('REASON: ' . $e->getMessage());
            return EXIT_ERROR;
        }
    }
}
