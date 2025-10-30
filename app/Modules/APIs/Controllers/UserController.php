<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;

#[\AllowDynamicProperties]
class UserController extends BaseController
{
    use ResponseTrait;

    /** Only declare properties NOT already provided by BaseLoader */
    protected UserModel $userModel;

    public function __construct()
    {
        // CI4 base Controller already has $request; no need to redeclare it.
        // BaseLoader should define $MyMIExchange, $MyMIMarketing, $MyMIUser.
        // If BaseLoader does not new() them, we assign to the trait properties here.
        $this->userModel     = model(UserModel::class);

        // These assignments are SAFE because properties come from BaseLoader.
        // If BaseLoader already initializes them, these lines are harmless.
        $this->MyMIExchange  = service('MyMIExchange');
        $this->MyMIMarketing = service('MyMIMarketing');
        $this->MyMIUser      = service('MyMIUser');
    }

    public function health()
    {
        return $this->respond(['status' => 'ok']);
    }

    public function addComment()
    {
        helper(['form', 'security']);

        log_message('info', 'UserController::addComment - Submitting User Comment');

        $userId = $this->request->getPost('user_id')
            ?? session()->get('user_id')
            ?? $this->request->getIPAddress();

        $data = [
            'ticker'       => $this->request->getPost('ticker'),
            'comment_text' => $this->request->getPost('comment_text'),
            'user_id'      => $userId,
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        log_message('info', 'UserController::addComment - $data: ' . print_r($data, true));

        $rules = [
            'ticker'       => 'required',
            'comment_text' => 'required|min_length[3]',
        ];

        if (! $this->validate($rules)) {
            $errors = $this->validator ? $this->validator->getErrors() : ['validation' => 'failed'];
            log_message('error', 'Validation failed: ' . json_encode($errors));

            return $this->response
                ->setJSON([
                    'success'    => false,
                    'message'    => 'Validation failed',
                    'errors'     => $errors,
                    'csrf_token' => csrf_hash(),
                ])
                ->setStatusCode(400);
        }

        // Assuming UserModel exposes addComment($data). If not, swap in the correct model.
        $inserted = $this->userModel->addComment($data);

        if (! $inserted) {
            // Fix: avoid undefined $commentsModel; use $this->userModel->errors()
            $modelErrors = method_exists($this->userModel, 'errors') ? $this->userModel->errors() : [];
            log_message('error', 'Database Insert Failed: ' . json_encode($modelErrors));

            return $this->response
                ->setJSON([
                    'success'    => false,
                    'message'    => 'Database insert failed',
                    'errors'     => $modelErrors,
                    'csrf_token' => csrf_hash(),
                ])
                ->setStatusCode(500);
        }

        return $this->response
            ->setJSON([
                'success'     => true,
                'user_id'     => $data['user_id'],
                'comment_text'=> $data['comment_text'],
                'created_at'  => $data['created_at'],
                'csrf_token'  => csrf_hash(),
            ])
            ->setStatusCode(200);
    }

    public function getBalance($address)
    {
        $data = $this->getMyMIExchange()->forChain('solana')->getBalance($address);
        return $this->respond($data);
    }

    public function getTokenAccounts($address)
    {
        $data = $this->getMyMIExchange()->forChain('solana')->getTokenAccounts($address);
        return $this->respond($data);
    }

    public function transfer()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $data = $this->MyMIExchange->forChain('solana')->transfer(
            $payload['from']   ?? '',
            $payload['to']     ?? '',
            $payload['amount'] ?? '',
            $payload['opts']   ?? []
        );
        return $this->respond($data);
    }

    public function quote()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $data = $this->MyMIExchange->forChain('solana')->getQuote($payload);
        return $this->respond($data);
    }

    public function swap()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $data = $this->MyMIExchange->forChain('solana')->swap($payload);
        return $this->respond($data);
    }

    public function createToken()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $data = $this->MyMIExchange->forChain('solana')->createToken($payload);
        return $this->respond($data);
    }

    public function mint()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $data = $this->MyMIExchange->forChain('solana')->mintTo(
            $payload['mint']  ?? '',
            $payload['dest']  ?? '',
            $payload['amount']?? ''
        );
        return $this->respond($data);
    }
}

