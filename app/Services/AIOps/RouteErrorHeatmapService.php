<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use App\Models\RouteErrorHeatmapModel;

class RouteErrorHeatmapService
{
    private RouteErrorHeatmapModel $model;

    public function __construct(?RouteErrorHeatmapModel $model = null)
    {
        $this->model = $model ?? model(RouteErrorHeatmapModel::class);
    }

    public function record(string $route, string $errorType, ?int $statusCode = null): void
    {
        $route = '/' . ltrim(trim($route), '/');
        if ($route === '/') {
            $route = '/';
        }

        $existing = $this->model->where('route', $route)
            ->where('error_type', $errorType)
            ->where('status_code', $statusCode)
            ->first();

        $now = date('Y-m-d H:i:s');

        if ($existing) {
            $this->model->update((int) $existing['id'], [
                'hit_count' => ((int) ($existing['hit_count'] ?? 0)) + 1,
                'last_seen' => $now,
            ]);

            return;
        }

        $this->model->insert([
            'route' => $route,
            'error_type' => $errorType,
            'status_code' => $statusCode,
            'hit_count' => 1,
            'last_seen' => $now,
        ]);
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public function topRoutes(int $limit = 25): array
    {
        return $this->model
            ->orderBy('hit_count', 'DESC')
            ->orderBy('last_seen', 'DESC')
            ->findAll($limit);
    }
}
