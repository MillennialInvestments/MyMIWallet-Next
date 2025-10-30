<?php

namespace App\Modules\User\Controllers;

use App\Config\{SiteSettings, SocialMedia};
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMIUser};
use App\Models\{PageSEOModel, SubscribeModel, SupportModel, UserModel};
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait
use Config\Services;
use Myth\Auth\Authorization\GroupModel;

#[\AllowDynamicProperties]
class SupportController extends UserController
{
    use ResponseTrait;
    protected $auth;
    protected $helpers = ['auth', 'directory', 'form', 'file', 'url'];
    protected $library;
    protected $session;
    protected $uri;
    protected $siteSettings;
    protected $socialMedia;
    protected $subscribeModel;
    protected $pageSEOModel;
    protected $supportModel;
    protected $userModel;
    protected $userAccount;

    public function __construct()
    {
        $this->auth                                     = service('authentication'); // Use the 'authentication' service
        $this->session                                  = Services::session();
        $this->siteSettings                             = config('SiteSettings');
        $this->socialMedia                              = config('SocialMedia');
        $this->supportModel                             = new SupportModel();
        $this->userModel                                = new UserModel();
        $this->pageSEOModel                             = new PageSEOModel();
        $this->subscribeModel                           = new SubscribeModel();
        $this->cuID                                     = $this->auth->id() ?? $this->session->get('user_id');

        $this->userAccount                              = $this->getMyMIUser()->getUserInformation($this->cuID);
    }

    // -------------------------------------------------------------------------
    // Main Blog Post Page
    // -------------------------------------------------------------------------

    public function commonData(): array
    {
        $data = parent::commonData();

        $data['siteSettings'] = $this->siteSettings;
        $data['uri']          = $this->request->getUri();
        $data['nonce']        = $data['nonce'] ?? ($this->nonce ?? []);

        try {
            $data['reporting'] = $this->getMyMIAnalytics()->reporting($this->cuID);
        } catch (\Throwable $exception) {
            log_message('error', 'SupportController::commonData analytics failed: {message}', [
                'message' => $exception->getMessage(),
            ]);
            $data['reporting'] = [];
        }

        $safeProfile = [];
        if (is_array($this->userAccount) && ! empty($this->userAccount)) {
            $safeProfile = array_filter([
                'displayName' => $this->userAccount['cuDisplayName'] ?? null,
                'email'       => $this->userAccount['cuEmail'] ?? null,
                'username'    => $this->userAccount['cuUsername'] ?? null,
            ]);
        }

        $data['supportUser'] = $safeProfile;

        return $data;
    }

    public function index()
    {
        $data = $this->commonData();
        $data['pageTitle'] = 'Customer Support | MyMI Wallet';
        $data['layout']    = 'dashboard';

        return $this->renderTheme('App\Modules\User\Views\Support\index', $data);
    }


    // public function index()
    // {
    //     $this->data['pageTitle']                        = 'Customer Support | MyMI Wallet | The Future of Finance';
    //     $this->commonData(); // Ensure this is correctly populating $this->data
    //     $this->renderTheme('UserModule\Views\Support\index', $this->data);

