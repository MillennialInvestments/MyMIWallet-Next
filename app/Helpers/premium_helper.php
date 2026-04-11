<?php

declare(strict_types=1);

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

if (! function_exists('premium_entitlements')) {
    function premium_entitlements(?int $userId = null, array $context = []): array
    {
        $resolvedUserId = $userId;
        if ($resolvedUserId === null && function_exists('user_id')) {
            $resolvedUserId = user_id();
        }
        if ($resolvedUserId === null) {
            $resolvedUserId = session('user_id');
        }

        return service('premiumEntitlementService')->resolve($resolvedUserId ? (int) $resolvedUserId : null, $context);
    }
}

if (! function_exists('premium_feature_enabled')) {
    function premium_feature_enabled(string $featureKey, ?int $userId = null): bool
    {
        return premium_entitlements($userId, ['feature_key' => $featureKey])['featureAllowed'] === true;
    }
}

if (! function_exists('premium_guard')) {
    function premium_guard(string $featureKey, array $options = []): ResponseInterface|RedirectResponse|null
    {
        $entitlements = premium_entitlements($options['user_id'] ?? null, ['feature_key' => $featureKey]);
        if ($entitlements['featureAllowed'] === true) {
            return null;
        }

        $request = service('request');
        $response = service('response');
        $path = trim(strtolower((string) $request->getUri()->getPath()), '/');
        $expectsJson = $request->isAJAX()
            || str_contains(strtolower((string) $request->getHeaderLine('Accept')), 'application/json')
            || str_starts_with($path, 'api/');
        $message = $options['message'] ?? ($entitlements['featureReason'] ?? 'Premium access required.');

        $userId = $entitlements['userId'] ?? null;
        $membershipTier = $entitlements['membershipTier'] ?? 'free';
        $membershipStatus = $entitlements['membershipStatus'] ?? 'free';
        $hasMalformedEntitlements = $userId !== null && ($membershipTier === '' || $membershipStatus === '');

        log_message($hasMalformedEntitlements ? 'warning' : 'notice', 'Premium access denied: feature={feature} route={route} user_id={userId} tier={tier} status={status}', [
            'feature' => $featureKey,
            'route' => '/' . ltrim((string) $request->getUri()->getPath(), '/'),
            'userId' => $userId,
            'tier' => $membershipTier,
            'status' => $membershipStatus,
        ]);

        if ($expectsJson) {
            return $response->setStatusCode(403)->setJSON([
                'status' => 'denied',
                'code' => 'PREMIUM_REQUIRED',
                'message' => $message,
                'data' => [
                    'feature' => $featureKey,
                    'entitlements' => $entitlements,
                    'upgrade_url' => site_url('Memberships'),
                ],
            ]);
        }

        return redirect()->to(site_url('Memberships'))->with('auth_message', [
            'type' => 'warning',
            'text' => $message,
        ]);
    }
}
