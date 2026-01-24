<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class WalletConnect extends BaseConfig
{
    public string $projectId = '';
    public string $relay = 'wss://relay.walletconnect.com';
}
?>