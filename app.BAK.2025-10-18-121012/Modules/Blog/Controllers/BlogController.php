<?php

// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\Blog\Controllers;

use App\Config\{Auth, SiteSettings, SocialMedia}; 
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use App\Controllers\BaseController;
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIUser};
use App\Models\{BlogModel, PageSEOModel, SubscribeModel, UserModel};
use App\Modules\User\Libraries\{DashboardLibrary}; 
use Myth\Auth\Authorization\GroupModel;

#[\AllowDynamicProperties]
class BlogController extends UserController
{
    use ResponseTrait;
    protected $auth;
    protected $helpers = ['auth', 'form', 'file', 'url'];
    protected $session;
    protected $siteSettings;
    protected $MyMIAnalytics;
    protected $MyMIUser;
    protected $subscribeModel;
    protected BlogModel $blogModel; 
    protected $userModel;
    protected $pageSEOModel;
    protected $userAccount;

    public function __construct()
    {
        // parent::__construct();
        $this->auth                                 = service('authentication'); // Use the 'authentication' service
        $this->session                              = Services::session();
        $this->siteSettings                         = config('SiteSettings');
//         $this->MyMIAnalytics                        = new MyMIAnalytics(); // replaced by BaseController getter
//         $this->MyMIUser                             = new MyMIUser(); // replaced by BaseController getter
        $this->userModel                            = new UserModel();
        $this->pageSEOModel                         = new PageSEOModel();
        $this->subscribeModel                       = new SubscribeModel();
        $this->blogModel                            = new BlogModel();
        $this->cuID                                 = $this->auth->id() ?? $this->session->get('user_id');
        $this->userAccount                          = $this->getMyMIUser()->getUserInformation($this->cuID); 
    }

    public function commonData(): array {           
        $this->data = parent::commonData();
        $this->data['uri']                          = $this->request->getUri(); 
        $this->data['userAgent']                    = $this->request->getUserAgent();

        // Add or merge existing $this->data with new values
        $this->data['cuID']                         = $this->cuID ?? 0;
        $this->data['cuRole']                       = $this->userAccount['cuRole'] ?? '';
        $this->data['cuUserType']                   = $this->userAccount['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->userAccount['cuEmail'] ?? '';
        $this->data['cuUsername']                   = $this->userAccount['cuUsername'] ?? '';
        $this->data['cuDisplayName']                = $this->userAccount['cuDisplayName'] ?? '';
        $this->data['cuFirstName']                  = $this->userAccount['cuFirstName'] ?? '';
        $this->data['cuMiddleName']                 = $this->userAccount['cuMiddleName'] ?? '';
        $this->data['cuLastName']                   = $this->userAccount['cuLastName'] ?? '';
        $this->data['cuNameSuffix']                 = $this->userAccount['cuNameSuffix'] ?? '';
        $this->data['cuNameInitials']               = $this->userAccount['cuNameInitials'] ?? '';
        $this->data['cuKYC']                        = $this->userAccount['cuKYC'] ?? '';
        $this->data['cuDOB']                        = $this->userAccount['cuDOB'] ?? '';
        $this->data['cuSSN']                        = $this->userAccount['cuSSN'] ?? '';
        $this->data['cuPhone']                      = $this->userAccount['cuPhone'] ?? '';
        $this->data['cuAddress']                    = $this->userAccount['cuAddress'] ?? '';
        $this->data['cuCity']                       = $this->userAccount['cuCity'] ?? '';
        $this->data['cuState']                      = $this->userAccount['cuState'] ?? '';
        $this->data['cuCountry']                    = $this->userAccount['cuCountry'] ?? '';
        $this->data['cuZipCode']                    = $this->userAccount['cuZipCode'] ?? '';
        $this->data['cuMailingAddress']             = $this->userAccount['cuMailingAddress'] ?? '';
        $this->data['cuEmployment']                 = $this->userAccount['cuEmployment'] ?? '';
        $this->data['cuOccupation']                 = $this->userAccount['cuOccupation'] ?? '';
        $this->data['cuSalary']                     = $this->userAccount['cuSalary'] ?? '';
        $this->data['cuProofIdentity']              = $this->userAccount['cuProofIdentity'] ?? '';
        $this->data['cuProofAddress']               = $this->userAccount['cuProofAddress'] ?? '';
        $this->data['cuPublicKey']                  = $this->userAccount['cuPublicKey'] ?? '';
        $this->data['cuPrivateKey']                 = $this->userAccount['cuPrivateKey'] ?? '';
        $this->data['cuReferrer']                   = $this->userAccount['cuReferrer'] ?? '';
        $this->data['cuReferrerCode']               = $this->userAccount['cuReferrerCode'] ?? '';

        $this->data['siteSettings']                 = $this->siteSettings;
        $this->data['beta']                         = (string) $this->siteSettings->beta;
        $this->data['date']                         = $this->siteSettings->date;
        $this->data['hostTime']                     = $this->siteSettings->hostTime;
        $this->data['time']                         = $this->siteSettings->time;
        return $this->data;
    }

    public function index()
    {
        $this->data['pageTitle'] = 'MyMI Blog | MyMI Wallet | The Future of Finance';
        $this->data              = $this->commonData();

        $perPage = 12;
        $posts   = $this->blogModel->getPublishedListing($perPage);

        $this->data['posts'] = $posts;
        $this->data['pager'] = $this->blogModel->pager;

        return $this->renderTheme('App\Modules\Blog\Views\index', $this->data);
    }

    public function account_manager() {
        return $this->renderPage('User_Subscribe_Account_Manager', 'Automated', 'Subscribe/Account_Manager');
    }

    public function services() {
        return $this->renderPage('User_Subscribe_Services', 'Automated', 'Subscribe/services');
    }

    public function submit() {
        $email = $this->request->getPost('email');
        $referral = $this->request->getPost('referral');

        $result = $this->subscribeModel->insertEmail($email, $referral);

        return $this->respond($result);
    }

    // View a Single Blog by Slug
    public function viewBlog(string $slug)
    {
        $blogPost = $this->blogModel->getPostBySlug($slug);

        if (!$blogPost) {
            log_message('error', 'BlogController::viewBlog - post not found for slug: ' . $slug);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog post not found');
        }

        $data = $this->commonData();
        $data['pageTitle'] = $blogPost['title'] ?? 'Blog Article';
        $data['blogPost']  = $blogPost;

        return $this->renderTheme('blog/view', $data);
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
            'reporting' => $reportingData,
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
        $settings = config('SiteSettings');
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
