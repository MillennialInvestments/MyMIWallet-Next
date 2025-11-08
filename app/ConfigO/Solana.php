<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Solana extends BaseConfig
{
    public string $rpcPrimary;
    public array $rpcFallbacks = [];
    public string $commitment;

    public function __construct()
    {
        $this->rpcPrimary   = env('SOLANA_RPC_PRIMARY', 'https://api.mainnet-beta.solana.com');
        $fallbacks          = env('SOLANA_RPC_FALLBACKS');
        $this->rpcFallbacks = $fallbacks ? array_map('trim', explode(',', $fallbacks)) : [];
        $this->commitment   = env('SOLANA_COMMITMENT', 'confirmed');
    }
}