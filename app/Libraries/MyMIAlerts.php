<?php
namespace App\Libraries;

use CodeIgniter\Database\BaseConnection;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{APIs, Auth, SiteSettings, SocialMedia};
use App\Libraries\{BaseLoader, MyMIAlphaVantage, MyMIDiscord, MyMIInvestments};
use App\Models\{AlertsModel, TrackerModel, UserModel}; // Assuming your models are in App\Models namespace
// use App\Libraries\{MyMICoin, MyMIGold, MyMIWallet};

#[\AllowDynamicProperties]
class MyMIAlerts
{

    protected $auth;
    protected $cuID;
    protected $db;
    protected $debug;
    protected $helpers = (['auth']);
    protected $request;
    protected $session;
    protected $emailConfig;
    protected $emailHost;
    protected $emailUsername = 'alerts@mymiwallet.com';
    protected $emailPassword;
    protected $siteSettings;
    protected $alertsModel;
    protected $trackerModel;
    protected $userModel;
    protected $MyMIAlphaVantage;
    protected $MyMIInvestments;

    /**
     * Known scanner subject keywords that should be ingested.
     *
     * @var string[]
     */
    private array $scannerSubjectFilters = [
        'All News from All news providers',
        '00 - MyMI ST Curation - 30M',
        '00 - MyMI ST FlipDown - 3M',
        '00 - MyMI ST FlipUp - 5M',
        '00 - MyMI AI Ultron Scanner - 10M',
        '00 - MyMI Super Ultron',
        '00 - MyMI Volume Breakout GapUp - 15Min',
        '00 - MyMI Earnings Drift Continuation - 1Hr',
        '00 - MyMI Golden Cross - Daily',
        '00 - MyMI High Dollar Volume- 30M',
        '00 - MyMI EMA Stack Bullish - 30M',
        '0010 - EMA Liquidity 30Min',
        '0007 - EMA Penny Stocks - 4Hr',
        '00 - MyMI EMA Whale Analyzer - Penny Stocks',
        '00 - MyMI EMA Whale Analyzer - <$25 Stocks',
        '00 - MyMI AI Precision Scanner',
        '00 - MyMI APEX EMA Analyzer - 1Hr',
        '00 - MyMI Penny Swing Scanner',
        '0006 - EMA Penny Stocks - 1Hr',
        '0005 - EMA Liquidity 4Hr - $50M',
        '0004 - EMA Liquidity 1Hr - $50M',
        '0002 - EMA Liquidity 4Hr',
        '0003 - AI Liquidity Stock Scanner',
        '0001 - EMA Liquidity 1Hr',
        '00 - MyMI Scanner',
    ];

    /**
     * Known sender hints that are considered safe for ingestion.
     *
     * @var string[]
     */
    private array $senderFilters = [
        'tradingview',
        'thinkorswim',
        'alerts@mymiwallet.com',
        'tradingview.com',
        'thinkorswim.com',
    ];

    /**
     * Mapping of known subject fragments to scanner names.
     *
     * @var array<string,string>
     */
    private array $subjectCategoryMap = [
        'All News from All news providers'            => 'All_News_Providers',
        '00 - MyMI ST Curation'                       => 'ST_Curation',
        '00 - MyMI ST FlipDown'                       => 'ST_FlipDown',
        '00 - MyMI ST FlipUp'                         => 'ST_FlipUp',
        '00 - MyMI AI Ultron Scanner'                 => 'AI_Ultron_Scanner',
        '00 - MyMI Super Ultron'                      => 'Super_Ultron',
        '00 - MyMI Volume Breakout GapUp'             => 'Volume_Breakout_GapUp',
        '00 - MyMI Earnings Drift Continuation'       => 'Earnings_Drift_Continuation',
        '00 - MyMI Golden Cross'                      => 'Golden_Cross',
        '00 - MyMI High Dollar Volume'                => 'High_Dollar_Volume',
        '00 - MyMI EMA Stack Bullish'                 => 'EMA_Stack_Bullish',
        '0010 - EMA Liquidity 30Min'                  => 'Integrated_EMA_Liquidity_30M',
        '0007 - EMA Penny Stocks - 4Hr'               => 'EMA_Penny_4Hr',
        '00 - MyMI EMA Whale Analyzer - Penny Stocks' => 'EMA_Whale_Penny',
        '00 - MyMI EMA Whale Analyzer - <$25 Stocks'  => 'EMA_Whale_Analyzer_1H',
        '00 - MyMI AI Precision Scanner'              => 'AI_Precision_Scanner',
        '00 - MyMI APEX EMA Analyzer'                 => 'Apex_Futures_Momentum',
        '00 - MyMI Penny Swing Scanner'               => 'AI_Penny_Swing',
        '0006 - EMA Penny Stocks - 1Hr'               => 'EMA_Penny_1Hr',
        '0005 - EMA Liquidity 4Hr - $50M'             => 'EMA_Liquidity_4Hr_50M',
        '0004 - EMA Liquidity 1Hr - $50M'             => 'EMA_Liquidity_1Hr_50M',
        '0003 - AI Liquidity Stock Scanner'           => 'AI_Liquidity_Stock_Scanner',
        '0002 - EMA Liquidity 4Hr'                    => 'EMA_Liquidity_4Hr',
        '0001 - EMA Liquidity 1Hr'                    => 'EMA_Liquidity_1Hr',
        '00 - MyMI AI Precision'                      => 'AI_Precision_Scanner',
    ];

    /**
     * Mapping of timeframe tokens to alert classes.
     *
     * @var array<string,string>
     */
    private array $timeframeClassMap = [
        '1M'  => 'Scalping',
        '3M'  => 'Scalping',
        '5M'  => 'Intraday',
        '10M' => 'Intraday',
        '15M' => 'Intraday',
        '30M' => 'Intraday',
        '45M' => 'Intraday',
        '1H'  => 'Swing',
        '2H'  => 'Swing',
        '4H'  => 'Swing',
        '6H'  => 'Swing',
        '1D'  => 'Position',
        'DAILY' => 'Position',
    ];

    public function __construct(
        ?AlertsModel $alertsModel = null,
        ?BaseConnection $db = null,
        ?MyMIAlphaVantage $alphaVantage = null,
        ?MyMIInvestments $investments = null
    )
    {
        $this->auth = service('authentication');
        $this->db = $db ?? \Config\Database::connect();
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->session = Services::session();
        $this->emailConfig = config('Email');


        $this->emailHost = $this->emailConfig->SMTPHost;
        $this->emailUsername = 'alerts@mymiwallet.com';
        $this->emailPassword = 'MyMI2024!';

        $this->alertsModel = $alertsModel ?? new AlertsModel();
        $this->trackerModel = new TrackerModel();
        $this->userModel = new UserModel();
        $this->MyMIAlphaVantage = $alphaVantage ?? new MyMIAlphaVantage();
        $this->MyMIInvestments = $investments ?? new MyMIInvestments();
        
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');
        $cuID = $this->cuID;
        if (empty($this->cuID)) {
            log_message('debug', 'MyMIAlerts: no authenticated user context detected.');
        }
        if ($this->debug === 1) {
            // log_message('DEBUG', '$this->session __construct() - MyMIUser Library: ' . (print_r($this->session, true)));
        }

        if ($this->debug === 1) {
            // log_message('DEBUG', '$this->cuID __construct() - MyMIUser Library: ' . ($this->cuID ? $this->cuID : 'null'));
        }

    }

    private function buildImapSearchQuery(): string
    {
        $subjectCriteria = array_map(static function (string $keyword): string {
            $safe = str_replace('"', '\\"', $keyword);
            return 'SUBJECT "' . $safe . '"';
        }, array_unique($this->scannerSubjectFilters));

        // Always include the generic "Alert" catch-all so legacy subjects are still captured.
        $subjectCriteria[] = 'SUBJECT "Alert"';

        $senderCriteria = array_map(static function (string $sender): string {
            $safe = str_replace('"', '\\"', $sender);
            return 'FROM "' . $safe . '"';
        }, array_unique($this->senderFilters));

        $criteria = array_merge($subjectCriteria, $senderCriteria);

        return 'UNSEEN (' . implode(' OR ', $criteria) . ')';
    }

    private function formatSender($sender): string
    {
        if (is_array($sender) && isset($sender[0])) {
            $name = trim($sender[0]->personal ?? '');
            $email = ($sender[0]->mailbox ?? '') . '@' . ($sender[0]->host ?? '');
            return trim($name !== '' ? sprintf('%s <%s>', $name, $email) : $email);
        }

        return is_string($sender) ? $sender : '[Unknown Sender]';
    }

