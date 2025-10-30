<?php 
namespace App\Libraries;

use App\Libraries\{BaseLoader};

#[\AllowDynamicProperties]
class MyMISolflare
{


    protected $solana;
    private string $nonceKey = 'solflare_nonce';

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
            'provider' => 'solflare',
            'label'    => 'Solflare',
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
        return $this->solana->transfer($from, $to, $amount, $opts);
    }

    public function swap(array $params): array
    {
        return $this->solana->swap($params);
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
        return $this->solana->createToken($spec);
    }

    public function mintTo(string $mint, string $dest, string $amount): array
    {
        return $this->solana->mintTo($mint, $dest, $amount);
    }
}
