<?php

declare(strict_types=1);

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\ContentDistroEngine;
use App\Services\Marketing\MultiMailboxIntakeService;
use CodeIgniter\CLI\CLI;

class DistroPipeline extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distro-pipeline';
    protected $description = 'Executes end-to-end Intake -> Content Generation -> Voiceover -> Multi-Platform Distro (Discord, Email, n8n).';

    public function run(array $params)
    {
        CLI::write("=========================================================================", 'green');
        CLI::write("   MyMI Marketing Distribution & Alert Engine · End-to-End Pipeline     ", 'yellow');
        CLI::write("=========================================================================", 'green');

        $intakeService = new MultiMailboxIntakeService();
        $distroEngine = new ContentDistroEngine();

        $fetch = CLI::getOption('fetch') !== null;
        $generate = CLI::getOption('generate') !== null;
        $distribute = CLI::getOption('distribute') !== null;
        $symbol = strtoupper((string) (CLI::getOption('symbol') ?: 'BA'));
        $dryRun = CLI::getOption('dry-run') !== null;

        // Default run all stages if none specified
        if (! $fetch && ! $generate && ! $distribute) {
            $fetch = true;
            $generate = true;
            $distribute = true;
        } elseif ($distribute && ! $generate) {
            // Auto-enable generation if distribute is specifically requested
            $generate = true;
        }

        // 1. INTAKE STAGE
        if ($fetch) {
            CLI::write("\n[1/3] Polling Mailboxes (alerts@mymiwallet.com & news@mymiwallet.com)...", 'cyan');
            $intakeRes = $intakeService->fetchAll(['limit' => 10, 'dry_run' => $dryRun]);
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
            $package = $distroEngine->generatePackage([
                'ticker' => $symbol,
                'type' => 'trade_alert',
                'strategy' => 'STRANGLE',
                'underlier_price' => $symbol === 'BA' ? 187.53 : 200.00,
                'call_strike' => $symbol === 'BA' ? 192.50 : 210.00,
                'put_strike' => $symbol === 'BA' ? 182.50 : 150.00,
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
                if (! empty($res['endpoint'])) {
                    CLI::write("   Target: " . $res['endpoint']);
                }
                if (! empty($res['queued_count'])) {
                    CLI::write("   Queued: " . $res['queued_count'] . " emails");
                }
                if (! empty($res['error'])) {
                    CLI::write("   Error: " . $res['error'], 'yellow');
                }
            }
        } elseif ($dryRun) {
            CLI::write("\n[3/3] Distribution skipped (--dry-run enabled).", 'yellow');
        }

        CLI::write("\n=========================================================================", 'green');
        CLI::write("Pipeline complete. Access dashboard at: /Management/Marketing/Distro", 'yellow');
        CLI::write("=========================================================================\n", 'green');
    }
}
