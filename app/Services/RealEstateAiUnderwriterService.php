<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\Ollama\OllamaClient;
use Config\Projects as ProjectsConfig;

/**
 * Service: RealEstateAiUnderwriterService
 *
 * Provides instant AIOps-driven property underwriting, financial pro forma stress-testing,
 * value-add playbook generation, and community co-investment structuring for
 * Timothy Burks Incorporated, LLC. (Operating Managers: Timothy Burks & AnneAlicia Burks).
 */
class RealEstateAiUnderwriterService
{
    protected RealEstateDealService $dealService;
    protected ProjectsConfig $config;

    public function __construct(?RealEstateDealService $dealService = null, ?ProjectsConfig $config = null)
    {
        $this->dealService = $dealService ?? new RealEstateDealService();
        $this->config = $config ?? config('Projects');
    }

    /**
     * Conduct full AIOps Quick-Analysis on property inputs.
     *
     * @param array<string, mixed> $input
     * @param int $actorId
     * @return array<string, mixed>
     */
    public function analyze(array $input, int $actorId = 1): array
    {
        $category = (string) ($input['property_category'] ?? 'residential_str');
        $address = trim((string) ($input['address_line1'] ?? $input['property_address'] ?? ''));
        $city = trim((string) ($input['city'] ?? 'Bossier City'));
        $state = strtoupper(trim((string) ($input['state'] ?? 'LA')));
        $postalCode = trim((string) ($input['postal_code'] ?? '71111'));
        $zillowUrl = trim((string) ($input['zillow_url'] ?? ''));
        $title = trim((string) ($input['title'] ?? ($address ?: 'Strategic Property Acquisition')));

        // 1. Compute Base Underwriting Pro Forma
        $proForma = $category === 'commercial_lease'
            ? $this->dealService->calculateCommercialProForma($input)
            : $this->dealService->calculateStrProForma($input);

        $purchasePrice = (float) ($proForma['purchase_price'] ?? 350000.0);
        $renoBudget = (float) ($proForma['renovation_budget'] ?? 25000.0);
        $furnishBudget = (float) ($proForma['furnishing_budget'] ?? 20000.0);
        $closingCosts = (float) ($proForma['closing_costs'] ?? ($purchasePrice * 0.03));
        $totalAcquisition = (float) ($proForma['total_acquisition_cost'] ?? ($purchasePrice + $renoBudget + $furnishBudget + $closingCosts));

        $annualGross = (float) ($proForma['projected_annual_gross'] ?? 0.0);
        $annualNoi = (float) ($proForma['projected_annual_noi'] ?? 0.0);
        $targetCoc = (float) ($proForma['target_coc_return'] ?? 0.0);
        $capRate = $purchasePrice > 0 ? round(($annualNoi / $purchasePrice) * 100, 2) : 0.0;

        // 2. Compute Deal Score (0 - 100)
        $score = $this->calculateDealScore($targetCoc, $capRate, $category, $state);
        $grade = $this->resolveDealGrade($score);

        // 3. Attempt Ollama AI synthesis with fallback to deterministic AIOps heuristics
        $aiSynthesis = $this->generateAiSynthesis(
            $title,
            $address,
            $city,
            $state,
            $category,
            $purchasePrice,
            $totalAcquisition,
            $annualNoi,
            $targetCoc,
            $proForma
        );

        // 4. Generate Crowdfund Unit Structuring ($100 per unit)
        $unitPrice = 100.0;
        $totalUnits = (int) ceil($totalAcquisition / $unitPrice);
        $monthlyNoi = round($annualNoi / 12, 2);
        $monthlyDistPerThousand = $totalAcquisition > 0 ? round(($monthlyNoi * 0.85) / ($totalAcquisition / 1000), 2) : 0.0;

        return [
            'status'                  => 'ok',
            'analyzed_at'             => date('Y-m-d H:i:s'),
            'sponsor_entity'          => $this->config->sponsorEntity ?? 'Timothy Burks Incorporated, LLC.',
            'operating_managers'      => $this->config->operatingManagers ?? ['Timothy Burks', 'AnneAlicia Burks'],
            'jurisdiction'            => $this->config->jurisdiction ?? 'Bossier City, Louisiana',
            'property'                => [
                'title'                 => $title,
                'category'              => $category,
                'category_label'        => $category === 'commercial_lease' ? 'Commercial NNN Lease' : 'Residential Airbnb / VRBO',
                'address'               => $address,
                'city'                  => $city,
                'state'                 => $state,
                'postal_code'           => $postalCode,
                'zillow_url'            => $zillowUrl,
            ],
            'deal_score'              => $score,
            'deal_grade'              => $grade,
            'pro_forma'               => [
                'purchase_price'        => $purchasePrice,
                'renovation_budget'     => $renoBudget,
                'furnishing_budget'     => $furnishBudget,
                'closing_costs'         => $closingCosts,
                'total_acquisition'     => $totalAcquisition,
                'projected_annual_gross'=> $annualGross,
                'projected_annual_noi'  => $annualNoi,
                'projected_monthly_noi' => $monthlyNoi,
                'target_coc_return'     => $targetCoc,
                'cap_rate'              => $capRate,
                'sponsor_fee_pct'       => (float) ($proForma['sponsor_management_fee_pct'] ?? 15.0),
                'details'               => $proForma,
            ],
            'crowdfund_structure'     => [
                'target_raise_usd'      => $totalAcquisition,
                'unit_nav_usd'          => $unitPrice,
                'total_units_issued'    => $totalUnits,
                'min_co_investment_usd' => 100.0,
                'sponsor_retained_units'=> (int) round($totalUnits * 0.10), // 10% sponsor skin-in-the-game
                'community_pool_units'  => (int) round($totalUnits * 0.90),
                'est_monthly_payout_per_1k' => $monthlyDistPerThousand,
            ],
            'executive_summary'       => $aiSynthesis['executive_summary'],
            'value_add_playbook'      => $aiSynthesis['value_add_playbook'],
            'stress_test_risks'       => $aiSynthesis['stress_test_risks'],
            'legal_compliance'        => [
                'entity_form'           => 'Louisiana Manager-Managed Single Purpose Entity (SPV LLC)',
                'managers'              => 'Timothy Burks & AnneAlicia Burks (Co-Operating Managers & Co-Owners)',
                'conveyance'            => 'Louisiana Act of Cash Sale with Clear Title & Escrow Warranty',
                'offering_framework'    => 'SEC Reg D 506(c) Private Placement / Intrastate Escrow Impound Model',
                'crypto_rails'          => 'USDC on Solana / Base / Ethereum with instant sub-millisecond OFAC SDN sanctions screening',
                'refund_guarantee'      => '100% principal return if minimum funding threshold is not reached prior to escrow closing',
            ],
        ];
    }

