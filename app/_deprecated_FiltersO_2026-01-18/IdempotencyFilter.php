<?php
namespace App\Filters;

use App\Models\IdempotencyModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IdempotencyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! in_array(strtoupper($request->getMethod()), ['POST','PUT','PATCH','DELETE'], true)) return;

        $key = $request->getHeaderLine('Idempotency-Key');
        if ($key === '') return;

        $hash = hash('sha256', strtoupper($request->getMethod()).'|'.$request->getPath().'|'.$request->getBody());
        $m = new IdempotencyModel();
        $row = $m->findByKey($key);

        if (! $row) {
            $m->insert([
                'key' => $key,
                'request_hash' => $hash,
                'state' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'expires_at' => date('Y-m-d H:i:s', time() + 3600),
            ]);
            return;
        }

        if ($row['request_hash'] !== $hash) {
            return service('response')->setStatusCode(409)->setJSON([
                'status' => 'error',
                'message' => 'Idempotency key reuse with different payload',
                'csrf' => csrf_hash(),
            ]);
        }

        if ($row['state'] === 'done') {
            $resp = service('response')->setStatusCode((int)($row['status_code'] ?? 200));
            $json = json_decode($row['response_json'] ?? '{}', true) ?: [];
            if (is_array($json)) {
                $json['csrf'] = csrf_hash();
            }
            return $resp->setJSON($json);
        }

        return service('response')->setStatusCode(409)->setJSON([
            'status' => 'error',
            'message' => 'Request already in progress',
            'csrf' => csrf_hash(),
        ]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (! in_array(strtoupper($request->getMethod()), ['POST','PUT','PATCH','DELETE'], true)) return;
        $key = $request->getHeaderLine('Idempotency-Key');
        if ($key === '') return;

        $m = new IdempotencyModel();
        $row = $m->findByKey($key);
        if (! $row) return;

        if (stripos((string)$response->getHeaderLine('Content-Type'), 'application/json') !== false) {
            $m->update($row['id'], [
                'status_code' => $response->getStatusCode(),
                'response_json' => $response->getBody(),
                'state' => 'done',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            $m->update($row['id'], [
                'status_code' => $response->getStatusCode(),
                'state' => 'done',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}

