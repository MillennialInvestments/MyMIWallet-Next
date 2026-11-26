<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Services\Payments\PayPalSmokeTestService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Controller providing interactive PayPal smoke testing, connectivity auditing,
 * and sandbox diagnostics for operators and beta testers.
 */
class PayPalSmokeTestAPIController extends BaseController
{
    use ResponseTrait;

    protected PayPalSmokeTestService $service;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ): void {
        parent::initController($request, $response, $logger);
        $this->service = new PayPalSmokeTestService();
    }

    /**
     * POST /API/Admin/PayPalSmokeTest/audit
     *
     * Audits environment variables, configuration switches, plan parameters,
     * and database tables.
     */
    public function audit(): ResponseInterface
    {
        if ($guard = $this->guardTesterAccess()) {
            return $guard;
        }

        $audit = $this->service->auditConfiguration();
        return $this->respond($audit);
    }

    /**
     * POST /API/Admin/PayPalSmokeTest/probe
     *
     * Performs a live HTTP handshake with PayPal's REST OAuth endpoint.
     */
    public function probe(): ResponseInterface
    {
        if ($guard = $this->guardTesterAccess()) {
            return $guard;
        }

        $result = $this->service->probeLiveConnectivity();
        $statusCode = ($result['ok'] ?? false) ? 200 : 422;

        return $this->respond($result, $statusCode);
    }

    /**
     * POST /API/Admin/PayPalSmokeTest/simulate
     *
     * Simulates a captured sandbox purchase and validates the fulfillment pipeline.
     */
    public function simulate(): ResponseInterface
    {
        if ($guard = $this->guardTesterAccess()) {
            return $guard;
        }

        $userId   = (int) (session('cuID') ?? session('user_id') ?? (function_exists('auth') && auth()->loggedIn() ? auth()->id() : 0));
        $planSlug = strtolower(trim((string) ($this->request->getPost('plan') ?? 'starter')));

        $result = $this->service->simulateSandboxPurchase($userId, $planSlug);
        $statusCode = ($result['ok'] ?? false) ? 200 : 422;

        return $this->respond($result, $statusCode);
    }

    /**
     * Guards diagnostic endpoints: allowed on staging, local dev, or for site admins/beta testers.
     */
    private function guardTesterAccess(): ?ResponseInterface
    {
        $userId = (int) (session('cuID') ?? session('user_id') ?? (function_exists('auth') && auth()->loggedIn() ? auth()->id() : 0));
        if ($userId <= 0) {
            return $this->failUnauthorized('Authentication required to run PayPal diagnostic tests.');
        }

        $host = (string) ($this->request->getUri()->getHost() ?? $_SERVER['HTTP_HOST'] ?? '');
        $isStaging = str_contains($host, 'staging') || str_contains($host, 'localhost') || str_contains($host, '127.0.0.1');
        $isDevEnv  = ENVIRONMENT !== 'production';

        $siteSettings = config('SiteSettings');
        $isBeta = ($siteSettings->beta ?? 0) === 1;

        // Check user admin role
        $cuRole = (int) (session('cuRole') ?? 4);
        $isAdmin = $cuRole <= 2;

        if (! $isStaging && ! $isDevEnv && ! $isBeta && ! $isAdmin) {
            return $this->failForbidden('Diagnostic suite is restricted to staging, beta testers, and site administrators.');
        }

        return null;
    }
}
