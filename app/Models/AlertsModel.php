<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\APIs;

class AlertsModel extends Model
{
    protected $siteSettings;


    protected $table       = 'bf_investment_trade_alerts';
    protected $primaryKey  = 'id';
    protected $returnType  = 'object';
    protected $useSoftDeletes = false;

    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';

    protected array $fieldCache = [];

    protected $allowedFields = [
        // Core trade alert fields
        'active','status','occurrences','alert_count','distributed_count','created_on','created_by','updated_at','alert_created','send_alert','alert_sent',
        'ticker','exchange','company','price','open','high','low','volume','market_cap','trailing_stop_percent','locked_profit_stop','stop_loss','max_entry',
        'current_price','entry_price','potential_price','target_price','market_sentiment','trade_type','category','alert_priority','trade_description',
        'financial_news','analysis_summary','tv_chart_type','tv_chart','display','notification_sent','submitted_date','last_updated','last_updated_time',
        'ema_9','ema_21','ema_34','ema_48','ema_100','ema_200',
        // Legacy scraper metadata retained for compatibility
        'symbol','name','currency','mic_code','country','type','url','title','summary','content','email_identifier','email_date','email_sender',
        'email_subject','email_body','source_email','email_type','news_vendor','symbols','links','images','videos','metadata','structured_data',
        'additional_html_elements','page_performance_data','network_requests','user_interaction_points','accessibility_information','page_relationships',
        'seo_elements','social_media_links','comments_user_generated_content','contact_information','legal_information','breadcrumbs','date_time','author_information',
        'ratings_reviews','price_information','location_data','language_locale','mobile_responsiveness','security_information','technology_stack','server_information',
        'caching_information','content_type','character_set','rss_atom_feeds','pagination','custom_data','error_handling','historical_changes','user_reviews_ratings',
        'inventory_levels','shipping_information','bots_crawlers_information','affiliate_links','advertisements','cookie_notices','popups_modals','browser_specific_data',
        'geolocation_specific_content','ab_testing_variations','user_agent_specific_content','screen_size_specific_content','device_specific_content','browser_extension_data',
        'custom_scripts_analytics','order_status',
        // Marketing alignment fields
        'keywords','last_marketed_at','marketing_status','distribution_channels',
    ];

    protected $validationRules = [
        'Name'    => 'required|is_unique[bf_contactus.Name,bf_contactus.id]|alpha|max_length[255]',
        'email'   => 'required|is_unique[bf_contactus.email,bf_contactus.id]|valid_email|max_length[255]',
        'phone'   => 'required|is_unique[bf_contactus.phone,bf_contactus.id]|max_length[30]',
        'message' => 'alpha_dash|max_length[255]'
    ];

    protected $skipValidation = false;

    protected $beforeInsert = [];
    protected $afterInsert  = [];
    protected $beforeUpdate = [];
    protected $afterUpdate  = [];
    protected $beforeFind   = [];
    protected $afterFind    = [];
    protected $beforeDelete = [];
    protected $afterDelete  = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function addChartAnalysis($data)
    {
        return $this->db->table('bf_investment_chart_analysis')->insert($data);
    }

    public function addStock($data)
    {
        return $this->db->table('bf_investment_stock_listing')->insert($data);
    }

    public function addTrade($data)
    {
        $result = $this->db->table('bf_investment_trade_alerts')->insert($data);
        if ($result) {
            log_message('info', "AlertsModel L386 - Alert added successfully: " . print_r($data, true));
        } else {
            log_message('error', "AlertsModel L388 -Failed to add alert. Data: " . print_r($data, true));
        }
        return $result;
    }

    public function batchInsertMarketData(array $marketData)
    {
        $this->db->transStart();

        foreach ($marketData as $symbol => $data) {
            try {
                $tickerUpdate = [
                    'exchange' => $data['exchange'] ?? 'Unknown',
                    'type'     => !empty($data['assetType']) ? $data['assetType'] : 'Stocks',
                ];
                if (isset($data['market_cap'])) {
                    $tickerUpdate['market_cap'] = $data['market_cap'] ?? 0.00;
                }
                $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);

                $alertsUpdate = [
                    'price'             => $data['price'] ?? 0.00,
                    'volume'            => $data['volume'] ?? 0.00,
                    'exchange'          => $data['exchange'] ?? 'N/A',
                    'latest_trading_day'=> $data['latest_trading_day'] ?? 'N/A',
                    'last_updated'      => date('Y-m-d H:i:s'),
                    'open'              => $data['open'] ?? 0.00,
                    'high'              => $data['high'] ?? 0.00,
                    'low'               => $data['low'] ?? 0.00,
                    'previous_close'    => $data['previous_close'] ?? 0.00,
                    'change'            => $data['change'] ?? 0.00,
                    'change_percent'    => $data['change_percent'] ?? 0.00,
                    'market_cap'        => $data['market_cap'] ?? 0.00,
                ];
                $alertsUpdated = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->update($alertsUpdate);

                $historyUpdate = [
                    'price'             => $data['price'] ?? 0.00,
                    'volume'            => $data['volume'] ?? 0.00,
                    'exchange'          => $data['exchange'] ?? 0.00,
                    'latest_trading_day'=> $data['latest_trading_day'],
                    'last_updated'      => date('Y-m-d H:i:s'),
                    'open'              => $data['open'] ?? 0.00,
                    'high'              => $data['high'] ?? 0.00,
                    'low'               => $data['low'] ?? 0.00,
                    'previous_close'    => $data['previous_close'] ?? 0.00,
                    'change'            => $data['change'] ?? 0.00,
                    'change_percent'    => $data['change_percent'] ?? 0.00,
                    'market_cap'        => $data['market_cap'] ?? 0.00,
                ];
                $historyUpdated = $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->update($historyUpdate);
            } catch (\Exception $e) {
                log_message('error', "❌ Failed to update market data for '{$symbol}': " . $e->getMessage());
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            log_message('error', '❌ Batch transaction failed during market data update.');
            return false;
        }
        return true;
    }

    public function calculateEMA($data, $timeframe, $period)
    {
        $k   = 2 / ($period + 1);
        $ema = array_shift($data);

        $aggregatedData = [];
        $chunkSize      = $timeframe === '1hr' ? 60 : 240;

        for ($i = 0; $i < count($data); $i += $chunkSize) {
            $chunk      = array_slice($data, $i, $chunkSize);
            $average    = array_sum($chunk) / count($chunk);
            $aggregatedData[] = $average;
        }

        foreach ($aggregatedData as $close) {
            $ema = $close * $k + $ema * (1 - $k);
        }
        return $ema;
    }

    public function checkDuplicateEmailHash($hash)
    {
        return $this->db->table('bf_marketing_temp_scraper')->select('id')->where('email_hash', $hash)->limit(1)->get()->getRow();
    }

    public function closeTrade($id, $data)
    {
        $data['status'] = 'Closed';
        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->update($data);
        if ($result) {
            log_message('info', "AlertsModel L404 - Alert updated successfully for ID $id: " . print_r($data, true));
        } else {
            log_message('error', "AlertsModel L406 - Failed to update alert for ID $id. Data: " . print_r($data, true));
        }
        return $result;
    }

    public function countFilteredTradeAlerts(?array $dateRange = null): int
    {
        $builder = $this->getFilteredTradeAlerts($dateRange);
        return $builder->countAllResults();
    }

    public function deleteTrade($id)
    {
        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->delete();
        if ($result) {
            log_message('info', "AlertsModel L404 - Alert updated successfully for ID $id: " . print_r($data, true));
        } else {
            log_message('error', "AlertsModel L406 - Failed to update alert for ID $id. Data: " . print_r($data, true));
        }
        return $result;
    }

    public function ensureTickerExists($symbol)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('bf_investment_tickers');

        $exists = $builder->select('symbol')->where('symbol', $symbol)->get()->getRow();
        if ($exists) {
            log_message('info', "✅ ensureTickerExists: {$symbol} already exists in bf_investment_tickers.");
            return true;
        }

        $api     = new \App\Libraries\MyMIAlphaVantage();
        $matches = $api->searchSymbol($symbol);

        if (empty($matches)) {
            log_message('error', "❌ Unable to ensure ticker exists for symbol: {$symbol}. No data from AlphaVantage.");
            return false;
        }

        $bestMatch     = $matches[0];
        $fetchedSymbol = $bestMatch['1. symbol'] ?? null;

        if (!$fetchedSymbol || $fetchedSymbol !== strtoupper($symbol)) {
            log_message('warning', "⚠️ ensureTickerExists: AlphaVantage returned {$fetchedSymbol} for requested {$symbol}. Skipping to avoid duplicate insert.");
            return false;
        }

