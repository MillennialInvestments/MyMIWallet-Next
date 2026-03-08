<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class BotBlocker implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $agent = strtolower((string) $request->getUserAgent());

        if ($agent !== '' && str_contains($agent, 'bot')) {
            return Services::response()->setStatusCode(403, 'Bot traffic blocked');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
