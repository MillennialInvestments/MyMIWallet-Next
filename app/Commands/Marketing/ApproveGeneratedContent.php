<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class ApproveGeneratedContent extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:approve-generated';
    protected $description = 'Promote generated marketing content from pending_review to approved.';
    protected $usage = 'marketing:approve-generated [--limit=50] [--story-id=123] [--all]';

    public function run(array $params)
    {
        try {
            $db = Database::connect();
            $limit = max(1, (int) (CLI::getOption('limit') ?: 50));
            $storyId = CLI::getOption('story-id');
            $approveAll = CLI::getOption('all') !== null;
            $now = date('Y-m-d H:i:s');

            $builder = $db->table('bf_marketing_generated_content')
                ->groupStart()
                    ->where('approval_status', 'pending_review')
                    ->orWhere('approval_status', 'pending')
                    ->orWhere('approval_status IS NULL', null, false)
                    ->orWhere('approval_status', '')
                ->groupEnd()
                ->groupStart()
                    ->where('distribution_status', 'pending_generation')
                    ->orWhere('distribution_status', 'pending')
                    ->orWhere('distribution_status IS NULL', null, false)
                    ->orWhere('distribution_status', '')
                ->groupEnd();

            if ($storyId !== null && $storyId !== '') {
                $builder->where('story_id', (int) $storyId);
            }

            if (! $approveAll) {
                $builder->limit($limit);
            }

            $rows = $builder->get()->getResultArray();

            if ($rows === []) {
                CLI::write('No generated content is pending review.', 'yellow');
                return EXIT_SUCCESS;
            }

            $distributionService = service('marketingDistributionService');

            $ids = [];
            $skippedIds = [];
            foreach ($rows as $row) {
                $id = (int) ($row['id'] ?? 0);
                if ($id < 1) {
                    continue;
                }

                if ($distributionService->isGenericPlaceholderMarketingContent($row)) {
                    $skippedIds[] = $id;
                    continue;
                }

                $ids[] = $id;
            }

            if ($ids !== []) {
                $db->table('bf_marketing_generated_content')
                    ->whereIn('id', $ids)
                    ->update([
                        'approval_status' => 'approved',
                        'distribution_status' => 'pending',
                        'status' => 'approved',
                        'updated_at' => $now,
                    ]);
            }

            if ($skippedIds !== []) {
                $db->table('bf_marketing_generated_content')
                    ->whereIn('id', $skippedIds)
                    ->update([
                        'approval_status' => 'skipped',
                        'distribution_status' => 'skipped',
                        'status' => 'skipped',
                        'updated_at' => $now,
                    ]);
            }

            CLI::write(json_encode([
                'status' => 'success',
                'command' => 'marketing:approve-generated',
                'approved_count' => count($ids),
                'skipped_count' => count($skippedIds),
                'ids' => $ids,
                'skipped_ids' => $skippedIds,
            ], JSON_PRETTY_PRINT), 'green');

            $distributionConfig = config('MarketingDistribution');
            if ($distributionConfig->autoCreateTargetsOnApprove) {
                foreach ($ids as $id) {
                    $distributionService->ensureTargetsForContentId((int) $id);
                }
            }

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('marketing:approve-generated failed: ' . $e->getMessage());
            log_message('error', 'marketing:approve-generated failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
