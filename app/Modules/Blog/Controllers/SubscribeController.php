<?php

namespace App\Modules\Blog\Controllers;

use App\Controllers\UserController;
use App\Libraries\MyMIAnalytics;
use App\Models\PageSEOModel;
use App\Models\SubcribeModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class SubscribeController extends UserController
{
    use ResponseTrait;
    private $siteSettings;
    private $subscribeModel;

    public function __construct()
    {
        parent::__construct();
        helper(['directory', 'form', 'file', 'url']);

        // $this->userModel = new UserModel();
        $this->pageSEOModel = new PageSEOModel();
        $this->myMIAnalytics = new MyMIAnalytics();
        $this->subscribeModel = new SubscribeModel();

        $this->siteSettings = config('App')->siteSettings;
    }

    public function index()
    {
        return $this->renderPage('User_Subscribe_Index', 'Automated', 'Subscribe/index');
    }

    public function account_manager()
    {
        return $this->renderPage('User_Subscribe_Account_Manager', 'Automated', 'Subscribe/Account_Manager');
    }

    public function services()
    {
        return $this->renderPage('User_Subscribe_Services', 'Automated', 'Subscribe/services');
    }

    public function submit()
    {
        $email = $this->request->getPost('email');
        $referral = $this->request->getPost('referral');

        $result = $this->subscribeModel->insertEmail($email, $referral);

        return $this->respond($result);
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
