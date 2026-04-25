<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Libraries\CrudCacheInvalidator;

use App\Libraries\MyMIPlaid;
use App\Models\WalletModel;
use App\Services\WalletService;
use App\Services\WalletSummaryService;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class WalletsAPIController extends BaseAPIController
{
    protected $format = 'json';

    /** @var WalletModel */
    protected $wallets;

    /** @var \Myth\Auth\Authentication\AuthenticationInterface|\CodeIgniter\Shield\Authentication\Authentication|null */
    protected $auth;

    private ?CrudCacheInvalidator $crudCacheInvalidator = null;
    private ?WalletSummaryService $walletSummaryService = null;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->wallets = new WalletModel();
        $this->auth    = service('authentication'); // Myth\Auth
        helper(['text', 'url']);
    }

    protected function invalidateCaches(array $tags): void
    {
        if ($tags === []) {
            return;
        }

        if ($this->crudCacheInvalidator === null) {
            /** @var CrudCacheInvalidator $invalidator */
            $invalidator = service('crudCacheInvalidator');
            $this->crudCacheInvalidator = $invalidator;
        }

        $filtered = array_values(array_filter($tags, static fn($tag) => is_string($tag) && $tag !== ''));
        if ($filtered === []) {
            return;
        }

        $this->crudCacheInvalidator->clear($filtered);
    }

    /**
     * Unified helper to get the current user id (Myth\Auth or session fallback)
     */
    protected function currentUserId(): ?int
    {
        try {
            if ($this->auth && method_exists($this->auth, 'id')) {
                $id = $this->auth->id();
                if ($id) return (int) $id;
            }
        } catch (\Throwable $e) {}

        $user = $this->auth?->user();
        if ($user && isset($user->id)) return (int) $user->id;

        // fallback to typical session keys used in your app
        $sid = session('user_id') ?? session('id') ?? (session()->has('logged_in') ? session('logged_in') : null);
        return $sid ? (int) $sid : null;
    }

    protected function getWalletSummaryService(): WalletSummaryService
    {
        if ($this->walletSummaryService === null) {
            $this->walletSummaryService = new WalletSummaryService();
        }

        return $this->walletSummaryService;
    }

    /** GET /API/Wallets
     * Returns all wallets for current user (optionally filter by ?category=)
     */
    public function index(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            // Optional: fall back to Shield/Myth\Auth helper if present
            if (!$uid && function_exists('auth') && auth()->loggedIn()) {
                $uid = (int) auth()->user()->id;
            }
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $category   = $this->request->getGet('category');
            $activeFlag = $this->request->getGet('active_only') ?? $this->request->getGet('active');
            $activeOnly = filter_var($activeFlag, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            $activeOnly = $activeOnly ?? false;

            log_message('debug', 'API/Wallets category param: {cat} | active_only={active}', [
                'cat'    => $category,
                'active' => $activeOnly ? 'true' : 'false',
            ]);

            $rows = $this->wallets->listByUser($uid, $category, $activeOnly);
            log_message('debug', 'WalletsController::index returning {n} wallets for user {u} category={c} activeOnly={a}', [
                'n' => count($rows),
                'u' => $uid,
                'c' => $category ?? 'all',
                'a' => $activeOnly ? 'true' : 'false',
            ]);

            return $this->respond(['status' => 'success', 'data' => $rows]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::index error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** GET /API/Wallets/summary */
    public function summary(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) {
                $uid = (int) auth()->user()->id;
            }
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $forceRefresh = filter_var($this->request->getGet('refresh'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
            $service      = $this->getWalletSummaryService();
            $data         = $service->buildSummary($uid, $forceRefresh);

            return $this->respond(['status' => 'success', 'data' => $data]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::summary error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** POST /API/Wallets/Create */
    public function create(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->user()->id; }
            if (!$uid) return $this->failUnauthorized('Unauthorized');

            $category    = strtolower((string) $this->request->getPost('category'));
            $provider    = strtolower((string) $this->request->getPost('provider'));
            $label       = trim((string) $this->request->getPost('label'));
            $status      = strtolower((string) ($this->request->getPost('status') ?? 'linked'));
            $credentials = $this->parseCredentials($this->request->getPost('credentials'));

            if (!$category || !$provider) {
                return $this->failValidationErrors('Missing category or provider');
            }

            $m = new WalletModel();
            $walletId = $m->createWallet($uid, $category, $provider, $label ?: ucfirst($provider), $status, $credentials);

            $this->invalidateCaches(['wallets', 'user:' . $uid]);

            return $this->respond(['status' => 'success', 'wallet_id' => $walletId]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::create error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    public function plaidConfigDebug(): \CodeIgniter\HTTP\ResponseInterface
    {
        $cfg = config('APISettings');
        $ref = new \ReflectionClass($cfg);
        return $this->respond([
            'status' => 'ok',
            'class'  => get_class($cfg),
            'file'   => $ref->getFileName(),
            'values' => [
                'plaidEnvironment' => $cfg->plaidEnvironment ?? null,
                'plaidClientID'    => $cfg->plaidClientID ?? null,
                'plaidSecret'      => (bool)($cfg->plaidSecret ?? null),        // true/false only
                'plaidSandboxSecret'=> (bool)($cfg->plaidSandboxSecret ?? null),
            ],
        ]);
    }

    public function plaidEnv(): ResponseInterface
    {
        $plaid = new \App\Libraries\MyMIPlaid();
        return $this->respond(['status'=>'ok','env'=>$plaid->envInfo()]);
    }

    public function plaidOAuthReturn()
    {
        // Plaid will forward back here; Link picks it up automatically when reopened.
        $scriptAttribute = '';

        try {
            $renderer = service('renderer');
            if ($renderer && method_exists($renderer, 'getData')) {
                $data = $renderer->getData();
                if (isset($data['nonce'])) {
                    if (is_array($data['nonce'])) {
                        $scriptAttribute = $data['nonce']['script'] ?? '';
                    } elseif (is_string($data['nonce'])) {
                        $scriptAttribute = $data['nonce'];
                    }
                }
            }
        } catch (\Throwable $e) {
            log_message('debug', 'WalletsController::plaidOAuthReturn nonce fetch failed: {error}', [
                'error' => $e->getMessage(),
            ]);
        }

        $scriptAttribute = $scriptAttribute ? ' ' . trim($scriptAttribute) : '';
        $body            = sprintf('<script%s>window.close();</script>', $scriptAttribute);

        return $this->response
            ->setContentType('text/html')
            ->setBody($body);
    }

    public function plaidWebhook()
    {
        $body = $this->request->getJSON(true) ?: $this->request->getRawInput();
        log_message('debug', 'Plaid webhook: '.json_encode($body));
        return $this->response->setStatusCode(200);
    }

    /** PUT /API/Wallets/Update/{id} */
    public function update($id = null): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->user()->id; }
            if (!$uid) return $this->failUnauthorized('Unauthorized');
            $id = (int) $id;
            if ($id <= 0) {
                return $this->failValidationErrors('Invalid wallet id');
            }

            // Accept JSON or form
            $payload = $this->request->getJSON(true) ?: $this->request->getRawInput();

            $label       = isset($payload['label']) ? trim((string)$payload['label']) : null;
            $status      = isset($payload['status']) ? strtolower((string)$payload['status']) : null;
            $credentials = $this->parseCredentials($payload['credentials'] ?? null);

            $m = new WalletModel();
            $affected = $m->updateWallet($uid, $id, $label, $status, $credentials);

            $this->invalidateCaches(['wallets', 'user:' . $uid]);

            return $this->respond(['status' => 'success', 'affected' => $affected]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::update error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    public function plaidLinkToken(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid) return $this->failUnauthorized('Unauthorized');

            $plaid     = new \App\Libraries\MyMIPlaid();
            $linkToken = $plaid->createLinkToken($uid);
            if (!$linkToken) return $this->failServerError('Failed to create link token');

            $data = [
                'status'     => 'success',
                'link_token' => $linkToken,
                'csrf'       => [
                    'name' => csrf_token(),
                    'hash' => csrf_hash(),
                ],
            ];

            return $this->respond([
                'status'     => 'success',
                'link_token' => $linkToken,
                'csrf'       => ['name' => csrf_token(), 'hash' => csrf_hash()],
            ])->setHeader('X-CSRF-TOKEN', csrf_hash());

        } catch (\Throwable $e) {
            log_message('error','plaidLinkToken error: {m}', ['m'=>$e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    public function plaidExchange(): \CodeIgniter\HTTP\ResponseInterface
    {
        try {
            $uid = (int) (auth()->id() ?? session('user_id') ?? 0);
            if ($uid <= 0) {
                return $this->respond(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            $publicToken = (string) $this->request->getPost('public_token');
            $metadataRaw = (string) $this->request->getPost('metadata');
            $metadata = $metadataRaw !== '' ? json_decode($metadataRaw, true) : [];

            if ($publicToken === '') {
                return $this->respond(['status' => 'error', 'message' => 'Missing public token.'], 422);
            }

            $plaid = new \App\Libraries\MyMIPlaid();
            $exchange = $plaid->exchangePublicToken($publicToken);

            $accessToken = (string) ($exchange['access_token'] ?? '');
            $itemId = (string) ($exchange['item_id'] ?? '');

            if ($accessToken === '' || $itemId === '') {
                return $this->respond([
                    'status'  => 'error',
                    'message' => 'Plaid token exchange failed.',
                    'data'    => $exchange,
                ], 500);
            }

            $accountMeta = $metadata['account'] ?? (($metadata['accounts'][0] ?? []) ?: []);
            $accountId   = (string) ($metadata['account_id'] ?? ($accountMeta['id'] ?? ''));
            $accountName = (string) ($accountMeta['name'] ?? 'Plaid Account');
            $mask        = (string) ($accountMeta['mask'] ?? '');
            $institution = (string) ($metadata['institution']['name'] ?? 'Plaid');

            $accounts = $plaid->getAccountsWithBalances($accessToken);
            $matched = null;
            foreach ($accounts as $account) {
                if ((string) ($account['account_id'] ?? '') === $accountId) {
                    $matched = $account;
                    break;
                }
            }
            if (!$matched && !empty($accounts)) {
                $matched = $accounts[0];
                $accountId = (string) ($matched['account_id'] ?? $accountId);
            }

            $currentBalance = (float) ($matched['balances']['current'] ?? 0);
            $subtype = (string) ($matched['subtype'] ?? ($accountMeta['subtype'] ?? 'checking'));
            $encryptedAccessToken = $plaid->encryptToken($accessToken);

            $credentials = [
                'access_token'     => $encryptedAccessToken,
                'item_id'          => $itemId,
                'account_id'       => $accountId,
                'institution_name' => $institution,
                'mask'             => $mask,
                'raw_metadata'     => $metadata,
            ];

            $payload = [
                'user_id'      => $uid,
                'user_email'   => (string) (auth()->user()->email ?? session('email') ?? ''),
                'username'     => (string) (auth()->user()->username ?? session('username') ?? ''),
                'beta'         => 'No',
                'amount'       => $currentBalance,
                'nickname'     => $accountName,
                'broker'       => $institution,
                'account_type' => ucfirst($subtype),
                'mask'         => $mask,
                'credentials'  => $credentials,
            ];

            $walletService = service('walletService');
            $walletId = $walletService->addBankWallet($payload);

            if ($walletId <= 0) {
                throw new \RuntimeException('Failed to add bank wallet.');
            }

            $refresh = $walletService->refreshPlaidWalletBalance($uid, $walletId);
            $sync = $walletService->syncPlaidTransactions($uid, $walletId, 90);

            return $this->respond([
                'status'  => 'success',
                'message' => 'Plaid account linked successfully.',
                'walletId'=> $walletId,
                'refresh' => $refresh,
                'sync'    => $sync,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'plaidExchange error: {m}', ['m' => $e->getMessage()]);
            return $this->respond([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function refreshPlaidWallet($walletId): \CodeIgniter\HTTP\ResponseInterface
    {
        try {
            $uid = (int) (auth()->id() ?? session('user_id') ?? 0);
            if ($uid <= 0) {
                return $this->respond(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            $service = service('walletService');
            $result = $service->refreshPlaidWalletBalance($uid, (int) $walletId);

            return $this->respond([
                'status'  => 'success',
                'message' => 'Wallet balance refreshed.',
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'refreshPlaidWallet error: {m}', ['m' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function syncPlaidTransactions($walletId): \CodeIgniter\HTTP\ResponseInterface
    {
        try {
            $uid = (int) (auth()->id() ?? session('user_id') ?? 0);
            if ($uid <= 0) {
                return $this->respond(['status' => 'error', 'message' => 'Unauthorized'], 401);
            }

            $service = service('walletService');
            $result = $service->syncPlaidTransactions($uid, (int) $walletId, 90);

            return $this->respond([
                'status'  => 'success',
                'message' => 'Wallet transactions synced.',
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'syncPlaidTransactions error: {m}', ['m' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /** GET /API/Wallets/providers?category=investment */
    public function providers(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->user()->id; }
            if (!$uid) return $this->failUnauthorized('Unauthorized');
            $category = strtolower((string) $this->request->getGet('category'));
            $m = new WalletModel();
            $rows = $m->getProvidersByCategory($category ?: null);

            return $this->respond(['status' => 'success', 'data' => $rows]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::providers error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** DELETE /API/Wallets/Unlink/{id} */
    public function unlink($id = null): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->user()->id; }
            if (!$uid) return $this->failUnauthorized('Unauthorized');
            $id = (int) $id;
            if ($id <= 0) {
                return $this->failValidationErrors('Invalid wallet id');
            }

            $m = new WalletModel();
            $affected = $m->unlinkWallet($uid, $id);

            $this->invalidateCaches(['wallets', 'user:' . $uid]);

            return $this->respond(['status' => 'success', 'affected' => $affected]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::unlink error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    // app/Modules/APIs/Controllers/WalletsController.php

    public function updateBank($id = null): ResponseInterface {
        return $this->updateByType($id, 'bank');
    }
    public function updateCredit($id = null): ResponseInterface {
        return $this->updateByType($id, 'credit');
    }
    public function updateDebt($id = null): ResponseInterface {
        return $this->updateByType($id, 'debt');
    }
    public function updateInvestment($id = null): ResponseInterface {
        return $this->updateByType($id, 'investment');
    }
    public function updateCrypto($id = null): ResponseInterface {
        return $this->updateByType($id, 'crypto');
    }

    private function updateByType($id, string $type): ResponseInterface {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->user()->id; }
            if (!$uid) return $this->failUnauthorized('Unauthorized');

            $id = (int) $id;
            if ($id <= 0) return $this->failValidationErrors('Invalid account id');

            // Accept JSON or form body
            // inside your API update method
            $payload = $this->request->getPost();
            if (empty($payload)) $payload = $this->request->getRawInput();
            if (empty($payload) && strpos($this->request->getHeaderLine('Content-Type'),'application/json')===0) {
                $payload = (array) $this->request->getJSON(true);
            }

            $svc = service('walletService');
            $prepared = $svc->prepareAccountData($payload, $type);
            $method   = 'edit'.ucfirst($type).'Wallet';

            if (!method_exists($svc, $method)) return $this->failServerError('Unsupported type');
            $ok = $svc->$method((int)$id, $prepared);

            if ($ok) {
                $this->invalidateCaches(['wallets', 'user:' . $uid]);
                return $this->respond(['status'=>'success']);
            }

            return $this->failServerError('Update failed');
        } catch (\Throwable $e) {
            log_message('error', 'API Wallets updateByType error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    // --------------------------
    // Robinhood / SnapTrade
    // --------------------------

    /** POST /API/Wallets/Link-Robinhood */
    public function linkRobinhood(): ResponseInterface
    {
        try {
            $uid = $this->auth?->id();
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $apiKey        = trim((string) $this->request->getPost('api_key'));
            $privateKeyB64 = trim((string) $this->request->getPost('private_key_b64'));
            $label         = trim((string) ($this->request->getPost('label') ?? 'Robinhood'));

            if (!$apiKey || !$privateKeyB64) {
                return $this->failValidationErrors('Missing api_key or private_key_b64');
            }

            // Optional lib validation
            $ok = true;
            try {
                $rh = new \App\Libraries\MyMIRobinhood();
                if (method_exists($rh, 'ping')) {
                    $ok = $rh->ping($apiKey, $privateKeyB64);
                }
            } catch (\Throwable $libErr) {
                log_message('warning', 'Robinhood lib ping failed: {m}', ['m' => $libErr->getMessage()]);
            }
            if ($ok === false) {
                return $this->failValidationErrors('Robinhood credentials invalid');
            }

            $m = new WalletModel();
            $walletId = $m->upsertProviderWallet($uid, 'robinhood', $label, [
                'api_key'         => $apiKey,
                'private_key_b64' => $privateKeyB64,
                'linked_at'       => date('c'),
            ]);

            $this->invalidateCaches(['wallets', 'user:' . $uid]);

            return $this->respond(['status' => 'success', 'wallet_id' => $walletId]);
        } catch (\Throwable $e) {
            log_message('error', 'linkRobinhood failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** POST /API/Wallets/Link-Snaptrade */
    public function linkSnapTrade(): ResponseInterface
    {
        try {
            $uid = $this->auth?->id();
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $snapUserId = trim((string) $this->request->getPost('snaptrade_user_id'));
            $label      = trim((string) ($this->request->getPost('label') ?? 'SnapTrade'));

            if (!$snapUserId) {
                try {
                    $st = new \App\Libraries\MyMISnapTrader();
                    if (method_exists($st, 'createUser')) {
                        $snapUserId = $st->createUser($uid);
                    }
                } catch (\Throwable $libErr) {
                    log_message('warning', 'SnapTrade createUser failed: {m}', ['m' => $libErr->getMessage()]);
                }
            }

            if (!$snapUserId) {
                return $this->failValidationErrors('Missing or failed to create snaptrade_user_id');
            }

            $m = new WalletModel();
            $walletId = $m->upsertProviderWallet($uid, 'snaptrade', $label, [
                'snaptrade_user_id' => $snapUserId,
                'linked_at'         => date('c'),
            ]);

            $this->invalidateCaches(['wallets', 'user:' . $uid]);

            return $this->respond(['status' => 'success', 'wallet_id' => $walletId]);
        } catch (\Throwable $e) {
            log_message('error', 'linkSnapTrade failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** POST /API/Wallets/Snaptrade/Connect-URL */
    public function getSnapTradeConnectUrl(): ResponseInterface
    {
        try {
            $uid = $this->auth?->id();
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $st = new \App\Libraries\MyMISnapTrader();
            if (!method_exists($st, 'getConnectUrl')) {
                return $this->fail('Not implemented', 501);
            }

            $snapUserId = trim((string) $this->request->getPost('snaptrade_user_id'));
            $connectUrl = $st->getConnectUrl($uid, $snapUserId);

            return $this->respond(['status' => 'success', 'connect_url' => $connectUrl]);
        } catch (\Throwable $e) {
            log_message('error', 'getSnapTradeConnectUrl failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    // --------------------------
    // Helpers
    // --------------------------
    private function parseCredentials($value): array
    {
        if (!$value) return [];
        if (is_array($value)) return $value;
        if (is_string($value)) {
            $j = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($j)) {
                return $j;
            }
        }
        return ['raw' => $value];
    }
}
?>
