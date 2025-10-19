<?php namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;
use App\Services\DigiByteService;

#[\AllowDynamicProperties]
class DigiByteController extends \App\Controllers\BaseController
{
    protected $request;

    public function __construct()
    {
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
}
?>
