<?php

declare(strict_types=1);

namespace App\Services\AI;

use App\Libraries\MyMIAlerts;
use App\Models\AlertsModel;
use App\Models\InvestmentModel;
use Config\Services;

/**
 * TickerIntelligenceService identifies financial symbols in user chat messages
 * and resolves actionable market data, trade alerts, and technical metrics.
 */
class TickerIntelligenceService
{
    /** Common false-positive English words matching 2-5 letter uppercase patterns */
    protected const STOPWORDS = [
        'THE', 'AND', 'FOR', 'WHAT', 'HOW', 'WHEN', 'WHY', 'CAN', 'WILL', 'WITH',
        'FROM', 'HAVE', 'THIS', 'THAT', 'SOME', 'VERY', 'FREE', 'USER', 'HELP',
        'TEST', 'INFO', 'DATE', 'TIME', 'HIGH', 'LOW', 'OPEN', 'SELL', 'HOLD',
        'CALL', 'PUTS', 'BULL', 'BEAR', 'RISK', 'CASH', 'REAL', 'COST', 'GOOD',
        'BEST', 'TRUE', 'NONE', 'MORE', 'LESS', 'MOST', 'SHOW', 'LIST', 'VIEW',
        'FIND', 'SEND', 'NEXT', 'BACK', 'STOP', 'POST', 'LAST', 'PLAN', 'TIER',
        'SAFE', 'DEBT', 'BANK', 'CARD', 'BILL', 'NEWS', 'GAIN', 'LOSS', 'DROP',
        'PEAK', 'MOVE', 'TALK', 'CHART', 'CHECK', 'TRACK', 'ALERT', 'MYMI', 'WALLET',
        'ADMIN', 'API', 'APP', 'WEB', 'DATA', 'SAVE', 'NOTE', 'TODAY', 'WEEK',
    ];

    protected AlertsModel $alertsModel;
    protected InvestmentModel $investmentModel;

    public function __construct(
        ?AlertsModel $alertsModel = null,
        ?InvestmentModel $investmentModel = null
    ) {
        $this->alertsModel = $alertsModel ?? model(AlertsModel::class);
        $this->investmentModel = $investmentModel ?? model(InvestmentModel::class);
    }

    /**
     * Extract unique financial and crypto tickers from a text message.
     * Supports: $NVDA, AAPL, BTC/USD, ETH, SOL, TSLA, etc.
     *
     * @param string $message
     * @return array<int, string>
     */
    public function extractTickers(string $message): array
    {
        $message = trim($message);
        if ($message === '') {
            return [];
        }

        $detected = [];

        // 1. Explicit cashtags: $AAPL, $BTC, $NVDA
        if (preg_match_all('/\$([A-Za-z]{1,6})\b/', $message, $matches)) {
            foreach ($matches[1] as $symbol) {
                $detected[] = strtoupper($symbol);
            }
        }

        // 2. Crypto pairs: BTC/USD, SOL/USDC
        if (preg_match_all('/\b([A-Za-z]{2,5})\/(?:USD|USDT|USDC)\b/i', $message, $matches)) {
            foreach ($matches[1] as $symbol) {
                $detected[] = strtoupper($symbol);
            }
        }

        // 3. Word-level detection for uppercase 2-5 letter tokens
        if (preg_match_all('/\b[A-Z]{2,5}\b/', $message, $matches)) {
            foreach ($matches[0] as $token) {
                $upper = strtoupper($token);
                if (!in_array($upper, self::STOPWORDS, true) && !in_array($upper, $detected, true)) {
                    // Check if this token matches a known alert or watchlist entry or prominent asset
                    if ($this->isProbableTicker($upper)) {
                        $detected[] = $upper;
                    }
                }
            }
        }

        return array_values(array_unique($detected));
    }

