<?php

declare(strict_types=1);

namespace App\Filters;

use App\Models\ApiTokenModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ApiTokenAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = trim($request->getHeaderLine('Authorization'));
        $token = '';

        if ($authHeader !== '' && stripos($authHeader, 'Bearer ') === 0) {
            $token = trim(substr($authHeader, 7));
        }

        if ($token === '') {
            $token = trim((string) ($request->getHeaderLine('X-API-Token') ?: ''));
        }

        if ($token === '') {
            return service('response')->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Missing API token.',
                'data' => [],
            ]);
        }

        $mobileTokens = service('mobileAuthTokens');
        $mobileMatch = $mobileTokens->verifyPlainToken($token);
        if (is_array($mobileMatch)) {
            $mobileTokens->touch((int) $mobileMatch['id']);
            service('mobileAuthContext')->setUserId((int) $mobileMatch['user_id']);
            return null;
        }

        $prefix = substr($token, 0, 12);
        $apiToken = (new ApiTokenModel())->findActiveByPrefix($prefix);

        if (is_array($apiToken) && hash_equals((string) $apiToken['token_hash'], hash('sha256', $token))) {
            return null;
        }

        return service('response')->setStatusCode(401)->setJSON([
            'status' => 'error',
            'message' => 'Invalid API token.',
            'data' => [],
        ]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        service('mobileAuthContext')->clear();
    }
}
