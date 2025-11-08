<?php
namespace App\Filters;

use App\Libraries\Abuse\RateLimiter;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RateLimitFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $args = $arguments ?? [];
        $scope = $args[0] ?? 'default';
        $kv = ['limit' => 10, 'per' => 60, 'key' => 'ip', 'block' => 0];
        foreach ($args as $a) {
            if (str_contains($a, '=')) {
                [$k, $v] = explode('=', $a, 2);
                $kv[$k] = $v;
            }
        }

        $ip = $request->getIPAddress();
        $uid = (int) (session('cuID') ?? 0);
        $key = $kv['key'] === 'user' && $uid > 0 ? ('u:' . $uid) : ('ip:' . $ip);

        $limiter = new RateLimiter(db_connect());
        $res = $limiter->attempt($scope, $key, (int) $kv['limit'], (int) $kv['per'], (int) $kv['block']);
        if ($res['allowed']) {
            return;
        }

        $response = service('response')->setStatusCode(429)
            ->setHeader('Retry-After', (string) max(1, $res['reset_at'] - time()))
            ->setJSON(['status' => 'error', 'message' => 'Too many requests', 'csrf' => csrf_hash()]);
        return $response;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
