<?php namespace App\Libraries;

use Config\MyMI as MyMIConfig;
use Config\Projects as ProjectsConfig;
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
        private ProjectsConfig $config = new ProjectsConfig(),
        private MyMIConfig $myMIConfig = new MyMIConfig()
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

    // AFTER (wrap in try/catch + consolidated logging)
    public function totalCommitted(int $projectId): float
    {
        try {
            $row = $this->commitments
                ->selectSum('amount')
                ->where('project_id', $projectId)
                ->first();

            if (!is_array($row) || !array_key_exists('amount', $row)) {
                log_message('warning', 'MyMIProjects::totalCommitted project={id} returned empty row or missing amount', [
                    'id' => $projectId,
                ]);
                return 0.0;
            }

            return (float) $row['amount'];
        } catch (\Throwable $e) {
            log_message('error', 'MyMIProjects::totalCommitted failed for project {id}: {msg}', [
                'id'  => $projectId,
                'msg' => $e->getMessage(),
            ]);
            return 0.0; // fail soft so dashboard still loads
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
            ->findAll(20);
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
            ->findAll(20);

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
            ->findAll(20);

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

        $payouts = $this->payouts->where('distribution_id', $distributionId)->where('status', 'pending')->findAll(20);
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
            ->findAll(20);

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
        $projects = $this->projects->getAllProjects();
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
        return $this->allocations->byUser($userId)->findAll(20);
    }

    public function getUserCommitments(int $userId): array
    {
        $records = $this->commitments->byUser($userId)->findAll(20);
        $total = array_sum(array_map(static fn($row) => (float) $row['amount'], $records));
        return [
            'commitments' => $records,
            'totalCommitments' => $total,
        ];
    }

    public function getUserDistributions(int $userId): array
    {
        return $this->payouts->byUser($userId)->findAll(20);
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

    public function getPrimaryFundProject(): ?array
    {
        return $this->projects->getPrimarySystemProject();
    }

    public function getFundDashboardData($projectId, $cuID): array
    {
        $project = $projectId ? $this->projects->find((int) $projectId) : $this->getPrimaryFundProject();
        if (! $project) {
            return [];
        }

        $pid = (int) $project['id'];
        return [
            'project' => $project,
            'fundSummary' => $this->projects->getProjectFundSummary($pid),
            'myPosition' => $this->getUserFundPosition($pid, (int) $cuID),
            'compliance' => $this->projectsModel->getFundInvestorProfile($cuID),
            'navHistory' => $this->projects->getProjectNAVHistory($pid, 30),
            'recentTransactions' => $this->projects->getProjectFundTransactions($pid, 25),
            'distributions' => $this->projects->getProjectDistributionsDetailed($pid),
            'capitalFlows' => $this->projects->getFundCapitalFlows($pid, 20),
            'auditTrail' => $this->projects->getFundAuditTrail($pid, 20),
            'exchangeStatus' => [
                'exchange_asset_id' => (int) ($project['exchange_asset_id'] ?? 0),
                'linked_token_id' => (int) ($project['linked_token_id'] ?? 0),
                'exchange_enabled' => (int) ($project['exchange_enabled'] ?? 0),
                'secondary_trading_enabled' => (int) ($project['secondary_trading_enabled'] ?? 0),
                'market_price' => null,
                'premium_to_nav' => null,
            ],
            'holders' => $this->projects->getProjectFundHolders($pid),
        ];
    }

    public function issueUnitsAtNav($projectId, $userId, $investmentAmount, ?string $idempotencyKey = null): array
    {
        $this->assertFundModuleEnabled();
        $db = $this->projects->db;
        $projectId = (int) $projectId;
        $userId = (int) $userId;

        $amount = round((float) $investmentAmount, 2);
        if ($amount <= 0) {
            throw new RuntimeException('Investment amount must be greater than zero.');
        }
        if ($amount < (float) $this->myMIConfig->fund_minimum_investment) {
            throw new RuntimeException('Investment amount is below minimum allowed.');
        }

        if ($idempotencyKey) {
            $existingTx = $this->projects->findFundTransactionByIdempotencyKey($idempotencyKey);
            if ($existingTx) {
                return [
                    'units_issued' => (float) ($existingTx['units'] ?? 0),
                    'nav' => (float) ($existingTx['nav_price'] ?? 0),
                    'transaction_id' => (int) $existingTx['id'],
                    'idempotent_replay' => true,
                ];
            }
        }

        if (! $this->projects->isEligibleFundInvestor((int) $projectId, (int) $userId)) {
            throw new RuntimeException('Investor profile is not yet eligible for fund unit purchases.');
        }

        $db->transStart();
        $lockedProject = $db->query('SELECT * FROM bf_projects WHERE id = ? FOR UPDATE', [$projectId])->getRowArray();
        if (! $lockedProject) {
            $db->transComplete();
            throw new RuntimeException('Fund project not found.');
        }
        if ((int) ($lockedProject['nav_update_in_progress'] ?? 0) === 1) {
            $db->transComplete();
            throw new RuntimeException('Issuance paused while NAV update is in progress.');
        }
        if ((int) ($lockedProject['primary_issuance_enabled'] ?? 1) !== 1) {
            $db->transComplete();
            throw new RuntimeException('Primary issuance is currently paused.');
        }

        $nav = (float) ($lockedProject['nav_per_unit'] ?? 0);
        if ($nav <= 0) {
            $db->transComplete();
            throw new RuntimeException('Invalid NAV for issuance.');
        }

        $units = $this->calculateIssuedUnits($amount, $nav);
        if ($units <= 0) {
            $db->transComplete();
            throw new RuntimeException('Calculated units must be greater than zero.');
        }

        $holder = $this->projects->getFundHolderByUser($projectId, $userId);
        if ($holder) {
            $newUnits = (float) $holder['units_owned'] + $units;
            $newCapital = (float) $holder['capital_contributed'] + $amount;
            $avg = $newUnits > 0 ? round($newCapital / $newUnits, 8) : $nav;
            $this->projects->updateFundHolder((int) $holder['id'], [
                'units_owned' => $newUnits,
                'capital_contributed' => $newCapital,
                'average_nav' => $avg,
            ]);
        } else {
            $this->projects->createFundHolder([
                'project_id' => $projectId,
                'user_id' => $userId,
                'units_owned' => $units,
                'capital_contributed' => $amount,
                'average_nav' => $nav,
                'holder_status' => 'active',
            ]);
        }

        $this->projects->update($projectId, [
            'total_units_issued' => round((float) ($lockedProject['total_units_issued'] ?? 0) + $units, 8),
            'current_amount' => round((float) ($lockedProject['current_amount'] ?? 0) + $amount, 2),
            'updated_at' => Time::now()->toDateTimeString(),
        ]);

        $txId = $this->projects->logFundTransaction([
            'project_id' => $projectId,
            'user_id' => $userId,
            'transaction_type' => 'primary_issuance',
            'reference_type' => 'fund_unit_purchase',
            'units' => $units,
            'nav_price' => $nav,
            'gross_amount' => $amount,
            'fee_amount' => 0,
            'net_amount' => $amount,
            'idempotency_key' => $idempotencyKey,
            'notes' => 'Primary issuance at current NAV',
        ]);

        $this->projects->recordCapitalFlow([
            'project_id' => $projectId,
            'flow_type' => 'investor_subscription',
            'amount' => $amount,
            'units_delta' => $units,
            'reference' => 'tx:' . $txId,
            'created_by' => $userId,
            'notes' => 'Primary NAV issuance capital inflow',
        ]);

        if ($this->myMIConfig->enable_project_exchange_bridge) {
            $this->mirrorIssuanceToBridgeLedgers($projectId, $userId, $units, $amount, $txId);
        }

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new RuntimeException('Transaction failed during unit issuance.');
        }

        $this->projects->logFundAuditEvent($projectId, $userId, 'fund_unit_purchase', [
            'event' => 'fund_unit_purchase',
            'project_id' => $projectId,
            'user_id' => $userId,
            'amount' => $amount,
            'units' => $units,
            'transaction_id' => $txId,
        ]);

        log_message('info', json_encode([
            'event' => 'fund_unit_purchase',
            'project_id' => $projectId,
            'user_id' => $userId,
            'nav' => $nav,
            'units' => $units,
            'amount' => $amount,
            'transaction_id' => $txId,
        ]));

        return ['units_issued' => $units, 'nav' => $nav, 'transaction_id' => $txId];
    }

    public function recalculateProjectNAV($projectId, $totalFundValue = null): float
    {
        $this->assertFundModuleEnabled();
        $db = $this->projects->db;
        $projectId = (int) $projectId;

        $db->transStart();
        $project = $db->query('SELECT * FROM bf_projects WHERE id = ? FOR UPDATE', [$projectId])->getRowArray();
        if (! $project) {
            $db->transComplete();
            throw new RuntimeException('Fund project not found.');
        }

        if ((int) ($project['nav_update_in_progress'] ?? 0) === 1) {
            $db->transComplete();
            throw new RuntimeException('NAV update already in progress.');
        }

        $db->table('bf_projects')->where('id', $projectId)->update(['nav_update_in_progress' => 1]);

        $value = $totalFundValue !== null ? (float) $totalFundValue : (float) ($project['total_fund_value'] ?? 0);
        if ($value < 0) {
            $db->table('bf_projects')->where('id', $projectId)->update(['nav_update_in_progress' => 0]);
            $db->transComplete();
            throw new RuntimeException('Fund value cannot be negative.');
        }

        $units = (float) ($project['total_units_issued'] ?? 0);
        if ($units <= 0 && $value > 0) {
            $db->table('bf_projects')->where('id', $projectId)->update(['nav_update_in_progress' => 0]);
            $db->transComplete();
            throw new RuntimeException('Fund integrity guard: cannot set positive value with zero units issued.');
        }
        $nav = $this->calculateNavValue($value, $units);
        if ($nav <= 0) {
            $db->table('bf_projects')->where('id', $projectId)->update(['nav_update_in_progress' => 0]);
            $db->transComplete();
            throw new RuntimeException('NAV must be greater than zero.');
        }

        $this->projects->update((int) $projectId, [
            'total_fund_value' => round($value, 2),
            'nav_per_unit' => round($nav, 8),
            'nav_update_in_progress' => 0,
            'updated_at' => Time::now()->toDateTimeString(),
        ]);

        $this->projects->recordNAVSnapshot([
            'project_id' => (int) $projectId,
            'nav_per_unit' => round($nav, 8),
            'total_fund_value' => round($value, 2),
            'total_units_issued' => round($units, 8),
            'source_note' => 'Manual NAV recalculation',
        ]);

        $this->projects->recordCapitalFlow([
            'project_id' => (int) $projectId,
            'flow_type' => 'manual_nav_update',
            'amount' => round($value, 2),
            'units_delta' => 0,
            'reference' => 'nav_snapshot',
            'notes' => 'Manual fund value update used for NAV refresh',
        ]);

        if ($this->myMIConfig->enable_live_nav_sync && $this->projects->db->tableExists('bf_mdit_nav_snapshots')) {
            $payload = $this->filterTableColumns('bf_mdit_nav_snapshots', [
                'project_id' => (int) $projectId,
                'nav_per_unit' => round($nav, 8),
                'total_fund_value' => round($value, 2),
                'total_units_issued' => round($units, 8),
                'created_at' => Time::now()->toDateTimeString(),
            ]);
            if (! empty($payload)) {
                $this->projects->db->table('bf_mdit_nav_snapshots')->insert($payload);
            }
        }

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new RuntimeException('Transaction failed during NAV update.');
        }

        $this->projects->logFundAuditEvent((int) $projectId, null, 'nav_recalculation', [
            'nav' => round($nav, 8),
            'total_fund_value' => round($value, 2),
            'total_units_issued' => round($units, 8),
        ]);

        log_message('info', 'MyMIProjects::recalculateProjectNAV', ['project_id' => (int) $projectId, 'nav' => $nav, 'total_fund_value' => $value]);

        return round($nav, 8);
    }

    public function recordFundDistribution($projectId, $totalAmount, $note = null): int
    {
        $this->assertFundModuleEnabled();
        $db = $this->projects->db;
        $project = $this->projects->find((int) $projectId);
        if (! $project) {
            throw new RuntimeException('Fund project not found.');
        }

        $units = (float) ($project['total_units_issued'] ?? 0);
        $amount = round((float) $totalAmount, 2);
        if ($amount <= 0) {
            throw new RuntimeException('Distribution amount must be greater than zero.');
        }
        if ($amount > (float) ($project['total_fund_value'] ?? 0)) {
            throw new RuntimeException('Distribution cannot exceed current fund value.');
        }
        $amountPerUnit = $this->calculateDistributionPerUnit($amount, $units);

        $db->transStart();
        $id = $this->projects->createDistribution([
            'project_id' => (int) $projectId,
            'distribution_type' => 'profit_distribution',
            'total_amount' => $amount,
            'amount_per_unit' => $amountPerUnit,
            'status' => 'pending',
            'notes' => $note,
        ]);
        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new RuntimeException('Transaction failed during distribution recording.');
        }

        $this->projects->logFundAuditEvent((int) $projectId, null, 'distribution_recorded', [
            'distribution_id' => $id,
            'amount' => $amount,
            'amount_per_unit' => $amountPerUnit,
        ]);

        log_message('info', 'MyMIProjects::recordFundDistribution', ['project_id' => (int) $projectId, 'distribution_id' => $id, 'amount' => $amount, 'amount_per_unit' => $amountPerUnit]);
        return $id;
    }

    public function getUserFundPosition($projectId, $userId): array
    {
        $project = $this->projects->find((int) $projectId) ?? [];
        $holder = $this->projects->getFundHolderByUser((int) $projectId, (int) $userId) ?? [];

        $units = (float) ($holder['units_owned'] ?? 0);
        $nav = (float) ($project['nav_per_unit'] ?? 1);
        return [
            'units_owned' => $units,
            'average_nav' => (float) ($holder['average_nav'] ?? 0),
            'capital_contributed' => (float) ($holder['capital_contributed'] ?? 0),
            'implied_position_value' => round($units * $nav, 2),
            'holder_status' => $holder['holder_status'] ?? 'inactive',
        ];
    }


    public function updateInvestorCompliance(int $projectId, int $userId, array $profileData, ?int $reviewedBy = null): bool
    {
        $payload = [
            'kyc_status' => $profileData['kyc_status'] ?? 'pending',
            'investor_eligibility' => $profileData['investor_eligibility'] ?? 'pending',
            'agreement_signed' => (int) ($profileData['agreement_signed'] ?? 0),
            'agreement_signed_at' => ! empty($profileData['agreement_signed']) ? Time::now()->toDateTimeString() : null,
            'reviewed_by' => $reviewedBy,
            'notes' => $profileData['notes'] ?? null,
        ];

        $ok = $this->projects->upsertFundInvestorProfile($projectId, $userId, $payload);

        $this->projects->logFundAuditEvent($projectId, $reviewedBy, 'investor_compliance_updated', [
            'user_id' => $userId,
            'payload' => $payload,
        ]);

        return $ok;
    }

    public function recordManualCapitalFlow(int $projectId, string $flowType, float $amount, float $unitsDelta = 0, ?string $reference = null, ?string $notes = null, ?int $createdBy = null): int
    {
        $this->assertFundModuleEnabled();
        $id = $this->projects->recordCapitalFlow([
            'project_id' => $projectId,
            'flow_type' => $flowType,
            'amount' => round($amount, 2),
            'units_delta' => round($unitsDelta, 8),
            'reference' => $reference,
            'notes' => $notes,
            'created_by' => $createdBy,
        ]);

        $this->projects->logFundAuditEvent($projectId, $createdBy, 'capital_flow_recorded', [
            'capital_flow_id' => $id,
            'flow_type' => $flowType,
            'amount' => round($amount, 2),
            'units_delta' => round($unitsDelta, 8),
            'reference' => $reference,
        ]);

        return $id;
    }

    public function attachTokenToProject(int $projectId, int $tokenId): bool
    {
        return (bool) $this->projects->update($projectId, [
            'linked_token_id' => $tokenId,
            'exchange_asset_id' => $tokenId,
            'updated_at' => Time::now()->toDateTimeString(),
        ]);
    }

    public function registerProjectAsExchangeAsset(int $projectId): array
    {
        $this->assertFundModuleEnabled();
        $db = $this->projects->db;
        $db->transStart();
        $project = $this->projects->find($projectId);
        if (! $project) {
            $db->transComplete();
            throw new RuntimeException('Project not found for exchange registration.');
        }
        if (($project['project_type'] ?? '') !== 'private_fund') {
            $db->transComplete();
            throw new RuntimeException('Only private_fund projects may be exchange registered.');
        }

        $symbol = 'MYMIUSO';
        $assetPayload = $this->filterTableColumns('bf_exchanges_assets', [
            'symbol' => $symbol,
            'coin_name' => $project['name'] ?? $project['title'] ?? 'MyMI US Oil Fund',
            'asset_type' => 'project_fund_unit',
            'status' => 'draft',
            'is_tradable' => 0,
            'tradeable' => 0,
            'market' => 'MYMI',
            'market_pair' => $symbol . '/USD',
            'coin_value' => (float) ($project['nav_per_unit'] ?? 1),
            'created_on' => date('Y-m-d H:i:s'),
        ]);

        if (empty($assetPayload)) {
            $db->transComplete();
            throw new RuntimeException('Exchange asset schema unavailable for registration.');
        }

        $assetId = $this->projects->upsertExchangeAsset($assetPayload);
        $this->attachTokenToProject($projectId, $assetId);
        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new RuntimeException('Transaction failed during exchange asset registration.');
        }

        $this->projects->logFundAuditEvent($projectId, null, 'exchange_asset_linked', [
            'asset_id' => $assetId,
            'symbol' => $symbol,
            'project_id' => $projectId,
        ]);

        return ['asset_id' => $assetId, 'symbol' => $symbol];
    }

    public function reconcileProjectFundWithExchange(int $projectId): array
    {
        $project = $this->projects->find($projectId) ?? [];
        $assetId = (int) ($project['exchange_asset_id'] ?? 0);
        $holders = $this->projects->getProjectFundHolders($projectId);
        $holderUnits = array_reduce($holders, static fn($carry, $row) => $carry + (float) ($row['units_owned'] ?? 0), 0.0);
        $projectUnits = (float) ($project['total_units_issued'] ?? 0);

        $exchangeUnits = null;
        if ($assetId > 0 && $this->projects->db->tableExists('bf_exchanges_assets_ledger')) {
            $row = $this->projects->db->table('bf_exchanges_assets_ledger')
                ->select('COALESCE(SUM(amount),0) as units_total')
                ->where('asset_id', $assetId)
                ->get()->getRowArray();
            $exchangeUnits = (float) ($row['units_total'] ?? 0);
        }

        $ledger = $this->assertLedgerConsistency($projectId);

        return [
            'project_id' => $projectId,
            'asset_linked' => $assetId > 0,
            'asset_id' => $assetId,
            'project_units' => round($projectUnits, 8),
            'holder_units' => round($holderUnits, 8),
            'exchange_units' => $exchangeUnits !== null ? round($exchangeUnits, 8) : null,
            'holder_vs_project_match' => abs($holderUnits - $projectUnits) < 0.00000001,
            'exchange_vs_project_match' => $exchangeUnits === null ? null : abs($exchangeUnits - $projectUnits) < 0.00000001,
            'no_negative_balances' => $holderUnits >= 0 && $projectUnits >= 0 && ($exchangeUnits === null || $exchangeUnits >= 0),
            'ledger_consistency' => $ledger,
        ];
    }

    public function assertLedgerConsistency(int $projectId): array
    {
        $project = $this->projects->find($projectId) ?? [];
        $assetId = (int) ($project['exchange_asset_id'] ?? 0);
        $projectUnits = (float) ($project['total_units_issued'] ?? 0);

        $holders = $this->projects->getProjectFundHolders($projectId);
        $holderUnits = array_reduce($holders, static fn($carry, $row) => $carry + (float) ($row['units_owned'] ?? 0), 0.0);

        $tokenLedgerUnits = null;
        if ($this->projects->db->tableExists('bf_mdit_token_ledger')) {
            $row = $this->projects->db->table('bf_mdit_token_ledger')
                ->select('COALESCE(SUM(units),0) as units_total')
                ->where('project_id', $projectId)
                ->get()->getRowArray();
            $tokenLedgerUnits = (float) ($row['units_total'] ?? 0);
        }

        $exchangeLedgerUnits = null;
        if ($assetId > 0 && $this->projects->db->tableExists('bf_exchanges_assets_ledger')) {
            $row = $this->projects->db->table('bf_exchanges_assets_ledger')
                ->select('COALESCE(SUM(amount),0) as units_total')
                ->where('asset_id', $assetId)
                ->get()->getRowArray();
            $exchangeLedgerUnits = (float) ($row['units_total'] ?? 0);
        }

        return [
            'project_units' => round($projectUnits, 8),
            'holder_units' => round($holderUnits, 8),
            'token_ledger_units' => $tokenLedgerUnits !== null ? round($tokenLedgerUnits, 8) : null,
            'exchange_ledger_units' => $exchangeLedgerUnits !== null ? round($exchangeLedgerUnits, 8) : null,
            'holders_match_project' => abs($holderUnits - $projectUnits) < 0.00000001,
            'token_ledger_match_project' => $tokenLedgerUnits === null ? null : abs($tokenLedgerUnits - $projectUnits) < 0.00000001,
            'exchange_ledger_match_project' => $exchangeLedgerUnits === null ? null : abs($exchangeLedgerUnits - $projectUnits) < 0.00000001,
        ];
    }

    public function calculateNavValue(float $totalFundValue, float $totalUnits): float
    {
        return $totalUnits > 0 ? round($totalFundValue / $totalUnits, 8) : 1.0;
    }

    public function calculateIssuedUnits(float $investmentAmount, float $navPerUnit): float
    {
        if ($navPerUnit <= 0) {
            throw new RuntimeException('NAV must be greater than zero.');
        }

        return round($investmentAmount / $navPerUnit, 8);
    }

    public function calculateDistributionPerUnit(float $distributionAmount, float $totalUnits): float
    {
        return $totalUnits > 0 ? round($distributionAmount / $totalUnits, 8) : 0.0;
    }

    public function validateFundIntegrity(int $projectId): array
    {
        $project = $this->projects->find($projectId) ?? [];
        $holders = $this->projects->getProjectFundHolders($projectId);
        $sumHolderUnits = array_reduce($holders, static fn($carry, $row) => $carry + (float) ($row['units_owned'] ?? 0), 0.0);
        $totalUnits = (float) ($project['total_units_issued'] ?? 0);
        $fundValue = (float) ($project['total_fund_value'] ?? 0);
        $nav = (float) ($project['nav_per_unit'] ?? 0);
        $expectedNav = $totalUnits > 0 ? ($fundValue / $totalUnits) : 1.0;

        return [
            'project_id' => $projectId,
            'sum_holder_units' => round($sumHolderUnits, 8),
            'total_units_issued' => round($totalUnits, 8),
            'units_match' => abs($sumHolderUnits - $totalUnits) < 0.00000001,
            'fund_value' => round($fundValue, 2),
            'nav_per_unit' => round($nav, 8),
            'expected_nav' => round($expectedNav, 8),
            'nav_match' => abs($nav - $expectedNav) < 0.00000001,
            'has_negative_balance' => $fundValue < 0 || $totalUnits < 0 || $sumHolderUnits < 0,
        ];
    }

    private function assertFundModuleEnabled(): void
    {
        if (! $this->myMIConfig->enable_fund_module || ! $this->myMIConfig->enable_project_fund_module) {
            throw new RuntimeException('Fund module is currently disabled.');
        }
    }

    private function mirrorIssuanceToBridgeLedgers(int $projectId, int $userId, float $units, float $amount, int $txId): void
    {
        $project = $this->projects->find($projectId) ?? [];
        $assetId = (int) ($project['exchange_asset_id'] ?? 0);

        if ($this->projects->db->tableExists('bf_mdit_token_ledger')) {
            $mditPayload = $this->filterTableColumns('bf_mdit_token_ledger', [
                'project_id' => $projectId,
                'user_id' => $userId,
                'token_id' => $assetId ?: null,
                'event_type' => 'primary_issuance',
                'units' => $units,
                'amount' => $amount,
                'reference_id' => $txId,
                'created_at' => Time::now()->toDateTimeString(),
            ]);
            if (! empty($mditPayload)) {
                $this->projects->db->table('bf_mdit_token_ledger')->insert($mditPayload);
            }
        }

        if ($assetId > 0 && $this->projects->db->tableExists('bf_exchanges_assets_ledger')) {
            $exchangePayload = $this->filterTableColumns('bf_exchanges_assets_ledger', [
                'asset_id' => $assetId,
                'user_id' => $userId,
                'transaction_type' => 'primary_issuance',
                'amount' => $units,
                'reference_id' => $txId,
                'status' => 1,
                'created_on' => date('Y-m-d H:i:s'),
            ]);
            if (! empty($exchangePayload)) {
                $this->projects->db->table('bf_exchanges_assets_ledger')->insert($exchangePayload);
            }
        }
    }

    private function filterTableColumns(string $table, array $payload): array
    {
        if (! $this->projects->db->tableExists($table)) {
            return [];
        }
        $columns = $this->projects->db->getFieldNames($table);
        return array_intersect_key($payload, array_flip($columns));
    }


}
