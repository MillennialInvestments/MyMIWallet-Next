<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\HTTP\IncomingRequest;

class RegistrationAttributionService
{
    /** @return array<string,mixed> */
    public function resolve(IncomingRequest $request): array
    {
        $session = session();
        $uri = $request->getUri();
        $segments = $uri->getSegments();
        $existing = $session->get('registration_attribution');
        $existing = is_array($existing) ? $existing : [];

        $sourceSlug = null;
        $referralSlug = null;

        if (($segments[0] ?? null) === 'register') {
            $referralSlug = $segments[1] ?? null;
        } elseif (($segments[1] ?? null) === 'register') {
            $sourceSlug = $segments[0] ?? null;
            $referralSlug = $segments[2] ?? null;
        }

        $sourceSlug = $this->cleanSlug((string) ($request->getPost('source_slug') ?? $request->getGet('source_slug') ?? $sourceSlug ?? ($existing['source_slug'] ?? '')));

        $queryRef = trim((string) ($request->getPost('ref') ?? $request->getPost('referral') ?? $request->getGet('ref') ?? $request->getGet('referral') ?? ''));
        if ($queryRef !== '') {
            $referralSlug = $queryRef;
        }

        if ($referralSlug === null || trim((string) $referralSlug) === '') {
            $referralSlug = (string) ($existing['referral_slug'] ?? '');
        }

        $campaignCode = trim((string) ($request->getPost('campaign_code') ?? $request->getGet('campaign') ?? $request->getGet('campaign_code') ?? ($existing['campaign_code'] ?? '')));
        $landingPath = '/' . ltrim((string) ($existing['landing_path'] ?? $uri->getPath()), '/');

        $utm = [
            'utm_source' => trim((string) ($request->getPost('utm_source') ?? $request->getGet('utm_source') ?? ($existing['utm']['utm_source'] ?? ''))),
            'utm_medium' => trim((string) ($request->getPost('utm_medium') ?? $request->getGet('utm_medium') ?? ($existing['utm']['utm_medium'] ?? ''))),
            'utm_campaign' => trim((string) ($request->getPost('utm_campaign') ?? $request->getGet('utm_campaign') ?? ($existing['utm']['utm_campaign'] ?? ''))),
            'utm_content' => trim((string) ($request->getPost('utm_content') ?? $request->getGet('utm_content') ?? ($existing['utm']['utm_content'] ?? ''))),
            'utm_term' => trim((string) ($request->getPost('utm_term') ?? $request->getGet('utm_term') ?? ($existing['utm']['utm_term'] ?? ''))),
        ];

        $sourceChannel = $this->normalizeSourceChannel($sourceSlug ?: null, $utm['utm_source'] ?: null);
        $attribution = [
            'route' => '/' . ltrim((string) $uri->getPath(), '/'),
            'landing_path' => $landingPath,
            'source_slug' => $sourceSlug !== '' ? $sourceSlug : null,
            'source_channel' => $sourceChannel,
            'referral_slug' => $referralSlug !== '' ? $referralSlug : null,
            'campaign_code' => $campaignCode !== '' ? $campaignCode : null,
            'utm' => array_filter($utm, static fn ($value) => $value !== ''),
            'view_slug' => $sourceSlug !== '' ? ucfirst($sourceSlug) : 'Free',
            'view_exists' => $sourceSlug !== '' && is_file(APPPATH . 'Views/Auth/register/' . ucfirst($sourceSlug) . '.php'),
        ];

        return $attribution;
    }

    private function cleanSlug(string $slug): string
    {
        $slug = strtolower(trim($slug));
        return preg_replace('/[^a-z0-9\-]/', '', $slug) ?? '';
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
