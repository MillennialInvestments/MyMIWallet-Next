<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Exceptions\PermissionException;

class PermissionFilter extends BaseFilter implements FilterInterface
{
    /**
     * @param array|null $arguments
     *
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ensure authentication service exists and user is logged in
        if (! isset($this->authenticate) || ! $this->authenticate->check()) {
            session()->set('redirect_url', current_url());
            return redirect($this->reservedRoutes['login']);
        }

        if (empty($arguments)) {
            return;
        }

        // 🔒 Harden: ensure authorization service exists
        if (! isset($this->authorize)) {
            throw new \RuntimeException('Authorization service not initialized.');
        }

        $userId = $this->authenticate->id();

        // Fail fast instead of cumulative boolean tracking
        foreach ($arguments as $permission) {
            if (! $this->authorize->hasPermission($permission, $userId)) {

                if ($this->authenticate->silent()) {
                    $redirectURL = session('redirect_url') ?? route_to($this->landingRoute);
                    unset($_SESSION['redirect_url']);

                    return redirect()
                        ->to($redirectURL)
                        ->with('error', lang('Auth.notEnoughPrivilege'));
                }

                throw new PermissionException(lang('Auth.notEnoughPrivilege'));
            }
        }
    }


    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param array|null $arguments
     *
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
