<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class PreviewControlledDistribution extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:preview-controlled';
    protected $description = 'Read-only preview of approved pending marketing generated content and pending targets before controlled distribution.';
    protected $usage = 'php spark marketing:distribution:preview-controlled [--generated-content-id=ID] [--limit=10]';
    protected $options = [
        '--generated-content-id' => 'Optional generated content ID to preview.',
        '--limit' => 'Maximum generated content rows to preview.',
    ];

    public function run(array $params)
    {
        $db = Database::connect();
        $generatedContentId = CLI::getOption('generated-content-id');
        $limit = max(1, (int) (CLI::getOption('limit') ?? 10));

        $builder = $db->table('bf_marketing_generated_content gc')
            ->select('gc.id, gc.title, gc.primary_category, gc.source_type, gc.source_id, gc.story_id, gc.approval_status, gc.distribution_status, gc.status, gc.created_at, gc.updated_at')
            ->whereIn('gc.approval_status', ['approved', 'auto_approved'])
            ->whereIn('gc.distribution_status', ['pending', 'scheduled', 'partial_failed'])
            ->orderBy('gc.id', 'ASC')
            ->limit($limit);

        if ($generatedContentId !== null && (int) $generatedContentId > 0) {
            $builder->where('gc.id', (int) $generatedContentId);
        }

        $records = $builder->get()->getResultArray();
        $items = [];

        foreach ($records as $record) {
            $id = (int) ($record['id'] ?? 0);
            $targets = $db->table('bf_marketing_distribution_targets')
                ->select('id, channel, destination, status, attempt_count, retry_count, queued_at, created_on, modified_on')
                ->where('generated_content_id', $id)
                ->where('channel', 'marketing')
                ->orderBy('id', 'ASC')
                ->get()
                ->getResultArray();

            $pendingTargets = array_values(array_filter($targets, static function (array $target): bool {
                return (string) ($target['status'] ?? '') === 'pending';
            }));

            $items[] = [
                'generated_content_id' => $id,
                'title' => $record['title'] ?? '',
                'primary_category' => $record['primary_category'] ?? '',
                'source_type' => $record['source_type'] ?? '',
                'source_id' => $record['source_id'] ?? '',
                'story_id' => $record['story_id'] ?? '',
                'approval_status' => $record['approval_status'] ?? '',
                'distribution_status' => $record['distribution_status'] ?? '',
                'content_status' => $record['status'] ?? '',
                'created_at' => $record['created_at'] ?? '',
                'updated_at' => $record['updated_at'] ?? '',
                'pending_target_count' => count($pendingTargets),
                'targets' => $targets,
            ];
        }

        $titleSummary = $db->table('bf_marketing_generated_content gc')
            ->select('gc.title, gc.primary_category, gc.source_type, gc.approval_status, gc.distribution_status, COUNT(*) AS total')
            ->whereIn('gc.approval_status', ['approved', 'auto_approved'])
            ->whereIn('gc.distribution_status', ['pending', 'scheduled', 'partial_failed'])
            ->groupBy('gc.title, gc.primary_category, gc.source_type, gc.approval_status, gc.distribution_status')
            ->orderBy('total', 'DESC')
            ->get()
            ->getResultArray();

        $targetSummary = $db->table('bf_marketing_distribution_targets dt')
            ->select('dt.destination, dt.status, COUNT(*) AS total')
            ->join('bf_marketing_generated_content gc', 'gc.id = dt.generated_content_id', 'inner')
            ->where('dt.channel', 'marketing')
            ->whereIn('dt.destination', ['blog', 'in_app', 'email'])
            ->whereIn('gc.approval_status', ['approved', 'auto_approved'])
            ->whereIn('gc.distribution_status', ['pending', 'scheduled', 'partial_failed'])
            ->groupBy('dt.destination, dt.status')
            ->orderBy('dt.destination', 'ASC')
            ->get()
            ->getResultArray();

        CLI::write(json_encode([
            'status' => 'success',
            'dry_run' => true,
            'count' => count($items),
            'title_summary' => $titleSummary,
            'target_summary' => $targetSummary,
            'items' => $items,
            'note' => 'Read-only preview only. No target was sent, queued, retried, or updated.',
        ], JSON_PRETTY_PRINT));
    }
}
