<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries;

use CodeIgniter\Database\BaseConnection;

/**
 * Service managing Prediction Markets aggregation (Polymarket Web3 & Kalshi CFTC),
 * non-custodial order preparation, and on-chain outcome tracking.
 *
 * Hard Invariant: All mutations and lookups enforce fail-closed user isolation.
 * Transactions are prepared client-side for self-custody wallet signing.
 * MyMI Wallet never takes custody of funds or acts as the counterparty.
 */
class PredictionMarketsService
{
    public const T_MARKETS = 'bf_sports_prediction_markets';
    public const T_ORDERS  = 'bf_sports_prediction_orders';

    public const PLATFORM_FEE_PCT = 0.50; // 0.50% platform routing fee

    public function __construct(private readonly BaseConnection $db)
    {
    }

    public function tablesReady(): bool
    {
        return $this->db->tableExists(self::T_MARKETS, false)
            && $this->db->tableExists(self::T_ORDERS, false);
    }

    /**
     * Seeds realistic active prediction contracts from Polymarket and Kalshi if empty.
     */
    public function ensureSampleMarkets(): void
    {
        if (! $this->tablesReady()) {
            return;
        }

        $count = $this->db->table(self::T_MARKETS)->countAllResults();
        if ($count > 0) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        $markets = [
            [
                'provider'            => 'polymarket',
                'external_id'         => 'poly-fed-rate-cut-q1',
                'category'            => 'Finance & Macro',
                'title'               => 'Federal Reserve cuts interest rates by >= 25 bps at next FOMC?',
                'description'         => 'Resolves to YES if the Federal Open Market Committee lowers the federal funds target range by at least 25 basis points.',
                'yes_price'           => 0.7200,
                'no_price'            => 0.2800,
                'volume_usd_24h'      => 4820000.00,
                'total_liquidity_usd' => 12500000.00,
                'resolution_date'     => '2025-03-19 18:00:00',
                'chain'               => 'polygon',
                'contract_address'    => '0x4bFb41d5B3570DeFd03C39a9A4D8dE6Bd8B8982E',
            ],
            [
                'provider'            => 'polymarket',
                'external_id'         => 'poly-btc-125k',
                'category'            => 'Crypto',
                'title'               => 'Bitcoin reaches $125,000 before July 1, 2025?',
                'description'         => 'Resolves to YES if the price of Bitcoin according to major index feeds touches or exceeds $125,000 USD at any point before July 1, 2025.',
                'yes_price'           => 0.6400,
                'no_price'            => 0.3600,
                'volume_usd_24h'      => 8950000.00,
                'total_liquidity_usd' => 24100000.00,
                'resolution_date'     => '2025-07-01 00:00:00',
                'chain'               => 'polygon',
                'contract_address'    => '0x2791Bca1f2de4661ED88A30C99A7a9449Aa84174',
            ],
            [
                'provider'            => 'kalshi',
                'external_id'         => 'kalshi-cpi-yoy-sub25',
                'category'            => 'Finance & Macro',
                'title'               => 'US Core CPI YoY inflation falls below 2.5% in 2025?',
                'description'         => 'CFTC-regulated event contract resolving to YES if the Bureau of Labor Statistics reports a 12-month Core CPI change below 2.5%.',
                'yes_price'           => 0.4100,
                'no_price'            => 0.5900,
                'volume_usd_24h'      => 1420000.00,
                'total_liquidity_usd' => 5200000.00,
                'resolution_date'     => '2025-06-15 12:30:00',
                'chain'               => 'kalshi_cftc',
                'contract_address'    => null,
            ],
            [
                'provider'            => 'polymarket',
                'external_id'         => 'poly-chiefs-superbowl-repeat',
                'category'            => 'Sports',
                'title'               => 'Kansas City Chiefs win Super Bowl LIX?',
                'description'         => 'Resolves to YES if the Kansas City Chiefs win the NFL championship game in New Orleans.',
                'yes_price'           => 0.3100,
                'no_price'            => 0.6900,
                'volume_usd_24h'      => 6250000.00,
                'total_liquidity_usd' => 18900000.00,
                'resolution_date'     => '2025-02-10 03:00:00',
                'chain'               => 'polygon',
                'contract_address'    => '0x3c499c542cEF5E3811e1192ce70d8cC03d5c3359',
            ],
            [
                'provider'            => 'polymarket',
                'external_id'         => 'poly-celtics-nba-champs',
                'category'            => 'Sports',
                'title'               => 'Boston Celtics repeat as NBA Champions in 2025?',
                'description'         => 'Resolves to YES if the Boston Celtics win the 2025 NBA Finals.',
                'yes_price'           => 0.2800,
                'no_price'            => 0.7200,
                'volume_usd_24h'      => 3120000.00,
                'total_liquidity_usd' => 9800000.00,
                'resolution_date'     => '2025-06-25 00:00:00',
                'chain'               => 'polygon',
                'contract_address'    => '0x8f3Cf7ad23Cd3CaDbD9735AFf958023239c6A063',
            ],
            [
                'provider'            => 'polymarket',
                'external_id'         => 'poly-ai-swebench-75',
                'category'            => 'Tech & AI',
                'title'               => 'Frontier AI model achieves > 75% on verified SWE-bench in 2025?',
                'description'         => 'Resolves to YES if any publicly documented frontier model (Google DeepMind, Anthropic, OpenAI) verifies a score exceeding 75% on SWE-bench.',
                'yes_price'           => 0.5800,
                'no_price'            => 0.4200,
                'volume_usd_24h'      => 2150000.00,
                'total_liquidity_usd' => 6400000.00,
                'resolution_date'     => '2025-12-31 23:59:59',
                'chain'               => 'polygon',
                'contract_address'    => '0x7ceB23fD6bC0adD59E62ac25578270cFf1b9f619',
            ],
        ];

        foreach ($markets as $m) {
            $m['status'] = 'active';
            $m['created_at'] = $now;
            $m['updated_at'] = $now;
            $this->db->table(self::T_MARKETS)->insert($m);
        }
    }

