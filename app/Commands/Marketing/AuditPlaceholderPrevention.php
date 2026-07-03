<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class AuditPlaceholderPrevention extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:audit:placeholder-prevention';
    protected $description = 'Audits generic all-symbol placeholder marketing content prevention state.';

    public function run(array $params)
    {
        $db = Database::connect();
        $titles = ['News alert for all symbols', 'Press release alert for all symbols'];

        $generatedSummary = $db->table('bf_marketing_generated_content')
            ->select('title, approval_status, distribution_status, status, COUNT(*) AS total')
            ->whereIn('title', $titles)
            ->groupBy('title, approval_status, distribution_status, status')
            ->orderBy('title', 'ASC')
            ->get()
            ->getResultArray();

        $approvedReady = $db->table('bf_marketing_generated_content')
            ->whereIn('title', $titles)
            ->whereIn('approval_status', ['approved', 'auto_approved'])
            ->whereIn('distribution_status', ['pending', 'scheduled', 'partial_failed'])
            ->countAllResults();

        $pendingTargets = $db->table('bf_marketing_distribution_targets dt')
            ->join('bf_marketing_generated_content gc', 'gc.id = dt.generated_content_id', 'inner')
            ->whereIn('gc.title', $titles)
            ->where('dt.channel', 'marketing')
            ->whereIn('dt.destination', ['blog', 'in_app', 'email'])
            ->where('dt.status', 'pending')
            ->countAllResults();

        $targetSummary = $db->table('bf_marketing_distribution_targets dt')
            ->select('dt.destination, dt.status, COUNT(*) AS total')
            ->join('bf_marketing_generated_content gc', 'gc.id = dt.generated_content_id', 'inner')
            ->whereIn('gc.title', $titles)
            ->where('dt.channel', 'marketing')
            ->whereIn('dt.destination', ['blog', 'in_app', 'email'])
            ->groupBy('dt.destination, dt.status')
            ->orderBy('dt.destination', 'ASC')
            ->get()
            ->getResultArray();

        $pass = $approvedReady === 0 && $pendingTargets === 0;

        CLI::write(json_encode([
            'status' => $pass ? 'pass' : 'fail',
            'approved_ready_placeholders' => $approvedReady,
            'pending_placeholder_targets' => $pendingTargets,
            'generated_summary' => $generatedSummary,
            'target_summary' => $targetSummary,
        ], JSON_PRETTY_PRINT));

        return $pass ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
