<?php

namespace App\Modules\Support\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\UserController;
use App\Models\SupportModel;
use Config\Services;
use App\Config\SiteSettings;

#[\AllowDynamicProperties]
class Support extends UserController
{
    use ResponseTrait;

    private $supportModel;
    private $siteSettings;

    public function __construct()
    {
        parent::__construct();
        helper(['form', 'url']);

        $this->supportModel = new SupportModel();
        $this->siteSettings = config('SiteSettings');
    }

    public function index()
    {
        return $this->renderSupportPage('Customer_Support', 'Automated');
    }

    public function memberCustomerSupportRequest()
    {
        return $this->renderSupportPage('Customer_Support', 'Automated');
    }

    public function faq()
    {
        return $this->renderSupportPage('Customer_Support_FAQ', 'Automated');
    }

    public function request()
    {
        $data = new \stdClass();

        if ($this->request->getMethod() === 'post') {
            $inputData = [
                'url_link' => $this->request->getPost('url_link'),
                'email' => $this->request->getPost('email'),
                'name' => $this->request->getPost('name'),
                'details' => $this->request->getPost('details')
            ];

            if ($this->supportModel->validateRequest($inputData)) {
                $date = date("n/j/Y");
                $time = date("g:i A");
                $userID = $this->session->get('user_id');

                if ($this->supportModel->submitRequest($date, $time, $userID, $inputData['email'], $inputData['name'], $inputData['details'])) {
                    // Send email logic here, use email service
                    // Redirect with success message
                    return redirect()->to('/Customer-Support')->with('message', 'Support request submitted successfully');
                } else {
                    $data->error = 'There was a problem submitting your service request. Please try again.';
                }
            } else {
                $data->errors = $this->supportModel->errors();
            }
        }

        return $this->renderSupportPage('Customer_Support_Request', 'Customer_Support', $data);
    }

    public function response()
    {
        $data = new \stdClass();
    
        if ($this->request->getMethod() === 'post') {
            $inputData = [
                'res_id' => $this->request->getPost('res_id'),
                'user_id' => $this->request->getPost('user_id'),
                'email' => $this->request->getPost('email'),
                'name' => $this->request->getPost('name'),
                'details' => $this->request->getPost('details')
            ];
    
            if ($this->supportModel->validateResponse($inputData)) {
                $date = date("n/j/Y");
                $time = date("g:i A");
    
                if ($this->supportModel->submitResponse($date, $time, $inputData['res_id'], $inputData['user_id'], $inputData['email'], $inputData['name'], $inputData['details'])) {
                    // Send email logic here, use email service
                    // Redirect with success message
                    return redirect()->to('/Customer-Support/Response/' . $inputData['res_id'])->with('message', 'Response submitted successfully');
                } else {
                    $data->error = 'There was a problem submitting your response. Please try again.';
                }
            } else {
                $data->errors = $this->supportModel->errors();
            }
        }
    
        return $this->renderSupportPage('Customer_Support_Response', 'Customer_Support', $data);
    }
    
    public function closeRequest($respID, $userID)
    {
        $date = date("n/j/Y");
        $time = date("g:i A");
    
        if ($this->supportModel->closeRequest($respID, $date, $time, $userID)) {
            return redirect()->to('/Customer-Support/Requests')->with('message', 'Request closed successfully');
        } else {
            // Handle failure
            return redirect()->to('/Customer-Support/Requests')->with('error', 'Error closing request');
        }
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
