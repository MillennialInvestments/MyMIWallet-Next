<?php 
namespace App\Libraries;

use App\Libraries\{BaseLoader, CryptoCurrencyInterface};

/**
 * Phantom wallet adapter for Solana. Provides local signature challenges
 * without performing RPC calls.
 */
#[\AllowDynamicProperties]
class MyMIPhantom
{


    protected $solana;
    private string $nonceKey = 'phantom_nonce';

    public function __construct()
    {
        $this->solana = service('myMISolana');
    }

    private function b58decode(string $b58): string
    {
        $alphabet = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
        $base = strlen($alphabet);
        $num = gmp_init(0);
        for ($i = 0, $len = strlen($b58); $i < $len; $i++) {
            $pos = strpos($alphabet, $b58[$i]);
            if ($pos === false) { return ''; }
            $num = gmp_add(gmp_mul($num, $base), $pos);
        }
        $bin = gmp_export($num);
        $leading = 0;
        while ($leading < strlen($b58) && $b58[$leading] === '1') { $leading++; }
        return str_repeat("\x00", $leading) . ($bin !== false ? $bin : '');
    }

    public function connect(array $opts = []): array
    {
        return [
            'provider' => 'phantom',
            'label'    => 'Phantom',
            'chain'    => 'solana',
        ];
    }

    public function challenge(): array
    {
        $nonce = bin2hex(random_bytes(16));
        session()->set($this->nonceKey, $nonce);
        return [
            'ok'      => true,
            'nonce'   => $nonce,
            'message' => 'Sign nonce to verify ownership.',
            'csrf'    => service('security')->getCSRFHash(),
        ];
    }

    public function verify(string $address, string $signature): array
    {
        $sol   = service('myMISolana');
        $addr  = $sol->normalizeAddress($address);
        $nonce = session()->get($this->nonceKey);
        $csrf  = service('security')->getCSRFHash();
        if (!$addr || !$nonce || !$sol->isValidPublicKey($addr)) {
            return ['ok' => false, 'csrf' => $csrf];
        }
        $msg    = 'MyMI Wallet Login: ' . $nonce;
        $addrB  = $this->b58decode($addr);
        $sigB   = $this->b58decode($signature);
        $ok     = $addrB !== '' && $sigB !== '' && sodium_crypto_sign_verify_detached($sigB, $msg, $addrB);
        if ($ok) {
            session()->set('solana_public_key', $addr);
        }
        session()->remove($this->nonceKey);
        return ['ok' => $ok, 'address' => $ok ? $addr : null, 'csrf' => $csrf];
    }

    public function disconnect(): bool
    {
        return true;
    }

    public function getBalance(string $address, ?string $mint = null): array
    {
        return $this->solana->getBalance($address, $mint);
    }

    public function getTokenAccounts(string $address): array
    {
        return $this->solana->getTokenAccounts($address);
    }

    public function transfer(string $from, string $to, string $amount, array $opts = []): array
    {
        $network = (string) ($opts['network'] ?? env('SOLANA_NETWORK', 'mainnet'));
        return $this->solanaLibraryGuard('transfer', $network, [
            'from' => $from,
            'to' => $to,
            'amount' => $amount,
            'provider' => 'phantom',
        ]);
    }

    public function swap(array $params): array
    {
        $network = (string) ($params['network'] ?? env('SOLANA_NETWORK', 'mainnet'));
        return $this->solanaLibraryGuard('swap', $network, [
            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
            'provider' => 'phantom',
        ]);
    }

    public function getQuote(array $params): array
    {
        return $this->solana->getQuote($params);
    }

    public function getPrice(string $symbolOrMint): array
    {
        return $this->solana->getPrice($symbolOrMint);
    }

    public function createToken(array $spec): array
    {
        $network = (string) ($spec['network'] ?? env('SOLANA_NETWORK', 'mainnet'));
        return $this->solanaLibraryGuard('createToken', $network, [
            'spec' => array_diff_key($spec, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
            'provider' => 'phantom',
        ]);
    }

    public function mintTo(string $mint, string $dest, string $amount): array
    {
        return $this->solana->mintTo($mint, $dest, $amount);
    }

    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
    {
        $config = config(\Config\Solana::class);
        $network = strtolower((string) ($network ?: env('SOLANA_NETWORK', 'mainnet')));
        $isMainnet = str_contains($network, 'mainnet');
        $actionKey = strtolower($action);
        $isMint = in_array($actionKey, ['mint', 'minttokens', 'createtoken', 'createspltoken'], true);

        if (!($config->allowTransactionExecution ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Solana library transaction execution is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
            ], $extra);
        }

        if ($isMainnet && !($config->allowMainnetBroadcast ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
            ], $extra);
        }

        if ($isMainnet && $isMint && !($config->allowMainnetMint ?? false)) {
            return array_merge([
                'success' => false,
                'allowed' => false,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Mainnet Solana library minting is disabled by configuration.',
                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
            ], $extra);
        }

        if ($config->defaultDryRun ?? true) {
            return array_merge([
                'success' => true,
                'allowed' => true,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
            ], $extra);
        }

        return [
            'success' => true,
            'allowed' => true,
            'action' => $action,
            'network' => $network,
            'dry_run' => false,
            'broadcast' => false,
            'message' => 'Solana library guard passed, but this adapter does not broadcast transactions directly.',
        ];
    }

}
