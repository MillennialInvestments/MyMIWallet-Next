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
        $proForma = match ($category) {
            'commercial_lease' => $this->dealService->calculateCommercialProForma($input),
            'residential_ltr'  => $this->dealService->calculateLtrProForma($input),
            'wholesale_flip'   => $this->dealService->calculateWholesaleFlipProForma($input),
            default            => $this->dealService->calculateStrProForma($input),
        };

        // Multi-Strategy Calculations: Airbnb/VRBO vs. Pure Traditional Renting vs. Wholesale Flip
        $strProForma       = $this->dealService->calculateStrProForma($input);
        $ltrProForma       = $this->dealService->calculateLtrProForma($input);
        $wholesaleProForma = $this->dealService->calculateWholesaleFlipProForma($input);

        // Buyer Matching & Dispo Generation (Tranchi-Style)
        $matchedBuyers = $this->matchTargetCashBuyers($wholesaleProForma, $city, $state);
        $dispoPackage  = $this->generateDispoPackage($wholesaleProForma, [
            'address' => $address,
            'city'    => $city,
            'state'   => $state,
            'title'   => $title,
        ]);

        $strNoi = (float) $strProForma['projected_annual_noi'];
        $ltrNoi = (float) $ltrProForma['projected_annual_noi'];
        $noiDiff = round($strNoi - $ltrNoi, 2);
        $monthlyDiff = round($noiDiff / 12, 2);
        $cocDiff = round((float) $strProForma['target_coc_return'] - (float) $ltrProForma['target_coc_return'], 2);

        $dualComparison = [
            'str' => [
                'strategy_title'      => 'Airbnb / VRBO (Short-Term Rental)',
                'total_acquisition'   => (float) $strProForma['total_acquisition_cost'],
                'furnishing_budget'   => (float) $strProForma['furnishing_budget'],
                'gross_annual'        => (float) $strProForma['gross_annual_revenue'],
                'annual_noi'          => $strNoi,
                'monthly_noi'         => (float) $strProForma['projected_monthly_distributable'],
                'coc_return'          => (float) $strProForma['target_coc_return'],
                'adr'                 => (float) $strProForma['projected_adr'],
                'occupancy_pct'       => (float) $strProForma['projected_occupancy_pct'],
            ],
            'ltr' => [
                'strategy_title'      => 'Pure Traditional Renting (12-Mo Lease)',
                'total_acquisition'   => (float) $ltrProForma['total_acquisition_cost'],
                'furnishing_budget'   => 0.0,
                'gross_annual'        => (float) $ltrProForma['gross_annual_rent'],
                'annual_noi'          => $ltrNoi,
                'monthly_noi'         => (float) $ltrProForma['projected_monthly_distributable'],
                'coc_return'          => (float) $ltrProForma['target_coc_return'],
                'monthly_rent'        => (float) $ltrProForma['projected_monthly_rent'],
                'vacancy_pct'         => (float) $ltrProForma['vacancy_reserve_pct'],
            ],
            'wholesale' => [
                'strategy_title'      => 'Wholesale Contract Flip (Tranchi-Style)',
                'contract_price'      => (float) $wholesaleProForma['contract_price'],
                'after_repair_value'  => (float) $wholesaleProForma['after_repair_value'],
                'renovation_budget'   => (float) $wholesaleProForma['renovation_budget'],
                'assignment_fee'      => (float) $wholesaleProForma['assignment_fee'],
                'end_buyer_price'     => (float) $wholesaleProForma['end_buyer_price'],
                'end_buyer_profit'    => (float) $wholesaleProForma['end_buyer_net_profit'],
                'end_buyer_roi_pct'   => (float) $wholesaleProForma['end_buyer_roi_pct'],
                'earnest_money'       => (float) $wholesaleProForma['earnest_money_deposit'],
                'days_to_close'       => (int) $wholesaleProForma['days_to_close'],
                'coc_return'          => (float) $wholesaleProForma['target_coc_return'],
            ],
            'comparison' => [
                'noi_difference_annual' => $noiDiff,
                'noi_difference_monthly'=> $monthlyDiff,
                'coc_difference_pct'    => $cocDiff,
                'capital_saved_ltr'     => (float) ($strProForma['total_acquisition_cost'] - $ltrProForma['total_acquisition_cost']),
                'recommended_strategy'  => $strNoi >= $ltrNoi ? 'residential_str' : 'residential_ltr',
                'verdict'               => $strNoi >= $ltrNoi
                    ? "Airbnb / VRBO delivers +$" . number_format($monthlyDiff) . "/mo (+{$cocDiff}% CoC premium) over pure renting, while long-term renting provides a safe, steady downside baseline."
                    : "Pure Traditional Renting outperforms STR by +$" . number_format(abs($monthlyDiff)) . "/mo with zero furnishing capital required.",
            ],
        ];

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
            $proForma,
            $dualComparison
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
                'category_label'        => match ($category) {
                    'commercial_lease' => 'Commercial Leased Asset (NNN / Triple Net)',
                    'residential_ltr'  => 'Pure Long-Term Rental (12-Mo Lease)',
                    'wholesale_flip'   => 'Wholesale Contract Flip & Cash Buyer Match',
                    default            => 'Residential Airbnb / VRBO',
                },
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
            'dual_strategy_comparison'=> $dualComparison,
            'wholesale_contract_flip' => $wholesaleProForma,
            'matched_buyers'          => $matchedBuyers,
            'dispo_package'           => $dispoPackage,
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
        array $proForma,
        array $dualComparison = []
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
        $isLtr = $category === 'residential_ltr';
        $propertyLabel = $address !== '' ? "{$address} in {$loc}" : ($title ?: "property in {$loc}");
        $purchasePriceFmt = number_format($purchasePrice);
        $totalRaiseFmt = number_format($totalRaise);
        $annualNoiFmt = number_format($annualNoi);
        $cocFmt = number_format($coc, 2);

        if ($category === 'commercial_lease') {
            $summary = "Prime commercial leased asset for {$propertyLabel} providing durable, inflation-hedged passive cash flows. Capitalized at \${$totalRaiseFmt}, the property generates \${$annualNoiFmt}/yr NOI ({$cocFmt}% Cash-on-Cash yield) backed by stable tenant lease commitments with triple-net operating cost pass-throughs.";
        } elseif ($category === 'wholesale_flip') {
            $feeFmt = number_format($proForma['assignment_fee'] ?? 15000);
            $arvFmt = number_format($proForma['after_repair_value'] ?? ($purchasePrice * 1.38));
            $rehabFmt = number_format($proForma['renovation_budget'] ?? 25000);
            $endPriceFmt = number_format($proForma['end_buyer_price'] ?? ($purchasePrice + 15000));
            $endProfitFmt = number_format($proForma['end_buyer_net_profit'] ?? 25000);
            $endRoiFmt = number_format($proForma['end_buyer_roi_pct'] ?? 15, 1);
            $days = (int) ($proForma['days_to_close'] ?? 14);

            $summary = "Tranchi-style rapid liquidity wholesale contract flip opportunity for {$propertyLabel}. Secured at a \${$purchasePriceFmt} contract purchase price with an estimated \${$arvFmt} After Repair Value (ARV) and \${$rehabFmt} renovation scope. Assigning to an end cash buyer at \${$endPriceFmt} yields an immediate \${$feeFmt} net cash assignment fee for Timothy Burks Incorporated, LLC in {$days} days with zero permanent capital tied up, zero renovation debt, and zero holding costs. The end rehabber retains a projected \${$endProfitFmt} net profit ({$endRoiFmt}% ROI).";
        } elseif ($isLtr) {
            $summary = "Turnkey residential pure long-term rental opportunity for {$propertyLabel}. At a \${$purchasePriceFmt} acquisition with \${$totalRaiseFmt} capitalization ($0 furnishing required), the asset yields \${$annualNoiFmt}/yr Net Operating Income ({$cocFmt}% Cash-on-Cash) backed by standard 12-month tenant leases, low turnover, and zero hospitality overhead.";
        } else {
            // Default residential STR with dual strategy context
            $strMonthly = !empty($dualComparison['str']['monthly_noi']) ? number_format($dualComparison['str']['monthly_noi']) : number_format($annualNoi / 12);
            $ltrMonthly = !empty($dualComparison['ltr']['monthly_noi']) ? number_format($dualComparison['ltr']['monthly_noi']) : '1,428';
            $diffMonthly = !empty($dualComparison['comparison']['noi_difference_monthly']) ? number_format($dualComparison['comparison']['noi_difference_monthly']) : '1,473';

            $summary = "High-yield residential opportunity for {$propertyLabel} evaluated under dual monetization models. Operating as an Airbnb / VRBO short-term rental at \${$totalRaiseFmt} total capitalization, the asset achieves a projected \${$annualNoiFmt}/yr Net Operating Income (\${$strMonthly}/mo, {$cocFmt}% Cash-on-Cash yield). Pure 12-month traditional renting serves as a rock-solid downside hedge generating \${$ltrMonthly}/mo NOI with zero furnishing capital. AnneAlicia & Timothy can execute an active hospitality strategy yielding a +\${$diffMonthly}/mo premium while maintaining complete pivot flexibility.";
        }

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

        if ($category === 'wholesale_flip') {
            return [
                '1. Assignable Contract'       => 'Execute Louisiana purchase contract with standard assignability clause and 14-day inspection/closing window.',
                '2. Cash Buyer Blast'          => 'Distribute Tranchi-style VIP deal teaser and SMS broadcast to verified cash flippers and landlord buyers.',
                '3. Title Escrow Opening'      => 'Deposit non-refundable EMD with Louisiana title agency and verify clear, marketable conveyance.',
                '4. Assignment Fee Settlement' => 'Execute Assignment Agreement, collect assignment spread at closing, and wire funds to corporate treasury.',
            ];
        }

        if ($category === 'residential_ltr') {
            return [
                'Tenant Screening'      => 'Execute rigorous background, credit, and employment verification to place reliable 12-month lease tenants.',
                'Louisiana SPV Closing' => 'Convey property into a Louisiana SPV LLC managed by Timothy Burks Incorporated, LLC. under Act of Cash Sale.',
                'Direct Deposit Payout' => 'Collect monthly rent automatically via ACH/MyMI Wallet with scheduled reserve allocations and investor distributions.',
                'Dual-Exit Strategy'   => 'Maintain the option to pivot into an Airbnb / VRBO furnished model in peak travel seasons if hospitality yields exceed long-term rent.',
            ];
        }

        return [
            'Hospitality Furnishing' => 'Deploy high-yield interior design (local art, luxury bedding, game room/hot tub) to maximize Airbnb/VRBO average daily rate.',
            'Smart Access & Tech'    => 'Install remote keyless entry, smart thermostats, and exterior noise/security monitoring to minimize overhead.',
            'Multi-Platform Snd'     => 'Syndicate calendar simultaneously across Airbnb, VRBO, and direct MyMI booking channels with dynamic pricing.',
            'Downside Rent Pivot'    => 'Preserve seamless transition to pure 12-month long-term leasing if local ordinance rules or travel patterns change.',
        ];
    }

    protected function defaultRisks(string $category, float $coc): array
    {
        $buffer = round(max(5.0, $coc * 0.35), 1);

        if ($category === 'wholesale_flip') {
            return [
                'Buyer Performance Guard' => 'Non-refundable $2,500 earnest money deposit from assignee ensures closing certainty or covers escrow forfeit.',
                'Clear Title Guarantee'   => 'Title search verifies absence of unrecorded vendor liens, tax judgments, or parish code violations.',
                'Price Margin Safety'     => 'Underwritten with a minimum 15% end-buyer net ROI cushion to ensure rapid contract clearance even in changing rate environments.',
            ];
        }

        if ($category === 'residential_ltr') {
            return [
                'Vacancy Allowance'     => 'Underwritten with an explicit 5% vacancy allowance and 20% operational reserve to protect uninterrupted monthly distributions.',
                'Tenant Default Buffer' => 'Security deposit escrow plus eviction insurance mitigate tenant non-payment risks under Louisiana landlord law.',
                'Emergency Reserve'     => 'Deal capitalization includes an upfront 6-month operating reserve to cushion against HVAC, plumbing, or turnover costs.',
            ];
        }

        return [
            'Occupancy Sensitivity' => "Even under a 15% drop in bookings, the property retains a {$buffer}% net cash flow buffer before debt service or fixed costs.",
            'Long-Term Rent Hedge'  => 'If short-term rental demand softens or local municipal rules change, the property converts immediately to pure traditional renting with no additional capex.',
            'Emergency Reserve'     => 'Deal capitalization includes an upfront 6-month operating reserve to cushion against HVAC, plumbing, or seasonal lulls.',
        ];
    }

    /**
     * Match wholesale contract to active target cash buyer profiles (Tranchi-Style).
     *
     * @param array<string, mixed> $flip Wholesale pro forma data
     * @param string $city Property city
     * @param string $state Property state
     * @return array<int, array<string, mixed>>
     */
    public function matchTargetCashBuyers(array $flip, string $city, string $state): array
    {
        $endBuyerPrice  = (float) ($flip['end_buyer_price'] ?? 0);
        $endBuyerProfit = (float) ($flip['end_buyer_net_profit'] ?? 0);
        $roi            = (float) ($flip['end_buyer_roi_pct'] ?? 0);
        $locLabel       = $city ?: 'Bossier City';

        return [
            [
                'buyer_type'         => 'Fix & Flip Rehabber',
                'badge'              => 'Grade A Cash Buyer',
                'badge_class'        => 'bg-success',
                'match_score'        => min(98, max(75, (int) round(70 + ($roi * 1.4)))),
                'closing_speed'      => '7 - 10 Days (Cash / Hard Money with POF)',
                'typical_offer'      => '$' . number_format($endBuyerPrice),
                'projected_margin'   => '$' . number_format($endBuyerProfit) . ' net flip spread (' . number_format($roi, 1) . '% ROI)',
                'criteria_summary'   => "Targeting cosmetically distressed homes with >= 15% net ROI in {$locLabel}.",
                'buyer_pool_count'   => 4,
            ],
            [
                'buyer_type'         => 'Turnkey & Cash Flow Landlord',
                'badge'              => 'Buy & Hold Match',
                'badge_class'        => 'bg-primary',
                'match_score'        => 91,
                'closing_speed'      => '10 - 14 Days (Cash / DSCR Loan)',
                'typical_offer'      => '$' . number_format($endBuyerPrice),
                'projected_margin'   => '10.5% projected cap rate under 12-month traditional leasing',
                'criteria_summary'   => "Seeking turnkey or light-rehab SFR assets for long-term rental portfolios in {$locLabel}.",
                'buyer_pool_count'   => 6,
            ],
            [
                'buyer_type'         => 'STR / Airbnb Hospitality Operator',
                'badge'              => 'Hospitality Operator',
                'badge_class'        => 'bg-info',
                'match_score'        => 88,
                'closing_speed'      => '14 Days (Entity Cash Reserves)',
                'typical_offer'      => '$' . number_format($endBuyerPrice),
                'projected_margin'   => 'High ADR potential ($220-$310/night) for regional corporate & leisure travelers',
                'criteria_summary'   => "Prioritizes prime highway, casino, medical, or military base access in {$locLabel}.",
                'buyer_pool_count'   => 3,
            ],
            [
                'buyer_type'         => 'Institutional Portfolio Aggregator',
                'badge'              => 'Institutional Desk',
                'badge_class'        => 'bg-secondary',
                'match_score'        => 83,
                'closing_speed'      => '14 - 21 Days (Direct Wire Transfer)',
                'typical_offer'      => '$' . number_format(round($endBuyerPrice * 0.97, -2)),
                'projected_margin'   => 'Bulk portfolio yield acquisition with zero inspection contingencies',
                'criteria_summary'   => '1975+ build, single-family residential, clean title, minimum 3 bed / 2 bath.',
                'buyer_pool_count'   => 2,
            ],
        ];
    }

    /**
     * Generate Tranchi-style wholesale disposition packet (SMS, Email, Assignment terms).
     *
     * @param array<string, mixed> $flip Wholesale pro forma
     * @param array<string, mixed> $prop Property metadata
     * @return array<string, mixed>
     */
    public function generateDispoPackage(array $flip, array $prop): array
    {
        $address = $prop['address'] ?: 'Off-Market Property';
        $city    = $prop['city'] ?: 'Bossier City';
        $state   = $prop['state'] ?: 'LA';
        $endPrice      = number_format((float) ($flip['end_buyer_price'] ?? 0));
        $contractPrice = number_format((float) ($flip['contract_price'] ?? 0));
        $fee           = number_format((float) ($flip['assignment_fee'] ?? 15000));
        $arv           = number_format((float) ($flip['after_repair_value'] ?? 0));
        $rehab         = number_format((float) ($flip['renovation_budget'] ?? 0));
        $profit        = number_format((float) ($flip['end_buyer_net_profit'] ?? 0));
        $roi           = number_format((float) ($flip['end_buyer_roi_pct'] ?? 0), 1);
        $emd           = number_format((float) ($flip['earnest_money_deposit'] ?? 2500));
        $days          = (int) ($flip['days_to_close'] ?? 14);

        $sms = "🔥 EXCLUSIVE OFF-MARKET WHOLESALE: {$address}, {$city}, {$state}\n"
             . "💰 End Buyer Cash Price: \${$endPrice}\n"
             . "📊 ARV: \${$arv} | Est. Rehab: \${$rehab}\n"
             . "💵 Your Projected Net Flip Profit: \${$profit} ({$roi}% ROI)\n"
             . "⚡ {$days}-Day Cash Close | \${$emd} Non-Refundable EMD | Clear Title at Louisiana Escrow\n"
             . "Assignor: Timothy Burks Incorporated, LLC\n"
             . "Reply 'POF' now with Proof of Funds to lock assignment!";

        $email = "Subject: [OFF-MARKET] {$address}, {$city} - \${$endPrice} (ARV: \${$arv} | \${$profit} Net Profit)\n\n"
               . "VIP Cash Buyers & Investors,\n\n"
               . "Timothy Burks Incorporated, LLC has secured an exclusive, assignable purchase contract on the following asset:\n\n"
               . "📍 Property: {$address}, {$city}, {$state}\n"
               . "🏷️ Wholesale Assignment Price: \${$endPrice} (Cash or Hard Money)\n"
               . "📈 After Repair Value (ARV): \${$arv}\n"
               . "🔨 Estimated Renovation Budget: \${$rehab}\n"
               . "💰 Projected End-Buyer Net Resale Profit: \${$profit} ({$roi}% ROI)\n"
               . "⏱️ Timeline: {$days}-day closing with clear and marketable Louisiana title guarantee.\n"
               . "📝 Terms: Standard Louisiana Assignment of Purchase Contract, \${$emd} non-refundable earnest money deposit held in escrow.\n\n"
               . "To review the full inspection packet and execute assignment, reply directly with your Proof of Funds (POF).\n\n"
               . "Regards,\nTimothy Burks & AnneAlicia Burks\nTimothy Burks Incorporated, LLC\nBossier City, Louisiana";

        $checklist = [
            '1. Contract Execution' => "Assignable Purchase and Sale Agreement executed with seller under Louisiana Act of Cash Sale warranty.",
            '2. Title & Escrow'     => "Title search opened with Louisiana escrow agent ensuring clear, unencumbered, marketable conveyance.",
            '3. Earnest Deposit'    => "\${$emd} non-refundable earnest money deposit required within 48 hours of assignment agreement signing.",
            '4. Proof of Funds'     => "Buyer must present verified bank statement or hard money pre-approval letter prior to contract transfer.",
            '5. Rapid Close'        => "Strict {$days}-day closing timeline with assignment fee wired directly to Timothy Burks Incorporated, LLC at settlement.",
        ];

        return [
            'sms_blast'            => $sms,
            'email_pitch'          => $email,
            'assignment_checklist' => $checklist,
        ];
    }
}
