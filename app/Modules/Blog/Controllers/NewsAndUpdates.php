<?php

namespace App\Modules\Blog\Controllers;

use Config\Services; 
use App\Config\{SiteSettings, SocialMedia}; 
use App\Models\{PageSEOModel, SubscribeModel, UserModel};
use App\Libraries\{MyMIAnalytics};
use CodeIgniter\API\ResponseTrait;
use App\Controllers\UserController; 

#[\AllowDynamicProperties]
class NewsAndUpdates extends UserController
{
    use ResponseTrait;
    private $siteSettings;
    private $subscribeModel;
    private $userModel;
    private $pageSEOModel;
    private $myMIAnalytics;
    public function __construct()
    {
        parent::__construct();
        helper(['directory', 'form', 'file', 'url']);

        // $this->userModel = new UserModel();
        $this->pageSEOModel = new PageSEOModel();
        $this->myMIAnalytics = new MyMIAnalytics();
        $this->subscribeModel = new SubscribeModel();
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $cuID = $this->session->get('user_id') ?? 0;
    }

    public function index()
    {
        $uri = $this->request->uri;
        $content = view('Modules\Blog\Views\NewsAndUpdates\index', $this->getViewFileData($uri));
        return $this->renderPage('Home', 'Automated', $content);
    }

    public function IntegratingWithPlaid()
    {
        $uri = $this->request->uri;
        $content = view('Modules\Blog\Views\NewsAndUpdates\Integrating_With_Plaid', $this->getViewFileData($uri));
        return $this->renderPage('Home', 'Automated', $content);
    }

    public function TheRoadmapToTheFutureOfFinance()
    {
        $uri = $this->request->uri;
        $content = view('Modules\Blog\Views\NewsAndUpdates\The_Roadmap_To_The_Future_Of_Finance', $this->getViewFileData($uri));
        return $this->renderPage('Home', 'Automated', $content);
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
