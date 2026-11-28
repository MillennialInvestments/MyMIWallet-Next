<?php

declare(strict_types=1);

namespace App\Commands;

use App\Models\ProjectsModel;
use App\Services\RealEstateDealFinderService;
use CodeIgniter\CLI\CLI;

class RealEstateScanDistressed extends SafeBaseCommand
{
    protected $group       = 'RealEstate';
    protected $name        = 'realestate:scan:distressed';
    protected $description = 'Scan distressed real estate portals for high-equity Section 8 / DSCR opportunities and auto-ingest into intake inbox.';
    protected $usage       = 'realestate:scan:distressed [--max-price=50000] [--min-sqft=1700] [--beds=3] [--zip=71111] [--auto-ingest] [--json]';

    protected $options = [
        '--max-price'   => 'Maximum purchase price (default: 50000).',
        '--min-sqft'    => 'Minimum square footage (default: 1700).',
        '--beds'        => 'Minimum bedrooms (default: 3).',
        '--zip'         => 'Target ZIP code (default: 71111).',
        '--city'        => 'Target city (default: Bossier City).',
        '--state'       => 'Target state (default: LA).',
        '--auto-ingest' => 'Automatically ingest discovered deals into bf_projects_inbox.',
        '--json'        => 'Output raw JSON result.',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);

        $maxPrice   = (float) ($flags['max-price'] ?? CLI::getOption('max-price') ?? 50000.0);
        $minSqft    = (int) ($flags['min-sqft'] ?? CLI::getOption('min-sqft') ?? 1700);
        $beds       = (int) ($flags['beds'] ?? CLI::getOption('beds') ?? 3);
        $zip        = trim((string) ($flags['zip'] ?? CLI::getOption('zip') ?? '71111'));
        $city       = trim((string) ($flags['city'] ?? CLI::getOption('city') ?? 'Bossier City'));
        $state      = trim((string) ($flags['state'] ?? CLI::getOption('state') ?? 'LA'));
        $autoIngest = array_key_exists('auto-ingest', $flags) || CLI::getOption('auto-ingest') !== null || in_array('auto-ingest', $args, true) || in_array('--auto-ingest', $args, true);
        $asJson     = array_key_exists('json', $flags) || CLI::getOption('json') !== null || in_array('json', $args, true) || in_array('--json', $args, true);

        $service = new RealEstateDealFinderService();
        $results = $service->searchDistressedOpportunities([
            'max_price' => $maxPrice,
            'min_sqft'  => $minSqft,
            'beds'      => $beds,
            'zip'       => $zip,
            'city'      => $city,
            'state'     => $state,
        ]);

        $ingestedCount = 0;
        if ($autoIngest && ! empty($results['deals'])) {
            $projectsModel = model(ProjectsModel::class);
            foreach ($results['deals'] as $deal) {
                $intakePayload = [
                    'source'            => strtoupper((string) ($deal['platform'] ?? 'DISTRESSED_SCANNER')),
                    'raw_input'         => ($deal['address'] ?? '') . ', ' . ($deal['city'] ?? '') . ', ' . ($deal['state'] ?? '') . ' ' . ($deal['zip'] ?? ''),
                    'zillow_url'        => $deal['direct_url'] ?? '',
                    'property_address'  => $deal['address'] ?? '',
                    'city'              => $deal['city'] ?? '',
                    'state'             => $deal['state'] ?? '',
                    'zip_code'          => $deal['zip'] ?? '',
                    'purchase_price'    => $deal['purchase_price'] ?? 0,
                    'sqft'              => $deal['sqft'] ?? 0,
                    'bedrooms'          => $deal['beds'] ?? 0,
                    'bathrooms'         => $deal['baths'] ?? 0,
                    'estimated_rehab'   => $deal['renovation_budget'] ?? 0,
                    'arv'               => $deal['appraised_arv'] ?? 0,
                    'underwriting_data' => $deal['underwriting'] ?? [],
                    'status'            => 'auto_discovered',
                    'lead_sponsor'      => 'Timothy Burks Incorporated, LLC.',
                    'operating_managers'=> 'Timothy Burks & AnneAlicia Burks',
                ];

                $intakeId = $projectsModel->reSaveIntake($intakePayload);
                if ($intakeId > 0) {
                    $ingestedCount++;
                }
            }
        }

        $results['ingested_count'] = $ingestedCount;

        if ($asJson) {
            CLI::write(json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return EXIT_SUCCESS;
        }

        CLI::write("==================================================================", 'green');
        CLI::write(" TBI Real Estate Distressed Opportunity Scanner", 'green');
        CLI::write(" Lead Sponsor: Timothy Burks Incorporated, LLC.", 'yellow');
        CLI::write(" Operating Managers: Timothy Burks & AnneAlicia Burks", 'yellow');
        CLI::write("==================================================================", 'green');
        CLI::write("Criteria: <\${$maxPrice} | >{$minSqft} sqft | {$beds}+ Bed | Zip: {$zip} ({$city}, {$state})");
        CLI::write("Total Qualified Opportunities Found: " . count($results['deals']));
        CLI::newLine();

        foreach ($results['deals'] as $idx => $deal) {
            $num = $idx + 1;
            $uw = $deal['underwriting'] ?? [];
            $fmr = $uw['hud_fmr']['monthly_voucher_rate'] ?? 0;
            $dscr = $uw['dscr_loan_underwriting']['dscr_ratio'] ?? 0;
            $dscrGrade = $uw['dscr_loan_underwriting']['dscr_grade'] ?? 'N/A';
            $cashFlow = $uw['section_8_cashflow']['projected_monthly_noi'] ?? 0;
            $discountMao = $uw['rule_70_appraisal']['discount_under_mao'] ?? 0;

            CLI::write(" [{$num}] {$deal['title']}", 'white');
            CLI::write("     Address:   {$deal['address']}, {$deal['city']}, {$deal['state']} {$deal['zip']}");
            CLI::write("     Platform:  {$deal['platform']} ({$deal['distressed_type']})");
            CLI::write("     Price:     $" . number_format((float) $deal['purchase_price']) . " | SqFt: " . number_format((float) $deal['sqft']) . " | Beds/Baths: {$deal['beds']}/{$deal['baths']}");
            CLI::write("     ARV:       $" . number_format((float) $deal['appraised_arv']) . " | Rehab: $" . number_format((float) $deal['renovation_budget']) . " | MAO Discount: $" . number_format((float) $discountMao));
            CLI::write("     Section 8: $" . number_format((float) $fmr) . "/mo | DSCR: {$dscr}x ({$dscrGrade}) | Net CF: $" . number_format((float) $cashFlow) . "/mo", 'cyan');
            CLI::write("     Direct:    {$deal['direct_url']}");
            CLI::newLine();
        }

        if ($autoIngest) {
            CLI::write("✓ Auto-ingested {$ingestedCount} deals into bf_projects_inbox with status 'auto_discovered'.", 'green');
        } else {
            CLI::write("Tip: Run with --auto-ingest to queue these opportunities directly into Mission Control inbox.", 'light_gray');
        }

        return EXIT_SUCCESS;
    }
}
