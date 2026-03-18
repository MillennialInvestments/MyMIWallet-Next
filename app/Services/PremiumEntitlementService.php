<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\Database\BaseConnection;

class PremiumEntitlementService
{
    private BaseConnection $db;
    private array $subscriptionFields = [];
    private array $userFields = [];
    private array $requestCache = [];

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function resolve(?int $userId, array $context = []): array
    {
        $featureKey = (string) ($context['feature_key'] ?? '');
        $cacheKey = md5(json_encode([$userId, $featureKey]));

        if (isset($this->requestCache[$cacheKey])) {
            return $this->requestCache[$cacheKey];
        }

        $request = service('request');
        $catalog = config('PremiumFeatures')->catalog;
        $featureDefinition = $featureKey !== '' ? ($catalog[$featureKey] ?? []) : [];

        $result = [
            'userId' => $userId,
            'isLoggedIn' => $userId !== null && $userId > 0,
            'hasMembership' => false,
            'membershipActive' => false,
            'membershipTier' => 'free',
            'membershipStatus' => 'free',
            'subscriptionName' => null,
            'trialActive' => false,
            'accessExpiresAt' => null,
            'source' => 'none',
            'featureKey' => $featureKey,
            'featureAllowed' => $featureKey === '',
            'featureDefinition' => $featureDefinition,
            'featureReason' => $featureKey === '' ? 'No feature requested.' : 'Membership required.',
            'featureCatalog' => $catalog,
            'meta' => [
                'route' => '/' . ltrim((string) $request->getUri()->getPath(), '/'),
                'request_id' => method_exists($request, 'getHeaderLine') ? $request->getHeaderLine('X-Request-Id') : null,
            ],
        ];

        if (! $result['isLoggedIn']) {
            $result['featureAllowed'] = $this->featureMatchesMinimumTier('free', $featureDefinition);
            $result['featureReason'] = $result['featureAllowed']
                ? 'Guest access allowed for this feature.'
                : 'You must be logged in to use this feature.';

            $this->logResolution($result, 'guest');
            return $this->requestCache[$cacheKey] = $result;
        }

        $subscription = $this->fetchSubscriptionRow($userId);
        $userRow = $this->fetchUserRow($userId);

        $normalizedTier = $this->normalizeTier($subscription['tier'] ?? null, $subscription['subscription_name'] ?? null, $userRow);
        $status = $this->normalizeStatus($subscription, $normalizedTier);
        $trialActive = $status === 'trial';
        $hasMembership = $normalizedTier !== 'free';
        $membershipActive = in_array($status, ['active', 'trial'], true);
        $accessExpiresAt = $this->extractFirstValue($subscription, ['expires_at', 'access_expires_at', 'ends_at', 'trial_ends_at', 'updated_on']);

        $result['hasMembership'] = $hasMembership;
        $result['membershipActive'] = $membershipActive;
        $result['membershipTier'] = $normalizedTier;
        $result['membershipStatus'] = $status;
        $result['subscriptionName'] = $subscription['subscription_name'] ?? null;
        $result['trialActive'] = $trialActive;
        $result['accessExpiresAt'] = $accessExpiresAt;
        $result['source'] = $subscription ? 'bf_users_subscriptions' : 'users';
        $result['featureAllowed'] = $this->isFeatureAllowed($featureKey, $result, $userRow, $subscription);
        $result['featureReason'] = $this->buildFeatureReason($featureKey, $result, $userRow, $subscription);

        $this->logResolution($result, 'resolved');
        return $this->requestCache[$cacheKey] = $result;
    }

    public function featureEnabled(string $featureKey, ?int $userId = null): bool
    {
        return $this->resolve($userId, ['feature_key' => $featureKey])['featureAllowed'] === true;
    }

    /** @return array<string,array<string,mixed>> */
    public function catalog(): array
    {
        return config('PremiumFeatures')->catalog;
    }

    private function fetchSubscriptionRow(int $userId): array
    {
        if (! $this->db->tableExists('bf_users_subscriptions')) {
            return [];
        }

        $builder = $this->db->table('bf_users_subscriptions')->where('user_id', $userId);
        $fields = $this->getSubscriptionFields();
        if (in_array('active', $fields, true)) {
            $builder->orderBy('active', 'DESC');
        }
        if (in_array('updated_on', $fields, true)) {
            $builder->orderBy('updated_on', 'DESC');
        }

        return $builder->get()->getRowArray() ?? [];
    }

    private function fetchUserRow(int $userId): array
    {
        if (! $this->db->tableExists('users')) {
            return [];
        }

        return $this->db->table('users')->where('id', $userId)->get()->getRowArray() ?? [];
    }

