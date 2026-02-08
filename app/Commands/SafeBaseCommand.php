<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;
use Psr\Log\LoggerInterface;
use App\Commands\Contracts\AiOpsRunnable;
use App\Commands\Contracts\DryRunCapable;
use App\Commands\Contracts\RequiresApproval;

abstract class SafeBaseCommand extends BaseCommand implements RequiresApproval, DryRunCapable, AiOpsRunnable
{
    protected $aiOpsRunnable = false;
    protected $defaultDryRun = false;

    /**
     * CI4-safe param parser.
     *
     * @return array{0: array<int, string>, 1: array<string, bool>}
     */
    protected function parseParams(array $params): array
    {
        $args  = [];
        $flags = [];

        foreach ($params as $param) {
            // Spark/Console delegation can introduce nulls or non-strings.
            if ($param === null) {
                continue;
            }

            if (is_bool($param)) {
                // treat as arg (rare)
                $args[] = $param ? '1' : '0';
                continue;
            }

            if (is_int($param) || is_float($param)) {
                $param = (string) $param;
            }

            if (!is_string($param)) {
                // ignore objects/arrays defensively
                continue;
            }

            $param = trim($param);
            if ($param === '') {
                continue;
            }

            if (str_starts_with($param, '--')) {
                // Support both: --flag and --key=value
                $key = ltrim($param, '-');
                if (strpos($key, '=') !== false) {
                    [$k] = explode('=', $key, 2);
                    $flags[$k] = true;
                } else {
                    $flags[$key] = true;
                }
            } else {
                $args[] = $param;
            }
        }

        if ($this->defaultDryRun && !isset($flags['approve']) && !isset($flags['dry-run'])) {
            $flags['dry-run'] = true;
        }

        $dryRun = $this->resolveDryRun($flags);

        // These should never throw just because params had nulls.
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
        if (! isset($this->options) || ! is_array($this->options)) {
            return false;
        }

        return array_key_exists('--dry-run', $this->options);
    }

    public function requiresApproval(): bool
    {
        return method_exists($this, 'isDestructive') && $this->isDestructive();
    }

    public function isAiOpsRunnable(): bool
    {
        return $this->aiOpsRunnable;
    }

    /**
     * Guard destructive commands.
     *
     * @return int|null EXIT_ERROR when blocked, null when allowed
     */
    protected function guardDestructive(array $flags, bool $dryRun): void
    {
        if (! $this->requiresApproval()) {
            return;
        }

        if ($dryRun) {
            return;
        }

        if (isset($flags['approve'])) {
            return;
        }

        CLI::error('This action is destructive. Re-run with --approve.');
        return;

    }

    protected function logIntent(array $params, array $flags, bool $dryRun): void
    {
        log_message('info', sprintf('[spark:%s] Intent', $this->name ?? 'unknown'), [
            'command' => $this->name ?? null,
            'group' => $this->group ?? null,
            'params' => $params,
            'flags' => $flags,
            'dry_run' => $dryRun,
            'requires_approval' => $this->requiresApproval(),
            'supports_dry_run' => $this->supportsDryRun(),
            'ai_ops_runnable' => $this->isAiOpsRunnable(),
        ]);
    }

    /**
     * Override in child commands if destructive.
     */
    protected function isDestructive(): bool
    {
        return false;
    }

    protected function option(string $key, $default = false)
    {
        if ($this->request === null) {
            return $default;
        }

        $options = $this->request->getOptions();
        return $options[$key] ?? $default;
    }

    protected function runSparkCommand(string $command): int
    {
        if (function_exists('service')) {
            $runner = service('commands');
            if (is_object($runner) && method_exists($runner, 'run')) {
                return (int) $runner->run($command, []);
            }
        }

        if (function_exists('command')) {
            return (int) command($command);
        }

        CLI::error('Spark command runner unavailable for: ' . $command);
        return EXIT_ERROR;
    }

}
