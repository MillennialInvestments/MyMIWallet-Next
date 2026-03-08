<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Research extends BaseConfig
{
    public string $googleApiKey = '';
    public string $googleCx = '';
    public string $fredApiKey = '';
    public string $alphaVantageApiKey = '';
    public string $secUserAgent = 'MyMIWallet Research support@mymiwallet.com';
    public int $httpTimeout = 20;

    public array $googleCategories = [
        'market_news' => [
            'stock market news today',
            'market outlook today',
            'top stocks today analysis',
        ],
        'earnings' => [
            'earnings reports today',
            'earnings calendar this week',
        ],
        'short_interest' => [
            'high short interest stocks today',
            'short squeeze watchlist today',
        ],
        'insider_trades' => [
            'insider buying stocks today',
            'form 4 insider trades today',
        ],
        'macro' => [
            'federal reserve news',
            'inflation data today',
            'jobs report market reaction',
        ],
        'etf_flows' => [
            'ETF flows today',
            'sector ETF flows today',
        ],
        'commodities' => [
            'gold oil commodities market news',
            'commodity outlook today',
        ],
        'crypto' => [
            'crypto market news today',
            'bitcoin ethereum market update',
        ],
    ];

    public array $fallbackDiscoveryLinks = [
        'market_news' => [
            'https://finance.yahoo.com/',
            'https://www.marketwatch.com/',
            'https://www.reuters.com/markets/',
        ],
        'earnings' => [
            'https://finance.yahoo.com/calendar/earnings',
        ],
        'short_interest' => [
            'https://finance.yahoo.com/',
        ],
        'insider_trades' => [
            'https://www.sec.gov/search-filings',
        ],
        'macro' => [
            'https://fred.stlouisfed.org/',
            'https://www.federalreserve.gov/newsevents.htm',
        ],
        'etf_flows' => [
            'https://finance.yahoo.com/',
        ],
        'commodities' => [
            'https://finance.yahoo.com/commodities',
        ],
        'crypto' => [
            'https://www.coingecko.com/',
        ],
    ];

    public array $fredSeries = [
        'FEDFUNDS' => 'Federal Funds Effective Rate',
        'CPIAUCSL' => 'Consumer Price Index',
        'UNRATE'   => 'Unemployment Rate',
        'DGS10'    => '10Y Treasury',
        'GDP'      => 'Gross Domestic Product',
    ];

    public array $snapshotSymbols = [
        'SPY',
        'QQQ',
        'DIA',
        'IWM',
        'VIX',
        'DXY',
        'GLD',
        'SLV',
        'USO',
        'TLT',
        'BTC',
        'ETH',
    ];

    public array $sectorEtfs = [
        'XLB', 'XLE', 'XLF', 'XLI', 'XLK', 'XLP', 'XLRE', 'XLU', 'XLV', 'XLY'
    ];

    public array $cryptoIds = [
        'bitcoin',
        'ethereum',
        'solana',
        'ripple',
        'dogecoin',
    ];

    public array $sentimentPositive = [
        'beat', 'beats', 'surge', 'bullish', 'upgrade', 'strong', 'outperform', 'buy',
    ];

    public array $sentimentNegative = [
        'miss', 'misses', 'drop', 'bearish', 'downgrade', 'weak', 'underperform', 'sell',
    ];

    public string $reportsPath = ROOTPATH . 'docs/reports/';
    public string $knowledgeGraphPath = ROOTPATH . 'docs/_financial_knowledge_graph.json';
}