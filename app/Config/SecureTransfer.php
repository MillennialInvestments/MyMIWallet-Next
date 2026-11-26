<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * MyMI Secure Transfer (end-to-end encrypted wallet-to-wallet files).
 *
 * Off by default. Turn on per environment with SECURE_TRANSFER_ENABLED=true after
 * staging passes. The server only ever holds ciphertext and signed manifests.
 */
class SecureTransfer extends BaseConfig
{
    public bool $enabled = false;
    /** Shown inside the binding statement; a signature for another domain is refused. */
    public string $domain = 'mymiwallet.com';
    public int $maxBytes = 26214400; // 25 MiB of ciphertext per transfer
    public int $maxRecipients = 10;
    public int $maxDays = 30;
    public int $nonceTtlSeconds = 300;
    public int $maxKeysPerWallet = 5;
    /** Per sender, rolling 24 hours. */
    public int $dailyTransfersPerUser = 50;
    public int $dailyBytesPerUser = 262144000; // 250 MiB
    /** Ciphertext store; one file per transfer, named by transfer id. */
    public string $storagePath = '';
    /**
     * Optional MyMI Coin gate: minimum token balance a sender must hold. 0 = off.
     * The balance check itself is wired separately (see docs/secure-transfer).
     */
    public int $minMymiCoinBalance = 0;
    /**
     * WalletConnect (Reown) project ID for "Connect with phone wallet" (QR). Public,
     * not a secret. Empty = the QR button is hidden.
     */
    public string $walletConnectProjectId = '';

    public function __construct()
    {
        parent::__construct();
        $this->enabled = filter_var(env('SECURE_TRANSFER_ENABLED', $this->enabled), FILTER_VALIDATE_BOOL);
        $this->domain = (string) env('SECURE_TRANSFER_DOMAIN', $this->domain);
        $this->maxBytes = (int) env('SECURE_TRANSFER_MAX_BYTES', $this->maxBytes);
        $this->walletConnectProjectId = trim((string) env('SECURE_TRANSFER_WC_PROJECT_ID', $this->walletConnectProjectId));
        $this->storagePath = (string) env('SECURE_TRANSFER_STORAGE', $this->storagePath !== '' ? $this->storagePath : WRITEPATH . 'secure_transfer');
    }
}
