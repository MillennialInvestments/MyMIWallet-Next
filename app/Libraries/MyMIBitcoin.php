<?php namespace App\Libraries;


use App\Services\BitcoinService;
use App\Libraries\MyMIMarketData;
use CodeIgniter\Cache\CacheInterface;
use Config\Services;

/**
 * Bitcoin service mirroring Solana integration patterns.
 * Provides address normalization/validation and basic balance/tx lookups.
 */
#[\AllowDynamicProperties]
class MyMIBitcoin
{


    protected BitcoinService $svc;
    protected CacheInterface $cache;
    /** Base URL for public BTC explorer API */
    private string $apiBase = 'https://api.blockcypher.com/v1/btc/main';
    protected static bool $warnedInject = false;

    public function __construct()
    {
        $this->svc = new BitcoinService();
        $this->cache = $cache ?? Services::cache();
    }

    /**
     * DEPRECATED: Scripts are now centrally loaded in
     * app/Views/themes/dashboard/layouts/js-links.php
     * This method remains to avoid breaking existing calls.
     */
    public function injectScripts(): string
    {
        if (!self::$warnedInject) {
            log_message('warning', 'DEPRECATED: MyMIBitcoin::injectScripts is a no-op; scripts are loaded via js-links.php');
            self::$warnedInject = true;
        }
        return '';
    }

    /**
     * Helper for feature detection by views/components.
     */
    public static function usesCentralizedLoader(): bool
    {
        return true;
    }

    private function resolveCuID(?int $cuID): ?int
    {
        if (!empty($cuID) && $cuID > 0) return $cuID;
        $session = session();
        $cuID = (int)($session->get('cuID') ?? $session->get('user_id') ?? 0);
        return $cuID > 0 ? $cuID : null;
    }

    public function getUserBitcoin(?int $cuID = null): array
    {
        $cuID = $this->resolveCuID($cuID);
        if ($cuID === null) return [];

        $defAddr = $this->db->table('bf_exchanges_coin_addresses')
            ->where(['cuID' => $cuID, 'chain' => 'bitcoin'])
            ->select('address')
            ->get()->getRowArray();

        $address = $defAddr['address'] ?? null;
        if (!$address || !$this->svc->isValidAddress($address)) return [];

        $balRes = $this->svc->getBalance($address);
        $utxos  = $this->svc->getUtxos($address);
        $price  = (new MyMIMarketData())->getPriceBTCFromCoingecko();
        $confirmed = ($balRes['chain_stats']['funded_txo_sum'] ?? 0) - ($balRes['chain_stats']['spent_txo_sum'] ?? 0);

        return [
            'address'   => $address,
            'balance'   => $confirmed / 1e8,
            'usdValue'  => $price ? ($confirmed / 1e8) * $price : null,
            'utxoCount' => count($utxos ?? []),
        ];
    }
    
    /**
     * Fetch current BTC price in USD from CoinGecko.
     */
    public function getBTCPrice(): ?float
    {
        return (new MyMIMarketData())->getPriceBTCFromCoingecko();
    }

    /**
     * Normalize a possible Bitcoin address.
     * Accepts Base58 (P2PKH/P2SH) or Bech32 (bc1...).
     */
    public function normalizeAddress(?string $maybe): ?string
    {
        $addr = trim($maybe ?? '');
        if ($addr === '') {
            return null;
        }
        if (str_starts_with(strtolower($addr), 'bc1')) {
            $addr = strtolower($addr);
        }
        return $this->isValidBitcoinAddress($addr) ? $addr : null;
    }

    /**
     * Lightweight BTC address validation.
     */
    public function isValidBitcoinAddress(string $addr): bool
    {
        return (bool) preg_match('/^(bc1[ac-hj-np-z02-9]{11,71}|[13][a-km-zA-HJ-NP-Z1-9]{25,34})$/', $addr);
    }

    /**
     * Fetch balance for a given BTC address.
     * Cached for 60 seconds; failures return zeroes.
     */
    public function getBalance(string $address): array
    {
        $normalized = $this->normalizeAddress($address);
        if (!$normalized) {
            return ['address' => null, 'satoshi' => 0, 'btc' => 0.0];
        }

        $cacheKey = 'btc_balance_' . $normalized;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }

        $url = $this->apiBase . '/addrs/' . $normalized . '/balance';
        try {
            $response = file_get_contents($url);
            $data = json_decode($response, true) ?: [];
            $satoshi = $data['final_balance'] ?? 0;
            $result = [
                'address' => $normalized,
                'satoshi' => $satoshi,
                'btc' => $satoshi / 100_000_000,
            ];
            $this->cache->save($cacheKeySanitized, $result, 60);
            return $result;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIBitcoin::getBalance failed for {addr}: {msg}', [
                'addr' => substr($normalized, 0, 4) . '…',
                'msg'  => $e->getMessage(),
            ]);
            return ['address' => $normalized, 'satoshi' => 0, 'btc' => 0.0];
        }
    }

    /**
     * Fetch recent transactions for an address (max 100 records).
     * Cached for 120 seconds.
     */
    public function getTransactions(string $address, int $limit = 100): array
    {
        $normalized = $this->normalizeAddress($address);
        if (!$normalized) {
            return [];
        }
        $limit = max(1, min($limit, 100));
        $cacheKey = 'btc_tx_' . $normalized . '_' . $limit;
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);   
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            return $cached;
        }
        $url = $this->apiBase . '/addrs/' . $normalized . '/full?limit=' . $limit;
        try {
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            $txs = $data['txs'] ?? [];
            $this->cache->save($cacheKeySanitized, $txs, 120);
            return $txs;
        } catch (\Throwable $e) {
            log_message('error', 'MyMIBitcoin::getTransactions failed for {addr}: {msg}', [
                'addr' => substr($normalized, 0, 4) . '…',
                'msg'  => $e->getMessage(),
            ]);
            return [];
        }
    }

    /**
     * Build an unsigned PSBT (base64) via the server-side service.
     * @param array $inputs   Each input should include txid, vout and either witnessUtxo or nonWitnessUtxo
     * @param array $outputs  Each output: { address, value } (value in sats)
     * @param string $network 'mainnet'|'testnet' (default 'mainnet')
     */
    public function buildUnsignedPsbt(array $inputs, array $outputs, string $network = 'mainnet'): string
    {
        /** @var BitcoinService $svc */
        $svc = service('BitcoinService') ?? new BitcoinService();
        return $svc->buildUnsignedPsbt($inputs, $outputs, $network);
    }

    /**
     * Broadcast a signed raw transaction hex via the server-side service.
     * @return string txid
     */
    public function broadcastSignedTransaction(string $hex, string $network = 'mainnet'): string
    {
        /** @var BitcoinService $svc */
        $svc = service('BitcoinService') ?? new BitcoinService();
        return $svc->broadcastRawTransaction($hex, $network);
    }

    /**
     * Lightweight sanity check for bech32 BTC addresses (bc1/tb1).
     * Not a full validator; client-side adapter must still validate.
     */
    public function looksLikeBech32(string $address): bool
    {
        return (bool) preg_match('~^(bc1|tb1)[0-9ac-hj-np-z]{14,74}$~i', trim($address));
    }
}
