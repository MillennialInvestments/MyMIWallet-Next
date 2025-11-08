<?php
namespace App\Filters;

use App\Models\UserSessionModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionRevokedFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $sid = $request->getCookie('session_id');
        if (! $sid) {
            return;
        }

        try {
            if ((new UserSessionModel())->isRevoked($sid)) {
                return service('response')->setStatusCode(401)->setBody('Session revoked');
            }
        } catch (\Throwable $e) {
            log_message('error', 'SessionRevokedFilter failed: {msg}', ['msg' => $e->getMessage()]);
            return;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

