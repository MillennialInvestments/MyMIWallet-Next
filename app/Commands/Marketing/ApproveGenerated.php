<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class ApproveGenerated extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:approve-generated';
    protected $description = 'Approve generated marketing content and optionally pre-create destination targets.';

    protected $options = [
        '--id' => 'Approve a specific generated_content id.',
        '--limit' => 'Maximum records to approve when --id is omitted (default 20).',
        '--skip-targets' => 'Do not create distribution target rows while approving.',
    ];

    public function run(array $params)
    {
        $id = (int) (CLI::getOption('id') ?? 0);
        $limit = max(1, (int) (CLI::getOption('limit') ?? 20));
        $skipTargets = (bool) CLI::getOption('skip-targets');

        $db = Database::connect();
        $builder = $db->table('bf_marketing_generated_content')
            ->where('approval_status', 'pending_review');

        if ($id > 0) {
            $builder->where('id', $id);
        }

        $rows = $builder->orderBy('id', 'ASC')->limit($limit)->get()->getResultArray();

        $distribution = service('marketingDistributionService');

        $approved = [];
        foreach ($rows as $row) {
            $generatedContentId = (int) ($row['id'] ?? 0);
            $db->table('bf_marketing_generated_content')->where('id', $generatedContentId)->update([
                'approval_status' => 'approved',
                'status' => 'approved',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $targetSummary = ['created' => 0, 'existing' => 0, 'skipped' => 0];
            if (! $skipTargets) {
                $targetSummary = $distribution->ensureTargetsForContentId($generatedContentId);
            }

            $approved[] = [
                'id' => $generatedContentId,
                'targets' => $targetSummary,
            ];
        }

        CLI::write(json_encode([
            'status' => 'success',
            'approved_count' => count($approved),
            'approved' => $approved,
        ], JSON_PRETTY_PRINT));
    }
}
