<?php
namespace App\Services;

use App\Models\AlertsModel;
use App\Libraries\MyMIAlphaVantage;
use App\Libraries\MyMIMarketing;
use CodeIgniter\I18n\Time;
use Config\Services;

class TechnicalSnapshotService
{
    protected $alphaVantage;
    protected $marketing;
    protected $alertsModel;
    protected $db;
    protected $logger;

    public function __construct()
    {
        $this->alphaVantage = new MyMIAlphaVantage();
        $this->marketing     = new MyMIMarketing();
        $this->alertsModel   = new AlertsModel();
        $this->db            = db_connect();
        $this->logger        = Services::logger();
    }

    /**
     * Optionally preload symbols from confirmed alerts
     */
    public function getActiveAlertSymbols(): array
    {
        return $this->alertsModel->getActiveSymbolsOnly(); // define this method to fetch distinct open symbols
    }

    /**
     * Capture today's snapshot for a single symbol
     */
    public function captureSnapshot(string $symbol): bool
    {
        $metrics = $this->alphaVantage->getFullMetricsFromAPI($symbol);
        if (!$metrics || !isset($metrics['price'])) {
            throw new \Exception("No metrics returned for {$symbol}");
        }

        $today = Time::today()->toDateString();

        $existing = $this->db->table('bf_investment_technical_snapshots')
            ->where('ticker', $symbol)
            ->where('snapshot_date', $today)
            ->countAllResults();

        if ($existing > 0) {
            $this->logger->info("Snapshot already exists for {$symbol} on {$today}");
            return false;
        }

        $insert = [
            'ticker'               => $symbol,
            'snapshot_date'        => $today,
            'price'                => $metrics['price'] ?? null,
            'volume'               => $metrics['volume'] ?? null,
            'volume_usd'           => $metrics['volume_usd'] ?? null,
            'ema_3'                => $metrics['ema_3'] ?? null,
            'ema_8'                => $metrics['ema_8'] ?? null,
            'ema_13'               => $metrics['ema_13'] ?? null,
            'ema_21'               => $metrics['ema_21'] ?? null,
            'ema_34'               => $metrics['ema_34'] ?? null,
            'ema_48'               => $metrics['ema_48'] ?? null,
            'ema_analysis'         => $metrics['ema_analysis'] ?? '',
            'sma_50'               => $metrics['sma_50'] ?? null,
            'sma_200'              => $metrics['sma_200'] ?? null,
            'ross_analysis'        => $metrics['ross_analysis'] ?? '',
            'rsi'                  => $metrics['rsi'] ?? null,
            'macd'                 => $metrics['macd'] ?? null,
            'macd_signal'          => $metrics['macd_signal'] ?? null,
            'bollinger_band_width' => $metrics['bollinger_band_width'] ?? null,
            'adx'                  => $metrics['adx'] ?? null,
            'stochastic_k'         => $metrics['stochastic_k'] ?? null,
            'stochastic_d'         => $metrics['stochastic_d'] ?? null,
            'gap_up_flag'          => $metrics['gap_up_flag'] ?? 0,
            'news_sentiment'       => $metrics['market_sentiment'] ?? null,
        ];

        $this->db->table('bf_investment_technical_snapshots')->insert($insert);

        $this->logger->info("✅ Snapshot stored for {$symbol} on {$today}");
        return true;
    }

    /**
     * Main runner for CRON or CLI
     */
    public function runDailySnapshot(array $symbols)
    {
        foreach ($symbols as $symbol) {
            try {
                $this->captureSnapshot($symbol);
                sleep(1); // Respect AlphaVantage API rate limits
            } catch (\Throwable $e) {
                $this->logger->error("Snapshot failed for {$symbol}: " . $e->getMessage());
            }
        }
    }
}
