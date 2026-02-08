<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Services\Ops\AiOpsArtifactService;
use CodeIgniter\CLI\CLI;

abstract class BaseOpsCommand extends SafeBaseCommand
{
    protected $group = 'Ops';

    protected $options = [
        '--json' => 'Output JSON',
        '--dry-run' => 'Preview actions only',
    ];

    /** @param array<string,mixed> $payload */
    protected function respond(array $payload, string $artifactBase, bool $dryRun, bool $json): int
    {
        $artifact = new AiOpsArtifactService();
        $date = gmdate('Y-m-d');
        $jsonPath = $artifact->writeJson($artifactBase . '/report-' . $date . '.json', $payload, $dryRun);
        $mdPath = $artifact->writeMarkdown($artifactBase . '/report-' . $date . '.md', $this->toMarkdown($payload), $dryRun);
        $payload['artifacts'] = ['json' => $jsonPath, 'markdown' => $mdPath, 'dry_run' => $dryRun];

        if ($json) {
            CLI::write((string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            CLI::write($this->toMarkdown($payload));
        }

        return (int) ($payload['exit_code'] ?? EXIT_SUCCESS);
    }

    /** @param array<string,mixed> $payload */
    protected function toMarkdown(array $payload): string
    {
        $md = ['# ' . ($this->name ?? 'ops-report'), ''];
        foreach ($payload as $key => $value) {
            $md[] = '## ' . $key;
            if (is_scalar($value) || $value === null) {
                $md[] = '- ' . (string) $value;
            } else {
                $encoded = json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                $md[] = '```json';
                $md[] = $encoded === false ? '{}' : $encoded;
                $md[] = '```';
            }
            $md[] = '';
        }

        return implode(PHP_EOL, $md);
    }
}
