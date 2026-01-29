<?php

namespace App\Commands\Health;

use App\Commands\SafeBaseCommand;
use App\Services\Triage\CommandRunner;
use CodeIgniter\CLI\CLI;

class GitSafety extends SafeBaseCommand
{
    protected $group = 'health';
    protected $name = 'health:git-safety';
    protected $description = 'Check git ignore rules for env/writable and tracked secrets.';

    public function run(array $params)
    {
        $this->parseParams($params);
        log_message('info', '[spark:health:git-safety] Started', ['params' => $params]);
        CLI::write('Running git safety checks...', 'yellow');

        $runner = new CommandRunner();
        $gitCheck = $runner->run('command -v git');
        if (($gitCheck['exit_code'] ?? 1) !== 0) {
            CLI::error('git not available in PATH.');
            log_message('warning', '[spark:health:git-safety] git not available');
            return EXIT_ERROR;
        }

        $issues = [];
        $envIgnored = $this->isIgnored($runner, '.env');
        if (! $envIgnored) {
            $issues[] = '.env is not ignored';
        }

        $writableIgnored = $this->isIgnored($runner, 'writable/');
        if (! $writableIgnored) {
            $issues[] = 'writable/ is not ignored';
        }

        $tracked = $runner->run('git ls-files');
        $trackedFiles = $tracked['output'] ?? [];
        $secretMatches = $this->findSecretLikeFiles($trackedFiles);
        if ($secretMatches !== []) {
            $issues[] = 'Tracked secret-like files detected: ' . implode(', ', $secretMatches);
        }

        $overall = $issues === [] ? 'PASS' : 'FAIL';
        if ($overall === 'FAIL' && ! $envIgnored) {
            $overall = 'FAIL (env tracked)';
        }

        CLI::newLine();
        CLI::write('git_safety=' . $overall);
        if ($issues !== []) {
            foreach ($issues as $issue) {
                CLI::write('issue=' . $issue, 'red');
            }
        }

        log_message('info', '[spark:health:git-safety] Completed', [
            'overall' => $overall,
            'issues' => $issues,
        ]);

        return str_starts_with($overall, 'PASS') ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function isIgnored(CommandRunner $runner, string $path): bool
    {
        $result = $runner->run('git check-ignore -q ' . escapeshellarg($path));
        return ($result['exit_code'] ?? 1) === 0;
    }

    /**
     * @param string[] $trackedFiles
     * @return string[]
     */
    private function findSecretLikeFiles(array $trackedFiles): array
    {
        $matches = [];
        $patterns = [
            '/(^|\/)\.env(\.|$)/i',
            '/(^|\/)env-copy/i',
            '/(^|\/)secrets?/i',
            '/(^|\/)(api[_-]?key|token|secret)/i',
            '/(^|\/)writable\//i',
        ];

        foreach ($trackedFiles as $file) {
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $file)) {
                    $matches[] = $file;
                    break;
                }
            }
        }

        return array_values(array_unique($matches));
    }
}
