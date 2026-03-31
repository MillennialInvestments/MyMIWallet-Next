<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class ControlPlaneRegistry
{
    public function loadManifests(): array
    {
        $manifestPath = ROOTPATH . 'docs/_platform/platform_manifest.json';
        if (! is_file($manifestPath)) {
            return [];
        }

        $raw = json_decode((string) file_get_contents($manifestPath), true);
        if (! is_array($raw)) {
            return [];
        }

        if (isset($raw['platform_key'])) {
            return [$raw];
        }

        return array_values(array_filter($raw, static fn ($item) => is_array($item) && isset($item['platform_key'])));
    }
}
