<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class ErrorIngestService
{
    public function capture(array $data): bool
    {
        $db = db_connect();
        $message = (string) ($data['message'] ?? '');
        $classification = (new ErrorClassifier())->classify($message);

        $inserted = $db->table('system_errors')->insert([
            'level' => $data['level'] ?? 'error',
            'message' => $message,
            'file' => $data['file'] ?? null,
            'line' => $data['line'] ?? null,
            'route' => $data['route'] ?? current_url(),
            'classification' => $classification,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (! $inserted) {
            return false;
        }

        $route = (string) ($data['route'] ?? current_url());
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
    }
}
