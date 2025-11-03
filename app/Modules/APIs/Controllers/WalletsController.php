<?php
namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\MyMIPlaid;
use App\Models\WalletModel;
use App\Services\WalletService;

#[\AllowDynamicProperties]
class WalletsController extends ResourceController
{
    protected $format = 'json';

    /** @var WalletModel */
    protected $wallets;

    /** @var \Myth\Auth\Authentication\AuthenticationInterface|\CodeIgniter\Shield\Authentication\Authentication|null */
    protected $auth;

    public function __construct()
    {
        $this->wallets = new WalletModel();
        $this->auth    = service('authentication'); // Myth\Auth
        helper(['text', 'url']);
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


    /** GET /API/Wallets
     * Returns all wallets for current user (optionally filter by ?category=)
     */
    public function index(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            // Optional: fall back to Shield/Myth\Auth helper if present
            if (!$uid && function_exists('auth') && auth()->loggedIn()) {
                $uid = (int) auth()->id();
            }
            if (!$uid) {
                return $this->failUnauthorized('Unauthorized');
            }

            $category = $this->request->getGet('category');
            log_message('debug', 'API/Wallets category param: {cat}', ['cat' => $category]);

            $rows = $this->wallets->listByUser($uid, $category);
            log_message('debug', 'WalletsController::index returning {n} wallets for user {u} category={c}', [
                'n' => count($rows),
                'u' => $uid,
                'c' => $category ?? 'all',
            ]);

            return $this->respond(['status' => 'success', 'data' => $rows]);
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController::index error: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** POST /API/Wallets/Create */
    public function create(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->id(); }
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
                'plaidEnvironment' => 'production' ?? null,
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
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->id(); }
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

    public function plaidExchange(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid) return $this->failUnauthorized('Unauthorized');

            $publicToken = (string) $this->request->getPost('public_token');
            if (!$publicToken) return $this->failValidationErrors('Missing public_token');

            $plaid = new MyMIPlaid();
            $ex = $plaid->exchangePublicToken($publicToken);
            if (empty($ex['access_token'])) return $this->failServerError('Token exchange failed');

            $access = $ex['access_token'];
            $itemId = $ex['item_id'] ?? null;

            // Accounts with balances from Plaid
            $accounts = $plaid->getAccountsWithBalances($access);
            if (!is_array($accounts)) $accounts = [];

            // Build user context
            $email = null; $username = null;
            try { $u = $this->auth?->user(); if ($u){ $email = $u->email ?? null; $username = $u->username ?? null; } } catch (\Throwable $e) {}

            // Insert (or just insert) depository accounts as Bank wallets
            $svc = new WalletService(service('logger'), new \App\Models\WalletModel());
            $created = [];

            foreach ($accounts as $acct) {
                // Normalized getters whether object or array:
                $type     = is_array($acct) ? ($acct['type'] ?? '') : ($acct->type ?? '');
                $subtype  = is_array($acct) ? ($acct['subtype'] ?? '') : ($acct->subtype ?? '');
                $name     = is_array($acct) ? ($acct['name'] ?? '') : ($acct->name ?? '');
                $offName  = is_array($acct) ? ($acct['official_name'] ?? null) : ($acct->official_name ?? null);
                $mask     = is_array($acct) ? ($acct['mask'] ?? null) : ($acct->mask ?? null);
                $acctId   = is_array($acct) ? ($acct['account_id'] ?? null) : ($acct->account_id ?? null);
                $balBlock = is_array($acct) ? ($acct['balances'] ?? []) : ($acct->balances ?? (object)[]);
                $current  = is_array($balBlock) ? ($balBlock['current'] ?? null) : ($balBlock->current ?? null);
                $avail    = is_array($balBlock) ? ($balBlock['available'] ?? null) : ($balBlock->available ?? null);
                $balance  = $current ?? $avail ?? 0;

                if (strtolower($type) !== 'depository') {
                    // You can extend here to handle credit/loan/investment types if needed.
                    continue;
                }

                $payload = [
                    'beta'               => 'No',
                    'user_id'            => $uid,
                    'user_email'         => $email,
                    'username'           => $username,
                    'bank_name'          => $offName ?: $name ?: 'Bank',
                    'account_type'       => $subtype ?: 'checking',
                    'account_number'     => null,
                    'routing_number'     => null,
                    'bank_account_owner' => 'Yes',
                    'balance'            => $balance,
                    'nickname'           => $name ?: 'Bank',
                    // Plaid-specific:
                    'provider'           => 'plaid',
                    'credentials'        => [
                        'provider'     => 'plaid',
                        'access_token' => $access,
                        'item_id'      => $itemId,
                        'account_id'   => $acctId,
                        'mask'         => $mask,
                    ],
                ];

                // Creates both bf_users_wallet (main) and bank subsidiary
                $ids = $svc->addBankWallet($payload);
                if (!empty($ids['wallet_id'])) $created[] = (int) $ids['wallet_id'];
            }

            return $this->respond(['status' => 'success', 'created' => $created]);
        } catch (\Throwable $e) {
            log_message('error', 'plaidExchange error: {m}', ['m' => $e->getMessage()]);
            return $this->failServerError($e->getMessage());
        }
    }

    /** GET /API/Wallets/providers?category=investment */
    public function providers(): ResponseInterface
    {
        try {
            $uid = $this->currentUserId();
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->id(); }
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
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->id(); }
            if (!$uid) return $this->failUnauthorized('Unauthorized');
            $id = (int) $id;
            if ($id <= 0) {
                return $this->failValidationErrors('Invalid wallet id');
            }

            $m = new WalletModel();
            $affected = $m->unlinkWallet($uid, $id);

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
            if (!$uid && function_exists('auth') && auth()->loggedIn()) { $uid = (int) auth()->id(); }
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

            return $ok ? $this->respond(['status'=>'success'])
                    : $this->failServerError('Update failed');
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
