<?php

namespace App\Services;

use Stripe\StripeClient;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};

class ApplePayService
{

    private $stripe;
    
    public function __construct()
    {
        // Load PayPal config
        $this->APIs = config('APISettings');
        $this->siteSettings = config('SiteSettings');
        $this->stripeAPIKey = $this->APIs->stripeApiKey;
        
        $this->stripe = new StripeClient($this->stripeAPIKey);
    }

    public function payViaApplePay($cuID, $amount)
    {
        try {
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $amount * 100, // amount in cents
                'currency' => 'usd',
                'payment_method_types' => ['card'], // Includes Apple Pay if available
                'customer' => $cuID
            ]);

            // Return payment intent or handle further
            return $paymentIntent;
        } catch (\Exception $e) {
            log_message('error', 'ApplePay Error: ' . $e->getMessage());
            return null;
        }
    }
}
