<?php

namespace App\Services;

use Config\Solana;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SolanaService
{
    protected Client $client;
    protected Solana $config;
    private int $httpTimeout = 10;
    private string $commitment = 'confirmed';
    private array $rpcEndpoints = [];
    private string $wsEndpoint;
    private const B58_ALPHABET = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
    private array $memo = [];
    // Circuit breaker state per endpoint
    private array $circuit = []; // [ endpoint => ['failCount'=>int, 'openUntil'=>int] ]
    private int $circuitFailThresh = 2;     // open circuit after N consecutive fails
    private int $circuitOpenSeconds = 60;   // keep circuit open for N seconds
    // Per-request memo (simple in-process cache)
    private array $requestMemo = [];        // e.g., ['solData:ADDRESS' => [...]]
    private int $maxMemoEntries = 100;      // max entries in memo to avoid memory bloat
    private int $maxMemoSize = 5 * 1024 * 1024; // max total size of memo in bytes
    private string $networkStatusCacheKey = 'solana:network_status';
    private array $rateLimitLog = [];
    private array $circuitLog = [];

    public function __construct()
    {
        // Initialize endpoints once; merge your existing ctor code here if needed
        $this->commitment = env('SOLANA_COMMITMENT') ?: 'confirmed';

        $network = $this->resolveNetwork();
        $primary  = env('SOLANA_RPC_PRIMARY') ?: $this->defaultRpcForNetwork($network);
        $fallback = env('SOLANA_RPC_FALLBACKS') ?: '';
        $defaultFallbacks = $network === 'mainnet-beta'
            ? ['https://rpc.ankr.com/solana', 'https://solana-api.projectserum.com']
            : [$this->defaultRpcForNetwork($network)];
        $fallbackList = $fallback ? array_map('trim', explode(',', $fallback)) : $defaultFallbacks;
        $endpoints = array_merge([$primary], $fallbackList);
        $this->rpcEndpoints = array_values(array_filter(array_unique($endpoints)));
        $this->wsEndpoint = env('SOLANA_WS_PRIMARY') ?: str_replace('https://', 'wss://', $this->defaultRpcForNetwork($network));

        $this->client = new Client([
            'timeout' => $this->httpTimeout,
        ]);

        $this->config = config('Solana');
    }


    public function resolveNetwork(?string $requested = null): string
    {
        $value = strtolower(trim((string) ($requested ?: env('SOLANA_NETWORK', 'devnet'))));
        $aliases = [
            'mainnet' => 'mainnet-beta',
            'mainnet_beta' => 'mainnet-beta',
            'mainnet-beta' => 'mainnet-beta',
            'test' => 'testnet',
            'testnet' => 'testnet',
            'dev' => 'devnet',
            'devnet' => 'devnet',
        ];

        return $aliases[$value] ?? 'devnet';
    }

    public function defaultRpcForNetwork(?string $network = null): string
    {
        return match ($this->resolveNetwork($network)) {
            'mainnet-beta' => 'https://api.mainnet-beta.solana.com',
            'testnet' => 'https://api.testnet.solana.com',
            default => 'https://api.devnet.solana.com',
        };
    }

    public function isMainnetMintAllowed(bool $adminConfirmed = false): bool
    {
        $envAllowed = filter_var(env('SOLANA_ALLOW_MAINNET_MINTING', false), FILTER_VALIDATE_BOOL);
        return $envAllowed && $adminConfirmed;
    }

    public function assertMintAllowed(?string $network = null, bool $adminConfirmed = false): array
    {
        $resolved = $this->resolveNetwork($network);
        if ($resolved !== 'mainnet-beta') {
            return ['allowed' => true, 'network' => $resolved, 'reason' => null, 'message' => 'Mint allowed for non-mainnet workflow.'];
        }

        if ($this->isMainnetMintAllowed($adminConfirmed)) {
            return ['allowed' => true, 'network' => $resolved, 'reason' => null, 'message' => 'Mainnet mint explicitly allowed by environment and admin confirmation.'];
        }

        return [
            'allowed' => false,
            'network' => $resolved,
            'reason' => 'mainnet_minting_blocked',
            'message' => 'Mainnet minting is blocked. Set SOLANA_ALLOW_MAINNET_MINTING only after launch approval and require admin confirmation.',
        ];
    }

    /** Core JSON-RPC caller with retries & endpoint failover */
    private function rpc(string $method, array $params = [])
    {
        $normalized = $this->rpcRequestNormalized($method, $params);
        if ($normalized['ok']) {
            return is_array($normalized['data']) ? $normalized['data'] : ($normalized['raw'] ?? []);
        }

        throw new \RuntimeException("All Solana RPC endpoints failed for {$method}: ".($normalized['error'] ?? 'unknown'));
    }


    public function getBalance(string $address, ?string $mint = null): array
    {
        $result = $this->rpc('getBalance', [$address]);
        return $result['result'] ?? [];
    }

    // public function getTokenAccounts(string $address): array
    // {
    //     $params = [$address, ['programId' => 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA']];
    //     $result = $this->rpc('getTokenAccountsByOwner', $params);
    //     return $result['result']['value'] ?? [];
    // }

    public function transfer(string $from, string $to, string $amount, array $opts = []): array
    {
        return ['from' => $from, 'to' => $to, 'amount' => $amount];
    }

    public function getQuote(array $params): array
    {
        // return service('myMIRaydium')->getQuote($params);
        $jup = new \App\Services\JupiterService();
        return $jup->quote($params);
    }

    public function swap(array $params): array
    {
        // return service('myMIRaydium')->swap($params);
        $jup = new \App\Services\JupiterService();
        return $jup->swap($params);
    }

    public function getPrice(string $symbolOrMint): array
    {
        // return ['symbol' => $symbolOrMint, 'price' => 0];
        $jup = new \App\Services\JupiterService();
        $res = $jup->prices([$symbolOrMint]);
        return $res['data'][$symbolOrMint] ?? ['price' => null];
    }

    public function createToken(array $spec): array
    {
        $guard = $this->assertMintAllowed($spec['network'] ?? null, (bool) ($spec['admin_confirmed'] ?? false));
        if (! $guard['allowed']) {
            $this->notifyTeam('mint_failure', 'Blocked unsafe Solana token draft/mint request.', ['reason' => $guard['reason'], 'network' => $guard['network']]);
            return [
                'success' => false,
                'message' => $guard['message'],
                'data' => ['mint' => null, 'network' => $guard['network'], 'dry_run' => true],
                'errors' => ['network' => $guard['reason']],
            ];
        }

        return [
            'success' => true,
            'message' => 'Solana token payload prepared. No broadcast was performed by this service method.',
            'data' => ['mint' => '', 'spec' => $this->redactSecrets($spec), 'network' => $guard['network']],
        ];
    }

    public function mintTo(string $mint, string $dest, string $amount): array
    {
        $guard = $this->assertMintAllowed(null, false);
        if (! $guard['allowed']) {
            $this->notifyTeam('mint_failure', 'Blocked unsafe Solana mint request.', ['reason' => $guard['reason'], 'network' => $guard['network']]);
            return [
                'success' => false,
                'message' => $guard['message'],
                'data' => ['mint' => $mint, 'dest' => $dest, 'amount' => $amount, 'network' => $guard['network']],
                'errors' => ['network' => $guard['reason']],
            ];
        }

        return ['success' => true, 'message' => 'Mint payload prepared only.', 'data' => ['mint' => $mint, 'dest' => $dest, 'amount' => $amount, 'network' => $guard['network']]];
    }

    public function getBalanceLamports(string $address): int
    {
        $address = $this->guardAddress($address, 'getBalanceLamports');
        if ($address === null) {
            return 0;
        }
        $res = $this->rpc('getBalance', [$address, ['commitment' => $this->commitment]]);
        if (isset($res['result']['value'])) return (int)$res['result']['value'];
        if (isset($res['value']))           return (int)$res['value'];
        return 0;
    }

    public function getTokenAccounts(string $owner): array
    {
        $owner = $this->guardAddress($owner, 'getTokenAccounts');
        if ($owner === null) {
            return [];
        }

        $tokenProgramId = 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA';
        $res = $this->rpc('getTokenAccountsByOwner', [
            $owner,
            ['programId' => $tokenProgramId],
            ['encoding' => 'jsonParsed', 'commitment' => $this->commitment],
        ]);

        $value = $res['result']['value'] ?? $res['value'] ?? [];
        $out = [];
        foreach ($value as $acc) {
            $info = $acc['account']['data']['parsed']['info'] ?? [];
            $ta   = $info['tokenAmount'] ?? [];
            $out[] = [
                'mint'      => $info['mint'] ?? null,
                'owner'     => $info['owner'] ?? null,
                'decimals'  => $ta['decimals'] ?? null,
                'amountRaw' => $ta['amount']   ?? null,
                'uiAmount'  => $ta['uiAmount'] ?? null,
            ];
        }
        return $out;
    }


    /** Newer method replacing deprecated getConfirmedSignaturesForAddress2 */
    // public function getSignaturesForAddress(string $address, int $limit = 100): array
    // {
    //     return $this->rpc('getSignaturesForAddress', [$address, ['limit' => $limit]]);
    // }

    public function getSolanaTokens(?string $address = null): array
    {
        if (!$address) return [];
        return $this->getTokenAccounts($address);
    }

    /** Small alias to satisfy legacy controllers */
    // public function getSolanaTokens(string $address): array
    // {
    //     return $this->getTokenAccounts($address);
    // }


    /** Lightweight status for UI */
    public function getNetworkStatus(): array
    {
        helper('cache');
        $cache   = \Config\Services::cache();
        $cacheKey = sanitize_cache_key($this->networkStatusCacheKey);
        $cached  = $cache->get($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        if ($this->allCircuitsOpen()) {
            $status = [
                'healthy'  => false,
                'slot'     => null,
                'version'  => null,
                'status'   => 'offline',
                'degraded' => true,
                'error'    => 'circuit_open',
            ];
            $cache->save($cacheKey, $status, 60);
            return $status;
        }

        try {
            $slotRes    = $this->rpc('getSlot', [['commitment' => $this->commitment]]);
            $versionRes = $this->rpc('getVersion');

            $slot = $slotRes['result'] ?? $slotRes['slot'] ?? (is_int($slotRes) ? $slotRes : null);
            $version = $versionRes['solana-core'] ?? ($versionRes['result']['solana-core'] ?? null);

            $status = [
                'healthy'  => true,
                'slot'     => $slot,
                'version'  => $version,
                'status'   => 'online',
                'degraded' => false,
            ];
        } catch (\Throwable $e) {
            $msg = $e->getMessage();
            $status = [
                'healthy'  => false,
                'slot'     => null,
                'version'  => null,
                'status'   => str_contains($msg, '429') ? 'rate_limited' : 'rpc_error',
                'degraded' => true,
                'error'    => $msg,
            ];
        }

        $cache->save($cacheKey, $status, 60);
        return $status;
    }

    /** Keep your earlier compatibility method if WalletsController calls it */
    public function getSolanaData(string $address): array
    {
        helper('cache');
        $address = $this->guardAddress($address, 'getSolanaData');
        if ($address === null) {
            return [
                'address' => $address,
                'nativeLamports' => 0,
                'nativeSOL' => 0.0,
                'tokens' => [],
                'solanaNetworkStatus' => ['healthy' => false, 'status' => 'invalid_address', 'error' => 'invalid-address'],
            ];
        }

        $memoKey = 'solData:'.$address;
        if (array_key_exists($memoKey, $this->requestMemo)) {
            return $this->requestMemo[$memoKey];
        }

        $cache    = cache();
        $rawKey   = "solana:data:{$address}";
        $cacheKey = sanitize_cache_key($rawKey);
        $cached   = $cache->get($cacheKey);

        if (is_array($cached)) {
            return $this->requestMemo[$memoKey] = $cached;
        }

        try {
            $lamports = $this->getBalanceLamports($address);
            $tokens   = $this->getTokenAccounts($address);

            $out = [
                'address'            => $address,
                'nativeLamports'     => $lamports,
                'nativeSOL'          => $lamports / 1_000_000_000,
                'tokens'             => $tokens,
                'solanaNetworkStatus'=> $this->getNetworkStatus(),
            ];
            $this->requestMemo[$memoKey] = $out;
            $cache->save($cacheKey, $out, 300);

            return $out;

        } catch (\Throwable $e) {
            log_message('error', 'getSolanaData failed: {msg}', ['msg' => $e->getMessage()]);
            $out = [
                'address'            => $address,
                'nativeLamports'     => 0,
                'nativeSOL'          => 0.0,
                'tokens'             => [],
                'solanaNetworkStatus'=> ['healthy' => false, 'status' => 'rpc_error', 'error' => $e->getMessage()],
            ];
            return $this->requestMemo[$memoKey] = $out;
        }
    }

    public function getSolanaPrice(): ?float
    {
        // Use CI cache to avoid hammering providers
        $cache = \Config\Services::cache();
        $ckey  = sanitizeCacheKey('sol_price_usd');
        $cached = $cache->get($ckey);
        if (is_numeric($cached)) {
            return (float) $cached;
        }

        // 1) Prefer Library (your existing code + caching there)
        try {
            if (class_exists(\App\Libraries\MyMISolana::class)) {
                $lib = new \App\Libraries\MyMISolana();
                if (method_exists($lib, 'getSolanaPrice')) {
                    $p = $lib->getSolanaPrice(); // returns numeric or 0 on fail (per your code)
                    if (is_numeric($p) && $p > 0) {
                        $cache->save($ckey, (float)$p, 300); // 5 minutes
                        return (float)$p;
                    }
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'SolanaService::getSolanaPrice (library) failed: ' . $e->getMessage());
        }

        // 2) Fall back to MarketData library, trying a few common method names
        try {
            if (class_exists(\App\Libraries\MyMIMarketData::class)) {
                $m = new \App\Libraries\MyMIMarketData();
                $p = null;
                if (method_exists($m, 'getPrice')) {
                    $p = $m->getPrice('SOL');
                } elseif (method_exists($m, 'price')) {
                    $p = $m->price('SOL');
                } elseif (method_exists($m, 'getQuote')) {
                    $q = $m->getQuote('SOL', 'USD');
                    $p = is_array($q) ? ($q['price'] ?? null) : null;
                } elseif (method_exists($m, 'getCoinPrice')) {
                    $p = $m->getCoinPrice('SOL');
                }
                if (is_numeric($p) && (float)$p > 0) {
                    $cache->save($ckey, (float)$p, 300);
                    return (float)$p;
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'SolanaService::getSolanaPrice (market data) failed: ' . $e->getMessage());
        }

        // 3) Final fallback – direct CoinGecko with retries
        try {
            $p = $this->fetchCoinGeckoPriceSOL();
            if (is_numeric($p) && (float)$p > 0) {
                $cache->save($ckey, (float)$p, 300);
                return (float)$p;
            }
        } catch (\Throwable $e) {
            log_message('error', 'SolanaService::getSolanaPrice (coingecko) failed: ' . $e->getMessage());
        }

        return null; // let controllers decide what to show if unavailable
    }

    private function fetchCoinGeckoPriceSOL(): ?float
    {
        $client = \Config\Services::curlrequest();
        $url = 'https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd';
        $attempts = 5;
        $delaySec = 1;

        for ($i = 0; $i < $attempts; $i++) {
            try {
                $resp = $client->request('GET', $url, [
                    'headers' => ['User-Agent' => 'MyMIWallet/1.0'],
                    'timeout' => 8,
                ]);
                $code = (int)$resp->getStatusCode();
                if ($code >= 500 || $code === 429 || $code === 403 || $code === 408) {
                    throw new \RuntimeException("HTTP $code");
                }
                $data = json_decode((string)$resp->getBody(), true);
                $p = $data['solana']['usd'] ?? null;
                return is_numeric($p) ? (float)$p : null;
            } catch (\Throwable $e) {
                // exponential backoff
                sleep($delaySec);
                $delaySec = min($delaySec * 2, 16);
            }
        }
        return null;
    }

    /**
     * Base58 (Bitcoin alphabet) validator for Solana addresses.
     */
    // private function isValidBase58Address(string $s): bool
    // {
    //     // Must be base58 chars only; Solana pubkeys are typically 32..44 chars
    //     if ($s === '' || preg_match('/[^123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz]/', $s)) {
    //         return false;
    //     }
    //     $len = strlen($s);
    //     return $len >= 32 && $len <= 44;
    // }

    /****************************************************
     * Base58 encoder (Bitcoin alphabet).
     * If you already have this private method, keep one copy only.
     ****************************************************/
    // public function b58encodeFromBinary(string $bin): string
    // {
    //     // Simple, dependency-free Base58 encoder
    //     $int = gmp_init(bin2hex($bin), 16);
    //     $encoded = '';
    //     while (gmp_cmp($int, 0) > 0) {
    //         [$int, $rem] = [gmp_div_q($int, 58), gmp_intval(gmp_mod($int, 58))];
    //         $encoded = self::B58_ALPHABET[$rem] . $encoded;
    //     }
    //     // Preserve leading zeros as '1'
    //     foreach (str_split($bin) as $c) {
    //         if ($c !== "\x00") break;
    //         $encoded = '1' . $encoded;
    //     }
    //     return $encoded ?: '1';
    // }

    public function generateAddressForUser(int $userId): ?string
    {
        if (!function_exists('sodium_crypto_sign_keypair')) {
            log_message('error', 'SolanaService: libsodium not available');
            return null;
        }

        $kp = sodium_crypto_sign_keypair();
        $pk = sodium_crypto_sign_publickey($kp); // 32 bytes ed25519 pubkey
        $addr = $this->b58encodeFromBinary($pk);

        if (!$addr || !$this->isValidPublicKey($addr)) {
            log_message('error', 'SolanaService: failed to generate valid Base58 address');
            return null;
        }

        // If you require server-side signing, persist secret securely here.
        // For non-custodial, do NOT store the secret.

        return $addr;
    }

    /****************************************************
     * Create a Solana ed25519 keypair.
     * Returns: [
     *   'public_b58'   => base58 public key (address),
     *   'public_hex'   => hex(32-byte public key),
     *   'secret_key_b64' => base64(64-byte secret key),
     *   'seed_b64'     => base64(32-byte seed)  // optional convenience
     * ]
     * NOTE: DO NOT store secret_key_b64 unencrypted in DB.
     ****************************************************/
    public function generateNewKeypair(): array
    {
        if (!function_exists('sodium_crypto_sign_keypair')) {
            throw new \RuntimeException('libsodium extension is required for ed25519 key generation');
        }

        // Create keypair
        $kp = sodium_crypto_sign_keypair();
        $sk = sodium_crypto_sign_secretkey($kp); // 64 bytes (seed[32] + pubkey[32])
        $pk = sodium_crypto_sign_publickey($kp); // 32 bytes

        // Base58 address from public key (32-bytes)
        $b58 = $this->b58encodeFromBinary($pk);
        if (!$b58) {
            throw new \RuntimeException('Could not base58-encode public key (php-gmp missing?)');
        }

        // Extract 32-byte seed from secret key (first 32 bytes in libsodium layout)
        $seed = substr($sk, 0, 32);

        return [
            'public_b58'     => $b58,
            'public_hex'     => bin2hex($pk),
            'secret_key_b64' => base64_encode($sk),
            'seed_b64'       => base64_encode($seed),
        ];
    }
    /**
     * Try to extract/normalize a Solana address from various shapes.
     * - base58 string => return as-is (if valid)
     * - 64-hex => convert to base58 (if GMP available), else null
     * - array => look for ['public_token'] or ['coin_address']['public_token']
     */
    // public function normalizeAddress($maybe): ?string
    // {
    //     if (is_string($maybe)) {
    //         $maybe = trim($maybe);
    //         if ($this->isValidBase58Address($maybe)) {
    //             return $maybe;
    //         }
    //         // 64-hex raw pubkey? Attempt a conversion to base58
    //         if (preg_match('/^[0-9a-fA-F]{64}$/', $maybe)) {
    //             $bin = @hex2bin($maybe);
    //             if ($bin !== false && strlen($bin) === 32) {
    //                 $b58 = $this->b58encodeFromBinary($bin);
    //                 if (is_string($b58) && $this->isValidBase58Address($b58)) {
    //                     return $b58;
    //                 }
    //             }
    //         }
    //         return null;
    //     }

    //     if (is_array($maybe)) {
    //         // Common shapes from your logs
    //         $cand = $maybe['public_token'] ?? ($maybe['coin_address']['public_token'] ?? null);
    //         return $this->normalizeAddress($cand);
    //     }

    //     return null;
    // }

    // public function isValidPublicKey(string $addr): bool
    // {
    //     return (bool) preg_match('/^[1-9A-HJ-NP-Za-km-z]{32,44}$/', $addr);
    // }

    // Guard: if gmp is absent, fail clearly
    private function requireGmp(): void
    {
        if (!function_exists('gmp_init')) {
            throw new \RuntimeException('PHP extension "gmp" is required for Base58 encoding.');
        }
    }

    public function b58encodeFromBinary(string $bin): string
    {
        $this->requireGmp();

        // Convert bytes to big integer
        $int = gmp_init(bin2hex($bin), 16);
        $encoded = '';

        // NOTE: compute remainder first, then divide
        while (gmp_cmp($int, 0) > 0) {
            $rem = gmp_intval(gmp_mod($int, 58));
            $int = gmp_div_q($int, 58);
            $encoded = self::B58_ALPHABET[$rem] . $encoded;
        }

        // Preserve leading 0x00 bytes as '1'
        foreach (str_split($bin) as $c) {
            if ($c !== "\x00") break;
            $encoded = '1' . $encoded;
        }

        return $encoded !== '' ? $encoded : '1';
    }

    private function isValidBase58Address(string $s): bool
    {
        if ($s === '' || preg_match('/[^'.self::B58_ALPHABET.']/', $s)) {
            return false;
        }
        $len = strlen($s);
        return $len >= 32 && $len <= 44;
    }

    public function isValidPublicKey(string $addr): bool
    {
        return $this->isValidBase58Address($addr);
    }

    // Normalize helpers: unchanged logic, slightly tidied
    public function normalizeAddress($maybe): ?string
    {
        if (is_string($maybe)) {
            $maybe = trim($maybe);
            if ($this->isValidBase58Address($maybe)) {
                return $maybe;
            }
            // 64-char hex -> try to convert (ed25519 pubkey bytes)
            if (preg_match('/^[0-9a-fA-F]{64}$/', $maybe)) {
                $bin = @hex2bin($maybe);
                if ($bin !== false && strlen($bin) === 32) {
                    $b58 = $this->b58encodeFromBinary($bin);
                    return $this->isValidBase58Address($b58) ? $b58 : null;
                }
            }
            return null;
        }

        if (is_array($maybe)) {
            // Legacy shapes -> only accept if convertible to Base58
            $cand = $maybe['public_token'] ?? ($maybe['coin_address']['public_token'] ?? null);
            return $this->normalizeAddress($cand);
        }

        return null;
    }


    public function validateWalletAddress(?string $address): bool
    {
        return is_string($address) && $this->normalizeAddress($address) !== null;
    }

    public function validateMintAddress(?string $mint): bool
    {
        return $this->validateWalletAddress($mint);
    }

    public function getTransactionStatus(string $signature): array
    {
        $signature = trim($signature);
        if ($signature === '' || preg_match('/[^'.self::B58_ALPHABET.']/', $signature)) {
            return ['success' => false, 'message' => 'Invalid Solana transaction signature.', 'data' => [], 'errors' => ['signature' => 'invalid_signature']];
        }

        $result = $this->rpcRequestNormalized('getSignatureStatuses', [[$signature], ['searchTransactionHistory' => true]]);
        if (! ($result['ok'] ?? false)) {
            return ['success' => false, 'message' => 'Unable to load transaction status.', 'data' => ['signature' => $signature], 'errors' => ['rpc' => $result['error'] ?? 'rpc_error']];
        }

        $status = $result['data']['result']['value'][0] ?? null;
        return ['success' => true, 'message' => $status ? 'Transaction status loaded.' : 'Transaction not found yet.', 'data' => ['signature' => $signature, 'status' => $status], 'errors' => []];
    }

    public function notifyTeam(string $event, string $message, array $context = []): void
    {
        $safeContext = $this->redactSecrets($context);
        log_message('warning', 'Solana support event {event}: {message} {context}', [
            'event' => $event,
            'message' => $message,
            'context' => json_encode($safeContext, JSON_UNESCAPED_SLASHES),
        ]);

        $dir = WRITEPATH . 'aiops/reports/solana';
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @file_put_contents($dir . '/support-events-' . date('Ymd') . '.jsonl', json_encode([
            'timestamp' => date('c'),
            'event' => $event,
            'message' => $message,
            'context' => $safeContext,
        ], JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND);

        $webhook = (string) env('SOLANA_SUPPORT_WEBHOOK_URL', '');
        if ($webhook !== '') {
            try {
                \Config\Services::curlrequest()->post($webhook, [
                    'timeout' => 3,
                    'json' => ['text' => '[MyMI Solana] ' . $event . ': ' . $message, 'context' => $safeContext],
                ]);
            } catch (\Throwable $e) {
                log_message('notice', 'Solana support webhook failed: {msg}', ['msg' => $e->getMessage()]);
            }
        }
    }

    private function redactSecrets(array $payload): array
    {
        $redacted = [];
        foreach ($payload as $key => $value) {
            $lower = strtolower((string) $key);
            if (str_contains($lower, 'private') || str_contains($lower, 'secret') || str_contains($lower, 'token') || str_contains($lower, 'key')) {
                $redacted[$key] = '[redacted]';
                continue;
            }
            $redacted[$key] = is_array($value) ? $this->redactSecrets($value) : $value;
        }
        return $redacted;
    }

    private function guardAddress(string $address, string $context): ?string
    {
        $address = trim($address);
        if ($address === '' || preg_match('/\s/', $address)) {
            log_message('info', '{context}: invalid address param', [
                'context' => $context,
                'address' => $address,
                'user'    => $this->resolveUserContext(),
            ]);
            return null;
        }

        $normalized = $this->normalizeAddress($address);
        if ($normalized !== null) {
            return $normalized;
        }

        $userId = $this->resolveUserContext();
        log_message('info', '{context}: invalid address param', [
            'context' => $context,
            'address' => $address,
            'user'    => $userId,
        ]);

        return null;
    }

    private function resolveUserContext(): string
    {
        try {
            $session = service('session');
            $id = $session?->get('user_id') ?? $session?->get('cuID');
            return (string) ($id ?? 'guest');
        } catch (\Throwable $e) {
            return 'guest';
        }
    }

    // Normalize in RPC that takes an address
    public function getSignaturesForAddress(string $address, int $limit = 100): array
    {
        $address = $this->guardAddress($address, 'getSignaturesForAddress');
        if ($address === null) {
            return [];
        }

        $key = "sigs:{$address}:{$limit}";
        if (isset($this->memo[$key])) return $this->memo[$key];

        $maxRetries = 3;
        $delayMs    = 200;

        for ($i = 0; $i <= $maxRetries; $i++) {
            try {
                $resp = $this->rpcRequestNormalized('getSignaturesForAddress', [$address, ['limit' => $limit]]);
                if ($resp['ok']) {
                    $payload = $resp['data'] ?? [];
                    return $this->memo[$key] = $payload['result'] ?? ($payload['data'] ?? []);
                }
                $err = (string)($resp['error'] ?? 'unknown');
            } catch (\Throwable $rpcError) {
                $err = $rpcError->getMessage() ?: 'unknown';
            }

            if (str_contains($err, '429') && $i < $maxRetries) {
                $this->logRateLimit($this->rpcEndpoints[0] ?? 'unknown', 'getSignaturesForAddress', 0);
                usleep($delayMs * 1000);
                $delayMs = min(2000, (int)($delayMs * 1.8 + random_int(5, 35)));
                continue;
            }
            // Non-429 or exhausted retries: log once and return degraded response
            log_message('notice', 'Solana RPC getSignaturesForAddress failed: {msg}', ['msg' => $err]);
            break;
        }

        return $this->memo[$key] = [
            'status'     => 'degraded',
            'reason'     => str_contains((string)$err, '429') ? 'rate_limited' : 'rpc_error',
            'endpoint'   => $this->rpcEndpoints[0] ?? null,
            'signatures' => [],
            'data'       => [],
        ];
    }

    private function isCircuitOpen(string $endpoint): bool
    {
        if (!isset($this->circuit[$endpoint])) return false;
        $openUntil = (int)($this->circuit[$endpoint]['openUntil'] ?? 0);
        if ($openUntil <= time()) {
            // auto half-open the circuit
            $this->circuit[$endpoint]['failCount'] = 0;
            $this->circuit[$endpoint]['openUntil'] = 0;
            return false;
        }
        return true;
    }

    private function noteFailure(string $endpoint, int $penaltySeconds = null, bool $forceOpen = false): void
    {
        $s = &$this->circuit[$endpoint];
        if (!isset($s)) $s = ['failCount' => 0, 'openUntil' => 0];
        $s['failCount']++;
        if ($forceOpen || $s['failCount'] >= $this->circuitFailThresh) {
            $openFor = $penaltySeconds ?? $this->circuitOpenSeconds;
            $s['openUntil'] = time() + $openFor;
            if (($this->circuitLog[$endpoint] ?? 0) < time()) {
                $this->circuitLog[$endpoint] = time() + $openFor;
                log_message('notice', "SolanaService: circuit OPEN for {$endpoint} ({$openFor}s)");
            }
        }
    }

    private function noteSuccess(string $endpoint): void
    {
        $this->circuit[$endpoint] = ['failCount' => 0, 'openUntil' => 0];
    }

    // Optional: expose a quick network “degraded” check
    public function isNetworkDegraded(): bool
    {
        foreach ($this->rpcEndpoints as $ep) {
            if (!$this->isCircuitOpen($ep)) return false;
        }
        return !empty($this->rpcEndpoints);
    }

    private function allCircuitsOpen(): bool
    {
        if (empty($this->rpcEndpoints)) {
            return false;
        }

        foreach ($this->rpcEndpoints as $endpoint) {
            if (!$this->isCircuitOpen($endpoint)) {
                return false;
            }
        }

        return true;
    }

    public function getSafeNetworkStatus(): array
    {
        helper('cache');

        $cache    = cache();
        $rawKey   = 'solana:network:status';
        $cacheKey = sanitize_cache_key($rawKey);
        $cached   = $cache->get($cacheKey);

        if (is_array($cached)) {
            return $cached;
        }

        try {
            $status = $this->getNetworkStatus();
            if (empty($status)) {
                return ['status' => 'unknown', 'degraded' => true, 'healthy' => false];
            }

            $cache->save($cacheKey, $status, 60);

            return $status;
        } catch (\Throwable $e) {
            log_message('warning', 'SolanaService::getSafeNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
            $fallback = ['status' => 'offline', 'degraded' => true, 'healthy' => false];
            $cache->save($cacheKey, $fallback, 60);

            return $fallback;
        }
    }

    private function rpcRequestNormalized(string $method, array $params = []): array
    {
        $client = \Config\Services::curlrequest();
        $attemptsPerEndpoint = 2;
        $maxGlobalAttempts   = max(2, count($this->rpcEndpoints) * $attemptsPerEndpoint);
        $baseBackoffMs = 200;
        $maxBackoffMs  = 2000;

        $payload = [
            'jsonrpc' => '2.0',
            'id'      => 1,
            'method'  => $method,
            'params'  => $params
        ];

        $lastError  = null;
        $lastStatus = null;
        $lastRaw    = null;
        $globalAttempts = 0;

        foreach ($this->rpcEndpoints as $base) {
            $url = rtrim($base, '/');

            if ($this->isCircuitOpen($url)) {
                if (($this->circuitLog[$url] ?? 0) < time()) {
                    $this->circuitLog[$url] = time() + 5;
                    log_message('notice', "SolanaService RPC: skip {$url} (circuit open)");
                }
                continue;
            }

            $backoffMs = $baseBackoffMs;

            for ($i = 0; $i < $attemptsPerEndpoint; $i++) {
                $globalAttempts++;
                if ($globalAttempts > $maxGlobalAttempts) {
                    $lastError = $lastError ?: new \RuntimeException('Global attempt cap reached');
                    break 2;
                }

                try {
                    if (defined('CI_DEBUG') && CI_DEBUG) {
                        log_message('debug', 'HTTP POST '.$url.' | payload:'.json_encode($payload));
                    }

                    $resp = $client->request('POST', $url, [
                        'headers' => ['Content-Type' => 'application/json'],
                        'timeout' => 10,
                        'json'    => $payload,
                    ]);

                    $code = (int) $resp->getStatusCode();
                    $body = (string) $resp->getBody();
                    $lastStatus = $code;
                    $lastRaw    = $body;

                    if ($code === 429) {
                        $retryAfter = (int) ($resp->getHeaderLine('Retry-After') ?: 0);
                        $this->logRateLimit($url, $method, $retryAfter);
                        $this->noteFailure($url, max($retryAfter, 30), true);
                        usleep($backoffMs * 1000);
                        $backoffMs = min($maxBackoffMs, (int)($backoffMs * 2) + random_int(25, 75));
                        continue;
                    }

                    if ($code >= 500 || in_array($code, [403, 408], true)) {
                        throw new \RuntimeException("HTTP {$code}");
                    }

                    $decoded = $body !== '' ? json_decode($body, true) : null;
                    if (!is_array($decoded)) {
                        throw new \RuntimeException('JSON decode error');
                    }
                    if (isset($decoded['error'])) {
                        throw new \RuntimeException(json_encode($decoded['error']));
                    }

                    $this->noteSuccess($url);
                    return [
                        'ok'     => true,
                        'status' => $code,
                        'data'   => $decoded,
                        'error'  => null,
                        'raw'    => $body,
                    ];
                } catch (\Throwable $e) {
                    $lastError = $e;
                    $msg = $e->getMessage() ?? 'unknown';
                    $logLevel = str_contains($msg, 'HTTP 429') ? 'notice' : 'error';
                    log_message($logLevel, "SolanaService RPC fail {$method} @ {$url} -> {$msg}");

                    $penalty = null;
                    if (str_contains($msg, 'HTTP 429') || str_contains($msg, 'HTTP 403')) {
                        $penalty = 45;
                    }
                    if (stripos($msg, 'Could not resolve host') !== false ||
                        stripos($msg, 'getaddrinfo failed') !== false ||
                        stripos($msg, 'Name or service not known') !== false) {
                        $penalty = max($penalty ?? 0, 120);
                    }

                    $this->noteFailure($url, $penalty);

                    usleep($backoffMs * 1000);
                    $backoffMs = min($maxBackoffMs, (int)($backoffMs * 1.8) + random_int(10, 40));
                }
            }
        }

        return [
            'ok'     => false,
            'status' => $lastStatus,
            'data'   => null,
            'error'  => $lastError?->getMessage(),
            'raw'    => $lastRaw,
        ];
    }

    private function logRateLimit(string $endpoint, string $method, int $retryAfter): void
    {
        $window = $retryAfter > 0 ? $retryAfter : 60;
        $nextAllowedLog = $this->rateLimitLog[$endpoint] ?? 0;
        if ($nextAllowedLog > time()) {
            return;
        }

        $this->rateLimitLog[$endpoint] = time() + $window;
        log_message(
            'notice',
            'SolanaService: rate limited on {endpoint} for {method}; pausing {seconds}s',
            ['endpoint' => $endpoint, 'method' => $method, 'seconds' => $window]
        );
    }
}
