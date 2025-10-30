<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use Exception;
use DateTime;

class CurrencyService
{

    protected $exchangeRates = [
        'USD' => 1.0,
        'EUR' => 0.85,
        'GBP' => 0.75,
        'BTC' => 0.00002,
        'ETH' => 0.0003,
    ];

    protected $apiEndpoint = "https://api.exchangeratesapi.io/latest";
    protected $cryptoApiEndpoint = "https://api.coingecko.com/api/v3/simple/price";
    protected $cacheExpiration = 3600;

    public function convert($amount, $fromCurrency, $toCurrency, $date = null)
    {
        $rate = $this->getExchangeRate($fromCurrency, $toCurrency, $date);
        return round($amount * $rate, 2);
    }

    public function getExchangeRate($fromCurrency, $toCurrency, $date = null)
    {
        if ($date) {
            return $this->getHistoricalRate($fromCurrency, $toCurrency, $date);
        }

        $rate = $this->getCachedRate($fromCurrency, $toCurrency);
        if ($rate !== null) {
            return $rate;
        }

        return $this->fetchLiveRate($fromCurrency, $toCurrency);
    }

    protected function fetchLiveRate($fromCurrency, $toCurrency)
    {
        try {
            if (in_array($fromCurrency, ['BTC', 'ETH']) || in_array($toCurrency, ['BTC', 'ETH'])) {
                $apiUrl = "{$this->cryptoApiEndpoint}?ids={$fromCurrency},{$toCurrency}&vs_currencies=usd";
                $response = file_get_contents($apiUrl);
                $rates = json_decode($response, true);
                $rate = $this->calculateCryptoRate($fromCurrency, $toCurrency, $rates);
            } else {
                $apiUrl = "{$this->apiEndpoint}?base={$fromCurrency}&symbols={$toCurrency}";
                $response = file_get_contents($apiUrl);
                $rates = json_decode($response, true);
                $rate = $rates['rates'][$toCurrency] ?? null;
            }

            if ($rate) {
                $this->cacheRate($fromCurrency, $toCurrency, $rate);
                return $rate;
            }

            throw new Exception("Failed to fetch live rate for $fromCurrency to $toCurrency.");
        } catch (Exception $e) {
            return $this->fallbackRate($fromCurrency, $toCurrency);
        }
    }

    protected function cacheRate($fromCurrency, $toCurrency, $rate)
    {
        $key = sanitizeCacheKey("rate_{$fromCurrency}_{$toCurrency}");
        cache()->save($key, $rate, $this->cacheExpiration);
    }

    protected function getCachedRate($fromCurrency, $toCurrency)
    {
        $key = sanitizeCacheKey("rate_{$fromCurrency}_{$toCurrency}");
        return cache()->get($key);
    }

    protected function fallbackRate($fromCurrency, $toCurrency)
    {
        if (isset($this->exchangeRates[$fromCurrency]) && isset($this->exchangeRates[$toCurrency])) {
            return $this->exchangeRates[$toCurrency] / $this->exchangeRates[$fromCurrency];
        }

        throw new Exception("No exchange rate available for $fromCurrency to $toCurrency.");
    }

    protected function getHistoricalRate($fromCurrency, $toCurrency, $date)
    {
        $formattedDate = (new DateTime($date))->format('Y-m-d');
        $apiUrl = "{$this->apiEndpoint}/$formattedDate?base={$fromCurrency}&symbols={$toCurrency}";

        try {
            $response = file_get_contents($apiUrl);
            $rates = json_decode($response, true);
            return $rates['rates'][$toCurrency] ?? null;
        } catch (Exception $e) {
            return $this->fallbackRate($fromCurrency, $toCurrency);
        }
    }

    protected function calculateCryptoRate($fromCurrency, $toCurrency, $rates)
    {
        if ($fromCurrency === 'USD') {
            return 1 / $rates[$toCurrency]['usd'];
        } elseif ($toCurrency === 'USD') {
            return $rates[$fromCurrency]['usd'];
        }

        return $rates[$toCurrency]['usd'] / $rates[$fromCurrency]['usd'];
    }

    public function updateRates()
    {
        try {
            $apiUrl = $this->apiEndpoint;
            $response = file_get_contents($apiUrl);
            $rates = json_decode($response, true)['rates'];

            foreach ($this->exchangeRates as $currency => $rate) {
                if (isset($rates[$currency])) {
                    $this->exchangeRates[$currency] = $rates[$currency];
                }
            }

            cache()->save(sanitizeCacheKey('exchange_rates'), $this->exchangeRates, $this->cacheExpiration);

        } catch (Exception $e) {
            // Handle the exception for failed API call
            throw new Exception("Failed to update exchange rates: " . $e->getMessage());
        }
    }

    public function logConversion($userId, $fromCurrency, $toCurrency, $amount, $rate)
    {
        $logData = [
            'user_id' => $userId,
            'from_currency' => $fromCurrency,
            'to_currency' => $toCurrency,
            'amount' => $amount,
            'exchange_rate' => $rate,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Here you can implement logging logic such as writing to a database or a file
        $this->storeConversionLog($logData);
    }

    protected function storeConversionLog($logData)
    {
        // Assuming we have a model for logging conversions, e.g., ConversionLogModel
        $conversionLogModel = new \App\Models\ConversionLogModel();
    
        // Inserting the log data into the database
        try {
            $conversionLogModel->insert($logData);
        } catch (Exception $e) {
            // Handle exception, e.g., log it or display an error message
            throw new Exception("Failed to log currency conversion: " . $e->getMessage());
        }
    }
    
}