    /**
     * Lists prediction markets with optional category and provider filters.
     *
     * @return list<array<string,mixed>>
     */
    public function listMarkets(?string $category = null, ?string $provider = 'all'): array
    {
        if (! $this->tablesReady()) {
            return [];
        }

        $this->ensureSampleMarkets();

        $b = $this->db->table(self::T_MARKETS)->where('status', 'active');
        if ($category !== null && $category !== 'all' && $category !== '') {
            $b->where('category', $category);
        }
        if ($provider !== null && $provider !== 'all' && $provider !== '') {
            $b->where('provider', strtolower(trim($provider)));
        }

        return $b->orderBy('volume_usd_24h', 'DESC')->get()->getResultArray();
    }

    /**
     * @return array<string,mixed>|null
     */
    public function getMarket(int $marketId): ?array
    {
        if ($marketId <= 0 || ! $this->tablesReady()) {
            return null;
        }

        return $this->db->table(self::T_MARKETS)
            ->where('id', $marketId)
            ->get()
            ->getRowArray() ?: null;
    }

    public function prepareOrderPayload(int $userId, int $marketId, string $outcome, float $amountUsd, ?string $userWallet = null, ?float $odds = null): array
    {
        $payload = $this->prepareOrder($userId, $marketId, $outcome, $amountUsd, $userWallet);
        $payload['platform_fee_usdc'] = $payload['platform_fee_usd'];
        $payload['user_wallet'] = $userWallet ?? '';
        return $payload;
    }

    public function confirmOrderExecution(int $userId, int $orderId, string $txSignature): bool
    {
        return $this->confirmOrder($userId, $orderId, $txSignature);
    }