        try {
            $insertData = [
                'symbol'     => $fetchedSymbol,
                'name'       => $bestMatch['2. name'] ?? '',
                'exchange'   => $bestMatch['4. region'] ?? 'US',
                'currency'   => $bestMatch['8. currency'] ?? 'USD',
                'created_on' => date('Y-m-d H:i:s')
            ];
            $builder->insert($insertData);
            log_message('info', "✅ ensureTickerExists: Inserted {$fetchedSymbol} successfully.");
            return true;
        } catch (\Throwable $e) {
            log_message('warning', "ensureTickerExists: Duplicate insert attempt for {$fetchedSymbol}. Error: " . $e->getMessage());
            return false;
        }
    }

    public function isKnownTicker(string $symbol): bool
    {
        return (bool) $this->db->table('bf_investment_tickers')->select('symbol')->where('symbol', strtoupper($symbol))->get()->getRow();
    }

    public function extractSymbolsFromText($text)
    {
        preg_match_all('/\b[A-Z]{1,5}\b/', $text, $matches);
        if (empty($matches[0])) {
            log_message('warning', "⚠️ No stock symbols found in text.");
            return [];
        }

        $raw = array_unique($matches[0]);

        $stoplist = [
            'THIS','OUTER','INNER','THE','BUY','SELL','LONG','SHORT','OPEN','CLOSE','ALERT','ACTIVE','LIQUIDITY','TODAY','NOW','ENTRY','EXIT','STOP','LIMIT',
            'START','END','DO','NOT','REPLY','EMAIL','SIPC','LLC','FINRA','AND'
        ];

        $symbols = array_values(array_filter($raw, function ($s) use ($stoplist) {
            $s = strtoupper(trim($s));
            if ($s === '' || in_array($s, $stoplist, true)) return false;
            return preg_match('/^[A-Z0-9]{1,5}$/', $s) === 1;
        }));

        $symbols = array_values(array_filter($symbols, function ($sym) {
            try {
                return $this->ensureTickerExists($sym) === true;
            } catch (\Throwable $e) {
                log_message('debug', "extractSymbolsFromText - rejected {$sym}: ensureTickerExists failed ({$e->getMessage()})");
                return false;
            }
        }));

        if (empty($symbols)) {
            log_message('warning', "⚠️ All extracted symbols were filtered out as false positives.");
        } else {
            log_message('info', '✅ Extracted Symbols: ' . implode(', ', $symbols));
        }
        return $symbols;
    }

    public function fetchMarketData($symbol)
    {
        $apiProviders = ['AlphaVantage'];
        foreach ($apiProviders as $api) {
            try {
                $method = "getDataFrom{$api}";
                if (method_exists($this, $method)) {
                    log_message('info', "🔄 Trying $api for $symbol...");
                    $marketData = $this->$method($symbol);
                    if ($marketData) {
                        return $marketData;
                    }
                }
            } catch (\Exception $e) {
                log_message('error', "❌ Error fetching market data from $api for $symbol: " . $e->getMessage());
            }
            sleep(1);
        }
        log_message('error', "⚠️ All APIs failed to retrieve data for $symbol.");
        return null;
    }

    public function fetchAlertHistory($symbol)
    {
        return $this->db->table('bf_investment_alert_history')
            ->where('ticker', $symbol)
            ->orderBy('alerted_on', 'DESC')
            ->limit(1)
            ->get()
            ->getResultArray();
    }

    public function fetchAllMetricsFromAlphaVantage($symbol)
    {
        $alpha   = new \App\Libraries\MyMIAlphaVantage();
        $metrics = $alpha->getTechnicalMetrics($symbol);
        if (!$metrics) {
            log_message('warning', "No metrics returned for symbol: {$symbol}");
            return [];
        }
        $price       = $metrics['price'] ?? null;
        $ema         = $metrics['ema'] ?? [];
        $sma         = $metrics['sma'] ?? [];
        $goldenCross = (isset($sma['sma_50'], $sma['sma_200']) && $sma['sma_50'] > $sma['sma_200']) ? 'golden' : 'death';
        $allTimeHigh = $metrics['all_time_high'] ?? null;

        return [
            'price'            => $price,
            'ema_5'            => $ema['ema_5'] ?? null,
            'ema_8'            => $ema['ema_8'] ?? null,
            'ema_13'           => $ema['ema_13'] ?? null,
            'ema_34'           => $ema['ema_34'] ?? null,
            'ema_48'           => $ema['ema_48'] ?? null,
            'sma_50'           => $sma['sma_50'] ?? null,
            'sma_200'          => $sma['sma_200'] ?? null,
            'golden_cross_status' => $goldenCross,
            'all_time_high'    => $allTimeHigh
        ];
    }

    public function fetchAndStoreSecFilingsForActiveTickers()
    {
        log_message('info', "🔍 Checking SEC filings for active tickers...");
        $activeTickers = $this->db->table('bf_investment_tickers')
            ->select('symbol, cik')
            ->where('exchange IS NOT NULL')
            ->where('cik IS NOT NULL')
            ->get()
            ->getResultArray();

        foreach ($activeTickers as $ticker) {
            $cik    = $ticker['cik'];
            $symbol = $ticker['symbol'];

            log_message('info', "📡 Fetching SEC filings for {$symbol} (CIK: {$cik})");
            $filings = $this->getSecFilingsByCik($cik);

            if (!empty($filings)) {
                foreach ($filings as $filing) {
                    $this->storeSecFiling($filing);
                }
            } else {
                log_message('warning', "⚠️ No new SEC filings found for {$symbol}");
            }
        }
    }

    public function fetchBatchMarketData(array $tickers)
    {
        $apiKey     = config('APISettings')->alphaVantageApiKey;
        $marketData = [];

        foreach ($tickers as $ticker) {
            $symbol = is_array($ticker) ? strtoupper($ticker['ticker']) : strtoupper($ticker);
            $url    = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=' . $symbol . '&apikey=' . $apiKey;

            $response = @file_get_contents($url);
            if ($response === false) {
                log_message('error', "Failed to fetch market data for ticker: {$symbol}");
                $this->db->table('bf_investment_trade_alerts')
                    ->where('ticker', $symbol)
                    ->update(['market_data_status' => 'failed', 'updated_at' => date('Y-m-d H:i:s')]);
                continue;
            }

            $data = json_decode($response, true);
            if (isset($data['Global Quote'])) {
                $quote = $data['Global Quote'];
                // NOTE: $listingData was not defined previously; keep listingInfo empty to avoid notices.
                $listingInfo = []; // $listingData[$symbol] ?? [];
                $marketData[$symbol] = [
                    'price'              => $quote['05. price'] ?? null,
                    'volume'             => $quote['06. volume'] ?? null,
                    'exchange'           => $listingInfo['exchange'] ?? null,
                    'assetType'          => $listingInfo['assetType'] ?? null,
                    'ipoDate'            => $listingInfo['ipoDate'] ?? null,
                    'status'             => $listingInfo['status'] ?? null,
                    'open'               => $quote['02. open'] ?? null,
                    'high'               => $quote['03. high'] ?? null,
                    'low'                => $quote['04. low'] ?? null,
                    'latest_trading_day' => $quote['07. latest trading day'] ?? date('Y-m-d'),
                    'previous_close'     => $quote['08. previous close'] ?? null,
                    'change'             => $quote['09. change'] ?? null,
                    'change_percent'     => $quote['10. change percent'] ?? null,
                    'market_cap'         => $listingInfo['marketCap'] ?? null,
                ];
                $this->db->table('bf_investment_trade_alerts')
                    ->where('ticker', $symbol)
                    ->update(['market_data_status' => 'fetched', 'updated_at' => date('Y-m-d H:i:s')]);
            } else {
                log_message('error', "Invalid market data for ticker: {$symbol}");
            }
            sleep(1);
        }

        if (!empty($marketData)) {
            $this->batchInsertMarketData($marketData);
        }
        return $marketData;
    }

    public function getActiveTickers()
    {
        return $this->db->table('bf_investment_alert_history')
            ->select('ticker')
            ->where('active', 1)
            ->groupBy('ticker')
            ->get()
            ->getResultArray();
    }

    public function getAlertByExchangeAndSymbol(string $exchange, string $symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', strtoupper($symbol))
            ->where('exchange', strtoupper($exchange))
            ->orderBy('created_on', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function getAlertById($id)
    {
        return $this->db->table('bf_investment_trade_alerts')->where('id', $id)->get()->getRowArray();
    }

    public function getAlertOccurrencesBySymbol($symbol)
    {
        $builder = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->countAllResults();
        return $builder;
    }

    public function getAlertsCreatedBySymbol($symbol)
    {
        $builder = $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->where('alert_created', 1)
            ->countAllResults();
        return $builder;
    }

    public function getAlertsSentBySymbol($symbol)
    {
        $builder = $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->where('alert_created', 1)
            ->where('send_alert', 1)
            ->countAllResults();
        return $builder;
    }

    public function getAlertBySymbol($symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->orderBy('created_on', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    public function getAlertBySymbolExt($symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->select('bf_investment_trade_alerts.*, bf_investment_tickers.exchange')
            ->join('bf_investment_tickers', 'bf_investment_tickers.symbol = bf_investment_trade_alerts.ticker', 'left')
            ->where('bf_investment_trade_alerts.ticker', $symbol)
            ->orderBy('bf_investment_trade_alerts.created_on', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function getAlertHistoryByTicker($symbol)
    {
        $builder = $this->db->table('bf_investment_alert_history');
        $builder->where('ticker', $symbol);
        $query = $builder->get();
        $rows  = $query->getResultArray();

        if (empty($rows)) {
            log_message('warning', "⚠️ No history found for $symbol. Consider triggering backfill.");
        }
        return $rows;
    }

    public function getAlertHistoryById($tradeId)
    {
        return $this->db->table('bf_investment_alert_history')
            ->where('trade_id', $tradeId)
            ->orderBy('alerted_on', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    public function getAlertStatusInfo($symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get();
    }

    public function getAllTradeAlerts(?array $dateRange = null, ?string $category = null)
    {
        $builder = $this->db->table('bf_investment_trade_alerts');

        $hasTv = $this->hasColumn('bf_investment_trade_alerts', 'tv_symbol');

        $select = "id, category, exchange, company, ticker, price, potential_price, max_entry, stop_loss, trade_type, market_sentiment, alert_priority, trade_description, financial_news, analysis_summary, created_on, details, tv_chart, display";
        if ($hasTv) {
            $select .= ", tv_symbol";
            $chartCase = "CASE
                WHEN tv_symbol IS NOT NULL AND tv_symbol <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', tv_symbol)
                WHEN exchange IS NOT NULL AND exchange <> '' AND ticker IS NOT NULL AND ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', exchange, ':', ticker)
                WHEN ticker IS NOT NULL AND ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', ticker)
                ELSE NULL
            END AS chart_link";
        } else {
            $chartCase = "CASE
                WHEN exchange IS NOT NULL AND exchange <> '' AND ticker IS NOT NULL AND ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', exchange, ':', ticker)
                WHEN ticker IS NOT NULL AND ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', ticker)
                ELSE NULL
            END AS chart_link";
        }
        $select .= ", {$chartCase}, alert_created";

        $builder->select($select);

        if ($dateRange) {
            $builder->where('created_on >=', $dateRange['start']);
            $builder->where('created_on <=', $dateRange['end']);
        }
        $builder->groupBy('ticker');
        $builder->where('status', 'In Review');
        $builder->orderBy('alert_created', 'DESC');
        $builder->orderBy('id', 'DESC');
        $builder->limit(100);

        return $builder;
    }

    public function getAlertsWithNewTVChart()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('tv_chart IS NOT NULL')
            ->where('tv_chart != ""')
            ->where('notification_sent', 0)
            ->get()
            ->getResultArray();
    }

    public function getBatchTradeAlerts($offset = 0, $limit = 25)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->orderBy('id', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }

    public function getChartOverrideForTicker($ticker)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->select('chart_override_type, chart_override_data')
            ->where('ticker', $ticker)
            ->get()
            ->getRowArray();
    }

    private function getCikFromSymbol($symbol)
    {
        $tickerInfo = $this->getTickerBySymbol($symbol);
        if ($tickerInfo && !empty($tickerInfo->cik)) {
            return str_pad($tickerInfo->cik, 10, '0', STR_PAD_LEFT);
        }

        $searchUrl = "https://www.sec.gov/cgi-bin/browse-edgar?CIK={$symbol}&count=1&output=json";
        $response  = file_get_contents($searchUrl);
        $json      = json_decode($response, true);

        if (!empty($json['companyFilings'])) {
            return str_pad($json['companyFilings'][0]['CIK'], 10, '0', STR_PAD_LEFT);
        }
        return null;
    }

    public function getCommentsByTicker($ticker)
    {
        $builder = $this->db->table('bf_users_comments')
            ->where('ticker', $ticker)
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get()
            ->getResultArray();
        return $builder;
    }

    public function getClosedTradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('status', 'Closed')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    private function fetchSecFilings($symbol)
    {
        $cik = $this->getCikFromSymbol($symbol);
        if (!$cik) {
            log_message('error', "❌ No CIK found for {$symbol}");
            return [];
        }

        $url = "https://data.sec.gov/submissions/CIK{$cik}.json";

        log_message('info', "📡 Fetching SEC filings for {$symbol} using CIK: {$cik}");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: MyMIWallet (support@mymiwallet.com)']);
        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            log_message('error', "❌ Failed to fetch SEC data for {$symbol}");
            return [];
        }

        $data = json_decode($response, true);
        return $this->parseFilings($data);
    }

    public function fetchTickerDetails(string $symbol)
    {
        $apiKey = config('APISettings')->alphaVantageApiKey;
        $url    = "https://www.alphavantage.co/query?function=OVERVIEW&symbol={$symbol}&apikey={$apiKey}";
        $response = file_get_contents($url);
        $data     = json_decode($response, true);
        if (!empty($data) && isset($data['Name'])) {
            $tickerDetails = [
                'symbol'   => $symbol,
                'name'     => $data['Name'] ?? '',
                'currency' => $data['Currency'] ?? '',
                'exchange' => $data['Exchange'] ?? '',
                'mic_code' => $data['MarketIdentificationCode'] ?? '',
                'country'  => $data['Country'] ?? '',
                'type'     => $data['AssetType'] ?? '',
            ];
            return (object) $tickerDetails;
        }
        return null;
    }

    private function getDataFromAlphaVantage($symbol)
    {
        $apiKey = config('APISettings')->getAlphaVantageApiKey();
        if (empty($apiKey)) {
            log_message('error', "🚨 No AlphaVantage API key available! Cannot fetch data for $symbol.");
            return null;
        }

        $globalQuoteUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
        $quoteResponse  = @file_get_contents($globalQuoteUrl);
        if ($quoteResponse === false) {
            log_message('error', "❌ Network error while fetching global quote for $symbol from AlphaVantage.");
            return null;
        }
        $quoteData = json_decode($quoteResponse, true);

        if (isset($quoteData['Note'])) {
            // soft retry; beware of rapid limits
            return $this->getDataFromAlphaVantage($symbol);
        }

        $timeSeriesUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=1min&apikey={$apiKey}";
        $seriesResponse = @file_get_contents($timeSeriesUrl);
        $seriesData     = json_decode($seriesResponse, true);

        if (!$quoteData || !$seriesData) {
            log_message('error', "❌ Failed to retrieve data for $symbol from AlphaVantage.");
            return null;
        }

        $result = [];
        if (isset($quoteData['Global Quote'])) {
            $quote   = $quoteData['Global Quote'];
            $result += [
                'price'  => $quote['05. price'] ?? null,
                'open'   => $quote['02. open'] ?? null,
                'high'   => $quote['03. high'] ?? null,
                'low'    => $quote['04. low'] ?? null,
                'volume' => $quote['06. volume'] ?? null,
            ];
        }

        if (isset($seriesData['Time Series (1min)'])) {
            $result['closes_1min'] = array_column($seriesData['Time Series (1min)'], '4. close');
        }

        return $result;
    }

    private function getDataFromTwelveData($symbol)
    {
        $apiKey = config('APISettings')->twelveDataApiKey;
        $url    = "https://api.twelvedata.com/time_series?symbol={$symbol}&interval=5min&apikey={$apiKey}";
        $response = file_get_contents($url);
        if ($response === false) {
            log_message('error', "Failed to retrieve data for $symbol from TwelveData.");
            return null;
        }
        $data = json_decode($response, true);
        if (isset($data['values']) && !empty($data['values'])) {
            $latestData = reset($data['values']);
            return [
                'open'   => $latestData['open'],
                'high'   => $latestData['high'],
                'low'    => $latestData['low'],
                'volume' => $latestData['volume'],
                'closes' => array_column($data['values'], 'close')
            ];
        }
        return null;
    }

    private function getDataFromPolygon($symbol)
    {
        $apiKey   = config('APISettings')->polygonApiKey;
        $url      = "https://api.polygon.io/v2/aggs/ticker/{$symbol}/range/1/minute/2021-10-14/2021-10-14?apiKey={$apiKey}";
        $response = file_get_contents($url);
        if ($response === false) {
            log_message('error', "Failed to retrieve data for $symbol from Polygon.io.");
            return null;
        }
        $data = json_decode($response, true);
        if (isset($data['results']) && !empty($data['results'])) {
            $latestData = reset($data['results']);
            return [
                'open'   => $latestData['o'],
                'high'   => $latestData['h'],
                'low'    => $latestData['l'],
                'volume' => $latestData['v'],
                'closes' => array_column($data['results'], 'c')
            ];
        }
        return null;
    }

    private function getDataFromMarketStack($symbol)
    {
        $config = config('APISettings');
        $apiKey = $config->marketstackApiKey;
        if (empty($apiKey)) {
            log_message('error', "🚨 MarketStack API key is missing. Skipping request for $symbol.");
            return null;
        }
        $url      = "http://api.marketstack.com/v1/intraday?access_key={$apiKey}&symbols={$symbol}";
        log_message('info', "🔄 Fetching MarketStack data for $symbol...");
        $response = @file_get_contents($url);
        if ($response === false) {
            log_message('error', "❌ Failed to retrieve data for $symbol from MarketStack.");
            return null;
        }
        $data = json_decode($response, true);
        if (!isset($data['data']) || empty($data['data'])) {
            log_message('error', "⚠️ No valid data received from MarketStack for $symbol.");
            return null;
        }
        $latestData = reset($data['data']);
        return [
            'price'  => $latestData['last'] ?? null,
            'high'   => $latestData['high'] ?? null,
            'low'    => $latestData['low'] ?? null,
            'volume' => $latestData['volume'] ?? null,
        ];
    }

    private function getDataFromIEXCloud($symbol)
    {
        $apiKey = config('APISettings')->iexCloudApiKey ?? '';
        if (empty($apiKey)) {
            log_message('error', "🚨 IEX Cloud API key is missing. Skipping request for {$symbol}");
            return null;
        }
        $url      = "https://cloud.iexapis.com/stable/stock/{$symbol}/intraday-prices?token={$apiKey}";
        $response = @file_get_contents($url);
        if ($response === false) {
            log_message('error', "❌ Failed to retrieve data for $symbol from IEX Cloud. Server timeout or API key issue.");
            return null;
        }
        if ($response === false) {
            log_message('error', "Failed to retrieve data for $symbol from IEX Cloud.");
            return null;
        }
        $data = json_decode($response, true);
        if (isset($data) && !empty($data)) {
            $latestData = reset($data);
            return [
                'open'   => $latestData['open'],
                'high'   => $latestData['high'],
                'low'    => $latestData['low'],
                'volume' => $latestData['volume'],
                'closes' => array_column($data, 'close')
            ];
        }
        return null;
    }

    public function getEnrichmentHistory($alertId)
    {
        return $this->db->table('bf_investment_alert_enrichment')
            ->where('alert_id', $alertId)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getFilingsBySymbol($symbol)
    {
        return $this->db->table('bf_investment_filings')->where('symbol', $symbol)->get()->getResultArray();
    }

    /**
     * Non-datatable fallback (kept, but hardened to avoid tv_symbol when missing)
     */
    public function getFilteredTradeAlerts(array $filters = [], array $options = [])
    {
        // If you have a server-side handler, prefer it.
        if (method_exists($this, 'getFilteredTradeAlertsServerSide')) {
            return $this->getFilteredTradeAlertsServerSide($filters, $options);
        }

        $builder = $this->db->table('bf_investment_trade_alerts a');

        $hasTv = $this->hasColumn('bf_investment_trade_alerts', 'tv_symbol');

        $select = "
            a.id,
            a.ticker,
            a.status,
            a.price,
            a.open,
            a.high,
            a.low
        ";

        if ($hasTv) {
            $select .= ",
            a.tv_symbol,
            CASE
                WHEN a.tv_symbol IS NOT NULL AND a.tv_symbol <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.tv_symbol)
                WHEN a.exchange IS NOT NULL AND a.exchange <> '' AND a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.exchange, ':', a.ticker)
                WHEN a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.ticker)
                ELSE NULL
            END AS chart_link
            ";
        } else {
            $select .= ",
            CASE
                WHEN a.exchange IS NOT NULL AND a.exchange <> '' AND a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.exchange, ':', a.ticker)
                WHEN a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.ticker)
                ELSE NULL
            END AS chart_link
            ";
        }

        $builder->select($select);

        if (!empty($filters['timeRange'])) {
            // add range handling here if needed
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Server-side (DataTables style) — hardened for:
     *  - missing tv_symbol column
     *  - undefined array key 'alert_created'
     */
    public function getFilteredTradeAlertsServerSide(array $dateRange, array $opts): array
    {
        $tableName = 'bf_investment_trade_alerts';

        $hasTv           = $this->hasColumn($tableName, 'tv_symbol');
        $hasAlertCreated = $this->hasColumn($tableName, 'alert_created');

        $base = $this->db->table($tableName . ' a');

        // Build SELECT list safely
        $selectParts = [
            'a.id',
            'a.created_on',
            'a.ticker',
            'a.exchange',
            'a.category',
            'a.price',
            'a.open',
            'a.high',
            'a.low',
            'a.potential_price AS target_price',
            'a.current_price   AS entry_price',
            'a.locked_profit_stop',
            'a.trailing_stop_percent',
        ];

        if ($hasTv) {
            $selectParts[] = 'a.tv_symbol';
            $chartCase = "CASE
                WHEN a.tv_symbol IS NOT NULL AND a.tv_symbol <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.tv_symbol)
                WHEN a.exchange IS NOT NULL AND a.exchange <> '' AND a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.exchange, ':', a.ticker)
                WHEN a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.ticker)
                ELSE NULL
            END AS chart_link";
        } else {
            $chartCase = "CASE
                WHEN a.exchange IS NOT NULL AND a.exchange <> '' AND a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.exchange, ':', a.ticker)
                WHEN a.ticker IS NOT NULL AND a.ticker <> ''
                    THEN CONCAT('https://www.tradingview.com/chart/?symbol=', a.ticker)
                ELSE NULL
            END AS chart_link";
        }

        $selectParts[] = $chartCase;
        $selectParts[] = 'a.status';

        if ($hasAlertCreated) {
            $selectParts[] = 'a.alert_created';
        }

        $base->select(implode(",\n", $selectParts));

        // Date range filter
        if (!empty($dateRange['start']) && !empty($dateRange['end'])) {
            $base->where('a.created_on >=', $dateRange['start']);
            $base->where('a.created_on <=', $dateRange['end']);
        }

        // Safely read option keys (prevents "Undefined array key")
        $alertCreated = $opts['alert_created'] ?? null;
        $category     = $opts['category']      ?? null;
        $q            = trim($opts['q']        ?? '');
        $orderBy      = $opts['orderBy']       ?? 'a.created_on';
        $orderDir     = strtoupper($opts['orderDir'] ?? 'DESC');
        $limit        = (int) ($opts['limit']  ?? 50);
        $offset       = (int) ($opts['offset'] ?? 0);

        if ($hasAlertCreated && $alertCreated !== null) {
            $base->where('a.alert_created', (int) $alertCreated);
        }

        if (!empty($category)) {
            $base->where('a.category', $category);
        }

        if ($this->hasColumn($tableName, 'active')) {
            $base->where('a.active', 1);
        }
        if ($this->hasColumn($tableName, 'status')) {
            $base->where('a.status !=', 'Hidden');
        }

        if ($q !== '') {
            $base->groupStart()
                ->like('a.ticker', $q)
                ->orLike('a.category', $q)
                ->orLike('a.exchange', $q);
            if ($this->hasColumn($tableName, 'company')) {
                $base->orLike('a.company', $q);
            }
            if ($this->hasColumn($tableName, 'tv_title')) {
                $base->orLike('a.tv_title', $q);
            }
            if ($this->hasColumn($tableName, 'tv_description')) {
                $base->orLike('a.tv_description', $q);
            }
            $base->groupEnd();
        }

        // Count filtered
        $filteredBuilder = clone $base;
        $recordsFiltered = (int) ($filteredBuilder->select('COUNT(a.id) AS c')->get()->getRow('c') ?? 0);

        // Order by (fallback if alert_created requested but column not present)
        if (!$hasAlertCreated && stripos($orderBy, 'alert_created') !== false) {
            $orderBy = 'a.created_on';
        }
        if (!in_array($orderDir, ['ASC', 'DESC'], true)) {
            $orderDir = 'DESC';
        }
        $base->orderBy($orderBy, $orderDir);

        if ($limit > 0) {
            $base->limit($limit, $offset);
        }

        $rows = $base->get()->getResultArray();

        // Total (without search filter but with same structural guards)
        $totalBase = $this->db->table($tableName . ' a');

        if (!empty($dateRange['start']) && !empty($dateRange['end'])) {
            $totalBase->where('a.created_on >=', $dateRange['start']);
            $totalBase->where('a.created_on <=', $dateRange['end']);
        }
        if ($hasAlertCreated && $alertCreated !== null) {
            $totalBase->where('a.alert_created', (int) $alertCreated);
        }
        if (!empty($category)) {
            $totalBase->where('a.category', $category);
        }
        if ($this->hasColumn($tableName, 'active')) {
            $totalBase->where('a.active', 1);
        }
        if ($this->hasColumn($tableName, 'status')) {
            $totalBase->where('a.status !=', 'Hidden');
        }

        $recordsTotal = (int) ($totalBase->select('COUNT(a.id) AS c')->get()->getRow('c') ?? 0);

        return [
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $rows,
        ];
    }

    public function getFilteredTradeAlertsBySymbol($symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', strtoupper($symbol))
            ->where('status !=', 'Hidden')
            ->get()
            ->getResultArray();
    }

    public function getStaleTradeAlerts()
    {
        $thresholdTime = date('Y-m-d H:i:s', time() - 3600);
        return $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'In Review')
            ->groupStart()
                ->where('exchange IS NULL')
                ->orWhere('market_data_status', 'pending')
                ->orWhere('updated_at <', $thresholdTime)
            ->groupEnd()
            ->limit(100)
            ->get()
            ->getResultArray();
    }

    public function getFilteredUserAlerts($filters, $userID)
    {
        $builder = $this->db->table('bf_investment_alert_history')->where('send_alert', 1);
        if (!empty($filters['ticker'])) {
            $builder->where('ticker', strtoupper($filters['ticker']));
        }
        if (!empty($filters['category'])) {
            $builder->where('category', $filters['category']);
        }
        if (!empty($filters['date_range'])) {
            $dates = explode(' - ', $filters['date_range']);
            if (count($dates) === 2) {
                $builder->where('created_on >=', $dates[0]);
                $builder->where('created_on <=', $dates[1]);
            }
        }
        return $builder->orderBy('created_on', 'DESC')->limit(50)->get()->getResultArray();
    }

    public function getFilingsByTickers(array $tickers): array
    {
        $tickers = array_values(array_unique(array_filter(array_map('strtoupper', $tickers))));
        if (empty($tickers)) return [];
        return $this->db->table('bf_investment_filings')->whereIn('symbol', $tickers)->get()->getResultArray();
    }

    public function getFreeBSCount($date)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('category', 'Breakout Stock')
            ->where('submitted_date', $date)
            ->where('Free', 'Yes')
            ->countAllResults();
    }

    public function getLast5TradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->orderBy('submitted_date', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
    }

    public function getLast15TradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->select('exchange, ticker')
            ->where('alert_created', 1)
            ->orderBy('submitted_date', 'DESC')
            ->limit(15)
            ->get()
            ->getResultArray();
    }

    public function getLatestAlertHistory($tradeId)
    {
        return $this->db->table('bf_investment_alert_history')
            ->select('id, ticker, price, link, free_chart_link, premium_chart_link, created_on')
            ->where('trade_id', $tradeId)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getRowArray();
    }

    public function getLatestEmailDate()
    {
        $latestEmail = $this->selectMax('email_date')->first();
        return $latestEmail ? $latestEmail->email_date : null;
    }

    public function getLastProcessedTradeAlert()
    {
        return $this->db->table('bf_investment_alert_history')
            ->select('last_alert_processed')
            ->orderBy('last_alert_processed', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    }

    public function getLastScrapedEmails($limit = 100)
    {
        return $this->db->table('bf_investment_scraper')
            ->select('id, email_subject, email_body, email_date, email_identifier, status')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getManagementAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('status', 'Opened')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getManagementAlertsCount()
    {
        return $this->db->table('bf_management_alerts')
            ->where('active', 1)
            ->where('status', 'Opened')
            ->orderBy('id', 'DESC')
            ->get()
            ->getNumRows();
    }

    public function getPendingAlerts(array $params): array
    {
        $q       = trim($params['q'] ?? '');
        $status  = $params['status'] ?? 'Opened';
        $page    = max(1, (int) ($params['page'] ?? 1));
        $perPage = min(100, max(10, (int) ($params['perPage'] ?? 25)));

        $builder = $this->db->table('bf_investment_trade_alerts')->select('*')->where('status', $status);

        if ($q !== '') {
            $like = '%' . $this->db->escapeLikeString($q) . '%';
            $builder->groupStart()
                ->like('ticker', $q)
                ->orLike('exchange', $q)
                ->orLike('category', $q)
                ->orLike('tv_title', $q)
                ->orLike('tv_description', $q)
            ->groupEnd();
        }

        $builder->orderBy('created_on', 'DESC');

        $total   = (clone $builder)->select('COUNT(*) AS c')->get()->getRow('c') ?? 0;
        $results = $builder->limit($perPage, ($page - 1) * $perPage)->get()->getResultArray();

        return [
            'data'    => $results,
            'total'   => (int) $total,
            'page'    => $page,
            'perPage' => $perPage,
        ];
    }

    public function getPendingScraperAlerts()
    {
        return $this->db->table('bf_investment_scraper')
            ->select('summary, created_on, id')
            ->where('status', 'In Review')
            ->get()
            ->getResultArray();
    }

    public function getPendingScraperRecords($limit = 200)
    {
        return $this->db->table('bf_investment_scraper')
            ->select('id, email_subject, email_body, email_date, category, tag, class, segment, summary, email_identifier')
            ->where('status', 'In Review')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getPendingTradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('status', 'In Review')
            ->orderBy('created_on', 'DESC')
            ->orderBy('id', 'DESC')
            ->limit(25)
            ->get()
            ->getResultArray();
    }

    public function getPendingTradeAlertsCount()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('status', 'In Review')
            ->orderBy('id', 'DESC')
            ->get()
            ->getNumRows();
    }

    // In App\Models\AlertsModel
    public function getRecentAlerts($symbol, int $limit = 10): array
    {
        if ($symbol) {
            return $this->db->table('bf_investment_trade_alerts')
                ->where('ticker', strtoupper($symbol))
                ->orderBy('created_on', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray();
        } else {
            return $this->db->table('bf_investment_trade_alerts')
                ->orderBy('created_on', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray();
        }
    }


    public function getRecentChanges()
    {
        return $this->db->table('bf_investment_trade_alert_changes')
            ->orderBy('created_at', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();
    }

    public function getResolvedManagementAlertsCount()
    {
        return $this->db->table('bf_management_alerts')
            ->where('active', 1)
            ->where('status', 'Closed')
            ->orderBy('id', 'DESC')
            ->get()
            ->getNumRows();
    }

    public function getSentAlerts($limit = 50)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('send_alert', 1)
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function getSubscribedUserEmails()
    {
        return $this->db->table('users')
            ->select('email')
            ->where('active', 1)
            ->where('banned', 0)
            ->get()
            ->getResultArray();
    }

    public function getTechnicalSnapshots(string $symbol, int $days = 21): array
    {
        return $this->db->table('bf_investment_technical_snapshots')
            ->where('ticker', $symbol)
            ->orderBy('snapshot_date', 'desc')
            ->limit($days)
            ->get()
            ->getResultArray();
    }

    public function getTickerBySymbol($symbol)
    {
        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
    }

    public function getTickerDetails(string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));

        // FIX: use this model, not $this->alertsModel
        $this->ensureTickerExists($symbol);

        if (method_exists($this, 'getTickerDetailsArray')) {
            return $this->getTickerDetailsArray($symbol);
        }

        $row = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRowArray();
        return [
            'symbol'   => $row['symbol']   ?? $symbol,
            'exchange' => $row['exchange'] ?? 'UNKNOWN',
            'name'     => $row['name']     ?? null,
        ];
    }

    public function getTickerDetailsArray(string $symbol): array
    {
        $row = $this->db->table('bf_investment_tickers')->where('symbol', strtoupper($symbol))->get()->getRowArray();
        if ($row) {
            return [
                'symbol'   => $row['symbol']   ?? strtoupper($symbol),
                'exchange' => $row['exchange'] ?? 'UNKNOWN',
                'name'     => $row['name']     ?? null,
            ];
        }
        return [
            'symbol'   => strtoupper($symbol),
            'exchange' => 'UNKNOWN',
            'name'     => null
        ];
    }

    public function getTickerInfo(string $symbol)
    {
        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
    }

    public function getTierEmails($tierLevel)
    {
        return $this->db->table('users')
            ->select('bf_users.email')
            ->join('bf_users_subscriptions', 'bf_users.id = bf_users_subscriptions.user_id')
            ->where('bf_users_subscriptions.tier', $tierLevel)
            ->get()
            ->getResultArray();
    }

    public function getTradeAlerts()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('status', 'Opened')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getNonActiveTradeAlertsBySymbol()
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('active', 1)
            ->where('alert_created', 0)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getResultArray();
    }

    public function getTradeAlertsWithCreatedFlag()
    {
        return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->get()->getResultArray();
    }

    public function getUnprocessedEmails()
    {
        return $this->db->table('bf_investment_scraper')
            ->select('id, email_subject, email_body, email_date, email_identifier')
            ->where('status', 'In Review')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getUserCreditAccounts($userId)
    {
        return $this->db->table('bf_users_credit_accounts')->where('user_id', $userId)->where('status', 1)->get()->getResultArray();
    }

    public function getUserSingleTrades($tradeID)
    {
        return $this->db->table('bf_investment_trade_alerts')->where('id', $tradeID)->get()->getRowArray();
    }

    public function getUserSubscribedAlerts($userID)
    {
        return $this->db->table('bf_investment_alert_history')
            ->where('user_id', $userID)
            ->where('send_alert', 1)
            ->orderBy('created_on', 'DESC')
            ->limit(50)
            ->get()
            ->getResultArray();
    }

    public function getWeeklyTopPerformance(int $limit = 10): array
    {
        $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
        $sql = "
            SELECT t.ticker,
                   MIN(CASE WHEN h.alerted_on >= ? THEN h.alerted_on END) AS first_date,
                   MAX(h.alerted_on) AS last_date
            FROM bf_investment_alert_history h
            JOIN (
                SELECT DISTINCT ticker FROM bf_investment_alert_history
            ) t ON t.ticker = h.ticker
            WHERE h.alerted_on >= ?
            GROUP BY t.ticker
            ORDER BY t.ticker
        ";
        $rows = $this->db->query($sql, [$sevenDaysAgo, $sevenDaysAgo])->getResultArray();

        $out = [];
        foreach ($rows as $r) {
            if (empty($r['first_date']) || empty($r['last_date'])) {
                continue;
            }
            $first = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['first_date'])->get()->getRowArray();
            $last  = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['last_date'])->get()->getRowArray();
            if (!$first || !$last || ($first['price'] ?? 0) <= 0) {
                continue;
            }
            $perf = (($last['price'] - $first['price']) / $first['price']) * 100.0;
            $out[] = [
                'ticker' => $r['ticker'],
                'from'   => $first['price'],
                'to'     => $last['price'],
                'perf'   => round($perf, 2),
            ];
        }

        usort($out, fn($a, $b) => $b['perf'] <=> $a['perf']);
        return array_slice($out, 0, $limit);
    }

    public function incrementAlertCount($ticker)
    {
        $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->set('alert_count', 'alert_count + 1', false)
            ->update();
    }

    public function insertAlertSnapshot(string $symbol, int $tradeId = null)
    {
        $marketData = $this->fetchMarketData($symbol);
        if (!$marketData || empty($marketData['price']) || $marketData['price'] <= 0) {
            log_message('warning', "insertAlertSnapshot - skipped: No valid price for {$symbol}");
            return false;
        }

        $snapshot = [
            'trade_id'   => $tradeId,
            'ticker'     => $symbol,
            'price'      => floatval($marketData['price']),
            'volume'     => intval($marketData['volume'] ?? 0),
            'rsi'        => floatval($marketData['rsi'] ?? 50),
            'ema_9'      => floatval($marketData['ema_9'] ?? 0),
            'ema_21'     => floatval($marketData['ema_21'] ?? 0),
            'ema_34'     => floatval($marketData['ema_34'] ?? 0),
            'alerted_on' => date('Y-m-d'),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_investment_alert_history')->insert($snapshot);
        log_message('info', "✅ Alert snapshot inserted for {$symbol} with trade_id {$tradeId}");
        return true;
    }

    public function insertFiling($filing)
    {
        $table  = $this->db->table('bf_investment_filings');
        $exists = $table->where('accession_number', $filing['accession_number'])->countAllResults();
        if ($exists == 0) {
            return $table->insert($filing);
        }
        return false;
    }

    public function insertFundamentalData($data)
    {
        return $this->db->table('bf_investment_fundamentals')->insert($data);
    }

    public function insertMarketData(array $data, string $symbol)
    {
        $tickerUpdate = [
            'exchange' => $data['exchange'],
            'type'     => $data['assetType'],
        ];
        if (isset($data['market_cap'])) {
            $tickerUpdate['market_cap'] = $data['market_cap'];
        }
        $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);

        $alertsUpdate = [
            'price'              => $data['price'],
            'volume'             => $data['volume'],
            'exchange'           => $data['exchange'],
            'latest_trading_day' => $data['latest_trading_day'],
            'last_updated'       => date('Y-m-d H:i:s'),
            'open'               => $data['open'],
            'high'               => $data['high'],
            'low'                => $data['low'],
            'previous_close'     => $data['previous_close'],
            'change'             => $data['change'],
            'change_percent'     => $data['change_percent'],
            'market_cap'         => $data['market_cap'] ?? null,
        ];
        $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->where('status', 'Opened')->update($alertsUpdate);

        $historyUpdate = [
            'price'              => $data['price'],
            'volume'             => $data['volume'],
            'exchange'           => $data['exchange'],
            'latest_trading_day' => $data['latest_trading_day'],
            'last_updated'       => date('Y-m-d H:i:s'),
            'open'               => $data['open'],
            'high'               => $data['high'],
            'low'                => $data['low'],
            'previous_close'     => $data['previous_close'],
            'change'             => $data['change'],
            'change_percent'     => $data['change_percent'],
            'market_cap'         => $data['market_cap'] ?? null,
        ];
        $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->where('status', 'Opened')->update($historyUpdate);
    }

    protected function hasColumn(string $table, string $column): bool
    {
        $cacheKey = $table . ':' . $column;
        if (array_key_exists($cacheKey, $this->fieldCache)) {
            return $this->fieldCache[$cacheKey];
        }
        $exists = false;
        foreach ($this->db->getFieldData($table) as $f) {
            if (strcasecmp($f->name, $column) === 0) {
                $exists = true;
                break;
            }
        }
        $this->fieldCache[$cacheKey] = $exists;
        return $exists;
    }

    public function hideTradeAlert($alertId)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('id', $alertId)
            ->update([
                'active'     => 0,
                'status'     => 'Hidden',
                'display'    => 'No',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    public function incrementDistributedCount($ticker)
    {
        $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->set('distributed_count', 'distributed_count + 1', false)
            ->update();
    }

    public function insertTicker($symbol, $marketData)
    {
        $existingTicker = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
        if ($existingTicker) {
            log_message('info', "⚠️ Ticker {$symbol} already exists. Skipping insertion.");
            return false;
        }
        $data = [
            'symbol'     => $symbol,
            'name'       => $marketData['name']     ?? 'Test',
            'currency'   => $marketData['currency'] ?? 'USD',
            'exchange'   => $marketData['exchange'] ?? 'Unknown',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        return $this->db->table('bf_investment_tickers')->insert($data);
    }

    public function insertTradeAlert($tradeData)
    {
        log_message('info', "🔄 insertTradeAlert - Processing trade alert for {$tradeData['ticker']}");

        if (!isset($tradeData['category']) || $tradeData['category'] === null || $tradeData['category'] === '') {
            $tradeData['category'] = 'Uncategorized';
        }

        $emailDate = $tradeData['email_date'] ?? date('Y-m-d H:i:s');

        $existingAlert = $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $tradeData['ticker'])
            ->where('category', $tradeData['category'])
            ->get()
            ->getRowArray();

        if ($existingAlert) {
            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $existingAlert['id'])
                ->update([
                    'occurrences'  => $existingAlert['occurrences'] + 1,
                    'last_updated' => date('Y-m-d H:i:s'),
                    'date'         => $emailDate,
                ]);
        } else {
            $tradeData['status']       = 'In Review';
            $tradeData['created_on']   = date('Y-m-d H:i:s');
            $tradeData['date']         = $emailDate;
            $tradeData['occurrences']  = 1;

            $result = $this->db->table('bf_investment_trade_alerts')->insert($tradeData);

            if ($result) {
                log_message('info', "✅ New trade alert inserted: " . json_encode($tradeData));
            } else {
                log_message('error', "❌ Failed to insert trade alert: " . json_encode($this->db->error()));
            }
        }

        return true;
    }

    public function isEmailProcessed($emailIdentifier)
    {
        $exists = $this->where('email_identifier', $emailIdentifier)->countAllResults() > 0;
        log_message('info', 'Email identifier (' . $emailIdentifier . ') exists: ' . ($exists ? 'Yes' : 'No'));
        return $exists;
    }

    private function logChange($alertId, $changeType, $previousData = null, $newData = [])
    {
        $changeData = [
            'alert_id'        => $alertId,
            'change_type'     => $changeType,
            'previous_status' => $previousData['status'] ?? null,
            'new_status'      => $newData['status'] ?? null,
            'previous_price'  => $previousData['price'] ?? null,
            'new_price'       => $newData['price'] ?? null,
            'previous_volume' => $previousData['volume'] ?? null,
            'new_volume'      => $newData['volume'] ?? null,
            'created_at'      => date('Y-m-d H:i:s')
        ];

        if ($changeType === 'update' && (
            $changeData['previous_status'] !== $changeData['new_status'] ||
            $changeData['previous_price']  !== $changeData['new_price']  ||
            $changeData['previous_volume'] !== $changeData['new_volume']
        )) {
            $this->db->table('bf_investment_trade_alert_changes')->insert($changeData);
        } elseif ($changeType === 'insert') {
            $this->db->table('bf_investment_trade_alert_changes')->insert($changeData);
        }
    }

    public function logTradeAlertChanges($alertId, $oldPrice, $newPrice, $oldVolume, $newVolume)
    {
        return $this->db->table('bf_investment_trade_alert_changes')->insert([
            'alert_id'       => $alertId,
            'change_type'    => 'update',
            'previous_price' => $oldPrice,
            'new_price'      => $newPrice,
            'previous_volume'=> $oldVolume,
            'new_volume'     => $newVolume,
            'created_at'     => date('Y-m-d H:i:s')
        ]);
    }

    public function markScraperAlertProcessed($id)
    {
        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
    }

    public function markAlertAsSent($alertId)
    {
        return $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->update(['notification_sent' => 1]);
    }

    public function markScraperRecordProcessed($id)
    {
        $existing = $this->db->table('bf_investment_scraper')->where('id', $id)->get()->getRow();
        if (!$existing) {
            log_message('error', "❌ Scraper record ID $id not found. Skipping.");
            return false;
        }
        log_message('info', "✅ Marking scraper record ID $id as Processed.");
        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
    }

    public function parseEmailForTradeAlert($email)
    {
        $symbols = $this->extractSymbolsFromText($email['email_subject'] . ' ' . $email['email_body']);
        if (empty($symbols)) {
            log_message('info', "⚠️ No valid symbols found in email ID: {$email['id']}. Skipping.");
            return null;
        }

        $tradeAlerts = [];
        foreach ($symbols as $symbol) {
            $this->ensureTickerExists($symbol);
            $tickerInfo  = $this->getTickerInfo($symbol);
            $tradeAlerts[] = [
                'ticker'           => $symbol,
                'status'           => 'Opened',
                'company'          => $tickerInfo->name     ?? 'Unknown',
                'exchange'         => $tickerInfo->exchange ?? 'Unknown',
                'occurrences'      => 1,
                'created_on'       => date('Y-m-d H:i:s'),
                'last_updated'     => date('Y-m-d'),
                'last_updated_time'=> date('H:i:s'),
            ];
        }
        return $tradeAlerts;
    }

    private function parseFilings($data)
    {
        $filings = [];
        if (!isset($data['filings']['recent'])) {
            return [];
        }
        $recentFilings = $data['filings']['recent'];
        for ($i = 0; $i < count($recentFilings['accessionNumber']); $i++) {
            $filings[] = [
                'symbol'        => $data['tickers'][0] ?? null,
                'cik'           => $data['cik'],
                'accession_number' => $recentFilings['accessionNumber'][$i],
                'filing_date'   => $recentFilings['filingDate'][$i],
                'form_type'     => $recentFilings['form'][$i],
                'document_url'  => "https://www.sec.gov/Archives/edgar/data/{$data['cik']}/{$recentFilings['accessionNumber'][$i]}/{$recentFilings['primaryDocument'][$i]}",
                'created_on'    => date("Y-m-d H:i:s"),
            ];
        }
        return $filings;
    }

    public function processAlertUpdate($symbol, $alertTimestamp)
    {
        $existingAlert = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get()->getRowArray();
        if ($existingAlert) {
            log_message('info', "⚠️ Alert for {$symbol} exists. Updating occurrence count.");
            $this->db->table('bf_investment_trade_alerts')
                ->where('ticker', $symbol)
                ->update([
                    'occurrences'      => $existingAlert['occurrences'] + 1,
                    'last_updated'     => !empty($alertTimestamp) ? date('Y-m-d', strtotime($alertTimestamp)) : date('Y-m-d'),
                    'last_updated_time'=> !empty($alertTimestamp) ? date('H:i:s', strtotime($alertTimestamp)) : date('H:i:s'),
                ]);
        } else {
            log_message('info', "✅ Inserting new alert for {$symbol}.");
            $this->db->table('bf_investment_trade_alerts')->insert([
                'ticker'           => $symbol,
                'status'           => 'Opened',
                'occurrences'      => 1,
                'created_on'       => date('Y-m-d H:i:s'),
                'last_updated'     => !empty($alertTimestamp) ? date('Y-m-d', strtotime($alertTimestamp)) : date('Y-m-d'),
                'last_updated_time'=> !empty($alertTimestamp) ? date('H:i:s', strtotime($alertTimestamp)) : date('H:i:s'),
            ]);
        }

        $this->db->table('bf_investment_alert_history')->insert([
            'ticker'    => $symbol,
            'alerted_on'=> date('Y-m-d H:i:s', strtotime($alertTimestamp)),
        ]);
    }

    public function processSecFilings($symbol)
    {
        log_message('info', "🔍 Checking SEC filings for {$symbol}");
        $existingFilings = $this->getFilingsBySymbol($symbol);
        if (!empty($existingFilings)) {
            log_message('info', "✅ SEC filings for {$symbol} already exist. Skipping fetch.");
            return;
        }
        $filings = $this->fetchSecFilings($symbol);
        if (empty($filings)) {
            log_message('warning', "⚠️ No new SEC filings found for {$symbol}");
            return;
        }
        foreach ($filings as $filing) {
            $this->insertFiling($filing);
            log_message('info', "✅ Stored new SEC filing: {$filing['form_type']} on {$filing['filing_date']} for {$symbol}");
        }
    }

    public function processSecFilingsForActiveTickers(): void
    {
        log_message('info', "🔍 Fetching active tickers...");
        $active = $this->getActiveTickers();

        if (empty($active)) {
            log_message('info', "✅ No active tickers found.");
            return;
        }

        $tickers  = array_column($active, 'ticker');
        $tickers  = array_values(array_unique(array_filter($tickers)));
        $existing = $this->getFilingsByTickers($tickers);

        $haveFilingsBySymbol = [];
        $latestDateBySymbol  = [];

        foreach ($existing as $row) {
            $sym = strtoupper($row['symbol']);
            $haveFilingsBySymbol[$sym] = true;
            $d = $row['filing_date'] ?? null;
            if ($d && (!isset($latestDateBySymbol[$sym]) || $d > $latestDateBySymbol[$sym])) {
                $latestDateBySymbol[$sym] = $d;
            }
        }

        $newSymbols   = array_values(array_diff(array_map('strtoupper', $tickers), array_keys($haveFilingsBySymbol)));
        $existingSyms = array_values(array_intersect(array_map('strtoupper', $tickers), array_keys($haveFilingsBySymbol)));

        if (!empty($newSymbols)) {
            log_message('info', "🚀 Fetching SEC filings for new tickers: " . implode(', ', $newSymbols));
            foreach ($newSymbols as $sym) {
                try {
                    $filings = $this->fetchSecFilings($sym);
                    foreach ($filings as $filing) {
                        $this->insertFiling($filing);
                    }
                } catch (\Throwable $e) {
                    log_message('error', "❌ SEC fetch failed for {$sym}: " . $e->getMessage());
                }
            }
        }

        if (!empty($existingSyms)) {
            foreach ($existingSyms as $sym) {
                $cutoff = $latestDateBySymbol[$sym] ?? null;
                try {
                    $filings = $this->fetchSecFilings($sym);
                    foreach ($filings as $filing) {
                        if ($cutoff && !empty($filing['filing_date']) && $filing['filing_date'] <= $cutoff) {
                            continue;
                        }
                        $this->insertFiling($filing);
                    }
                } catch (\Throwable $e) {
                    log_message('error', "❌ SEC update failed for {$sym}: " . $e->getMessage());
                }
            }
        }

        log_message('info', "✅ processSecFilingsForActiveTickers completed.");
    }

    public function processSymbols()
    {
        $builder     = $this->db->table('bf_investment_scraper');
        $results     = $builder->select('email_body')->get()->getResultArray();
        $symbolCounts = [];

        foreach ($results as $row) {
            if (preg_match_all('/\b[A-Z]{1,5}\b/', $row['email_body'], $matches)) {
                foreach (array_unique($matches[0]) as $symbol) {
                    $symbolCounts[$symbol] = ($symbolCounts[$symbol] ?? 0) + 1;

                    $tickerInfo = $this->getTickerInfo($symbol);
                    if (!$tickerInfo) {
                        $tickerInfo = $this->fetchTickerDetails($symbol);
                    }

                    $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
                    $existingAlert = $alertsBuilder->where('ticker', $symbol)->get()->getRow();

                    if ($existingAlert) {
                        $alertsBuilder->where('ticker', $symbol)->update([
                            'occurrences' => $existingAlert->occurrences + $symbolCounts[$symbol],
                        ]);
                    } else {
                        $alertsBuilder->insert([
                            'ticker'     => $symbol,
                            'occurrences'=> $symbolCounts[$symbol],
                            'company'    => $tickerInfo->name     ?? 'Unknown',
                            'exchange'   => $tickerInfo->exchange ?? 'Unknown',
                            'created_on' => date("Y-m-d H:i:s"),
                        ]);
                    }
                }
            }
        }
        return $symbolCounts;
    }

    public function getOpenedAlertByTicker(string $ticker): ?array
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', strtoupper($ticker))
            ->where('status', 'Opened')
            ->orderBy('id', 'DESC')
            ->get()
            ->getRowArray() ?: null;
    }

    public function upsertOpenedTradeAlert(array $data): array
    {
        $ticker = strtoupper($data['ticker']);
        $existing = $this->getOpenedAlertByTicker($ticker);

        $lastUpdatedDate = $data['last_updated'] ?? date('Y-m-d');
        $lastUpdatedTime = $data['last_updated_time'] ?? date('H:i:s');

        if ($existing) {
            $update = [
                'occurrences'      => ($existing['occurrences'] ?? 1) + 1,
                'last_updated'     => $lastUpdatedDate,
                'last_updated_time'=> $lastUpdatedTime,
                'category'         => $data['category'] ?? $existing['category'],
                'tag'              => $data['tag']      ?? $existing['tag'],
                'class'            => $data['class']    ?? $existing['class'],
                'segment'          => $data['segment']  ?? $existing['segment'],
            ];

            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $existing['id'])
                ->update($update);

            return array_merge($existing, $update);
        }

        $insert = [
            'ticker'            => $ticker,
            'status'            => 'Opened',
            'occurrences'       => 1,
            'category'          => $data['category'] ?? 'Uncategorized',
            'tag'               => $data['tag'] ?? null,
            'class'             => $data['class'] ?? null,
            'segment'           => $data['segment'] ?? null,
            'created_on'        => $data['created_on'] ?? date('Y-m-d H:i:s'),
            'last_updated'      => $lastUpdatedDate,
            'last_updated_time' => $lastUpdatedTime,
        ];

        $this->db->table('bf_investment_trade_alerts')->insert($insert);
        $insert['id'] = $this->db->insertID();

        return $insert;
    }

    public function recordAlertHistory(array $snapshot): void
    {
        $data = [
            'ticker'     => $snapshot['ticker'],
            'alerted_on' => $snapshot['alerted_on'] ?? date('Y-m-d H:i:s'),
        ];

        if ($this->hasColumn('bf_investment_alert_history', 'status') && isset($snapshot['status'])) {
            $data['status'] = $snapshot['status'];
        }

        if ($this->hasColumn('bf_investment_alert_history', 'category') && isset($snapshot['category'])) {
            $data['category'] = $snapshot['category'];
        }

        if ($this->hasColumn('bf_investment_alert_history', 'occurrences') && isset($snapshot['occurrences'])) {
            $data['occurrences'] = $snapshot['occurrences'];
        }

        if ($this->hasColumn('bf_investment_alert_history', 'email_identifier') && isset($snapshot['email_identifier'])) {
            $data['email_identifier'] = $snapshot['email_identifier'];
        }

        if ($this->hasColumn('bf_investment_alert_history', 'created_on')) {
            $data['created_on'] = $snapshot['created_on'] ?? date('Y-m-d H:i:s');
        }

        try {
            $this->db->table('bf_investment_alert_history')->insert($data);
        } catch (\Throwable $e) {
            log_message('error', '❌ Failed to record alert history: ' . $e->getMessage());
        }
    }

    public function processScrapedSymbols(?callable $symbolExtractor = null): bool
    {
        log_message('info', '⚡ Processing scraped emails for trade alerts...');

        $records = $this->getPendingScraperRecords();
        if (empty($records)) {
            log_message('info', '⚠️ No new emails found to process.');
            return false;
        }

        $processed = false;

        foreach ($records as $record) {
            $processed = $this->processScraperRecordPayload($record, $symbolExtractor) || $processed;
        }

        return $processed;
    }

    public function processScraperRecord(int $recordId, ?callable $symbolExtractor = null): bool
    {
        $record = $this->db->table('bf_investment_scraper')->where('id', $recordId)->get()->getRowArray();
        if (!$record) {
            log_message('warning', "⚠️ processScraperRecord - record {$recordId} not found.");
            return false;
        }

        return $this->processScraperRecordPayload($record, $symbolExtractor);
    }

    protected function processScraperRecordPayload(array $record, ?callable $symbolExtractor = null): bool
    {
        log_message('info', "📩 Processing Email ID: {$record['id']}");

        $subject = (string) ($record['email_subject'] ?? '');
        $body    = (string) ($record['email_body'] ?? '');
        $text    = trim($subject . ' ' . $body);

        $symbols = $symbolExtractor ? (array) $symbolExtractor($text) : $this->defaultSymbolExtractor($text);
        $symbols = array_values(array_unique(array_map('strtoupper', $symbols)));

        if (empty($symbols)) {
            log_message('warning', "⚠️ No valid symbols found in email ID {$record['id']}. Marking as processed.");
            $this->markScraperRecordProcessed($record['id']);
            return false;
        }

        foreach ($symbols as $symbol) {
            if (!$this->ensureTickerExists($symbol)) {
                log_message('warning', "⚠️ Skipping {$symbol}; unable to verify ticker existence.");
                continue;
            }

            $alertData = [
                'ticker'            => $symbol,
                'category'          => $record['category'] ?? 'Uncategorized',
                'tag'               => $record['tag'] ?? null,
                'class'             => $record['class'] ?? null,
                'segment'           => $record['segment'] ?? null,
                'created_on'        => date('Y-m-d H:i:s'),
                'last_updated'      => date('Y-m-d'),
                'last_updated_time' => date('H:i:s'),
            ];

            $upserted = $this->upsertOpenedTradeAlert($alertData);

            $historyPayload = [
                'ticker'           => $symbol,
                'alerted_on'       => $record['email_date'] ?? date('Y-m-d H:i:s'),
                'status'           => $upserted['status'] ?? 'Opened',
                'category'         => $alertData['category'],
                'occurrences'      => $upserted['occurrences'] ?? 1,
                'email_identifier' => $record['email_identifier'] ?? null,
            ];

            $this->recordAlertHistory($historyPayload);
        }

        $this->markScraperRecordProcessed($record['id']);
        return true;
    }

    private function defaultSymbolExtractor(string $text): array
    {
        if ($text === '') {
            return [];
        }

        preg_match_all('/(?:\\$)?\\b([A-Z]{1,5})\\b/', strtoupper($text), $matches);
        $symbols = $matches[1] ?? [];

        $stoplist = [
            'THIS','OUTER','INNER','THE','BUY','SELL','LONG','SHORT','OPEN','CLOSE','ALERT','ACTIVE','LIQUIDITY','TODAY','NOW',
            'ENTRY','EXIT','STOP','LIMIT','SIPC','LLC','FINRA','EMAIL','REPLY','USA','USD','NYSE','END','START','AND','WITH','NEWS'
        ];

        return array_values(array_filter($symbols, static function (string $symbol) use ($stoplist): bool {
            return $symbol !== '' && !in_array($symbol, $stoplist, true);
        }));
    }
    public function processTradeAlertsInBatches($batchSize = 50)
    {
        log_message('info', "⚡ processTradeAlertsInBatches - Processing alerts in batches of $batchSize.");

        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'In Review')
            ->orderBy('created_on', 'ASC')
            ->limit($batchSize)
            ->get()
            ->getResultArray();

        if (empty($pendingAlerts)) {
            log_message('info', "✅ No pending alerts to process.");
            return;
        }

        foreach ($pendingAlerts as $alert) {
            $ticker = $alert['ticker'];
            log_message('info', "🔄 Processing Alert for Ticker: $ticker");
            try {
                $marketData = $this->fetchMarketData($ticker);
                if ($marketData) {
                    $this->db->table('bf_investment_trade_alerts')->where('id', $alert['id'])->update([
                        'price'       => $marketData['price']  ?? null,
                        'volume'      => $marketData['volume'] ?? null,
                        'last_updated'=> date('Y-m-d H:i:s'),
                        'status'      => 'Processed',
                    ]);
                    log_message('info', "✅ Successfully updated trade alert for $ticker.");
                } else {
                    log_message('warning', "⚠️ No market data available for $ticker.");
                }
            } catch (\Exception $e) {
                log_message('error', "❌ Error processing trade alert for $ticker: " . $e->getMessage());
            }
            sleep(1);
        }

        log_message('info', "✅ processTradeAlertsInBatches - Completed processing $batchSize alerts.");
    }

    public function storeEmails($emailData)
    {
        log_message('info', 'Attempting to store email: ' . json_encode($emailData));

        // Cast objects to JSON strings if present
        foreach ($emailData as $key => $value) {
            if (is_object($value)) {
                $emailData[$key] = json_encode($value);
            }
        }
        foreach ($emailData as $key => $value) {
            if (is_object($value)) {
                $emailData[$key] = json_encode($value);
            }
        }

        try {
            $inserted = $this->db->table($this->table)->insert($emailData);
            if (!$inserted) {
                throw new \Exception(json_encode($this->db->error()));
            }
            return (int) $this->db->insertID();
        } catch (\Exception $e) {
            log_message('error', '❌ Failed to insert email: ' . $e->getMessage());
        }
    }

    public function getUnprocessedNews(?string $sinceDate = null): array
    {
        $sinceDate = $sinceDate ?: date('Y-m-d 00:00:00');

        return $this->db->table('bf_investment_scraper')
            ->where('email_type', 'news')
            ->where('status', 'In Review')
            ->groupStart()
                ->where('email_date >=', $sinceDate)
                ->orWhere('created_on >=', $sinceDate)
            ->groupEnd()
            ->orderBy('email_date', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function markNewsAsProcessed(int $id): bool
    {
        return (bool) $this->db->table('bf_investment_scraper')
            ->where('id', $id)
            ->update([
                'status'      => 'Processed',
                'modified_on' => date('Y-m-d H:i:s'),
            ]);
    }

    public function storeEnrichment(array $data)
    {
        return $this->db->table('bf_investment_alert_enrichment')->insert($data);
    }

    public function updateMarketingContentByTradeId(int $tradeAlertId, array $data)
    {
        return $this->db->table('bf_investment_alert_history')
            ->where('trade_alert_id', $tradeAlertId)
            ->update($data);
    }
    
    public function submitTradeAlertDetails($data, $alertID = null)
    {
        if ($alertID) {
            return $this->update($alertID, $data);
        } else {
            return $this->insertTradeAlert($data);
        }
    }

    /**
     * Submit or update a TradingView alert.
     */
    public function submitTradingViewPost(array $payload): int
    {
        $now = date('Y-m-d H:i:s');

        $ticker        = strtoupper(trim($payload['ticker'] ?? ''));
        $tvTitle       = trim($payload['tv_title'] ?? '');
        $chartLink     = trim($payload['chart_link'] ?? '');
        $chartImage    = trim($payload['chart_image'] ?? '');
        $tvDescription = trim($payload['tv_description'] ?? '');

        if ($ticker === '' || $tvTitle === '' || $chartLink === '') {
            throw new \InvalidArgumentException('ticker, tv_title, and chart_link are required.');
        }

        $builder = $this->db->table('bf_investment_trade_alerts');
        $existing = $builder->where('ticker', $ticker)->where('status', 'Opened')->get()->getRowArray();

        $data = [
            'ticker'         => $ticker,
            'status'         => 'Opened',
            'category'       => $payload['category'] ?? null,
            'tv_title'       => $tvTitle,
            'tv_description' => $tvDescription,
            'chart_link'     => $chartLink,
            'chart_image'    => $chartImage,
            'last_updated'   => $now,
            'last_updated_time' => $now,
        ];

        if ($existing) {
            $this->db->table('bf_investment_trade_alerts')->where('id', $existing['id'])->update($data);
            $alertId = (int)$existing['id'];
        } else {
            $data['occurrences'] = 1;
            $data['created_on'] = $now;
            $data['submitted_date'] = $now;
            $this->db->table('bf_investment_trade_alerts')->insert($data);
            $alertId = (int)$this->db->insertID();
        }

        $alert = $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray();
        $hist = [
            'ticker'     => $ticker,
            'alerted_on' => $now,
            'price'      => $alert['price'] ?? null,
            'volume'     => $alert['volume'] ?? null,
            'open'       => $alert['open'] ?? null,
            'high'       => $alert['high'] ?? null,
            'low'        => $alert['low'] ?? null,
        ];
        $this->db->table('bf_investment_alert_history')->insert($hist);

        return $alertId;
    }

    public function tickerExists($symbol)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->countAllResults() > 0;
    }
    
    public function trackFailedTicker(string $symbol, string $reason = 'Missing or invalid price', string $source = 'AlphaVantage')
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bf_investment_tickers_nw');

        $exists = $builder->where(['symbol' => $symbol, 'source' => $source])->get()->getRow();

        if ($exists) {
            $builder->where('id', $exists->id)->update([
                'failure_count' => $exists->failure_count + 1,
                'last_detected' => date('Y-m-d H:i:s'),
                'reason' => $reason,
            ]);
        } else {
            $builder->insert([
                'symbol' => $symbol,
                'source' => $source,
                'reason' => $reason,
                'failure_count' => 1,
                'first_detected' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function updateAlertHistory($id, $data)
    {
        $existing = $this->db->table('bf_investment_alert_history')
                             ->where('id', $id)
                             ->get()
                             ->getRowArray();
    
        if ($existing) {
            return $this->db->table('bf_investment_alert_history')
                            ->where('id', $id)
                            ->update($data);
        } else {
            // ⛔️ If inserting, make sure trade_id is set
            $data['trade_id'] = $id; // Or the original $tradeId from controller
            return $this->db->table('bf_investment_alert_history')
                            ->insert($data);
        }
    }       
    
    public function updateAlertPrices(array $updates): int
    {
        $count = 0;
        foreach ($updates as $symbol => $data) {
            if (!is_string($symbol) || $symbol === '') {
                $symbol = $data['ticker'] ?? null;
            }

            if (empty($symbol)) {
                continue;
            }
            $result = $this->db->table('bf_investment_trade_alerts')
                        ->where('ticker', $symbol)
                        ->update([
                            'price'             => $data['price'] ?? null,
                            'volume'            => $data['volume'] ?? null,
                            'open'              => $data['open'] ?? null,
                            'high'              => $data['high'] ?? null,
                            'low'               => $data['low'] ?? null,
                            'last_updated_time' => date('H:i:s'),
                            'last_updated'      => date('Y-m-d'),
                        ]);

            if ($result !== false) {
                $count++;
            }
        }
        return $count;
    }

    public function updateAnalysisSummary($symbol, $exchange, $summary)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->where('exchange', $exchange)
            ->update(['analysis_summary' => $summary]);
    }
    
    public function updateChartOverrideForTicker($ticker, $chartType, $chartData)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->update([
                'chart_override_type' => $chartType,
                'chart_override_data' => $chartData,
                'last_updated' => date('Y-m-d H:i:s')
            ]);
    }
        
    public function updateExchangeForTicker($ticker, $newExchange)
    {
        if (empty($ticker) || empty($newExchange)) {
            log_message('error', "❌ updateExchangeForTicker - Invalid parameters. Ticker: {$ticker}, Exchange: {$newExchange}");
            return false;
        }
    
        $this->db->transStart(); // ✅ Start Transaction for Consistency
    
        // ✅ Update bf_investment_alert_history
        $this->db->table('bf_investment_alert_history')
            ->where('ticker', $ticker)
            ->update(['exchange' => $newExchange]);
    
        // ✅ Update bf_investment_tickers
        $this->db->table('bf_investment_tickers')
            ->where('symbol', $ticker)
            ->update(['exchange' => $newExchange]);
    
        // ✅ Update bf_investment_trade_alerts
        $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $ticker)
            ->update(['exchange' => $newExchange]);
    
        $this->db->transComplete(); // ✅ Complete Transaction
    
        if ($this->db->transStatus() === false) {
            log_message('error', "❌ updateExchangeForTicker - Transaction failed for Ticker: {$ticker}");
            return false;
        }
    
        log_message('info', "✅ updateExchangeForTicker - Successfully updated exchange to {$newExchange} for Ticker: {$ticker}");
        return true;
    }    

    /**
     * Update existing SEC filings if more recent data is found
     */
    public function updateFiling($filing)
    {
        return $this->where('accession_number', $filing['accession_number'])
            ->set('filing_date', $filing['filing_date'])
            ->update();
    }

    public function updateMissingTickerData()
    {
        $tickers = $this->db->table('bf_investment_tickers')
            ->where('name', null)
            ->limit(50) // Avoid hitting API limits
            ->get()
            ->getResultArray();

        foreach ($tickers as $ticker) {
            $details = $this->fetchTickerDetails($ticker['symbol']);
            if ($details) {
                $this->db->table('bf_investment_tickers')
                    ->where('symbol', $ticker['symbol'])
                    ->update([
                        'name' => $details->name,
                        'currency' => $details->currency,
                        'exchange' => $details->exchange
                    ]);
                log_message('info', "Updated ticker details for {$ticker['symbol']}.");
            }
        }
    }

    public function updatePricesBatch(array $priceUpdates)
    {
        foreach ($priceUpdates as $symbol => $price) {
            $this->where('ticker', $symbol)
                 ->set('price', $price)
                 ->update();
        }
    }

    public function updateTicker($data) {
        if (!isset($data['symbol']) || empty($data['symbol'])) {
            log_message('error', "❌ updateTicker() failed: Missing Symbol.");
            return false;
        }
    
        $existingTicker = $this->db->table('bf_investment_tickers')
            ->where('symbol', $data['symbol'])
            ->get()->getRow();
    
        if (!$existingTicker) {
            log_message('warning', "⚠️ Ticker {$data['symbol']} does not exist. Skipping update.");
            return false;
        }
    
        log_message('info', "🔄 Updating Ticker: " . json_encode($data));
    
        return $this->db->table('bf_investment_tickers')
            ->where('symbol', $data['symbol'])
            ->update($data);
    }    

    public function updateTickerInfo($symbol) {
        log_message('info', "🔄 Updating missing data for ticker: {$symbol}");
    
        $ticker = $this->db->table('bf_investment_tickers')
            ->where('symbol', $symbol)
            ->get()
            ->getRowArray();
    
        if (!$ticker) {
            log_message('error', "⚠️ Ticker {$symbol} not found in database.");
            return false;
        }
    
        $updatedData = [];
    
        if (empty($ticker['cik'])) {
            $cik = $this->getCikFromSymbol($symbol);
            if ($cik) $updatedData['cik'] = $cik;
        }
    
        if (empty($ticker['name']) || empty($ticker['exchange']) || empty($ticker['currency']) || empty($ticker['country']) || empty($ticker['type'])) {
            $apiData = $this->fetchTickerDetails($symbol);
            if ($apiData) {
                $updatedData = array_merge($updatedData, [
                    'name' => $apiData->name ?? 'Unknown',
                    'exchange' => $apiData->exchange ?? 'Unknown',
                    'currency' => $apiData->currency ?? 'USD',
                    'country' => $apiData->country ?? 'Unknown',
                    'type' => $apiData->type ?? 'Unknown',
                ]);
            }
        }
    
        if (!empty($updatedData)) {
            $this->db->table('bf_investment_tickers')
                ->where('symbol', $symbol)
                ->update($updatedData);
            log_message('info', "✅ Updated missing ticker data for {$symbol}");
        } else {
            log_message('info', "ℹ️ No missing data found for {$symbol}");
        }
    }
    
    /**
     * Update an existing trade alert
     */
    public function updateTrade($id, $data, $incrementOccurrences = false)
    {
        $builder = $this->db->table('bf_investment_trade_alerts')->where('id', $id);
    
        if ($incrementOccurrences) {
            $builder->set('occurrences', 'occurrences + 1', false);
        }
    
        $result = $builder->update($data);
    
        if ($result) {
            log_message('info', "AlertsModel L404 - Alert updated successfully for ID $id: " . print_r($data, true));
        } else {
            log_message('error', "AlertsModel L406 - Failed to update alert for ID $id. Data: " . print_r($data, true));
        }
    
        return $result;
    }
    

    // Update Trade Alert and log changes
    public function updateTradeAlert($tradeId, $alertData)
    {
        log_message('debug', "🔄 updateTradeAlert() called for ID: $tradeId");
    
        // Remove trade_id from alertData before updating the database
        unset($alertData['trade_id']);
    
        // Ensure 'last_updated' timestamp is always included
        $alertData["last_updated"] = date("Y-m-d H:i:s");
        $alertData["last_updated_time"] = date("H:i:s");
    
        // Ensure `submitted_date` and `time` are always updated
        $alertData["submitted_date"] = date("Y-m-d");
        $alertData["time"] = date("H:i:s");
    
        // Ensure `alert_created` is marked as `1`
        $alertData["alert_created"] = 1;
    
        // Ensure `alert_count` is incremented by `1`
        $this->db->table('bf_investment_trade_alerts')
                 ->where('id', $tradeId)
                 ->set('alert_count', 'alert_count + 1', false)
                 ->update();
    
        // Ensure `trade_type` is stored correctly in `type` column
        if (isset($alertData["trade_type"])) {
            $alertData["type"] = $alertData["trade_type"]; // Map trade_type to type column
            unset($alertData["trade_type"]); // Remove old key
        }
    
        // Fetch existing alert
        $existingAlert = $this->db->table('bf_investment_trade_alerts')
                                  ->where('id', $tradeId)
                                  ->get()
                                  ->getRowArray();
    
        if (!$existingAlert) {
            log_message('error', "❌ No existing trade alert found for ID: $tradeId");
            return false;
        }
    
        // Perform update
        $updateStatus = $this->db->table('bf_investment_trade_alerts')
                                 ->where('id', $tradeId)
                                 ->update($alertData);
    
        if ($updateStatus) {
            log_message('info', "✅ Successfully updated trade alert ID: $tradeId");
        } else {
            log_message('error', "❌ Failed to update trade alert ID: $tradeId");
        }
    
        return $updateStatus;
    }
    
    public function updateTradeAlertWithChart($symbol, $chartType, $chartData)
    {
        return $this->db->table('bf_investment_trade_alerts')
            ->where('ticker', $symbol)
            ->update([
                'tv_chart_type' => $chartType,
                'tv_chart' => $chartData,
                'last_updated' => date('Y-m-d H:i:s')
            ]);
    }
    
    public function updateTradeAlertsWithCurrentPrices() {
        log_message('info', "⚡ updateTradeAlertsWithCurrentPrices - Initiated.");
    
        // Get pending alerts (fetch ticker + last updated timestamp)
        $tradeAlertTickers = $this->getPendingTradeAlerts();
    
        if (empty($tradeAlertTickers)) {
            log_message('info', "✅ No pending trade alerts to update.");
            return;
        }
    
        // Extract tickers needing updates
        $tickersToUpdate = [];
        foreach ($tradeAlertTickers as $alert) {
            $ticker = $alert['ticker'];
            $lastUpdated = !empty($alert['updated_at']) ? strtotime($alert['updated_at']) : time(); // Default to old timestamp if null
    
            if ($lastUpdated < (time() - 900)) {  // Skip if last updated within 15 minutes
                $tickersToUpdate[] = $ticker;
            } else {
                log_message('info', "⏳ Skipping $ticker (Last updated: " . date('Y-m-d H:i:s', $lastUpdated) . ")");
            }
        }
    
        if (empty($tickersToUpdate)) {
            log_message('info', "✅ No tickers require updates.");
            return;
        }
    
        log_message('info', "🔄 Fetching market data for " . count($tickersToUpdate) . " tickers.");
    
        // Fetch batch market data instead of calling API per ticker
        $marketDataBatch = $this->fetchBatchMarketData($tickersToUpdate);
    
        foreach ($tickersToUpdate as $ticker) {
            if (!isset($marketDataBatch[$ticker]) || empty($marketDataBatch[$ticker])) {
                log_message('error', "⚠️ No market data found for $ticker. Skipping insert.");
                continue;
            }            
    
            $marketData = $marketDataBatch[$ticker];
    
            $updateData = [
                'price' => $marketData['price'] ?? null,
                'open' => $marketData['open'] ?? null,
                'high' => $marketData['high'] ?? null,
                'low' => $marketData['low'] ?? null,
                'volume' => $marketData['volume'] ?? null,
                'updated_at' => date('Y-m-d H:i:s') // Update timestamp
            ];
    
            if (isset($marketData['closes'])) {
                $updateData += [
                    'ema5' => $this->calculateEMA($marketData['closes'], '1hr', 5),
                    'ema8' => $this->calculateEMA($marketData['closes'], '1hr', 8),
                    'ema13' => $this->calculateEMA($marketData['closes'], '1hr', 13),
                    'ema34' => $this->calculateEMA($marketData['closes'], '4hr', 34),
                    'ema48' => $this->calculateEMA($marketData['closes'], '4hr', 48)
                ];
            }
    
            // Update database
            $result = $this->db->table('bf_investment_trade_alerts')
                ->where('ticker', $ticker)
                ->update($updateData);
    
            if (!$result) {
                log_message('error', "❌ Failed to update alert data for $ticker - DB error: " . json_encode($this->db->error()));
            } else {
                log_message('info', "✅ Successfully updated market data for $ticker");
            }
        }
    
        log_message('info', "🎯 updateTradeAlertsWithCurrentPrices - Completed.");
    }

    /**
     * Save generated marketing content for a trade alert.
     *
     * @param array $data An associative array containing:
     *                    - trade_alert_id
     *                    - social_twitter
     *                    - social_facebook
     *                    - social_linkedin
     *                    - social_discord
     *                    - email_content
     *                    - blog_content
     *                    - voiceover_script
     *                    - created_on, updated_on (optional)
     * @return mixed The insert ID on success, or false on failure.
     */
    public function saveMarketingContent(array $data)
    {
        $builder = $this->db->table('bf_investment_alert_history');
        return $builder->insert($data);
    }

    /**
     * Retrieve marketing content for a given trade alert.
     *
     * @param int $tradeAlertId
     * @return object|null The row object if found, or null if not.
     */
    public function getMarketingContentByTradeId(int $tradeId)
    {
        $result = $this->db->table('bf_investment_alert_history')
            ->where('trade_id', $tradeId)
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    
        log_message('debug', '🔍 Fetched Marketing Content for Trade ID ' . $tradeId . ': ' . print_r($result, true));
    
        return $result;
    }

    public function storeSecFiling($filing) {
        log_message('info', "📄 Storing SEC Filing for {$filing['symbol']} - Form: {$filing['form_type']}");
    
        $exists = $this->db->table('bf_investment_filings')
            ->where('accession_number', $filing['accession_number'])
            ->countAllResults();
    
        if ($exists == 0) {
            $this->db->table('bf_investment_filings')->insert($filing);
            log_message('info', "✅ SEC Filing Inserted: {$filing['form_type']} for {$filing['symbol']}");
        } else {
            log_message('warning', "⚠️ SEC Filing Already Exists: {$filing['form_type']} for {$filing['symbol']}");
        }
    }
    
    /**
     * ✅ Store Trade Alert if it doesn't already exist
     */
    public function storeTradeAlert($alertData)
    {
        // ✅ Check if alert already exists using the correct column name
        $existingMessage = $this->where('symbol', $alertData['ticker']) // Change 'ticker' to correct column
                               ->where('created_on', $alertData['created_on'])
                               ->first();
    
        // ✅ Insert only if it does not exist
        if (!$existingMessage) {
            return $this->insert([
                'symbol' => $alertData['ticker'], // Change 'ticker' to correct column
                'social_discord' => $alertData['discord_message'],
                'created_on' => $alertData['created_on']
            ]);
        }
        return false; // Alert already exists
    }    

    public function storeUniqueTradeAlert($tradeAlert)
    {
        // ✅ Ensure correct column names
        $existingMessage = $this->db->table('bf_investment_alert_history')->where('symbol', $tradeAlert['ticker']) // If `symbol` is the correct column
                                ->where('created_at', $tradeAlert['created_on']) // Use correct timestamp column
                                ->first();
    
        if (!$existingMessage) {
            $this->db->table('bf_investment_alert_history')->insert([
                'symbol' => $tradeAlert['ticker'], // Adjust column name if needed
                'social_discord' => $tradeAlert['discord_message'],
                'created_at' => $tradeAlert['created_on'] // Use the correct timestamp column
            ]);
        }
    }
        
    /**
     * Update marketing content for a given trade alert.
     *
     * @param int $tradeAlertId
     * @param array $data
     * @return bool True on success, false on failure.
     */
    public function updateMarketingContent(int $tradeAlertId, array $data)
    {
        return $this->db->table('bf_investment_alert_history')
                        ->where('trade_alert_id', $tradeAlertId)
                        ->update($data);
    }
    
    // public function fetchTickerDetails($symbol)
    // {
    //     $ticker = $this->where('symbol', $symbol)->first();

    //     if (!$ticker) {
    //         $apiKey = config('APISettings')->alphaVantageApiKey;
    //         $url = "https://www.alphavantage.co/query?function=OVERVIEW&symbol=$symbol&apikey=$apiKey";

    //         $response = file_get_contents($url);
    //         $data = json_decode($response, true);

    //         if (!empty($data)) {
    //             $newData = [
    //                 'symbol' => $symbol,
    //                 'name' => $data['Name'] ?? '',
    //                 'currency' => $data['Currency'] ?? '',
    //                 'exchange' => $data['Exchange'] ?? '',
    //                 'mic_code' => $data['MarketIdentificationCode'] ?? '',
    //                 'country' => $data['Country'] ?? '',
    //                 'type' => $data['AssetType'] ?? ''
    //             ];
    //             $this->insert($newData);
    //             return $this->where('symbol', $symbol)->first(); // Fetch the newly inserted data
    //         }
    //     }

    //     return $ticker;
    // }
    
    // private function getDataFromAlphaVantageB($symbol) { // 2
    //     $apiKey = config('APISettings')->alphaVantageApiKeyB;
    //     // Fetch Global Quote
    //     $globalQuoteUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    //     $quoteResponse = file_get_contents($globalQuoteUrl);
    //     $quoteData = json_decode($quoteResponse, true);
    
    //     // Fetch Time Series (Intraday 1min for high frequency data)
    //     $timeSeriesUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=1min&apikey={$apiKey}";
    //     $seriesResponse = file_get_contents($timeSeriesUrl);
    //     $seriesData = json_decode($seriesResponse, true);
    
    //     if (!$quoteData || !$seriesData) {
    //         log_message('error', "Failed to retrieve data for $symbol from AlphaVantage.");
    //         return null;
    //     }
    
    //     $result = [];
    //     if (isset($quoteData['Global Quote'])) {
    //         $result = [
    //             'price' => $quoteData['Global Quote']['05. price'],
    //             'open' => $quoteData['Global Quote']['02. open'],
    //             'high' => $quoteData['Global Quote']['03. high'],
    //             'low' => $quoteData['Global Quote']['04. low'],
    //             'volume' => $quoteData['Global Quote']['06. volume']
    //         ];
    //     }
    //     if (isset($seriesData['Time Series (1min)'])) {
    //         $result['closes_1min'] = array_column($seriesData['Time Series (1min)'], '4. close');
    //         // Optionally, collect 1-hour and 4-hour data for EMAs, if your service plan allows multiple timeframes or manual aggregation
    //     }
    
    //     return $result;
    // }  
    
    // private function getDataFromAlphaVantageC($symbol) { // 3
    //     $apiKey = config('APISettings')->alphaVantageApiKeyC;
    //     // Fetch Global Quote
    //     $globalQuoteUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    //     $quoteResponse = file_get_contents($globalQuoteUrl);
    //     $quoteData = json_decode($quoteResponse, true);
    
    //     // Fetch Time Series (Intraday 1min for high frequency data)
    //     $timeSeriesUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=1min&apikey={$apiKey}";
    //     $seriesResponse = file_get_contents($timeSeriesUrl);
    //     $seriesData = json_decode($seriesResponse, true);
    
    //     if (!$quoteData || !$seriesData) {
    //         log_message('error', "Failed to retrieve data for $symbol from AlphaVantage.");
    //         return null;
    //     }
    
    //     $result = [];
    //     if (isset($quoteData['Global Quote'])) {
    //         $result = [
    //             'price' => $quoteData['Global Quote']['05. price'],
    //             'open' => $quoteData['Global Quote']['02. open'],
    //             'high' => $quoteData['Global Quote']['03. high'],
    //             'low' => $quoteData['Global Quote']['04. low'],
    //             'volume' => $quoteData['Global Quote']['06. volume']
    //         ];
    //     }
    //     if (isset($seriesData['Time Series (1min)'])) {
    //         $result['closes_1min'] = array_column($seriesData['Time Series (1min)'], '4. close');
    //         // Optionally, collect 1-hour and 4-hour data for EMAs, if your service plan allows multiple timeframes or manual aggregation
    //     }
    
    //     return $result;
    // }   
    
    // private function getDataFromAlphaVantageD($symbol) { // 4
    //     $apiKey = config('APISettings')->alphaVantageApiKeyD;
    //     // Fetch Global Quote
    //     $globalQuoteUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    //     $quoteResponse = file_get_contents($globalQuoteUrl);
    //     $quoteData = json_decode($quoteResponse, true);
    
    //     // Fetch Time Series (Intraday 1min for high frequency data)
    //     $timeSeriesUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=1min&apikey={$apiKey}";
    //     $seriesResponse = file_get_contents($timeSeriesUrl);
    //     $seriesData = json_decode($seriesResponse, true);
    
    //     if (!$quoteData || !$seriesData) {
    //         log_message('error', "Failed to retrieve data for $symbol from AlphaVantage.");
    //         return null;
    //     }
    
    //     $result = [];
    //     if (isset($quoteData['Global Quote'])) {
    //         $result = [
    //             'price' => $quoteData['Global Quote']['05. price'],
    //             'open' => $quoteData['Global Quote']['02. open'],
    //             'high' => $quoteData['Global Quote']['03. high'],
    //             'low' => $quoteData['Global Quote']['04. low'],
    //             'volume' => $quoteData['Global Quote']['06. volume']
    //         ];
    //     }
    //     if (isset($seriesData['Time Series (1min)'])) {
    //         $result['closes_1min'] = array_column($seriesData['Time Series (1min)'], '4. close');
    //         // Optionally, collect 1-hour and 4-hour data for EMAs, if your service plan allows multiple timeframes or manual aggregation
    //     }
    
    //     return $result;
    // }  
    
    // private function getDataFromAlphaVantageE($symbol) { // 5
    //     $apiKey = config('APISettings')->alphaVantageApiKeyE;
    //     // Fetch Global Quote
    //     $globalQuoteUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    //     $quoteResponse = file_get_contents($globalQuoteUrl);
    //     $quoteData = json_decode($quoteResponse, true);
    
    //     // Fetch Time Series (Intraday 1min for high frequency data)
    //     $timeSeriesUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=1min&apikey={$apiKey}";
    //     $seriesResponse = file_get_contents($timeSeriesUrl);
    //     $seriesData = json_decode($seriesResponse, true);
    
    //     if (!$quoteData || !$seriesData) {
    //         log_message('error', "Failed to retrieve data for $symbol from AlphaVantage.");
    //         return null;
    //     }
    
    //     $result = [];
    //     if (isset($quoteData['Global Quote'])) {
    //         $result = [
    //             'price' => $quoteData['Global Quote']['05. price'],
    //             'open' => $quoteData['Global Quote']['02. open'],
    //             'high' => $quoteData['Global Quote']['03. high'],
    //             'low' => $quoteData['Global Quote']['04. low'],
    //             'volume' => $quoteData['Global Quote']['06. volume']
    //         ];
    //     }
    //     if (isset($seriesData['Time Series (1min)'])) {
    //         $result['closes_1min'] = array_column($seriesData['Time Series (1min)'], '4. close');
    //         // Optionally, collect 1-hour and 4-hour data for EMAs, if your service plan allows multiple timeframes or manual aggregation
    //     }
    
    //     return $result;
    // }   

    // public function fetchMarketData($symbol) {
    //     $apiKey = config('APISettings')->alphaVantageApiKey;
    //     $url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={$symbol}&interval=5min&apikey={$apiKey}";
    
    //     $response = file_get_contents($url);
    //     if ($response === false) {
    //         log_message('error', "Failed to retrieve data for $symbol from API.");
    //         return null;
    //     }
    
    //     $data = json_decode($response, true);
    //     if (isset($data['Time Series (5min)'])) {
    //         $latestData = reset($data['Time Series (5min)']);
    //         return [
    //             'open' => $latestData['1. open'],
    //             'high' => $latestData['2. high'],
    //             'low' => $latestData['3. low'],
    //             'volume' => $latestData['5. volume'],
    //             'closes' => array_column($data['Time Series (5min)'], '4. close') // Collect closes to calculate EMAs
    //         ];
    //     } else {
    //         log_message('info', "No Time Series data available for $symbol. API response: " . json_encode($data));
    //         return null;
    //     }
    // }    
    

    // public function processSymbols()
    // {
    //     $builder = $this->db->table('bf_investment_scraper');
    //     $results = $builder->select('email_body')->get()->getResultArray();
    //     $symbolCounts = [];

    //     foreach ($results as $row) {
    //         $symbols = preg_match_all('/\b[A-Z]{1,5}\b/', $row['email_body'], $matches);
    //         if ($symbols) {
    //             foreach (array_unique($matches[0]) as $symbol) {
    //                 $symbolCounts[$symbol] = ($symbolCounts[$symbol] ?? 0) + 1;

    //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
    //                 $existingAlert = $alertsBuilder->where('ticker', $symbol)->get()->getRow();

    //                 if ($existingAlert) {
    //                     $alertsBuilder->where('ticker', $symbol)->update([
    //                         'occurrences' => $existingAlert->occurrences + $symbolCounts[$symbol],
    //                     ]);
    //                 } else {
    //                     $alertsBuilder->insert([
    //                         'ticker' => $symbol,
    //                         'occurrences' => $symbolCounts[$symbol],
    //                         'created_on' => date("Y-m-d H:i:s"),
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    //     return $symbolCounts;
    // }

    // // public function processSymbols()
    // // {
    // //     // Retrieve AlphaVantage API key from the APIs config
    // //     $apiConfig = new APIs();
    // //     $apiKey = $apiConfig->alphaVantageApiKey;
    // //     $baseUrl = 'https://www.alphavantage.co/query';
    
    // //     // Query builder to read the bf_investment_scraper data
    // //     $builder = $this->db->table('bf_investment_scraper');
    // //     $results = $builder->select('email_body')->get()->getResultArray();
    
    // //     // Array to store symbol counts
    // //     $symbolCounts = [];
    
    // //     foreach ($results as $row) {
    // //         $symbols = preg_match_all('/\b[A-Z]{1,5}\b/', $row['email_body'], $matches);
    // //         if ($symbols) {
    // //             foreach (array_unique($matches[0]) as $symbol) {
    // //                 // Count the occurrences
    // //                 $symbolCounts[$symbol] = ($symbolCounts[$symbol] ?? 0) + 1;
    
    // //                 // Prepare the request URL for AlphaVantage API
    // //                 $queryParams = http_build_query([
    // //                     'function' => 'GLOBAL_QUOTE', // Adjust based on the required data
    // //                     'symbol' => $symbol,
    // //                     'apikey' => $apiKey,
    // //                 ]);
    // //                 $url = "{$baseUrl}?{$queryParams}";
    
    // //                 // Fetch data from AlphaVantage
    // //                 $response = file_get_contents($url);
    // //                 $data = json_decode($response, true);
    
    // //                 // Extract relevant data from the API response
    // //                 $alphaData = [];
    // //                 if (isset($data['Global Quote'])) {
    // //                     $alphaData = $data['Global Quote'];
    // //                 } else {
    // //                     log_message('error', "AlphaVantage API error or empty response for symbol: $symbol");
    // //                     continue;
    // //                 }
    
    // //                 // Insert into bf_investment_alerts table
    // //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
    // //                 $alertsBuilder->insert([
    // //                     'occurrences' => $symbolCounts[$symbol],
    // //                     'created_on' => date("Y-m-d H:i:s"),
    // //                     'ticker' => $alphaData['01. symbol'] ?? null,
    // //                     'open' => $alphaData['02. open'] ?? null,
    // //                     'high' => $alphaData['03. high'] ?? null,
    // //                     'low' => $alphaData['04. low'] ?? null,
    // //                     'price' => $alphaData['05. price'] ?? null,
    // //                     'volume' => $alphaData['06. volume'] ?? null,
    // //                     'latest_trading_day' => $alphaData['07. latest trading day'] ?? null,
    // //                     'previous_close' => $alphaData['08. previous close'] ?? null,
    // //                     'change' => $alphaData['09. change'] ?? null,
    // //                     'change_percent' => $alphaData['10. change percent'] ?? null,
    // //                     'market_cap' => $alphaData['10. market cap'] ?? null, // Example field, adjust as needed
    // //                 ]);
    // //             }
    // //         }
    // //     }

    // //     return $symbolCounts;
    // // }

    /**
     * Mark an alert as marketed and capture the distribution channels used.
     */
    public function markAlertAsMarketed(int $alertId, array $channels = []): bool
    {
        $payload = [
            'marketing_status'      => 'generated',
            'last_marketed_at'      => date('Y-m-d H:i:s'),
            'distribution_channels' => !empty($channels) ? json_encode(array_values($channels)) : null,
        ];

        $result = $this->db
            ->table('bf_investment_trade_alerts')
            ->where('id', $alertId)
            ->set($payload)
            ->update();

        if ($result) {
            log_message('info', sprintf('📣 Marked alert %d as marketed via channels: %s', $alertId, $payload['distribution_channels'] ?? 'none'));
        } else {
            log_message('error', sprintf('❌ Failed to mark alert %d as marketed: %s', $alertId, json_encode($this->db->error())));
        }

        return (bool) $result;
    }

    /**
     * Fetch alerts that still need marketing content generated.
     */
    public function getAlertsPendingMarketing(int $limit = 50)
    {
        return $this->db
            ->table('bf_investment_trade_alerts')
            ->whereIn('status', ['Open', 'Opened', 'Active Buy', 'Active Sell'])
            ->groupStart()
                ->where('marketing_status', null)
                ->orWhere('marketing_status', 'pending')
            ->groupEnd()
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}
?>