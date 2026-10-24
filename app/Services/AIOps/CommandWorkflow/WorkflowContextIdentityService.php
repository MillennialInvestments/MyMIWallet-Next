<?php

namespace App\Services\AIOps\CommandWorkflow;

final class WorkflowContextIdentityService
{
    private const REQUIRED = [
        'repository',
        'worktree',
        'branch',
        'task_id',
        'base_sha',
    ];

    private const MATCH_ORDER = [
        'mission_id',
        'product',
        'repository',
        'worktree',
        'branch',
        'task_id',
        'base_sha',
    ];

    public function resolve(string $root, array $identity): array
    {
        $root = $this->normalizePath($root);
        $expected = $this->normalizeIdentity($identity);
        $expected['worktree'] = $expected['worktree'] ?? $root;

        foreach (self::REQUIRED as $field) {
            if (($expected[$field] ?? '') === '') {
                return $this->reject('missing_identity_' . $field, $expected);
            }
        }

        if ($expected['worktree'] !== $root) {
            return $this->reject('cross_worktree_state', $expected);
        }

        $boundConfigPath = trim(
            (string) ($expected['config_path'] ?? '')
        );
        $configExpected = $expected;

        if (($expected['config_id'] ?? '') !== '') {
            $configExpected['task_id'] = (string) (
                $expected['config_id']
            );
        }

        $config = $boundConfigPath !== ''
            ? $this->selectBoundConfig(
                $boundConfigPath,
                $configExpected
            )
            : $this->select(
                'config',
                $root
                    . '/writable/aiops/'
                    . 'thought-worktrees/configs',
                $configExpected,
                true
            );
        if (($config['status'] ?? '') === 'rejected') {
            return $config;
        }

        if ($boundConfigPath !== '') {
            $feedback = [
                'status' => 'absent',
                'path' => '',
            ];
            $inbox = [
                'status' => 'absent',
                'path' => '',
            ];
        } else {
            $feedback = $this->select(
                'feedback',
                $root
                    . '/writable/aiops/'
                    . 'thought-worktrees/feedback',
                $expected,
                true
            );

            if (($feedback['status'] ?? '') === 'rejected') {
                return $feedback;
            }

            $inbox = $this->select(
                'inbox',
                $root
                    . '/writable/aiops/instructions/inbox',
                $expected,
                false
            );

            if (($inbox['status'] ?? '') === 'rejected') {
                return $inbox;
            }
        }

        $configPath = (string) $config['path'];
        $configId = pathinfo(
            $configPath,
            PATHINFO_FILENAME
        );
        $configRoot = dirname(
            dirname($configPath)
        );
        $roadmapPath = $configRoot
            . '/roadmaps/'
            . $configId
            . '.md';

        return [
            'status' => 'exact_match',
            'rejection_reason' => '',
            'identity' => $expected,
            'config_path' => (string) $config['path'],
            'roadmap_path' => is_file($roadmapPath) ? $roadmapPath : '',
            'feedback_path' => (string) $feedback['path'],
            'inbox_path' => (string) ($inbox['path'] ?? ''),
        ];
    }

    /**
     * Resolve the exact config persisted by the active mission.
     *
     * @param array<string, string> $expected
     */
    private function selectBoundConfig(
        string $path,
        array $expected
    ): array {
        $path = $this->normalizePath($path);

        if (! is_file($path)) {
            return $this->reject(
                'missing_config',
                $expected
            );
        }

        $normalizedPath = str_replace(
            '\\',
            '/',
            $path
        );

        if (
            ! str_contains(
                $normalizedPath,
                '/writable/aiops/'
                    . 'thought-worktrees/configs/'
            )
        ) {
            return $this->reject(
                'config_path_out_of_scope',
                $expected
            );
        }

        if (
            strcasecmp(
                pathinfo(
                    $path,
                    PATHINFO_FILENAME
                ),
                (string) (
                    $expected['task_id']
                    ?? ''
                )
            ) !== 0
        ) {
            return $this->reject(
                'config_task_id_mismatch',
                $expected
            );
        }

        $actual = $this->metadata($path);
        $reason = $this->mismatch(
            $expected,
            $actual
        );

        if ($reason !== '') {
            return $this->reject(
                'config_' . $reason,
                $expected
            );
        }

        return [
            'status' => 'exact_match',
            'path' => $path,
        ];
    }

    private function select(
        string $kind,
        string $directory,
        array $expected,
        bool $required
    ): array {
        $files = [];
        if (is_dir($directory)) {
            $files = array_merge(
                glob($directory . '/*.json') ?: [],
                glob($directory . '/*.md') ?: []
            );
        }
        sort($files, SORT_STRING);

        if ($files === []) {
            return $required
                ? $this->reject('missing_' . $kind, $expected)
                : ['status' => 'absent', 'path' => ''];
        }

        $mismatches = [];
        foreach ($files as $file) {
            $actual = $this->metadata($file);
            $reason = $this->mismatch($expected, $actual);
            if ($reason === '') {
                return ['status' => 'exact_match', 'path' => $file];
            }
            $mismatches[] = $kind . '_' . $reason;
        }

        sort($mismatches, SORT_STRING);

        return $this->reject(
            $mismatches[0] ?? ('missing_' . $kind),
            $expected
        );
    }

