<?php
// PATCH: record session activity
namespace App\Filters;

use App\Models\UserSessionModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionTrackerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();
        $userId  = (int) ($session->get('cuID') ?? 0);
        if ($userId > 0) {
            $model = new UserSessionModel();
            $model->touch(
                $userId,
                $session->getId(),
                $request->getIPAddress(),
                $request->getUserAgent()->getAgentString()
            );
        }
    }
}
