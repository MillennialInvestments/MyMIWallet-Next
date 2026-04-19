<?php

declare(strict_types=1);

if (! function_exists('redirect_url_tracking_keys')) {
    /**
     * @return list<string>
     */
    function redirect_url_tracking_keys(): array
    {
        return [
            '_gl',
            '_ga',
            'gclid',
            'fbclid',
            'msclkid',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
            'redirect_url',
            'next',
        ];
    }
}

if (! function_exists('redirect_url_sanitize')) {
    function redirect_url_sanitize(?string $url): ?string
    {
        $url = is_string($url) ? trim($url) : '';
        if ($url === '' || $url === '*' || $url === '/*') {
            return null;
        }

        $parts = parse_url($url);
        if ($parts === false) {
            return null;
        }

        $path = (string) ($parts['path'] ?? '');
        if ($path === '') {
            return null;
        }

        $host = strtolower((string) ($parts['host'] ?? ''));
        $scheme = strtolower((string) ($parts['scheme'] ?? ''));

        if ($host !== '') {
            $baseHost = strtolower((string) parse_url(base_url('/'), PHP_URL_HOST));
            if ($baseHost === '' || $host !== $baseHost) {
                return null;
            }
        }

        if ($scheme !== '' && ! in_array($scheme, ['http', 'https'], true)) {
            return null;
        }

        if (! str_starts_with($path, '/')) {
            $path = '/' . ltrim($path, '/');
        }

        if (str_starts_with($path, '/index.php/')) {
            $path = '/' . ltrim(substr($path, strlen('/index.php/')), '/');
        } elseif ($path === '/index.php') {
            $path = '/';
        }

        $query = [];
        if (! empty($parts['query'])) {
            parse_str((string) $parts['query'], $query);
        }

        foreach (array_keys($query) as $key) {
            $key = (string) $key;
            if (in_array($key, redirect_url_tracking_keys(), true) || str_starts_with($key, '_ga_')) {
                unset($query[$key]);
            }
        }

        $clean = $path;
        if ($query !== []) {
            $clean .= '?' . http_build_query($query);
        }

        $normalizedPath = strtolower(trim($path, '/'));
        if (
            $normalizedPath === ''
            || $normalizedPath === 'login'
            || $normalizedPath === 'logout'
            || $normalizedPath === 'register/success'
            || $normalizedPath === 'index.php/login'
            || $normalizedPath === 'index.php/logout'
            || $normalizedPath === 'index.php/register/success'
        ) {
            return null;
        }

        return $clean;
    }
}

if (! function_exists('redirect_url_request_id')) {
    function redirect_url_request_id(): string
    {
        try {
            $request = service('request');
            if ($request && method_exists($request, 'getHeaderLine')) {
                $header = (string) $request->getHeaderLine('X-Request-Id');
                if ($header !== '') {
                    return $header;
                }
            }
        } catch (\Throwable) {
        }

        return bin2hex(random_bytes(6));
    }
}

if (! function_exists('redirect_url_store')) {
    function redirect_url_store(?string $rawUrl, array $context = []): ?string
    {
        $session = session();
        $sanitized = redirect_url_sanitize($rawUrl);
        $request = service('request');
        $route = trim((string) ($context['route'] ?? ($request ? $request->getUri()->getPath() : '')), '/');
        $requestId = (string) ($context['request_id'] ?? redirect_url_request_id());

        $accepted = false;
        if (! $session->has('redirect_url') && $sanitized !== null && $sanitized !== '') {
            $session->set('redirect_url', $sanitized);
            $accepted = true;
        }

        log_message('debug', '[REDIRECT_URL_WRITER]', [
            'writer' => (string) ($context['writer'] ?? 'unknown'),
            'request_id' => $requestId,
            'route' => $route,
            'source_url' => is_scalar($rawUrl) ? (string) $rawUrl : null,
            'sanitized_url' => $sanitized,
            'accepted' => $accepted,
            'existing_session_value' => $session->get('redirect_url'),
        ]);

        return $sanitized;
    }
}
