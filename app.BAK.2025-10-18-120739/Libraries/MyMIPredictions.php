<?php namespace App\Libraries;

use App\Modules\Predictions\Models\{
    MarketsModel,OptionsModel,OrdersModel,TradesModel,PositionsModel,
    LiquidityModel,SettlementsModel,PayoutsModel
};
use App\Config\Predictions as PredCfg;
use CodeIgniter\Database\BaseConnection;

class MyMIPredictions
{
    private const VALID_STATES = ['DRAFT', 'OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'];
    private const PUBLIC_STATES = ['OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'];
    private const VALID_MODES = ['GOLD_CENTRIC', 'MULTI_ASSET'];

    public function __construct(
        protected MarketsModel $markets,
        protected OptionsModel $options,
        protected OrdersModel $orders,
        protected TradesModel $trades,
        protected PositionsModel $positions,
        protected LiquidityModel $liquidity,
        protected SettlementsModel $settlements,
        protected PayoutsModel $payouts,
        protected \App\Libraries\MyMIGold $gold,
        protected \App\Libraries\MyMISolana $solana,
        protected \App\Libraries\MyMIRaydium $raydium,
        protected \App\Libraries\MyMICoin $coin,
        protected ?PredCfg $cfg = null,
        protected ?BaseConnection $db = null
    ) {
        $this->cfg ??= config(PredCfg::class);
        $this->db  ??= \Config\Database::connect();
    }

    protected function now(): string { return date('Y-m-d H:i:s'); }    
    

    public function allowedStates(bool $publicOnly = false): array
    {
        return $publicOnly ? self::PUBLIC_STATES : self::ALL_STATES;
    }

    public function allowedModes(): array
    {
        return self::MODES;
    }

    // -----------------------
    // Eligibility / Gating
    // -----------------------
    public function ensureEligibleUser(int $userId): void
    {
        if ($userId <= 0) {
            throw new \RuntimeException('Authentication required');
        }
        if ($this->cfg->requireKyc && ! $this->isKycApproved($userId)) {
            throw new \RuntimeException('KYC not approved');
        }
        if ($this->cfg->planGating && ! $this->isPlanAllowed($userId)) {
            throw new \RuntimeException('Plan does not allow predictions');
        }
    }
    protected function isKycApproved(int $userId): bool
    {
        // TODO hook into your KYC engine
        return true;
    }
    protected function isPlanAllowed(int $userId): bool
    {
        // TODO hook into subscription/plan service
        return true;
    }

    // -----------------------
    // Market read APIs
    // -----------------------
    public function listMarkets(array $filters=[], int $limit=50, int $offset=0): array
    {
        return $this->markets->listForIndex($filters, $limit, $offset);
    }

    public function getMarket(int $marketId, bool $withOptions=true): array
    {
        $cacheKey = "pred.market.$marketId";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cached = cache($cacheKeySanitized);
        if ($cached) return $cached;

        $m = $this->markets->find($marketId);
        if (!$m) throw new \RuntimeException('Market not found');
        if ($withOptions) $m['options'] = $this->options->forMarket($marketId);

        cache()->save($cacheKeySanitized, $m, 20); // 20s
        return $m;
    }

    // -----------------------
    // Market lifecycle
    // -----------------------
    public function createMarket(array $payload, int $adminUserId): int
    {
        $now = $this->now();
        $this->db->transStart();
        $data = [
            'slug'             => $payload['slug'] ?? null,
            'title'            => $payload['title'],
            'description'      => $payload['description'] ?? null,
            'category'         => $payload['category'] ?? 'Crypto',
            'resolution_source'=> $payload['resolution_source'] ?? 'Admin/Oracle',
            'currency_mode'    => $payload['currency_mode'] ?? $this->cfg->defaultMode,
            'state'            => 'OPEN',
            'open_at'          => $now,
            'lock_at'          => $payload['lock_at'] ?? null,
            'resolve_at'       => $payload['resolve_at'] ?? null,
            'created_by'       => $adminUserId,
            'created_at'       => $now,
        ];
        $this->markets->insert($data);
        $marketId = (int) $this->markets->getInsertID();

        $opts = $payload['options'] ?? ['YES','NO'];
        foreach ($opts as $label) {
            $this->options->insert([
                'market_id'=>$marketId,'label'=>$label,'odds_bips'=>5000,
                'liquidity_gold'=>'0.00000000','is_winner'=>0,'created_at'=>$now
            ]);
        }
        $this->db->transComplete();
        cache()->delete("pred.market.$marketId");
        return $marketId;
    }

