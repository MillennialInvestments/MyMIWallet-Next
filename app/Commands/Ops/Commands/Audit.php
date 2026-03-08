<?php

namespace App\Commands\Ops\Commands;

use App\Commands\SafeBaseCommand;
use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\CLI;

class Audit extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:commands:audit';
    protected $description = 'Audit Spark commands for illegal constructors.';
    protected $usage = 'ops:commands:audit';
    protected $options = [
        '--json' => 'Emit JSON output and write docs/_ops/commands-audit/ops-commands-audit.json',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $json = isset($flags['json']) || $this->isCiRuntime();
        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');

        $payload = [
            'generated_at' => date('c'),
            'violations_count' => count($violations),
            'violations' => $violations,
        ];

        if ($this->isCiRuntime() || $json) {
            $targetDir = ROOTPATH . 'docs/_ops/commands-audit';
            @mkdir($targetDir, 0775, true);
            file_put_contents(
                $targetDir . '/ops-commands-audit.json',
                json_encode($payload, JSON_PRETTY_PRINT)
            );
        }

        if ($violations === []) {
            CLI::write('✅ All Spark command rules passed.', 'green');
            if ($json) {
                CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            }
            return EXIT_SUCCESS;
        }

        $rows = [];
        foreach ($violations as $entry) {
            $rows[] = [
                $entry['class'],
                $this->relativePath($entry['file']),
                implode(', ', $entry['violations']),
            ];
        }

        $this->renderTable(['Command', 'File', 'Violations'], $rows);
        if ($json) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        return $this->isCiRuntime() ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function renderTable(array $headers, array $rows): void
    {
        $widths = array_map('strlen', $headers);

        foreach ($rows as $row) {
            foreach ($row as $index => $cell) {
                $widths[$index] = max($widths[$index], strlen($cell));
            }
        }

        $divider = '';
        foreach ($widths as $width) {
            $divider .= str_repeat('-', $width + 2);
        }

        $line = '';
        foreach ($headers as $index => $header) {
            $line .= ' ' . str_pad($header, $widths[$index]) . ' ';
        }

        CLI::write($line, 'white');
        CLI::write($divider, 'white');

        foreach ($rows as $row) {
            $rowLine = '';
            foreach ($row as $index => $cell) {
                $rowLine .= ' ' . str_pad($cell, $widths[$index]) . ' ';
            }
            CLI::write($rowLine);
        }
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }
}
