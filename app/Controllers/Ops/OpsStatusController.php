<?php

declare(strict_types=1);

namespace App\Controllers\Ops;

use App\Services\Ops\OpsStatusService;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

/** GET /API/Ops/watch-status: read-only snapshot for the TBI AIOps watch (token: MYMI_OPS_STATUS_TOKEN). */
class OpsStatusController extends Controller
{
    public function index(): ResponseInterface
    {
        try {
            $data = (new OpsStatusService())->snapshot();
            $data['ok'] = true;
        } catch (Throwable $e) {
            log_message('error', '[ops.status] snapshot failed: {class}', ['class' => get_class($e)]);
            $data = ['ok' => false, 'error' => 'snapshot_failed'];
        }

        return $this->response
            ->setHeader('Cache-Control', 'no-store')
            ->setJSON($data);
    }
}
