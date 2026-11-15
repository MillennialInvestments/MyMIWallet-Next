<?php

namespace App\Commands\AIOps;

use App\Services\AIOps\ThoughtWorktreeMissionService;
use App\Support\CommandOptions;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ThoughtWorktreeStatus extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:thought-worktree:status';
    protected $description = 'Show the exact persisted mission state for a feature worktree.';
    protected $usage = 'aiops:thought-worktree:status [--worktree=<path>]';

    public function run(array $params)
    {
        $worktree = (string) (CommandOptions::get($params, 'worktree') ?: ROOTPATH);
        $service = new ThoughtWorktreeMissionService();
        $mission = $service->load($worktree);

        if ($mission === []) {
            CLI::write('STATUS: MISSING', 'yellow');
            CLI::write('WORKTREE: ' . $worktree);
            CLI::write('MUTATION_ALLOWED: false');
            return EXIT_ERROR;
        }

        CLI::write('STATUS: READY', 'green');
        CLI::write('MODE: persisted_mission');
        CLI::write('CONFIG_ID: ' . ($mission['config_id'] ?? ''));
        CLI::write('MISSION_STATE: ' . ($mission['lifecycle_state'] ?? ''));
        CLI::write('PHASE: ' . ($mission['phase'] ?? ''));
        CLI::write('TASK: ' . ($mission['task'] ?? ''));
        CLI::write('BRANCH: ' . ($mission['branch'] ?? ''));
        CLI::write('WORKTREE: ' . ($mission['worktree'] ?? ''));
        CLI::write('MUTATION_CLASS: ' . (string) ($mission['mutation_class'] ?? 0));
        CLI::write('MUTATION_ALLOWED: ' . ($service->mutationAllowed($mission) ? 'true' : 'false'));

        return EXIT_SUCCESS;
    }
}
