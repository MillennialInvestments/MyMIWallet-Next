<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Throwable;

class RateLimitFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $path = strtolower(trim($request->getUri()->getPath(), '/'));
        $authState = $this->resolveAuthState($request);

        if ($this->isNoisePath($path) && ! $authState['authenticated']) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setBody('Not Found');
        }

        if (! $authState['authenticated'] && $this->isBot($request)) {
            $cache = cache();
            $key = sanitizeCacheKey('ratelimit:bot:' . sha1($request->getIPAddress() . '|' . $request->getHeaderLine('User-Agent')));
            $attempts = (int) ($cache->get($key) ?? 0);
            $attempts++;
            $cache->save($key, $attempts, 60);

            if ($attempts > 60) {
                return Services::response()
                    ->setStatusCode(ResponseInterface::HTTP_TOO_MANY_REQUESTS)
                    ->setBody('Too Many Requests');
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }

    /**
     * Never throw from this filter: auth service failures must not white-screen requests.
     *
     * @return array{authenticated: bool, source: string}
     */
    private function resolveAuthState(RequestInterface $request): array
    {
        $session = function_exists('session') ? session() : null;

        try {
            if ($session && $session->has('user_id')) {
                if (ENVIRONMENT === 'development') {
                    log_message('debug', '[AUTH_RESOLUTION] RateLimitFilter authenticated via session', [
                        'uri' => (string) $request->getUri(),
                    ]);
                }

                return ['authenticated' => true, 'source' => 'session'];
            }

            $auth = service('authentication');
            if ($auth && method_exists($auth, 'check') && $auth->check()) {
                if (ENVIRONMENT === 'development') {
                    log_message('debug', '[AUTH_RESOLUTION] RateLimitFilter authenticated via service(authentication)', [
                        'uri' => (string) $request->getUri(),
                    ]);
                }

                return ['authenticated' => true, 'source' => 'myth_auth'];
            }

            return ['authenticated' => false, 'source' => 'guest'];
        } catch (Throwable $e) {
            $context = [
                'exception' => get_class($e),
                'message'   => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine(),
                'uri'       => (string) $request->getUri(),
                'method'    => $request->getMethod(),
            ];

            if (ENVIRONMENT === 'development') {
                $context['trace'] = $e->getTraceAsString();
            }

            log_message('critical', '[AUTH_RESOLUTION_FAILED] RateLimitFilter fell back to guest', $context);

            return ['authenticated' => false, 'source' => 'fallback_guest'];
        }
    }

    private function isBot(RequestInterface $request): bool
    {
        $ua = strtolower($request->getHeaderLine('User-Agent'));
        if ($ua === '') {
            return true;
        }

        return (bool) preg_match('/bot|crawler|spider|scrapy|curl|wget|python|httpclient|httpclient|feed|scanner/i', $ua);
    }

    private function isNoisePath(string $path): bool
    {
        return str_starts_with($path, 'wp-includes/')
            || str_starts_with($path, 'wp-admin/')
            || str_starts_with($path, 'wp-content/')
            || $path === 'wp-login.php'
            || $path === 'xmlrpc.php';
    }
}
