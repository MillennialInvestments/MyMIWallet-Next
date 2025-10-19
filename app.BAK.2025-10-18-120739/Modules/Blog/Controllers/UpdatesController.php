<?php

namespace App\Modules\Blog\Controllers;
use App\Config\{SiteSettings, SocialMedia}; 
use App\Controllers\UserController; 
use App\Libraries\{BaseLoader, MyMIAnalytics, MyMIUser};
use App\Models\{PageSEOModel, SubscribeModel, UserModel};
use App\Controllers\BaseController;
use CodeIgniter\API\RequestTrait; // Import the ResponseTrait
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use Config\Services; 
use Myth\Auth\Authorization\GroupModel;

#[\AllowDynamicProperties]
class UpdatesController extends UserController
{
    use ResponseTrait;
    protected $auth;
    protected $helpers = ['directory', 'form', 'file', 'url'];
    protected $library;
    protected $session;
    protected $uri;
    protected $siteSettings;
    protected $MyMIAnalytics;
    protected $MyMIUser;
    protected $subscribeModel;
    protected $pageSEOModel;
    protected $userModel;
    protected $userAccount;

    public function __construct()
    {
        $this->auth                                     = service('authentication'); // Use the 'authentication' service
        $this->session                                  = Services::session();
        $this->siteSettings                             = config('SiteSettings');
        $this->userModel                                = new UserModel();
        $this->pageSEOModel                             = new PageSEOModel();
//         $this->MyMIAnalytics                            = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIUser                                 = new MyMIUser(); // replaced by BaseController getter
        $this->subscribeModel                           = new SubscribeModel();
        $this->cuID                                     = $this->auth->id() ?? $this->session->get('user_id');
        
        $this->userAccount                              = $this->getMyMIUser()->getUserInformation($this->cuID); 
    }

    public function commonData(): array {  
        $this->data = parent::commonData();         
        $this->data['reporting']                        = $this->getMyMIAnalytics()->reporting($this->cuID);
        $this->data['siteSettings']                     = $this->siteSettings;
        $this->data['uri']                              = $this->request->getUri(); 
        $this->data['userAgent']                        = $this->request->getUserAgent();
        $this->data['date']                             = $this->siteSettings->date;
        $this->data['time']                             = $this->siteSettings->time;
        $this->data['hostTime']                         = $this->siteSettings->hostTime;

        // Add or merge existing $this->data with new values
        $this->data['cuID']                             = $this->cuID;
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
        $this->data['pageTitle']                        = 'MyMI Blog | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\index', $this->data);
    }

    public function IntegratingWithPlaid()
    {
        $this->data['pageTitle']                        = 'Integrating With Plaid | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\NewsAndUpdates\Integrating_With_Plaid', $this->data);
    }

    public function TheRoadmapToTheFutureOfFinance()
    {
        $this->data['pageTitle']                        = 'The Roadmap To The Future Of Finance | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('App\Modules\Blog\Views\NewsAndUpdates\The_Roadmap_To_The_Future_Of_Finance', $this->data);
    }

    // Additional methods...

    private function renderPage($pageName, $pageType, $content)
    {
        $cuID                                           = $this->session->get('user_id') ?? 0;
        $reportingData                                  = $this->getMyMIAnalytics()->reporting($cuID);
        $uri                                            = $this->request->uri;
        $siteSettings                                   = $this->getSiteSettings();

        $pageTitle                                      = $this->getPageTitle($pageName);
        $seoData                                        = $this->pageSEOModel->getPageSEOByName($pageName);
        $seoData                                        = $this->ensureSEOData($seoData, $pageTitle);

        $viewFileData = [
            'pageType'                                  => $pageType,
            'pageName'                                  => $pageName,
            'pageTitle'                                 => $pageTitle,
            'reportingData'                             => $reportingData,
            'seoData'                                   => $seoData,
            'cuID'                                      => $cuID,
            'content'                                   => $content
        ];

        // Merge site settings with other data
        $data                                           = array_merge($viewFileData, $siteSettings, [
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
        $settings = new SiteSettings();
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
