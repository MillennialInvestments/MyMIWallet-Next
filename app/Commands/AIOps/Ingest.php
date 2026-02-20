<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\AIOps\InstructionService;
use App\Services\AIOps\DeduplicationService;

class Ingest extends SafeBaseCommand
{
    protected $group       = 'AIOps - Run';
    protected $name        = 'aiops:ingest';
    protected $description = 'Ingest AI instruction text and enqueue for AIOps worker (analysis + patch + PR prep)';

    protected $usage = 'aiops:ingest [--text="..."] [--file=/path/file.txt] [--auto-pr] [--dry-run] [--severity=LOW|MEDIUM|HIGH]';

    public function run(array $params)
    {
        // ✅ Reliable: manual argv parse (Spark options parsing is inconsistent across CI4 installs)
        $argv = $_SERVER['argv'] ?? [];

        $text     = $this->getArgvOption($argv, 'text');      // supports --text= and --text "..."
        $file     = $this->getArgvOption($argv, 'file');      // supports --file= and --file "..."
        $severity = $this->getArgvOption($argv, 'severity');  // supports --severity=HIGH

        $autoPR = $this->hasArgvFlag($argv, 'auto-pr');
        $dryRun = $this->hasArgvFlag($argv, 'dry-run');

        // 🔹 STDIN fallback (multi-line paste support)
        if (!$text && !$file && $this->stdinHasData()) {
            $text = trim(stream_get_contents(STDIN));
        }

        if (!$text && $file) {
            if (!is_file($file)) {
                CLI::error("File not found: {$file}");
                return;
            }
            $text = (string) file_get_contents($file);
        }

        if (!$text) {
            CLI::error('Provide --text="..." OR --file=/path/to/file.txt OR pipe input.');
            CLI::newLine();
            CLI::write('Examples:');
            CLI::write('  php spark aiops:ingest --text="Hello world"');
            CLI::write('  php spark aiops:ingest --file=/tmp/instructions.txt');
            CLI::write('  cat /tmp/instructions.txt | php spark aiops:ingest');
            return;
        }

        CLI::write('🧠 Ingesting instruction...');
        CLI::write('Length: ' . strlen($text) . ' chars');

        $service = new InstructionService();

        // ✅ ingest should enqueue, not block your SSH session
        $result = $service->enqueueInstruction(
            text: $text,
            source: 'ssh',
            autoPR: $autoPR,
            dryRun: $dryRun,
            severityOverride: $severity
        );

        CLI::newLine();
        CLI::write('Instruction ID: ' . $result['id']);
        CLI::write('Status: ' . $result['status']);
        CLI::write('Risk: ' . ($result['risk'] ?? 'TBD'));
        CLI::write('Classification: ' . ($result['classification'] ?? 'TBD'));
        CLI::write('Next: php spark aiops:worker --once');
    }

    private function getArgvOption(array $argv, string $key): ?string
    {
        $needleEq = '--' . $key . '=';
        $needle   = '--' . $key;

        foreach ($argv as $i => $arg) {
            if (str_starts_with($arg, $needleEq)) {
                $val = substr($arg, strlen($needleEq));
                return $val !== '' ? $val : null;
            }

            if ($arg === $needle) {
                $next = $argv[$i + 1] ?? null;
                if ($next !== null && !str_starts_with($next, '--')) {
                    return $next;
                }
            }
        }

        return null;
    }

    private function hasArgvFlag(array $argv, string $flag): bool
    {
        $needle = '--' . $flag;
        foreach ($argv as $arg) {
            if ($arg === $needle) {
                return true;
            }
        }
        return false;
    }

    private function stdinHasData(): bool
    {
        // If STDIN is not a TTY, data is being piped
        return function_exists('posix_isatty') ? !posix_isatty(STDIN) : false;
    }
}