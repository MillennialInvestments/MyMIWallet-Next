<?php

namespace App\Commands\AIOps;

use App\Services\AIOps\Operator\OperatorPhaseStateService;
use App\Services\AIOps\Capability\CapabilityRegistryService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class OperatorRunNext extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:operator:run-next';
    protected $description = 'Autonomously run safe AIOps operator phases and stop at approval gates.';

    public function run(array $params)
    {
        $phase = (new OperatorPhaseStateService())->currentPhase();
        $objectivePrompt = $this->readOption('prompt');

        if ($objectivePrompt === '') {
            $objectivePrompt = 'Build the smallest safe implementation step from the active roadmap.';
        }

        CLI::write('===== AIOPS OPERATOR RUN NEXT =====', 'yellow');
        CLI::write('PHASE: ' . $phase);
        CLI::write('MUTATION_ALLOWED: false');

        if ($phase === 'discovery' || $phase === 'planning') {
            $this->runCommand('php spark aiops:ollama:route-task --purpose=coding --prompt=' . escapeshellarg($objectivePrompt));

            $matchedCapability = $this->matchCapability($objectivePrompt);
            $capabilityGuidance = $this->capabilityGuidance($matchedCapability);

            $recipePrompt = implode(' ', [
                'Draft the smallest deterministic recipe for the active objective.',
                'Objective:',
                $objectivePrompt,
                $capabilityGuidance,
                'Do not use aiops:execution-engine:fixture-touch unless the objective explicitly asks for an AIOps fixture smoke test.',
                'Do not satisfy product, marketing, integration, readiness, audit, controller, service, route, or documentation objectives with only a fixture-touch change.',
                'Preserve safety gates, no destructive commands, no credential exposure, and no external mutation.',
            ]);

            $this->runCommand('php spark aiops:execution-engine:recipe --purpose=coding --prompt=' . escapeshellarg($recipePrompt));

            CLI::write('STATUS: WAITING');
            CLI::write('REASON: recipe_approval_required');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('php spark aiops:execution-engine:recipe --approve --recipe-id=<latest-recipe-id>');
            CLI::write('ai do "continue after recipe approval"');

            return EXIT_SUCCESS;
        }

        if ($phase === 'recipe_draft') {
            $latestDraft = $this->latestRecipeId('drafts');

            CLI::write('STATUS: WAITING');
            CLI::write('REASON: recipe_approval_required');
            CLI::write('LATEST_DRAFT: ' . ($latestDraft ?: 'none'));
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('php spark aiops:execution-engine:recipe --approve --recipe-id=' . ($latestDraft ?: '<recipe-id>'));
            CLI::write('ai do "continue after recipe approval"');

            return EXIT_SUCCESS;
        }

        if ($phase === 'approved') {
            $recipeId = $this->latestRecipeId('approved');

            if ($recipeId === '') {
                CLI::write('STATUS: WAITING');
                CLI::write('REASON: approved_recipe_not_found');

                return EXIT_SUCCESS;
            }

            $this->runCommand('php spark aiops:execution-engine:recipe-run --recipe-id=' . escapeshellarg($recipeId));
            CLI::write('STATUS: WAITING');
            CLI::write('REASON: mutation_approval_required');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('php spark aiops:execution-engine:recipe-run --run --approve-mutation --recipe-id=' . $recipeId);
            CLI::write('ai do "continue after mutation approval"');

            return EXIT_SUCCESS;
        }

        if ($phase === 'dry_run') {
            CLI::write('STATUS: WAITING');
            CLI::write('REASON: mutation_approval_required');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('php spark aiops:execution-engine:recipe-run --run --approve-mutation --recipe-id=<recipe-id>');

            return EXIT_SUCCESS;
        }

        if ($phase === 'validation') {
            if ($this->shouldStopForNoProductDiff($objectivePrompt)) {
                $this->printNoProductDiffStop();

                return EXIT_ERROR;
            }

            $this->runCommand('php spark aiops:execution-engine:validate --run');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('ai finish');

            return EXIT_SUCCESS;
        }

        if ($phase === 'finish') {
            CLI::write('STATUS: WAITING');
            CLI::write('REASON: finish_required');
            CLI::write('NEXT COMMANDS:', 'green');
            CLI::write('ai finish');

            return EXIT_SUCCESS;
        }

        CLI::write('STATUS: WAITING');
        CLI::write('REASON: unknown_phase');
        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('php spark aiops:operator:state-next');
        CLI::write('git status --short');

        return EXIT_SUCCESS;
    }

    private function shouldStopForNoProductDiff(string $objectivePrompt): bool
    {
        // AIOPS_OPERATOR_NO_PRODUCT_DIFF_GUARD
        if (! $this->isImplementationScoped($objectivePrompt)) {
            return false;
        }

        return ! $this->hasSourceControlledDiff();
    }

    private function isImplementationScoped(string $objectivePrompt): bool
    {
        $branch = trim((string) shell_exec('git -C ' . escapeshellarg(ROOTPATH) . ' branch --show-current 2>/dev/null'));
        $text = strtolower($branch . ' ' . $objectivePrompt . ' ' . $this->latestThoughtText());

        return preg_match('/implementation|implement|build|fix|add|create|update|repair|hardening|product|feature|service|command|controller|route|audit|docs|documentation/', $text) === 1;
    }

    private function latestThoughtText(): string
    {
        $root = WRITEPATH . 'aiops/thought-worktrees';

        if (! is_dir($root)) {
            return '';
        }

        $files = array_merge(
            glob($root . '/configs/*.json') ?: [],
            glob($root . '/roadmaps/*.md') ?: []
        );

        rsort($files);
        $text = '';

        foreach (array_slice($files, 0, 5) as $file) {
            $text .= ' ' . mb_substr((string) file_get_contents($file), 0, 8000);
        }

        return $text;
    }

    private function hasSourceControlledDiff(): bool
    {
        $paths = [
            'app',
            'aiops',
            'scripts',
            'docs',
            'public',
            'tests',
            'composer.json',
            'composer.lock',
            'spark',
        ];

        $command = 'git -C ' . escapeshellarg(ROOTPATH) . ' status --short -- ' . implode(' ', array_map('escapeshellarg', $paths)) . ' 2>/dev/null';
        $status = trim((string) shell_exec($command));

        return $status !== '';
    }

    private function printNoProductDiffStop(): void
    {
        CLI::write('STATUS: STOPPED', 'red');
        CLI::write('REASON: no_source_controlled_implementation_outcome');
        CLI::write('WHY: A recipe run completed, but this implementation-scoped worktree has no tracked or untracked source-controlled product diff.');
        CLI::newLine();
        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('git status --short');
        CLI::write('git diff --stat origin/main...HEAD');
        CLI::write('ai review');
        CLI::newLine();
        CLI::write('REQUIRED DECISION:', 'yellow');
        CLI::write('Create or repair the missing source-controlled files in this worktree, then validate, commit, and PR.');
        CLI::write('If this lane is intentionally report-only/no-op, document that explicitly and close it as report-only.');
        CLI::newLine();
        CLI::write('DO NOT RUN:', 'red');
        CLI::write('php spark aiops:execution-engine:validate --run');
        CLI::write('ai finish');
        CLI::write('gh pr merge');
    }

    private function runCommand(string $command): void
    {
        CLI::write('RUN: ' . $command, 'green');
        passthru('cd ' . escapeshellarg(ROOTPATH) . ' && ' . $command);
    }

    private function latestRecipeId(string $type): string
    {
        $files = glob(WRITEPATH . 'aiops/recipes/' . $type . '/*.json') ?: [];
        rsort($files);

        if ($files === []) {
            return '';
        }

        return basename($files[0], '.json');
    }

    private function matchCapability(string $objectivePrompt): array
    {
        $objective = strtolower($objectivePrompt);
        $registry = new CapabilityRegistryService();

        foreach ($registry->all() as $capability) {
            $key = strtolower((string) ($capability['key'] ?? ''));
            $domain = strtolower((string) ($capability['domain'] ?? ''));
            $purpose = strtolower((string) ($capability['purpose'] ?? ''));
            $command = strtolower((string) ($capability['command'] ?? ''));

            $tokens = array_filter(array_unique(array_merge(
                explode('.', $key),
                explode('_', $key),
                explode('-', $key),
                explode(':', $command),
                explode(' ', $domain . ' ' . $purpose)
            )));

            $score = 0;

            foreach ($tokens as $token) {
                $token = trim((string) $token);

                if (strlen($token) < 4) {
                    continue;
                }

                if (str_contains($objective, $token)) {
                    $score++;
                }
            }

            if ($score >= 2) {
                return $capability;
            }
        }

        return [];
    }

    private function capabilityGuidance(array $capability): string
    {
        if ($capability === []) {
            return 'Capability Registry Match: none. Use conservative deterministic planning and preserve all safety gates.';
        }

        return implode(' ', [
            'Capability Registry Match:',
            'key=' . (string) ($capability['key'] ?? ''),
            'domain=' . (string) ($capability['domain'] ?? ''),
            'command=' . (string) ($capability['command'] ?? ''),
            'validation_command=' . (string) ($capability['validation_command'] ?? ''),
            'evidence=' . (string) ($capability['evidence'] ?? ''),
            'mutation_level=' . (string) ($capability['mutation_level'] ?? ''),
            'approval_required=' . (! empty($capability['approval_required']) ? 'true' : 'false'),
            'rollback=' . (string) ($capability['rollback'] ?? ''),
        ]);
    }

    private function readOption(string $name): string
    {
        $argv = $_SERVER['argv'] ?? [];
        $prefix = '--' . $name . '=';

        foreach ($argv as $index => $arg) {
            if (str_starts_with($arg, $prefix)) {
                return trim(substr($arg, strlen($prefix)));
            }

            if ($arg === '--' . $name && isset($argv[$index + 1])) {
                return trim((string) $argv[$index + 1]);
            }
        }

        return '';
    }
}
