<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use Throwable;

class ErrorIngestService
{
    public function capture(array $data): bool
    {
        try {
            $db = db_connect();

            if (! $db->tableExists('system_errors')) {
                log_message('debug', 'AIOps error ingest skipped: system_errors table is missing.');

                return false;
            }

            $message = (string) ($data['message'] ?? '');
            $classification = (new ErrorClassifier())->classify($message);
            $route = (string) ($data['route'] ?? current_url());

            $inserted = $db->table('system_errors')->insert([
                'level' => $data['level'] ?? 'error',
                'message' => $message,
                'file' => $data['file'] ?? null,
                'line' => $data['line'] ?? null,
                'route' => $route,
                'classification' => $classification,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if (! $inserted) {
                return false;
            }

            if (! $db->tableExists('error_heatmap')) {
                log_message('debug', 'AIOps error heatmap skipped: error_heatmap table is missing.');

                return true;
            }

            $exists = $db->table('error_heatmap')->where('route', $route)->countAllResults() > 0;

            if (! $exists) {
                $db->table('error_heatmap')->insert([
                    'route' => $route,
                    'error_count' => 0,
                    'last_error' => null,
                ]);
            }

            $db->table('error_heatmap')
                ->set('error_count', 'error_count+1', false)
                ->set('last_error', date('Y-m-d H:i:s'))
                ->where('route', $route)
                ->update();

            return true;
        } catch (Throwable $e) {
            log_message('debug', 'AIOps error ingest skipped: ' . $e->getMessage());

            return false;
        }
    }
}