    private function decodeMessage(string $body, int $encoding): string
    {
        switch ($encoding) {
            case ENCBASE64:
                return base64_decode($body) ?: '';
            case ENCQUOTEDPRINTABLE:
                return quoted_printable_decode($body);
            default:
                return $body;
        }
    }

    private function fetchEmailBody($inbox, int $emailNumber): string
    {
        $structure = @imap_fetchstructure($inbox, $emailNumber);
        $body = '';

        if ($structure && isset($structure->parts) && is_array($structure->parts)) {
            foreach ($structure->parts as $index => $part) {
                $type = (int) ($part->type ?? 0);
                $subtype = strtolower($part->subtype ?? '');
                if ($type === TYPETEXT && $subtype === 'plain') {
                    $segment = (string) ($index + 1);
                    $body = imap_fetchbody($inbox, $emailNumber, $segment) ?: '';
                    $body = $this->decodeMessage($body, (int) ($part->encoding ?? 0));
                    break;
                }
            }
        }

        if ($body === '') {
            $body = imap_fetchbody($inbox, $emailNumber, '1.2') ?: '';
            if ($body === '') {
                $body = imap_fetchbody($inbox, $emailNumber, '1') ?: '';
            }
            if ($body === '') {
                $body = imap_body($inbox, $emailNumber) ?: '';
            }

            $encoding = $structure->encoding ?? ENC8BIT;
            $body = $this->decodeMessage($body, (int) $encoding);
        }

        return trim($body);
    }

    private function parseScannerEnvelope(string $text): array
    {
        $result = [
            'name'    => null,
            'tf'      => null,
            'tag'     => null,
            'segment' => null,
        ];

        if (preg_match('/NAME\s*=\s*([A-Za-z0-9_\-]+)/', $text, $match)) {
            $result['name'] = $match[1];
        }

        if (preg_match('/TF\s*=\s*([A-Za-z0-9]+(?:M|H|D)?)/i', $text, $match)) {
            $result['tf'] = strtoupper($match[1]);
        }

        if (preg_match('/TAG\s*=\s*([A-Za-z0-9_\-]+)/', $text, $match)) {
            $result['tag'] = $match[1];
        }

        if (preg_match('/SEGMENT\s*=\s*([A-Za-z0-9_\-]+)/', $text, $match)) {
            $result['segment'] = $match[1];
        }

        return $result;
    }

    private function normalizeScannerName(?string $name): ?string
    {
        if ($name === null || $name === '') {
            return null;
        }

        $normalized = preg_replace('/[^A-Za-z0-9]+/', '_', strtoupper($name));
        return $normalized ? trim($normalized, '_') : null;
    }

    private function inferClassFromTimeframe(?string $timeframe): ?string
    {
        if ($timeframe === null || $timeframe === '') {
            return null;
        }

        $tf = strtoupper(str_replace(['MINUTES', 'MINUTE', 'MIN'], 'M', $timeframe));
        $tf = str_replace(['HOURS', 'HOUR'], 'H', $tf);
        $tf = str_replace(['DAYS', 'DAY'], 'D', $tf);

        return $this->timeframeClassMap[$tf] ?? null;
    }

    public function ingestEmailPayload(array $payload): ?array
    {
        $subject = trim((string) ($payload['subject'] ?? 'No Subject'));
        $body    = (string) ($payload['body'] ?? '');
        $date    = $payload['date'] ?? date('Y-m-d H:i:s');
        $sender  = $this->formatSender($payload['sender'] ?? '[Unknown Sender]');

        $identifier = $payload['identifier'] ?? md5($subject . $date . $sender);

        if ($this->alertsModel->isEmailProcessed($identifier)) {
            log_message('info', sprintf('⚠️ Duplicate alert email skipped (%s)', $identifier));
            return null;
        }

        $scanDetails = $this->parseScannerEnvelope($subject . ' ' . $body);
        $category    = $this->determineCategory($subject, $scanDetails['name']);
        $classification = $this->classifyScannerAlert($category);

        $tag     = $scanDetails['tag']     ?? ($classification['tag'] ?? null);
        $segment = $scanDetails['segment'] ?? ($classification['segment'] ?? null);
        $class   = $classification['class'] ?? null;

        $classFromTf = $this->inferClassFromTimeframe($scanDetails['tf']);
        if ($classFromTf !== null) {
            $class = $classFromTf;
        }

        $symbols = $this->extractSymbolsFromText(trim($subject . ' ' . $body));
        $summary = !empty($symbols) ? implode(', ', $symbols) : '[No Symbols Detected]';

        $emailData = [
            'status'           => 'In Review',
            'type'             => 'Trade Alerts',
            'summary'          => $summary,
            'email_date'       => $date,
            'email_subject'    => $subject,
            'email_body'       => mb_substr($body, 0, 500),
            'email_sender'     => $sender,
            'email_identifier' => $identifier,
            'category'         => $category,
            'tag'              => $tag,
            'class'            => $class ?? 'Unclassified',
            'segment'          => $segment,
            'created_on'       => date('Y-m-d H:i:s'),
        ];

        $this->alertsModel->storeEmails($emailData);

        log_message('info', sprintf('📬 Stored alert email "%s" with category %s', $subject, $category));

        return $emailData;
    }

    private function categorizeAlert($body) {
        if (stripos($body, 'Active Buy') !== false) {
            return 'Active Buy';
        } elseif (stripos($body, 'Liquidity Stocks') !== false) {
            return 'Liquidity Stocks';
        }
        return 'Other';
    }