    public function lockMarket(int $marketId, int $adminUserId): bool
    {
        $m = $this->getMarket($marketId, false);
        if (!in_array($m['state'], ['OPEN','DRAFT'], true)) return false;
        $ok = $this->markets->update($marketId, ['state'=>'LOCKED','updated_at'=>$this->now()]);
        cache()->delete("pred.market.$marketId");
        return (bool)$ok;
    }

    public function cancelMarket(int $marketId, int $adminUserId): bool
    {
        $m = $this->getMarket($marketId, false);
        if (in_array($m['state'], ['RESOLVED','CANCELED'], true)) return false;
        $ok = $this->markets->update($marketId, ['state'=>'CANCELED','updated_at'=>$this->now()]);
        cache()->delete("pred.market.$marketId");
        return (bool)$ok;
    }

    // -----------------------
    // Pricing / Odds (simple AMM)
    // -----------------------
    protected function quoteOddsBipsAmm(float $liqYes, float $liqNo, float $stake): int
    {
        // constant product: p_yes = liqYes / (liqYes + liqNo)
        $den = max(0.00000001, $liqYes + $liqNo);
        $pYes = $liqYes / $den;
        // small elasticity bump with stake size
        $elastic = min(0.05, $stake / max(1.0, $den)); // cap at 5%
        $pYes = min(0.99, max(0.01, $pYes + ($pYes - 0.5)*$elastic));
        return (int) round($pYes * 10000);
    }

    public function rebalanceOdds(int $marketId): bool
    {
        $opts = $this->options->forMarket($marketId);
        if (count($opts) < 2) return false;
        $total = array_sum(array_map(static fn ($o) => (float) $o['liquidity_gold'], $opts)) ?: 0.0;
        if ($total <= 0) return false;

        $now = $this->now();
        foreach ($opts as $o) {
            $p = ($o['liquidity_gold'] / $total);
            $bips = (int)round($p * 10000);
            $this->options->update((int)$o['id'], ['odds_bips'=>$bips,'updated_at'=>$now]);
        }
        cache()->delete("pred.market.$marketId");
        return true;
    }

    // -----------------------
    // Liquidity
    // -----------------------
    public function addLiquidity(array $payload, int $userId): array
    {
        $marketId = (int)$payload['market_id'];
        $optionId = (int)$payload['option_id'];
        $asset    = strtoupper($payload['asset'] ?? 'MIMG');
        $amount   = (float)$payload['amount'];

        if ($amount <= 0) throw new \RuntimeException('Invalid amount');
        $this->ensureEligibleUser($userId);

        $now = $this->now();
        $this->db->transStart();

        // Debit asset (Gold-centric strongly preferred)
        $this->debitStake($userId, $asset, $amount, 'Add Predictions LP');
        // Normalize accounting in MIMG for book-keeping (convert if needed)
        if ($asset !== 'MIMG') {
            // Hook to your swap path if you want MIMG-only liquidity books
            // $amount = $this->swapToGold($asset, $amount, $userId);
        }

        $this->liquidity->insert([
            'market_id'=>$marketId,'option_id'=>$optionId,'provider_user_id'=>$userId,
            'asset'=>'MIMG','amount'=>$amount,'state'=>'ACTIVE','created_at'=>$now
        ]);
        $this->options->addLiquidityGold($optionId, $amount);

        $this->db->transComplete();
        $this->rebalanceOdds($marketId);
        return ['ok'=>true,'added'=>$amount];
    }

