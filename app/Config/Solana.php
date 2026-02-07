<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Solana extends BaseConfig
{
    public string $rpcPrimary = "";
    public array $rpcFallbacks = [];
    public string $commitment = "";

    public function __construct()
    {
        parent::__construct();

        $this->rpcPrimary   = (string) env('SOLANA_RPC_PRIMARY', 'https://api.mainnet-beta.solana.com');
        $fallbacks          = (string) env('SOLANA_RPC_FALLBACKS', "");
        $this->rpcFallbacks = $fallbacks !== "" ? array_map('trim', explode(',', $fallbacks)) : [];
        $this->commitment   = (string) env('SOLANA_COMMITMENT', 'confirmed');
    }
}
