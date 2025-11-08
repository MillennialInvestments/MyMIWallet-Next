<?php



namespace App\Config;



use CodeIgniter\Config\BaseConfig;



class APIs extends BaseConfig

{

    // Email Password

    public string $emailPassword = 'MyMI2024!';



    // Alpaca settings

    public string $alpacaDashboard = "https://dash.tradier.com/settings/api";

    public string $alpacaApiUrl = "https://broker-api.sandbox.alpaca.markets/";

    public string $alpacaApiKey = "CK8UROMXOVTWG6OYK0UN";

    public string $alpacaApiSecret = "vBY4CqLpigoJb1BOhh1nghNMm690aBpwaYZEmats";

    public string $alpacaApiDocs = "https://broker-app.alpaca.markets/dev/quick-start";

    public string $alpacaApiSdk = "#";

    public string $alpacaBatch = "#";

    public string $alpacaWebsocketDocs = "#";



    // Alpha Vantage settings

    public string $alphaVantageApiKey = "QR3496M31T2L2LM0"; // Premium Key

    // public string $alphaVantageApiKey = "NPVSPL7MQJUYU9MH"; // Premium Key

    // public string $alphaVantageApiKey = "676X0XZU2C4PKEVN";

    public string $alphaVantageApiKeyA = "676X0XZU2C4PKEVN";

    public string $alphaVantageApiKeyB = "K8MBGU98MTNKCYUE";

    public string $alphaVantageApiKeyC = "8O1LJO4DKARM4132";

    public string $alphaVantageApiKeyD = "L5OQIW3RSLBBTMTH";

    public string $alphaVantageApiKeyE = "70BOHXX3E6JX9H88";

    public string $alphaVantageApiUrl = "#";

    public string $alphaVantageGlobalQuote = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageBalanceSheet = "https://www.alphavantage.co/query?function=BALANCE_SHEET&symbol={symbol}&apikey={api_key}";

    // public string $alphaVantageGlobalQuote = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageBondInfo = "https://www.alphavantage.co/query?function=BOND_INFO&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageCommodityData = "https://www.alphavantage.co/query?function=COMMODITY_DATA&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageCompanyOverview = "https://www.alphavantage.co/query?function=OVERVIEW&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageCryptoDaily = "https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_DAILY&symbol={symbol}&market={market}&apikey={api_key}";

    public string $alphaVantageCryptoMonthly = "https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_MONTHLY&symbol={symbol}&market={market}&apikey={api_key}";

    public string $alphaVantageCryptoWeekly = "https://www.alphavantage.co/query?function=DIGITAL_CURRENCY_WEEKLY&symbol={symbol}&market={market}&apikey={api_key}";

    public string $alphaVantageCryptoRating = "https://www.alphavantage.co/query?function=CRYPTO_RATING&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageEarningsCalendar = "https://www.alphavantage.co/query?function=EARNINGS_CALENDAR&apikey={api_key}";

    public string $alphaVantageEconomicIndicator = "https://www.alphavantage.co/query?function=ECONOMIC_INDICATOR&indicator={indicator}&apikey={api_key}";

    public string $alphaVantageEtfDaily = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageForeignStockInfo = "https://www.alphavantage.co/query?function=FOREIGN_STOCK_INFO&symbol={symbol}&apikey={api_key}";

    public string $alphaVantageFxIntraday = "https://www.alphavantage.co/query?function=FX_INTRADAY&from_symbol={from_currency}&to_symbol={to_currency}&interval={interval}&apikey={api_key}";

    // ... and so on for other Alpha Vantage settings



    // ApplePay - using Composer: stripe/stripe-php, can use braintree/braintree // !! FIX THIS 

    public string $appleStripeAPI = ''; 



    // BrandFetch - Logo / Image Fetching

    public string $brandfetchAPIKey = "W1LCwvoS9wVC3hhZFc8HpGydzQgshcG4ynQvM+cst2g=";



    // CashApp  - using Composer: square/square // !! FIX THIS

    public string $cashappAccessToken = ''; 

    public string $cashappEnvironment = ''; 



    // CoinAPI settings

