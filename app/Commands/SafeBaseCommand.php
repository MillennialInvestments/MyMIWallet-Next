<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\BaseCommand;
use App\Commands\Contracts\AiOpsRunnable;
use App\Commands\Traits\NextStepTrait;
use App\Commands\Traits\SparkRunnerTrait;
use App\Commands\Contracts\DryRunCapable;
use App\Commands\Contracts\RequiresApproval;

/**
 * SafeBaseCommand
 *
 * CI4-SAFE RULES (DO NOT VIOLATE):
 * - NO constructor
 * - NO typed properties
 * - NO service access during class load
 */

abstract class SafeBaseCommand extends BaseCommand implements
    RequiresApproval,
    DryRunCapable,
    AiOpsRunnable
{
    use SparkRunnerTrait;
    use NextStepTrait;

    /**
     * Whether this command can be executed by AIOps automation.
     * Must remain untyped for CI4 Spark discovery.
     */
    protected $aiOpsRunnable = false;

    /**
     * Whether dry-run is implicitly enabled unless --approve is passed.
     * Must remain untyped.
     */
    protected $defaultDryRun = false;

    /**
     * Parsed CLI flags.
     * Must remain untyped.
     */
    protected $parsedFlags = [];
    protected $sparkTraceStarted = false;
    protected $sparkTraceStartTime = null;

    /**
     * CI4-safe parameter parser.
     *
     * @param array $params
     * @return array{0: array<int, string>, 1: array<string, mixed>}
     */

    protected function beginSparkTrace(): void
    {
        if ($this->sparkTraceStarted) {
            return;
        }

        $this->sparkTraceStarted = true;
        $this->sparkTraceStartTime = microtime(true);
        log_message('info', '[SPARK_START] ' . static::class);
        log_message('info', '[SPARK_MEMORY] ' . memory_get_usage(true));
    }

    protected function finishSparkTrace(): void
    {
        if (! $this->sparkTraceStarted) {
            return;
        }

        $duration = $this->sparkTraceStartTime !== null
            ? microtime(true) - $this->sparkTraceStartTime
            : 0;

        log_message('info', '[SPARK_COMPLETE] ' . static::class . ' duration=' . number_format((float) $duration, 6));
        log_message('info', '[SPARK_MEMORY] ' . memory_get_usage(true));
        $this->sparkTraceStarted = false;
    }

    public function __destruct()
    {
        $this->finishSparkTrace();
    }

    protected function parseParams(array $params): array
    {
        $this->beginSparkTrace();
        $args  = [];
        $flags = [];

        foreach ($params as $index => $param) {
            if (is_string($index)) {
                $key = ltrim($index, '-');

                if ($param === null || $param === true || $param === '') {
                    $flags[$key] = true;
                    continue;
                }

                if ($param === false) {
                    continue;
                }

                if (is_scalar($param)) {
                    $flags[$key] = (string) $param;
                }

                continue;
            }

            // Spark delegation can introduce nulls
            if ($param === null) {
                continue;
            }

            if (is_bool($param)) {
                $args[] = $param ? '1' : '0';
                continue;
            }

            if (is_int($param) || is_float($param)) {
                $param = (string) $param;
            }

            if (! is_string($param)) {
                continue;
            }

            $param = trim($param);
            if ($param === '') {
                continue;
            }

            if (str_starts_with($param, '--')) {
                $key = ltrim($param, '-');

                // --key=value support
                if (strpos($key, '=') !== false) {
                    [$k, $v] = explode('=', $key, 2);
                    $flags[$k] = $v;
                } else {
                    $flags[$key] = true;
                }
            } else {
                $args[] = $param;
            }
        }

        // Implicit dry-run enforcement
        if (
            $this->defaultDryRun
            && ! isset($flags['approve'])
            && ! isset($flags['dry-run'])
        ) {
            $flags['dry-run'] = true;
        }

        $this->parsedFlags = $flags;

        $dryRun = $this->resolveDryRun($flags);

        $this->logIntent($params, $flags, $dryRun);
        $this->guardDestructive($flags, $dryRun);

        return [$args, $flags];
    }

    protected function resolveDryRun(array $flags): bool
    {
        return isset($flags['dry-run']);
    }

    public function supportsDryRun(): bool
    {
        return isset($this->options)
            && is_array($this->options)
            && array_key_exists('--dry-run', $this->options);
    }

    public function requiresApproval(): bool
    {
        return method_exists($this, 'isDestructive') && $this->isDestructive();
    }

    public function isAiOpsRunnable(): bool
    {
        return (bool) $this->aiOpsRunnable;
    }

    protected function isCiRuntime(): bool
    {
        if (defined('CI_ENVIRONMENT') && CI_ENVIRONMENT === 'testing') {
            return true;
        }

        if (getenv('CI') !== false) {
            return true;
        }

        if (getenv('GITHUB_ACTIONS') !== false) {
            return true;
        }

        if (getenv('CI_PIPELINE') !== false) {
            return true;
        }

        return false;
    }
    

    /**
     * Guard destructive commands unless --approve is provided.
     */
    protected function guardDestructive(array $flags, bool $dryRun): void
    {
        if (! $this->requiresApproval()) {
            return;
        }

        if ($dryRun || isset($flags['approve'])) {
            return;
        }

        CLI::error('This action is destructive. Re-run with --approve.');
        exit(EXIT_ERROR);
    }

    /**
     * Structured intent logging for observability & AIOps.
     */
    protected function logIntent(array $params, array $flags, bool $dryRun): void
    {
        log_message(
            'info',
            sprintf('[spark:%s] Intent', $this->name ?? 'unknown'),
            [
                'command'            => $this->name ?? null,
                'group'              => $this->group ?? null,
                'params'             => $params,
                'flags'              => $flags,
                'dry_run'            => $dryRun,
                'requires_approval'  => $this->requiresApproval(),
                'supports_dry_run'   => $this->supportsDryRun(),
                'ai_ops_runnable'    => $this->isAiOpsRunnable(),
            ]
        );
    }

    /**
     * Override in child commands if destructive.
     */
    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * Option helpers
     */
    protected function option(string $key, $default = false)
    {
        $options = CLI::getOptions();

        if (array_key_exists($key, $options)) {
            return $options[$key];
        }

        if (array_key_exists($key, $this->parsedFlags)) {
            return $this->parsedFlags[$key] === true
                ? '1'
                : $this->parsedFlags[$key];
        }

        return $default;
    }

    protected function optBool(array|string $flags, ?string $key = null, bool $default = false): bool
    {
        if (is_string($flags)) {
            $key   = $flags;
            $flags = $this->parsedFlags;
        }

        if ($key === null || ! array_key_exists($key, $flags)) {
            return $default;
        }

        $value = $flags[$key];

        if ($value === true) {
            return true;
        }

        return in_array(
            strtolower((string) $value),
            ['1', 'true', 'yes', 'on'],
            true
        );
    }

    protected function optInt(array|string $flags, ?string $key = null, int $default = 0): int
    {
        if (is_string($flags)) {
            $key   = $flags;
            $flags = $this->parsedFlags;
        }

        if ($key === null || ! array_key_exists($key, $flags)) {
            return $default;
        }

        return (int) $flags[$key];
    }

    protected function optString(array|string $flags, ?string $key = null, string $default = ''): string
    {
        if (is_string($flags)) {
            $key   = $flags;
            $flags = $this->parsedFlags;
        }

        if ($key === null || ! array_key_exists($key, $flags)) {
            return $default;
        }

        return trim((string) $flags[$key]);
    }

    /**
     * Backward-compatible Spark runner wrapper.
     */
    protected function runSparkCommand(string $command): int
    {
        return $this->sparkRun($command);
    }

    /**
     * Write a CI-safe diagnostic summary for report-only commands.
     *
     * @param mixed ...$payload
     */
    protected function ciSummary(...$payload): void
    {
        if (! getenv('CI')) {
            return;
        }

        $dir = defined('WRITEPATH')
            ? WRITEPATH . 'ci' . DIRECTORY_SEPARATOR
            : ROOTPATH . 'writable' . DIRECTORY_SEPARATOR . 'ci' . DIRECTORY_SEPARATOR;

        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $summary = [
            'timestamp' => date('c'),
            'command' => static::class,
            'payload' => $payload,
        ];

        @file_put_contents(
            $dir . str_replace('\\', '_', static::class) . '-summary.json',
            json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL
        );
    }

}
