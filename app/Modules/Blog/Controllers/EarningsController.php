<?php

namespace App\Modules\Blog\Controllers;

use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Controllers\UserController; 
use App\Libraries\{BaseLoader, MyMIAnalytics};
use App\Models\{MyMIGoldModel, PageSEOModel, SubscribeModel, UserModel};
// use App\Modules\User\Libraries\{DashboardLibrary}; 
use CodeIgniter\API\RequestTrait; // Import the ResponseTrait
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use App\Controllers\BaseController;
use Config\Services;

#[\AllowDynamicProperties]
class EarningsController extends UserController
{
    use ResponseTrait;
    protected $auth;
    protected $helpers = ['directory', 'form', 'file', 'url'];
    protected $library;
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $socialMedia;
    protected $uri;
    protected $MyMIAnalytics;
    protected $MyMIGoldModel;
    protected $pageSEOModel;
    protected $subscribeModel;
    protected $userModel;

    public function __construct()
    {
        $this->auth                                     = service('authentication'); // Use the 'authentication' service
        $this->session                                  = Services::session();
        $this->siteSettings                             = config('SiteSettings');
        $this->socialMedia                              = config('SocialMedia');
        $this->request                                  = Services::request(); 
        $this->uri                                      = $this->request->getUri(); 
//         $this->MyMIAnalytics                            = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIGoldModel                            = new MyMIGoldModel(); // replaced by BaseController getter
        $this->pageSEOModel                             = new PageSEOModel();
        $this->subscribeModel                           = new SubscribeModel();
        $this->userModel                                = new UserModel();
        $this->cuID                                     = $this->auth->id() ?? $this->session->get('user_id');
    }

    public function commonData(): array {   
        $this->data = parent::commonData();   
        $this->data['reporting']                        = $this->getMyMIAnalytics()->reporting($this->cuID);
        $this->data['siteSettings']                     = $this->siteSettings;     
        $this->data['socialMedia']                      = $this->socialMedia;     
        $this->data['uri']                              = $this->uri; 
        $this->data['beta']                             = $this->siteSettings->beta;
        $this->data['investmentOperations']             = $this->siteSettings->investmentOperations;
        $this->data['userAgent']                        = $this->request->getUserAgent();
        $this->data['date']                             = $this->siteSettings->date;
        $this->data['time']                             = $this->siteSettings->time;
        $this->data['hostTime']                         = $this->siteSettings->hostTime;
        $this->data['date']                             = $this->siteSettings->date;

        // Add or merge existing $this->data with new values
        if (!empty($userAccount['cuEmail'])) {
            $this->data['cuRole']                       = $this->userAccount['cuRole'];
            $this->data['cuUserType']                   = $this->userAccount['cuUserType'];
            $this->data['cuEmail']                      = $this->userAccount['cuEmail'];
            $this->data['cuUsername']                   = $this->userAccount['cuUsername'];
            $this->data['cuDisplayName']                = $this->userAccount['cuDisplayName'];
            $this->data['cuFirstName']                  = $this->userAccount['cuFirstName'];
            $this->data['cuMiddleName']                 = $this->userAccount['cuMiddleName'];
            $this->data['cuLastName']                   = $this->userAccount['cuLastName'];
            $this->data['cuNameSuffix']                 = $this->userAccount['cuNameSuffix'];
            $this->data['cuNameInitials']               = $this->userAccount['cuNameInitials'];
            $this->data['cuKYC']                        = $this->userAccount['cuKYC'];
            $this->data['cuDOB']                        = $this->userAccount['cuDOB'];
            $this->data['cuSSN']                        = $this->userAccount['cuSSN'];
            $this->data['cuPhone']                      = $this->userAccount['cuPhone'];
            $this->data['cuAddress']                    = $this->userAccount['cuAddress'];
            $this->data['cuCity']                       = $this->userAccount['cuCity'];
            $this->data['cuState']                      = $this->userAccount['cuState'];
            $this->data['cuCountry']                    = $this->userAccount['cuCountry'];
            $this->data['cuZipCode']                    = $this->userAccount['cuZipCode'];
            $this->data['cuMailingAddress']             = $this->userAccount['cuMailingAddress'];
            $this->data['cuEmployment']                 = $this->userAccount['cuEmployment'];
            $this->data['cuOccupation']                 = $this->userAccount['cuOccupation'];
            $this->data['cuSalary']                     = $this->userAccount['cuSalary'];
            $this->data['cuProofIdentity']              = $this->userAccount['cuProofIdentity'];
            $this->data['cuProofAddress']               = $this->userAccount['cuProofAddress'];
            $this->data['cuPublicKey']                  = $this->userAccount['cuPublicKey'];
            $this->data['cuPrivateKey']                 = $this->userAccount['cuPrivateKey'];
            $this->data['cuReferrer']                   = $this->userAccount['cuReferrer'];
            $this->data['cuReferrerCode']               = $this->userAccount['cuReferrerCode'];
        } else {
            
        }
        return $this->data;
}

