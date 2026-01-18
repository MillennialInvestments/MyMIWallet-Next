<?php namespace App\Filters;

use App\Config\ApiKeys;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class CronKeyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $cfg = config(ApiKeys::class);
        $headerName = $cfg->cronHeader;
        $got = $request->getHeaderLine($headerName);
        $want = $cfg->alertsCronKey;

        if ($want === '' || $got === '' || !hash_equals($want, $got)) {
            log_message('warning', '\ud83d\udeab CronKeyFilter blocked request: missing/invalid token (hdr={hdr}).', ['hdr' => $headerName]);
            return Services::response()
                ->setStatusCode(403, 'Forbidden')
                ->setJSON(['status' => 'error', 'message' => 'Forbidden']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
