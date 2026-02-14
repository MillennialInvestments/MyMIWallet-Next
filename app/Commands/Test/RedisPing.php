<?php

namespace App\Commands\Test;

use CodeIgniter\CLI\CLI;
use App\Commands\SafeBaseCommand;
use App\Services\Infrastructure\RedisService;

class RedisPing extends SafeBaseCommand
{
    protected $group       = 'Test';
    protected $name        = 'test:redis';
    protected $description = 'Test Redis connection';

    public function run(array $params)
    {
        try {
            $redis = new RedisService();
            $result = $redis->ping();

            CLI::write("Redis Response: " . $result, 'green');
        } catch (\Throwable $e) {
            CLI::error("Redis Error: " . $e->getMessage());
        }
    }
}