    private function mismatch(array $expected, array $actual): string
    {
        foreach (self::MATCH_ORDER as $field) {
            if (($expected[$field] ?? '') === '') {
                continue;
            }
            if (($actual[$field] ?? '') === '') {
                return $field . '_missing';
            }
            if ($actual[$field] !== $expected[$field]) {
                return $field . '_mismatch';
            }
        }

        return '';
    }

    private function metadata(string $path): array
    {
        $contents = (string) file_get_contents($path);
        $decoded = json_decode($contents, true);

        if (is_array($decoded)) {
            return $this->normalizeIdentity($this->flatten($decoded));
        }

        $metadata = [];
        $patterns = [
            'repository' => '/(?:^|\n)(?:-\s*)?Repository:\s*`?([^\r\n`]+)`?/i',
            'worktree' => '/(?:^|\n)(?:-\s*)?(?:Folder|Worktree):\s*`?([^\r\n`]+)`?/i',
            'branch' => '/(?:^|\n)(?:-\s*)?Branch:\s*`?([^\r\n`]+)`?/i',
            'base_sha' => '/(?:^|\n)(?:-\s*)?Base SHA:\s*`?([0-9a-f]{40})`?/i',
            'mission_id' => '/(?:^|\n)(?:-\s*)?Mission(?: ID)?:\s*`?([^\r\n`]+)`?/i',
            'product' => '/(?:^|\n)(?:-\s*)?Product:\s*`?([^\r\n`]+)`?/i',
            'task_id' => '/(?:^|\n)(?:-\s*)?Task(?: ID)?:\s*`?([^\r\n`]+)`?/i',
        ];

        foreach ($patterns as $field => $pattern) {
            if (preg_match($pattern, $contents, $match) === 1) {
                $metadata[$field] = trim($match[1]);
            }
        }

        if (
            ! isset($metadata['task_id'])
            && preg_match(
                '/\b[A-Z][A-Z0-9]*(?:-[A-Z0-9]+){2,}\b/',
                $contents,
                $match
            ) === 1
        ) {
            $metadata['task_id'] = $match[0];
        }

        return $this->normalizeIdentity($metadata);
    }

    private function flatten(array $payload): array
    {
        $aliases = [
            'repository' => [
                'repository',
                'repository_key',
                'repo',
                'repo_key',
                'repository_path',
                'repo_path',
                'project_key',
                'base_repo',
            ],
            'worktree' => ['worktree', 'worktree_path', 'expected_worktree'],
            'branch' => ['branch', 'expected_branch'],
            'task_id' => [
                'task_id',
                'task',
                'config_id',
            ],
            'base_sha' => ['base_sha', 'baseline_commit', 'base_commit'],
            'mission_id' => ['mission_id'],
            'product' => ['product', 'product_id', 'project'],
        ];
        $flat = [];

        if (
            ($payload['schema'] ?? '')
                === 'tbi_aiops_thought_worktree_config_v1'
            && isset($payload['id'])
            && is_scalar($payload['id'])
        ) {
            $flat['task_id'] = (string) $payload['id'];
        }

        $walk = static function (array $values) use (&$walk, &$flat, $aliases): void {
            foreach ($values as $key => $value) {
                if (is_array($value)) {
                    $walk($value);
                    continue;
                }
                foreach ($aliases as $field => $keys) {
                    if (
                        ! isset($flat[$field])
                        && in_array(strtolower((string) $key), $keys, true)
                    ) {
                        $flat[$field] = (string) $value;
                    }
                }
            }
        };
        $walk($payload);

        return $flat;
    }

    private function normalizeIdentity(array $identity): array
    {
        $normalized = [];
        foreach ($identity as $field => $value) {
            if (! is_scalar($value)) {
                continue;
            }
            $normalized[$field] = trim((string) $value);
        }

        if (($normalized['repository'] ?? '') !== '') {
            $repository = str_replace('\\', '/', $normalized['repository']);
            $normalized['repository'] = strtolower(
                preg_replace('/\.git$/i', '', basename(rtrim($repository, '/')))
                ?? ''
            );
        }
        if (($normalized['worktree'] ?? '') !== '') {
            $normalized['worktree'] = $this->normalizePath(
                $normalized['worktree']
            );
        }
        if (($normalized['config_id'] ?? '') !== '') {
            $normalized['config_id'] = strtoupper(
                $normalized['config_id']
            );
        }
        if (($normalized['task_id'] ?? '') !== '') {
            $normalized['task_id'] = strtoupper($normalized['task_id']);
        }
        if (($normalized['base_sha'] ?? '') !== '') {
            $normalized['base_sha'] = strtolower($normalized['base_sha']);
        }

        return $normalized;
    }

    private function normalizePath(string $path): string
    {
        $resolved = realpath($path);

        return rtrim($resolved !== false ? $resolved : $path, '/');
    }

    private function reject(string $reason, array $identity): array
    {
        return [
            'status' => 'rejected',
            'rejection_reason' => $reason,
            'identity' => $identity,
            'config_path' => '',
            'roadmap_path' => '',
            'feedback_path' => '',
            'inbox_path' => '',
        ];
    }
}
