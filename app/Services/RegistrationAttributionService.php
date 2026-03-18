<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\HTTP\IncomingRequest;

class RegistrationAttributionService
{
    /** @return array<string,mixed> */
    public function resolve(IncomingRequest $request): array
    {
        $uri = $request->getUri();
        $segments = $uri->getSegments();

        $sourceSlug = null;
        $referralSlug = null;

        if (($segments[0] ?? null) === 'register') {
            $referralSlug = $segments[1] ?? null;
        } elseif (($segments[1] ?? null) === 'register') {
            $sourceSlug = $segments[0] ?? null;
            $referralSlug = $segments[2] ?? null;
        }

        $queryRef = trim((string) ($request->getGet('ref') ?? $request->getGet('referral') ?? ''));
        if ($queryRef !== '') {
            $referralSlug = $queryRef;
        }

        $campaignCode = trim((string) ($request->getGet('campaign') ?? $request->getGet('campaign_code') ?? ''));
        $utm = [
            'utm_source' => trim((string) ($request->getGet('utm_source') ?? '')),
            'utm_medium' => trim((string) ($request->getGet('utm_medium') ?? '')),
            'utm_campaign' => trim((string) ($request->getGet('utm_campaign') ?? '')),
            'utm_content' => trim((string) ($request->getGet('utm_content') ?? '')),
            'utm_term' => trim((string) ($request->getGet('utm_term') ?? '')),
        ];

        $sourceChannel = $this->normalizeSourceChannel($sourceSlug, $utm['utm_source'] ?: null);

        return [
            'route' => '/' . ltrim((string) $uri->getPath(), '/'),
            'source_slug' => $sourceSlug,
            'source_channel' => $sourceChannel,
            'referral_slug' => $referralSlug,
            'campaign_code' => $campaignCode !== '' ? $campaignCode : null,
            'utm' => array_filter($utm, static fn ($value) => $value !== ''),
            'view_slug' => $sourceSlug ?: 'Free',
            'view_exists' => is_file(APPPATH . 'Views/Auth/register/' . ($sourceSlug ?: 'Free') . '.php'),
        ];
    }

    private function normalizeSourceChannel(?string $sourceSlug, ?string $utmSource): string
    {
        $candidate = strtolower(trim((string) ($sourceSlug ?: $utmSource ?: 'direct')));

        return match ($candidate) {
            'discord' => 'discord',
            'facebook' => 'facebook',
            'linkedin' => 'linkedin',
            'twitter', 'x' => 'x',
            'youtube' => 'youtube',
            'tiktok' => 'tiktok',
            default => $candidate === '' ? 'direct' : $candidate,
        };
    }
}