    public string $coinapiApiKey = "6D41F75F-1160-4622-B1D0-10B187ADCCC8";

    public string $coinapiApiUrl = "#";

    public string $coinapiApiDocs = "https://docs.coinapi.io/";

    public string $coinapiApiSdk = "https://github.com/coinapi/coinapi-sdk";

    // ... Include other CoinAPI settings similarly



    // EOD Historical Data (EODHD) settings

    public string $elevenLabsAPIKey = '';

    public string $elevenLabsVoiceId = '';



    // EOD Historical Data (EODHD) settings

    public string $eodhdDashboard = "https://eodhd.com/cp/settings";

    public string $eodhdApiKey = "651b4b7c26c7b0.23125692";

    public string $eodhdApiUrl = "https://eodhd.com/api/";

    public string $eodhdApiDocs = "https://eodhd.com/financial-apis/api-for-historical-data-and-volumes/";

    // ... Include other EODHD settings similarly



    // Explorium settings

    public string $exploriumApiKey = "9b9e56e85a75485996691a342906e521";

    public string $exploriumApiUrl = "https://developers.explorium.ai/reference/getting-started-with-your-api";

    public string $exploriumApiDocs = "https://developers.explorium.ai/reference/getting-started-with-your-api";

    // ... Include other Explorium settings similarly



    // Fractal API

    public $fractalApiKey = 'your-fractal-api-key-here';  // Add your actual Fractal API key here

    

    // Finange settings

    public string $finangeDashboard = "https://moon.finage.co.uk/user/dashboard";

    public string $finangeApiKey = "API_KEY12ODRANII3FQ6JBJQYC4U2ZO7DRIV4ZS";

    public string $finangeApiUrl = "https://api.finage.co.uk/";

    public string $finangeApiDocs = "https://finage.co.uk/docs";



    // Finazon settings

    public string $finazonApiKey = "e9054a88bdbd45ae8832653dbf08fbb3xn";

    public string $finazonApiDocs = "https://finazon.io/docs/api/latest";

    public string $finazonApiSdk = "https://support.finazon.io/en/articles/7265255-sdks-plugins";

    public string $finazonWebsocketDocs = "https://finazon.io/docs/ws/latest";



    // Finnhub settings

    public string $finnhubAPIKey = "ckdb9r1r01qg61btuoe0ckdb9r1r01qg61btuoeg"; 

    

    // Gemini Crypto Exchange settings // !! FIX THIS

    public string $geminiAPIKey = 'master-MpbrYCK5R27sm1hcCNC7'; 

    public string $geminiAPISecret = '4LjK4FiYpPiHktRBSt3BBYexfzVk';

    public string $geminiBTCWallet = ''; 

    public string $geminiETHWallet = ''; 

    public string $geminiDGBWallet = ''; 

    public string $geminiSOLWallet = ''; 



    // IEX Cloud settings

    public string $iexcloudDashboard = "https://iexcloud.io/console/home";

    public string $iexcloudApiKey = "sk_45f116b47e2148aaa8aba6969c6edc35" ?? '';

    public string $iexcloudApiDocs = "https://iexcloud.io/documentation/getting-started/production-ready-core-data.html";

    public string $iexcloudBatch = "https://iexcloud.io/documentation/search-data/batch-data-queries.html";



    // MarketStack settings

    public string $marketstackDashboard = "https://marketstack.com/dashboard";

    public string $marketstackApiKey = "432316cb6cd2001495d0de801ebc902b";

    public string $marketstackApiUrl = "http://api.marketstack.com/v1/";

    public string $marketstackApiDocs = "https://marketstack.com/documentation";



    // PayPal Settings - using Composer: braintree/braintree // !! FIX THIS

    public string $paypalMerchantID = ''; 

    public string $paypalPublicKey = '';

    public string $paypalPrivateKey = ''; 

    public string $paypalEnvironment = ''; // 'production' for live / 'sandbox' for development



    // Plaid Settings

    public string $plaidClientID = '61d9ba14ecdeba001b3619f6';

    public string $plaidSecret = '432e5c1a0716e15fd26ca0d8c56640';

    public string $plaidSandboxSecret = '0a10554c2dd48888bc13c5c29bdbbc';

