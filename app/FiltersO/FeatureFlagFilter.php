<?php
namespace App\Filters;

use App\Libraries\Flags;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

// PATCH: route filter to gate features by flag
class FeatureFlagFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $args = $arguments ?? [];
        if (empty($args)) return;

        $flag = $args[0];
        $mode = '503';
        foreach ($args as $a) {
            if (str_starts_with($a, 'mode=')) $mode = substr($a,5);
        }

        if (Flags::enabled($flag)) return;

        if ($request->isAJAX() || str_contains((string)$request->getHeaderLine('Accept'), 'application/json')) {
            $code = $mode === '404' ? 404 : ($mode === '403' ? 403 : 503);
            return service('response')->setStatusCode($code)
                ->setJSON(['status'=>'error','message'=>'Temporarily unavailable','csrf'=>csrf_hash()]);
        }

        if ($mode === '404') return redirect()->to('/')->with('error','Not available');
        return redirect()->to('/status')->with('error','Service temporarily unavailable');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
