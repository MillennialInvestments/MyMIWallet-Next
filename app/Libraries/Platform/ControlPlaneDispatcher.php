<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class ControlPlaneDispatcher
{
    public function buildDispatchPlan(array $queue, array $manifests): array
    {
        $byPlatform = [];
        foreach ($manifests as $manifest) {
            $byPlatform[(string) ($manifest['platform_key'] ?? '')] = $manifest;
        }

        $actions = [];
        foreach ($queue as $item) {
            $platform = (string) ($item['platform'] ?? '');
            $action = (string) ($item['action'] ?? 'no-action');
            $manifest = $byPlatform[$platform] ?? [];
            $repoPath = (string) ($manifest['repo_path'] ?? '');

            $cmds = [];
            if ($action === 'repair') {
                $cmds[] = 'php spark platform:run --profile=light --repair=1';
            } elseif ($action === 'light-scan') {
                $cmds[] = 'php spark platform:run --profile=light';
            } elseif ($action === 'auth-audit') {
                $cmds[] = 'php spark auth:audit';
                $cmds[] = 'php spark platform:run --profile=predeploy';
            } elseif ($action === 'deep-scan') {
                $cmds[] = 'php spark platform:run --profile=nightly';
            }

            $actions[] = [
                'platform' => $platform,
                'repo_path' => $repoPath,
                'action' => $action,
                'commands' => $cmds,
            ];
        }

        return $actions;
    }
}
