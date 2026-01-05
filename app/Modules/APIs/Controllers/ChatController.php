<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatToolRunModel;
use App\Models\OpsQueueModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use InvalidArgumentException;
use Myth\Auth\Authorization\GroupModel;
use Throwable;

class ChatController extends BaseController
{
    use ResponseTrait;

    protected ChatToolRunModel $toolRuns;

    public function __construct()
    {
        $this->toolRuns = new ChatToolRunModel();
    }

    public function me(): ResponseInterface
    {
        $userId = $this->getCuID();
        if (! $userId) {
            return $this->respond(['status' => 'error', 'message' => 'Unauthorized'], ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $roles = $this->resolveRoles($userId);
        $tier  = $this->resolveTier($userId);

        return $this->respond([
            'status' => 'success',
            'data'   => [
                'userId' => $userId,
                'roles'  => $roles,
                'tier'   => $tier,
            ],
        ]);
    }

    public function tool(): ResponseInterface
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $mode    = strtolower((string) ($payload['mode'] ?? 'user'));
        $tool    = $payload['tool'] ?? null;
        $context = is_array($payload['context'] ?? null) ? $payload['context'] : [];
        $message = (string) ($payload['message'] ?? '');
        $userId  = $this->getCuID();

        if (! $userId) {
            return $this->respond(['status' => 'error', 'message' => 'Unauthorized'], ResponseInterface::HTTP_UNAUTHORIZED);
        }

        if (! $tool) {
            return $this->respond(['status' => 'error', 'message' => 'tool is required'], ResponseInterface::HTTP_BAD_REQUEST);
        }

        $roles = $this->resolveRoles($userId);
        $tier  = $this->resolveTier($userId);

        if ($mode === 'management' && ! $this->hasManagementRole($roles)) {
            $this->logToolRun($userId, $mode, $tool, $payload, ['error' => 'insufficient_role'], 'error');
            return $this->respond(['status' => 'error', 'message' => 'Forbidden'], ResponseInterface::HTTP_FORBIDDEN);
        }

        if ($this->isPremiumTool($tool) && ! $this->hasPremiumTier($tier)) {
            $this->logToolRun($userId, $mode, $tool, $payload, ['error' => 'tier_required'], 'error');
            return $this->respond(['status' => 'error', 'message' => 'Premium membership required'], ResponseInterface::HTTP_FORBIDDEN);
        }

        $result = null;
        $status = 'success';

        try {
            $result = $this->dispatchTool($tool, $userId, $context, $message, $mode);
        } catch (InvalidArgumentException $e) {
            $status = 'error';
            $result = ['error' => $e->getMessage()];
            $this->logToolRun($userId, $mode, $tool, $payload, $result, $status);
            return $this->respond(['status' => 'error', 'data' => $result], ResponseInterface::HTTP_BAD_REQUEST);
        } catch (Throwable $e) {
            $status = 'error';
            $result = ['error' => 'Tool execution failed', 'detail' => $e->getMessage()];
            log_message('error', 'ChatController tool failure: {message}', ['message' => $e->getMessage()]);
        }

        $this->logToolRun($userId, $mode, $tool, $payload, $result, $status);

        if ($status === 'error') {
            return $this->respond(['status' => 'error', 'data' => $result], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->respond([
            'status' => 'success',
            'data'   => $result,
            'meta'   => [
                'mode' => $mode,
                'tool' => $tool,
            ],
        ]);
    }

    protected function dispatchTool(string $tool, int $userId, array $context, string $message, string $mode): array
    {
        switch ($tool) {
            case 'budget_snapshot':
                return $this->buildBudgetSnapshot($userId);
            case 'portfolio_overview':
                return $this->buildPortfolioOverview($userId);
            case 'trade_alerts':
                return $this->buildTradeAlerts($userId);
            case 'market_question':
                return $this->buildMarketQuestion($context, $message);
            case 'ops_status':
                return $this->buildOpsStatus();
            case 'latest_errors':
                return $this->buildLatestErrors();
            case 'run_cron':
                return $this->runCronPreview();
            default:
                throw new \InvalidArgumentException('Unknown tool requested');
        }
    }

    protected function buildBudgetSnapshot(int $userId): array
    {
        $db      = db_connect();
        $summary = [
            'accounts' => 0,
            'cash'     => 0.0,
            'invested' => 0.0,
            'notes'    => 'No wallet data available',
        ];

        if ($db->tableExists('bf_users_wallets')) {
            $row = $db->table('bf_users_wallets')
                ->select('COUNT(*) as accounts, SUM(balance) as balance')
                ->where('user_id', $userId)
                ->get()
                ->getRowArray();

            $summary['accounts'] = (int) ($row['accounts'] ?? 0);
            $summary['cash']     = (float) ($row['balance'] ?? 0);
            $summary['notes']    = 'Pulled from bf_users_wallets';
        }

        if ($db->tableExists('bf_investment_trades')) {
            $row = $db->table('bf_investment_trades')
                ->select('SUM(purchase_price) as invested')
                ->where('user_id', $userId)
                ->get()
                ->getRowArray();
            $summary['invested'] = (float) ($row['invested'] ?? 0);
        }

        return [
            'user_id'      => $userId,
            'generated_at' => date('c'),
            'totals'       => $summary,
        ];
    }

    protected function buildPortfolioOverview(int $userId): array
    {
        $db = db_connect();
        $positions = [];

        if ($db->tableExists('bf_investment_trades')) {
            $positions = $db->table('bf_investment_trades')
                ->select('ticker, SUM(quantity) as shares, AVG(purchase_price) as avg_cost')
                ->where('user_id', $userId)
                ->groupBy('ticker')
                ->orderBy('ticker', 'ASC')
                ->limit(20)
                ->get()
                ->getResultArray();
        }

        return [
            'user_id'      => $userId,
            'positions'    => $positions,
            'as_of'        => date('c'),
            'notes'        => $positions === [] ? 'No portfolio data available' : 'Aggregated from bf_investment_trades',
        ];
    }

    protected function buildTradeAlerts(int $userId): array
    {
        $db = db_connect();
        $alerts = [];

        if ($db->tableExists('bf_investment_trade_alerts')) {
            $alerts = $db->table('bf_investment_trade_alerts')
                ->select('ticker, direction, entry_price, created_on')
                ->orderBy('created_on', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray();
        }

        return [
            'user_id'      => $userId,
            'alerts'       => $alerts,
            'as_of'        => date('c'),
            'notes'        => $alerts === [] ? 'No recent trade alerts available' : 'Latest published trade alerts',
        ];
    }

    protected function buildMarketQuestion(array $context, string $message): array
    {
        $ticker = $context['ticker'] ?? $context['symbol'] ?? null;
        return [
            'prompt'       => trim($message) ?: 'Market question',
            'ticker'       => $ticker,
            'range'        => $context['range'] ?? 'today',
            'status'       => 'queued',
            'generated_at' => date('c'),
        ];
    }

    protected function buildOpsStatus(): array
    {
        $queue = new OpsQueueModel();
        return [
            'queue_counts' => $queue->statusCounts(),
            'checked_at'   => date('c'),
        ];
    }

    protected function buildLatestErrors(): array
    {
        $db     = db_connect();
        $errors = [];

        if ($db->tableExists('bf_error_logs')) {
            $errors = $db->table('bf_error_logs')
                ->select('level, message, created_at')
                ->orderBy('created_at', 'DESC')
                ->limit(10)
                ->get()
                ->getResultArray();
        }

        return [
            'errors'     => $errors,
            'generated'  => date('c'),
            'notes'      => $errors === [] ? 'No error logs available' : 'Latest bf_error_logs rows',
        ];
    }

    protected function runCronPreview(): array
    {
        return [
            'status'       => 'queued',
            'message'      => 'Cron run request acknowledged. Use ops dashboards to monitor execution.',
            'requested_at' => date('c'),
        ];
    }

    /**
     * @return list<string>
     */
    protected function resolveRoles(int $userId): array
    {
        try {
            $groups = model(GroupModel::class)->getGroupsForUser($userId);
            return array_values(array_map(static fn($group) => strtolower($group['name'] ?? ''), $groups));
        } catch (Throwable $e) {
            log_message('error', 'ChatController role lookup failed: {err}', ['err' => $e->getMessage()]);
            return [];
        }
    }

    protected function resolveTier(int $userId): string
    {
        try {
            $db = db_connect();
            if ($db->tableExists('bf_users_memberships')) {
                $row = $db->table('bf_users_memberships')
                    ->where('user_id', $userId)
                    ->orderBy('expires_on', 'DESC')
                    ->orderBy('created_at', 'DESC')
                    ->get()
                    ->getRowArray();

                foreach (['tier', 'membership_tier', 'feature_level', 'feature_name', 'plan'] as $key) {
                    if (! empty($row[$key])) {
                        return strtoupper((string) $row[$key]);
                    }
                }
            }
        } catch (Throwable $e) {
            log_message('error', 'ChatController tier lookup failed: {err}', ['err' => $e->getMessage()]);
        }

        return 'FREE';
    }

    /**
     * @param list<string> $roles
     */
    protected function hasManagementRole(array $roles): bool
    {
        $normalized = array_map('strtolower', $roles);
        return array_intersect($normalized, ['admin', 'ops', 'manager']) !== [];
    }

    protected function isPremiumTool(string $tool): bool
    {
        return in_array($tool, ['trade_alerts'], true);
    }

    protected function hasPremiumTier(string $tier): bool
    {
        return in_array(strtoupper($tier), ['BASIC', 'PREMIUM', 'GOLD'], true);
    }

    protected function logToolRun(int $userId, string $mode, string $tool, array $requestPayload, $responsePayload, string $status): void
    {
        try {
            $this->toolRuns->insert([
                'user_id'       => $userId,
                'mode'          => $mode,
                'tool'          => $tool,
                'request_json'  => json_encode($requestPayload, JSON_UNESCAPED_SLASHES),
                'response_json' => json_encode($responsePayload, JSON_UNESCAPED_SLASHES),
                'status'        => $status,
            ]);
        } catch (Throwable $e) {
            log_message('error', 'ChatController audit insert failed: {err}', ['err' => $e->getMessage()]);
        }
    }
}
