<?php

declare(strict_types=1);

namespace App\Modules\AIOps\Controllers;

use App\Controllers\Api\InternalApiController;
use App\Services\Ops\SparkRunnerService;

class AIOpsController extends InternalApiController
{
    public function snapshot()
    {
        $runner = new SparkRunnerService();
        $audit = $runner->run('aiops:audit', [], ['json' => 1]);
        if ($audit['output'] === '') {
            $audit = $runner->run('aiops:audit');
        }

        $status = $runner->run('aiops:status', [], ['json' => 1]);
        if ($status['output'] === '') {
            $status = $runner->run('aiops:status');
        }

        return $this->jsonOk(['audit' => $audit, 'status' => $status], ['endpoint' => 'aiops.snapshot']);
    }

    public function docsGaps()
    {
        $file = ROOTPATH . 'docs/_aiops/gaps/doc-coverage.csv';
        if (! is_file($file)) {
            return $this->jsonOk([], ['hint' => 'doc-coverage.csv not found']);
        }

        $rows = [];
        $handle = fopen($file, 'rb');
        if ($handle === false) {
            return $this->jsonError('read_failed', 'Unable to read gaps file.');
        }

        $headers = fgetcsv($handle) ?: [];
        while (($line = fgetcsv($handle)) !== false) {
            $rows[] = array_combine($headers, $line);
        }
        fclose($handle);

        return $this->jsonOk($rows, ['endpoint' => 'aiops.gaps.docs']);
    }

    public function watch()
    {
        $runner = new SparkRunnerService();
        $result = $runner->run('aiops:watch', [], ['cycles' => 1, 'json' => 1]);
        if ($result['output'] === '') {
            $result = $runner->run('aiops:watch', [], ['cycles' => 1]);
        }

        return $this->jsonOk($result, ['endpoint' => 'aiops.watch']);
    }
}
