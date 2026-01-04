<?php

declare(strict_types=1);

namespace App\Libraries\Ops;

use App\Libraries\MyMIAlerts;
use App\Libraries\MyMIMarketing;
use Throwable;

class OpsJobRegistry
{
    /** @var array<string,callable> */
    protected array $handlers = [];

    public function __construct()
    {
        $this->registerDefaults();
    }

    /**
     * @param callable(array):array|string $handler
     */
    public function register(string $jobKey, callable $handler): void
    {
        $this->handlers[$jobKey] = $handler;
    }

    /**
     * @return array<string,callable>
     */
    public function all(): array
    {
        return $this->handlers;
    }

    /**
     * @throws \RuntimeException
     */
    public function dispatch(string $jobKey, array $payload = []): array
    {
        if (! isset($this->handlers[$jobKey])) {
            throw new \RuntimeException("No handler registered for {$jobKey}");
        }

        $handler = $this->handlers[$jobKey];

        try {
            $result = $handler($payload);
        } catch (Throwable $e) {
            throw new \RuntimeException($e->getMessage(), (int) $e->getCode(), $e);
        }

        if (is_array($result)) {
            return $result;
        }

        return ['result' => $result];
    }

    protected function registerDefaults(): void
    {
        $this->register('ops.logs.summarize', fn(array $payload = []): array => $this->handleSummarizeLogs($payload));

        $this->register('ops.docs.inventory_scan', fn(array $payload = []): array => $this->handleDocsInventory($payload));

        $this->register('marketing.generate_digest', function (array $payload = []): array {
            if (class_exists(MyMIMarketing::class)) {
                try {
                    $marketing = new MyMIMarketing();
                    $digest = method_exists($marketing, 'generateDigest')
                        ? $marketing->generateDigest($payload)
                        : 'marketing digest handler stubbed';

                    return [
                        'status' => 'ok',
                        'output' => $digest,
                        'handler' => MyMIMarketing::class,
                    ];
                } catch (Throwable $e) {
                    return [
                        'status' => 'error',
                        'message' => $e->getMessage(),
                    ];
                }
            }

            return [
                'status'  => 'ok',
                'message' => 'Marketing digest stub executed',
                'output'  => ['payload' => $payload],
            ];
        });

        $this->register('alerts.process', function (array $payload = []): array {
            if (class_exists(MyMIAlerts::class)) {
                try {
                    $alerts = new MyMIAlerts();
                    $result = method_exists($alerts, 'process')
                        ? $alerts->process($payload)
                        : 'alerts process stubbed';

                    return [
                        'status' => 'ok',
                        'output' => $result,
                        'handler' => MyMIAlerts::class,
                    ];
                } catch (Throwable $e) {
                    return [
                        'status' => 'error',
                        'message' => $e->getMessage(),
                    ];
                }
            }

            return [
                'status'  => 'ok',
                'message' => 'Alerts process stub executed',
                'output'  => ['payload' => $payload],
            ];
        });

        $this->register('ops.worker.kick', function (): array {
            return [
                'status'  => 'ok',
                'message' => 'Worker kick acknowledged',
                'ts'      => date('c'),
            ];
        });
    }

    protected function handleSummarizeLogs(array $payload = []): array
    {
        $logsDir = rtrim(WRITEPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'logs';
        if (! is_dir($logsDir)) {
            return [
                'status'  => 'error',
                'message' => 'Logs directory not found',
                'path'    => $logsDir,
            ];
        }

        $files = array_filter(glob($logsDir . DIRECTORY_SEPARATOR . '*') ?: [], 'is_file');
        $summaries = [];
        $totalErrors = 0;
        $totalWarnings = 0;

        foreach ($files as $file) {
            $tailLines = $this->tailFile($file, 60);
            $errors    = $this->countKeywords($tailLines, ['ERROR', 'CRITICAL', 'ALERT']);
            $warnings  = $this->countKeywords($tailLines, ['WARNING', 'WARN']);
            $summaries[] = [
                'file'        => basename($file),
                'size_bytes'  => filesize($file) ?: 0,
                'modified_at' => filemtime($file) ? date('c', (int) filemtime($file)) : null,
                'errors'      => $errors,
                'warnings'    => $warnings,
                'tail'        => array_slice($tailLines, -20),
            ];
            $totalErrors   += $errors;
            $totalWarnings += $warnings;
        }

        return [
            'status'        => 'ok',
            'generated_at'  => date('c'),
            'file_count'    => count($summaries),
            'total_errors'  => $totalErrors,
            'total_warnings'=> $totalWarnings,
            'files'         => $summaries,
        ];
    }

    protected function handleDocsInventory(array $payload = []): array
    {
        $docsDir   = ROOTPATH . 'docs';
        $outputDir = $docsDir . DIRECTORY_SEPARATOR . 'ops';
        $target    = $outputDir . DIRECTORY_SEPARATOR . 'docs_inventory.md';
        $files     = [];

        if (is_dir($docsDir)) {
            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($docsDir));
            foreach ($iterator as $file) {
                if ($file->isDir()) {
                    continue;
                }
                $path = str_replace(ROOTPATH, '', $file->getPathname());
                $files[] = $path;
            }
        }

        if (! is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $content = "# Docs Inventory\n\nGenerated at " . date('Y-m-d H:i:s') . "\n\n";
        foreach ($files as $file) {
            $content .= "- {$file}\n";
        }

        file_put_contents($target, $content);

        return [
            'status'   => 'ok',
            'written'  => $target,
            'count'    => count($files),
            'files'    => $files,
            'payload'  => $payload,
        ];
    }

    /**
     * @param array<int,string> $lines
     */
    protected function countKeywords(array $lines, array $keywords): int
    {
        $count = 0;
        foreach ($lines as $line) {
            foreach ($keywords as $keyword) {
                if (stripos($line, $keyword) !== false) {
                    $count++;
                    break;
                }
            }
        }

        return $count;
    }

    /**
     * @return array<int,string>
     */
    protected function tailFile(string $file, int $lines = 50): array
    {
        if (! is_file($file) || ! is_readable($file)) {
            return [];
        }

        $buffer = [];
        $spl = new \SplFileObject($file, 'r');
        $spl->seek(PHP_INT_MAX);
        $lastLine = $spl->key();
        $target = max(0, $lastLine - $lines + 1);
        $spl->seek($target);

        while (! $spl->eof()) {
            $buffer[] = trim((string) $spl->current());
            $spl->next();
        }

        return array_values(array_filter($buffer, static fn($line) => $line !== ''));
    }
}
