<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Converts non-JSON error responses to the standardized JSON contract
 * when the client expects JSON.
 */
class JsonExceptionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // no-op
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $isError = $response->getStatusCode() >= 400;
        $wantsJson = $request->isAJAX() || str_contains((string) $request->getHeaderLine('Accept'), 'application/json');

        if ($isError && $wantsJson && stripos((string) $response->getHeaderLine('Content-Type'), 'application/json') === false) {
            $rid = $request->rid ?? '';
            $payload = [
                'status' => 'error',
                'message' => $response->getReasonPhrase(),
                'csrf' => csrf_hash(),
                'request_id' => $rid,
            ];
            $response->setHeader('Content-Type', 'application/json');
            $response->setJSON($payload);
        }
    }
}
