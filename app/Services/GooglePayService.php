<?php

namespace App\Services;

use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};
use Stripe\StripeClient;

class GooglePayService
{

    private $APIs; 
    private $siteSettings;
    private $stripe;
    
    public function __construct()
    {
        // Load PayPal config
        $this->APIs = config('APIs');
        $this->siteSettings = config('SiteSettings');
        $this->stripeAPIKey = $this->APIs->stripeApiKey;
        
        $this->stripe = new StripeClient($this->stripeAPIKey);
    }

    public function payViaGooglePay($cuID, $amount)
    {
        try {
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $amount * 100, // amount in cents
                'currency' => 'usd',
                'payment_method_types' => ['card'], // Google Pay falls under this
                'customer' => $cuID
            ]);

            return $paymentIntent;
        } catch (\Exception $e) {
            log_message('error', 'GooglePay Error: ' . $e->getMessage());
            return null;
        }
    }
}
