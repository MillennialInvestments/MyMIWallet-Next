<?php namespace App\Modules\APIs\Controllers;

use App\Config\Overledger as OverledgerConfig;
use App\Libraries\MyMIExchange;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

#[\AllowDynamicProperties]
class OverledgerController extends ResourceController
{
    protected MyMIExchange $exchange;
    protected OverledgerConfig $config;
    protected array $allowedNetworks;
    protected int $maxPayloadBytes = 32768;

    public function __construct()
    {
        $this->exchange        = new MyMIExchange();
        $this->config          = config('Overledger');
        $this->allowedNetworks = $this->config->allowedNetworks;
    }

    public function health()
    {
        $requestId = $this->generateRequestId();
        if ($throttle = $this->throttleOrFail($requestId)) {
            return $throttle;
        }

        $result = $this->exchange->overledgerHealthCheck(['request_id' => $requestId]);
        $this->recordAudit('health', $requestId, [], $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);
        $this->recordUsage('health', $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);

        return $this->respondJson(
            $result['success'] ?? false,
            $result['data'] ?? ['status' => 'unknown'],
            $result['error'] ?? null,
            $result['status'] ?? 500,
            ['request_id' => $requestId]
        );
    }

    public function balance()
    {
        $requestId = $this->generateRequestId();
        if ($throttle = $this->throttleOrFail($requestId)) {
            return $throttle;
        }

        $network = trim((string) $this->request->getGet('network'));
        $address = trim((string) $this->request->getGet('address'));
        $asset   = $this->request->getGet('asset');

        if (!$this->isNetworkAllowed($network)) {
            return $this->respondJson(false, null, 'Unsupported network', 422, ['request_id' => $requestId]);
        }

        if ($address === '' || strlen($address) < 4 || strlen($address) > 256) {
            return $this->respondJson(false, null, 'Invalid address', 422, ['request_id' => $requestId]);
        }

        $options = ['request_id' => $requestId];
        $result  = $this->exchange->overledgerGetBalance($network, $address, $asset, $options);
        $payloadHash = hash('sha256', json_encode(['network' => $network, 'address' => $address, 'asset' => $asset]));
        $this->recordAudit('balance', $requestId, ['hash' => $payloadHash], $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);
        $this->recordUsage('balance', $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);

        return $this->respondJson(
            $result['success'] ?? false,
            $result['data'] ?? null,
            $result['error'] ?? null,
            $result['status'] ?? 500,
            ['request_id' => $requestId]
        );
    }

    public function networks()
    {
        $requestId = $this->generateRequestId();
        if ($throttle = $this->throttleOrFail($requestId)) {
            return $throttle;
        }

        $result = $this->exchange->overledgerGetSupportedNetworks(['request_id' => $requestId]);
        $this->recordAudit('networks', $requestId, [], $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);
        $this->recordUsage('networks', $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);

        return $this->respondJson(
            $result['success'] ?? false,
            $result['data'] ?? null,
            $result['error'] ?? null,
            $result['status'] ?? 500,
            ['request_id' => $requestId]
        );
    }

    public function prepare()
    {
        $requestId = $this->generateRequestId();
        if ($throttle = $this->throttleOrFail($requestId)) {
            return $throttle;
        }

        $rawBody = (string) $this->request->getBody();
        if (strlen($rawBody) > $this->maxPayloadBytes) {
            return $this->respondJson(false, null, 'Payload too large', 413, ['request_id' => $requestId]);
        }

        $payload = $this->request->getJSON(true) ?? [];
        if (empty($payload) || !is_array($payload)) {
            return $this->respondJson(false, null, 'Invalid JSON payload', 422, ['request_id' => $requestId]);
        }

        $options = ['request_id' => $requestId];
        $result  = $this->exchange->overledgerPrepareTransaction($payload, $options);
        $payloadHash = hash('sha256', json_encode($payload));
        $this->recordAudit('tx_prepare', $requestId, ['hash' => $payloadHash], $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);
        $this->recordUsage('tx_prepare', $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);

        return $this->respondJson(
            $result['success'] ?? false,
            $result['data'] ?? null,
            $result['error'] ?? null,
            $result['status'] ?? 500,
            ['request_id' => $requestId]
        );
    }