    private function classifyScannerAlert(?string $scannerName): array
    {
        $normalized = $this->normalizeScannerName($scannerName);

        $scannerTags = [
            'ALL_NEWS_PROVIDERS'                     => ['tag' => 'MarketNews',        'class' => 'Information',   'segment' => 'Global'],
            'ST_CURATION'                            => ['tag' => 'ShortTerm',         'class' => 'Curation',      'segment' => 'Intraday'],
            'ST_FLIPDOWN'                            => ['tag' => 'ReversalSignal',    'class' => 'Oscillator',    'segment' => 'ShortTerm'],
            'ST_FLIPUP'                              => ['tag' => 'ReversalSignal',    'class' => 'Oscillator',    'segment' => 'ShortTerm'],
            'AI_ULTRON_SCANNER'                      => ['tag' => 'AdvancedAI',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'ULTRON_SCANNER'                         => ['tag' => 'AdvancedAI',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'SUPER_ULTRON'                           => ['tag' => 'AdvancedAI',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'VOLUME_BREAKOUT_GAPUP'                  => ['tag' => 'BreakoutMomentum',  'class' => 'Momentum',      'segment' => 'SmallCapSurge'],
            'EARNINGS_DRIFT_CONTINUATION'            => ['tag' => 'PostEarningsDrift', 'class' => 'Catalyst',      'segment' => 'EarningsPlays'],
            'GOLDEN_CROSS'                           => ['tag' => 'LongTermMomentum',  'class' => 'TrendReversal', 'segment' => 'Momentum'],
            'HIGH_DOLLAR_VOLUME'                     => ['tag' => 'InstitutionalFlow', 'class' => 'VolumeSpike',   'segment' => 'BlueChips'],
            'EMA_STACK_BULLISH'                      => ['tag' => 'Trend_Strength',    'class' => 'Technical',     'segment' => 'GrowthStocks'],
            'INTEGRATED_EMA_LIQUIDITY_30M'           => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'Intraday'],
            'EMA_LIQUIDITY_1HR'                      => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'SwingWatch'],
            'EMA_LIQUIDITY_1HR_50M'                  => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'LargeCap'],
            'EMA_LIQUIDITY_4HR'                      => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'SwingWatch'],
            'EMA_LIQUIDITY_4HR_50M'                  => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'LargeCap'],
            'INTEGRATED_EMA_LIQUIDITY_SIGNAL'        => ['tag' => 'MomentumScanner',   'class' => 'EMALiquidity',  'segment' => 'SwingWatch'],
            'INTEGRATED_EMA_LIQUIDITY_HIGHDOLLARSCANNER' => ['tag' => 'HighDollarFlow','class' => 'EMALiquidity', 'segment' => 'LargeCap'],
            'AI_LIQUIDITY_STOCK_SCANNER'             => ['tag' => 'AIPatterns',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'AI_LIQUIDITY_SCANNER_1HR'               => ['tag' => 'AIPatterns',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'AI_LIQUIDITY_SCANNER_4HR'               => ['tag' => 'AIPatterns',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'EMA_PENNY_1HR'                          => ['tag' => 'MicroTrend',        'class' => 'LowCapEMA',     'segment' => 'PennyStocks'],
            'EMA_PENNY_4HR'                          => ['tag' => 'MicroTrend',        'class' => 'LowCapEMA',     'segment' => 'PennyStocks'],
            'EMA_WHALE_PENNY'                        => ['tag' => 'SmartMoneyActivity','class' => 'LiquidityEMA',  'segment' => 'PennyStocks'],
            'EMA_WHALE_ANALYZER_1H'                  => ['tag' => 'SmartMoneyActivity','class' => 'LiquidityEMA',  'segment' => 'MidCap'],
            'AI_PRECISION_SCANNER'                   => ['tag' => 'AIPatterns',        'class' => 'MLScanner',     'segment' => 'Momentum'],
            'AI_PENNY_SWING'                         => ['tag' => 'MicroBreakoutAI',   'class' => 'MLPattern',     'segment' => 'PennyStocks'],
            'PENNY_SWING_SCANNER'                    => ['tag' => 'MicroBreakoutAI',   'class' => 'MLPattern',     'segment' => 'PennyStocks'],
            'APEX_FUTURES_MOMENTUM'                  => ['tag' => 'Trend_Strength',    'class' => 'FuturesMomentum','segment' => 'Derivatives'],
            'RSI_BOUNCE_DIVERGENCE'                  => ['tag' => 'ReversalSignal',    'class' => 'Oscillator',    'segment' => 'OversoldPlays'],
            'WHALE_BUY_SIGNAL'                       => ['tag' => 'SmartMoneyActivity','class' => 'LiquidityEMA',  'segment' => 'SwingWatch'],
        ];

        return $scannerTags[$normalized] ?? ['tag' => 'Unknown', 'class' => 'Unclassified', 'segment' => 'Misc'];
    }

    private function determineCategory(string $subject, ?string $scannerName = null): string
    {
        if (!empty($scannerName)) {
            return $scannerName;
        }

        foreach ($this->subjectCategoryMap as $needle => $category) {
            if (stripos($subject, $needle) !== false) {
                return $category;
            }
        }

        log_message('warning', "⚠️ New Alert Type Detected: {$subject}");
        return 'Unknown Alert Type';
    }
    public function enrichTradeAlertsBySymbol(string $symbol)
    {
        $model = new \App\Models\MarketingModel();
        $marketing = new \App\Libraries\MyMIMarketing();
        
        $searchQuery = "{$symbol} stock news financial site";
        $topLinks = $marketing->getTopLinks($searchQuery);
        $compiled = '';
    
        foreach ($topLinks as $link) {
            $cached = $model->getCachedLink($link);
            if ($cached && strtotime($cached['last_enriched_at']) > strtotime('-2 days')) {
                $compiled .= ' ' . strip_tags($cached['content']);
                continue;
            }
    
            $scraped = $marketing->scrapeUrlContent($link);
            if ($scraped) {
                $compiled .= ' ' . strip_tags($scraped);
                $model->cacheScrapedLink($link, $scraped);
            }
        }
    
        if (strlen($compiled) > 1000) {
            $summary  = $marketing->summarizeText($compiled);
            $keywords = $marketing->extractKeywords($compiled);
    
            $model->insertEnrichedTradeAlertSummary([
                'symbol'   => $symbol,
                'summary'  => $summary,
                'keywords' => implode(',', $keywords),
            ]);
    
            $marketing->generatePostsFromSummaryAuto($summary, $keywords);
        }
    }
    
    /**
     * Extract stock symbols (tickers) from text.
     *
     * @param string $text The email subject/body text
     * @return array Extracted ticker symbols
     */
    public function extractSymbolsFromText($text)
    {
        if (empty($text)) {
            log_message('warning', '⚠️ Email text empty — skipping symbol extraction.');
            return [];
        }

        // Match $TSLA or TSLA (1-5 uppercase letters, optional $ prefix)
        preg_match_all('/(?:\$)?\b([A-Z]{1,5})\b/', $text, $matches);

        if (empty($matches[1])) {
            log_message('warning', "⚠️ No stock symbols found in text.");
            return [];
        }

        $raw = array_unique(array_map('trim', $matches[1]));

        // Remove duplicates and false positives
        $stoplist = [
            'THIS','OUTER','INNER','THE','BUY','SELL','LONG','SHORT','OPEN','CLOSE',
            'ALERT','ACTIVE','LIQUIDITY','TODAY','NOW','ENTRY','EXIT','STOP','LIMIT',
            'SIPC','LLC','FINRA','EMAIL','REPLY','TX','USA','USD','NYSE','END','START','A','B','C','AND','TO','IP','NE','DO','NOT'
        ];

        $symbols = array_values(array_filter($raw, function ($s) use ($stoplist) {
            $s = strtoupper(trim($s));
            if ($s === '' || in_array($s, $stoplist, true)) return false;
            return preg_match('/^[A-Z0-9]{1,5}$/', $s) === 1;
        }));

        $symbols = array_values(array_filter($symbols, function ($sym) {
            try {
                return $this->alertsModel->ensureTickerExists($sym) === true;
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

    public function fetchAlphaVantageNews($ticker) {
        $apiKey = config('APISettings')->alphaVantageApiKey;
    
        // Prepare request URL
        $url = "https://www.alphavantage.co/query?function=NEWS_SENTIMENT"
             . "&tickers=" . urlencode($ticker)
             . "&limit=5"
             . "&apikey=" . $apiKey;
    
        $json = file_get_contents($url);
        if ($this->isAlphaVantageExhausted($json)) {
            log_message('error', "🚫 AlphaVantage News Sentiment API limit reached. Raw response: {$json}");
            return [];
        }
        $data = json_decode($json, true);
             
    
        if (!isset($data['feed'])) {
            log_message('error', "❌ AlphaVantage response missing 'feed' for $ticker: " . json_encode($data));
            return [];
        }
    
        $newsItems = [];
        foreach ($data['feed'] as $item) {
            $newsItems[] = [
                'title' => $item['title'] ?? '',
                'summary' => $item['summary'] ?? '',
                'url' => $item['url'] ?? '',
                'published_on' => $item['time_published'] ?? '',
                'source' => $item['source'] ?? 'AlphaVantage',
                'ticker' => $ticker,
                'created_on' => date('Y-m-d H:i:s'),
            ];
        }
    
        return $newsItems;
    }
    
    public function fetchAlphaVantageNewsForTradeAlerts() {
        $alerts = $this->alertsModel->getTradeAlertsWithCreatedFlag();
        log_message('info', '📈 Processing '.count($alerts).' trade alerts.');
    
        foreach ($alerts as $alert) {
            try {
                log_message('info', '🔍 Fetching AlphaVantage news for: '.$alert['ticker']);
                $newsItems = $this->alertManager->fetchAlphaVantageNews($alert['ticker']);
                log_message('info', '📰 '.count($newsItems).' news items fetched for '.$alert['ticker']);
    
                foreach ($newsItems as $news) {
                    $this->marketingModel->insertNewsContent($news, $alert['ticker']);
                }
            } catch (\Throwable $e) {
                log_message('error', '❌ AlphaVantage fetch failed for '.$alert['ticker'].': '.$e->getMessage());
            }
        }
    
        return $this->response->setJSON(['status'=>'success','message'=>'Financial news processed for alerts.']);
    }    
    
    public function fetchAndStoreAlertsEmails()
    {
        log_message('info', '✅ Connecting to IMAP server...');

        $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
        $username = 'alerts@mymiwallet.com';
        $password = $this->emailPassword;

        $inbox = @imap_open($hostname, $username, $password);
        if (!$inbox) {
            log_message('error', '❌ IMAP ERROR: ' . imap_last_error());
            return false;
        }

        $query = $this->buildImapSearchQuery();
        log_message('debug', '🔎 IMAP search query: ' . $query);

        try {
            $emails = imap_search($inbox, $query);
            if (empty($emails)) {
                log_message('info', '⚠️ No new unseen alert emails found.');
                return false;
            }

            log_message('info', '📥 Total new alert emails found: ' . count($emails));

            foreach ($emails as $emailNumber) {
                $header  = imap_headerinfo($inbox, $emailNumber);
                $subject = isset($header->subject) ? imap_utf8($header->subject) : 'No Subject';
                $date    = date('Y-m-d H:i:s', strtotime($header->date ?? 'now'));
                $sender  = $this->formatSender($header->from ?? []);
                $body    = $this->fetchEmailBody($inbox, $emailNumber);

                $payload = [
                    'subject'    => $subject,
                    'date'       => $date,
                    'sender'     => $sender,
                    'body'       => $body,
                    'identifier' => md5($subject . $date . $sender),
                ];

                $this->ingestEmailPayload($payload);
            }

            return true;
        } catch (\Throwable $e) {
            log_message('error', '❌ Exception during IMAP fetch: ' . $e->getMessage());
            return false;
        } finally {
            imap_close($inbox);
        }
    }
    // public function fetchAndStoreAlertsEmails()
    // {
    //     log_message('info', '✅ Connecting to IMAP server...');
    
    //     $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
    //     $username = 'alerts@mymiwallet.com';
    //     $password = $this->emailPassword;
    
    //     $inbox = imap_open($hostname, $username, $password);
    //     if (!$inbox) {
    //         log_message('error', '❌ IMAP ERROR: ' . imap_last_error());
    //         return false;
    //     }
        
    //     try {
    //         // ✅ Fetch Unseen Alert Emails Only
    //         $emails = imap_search($inbox, 'UNSEEN SUBJECT "Alert"');
    //         if (!$emails) {
    //             log_message('info', '⚠️ No new unseen alert emails found.');
    //             return false;
    //         }
    
    //         log_message('info', "📥 Total New Alert Emails Found: " . count($emails));
    
    //         $symbolsToUpdate = [];
    
    //         foreach ($emails as $email_number) {
    //             $header = imap_headerinfo($inbox, $email_number);
    //             $subject = $header->subject ?? 'No Subject';
    //             $date = date("Y-m-d H:i:s", strtotime($header->date));
    //             $sender = $header->from ?? '';
    
    //             if (!preg_match('/(Alert:|Alert: New Symbol|Alert: New Symbols|thinkorswim|tradingview|finviz|investing|stocktwits|marketwatch|yahoo|barchart)/i', $subject)) {
    //                 // log_message('info', "⚠️ Skipping Non-Trading Email: $subject");
    //                 continue;
    //             }
    
    //             $emailIdentifier = md5($subject . $date . json_encode($sender));
    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
    //                 // log_message('info', "⚠️ Duplicate email detected: $subject ($emailIdentifier)");
    //                 continue;
    //             }
    
    //             $body = imap_fetchbody($inbox, $email_number, 1.2);
    //             if (empty($body)) {
    //                 $body = imap_fetchbody($inbox, $email_number, 1);
    //             }
    
    //             $symbols = $this->extractSymbolsFromText($subject . ' ' . $body);
    //             if (empty($symbols)) {
    //                 log_message('warning', "⚠️ No valid stock symbols found in email.");
    //                 continue;
    //             }
    
    //             // ✅ Determine the category
    //             $category = $this->determineCategory($subject);
    //             log_message('info', "📊 Categorized as: {$category}");
    
    //             $emailSender = '';
    //             if (is_array($sender) && isset($sender[0])) {
    //                 $name  = $sender[0]->personal ?? '';
    //                 $email = $sender[0]->mailbox . '@' . $sender[0]->host;
    //                 $emailSender = trim("{$name} <{$email}>");
    //             }
    //             // ✅ Store Email in Database
    //             $emailData = [
    //                 'status'           => 'In Review',
    //                 'type'             => 'Trade Alerts',
    //                 'summary'          => is_array($symbols) ? implode(', ', $symbols) : (string) $symbols,
    //                 'email_date'       => $date,
    //                 'email_subject'    => is_string($subject) ? $subject : json_encode($subject),
    //                 'email_body'       => is_string($body) ? substr($body, 0, 500) : '[Invalid Body]',
    //                 'email_sender'     => is_string($emailSender) ? $emailSender : '[Unknown Sender]',
    //                 'email_identifier' => is_string($emailIdentifier) ? $emailIdentifier : md5(json_encode($emailIdentifier)),
    //                 'category'         => is_string($category) ? $category : 'Other',
    //                 'created_on'       => date("Y-m-d H:i:s"),
    //             ];
    
    //             $this->alertsModel->storeEmails($emailData);
    
    //             // ✅ Insert Each Symbol into Trade Alerts with Category
    //             foreach ($symbols as $symbol) {
    //                 log_message('info', "📊 Processing Trade Alert for Ticker: {$symbol}");

    //                 // Fetch current market price from AlphaVantage
    //                 $currentPrice = $this->MyMIAlphaVantage->getCurrentPrice($symbol);
    //                 log_message('info', "💵 Current Price for {$symbol}: " . (print_r($currentPrice,true) ?? 'N/A'));
    
                    
    //                 // Check if alert already exists
    //                 $existingAlert = $this->db->table('bf_investment_trade_alerts')
    //                     ->where('ticker', $symbol)
    //                     ->where('status', 'In Review')
    //                     ->get()
    //                     ->getRowArray();
    
    //                 if (!$existingAlert) {
    //                     $this->alertsModel->insertTradeAlert([
    //                         'ticker' => $symbol,
    //                         'status' => 'In Review',
    //                         'category' => $category,
    //                         'created_on' => date('Y-m-d H:i:s'),
    //                         'current_price' => $currentPrice ?? null,
    //                     ]);
    //                 }
    
    //                 // ✅ Add symbol to update list
    //                 $symbolsToUpdate[] = $symbol;
    //             }
    //         }
    
    //         // ✅ Process Updates for New & Existing Alerts
    //         if (!empty($symbolsToUpdate)) {
    //             log_message('info', "🔄 Updating Stock Data for " . count($symbolsToUpdate) . " Symbols...");
    //             foreach (array_unique($symbolsToUpdate) as $symbol) {
    //                 $this->MyMIInvestments->updateStockData($symbol);
    //             }
    //         } else {
    //             log_message('info', "📊 No new symbols to update.");
    //         }
    
    //         // ✅ Batch Update Last 50 Alerts if No New Alerts Were Found
    //         if (empty($symbolsToUpdate)) {
    //             log_message('info', "🔄 No new alerts detected. Updating last 50 trade alerts instead...");
    //             $this->updateLastTradeAlerts(50);
    //         }
    
    //         return true;
    //     } catch (Exception $e) {
    //         log_message('error', '❌ Exception occurred: ' . $e->getMessage());
    //     } finally {
    //         imap_close($inbox);
    //     }
    
    //     return true;
    // }
    
    // public function fetchAndStoreAlertsEmails()
    // {
    //     $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
    //     $username = 'alerts@mymiwallet.com';
    //     $password = $this->emailPassword;
    
    //     log_message('info', '✅ Connecting to IMAP server...');
    //     $inbox = imap_open($hostname, $username, $password);
    
    //     if (!$inbox) {
    //         log_message('error', '❌ IMAP ERROR: ' . imap_last_error());
    //         return false;
    //     }
    
    //     log_message('info', '✅ Connected to email server successfully.');
    
    //     try {
    //         // ✅ Fetch only **unseen** emails
    //         $since = date("d-M-Y", strtotime("-1 days"));
    //         $emails = imap_search($inbox, 'SINCE "' . $since . '"');
            
    //         if (!$emails) {
    //             log_message('info', '⚠️ No new unseen emails found.');
    //             return false;
    //         }
    
    //         log_message('info', '📥 Total New Emails Found: ' . count($emails));
    
    //         foreach ($emails as $email_number) {
    //             $header = imap_headerinfo($inbox, $email_number);
    //             $subject = $header->subject ?? 'No Subject';
    //             $date = date("Y-m-d H:i:s", strtotime($header->date));
    //             $sender = $header->from ?? '';
    
    //             // ✅ Generate a unique email identifier to prevent duplicates
    //             $emailIdentifier = md5($subject . $date . json_encode($sender));
    
    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
    //                 log_message('info', "⚠️ Duplicate email detected: $subject ($emailIdentifier)");
    //                 continue;
    //             }
    
    //             // ✅ Fetch email body (sometimes in different sections)
    //             $body = imap_fetchbody($inbox, $email_number, 1.2);
    //             if (empty($body)) {
    //                 $body = imap_fetchbody($inbox, $email_number, 1);
    //             }
    
    //             log_message('info', '📨 Email Body (First 200 chars): ' . substr($body, 0, 200));
    
    //             // ✅ Extract symbols (Stock Tickers)
    //             $symbols = $this->extractSymbolsFromText($subject . ' ' . $body);
    //             if (empty($symbols)) {
    //                 log_message('warning', "⚠️ No valid stock symbols found in email.");
    //                 continue;
    //             }
    
    //             log_message('info', '📊 Extracted Symbols: ' . implode(', ', $symbols));
    
    //             // ✅ Prepare email data for storage
    //             $emailData = [
    //                 'status' => 'In Review',
    //                 'type' => 'Trade Alerts',
    //                 'summary' => implode(', ', $symbols),
    //                 'email_date' => $date,
    //                 'email_subject' => $subject,
    //                 'email_body' => substr($body, 0, 500),
    //                 'email_sender' => json_encode($sender),
    //                 'email_identifier' => $emailIdentifier,
    //                 'created_on' => date("Y-m-d H:i:s"),
    //             ];
    
    //             // ✅ Store email in database
    //             $inserted = $this->alertsModel->storeEmails($emailData);
    
    //             if ($inserted) {
    //                 log_message('info', '✅ Email stored successfully.');
                    
    //                 // ✅ Process each extracted stock symbol
    //                 foreach ($symbols as $symbol) {
    //                     log_message('info', "📊 Processing Trade Alert for Ticker: {$symbol}");
                
    //                     if (!$this->alertsModel->tickerExists($symbol)) {
    //                         $marketData = $this->alertsModel->fetchMarketData($symbol);
    //                         $this->alertsModel->insertTicker($symbol, $marketData);
    //                     }
                
    //                     // ✅ Get the email date from the stored record
    //                     $emailDate = $emailData['email_date'] ?? date('Y-m-d H:i:s'); // Fallback to current time
                
    //                     // ✅ Check if the trade alert already exists
    //                     $existingAlert = $this->alertsModel->getAlertBySymbolExt($symbol);
                        
    //                     if ($existingAlert) {
    //                         // ✅ If it exists, update occurrences and last updated time
    //                         $this->alertsModel->updateTradeAlert($existingAlert['id'], [
    //                             'occurrences'  => $existingAlert['occurrences'] + 1,
    //                             'last_updated' => date('Y-m-d H:i:s'),
    //                             'date'         => $emailDate // Ensure latest email date is updated
    //                         ]);
                
    //                         // log_message('info', "🔄 Updated occurrence count for Ticker: {$symbol} (Now {$existingAlert['occurrences'] + 1})");
                
    //                     } else {
    //                         // ✅ If it does not exist, insert a new record
    //                         $this->alertsModel->insertTradeAlert([
    //                             'ticker'      => $symbol,
    //                             'status'      => 'In Review',
    //                             'created_on'  => date('Y-m-d H:i:s'),
    //                             'date'        => $emailDate, // ✅ Assign email_date here
    //                             'occurrences' => 1
    //                         ]);
                
    //                         log_message('info', "✅ Inserted new trade alert for Ticker: {$symbol}");
    //                     }
    //                 }
    //             } else {
    //                 log_message('error', '❌ Failed to insert email into `bf_investment_scraper`.');
    //             }                
                
    //         }
    
    //     } catch (Exception $e) {
    //         log_message('error', '❌ Exception occurred: ' . $e->getMessage());
    //     } finally {
    //         imap_close($inbox);
    //     }
    
    //     return true;
    // }
    
    public function fetchAndStoreEmails()
    {
        log_message('info', '✅ Connecting to IMAP server...');
    
        $hostname = '{imap.dreamhost.com:993/imap/ssl}INBOX';
        $username = 'alerts@mymiwallet.com';
        $password = $this->emailPassword;
    
        $inbox = imap_open($hostname, $username, $password);
        if (!$inbox) {
            log_message('error', '❌ IMAP ERROR: ' . imap_last_error());
            return false;
        }
    
        log_message('info', '✅ Connected to email server successfully.');
    
        try {
            // Fetch last scrape timestamp
            $lastScraped = $this->db->table('bf_investment_alert_history')
                ->select('last_scrape_timestamp')
                ->orderBy('last_scrape_timestamp', 'DESC')
                ->limit(1)
                ->get()
                ->getRow();
    
            $lastTimestamp = $lastScraped ? date("d-M-Y", strtotime($lastScraped->last_scrape_timestamp)) : date("d-M-Y", strtotime("-1 day"));
    
            log_message('info', "📌 Fetching emails since: {$lastTimestamp}");
    
            // Fetch only emails from the last 24 hours
            $emails = imap_search($inbox, 'SINCE "'.$lastTimestamp.'"');
    
            if (!$emails) {
                log_message('info', '⚠️ No new unseen emails found within the last 24 hours.');
                return false;
            }
            $seenHashes = []; // Ensure we don’t log the same duplicate repeatedly

            foreach ($emails as $email) {
                $hash = md5($email['content'] ?? '');

                if ($this->isDuplicate($hash)) {
                    if (!isset($seenHashes[$hash])) {
                        log_message('info', "🧹 Skipping duplicate email: $hash");
                        $seenHashes[$hash] = true;
                    }
                    continue;
                }

                $header = imap_headerinfo($inbox, $email_number);
                $subject = $header->subject ?? 'No Subject';
                $date = date("Y-m-d H:i:s", strtotime($header->date));
                $sender = $header->from ?? '';
                $emailIdentifier = md5($subject . $date . json_encode($sender));
    
                if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
                    log_message('info', "⚠️ Duplicate email detected: $subject ($emailIdentifier)");
                    continue;
                }
    
                $body = imap_fetchbody($inbox, $email_number, 1.2);
                if (empty($body)) {
                    $body = imap_fetchbody($inbox, $email_number, 1);
                }
    
                log_message('info', '📨 Email Body (First 200 chars): ' . substr($body, 0, 200));
    
                $symbols = $this->extractSymbolsFromText($subject . ' ' . $body);
                if (empty($symbols)) {
                    log_message('warning', "⚠️ No valid stock symbols found in email.");
                    continue;
                }
    
                log_message('info', '📊 Extracted Symbols: ' . implode(', ', $symbols));
    
                $emailData = [
                    'status' => 'In Review',
                    'type' => 'Trade Alerts',
                    'summary' => implode(', ', $symbols),
                    'email_date' => $date,
                    'email_subject' => $subject,
                    'email_body' => substr($body, 0, 500),
                    'email_sender' => json_encode($sender),
                    'email_identifier' => $emailIdentifier,
                    'created_on' => date("Y-m-d H:i:s"),
                ];
    
                $this->alertsModel->storeAlerts($emailData);
            }
    
            // ✅ Update last scrape timestamp
            $this->db->table('bf_investment_alert_history')->insert([
                'last_scrape_timestamp' => date("Y-m-d H:i:s"),
                'processing_status' => 'Completed'
            ]);
    
        } catch (Exception $e) {
            log_message('error', '❌ Exception occurred: ' . $e->getMessage());
        } finally {
            imap_close($inbox);
        }
    
        return true;
    }
        
    public function fetchEmailAlerts()
    {
        $hostname = "{{$this->emailHost}:993/imap/ssl}INBOX";
        $username = $this->emailUsername;
        $password = $this->emailPassword;

        $inbox = imap_open($hostname, $username, $password);

        if (!$inbox) {
            log_message('error', 'Cannot connect to email server: ' . imap_last_error());
            return false;
        }

        $since = date("d-M-Y", strtotime("-1 days"));
        $emails = imap_search($inbox, 'SINCE "' . $since . '"');

        if (!$emails) {
            log_message('info', 'No new alerts found.');
            return true;
        }

        foreach ($emails as $emailNumber) {
            $message = imap_fetchbody($inbox, $emailNumber, 1);
            $alertData = $this->parseEmail($message);

            if ($alertData) {
                $this->alertsModel->storeAlerts($alertData);
                log_message('info', 'Alert stored: ' . print_r($alertData, true));
            }
        }

        imap_close($inbox);

        return true;
    }

    public function fetchMarketData($symbol)
    {
        $apiKey = config('APISettings')->alphaVantageApiKey;
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
        
        $response = @file_get_contents($url);
        if ($response === false || $this->isAlphaVantageExhausted($response)) {
            log_message('error', "🚫 AlphaVantage limit reached or failed for symbol: {$symbol}. Message: {$response}");
            return null;
        }
    
        $data = json_decode($response, true);
    
        if (isset($data['Global Quote'])) {
            return [
                'price'  => $data['Global Quote']['05. price'] ?? null,
                'open'   => $data['Global Quote']['02. open'] ?? null,
                'high'   => $data['Global Quote']['03. high'] ?? null,
                'low'    => $data['Global Quote']['04. low'] ?? null,
                'volume' => $data['Global Quote']['06. volume'] ?? null,
                // 'market_cap' => Not available here
            ];
        }
    
        log_message('error', "Invalid response for symbol: {$symbol}, Data: " . json_encode($data));
        return null;
    }    
    
    public function getAlphaVantageQuote($symbol)
    {
        $apiKey = getenv('ALPHA_VANTAGE_API_KEY'); // Use .env config
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";

        $client = \Config\Services::curlrequest();
        $response = $client->get($url);
        $json = json_decode($response->getBody(), true);

        if (!isset($json['Global Quote'])) {
            throw new \Exception("No data for {$symbol}");
        }

        $quote = $json['Global Quote'];

        return [
            'price' => floatval($quote['05. price'] ?? 0),
            'volume' => intval($quote['06. volume'] ?? 0),
            'vwap' => floatval($quote['05. price'] ?? 0), // You can update if VWAP is available
        ];
    }

    public function getAlertInfo() {
        $resolvedAlertsCount                = 0;
        // $resolvedAlertsCount                = $this->alertsModel->getResolvedManagementAlertsCount();
        $pendingTradeAlerts                 = $this->getPendingTradeAlerts();
        // $pendingTradeAlerts                 = $this->alertsModel->getPendingTradeAlerts();
        $pendingTradeAlertsCount            = $this->alertsModel->getPendingTradeAlertsCount();
        $alertData = [
            'pendingTradeAlerts'            => $pendingTradeAlerts,
            'pendingAlertsCount'            => $pendingTradeAlertsCount,
            'resolvedAlertsCount'           => $resolvedAlertsCount,
            'pendingTradeAlertsCount'       => $pendingTradeAlertsCount,
        ];
        
        return $alertData;
    }

    private function getChartImage($tradeAlert, $tier) {
        if ($tier === 'Free') {
            return $tradeAlert['free_chart_link'] ?? 'https://yourdomain.com/default_chart.jpg'; 
        } else {
            return $tradeAlert['premium_chart_link'] ?? $tradeAlert['link']; 
        }
    }    

    public function getMarketData(string $symbol): array
    {
        try {
            $data = $this->fetchMarketData($symbol);

            // Normalize keys to prevent missing data structure
            return [
                'price' => $data['price'] ?? null,
                'volume' => $data['volume'] ?? null,
                'open' => $data['open'] ?? null,
                'high' => $data['high'] ?? null,
                'low' => $data['low'] ?? null,
                'exchange' => $data['exchange'] ?? null,
                'assetType' => $data['assetType'] ?? null,
                'ipoDate' => $data['ipoDate'] ?? null,
                'status' => $data['status'] ?? null,
                'latest_trading_day' => $data['latest_trading_day'] ?? null,
                'previous_close' => $data['previous_close'] ?? null,
                'change' => $data['change'] ?? null,
                'change_percent' => $data['change_percent'] ?? null,
                'market_cap' => $data['market_cap'] ?? null,
            ];
        } catch (\Throwable $e) {
            log_message('error', "getMarketData - Failed for {$symbol}: " . $e->getMessage());

            // Return empty format to ensure safe fallback
            return [
                'price' => null, 'volume' => null, 'open' => null, 'high' => null, 'low' => null,
                'exchange' => null, 'assetType' => null, 'ipoDate' => null, 'status' => null,
                'latest_trading_day' => null, 'previous_close' => null, 'change' => null,
                'change_percent' => null, 'market_cap' => null,
            ];
        }
    }

    /**
     * Get pending trade alerts with ticker info ensured.
     *
     * @return array
     */
    public function getPendingTradeAlerts()
    {
        $results = $this->alertsModel->getPendingTradeAlerts();

        foreach ($results as $key => $alert) {
            // Symbol normalization
            $symbol = strtoupper($alert['ticker'] ?? '');

            if ($symbol === '') {
                log_message('error', "getPendingTradeAlerts - Empty ticker in row id={$alert['id']} - skipping.");
                continue;
            }

            // Fetch / ensure ticker metadata
            $tickerInfo = $this->getTickerDetails($symbol);

            // Always treat as array
            $exchange = $tickerInfo['exchange'] ?? 'UNKNOWN';
            $company  = $tickerInfo['name'] ?? null;

            // Build a TradingView symbol safely: e.g., "NASDAQ:NVDA"
            // If exchange is unknown, default to NASDAQ for US stocks (adjust to your preference)
            $tvExchange = ($exchange && $exchange !== 'UNKNOWN') ? $exchange : 'NASDAQ';
            $tvSymbol   = rawurlencode($tvExchange . ':' . $symbol);

            // Prefer existing chart if provided, else auto-generate
            $chartLink = !empty($alert['tv_chart'])
                ? $alert['tv_chart']
                : "https://www.tradingview.com/chart/?symbol={$tvSymbol}";

            // Inject enriched fields for downstream consumers
            $results[$key]['exchange']   = $exchange;
            $results[$key]['company']    = $company;
            $results[$key]['chart_link'] = $chartLink;
        }

        return $results;
    }

    public function getAlertStats() {
        $pendingCount = $this->alertsModel->getPendingTradeAlertsCount();
        $resolvedCount = $this->alertsModel->getResolvedAlertsCount(); // Assuming there's a method to fetch this

        return [
            'pending_count' => $pendingCount,
            'resolved_count' => $resolvedCount,
            'total_count' => $pendingCount + $resolvedCount
        ];
    }
    
    /**
     * Ensure we have ticker metadata cached; if missing, create it (via AlertsModel::ensureTickerExists)
     * then return a normalized array: ['symbol' => ..., 'exchange' => ..., 'name' => ...]
     */
    public function getTickerDetails(string $symbol): array
    {
        $symbol = strtoupper(trim($symbol));

        // 1) Try cache table first
        $row = $this->db->table('bf_investment_tickers')
            ->where('symbol', $symbol)
            ->get()
            ->getRowArray();

        if ($row) {
            // Normalize common keys
            return [
                'symbol'   => $row['symbol'] ?? $symbol,
                'exchange' => $row['exchange'] ?? 'UNKNOWN',
                'name'     => $row['name'] ?? null,
            ];
        }

        // 2) Ask model to ensure it exists (this typically calls AlphaVantage SYMBOL_SEARCH and inserts)
        if (!$this->alertsModel) {
            $this->alertsModel = new \App\Models\AlertsModel();
        }

        try {
            // ensureTickerExists should create the row if missing
            $this->alertsModel->ensureTickerExists($symbol);
        } catch (\Throwable $e) {
            log_message('error', "getTickerDetails - ensureTickerExists failed for {$symbol}: " . $e->getMessage());
        }

        // 3) Requery after ensure
        $row = $this->db->table('bf_investment_tickers')
            ->where('symbol', $symbol)
            ->get()
            ->getRowArray();

        if ($row) {
            return [
                'symbol'   => $row['symbol'] ?? $symbol,
                'exchange' => $row['exchange'] ?? 'UNKNOWN',
                'name'     => $row['name'] ?? null,
            ];
        }

        // 4) Last-resort fallback
        return [
            'symbol'   => $symbol,
            'exchange' => 'UNKNOWN',
            'name'     => null,
        ];
    }

    public function getUserInformation($cuID)
    {
        if (empty($cuID)) {
            log_message('error', "Invalid or empty User ID provided in getUserInformation.");
            return null;
        }

        $userData = $this->userModel->getUserAccount($cuID);
        if (!$userData) {
            log_message('error', "Unable to retrieve User Information for User ID: $cuID");
            return null;
        }
    
        
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIUser L289 - $userData: ' . (print_r($userAccount, true)));
        }
        $userData = $userData[0];
        
            if ($this->debug === 1) {
                // log_message('debug', 'MyMIUser L291 - $userData: ' . (print_r($userData, true)));
            }
        // // Ensure that we have a User entity
        // if (!($userEntity instanceof \App\Entities\User)) {
        //     // log_message('error', "Retrieved data is not a User entity. MyMIUser: L336)");
        //     return null;
        // }
        
        // Construct the userInfo array from the retrieved data
        $userInfo = [
            'cuID'                          => $this->cuID,
            'cuRole'                        => $userData['role_id'],
            'cuEmail'                       => $userData['email'],
            'cuUsername'                    => $userData['username'],
            'cuDisplayName'                 => $userData['display_name'],
            'cuFirstName'                   => $userData['first_name'],
            'cuMiddleName'                  => $userData['middle_name'],
            'cuLastName'                    => $userData['last_name'],
            'cuNameSuffix'                  => $userData['name_suffix'],
            // 'cuNameInitials'                => $userData['cuNameInitials'],
            'cuPartner'                     => $userData['partner'],
            'cuReferrer'                    => $userData['referrer'],
            'cuKYC'                         => $userData['kyc'],
            'cuKYCVerified'                 => $userData['kyc_verified'],
            'cuDOB'                         => $userData['dob'],
            'cuSSN'                         => $userData['ssn'],
            'cuPhone'                       => $userData['phone'],
            'cuCompany'                     => $userData['organization'],
            'cuAddress'                     => $userData['address'],
            'cuCity'                        => $userData['city'],
            'cuState'                       => $userData['state'],
            'cuCountry'                     => $userData['country'],
            'cuZipCode'                     => $userData['zipcode'],
            'cuMailingAddress'              => $userData['mailing_address'],
            'cuEmployment'                  => $userData['employment'],
            'cuOccupation'                  => $userData['occupation'],
            'cuSalary'                      => $userData['salary'],
            'cuProofIdentity'               => $userData['proof_identity'],
            'cuProofAddress'                => $userData['proof_address'],
            'cuUserType'                    => $userData['type'],
            'cuWalletID'                    => $userData['wallet_id'], // Assuming this is the correct field
            'walletID'                      => $userData['wallet_id'],
            'cuPublicKey'                   => $userData['wallet_id'], // Double-check this'], seems like a duplicate
            'cuPrivateKey'                  => $userData['private_key'],
            'cuSignupDate'                  => $userData['signup_date'],
            'cuLastLogin'                   => $userData['last_login'],
            'cuReferrerCode'                => $userData['referrer_code'],
        ];

        if ($this->debug === 1) {
            // log_message('debug', '$userInfo array - MyMI User L390: ' . print_r($userInfo, true));
        }
        return $userInfo;
    }

    private function isAlphaVantageExhausted($response)
    {
        return is_string($response) && stripos($response, 'Thank you for using Alpha Vantage!') !== false;
    }
    
    public function isDuplicate($hash)
    {
        $model = model('AlertsModel');
        $result = $model->checkDuplicateEmailHash($hash);
        return ($result !== null);
    }

    private function parseEmail($subject, $message)
    {
        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $sanitizedSubject = $purifier->purify($subject);
        $sanitizedBody = $purifier->purify($message);
    
        // Extract symbols from subject
        preg_match_all('/\b[A-Z]{1,5}\b/', $sanitizedSubject, $symbols);
        $validSymbols = array_filter($symbols[0], function ($symbol) {
            return !in_array($symbol, ['SIPC', 'LLC', 'FINRA', 'IP', 'A', 'NE', 'TO', 'AND']);
        });
    
        preg_match('/Alert:.*Active (Buy|Sell) Alert Scanner\./i', $sanitizedBody, $typeMatch);
    
        if (!empty($validSymbols)) {
            return [
                'summary' => implode(', ', array_unique($validSymbols)),
                'type' => $typeMatch[1] ?? 'Unknown',
                'created_on' => date('Y-m-d H:i:s'),
            ];
        }
    
        log_message('error', 'Failed to parse email subject: ' . $subject);
        return null;
    }
    
    
    public function processScrapedSymbols(): bool
    {
        log_message('info', '⚙️ Processing scraped alert queue via MyMIAlerts.');

        $processed = $this->alertsModel->processScrapedSymbols(function (string $text) {
            return $this->extractSymbolsFromText($text);
        });

        if ($processed) {
            log_message('info', '✅ Scraped alert emails processed successfully.');
        } else {
            log_message('info', '⚠️ No pending scraped alert emails to process.');
        }

        return $processed;
    }
    
    public function fetchBatchMarketData(array $tickers)
    {
        $apiKey = config('APISettings')->alphaVantageApiKey;
        $marketData = [];

        foreach ($tickers as $rawTicker) {
            $symbol = strtoupper(trim($rawTicker));
            if ($symbol === '') {
                continue;
            }

            $query = http_build_query([
                'function' => 'GLOBAL_QUOTE',
                'symbol'   => $symbol,
                'apikey'   => $apiKey,
            ]);

            try {
                $response = file_get_contents('https://www.alphavantage.co/query?' . $query);
                if ($response === false || $this->isAlphaVantageExhausted($response)) {
                    log_message('warning', "🚫 AlphaVantage limit or failure for {$symbol}. Response: {$response}");
                    continue;
                }

                $data = json_decode($response, true);

                if (isset($data['Global Quote']) && is_array($data['Global Quote'])) {
                    $quote = $data['Global Quote'];
                    $marketData[$symbol] = [
                        'price'  => $quote['05. price'] ?? $quote['02. open'] ?? null,
                        'volume' => $quote['06. volume'] ?? null,
                    ];
                    continue;
                }

                if (isset($data['Error Message'])) {
                    log_message('warning', "⚠️ AlphaVantage error for {$symbol}: {$data['Error Message']}");
                    continue;
                }

                log_message('notice', "ℹ️ AlphaVantage returned unexpected payload for {$symbol}: " . json_encode($data));
            } catch (\Throwable $e) {
                log_message('error', "❌ Error fetching market data for {$symbol}: " . $e->getMessage());
            }

            // Small delay to avoid hammering the API when iterating symbols.
            usleep(200000);
        }

        return array_filter($marketData);
    }
    
    public function processTradeAlerts()
    {
        log_message('info', "⚡ processTradeAlerts - Initiating batch processing.");
    
        // Fetch the last processed alert timestamp
        $lastProcessed = $this->db->table('bf_investment_alert_history')
            ->select('last_alert_processed')
            ->orderBy('last_alert_processed', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    
        $lastTimestamp = $lastProcessed ? $lastProcessed->last_alert_processed : '1970-01-01 00:00:00';
    
        // Process only alerts newer than the last processed timestamp
        $alerts = $this->db->table('bf_investment_trade_alerts')
            ->where('created_on >', $lastTimestamp)
            ->where('status', 'In Review')
            ->limit(50)  // 🚀 Process only 50 at a time
            ->get()
            ->getResultArray();
    
        if (empty($alerts)) {
            log_message('info', "✅ No new trade alerts found.");
            return;
        }
    
        foreach ($alerts as $alert) {
            log_message('info', "📊 Processing alert for {$alert['ticker']}");
    
            // Update the alert status
            $this->db->table('bf_investment_trade_alerts')
                ->where('id', $alert['id'])
                ->update(['status' => 'Processed']);
    
            // ✅ Store progress in history table
            $this->db->table('bf_investment_alert_history')->insert([
                'ticker' => $alert['ticker'],
                'alerted_on' => date('Y-m-d H:i:s'),
                'last_alert_processed' => date('Y-m-d H:i:s'),
                'processing_status' => 'Completed'
            ]);
        }
    
        log_message('info', "✅ processTradeAlerts - Completed batch processing.");
    }
    
    public function processTradeAlertsInBatches($batchSize = 50)
    {
        log_message('info', "⚡ processTradeAlertsInBatches - Processing alerts in batches of $batchSize.");

        // Get pending alerts (API requests must not exceed 75/min)
        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
            ->where('status', 'Pending')
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
                // Fetch market data (This method should handle rate limits)
                $marketData = $this->fetchMarketData($ticker);
                if ($marketData) {
                    $this->db->table('bf_investment_trade_alerts')
                        ->where('id', $alert['id'])
                        ->update([
                            'price' => $marketData['price'] ?? null,
                            'volume' => $marketData['volume'] ?? null,
                            'last_updated' => date('Y-m-d H:i:s'),
                            'status' => 'Processed',
                        ]);
                    log_message('info', "✅ Successfully updated trade alert for $ticker.");
                } else {
                    log_message('warning', "⚠️ No market data available for $ticker.");
                }
            } catch (\Exception $e) {
                log_message('error', "❌ Error processing trade alert for $ticker: " . $e->getMessage());
            }

            // **Rate Limit Handling (AlphaVantage API Limit: 75 Requests per minute)**
            sleep(1); // Wait 1 second before next API call
        }

        log_message('info', "✅ processTradeAlertsInBatches - Completed processing $batchSize alerts.");
    }
    
    public function saveTradingViewChart($chartUrl, $ticker)
    {
        // Ensure the directory exists
        $saveDir = FCPATH . 'assets/images/Alerts/Charts/';
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0777, true);
        }
    
        // Define the filename based on the ticker and timestamp
        $timestamp = time();
        $filename = "{$ticker}_chart_{$timestamp}.jpg";
        $savePath = $saveDir . $filename;
    
        // Use cURL to download the image
        $ch = curl_init($chartUrl);
        $fp = fopen($savePath, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    
        // Check if the file was saved successfully
        if (file_exists($savePath)) {
            // Store only the filename in the database
            return $filename;
        } else {
            return null;
        }
    }
            
    public function sendDiscordNotification($tradeAlert)
    {
        if (!empty($tradeAlert['notification_sent'])) {
            log_message('info', "⚠️ Discord alert already queued for: {$tradeAlert['ticker']}");
            return;
        }

        $discord = new MyMIDiscord();
        $summary = $tradeAlert['analysis_summary']
            ?? $tradeAlert['trade_description']
            ?? $tradeAlert['details']
            ?? '';

        $chart = $tradeAlert['trade_chart_link']
            ?? $tradeAlert['chart_link']
            ?? $tradeAlert['tv_chart']
            ?? '';

        $payload = [
            'ticker'   => $tradeAlert['ticker'] ?? '',
            'title'    => $tradeAlert['title'] ?? ($tradeAlert['company'] ?? 'New Signal'),
            'status'   => $tradeAlert['status'] ?? 'Opened',
            'price'    => number_format((float)($tradeAlert['price'] ?? 0), 2),
            'tp'       => $tradeAlert['potential_price'] ?? ($tradeAlert['tp'] ?? ''),
            'sl'       => $tradeAlert['stop_loss'] ?? ($tradeAlert['sl'] ?? ''),
            'summary'  => trim($summary),
            'chartUrl' => $chart,
        ];

        $discord->dispatch('alerts.opened', $payload);
        $this->alertsModel->updateMarketingContent($tradeAlert['id'], ['notification_sent' => 1]);
        log_message('info', "✅ Discord alert queued for: {$tradeAlert['ticker']}");
    }
    
    public function sendDiscordTradeAlert($tradeAlert, $tier) {
        $channels = [
            'Free' => 'YOUR_DISCORD_PUBLIC_CHANNEL_ID',
            'Tier 1' => 'YOUR_DISCORD_TIER_1_CHANNEL_ID',
            'Tier 2' => 'YOUR_DISCORD_TIER_2_CHANNEL_ID',
            'Tier 3' => 'YOUR_DISCORD_TIER_3_CHANNEL_ID'
        ];
    
        $webhookUrl = "https://discord.com/api/webhooks/" . $channels[$tier];
    
        $payload = json_encode([
            'content' => "**📢 Trade Alert - {$tradeAlert['ticker']} ({$tier})**\n" .
                         "🔹 **Price:** {$tradeAlert['price']}\n" .
                         "🔹 **Sentiment:** {$tradeAlert['market_sentiment']}\n" .
                         "📊 [View Chart]({$tradeAlert['link']})"
        ]);
    
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    }
    

    public function sendZapierTradeAlert($tradeAlert) {
        $zapierWebhookUrl = "YOUR_ZAPIER_WEBHOOK_URL";
    
        $payload = json_encode([
            'ticker' => $tradeAlert['ticker'],
            'price' => $tradeAlert['price'],
            'sentiment' => $tradeAlert['market_sentiment'],
            'chart_link' => $tradeAlert['link'],
            'created_on' => $tradeAlert['created_on']
        ]);
    
        $ch = curl_init($zapierWebhookUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $response;
    }
        
    public function updateAlerts()
    {
        $debugMode = false; // Set true for debugging, false for production
        $updateThresholdMinutes = 15; // Only update if last update is older than 15 minutes
    
        // // Optimized logging function (only runs if debugging is enabled)
        // if ($debugMode) {
        //     function $this->debugLog($message)
        //     {
        //         log_message('debug', $message);
        //     }
        // } else {
        //     function $this->debugLog($message) {}
        // }
    
        $this->debugLog("� MyMIAlerts L460 - Starting updateAlerts method...");
    
        // Fetch only alerts that **need updates**
        $alerts = $this->alertsModel->getPendingTradeAlerts();
    
        if (empty($alerts)) {
            $this->debugLog("✅ MyMIAlerts L466 - No pending trade alerts found. Exiting.");
            return;
        }
    
        // **Batch Fetch Market Data for Efficiency**
        $rawTickers = array_column($alerts, 'ticker');
        $tickers = [];
        foreach ($rawTickers as $sym) {
            if ($this->alertsModel->isKnownTicker($sym)) {
                $tickers[] = $sym;
            } else {
                $this->debugLog("updateAlerts - skip unknown symbol {$sym}");
            }
        }
        if (empty($tickers)) {
            $this->debugLog("✅ MyMIAlerts - No valid tickers to update. Exiting.");
            return;
        }
        $marketDataBatch = $this->fetchBatchMarketData($tickers);
    
        foreach ($alerts as $alert) {
            $ticker = $alert['ticker'];
            if (!$this->alertsModel->isKnownTicker($ticker)) {
                log_message('debug', "MyMIAlerts::updateAlerts L1489 - skip unknown symbol {$ticker}");
                continue;
            }
    
            // **Check if the last update was recent**
            $lastUpdatedTime = strtotime($alert['last_updated'] . ' ' . $alert['last_updated_time']);
            $timeSinceLastUpdate = (time() - $lastUpdatedTime) / 60; // Convert to minutes
    
            if ($timeSinceLastUpdate < $updateThresholdMinutes) {
                $this->debugLog("⏳ Skipping {$ticker} (Last update was {$timeSinceLastUpdate} minutes ago)");
                continue;
            }
    
            // **Get market data from batch results**
            $marketData = $marketDataBatch[$ticker] ?? null;
    
            if (!$marketData) {
                $this->debugLog("⚠️ No market data available for {$ticker}. Skipping update.");
                continue;
            }
    
            // **Prepare update data**
            $updateData = array_filter([
                'price'                     => $marketData['price'] ?? null,
                'open'                      => $marketData['open'] ?? null,
                'high'                      => $marketData['high'] ?? null,
                'low'                       => $marketData['low'] ?? null,
                'volume'                    => $marketData['volume'] ?? null,
                'last_updated'              => date('Y-m-d'),
                'last_updated_time'         => date('H:i:s'),
                'occurrences'               => $alert['occurrences'] + 1
            ]);
    
            // **Check if update is needed (Prevent unnecessary writes)**
            $currentAlertData = [
                'price' => $alert['price'],
                'open' => $alert['open'],
                'high' => $alert['high'],
                'low' => $alert['low'],
                'volume' => $alert['volume'],
            ];
    
            if (empty(array_diff_assoc($updateData, $currentAlertData))) {
                $this->debugLog("� No changes detected for {$ticker}, skipping DB update.");
                continue;
            }
    
            // **Store historical snapshot before updating**
            $this->alertsModel->storeAlertHistory($alert);
    
            // **Update trade alert**
            $this->alertsModel->updateTrade($alert['id'], $updateData);
            $this->debugLog("✅ Updated trade alert for {$ticker}: " . print_r($updateData, true));
        }
    
        $this->debugLog("✅ updateAlerts method completed.");
    }    
    
    /**
     * 🔄 **Batch Update Last X Trade Alerts** 
     * If no new alerts are detected, this updates the last 50 trade alerts.
     */
    public function updateLastTradeAlerts($limit = 50)
    {
        log_message('info', "📊 Fetching last {$limit} trade alerts for update...");
    
        $alerts = $this->db->table('bf_investment_trade_alerts')
            ->select('ticker')
            ->orderBy('created_on', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    
        if (empty($alerts)) {
            log_message('info', "✅ No existing alerts found for update.");
            return false;
        }
    
        $tickers = array_column($alerts, 'ticker');
        log_message('info', "🔄 Updating stock data for batch: " . implode(', ', $tickers));
    
        foreach (array_unique($tickers) as $symbol) {
            $this->MyMIInvestments->updateStockData($symbol);
        }
    
        log_message('info', "✅ Successfully updated last {$limit} trade alerts.");
    }  

    // public function updateAlerts()
    // {
    //     $alerts = $this->alertsModel->getPendingTradeAlerts();
    //     foreach ($alerts as $alert) {
    //         $ticker = $alert['ticker'];
    //         $marketData = $this->fetchMarketData($ticker);

    //         if ($marketData) {
    //             $updateData = array_filter([
    //                 'price' => $marketData['price'] ?? null,
    //                 'open' => $marketData['open'] ?? null,
    //                 'high' => $marketData['high'] ?? null,
    //                 'low' => $marketData['low'] ?? null,
    //                 'volume' => $marketData['volume'] ?? null,
    //             ]);

    //             if (!empty($updateData)) {
    //                 $this->alertsModel->updateTrade($alert['id'], $updateData);
    //                 log_message('info', "Alert updated for ticker: {$ticker}");
    //             } else {
    //                 log_message('error', "No valid market data for ticker: {$ticker}");
    //             }
    //         } else {
    //             log_message('error', "Market data unavailable for ticker: {$ticker}");
    //         }
    //     }
    // }

    private function validateApiResponse(array $response, string $ticker): bool {
        if (!isset($response['Global Quote']) || empty($response['Global Quote'])) {
            log_message('error', "API response missing or empty for ticker: {$ticker}");
            return false;
        }
    
        $requiredKeys = ['01. symbol', '05. price', '02. open', '03. high', '04. low', '06. volume'];
        foreach ($requiredKeys as $key) {
            if (!isset($response['Global Quote'][$key])) {
                log_message('error', "API response missing key {$key} for ticker: {$ticker}");
                return false;
            }
        }
    
        return true;
    }

    private function debugLog($message)
    {
        if ($this->debug === 1) { // Only log if debug mode is enabled
            log_message('debug', $message);
        }
    }

}
?>