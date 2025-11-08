<?php
namespace App\Filters;

use App\Libraries\Security\CaptchaService;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CaptchaFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (strtoupper($request->getMethod()) !== 'POST') {
            return;
        }
        $token = $request->getPost('h-captcha-response') ?? $request->getPost('hcaptcha_token');
        $ok = CaptchaService::verify($token, $request->getIPAddress());
        if ($ok) {
            return;
        }
        return service('response')->setStatusCode(400)
            ->setJSON(['status' => 'error', 'message' => 'Captcha required', 'csrf' => csrf_hash()]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
