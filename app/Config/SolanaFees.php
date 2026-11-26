<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * MyMI service fees paid in SOL. Two separate charges, priced on their own:
 *
 *   transfer_processing  charged on each Secure Transfer send
 *   payment_processing   charged by payment flows that opt in
 *
 * A fee is a payment from the user's own wallet to the MyMI treasury wallet for
 * a MyMI service. MyMI never holds or forwards anyone else's funds here.
 * Each fee is off (0) until its env value is set, and nothing is charged
 * without a treasury wallet.
 */
class SolanaFees extends BaseConfig
{
    public const KINDS = ['transfer_processing', 'payment_processing'];

    /** Treasury wallet (base58 public key) that receives every fee. Empty = fees off. */
    public string $treasury = '';
    /** Price per kind, in lamports (1 SOL = 1,000,000,000 lamports). */
    public array $lamports = ['transfer_processing' => 0, 'payment_processing' => 0];
    /** RPC used to check payments. Use devnet on staging so tests cost nothing real. */
    public string $rpc = '';
    /** 'mainnet-beta' or 'devnet'; shown to the user so they pay on the right network. */
    public string $cluster = 'mainnet-beta';
    /** A payment older than this cannot be used for a new charge. */
    public int $maxAgeSeconds = 3600;

    public function __construct()
    {
        parent::__construct();
        $this->treasury = trim((string) env('SOLANA_FEE_TREASURY', $this->treasury));
        $this->lamports = [
            'transfer_processing' => max(0, (int) env('SOLANA_FEE_TRANSFER_LAMPORTS', 0)),
            'payment_processing' => max(0, (int) env('SOLANA_FEE_PAYMENT_LAMPORTS', 0)),
        ];
        $this->rpc = trim((string) env('SOLANA_FEE_RPC', ''));
        if ($this->rpc === '') {
            $this->rpc = (string) config(Solana::class)->rpcPrimary;
        }
        $this->cluster = (string) env('SOLANA_FEE_CLUSTER', str_contains($this->rpc, 'devnet') ? 'devnet' : 'mainnet-beta');
        $this->maxAgeSeconds = (int) env('SOLANA_FEE_MAX_AGE_SECONDS', $this->maxAgeSeconds);
    }
}