    private function normalizeTier(mixed $tier, mixed $subscriptionName, array $userRow): string
    {
        $normalized = strtolower(trim((string) ($tier ?? '')));
        $map = [
            'tier 1' => 'tier1',
            'tier1' => 'tier1',
            'tier 2' => 'tier2',
            'tier2' => 'tier2',
            'tier 3' => 'tier3',
            'tier3' => 'tier3',
            'premium' => 'tier3',
            'gold' => 'tier3',
            'pro' => 'tier2',
            'basic' => 'tier1',
            'starter' => 'tier1',
            'trial' => 'trial',
            'free' => 'free',
        ];

        if (isset($map[$normalized])) {
            return $map[$normalized];
        }

        $subscriptionText = strtolower(trim((string) ($subscriptionName ?? '')));
        if (str_contains($subscriptionText, 'tier 3') || str_contains($subscriptionText, 'premium') || str_contains($subscriptionText, 'gold')) {
            return 'tier3';
        }
        if (str_contains($subscriptionText, 'tier 2') || str_contains($subscriptionText, 'pro')) {
            return 'tier2';
        }
        if (str_contains($subscriptionText, 'tier 1') || str_contains($subscriptionText, 'starter') || str_contains($subscriptionText, 'basic')) {
            return 'tier1';
        }
        if (str_contains($subscriptionText, 'trial')) {
            return 'trial';
        }

        $activated = $this->truthy($userRow['features_activated'] ?? null);
        if ($activated) {
            return 'tier1';
        }

        return 'free';
    }

    private function normalizeStatus(array $subscription, string $tier): string
    {
        if ($subscription === []) {
            return $tier === 'trial' ? 'trial' : 'free';
        }

        $rawStatus = strtolower(trim((string) ($subscription['membership_status'] ?? $subscription['status'] ?? '')));
        if (in_array($rawStatus, ['expired', 'canceled', 'cancelled', 'unpaid', 'inactive', 'trial', 'active'], true)) {
            return $rawStatus === 'cancelled' ? 'canceled' : $rawStatus;
        }

        $activeValue = $subscription['active'] ?? 0;
        if (! $this->truthy($activeValue)) {
            return 'inactive';
        }

        if ($tier === 'trial') {
            return 'trial';
        }

        return 'active';
    }

    private function isFeatureAllowed(string $featureKey, array $entitlements, array $userRow, array $subscription): bool
    {
        if ($featureKey === '') {
            return true;
        }

        $catalog = config('PremiumFeatures')->catalog;
        $definition = $catalog[$featureKey] ?? null;
        if ($definition === null) {
            return false;
        }

        if (! $this->featureMatchesMinimumTier($entitlements['membershipTier'], $definition)) {
            return false;
        }

        if (($entitlements['membershipStatus'] ?? '') === 'inactive') {
            return false;
        }

        foreach ((array) ($definition['user_flags'] ?? []) as $flag) {
            if (array_key_exists($flag, $userRow) && $this->truthy($userRow[$flag])) {
                return true;
            }
        }

        return $entitlements['membershipTier'] !== 'free' || (($definition['min_tier'] ?? 'free') === 'free');
    }

    private function buildFeatureReason(string $featureKey, array $entitlements, array $userRow, array $subscription): string
    {
        if ($featureKey === '') {
            return 'No feature-specific premium gate applied.';
        }

        $definition = config('PremiumFeatures')->catalog[$featureKey] ?? null;
        if ($definition === null) {
            return 'Unknown premium feature mapping.';
        }

        if ($entitlements['featureAllowed']) {
            foreach ((array) ($definition['user_flags'] ?? []) as $flag) {
                if (array_key_exists($flag, $userRow) && $this->truthy($userRow[$flag])) {
                    return sprintf('Access granted by user flag "%s".', $flag);
                }
            }

            return sprintf('Access granted for %s membership.', $entitlements['membershipTier']);
        }

        if (! $entitlements['isLoggedIn']) {
            return 'Authentication required.';
        }

        return sprintf(
            'Feature requires %s or higher. Current tier: %s (%s).',
            $definition['min_tier'] ?? 'premium',
            $entitlements['membershipTier'],
            $entitlements['membershipStatus']
        );
    }

    private function featureMatchesMinimumTier(string $currentTier, array $definition): bool
    {
        $weights = config('PremiumFeatures')->tierWeights;
        $minimumTier = (string) ($definition['min_tier'] ?? 'free');
        $trialAllowed = (bool) ($definition['trial'] ?? false);

        if ($currentTier === 'trial' && ! $trialAllowed) {
            return false;
        }

        return ($weights[$currentTier] ?? 0) >= ($weights[$minimumTier] ?? 0);
    }

    private function extractFirstValue(array $row, array $keys): ?string
    {
        foreach ($keys as $key) {
            $value = $row[$key] ?? null;
            if ($value !== null && trim((string) $value) !== '') {
                return (string) $value;
            }
        }

        return null;
    }

    private function truthy(mixed $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        $normalized = strtolower(trim((string) $value));
        return in_array($normalized, ['1', 'true', 'yes', 'on', 'active', 'trial'], true);
    }

    private function getSubscriptionFields(): array
    {
        if ($this->subscriptionFields === [] && $this->db->tableExists('bf_users_subscriptions')) {
            $this->subscriptionFields = $this->db->getFieldNames('bf_users_subscriptions');
        }

        return $this->subscriptionFields;
    }

    private function logResolution(array $resolution, string $stage): void
    {
        log_message('info', 'Premium entitlement {stage}: user_id={userId} route={route} feature={feature} tier={tier} status={status} allowed={allowed} reason={reason}', [
            'stage' => $stage,
            'userId' => $resolution['userId'] ?? null,
            'route' => $resolution['meta']['route'] ?? 'unknown',
            'feature' => $resolution['featureKey'] ?? '',
            'tier' => $resolution['membershipTier'] ?? 'free',
            'status' => $resolution['membershipStatus'] ?? 'free',
            'allowed' => !empty($resolution['featureAllowed']) ? 'yes' : 'no',
            'reason' => $resolution['featureReason'] ?? 'n/a',
        ]);
    }
}
