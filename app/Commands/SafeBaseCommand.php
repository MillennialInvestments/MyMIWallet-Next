<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
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

    /**
     * CI4-safe parameter parser.
     *
     * @param array $params
     * @return array{0: array<int, string>, 1: array<string, mixed>}
     */
    protected function parseParams(array $params): array
    {
        $args  = [];
        $flags = [];

        foreach ($params as $param) {
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

        $this->parsedFlags = $flags;

        // Implicit dry-run enforcement
        if (
            $this->defaultDryRun
            && ! isset($flags['approve'])
            && ! isset($flags['dry-run'])
        ) {
            $flags['dry-run'] = true;
        }

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
        if ($this->request !== null) {
            $options = $this->request->getOptions();
            if (array_key_exists($key, $options)) {
                return $options[$key];
            }
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
}

