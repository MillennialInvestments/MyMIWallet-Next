<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RuntimeException;

final class OperatorNext extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:operator-next';
    protected $description = 'Show one identity-bound TBI AIOps controller action for this MyMI worktree.';

    private const CONTROLLER_ROOT = '/apps/TBI/repos/timothyburks';
    private const PROJECT = 'mymiwallet-next';

    public function run(array $params): int
    {
        CLI::write('===== MYMI AIOPS OPERATOR NEXT =====', 'yellow');
        try {
            $context = self::currentContext();
            $recipeId = self::recipeIdOption('recipe-id');
            if ($recipeId === '') {
                CLI::write('STATUS: WAITING');
                CLI::write('REASON: exact_approved_recipe_id_required');
                CLI::write('MUTATION_ALLOWED: false');
                return EXIT_ERROR;
            }
            $command = self::approvedPreviewCommand($context, $recipeId);
            CLI::write('STATUS: READY', 'green');
            CLI::write('CONFIG_ID: ' . $context['config_id']);
            CLI::write('WORKTREE: ' . $context['worktree']);
            CLI::write('RECIPE_ID: ' . $recipeId);
            CLI::write('MUTATION_ALLOWED: false');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write($command);
            return EXIT_SUCCESS;
        } catch (RuntimeException $e) {
            CLI::write('STATUS: BLOCKED', 'red');
            CLI::write('REASON: ' . $e->getMessage());
            CLI::write('MUTATION_ALLOWED: false');
            return EXIT_ERROR;
        }
    }

    public static function recipeIdOption(string $name): string
    {
        $value = CLI::getOption($name);
        return is_string($value) ? trim($value) : '';
    }

    /** @return array{worktree:string,branch:string,config_id:string,mission_id:string,runtime_root:string} */
    public static function currentContext(): array
    {
        $root = realpath(ROOTPATH);
        if ($root === false || ! str_starts_with($root, '/apps/TBI/worktrees/')) {
            throw new RuntimeException('not_an_approved_feature_worktree');
        }
        if (! is_file(self::CONTROLLER_ROOT . '/spark')) {
            throw new RuntimeException('canonical_tbi_controller_unavailable');
        }
        $git = static function (string $argument) use ($root): string {
            $output = [];
            $code = 1;
            exec('git -C ' . escapeshellarg($root) . ' ' . $argument . ' 2>/dev/null', $output, $code);
            if ($code !== 0) {
                throw new RuntimeException('git_identity_unavailable');
            }
            return trim(implode("\n", $output));
        };
        if ($git('rev-parse --show-toplevel') !== $root) {
            throw new RuntimeException('git_worktree_identity_mismatch');
        }
        if (preg_match('~github[.]com[:/]MillennialInvestments/MyMIWallet-Next(?:[.]git)?$~i', $git('remote get-url origin')) !== 1) {
            throw new RuntimeException('repository_identity_mismatch');
        }
        $branch = $git('branch --show-current');
        $mission = self::readJson($root . '/writable/aiops/current-thought-worktree.json');
        $objective = self::readJson($root . '/writable/aiops/objectives/latest.json');
        $context = [
            'worktree' => $root,
            'branch' => $branch,
            'config_id' => (string) ($mission['config_id'] ?? ''),
            'mission_id' => (string) ($mission['mission_id'] ?? ''),
            'runtime_root' => $root . '/writable/aiops',
        ];
        self::assertContext($context, $mission, $objective);
        return $context;
    }

    /** @param array<string,mixed> $context @param array<string,mixed> $mission @param array<string,mixed> $objective */
    public static function assertContext(array $context, array $mission, array $objective): void
    {
        if (($mission['worktree'] ?? null) !== ($context['worktree'] ?? null)
            || ($mission['branch'] ?? null) !== ($context['branch'] ?? null)
            || ($mission['config_id'] ?? null) !== ($context['config_id'] ?? null)
            || ($mission['lifecycle_state'] ?? null) !== 'active_mutation_approved'
            || (int) ($mission['mutation_class'] ?? 0) !== 1
            || ($context['config_id'] ?? '') === ''
            || ($context['branch'] ?? '') === ''
            || ($context['mission_id'] ?? '') === '') {
            throw new RuntimeException('mission_identity_or_approval_gate_mismatch');
        }
        if (($objective['authoritative'] ?? false) !== true
            || ($objective['config_id'] ?? null) !== ($context['config_id'] ?? null)
            || ($objective['worktree'] ?? null) !== ($context['worktree'] ?? null)
            || ($objective['branch'] ?? null) !== ($context['branch'] ?? null)
            || ($objective['mission_id'] ?? null) !== ($context['mission_id'] ?? null)) {
            throw new RuntimeException('authoritative_objective_identity_mismatch');
        }
    }

    /** @param array<string,mixed> $context */
    public static function approvedPreviewCommand(array $context, string $recipeId): string
    {
        if (preg_match('/^[a-zA-Z0-9_.-]+$/D', $recipeId) !== 1) {
            throw new RuntimeException('recipe_id_invalid');
        }
        $recipe = self::readJson($context['runtime_root'] . '/recipes/approved/' . $recipeId . '.json');
        if (($recipe['status'] ?? null) !== 'approved'
            || ($recipe['recipe_id'] ?? null) !== $recipeId
            || ($recipe['expected_worktree'] ?? null) !== $context['worktree']
            || ($recipe['expected_branch'] ?? null) !== $context['branch']
            || ($recipe['config_id'] ?? null) !== $context['config_id']
            || ($recipe['mission_id'] ?? null) !== $context['mission_id']
            || ($recipe['project_key'] ?? null) !== self::PROJECT
            || ($recipe['cross_repository_execution_allowed'] ?? false) !== true
            || ($recipe['mutation_allowed'] ?? false) !== true) {
            throw new RuntimeException('approved_recipe_identity_or_authority_mismatch');
        }
        return self::formatPreviewCommand($context, $recipeId);
    }

    /** @param array<string,mixed> $context */
    public static function formatPreviewCommand(array $context, string $recipeId): string
    {
        return 'TBI_AIOPS_RUNTIME_ROOT=' . escapeshellarg($context['runtime_root'])
            . ' php ' . escapeshellarg(self::CONTROLLER_ROOT . '/spark')
            . ' aiops:execution-engine:recipe-run --recipe-id=' . escapeshellarg($recipeId);
    }

    /** @return array<string,mixed> */
    private static function readJson(string $path): array
    {
        if (! is_file($path) || is_link($path)) {
            throw new RuntimeException('required_evidence_missing');
        }
        $value = json_decode((string) file_get_contents($path), true);
        if (! is_array($value)) {
            throw new RuntimeException('required_evidence_invalid');
        }
        return $value;
    }
}
