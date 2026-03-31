<?php

declare(strict_types=1);

namespace App\Services;

use Config\RegistrationSources;

class RegistrationSourceContentService
{
    /** @param array<string,mixed> $attribution */
    public function resolve(array $attribution): array
    {
        $config = config(RegistrationSources::class);
        $sourceSlug = strtolower((string) ($attribution['source_slug'] ?? ''));

        $default = $config->sources['default'] ?? [];
        $sourceConfig = $config->sources[$sourceSlug] ?? [];
        $resolved = array_replace_recursive($default, $sourceConfig);

        $resolved['source_slug'] = $sourceSlug !== '' ? $sourceSlug : 'default';
        $resolved['headline'] = (string) ($resolved['headline'] ?? ($default['headline'] ?? 'Create Your Account'));
        $resolved['subheadline'] = (string) ($resolved['subheadline'] ?? ($default['subheadline'] ?? ''));

        $layout = strtolower((string) ($resolved['layout'] ?? 'single'));
        $resolved['layout'] = in_array($layout, ['single', 'split'], true) ? $layout : 'single';

        $introView = (string) ($resolved['intro_view'] ?? '');
        $resolved['intro_view_exists'] = $introView !== '' && is_file(APPPATH . 'Views/' . str_replace('/', DIRECTORY_SEPARATOR, $introView) . '.php');

        if (! $resolved['intro_view_exists']) {
            $resolved['layout'] = 'single';
            $resolved['intro_view'] = '';
        }

        $resolved['promo_enabled'] = (bool) ($resolved['promo_enabled'] ?? true);
        $resolved['promo_sections'] = is_array($resolved['promo_sections'] ?? null) ? $resolved['promo_sections'] : [];

        return $resolved;
    }
}
