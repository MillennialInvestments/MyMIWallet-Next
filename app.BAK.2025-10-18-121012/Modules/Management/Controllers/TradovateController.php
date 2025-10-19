<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;
use CodeIgniter\HTTP\RedirectResponse;

#[\AllowDynamicProperties]
class TradovateController extends \App\Controllers\BaseController
{
    private $client;
    private $tradovateApiUrl;
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->client = new Client();
        $this->tradovateApiUrl = 'https://demo.tradovateapi.com/v1'; // Use the appropriate API endpoint
        $this->clientId = getenv('TRADOVATE_CLIENT_ID'); // Ensure these are set in your .env file
        $this->clientSecret = getenv('TRADOVATE_CLIENT_SECRET');
        $this->redirectUri = getenv('TRADOVATE_REDIRECT_URI'); // e.g., https://yourdomain.com/tradovate/callback
    }

    public function login(): RedirectResponse
    {
        $authUrl = "https://live.tradovateapi.com/v1/oauth2/authorize?response_type=code&client_id={$this->clientId}&redirect_uri={$this->redirectUri}&scope=read write";

        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $code = $this->request->getGet('code');

        $response = $this->client->post("https://live.tradovateapi.com/v1/oauth2/token", [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $this->redirectUri,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $accessToken = $data['access_token'];
        $refreshToken = $data['refresh_token'];

        // Save tokens to the session or database
        session()->set('accessToken', $accessToken);
        session()->set('refreshToken', $refreshToken);

        // Redirect to a dashboard or home page
        return redirect()->to('/dashboard');
    }

    public function sendTradeOrder($accountId, $symbol, $orderType, $quantity)
    {
        $accessToken = session()->get('accessToken');

        $response = $this->client->post("{$this->tradovateApiUrl}/order/placeorder", [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'accountId' => $accountId,
                'action' => $orderType, // 'BUY' or 'SELL'
                'symbol' => $symbol,
                'orderQty' => $quantity,
                'orderType' => 'Market', // Example order type
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function copyTrade($mainAccountId, $symbol, $orderType, $quantity, $subAccounts)
    {
        // Send trade order to main account
        $mainTradeResponse = $this->sendTradeOrder($mainAccountId, $symbol, $orderType, $quantity);

        // Send trade order to sub-accounts
        foreach ($subAccounts as $subAccountId) {
            $this->sendTradeOrder($subAccountId, $symbol, $orderType, $quantity);
        }

        return json_encode(['status' => 'success']);
    }

    public function index()
    {
        $mainAccountId = 'MAIN_TRADOVATE_ACCOUNT_ID';
        $subAccounts = [
            'SUB_ACCOUNT_ID_1',
            'SUB_ACCOUNT_ID_2',
            // Add more sub-account IDs as needed
        ];

        $symbol = 'AAPL'; // Example symbol
        $orderType = 'BUY'; // or 'SELL'
        $quantity = 100; // Example quantity

        $response = $this->copyTrade($mainAccountId, $symbol, $orderType, $quantity, $subAccounts);

        return $this->response->setJSON($response);
    }
}
