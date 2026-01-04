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
        $this->register('ops.logs.summarize', function (): array {
            // Minimal stub that confirms execution.
            return [
                'status'  => 'ok',
                'message' => 'Log summary stub ok',
                'summary' => 'stub ok',
            ];
        });

        $this->register('ops.docs.inventory_scan', function (): array {
            $docsDir = ROOTPATH . 'docs';
            $outputDir = $docsDir . DIRECTORY_SEPARATOR . 'ops';
            $target = $outputDir . DIRECTORY_SEPARATOR . 'docs_inventory.md';
            $files = [];

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
                'status' => 'ok',
                'written' => $target,
                'count' => count($files),
            ];
        });

        $this->register('marketing.generate_digest', function (array $payload = []): array {
            if (class_exists(MyMIMarketing::class)) {
                try {
                    $marketing = new MyMIMarketing();
                    $digest = method_exists($marketing, 'generateDigest')
                        ? $marketing->generateDigest($payload)
                        : 'marketing digest handler stubbed';

                    return [
                        'status' => 'ok',
                        'digest' => $digest,
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
                        'result' => $result,
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
            ];
        });

        $this->register('ops.worker.kick', function (): array {
            return [
                'status'  => 'ok',
                'message' => 'Worker kick acknowledged',
            ];
        });
    }
}
