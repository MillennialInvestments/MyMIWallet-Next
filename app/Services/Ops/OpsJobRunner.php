<?php

declare(strict_types=1);

namespace App\Services\Ops;

use App\Libraries\Ops\OpsJobRegistry;
use Closure;
use Throwable;

/**
 * Runs one allowlisted MyMI ops job in-process (for the mymi-ops-* timers)
 * and writes writable/ops/last-run/<job>.json, which the read-only
 * /API/Ops/watch-status snapshot reports.
 *
 * Only the jobs below can run. ops.db.maintenance deletes old queue/run rows
 * and optimizes two ops tables, so it also needs $allowDbMaintenance (the
 * timer passes --allow-db-maintenance; the installer adds that timer only
 * when the owner asks for it).
 */
class OpsJobRunner
{
    public const JOBS = [
        'ops.health.check',
        'ops.logs.triage_daily',
        'ops.routes.smoke_test',
        'ops.security.headers_scan',
        'ops.db.maintenance',
    ];

    /** The old default also probed aiops.mymiwallet.com, the retired DreamHost n8n. */
    public const HEALTH_HOSTS = [
        'mymiwallet.com'      => 'https://www.mymiwallet.com',
        'chat.mymiwallet.com' => 'https://chat.mymiwallet.com',
    ];

    private string $writePath;
    /** @var Closure(string,array):array */
    private Closure $dispatch;

    /** @param Closure(string,array):array|null $dispatch */
    public function __construct(?string $writePath = null, ?Closure $dispatch = null)
    {
        $this->writePath = rtrim($writePath ?? WRITEPATH, '/\\') . '/';
        $this->dispatch  = $dispatch ?? static fn (string $key, array $payload): array => (new OpsJobRegistry())->dispatch($key, $payload);
    }

    /**
     * @return array{status:string, job:string, finished_at:string, summary:string, rc:int}
     */
    public function run(string $job, bool $allowDbMaintenance = false): array
    {
        if (! in_array($job, self::JOBS, true)) {
            return $this->result($job, 'refused', 'job is not on the timer allowlist', 2, false);
        }
        if ($job === 'ops.db.maintenance' && ! $allowDbMaintenance) {
            return $this->result($job, 'refused', 'ops.db.maintenance needs --allow-db-maintenance', 2, false);
        }

        $payload = $job === 'ops.health.check' ? ['hosts' => self::HEALTH_HOSTS] : [];
        try {
            $out = ($this->dispatch)($job, $payload);
        } catch (Throwable $e) {
            return $this->result($job, 'error', 'failed: ' . get_class($e), 1);
        }

        $raw = strtolower((string) ($out['status'] ?? 'ok'));
        $status = in_array($raw, ['error', 'failed', 'fail'], true)
            ? 'error'
            : (in_array($raw, ['degraded', 'attention', 'warn', 'warning'], true) ? 'degraded' : 'ok');

        return $this->result($job, $status, $this->summarize($out), $status === 'error' ? 1 : 0);
    }

    private function summarize(array $out): string
    {
        $keys = [];
        foreach ($out as $k => $v) {
            if (is_scalar($v) && in_array($k, ['status', 'message', 'total', 'count'], true)) {
                $keys[] = $k . '=' . (is_bool($v) ? ($v ? 'true' : 'false') : (string) $v);
            }
        }

        return (new OpsStatusService($this->writePath, null, static fn (): bool => true))->clean(implode(' ', $keys));
    }

    private function result(string $job, string $status, string $summary, int $rc, bool $record = true): array
    {
        $row = [
            'job'         => $job,
            'status'      => $status,
            'finished_at' => gmdate('Y-m-d\TH:i:s\Z'),
            'summary'     => $summary,
            'rc'          => $rc,
        ];
        if ($record) {
            $this->record($row);
        }

        return $row;
    }

    private function record(array $row): void
    {
        $dir = $this->writePath . 'ops/last-run';
        if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
            return;
        }
        $tmp = $dir . '/.' . $row['job'] . '.' . getmypid() . '.tmp';
        if (@file_put_contents($tmp, json_encode($row, JSON_UNESCAPED_SLASHES) . "\n") !== false) {
            @rename($tmp, $dir . '/' . $row['job'] . '.json');
        }
    }
}
