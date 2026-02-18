<?php

namespace App\Commands\AIOps\Redis;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Stats extends SafeBaseCommand
{
    protected $group = 'AIOps - Redis';
    protected $name = 'aiops:redis:stats';
    protected $description = 'Fetch Redis INFO stats (best-effort)';

    public function run(array $params)
    {
        if (!class_exists(\Predis\Client::class)) {
            CLI::error('Predis not installed/configured.');
            exit(1);
        }

        try {
            $client = new \Predis\Client(); // uses default env if available
            $info = $client->info();

            $keyspace = $info['Keyspace'] ?? [];
            $stats = $info['Stats'] ?? [];

            $hit = $stats['keyspace_hits'] ?? null;
            $miss = $stats['keyspace_misses'] ?? null;

            $out = WRITEPATH . 'audit/redis_stats.json';
            @mkdir(dirname($out), 0775, true);

            file_put_contents($out, json_encode([
                'generated_at' => date('c'),
                'keyspace_hits' => $hit,
                'keyspace_misses' => $miss,
                'keyspace' => $keyspace,
            ], JSON_PRETTY_PRINT));

            CLI::write("Wrote: {$out}");
        } catch (\Throwable $e) {
            CLI::error('Redis error: ' . $e->getMessage());
            exit(1);
        }
    }
}
