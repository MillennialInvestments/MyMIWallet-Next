<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\AiopsErrorParser;
use CodeIgniter\CLI\CLI;

class LogsErrors extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'logs:errors';
    protected $description = 'Scan runtime logs, normalize errors, and generate structured AIOps error reports.';

    protected $maxBytesPerFile = 524288;
    protected $maxLinesPerFile = 1200;

    public function run(array $params)
    {
        $today = date('Y-m-d');
        $parser = new AiopsErrorParser();

        $sourceFiles = $this->discoverLogFiles();
        $records = [];

        foreach ($sourceFiles as $source) {
            $lines = $this->tailLines($source, $this->maxBytesPerFile, $this->maxLinesPerFile);
            foreach ($parser->parseLines($lines, $source) as $record) {
                if (($record['date'] ?? null) !== $today) {
                    continue;
                }
                $records[] = $record;
            }
        }

        $existing = $this->loadJson(ROOTPATH . 'docs/_aiops/_error_summary.json');
        $historical = [];
        foreach (($existing['errors'] ?? []) as $item) {
            if (isset($item['signature_hash'])) {
                $historical[(string) $item['signature_hash']] = true;
            }
        }

        $deduped = $this->dedupeBySignature($records, $historical, $today);
        $newToday = array_values(array_filter($deduped, static fn(array $r): bool => (bool) ($r['is_new_today'] ?? false)));

        $systems = [];
        $files = [];
        foreach ($deduped as $record) {
            $systems[$record['system']] = ($systems[$record['system']] ?? 0) + 1;
            $appFile = (string) ($record['app_file'] ?? 'unknown');
            $files[$appFile] = ($files[$appFile] ?? 0) + 1;
        }
        arsort($systems);
        arsort($files);

        $summary = [
            'generated_at' => date(DATE_ATOM),
            'date' => $today,
            'totals' => [
                'errors_found_today' => count($deduped),
                'new_errors_today' => count($newToday),
                'source_files_scanned' => count($sourceFiles),
            ],
            'systems' => $systems,
            'files' => $files,
            'errors' => $deduped,
        ];

        $this->writeReports($summary, $newToday);

        CLI::write('Error scan summary', 'green');
        CLI::write('- total errors found today: ' . count($deduped));
        CLI::write('- total new errors today: ' . count($newToday));
        CLI::write('- per-system counts: ' . json_encode($systems));
        CLI::write('- reports: docs/_aiops/_error_summary.md, docs/_aiops/_error_summary.json, docs/_aiops/_error_new_today.md, docs/_aiops/_error_new_today.json');

        return EXIT_SUCCESS;
    }

    /** @return list<string> */
    private function discoverLogFiles(): array
    {
        $patterns = [
            WRITEPATH . 'logs/*.log',
            WRITEPATH . 'logs/emergency.log',
            ROOTPATH . 'docs/_aiops/logs/**/*.md',
            ROOTPATH . 'docs/_aiops/ollama/logs/**/*.md',
            ROOTPATH . 'docs/_aiops/nightly/**/*.md',
            '/home/*/logs/*.log',
            '/home/*/mail/*',
            '/var/log/nginx/*.log',
            '/var/log/php*.log',
            '/var/log/php-fpm*.log',
            '/var/log/syslog',
            '/var/log/messages',
        ];

        $files = [];
        foreach ($patterns as $pattern) {
            foreach ($this->globRecursive($pattern) as $file) {
                if (! is_file($file) || ! is_readable($file) || $this->isBinaryFile($file)) {
                    continue;
                }
                $files[$file] = $file;
            }
        }

        ksort($files);
        return array_values($files);
    }

    /** @return list<string> */
    private function globRecursive(string $pattern): array
    {
        if (! str_contains($pattern, '**')) {
            return glob($pattern) ?: [];
        }

        [$base, $suffix] = explode('**', $pattern, 2);
        $base = rtrim($base, '/');

        if (! is_dir($base)) {
            return [];
        }

        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($base, \FilesystemIterator::SKIP_DOTS));
        $matches = [];
        $suffix = ltrim($suffix, '/');
        $suffixRegex = '#'.str_replace(['.', '*'], ['\\.', '.*'], $suffix).'$#i';

        foreach ($rii as $fileInfo) {
            $path = (string) $fileInfo->getPathname();
            $relative = ltrim(str_replace($base, '', $path), '/');
            if (preg_match($suffixRegex, $relative)) {
                $matches[] = $path;
            }
        }

        return $matches;
    }

    /** @return list<string> */
    private function tailLines(string $file, int $maxBytes, int $maxLines): array
    {
        $size = (int) @filesize($file);
        if ($size <= 0) {
            return [];
        }

        $offset = max(0, $size - $maxBytes);
        $h = @fopen($file, 'rb');
        if ($h === false) {
            return [];
        }

        fseek($h, $offset);
        $raw = stream_get_contents($h);
        fclose($h);

        if (! is_string($raw) || $raw === '') {
            return [];
        }

        $lines = preg_split('/\R/', $raw) ?: [];
        $lines = array_values(array_filter($lines, static fn(string $line): bool => trim($line) !== ''));

        if (count($lines) > $maxLines) {
            $lines = array_slice($lines, -$maxLines);
        }

        return $lines;
    }

    private function isBinaryFile(string $file): bool
    {
        $h = @fopen($file, 'rb');
        if ($h === false) {
            return true;
        }
        $chunk = fread($h, 512);
        fclose($h);

        if (! is_string($chunk) || $chunk === '') {
            return false;
        }

        return strpos($chunk, "\0") !== false;
    }

    /**
     * @param list<array<string,mixed>> $records
     * @param array<string,bool> $historical
     * @return list<array<string,mixed>>
     */
    private function dedupeBySignature(array $records, array $historical, string $today): array
    {
        $out = [];

        foreach ($records as $record) {
            $signature = (string) ($record['signature_hash'] ?? '');
            if ($signature === '') {
                continue;
            }

            if (! isset($out[$signature])) {
                $record['first_seen'] = $today;
                $record['last_seen'] = $today;
                $record['occurrences_today'] = 1;
                $record['is_new_today'] = ! isset($historical[$signature]);
                $out[$signature] = $record;
                continue;
            }

            $out[$signature]['occurrences_today']++;
            $out[$signature]['last_seen'] = $today;
        }

        return array_values($out);
    }

    /** @return array<string,mixed> */
    private function loadJson(string $file): array
    {
        if (! is_file($file)) {
            return [];
        }

        $decoded = json_decode((string) file_get_contents($file), true);
        return is_array($decoded) ? $decoded : [];
    }

    /** @param array<string,mixed> $summary @param list<array<string,mixed>> $newToday */
    private function writeReports(array $summary, array $newToday): void
    {
        $dir = ROOTPATH . 'docs/_aiops/';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($dir . '_error_summary.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($dir . '_error_new_today.json', json_encode([
            'generated_at' => date(DATE_ATOM),
            'count' => count($newToday),
            'errors' => $newToday,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $md = [];
        $md[] = '# Error Summary';
        $md[] = '';
        $md[] = '## Executive Summary';
        $md[] = '- Date: ' . ($summary['date'] ?? date('Y-m-d'));
        $md[] = '- Total errors found today: ' . ($summary['totals']['errors_found_today'] ?? 0);
        $md[] = '- Total new errors today: ' . ($summary['totals']['new_errors_today'] ?? 0);

        $md[] = '';
        $md[] = '## New Errors Today';
        foreach ($summary['errors'] ?? [] as $error) {
            if (! ($error['is_new_today'] ?? false)) {
                continue;
            }
            $md[] = sprintf('- [%s] %s (%s:%s)', $error['system'] ?? 'unknown', $error['normalized_message'] ?? '', $error['app_file'] ?? 'n/a', (string) ($error['app_line'] ?? 'n/a'));
        }

        $md[] = '';
        $md[] = '## Recurring Errors Today';
        foreach ($summary['errors'] ?? [] as $error) {
            if (($error['is_new_today'] ?? false)) {
                continue;
            }
            $md[] = sprintf('- [%s] %s (%s occurrences)', $error['system'] ?? 'unknown', $error['normalized_message'] ?? '', (string) ($error['occurrences_today'] ?? 0));
        }

        $md[] = '';
        $md[] = '## Errors By System';
        foreach (($summary['systems'] ?? []) as $system => $count) {
            $md[] = '- ' . $system . ': ' . $count;
        }

        $md[] = '';
        $md[] = '## Errors By App File';
        foreach (($summary['files'] ?? []) as $file => $count) {
            $md[] = '- ' . $file . ': ' . $count;
        }

        $md[] = '';
        $md[] = '## Recommended Repair Targets';
        foreach (array_slice((array) array_keys((array) ($summary['files'] ?? [])), 0, 10) as $target) {
            $md[] = '- ' . $target;
        }
        file_put_contents($dir . '_error_summary.md', implode("\n", $md) . "\n");

        $newMd = ['# New Errors Today', ''];
        foreach ($newToday as $error) {
            $newMd[] = sprintf('- [%s] %s (%s:%s)', $error['system'] ?? 'unknown', $error['normalized_message'] ?? '', $error['app_file'] ?? 'n/a', (string) ($error['app_line'] ?? 'n/a'));
        }
        file_put_contents($dir . '_error_new_today.md', implode("\n", $newMd) . "\n");
    }
}
