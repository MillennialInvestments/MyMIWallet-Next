<?php

declare(strict_types=1);

namespace App\Services\AI;

use Config\Services;

/**
 * AIChatQuotaService manages anonymous IP-based question limits
 * and member quotas for MyMI AI Copilot.
 */
class AIChatQuotaService
{
    public const DEFAULT_GUEST_DAILY_LIMIT = 5;

    protected int $guestDailyLimit;

    public function __construct(int $guestDailyLimit = self::DEFAULT_GUEST_DAILY_LIMIT)
    {
        $this->guestDailyLimit = $guestDailyLimit;
    }

    /**
     * Check if the caller has remaining quota to ask a question.
     *
     * @param int|null $userId Authenticated user ID or null for guest
     * @param string $ipAddress Client IP address
     * @return array{
     *     allowed: bool,
     *     quota_type: string,
     *     limit: int|string,
     *     count: int,
     *     quota_remaining: int|string,
     *     message?: string
     * }
     */
    public function checkQuota(?int $userId, string $ipAddress): array
    {
        if ($userId !== null && $userId > 0) {
            return [
                'allowed'         => true,
                'quota_type'      => 'member',
                'limit'           => 'unlimited',
                'count'           => 0,
                'quota_remaining' => 'unlimited',
            ];
        }

        $cache = Services::cache();
        $cacheKey = $this->buildCacheKey($ipAddress);
        $count = (int) ($cache->get($cacheKey) ?? 0);

        if ($count >= $this->guestDailyLimit) {
            return [
                'allowed'         => false,
                'quota_type'      => 'guest',
                'limit'           => $this->guestDailyLimit,
                'count'           => $count,
                'quota_remaining' => 0,
                'message'         => "You have reached your free daily limit of {$this->guestDailyLimit} questions. Sign in or create a free MyMI account for unlimited AI Copilot access!",
            ];
        }

        return [
            'allowed'         => true,
            'quota_type'      => 'guest',
            'limit'           => $this->guestDailyLimit,
            'count'           => $count,
            'quota_remaining' => max(0, $this->guestDailyLimit - $count),
        ];
    }

    /**
     * Increment the question count for an anonymous IP visitor.
     *
     * @param int|null $userId Authenticated user ID or null for guest
     * @param string $ipAddress Client IP address
     * @return int Current question count for this IP
     */
    public function incrementQuota(?int $userId, string $ipAddress): int
    {
        if ($userId !== null && $userId > 0) {
            return 0; // Members don't burn IP quota
        }

        $cache = Services::cache();
        $cacheKey = $this->buildCacheKey($ipAddress);
        $count = (int) ($cache->get($cacheKey) ?? 0);
        $newCount = $count + 1;

        // TTL until end of current UTC day or 86400 seconds
        $secondsUntilMidnight = max(3600, strtotime('tomorrow 00:00:00 UTC') - time());
        $cache->save($cacheKey, $newCount, $secondsUntilMidnight);

        return $newCount;
    }

    /**
     * Build cache key scoped by hashed IP and date.
     */
    protected function buildCacheKey(string $ipAddress): string
    {
        $cleanIp = trim($ipAddress);
        if ($cleanIp === '') {
            $cleanIp = '0.0.0.0';
        }

        return 'mymi_ai_chat_ip_' . md5($cleanIp) . '_' . date('Ymd');
    }
}
