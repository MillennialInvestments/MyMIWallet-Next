<?php

namespace App\Services\AIOps;

use Closure;
use RuntimeException;
use Throwable;

class ThoughtWorktreeMissionService
{
    public const STATE_PREPARED = 'prepared';
    public const STATE_WORKTREE_CREATED = 'worktree_created';
    public const STATE_ACTIVE_REPORT_ONLY = 'active_report_only';
    public const STATE_ACTIVE_MUTATION_APPROVED = 'active_mutation_approved';
    public const STATE_BLOCKED = 'blocked';
    public const STATE_COMPLETED = 'completed';

    public function __construct(
        private readonly ?Closure $branchResolver = null,
        private readonly string $allowedWorktreeRoot = '/apps/TBI/worktrees'
    ) {
    }

    public function missionIdForConfig(
        array $config,
        string $worktree
    ): string {
        $worktree = $this->normalizePath($worktree);

        $id = trim((string) ($config['id'] ?? ''));
        $projectKey = trim(
            (string) (
                $config['project_key']
                ?? 'timothyburks'
            )
        );
        $branch = trim(
            (string) ($config['branch'] ?? '')
        );

        if (
            $id === ''
            || $projectKey === ''
            || $branch === ''
            || $worktree === ''
        ) {
            throw new RuntimeException(
                'Mission identity metadata is incomplete.'
            );
        }

        return 'mission-' . substr(
            hash(
                'sha256',
                json_encode([
                    'id' => $id,
                    'project_key' => $projectKey,
                    'branch' => $branch,
                    'worktree' => rtrim(
                        $worktree,
                        '/'
                    ),
                ])
            ),
            0,
            12
        );
    }

    public function bind(array $config, string $worktree, bool $mutationApproved = false): array
    {
        $worktree = $this->normalizePath($worktree);
        $this->assertSafeWorktree($worktree);
        $this->assertBranchMatches($config, $worktree);

        $mission = [
            'schema' => 'tbi_aiops_thought_worktree_mission_v1',
            'config_id' => (string) ($config['id'] ?? ''),
            'project_key' => (string) ($config['project_key'] ?? 'timothyburks'),
            'title' => (string) ($config['title'] ?? ''),
            'objective' => (string) ($config['thought'] ?? ''),
            'base_repo' => (string) ($config['base_repo'] ?? ''),
            'branch' => (string) ($config['branch'] ?? ''),
            'worktree' => $worktree,
            'mission_id' =>
                $this->missionIdForConfig(
                    $config,
                    $worktree
                ),
            'phase' => 'phase-01-discovery',
            'task' => 'run-worktree-doctor',
            'lifecycle_state' => $mutationApproved ? self::STATE_ACTIVE_MUTATION_APPROVED : self::STATE_ACTIVE_REPORT_ONLY,
            'mutation_class' => $mutationApproved ? 1 : 0,
            'mutation_approved' => $mutationApproved,
            'mutation_approved_by' => $mutationApproved ? (getenv('USER') ?: 'unknown') : null,
            'mutation_approved_at' => $mutationApproved ? date(DATE_ATOM) : null,
            'activated_at' => date(DATE_ATOM),
            'last_resumed_at' => date(DATE_ATOM),
            'completed_at' => null,
            'blocked_reason' => null,
            'config_path' => (string) ($config['_config_path'] ?? ''),
            'roadmap_path' => (string) ($config['_roadmap_path'] ?? ''),
            'updated_at' => date(DATE_ATOM),
        ];

        $this->write($worktree, $mission);

        return $mission;
    }

