<?php

namespace App\Services\AIOps\CommandWorkflow;

use App\Services\AIOps\ThoughtWorktreeMissionService;
use App\Services\AIOps\RepositoryRegistryService;
use Closure;

class WorkflowContextService
{
    private const CANONICAL_REPOSITORY =
        '/apps/TBI/repos/timothyburks';

    private const RUNTIME_LINK =
        '/apps/TBI/www/timothyburks/current';

    private RepositoryRegistryService $repositoryRegistry;

    private ?Closure $originMainRefresher;

    private ?Closure $recipeFileReader;

    private ?Closure $pullRequestResolver;

    private string $canonicalRepository;

    public function __construct(
        ?RepositoryRegistryService $repositoryRegistry = null,
        ?Closure $originMainRefresher = null,
        ?Closure $recipeFileReader = null,
        ?string $canonicalRepository = null,
        ?Closure $pullRequestResolver = null
    ) {
        $this->repositoryRegistry =
            $repositoryRegistry
            ?? new RepositoryRegistryService();

        $this->originMainRefresher =
            $originMainRefresher;

        $this->recipeFileReader =
            $recipeFileReader;

        $this->pullRequestResolver =
            $pullRequestResolver;

        $this->canonicalRepository = rtrim(
            $canonicalRepository
                ?? self::CANONICAL_REPOSITORY,
            '/'
        );
    }

