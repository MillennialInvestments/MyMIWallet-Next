<?php namespace App\Libraries;

use Config\WalletConnect;

#[\AllowDynamicProperties]
class MyMIWalletConnect
{
    protected WalletConnect $cfg;

    public function __construct(?WalletConnect $cfg = null)
    {
        $this->cfg = $cfg ?? config('WalletConnect');
    }

    public function getConfig(): array
    {
        return [
            'projectId' => $this->cfg->projectId,
            'relay'     => $this->cfg->relay,
        ];
    }
}
?>
