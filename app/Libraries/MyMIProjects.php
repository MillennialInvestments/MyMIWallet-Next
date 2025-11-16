<?php namespace App\Libraries;

use App\Config\Projects as ProjectsConfig;
use App\Models\{ProjectCommitmentsModel, ProjectDistributionsModel, ProjectInboxModel, ProjectPayoutsModel, ProjectTokenAllocationsModel, ProjectWithdrawalsModel, ProjectsModel};
use CodeIgniter\I18n\Time;
use DateTime;
use RuntimeException;
use Throwable;

class MyMIProjects
{
    public function __construct(
        private ProjectsModel $projects = new ProjectsModel(),
        private ProjectInboxModel $inbox = new ProjectInboxModel(),
        private ProjectCommitmentsModel $commitments = new ProjectCommitmentsModel(),
        private ProjectTokenAllocationsModel $allocations = new ProjectTokenAllocationsModel(),
        private ProjectDistributionsModel $distributions = new ProjectDistributionsModel(),
        private ProjectPayoutsModel $payouts = new ProjectPayoutsModel(),
        private ProjectWithdrawalsModel $withdrawals = new ProjectWithdrawalsModel(),
        private MyMIExchangeAdapter $exchange = new MyMIExchangeAdapter(),
        private ProjectsConfig $config = new ProjectsConfig()
    ) {
    }

    public function ingestEmailLead(array $email): int
    {
        $payload = [
            'source'       => strtoupper($email['source'] ?? 'EMAIL'),
            'source_key'   => $email['source_key'] ?? null,
            'trigger'      => strtoupper($email['trigger'] ?? $this->detectTrigger($email)),
            'raw_subject'  => $email['subject'] ?? null,
            'raw_body'     => $email['body'] ?? null,
            'url'          => $email['url'] ?? $this->matchUrl(($email['subject'] ?? '') . ' ' . ($email['body'] ?? '')),
            'payload_json' => null,
            'status'       => 'new',
        ];

        $payload['created_at'] = Time::now()->toDateTimeString();
        $payload['updated_at'] = $payload['created_at'];

        try {
            $id = $this->inbox->insert($payload, true);
            log_message('info', 'MyMIProjects::ingestEmailLead stored record {id}', ['id' => $id] + $payload);
            return $id;
        } catch (Throwable $e) {
            $this->logThrowable('ingestEmailLead', $e, $payload);
            throw new RuntimeException('Unable to ingest email lead.');
        }
    }

    public function parseLeadRecord(int $inboxId): ?array
    {
        $lead = $this->inbox->find($inboxId);
        if (! $lead) {
            return null;
        }

        try {
            $normalized = $this->extractNormalizedLead($lead);
            $payload = [
                'normalized' => $normalized,
                'raw'        => [
                    'subject' => $lead['raw_subject'],
                    'body'    => $lead['raw_body'],
                ],
            ];

            $this->inbox->update($inboxId, [
                'payload_json' => json_encode($payload, JSON_PRETTY_PRINT),
                'status'       => 'parsed',
                'updated_at'   => Time::now()->toDateTimeString(),
            ]);

            return $normalized;
        } catch (Throwable $e) {
            $this->logThrowable('parseLeadRecord', $e, ['inbox_id' => $inboxId]);
            throw new RuntimeException('Failed to parse lead record.');
        }
    }

