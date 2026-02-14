<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CronKeyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $provided = $request->getHeaderLine('X-Cron-Key') ?: $request->getGet('cronKey');
        $expected = getenv('CRON_SECRET') ?: (defined('CRON_SECRET') ? CRON_SECRET : null);

        if (! $expected || $provided !== $expected) {
            return service('response')->setStatusCode(403)->setJSON([
                'status'  => 'error',
                'message' => 'Forbidden: invalid cron key',
            ]);
        }
        return null; // allow
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