    public function handleSupportRequest()
    {
        $supportRequestForm = trim(file_get_contents("php://input"));
        $supportRequest = json_decode($supportRequestForm, true);
        if (is_null($supportRequest)) {
            // Handle error or log it
            return $this->failValidationError('Invalid JSON data');
        }

        if (!isset($supportRequest['comm_type'])) {
            // Handle error or set a default value
            return $this->failValidationError('Missing communication type');
        }
        
        $commType = $supportRequest['comm_type'];

        if ($commType === 'Request') {
            $date = date("Y-m-d");  // Correct format for MySQL DATE
            $time = date("H:i:s");  // Correct format for MySQL TIME
            $userRequestData = [
                'date' => $date,
                'time' => $time,
                'user_id' => $supportRequest['user_id'],
                'name' => $supportRequest['name'],
                'email' => $supportRequest['email'],
                // 'topic' => $supportRequest['topic'],
                'subject' => $supportRequest['subject'],
                'details' => $supportRequest['details'],
                'level' => 'Normal',
            ];

            $supportNoticeData = [ 
                'date' => $date,
                'time' => $time,
                'user_id' => $supportRequest['user_id'],
                'name' => $supportRequest['name'],
                'email' => $supportRequest['email'],
                // 'topic' => $supportRequest['topic'],
                'subject' => $supportRequest['subject'],
                'details' => $supportRequest['details'],
                'level' => 'Normal',
            ];

            $result = $this->supportModel->submitRequest($userRequestData);
            if ($result) {
                $this->sendEmail($userRequestData);
                $this->sendSupportRequestReceivedEmail($supportNoticeData); 
                $this->sendToDiscord($userRequestData);  // Pass the request ID to Discord method
                // $this->sendToDiscord($userRequestData, $userRequestData['subject'], $result['request_id']);  // Pass the request ID to Discord method
                return $this->respond(['status' => 'success', 'message' => 'Your support request has been submitted successfully.']);
            }
        } elseif ($commType === 'Feedback') {
            $userRequestData = [
                'created_by' => $supportRequest['user_id'],
                'created_by_email' => $supportRequest['user_email'],
                'current_url' => $supportRequest['current_url'],
                'topic' => $supportRequest['topic'],
                'details' => $supportRequest['details'],
            ];

            $this->db->table('bf_support_feedback')->insert($userRequestData);
            $this->sendEmail($userRequestData);
            $this->sendToDiscord($userRequestData);

            return $this->respond(['status' => 'success', 'message' => 'Your feedback has been submitted successfully.']);
        }
        return $this->fail('An unknown error occurred.');
    }

    private function sendEmail(array $data)
    {
        $email = Services::email();
        $email->setTo('support@MyMIWallet.com');
        $email->setFrom('noreply@MyMIWallet.com', 'MyMI Wallet - Customer Support');
        $email->setSubject('New Support Request Received');
        $email->setMessage("A new support request or feedback has been submitted. Details: \n" . print_r($data, true));
        $email->send();
    }

    public function test() { 
        // Define the data array with all necessary fields
        $data = [
            'name' => 'Tim Burks', // Example user name
            'email' => 'tburks2392@gmail.com', // Example user email
            'date' => date('Y-m-d'), // Current date
            'time' => date('H:i:s'), // Current time
            'subject' => 'MyMI Coin', // Example subject
            'details' => 'Just testing redirect and submission success message.', // Example details
            'level' => 'Normal', // Example priority level
            'siteSettings' => $this->siteSettings,
            'socialMedia' => $this->socialMedia,
        ];
    
        // Render the email content for preview
        $emailContent = view('emails/layout', [
            'content' => view('UserModule\Views\Support\_emails\Support_Request_Received', ['data' => $data]),
            'title' => 'Support Request Received',
            'siteSettings' => $this->siteSettings,
            'socialMedia' => $this->socialMedia,
        ]);
    
        // Return the rendered email view to the browser for preview
        return $this->response->setBody($emailContent);
    }
    
