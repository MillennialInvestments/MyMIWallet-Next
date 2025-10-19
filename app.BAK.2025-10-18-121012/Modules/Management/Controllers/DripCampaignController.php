<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Models\DripCampaignModel;
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class DripCampaignController extends UserController
{
    use ResponseTrait;

    protected $auth;
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $dripModel;
    protected $userAccount;

    public function __construct()
    {
        $this->dripModel = new DripCampaignModel();
        $this->session = service('session');
        $this->request = service('request');
        $this->auth = service('authentication');
        $this->siteSettings = config('SiteSettings');
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id();

        if (!$this->cuID) {
            log_message('error', 'DripCampaignController: Missing cuID');
            throw new \RuntimeException('User ID could not be retrieved.');
        }

        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $this->data['cuID'] = $this->cuID;
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        $userData = $this->getuserService()->commonData();
        $dashboardInfo = $this->getDashboardService()->getDashboardInfo($this->cuID);

        $this->data = array_merge($this->data, $userData);
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['dashboardInfo'] = $dashboardInfo;
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        return $this->data;
}

    public function index()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Drip Campaigns | MyMI Wallet';
        $this->data['campaigns'] = $this->dripModel->findAll();

        return $this->renderTheme('ManagementModule\Views\Marketing\Drip\index', $this->data);
    }

    public function addStep($campaignId)
    {
        $this->commonData();
        $this->data['campaign_id'] = $campaignId;
        $this->data['pageTitle'] = 'Add Campaign Step';

        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost([
                'step_number', 'name', 'subject', 'view_file', 'delay_days', 'delay_hours', 'is_active'
            ]);
            $data['campaign_id'] = $campaignId;

            $this->dripModel->createStep($data);
            return redirect()->to("/Management/Drip-Campaigns/{$campaignId}/Steps")->with('success', 'Step added.');
        }

        return $this->renderTheme('ManagementModule\Views\Marketing\Drip\add_step', $this->data);
    }

    public function create()
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Create Drip Campaign';

        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getPost([
                'name', 'description', 'audience_tags', 'segment_id',
                'content_type', 'template_id', 'utm_source', 'utm_medium',
                'utm_campaign', 'enable_ai', 'send_delay', 'schedule_time',
                'send_window', 'is_active', 'version', 'ab_test_group'
            ]);

            // Add default audience segment logic if needed:
            if (empty($postData['audience_tags'])) {
                $postData['audience_tags'] = 'Pending';
            }
            $triggerEvents = $this->request->getPost('trigger_event');
            $postData['trigger_event'] = implode(',', (array) $triggerEvents);
            $postData['logic_json'] = $this->request->getPost('logic_json') ?? null;
            $postData['created_by'] = $this->cuID;

            $this->dripModel->createCampaign($postData);
            return redirect()->to('/Management/DripCampaigns')->with('success', 'Campaign created.');
        }

        return $this->renderTheme('ManagementModule\Views\Marketing\Drip\create', $this->data);
    }

    public function enrollUser($userId = null, $trigger = 'user_registration')
    {
        $this->commonData();
        $userId = $userId ?? $this->cuID;
        $drip = new \App\Services\DripCampaignService();
        $success = $drip->enrollUserInCampaign($userId, $trigger);
    
        return $this->response->setJSON([
            'status' => $success ? 'enrolled' : 'failed',
            'user_id' => $userId,
            'trigger' => $trigger,
        ]);
    }
    
    public function previewTemplate()
    {
        $template = $this->request->getPost('template');
        $rendered = view("Email/Templates/$template", [], ['saveData' => true]);
        return $this->response->setJSON(['html' => $rendered]);
    }

    public function testDripCron()
    {
        $drip = new \App\Services\DripCampaignService();
        $result = $drip->processDueEmails();
        return $this->response->setJSON(['status' => 'complete', 'results' => $result]);
    }

    public function trackEngagement($emailId)
    {
        $this->dripModel->updateEngagementScore($emailId);
        return $this->response->setJSON(['status' => 'updated']);
    }
    
    public function viewSteps($campaignId)
    {
        $this->commonData();
        $this->data['pageTitle'] = 'Campaign Steps';
        $this->data['steps'] = $this->dripModel->getStepsForCampaign($campaignId);
        $this->data['campaign'] = $this->dripModel->find($campaignId);

        return $this->renderTheme('ManagementModule\Views\Marketing\Drip\steps', $this->data);
    }
}
?>
