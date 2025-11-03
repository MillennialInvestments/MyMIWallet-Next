<?php namespace App\Modules\Exchange\Controllers;

use Config\Services; 
use App\Config\{APIs, Auth, SiteSettings};
use App\Libraries\{MyMIGemini};

#[\AllowDynamicProperties]
class GeminiController extends UserController {
    protected MyMIGemini $MyMIGemini;
    protected $APIs; 

    public function __construct() {
        $this->APIs         = config('APISettings'); 
        $apiKey             = $this->APIs->geminiAPIKey;
        $apiSecret          = $this->APIs->geminiAPISecret;
        $this->MyMIGemini = new MyMIGemini($apiKey, $apiSecret);
    }

    public function placeOrder() {
        $symbol = $this->request->getPost('symbol');
        $amount = $this->request->getPost('amount');
        $price = $this->request->getPost('price');
        $side = $this->request->getPost('side');

        $response = $this->MyMIGemini->placeOrder($symbol, $amount, $price, $side);
        return $this->response->setJSON($response);
    }

    public function getBalances() {
        $response = $this->MyMIGemini->getBalances();
        return $this->response->setJSON($response);
    }

    public function getMarketPrice($symbol) {
        $response = $this->MyMIGemini->getMarketPrice($symbol);
        return $this->response->setJSON($response);
    }

    public function subscribeToMarketData() {
        $symbols = $this->request->getPost('symbols');
        $this->MyMIGemini->subscribeToMarketData($symbols);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function withdrawToAddress() {
        $currency = $this->request->getPost('currency');
        $address = $this->request->getPost('address');
        $amount = $this->request->getPost('amount');

        $response = $this->MyMIGemini->withdrawToAddress($currency, $address, $amount);
        return $this->response->setJSON($response);
    }

    public function getDepositAddress() {
        $currency = $this->request->getPost('currency');

        $response = $this->MyMIGemini->getDepositAddress($currency);
        return $this->response->setJSON($response);
    }

    public function getOrderStatus() {
        $orderId = $this->request->getPost('order_id');

        $response = $this->MyMIGemini->getOrderStatus($orderId);
        return $this->response->setJSON($response);
    }

    public function cancelOrder() {
        $orderId = $this->request->getPost('order_id');

        $response = $this->MyMIGemini->cancelOrder($orderId);
        return $this->response->setJSON($response);
    }

    public function getTradeHistory() {
        $symbol = $this->request->getPost('symbol');
        $since = $this->request->getPost('since');

        $response = $this->MyMIGemini->getTradeHistory($symbol, $since);
        return $this->response->setJSON($response);
    }
}

