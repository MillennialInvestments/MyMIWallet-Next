<?php namespace App\Libraries;
use Config\Services;
use App\Config\APIs;
use App\Libraries\{BaseLoader, MyMISolana, ExchangeConnectorInterface};

#[\AllowDynamicProperties]
class MyMIGemini implements ExchangeConnectorInterface {

    protected $APIs;
    protected $apiKey;
    protected $apiSecret;
    protected $apiUrl; 
    protected $MyMIGemini; 
    protected $MyMISolana; 
    protected $geminiAPIKey; 
    protected $geminiAPISecret; 

    public function __construct() {
        $this->APIs = config('APIs');
        $this->apiKey = $this->APIs->geminiAPIKey;
        $this->apiSecret = $this->APIs->geminiAPISecret;
        $this->apiUrl = 'https://api.gemini.com/v1/';
        $this->MyMISolana = new MyMISolana(); 
    }

    // ExchangeConnectorInterface
    public function getQuote(array $p): array
    {
        $symbol = $p['symbol'] ?? '';
        $price  = $this->price($symbol);
        return ['symbol' => $symbol, 'price' => $price];
    }

    public function trade(array $p): array
    {
        return $this->placeOrder($p['symbol'], $p['amount'], $p['price'], $p['side'] ?? 'buy');
    }

    public function price(string $symbol): ?float
    {
        $data = $this->getMarketPrice($symbol);
        return isset($data['last']) ? (float) $data['last'] : null;
    }

    public function balances(string $accountId): array
    {
        return $this->getBalances();
    }

    protected function request($endpoint, $method = 'GET', $params = []) {
        $url = $this->apiUrl . $endpoint;
        $nonce = time();
        $payload = [
            'request' => '/' . $endpoint,
            'nonce' => $nonce,
        ];

        if (!empty($params)) {
            $payload = array_merge($payload, $params);
        }

        $payload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha384', $payload, $this->apiSecret);

        $headers = [
            'Content-Type: application/json',
            'Content-Length: 0',
            'X-GEMINI-APIKEY: ' . $this->apiKey,
            'X-GEMINI-PAYLOAD: ' . $payload,
            'X-GEMINI-SIGNATURE: ' . $signature,
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if ($method == 'POST' && !empty($params)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        }

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    public function placeOrder($symbol, $amount, $price, $side) {
        $endpoint = 'order/new';
        $params = [
            'symbol' => $symbol,
            'amount' => $amount,
            'price' => $price,
            'side' => $side,
            'type' => 'exchange limit',
        ];

        return $this->request($endpoint, 'POST', $params);
    }

    public function getBalances() {
        $endpoint = 'balances';
        return $this->request($endpoint, 'POST');
    }

    public function getMarketPrice($symbol) {
        $endpoint = 'pubticker/' . $symbol;
        return $this->request($endpoint, 'GET');
    }

    public function subscribeToMarketData($symbols) {
        // Assuming this is a placeholder for a WebSocket subscription implementation
        // Gemini does not provide a standard REST endpoint for live market data subscriptions
    }

    public function withdrawToAddress($currency, $address, $amount) {
        $endpoint = 'withdraw/' . strtolower($currency);
        $params = [
            'address' => $address,
            'amount' => $amount,
        ];

        return $this->request($endpoint, 'POST', $params);
    }

    public function getDepositAddress($currency) {
        $endpoint = 'deposit/' . strtolower($currency) . '/newAddress';
        return $this->request($endpoint, 'POST');
    }

    public function getOrderStatus($orderId) {
        $endpoint = 'order/status';
        $params = [
            'order_id' => $orderId,
        ];

        return $this->request($endpoint, 'POST', $params);
    }

    public function cancelOrder($orderId) {
        $endpoint = 'order/cancel';
        $params = [
            'order_id' => $orderId,
        ];

        return $this->request($endpoint, 'POST', $params);
    }

    public function getTradeHistory($symbol, $since = null) {
        $endpoint = 'mytrades';
        $params = [
            'symbol' => $symbol,
        ];

        if ($since) {
            $params['since'] = $since;
        }

        return $this->request($endpoint, 'POST', $params);
    }
}