    public function snapshot(string $cwd = ROOTPATH): array
    {
        $root = trim((string) shell_exec('git -C ' . escapeshellarg($cwd) . ' rev-parse --show-toplevel 2>/dev/null'));
        $root = $root !== '' ? $root : rtrim(ROOTPATH, '/');
        $branch = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' branch --show-current 2>/dev/null'));
        $head = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' rev-parse HEAD 2>/dev/null'));
        $origin = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' rev-parse origin/main 2>/dev/null'));
        $base = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' merge-base origin/main HEAD 2>/dev/null'));
        $status = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' status --short 2>/dev/null'));
        $canonicalRepo = realpath(
            $this->canonicalRepository
        ) ?: $this->canonicalRepository;

        $canonicalMain = trim(
            (string) shell_exec(
                'git -C '
                . escapeshellarg($canonicalRepo)
                . ' rev-parse origin/main 2>/dev/null'
            )
        );

        $shellCwd = trim(
            (string) getenv(
                'TBI_AIOPS_SHELL_CWD'
            )
        );

        if ($shellCwd === '') {
            $shellCwd =
                getcwd() ?: $cwd;
        }

        $runtimeRelease =
            realpath(
                self::RUNTIME_LINK
            ) ?: self::RUNTIME_LINK;

        $contributor = trim(
            (string) getenv('USER')
        );

        if (
            $contributor === ''
            && function_exists(
                'posix_getpwuid'
            )
            && function_exists(
                'posix_geteuid'
            )
        ) {
            $entry = posix_getpwuid(
                posix_geteuid()
            );

            if (
                is_array($entry)
                && isset($entry['name'])
            ) {
                $contributor =
                    (string) $entry['name'];
            }
        }

        $mission = (new ThoughtWorktreeMissionService())->load($root);
        if (
            trim(
                (string) (
                    $mission['contributor']
                    ?? ''
                )
            ) !== ''
        ) {
            $contributor = trim(
                (string) $mission['contributor']
            );
        }

        $exact = $mission !== [] && rtrim((string) ($mission['worktree'] ?? ''), '/') === rtrim($root, '/') && (string) ($mission['branch'] ?? '') === $branch;
        $repository = trim((string) shell_exec('git -C ' . escapeshellarg($root) . ' config --get remote.origin.url 2>/dev/null'));
        $contextIdentity = [
            'repository' => (string) ($mission['repository'] ?? $mission['repository_path'] ?? ($this->repositoryRegistry->resolveKeyForRemote($repository) ?? ($repository !== '' ? $repository : basename($root)))),
            'worktree' => $root,
            'branch' => $branch,
            'task_id' => (string) (
                $mission['task_id']
                ?? $mission['task']
                ?? ''
            ),
            'config_id' => (string) (
                $mission['config_id']
                ?? ''
            ),
            'config_path' => (string) (
                $mission['config_path']
                ?? ''
            ),
            'base_sha' => (string) ($mission['base_sha'] ?? $mission['baseline_commit'] ?? ($base !== '' ? $base : $head)),
            'mission_id' => (string) ($mission['mission_id'] ?? ''),
            'product' => (string) ($mission['product'] ?? $mission['product_id'] ?? $mission['project'] ?? ''),
        ];
        $contextResolution = (new WorkflowContextIdentityService())->resolve($root, $contextIdentity);
        $missionLifecycle = (string) (
            $mission['lifecycle_state']
            ?? 'missing'
        );
        $terminalMission = $exact
            && in_array(
                $missionLifecycle,
                [
                    ThoughtWorktreeMissionService::STATE_COMPLETED,
                    'closed',
                    'archived',
                    'superseded',
                ],
                true
            );

        $originMainRefresh = [
            'status' => 'CURRENT',
            'before' => $origin,
            'after' => $origin,
            'error' => '',
        ];

        if ($exact && ! $terminalMission) {
            $originMainRefresh =
                $this->refreshOriginMain(
                    $root,
                    $origin
                );

            $refreshedOrigin = trim(
                (string) (
                    $originMainRefresh['after']
                    ?? ''
                )
            );

            if ($refreshedOrigin !== '') {
                $origin = $refreshedOrigin;

                $base = trim(
                    (string) shell_exec(
                        'git -C '
                        . escapeshellarg($root)
                        . ' merge-base '
                        . escapeshellarg($origin)
                        . ' HEAD 2>/dev/null'
                    )
                );
            }
        }

        if ($terminalMission) {
            $contextResolution = [
                'status' => 'terminal_match',
                'rejection_reason' => '',
                'identity' => $contextIdentity,
                'config_path' => (string) (
                    $mission['config_path']
                    ?? ''
                ),
                'roadmap_path' => (string) (
                    $mission['roadmap_path']
                    ?? ''
                ),
                'feedback_path' => '',
                'inbox_path' => '',
            ];
        }

        $objective = $terminalMission
            ? []
            : $this->latestJson(
                $root . '/writable/aiops/objectives'
            );

        $recipe = $terminalMission
            ? []
            : $this->latestRecipe(
                $root,
                $mission,
                $objective,
                $branch,
                $head
            );

        $recipeId = trim(
            (string) ($recipe['recipe_id'] ?? '')
        );

        $provenanceRoot = trim(
            (string) (
                $recipe['workflow_store_root']
                ?? ''
            )
        );

        if ($provenanceRoot === '') {
            $provenanceRoot = $root;
        }

        $executionsDir =
            $provenanceRoot
            . '/writable/aiops/recipes/executions';

        $missionConfigId = trim((string) ($mission['config_id'] ?? ''));

        $canonicalExecutionId = trim(
            (string) (
                $recipe['execution_id']
                ?? ''
            )
        );

        $execution = $terminalMission
            ? []
            : $this->latestExecutionForMission(
                $executionsDir,
                $recipeId,
                $missionConfigId,
                $canonicalExecutionId
            );

        $executionId = trim(
            (string) (
                $execution['execution_id']
                ?? (
                    $execution['record']['execution_id']
                    ?? ''
                )
            )
        );

        $validation = $terminalMission
            ? []
            : $this->latestValidationForMission(
                $provenanceRoot . '/writable/aiops/validation/runs',
                $recipeId,
                $executionId,
                $missionConfigId
            );

        $recovery = $terminalMission
            ? []
            : $this->latestRecoveryForMission(
                $provenanceRoot . '/writable/aiops/recovery/plans',
                $recipeId,
                $this->missionExecutionIds(
                    $executionsDir,
                    $missionConfigId
                ),
                $executionId
            );

        $baselineDrift = $terminalMission
            ? 'in_bounds'
            : match (
                (string) (
                    $originMainRefresh['status']
                    ?? 'CURRENT'
                )
            ) {
                'REFRESH_FAILED' =>
                    'origin_main_refresh_failed',
                'NON_ANCESTOR' =>
                    'origin_main_non_ancestor',
                'LINEAR_ADVANCE' =>
                    $this->baselineDrift(
                        $root,
                        $origin,
                        $head,
                        $mission,
                        $objective,
                        $branch
                    ),
                default => $this->baselineDrift(
                    $root,
                    $origin,
                    $head,
                    $mission,
                    $objective,
                    $branch
                ),
            };

        $pullRequest = [
            'state' => 'not_applicable',
            'number' => '',
            'head' => '',
            'url' => '',
            'merge_state' => '',
        ];

        $classifier = new WorkflowFailureClassifier();
        $failure = 'missing_persisted_mission';

        if ($mission !== []) {
            if (! $exact) {
                $failure = (
                    (string) ($mission['worktree'] ?? '')
                    !== $root
                )
                    ? 'mission_worktree_mismatch'
                    : 'mission_branch_mismatch';
            } elseif ($terminalMission) {
                $failure = 'merged_or_archived_worktree';
            } else {
                $failure = $this->activeFailureClass(
                    $recipe,
                    $execution,
                    $recovery,
                    $objective,
                    $validation,
                    $baselineDrift
                );

                if ($failure === 'recipe_review_required') {
                    $pullRequest = $this->resolvePullRequestState(
                        $root,
                        $branch,
                        $head
                    );

                    $failure = $this->activeFailureClass(
                        $recipe,
                        $execution,
                        $recovery,
                        $objective,
                        $validation,
                        $baselineDrift,
                        $pullRequest
                    );
                }
            }
        }

        if ($branch === '') {
            $failure = 'detached_head';
        }

        if (
            in_array(
                $branch,
                ['main', 'master'],
                true
            )
            && $status !== ''
        ) {
            $failure = 'dirty_main';
        }

        if (! is_dir($root . '/vendor')) {
            $failure = 'missing_vendor';
        }

        if (! is_file($root . '/.env')) {
            $failure = 'missing_env';
        }

        if (! is_dir($root . '/writable')) {
            $failure = 'missing_writable_paths';
        }

        $guide = $classifier->guidance(
            $failure,
            [
                'mission_worktree' => (
                    $mission['worktree'] ?? ''
                ),
                'mission_branch' => (
                    $mission['branch'] ?? ''
                ),
                'worktree' => $root,
                'branch' => $branch,
                'config_id' => (string) ($mission['config_id'] ?? ''),
                'mission_objective' => (string) (
                    $mission['objective']
                    ?? $mission['thought']
                    ?? $mission['title']
                    ?? ''
                ),
                'recipe_id' => $recipeId,
                'execution_id' => $executionId,
                'pr_number' => (string) (
                    $pullRequest['number'] ?? ''
                ),
                'pr_state' => (string) (
                    $pullRequest['state'] ?? ''
                ),
                'recipe_store_error_path' =>
                    (string) (
                        $recipe[
                            'recipe_store_error_path'
                        ]
                        ?? ''
                    ),
                'recipe_store_error_store' =>
                    (string) (
                        $recipe[
                            'recipe_store_error_store'
                        ]
                        ?? ''
                    ),
                'recipe_store_error_reason' =>
                    (string) (
                        $recipe[
                            'recipe_store_error_reason'
                        ]
                        ?? ''
                    ),
            ]
        );

        $recipeStoreFailure = trim(
            (string) (
                $recipe['recipe_store_error_class']
                ?? ''
            )
        );

        $mutationPermission =
            (new ThoughtWorktreeMissionService())
                ->mutationAllowed($mission)
            && ! in_array(
                $recipeStoreFailure,
                [
                    'recipe_store_unreadable',
                    'recipe_store_invalid',
                ],
                true
            );

        return [
            'repository' =>
                $this->repositoryRegistry
                    ->resolveKeyForRemote(
                        $repository
                    )
                    ?? basename($root),

            'canonical_repo' =>
                $canonicalRepo,

            'canonical_main_sha' =>
                $canonicalMain,

            'shell_cwd' =>
                $shellCwd,

            'working_directory' =>
                getcwd() ?: $cwd,

            'git_root' =>
                $root,

            'worktree' =>
                $root,

            'runtime_release' =>
                $runtimeRelease,

            'contributor' =>
                $contributor,

            'objective_id' =>
                (string) (
                    $objective['objective_id']
                    ?? ''
                ),

            'objective_text' =>
                (string) (
                    $objective['prompt']
                    ?? $objective['objective']
                    ?? $objective['title']
                    ?? ''
                ),
            'branch' => $branch, 'head' => $head, 'origin_main' => $origin, 'source_status_count' => $status === '' ? 0 : count(explode("\n", $status)),
            'origin_main_refresh_state' =>
                (string) (
                    $originMainRefresh['status']
                    ?? 'CURRENT'
                ),
            'origin_main_refresh' =>
                $originMainRefresh,
            'status' => $status, 'config_id' => (string) ($mission['config_id'] ?? 'unbound'), 'mission' => $mission,
            'context_identity' => $contextIdentity, 'context_resolution' => $contextResolution,
            'context_status' => (string) ($contextResolution['status'] ?? 'rejected'),
            'context_rejection_reason' => (string) ($contextResolution['rejection_reason'] ?? 'unknown_context_rejection'),
            'mission_exact_match' => $exact, 'mission_lifecycle' => $missionLifecycle,
            'mission_phase' => (string) ($mission['phase'] ?? 'missing'), 'mission_task' => (string) ($mission['task'] ?? 'missing'),
            'mutation_class' => (int) ($mission['mutation_class'] ?? 0), 'mutation_permission' => $mutationPermission,
            'objective' => $objective,
            'recipe' => $recipe,
            'recipe_store_error' =>
                $recipeStoreFailure === ''
                    ? []
                    : [
                        'class' =>
                            $recipeStoreFailure,
                        'store' =>
                            (string) (
                                $recipe[
                                    'recipe_store_error_store'
                                ]
                                ?? ''
                            ),
                        'path' =>
                            (string) (
                                $recipe[
                                    'recipe_store_error_path'
                                ]
                                ?? ''
                            ),
                        'reason' =>
                            (string) (
                                $recipe[
                                    'recipe_store_error_reason'
                                ]
                                ?? ''
                            ),
                    ],
            'execution' => $execution,
            'validation' => $validation,
            'recovery' => $recovery,
            'pull_request' => $pullRequest,
            'pull_request_state' => (string) (
                $pullRequest['state'] ?? ''
            ),
            'operator' => $this->latestJson($root . '/writable/aiops/operator'),
            'transition' => $this->latestJson($root . '/writable/aiops/transitions'),
            'recipe_state' => $terminalMission
                ? 'closed'
                : (string) ($recipe['status'] ?? 'none'),
            'execution_state' => $this->recordState($execution),
            'validation_state' => $this->recordState($validation),
            'recovery_state' => $this->recordState($recovery),
            'wrapper_sync' => $this->wrapperSync($root), 'baseline_drift' => $baselineDrift,
            'failure_class' => $failure, 'guidance' => $guide,
        ];
    }

    /**
     * Refresh exactly origin/main for an active nonterminal mission.
     *
     * @return array{
     *     status:string,
     *     before:string,
     *     after:string,
     *     error:string
     * }
     */
    private function refreshOriginMain(
        string $root,
        string $before
    ): array {
        $before = trim($before);

        try {
            if (
                $this->originMainRefresher
                instanceof Closure
            ) {
                $response = (
                    $this->originMainRefresher
                )(
                    $root,
                    $before
                );

                if (
                    ! is_array($response)
                    || ($response['ok'] ?? false)
                        !== true
                ) {
                    return [
                        'status' => 'REFRESH_FAILED',
                        'before' => $before,
                        'after' => $before,
                        'error' => trim(
                            (string) (
                                is_array($response)
                                    ? (
                                        $response['error']
                                        ?? 'refresher_failed'
                                    )
                                    : 'refresher_invalid'
                            )
                        ),
                    ];
                }

                return $this
                    ->classifyOriginMainRefresh(
                        $root,
                        $before,
                        trim(
                            (string) (
                                $response['after']
                                ?? ''
                            )
                        )
                    );
            }

            $command =
                'umask 0002 && git -C '
                . escapeshellarg($root)
                . ' fetch --no-tags origin '
                . escapeshellarg(
                    '+refs/heads/main:'
                    . 'refs/remotes/origin/main'
                )
                . ' 2>&1';

            $output = [];
            $exitCode = 1;

            exec(
                $command,
                $output,
                $exitCode
            );

            if ($exitCode !== 0) {
                return [
                    'status' => 'REFRESH_FAILED',
                    'before' => $before,
                    'after' => $before,
                    'error' => mb_substr(
                        trim(
                            implode(
                                PHP_EOL,
                                $output
                            )
                        ),
                        0,
                        1200
                    ),
                ];
            }

            $after = trim(
                (string) shell_exec(
                    'git -C '
                    . escapeshellarg($root)
                    . ' rev-parse --verify '
                    . escapeshellarg(
                        'refs/remotes/origin/main'
                    )
                    . ' 2>/dev/null'
                )
            );

            return $this
                ->classifyOriginMainRefresh(
                    $root,
                    $before,
                    $after
                );
        } catch (\Throwable $exception) {
            return [
                'status' => 'REFRESH_FAILED',
                'before' => $before,
                'after' => $before,
                'error' => mb_substr(
                    $exception->getMessage(),
                    0,
                    1200
                ),
            ];
        }
    }

    /**
     * @return array{
     *     status:string,
     *     before:string,
     *     after:string,
     *     error:string
     * }
     */
    private function classifyOriginMainRefresh(
        string $root,
        string $before,
        string $after
    ): array {
        $before = strtolower(trim($before));
        $after = strtolower(trim($after));

        if (
            preg_match(
                '/^[a-f0-9]{40}$/',
                $after
            ) !== 1
            || ! $this->gitCommitExists(
                $root,
                $after
            )
        ) {
            return [
                'status' => 'REFRESH_FAILED',
                'before' => $before,
                'after' => $after,
                'error' =>
                    'origin_main_after_invalid',
            ];
        }

        if ($before === '') {
            return [
                'status' => 'CURRENT',
                'before' => '',
                'after' => $after,
                'error' => '',
            ];
        }

        if (
            preg_match(
                '/^[a-f0-9]{40}$/',
                $before
            ) !== 1
            || ! $this->gitCommitExists(
                $root,
                $before
            )
        ) {
            return [
                'status' => 'REFRESH_FAILED',
                'before' => $before,
                'after' => $after,
                'error' =>
                    'origin_main_before_invalid',
            ];
        }

        if ($before === $after) {
            return [
                'status' => 'CURRENT',
                'before' => $before,
                'after' => $after,
                'error' => '',
            ];
        }

        return [
            'status' =>
                $this->commitIsAncestor(
                    $root,
                    $before,
                    $after
                )
                    ? 'LINEAR_ADVANCE'
                    : 'NON_ANCESTOR',
            'before' => $before,
            'after' => $after,
            'error' => '',
        ];
    }

    private function gitCommitExists(
        string $root,
        string $commit
    ): bool {
        $command =
            'git -C '
            . escapeshellarg($root)
            . ' cat-file -e '
            . escapeshellarg(
                $commit . '^{commit}'
            )
            . ' >/dev/null 2>&1';

        exec(
            $command,
            $output,
            $exitCode
        );

        return $exitCode === 0;
    }

    private function commitIsAncestor(
        string $root,
        string $ancestor,
        string $descendant
    ): bool {
        $command =
            'git -C '
            . escapeshellarg($root)
            . ' merge-base --is-ancestor '
            . escapeshellarg($ancestor)
            . ' '
            . escapeshellarg($descendant)
            . ' >/dev/null 2>&1';

        exec(
            $command,
            $output,
            $exitCode
        );

        return $exitCode === 0;
    }

    /**
     * Determine baseline drift before lower-priority workflow state.
     *
     * @param array<string, mixed> $mission
     * @param array<string, mixed> $objective
     */
    private function baselineDrift(
        string $root,
        string $origin,
        string $head,
        array $mission,
        array $objective,
        string $branch
    ): string {
        if ($head === '') {
            return 'unknown';
        }

        $configBaseline =
            $this->boundConfigBaseline(
                $mission
            );

        $approvedBaseline = trim(
            (string) (
                $mission['base_sha']
                ?? $mission['baseline_commit']
                ?? ''
            )
        );

        if ($approvedBaseline === '') {
            $approvedBaseline =
                $configBaseline;
        }

        if ($approvedBaseline === '') {
            $approvedBaseline = trim(
                (string) shell_exec(
                    'git -C '
                    . escapeshellarg($root)
                    . ' merge-base origin/main HEAD'
                    . ' 2>/dev/null'
                )
            );
        }

        if (
            $approvedBaseline === ''
            && $origin !== ''
        ) {
            $approvedBaseline = $origin;
        }

        if ($approvedBaseline === '') {
            return 'unknown';
        }

        /*
         * Feature HEAD identity must remain descended from the
         * approved baseline before any linear origin/main advance
         * may be treated as review-only closeout drift.
         */
        if (
            ! $this->commitIsAncestor(
                $root,
                $approvedBaseline,
                $head
            )
        ) {
            return 'origin_main_non_ancestor';
        }

        if (
            $origin !== ''
            && strtolower($origin)
                !== strtolower(
                    $approvedBaseline
                )
        ) {
            return $this->commitIsAncestor(
                $root,
                $approvedBaseline,
                $origin
            )
                ? 'origin_main_advanced'
                : 'origin_main_non_ancestor';
        }

        if (
            $configBaseline !== ''
            && strtolower($configBaseline)
                !== strtolower(
                    $approvedBaseline
                )
        ) {
            return 'origin_main_advanced';
        }

        $objectiveBaseline = trim(
            (string) (
                $objective['baseline_commit']
                ?? ''
            )
        );

        if (
            $objectiveBaseline !== ''
            && strtolower(
                $objectiveBaseline
            ) !== strtolower(
                $approvedBaseline
            )
        ) {
            return 'origin_main_advanced';
        }

        if (
            $this->hasStaleRecipeBaseline(
                $root,
                $mission,
                $objective,
                $branch,
                $approvedBaseline
            )
        ) {
            return 'stale_recipe_baseline';
        }

        return 'in_bounds';
    }

    /** @param array<string, mixed> $mission */
    private function boundConfigBaseline(array $mission): string
    {
        $path = trim((string) ($mission['config_path'] ?? ''));

        if ($path === '' || ! is_file($path)) {
            return '';
        }

        $normalized = str_replace('\\', '/', $path);

        if (! str_contains(
            $normalized,
            '/writable/aiops/thought-worktrees/configs/'
        )) {
            return '';
        }

        $decoded = json_decode((string) file_get_contents($path), true);

        return is_array($decoded)
            ? trim((string) ($decoded['base_sha'] ?? ''))
            : '';
    }

    /**
     * @param array<string, mixed> $mission
     * @param array<string, mixed> $objective
     */
    private function hasStaleRecipeBaseline(
        string $root,
        array $mission,
        array $objective,
        string $branch,
        string $origin
    ): bool {
        $files = array_merge(
            glob($root . '/writable/aiops/recipes/drafts/*.json') ?: [],
            glob($root . '/writable/aiops/recipes/approved/*.json') ?: []
        );
        $configId = trim((string) ($mission['config_id'] ?? ''));
        $missionId = trim((string) ($mission['mission_id'] ?? ''));
        $objectiveId = trim((string) ($objective['objective_id'] ?? ''));

        foreach ($files as $file) {
            $recipe =
                $this->historicalJsonRecord(
                    $file
                );

            if ($recipe === []) {
                continue;
            }

            if (
                ($recipe['status'] ?? '') === 'superseded'
                || ($recipe['approval_blocked'] ?? false) === true
            ) {
                continue;
            }

            $recipeConfigId = trim(
                (string) (
                    $recipe['config_id']
                    ?? ''
                )
            );

            if ($configId !== '') {
                /*
                 * Baseline reconciliation authority is scoped to the
                 * exact active config. Do not allow a foreign-config
                 * recipe to block the lane merely because a mission or
                 * objective identifier happens to match.
                 */
                if ($recipeConfigId !== $configId) {
                    continue;
                }
            } else {
                /*
                 * Legacy fallback is retained only when the active
                 * mission itself does not provide config identity.
                 */
                $legacyIdentityMatch = (
                    $missionId !== ''
                    && trim(
                        (string) (
                            $recipe['mission_id']
                            ?? ''
                        )
                    ) === $missionId
                ) || (
                    $objectiveId !== ''
                    && trim(
                        (string) (
                            $recipe['objective_id']
                            ?? ''
                        )
                    ) === $objectiveId
                );

                if (! $legacyIdentityMatch) {
                    continue;
                }
            }

            $recipeWorktree = trim((string) (
                $recipe['expected_worktree']
                ?? ($recipe['worktree'] ?? '')
            ));

            if (
                $recipeWorktree !== ''
                && $this->normalizedPath($recipeWorktree)
                    !== $this->normalizedPath($root)
            ) {
                continue;
            }

            $recipeBranch = trim((string) (
                $recipe['expected_branch']
                ?? ($recipe['branch'] ?? '')
            ));

            if ($recipeBranch !== '' && $recipeBranch !== $branch) {
                continue;
            }

            $recipeBaseline = trim((string) (
                $recipe['approved_baseline_commit']
                ?? ($recipe['baseline_commit'] ?? '')
            ));

            if (
                $recipeBaseline !== ''
                && strtolower($recipeBaseline) !== strtolower($origin)
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine the exact next workflow state for an active mission.
     *
     * @param array<string, mixed> $recipe
     * @param array<string, mixed> $execution
     * @param array<string, mixed> $recovery
     * @param array<string, mixed> $validation
     */
    private function activeFailureClass(
        array $recipe,
        array $execution,
        array $recovery,
        array $objective = [],
        array $validation = [],
        string $baselineDrift = 'in_bounds',
        array $pullRequest = []
    ): string {
        $recipeStoreFailure = trim(
            (string) (
                $recipe['recipe_store_error_class']
                ?? ''
            )
        );

        if (
            in_array(
                $recipeStoreFailure,
                [
                    'recipe_store_unreadable',
                    'recipe_store_invalid',
                ],
                true
            )
        ) {
            return $recipeStoreFailure;
        }

        /*
         * Non-linear or unverifiable baseline movement remains a hard
         * safety stop even after recipe validation.
         */
        if (in_array(
            $baselineDrift,
            [
                'origin_main_refresh_failed',
                'origin_main_non_ancestor',
            ],
            true
        )) {
            return $baselineDrift;
        }

        /*
         * A linear main advance must not strand already-completed,
         * validated Class-1 work behind baseline reconciliation that can
         * no longer execute for a diverged feature HEAD with live recipe
         * provenance.
         *
         * This transition grants no new mutation authority. It only allows
         * the validated result to enter governed review/finish.
         */
        $closeoutRecipeState =
            $this->normalizedState(
                $recipe,
                [
                    'status',
                    'approval_status',
                ]
            );

        $closeoutExecutionState =
            $this->normalizedState(
                $recipe,
                [
                    'execution_state',
                    'run_state',
                ]
            );

        $closeoutRecipeSuperseded =
            (
                ($recipe['status'] ?? '')
                    === 'superseded'
                || ($recipe['approval_blocked'] ?? false)
                    === true
            )
            && (
                (
                    $recipe[
                        '_workflow_reconciled_integrated_source_mutation'
                    ]
                    ?? false
                ) !== true
            );

        $validatedCloseout =
            $recipe !== []
            && ! $closeoutRecipeSuperseded
            && ! $this->mutationReviewRequiresSuccessor(
                $recipe,
                $execution,
                $validation
            )
            && (
                $closeoutRecipeState === 'validated'
                || $closeoutExecutionState === 'validated'
            );

        if (
            $validatedCloseout
            && in_array(
                $baselineDrift,
                [
                    'origin_main_advanced',
                    'stale_recipe_baseline',
                ],
                true
            )
        ) {
            return $this->reviewFailureClass($pullRequest);
        }

        if (in_array(
            $baselineDrift,
            [
                'origin_main_advanced',
                'stale_recipe_baseline',
            ],
            true
        )) {
            return $baselineDrift;
        }

        if (
            $this->mutationReviewRequiresSuccessor(
                $recipe,
                $execution,
                $validation
            )
        ) {
            return 'recipe_mutation_successor_required';
        }

        if ($recipe === [] && $objective === []) {
            return 'objective_missing';
        }

        if ($recipe === []) {
            return 'recipe_missing';
        }

        $provenIntegratedReconciliation =
            ($recipe[
                '_workflow_reconciled_integrated_source_mutation'
            ] ?? false) === true;

        if (
            (
                ($recipe['status'] ?? '') === 'superseded'
                || ($recipe['approval_blocked'] ?? false) === true
            )
            && ! $provenIntegratedReconciliation
        ) {
            return 'recipe_superseded';
        }

        $recipeState = $this->normalizedState(
            $recipe,
            [
                'status',
                'approval_status',
            ]
        );

        $recipeExecutionState = $this->normalizedState(
            $recipe,
            [
                'execution_state',
                'run_state',
            ]
        );

        if (
            $recipeState === 'validated'
            || $recipeExecutionState === 'validated'
        ) {
            return $this->reviewFailureClass($pullRequest);
        }

        $approved = (
            ($recipe['approved'] ?? false) === true
            || ($recipe['approval_status'] ?? '')
                === 'approved'
            || in_array(
                $recipeState,
                [
                    'approved',
                    'executed',
                    'complete',
                    'completed',
                    'validated',
                ],
                true
            )
        );

        if (! $approved) {
            return 'recipe_approval_required';
        }

        $recoveryState = $this->recordState(
            $recovery
        );

        if (
            $recovery !== []
            && ! in_array(
                $recoveryState,
                [
                    'none',
                    'resolved',
                    'complete',
                    'completed',
                    'success',
                    'succeeded',
                    'validated',
                ],
                true
            )
        ) {
            return 'recipe_execution_failed';
        }

        $executionState = $this->recordState(
            $execution
        );

        if (
            $executionState === 'none'
            && $recipeExecutionState !== ''
            && $recipeExecutionState !== 'approved'
        ) {
            $executionState = $recipeExecutionState;
        }

        $failedExecutionStates = [
            'failed',
            'failure',
            'blocked',
            'error',
            'rejected',
            'cancelled',
            'canceled',
        ];

        $recoveryState = $this->recordState(
            $recovery
        );

        $resolvedRecovery = in_array(
            $recoveryState,
            [
                'resolved',
                'complete',
                'completed',
                'success',
                'succeeded',
                'validated',
            ],
            true
        );

        $executionId = trim(
            (string) ($execution['execution_id'] ?? '')
        );
        $executionRecipeId = trim(
            (string) ($execution['recipe_id'] ?? '')
        );
        $recoveryExecutionId = trim(
            (string) ($recovery['execution_id'] ?? '')
        );
        $recoveryRecipeId = trim(
            (string) ($recovery['recipe_id'] ?? '')
        );

        $summary = is_array(
            $execution['summary'] ?? null
        ) ? $execution['summary'] : [];

        $filesChanged = is_array(
            $execution['files_changed'] ?? null
        ) ? $execution['files_changed'] : [];

        $safeZeroChangeRecovery =
            $resolvedRecovery
            && $executionId !== ''
            && $executionRecipeId !== ''
            && $recoveryExecutionId === $executionId
            && $recoveryRecipeId === $executionRecipeId
            && array_key_exists(
                'mutations_applied',
                $summary
            )
            && (int) $summary['mutations_applied'] === 0
            && $filesChanged === [];

        if (
            $safeZeroChangeRecovery
            && in_array(
                $executionState,
                $failedExecutionStates,
                true
            )
        ) {
            if (
                $this->recoveryAuthorizesSameRecipeRetry(
                    $recovery
                )
            ) {
                $executionState = 'none';
            } else {
                return 'resolved_recovery_successor_required';
            }
        }

        if (
            in_array(
                $executionState,
                $failedExecutionStates,
                true
            )
        ) {
            return 'recipe_execution_failed';
        }

        if (
            in_array(
                $executionState,
                [
                    'running',
                    'executing',
                    'started',
                    'pending',
                    'in_progress',
                    'in-progress',
                ],
                true
            )
        ) {
            return 'recipe_execution_in_progress';
        }

        $executionMode = strtolower(
            trim(
                (string) (
                    $execution['mode']
                    ?? ''
                )
            )
        );

        $executionStatus = strtolower(
            trim(
                (string) (
                    $execution['status']
                    ?? ''
                )
            )
        );

        $executionMutationAllowed =
            ($execution['mutation_allowed'] ?? false)
            === true;

        $recipeType = trim(
            (string) (
                $recipe['recipe_type']
                ?? ''
            )
        );

        $mutationEligibleRecipe =
            ($recipe['mutation_allowed'] ?? false)
                === true
            || in_array(
                $recipeType,
                [
                    'deterministic_class1_source_mutation_plan',
                    'governed_ollama_class1_source_patch_plan',
                ],
                true
            );

        if (
            $mutationEligibleRecipe
            && $execution !== []
            && $executionMode === 'dry_run'
            && ! $executionMutationAllowed
            && in_array(
                $executionStatus,
                [
                    'complete',
                    'completed',
                    'success',
                    'succeeded',
                    'validated',
                ],
                true
            )
        ) {
            return 'recipe_mutation_execution_required';
        }

        if ($executionState === 'validated') {
            return $this->reviewFailureClass($pullRequest);
        }

        if (
            in_array(
                $executionState,
                [
                    'executed',
                    'complete',
                    'completed',
                    'success',
                    'succeeded',
                ],
                true
            )
        ) {
            $validationState = $this->recordState(
                $validation
            );

            $validationMode = strtolower(
                trim(
                    (string) (
                        $validation['mode']
                        ?? ''
                    )
                )
            );

            if (
                $validationMode === 'run'
                && in_array(
                    $validationState,
                    [
                        'pass',
                        'success',
                        'succeeded',
                        'validated',
                    ],
                    true
                )
            ) {
                return $this->reviewFailureClass($pullRequest);
            }

            return 'recipe_validation_required';
        }

        return 'recipe_execution_required';
    }


    /**
     * Mutation-eligible work may enter review only when the canonical
     * execution selected by latestExecutionForMission() proves that source
     * mutation actually applied. A later safe idempotent replay therefore
     * remains compatible with the #1154 backward provenance walk.
     *
     * @param array<string,mixed> $recipe
     * @param array<string,mixed> $execution
     * @param array<string,mixed> $validation
     */
    private function mutationReviewRequiresSuccessor(
        array $recipe,
        array $execution,
        array $validation
    ): bool {
        if (
            $recipe === []
            || (
                $recipe[
                    '_workflow_reconciled_integrated_source_mutation'
                ] ?? false
            ) === true
        ) {
            return false;
        }

        $recipeType = trim(
            (string) (
                $recipe['recipe_type']
                ?? ''
            )
        );

        $mutationEligible =
            ($recipe['mutation_allowed'] ?? false)
                === true
            || in_array(
                $recipeType,
                [
                    'deterministic_class1_source_mutation_plan',
                    'governed_ollama_class1_source_patch_plan',
                ],
                true
            );

        if (! $mutationEligible) {
            return false;
        }

        $payload = (
            isset($execution['record'])
            && is_array($execution['record'])
        )
            ? $execution['record']
            : $execution;

        $executionMode = strtolower(
            trim(
                (string) (
                    $payload['mode']
                    ?? ''
                )
            )
        );

        /*
         * A successful dry run still requires the explicit live mutation
         * transition. It must never be converted into successor planning.
         */
        if ($executionMode === 'dry_run') {
            return false;
        }

        $recipeState = $this->normalizedState(
            $recipe,
            [
                'status',
                'approval_status',
            ]
        );

        $recipeExecutionState =
            $this->normalizedState(
                $recipe,
                [
                    'execution_state',
                    'run_state',
                ]
            );

        $executionState =
            $this->recordState(
                $execution
            );

        $validationState =
            $this->recordState(
                $validation
            );

        $validationMode = strtolower(
            trim(
                (string) (
                    $validation['mode']
                    ?? ''
                )
            )
        );

        $reviewReady =
            $recipeState === 'validated'
            || $recipeExecutionState === 'validated'
            || $executionState === 'validated'
            || (
                $executionMode === 'run_allowlisted'
                && (
                    $payload['mutation_allowed']
                    ?? false
                ) === true
                && in_array(
                    $executionState,
                    [
                        'executed',
                        'complete',
                        'completed',
                        'success',
                        'succeeded',
                    ],
                    true
                )
                && $validationMode === 'run'
                && in_array(
                    $validationState,
                    [
                        'pass',
                        'success',
                        'succeeded',
                        'validated',
                    ],
                    true
                )
            );

        return $reviewReady
            && ! $this->hasApplyingMutationProvenance(
                $execution
            );
    }

    /**
     * Positive applying provenance is deliberately narrower than
     * files_changed. It requires an authorized run, positive applied
     * mutation count, execution-bound journal/rollback evidence, and
     * nonempty changed paths. FinishScope remains the final stricter guard.
     *
     * @param array<string,mixed> $execution
     */
    private function hasApplyingMutationProvenance(
        array $execution
    ): bool {
        $payload = (
            isset($execution['record'])
            && is_array($execution['record'])
        )
            ? $execution['record']
            : $execution;

        if ($payload === []) {
            return false;
        }

        $summary = is_array(
            $payload['summary'] ?? null
        )
            ? $payload['summary']
            : [];

        $filesChanged = is_array(
            $payload['files_changed'] ?? null
        )
            ? array_values(
                array_filter(
                    $payload['files_changed'],
                    static fn ($path): bool =>
                        trim((string) $path) !== ''
                )
            )
            : [];

        return
            strtolower(
                trim(
                    (string) (
                        $payload['mode']
                        ?? ''
                    )
                )
            ) === 'run_allowlisted'
            && (
                $payload['mutation_allowed']
                ?? false
            ) === true
            && strtolower(
                trim(
                    (string) (
                        $payload['status']
                        ?? ''
                    )
                )
            ) === 'complete'
            && trim(
                (string) (
                    $payload['failure_reason']
                    ?? ''
                )
            ) === ''
            && array_key_exists(
                'total_mutations',
                $summary
            )
            && (int) $summary['total_mutations'] > 0
            && (int) (
                $summary['mutations_applied']
                ?? 0
            ) > 0
            && (int) (
                $summary['failed_commands']
                ?? 0
            ) === 0
            && trim(
                (string) (
                    $payload['mutation_journal']
                    ?? ''
                )
            ) !== ''
            && trim(
                (string) (
                    $payload['rollback_artifact_path']
                    ?? ''
                )
            ) !== ''
            && $filesChanged !== [];
    }


    /**
     * A resolved failed zero-change execution may retry the same
     * recipe only when recovery evidence explicitly says so.
     *
     * @param array<string,mixed> $recovery
     */
    private function recoveryAuthorizesSameRecipeRetry(
        array $recovery
    ): bool {
        foreach (
            [
                'same_recipe_retry_authorized',
                'retry_same_recipe_authorized',
                'retry_authorized',
            ]
            as $field
        ) {
            if (($recovery[$field] ?? false) === true) {
                return true;
            }
        }

        $retry = is_array(
            $recovery['retry'] ?? null
        )
            ? $recovery['retry']
            : [];

        foreach (
            [
                'same_recipe_authorized',
                'same_recipe_retry_authorized',
            ]
            as $field
        ) {
            if (($retry[$field] ?? false) === true) {
                return true;
            }
        }

        $decision = strtolower(
            trim(
                (string) (
                    $recovery['resolution_action']
                    ?? $recovery['next_action']
                    ?? $recovery['resolution_decision']
                    ?? ''
                )
            )
        );

        return in_array(
            $decision,
            [
                'retry_same_recipe',
                'retry_recipe',
                'same_recipe_retry',
            ],
            true
        );
    }

    /**
     * Map exact GitHub closeout state to the actual immediate
     * workflow prerequisite.
     *
     * @param array<string,mixed> $pullRequest
     */
    private function reviewFailureClass(
        array $pullRequest
    ): string {
        $state = strtolower(
            trim(
                (string) (
                    $pullRequest['state']
                    ?? ''
                )
            )
        );

        return match ($state) {
            'draft' =>
                'pr_draft_review_required',

            'checks_pending' =>
                'pr_checks_pending',

            'checks_failed' =>
                'pr_checks_failed',

            'checks_unavailable' =>
                'pr_checks_unavailable',

            'ready' =>
                'pr_finish_eligible',

            'merged' =>
                'pr_merged_convergence_required',

            'head_mismatch' =>
                'pr_head_mismatch',

            'unavailable' =>
                'pr_state_unavailable',

            'blocked' =>
                'pr_blocked',

            default =>
                'recipe_review_required',
        };
    }

    /**
     * Read current PR state without mutating source or workflow
     * state. Tests may inject raw GitHub metadata.
     *
     * @return array<string,mixed>
     */
    private function resolvePullRequestState(
        string $root,
        string $branch,
        string $head
    ): array {
        $empty = [
            'state' => 'none',
            'number' => '',
            'head' => '',
            'url' => '',
            'merge_state' => '',
        ];

        if (
            $branch === ''
            || in_array(
                strtolower($branch),
                ['main', 'master'],
                true
            )
        ) {
            $empty['state'] = 'not_applicable';

            return $empty;
        }

        if (
            $this->pullRequestResolver
            instanceof Closure
        ) {
            try {
                $record = (
                    $this->pullRequestResolver
                )(
                    $root,
                    $branch,
                    $head
                );
            } catch (\Throwable) {
                $empty['state'] = 'unavailable';

                return $empty;
            }

            if (! is_array($record)) {
                $empty['state'] = 'unavailable';

                return $empty;
            }

            return $this->classifyPullRequestState(
                $record,
                $head
            );
        }

        $output = [];
        $exitCode = 1;

        exec(
            'cd '
            . escapeshellarg($root)
            . ' && gh pr list'
            . ' --head '
            . escapeshellarg($branch)
            . ' --state all'
            . ' --limit 1'
            . ' --json number'
            . ' 2>/dev/null',
            $output,
            $exitCode
        );

        if ($exitCode !== 0) {
            $empty['state'] = 'unavailable';

            return $empty;
        }

        $list = json_decode(
            trim(implode(PHP_EOL, $output)),
            true
        );

        if (! is_array($list)) {
            $empty['state'] = 'unavailable';

            return $empty;
        }

        if ($list === []) {
            return $empty;
        }

        $number = trim(
            (string) (
                $list[0]['number']
                ?? ''
            )
        );

        if (
            $number === ''
            || preg_match('/^[0-9]+$/', $number)
                !== 1
        ) {
            $empty['state'] = 'unavailable';

            return $empty;
        }

        $fields = implode(
            ',',
            [
                'number',
                'state',
                'url',
                'isDraft',
                'mergeStateStatus',
                'headRefOid',
                'mergedAt',
                'statusCheckRollup',
            ]
        );

        $output = [];

        exec(
            'cd '
            . escapeshellarg($root)
            . ' && gh pr view '
            . escapeshellarg($number)
            . ' --json '
            . escapeshellarg($fields)
            . ' 2>/dev/null',
            $output,
            $exitCode
        );

        if ($exitCode !== 0) {
            $empty['state'] = 'unavailable';
            $empty['number'] = $number;

            return $empty;
        }

        $record = json_decode(
            trim(implode(PHP_EOL, $output)),
            true
        );

        if (! is_array($record)) {
            $empty['state'] = 'unavailable';
            $empty['number'] = $number;

            return $empty;
        }

        return $this->classifyPullRequestState(
            $record,
            $head
        );
    }

    /**
     * @param array<string,mixed> $record
     * @return array<string,mixed>
     */
    private function classifyPullRequestState(
        array $record,
        string $head
    ): array {
        $number = trim(
            (string) (
                $record['number']
                ?? ''
            )
        );

        $result = [
            'state' => 'unavailable',
            'number' => $number,
            'head' => trim(
                (string) (
                    $record['headRefOid']
                    ?? ''
                )
            ),
            'url' => trim(
                (string) (
                    $record['url']
                    ?? ''
                )
            ),
            'merge_state' => strtoupper(
                trim(
                    (string) (
                        $record['mergeStateStatus']
                        ?? ''
                    )
                )
            ),
        ];

        if (
            $number === ''
            || preg_match(
                '/^[0-9]+$/',
                $number
            ) !== 1
        ) {
            return $result;
        }

        $githubState = strtoupper(
            trim(
                (string) (
                    $record['state']
                    ?? ''
                )
            )
        );

        if (
            $githubState === 'MERGED'
            || trim(
                (string) (
                    $record['mergedAt']
                    ?? ''
                )
            ) !== ''
        ) {
            $result['state'] = 'merged';

            return $result;
        }

        if ($githubState === 'CLOSED') {
            $result['state'] = 'blocked';

            return $result;
        }

        $prHead = strtolower(
            trim(
                (string) (
                    $record['headRefOid']
                    ?? ''
                )
            )
        );

        $currentHead = strtolower(
            trim($head)
        );

        if (
            $prHead !== ''
            && $currentHead !== ''
            && ! hash_equals(
                $currentHead,
                $prHead
            )
        ) {
            $result['state'] = 'head_mismatch';

            return $result;
        }

        if (
            ($record['isDraft'] ?? false)
            === true
        ) {
            $result['state'] = 'draft';

            return $result;
        }

        $checks =
            $record['statusCheckRollup']
            ?? null;

        if (
            ! is_array($checks)
            || $checks === []
        ) {
            $result['state'] =
                'checks_unavailable';

            return $result;
        }

        $pending = false;
        $failed = false;

        foreach ($checks as $check) {
            if (! is_array($check)) {
                $failed = true;
                continue;
            }

            $type = trim(
                (string) (
                    $check['__typename']
                    ?? ''
                )
            );

            if ($type === 'StatusContext') {
                $state = strtoupper(
                    trim(
                        (string) (
                            $check['state']
                            ?? ''
                        )
                    )
                );

                if (
                    in_array(
                        $state,
                        ['PENDING', 'EXPECTED'],
                        true
                    )
                ) {
                    $pending = true;
                    continue;
                }

                if ($state === 'SUCCESS') {
                    continue;
                }

                $failed = true;
                continue;
            }

            $status = strtoupper(
                trim(
                    (string) (
                        $check['status']
                        ?? ''
                    )
                )
            );

            $conclusion = strtoupper(
                trim(
                    (string) (
                        $check['conclusion']
                        ?? ''
                    )
                )
            );

            if (
                $status !== 'COMPLETED'
                || $conclusion === ''
            ) {
                $pending = true;
                continue;
            }

            if (
                ! in_array(
                    $conclusion,
                    [
                        'SUCCESS',
                        'NEUTRAL',
                        'SKIPPED',
                    ],
                    true
                )
            ) {
                $failed = true;
            }
        }

        if ($failed) {
            $result['state'] = 'checks_failed';
            return $result;
        }

        if ($pending) {
            $result['state'] = 'checks_pending';
            return $result;
        }

        if ($result['merge_state'] === 'CLEAN') {
            $result['state'] = 'ready';
            return $result;
        }

        $result['state'] = 'blocked';

        return $result;
    }

    /**
     * Load the newest execution or recovery record bound to
     * the exact recipe.
     */
    private function latestJsonForRecipe(
        string $directory,
        string $recipeId
    ): array {
        if (
            $recipeId === ''
            || ! is_dir($directory)
        ) {
            return [];
        }

        $files = glob(
            rtrim($directory, '/')
            . '/*.json'
        ) ?: [];

        usort(
            $files,
            static fn (
                string $left,
                string $right
            ): int =>
                ((int) filemtime($right))
                <=>
                ((int) filemtime($left))
        );

        foreach ($files as $file) {
            $decoded =
                $this->historicalJsonRecord(
                    $file
                );

            if ($decoded === []) {
                continue;
            }

            $recordRecipeId = trim(
                (string) (
                    $decoded['recipe_id']
                    ?? (
                        $decoded['record']['recipe_id']
                        ?? (
                            $decoded['context']['recipe_id']
                            ?? ''
                        )
                    )
                )
            );

            if ($recordRecipeId === $recipeId) {
                return $decoded;
            }
        }

        return [];
    }

    /**
     * Decode every JSON record in a directory, newest first.
     *
     * @return list<array<string, mixed>>
     */
    private function decodedJsonNewestFirst(string $directory): array
    {
        if (! is_dir($directory)) {
            return [];
        }

        $files = glob(rtrim($directory, '/') . '/*.json') ?: [];

        usort(
            $files,
            static fn (string $left, string $right): int =>
                ((int) filemtime($right)) <=> ((int) filemtime($left))
        );

        $records = [];

        foreach ($files as $file) {
            $decoded =
                $this->historicalJsonRecord(
                    $file
                );

            if ($decoded !== []) {
                $records[] = $decoded;
            }
        }

        return $records;
    }

    /**
     * Execution IDs recorded against the active mission configuration.
     *
     * @return list<string>
     */
    private function missionExecutionIds(string $directory, string $configId): array
    {
        if ($configId === '') {
            return [];
        }

        $ids = [];

        foreach ($this->decodedJsonNewestFirst($directory) as $record) {
            if (trim((string) ($record['config_id'] ?? '')) !== $configId) {
                continue;
            }

            $executionId = trim((string) ($record['execution_id'] ?? ''));

            if ($executionId !== '') {
                $ids[] = $executionId;
            }
        }

        return array_values(array_unique($ids));
    }

    /**
     * Prefer the exact bound recipe; otherwise the newest execution
     * recorded against the active mission configuration.
     *
     * @return array<string, mixed>
     */
    public function latestExecutionForMission(
        string $directory,
        string $recipeId,
        string $configId,
        string $canonicalExecutionId = ''
    ): array {
        $canonicalExecutionId = trim(
            $canonicalExecutionId
        );
        $records =
            $this->decodedJsonNewestFirst(
                $directory
            );

        $exactRecipeRecords = [];

        foreach ($records as $record) {
            $payload = (
                isset($record['record'])
                && is_array($record['record'])
            )
                ? $record['record']
                : $record;

            $context = (
                isset($record['context'])
                && is_array($record['context'])
            )
                ? $record['context']
                : [];

            $recordRecipeId = trim(
                (string) (
                    $payload['recipe_id']
                    ?? $record['recipe_id']
                    ?? $context['recipe_id']
                    ?? ''
                )
            );

            if (
                $recipeId === ''
                || $recordRecipeId !== $recipeId
            ) {
                continue;
            }

            $recordConfigId = trim(
                (string) (
                    $payload['config_id']
                    ?? $record['config_id']
                    ?? $context['config_id']
                    ?? ''
                )
            );

            if (
                $configId !== ''
                && $recordConfigId !== $configId
            ) {
                continue;
            }

            $exactRecipeRecords[] = $record;
        }

        if ($canonicalExecutionId !== '') {
            $canonicalRecord = [];
            $remainingExactRecipeRecords = [];

            foreach ($exactRecipeRecords as $record) {
                $payload = (
                    isset($record['record'])
                    && is_array($record['record'])
                )
                    ? $record['record']
                    : $record;

                $context = (
                    isset($record['context'])
                    && is_array($record['context'])
                )
                    ? $record['context']
                    : [];

                $recordExecutionId = trim(
                    (string) (
                        $payload['execution_id']
                        ?? $record['execution_id']
                        ?? $context['execution_id']
                        ?? ''
                    )
                );

                if (
                    $recordExecutionId
                    === $canonicalExecutionId
                ) {
                    if ($canonicalRecord === []) {
                        $canonicalRecord = $record;
                    }

                    continue;
                }

                $remainingExactRecipeRecords[] = $record;
            }

            if ($canonicalRecord === []) {
                /*
                 * An explicit recipe execution binding is authoritative.
                 * Never substitute provenance from another execution when
                 * the canonical execution cannot be resolved safely.
                 */
                return [];
            }

            /*
             * Canonical identity decides which execution is current.
             * The existing successful-idempotent fallback below may then
             * recover the prior applying execution when this canonical
             * execution is a safe zero-change rerun.
             */
            $exactRecipeRecords = array_merge(
                [$canonicalRecord],
                $remainingExactRecipeRecords
            );
        }

        if ($exactRecipeRecords !== []) {
            $latest = $exactRecipeRecords[0];

            $latestPayload = (
                isset($latest['record'])
                && is_array($latest['record'])
            )
                ? $latest['record']
                : $latest;

            $latestSummary = is_array(
                $latestPayload['summary'] ?? null
            )
                ? $latestPayload['summary']
                : [];

            $latestTotalDeclared =
                array_key_exists(
                    'total_mutations',
                    $latestSummary
                );

            $latestTotal = (int) (
                $latestSummary[
                    'total_mutations'
                ]
                ?? 0
            );

            $latestApplied = (int) (
                $latestSummary[
                    'mutations_applied'
                ]
                ?? 0
            );

            $latestSkipped = (int) (
                $latestSummary[
                    'mutations_skipped'
                ]
                ?? 0
            );

            $latestFailed = (int) (
                $latestSummary[
                    'failed_commands'
                ]
                ?? 0
            );

            $latestIsSuccessfulIdempotent =
                trim(
                    (string) (
                        $latestPayload['mode']
                        ?? ''
                    )
                ) === 'run_allowlisted'
                && (
                    $latestPayload[
                        'mutation_allowed'
                    ]
                    ?? false
                ) === true
                && trim(
                    (string) (
                        $latestPayload['status']
                        ?? ''
                    )
                ) === 'complete'
                && $latestTotalDeclared
                && $latestTotal > 0
                && $latestApplied === 0
                && $latestSkipped === $latestTotal
                && $latestFailed === 0;

            if (! $latestIsSuccessfulIdempotent) {
                return $latest;
            }

            foreach (
                array_slice(
                    $exactRecipeRecords,
                    1
                )
                as $candidate
            ) {
                $candidatePayload = (
                    isset($candidate['record'])
                    && is_array(
                        $candidate['record']
                    )
                )
                    ? $candidate['record']
                    : $candidate;

                $candidateSummary = is_array(
                    $candidatePayload['summary']
                    ?? null
                )
                    ? $candidatePayload['summary']
                    : [];

                $candidateTotalDeclared =
                    array_key_exists(
                        'total_mutations',
                        $candidateSummary
                    );

                $candidateTotal = (int) (
                    $candidateSummary[
                        'total_mutations'
                    ]
                    ?? 0
                );

                $candidateApplied = (int) (
                    $candidateSummary[
                        'mutations_applied'
                    ]
                    ?? 0
                );

                $candidateSkipped = (int) (
                    $candidateSummary[
                        'mutations_skipped'
                    ]
                    ?? 0
                );

                $candidateFailed = (int) (
                    $candidateSummary[
                        'failed_commands'
                    ]
                    ?? 0
                );

                $candidateMode = trim(
                    (string) (
                        $candidatePayload['mode']
                        ?? ''
                    )
                );

                $candidateStatus = trim(
                    (string) (
                        $candidatePayload['status']
                        ?? ''
                    )
                );

                $candidateMutationAllowed =
                    (
                        $candidatePayload[
                            'mutation_allowed'
                        ]
                        ?? false
                    ) === true;

                $candidateJournal = trim(
                    (string) (
                        $candidatePayload[
                            'mutation_journal'
                        ]
                        ?? ''
                    )
                );

                $qualifyingAppliedExecution =
                    $candidateMode
                        === 'run_allowlisted'
                    && $candidateMutationAllowed
                    && $candidateStatus
                        === 'complete'
                    && $candidateApplied > 0
                    && $candidateFailed === 0
                    && $candidateJournal !== '';

                if ($qualifyingAppliedExecution) {
                    return $candidate;
                }

                $safeIdempotent =
                    $candidateMode
                        === 'run_allowlisted'
                    && $candidateMutationAllowed
                    && $candidateStatus
                        === 'complete'
                    && $candidateTotalDeclared
                    && $candidateTotal > 0
                    && $candidateApplied === 0
                    && $candidateSkipped
                        === $candidateTotal
                    && $candidateFailed === 0;

                $safeDryRun =
                    $candidateMode === 'dry_run'
                    && ! $candidateMutationAllowed
                    && $candidateStatus
                        === 'complete'
                    && $candidateApplied === 0
                    && $candidateFailed === 0;

                if (
                    $safeIdempotent
                    || $safeDryRun
                ) {
                    continue;
                }

                /*
                 * Do not reach backward across a failed,
                 * blocked, malformed, or otherwise
                 * non-safe execution.
                 */
                return $candidate;
            }

            /*
             * Zero-mutation-only history remains zero
             * mutation and therefore fails strict
             * mutation provenance later.
             */
            return $latest;
        }

        if ($recipeId !== "") {
            return [];
        }

        foreach ($records as $record) {
            $payload = (
                isset($record['record'])
                && is_array($record['record'])
            )
                ? $record['record']
                : $record;

            if (
                $configId !== ''
                && trim(
                    (string) (
                        $payload['config_id']
                        ?? $record['config_id']
                        ?? ''
                    )
                ) === $configId
            ) {
                return $record;
            }
        }

        return [];
    }

    /**
     * Load recovery state for the currently selected execution.
     *
     * When an exact execution is supplied, recovery from an older
     * execution must not override the current execution state even
     * when both executions belong to the same recipe.
     *
     * The no-execution fallback preserves legacy mission-level
     * inspection behavior for callers that do not yet have an exact
     * execution selected.
     *
     * @param list<string> $missionExecutionIds
     *
     * @return array<string, mixed>
     */
    private function latestRecoveryForMission(
        string $directory,
        string $recipeId,
        array $missionExecutionIds,
        string $executionId = ''
    ): array {
        $executionId = trim($executionId);

        if ($executionId !== '') {
            if (
                ! in_array(
                    $executionId,
                    $missionExecutionIds,
                    true
                )
            ) {
                return [];
            }

            foreach (
                $this->decodedJsonNewestFirst($directory)
                as $record
            ) {
                $recordExecutionId = trim(
                    (string) (
                        $record['execution_id']
                        ?? ''
                    )
                );

                if ($recordExecutionId !== $executionId) {
                    continue;
                }

                $recordRecipeId = trim(
                    (string) (
                        $record['recipe_id']
                        ?? ''
                    )
                );

                if (
                    $recipeId !== ''
                    && $recordRecipeId !== $recipeId
                ) {
                    continue;
                }

                return $record;
            }

            return [];
        }

        $exact = $this->latestJsonForRecipe(
            $directory,
            $recipeId
        );

        if ($exact !== []) {
            return $exact;
        }

        if ($recipeId !== '') {
            return [];
        }

        if ($missionExecutionIds === []) {
            return [];
        }

        foreach (
            $this->decodedJsonNewestFirst($directory)
            as $record
        ) {
            $recordExecutionId = trim(
                (string) (
                    $record['execution_id']
                    ?? ''
                )
            );

            if (
                $recordExecutionId !== ''
                && in_array(
                    $recordExecutionId,
                    $missionExecutionIds,
                    true
                )
            ) {
                return $record;
            }
        }

        return [];
    }

    /**
     * Load the newest validation bound to the exact execution.
     *
     * @return array<string, mixed>
     */
    private function latestValidationForMission(
        string $directory,
        string $recipeId,
        string $executionId,
        string $configId
    ): array {
        if ($executionId === '') {
            return [];
        }

        foreach ($this->decodedJsonNewestFirst($directory) as $record) {
            $recordExecutionId = trim(
                (string) ($record['execution_id'] ?? '')
            );

            if ($recordExecutionId !== $executionId) {
                continue;
            }

            $recordRecipeId = trim(
                (string) ($record['recipe_id'] ?? '')
            );

            if (
                $recipeId !== ''
                && $recordRecipeId !== $recipeId
            ) {
                continue;
            }

            $recordConfigId = trim(
                (string) ($record['config_id'] ?? '')
            );

            if (
                $configId !== ''
                && $recordConfigId !== $configId
            ) {
                continue;
            }

            return $record;
        }

        return [];
    }

    /**
     * @param array<string, mixed> $record
     */
    private function recordState(array $record): string
    {
        if ($record === []) {
            return 'none';
        }

        $state = $this->normalizedState(
            $record,
            [
                'status',
                'state',
                'execution_state',
                'recovery_state',
            ]
        );

        if ($state !== '') {
            return $state;
        }

        $nested = (
            isset($record['record'])
            && is_array($record['record'])
        )
            ? $record['record']
            : [];

        $state = $this->normalizedState(
            $nested,
            [
                'status',
                'state',
                'execution_state',
                'recovery_state',
            ]
        );

        return $state !== ''
            ? $state
            : 'unknown';
    }

    /**
     * @param array<string, mixed> $record
     * @param list<string> $fields
     */
    private function normalizedState(
        array $record,
        array $fields
    ): string {
        foreach ($fields as $field) {
            $value = strtolower(
                trim(
                    (string) (
                        $record[$field]
                        ?? ''
                    )
                )
            );

            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }

    /**
     * Select only a recipe bound to the exact active context.
     *
     * @param array<string, mixed> $mission
     * @param array<string, mixed> $objective
     */
    private function latestRecipe(
        string $root,
        array $mission,
        array $objective,
        string $branch,
        string $head
    ): array {
        $targetRoot = $this->normalizedPath($root);

        foreach (
            ['approved', 'drafts']
            as $store
        ) {
            foreach (
                $this->provenanceStoreRoots($root)
                as $storeRoot
            ) {
                $recipe =
                    $this->latestMatchingRecipe(
                        $storeRoot
                            . '/writable/aiops/recipes/'
                            . $store,
                        $root,
                        $mission,
                        $objective,
                        $branch,
                        $head,
                        $this->normalizedPath($storeRoot)
                            !== $targetRoot
                    );

                if ($recipe === []) {
                    continue;
                }

                $recipe['workflow_store'] =
                    $store;

                $recipe['workflow_store_root'] =
                    $storeRoot;

                return $recipe;
            }
        }

        return [];
    }

    /**
     * @param array<string, mixed> $mission
     * @param array<string, mixed> $objective
     */
    private function latestMatchingRecipe(
        string $directory,
        string $root,
        array $mission,
        array $objective,
        string $branch,
        string $head,
        bool $requireRepositoryBinding = false
    ): array {
        if (! is_dir($directory)) {
            return [];
        }

        $files = glob(
            rtrim($directory, '/') . '/*.json'
        ) ?: [];

        usort(
            $files,
            static fn (
                string $left,
                string $right
            ): int =>
                ((int) filemtime($right))
                <=>
                ((int) filemtime($left))
        );

        $store = basename(
            rtrim($directory, '/')
        );

        foreach ($files as $file) {
            $read = $this->readRecipeDocument(
                $file
            );

            if (($read['ok'] ?? false) !== true) {
                return $this->recipeStoreFailure(
                    'recipe_store_unreadable',
                    $store,
                    $file,
                    (string) (
                        $read['reason']
                        ?? 'read_failed'
                    )
                );
            }

            $recipe = json_decode(
                (string) ($read['content'] ?? ''),
                true
            );

            if (! is_array($recipe)) {
                return $this->recipeStoreFailure(
                    'recipe_store_invalid',
                    $store,
                    $file,
                    'invalid_json:'
                    . json_last_error_msg()
                );
            }

            if (
                $this->recipeMatchesContext(
                    $recipe,
                    $root,
                    $mission,
                    $objective,
                    $branch,
                    $head,
                    $requireRepositoryBinding
                )
            ) {
                return $recipe;
            }
        }

        return [];
    }

    /**
     * @return array{
     *     ok:bool,
     *     content:string,
     *     reason:string
     * }
     */
    private function readRecipeDocument(
        string $path
    ): array {
        clearstatcache(true, $path);

        if (
            ! is_file($path)
            || is_link($path)
        ) {
            return [
                'ok' => false,
                'content' => '',
                'reason' =>
                    'recipe_file_unavailable',
            ];
        }

        try {
            $content =
                $this->recipeFileReader
                    instanceof Closure
                    ? (
                        $this->recipeFileReader
                    )($path)
                    : file_get_contents($path);
        } catch (\Throwable $exception) {
            return [
                'ok' => false,
                'content' => '',
                'reason' =>
                    'recipe_file_read_exception:'
                    . get_class($exception),
            ];
        }

        if (! is_string($content)) {
            return [
                'ok' => false,
                'content' => '',
                'reason' =>
                    'recipe_file_read_failed',
            ];
        }

        return [
            'ok' => true,
            'content' => $content,
            'reason' => '',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function recipeStoreFailure(
        string $class,
        string $store,
        string $path,
        string $reason
    ): array {
        return [
            'status' => 'blocked',
            'mutation_allowed' => false,
            'recipe_store_error_class' =>
                $class,
            'recipe_store_error_store' =>
                $store,
            'recipe_store_error_path' =>
                $path,
            'recipe_store_error_reason' =>
                $reason,
        ];
    }

    /**
     * @param array<string, mixed> $recipe
     * @param array<string, mixed> $mission
     * @param array<string, mixed> $objective
     */
    private function recipeMatchesContext(
        array &$recipe,
        string $root,
        array $mission,
        array $objective,
        string $branch,
        string $head,
        bool $requireRepositoryBinding = false
    ): bool {
        unset(
            $recipe['_workflow_reconciled_integrated_source_mutation']
        );

        if (
            $requireRepositoryBinding
            && ! $this->recipeRepositoryBindingMatches(
                $recipe,
                $root
            )
        ) {
            return false;
        }

        $recipeWorktree = trim(
            (string) (
                $recipe['expected_worktree']
                ?? (
                    $recipe['worktree']
                    ?? (
                        $recipe['target_worktree']
                        ?? ''
                    )
                )
            )
        );

        if (
            $recipeWorktree === ''
            || $this->normalizedPath($recipeWorktree)
                !== $this->normalizedPath($root)
        ) {
            return false;
        }

        $recipeBranch = trim(
            (string) (
                $recipe['expected_branch']
                ?? (
                    $recipe['branch']
                    ?? ''
                )
            )
        );

        if (
            $recipeBranch === ''
            || $recipeBranch !== $branch
        ) {
            return false;
        }

        $activeObjectiveId = trim(
            (string) (
                $objective['objective_id']
                ?? ''
            )
        );

        $recipeObjectiveId = trim(
            (string) (
                $recipe['objective_id']
                ?? ''
            )
        );

        $activeMissionId = trim(
            (string) (
                $mission['mission_id']
                ?? ''
            )
        );

        $recipeMissionId = trim(
            (string) (
                $recipe['mission_id']
                ?? ''
            )
        );

        $activeConfigId = trim(
            (string) (
                $mission['config_id']
                ?? ''
            )
        );

        $recipeConfigId = trim(
            (string) (
                $recipe['config_id']
                ?? ''
            )
        );

        if ($activeObjectiveId !== '') {
            if (
                $recipeObjectiveId === ''
                || $recipeObjectiveId
                    !== $activeObjectiveId
            ) {
                return false;
            }
        } elseif ($recipeObjectiveId !== '') {
            return false;
        } elseif (
            ! (
                $recipeMissionId !== ''
                && $recipeMissionId
                    === $activeMissionId
            )
            && ! (
                $recipeConfigId !== ''
                && $recipeConfigId
                    === $activeConfigId
            )
        ) {
            return false;
        }

        $activeObjectiveHash = trim(
            (string) (
                $objective['normalized_objective_hash']
                ?? ''
            )
        );

        $recipeObjectiveHash = trim(
            (string) (
                $recipe['normalized_objective_hash']
                ?? ''
            )
        );

        if (
            $activeObjectiveHash !== ''
            && $recipeObjectiveHash !== ''
            && $recipeObjectiveHash
                !== $activeObjectiveHash
        ) {
            return false;
        }

        if (
            $recipeMissionId !== ''
            && $activeMissionId !== ''
            && $recipeMissionId
                !== $activeMissionId
        ) {
            return false;
        }

        if (
            $recipeConfigId !== ''
            && $activeConfigId !== ''
            && $recipeConfigId
                !== $activeConfigId
        ) {
            return false;
        }

        $activeBaseline = trim(
            (string) (
                $objective['baseline_commit']
                ?? (
                    $mission['base_sha']
                    ?? (
                        $mission['baseline_commit']
                        ?? $head
                    )
                )
            )
        );

        $recipeBaseline = trim(
            (string) (
                $recipe['approved_baseline_commit']
                ?? (
                    $recipe['baseline_commit']
                    ?? ''
                )
            )
        );

        if (
            $recipeBaseline !== ''
            && $activeBaseline !== ''
            && strtolower($recipeBaseline)
                !== strtolower($activeBaseline)
        ) {
            if (! $this->provenIntegratedReconciliationMatchesBaseline(
                $recipe,
                $root,
                $activeBaseline
            )) {
                return false;
            }

            $recipe[
                '_workflow_reconciled_integrated_source_mutation'
            ] = true;
        }

        return true;
    }

    /**
     * Accept retired mutation lineage only when reconciliation has already
     * proven integration and its reconciled baseline is still in ancestry.
     *
     * @param array<string,mixed> $recipe
     */
    private function provenIntegratedReconciliationMatchesBaseline(
        array $recipe,
        string $root,
        string $activeBaseline
    ): bool {
        if (
            ($recipe['status'] ?? '') !== 'superseded'
            || ($recipe['approval_blocked'] ?? false) !== true
            || ($recipe['execution_blocked'] ?? false) !== true
            || ($recipe['superseded_reason'] ?? '')
                !== 'baseline_reconciled_integrated_source_mutation_execution'
            || ($recipe['superseded_execution_safety'] ?? '')
                !== 'proven_integrated_source_mutation'
            || ($recipe['mutation_allowed'] ?? false) !== true
            || (int) ($recipe['mutation_class'] ?? 0) !== 1
            || ($recipe['approval_status'] ?? '') !== 'approved'
            || trim((string) ($recipe['execution_id'] ?? '')) === ''
        ) {
            return false;
        }

        $reconciledBaseline = trim(
            (string) ($recipe['superseded_by_baseline'] ?? '')
        );

        if (
            preg_match('/^[0-9a-f]{40}$/i', $reconciledBaseline) !== 1
            || preg_match('/^[0-9a-f]{40}$/i', $activeBaseline) !== 1
        ) {
            return false;
        }

        if (
            strtolower($reconciledBaseline)
                === strtolower($activeBaseline)
        ) {
            return true;
        }

        return $this->commitIsAncestor(
            $root,
            $reconciledBaseline,
            $activeBaseline
        );
    }

    /**
     * Resolve provenance stores for the active target.
     *
     * Local worktree provenance always has first priority.
     * Canonical control-plane provenance is eligible only
     * for an externally registered repository.
     *
     * @return list<string>
     */
    private function provenanceStoreRoots(
        string $root
    ): array {
        $localRoot =
            $this->normalizedPath($root);

        $roots = [$localRoot];

        $canonicalRoot =
            $this->normalizedPath(
                $this->canonicalRepository
            );

        if ($canonicalRoot === $localRoot) {
            return $roots;
        }

        if (
            ! is_dir(
                $canonicalRoot
                . '/writable/aiops'
            )
        ) {
            return $roots;
        }

        $remote = trim(
            (string) shell_exec(
                'git -C '
                . escapeshellarg($root)
                . ' config --get remote.origin.url'
                . ' 2>/dev/null'
            )
        );

        if ($remote === '') {
            return $roots;
        }

        $projectKey = trim(
            (string) (
                $this->repositoryRegistry
                    ->resolveKeyForRemote($remote)
                ?? ''
            )
        );

        if ($projectKey === '') {
            return $roots;
        }

        $roots[] = $canonicalRoot;

        return array_values(
            array_unique($roots)
        );
    }

    /**
     * Require exact repository identity before provenance
     * may cross from the target worktree into the canonical
     * control-plane store.
     *
     * @param array<string,mixed> $recipe
     */
    private function recipeRepositoryBindingMatches(
        array $recipe,
        string $root
    ): bool {
        $remote = trim(
            (string) shell_exec(
                'git -C '
                . escapeshellarg($root)
                . ' config --get remote.origin.url'
                . ' 2>/dev/null'
            )
        );

        if ($remote === '') {
            return false;
        }

        $activeProjectKey = trim(
            (string) (
                $this->repositoryRegistry
                    ->resolveKeyForRemote($remote)
                ?? ''
            )
        );

        $recipeProjectKey = trim(
            (string) (
                $recipe['project_key']
                ?? ''
            )
        );

        if (
            $activeProjectKey === ''
            || $recipeProjectKey === ''
            || strtolower($activeProjectKey)
                !== strtolower($recipeProjectKey)
        ) {
            return false;
        }

        [
            $owner,
            $repository
        ] = $this->repositoryRegistry
            ->parseGithubRemote($remote);

        if (
            ! is_string($owner)
            || ! is_string($repository)
            || trim($owner) === ''
            || trim($repository) === ''
        ) {
            return false;
        }

        $activeIdentity =
            'github.com/'
            . strtolower(
                trim($owner)
                . '/'
                . trim($repository)
            );

        $recipeIdentity =
            $this->normalizedRepositoryIdentity(
                (string) (
                    $recipe['repository_identity']
                    ?? ''
                )
            );

        return $recipeIdentity !== ''
            && hash_equals(
                $activeIdentity,
                $recipeIdentity
            );
    }

    private function normalizedRepositoryIdentity(
        string $identity
    ): string {
        $identity =
            strtolower(trim($identity));

        $identity = (string) preg_replace(
            '~^https?://~',
            '',
            $identity
        );

        $identity = (string) preg_replace(
            '~^git@github\.com:~',
            'github.com/',
            $identity
        );

        $identity = (string) preg_replace(
            '~\.git$~',
            '',
            $identity
        );

        return rtrim($identity, '/');
    }

    private function normalizedPath(
        string $path
    ): string {
        $resolved = realpath($path);

        return rtrim(
            str_replace(
                '\\',
                '/',
                $resolved !== false
                    ? $resolved
                    : $path
            ),
            '/'
        );
    }

    /**
     * Read non-authoritative historical workflow JSON while ignoring
     * only non-record artifacts.
     *
     * A regular workflow record that exists but cannot be read must
     * fail closed so execution, recovery, or baseline resolution
     * cannot silently fall back to older state.
     *
     * Invalid historical JSON retains the prior skip behavior.
     *
     * @return array<string, mixed>
     */
    private function historicalJsonRecord(
        string $path
    ): array {
        clearstatcache(true, $path);

        if (
            ! is_file($path)
            || is_link($path)
        ) {
            return [];
        }

        try {
            $content =
                isset($this->recipeFileReader)
                && $this->recipeFileReader
                    instanceof Closure
                    ? (
                        $this->recipeFileReader
                    )($path)
                    : file_get_contents(
                        $path
                    );
        } catch (\Throwable $exception) {
            throw new \RuntimeException(
                'historical_workflow_store_unreadable:'
                . 'recipe_file_read_exception:'
                . get_class($exception),
                0,
                $exception
            );
        }

        if (! is_string($content)) {
            throw new \RuntimeException(
                'historical_workflow_store_unreadable:'
                . 'recipe_file_read_failed'
            );
        }

        $decoded = json_decode(
            $content,
            true
        );

        return is_array($decoded)
            ? $decoded
            : [];
    }

    private function latestJson(string $dir): array
    {
        if (! is_dir($dir)) { return []; }
        $files = glob($dir . '/*.json') ?: [];
        if ($files === []) { return []; }
        usort($files, static fn (string $a, string $b): int => ((int) filemtime($b)) <=> ((int) filemtime($a)));
        $decoded = json_decode((string) file_get_contents($files[0]), true);
        return is_array($decoded) ? $decoded : [];
    }

    private function latestState(string $dir): string
    {
        if (! is_dir($dir)) { return 'none'; }
        $files = glob($dir . '/*') ?: [];
        return $files === [] ? 'none' : basename((string) end($files));
    }

    private function wrapperSync(string $root): string
    {
        $installed = trim((string) shell_exec('command -v ai 2>/dev/null'));
        $canonical = $root . '/aiops/bin/ai-context-executor-shim.sh';
        if ($installed === '' || ! is_file($installed) || ! is_file($canonical)) { return 'unknown'; }
        return hash_file('sha256', $installed) === hash_file('sha256', $canonical) ? 'in_sync' : 'drift';
    }
}