    /**
     * Resolve market intelligence for a list of detected tickers.
     *
     * @param array<int, string> $tickers
     * @param int|null $userId
     * @return array<string, array{
     *     symbol: string,
     *     price?: float|null,
     *     change_pct?: float|null,
     *     sector?: string|null,
     *     has_active_alert: bool,
     *     alert?: array|null,
     *     in_user_watchlist: bool
     * }>
     */
    public function getIntelligence(array $tickers, ?int $userId = null): array
    {
        if (empty($tickers)) {
            return [];
        }

        $intelligence = [];
        $userWatchlist = [];
        if ($userId !== null && $userId > 0) {
            try {
                $watchlistRows = $this->investmentModel->getUserWatchlist($userId) ?: [];
                $userWatchlist = array_column($watchlistRows, 'symbol');
            } catch (\Throwable $e) {
                // Non-blocking watchlist lookup failure
            }
        }

        foreach ($tickers as $ticker) {
            $upper = strtoupper(trim($ticker));
            $alert = null;
            try {
                $alert = $this->alertsModel->getLatestTradeAlertBySymbol($upper);
            } catch (\Throwable $e) {
                // Table or DB transient safe
            }

            $currentPrice = null;
            $sector = null;
            if ($alert) {
                $currentPrice = isset($alert['entry_price']) ? (float) $alert['entry_price'] : null;
                $sector = $alert['sector'] ?? null;
            }

            $intelligence[$upper] = [
                'symbol'            => $upper,
                'price'             => $currentPrice,
                'sector'            => $sector,
                'has_active_alert'  => $alert !== null && ($alert['send_alert'] ?? 0) == 1,
                'alert'             => $alert ? [
                    'direction'     => $alert['direction'] ?? ($alert['action'] ?? 'BUY'),
                    'entry_price'   => $alert['entry_price'] ?? null,
                    'target_price'  => $alert['target_price'] ?? null,
                    'stop_loss'     => $alert['stop_loss'] ?? null,
                    'confidence'    => $alert['confidence_score'] ?? null,
                    'created_on'    => $alert['created_on'] ?? null,
                ] : null,
                'in_user_watchlist' => in_array($upper, $userWatchlist, true),
            ];
        }

        return $intelligence;
    }

    /**
     * Format ticker intelligence into a compact context summary for the AI Copilot.
     *
     * @param array<string, array> $intelligence
     * @return string
     */
    public function formatContextSummary(array $intelligence): string
    {
        if (empty($intelligence)) {
            return '';
        }

        $lines = [];
        foreach ($intelligence as $symbol => $data) {
            $line = "Ticker {$symbol}:";
            if ($data['price'] !== null) {
                $line .= " Price \${$data['price']}.";
            }
            if ($data['sector']) {
                $line .= " Sector: {$data['sector']}.";
            }
            if (!empty($data['alert'])) {
                $a = $data['alert'];
                $dir = $a['direction'] ?? 'SIGNAL';
                $entry = $a['entry_price'] ? " Entry: \${$a['entry_price']}" : '';
                $target = $a['target_price'] ? " Target: \${$a['target_price']}" : '';
                $stop = $a['stop_loss'] ? " Stop: \${$a['stop_loss']}" : '';
                $line .= " Active Alert: [{$dir}]{$entry}{$target}{$stop}.";
            }
            if ($data['in_user_watchlist']) {
                $line .= " (Saved in Member Watchlist)";
            }
            $lines[] = $line;
        }

        return implode(' ', $lines);
    }

    /**
     * Check if an uppercase token is a known ticker in the system or major market index/crypto.
     */
    protected function isProbableTicker(string $symbol): bool
    {
        $knownMajor = [
            'SPY', 'QQQ', 'DIA', 'IWM', 'AAPL', 'MSFT', 'NVDA', 'GOOGL', 'AMZN', 'META',
            'TSLA', 'BTC', 'ETH', 'SOL', 'COIN', 'PLTR', 'AMD', 'NFLX', 'DIS', 'AVGO',
            'UBER', 'BABA', 'JPM', 'V', 'MA', 'XOM', 'CVX', 'JNJ', 'UNH', 'LLY',
        ];

        if (in_array($symbol, $knownMajor, true)) {
            return true;
        }

        // Check if there is an alert in DB
        try {
            $alert = $this->alertsModel->getLatestTradeAlertBySymbol($symbol);
            if ($alert !== null) {
                return true;
            }
        } catch (\Throwable) {
        }

        return false;
    }
}
