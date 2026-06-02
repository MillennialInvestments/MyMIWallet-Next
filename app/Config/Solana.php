<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Solana extends BaseConfig
{
    public string $rpcPrimary = "";
    public array $rpcFallbacks = [];

    /**
     * Solana transaction safety defaults.
     *
     * These flags intentionally fail closed in production. They must be
     * enabled explicitly through environment configuration before any
     * transaction-like workflow can move beyond dry-run/preflight behavior.
     */
    public bool $allowTransactionExecution = false;
    public bool $allowMainnetBroadcast = false;
    public bool $allowMainnetMint = false;
    public bool $allowPrivateKeySubmission = false;
    public bool $requireWalletSignature = true;
    public bool $defaultDryRun = true;
    public string $commitment = "";

    public function __construct()
    {
        parent::__construct();

        $this->rpcPrimary   = (string) env('SOLANA_RPC_PRIMARY', 'https://api.mainnet-beta.solana.com');
        $fallbacks          = (string) env('SOLANA_RPC_FALLBACKS', "");
        $this->rpcFallbacks = $fallbacks !== "" ? array_map('trim', explode(',', $fallbacks)) : [];

        $this->allowTransactionExecution = filter_var(env('SOLANA_ALLOW_TRANSACTION_EXECUTION', false), FILTER_VALIDATE_BOOL);
        $this->allowMainnetBroadcast     = filter_var(env('SOLANA_ALLOW_MAINNET_BROADCAST', false), FILTER_VALIDATE_BOOL);
        $this->allowMainnetMint          = filter_var(env('SOLANA_ALLOW_MAINNET_MINT', false), FILTER_VALIDATE_BOOL);
        $this->allowPrivateKeySubmission = filter_var(env('SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION', false), FILTER_VALIDATE_BOOL);
        $this->requireWalletSignature    = filter_var(env('SOLANA_REQUIRE_WALLET_SIGNATURE', true), FILTER_VALIDATE_BOOL);
        $this->defaultDryRun             = filter_var(env('SOLANA_DEFAULT_DRY_RUN', true), FILTER_VALIDATE_BOOL);
        $this->commitment   = (string) env('SOLANA_COMMITMENT', 'confirmed');
    }
}
