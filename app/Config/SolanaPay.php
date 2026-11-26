<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Solana Pay checkout: MyMI sells its own products (MyMI Gold, memberships,
 * auction balance, project fund units) for USDC on Solana. The buyer's own
 * wallet signs one transaction that pays the price to MyMI and, in the same
 * transaction, the SOL payment-processing fee (Config\SolanaFees) to the
 * treasury. MyMI never holds keys or anyone else's funds.
 *
 * Off until SOLANA_PAY_ENABLED=true and a recipient wallet is set.
 */
class SolanaPay extends BaseConfig
{
    public const USDC_MAINNET = 'EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v';
    public const USDC_DEVNET = '4zMMC9srt5Ri5X14GAgXhaHii3GnPAEERYPJgZJDncDU';

    /** Purposes MyMI sells, mapped to the feature switch that must be on. */
    public const PURPOSES = [
        'mymigold'      => 'mymigold_purchases',
        'membership'    => 'membership_purchases',
        'auction_topup' => 'auctions',
        'fund_units'    => 'project_investing',
    ];

    public bool $enabled = false;
    /** Wallet (base58) that receives the price. Defaults to the fee treasury. */
    public string $recipient = '';
    /** Recipient's USDC token account. Empty = looked up from the recipient wallet. */
    public string $recipientUsdcAccount = '';
    public string $usdcMint = self::USDC_MAINNET;
    public int $usdcDecimals = 6;
    /** RPC endpoints, tried in order. Defaults to the fee RPC, then Config\Solana's. */
    public array $rpcUrls = [];
    public string $cluster = 'mainnet-beta';
    /** A checkout must be paid within this window. */
    public int $requestTtlSeconds = 900;
    /** Smallest and largest checkout, in US cents. */
    public int $minCents = 100;
    public int $maxCents = 1000000;
    /** Compute units requested; the transfer, fee and memo use well under this. */
    public int $computeUnitLimit = 80000;
    /** Priority fee bounds in micro-lamports per compute unit (sized from recent fees). */
    public int $priorityMinMicroLamports = 1000;
    public int $priorityMaxMicroLamports = 2000000;
    public string $label = 'MyMI Wallet';
    public string $icon = '';

    public function __construct()
    {
        parent::__construct();
        $fees = config(SolanaFees::class);
        $solana = config(Solana::class);

        $this->enabled = filter_var(env('SOLANA_PAY_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
        $this->recipient = trim((string) env('SOLANA_PAY_RECIPIENT', '')) ?: $fees->treasury;
        $this->recipientUsdcAccount = trim((string) env('SOLANA_PAY_USDC_ACCOUNT', ''));

        $urls = array_filter(array_map('trim', explode(',', (string) env('SOLANA_PAY_RPC', ''))));
        if ($urls === []) {
            $urls = array_merge([$fees->rpc], $solana->rpcFallbacks ?? []);
        }
        $this->rpcUrls = array_values(array_unique(array_filter($urls)));
        $this->cluster = $fees->cluster;
        $this->usdcMint = trim((string) env('SOLANA_PAY_USDC_MINT', ''))
            ?: ($this->cluster === 'devnet' ? self::USDC_DEVNET : self::USDC_MAINNET);
        $this->requestTtlSeconds = (int) env('SOLANA_PAY_TTL_SECONDS', $this->requestTtlSeconds);
        $this->icon = (string) env('SOLANA_PAY_ICON', base_url('assets/images/MyMI-Wallet-Logo-1024x1024.png'));
    }

    public function ready(): bool
    {
        return $this->enabled && $this->recipient !== '' && $this->rpcUrls !== [];
    }
}
