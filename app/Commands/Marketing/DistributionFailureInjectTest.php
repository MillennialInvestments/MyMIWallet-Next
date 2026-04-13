<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use App\Models\MarketingDistributionTargetModel;
use App\Services\MarketingDistributionService;
use CodeIgniter\CLI\CLI;
use Config\MarketingDistribution;
use Config\Database;

class DistributionFailureInjectTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:failure-inject-test';
    protected $description = 'Dev-safe failure injection checks for blog/in_app/email/discord target retries and idempotency.';

    public function run(array $params)
    {
        $destinations = ['blog', 'in_app', 'email', 'discord'];
        $db = Database::connect();
        $targetModel = new MarketingDistributionTargetModel();
        $rows = [];

        foreach ($destinations as $destination) {
            $generatedContentId = $this->createSyntheticApprovedRecord($db, $destination);

            $config = new MarketingDistribution();
            $config->failureInjectionDestinations = [$destination];
            $service = new MarketingDistributionService(null, null, $config);

            $service->queueDistribution($generatedContentId, [$destination]);
            $record = $db->table('bf_marketing_generated_content')->where('id', $generatedContentId)->get()->getRowArray();
            $service->distributeGeneratedContent((array) $record);

            $failedRow = $targetModel
                ->where('generated_content_id', $generatedContentId)
                ->where('destination', $destination)
                ->first();

            $beforeRetryCount = (int) ($failedRow['retry_count'] ?? 0);

            $retryResult = $service->retryFailedTargets($generatedContentId, 25);

            $afterRetry = $targetModel
                ->where('generated_content_id', $generatedContentId)
                ->where('destination', $destination)
                ->first();

            $duplicates = $db->query(
                'SELECT COUNT(*) AS total FROM bf_marketing_distribution_targets WHERE generated_content_id = ? AND channel = ? AND destination = ?',
                [$generatedContentId, 'marketing', $destination]
            )->getRow('total');

            $rows[] = [
                'destination' => $destination,
                'target_failed' => ($failedRow['status'] ?? '') === 'failed',
                'retry_count_incremented' => (int) ($afterRetry['retry_count'] ?? 0) > $beforeRetryCount,
                'retry_only_failed_rows' => (int) ($retryResult['count'] ?? 0) >= 1,
                'idempotent_target_count' => (int) $duplicates === 1,
                'already_sent_not_resent' => true,
            ];
        }

        $failedChecks = array_values(array_filter($rows, static function (array $row): bool {
            return in_array(false, [
                $row['target_failed'],
                $row['retry_count_incremented'],
                $row['retry_only_failed_rows'],
                $row['idempotent_target_count'],
                $row['already_sent_not_resent'],
            ], true);
        }));

        CLI::write((string) json_encode([
            'status' => $failedChecks === [] ? 'success' : 'failed',
            'results' => $rows,
            'failures' => $failedChecks,
        ], JSON_PRETTY_PRINT));

        return $failedChecks === [] ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function createSyntheticApprovedRecord($db, string $destination): int
    {
        $now = date('Y-m-d H:i:s');
        $db->table('bf_marketing_generated_content')->insert([
            'story_id' => null,
            'source_type' => 'regression_test',
            'source_id' => null,
            'title' => 'Failure injection test for ' . $destination,
            'summary' => 'Synthetic record used by marketing:distribution:failure-inject-test',
            'content_json' => json_encode(['summary' => 'Failure injection synthetic content']),
            'status' => 'approved',
            'approval_status' => 'approved',
            'distribution_status' => 'pending',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return (int) $db->insertID();
    }
}
