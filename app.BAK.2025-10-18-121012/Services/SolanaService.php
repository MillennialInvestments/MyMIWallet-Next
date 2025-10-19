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

    public function __construct()
    {
        // Initialize endpoints once; merge your existing ctor code here if needed
        $this->commitment = getenv('SOLANA_COMMITMENT') ?: 'confirmed';

        $primary  = getenv('SOLANA_RPC_PRIMARY') ?: 'https://api.mainnet-beta.solana.com';
        $fallback = getenv('SOLANA_RPC_FALLBACKS') ?: '';
        $endpoints = array_merge([$primary], array_map('trim', explode(',', $fallback)));
        $this->rpcEndpoints = array_values(array_filter(array_unique($endpoints)));
        $this->wsEndpoint = getenv('SOLANA_WS_PRIMARY') ?: 'wss://api.mainnet-beta.solana.com';

        $this->client = new Client([
            'timeout' => $this->httpTimeout,
        ]);

        $this->config = config('Solana');
    }

    /** Core JSON-RPC caller with retries & endpoint failover */
    private function rpc(string $method, array $params = [])
    {
        $client = \Config\Services::curlrequest();

        // Total attempt cap across all endpoints (prevents long stalls)
        $attemptsPerEndpoint = 2;
        $maxGlobalAttempts   = max(2, count($this->rpcEndpoints) * $attemptsPerEndpoint);

        $baseBackoffMs = 200;   // start backoff at 200ms
        $maxBackoffMs  = 2000;  // cap at 2s

        $payload = [
            'jsonrpc' => '2.0',
            'id'      => 1,
            'method'  => $method,
            'params'  => $params
        ];

        $lastError = null;
        $globalAttempts = 0;

        foreach ($this->rpcEndpoints as $base) {
            $url = rtrim($base, '/');

            // Skip endpoints with open circuits
            if ($this->isCircuitOpen($url)) {
                log_message('debug', "SolanaService RPC: skip {$url} (circuit open)");
                continue;
            }

            $backoffMs = $baseBackoffMs;

            for ($i = 0; $i < $attemptsPerEndpoint; $i++) {
                $globalAttempts++;
                if ($globalAttempts > $maxGlobalAttempts) {
                    $lastError = $lastError ?: new \RuntimeException('Global attempt cap reached');
                    break 2; // break out of both loops
                }

                try {
                    log_message('debug', 'HTTP POST '.$url.' | payload:'.json_encode($payload));
                    $resp = $client->request('POST', $url, [
                        'headers' => ['Content-Type' => 'application/json'],
                        'timeout' => 10,
                        'json'    => $payload,
                    ]);
                    $code = (int) $resp->getStatusCode();
                    $body = (string) $resp->getBody();

                    // Treat 403/429/408/5xx as retryable per our policy
                    if ($code >= 500 || in_array($code, [403, 408, 429], true)) {
                        throw new \RuntimeException("HTTP {$code}");
                    }

                    $decoded = $body !== '' ? json_decode($body, true) : null;
                    if (!is_array($decoded)) {
                        throw new \RuntimeException('JSON decode error');
                    }
                    if (isset($decoded['error'])) {
                        // JSON-RPC error can be transient; try next attempt
                        throw new \RuntimeException(json_encode($decoded['error']));
                    }

                    // Success:
                    $this->noteSuccess($url);
                    return $decoded;

                } catch (\Throwable $e) {
                    $lastError = $e;
                    $msg = $e->getMessage() ?? 'unknown';
                    log_message('error', "SolanaService RPC fail {$method} @ {$url} -> {$msg}");

                    // Determine if we should open the circuit and how long
                    $penalty = null;

                    // Common transient statuses in message:
                    if (str_contains($msg, 'HTTP 429') || str_contains($msg, 'HTTP 403')) {
                        // brief open (rate-limit / forbidden)
                        $penalty = 30;
                    }
                    if (stripos($msg, 'Could not resolve host') !== false ||
                        stripos($msg, 'getaddrinfo failed') !== false ||
                        stripos($msg, 'Name or service not known') !== false) {
                        // DNS issue: open a bit longer
                        $penalty = max($penalty ?? 0, 120);
                    }

                    $this->noteFailure($url, $penalty);

                    // Backoff before next try on this endpoint, then either re-try
                    // the same endpoint (within attemptsPerEndpoint) or move to next endpoint
                    usleep($backoffMs * 1000);
                    $backoffMs = min($maxBackoffMs, (int)($backoffMs * 1.8) + random_int(10, 40));
                }
            }
            // exhausted attempts for this endpoint; move to next endpoint
        }

        // After all endpoints exhausted:
        throw new \RuntimeException("All Solana RPC endpoints failed for {$method}: ".($lastError?->getMessage() ?? 'unknown'));
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
        return ['mint' => '', 'spec' => $spec];
    }

    public function mintTo(string $mint, string $dest, string $amount): array
    {
        return ['mint' => $mint, 'dest' => $dest, 'amount' => $amount];
    }

    public function getBalanceLamports(string $address): int
    {
        $address = $this->normalizeAddress($address) ?? '';
        if ($address === '') {
            log_message('error', 'getBalanceLamports: invalid address param');
            return 0;
        }
        $res = $this->rpc('getBalance', [$address, ['commitment' => $this->commitment]]);
        if (isset($res['result']['value'])) return (int)$res['result']['value'];
        if (isset($res['value']))           return (int)$res['value'];
        return 0;
    }

    public function getTokenAccounts(string $owner): array
    {
        $owner = $this->normalizeAddress($owner) ?? '';
        if ($owner === '') {
            log_message('error', 'getTokenAccounts: invalid owner param');
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
        try {
            $slotRes    = $this->rpc('getSlot', [['commitment' => $this->commitment]]);
            $versionRes = $this->rpc('getVersion');

            $slot = $slotRes['result'] ?? $slotRes['slot'] ?? (is_int($slotRes) ? $slotRes : null);
            $version = $versionRes['solana-core'] ?? ($versionRes['result']['solana-core'] ?? null);

            return ['healthy' => true, 'slot' => $slot, 'version' => $version];
        } catch (\Throwable $e) {
            return ['healthy' => false, 'slot' => null, 'version' => null, 'error' => $e->getMessage()];
        }
    }

    /** Keep your earlier compatibility method if WalletsController calls it */
    public function getSolanaData(string $address): array
    {
        $address = $this->normalizeAddress($address) ?? '';
        if ($address === '') {
            log_message('error', 'getSolanaData: invalid address param');
            return [
                'address' => $address,
                'nativeLamports' => 0,
                'nativeSOL' => 0.0,
                'tokens' => [],
                'solanaNetworkStatus' => ['healthy' => false, 'error' => 'invalid-address'],
            ];
        }

        $memoKey = 'solData:'.$address;
        if (array_key_exists($memoKey, $this->requestMemo)) {
            return $this->requestMemo[$memoKey];
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
            return $this->requestMemo[$memoKey] = $out;

        } catch (\Throwable $e) {
            log_message('error', 'getSolanaData failed: {msg}', ['msg' => $e->getMessage()]);
            $out = [
                'address'            => $address,
                'nativeLamports'     => 0,
                'nativeSOL'          => 0.0,
                'tokens'             => [],
                'solanaNetworkStatus'=> ['healthy' => false, 'error' => $e->getMessage()],
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

    // Normalize in RPC that takes an address
    public function getSignaturesForAddress(string $address, int $limit = 100): array
    {
        $key = "sigs:{$address}:{$limit}";
        if (isset($this->memo[$key])) return $this->memo[$key];

        $maxRetries = 3;
        $delayMs    = 200;

        for ($i = 0; $i <= $maxRetries; $i++) {
            $resp = $this->rpc('getSignaturesForAddress', [$address, ['limit' => $limit]]);
            if (!isset($resp['error'])) {
                return $this->memo[$key] = $resp['result'] ?? [];
            }
            $err = (string)($resp['error']['message'] ?? 'unknown');
            if (str_contains($err, '429') && $i < $maxRetries) {
                usleep($delayMs * 1000);
                $delayMs = min(2000, (int)($delayMs * 1.8 + random_int(5, 35)));
                continue;
            }
            // Non-429 or exhausted retries: log once and return empty
            log_message('notice', 'Solana RPC getSignaturesForAddress failed: {msg}', ['msg' => $err]);
            break;
        }
        return $this->memo[$key] = [];
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

    private function noteFailure(string $endpoint, int $penaltySeconds = null): void
    {
        $s = &$this->circuit[$endpoint];
        if (!isset($s)) $s = ['failCount' => 0, 'openUntil' => 0];
        $s['failCount']++;
        if ($s['failCount'] >= $this->circuitFailThresh) {
            $openFor = $penaltySeconds ?? $this->circuitOpenSeconds;
            $s['openUntil'] = time() + $openFor;
            log_message('notice', "SolanaService: circuit OPEN for {$endpoint} ({$openFor}s)");
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

}