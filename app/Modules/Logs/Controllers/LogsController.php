<?php

declare(strict_types=1);

namespace App\Modules\Logs\Controllers;

use App\Controllers\Api\InternalApiController;
use App\Services\Ops\SparkRunnerService;

class LogsController extends InternalApiController
{
    public function summary()
    {
        $runner = new SparkRunnerService();
        $result = $runner->run('logs:summarize', [], ['json' => 1]);

        $summary = [
            'total' => null,
            'new' => null,
            'severity' => [],
            'raw' => $result['output'],
        ];

        $decoded = json_decode($result['output'], true);
        if (is_array($decoded)) {
            $summary = array_merge($summary, $decoded);
        } elseif ($result['output'] === '') {
            $summary = $this->fromSummaryFiles();
        }

        return $this->jsonOk($summary, ['endpoint' => 'logs.summary']);
    }

    private function fromSummaryFiles(): array
    {
        $date = date('Y-m-d');
        $candidates = [
            ROOTPATH . 'docs/_aiops/error-input/summary-' . $date . '.log',
            ROOTPATH . 'writable/logs/summary-' . $date . '.log',
        ];

        foreach ($candidates as $file) {
            if (! is_file($file)) {
                continue;
            }

            $content = (string) file_get_contents($file);
            preg_match('/total\D+(\d+)/i', $content, $total);
            preg_match('/new\D+(\d+)/i', $content, $new);

            return [
                'total' => isset($total[1]) ? (int) $total[1] : null,
                'new' => isset($new[1]) ? (int) $new[1] : null,
                'severity' => [],
                'raw' => $content,
            ];
        }

        return [
            'total' => 0,
            'new' => 0,
            'severity' => [],
            'raw' => '',
        ];
    }
}
