<?php
namespace App\Modules\Status\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Observability\Metrics;
use App\Libraries\Flags;

class MetricsController extends BaseController
{
    public function export()
    {
        if (!Flags::enabled('ops.metrics')) {
            return $this->response->setStatusCode(404)->setBody('not found');
        }
        $user = $_SERVER['PHP_AUTH_USER'] ?? null;
        $pass = $_SERVER['PHP_AUTH_PW'] ?? null;
        if ($user !== (getenv('METRICS_USER') ?: 'metrics') || $pass !== (getenv('METRICS_PASS') ?: '')) {
            header('WWW-Authenticate: Basic realm="metrics"');
            return $this->response->setStatusCode(401)->setBody('auth required');
        }
        return $this->response->setHeader('Content-Type', 'text/plain; version=0.0.4')
            ->setBody(Metrics::export());
    }
}