    public function forceMutation(array $config, string $worktree, string $reason, string $approvedBy): array
    {
        $reason = trim($reason);
        if (mb_strlen($reason) < 12) {
            throw new RuntimeException('A force-mutation reason of at least 12 characters is required.');
        }

        $worktree = $this->normalizePath($worktree);
        $this->assertSafeWorktree($worktree);
        $this->assertBranchMatches($config, $worktree);

        $missionPath = $this->missionPath($worktree);
        $backupPath = null;

        if (is_file($missionPath)) {
            $backupPath = $missionPath
                . '.before-force-'
                . date('Ymd-His')
                . '-'
                . bin2hex(random_bytes(4));

            $this->copyPrivateFile(
                $missionPath,
                $backupPath
            );
        }

        $mission = $this->bind($config, $worktree, true);
        $mission['force_mutation'] = true;
        $mission['force_mutation_reason'] = $reason;
        $mission['force_mutation_approved_by'] = $approvedBy !== '' ? $approvedBy : (getenv('USER') ?: 'unknown');
        $mission['force_mutation_approved_at'] = date(DATE_ATOM);
        $mission['force_mutation_backup'] = $backupPath;
        $mission['phase'] = 'phase-02-implementation';
        $mission['task'] = 'generate-and-apply-approved-source-patch';
        $mission['updated_at'] = date(DATE_ATOM);

        $this->write($worktree, $mission);
        $operatorStatePath = $this->resetOperatorPhase($worktree, $mission);

        $mission['operator_state_path'] = $operatorStatePath;

        return $mission;
    }

    public function activate(string $worktree, bool $approveMutation): array
    {
        $mission = $this->load($worktree);
        if ($mission === []) {
            throw new RuntimeException('Mission is not bound to this worktree.');
        }

        $mission['lifecycle_state'] = $approveMutation
            ? self::STATE_ACTIVE_MUTATION_APPROVED
            : self::STATE_ACTIVE_REPORT_ONLY;
        $mission['mutation_class'] = $approveMutation ? 1 : 0;
        $mission['mutation_approved'] = $approveMutation;
        $mission['mutation_approved_by'] = $approveMutation ? (getenv('USER') ?: 'unknown') : null;
        $mission['mutation_approved_at'] = $approveMutation ? date(DATE_ATOM) : null;
        $mission['activated_at'] = $mission['activated_at'] ?? date(DATE_ATOM);
        $mission['last_resumed_at'] = date(DATE_ATOM);
        $mission['updated_at'] = date(DATE_ATOM);

        $this->write($worktree, $mission);

        return $mission;
    }

    public function resume(string $worktree): array
    {
        $mission = $this->load($worktree);
        if ($mission === []) {
            throw new RuntimeException('Mission is not bound to this worktree.');
        }

        $mission['last_resumed_at'] = date(DATE_ATOM);
        $mission['updated_at'] = date(DATE_ATOM);
        $this->write($worktree, $mission);

        return $mission;
    }

    public function load(string $worktree): array
    {
        $path = $this->missionPath($worktree);

        if (! file_exists($path) && ! is_link($path)) {
            return [];
        }

        /*
         * Existing mission state may predate the private-state
         * hardening and still carry inherited ACL permissions.
         * Normalize and verify it before trusting any bytes.
         *
         * An attacker-owned replacement or symlink fails closed:
         * enforcePrivateMode() rejects foreign ownership before
         * chmod and explicitly rejects symbolic links.
         */
        $this->enforcePrivateMode($path);

        $contents = file_get_contents($path);

        if ($contents === false) {
            throw new RuntimeException(
                'Unable to read private mission state.'
            );
        }

        $decoded = json_decode(
            $contents,
            true
        );

        return is_array($decoded)
            ? $decoded
            : [];
    }

    public function mutationAllowed(array $mission): bool
    {
        if (
            ($mission['lifecycle_state'] ?? '')
                !== self::STATE_ACTIVE_MUTATION_APPROVED
            || ($mission['mutation_approved'] ?? false) !== true
            || (int) ($mission['mutation_class'] ?? 0) < 1
        ) {
            return false;
        }

        $expectedBranch = trim((string) ($mission['branch'] ?? ''));
        $worktree = trim((string) ($mission['worktree'] ?? ''));

        if (
            $expectedBranch === ''
            || $expectedBranch === 'main'
            || $expectedBranch === 'master'
            || $worktree === ''
        ) {
            return false;
        }

        $worktree = $this->normalizePath($worktree);
        $allowedRoot = $this->normalizePath(
            $this->allowedWorktreeRoot
        );

        if (
            $allowedRoot === ''
            || $worktree === $allowedRoot
            || ! str_starts_with(
                $worktree,
                rtrim($allowedRoot, '/') . '/'
            )
            || ! is_dir($worktree)
            || (
                ! is_dir($worktree . '/.git')
                && ! is_file($worktree . '/.git')
            )
        ) {
            return false;
        }

        $actualBranch = $this->resolveCurrentBranch($worktree);

        return $actualBranch !== ''
            && $actualBranch !== 'main'
            && $actualBranch !== 'master'
            && $actualBranch === $expectedBranch;
    }