    public function promoteLeadToProject(int $inboxId, array $overrides = []): int
    {
        $lead = $this->inbox->find($inboxId);
        if (! $lead) {
            throw new RuntimeException('Lead not found.');
        }

        $payload = $lead['payload_json'] ? json_decode($lead['payload_json'], true) : null;
        $normalized = $payload['normalized'] ?? $this->parseLeadRecord($inboxId);
        if (! $normalized) {
            throw new RuntimeException('Lead could not be normalized.');
        }

        $data = array_merge($normalized, $overrides);
        $title = $data['title'] ?? ($data['address'] ?? ('Project ' . $inboxId));
        $slug = $this->slugify($title);
        $now = Time::now()->toDateTimeString();

        $projectData = [
            'title'           => $title,
            'slug'            => $slug,
            'description'     => $data['description'] ?? null,
            'asset_url'       => $data['url'] ?? null,
            'purchase_price'  => $data['purchase_price'] ?? $data['price'] ?? null,
            'target_raise'    => $data['target_raise'] ?? $data['price'] ?? null,
            'min_commit'      => $data['min_commit'] ?? $this->config->defaultMinCommit,
            'max_commit'      => $data['max_commit'] ?? $this->config->defaultMaxCommit,
            'commit_deadline' => $data['commit_deadline'] ?? Time::now()->addDays(21)->toDateTimeString(),
            'status'          => 'collecting',
            'created_at'      => $now,
            'updated_at'      => $now,
        ];

        try {
            $projectId = $this->projects->insert($projectData, true);
            $this->inbox->update($inboxId, [
                'status'       => 'promoted',
                'payload_json' => json_encode(array_merge($payload ?? [], ['project_id' => $projectId]), JSON_PRETTY_PRINT),
                'updated_at'   => $now,
            ]);
            log_message('info', 'MyMIProjects::promoteLeadToProject created project {id}', ['id' => $projectId]);
            return $projectId;
        } catch (Throwable $e) {
            $this->logThrowable('promoteLeadToProject', $e, ['inbox_id' => $inboxId, 'data' => $projectData]);
            throw new RuntimeException('Failed to create project from lead.');
        }
    }

    public function openCommitments(int $projectId): bool
    {
        return $this->updateProjectStatus($projectId, 'collecting');
    }

