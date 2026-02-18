<?php

namespace App\Services;

use App\Libraries\MyMIDashboard;
use CodeIgniter\Cache\CacheInterface;

class DashboardService
{
    private const EXECUTIVE_SUMMARY_TTL_SECONDS = 120;

    protected MyMIDashboard $myMIDashboard;
    protected CacheInterface $cache;

    public function __construct(?MyMIDashboard $myMIDashboard = null, ?CacheInterface $cache = null)
    {
        $this->myMIDashboard = $myMIDashboard ?? new MyMIDashboard();
        $this->cache = $cache ?? cache();
    }

    public function getPromotionalBanners($userId)
    {
        $dashboardInfo = $this->myMIDashboard->dashboardInfo($userId);
        return $dashboardInfo['promotionalBanners'] ?? [];
    }

    public function getDashboardInfo($userId)
    {
        return $this->myMIDashboard->dashboardInfo($userId);
    }

    /**
     * Returns a user-scoped executive summary with short-lived caching.
     */
    public function getExecutiveDashboardSummary(int $userId): array
    {
        if ($userId <= 0) {
            return [];
        }

        $cacheKey = $this->executiveSummaryCacheKey($userId);
        $cached = $this->cache->get($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        $summary = $this->myMIDashboard->getExecutiveDashboardSummary($userId);
        $this->cache->save($cacheKey, $summary, self::EXECUTIVE_SUMMARY_TTL_SECONDS);

        return $summary;
    }

    /**
     * Invalidates executive summary cache for a single user context.
     */
    public function invalidateExecutiveDashboardSummary(int $userId): void
    {
        if ($userId > 0) {
            $this->cache->delete($this->executiveSummaryCacheKey($userId));
        }
    }

    private function executiveSummaryCacheKey(int $userId): string
    {
        return 'dashboard:executive-summary:user:' . $userId;
    }
}
