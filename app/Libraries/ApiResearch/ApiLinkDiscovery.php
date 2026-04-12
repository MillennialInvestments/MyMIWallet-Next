<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

class ApiLinkDiscovery
{
    public function collectDocLikeLinks(array $pages): array
    {
        $links = [];

        foreach ($pages as $page) {
            if (empty($page['url'])) {
                continue;
            }

            $url = (string) $page['url'];
            $path = strtolower((string) parse_url($url, PHP_URL_PATH));

            if (
                str_contains($path, 'docs')
                || str_contains($path, 'developer')
                || str_contains($path, 'api')
                || str_contains($path, 'reference')
                || str_contains($path, 'guide')
                || str_contains($path, 'auth')
                || str_contains($path, 'swagger')
                || str_contains($path, 'openapi')
            ) {
                $links[] = $url;
            }
        }

        return array_values(array_unique($links));
    }
}