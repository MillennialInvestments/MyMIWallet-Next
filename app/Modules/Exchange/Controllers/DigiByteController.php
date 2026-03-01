<?php namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;
use App\Services\DigiByteService;

#[\AllowDynamicProperties]
class DigiByteController extends \App\Controllers\BaseController
{
    protected $request;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->request = service('request');
    }

    protected function respondError(string $msg, int $code = 400)
    {
        return $this->response->setStatusCode($code)->setJSON([
            'status' => 'error',
            'message' => $msg,
            'csrf' => csrf_hash(),
        ]);
    }

    public function fetchFrontendData()
    {
        if (!$this->request->isAJAX()) {
            return $this->respondError('Invalid request', 405);
        }
        $address = trim((string) $this->request->getPost('address'));
        $svc = new DigiByteService();
        if (!$svc->isValidAddress($address)) {
            return $this->respondError('Invalid address', 422);
        }
        $data = [
            'balance' => $svc->getBalance($address),
            'utxos'   => $svc->getUtxos($address),
        ];
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data,
            'csrf' => csrf_hash(),
        ]);
    }

    public function provisionDefaultWallet()
    {
        if (!$this->request->isAJAX()) {
            return $this->respondError('Invalid request', 405);
        }
        // Placeholder implementation
        return $this->response->setJSON([
            'status' => 'success',
            'data' => [],
            'csrf' => csrf_hash(),
        ]);
    }

    public function connectWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::connectWallet');
        return redirect()->to('/Maintenance');
    }

    public function createWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::createWallet');
        return redirect()->to('/Maintenance');
    }

    public function disconnectWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::disconnectWallet');
        return redirect()->to('/Maintenance');
    }

    public function getAssets(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::getAssets');
        return redirect()->to('/Maintenance');
    }

    public function refreshWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::refreshWallet');
        return redirect()->to('/Maintenance');
    }
}
?>
