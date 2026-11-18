<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Paid membership plans sold through the PayPal checkout.
 *
 * The price always comes from here (via SiteSettings), never from the browser.
 * Each purchase is a one-time payment for `days` of access; it does not renew
 * by itself. Tiers match PremiumEntitlementService::normalizeTier().
 */
class MembershipPlans extends BaseConfig
{
    /** @var array<string,array{label:string,tier:string,fee:string,days:int}> */
    public array $plans = [
        'starter' => ['label' => 'Starter', 'tier' => 'tier1', 'fee' => 'memberStarterFee', 'days' => 30],
        'basic'   => ['label' => 'Basic', 'tier' => 'tier1', 'fee' => 'memberBasicFee', 'days' => 30],
        'pro'     => ['label' => 'Pro', 'tier' => 'tier2', 'fee' => 'memberProFee', 'days' => 30],
        'premium' => ['label' => 'Premium', 'tier' => 'tier3', 'fee' => 'memberPremiumFee', 'days' => 30],
    ];

    /**
     * @return array{slug:string,label:string,tier:string,price:float,days:int}|null
     */
    public function find(string $slug): ?array
    {
        $slug = strtolower(trim($slug));
        $plan = $this->plans[$slug] ?? null;
        if ($plan === null) {
            return null;
        }

        $price = (float) (config('SiteSettings')->{$plan['fee']} ?? 0);
        if ($price <= 0) {
            return null;
        }

        return ['slug' => $slug, 'label' => $plan['label'], 'tier' => $plan['tier'], 'price' => round($price, 2), 'days' => $plan['days']];
    }
}