    public function submit()
    {
        $requestId = $this->generateRequestId();
        if ($throttle = $this->throttleOrFail($requestId)) {
            return $throttle;
        }

        $rawBody = (string) $this->request->getBody();
        if (strlen($rawBody) > $this->maxPayloadBytes) {
            return $this->respondJson(false, null, 'Payload too large', 413, ['request_id' => $requestId]);
        }

        $payload = $this->request->getJSON(true) ?? [];
        if (empty($payload) || !is_array($payload)) {
            return $this->respondJson(false, null, 'Invalid JSON payload', 422, ['request_id' => $requestId]);
        }

        $options = ['request_id' => $requestId];
        $result  = $this->exchange->overledgerSubmitTransaction($payload, $options);
        $payloadHash = hash('sha256', json_encode($payload));
        $this->recordAudit('tx_submit', $requestId, ['hash' => $payloadHash], $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);
        $this->recordUsage('tx_submit', $result['status'] ?? 0, $result['latency_ms'] ?? 0, $result['error'] ?? null);

        return $this->respondJson(
            $result['success'] ?? false,
            $result['data'] ?? null,
            $result['error'] ?? null,
            $result['status'] ?? 500,
            ['request_id' => $requestId]
        );
    }

    protected function respondJson(bool $success, $data = null, ?string $error = null, int $status = 200, array $meta = [])
    {
        $payload = [
            'success' => $success,
            'data'    => $data,
            'error'   => $success ? null : ($error ?? 'unknown_error'),
            'meta'    => array_merge($meta, [
                'environment' => $this->config->environment,
            ]),
        ];

        return $this->respond($payload, $status);
    }

    protected function isNetworkAllowed(string $network): bool
    {
        return in_array($network, $this->allowedNetworks, true);
    }

    protected function throttleOrFail(string $requestId)
    {
        $throttler  = Services::throttler();
        $ip         = (string) $this->request->getIPAddress();
        $userId     = $this->getUserId();
        $identifier = $ip . ':' . ($userId ?? 'guest');

        if (!$throttler->check($identifier, 30, 60)) {
            $this->recordUsage('throttled', 429, 0, 'throttled');
            return $this->respondJson(false, null, 'Too many requests', 429, ['request_id' => $requestId]);
        }

        return null;
    }

    protected function recordAudit(string $action, string $requestId, array $payload, int $status, int $latencyMs, ?string $error = null): void
    {
        try {
            $db = db_connect();
            $db->table('bf_overledger_audit')->insert([
                'user_id'              => $this->getUserId(),
                'action'               => $action,
                'request_id'           => $requestId,
                'request_payload_hash' => $payload['hash'] ?? null,
                'http_status'          => $status,
                'response_time_ms'     => $latencyMs,
                'error_message'        => $error,
                'created_at'           => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Overledger audit insert failed: {error}', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function recordUsage(string $endpoint, int $status, int $latencyMs, ?string $error = null): void
    {
        try {
            $db = db_connect();
            $date = date('Y-m-d');
            $errors = $status >= 400 ? 1 : 0;

            $db->query(
                'INSERT INTO bf_overledger_usage_daily (`date`, `environment`, `endpoint`, `calls`, `errors`, `avg_latency_ms`) 
                 VALUES (?, ?, ?, 1, ?, ?) 
                 ON DUPLICATE KEY UPDATE 
                    calls = calls + 1, 
                    errors = errors + VALUES(errors), 
                    avg_latency_ms = ROUND(((avg_latency_ms * calls) + VALUES(avg_latency_ms)) / (calls + 1))',
                [$date, $this->config->environment, $endpoint, $errors, $latencyMs]
            );
        } catch (\Throwable $e) {
            log_message('error', 'Overledger usage upsert failed: {error}', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function getUserId(): ?int
    {
        $auth = service('authentication');
        if ($auth && method_exists($auth, 'id')) {
            $id = $auth->id();
            if (is_numeric($id)) {
                return (int) $id;
            }
        }

        $sessionId = session('user_id');
        if (is_numeric($sessionId)) {
            return (int) $sessionId;
        }

        return null;
    }

    protected function generateRequestId(): string
    {
        return 'ovr_' . bin2hex(random_bytes(8));
    }
}