    public function recordCommitment(int $projectId, int $userId, float $amount): bool
    {
        $project = $this->projects->find($projectId);
        if (! $project) {
            throw new RuntimeException('Project not found.');
        }

        $this->validateCommitmentBounds($project, $amount);

        $now = Time::now()->toDateTimeString();
        $data = [
            'project_id' => $projectId,
            'user_id'    => $userId,
            'amount'     => $amount,
            'status'     => 'confirmed',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        try {
            $this->commitments->insert($data);
            log_message('info', 'MyMIProjects::recordCommitment recorded commitment', $data);
            return true;
        } catch (Throwable $e) {
            $this->logThrowable('recordCommitment', $e, $data);
            throw new RuntimeException('Unable to record commitment.');
        }
    }

    public function totalCommitted(int $projectId): float
    {
        try {
            $builder = $this->commitments->selectSum('amount', 'total')
                ->where('project_id', $projectId)
                ->whereIn('status', ['confirmed', 'converted']);

            $result = $builder->first();

            return (float) ($result['total'] ?? 0.0);
        } catch (Throwable $e) {
            log_message(
                'error',
                'MyMIProjects::totalCommitted failed for project {id}: {error}',
                ['id' => $projectId, 'error' => $e->getMessage()]
            );

            return 0.0;
        }
    }

    public function hasMetThreshold(int $projectId): bool
    {
        $project = $this->projects->find($projectId);
        if (! $project || empty($project['target_raise'])) {
            return false;
        }
        return $this->totalCommitted($projectId) >= (float) $project['target_raise'];
    }

    public function createAssetToken(int $projectId): array
    {
        $project = $this->projects->find($projectId);
        if (! $project) {
            throw new RuntimeException('Project not found.');
        }

        if (! empty($project['exchange_asset_id']) && ! empty($project['exchange_symbol'])) {
            return [
                'symbol'   => $project['exchange_symbol'],
                'asset_id' => $project['exchange_asset_id'],
            ];
        }

        $symbol = $project['exchange_symbol'] ?? ('PRJ' . str_pad((string) $projectId, 4, '0', STR_PAD_LEFT));
        $price = max($this->exchange->getCurrentPrice($project['exchange_asset_id'] ?? $symbol), 1.0);
        $target = (float) ($project['target_raise'] ?? 0) ?: 1.0;
        $supply = (int) ceil($target / $price);

        $asset = $this->exchange->createAsset($symbol, $project['title'], $supply, ['project_id' => $projectId]);
        $this->projects->update($projectId, [
            'exchange_symbol'   => $asset['symbol'],
            'exchange_asset_id' => $asset['asset_id'],
            'updated_at'        => Time::now()->toDateTimeString(),
        ]);

        log_message('info', 'MyMIProjects::createAssetToken provisioned asset', $asset + ['project_id' => $projectId]);

        return $asset;
    }

    public function launchPrivateAuction(int $projectId): array
    {
        $project = $this->projects->find($projectId);
        if (! $project) {
            throw new RuntimeException('Project not found.');
        }

        $asset = $this->createAssetToken($projectId);
        $whitelist = $this->commitments
            ->select('user_id')
            ->where('project_id', $projectId)
            ->where('status', 'confirmed')
            ->groupBy('user_id')
            ->findAll();
        $userIds = array_map(static fn($row) => (int) $row['user_id'], $whitelist);
        if (empty($userIds)) {
            throw new RuntimeException('No confirmed commitments available for auction.');
        }

        $price = $this->exchange->getCurrentPrice($asset['asset_id']);
        if ($price <= 0) {
            $price = 1.0;
        }

        $endsAt = new DateTime('+3 days');
        $auction = $this->exchange->createPrivateAuction($asset['asset_id'], $userIds, $price, $endsAt);

        $snapshot = [
            'price'     => $auction['price'],
            'ends_at'   => $endsAt->format(DateTime::ATOM),
            'whitelist' => $userIds,
        ];

        $this->projects->update($projectId, [
            'status'           => 'auction',
            'auction_id'       => $auction['auction_id'] ?? null,
            'auction_snapshot' => json_encode($snapshot, JSON_PRETTY_PRINT),
            'updated_at'       => Time::now()->toDateTimeString(),
        ]);

        log_message('info', 'MyMIProjects::launchPrivateAuction prepared auction', $snapshot + ['auction_id' => $auction['auction_id'] ?? null]);

        return [
            'auction_id' => $auction['auction_id'] ?? null,
            'price'      => $price,
            'whitelist'  => $userIds,
            'ends_at'    => $endsAt,
        ];
    }

    public function settlePrivateAuction(int $projectId): bool
    {
        $project = $this->projects->find($projectId);
        if (! $project) {
            throw new RuntimeException('Project not found.');
        }
        if (empty($project['auction_id'])) {
            throw new RuntimeException('Project has no active auction.');
        }

        $snapshot = $project['auction_snapshot'] ? json_decode($project['auction_snapshot'], true) : [];
        $price = (float) ($snapshot['price'] ?? 1.0);
        if ($price <= 0) {
            $price = 1.0;
        }

        $this->exchange->settleAuction($project['auction_id']);

        $commitments = $this->commitments
            ->where('project_id', $projectId)
            ->where('status', 'confirmed')
            ->findAll();

        foreach ($commitments as $commitment) {
            $amount = (float) $commitment['amount'];
            if ($amount <= 0) {
                continue;
            }

            $memo = sprintf('Private auction settlement for project %s', $project['title']);
            $this->exchange->debitUserFiatOrStable((int) $commitment['user_id'], $amount, $memo);
            $tokens = round($amount / $price, 8);
            $this->exchange->mintToUser($project['exchange_asset_id'], (int) $commitment['user_id'], $tokens);

            $this->allocations->insert([
                'project_id'   => $projectId,
                'user_id'      => $commitment['user_id'],
                'token_symbol' => $project['exchange_symbol'],
                'tokens'       => $tokens,
                'cost_basis'   => round($price, 6),
                'created_at'   => Time::now()->toDateTimeString(),
            ]);
            $this->commitments->update($commitment['id'], [
                'status'     => 'converted',
                'updated_at' => Time::now()->toDateTimeString(),
            ]);
        }

        $this->markFunded($projectId);

        return true;
    }

    public function markFunded(int $projectId): bool
    {
        return $this->updateProjectStatus($projectId, 'funded');
    }

    public function createQuarterlyDistribution(int $projectId, string $periodStart, string $periodEnd, float $gross, float $net): int
    {
        $data = [
            'project_id'       => $projectId,
            'period_start'     => $periodStart,
            'period_end'       => $periodEnd,
            'gross_revenue'    => $gross,
            'net_distributable'=> $net,
            'created_at'       => Time::now()->toDateTimeString(),
        ];

        $distributionId = $this->distributions->insert($data, true);
        $this->createPayoutsForDistribution($distributionId);
        log_message('info', 'MyMIProjects::createQuarterlyDistribution created distribution', $data + ['distribution_id' => $distributionId]);
        return $distributionId;
    }

    public function calculateHolderShares(int $projectId, string $tokenSymbol): array
    {
        $records = $this->allocations
            ->select('user_id, SUM(tokens) as tokens')
            ->where('project_id', $projectId)
            ->where('token_symbol', $tokenSymbol)
            ->groupBy('user_id')
            ->findAll();

        $total = array_sum(array_map(static fn($row) => (float) $row['tokens'], $records));
        if ($total <= 0) {
            return [];
        }

        $shares = [];
        foreach ($records as $row) {
            $shares[(int) $row['user_id']] = (float) $row['tokens'] / $total;
        }
        return $shares;
    }

    public function runPayouts(int $distributionId): int
    {
        $distribution = $this->distributions->find($distributionId);
        if (! $distribution) {
            throw new RuntimeException('Distribution not found.');
        }

        $payouts = $this->payouts->where('distribution_id', $distributionId)->where('status', 'pending')->findAll();
        $count = 0;
        foreach ($payouts as $payout) {
            $this->exchange->creditUserFiatOrStable((int) $payout['user_id'], (float) $payout['amount'], 'Quarterly distribution payout');
            $this->payouts->update($payout['id'], [
                'status'     => 'paid',
                'updated_at' => Time::now()->toDateTimeString(),
            ]);
            $count++;
        }
        log_message('info', 'MyMIProjects::runPayouts processed payouts', ['distribution_id' => $distributionId, 'count' => $count]);
        return $count;
    }

    public function requestMonthlyWithdrawal(int $projectId, int $userId): array
    {
        $project = $this->projects->find($projectId);
        if (! $project) {
            throw new RuntimeException('Project not found.');
        }

        $symbol = $project['exchange_symbol'] ?? '';
        $shares = $symbol ? $this->calculateHolderShares($projectId, $symbol) : [];
        $ratio = $shares[$userId] ?? 0.0;
        if ($ratio <= 0) {
            throw new RuntimeException('User has no holdings for withdrawals.');
        }

        $eligible = round(($project['target_raise'] ?? 0) * $ratio * 0.05, 2);
        $feePercent = $this->determineWithdrawalFee($projectId, $userId);
        $feeAmount = round($eligible * ($feePercent / 100), 2);
        $netAmount = max($eligible - $feeAmount, 0);

        $record = [
            'project_id'      => $projectId,
            'user_id'         => $userId,
            'requested_at'    => Time::now()->toDateTimeString(),
            'eligible_amount' => $eligible,
            'fee_percent'     => $feePercent,
            'fee_amount'      => $feeAmount,
            'net_amount'      => $netAmount,
            'status'          => 'requested',
        ];

        $record['id'] = $this->withdrawals->insert($record, true);
        log_message('info', 'MyMIProjects::requestMonthlyWithdrawal queued withdrawal', $record);
        return $record;
    }

    public function processMonthlyWithdrawals(int $projectId): int
    {
        $requests = $this->withdrawals
            ->where('project_id', $projectId)
            ->where('status', 'requested')
            ->findAll();

        $count = 0;
        foreach ($requests as $request) {
            if ($request['net_amount'] <= 0) {
                continue;
            }
            $this->exchange->creditUserFiatOrStable((int) $request['user_id'], (float) $request['net_amount'], 'Monthly withdrawal');
            $this->withdrawals->update($request['id'], [
                'status'     => 'paid',
                'updated_at' => Time::now()->toDateTimeString(),
            ]);
            $count++;
        }
        log_message('info', 'MyMIProjects::processMonthlyWithdrawals processed requests', ['project_id' => $projectId, 'count' => $count]);
        return $count;
    }    public function projectsData(?int $userId = null): array
    {
        $projects = $this->projects->findAll();
        $list = array_map(function (array $project) {
            $committed = $this->totalCommitted($project['id']);
            $target = (float) ($project['target_raise'] ?? 0);
            return [
                'project'        => $project,
                'committed'      => $committed,
                'target'         => $target,
                'progress_ratio' => $target > 0 ? min($committed / $target, 1.0) : 0,
            ];
        }, $projects);

        $commitments = $userId ? $this->getUserCommitments($userId) : ['commitments' => [], 'totalCommitments' => 0];
        $distributions = $userId ? $this->getUserDistributions($userId) : [];

        return [
            'allProjects'       => $projects,
            'list'              => $list,
            'commitments'       => $commitments['commitments'] ?? [],
            'totalCommitments'  => $commitments['totalCommitments'] ?? 0,
            'distributions'     => $distributions,
            'totalDistributions'=> array_sum(array_map(static fn($row) => (float) ($row['amount'] ?? 0), is_array($distributions) ? $distributions : [])),
            'userBalance'       => 0,
            'investments'       => [],
        ];
    }

    private function createPayoutsForDistribution(int $distributionId): void
    {
        $distribution = $this->distributions->find($distributionId);
        if (! $distribution) {
            return;
        }
        $project = $this->projects->find($distribution['project_id']);
        if (! $project || empty($project['exchange_symbol'])) {
            return;
        }

        $shares = $this->calculateHolderShares($project['id'], $project['exchange_symbol']);
        foreach ($shares as $userId => $ratio) {
            $amount = round($distribution['net_distributable'] * $ratio, 2);
            $this->payouts->insert([
                'distribution_id' => $distributionId,
                'project_id'      => $project['id'],
                'user_id'         => $userId,
                'token_symbol'    => $project['exchange_symbol'],
                'share_ratio'     => $ratio,
                'amount'          => $amount,
                'status'          => 'pending',
                'created_at'      => Time::now()->toDateTimeString(),
            ]);
        }
    }

    private function detectTrigger(array $email): string
    {
        $haystack = strtoupper(($email['subject'] ?? '') . ' ' . ($email['body'] ?? ''));
        foreach ($this->config->emailTriggers as $trigger) {
            if (str_contains($haystack, strtoupper($trigger))) {
                return strtoupper($trigger);
            }
        }
        return 'PROPERTY';
    }

    private function matchUrl(string $text): ?string
    {
        if (preg_match('/https?:\/\/[^\s]+/i', $text, $matches)) {
            return $matches[0];
        }
        return null;
    }

    private function extractNormalizedLead(array $lead): array
    {
        $subject = $lead['raw_subject'] ?? '';
        $body = $lead['raw_body'] ?? '';
        $text = $subject . '\n' . $body;

        preg_match('/\$([\d,]+(?:\.\d{2})?)/', $text, $priceMatch);
        $price = isset($priceMatch[1]) ? (float) str_replace(',', '', $priceMatch[1]) : null;

        preg_match('/(\d+)\s*(?:bed|BR)/i', $text, $bedsMatch);
        preg_match('/(\d+(?:\.\d+)?)\s*(?:bath|BA)/i', $text, $bathsMatch);

        $addressLine = $this->extractAddress($text);

        return [
            'title'          => trim($subject) ?: trim($addressLine) ?: 'Property Lead',
            'address'        => $addressLine,
            'price'          => $price,
            'bedrooms'       => isset($bedsMatch[1]) ? (int) $bedsMatch[1] : null,
            'bathrooms'      => isset($bathsMatch[1]) ? (float) $bathsMatch[1] : null,
            'url'            => $lead['url'] ?? $this->matchUrl($text),
            'trigger'        => $lead['trigger'],
            'description'    => trim($body) ?: null,
        ];
    }

    private function extractAddress(string $text): ?string
    {
        foreach (preg_split('/\n+/', $text) as $line) {
            $line = trim($line);
            if ($line && preg_match('/\d+\s+.+\b(AVE|ST|RD|DR|LANE|BLVD|COURT|PL|WAY|TRAIL|CIRCLE|ROAD)\b/i', $line)) {
                return $line;
            }
        }
        return null;
    }

    private function slugify(string $title): string
    {
        $slug = strtolower(trim($title));
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
        $slug = trim($slug, '-');
        return $slug ?: 'project-' . bin2hex(random_bytes(3));
    }

    private function updateProjectStatus(int $projectId, string $status): bool
    {
        $this->projects->update($projectId, [
            'status'     => $status,
            'updated_at' => Time::now()->toDateTimeString(),
        ]);
        log_message('info', 'MyMIProjects::updateProjectStatus', ['project_id' => $projectId, 'status' => $status]);
        return true;
    }

    private function validateCommitmentBounds(array $project, float $amount): void
    {
        $min = (float) ($project['min_commit'] ?? $this->config->defaultMinCommit);
        $max = $project['max_commit'] !== null ? (float) $project['max_commit'] : null;
        if ($amount < $min) {
            throw new RuntimeException('Commitment amount below minimum.');
        }
        if ($max !== null && $amount > $max) {
            throw new RuntimeException('Commitment amount exceeds maximum.');
        }
    }

    private function determineWithdrawalFee(int $projectId, int $userId): float
    {
        $latestAllocation = $this->allocations
            ->where('project_id', $projectId)
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        if (! $latestAllocation) {
            return $this->config->defaultMonthlyFee;
        }

        $allocationDate = new DateTime($latestAllocation['created_at']);
        $now = new DateTime();
        $diff = $allocationDate->diff($now);
        $days = (int) $diff->format('%a');

        foreach ($this->config->monthlyWithdrawalFeeTiers as $tier) {
            if ($days <= $tier['days']) {
                return (float) $tier['fee'];
            }
        }

        return $this->config->postQuarterFee;
    }

    private function logThrowable(string $context, Throwable $e, array $extra = []): void
    {
        $extra['exception'] = $e->getMessage();
        $extra['trace'] = $e->getTraceAsString();
        $extra['memory'] = memory_get_usage(true);
        log_message('error', 'MyMIProjects::{context} failed: {message}', [
            'context' => $context,
            'message' => $e->getMessage(),
            'extra'   => $extra,
        ]);
    }

    public function getProjectFullDetails(int $projectId): ?array
    {
        return $this->projects->find($projectId);
    }

    public function getUserProjects(int $userId): array
    {
        return $this->projects->getUserProjects($userId);
    }

    public function getUserProjectHoldings(int $userId): array
    {
        return $this->allocations->byUser($userId)->findAll();
    }

    public function getUserCommitments(int $userId): array
    {
        $records = $this->commitments->byUser($userId)->findAll();
        $total = array_sum(array_map(static fn($row) => (float) $row['amount'], $records));
        return [
            'commitments' => $records,
            'totalCommitments' => $total,
        ];
    }

    public function getUserDistributions(int $userId): array
    {
        return $this->payouts->byUser($userId)->findAll();
    }

    public function commitToProject(int $userId, int $projectId, float $amount): bool
    {
        return $this->recordCommitment($projectId, $userId, $amount);
    }

    public function distributeRevenue(int $projectId): bool
    {
        log_message('info', 'MyMIProjects::distributeRevenue called (compatibility shim)', ['project_id' => $projectId]);
        return true;
    }

}