    /**
     * Prepares an unsigned non-custodial order payload for self-custody wallet signing.
     *
     * @return array<string,mixed>
     */
    public function prepareOrder(int $userId, int $marketId, string $outcome, float $amountUsd, ?string $userWallet = null): array
    {
        if ($userId <= 0) {
            throw new \InvalidArgumentException('Unauthenticated user cannot place prediction orders.');
        }

        $market = $this->getMarket($marketId);
        if ($market === null) {
            throw new \InvalidArgumentException('Market not found.');
        }

        $outcome = strtoupper(trim($outcome));
        if (! in_array($outcome, ['YES', 'NO'], true)) {
            $outcome = 'YES';
        }

        $price = $outcome === 'YES' ? (float) $market['yes_price'] : (float) $market['no_price'];
        $price = max(0.01, min(0.99, $price));

        $amountUsd = max(1.0, round($amountUsd, 2));
        $platformFee = round($amountUsd * (self::PLATFORM_FEE_PCT / 100.0), 4);
        $netInvestment = $amountUsd - $platformFee;
        $sharesCount = round($netInvestment / $price, 4);
        $potentialPayout = round($sharesCount * 1.00, 2); // Each winning share pays $1.00 USDC
        $potentialRoi = $amountUsd > 0 ? round((($potentialPayout - $amountUsd) / $amountUsd) * 100.0, 1) : 0.0;

        $now = date('Y-m-d H:i:s');
        $orderData = [
            'user_id'          => $userId,
            'market_id'        => $marketId,
            'outcome'          => $outcome,
            'shares_count'     => $sharesCount,
            'share_price'      => $price,
            'total_amount_usd' => $amountUsd,
            'platform_fee_usd' => $platformFee,
            'tx_signature'     => null,
            'wallet_address'   => $userWallet,
            'status'           => 'pending',
            'settled_payout'   => 0.00,
            'created_at'       => $now,
            'updated_at'       => $now,
        ];

        $this->db->table(self::T_ORDERS)->insert($orderData);
        $orderId = (int) $this->db->insertID();

        // Construct non-custodial Web3 payload for client-side signing
        $web3Payload = [
            'order_id'         => $orderId,
            'market_title'     => $market['title'],
            'chain'            => $market['chain'],
            'contract_address' => $market['contract_address'],
            'outcome'          => $outcome,
            'price_cents'      => (int) round($price * 100),
            'shares'           => $sharesCount,
            'amount_usdc'      => $amountUsd,
            'platform_fee_usd' => $platformFee,
            'payout_usdc'      => $potentialPayout,
            'potential_roi'    => $potentialRoi,
            'unsigned_tx'      => [
                'type'             => 'prediction_order_v1',
                'to'               => $market['contract_address'] ?? '0x4bFb41d5B3570DeFd03C39a9A4D8dE6Bd8B8982E',
                'asset'            => 'USDC',
                'value_raw'        => (int) ($amountUsd * 1_000_000), // 6 decimals USDC
                'fee_recipient'    => '0x71C83D946D60dEc8B41e57c6b93EbB0bDb45A775', // MyMI Treasury
                'fee_raw'          => (int) ($platformFee * 1_000_000),
                'outcome_index'    => $outcome === 'YES' ? 0 : 1,
                'deadline'         => time() + 3600,
            ],
            'instructions'     => 'Unsigned transaction prepared. Sign and broadcast directly in self-custody wallet (Phantom/MetaMask). MyMI never touches private keys.',
        ];

        return $web3Payload;
    }

    /**
     * Confirms on-chain transaction broadcast from user self-custody wallet.
     */
    public function confirmOrder(int $userId, int $orderId, string $txSignature): bool
    {
        if ($userId <= 0 || $orderId <= 0) {
            return false;
        }

        $order = $this->db->table(self::T_ORDERS)
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($order === null) {
            return false;
        }

        return $this->db->table(self::T_ORDERS)
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->update([
                'tx_signature' => trim($txSignature),
                'status'       => 'confirmed',
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
    }

    /**
     * Lists user prediction orders with fail-closed isolation.
     *
     * @return list<array<string,mixed>>
     */
    public function listUserOrders(int $userId): array
    {
        if ($userId <= 0 || ! $this->tablesReady()) {
            return [];
        }

        return $this->db->table(self::T_ORDERS . ' o')
            ->select('o.*, m.title as market_title, m.category as market_category, m.provider as market_provider, m.chain as market_chain')
            ->join(self::T_MARKETS . ' m', 'm.id = o.market_id', 'left')
            ->where('o.user_id', $userId)
            ->orderBy('o.id', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();
    }
}