    private function resolveCurrentBranch(string $worktree): string
    {
        if ($this->branchResolver instanceof Closure) {
            try {
                return trim((string) (
                    $this->branchResolver
                )($worktree));
            } catch (Throwable) {
                return '';
            }
        }

        return trim((string) shell_exec(
            'git -C '
            . escapeshellarg($worktree)
            . ' branch --show-current 2>/dev/null'
        ));
    }

    /**
     * @param array<string, mixed> $evidence
     * @return array{
     *     changed: bool,
     *     backup_path: ?string,
     *     operator_backup_path: ?string,
     *     operator_state_path: string,
     *     mission: array<string, mixed>
     * }
     */
    public function complete(
        string $worktree,
        array $evidence
    ): array {
        $worktree = $this->normalizePath($worktree);
        $this->assertSafeWorktree($worktree);

        $mission = $this->load($worktree);

        if ($mission === []) {
            throw new RuntimeException(
                'Mission is not bound to this worktree.'
            );
        }

        $operatorPath = $this->operatorStatePath(
            $worktree
        );

        if (
            ($mission['lifecycle_state'] ?? '')
                === self::STATE_COMPLETED
        ) {
            return [
                'changed' => false,
                'backup_path' => null,
                'operator_backup_path' => null,
                'operator_state_path' => $operatorPath,
                'mission' => $mission,
            ];
        }

        $evidence = $this->normalizeCompletionEvidence(
            $evidence
        );

        $missionPath = $this->missionPath($worktree);
        $suffix = date('Ymd-His')
            . '-'
            . substr(
                sha1(
                    $missionPath
                    . microtime(true)
                ),
                0,
                8
            );

        $backupPath = $missionPath
            . '.before-complete-'
            . $suffix;

        $this->copyPrivateFile(
            $missionPath,
            $backupPath
        );

        $operatorBackupPath = null;

        if (is_file($operatorPath)) {
            $operatorBackupPath = $operatorPath
                . '.before-complete-'
                . $suffix;

            $this->copyPrivateFile(
                $operatorPath,
                $operatorBackupPath
            );
        }

        $now = date(DATE_ATOM);

        $mission['lifecycle_state'] =
            self::STATE_COMPLETED;
        $mission['phase'] =
            'phase-03-validation';
        $mission['task'] =
            'post-merge-closeout-complete';
        $mission['mutation_class'] = 0;
        $mission['mutation_approved'] = false;
        $mission['mutation_revoked_at'] = $now;
        $mission['mutation_revoked_reason'] =
            'Mission completed after verified PR merge.';
        $mission['completed_at'] = $now;
        $mission['blocked_reason'] = null;
        $mission['completion_evidence'] = $evidence;
        $mission['completion_backup'] =
            $backupPath;
        $mission['updated_at'] = $now;

        $operator = $this->readJsonFile(
            $operatorPath
        );

        $context = is_array(
            $operator['context'] ?? null
        ) ? $operator['context'] : [];

        $context['config_id'] =
            (string) ($mission['config_id'] ?? '');
        $context['mission_state'] =
            self::STATE_COMPLETED;
        $context['mutation_class'] = 0;
        $context['force_active'] = false;
        $context['completion_pr'] =
            $evidence['pr_number'];
        $context['completion_commit'] =
            $evidence['merge_commit'];

        $operator['schema_version'] =
            (string) (
                $operator['schema_version']
                ?? '2026-07-12.1'
            );
        $operator['phase'] = 'terminal';
        $operator['context'] = $context;
        $operator['updated_at'] = $now;
        $operator['path'] = $operatorPath;

        try {
            $this->writeJsonAtomic(
                $missionPath,
                $mission
            );

            $this->writeJsonAtomic(
                $operatorPath,
                $operator
            );
        } catch (Throwable $exception) {
            $rollbackErrors = [];

            try {
                $this->replacePrivateFile(
                    $backupPath,
                    $missionPath
                );
            } catch (Throwable $rollback) {
                $rollbackErrors[] =
                    'mission rollback: '
                    . $rollback->getMessage();
            }

            if (
                $operatorBackupPath !== null
                && is_file($operatorBackupPath)
            ) {
                try {
                    $this->replacePrivateFile(
                        $operatorBackupPath,
                        $operatorPath
                    );
                } catch (Throwable $rollback) {
                    $rollbackErrors[] =
                        'operator rollback: '
                        . $rollback->getMessage();
                }
            }

            if ($rollbackErrors !== []) {
                throw new RuntimeException(
                    'Mission completion failed and private '
                    . 'runtime rollback also failed: '
                    . $exception->getMessage()
                    . ' Rollback errors: '
                    . implode('; ', $rollbackErrors),
                    0,
                    $exception
                );
            }

            throw new RuntimeException(
                'Mission completion failed and prior '
                . 'runtime state was restored: '
                . $exception->getMessage(),
                0,
                $exception
            );
        }

        return [
            'changed' => true,
            'backup_path' => $backupPath,
            'operator_backup_path' =>
                $operatorBackupPath,
            'operator_state_path' => $operatorPath,
            'mission' => $mission,
        ];
    }