    // -----------------------
    // Order Placement
    // -----------------------
    public function placeOrder(array $order, int $userId): array
    {
        $marketId = (int)$order['market_id'];
        $optionId = (int)$order['option_id'];
        $asset    = strtoupper($order['stake_asset'] ?? 'MIMG');
        $amount   = (float)$order['stake_amount'];
        $oddsReq  = isset($order['odds_bips']) ? (int)$order['odds_bips'] : null;
        $idemp    = trim((string)($order['idempotency_key'] ?? ''));

        if ($amount <= 0) throw new \RuntimeException('Invalid stake');
        $this->ensureEligibleUser($userId);

        $m = $this->getMarket($marketId);
        if ($m['state'] !== 'OPEN') throw new \RuntimeException('Market not open');
        if (!empty($m['lock_at']) && strtotime($m['lock_at']) <= time()) throw new \RuntimeException('Market locked');

        // Gold-centric conversion
        $mode = $m['currency_mode'] ?? 'GOLD_CENTRIC';
        if ($mode === 'GOLD_CENTRIC' && $asset !== 'MIMG') {
            // $amount = $this->swapToGold($asset, $amount, $userId); // integrate DEX
            $asset = 'MIMG';
        }

        // Fetch options + compute current odds
        $opts = $this->options->forMarket($marketId);
        $optMap = [];
        $totalLiq = 0.0;
        foreach ($opts as $o) { $optMap[$o['id']] = $o; $totalLiq += (float)$o['liquidity_gold']; }
        if (!isset($optMap[$optionId])) throw new \RuntimeException('Option not found');

        $target = $optMap[$optionId];
        $otherLiq = max(0.00000001, $totalLiq - (float)$target['liquidity_gold']);
        $fillBips = $this->quoteOddsBipsAmm((float)$target['liquidity_gold'], (float)$otherLiq, $amount);

        if ($oddsReq !== null) {
            if ($fillBips < $oddsReq) throw new \RuntimeException('Price moved (odds worsened)');
        }

        $feeBips = (int) ($order['fee_bips'] ?? $this->cfg->tradeFeeBips);
        $feeAmt  = round($amount * ($feeBips/10000), 8);

        if ($idemp !== '') {
            $dup = $this->orders->where([
                'user_id'=>$userId,'market_id'=>$marketId,'option_id'=>$optionId,
                'stake_amount'=>$amount,'stake_asset'=>$asset,'fee_bips'=>$feeBips,'state'=>'FILLED'
            ])->orderBy('id','DESC')->first();
            if ($dup) return ['ok'=>true,'order_id'=>(int)$dup['id'],'fee'=>(float)$feeAmt,'payout_expected'=>(float)$dup['expected_payout'],'idempotent'=>true];
        }

        $now = $this->now();

        $this->db->transStart();

        $table = $this->options->getTable();
        $this->db->query("SELECT id FROM {$table} WHERE id=? FOR UPDATE", [$optionId]);

        $this->debitStake($userId, $asset, $amount + $feeAmt, 'Predictions stake');

        $expectedPayout = round($amount * (10000 / max(1,$fillBips)), 8);

        $this->orders->insert([
            'user_id'=>$userId,'market_id'=>$marketId,'option_id'=>$optionId,'side'=>'BUY',
            'stake_amount'=>$amount,'stake_asset'=>$asset,'expected_payout'=>$expectedPayout,
            'fee_bips'=>$feeBips,'state'=>'FILLED','created_at'=>$now
        ]);
        $orderId = (int)$this->orders->getInsertID();
        $this->trades->insert([
            'order_id'=>$orderId,'user_id'=>$userId,'market_id'=>$marketId,'option_id'=>$optionId,
            'stake_asset'=>$asset,'stake_amount'=>$amount,'fee_amount'=>$feeAmt,
            'fill_odds_bips'=>$fillBips,'created_at'=>$now
        ]);

        $this->positions->accumulate($userId, $marketId, $optionId, $fillBips, $asset, $amount, $expectedPayout);

        $this->options->addLiquidityGold($optionId, $amount);

        $this->db->transComplete();
        cache()->delete("pred.market.$marketId");

        log_message('info', 'Predictions: order placed uid={uid} mid={mid} oid={oid} opt={opt} amt={amt} fee={fee} odds={odds}', [
            'uid'=>$userId,'mid'=>$marketId,'oid'=>$orderId,'opt'=>$optionId,'amt'=>$amount,'fee'=>$feeAmt,'odds'=>$fillBips
        ]);

        return ['ok'=>true,'order_id'=>$orderId,'fee'=>$feeAmt,'payout_expected'=>$expectedPayout];
    }

