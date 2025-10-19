<?php
namespace App\Libraries; 

use App\Config\SiteSettings;
use App\Libraries\{BaseLoader, MyMIUser};
use App\Models\MyMIGoldModel;
use CodeIgniter\Session\Session;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIGold
{

    protected $alphaVantageApiKey; 
    protected $APIs; 
    protected $auth; 
    protected $coin;
    protected $db;
    protected $request; 
    protected $session;
    protected $MyMIGoldModel;
    protected $MyMIUser;
    protected $siteSettings;

    public function __construct() {
        $this->auth                                 = service('authentication'); 
        $this->APIs                                 = config('APIs');
        $this->db                                   = \Config\Database::connect();
        $this->alphaVantageApiKey                   = $this->APIs->alphaVantageApiKey; // Set your AlphaVantage API Key here
        $this->request                              = service('request');
        $this->session                              = service('session'); 
        $this->siteSettings                         = config('SiteSettings');
        $this->MyMIGoldModel                        = new MyMIGoldModel(); 
        // $this->MyMIGoldModel                        = []; 
        // $this->cuID                                 = $this->auth->user_id() ?? 0;

        // Initialize MyMIUser Library or Model
        // $this->MyMIUser                             = new MyMIUser();
        $cuID = service('authentication')->id() ?? service('session')->get('user_id');
    }

    /**
     * On-chain contract or mint identifiers per chain.
     * Values may be overridden via environment variables.
     */
    protected array $mints = [
        'solana'   => 'So11111111111111111111111111111111111111112',
        'ethereum' => '0x0000000000000000000000000000000000000000',
        'bitcoin'  => '',
        'digibyte' => '',
    ];

    /** Return configured mint/contract addresses per chain. */
    public function mints(): array
    {
        return $this->mints;
    }

    /** Basic token metadata used across chains. */
    public function metadata(): array
    {
        return [
            'name'     => 'MyMI Gold',
            'symbol'   => 'MYMIG',
            'decimals' => 9,
        ];
    }

    /**
     * Fetch balance for an address on a supported chain.
     * Returns normalized array: ['address'=>string|null,'amount'=>float,'uiAmount'?:float]
     */
    public function balance(string $address, string $chain): array
    {
        $chain = strtolower($chain);
        switch ($chain) {
            case 'solana':
                $svc  = service('myMISolana');
                $addr = $svc->normalizeAddress($address);
                if (!$addr) { return ['address' => null, 'amount' => 0]; }
                $res  = $svc->getBalance($addr, $this->mints['solana']);
                $lamports = $res['value'] ?? ($res['lamports'] ?? 0);
                return ['address' => $addr, 'amount' => $lamports, 'uiAmount' => $lamports / 1e9];
            case 'ethereum':
                $svc  = service('ethereumService');
                $addr = $svc->normalizeAddress($address);
                if (!$addr) { return ['address' => null, 'amount' => 0]; }
                $raw  = method_exists($svc, 'tokenBalance') ? $svc->tokenBalance($this->mints['ethereum'], $addr) : 0;
                return ['address' => $addr, 'amount' => $raw];
            case 'bitcoin':
                $svc  = service('myMIBitcoin');
                $addr = $svc->normalizeAddress($address);
                if (!$addr) { return ['address' => null, 'amount' => 0]; }
                $bal  = $svc->getBalance($addr);
                return ['address' => $addr, 'amount' => $bal['satoshi'] ?? 0];
            case 'digibyte':
                $svc  = service('myMIDigibyte');
                if (!method_exists($svc, 'normalizeAddress')) { return ['address'=>null,'amount'=>0]; }
                $addr = $svc->normalizeAddress($address);
                if (!$addr) { return ['address'=>null,'amount'=>0]; }
                $bal  = $svc->getBalance($addr);
                return ['address'=>$addr,'amount'=>is_numeric($bal)?(float)$bal:0];
            default:
                return ['address' => null, 'amount' => 0];
        }
    }
    
    public function getOrderInformation($orderID)
    {
        //getOrderInformation 					    = $this->MyMIGoldModel->getOrderInformation($orderID);

        $orderInfo								    = array(
            'amount'							    => $orderInformation['amount'],
            'total'								    => $orderInformation['total'],
            'total_fees'						    => $orderInformation['total_fees'],
        );
        return $orderInfo;
    }
    
    public function getCoinValue()
    {
        $getCoinValue							    = $this->MyMIGoldModel->getCoinValue();
        return $getCoinValue ?? '1.00';
    }
    
    public function getCoinInfo()
    {
        $coin                                       = 'MyMIG';
        $getCoinInfo                                = $this->MyMIGoldModel->getCoinInfo($coin);
        $coinInfo                                   = $getCoinInfo; 
        $getUserCoinTotal                           = $this->MyMIGoldModel->getUserCoinTotal(getCuID()); // Adjusted to use getRowArray
        // $MyMIGoldData                               = [];
        if (empty($coinInfo)) {
            // Handle empty case
            $current_value                          = 1;
            $initial_value                          = 1;
            $new_coin_value                         = 1;
            $gas_fee                                = 0.007457;
            $trans_fee                              = 0.60;
            $trans_percent                          = 1.058;

            $MyMIGoldData                           = [
                'current_value'					    => $current_value,
                'initial_value'					    => $initial_value,
                'mymig_coin_value'				    => $new_coin_value,
                'gas_fee'						    => $gas_fee,
                'trans_percent'					    => $trans_percent,
                'trans_fee'						    => $trans_fee,
            ];
        } else {            
            $MyMIGoldData                           = [
                'current_value'                     => $coinInfo['current_value'],
                'initial_value'                     => $coinInfo['initial_value'],
                'mymig_coin_value'                  => $coinInfo['new_coin_value'],
                'gas_fee'                           => $coinInfo['gas_fee'],
                'trans_percent'                     => $coinInfo['trans_percent'],
                'trans_fee'                         => $coinInfo['trans_fee'],
            ];
        }
        if (empty($getUserCoinTotal)) {
            // Handle empty case

            $MyMIGoldData['available_coins']        = 1000000000;
            
        } else {
            $MyMIGoldData['available_coins']        = $getUserCoinTotal['total'];
        }
        return $MyMIGoldData;
    }

    public function getUserCoinTotal($cuID = null)
    {
        $cuID = $cuID ?? getCuID() ?? session()->get('user_id');
        if (empty($cuID)) {
            log_message('error', 'MyMIGold::getUserCoinTotal() called with null cuID. Skipping processing.');
            return [
                'coin_value' => '1.00',
                'totalValue' => '$0.00',
                'coinSum' => 0,
                'myMIGPerChange' => '0.00',
                'myMIGPerChangeOutput' => '0.00%',
                'myMIGInitialValue' => '0.00',
                'myMIGCurrentValue' => '$0.00',
                'myMIGDifferential' => '0.00',
                'myMIGDifferentialOutput' => '0.00',
            ];
        }

        $coin_value = $this->siteSettings->MyMIGCoinValue ?? 1.00;
        $getUserCoinTotal = $this->MyMIGoldModel->getUserCoinTotal($cuID);

        if (!empty($getUserCoinTotal)) {
            $coinSum = $getUserCoinTotal['total'] ?? 0;
            $myMIGInitialValue = number_format($coinSum * $getUserCoinTotal['initial_coin_value'], 2);
            $myMIGCurrentValue = number_format($coinSum, 2);
            $myMIGDifferential = number_format($myMIGCurrentValue - $myMIGInitialValue, 2);
            $myMIGPerChange = '0.00%';
            $myMIGDifferentialOutput = $myMIGDifferential >= 0 ? '<span class="text-green">+$' . $myMIGDifferential . '</span>' : '<span class="text-red">-$' . $myMIGDifferential . '</span>';
            $totalValue = number_format($coin_value * $coinSum, 2);
        } else {
            $totalValue = '$0.00';
            $coinSum = 0;
            $myMIGPerChange = '0.00';
            $myMIGDifferentialOutput = '0.00';
            $myMIGInitialValue = '0.00';
            $myMIGCurrentValue = '$0.00';
            $myMIGDifferential = '0.00';
        }

        return [
            'coin_value' => $coin_value,
            'totalValue' => $totalValue,
            'coinSum' => round($coinSum, 0),
            'myMIGPerChange' => $myMIGPerChange,
            'myMIGPerChangeOutput' => $myMIGPerChange,
            'myMIGInitialValue' => $myMIGInitialValue,
            'myMIGCurrentValue' => $myMIGCurrentValue,
            'myMIGDifferential' => $myMIGDifferential,
            'myMIGDifferentialOutput' => $myMIGDifferentialOutput,
        ];
    }

    public function getUserLastOrder($cuID)
    {
        $userLastOrder                              = $this->MyMIGoldModel->getLastOrderInfo(getCuID())->getRowArray(); // Adjusted to use getRowArray
        if (empty($userLastOrder)) {
            $lastOrder                              = array();
            return $lastOrder;
        } else {
            $lastOrder                              = [
                'orderID'                           => $userLastOrder['id'],
                'unix_timestamp'                    => $userLastOrder['unix_timestamp'],
                'current_date'                      => $userLastOrder['current_date'],
                'month'                             => $userLastOrder['month'],
                'day'                               => $userLastOrder['day'],
                'year'                              => $userLastOrder['year'],
                'time'                              => $userLastOrder['time'],
                'status'                            => $userLastOrder['status'],
                'beta'                              => $userLastOrder['beta'],
                'wallet_id'                         => $userLastOrder['wallet_id'],
                'user_id'                           => $userLastOrder['user_id'],
                'user_email'                        => $userLastOrder['user_email'],
                'reward'                            => $userLastOrder['reward'],
                'reward_type'                       => $userLastOrder['reward_type'],
                'coin'                              => $userLastOrder['coin'],
                'initial_value'                     => $userLastOrder['initial_value'],
                'current_value'                     => $userLastOrder['current_value'],
                'available_coins'                   => $userLastOrder['available_coins'],
                'new_availability'                  => $userLastOrder['new_availability'],
                'minimum_coin_amount'               => $userLastOrder['minimum_coin_amount'],
                'initial_coin_value'                => $userLastOrder['initial_coin_value'],
                'new_coin_value'                    => $userLastOrder['new_coin_value'],
                'amount'                            => $userLastOrder['amount'],
                'total'                             => $userLastOrder['total'],
                'total_cost'                        => $userLastOrder['total_cost'],
                'total_fees'                        => $userLastOrder['total_fees'],
                'gas_fee'                           => $userLastOrder['gas_fee'],
                'trans_fee'                         => $userLastOrder['trans_fee'],
                'trans_percent'                     => $userLastOrder['trans_percent'],
                'user_gas_fee'                      => $userLastOrder['user_gas_fee'],
                'user_trans_fee'                    => $userLastOrder['user_trans_fee'],
                'user_trans_percent'                => $userLastOrder['user_trans_percent'],
                'referral_id'                       => $userLastOrder['referral_id'],
                'redirect_url'                      => $userLastOrder['redirect_url'],
            ];
            return $lastOrder;
        }
    }

    public function getUserLastCompletedOrder($orderID)
    {
        $userLastCompletedOrder                     = $this->MyMIGoldModel->getLastCompletedOrderInfo($orderID)->getRowArray(); // Adjusted to use getRowArray
        if (!empty($userLastCompletedOrder)) {
                $lastCompletedOrder                 = [
                    'orderID'                       => $userLastCompletedOrder['id'],
                    'unix_timestamp'                => $userLastCompletedOrder['unix_timestamp'],
                    'current_date'                  => $userLastCompletedOrder['current_date'],
                    'month'                         => $userLastCompletedOrder['month'],
                    'day'                           => $userLastCompletedOrder['day'],
                    'year'                          => $userLastCompletedOrder['year'],
                    'time'                          => $userLastCompletedOrder['time'],
                    'status'                        => $userLastCompletedOrder['status'],
                    'beta'                          => $userLastCompletedOrder['beta'],
                    'wallet_id'                     => $userLastCompletedOrder['wallet_id'],
                    'user_id'                       => $userLastCompletedOrder['user_id'],
                    'user_email'                    => $userLastCompletedOrder['user_email'],
                    'reward'                        => $userLastCompletedOrder['reward'],
                    'reward_type'                   => $userLastCompletedOrder['reward_type'],
                    'coin'                          => $userLastCompletedOrder['coin'],
                    'initial_value'                 => $userLastCompletedOrder['initial_value'],
                    'current_value'                 => $userLastCompletedOrder['current_value'],
                    'available_coins'               => $userLastCompletedOrder['available_coins'],
                    'new_availability'              => $userLastCompletedOrder['new_availability'],
                    'minimum_coin_amount'           => $userLastCompletedOrder['minimum_coin_amount'],
                    'initial_coin_value'            => $userLastCompletedOrder['initial_coin_value'],
                    'new_coin_value'                => $userLastCompletedOrder['new_coin_value'],
                    'amount'                        => $userLastCompletedOrder['amount'],
                    'total'                         => $userLastCompletedOrder['total'],
                    'total_cost'                    => $userLastCompletedOrder['total_cost'],
                    'total_fees'                    => $userLastCompletedOrder['total_fees'],
                    'gas_fee'                       => $userLastCompletedOrder['gas_fee'],
                    'trans_fee'                     => $userLastCompletedOrder['trans_fee'],
                    'trans_percent'                 => $userLastCompletedOrder['trans_percent'],
                    'user_gas_fee'                  => $userLastCompletedOrder['user_gas_fee'],
                    'user_trans_fee'                => $userLastCompletedOrder['user_trans_fee'],
                    'user_trans_percent'            => $userLastCompletedOrder['user_trans_percent'],
                    'referral_id'                   => $userLastCompletedOrder['referral_id'],
                    'redirect_url'                  => $userLastCompletedOrder['redirect_url'],
                ];
                return $lastCompletedOrder;
        } else {
            $lastCompletedOrder                     = array();
            return $lastCompletedOrder;
        }
    }

    // Fetch real-time price from AlphaVantage API
    private function getRealTimeCryptoPrice($symbol) {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=$symbol&to_currency=USD&apikey={$this->alphaVantageApiKey}");
        $data = json_decode($response->getBody());
        return floatval($data->{'Realtime Currency Exchange Rate'}->{'5. Exchange Rate'});
    }

    // Simulate the purchase of base crypto with USD using real-time rates
    public function purchaseBaseCrypto($usdAmount, $cryptoSymbol = 'BTC') {
        $btcRate = $this->getRealTimeCryptoPrice($cryptoSymbol); // Fetch real-time BTC price
        return $usdAmount / $btcRate;
    }

    // Simulate exchanging BTC to MyMIGold using a fixed conversion rate
    public function convertToMyMIGold($btcAmount) {
        $conversionRate = 100; // 100 MyMIGold per BTC
        return $btcAmount * $conversionRate;
    }

    // Credit MyMIGold to the user's account
    public function creditUserAccount($userId, $myMIGoldAmount) {
        $builder = $this->db->table('user_wallets');
        $builder->where('user_id', $userId);
        $builder->set('myMIGold_balance', "myMIGold_balance + $myMIGoldAmount", FALSE);
        $builder->update();
    }
}
?>