    /**
     * @param array<string, mixed> $evidence
     * @return array<string, mixed>
     */
    private function normalizeCompletionEvidence(
        array $evidence
    ): array {
        $prNumber = (int) (
            $evidence['pr_number'] ?? 0
        );

        $prUrl = trim((string) (
            $evidence['pr_url'] ?? ''
        ));

        $mergeStrategy = trim((string) (
            $evidence['merge_strategy']
            ?? 'squash'
        ));

        $mergeCommit = trim((string) (
            $evidence['merge_commit'] ?? ''
        ));

        $mergedAt = trim((string) (
            $evidence['merged_at'] ?? ''
        ));

        $featureHeadSha = trim((string) (
            $evidence['feature_head_sha'] ?? ''
        ));

        $validationEvidence =
            $evidence['validation_evidence'] ?? [];

        if ($prNumber < 1) {
            throw new RuntimeException(
                'Completion PR number is required.'
            );
        }

        if (
            $prUrl === ''
            || filter_var(
                $prUrl,
                FILTER_VALIDATE_URL
            ) === false
        ) {
            throw new RuntimeException(
                'A valid completion PR URL is required.'
            );
        }

        if (
            ! in_array(
                $mergeStrategy,
                ['squash', 'merge', 'rebase'],
                true
            )
        ) {
            throw new RuntimeException(
                'Unsupported merge strategy.'
            );
        }

        foreach (
            [
                'merge commit' => $mergeCommit,
                'feature head' => $featureHeadSha,
            ] as $label => $sha
        ) {
            if (
                preg_match(
                    '/\A[0-9a-f]{40}\z/i',
                    $sha
                ) !== 1
            ) {
                throw new RuntimeException(
                    'A full 40-character '
                    . $label
                    . ' SHA is required.'
                );
            }
        }

        if (
            $mergedAt === ''
            || strtotime($mergedAt) === false
        ) {
            throw new RuntimeException(
                'A valid merged-at timestamp is required.'
            );
        }

        if (is_string($validationEvidence)) {
            $validationEvidence = [
                'summary' => trim(
                    $validationEvidence
                ),
            ];
        }

        if (
            ! is_array($validationEvidence)
            || $validationEvidence === []
        ) {
            throw new RuntimeException(
                'Validation evidence is required.'
            );
        }

        return [
            'pr_number' => $prNumber,
            'pr_url' => $prUrl,
            'merge_strategy' => $mergeStrategy,
            'merge_commit' => strtolower(
                $mergeCommit
            ),
            'merged_at' => $mergedAt,
            'feature_head_sha' => strtolower(
                $featureHeadSha
            ),
            'validation_evidence' =>
                $validationEvidence,
            'system_mutation_performed' =>
                ($evidence[
                    'system_mutation_performed'
                ] ?? false) === true,
        ];
    }

    private function operatorStatePath(
        string $worktree
    ): string {
        return rtrim($worktree, '/')
            . '/writable/aiops/operator/'
            . 'phase-state.json';
    }

