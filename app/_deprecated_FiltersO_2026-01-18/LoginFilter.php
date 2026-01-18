<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Myth\Auth\Authentication\LocalAuthenticator;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('authentication');

        // Check if user is not logged in
        if (!$auth->check()) {
            // Redirect to login page
            session()->set('redirect_url', current_url()); // Optional: to redirect back to the intended page after login
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Usually empty, but you can modify the response if needed
    }
}
