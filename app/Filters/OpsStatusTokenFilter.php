<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Guards the read-only ops status endpoint. It accepts only GET and only the
 * token in MYMI_OPS_STATUS_TOKEN (at least 32 characters), sent as
 * "Authorization: Bearer <token>" or "X-Ops-Status-Token". This token opens
 * nothing else: the internal-token and API-token routes do not accept it.
 */
class OpsStatusTokenFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (strtoupper($request->getMethod()) !== 'GET') {
            return $this->deny(405, 'method_not_allowed');
        }

        $expected = trim((string) env('MYMI_OPS_STATUS_TOKEN'));
        if (strlen($expected) < 32) {
            return $this->deny(503, 'not_configured');
        }

        $provided = '';
        $auth = trim($request->getHeaderLine('Authorization'));
        if (stripos($auth, 'Bearer ') === 0) {
            $provided = trim(substr($auth, 7));
        }
        if ($provided === '') {
            $provided = trim($request->getHeaderLine('X-Ops-Status-Token'));
        }

        if ($provided === '' || ! hash_equals($expected, $provided)) {
            return $this->deny(401, 'unauthorized');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    private function deny(int $code, string $reason): ResponseInterface
    {
        return service('response')
            ->setStatusCode($code)
            ->setHeader('Cache-Control', 'no-store')
            ->setJSON(['ok' => false, 'error' => $reason]);
    }
}