    public function cancelOrder(int $orderId, int $userId): bool
    {
        return $this->orders->markCanceled($orderId, $userId);
    }

    // -----------------------
    // Settlement & Payouts
    // -----------------------
    public function settleMarket(int $marketId, int $resolverUserId, int $winningOptionId, string $note=''): array
    {
        $now = $this->now();
        $m = $this->getMarket($marketId, false);
        if (in_array($m['state'], ['RESOLVED','CANCELED'], true)) return ['ok'=>true,'enqueued'=>0];

        $this->db->transStart();
        $this->options->setWinner($marketId, $winningOptionId);
        $this->markets->update($marketId, ['state'=>'RESOLVED','updated_at'=>$now]);

        $winners = $this->positions->where(['market_id'=>$marketId,'option_id'=>$winningOptionId])->findAll();
        $count = 0;
        foreach ($winners as $p) {
            $this->payouts->insert([
                'user_id'=>$p['user_id'],'market_id'=>$marketId,'position_id'=>$p['id'],
                'asset'=>$p['stake_asset'] ?? 'MIMG','amount'=>$p['payout_max'],
                'status'=>'PENDING','created_at'=>$now
            ]);
            $count++;
        }
        $this->settlements->insert([
            'market_id'=>$marketId,'winning_option_id'=>$winningOptionId,'resolver_user_id'=>$resolverUserId,
            'resolution_note'=>$note,'resolved_at'=>$now,'created_at'=>$now
        ]);
        $this->db->transComplete();

        cache()->delete("pred.market.$marketId");
        return ['ok'=>true,'enqueued'=>$count];
    }

    public function queuePayouts(int $marketId): int
    {
        return 0;
    }

    public function processPayout(int $payoutId): bool
    {
        $p = $this->payouts->find($payoutId);
        if (!$p || $p['status'] !== 'PENDING') return false;

        $tx = $this->creditPayout((int)$p['user_id'], $p['asset'], (float)$p['amount'], 'Predictions payout');
        $this->payouts->update($payoutId, ['status'=>'SENT','tx_ref'=>$tx,'updated_at'=>$this->now()]);
        return true;
    }

    // -----------------------
    // Asset helpers (delegate)
    // -----------------------
    protected function swapToGold(string $asset, float $amount, int $userId): float
    {
        return $amount; // placeholder: treat 1:1 to avoid blocking
    }

    public function debitStake(int $userId, string $asset, float $amount, string $reason): string
    {
        if ($asset === 'MIMG') return $this->gold->debit($userId, $amount, $reason);
        return 'ledger:debit:'.$asset.':'.$amount;
    }

    public function creditPayout(int $userId, string $asset, float $amount, string $reason): string
    {
        if ($asset === 'MIMG') return $this->gold->credit($userId, $amount, $reason);
        return 'ledger:credit:'.$asset.':'.$amount;
    }
}