    /**
     * @return array<string, mixed>
     */
    private function readJsonFile(
        string $path
    ): array {
        if (! file_exists($path) && ! is_link($path)) {
            return [];
        }

        $this->enforcePrivateMode($path);

        $contents = file_get_contents($path);

        if ($contents === false) {
            throw new RuntimeException(
                'Unable to read private runtime state: '
                . $path
            );
        }

        $decoded = json_decode(
            $contents,
            true
        );

        return is_array($decoded)
            ? $decoded
            : [];
    }

    private function ensureRuntimeDirectory(
        string $directory
    ): void {
        if (
            ! is_dir($directory)
            && ! mkdir(
                $directory,
                0775,
                true
            )
            && ! is_dir($directory)
        ) {
            throw new RuntimeException(
                'Unable to create runtime directory: '
                . $directory
            );
        }
    }

    private function enforcePrivateMode(
        string $path
    ): void {
        if (
            ! is_file($path)
            || is_link($path)
        ) {
            throw new RuntimeException(
                'Private runtime state is not a regular file: '
                . $path
            );
        }

        clearstatcache(
            true,
            $path
        );

        $owner = fileowner(
            $path
        );

        if ($owner === false) {
            throw new RuntimeException(
                'Unable to resolve private runtime state owner: '
                . $path
            );
        }

        if (function_exists('posix_geteuid')) {
            $effectiveUserId = posix_geteuid();

            if ($owner !== $effectiveUserId) {
                throw new RuntimeException(
                    'Private runtime state owner does not match '
                    . 'effective process user: '
                    . $path
                );
            }
        }

        if (! @chmod($path, 0600)) {
            throw new RuntimeException(
                'Unable to enforce private runtime mode: '
                . $path
            );
        }

        clearstatcache(
            true,
            $path
        );

        $mode = fileperms($path);

        if (
            $mode === false
            || ($mode & 0777) !== 0600
        ) {
            throw new RuntimeException(
                'Private runtime state mode verification '
                . 'failed for: '
                . $path
            );
        }
    }

    private function writePrivateNewFile(
        string $path,
        string $contents
    ): void {
        $this->ensureRuntimeDirectory(
            dirname($path)
        );

        $handle = fopen(
            $path,
            'x+b'
        );

        if ($handle === false) {
            throw new RuntimeException(
                'Unable to create private runtime file: '
                . $path
            );
        }

        $success = false;
        $locked = false;

        try {
            /*
             * The inode may inherit permissive default ACLs
             * when it is created. It is still empty here.
             * Enforce and verify 0600 before any sensitive
             * bytes are written.
             */
            $this->enforcePrivateMode($path);

            if (! flock($handle, LOCK_EX)) {
                throw new RuntimeException(
                    'Unable to lock private runtime file: '
                    . $path
                );
            }

            $locked = true;
            $offset = 0;
            $length = strlen($contents);

            while ($offset < $length) {
                $written = fwrite(
                    $handle,
                    substr(
                        $contents,
                        $offset
                    )
                );

                if (
                    $written === false
                    || $written === 0
                ) {
                    throw new RuntimeException(
                        'Unable to write private runtime file: '
                        . $path
                    );
                }

                $offset += $written;
            }

            if (! fflush($handle)) {
                throw new RuntimeException(
                    'Unable to flush private runtime file: '
                    . $path
                );
            }

            $success = true;
        } finally {
            if ($locked) {
                flock(
                    $handle,
                    LOCK_UN
                );
            }

            fclose($handle);

            if (
                ! $success
                && is_file($path)
            ) {
                unlink($path);
            }
        }

        $this->enforcePrivateMode($path);
    }

    private function writePrivateAtomic(
        string $path,
        string $contents
    ): void {
        $this->ensureRuntimeDirectory(
            dirname($path)
        );

        $temporary = $path
            . '.tmp-'
            . bin2hex(random_bytes(6));

        try {
            $this->writePrivateNewFile(
                $temporary,
                $contents
            );

            if (! rename($temporary, $path)) {
                throw new RuntimeException(
                    'Unable to atomically replace '
                    . 'private runtime state.'
                );
            }

            $this->enforcePrivateMode($path);
        } finally {
            if (
                is_file($temporary)
                || is_link($temporary)
            ) {
                unlink($temporary);
            }
        }
    }

