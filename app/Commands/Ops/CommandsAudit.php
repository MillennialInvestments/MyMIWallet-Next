<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\CLI;

class CommandsAudit extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:commands:audit';
    protected $description = 'Audit Spark commands for illegal constructors.';
    protected $usage = 'ops:commands:audit';

    public function run(array $params)
    {
        $this->parseParams($params);
        $scanner = new CommandRulesScanner();
        $violations = $scanner->scan(ROOTPATH . 'app/Commands');

        if ($violations === []) {
            CLI::write('✅ All Spark command rules passed.', 'green');
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

        if (! $hasIllegal) {
            CLI::write('All Spark commands are constructor-safe.', 'green');
            return EXIT_SUCCESS;
        }

        CLI::error('❌ ILLEGAL COMMAND CONSTRUCTOR');
        foreach ($rows as $row) {
            if ($row[2] !== '❌ ILLEGAL CONSTRUCTOR') {
                continue;
            }

            CLI::error($row[0]);
            CLI::error($row[1]);
            CLI::error('Run ops:commands:autofix --approve or remove constructor manually.');
        }

        return EXIT_ERROR;
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
