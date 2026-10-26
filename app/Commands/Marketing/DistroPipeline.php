<?php

declare(strict_types=1);

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Commands\Traits\ParamOptions;
use App\Services\Marketing\ContentDistroEngine;
use App\Services\Marketing\MultiMailboxIntakeService;
use CodeIgniter\CLI\CLI;

class DistroPipeline extends SafeBaseCommand
{
    use ParamOptions;

    protected $group       = 'Marketing';
    protected $name        = 'marketing:distro-pipeline';
    protected $description = 'Executes end-to-end Intake -> Content Generation -> Voiceover -> Multi-Platform Distro (Discord, Email, n8n).';
    protected $usage       = 'marketing:distro-pipeline [symbol] [--fetch] [--generate] [--distribute] [--dry-run]';
    protected $arguments   = [
        'symbol' => 'Stock ticker symbol (e.g. BA, NVDA, TSLA)',
    ];
    protected $options     = [
        '--fetch'      => 'Fetch latest emails from alerts@ and news@ mailboxes',
        '--generate'   => 'Generate multi-platform content assets',
        '--distribute' => 'Distribute generated package to Discord, Email, and n8n',
        '--dry-run'    => 'Preview pipeline output without persisting changes',
        '--limit'      => 'Max emails to fetch during intake',
    ];

    public function run(array $params)
    {
        $intakeService = new MultiMailboxIntakeService();
        $distroEngine = new ContentDistroEngine();

        $fetch = $this->optBool($params, 'fetch');
        $generate = $this->optBool($params, 'generate');
        $distribute = $this->optBool($params, 'distribute');
        $dryRun = $this->optBool($params, 'dry-run');
        $limit = $this->optInt($params, 'limit', 10);

        // Detect symbol from positional argument or --symbol
        $symbol = strtoupper($this->opt($params, 'symbol', ''));
        if ($symbol === '') {
            foreach ($params as $p) {
                if (is_string($p) && ! str_starts_with($p, '-') && ! str_contains($p, '=')) {
                    $symbol = strtoupper(trim($p));
                    break;
                }
            }
        }
        if ($symbol === '') {
            $symbol = 'BA';
        }

        // Default run all stages if none specified
        if (! $fetch && ! $generate && ! $distribute) {
            $fetch = true;
            $generate = true;
            $distribute = true;
        } elseif ($distribute && ! $generate) {
            $generate = true;
        }

        CLI::write("\n=========================================================================", 'yellow');
        CLI::write("   MyMI Marketing Distribution & Alert Engine · End-to-End Pipeline     ", 'white');
        CLI::write("=========================================================================", 'yellow');

        // 1. INTAKE STAGE
        if ($fetch) {
            CLI::write("\n[1/3] Polling Mailboxes (alerts@mymiwallet.com & news@mymiwallet.com)...", 'cyan');
            $intakeRes = $intakeService->fetchAll(['limit' => $limit, 'dry_run' => $dryRun]);
            CLI::write(sprintf(
                " - Scanned: %d | New Stored: %d | Duplicates Skipped: %d",
                $intakeRes['total_scanned'],
                $intakeRes['total_new_stored'],
                $intakeRes['total_duplicates']
            ));
            if (! empty($intakeRes['errors'])) {
                foreach ($intakeRes['errors'] as $err) {
                    CLI::write("   ! Notice: {$err}", 'yellow');
                }
            }
        }

        // 2. GENERATION STAGE
        $package = null;
        if ($generate) {
            CLI::write("\n[2/3] Generating Multi-Platform Content for {$symbol}...", 'cyan');
            $underlierPrice = $symbol === 'BA' ? 187.53 : ($symbol === 'NVDA' ? 200.00 : 250.00);
            $callStrike = round($underlierPrice * 1.04, 2);
            $putStrike = round($underlierPrice * 0.96, 2);

            $package = $distroEngine->generatePackage([
                'ticker' => $symbol,
                'type' => 'trade_alert',
                'strategy' => 'STRANGLE',
                'underlier_price' => $underlierPrice,
                'call_strike' => $callStrike,
                'put_strike' => $putStrike,
                'target_profit' => 200.00,
                'headline' => "{$symbol} Weekly Options Momentum Breakout Setup",
                'note' => "High volume momentum signal. Asymmetric profit curve flagged by options tracker.",
            ]);

            CLI::write(" - Generated Content ID: " . $package['generated_content_id'], 'green');
            CLI::write(" - Video Record ID: " . $package['video_record_id']);
            CLI::write(" - Hook: " . ($package['video']['hook'] ?? 'N/A'));
            CLI::write(" - Voiceover MP3: " . ($package['voiceover']['file_url'] ?? 'N/A') . " ({$package['voiceover']['duration_est']}s)");
            CLI::write(" - Discord Title: " . ($package['discord']['title'] ?? 'N/A'));
            CLI::write(" - Email Subject: " . ($package['email']['subject'] ?? 'N/A'));
        }

        // 3. DISTRIBUTION STAGE
        if ($distribute && $package && ! $dryRun) {
            CLI::write("\n[3/3] Distributing to Discord, User Email Outbox, and n8n Webhook...", 'cyan');
            $genId = (int) $package['generated_content_id'];
            $dispatchRes = $distroEngine->dispatch($genId, ['discord', 'email', 'n8n']);

            foreach ($dispatchRes['destinations'] as $dest => $res) {
                $statusPill = ($res['success'] ?? false) ? '[SUCCESS]' : '[FAILED]';
                $color = ($res['success'] ?? false) ? 'green' : 'red';
                CLI::write(" - Destination [{$dest}]: {$statusPill}", $color);

                if ($dest === 'n8n' && isset($res['endpoint'])) {
                    CLI::write("   Target: " . $res['endpoint']);
                }
                if ($dest === 'email' && isset($res['queued_count'])) {
                    CLI::write("   Queued: " . $res['queued_count'] . " emails");
                }
            }
        } elseif ($dryRun) {
            CLI::write("\n[3/3] Distribution skipped (--dry-run enabled).", 'yellow');
        }

        CLI::write("\n=========================================================================", 'yellow');
        CLI::write("Pipeline complete. Access dashboard at: /Management/Marketing/Distro", 'green');
        CLI::write("=========================================================================\n", 'yellow');
    }
}