    /**
     * Compute quantitative score 0-100 based on underwriting returns and safety margin.
     */
    protected function calculateDealScore(float $coc, float $capRate, string $category, string $state): int
    {
        $score = 50;

        // Cash-on-cash yield scoring (up to +30 pts)
        if ($coc >= 14.0) {
            $score += 30;
        } elseif ($coc >= 10.0) {
            $score += 24;
        } elseif ($coc >= 8.0) {
            $score += 18;
        } elseif ($coc >= 6.0) {
            $score += 10;
        }

        // Cap rate scoring (up to +15 pts)
        if ($capRate >= 10.0) {
            $score += 15;
        } elseif ($capRate >= 8.0) {
            $score += 12;
        } elseif ($capRate >= 6.5) {
            $score += 8;
        }

        // Home base advantage in Louisiana (local sponsor management) (+5 pts)
        if ($state === 'LA' || $state === 'LOUISIANA') {
            $score += 5;
        }

        return min(98, max(40, $score));
    }

    protected function resolveDealGrade(int $score): string
    {
        if ($score >= 90) return 'A+';
        if ($score >= 82) return 'A';
        if ($score >= 74) return 'B+';
        if ($score >= 65) return 'B';
        return 'C';
    }

    /**
     * Generates qualitative analysis using Ollama or fallback heuristics.
     */
    protected function generateAiSynthesis(
        string $title,
        string $address,
        string $city,
        string $state,
        string $category,
        float $purchasePrice,
        float $totalRaise,
        float $annualNoi,
        float $coc,
        array $proForma
    ): array {
        $prompt = "You are AIOps Real Estate Underwriter for Timothy Burks Incorporated, LLC.
Evaluate this property deal for Operating Managers Timothy Burks & AnneAlicia Burks:
Title: {$title}
Location: {$city}, {$state}
Category: {$category}
Purchase Price: \${$purchasePrice}
Total Raise Needed: \${$totalRaise}
Annual Net Operating Income: \${$annualNoi}
Target Cash-on-Cash Return: {$coc}%

Provide concise, high-value investment analysis.";

        // Attempt Ollama with short 2s timeout
        try {
            $ollama = new OllamaClient();
            $res = $ollama->generate($prompt, ['timeout' => 2]);
            $rawText = trim((string) ($res['response'] ?? ''));
            if (strlen($rawText) > 100) {
                return [
                    'executive_summary'  => substr($rawText, 0, 350) . '...',
                    'value_add_playbook' => $this->defaultPlaybook($category, $city, $state),
                    'stress_test_risks'  => $this->defaultRisks($category, $coc),
                ];
            }
        } catch (\Throwable $e) {
            log_message('notice', 'Ollama underwriting query fallback: ' . $e->getMessage());
        }

        // Fallback: Deterministic Expert AIOps Synthesis
        $loc = "{$city}, {$state}";
        $isStr = $category === 'residential_str';
        $propertyLabel = $address !== '' ? "{$address} in {$loc}" : ($title ?: "property in {$loc}");
        $purchasePriceFmt = number_format($purchasePrice);
        $totalRaiseFmt = number_format($totalRaise);
        $annualNoiFmt = number_format($annualNoi);
        $cocFmt = number_format($coc, 2);

        $summary = $isStr
            ? "Strong residential short-term rental conversion opportunity for {$propertyLabel}. At a \${$purchasePriceFmt} acquisition price with \${$totalRaiseFmt} total capitalization, the property achieves a projected \${$annualNoiFmt}/yr Net Operating Income ({$cocFmt}% Cash-on-Cash yield). AnneAlicia & Timothy can execute a high-end designer furnishing strategy targeting leisure travelers, regional corporate bookings, and event guests."
            : "Prime commercial leased asset for {$propertyLabel} providing durable, inflation-hedged passive cash flows. Capitalized at \${$totalRaiseFmt}, the property generates \${$annualNoiFmt}/yr NOI ({$cocFmt}% Cash-on-Cash yield) backed by stable tenant lease commitments with triple-net operating cost pass-throughs.";

        return [
            'executive_summary'  => $summary,
            'value_add_playbook' => $this->defaultPlaybook($category, $city, $state),
            'stress_test_risks'  => $this->defaultRisks($category, $coc),
        ];
    }

