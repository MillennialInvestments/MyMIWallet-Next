<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class RegressionSmoke extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:regression:smoke';
    protected $description = 'Runs full marketing pipeline smoke checks and validates count movement across stages.';

    public function run(array $params)
    {
        $db = Database::connect();

        $baseline = $this->snapshot($db);
        $commands = [
            'marketing:news:debug',
            'marketing:news:scrape --limit=25',
            'marketing:news:generate',
            'marketing:approve-generated --limit=25',
            'marketing:distribute',
            'marketing:daily-audit',
        ];

        $results = [];
        foreach ($commands as $command) {
            $results[] = $this->runShellSparkCommand($command);
        }

        $after = $this->snapshot($db);
        $failures = [];

        if ($after['temp_total'] < $baseline['temp_total']) {
            $failures[] = 'temp_scraper total decreased unexpectedly';
        }
        if ($after['generated_total'] < $baseline['generated_total']) {
            $failures[] = 'generated_content total decreased unexpectedly';
        }
        if ($after['approved_total'] < $baseline['approved_total']) {
            $failures[] = 'approved generated count decreased unexpectedly';
        }

        if ($baseline['pending_review_total'] > 0 && $after['approved_total'] <= $baseline['approved_total']) {
            $failures[] = 'approve-generated did not move pending_review backlog into approved';
        }

        if ($baseline['approved_pending_distribution_total'] > 0 && $after['targets_terminal_total'] <= $baseline['targets_terminal_total']) {
            $failures[] = 'distribution stage did not move target rows into terminal states';
        }

        if ($after['duplicate_distribution_targets'] > 0) {
            $failures[] = 'duplicate distribution targets detected after smoke run';
        }

        $status = $failures === [] ? 'success' : 'failed';

        CLI::write((string) json_encode([
            'status' => $status,
            'commands' => $results,
            'baseline' => $baseline,
            'after' => $after,
            'failures' => $failures,
        ], JSON_PRETTY_PRINT));

        return $failures === [] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    /** @return array<string,mixed> */
    private function runShellSparkCommand(string $command): array
    {
        $full = 'php spark ' . $command . ' 2>&1';
        exec($full, $lines, $exitCode);
        $output = implode("\n", $lines);

        return [
            'command' => $full,
            'exit_code' => $exitCode,
            'output' => $output,
        ];
    }

    /** @return array<string,int> */
    private function snapshot($db): array
    {
        $duplicateTargets = 0;
        if ($db->tableExists('bf_marketing_distribution_targets')) {
            $duplicateTargets = (int) $db->query(
                "SELECT COUNT(*) AS total FROM (
                    SELECT generated_content_id, channel, destination
                    FROM bf_marketing_distribution_targets
                    GROUP BY generated_content_id, channel, destination
                    HAVING COUNT(*) > 1
                ) duplicate_targets"
            )->getRow('total');
        }

        return [
            'temp_total' => $db->tableExists('bf_marketing_temp_scraper') ? $db->table('bf_marketing_temp_scraper')->countAllResults() : 0,
            'generated_total' => $db->tableExists('bf_marketing_generated_content') ? $db->table('bf_marketing_generated_content')->countAllResults() : 0,
            'pending_review_total' => $db->tableExists('bf_marketing_generated_content')
                ? $db->table('bf_marketing_generated_content')->whereIn('approval_status', ['pending_review', 'pending', ''])->countAllResults()
                : 0,
            'approved_total' => $db->tableExists('bf_marketing_generated_content')
                ? $db->table('bf_marketing_generated_content')->whereIn('approval_status', ['approved', 'auto_approved'])->countAllResults()
                : 0,
            'approved_pending_distribution_total' => $db->tableExists('bf_marketing_generated_content')
                ? $db->table('bf_marketing_generated_content')
                    ->whereIn('approval_status', ['approved', 'auto_approved'])
                    ->whereIn('distribution_status', ['pending', 'scheduled', 'partial_failed', ''])
                    ->countAllResults()
                : 0,
            'targets_terminal_total' => $db->tableExists('bf_marketing_distribution_targets')
                ? $db->table('bf_marketing_distribution_targets')->whereIn('status', ['sent', 'failed', 'skipped'])->countAllResults()
                : 0,
            'duplicate_distribution_targets' => $duplicateTargets,
        ];
    }
}