    public function sendTestEmail()
    {
        // Define the data array with all necessary fields
        $data = [
            'name' => 'Tim Burks', // Example user name
            'email' => 'tburks2392@gmail.com', // Example user email
            'date' => date('Y-m-d'), // Current date
            'time' => date('H:i:s'), // Current time
            'subject' => 'MyMI Coin', // Example subject
            'details' => 'Just testing redirect and submission success message.', // Example details
            'level' => 'Normal', // Example priority level
            'siteSettings' => $this->siteSettings,
            'socialMedia' => $this->socialMedia,
        ];
    
        // Initialize email service
        $email = Services::email();
        $email->setTo($data['email']);
        $email->setFrom('noreply@MyMIWallet.com', 'MyMI Wallet - Customer Support');
        $email->setSubject('MyMI Wallet - Support Request Received');
    
        // Use the layout and pass content as a dynamic subview
        $emailContent = view('emails/layout', [
            'content' => view('UserModule\Views\Support\_emails\Support_Request_Received', ['data' => $data]),
            'title' => 'Support Request Received',
            'siteSettings' => $this->siteSettings,
            'socialMedia' => $this->socialMedia,
        ]);
    
        $email->setMessage($emailContent);
    
        // Send email and log result
        if ($email->send()) {
            return redirect()->to('/Support')->with('message', 'Test email sent successfully.');
        } else {
            log_message('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('/Support')->with('error', 'Failed to send test email.');
        }
    }    

    private function sendSupportRequestReceivedEmail(array $data)
    {
        $email = Services::email();
        $email->setTo($data['email']);
        $email->setFrom('noreply@MyMIWallet.com', 'MyMI Wallet - Customer Support');
        $email->setSubject('MyMI Wallet - New Support Request Received');
        $emailContent = view('UserModule\Views\Support\_emails\Support_Request_Received', ['data' => $data]);
        $email->setMessage($emailContent);
        $email->send();
    }

    private function sendToDiscord(array $data)
    {
        $webhookUrls = [
            'General'           => 'https://discord.com/api/webhooks/1235018629112791163/32jzRBxGCvTSM3d1jIL9YkbXKoVcfc7CKxqYReXBY2nfKCQPVL-V8Jfr1VzQKZwAZ39d',
            'Account'           => 'https://discord.com/api/webhooks/1235016982491955342/bywKotPeWh1s9QvfwK9Pd5C4aEfWVs_0UiAJfNk-trNiaQbWeb0m2YuLD_T0AAdUBzJn',
            'Asset Creator'     => 'https://discord.com/api/webhooks/1235019154545971271/z3uF6Z1H64DQk6GY4p6MF5AQ3kWl_IBBVr2hpcSetzNXThZnxTSauc82zCEBd8jeGAZH',
            'Asset Exchange'    => 'https://discord.com/api/webhooks/1235019713109557250/CPddF8brM--cGrl4X6VQ8RZm9Op3MWvxlb0dIAHuVYtfSE0APXI6tj8tpnzvrIYFHlRX',
            'Budgeting'         => 'https://discord.com/api/webhooks/1235019835910651936/fwpnj3g_tUL8n-G1NMobfY1tZMPOozchpoZvrNQSnP9l3HXbH3nORgDA1ZBfgknWRGkk',
            'Credit/Debt'       => 'https://discord.com/api/webhooks/1235019925643329577/EI2mppE100WN3pWirFORyi94YDbogET64fWUX3H55ftdRNM5HxDkg0QMi_Cf3sZBPslp',
            'Mobile'            => 'https://discord.com/api/webhooks/1235020045961400351/s_C9U6XrmxglF7rkA0BkpKdHDyr40DFPCTCKEsMnYLqUu1x0uJgddMtKlABGvERX78Sk',
            'MyMI Coin'         => 'https://discord.com/api/webhooks/1235020223527256106/_7IjHd0QSSjayDphpksjl772l-L3LF40T4KWmu1FD1gWtWfyufw4HiEYQy5N3CxFwu9W',
            'MyMI Gold'         => 'https://discord.com/api/webhooks/1235020137363411095/tRJOdPsHeSg17Dd1BMdHMBocLkCNL3wmQdf1eqV4DCvp2wGuZze_QR8bTa1rJiLghiYN',
            'MyMI Projects'     => 'https://discord.com/api/webhooks/1310413840634216498/I6_TobptfDyfSsFfIegmGiSXNthzyTmMSzrXq1yAse8EIgMdtET5IrcR2Gcs-_8Uph1c',
            'Portfolio Manager' => 'https://discord.com/api/webhooks/1235020413407330354/ME87bC56ABGa-DnD2pH8npeamtipAAy2SB9MqTfZozA-2EONNg1zQtt5bWSmFErnFXXj',
        ];   

        // Construct the message
        $formattedMessage = sprintf(
            "New \"%s\" Support Submission:\n" .
            "Level: %s\n" .
            "Date/Time: %s - %s\n" .
            "UserID: %s\n" .
            "User Email: %s\n" .
            "Name: %s\n" .
            "Subject: %s\n" .
            "Details: %s\n" .
            "Link: %s",
            $data['topic'] ?? 'Unknown', // Use 'Unknown' or a default value if topic is not set
            $data['level'],
            $data['date'],
            $data['time'],
            $data['user_id'],
            $data['email'],
            $data['name'],
            $data['subject'],
            $data['details'],
            "http://www.mymiwallet.com/Support/Request/" . ($data['id'] ?? 'Unknown') // Default to 'Unknown' if ID is not available
        );  

        $curl = curl_init($webhookUrls[$data['subject']]);
        $discordMessage = json_encode(['content' => $formattedMessage], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $discordMessage);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($discordMessage)
        ]);