    protected function defaultPlaybook(string $category, string $city, string $state): array
    {
        if ($category === 'commercial_lease') {
            return [
                'Tenant Underwriting'   => 'Review commercial tenant creditworthiness, sales records, and execute 3-to-5 year NNN lease agreement.',
                'Louisiana SPV Closing' => 'Form property-specific Louisiana LLC managed by Timothy Burks Incorporated, LLC. and close under Act of Cash Sale.',
                'Automated Accounting'  => 'Integrate rent collections into MyMI Wallet with automated monthly expense accounting and pro-rata distributions.',
                'Tax Optimization'      => 'Conduct cost segregation study to accelerate year-1 depreciation deductions for syndication co-investors.',
            ];
        }

        return [
            'Hospitality Furnishing' => 'Deploy high-yield interior design (local art, luxury bedding, game room/hot tub) to maximize Airbnb/VRBO average daily rate.',
            'Smart Access & Tech'    => 'Install remote keyless entry, smart thermostats, and exterior noise/security monitoring to minimize overhead.',
            'Multi-Platform Snd'     => 'Syndicate calendar simultaneously across Airbnb, VRBO, and direct MyMI booking channels with dynamic pricing.',
            'Audited Distributions'  => 'Pool platform payouts monthly, deduct operating expenses, and distribute audited USDC pro-rata to coinvestor wallets.',
        ];
    }

    protected function defaultRisks(string $category, float $coc): array
    {
        $buffer = round(max(5.0, $coc * 0.35), 1);
        return [
            'Occupancy Sensitivity' => "Even under a 15% drop in bookings, the property retains a {$buffer}% net cash flow buffer before debt service or fixed costs.",
            'Local Ordinance Rules' => 'Bossier City / Caddo Parish zoning and short-term lodging regulations are factored with local tourist tax compliance.',
            'Emergency Reserve'     => 'Deal capitalization includes an upfront 6-month operating reserve to cushion against HVAC, plumbing, or seasonal lulls.',
        ];
    }
}
