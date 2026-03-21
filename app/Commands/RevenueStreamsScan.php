<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class RevenueStreamsScan extends SafeBaseCommand
{
    protected $group       = 'marketing';
    protected $name        = 'revenue:scan';
    protected $description = 'Scan the repository for monetizable features and generate revenue stream docs.';
    protected $options     = [
        '--dry-run' => 'Preview actions without writing documentation',
    ];

    protected $keywords = [
        'membership',
        'premium',
        'pro',
        'subscription',
        'gold',
        'exchange',
        'staking',
        'alerts',
        'advisor',
        'referral',
        'affiliates',
        'api',
        'automation',
        'marketplace',
        'asset creator',
        'forecaster',
        'retirement',
        'tax',
        'kyc',
        'onramp',
        'offramp',
        'real-time data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:revenue:scan] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, null);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            log_message('error', '[spark:revenue:scan] Failed', ['reason' => $resolved['error']]);
            return EXIT_ERROR;
        }

        $records = $this->scanRepository();
        $grouped = $this->groupRecords($records);

        $filesWritten = [
            'README.md' => $this->renderReadme($grouped, $records),
            'revenue_streams_full.md' => $this->renderFull($records),
            'revenue_streams_by_module.md' => $this->renderByModule($grouped['byModule']),
            'revenue_streams_by_user_type.md' => $this->renderByUserType($grouped['byUserType']),
            'revenue_streams_by_pricing_tier.md' => $this->renderByPricing($grouped['byPricing']),
        ];

        $summaryLines = [
            '# Revenue Streams Scan',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Streams found: ' . count($records),
            '',
            '## Artifacts',
        ];

        foreach (array_keys($filesWritten) as $filename) {
            $summaryLines[] = '- ' . $filename;
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;
        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'streams_found' => count($records),
            'artifact_dir' => $resolved['dir'],
            'artifacts' => array_keys($filesWritten),
        ];

        foreach ($filesWritten as $path => $content) {
            if ($dryRun) {
                CLI::write('Dry-run: would generate ' . $resolved['dir'] . '/' . $path, 'yellow');
                continue;
            }
        }

        if (! $dryRun) {
            if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report, $filesWritten)) {
                return EXIT_ERROR;
            }
            CLI::write('Generated: ' . $resolved['dir']);
        }

        CLI::write('Scan complete. Streams found: ' . count($records));

        log_message('info', '[spark:revenue:scan] Completed', [
            'streams' => count($records),
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function scanRepository(): array
    {
        $roots = ['app/Modules', 'app/Libraries', 'app/Services', 'docs'];
        $records = [];

        foreach ($roots as $root) {
            $iterator = $this->getFiles($root);
            foreach ($iterator as $file) {
                $contents = @file_get_contents($file);
                if ($contents === false) {
                    continue;
                }

                foreach ($this->keywords as $keyword) {
                    if (stripos($contents, $keyword) === false && stripos($file, $keyword) === false) {
                        continue;
                    }
                    $records[] = $this->makeRecord($keyword, $file, $contents);
                }
            }
        }

        return $records;
    }

    protected function getFiles(string $root): \Generator
    {
        if (! is_dir($root)) {
            return;
        }
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
        );
        foreach ($iterator as $fileInfo) {
            /** @var \SplFileInfo $fileInfo */
            if (! $fileInfo->isFile()) {
                continue;
            }
            $ext = strtolower($fileInfo->getExtension());
            if (in_array($ext, ['php', 'md', 'html', 'txt'], true)) {
                yield $fileInfo->getPathname();
            }
        }
    }

    protected function makeRecord(string $keyword, string $path, string $contents): array
    {
        $module = $this->detectModule($path);
        return [
            'name'        => ucfirst($keyword),
            'module'      => $module,
            'path'        => $path,
            'monetization'=> $this->guessMonetization($keyword),
            'cta'         => $this->suggestCta($keyword),
            'hook'        => $this->suggestHook($keyword),
            'user_type'   => $this->guessUserType($path),
            'pricing'     => $this->guessPricing($keyword),
        ];
    }

    protected function detectModule(string $path): string
    {
        if (str_contains($path, 'app/Modules/')) {
            $parts = explode('/', $path);
            $index = array_search('Modules', $parts, true);
            return $parts[$index + 1] ?? 'Modules';
        }
        if (str_contains($path, 'app/Services/')) {
            return 'Services';
        }
        if (str_contains($path, 'app/Libraries/')) {
            return 'Libraries';
        }
        return 'Docs';
    }

    protected function guessMonetization(string $keyword): string
    {
        return match (strtolower($keyword)) {
            'membership', 'premium', 'pro', 'subscription', 'gold' => 'subscription',
            'exchange', 'staking', 'onramp', 'offramp', 'real-time data' => 'transaction',
            'alerts', 'advisor', 'api', 'automation' => 'service',
            'referral', 'affiliates' => 'referral',
            default => 'service',
        };
    }

    protected function suggestCta(string $keyword): string
    {
        return match (strtolower($keyword)) {
            'membership', 'premium', 'pro', 'gold' => 'Upgrade to unlock premium insights.',
            'alerts' => 'Enable alerts in Discord and the app.',
            'advisor' => 'Book a session or follow the advisor feed.',
            'api' => 'Request API access and keys.',
            'automation' => 'Turn on automation for your workspace.',
            'referral', 'affiliates' => 'Share your code and earn discounts.',
            default => 'Start a free trial and join Discord for onboarding.',
        };
    }

    protected function suggestHook(string $keyword): string
    {
        $now = Time::now()->toDateString();
        return "Monetize {$keyword} pathways — {$now}";
    }

    protected function guessUserType(string $path): string
    {
        if (stripos($path, 'advisor') !== false || stripos($path, 'partner') !== false) {
            return 'business';
        }
        if (stripos($path, 'budget') !== false || stripos($path, 'beginner') !== false) {
            return 'beginner';
        }
        return 'advanced';
    }

    protected function guessPricing(string $keyword): string
    {
        return match (strtolower($keyword)) {
            'membership', 'premium', 'gold' => 'Premium',
            'pro' => 'Pro',
            'subscription' => 'Basic',
            default => 'Starter',
        };
    }

    protected function groupRecords(array $records): array
    {
        $byModule   = [];
        $byUserType = [];
        $byPricing  = [];

        foreach ($records as $record) {
            $byModule[$record['module']][]     = $record;
            $byUserType[$record['user_type']][] = $record;
            $byPricing[$record['pricing']][]    = $record;
        }

        return [
            'byModule'   => $byModule,
            'byUserType' => $byUserType,
            'byPricing'  => $byPricing,
        ];
    }

    protected function renderReadme(array $grouped, array $records): string
    {
        $total     = count($records);
        $modules   = count($grouped['byModule']);
        $pricing   = count($grouped['byPricing']);
        return <<<MD
# Revenue Streams Scanner

- Total streams detected: {$total}
- Modules touched: {$modules}
- Pricing tiers represented: {$pricing}

Command: `php spark revenue:scan`

Generated files:
- revenue_streams_full.md
- revenue_streams_by_module.md
- revenue_streams_by_user_type.md
- revenue_streams_by_pricing_tier.md

MD;
    }

    protected function renderFull(array $records): string
    {
        $lines = ["# Full Revenue Stream Inventory"];
        foreach ($records as $record) {
            $lines[] = "- **{$record['name']}** ({$record['monetization']}) — {$record['module']} | {$record['path']} | CTA: {$record['cta']} | Hook: {$record['hook']}";
        }
        return implode("\n", $lines);
    }

    protected function renderByModule(array $byModule): string
    {
        $lines = ["# Revenue Streams by Module"];
        foreach ($byModule as $module => $records) {
            $lines[] = "\n## {$module}";
            foreach ($records as $record) {
                $lines[] = "- **{$record['name']}** ({$record['monetization']}) — {$record['path']} | CTA: {$record['cta']}";
            }
        }
        return implode("\n", $lines);
    }

    protected function renderByUserType(array $byUserType): string
    {
        $lines = ["# Revenue Streams by User Type"];
        foreach ($byUserType as $userType => $records) {
            $lines[] = "\n## " . ucfirst($userType);
            foreach ($records as $record) {
                $lines[] = "- **{$record['name']}** ({$record['pricing']}) — {$record['path']}";
            }
        }
        return implode("\n", $lines);
    }

    protected function renderByPricing(array $byPricing): string
    {
        $lines = ["# Revenue Streams by Pricing Tier"];
        foreach ($byPricing as $tier => $records) {
            $lines[] = "\n## {$tier}";
            foreach ($records as $record) {
                $lines[] = "- **{$record['name']}** ({$record['module']}) — {$record['path']} | Monetization: {$record['monetization']}";
            }
        }
        return implode("\n", $lines);
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