        curl_exec($curl);
        curl_close($curl);
    }

    public function Communication_Manager()
    {
        $this->setCurrentUser();
        echo view('User/Support/Communication_Manager');
    }

    public function Feedback()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        echo view('Support/Feedback', $data);
    }

    public function KnowledgeBase()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        echo view('Support/Knowledge_Base', $data);
    }

    public function MyRequest()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        echo view('Support/My_Request', $data);
    }

    public function Request()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        echo view('Support/Request', $data);
    }

    public function Response()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'url_link' => 'trim',
            'email' => 'trim',
            'name' => 'trim',
            'subpage_icon' => 'trim',
            // Add other validation rules as needed
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->renderTheme('Support/Response', [
                'validation' => $validation,
                'pageType' => 'Customer_Support',
                'pageName' => 'Customer_Support_Response',
            ]);
        } else {
            // set variables from the form
            $date = date("n/j/Y");
            $time = date("g:i A");
            $formData = $this->request->getPost();
            $response = 1; // Assuming response is always set to 1

            if ($this->supportModel->submitResponse($date, $time, $formData, $response)) {
                $emailMessageData = [
                    'date' => $date,
                    'time' => $time,
                    // Include other necessary data from $formData
                ];

                $email = \Config\Services::email();
                $email->setFrom('support@mymillennialinvestments.com', 'Millennial Investments');
                $email->setTo('admin@mymillennialinvestments.com');
                $email->setSubject('Customer Service Request | Millennial Investments');
                $email->setMessage(view('Support/Emails/Requests', $emailMessageData));

                if ($email->send()) {
                    session()->setFlashdata('message', 'Customer Support - Support Request Submitted Successfully');
                    return redirect()->to('Customer-Support/Response/' . $formData['res_id']);
                } else {
                    // Handle email sending failure
                }
            } else {
                // Handle submitResponse failure
                $data['error'] = 'There was a problem submitting your service request. Please try again.';
                return $this->renderTheme('Customer-Support/Response/' . $formData['res_id'], $data);
            }
        }
    }

    public function Close_Request($respID, $user_id)
    {
        // Business logic to close request
        $result = $this->supportModel->closeRequest($respID, $user_id);
        if ($result) {
            return redirect()->to('/Customer-Support/Requests')->with('message', 'Request Closed Successfully');
        } else {
            return redirect()->back()->with('error', 'Error in closing the request');
        }
    }
    
    private function saveData($type = 'insert', $id = 0)
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules($this->dashboardModel->getValidationRules($type));
    
        $payload = [
            'id' => $id,
            'data' => $this->request->getPost()
        ];
    
        if (!$validation->withRequest($this->request)->run()) {
            return false;
        }
    
        $data = $this->dashboardModel->prepareData($this->request->getPost());
        $result = false;
        
        if ($type == 'insert') {
            $id = $this->dashboardModel->insert($data);
            $result = is_numeric($id) ? $id : false;
        } else {
            $result = $this->dashboardModel->update($id, $data);
        }
    
        return $result;
    }
    
    protected function setCurrentUser()
    {
        $this->current_user = service('auth')->getCurrentUser();
        if ($this->current_user) {
            // Set current user details
            // For example:
            // $this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");
        }
        $this->template->set('current_user', $this->current_user);
    }
    
    private function preparePageData($pageType, $pageName)
    {
        $request = service('request');
        return [
            'pageType' => $pageType,
            'pageName' => $pageName,
            'pageURIA' => $request->uri->getSegment(1),
            'pageURIB' => $request->uri->getSegment(2),
            'pageURIC' => $request->uri->getSegment(3),
            'pageURID' => $request->uri->getSegment(4),
            'pageURIE' => $request->uri->getSegment(5),
            // Add other data as needed
        ];
    }
    /* end ./application/controllers/home.php */
}