    public string $plaidEnvironment = 'sandbox';



    // Polygon settings

    public string $polygonDashboard = "https://polygon.io/dashboard";

    public string $polygonApiKey = "DL8tlNCkidbYGhKpSUwjHzMOhV3qct4g";

    public string $polygonApiDocs = "https://polygon.io/docs/stocks/getting-started";

    public string $polygonWebsocketDocs = "https://polygon.io/docs/stocks/ws_getting-started";



    // Stripe API - Global Key

    public string $stripApiKey = '';

    

    // TD Ameritrade settings

    public string $tdAmeritradeDashboard = "https://api.tdameritrade.com/v1/marketdata/";

    public string $tdAmeritradeApiKey = "XGCE3NA1BXIGQG2NHDTLHZ6OUSIZTITF";



    // Tradier settings

    public string $tradierDashboard = "https://dash.tradier.com/settings/api";

    public string $tradierApiKey = "PlwALr3OuOKk8qyGuRgxo1g9l2iS";

    public string $tradierApiDocs = "https://documentation.tradier.com/brokerage-api";

    public string $tradierWebsocketDocs = "https://documentation.tradier.com/brokerage-api/streaming/wss-market-websocket";



    // Twelve Data settings

    public string $twelveDataApiKey = "d65b6a6e2ffc42f59c43bb6bc297bc35";

    public string $twelveDataApiUrl = "https://api.twelvedata.com/";

    public string $twelveDataApiDocs = "https://documentation.twelvedata.com/";



    // FRED settings

    public string $fredApiKey = "fca45608ff16f51703621abcd773a598";



    // NewsAPI.ai settings

    public string $newsapiAiDashboard = "https://newsapi.ai/dashboard?tab=home";

    public string $newsapiAiApiKey = "b95763e7-cd36-4ae9-b7f9-c13f1d398fa7";

    public string $newsapiAiApiUrl = "http://eventregistry.org/api/v1/";

    public string $newsapiAiApiDocs = "https://newsapi.ai/documentation?tab=introduction";

    public string $newsapiAiReferralLink = "https://newsapi.ai/?referral=86bfbedcc8a1491081592f7b05b2f627";



    // NewsAPI.org settings

    public string $newsapiOrgDashboard = "https://newsapi.org/account";

    public string $newsapiOrgApiKey = "54a51072c787406787b760c9d4475a5b";

    public string $newsapiOrgApiUrl = "https://newsapi.org/v2/";

    public string $newsapiOrgApiDocs = "https://newsapi.org/docs";



    // MediaStack settings

    public string $mediastackDashboard = "https://mediastack.com/dashboard";

    public string $mediastackApiKey = "54f061562ce0b2a8e708e69be7b8177c";

    public string $mediastackApiUrl = "http://api.mediastack.com/v1/news";

    public string $mediastackApiDocs = "https://mediastack.com/documentation";



    // Scrapemax.com

    public string $scrapemax_api_key = 'CCW6Up4ueEA1n7lnktgjiX7Vxjuy1rZ8Db3PgFtuXICEv9xgu9aChH7fUwKW';

    

    public function __construct()

    {

        parent::__construct();



        // Load from .env

        $this->elevenLabsAPIKey = getenv('ELEVENLABS_API_KEY') ?: '';

        $this->elevenLabsVoiceId = '21m00Tcm4TlvDq8ikWAM'; 

    }



    public function getAlphaVantageApiKey()

    {

        // List of available AlphaVantage API keys

        $apiKeys = [

            $this->alphaVantageApiKey,

            $this->alphaVantageApiKeyB,

            $this->alphaVantageApiKeyC,

            $this->alphaVantageApiKeyD,

            $this->alphaVantageApiKeyE,

        ];



        // Remove empty keys

        $apiKeys = array_filter($apiKeys);



        // If no API keys are available, log an error and return null

        if (empty($apiKeys)) {

            log_message('error', "🚨 No AlphaVantage API key is available!");

            return null;

        }



        // Shuffle and return a random API key to distribute requests

        shuffle($apiKeys);

        return $apiKeys[0];

    }



}



