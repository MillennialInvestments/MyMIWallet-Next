<?php

namespace App\Libraries;

use CodeIgniter\Cache\CacheInterface;

/**
 * Utility responsible for clearing all cache layers that may hold
 * stale data after a CRUD mutation.
 *
 * Controllers should resolve this via service('crudCacheInvalidator')
 * and call clear() with a list of tags describing the affected domain
 * (e.g. ['budget', 'user:123']).
 */
class CrudCacheInvalidator
{
    protected CacheInterface $cache;

    public function __construct(?CacheInterface $cache = null)
    {
        $this->cache = $cache ?? cache();
    }

    /**
     * Generic entry-point used by controllers after CRUD operations.
     *
     * @param array<int,string> $tags e.g. ['budget', 'user:123', 'wallets']
     */
    public function clear(array $tags): void
    {
        if ($tags === []) {
            return;
        }

        foreach ($tags as $tag) {
            if (! is_string($tag) || $tag === '') {
                continue;
            }
            $this->clearByTag($tag);
        }
    }

    /**
     * Implement module- and key-pattern aware cache clearing here.
     * Adjust patterns to match existing cache key naming convention.
     */
    protected function clearByTag(string $tag): void
    {
        switch (true) {
            case str_starts_with($tag, 'user:'):
                $userId = substr($tag, 5);

                $this->deleteMatching("budget_*_user_{$userId}");
                $this->deleteMatching("credit_*_user_{$userId}");
                $this->deleteMatching("available_*_user_{$userId}");
                $this->deleteMatching("repayment_*_user_{$userId}");
                $this->deleteMatching("wallets_*_user_{$userId}");
                $this->deleteMatching("investments_*_user_{$userId}");
                $this->deleteMatching("alerts_*_user_{$userId}");
                $this->deleteMatching("support_*_user_{$userId}");
                $this->deleteMatching("subscriptions_*_user_{$userId}");
                break;

            case $tag === 'budget':
                $this->deleteMatching('budget_*');
                $this->deleteMatching('credit_*');
                $this->deleteMatching('available_*');
                $this->deleteMatching('repayment_*');
                break;

            case $tag === 'wallets':
                $this->deleteMatching('wallets_*');
                $this->deleteMatching('wallet_*');
                break;

            case $tag === 'investments':
                $this->deleteMatching('investments_*');
                $this->deleteMatching('trade_*');
                break;

            case $tag === 'alerts':
                $this->deleteMatching('alerts_*');
                break;

            case $tag === 'support':
                $this->deleteMatching('support_*');
                $this->deleteMatching('tickets_*');
                break;

            case $tag === 'subscriptions':
                $this->deleteMatching('subscriptions_*');
                $this->deleteMatching('email_subscriptions_*');
                break;

            case $tag === 'account':
            case $tag === 'user-profile':
                $this->deleteMatching('account_*');
                $this->deleteMatching('user_profile_*');
                break;

            default:
                $this->deleteMatching($tag . '_*');
                break;
        }
    }

    protected function deleteMatching(string $pattern): void
    {
        if ($pattern === '' || $pattern === '_*') {
            return;
        }

        if (method_exists($this->cache, 'deleteMatching')) {
            $this->cache->deleteMatching($pattern);
            return;
        }

        // For cache handlers without deleteMatching support we fall back
        // to delete() to avoid fatal errors. Implementing an iterator over
        // known keys can be added here in the future if required.
        if (method_exists($this->cache, 'delete')) {
            $this->cache->delete($pattern);
        }
    }
}