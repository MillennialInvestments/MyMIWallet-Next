<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class PRComposerService
{
    public function compose(array $meta): array
    {
        $title = (string) ($meta['title'] ?? 'AIOps automated update');
        $why = (string) ($meta['why'] ?? 'Automated AIOps execution update.');
        $artifacts = $meta['artifacts'] ?? [];

        $body = "## Summary\n- {$why}\n\n## Artifacts\n";
        foreach ((array) $artifacts as $artifact) {
            $body .= '- `' . $artifact . "`\n";
        }

        return ['title' => $title, 'body' => trim($body) . PHP_EOL];
    }
}
