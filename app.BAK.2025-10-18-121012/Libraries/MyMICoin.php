<?php

namespace App\Libraries;

use App\Config\SiteSettings;
use App\Libraries\{BaseLoader};
use App\Models\{MyMICoinModel, UserModel};
use Config\Services;

#[\AllowDynamicProperties]
class MyMICoin
{

    protected $auth;
    protected $cuID;
    protected $MyMICoinModel;
    protected $userModel;
    protected $request;
    protected $session;
    protected $marketData;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->request                      = Services::request();
        $this->MyMICoinModel                = new MyMICoinModel();
        $this->userModel                    = new userModel();
        // Assuming you have services like 'auth' properly configured in CI4
        
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id') ?? $this->userModel->getUserID();
        $cuID = $this->cuID;
        if (empty($this->cuID)) {
            log_message('debug', 'MyMICoin: guest context detected; skipping user-specific preload.');
        }
    }

    public function getCoinValue() {
        log_message('debug', 'Memory usage before coin value fetch: ' . memory_get_usage(true));
        $getCoinValue = $this->MyMICoinModel->getCoinValue();
        log_message('debug', 'Memory usage after coin value fetch: ' . memory_get_usage(true));
        
        return $getCoinValue['coin_value'] ?? 0.00;  // Default to 0.00 to avoid null issues
    }
    

    public function getCoinInfo()
    {
        $coin                               = 'MYMI'; 
        $coinInfo                           = $this->MyMICoinModel->getCoinInfo($coin);
        // Assuming 'minimum_purchase' and 'minimum_coin_amount' are available in your config file
        $minimumPurchase                   = config('SiteSettings')->minimumPurchase;
        $minimumCoinAmount                = config('SiteSettings')->minimumCoinAmount;

        return [
            'availableCoins'               => $coinInfo['coins_available'] ?? null,
            'currentValue'                 => $coinInfo['current_value'] ?? null,
            'initialValue'                 => $coinInfo['initial_value'] ?? null,
            'mymicCoinValue'              => $coinInfo['coin_value'] ?? null,
            'minimumPurchase'              => $minimumPurchase,
            'minimumCoinValue'            => $minimumCoinAmount,
            'gasFee'                       => $coinInfo['gas_fee'] ?? null,
            'transPercent'                 => $coinInfo['trans_percent'] ?? null,
            'transFee'                     => $coinInfo['trans_fee'] ?? null,
        ];
    }

    public function getUserCoinTotal($cuID)
    {
        $myMIC_CoinValue = $this->getCoinValue(); // Ensure this returns a float or at least a non-null value.
        $myMIC_Info = $this->getCoinInfo();
        $userCoinTotal = $this->MyMICoinModel->getUserCoinTotal($cuID);
        $coinsExchanged = $this->MyMICoinModel->getTotalCoinsExchanged($cuID) ?? 0; // Ensure this returns a numeric value and handle potential nulls.

        // Initialize variables to ensure no null values are passed to number_format.
        $coinSum = 0.0; // Default to 0.0 to avoid null issues.
        $totalValue = '0.00'; // Default string representation of a zero value.
        // Default values to ensure they are not null.
        $myMICInitialValue = '0.00';
        $myMICCurrentValue = '0.00';
        $myMICDifferential = '0.00';
        $myMICPerChange = '0.00%'; // Initialize to avoid undefined variable error

        if (!empty($userCoinTotal) && is_array($userCoinTotal) && isset($userCoinTotal['total'])) {
            $coinSum = (float)($userCoinTotal['total'] ?? 0) - (float)$coinsExchanged;
            $initialCoinValue = (float)($userCoinTotal['initial_coin_value'] ?? 0);

            // Use number_format only on non-null, numeric values to avoid deprecation warning.
            $myMICInitialValue = number_format($coinSum * $initialCoinValue, 2, '.', '');
            $myMICCurrentValue = number_format($coinSum * (float)$myMIC_CoinValue, 2, '.', ''); // Cast to ensure float.
            $myMICDifferential = number_format((float)$myMICCurrentValue - (float)$myMICInitialValue, 2, '.', ''); // Calculate differential.
            
            // Calculate percentage change if current value is not zero to avoid division by zero.
            $percentChange = ((float)$myMICCurrentValue != 0) ? ((float)$myMICDifferential / (float)$myMICCurrentValue) * 100 : 0;
            $myMICPerChange = number_format($percentChange, 2, '.', '') . '%';
            $totalValue = number_format($coinSum * (float)$myMIC_CoinValue, 2, '.', ''); // Cast to ensure float.
        }

        return [
            // Ensure all returned values are strings or values that won't cause type errors.
            'mymic_coin_value' => (string)$myMIC_CoinValue,
            'totalValue' => $totalValue,
            'coinSum' => $coinSum,
            'coinsExchanged' => $coinsExchanged,
            'myMICPerChange' => $myMICPerChange,
            'myMICInitialValue' => $myMICInitialValue,
            'myMICCurrentValue' => $myMICCurrentValue,
            'myMICDifferential' => $myMICDifferential,
            'myMICAvailableCoins' => $myMIC_Info['available_coins'] ?? 0, // Ensure a default value is provided.
        ];
    }



}
