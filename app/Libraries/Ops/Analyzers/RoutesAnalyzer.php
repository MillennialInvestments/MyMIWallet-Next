<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Libraries\Ops\Issue;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class RoutesAnalyzer
{
    /**
     * @var array<int, array<string, mixed>>
     */
    private array $publicRoutes = [
        [
            'method' => 'GET',
            'path' => '/',
            'label' => 'Home',
            'allowRedirect' => true,
            'allowedStatus' => [200, 301, 302],
        ],
        [
            'method' => 'GET',
            'path' => 'login',
            'label' => 'Login form',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'logout',
            'label' => 'Logout redirect',
            'allowRedirect' => true,
            'allowedStatus' => [302],
        ],
        [
            'method' => 'GET',
            'path' => 'register',
            'label' => 'Register form',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'register/success',
            'label' => 'Register success',
            'allowedStatus' => [200, 302],
            'allowRedirect' => true,
        ],
        [
            'method' => 'GET',
            'path' => 'activate',
            'label' => 'Account activation',
            'allowedStatus' => [200, 302],
            'allowRedirect' => true,
        ],
        [
            'method' => 'GET',
            'path' => 'activate-account',
            'label' => 'Activation alias',
            'allowedStatus' => [200, 302],
            'allowRedirect' => true,
        ],
        [
            'method' => 'GET',
            'path' => 'forgot-password',
            'label' => 'Forgot password',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'reset-password',
            'label' => 'Reset password',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'blog',
            'label' => 'Blog index',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'Blog',
            'label' => 'Blog landing',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'Blog/News-And-Updates',
            'label' => 'News and updates',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'News',
            'label' => 'News redirect',
            'allowedStatus' => [301, 302],
            'allowRedirect' => true,
        ],
        [
            'method' => 'GET',
            'path' => 'pricing',
            'label' => 'Pricing page',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'Support',
            'label' => 'Support index',
            'allowedStatus' => [200],
        ],
        [
            'method' => 'GET',
            'path' => 'health',
            'label' => 'Health JSON',
            'allowedStatus' => [200, 503],
        ],
        [
            'method' => 'GET',
            'path' => 'healthz',
            'label' => 'Healthz',
            'allowedStatus' => [200, 503],
        ],
        [
            'method' => 'GET',
            'path' => 'status',
            'label' => 'Status',
            'allowedStatus' => [200, 503],
        ],
        [
            'method' => 'GET',
            'path' => 'api/health',
            'label' => 'API health',
            'allowedStatus' => [200, 503],
        ],
        [
            'method' => 'POST',
            'path' => 'API/Discord/webhook',
            'label' => 'Discord webhook',
            'allowedStatus' => [200, 202, 204, 400, 401, 403, 422, 429],
        ],
        [
            'method' => 'GET',
            'path' => 'API/Email/trackBounceWebhook',
            'label' => 'Email bounce webhook',
            'allowedStatus' => [200, 202, 204, 400, 401, 403, 422, 429],
        ],
    ];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $failures = [];
        $warnings = [];

        foreach ($this->publicRoutes as $route) {
            $response = $this->requestRoute($route['method'], $route['path']);
            $result = $this->evaluateResponse($route, $response);

            if ($result['status'] === 'fail') {
                $failures[] = [
                    'method' => $route['method'],
                    'path' => $route['path'],
                    'message' => $result['message'],
                ];
            } elseif ($result['status'] === 'warn') {
                $warnings[] = [
                    'method' => $route['method'],
                    'path' => $route['path'],
                    'message' => $result['message'],
                ];
            }
        }

        if ($failures === [] && $warnings === []) {
            return [];
        }

        return [
            Issue::build([
                'domain' => 'security',
                'severity' => $failures === [] ? 'P1' : 'P1',
                'title' => 'Public routes audit found auth regressions',
                'evidence' => [
                    'failures' => $failures,
                    'warnings' => $warnings,
                ],
                'suggested_fix' => [
                    'Verify auth filters on public routes.',
                    'Update routes to allow intended public access.',
                    'Re-run routes:auth-audit after fixes.',
                ],
                'ai_prompt' => 'Investigate public route auth regressions from routes:auth-audit.',
                'owner' => 'human',
                'status' => 'open',
            ]),
        ];
    }

    private function requestRoute(string $method, string $path): ResponseInterface
    {
        $method = strtoupper($method);
        $client = Services::curlrequest();
        $baseUrl = rtrim((string) config('App')->baseURL, '/');
        $path = ltrim($path, '/');
        $url = $baseUrl . '/' . $path;
        $options = [
            'headers' => ['Accept' => 'text/html'],
            'http_errors' => false,
        ];

        if ($method === 'POST') {
            return $client->post($url, $options);
        }

        return $client->get($url, $options);
    }

    /**
     * @param array<string, mixed> $route
     * @return array{status: string, message: string}
     */
    private function evaluateResponse(array $route, ResponseInterface $response): array
    {
        $status = $response->getStatusCode();
        $allowedStatus = $route['allowedStatus'] ?? [200];

        if (in_array($status, $allowedStatus, true)) {
            return ['status' => 'pass', 'message' => 'ok'];
        }

        if (in_array($status, [401, 403], true)) {
            return ['status' => 'fail', 'message' => 'unauthorized'];
        }

        if ($response->isRedirect()) {
            $location = (string) $response->getHeaderLine('Location');
            $allowRedirect = (bool) ($route['allowRedirect'] ?? false);

            if (! $allowRedirect && stripos($location, '/login') !== false) {
                return ['status' => 'fail', 'message' => 'redirected to /login'];
            }

            return ['status' => 'warn', 'message' => sprintf('redirected (%s)', $location ?: 'unknown')];
        }

        if ($status === 404) {
            return ['status' => 'fail', 'message' => 'not found'];
        }

        return ['status' => 'warn', 'message' => sprintf('unexpected status %d', $status)];
    }
}