    private function readPrivateCopySource(
        string $source
    ): string {
        if (
            ! is_file($source)
            || is_link($source)
        ) {
            throw new RuntimeException(
                'Private runtime copy source is invalid: '
                . $source
            );
        }

        $contents = file_get_contents($source);

        if ($contents === false) {
            throw new RuntimeException(
                'Unable to read private runtime copy source: '
                . $source
            );
        }

        return $contents;
    }

    private function copyPrivateFile(
        string $source,
        string $destination
    ): void {
        $this->writePrivateNewFile(
            $destination,
            $this->readPrivateCopySource($source)
        );
    }

    private function replacePrivateFile(
        string $source,
        string $destination
    ): void {
        $this->writePrivateAtomic(
            $destination,
            $this->readPrivateCopySource($source)
        );
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function writeJsonAtomic(
        string $path,
        array $payload
    ): void {
        $encoded = json_encode(
            $payload,
            JSON_PRETTY_PRINT
                | JSON_UNESCAPED_SLASHES
                | JSON_THROW_ON_ERROR
        ) . PHP_EOL;

        $this->writePrivateAtomic(
            $path,
            $encoded
        );
    }

    public function missionPath(string $worktree): string
    {
        return rtrim(
            $this->normalizePath($worktree),
            '/'
        )
            . '/writable/aiops/'
            . 'current-thought-worktree.json';
    }

    private function resetOperatorPhase(
        string $worktree,
        array $mission
    ): string {
        $path = rtrim($worktree, '/')
            . '/writable/aiops/operator/'
            . 'phase-state.json';

        $payload = [
            'schema_version' => '2026-07-10.1',
            'phase' => 'planning',
            'context' => [
                'config_id' =>
                    (string) ($mission['config_id'] ?? ''),
                'mission_state' =>
                    (string) (
                        $mission['lifecycle_state']
                        ?? ''
                    ),
                'mutation_class' =>
                    (int) ($mission['mutation_class'] ?? 0),
                'force_active' => true,
                'reason' =>
                    (string) (
                        $mission['force_mutation_reason']
                        ?? ''
                    ),
            ],
            'updated_at' => date(DATE_ATOM),
            'path' => $path,
        ];

        $this->writeJsonAtomic(
            $path,
            $payload
        );

        return $path;
    }

    private function write(
        string $worktree,
        array $mission
    ): void {
        $this->writeJsonAtomic(
            $this->missionPath($worktree),
            $mission
        );
    }

    private function assertSafeWorktree(string $worktree): void
    {
        $production = $this->normalizePath('/apps/TBI/www/timothyburks/current');

        $allowedRoot = $this->normalizePath(
            $this->allowedWorktreeRoot
        );

        if (
            $allowedRoot === ''
            || $worktree === $allowedRoot
            || ! str_starts_with(
                $worktree,
                rtrim($allowedRoot, '/') . '/'
            )
        ) {
            throw new RuntimeException(
                'Worktree must be under '
                . rtrim($allowedRoot, '/')
                . '.'
            );
        }

        if ($worktree === $production) {
            throw new RuntimeException('Production runtime cannot be bound as a feature worktree.');
        }

        if (! is_dir($worktree . '/.git') && ! is_file($worktree . '/.git')) {
            throw new RuntimeException('Worktree is not a Git checkout: ' . $worktree);
        }
    }

    private function assertBranchMatches(array $config, string $worktree): void
    {
        $expected = (string) ($config['branch'] ?? '');
        $actual = trim((string) shell_exec('git -C ' . escapeshellarg($worktree) . ' branch --show-current 2>/dev/null'));

        if ($expected === '' || $actual === '' || $actual !== $expected) {
            throw new RuntimeException('Branch mismatch. Expected ' . $expected . ', found ' . $actual . '.');
        }

        if ($actual === 'main' || $actual === 'master') {
            throw new RuntimeException('Protected branch cannot be activated.');
        }
    }

    private function normalizePath(string $path): string
    {
        $resolved = realpath($path);

        return rtrim($resolved !== false ? $resolved : $path, '/');
    }
}
