<?php

namespace App\Commands\AIOps;

use App\Services\AIOps\Terminal\ContributorTerminalSettingsService;
use App\Services\AIOps\Terminal\TerminalAdvisorModelService;
use App\Services\AIOps\Terminal\TerminalAdvisorService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class TerminalAdvisor extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:terminal:advisor';
    protected $description = 'Explain the current AIOps terminal/worktree state in plain language and show safe next options.';
    protected $usage = 'aiops:terminal:advisor [--worktree=/path] [--transcript=/tmp/output.log] [--brief] [--decorate] [--explain] [--json]';
    protected $options = [
        '--worktree' => 'Exact worktree to explain. Defaults to the shell working directory.',
        '--transcript' => 'Optional ai check/next transcript used to preserve its emitted NEXT/WHY text.',
        '--brief' => 'Emit a compact explanation.',
        '--decorate' => 'Decoration mode used after ai check/next. Respects advisor.decorate_check_next.',
        '--explain' => 'Ask the configured read-only Ollama advisor to explain the deterministic state.',
        '--json' => 'Emit machine-readable JSON.',
    ];

    public function run(array $params)
    {
        $options = $this->parsedOptions();
        $worktree = trim((string) ($options['worktree'] ?? getenv('TBI_AIOPS_SHELL_CWD') ?: getcwd() ?: ROOTPATH));
        $transcriptPath = trim((string) ($options['transcript'] ?? ''));
        $brief = array_key_exists('brief', $options);
        $decorate = array_key_exists('decorate', $options);
        $explicitExplain = array_key_exists('explain', $options);
        $json = array_key_exists('json', $options);

        try {
            $settings = new ContributorTerminalSettingsService();
            $effective = $settings->effective();
            $advisorSettings = is_array($effective['advisor'] ?? null) ? $effective['advisor'] : [];

            if (! (bool) ($advisorSettings['enabled'] ?? true)) {
                return EXIT_SUCCESS;
            }

            if ($decorate && ! (bool) ($advisorSettings['decorate_check_next'] ?? true)) {
                return EXIT_SUCCESS;
            }

            $transcript = '';

            if ($transcriptPath !== '') {
                if (! is_file($transcriptPath) || ! is_readable($transcriptPath)) {
                    CLI::write('WARN: advisor transcript is unavailable: ' . $transcriptPath, 'yellow');
                } else {
                    $transcript = (string) file_get_contents($transcriptPath);
                }
            }

            $result = (new TerminalAdvisorService($settings))->advise($worktree, $transcript);
            $modelAssist = (bool) ($advisorSettings['model_assist'] ?? false);
            $lostOnly = (bool) ($advisorSettings['model_assist_on_lost_only'] ?? true);
            $shouldExplain = $explicitExplain
                || ($modelAssist && (! $lostOnly || (bool) ($result['lost_detected'] ?? false)));

            if (! $shouldExplain) {
                $result['model_explanation'] = [
                    'ok' => false,
                    'explanation' => '',
                    'read_only' => true,
                    'skipped' => true,
                ];
            }

            if ($json) {
                if ($shouldExplain) {
                    $result['model_explanation'] = (
                        new TerminalAdvisorModelService()
                    )->explain(
                        $result,
                        $advisorSettings
                    );
                }

                CLI::write(
                    (string) json_encode(
                        $result,
                        JSON_PRETTY_PRINT
                        | JSON_UNESCAPED_SLASHES
                    )
                );

                return EXIT_SUCCESS;
            }

            CLI::newLine();
            CLI::write('===== TBI AIOPS ADVISOR =====', 'cyan');
            CLI::write($result['summary'], 'blue');
            CLI::newLine();

            CLI::write('WHERE YOU ARE', 'cyan');
            CLI::write('Repository: ' . ($result['repository'] ?: 'unknown'), 'blue');
            CLI::write('Worktree:   ' . $result['worktree'], 'blue');
            CLI::write('Branch:     ' . ($result['branch'] ?: 'unknown'), 'blue');
            CLI::write('Changed:    ' . $result['changed_files'] . ' source path(s)', 'blue');

            if (! $brief) {
                CLI::write('Mission:    ' . $result['mission_lifecycle'] . ' / ' . $result['mission_phase'], 'blue');
                CLI::write('Task:       ' . $result['mission_task'], 'blue');

                if ($result['objective'] !== '') {
                    CLI::write('Objective:  ' . $result['objective'], 'blue');
                }

                CLI::write('State:      ' . $result['failure_class'], 'blue');
                CLI::write('Baseline:   ' . $result['baseline_state'], 'blue');
                CLI::write(
                    'Mutation:   ' . ($result['mutation_permission']
                        ? 'governed authority available'
                        : 'read-only/no current authority'),
                    $result['mutation_permission'] ? 'green' : 'yellow'
                );
            }

            CLI::newLine();
            CLI::write('WHAT HAPPENS NEXT', 'cyan');
            CLI::write($result['next_command'], $result['owner_gate'] ? 'purple' : 'green');

            if ($result['why'] !== '') {
                CLI::write('Why: ' . $result['why'], 'blue');
            }

            if ($result['lost_detected']) {
                CLI::newLine();
                CLI::write(
                    'ADVISOR NOTE: You have reached the same material state ' . $result['repeat_count']
                    . ' times. AIOps is treating this as a possible stuck/lost loop and is surfacing the choices instead of repeating the same instruction silently.',
                    'yellow'
                );
            }

            $streamedToTerminal = false;

            if ($shouldExplain) {
                CLI::newLine();
                CLI::write(
                    'READ-ONLY AIOPS EXPLANATION',
                    'cyan'
                );

                $result['model_explanation'] = (
                    new TerminalAdvisorModelService()
                )->explain(
                    $result,
                    $advisorSettings,
                    static function (string $chunk) use (
                        &$streamedToTerminal
                    ): void {
                        echo $chunk;
                        $streamedToTerminal = true;
                    }
                );

                if ($streamedToTerminal) {
                    echo PHP_EOL;
                }
            }

            $model = is_array($result['model_explanation'] ?? null)
                ? $result['model_explanation']
                : [];

            if (
                ($model['ok'] ?? false) === true
                && trim(
                    (string) (
                        $model['explanation']
                        ?? ''
                    )
                ) !== ''
            ) {
                CLI::write(
                    'INFO: This explanation cannot change authority or override the deterministic NEXT command.',
                    'blue'
                );
                CLI::write(
                    'MODEL='
                    . (string) ($model['model'] ?? ''),
                    'blue'
                );
                CLI::write(
                    'MODEL_EVIDENCE='
                    . (string) ($model['evidence'] ?? ''),
                    'blue'
                );
            } elseif (
                $shouldExplain
                && ! ($model['skipped'] ?? false)
            ) {
                CLI::newLine();
                CLI::write(
                    'WARN: read-only model explanation was unavailable; deterministic advisor guidance remains authoritative.',
                    'yellow'
                );

                if (
                    trim(
                        (string) ($model['error'] ?? '')
                    ) !== ''
                ) {
                    CLI::write(
                        'MODEL_ERROR='
                        . (string) $model['error'],
                        'yellow'
                    );
                }
            }

            if (! $brief && (bool) ($advisorSettings['show_safe_options'] ?? true)) {
                CLI::newLine();
                CLI::write('SAFE OPTIONS', 'cyan');

                foreach ($result['safe_options'] as $index => $option) {
                    $color = ($option['kind'] ?? '') === 'owner_gate' ? 'purple' : 'green';
                    CLI::write(($index + 1) . '. ' . $option['label'], 'blue');
                    CLI::write('   ' . $option['command'], $color);
                }
            }

            if (! $brief && (bool) ($advisorSettings['show_environment_report'] ?? true)) {
                CLI::newLine();
                CLI::write('REPORT THIS IF YOU NEED HELP', 'cyan');
                CLI::write($result['report_line'], 'blue');
            }

            if ($result['owner_gate']) {
                CLI::newLine();
                CLI::write('GATE: Human/owner approval is required before AIOps can advance.', 'purple');
            } else {
                CLI::newLine();
                CLI::write('PASS: AIOps advisor resolved the current terminal context.', 'green');
            }

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::write('FAIL: terminal advisor could not resolve context: ' . $e->getMessage(), 'red');

            return EXIT_ERROR;
        }
    }

    private function parsedOptions(): array
    {
        $options = [];
        $argv = $_SERVER['argv'] ?? [];
        $count = count($argv);

        for ($i = 0; $i < $count; $i++) {
            $argument = (string) $argv[$i];

            if (! str_starts_with($argument, '--')) {
                continue;
            }

            $raw = substr($argument, 2);

            if ($raw === '') {
                continue;
            }

            if (str_contains($raw, '=')) {
                [$key, $value] = explode('=', $raw, 2);
                $options[$key] = $value;
                continue;
            }

            $next = $argv[$i + 1] ?? null;

            if ($next !== null && ! str_starts_with((string) $next, '--')) {
                $options[$raw] = (string) $next;
                $i++;
                continue;
            }

            $options[$raw] = true;
        }

        return $options;
    }
}
