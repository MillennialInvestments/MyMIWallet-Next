<?php namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMIMarketData};
use App\Services\DigiByteService;
use kornrunner\Keccak;
use Elliptic\EC;

#[\AllowDynamicProperties]
class MyMIDigibyte implements CryptoCurrencyInterface {

    protected DigiByteService $svc;
    private $ec;

    public function __construct() {
        $this->ec = new EC('secp256k1');
        $this->svc = new DigiByteService();
    }

    private function resolveCuID(?int $cuID): ?int
    {
        if (!empty($cuID) && $cuID > 0) return $cuID;
        $session = session();
        $cuID = (int)($session->get('cuID') ?? $session->get('user_id') ?? 0);
        return $cuID > 0 ? $cuID : null;
    }

    public function getUserDigiByte(?int $cuID = null): array
    {
        $cuID = $this->resolveCuID($cuID);
        if ($cuID === null) return [];

        $defAddr = $this->db->table('bf_exchanges_coin_addresses')
            ->where(['cuID' => $cuID, 'chain' => 'digibyte'])
            ->select('address')
            ->get()->getRowArray();

        $address = $defAddr['address'] ?? null;
        if (!$address || !$this->svc->isValidAddress($address)) return [];

        $balRes = $this->svc->getBalance($address);
        $utxos  = $this->svc->getUtxos($address);

        $price  = (new MyMIMarketData())->getPriceDGBFromCoingecko();
        $total  = $balRes['data']['confirmed_balance'] ?? 0;

        return [
            'address'   => $address,
            'balance'   => $total,
            'usdValue'  => $price ? $total * $price : null,
            'utxoCount' => count($utxos['data']['txs'] ?? []),
        ];
    }

    public function getTransactions(?int $cuID = null, ?string $address = null): array
    {
        $cuID = $this->resolveCuID($cuID);
        if ($address === null) {
            $defAddr = $this->db->table('bf_exchanges_coin_addresses')
                ->where(['cuID' => $cuID, 'chain' => 'digibyte'])
                ->select('address')
                ->get()->getRowArray();
            $address = $defAddr['address'] ?? '';
        }
        if (!$this->svc->isValidAddress($address)) return [];

        $utxos = $this->svc->getUtxos($address);
        return $utxos['data']['txs'] ?? [];
    }

    public function getDGBPrice(): ?float
    {
        return (new MyMIMarketData())->getPriceDGBFromCoingecko();
    }

    public function generateWallet() {
        $keyPair = $this->ec->genKeyPair();
        $publicKey = $keyPair->getPublic()->encode('hex');
        $privateKey = $keyPair->getPrivate()->toString('hex');
        $address = $this->publicKeyToAddress($publicKey);
        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
            'address' => $address
        ];
    }

    public function publicKeyToAddress($publicKey) {
        $publicKey = $this->ec->keyFromPublic($publicKey, 'hex')->getPublic()->encode('hex');
        $address = Keccak::hash(pack('H*', "04" . $publicKey), 256);
        $address = substr($address, -40);
        $address = "dgb1" . $this->base58CheckEncode(hex2bin($address));
        return $address;
    }

    public function signTransaction($transaction, $privateKey) {
        $keyPair = $this->ec->keyFromPrivate($privateKey, 'hex');
        $signature = $keyPair->sign($transaction);
        return $signature->toDER('hex');
    }

    public function verifySignature($transaction, $signature, $publicKey) {
        $keyPair = $this->ec->keyFromPublic($publicKey, 'hex');
        return $keyPair->verify($transaction, $signature);
    }

    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount) {
        $transaction = [
            'operation' => 'sendAsset',
            'from' => $fromAddress,
            'to' => $toAddress,
            'assetId' => $assetId,
            'amount' => $amount
        ];
        $transactionJson = json_encode($transaction);
        $signature = $this->signTransaction($transactionJson, $privateKey);
        $transaction['signature'] = $signature;
        return 'Transaction ID: ' . hash('sha256', $transactionJson);
    }

    public function getTransactionStatus($transactionId) {
        // This would typically be a network call to check the blockchain
        return "Status of transaction $transactionId";
    }

    public function getBalance($address) {
        // This would typically involve a network call to a blockchain node
        return "Balance for $address";
    }

    public function validateAddress($address) {
        // Validation logic here
        return preg_match('/^dgb1[a-z0-9]{35}$/', $address) === 1;
    }

    public function getCurrentBlock() {
        // Would typically involve a network call to a blockchain node
        return "Current block number";
    }

    public function estimateTransactionFee() {
        // Mock-up method
        return 0.0001; // Example fee
    }

    public function getNetworkStatus() {
        // Mock-up method
        return "Network is operational";
    }

    private function base58CheckEncode($input) {
        $checksum = hash('sha256', hash('sha256', $input, true), true);
        $checksum = substr($checksum, 0, 4);
        $encoded = $this->base58->encode($input . $checksum);
        return $encoded;
    }
}
