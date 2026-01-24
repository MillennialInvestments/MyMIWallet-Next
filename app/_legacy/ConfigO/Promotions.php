<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Promotions extends BaseConfig
{
    // Example Promo Codes with Discounts
    public array $promoCodes = [
        'MYMI2025' => 60, // Save $60 on Premium Services 
        'SAVE10' => 10, // Save $10
        'WELCOME15' => 15, // Save $15
        'SUMMER20' => 20, // Save $20
    ];

    // Additional Promotional Configurations
    public bool $enablePromotions = true;
    public string $defaultPromoMessage = 'Use promo codes for discounts!';
}
