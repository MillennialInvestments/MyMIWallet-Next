<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\MyMIRobinhood;
use App\Libraries\MyMISnapTrader;

#[\AllowDynamicProperties]
class BrokerSmokeController extends \App\Controllers\BaseController
{
    public function rhAccount(): ResponseInterface
    {
        try {
            $rh = new MyMIRobinhood();
            $res = $rh->getAccount();
            return $this->response->setStatusCode($res->getStatusCode())->setBody($res->getBody());
        } catch (\Throwable $e) {
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function snapAccounts(string $userId): ResponseInterface
    {
        try {
            $st = new MyMISnapTrader();
            $res = $st->listAccounts($userId);
            return $this->response->setStatusCode($res->getStatusCode())->setBody($res->getBody());
        } catch (\Throwable $e) {
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function rhEnvDebug()
    {
        $peek = [
            'env()'       => function_exists('env') ? env('ROBINHOOD_API_KEY') : null,
            '_ENV'        => $_ENV['ROBINHOOD_API_KEY']   ?? null,
            '_SERVER'     => $_SERVER['ROBINHOOD_API_KEY']?? null,
            'getenv'      => getenv('ROBINHOOD_API_KEY'),
            'constant'    => defined('ROBINHOOD_API_KEY') ? ROBINHOOD_API_KEY : null,
            'base'        => getenv('ROBINHOOD_BASE_URL'),
            'seed_len'    => ($v = getenv('ROBINHOOD_PRIVATE_SEED_B64')) ? strlen($v) : 0,
        ];
        return $this->response->setJSON($peek);
    }

}
