<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;
use Throwable;

#[\AllowDynamicProperties]
class UserController extends BaseController
{
    use ResponseTrait;

    /** Only declare properties NOT already provided by BaseLoader */
    protected UserModel $userModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // CI4 base Controller already has $request; no need to redeclare it.
        // BaseLoader should define $MyMIExchange, $MyMIMarketing, $MyMIUser.
        // If BaseLoader does not new() them, we assign to the trait properties here.
        $this->userModel     = model(UserModel::class);

        // These assignments are SAFE because properties come from BaseLoader.
        // If BaseLoader already initializes them, these lines are harmless.
        try {
            $this->MyMIExchange  = service('MyMIExchange');
        } catch (Throwable $e) {
            log_message('error', '[API] MyMIExchange service unavailable: {message}', ['message' => $e->getMessage()]);
            $this->MyMIExchange = null;
        }

        try {
            $this->MyMIMarketing = service('MyMIMarketing');
        } catch (Throwable $e) {
            log_message('error', '[API] MyMIMarketing service unavailable: {message}', ['message' => $e->getMessage()]);
            $this->MyMIMarketing = null;
        }

        try {
            $this->MyMIUser = $this->getMyMIUser();
        } catch (Throwable $e) {
            log_message('error', '[API] MyMIUser dependency unavailable: {message}', ['message' => $e->getMessage()]);
            $this->MyMIUser = null;
        }
    }

    protected function requireAuthenticatedUser(): ?ResponseInterface
    {
        if ($this->getCuID()) {
            return null;
        }

        log_message('warning', '[API] Unauthorized request blocked for route: {route}', ['route' => current_url()]);

        return $this->failUnauthorized('Unauthorized');
    }

    protected function requireInternalAccess(): ?ResponseInterface
    {
        if (is_cli()) {
            return null;
        }

        try {
            $tokenService = service('internalToken');
        } catch (Throwable $e) {
            log_message('error', '[API] Internal token service unavailable for route {route}: {message}', [
                'route'   => current_url(),
                'message' => $e->getMessage(),
            ]);

            return $this->failServerError('Internal processing error');
        }

        if (! $tokenService || ! method_exists($tokenService, 'allowed') || ! $tokenService->allowed()) {
            log_message('warning', '[API] Internal endpoint blocked: {route}', ['route' => current_url()]);
            return $this->failForbidden('Internal endpoint');
        }

        return null;
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
            'created_at'   => date('Y-m-d H:i'),
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
                'comment'     => $data['comment_text'],
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
