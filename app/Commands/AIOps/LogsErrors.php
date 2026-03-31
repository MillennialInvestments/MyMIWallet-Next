<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class LogsErrors extends SafeBaseCommand
{
    protected $group       = 'AIOps';
    protected $name        = 'logs:errors';
    protected $description = 'Aggregate today\'s errors across all subsystems and separate from previous logs';

    protected $logPaths = [];


    public function run(array $params)
    {
        CLI::write('Scanning logs for today...', 'yellow');

        $today = date('Y-m-d');
        $errors = [];
        $previous = $this->loadPreviousSummary();

        foreach ($this->resolveLogPaths() as $system => $paths) {
            $paths = (array) $paths;

            foreach ($paths as $path) {
                foreach (glob($path . '*.log') ?: [] as $file) {
                    $content = @file_get_contents($file);
                    if (! $content) {
                        continue;
                    }

                    $lines = explode("\n", $content);

                    foreach ($lines as $line) {
                        if (! $this->isToday($line, $today)) {
                            continue;
                        }

                        if ($this->isError($line)) {
                            $hash = md5($line);

                            $errors[$hash] = [
                                'system' => $system,
                                'file'   => $file,
                                'line'   => trim($line),
                            ];
                        }
                    }
                }
            }
        }

        $newErrors = array_diff_key($errors, $previous);

        $this->writeReports($errors, $newErrors);

        CLI::write('Log scan complete.', 'green');
    }


    private function resolveLogPaths(): array
    {
        return [
            'ci4'     => WRITEPATH . 'logs/',
            'aiops'   => ROOTPATH . 'docs/_aiops/logs/',
            'ollama'  => ROOTPATH . 'docs/_aiops/ollama/logs/',
            'chat'    => ROOTPATH . 'docs/_aiops/logs/',
            'vps'     => [
                '/home/*/logs/',
                '/var/log/',
            ],
        ];
    }

    private function isToday(string $line, string $today): bool
    {
        return strpos($line, $today) !== false;
    }

    private function isError(string $line): bool
    {
        return stripos($line, 'error') !== false
            || stripos($line, 'exception') !== false
            || stripos($line, 'fatal') !== false;
    }

    private function loadPreviousSummary(): array
    {
        $file = ROOTPATH . 'docs/_aiops/_error_summary.json';

        if (! file_exists($file)) {
            return [];
        }

        return json_decode((string) file_get_contents($file), true) ?? [];
    }

    private function writeReports(array $errors, array $newErrors): void
    {
        $dir = ROOTPATH . 'docs/_aiops/';

        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($dir . '_error_summary.json', json_encode($errors, JSON_PRETTY_PRINT));

        $md = "# Error Report\n\n";
        $md .= 'Generated: ' . date('Y-m-d H:i:s') . "\n\n";

        $md .= "## New Errors\n\n";
        foreach ($newErrors as $err) {
            $md .= "- [{$err['system']}] {$err['line']}\n";
        }

        $md .= "\n## All Errors Today\n\n";
        foreach ($errors as $err) {
            $md .= "- [{$err['system']}] {$err['line']}\n";
        }

        file_put_contents($dir . '_error_summary.md', $md);
    }
}
