<?php namespace App\Libraries;

use App\Services\InfuraService;

#[\AllowDynamicProperties]
class MyMIInfura
{
    protected InfuraService $svc;

    public function __construct()
    {
        $this->svc = new InfuraService();
    }

    public function getEthBalance(string $address): ?float
    {
        $res = $this->svc->getBalance($address);
        if (empty($res['result'])) return null;
        return hexdec($res['result']) / 1e18;
    }
}
?>
