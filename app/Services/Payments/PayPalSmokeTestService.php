<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;
use Throwable;

/**
 * PayPal Staging & Production Smoke Test Service.
 *
 * Provides deep configuration audits, live OAuth API connectivity checks,
 * plan validation, and sandbox simulation for PayPal integrations.
 */
class PayPalSmokeTestService
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * Runs a comprehensive configuration and database readiness audit.
     *
     * @return array<string, mixed>
     */
    public function auditConfiguration(): array
    {
        $clientId = (string) env('PAYPAL_REST_CLIENT_ID', '');
        $secret   = (string) env('PAYPAL_REST_SECRET', '');
        $mode     = strtolower((string) env('PAYPAL_REST_MODE', 'live'));
        $webhook  = (string) env('PAYPAL_WEBHOOK_ID', '');

        $featurePurchases     = function_exists('feature_enabled') && feature_enabled('FEATURE_MEMBERSHIP_PURCHASES');
        $featureSubscriptions = function_exists('feature_enabled') && feature_enabled('FEATURE_MEMBERSHIP_SUBSCRIPTIONS');

        // Check required tables
        $tables = [
            'bf_payment_claims'          => $this->db->tableExists('bf_payment_claims'),
            'bf_users_subscriptions'     => $this->db->tableExists('bf_users_subscriptions'),
            'bf_membership_subscriptions'=> $this->db->tableExists('bf_membership_subscriptions'),
        ];

        // Audit plans
        $membershipPlans = config('MembershipPlans');
        $plansAudit = [];
        $planSlugs = ['starter', 'basic', 'pro', 'premium'];

        foreach ($planSlugs as $slug) {
            $plan = $membershipPlans ? $membershipPlans->find($slug) : null;
            $paypalPlanId = PayPalSubscriptionClient::planId($slug);

            $plansAudit[$slug] = [
                'configured'     => $plan !== null,
                'label'          => $plan['label'] ?? ucfirst($slug),
                'price'          => $plan['price'] ?? 0.0,
                'tier'           => $plan['tier'] ?? 'unspecified',
                'days'           => $plan['days'] ?? 30,
                'paypal_plan_id' => $paypalPlanId !== '' ? $this->maskString($paypalPlanId, 4, 4) : '(not set)',
                'subscription_ready' => $paypalPlanId !== '',
            ];
        }

        $allConfigured = $clientId !== '' && $secret !== '' && $featurePurchases;

        return [
            'ok'                   => $allConfigured,
            'mode'                 => $mode,
            'api_endpoint'         => $mode === 'sandbox' ? 'https://api-m.sandbox.paypal.com' : 'https://api-m.paypal.com',
            'feature_purchases'    => $featurePurchases,
            'feature_subscriptions'=> $featureSubscriptions,
            'client_id_present'    => $clientId !== '',
            'client_id_preview'    => $this->maskString($clientId, 6, 4),
            'secret_present'       => $secret !== '',
            'secret_preview'       => $this->maskString($secret, 3, 2),
            'webhook_id_present'   => $webhook !== '',
            'webhook_id_preview'   => $this->maskString($webhook, 4, 4),
            'tables'               => $tables,
            'plans'                => $plansAudit,
            'summary'              => $allConfigured
                ? 'PayPal configuration and tables are ready.'
                : 'PayPal setup is incomplete. See remediation recommendations.',
            'recommendations'      => $this->getRecommendations($clientId, $secret, $mode, $featurePurchases, $tables),
        ];
    }

    /**
     * Probes live PayPal OAuth API connectivity using current credentials.
     *
     * @return array<string, mixed>
     */
    public function probeLiveConnectivity(): array
    {
        $clientId = (string) env('PAYPAL_REST_CLIENT_ID', '');
        $secret   = (string) env('PAYPAL_REST_SECRET', '');
        $mode     = strtolower((string) env('PAYPAL_REST_MODE', 'live'));
        $baseUrl  = $mode === 'sandbox' ? 'https://api-m.sandbox.paypal.com' : 'https://api-m.paypal.com';

        if ($clientId === '' || $secret === '') {
            return [
                'ok'          => false,
                'status_code' => 0,
                'latency_ms'  => 0,
                'mode'        => $mode,
                'error'       => 'Missing credentials: PAYPAL_REST_CLIENT_ID or PAYPAL_REST_SECRET is empty in .env.',
                'remedy'      => 'Configure your PayPal REST API credentials in .env on the server.',
            ];
        }

        $start = microtime(true);

        try {
            $client = service('curlrequest', ['timeout' => 10, 'http_errors' => false]);
            $response = $client->request('POST', $baseUrl . '/v1/oauth2/token', [
                'auth'        => [$clientId, $secret],
                'form_params' => ['grant_type' => 'client_credentials'],
                'headers'     => [
                    'Accept'       => 'application/json',
                    'Accept-Language' => 'en_US',
                ],
            ]);

            $latencyMs = (int) round((microtime(true) - $start) * 1000);
            $statusCode = $response->getStatusCode();
            $body = (string) $response->getBody();
            $data = json_decode($body, true);

            if ($statusCode === 200 && is_array($data) && !empty($data['access_token'])) {
                return [
                    'ok'          => true,
                    'status_code' => 200,
                    'latency_ms'  => $latencyMs,
                    'mode'        => $mode,
                    'token_type'  => $data['token_type'] ?? 'Bearer',
                    'app_id'      => $data['app_id'] ?? null,
                    'expires_in'  => $data['expires_in'] ?? null,
                    'scope'       => $data['scope'] ?? null,
                    'message'     => "Successfully authenticated with PayPal ({$mode} mode, {$latencyMs}ms).",
                ];
            }

            $errorName = $data['error'] ?? 'authentication_failed';
            $errorDesc = $data['error_description'] ?? 'PayPal rejected client credentials.';

            $remedy = match ($statusCode) {
                401 => "PayPal returned 401 Unauthorized ({$errorName}: {$errorDesc}). Check that PAYPAL_REST_CLIENT_ID and PAYPAL_REST_SECRET correspond to the {$mode} environment at developer.paypal.com.",
                403 => "PayPal returned 403 Forbidden. Check your PayPal account permissions and API access restrictions.",
                default => "PayPal returned HTTP {$statusCode}: {$errorDesc}",
            };

            return [
                'ok'          => false,
                'status_code' => $statusCode,
                'latency_ms'  => $latencyMs,
                'mode'        => $mode,
                'error'       => "{$errorName}: {$errorDesc}",
                'remedy'      => $remedy,
                'raw_body'    => mb_substr($body, 0, 500),
            ];
        } catch (Throwable $e) {
            $latencyMs = (int) round((microtime(true) - $start) * 1000);

            return [
                'ok'          => false,
                'status_code' => 0,
                'latency_ms'  => $latencyMs,
                'mode'        => $mode,
                'error'       => 'Network / cURL exception: ' . $e->getMessage(),
                'remedy'      => 'Verify outgoing HTTPS connectivity to ' . $baseUrl . ' from this server (firewall, DNS, or cURL CA bundle).',
            ];
        }
    }

    /**
     * Simulates or executes a test purchase claim and fulfillment for a test user.
     *
     * @param int    $userId
     * @param string $planSlug starter|basic|pro|premium
     * @return array<string, mixed>
     */
    public function simulateSandboxPurchase(int $userId, string $planSlug): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'error' => 'Valid user session required to run sandbox simulation.'];
        }

        $plan = config('MembershipPlans')->find($planSlug);
        if ($plan === null) {
            return ['ok' => false, 'error' => "Plan '{$planSlug}' not found in Config\\MembershipPlans."];
        }

        // Generate synthetic sandbox transaction ID
        $fakeTxnId = 'SANDBOX' . strtoupper(substr(bin2hex(random_bytes(8)), 0, 14));
        $now = date('Y-m-d H:i:s');

        if (! $this->db->tableExists('bf_payment_claims')) {
            return ['ok' => false, 'error' => 'Table bf_payment_claims does not exist in database.'];
        }

        // Insert verified test claim
        $claimData = [
            'user_id'         => $userId,
            'kind'            => 'membership',
            'provider'        => 'paypal_sandbox_sim',
            'provider_txn_id' => $fakeTxnId,
            'claimed_amount'  => (float) $plan['price'],
            'verified_amount' => (float) $plan['price'],
            'currency'        => 'USD',
            'status'          => 'verified',
            'detail'          => json_encode([
                'plan'           => $planSlug,
                'simulated'      => true,
                'executed_at'    => $now,
                'simulated_by'   => $userId,
            ], JSON_UNESCAPED_SLASHES),
            'created_at'      => $now,
            'updated_at'      => $now,
        ];

        $this->db->table('bf_payment_claims')->insert($claimData);
        $claimId = (int) $this->db->insertID();

        // Run fulfillment
        $fulfillment = (new MembershipFulfillmentService($this->db))->fulfil($userId, $claimId, $planSlug);

        return [
            'ok'             => $fulfillment['ok'] ?? false,
            'simulated_txn'  => $fakeTxnId,
            'claim_id'       => $claimId,
            'plan'           => $plan['label'],
            'price'          => $plan['price'],
            'tier'           => $fulfillment['tier'] ?? $plan['tier'],
            'expires_at'     => $fulfillment['expires_at'] ?? null,
            'reason'         => $fulfillment['reason'] ?? 'completed',
            'message'        => ($fulfillment['ok'] ?? false)
                ? "Simulated sandbox purchase successful! User #{$userId} granted {$plan['label']} access until " . ($fulfillment['expires_at'] ?? 'date') . "."
                : "Simulation created claim #{$claimId} but fulfillment failed: " . ($fulfillment['reason'] ?? 'unknown'),
        ];
    }

    /**
     * Builds actionable recommendations based on audit signals.
     */
    private function getRecommendations(string $clientId, string $secret, string $mode, bool $featurePurchases, array $tables): array
    {
        $recommendations = [];

        if (! $featurePurchases) {
            $recommendations[] = 'Enable membership purchases: Add FEATURE_MEMBERSHIP_PURCHASES=true to your .env file.';
        }

        if ($clientId === '') {
            $recommendations[] = 'Set PayPal REST Client ID: Add PAYPAL_REST_CLIENT_ID=<your-id> to your .env file.';
        }

        if ($secret === '') {
            $recommendations[] = 'Set PayPal REST Secret: Add PAYPAL_REST_SECRET=<your-secret> to your .env file.';
        }

        if ($mode !== 'sandbox') {
            $recommendations[] = 'For staging testing, set PAYPAL_REST_MODE=sandbox in .env to use PayPal Sandbox credentials safely without real charges.';
        }

        foreach ($tables as $table => $exists) {
            if (! $exists) {
                $recommendations[] = "Missing database table: {$table}. Run required schema migrations via scripts/ops/db/run-migrations.php.";
            }
        }

        return $recommendations;
    }

    /**
     * Masks sensitive tokens showing only leading and trailing characters.
     */
    private function maskString(string $val, int $leading = 4, int $trailing = 4): string
    {
        $val = trim($val);
        $len = strlen($val);

        if ($len === 0) {
            return '(not set)';
        }

        if ($len <= $leading + $trailing) {
            return str_repeat('*', $len);
        }

        return substr($val, 0, $leading) . '...' . substr($val, -$trailing);
    }
}
