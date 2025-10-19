<?php
namespace App\Services;

use App\Contracts\RevenueServiceInterface;
use App\DTO\InvoiceDTO;
use App\DTO\PayoutDTO;
use App\DTO\PlanDTO;
use App\DTO\SubscriptionDTO;
use App\Exceptions\RevenueException;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Database\BaseConnection;
use Psr\Log\LoggerInterface;

/**
 * Revenue event and distribution logic.
 */
class RevenueService implements RevenueServiceInterface
{
    public function __construct(
        protected BaseConnection $db,
        protected CacheInterface $cache,
        protected LoggerInterface $logger
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function definePlan(array $plan, ?string $idempotencyKey = null): PlanDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function listPlans(): array
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function subscribe(int $userId, string $planId, array $opts = [], ?string $idempotencyKey = null): SubscriptionDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function cancelSubscription(int $subscriptionId, int $actorId, ?string $idempotencyKey = null): bool
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function getSubscription(int $subscriptionId): SubscriptionDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function listSubscriptions(array $filters = [], int $page = 1, int $perPage = 50): array
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function recordUsage(int $userId, string $metric, float $qty, array $tags = [], ?string $idempotencyKey = null): bool
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function invoiceNow(int $userId, array $lines, array $opts = [], ?string $idempotencyKey = null): InvoiceDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function refund(int $invoiceId, float $amount, string $reason, int $actorId, ?string $idempotencyKey = null): InvoiceDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function configureSplit(string $context, int $contextId, array $splits, ?string $idempotencyKey = null): array
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function payout(int $walletIdOrUserId, string $chain, string $dest, float $amount, array $opts = [], ?string $idempotencyKey = null): PayoutDTO
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function ledgerEntries(array $filters = [], int $page = 1, int $perPage = 100): array
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws RevenueException
     */
    public function kpis(array $range): array
    {
        throw new RevenueException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * Basic helper to calculate payouts for owners.
     *
     * @param float $netAmount
     * @param array $ownerships array of ['user_id'=>int,'units'=>float]
     * @return array
     */
    public function calculateDistribution(float $netAmount, array $ownerships): array
    {
        $this->logger->debug('RevenueService::calculateDistribution start', ['netAmount' => $netAmount]);
        $totalUnits = array_sum(array_column($ownerships, 'units'));
        if ($totalUnits <= 0) {
            return [];
        }
        $results = [];
        $payoutSum = 0;
        foreach ($ownerships as $owner) {
            $ratio = $owner['units'] / $totalUnits;
            $payout = round($netAmount * $ratio, 2, PHP_ROUND_HALF_UP);
            $payoutSum += $payout;
            $results[] = [
                'user_id' => $owner['user_id'],
                'units' => $owner['units'],
                'share_ratio' => $ratio,
                'payout' => $payout,
            ];
        }
        $diff = round($netAmount - $payoutSum, 2);
        if ($diff != 0 && ! empty($results)) {
            $results[count($results) - 1]['payout'] = round($results[count($results) - 1]['payout'] + $diff, 2);
        }
        $this->logger->debug('RevenueService::calculateDistribution end', ['results' => $results]);
        return $results;
    }

    public function recordEvent(int $projectId, float $amount, string $currency, string $source, string $note = ''): int
    {
        return model('ProjectsModel')->revenueEventInsert([
            'project_id' => $projectId,
            'amount' => $amount,
            'currency' => $currency,
            'event_date' => date('Y-m-d'),
            'source' => $source,
            'notes' => $note,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function runDistribution(int $eventId): int
    {
        $pm = model('ProjectsModel');
        // load event & token scope (you may store token_id on event if per-token)
        // sum active ledger units for project/token
        // compute pro-rata & insert rows into bf_projects_revenue_distributions/_items
        // log chain tx where applicable
        // (Your holdings screens already show distributions — just reuse.)
        return 1;
    }
}
?>
