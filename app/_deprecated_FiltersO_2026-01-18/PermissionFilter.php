<?php
namespace App\Filters;

use App\Libraries\Auth\Gate;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $args = $arguments ?? [];
        if (empty($args)) {
            return;
        }

        $requireAll = false;
        if (isset($args[0]) && str_starts_with($args[0], 'all:')) {
            $requireAll = true;
            $caps = explode(',', substr($args[0], 4));
        } else {
            $caps = explode(',', $args[0]);
        }

        $ok = $requireAll ? self::allowsAll($caps) : self::allowsAny($caps);

        if ($ok) {
            return;
        }

        if (str_contains((string) $request->getHeaderLine('Accept'), 'application/json') || $request->isAJAX()) {
            return service('response')->setStatusCode(403)
                ->setJSON(['status' => 'error', 'message' => 'Forbidden', 'csrf' => csrf_hash()]);
        }

        return redirect()->back()->with('error', 'Forbidden');
    }

    private static function allowsAny(array $caps): bool
    {
        foreach ($caps as $cap) {
            if (Gate::allows(trim($cap))) {
                return true;
            }
        }
        return false;
    }

    private static function allowsAll(array $caps): bool
    {
        foreach ($caps as $cap) {
            if (! Gate::allows(trim($cap))) {
                return false;
            }
        }
        return true;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