    public function index()
    {
        $this->data['pageTitle']                    = 'How It Works | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\index', $this->data);
    }

    public function test()
    {
        $this->data['pageTitle']                    = 'How It Works | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\Earnings\2024\10\Emails\21', $this->data);
    }

    public function fetchMarketData($symbol)
    {
        $apiKey = 'YOUR_ALPHA_VANTAGE_API_KEY';
        $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=$symbol&apikey=$apiKey";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['Time Series (Daily)'])) {
            $latestData = reset($data['Time Series (Daily)']);
            return [
                'open' => $latestData['1. open'],
                'close' => $latestData['4. close'],
                'percent_change' => (($latestData['4. close'] - $latestData['1. open']) / $latestData['1. open']) * 100
            ];
        }

        return null;
    }

    public function generateConfig()
    {
        $model = new InvestmentsCalendarModel();
        $earnings = $model->findAll();

        $configContent = "<?php\nnamespace Config\\Earnings;\n\n";
        $configContent .= "class Earnings" . date('mdY') . "\n{\n";
        $configContent .= "\tpublic string \$imagePath = 'assets/images/Earnings/';\n";
        $configContent .= "\tpublic string \$earningsDate = '" . date('mdY') . "';\n";
        $configContent .= "\tpublic \$companies = [\n";

        foreach ($earnings as $company) {
            $configContent .= "\t\t[\n";
            $configContent .= "\t\t\t'name' => '" . $company['company_name'] . "',\n";
            $configContent .= "\t\t\t'symbol' => '" . $company['symbol'] . "',\n";
            $configContent .= "\t\t\t'description' => '" . $company['description'] . "',\n";
            $configContent .= "\t\t\t'review' => '" . $company['review'] . "',\n";
            $configContent .= "\t\t\t'market_reaction' => '" . $company['market_reaction'] . "',\n";
            $configContent .= "\t\t\t'open_price' => '" . $company['open_price'] . "',\n";
            $configContent .= "\t\t\t'close_price' => '" . $company['close_price'] . "',\n";
            $configContent .= "\t\t\t'percent_gain_loss' => '" . $company['percent_gain_loss'] . "',\n";
            $configContent .= "\t\t\t'earnings_date' => '" . $company['earnings_date'] . "',\n";
            $configContent .= "\t\t],\n";
        }

        $configContent .= "\t];\n}\n}";

        file_put_contents(APPPATH . 'Config/Earnings/Earnings' . date('mdY') . '.php', $configContent);

        return redirect()->back()->with('success', 'Config file generated.');
    }

    public function update()
    {
        $data = [
            'review'           => $this->request->getPost('review'),
            'market_reaction'  => $this->request->getPost('market_reaction'),
            'percent_gain_loss'=> $this->request->getPost('percent_gain_loss'),
            'open_price'       => $this->request->getPost('open_price'),
            'close_price'      => $this->request->getPost('close_price')
        ];

        $id = $this->request->getPost('id');
        $calendarModel = new InvestmentsCalendarModel();
        $calendarModel->update($id, $data);

        return redirect()->back()->with('success', 'Earnings info updated.');
    }

    public function updateMarketData($id, $symbol)
    {
        $marketData = $this->fetchMarketData($symbol);
        if ($marketData) {
            $data = [
                'open_price' => $marketData['open'],
                'close_price' => $marketData['close'],
                'percent_gain_loss' => $marketData['percent_change']
            ];

            $calendarModel = new InvestmentsCalendarModel();
            $calendarModel->update($id, $data);
        }
    }

    public function upload()
    {
        // Handle file upload
        $file = $this->request->getFile('earnings_file');

        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = WRITEPATH . 'uploads/' . $file->store();
            $csvFile = fopen($filePath, 'r');
            
            // Skip the header row
            fgetcsv($csvFile);
            
            $calendarModel = new InvestmentsCalendarModel();

            // Loop through CSV data
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $data = [
                    'date' => date('Y-m-d H:i:s', strtotime($line[0] . ' ' . $line[1])),
                    'symbol' => $line[2] !== 'N/A' ? $line[2] : NULL,
                    'event_type' => $line[3],
                    'description' => $line[4]
                ];

                // Insert data into database
                $calendarModel->insert($data);
            }
            fclose($csvFile);

            return redirect()->back()->with('success', 'CSV Imported Successfully');
        }

        return redirect()->back()->with('error', 'Invalid file upload');
    }

    public function viewByDate()
    {
        // Step 1: Get the third URI segment (e.g., 'Oct-14-2024')
        $segment = $this->uri->getSegment(3);
    
        // Step 2: Convert the 'Oct-14-2024' format to '20241014'
        $dateObj = \DateTime::createFromFormat('M-d-Y', $segment); // Correct format is 'M-d-Y'
        
        if ($dateObj === false) {
            log_message('error', 'Failed to parse the date from URI segment: ' . $segment);
            return redirect()->to('/error-page'); // Error handling if format is invalid
        }
    
        // Step 4: Format the date as '20241014' for the view path
        $formattedDate = $dateObj->format('Y') . '\\' . $dateObj->format('m') . '\\' . $dateObj->format('d'); // Convert to '20241014' format
    
        // Step 5: Load the config dynamically based on 'Oct142024' format
        $earningsName = str_replace('-', '', $segment);
    
        // Step 6: Dynamically load the earnings config file
        try {
            $configClass = 'Config\\Earnings\\' . $earningsName;
            if (class_exists($configClass)) {
                $earningsConfig = new $configClass();
                $companies = $earningsConfig->companies;  // Fetch companies
                $earningsDate = $earningsConfig->earningsDate; // Fetch the earnings date
            } else {
                throw new \Exception('Config file not found.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Config file loading failed: ' . $e->getMessage());
            return redirect()->to('/Blog/Earnings');
        }
    
        // Step 7: Add dynamic data to be passed to the view
        $this->data['pageTitle'] = 'Corporate Earnings Calendar | Week of ' . $segment . ' | MyMI Wallet';
        $this->data['companies'] = $companies;
        $this->data['earningsDate'] = $earningsDate; // Pass the earnings date to the view
    
        // Expanded sector data
        $sectors = [
            [
                'title' => 'Banking & Finance',
                'description' => 'Focus on loan growth and the impact of rising interest rates on banks like Bank of America and PNC Financial Services.',
            ],
            [
                'title' => 'Tech & Streaming',
                'description' => 'Streaming services like Netflix provide insights into consumer entertainment trends, while IBM focuses on AI and cloud computing growth.',
            ],
            [
                'title' => 'Semiconductors',
                'description' => 'ASML, a leader in semiconductor equipment, offers critical insights into the global supply chain and demand for cutting-edge chips.',
            ],
            [
                'title' => 'Consumer Goods',
                'description' => 'Companies like Procter & Gamble and Philip Morris reveal how inflation is impacting consumer spending on essentials and tobacco products.',
            ],
            [
                'title' => 'Healthcare & Pharmaceuticals',
                'description' => 'Johnson & Johnson and HCA Healthcare provide insights into healthcare trends, pharmaceutical developments, and post-pandemic patient volumes.',
            ],
            [
                'title' => 'Telecom & 5G',
                'description' => 'AT&T provides updates on 5G growth, wireless subscriber numbers, and competition in the telecom sector.',
            ],
            [
                'title' => 'Energy & Mining',
                'description' => 'Schlumberger and BHP Group offer insights into global energy demand and commodity prices, especially in metals and oil fields.',
            ],
            [
                'title' => 'Aerospace & Defense',
                'description' => 'Lockheed Martin’s earnings focus on defense contracts and how geopolitical tensions may impact government defense spending.',
            ],
            [
                'title' => 'Airlines & Travel',
                'description' => 'United Airlines provides a post-pandemic view of travel demand and profitability, with a focus on how fluctuating fuel prices impact the bottom line.',
            ],
            [
                'title' => 'Retail Trading & Investments',
                'description' => 'Charles Schwab’s performance highlights trends in retail trading, investment inflows, and overall market volatility.',
            ],
        ];

        $this->data['sectors'] = $sectors; // Pass the sectors to the view
    
        $this->commonData();
        $this->renderTheme('App\Modules\Blog\Views\Earnings\\' . $formattedDate, $this->data); // Ensure slashes are correct
    }    
    
    public function RegisteringAnAccount()
    {
        $this->data['pageTitle']                    = 'Registering An Account | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Registering_An_Account', $this->data);
    }

    public function MyMIGold() {
        $getCoinValue = $this->MyMIGoldModel->getCoinValue(); 
        $getInitialCoinValue = $this->MyMIGoldModel->getInitialCoinValue(); 
        
        $uri = $this->request->uri;
    
        $viewFileData = [
            'getCoinValue' => $getCoinValue,
            'getInitialCoinValue' => $getInitialCoinValue
        ];
        // Merge site settings with other data
        $data = array_merge($this->getViewFileData($uri), $viewFileData);
    
        // Pass the structured data array to the view
        $content = view('Modules\Blog\Views\HowItWorks\MyMI_Gold', $data);        
        return $this->renderPage('Home', 'Automated', $content);
    }

    public function PurchaseMyMIGold() {
        $getCoinValue = $this->MyMIGoldModel->getCoinValue(); 
        $getInitialCoinValue = $this->MyMIGoldModel->getInitialCoinValue(); 
        
        $uri = $this->request->uri;
    
        $viewFileData = [
            'getCoinValue' => $getCoinValue,
            'getInitialCoinValue' => $getInitialCoinValue
        ];
        // Merge site settings with other data
        $data = array_merge($this->getViewFileData($uri), $viewFileData);
    
        // Pass the structured data array to the view
        $content = view('Modules\Blog\Views\HowItWorks\Purchase_MyMI_Gold', $data);
        return $this->renderPage('Home', 'Automated', $content);
    }

    public function PersonalBudgeting()
    {
        $this->data['pageTitle']                    = 'Personal Budgeting | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Personal_Budgeting', $this->data);
    }

    public function InvestmentPortfolioManagement()
    {
        $this->data['pageTitle'] = 'Investment Portfolio Management | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management', $this->data);
    }    

    public function DailyFinancialNews()
    {
        $this->data['pageTitle'] = 'Daily Financial News | How It Works | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\HowItWorks\Daily_Financial_News', $this->data);
    }    

    // Additional methods...

    private function renderPage($pageName, $pageType, $content)
    {
        $cuID = $this->session->get('user_id') ?? 0;
        $reportingData = $this->getMyMIAnalytics()->reporting($cuID);
        $uri = $this->request->uri;
        $siteSettings = $this->getSiteSettings();

        $pageTitle = $this->getPageTitle($pageName);
        $seoData = $this->pageSEOModel->getPageSEOByName($pageName);
        $seoData = $this->ensureSEOData($seoData, $pageTitle);

        $viewFileData = [
            'pageType' => $pageType,
            'pageName' => $pageName,
            'pageTitle' => $pageTitle,
            'reportingData' => $reportingData,
            'seoData' => $seoData,
            'cuID' => $cuID,
            'content' => $content
        ];

        // Merge site settings with other data
        $data = array_merge($viewFileData, $siteSettings, [
            // 'addValueHere' => $addValueHere,
        ]);
        return $this->render('themes/default/layouts/index', $data);
    }

    private function getViewFileData($uri)
    {
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data['pageURI' . chr(64 + $i)] = $uri->getTotalSegments() >= $i ? $uri->getSegment($i, '') : '';
        }
        return $data;
    }  

    private function getSiteSettings() {
        $settings = $this->siteSettings;
        return [
            'siteOperations' => $settings->siteOperations,
            'educateOperations' => $settings->educateOperations,
            'budgetOperations' => $settings->budgetOperations,
            'investmentOperations' => $settings->investmentOperations,
            'integrationOperations' => $settings->integrationOperations,
            'newsOperations' => $settings->newsOperations,
            'referralOperations' => $settings->referralOperations,
            'debtOperations' => $settings->debtOperations,
            'retirementOperations' => $settings->retirementOperations,
            'assetOperations' => $settings->assetOperations,
            'exchangeOperations' => $settings->exchangeOperations,
            'marketplaceOperations' => $settings->marketplaceOperations,
            'partnerOperations' => $settings->partnerOperations,
            'bettingOperations' => $settings->bettingOperations
            // Add any additional settings here if needed
        ];
    }

    private function getPageTitle($pageName)
    {
        $thisURL = current_url();
        return str_replace(['/', '-'], [' | ', ' '], $thisURL);
    }
    
    private function ensureSEOData($seoData, $pageTitle)
    {
        if (empty($seoData)) {
            $seoData = [
                'page_name' => $pageTitle,
                'page_title' => $pageTitle,
                'page_url' => current_url(),
                'page_sitemap_url' => base_url('/sitemap.xml'),
                'page_image' => base_url('/assets/images/default-seo-image.png'),
                'meta_description' => 'Default meta description for ' . $pageTitle,
                'meta_keywords' => 'default,keywords,for,' . str_replace(' ', ',', strtolower($pageTitle))
            ];
            
            $this->pageSEOModel->saveOrUpdatePageSEO($seoData);
        }
    
        return $seoData;
    }    

    public function render(string $view, array $data = [], array $options = []): string
    {
        return $this->renderTheme($view, $data);
    }
}
?>
