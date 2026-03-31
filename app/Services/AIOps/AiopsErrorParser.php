<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class AiopsErrorParser
{
    /** @param list<string> $lines @return list<array<string,mixed>> */
    public function parseLines(array $lines, string $sourceFile): array
    {
        $records = [];
        foreach ($lines as $line) {
            $parsed = $this->parseLine($line, $sourceFile);
            if ($parsed === null) {
                continue;
            }
            $records[] = $parsed;
        }

        return $records;
    }

    /** @return array<string,mixed>|null */
    public function parseLine(string $line, string $sourceFile): ?array
    {
        if (! $this->isErrorLine($line)) {
            return null;
        }

        $timestamp = $this->extractTimestamp($line) ?? date(DATE_ATOM);
        $date = substr($timestamp, 0, 10);
        $system = $this->detectSystem($sourceFile);
        $rawMessage = trim($line);
        $normalizedMessage = $this->normalizeMessage($rawMessage);
        [$appFile, $appLine] = $this->extractAppFileLine($rawMessage);
        $classification = $this->classify($normalizedMessage);

        $signatureRaw = implode('|', [
            $system,
            $normalizedMessage,
            $appFile ?? 'unknown',
            (string) ($appLine ?? 0),
        ]);

        return [
            'timestamp' => $timestamp,
            'date' => $date,
            'system' => $system,
            'source_file' => $sourceFile,
            'normalized_message' => $normalizedMessage,
            'raw_message' => $rawMessage,
            'app_file' => $appFile,
            'app_line' => $appLine,
            'request_route' => $this->extractRoute($rawMessage),
            'classification' => $classification,
            'signature_hash' => sha1($signatureRaw),
        ];
    }

    private function isErrorLine(string $line): bool
    {
        $n = strtolower($line);
        foreach (['error', 'exception', 'fatal', 'critical', 'allowed memory', 'not allowed'] as $needle) {
            if (str_contains($n, $needle)) {
                return true;
            }
        }
        return false;
    }

    private function extractTimestamp(string $line): ?string
    {
        if (preg_match('/(\d{4}-\d{2}-\d{2}[ T]\d{2}:\d{2}:\d{2})/', $line, $m)) {
            return str_replace(' ', 'T', $m[1]);
        }
        if (preg_match('/(\d{4}-\d{2}-\d{2})/', $line, $m)) {
            return $m[1] . 'T00:00:00';
        }
        return null;
    }

    private function detectSystem(string $sourceFile): string
    {
        $f = strtolower($sourceFile);
        return match (true) {
            str_contains($f, '/writable/logs') => 'ci4',
            str_contains($f, '/docs/_aiops/ollama') => 'ollama',
            str_contains($f, '/docs/_aiops/') => 'aiops-docs',
            str_contains($f, '/var/log/nginx') => 'nginx',
            str_contains($f, '/var/log/php') => 'php',
            str_contains($f, '/home/') => 'vps-home',
            default => 'unknown',
        };
    }

    private function normalizeMessage(string $message): string
    {
        $message = preg_replace('/\d{4}-\d{2}-\d{2}[ T]\d{2}:\d{2}:\d{2}/', '', $message) ?? $message;
        $message = preg_replace('/\s+/', ' ', trim($message)) ?? trim($message);
        return mb_substr($message, 0, 300);
    }

    /** @return array{0:?string,1:?int} */
    private function extractAppFileLine(string $message): array
    {
        if (preg_match('#(app/[A-Za-z0-9_\-/]+\.php)\((\d+)\)#', $message, $m)) {
            return [$m[1], (int) $m[2]];
        }
        if (preg_match('#(app/[A-Za-z0-9_\-/]+\.php):(\d+)#', $message, $m)) {
            return [$m[1], (int) $m[2]];
        }
        return [null, null];
    }

    private function extractRoute(string $message): ?string
    {
        if (preg_match('#\b((?:[A-Za-z0-9_-]+/)+[A-Za-z0-9_-]+)\b#', $message, $m)) {
            return $m[1];
        }
        return null;
    }

    public function classify(string $normalizedMessage): string
    {
        $m = strtolower($normalizedMessage);

        return match (true) {
            str_contains($m, 'action you requested is not allowed') || str_contains($m, 'csrf') => 'request_csrf_rejected',
            str_contains($m, 'cannot access protected property') && str_contains($m, 'request') => 'protected_property_access',
            str_contains($m, 'trim():') && str_contains($m, 'null') => 'null_view_path_or_namespace',
            str_contains($m, 'call to undefined method') => 'undefined_method',
            str_contains($m, 'allowed memory size') || str_contains($m, 'memory exhausted') => 'memory_exhaustion',
            str_contains($m, '404') || str_contains($m, 'route') => 'route_resolution_failure',
            str_contains($m, 'query exception') || str_contains($m, 'sql') => 'db_query_failure',
            str_contains($m, 'auth') || str_contains($m, 'login') => 'auth_failure',
            str_contains($m, 'bootstrap') || str_contains($m, 'initialization') => 'generic_boot_failure',
            default => 'generic_boot_failure',
        };
    }
}
