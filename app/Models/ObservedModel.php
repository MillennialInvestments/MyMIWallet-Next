<?php

namespace App\Models;

use CodeIgniter\Model;

class ObservedModel extends Model
{
    public function insert($data = null, bool $returnID = true)
    {
        log_message('debug', '[MODEL_INSERT] ' . static::class . ' DATA=' . json_encode($data));

        return parent::insert($data, $returnID);
    }

    public function update($id = null, $data = null): bool
    {
        log_message('debug', '[MODEL_UPDATE] ' . static::class . ' ID=' . json_encode($id) . ' DATA=' . json_encode($data));

        return parent::update($id, $data);
    }

    public function delete($id = null, bool $purge = false)
    {
        log_message('debug', '[MODEL_DELETE] ' . static::class . ' ID=' . json_encode($id) . ' PURGE=' . ($purge ? '1' : '0'));

        return parent::delete($id, $purge);
    }

    public function where($key, $value = null, ?bool $escape = null)
    {
        log_message('debug', '[MODEL_WHERE] ' . static::class . ' KEY=' . json_encode($key));

        return parent::where($key, $value, $escape);
    }

    public function first()
    {
        log_message('debug', '[MODEL_FIRST] ' . static::class);

        return parent::first();
    }

    protected function withTransactionTrace(callable $callback)
    {
        $db = $this->db;
        $started = microtime(true);
        $memoryStart = memory_get_usage(true);
        log_message('debug', '[DB_TXN][START] ' . static::class);

        $db->transStart();
        try {
            $result = $callback();
            $db->transComplete();

            $durationMs = (microtime(true) - $started) * 1000;
            $memoryDelta = memory_get_usage(true) - $memoryStart;
            log_message('debug', '[DB_TXN][END] ' . static::class . ' status=' . ($db->transStatus() ? 'ok' : 'fail') . ' duration_ms=' . number_format($durationMs, 2) . ' memory_delta=' . $memoryDelta);

            return $result;
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', '[DB_TXN][EXCEPTION] ' . static::class . ' ' . $e->getMessage());
            throw $e;
        }
    }
}
