<?php

namespace App\Services\AIOps\CommandWorkflow;

class WorkflowFailureClassifier
{
    public const CLASSES = [
        'wrong_repository','wrong_worktree','wrong_branch','detached_head','dirty_main','dirty_feature_worktree',
        'missing_vendor','missing_env','missing_writable_paths','missing_persisted_mission','mission_worktree_mismatch',
        'mission_branch_mismatch','stale_global_phase','stale_global_task','stale_terminal_state','objective_missing','recipe_missing',
        'recipe_store_unreadable','recipe_store_invalid',
        'recipe_superseded','recipe_approval_required','recipe_execution_required',
        'recipe_mutation_execution_required',
        'recipe_mutation_successor_required',
        'recipe_execution_in_progress','recipe_validation_required',
        'recipe_review_required','recipe_execution_failed',
        'resolved_recovery_successor_required',
        'pr_draft_review_required','pr_checks_pending',
        'pr_checks_failed','pr_checks_unavailable',
        'pr_state_unavailable','pr_head_mismatch',
        'pr_blocked','pr_finish_eligible',
        'pr_merged_convergence_required',
        'mutation_approval_required','approved_recipe_missing',
        'stale_recipe_baseline','origin_main_advanced',
        'origin_main_refresh_failed','origin_main_non_ancestor',
        'model_not_certified','uncertified_source_patch_model','effective_certified_model_mismatch','malformed_json','malformed_json_envelope','markdown_fenced_json',
        'mixed_prose','mixed_prose_and_json','malformed_unified_diff','protected_patch_path','git_apply_check_failure','git_apply_failure',
        'timeout','model_timeout','http_failure','model_http_failure','empty_response','empty_model_response','no_source_controlled_diff','validation_regression',
        'known_baseline_validation_failure','spark_command_not_found','missing_command','runtime_command_not_found','recovery_loop','recovery_loop_detected',
        'finish_invoked_too_early','merged_or_archived_worktree','concurrent_lane','concurrent_lane_conflict','stale_wrapper','installed_wrapper_drift',
        'wrapper_checksum_mismatch','missing_test_dependencies','stale_completed_mission','stale_mission_state_after_command_completion',
        'worktree_other_contributor',
        'worktree_protected_runtime',
        'worktree_class1_gate_incomplete',
        'worktree_class1_repair_eligible',
        'worktree_health_safety_stop',
        'worktree_repair_transient',
        'worktree_repair_loop_detected',
    ];

    public function guidance(string $class, array $context = []): array
    {
        $class = in_array($class, self::CLASSES, true) ? $class : 'missing_command';
        $map = [
            'wrong_repository' => ['php spark aiops:worktree:doctor', 'The command must run from the Timothy Burks repository root.'],
            'wrong_worktree' => [
                $this->missionWorktreeCommand($context),
                'The persisted mission is bound to a different '
                . 'exact worktree.',
            ],
            'wrong_branch' => [
                $this->missionBranchCommand($context),
                'The persisted mission is bound to a different '
                . 'exact branch.',
            ],
            'detached_head' => [$this->missionBranchCommand($context), 'A named feature branch is required before workflow actions.'],
            'dirty_main' => ['git status --short', 'Main/master cannot be dirty; inspect and move changes to a feature branch.'],
            'dirty_feature_worktree' => ['git status --short', 'Review uncommitted feature worktree changes before mutating.'],
            'missing_vendor' => ['gq-ai01: composer install && php spark aiops:command-workflow:replay', 'Composer/runtime validation is delegated to gq-ai01; Codex must continue source repair.'],
            'missing_env' => ['cp .env.example .env && ai check', 'A local .env placeholder is required, without copying production secrets.'],
            'missing_writable_paths' => ['mkdir -p writable/aiops && ai check', 'AIOps state must be journaled under writable/aiops.'],
            'missing_persisted_mission' => ['php spark aiops:thought-worktree:status', 'Bind or resume an exact persisted mission before implementation.'],
            'mission_worktree_mismatch' => [
                $this->missionWorktreeCommand($context),
                'Exact mission worktree binding takes precedence '
                . 'over legacy state.',
            ],
            'mission_branch_mismatch' => [
                $this->missionBranchCommand($context),
                'Exact mission branch binding takes precedence '
                . 'over legacy state.',
            ],
            'stale_global_phase' => ['php spark aiops:operator:state-next --repair-stale-phase', 'Legacy phase state conflicts with exact mission state.'],
            'stale_global_task' => ['php spark aiops:operator:state-next --repair-stale-task', 'Legacy task state conflicts with exact mission state.'],
            'stale_terminal_state' => ['php spark aiops:thought-worktree:resume', 'A completed terminal marker is stale for this exact lane.'],
            'objective_missing' => [
                $this->exactObjectiveCommand($context),
                'No authoritative objective exists at '
                . 'writable/aiops/objectives/latest.json, so recipe '
                . 'creation would fail with '
                . 'authoritative_objective_missing. Persist an '
                . 'explicit objective for this exact lane first.',
            ],
            'recipe_store_unreadable' => [
                $this->recipeStoreInspectionCommand(
                    $context
                ),
                'Recipe-store metadata cannot be read safely. '
                . 'Treat the store as unknown, disable mutation, '
                . 'and inspect the exact file permissions before '
                . 'continuing.',
            ],
            'recipe_store_invalid' => [
                $this->recipeStoreInspectionCommand(
                    $context
                ),
                'Recipe-store metadata is readable but invalid. '
                . 'Treat the store as unknown, disable mutation, '
                . 'and inspect the exact persisted representation '
                . 'before continuing.',
            ],
            'recipe_missing' => [
                'php spark aiops:operator:run-next '
                . '--target-worktree='
                . escapeshellarg(
                    $this->canonicalWorktree($context)
                ),
                'No recipe is bound to the active '
                . 'objective/mission/worktree/branch/baseline; '
                . 'route through the native source-scope-aware '
                . 'operator before recipe creation.',
            ],
            'approved_recipe_missing' => ['php spark aiops:execution-engine:recipe', 'Approved recipe metadata is missing and must be rebuilt or explicitly abandoned.'],
            'recipe_superseded' => ['ai do "<current explicit objective>"', 'The recipe was superseded by a newer explicit objective and cannot run.'],
            'recipe_approval_required' => [
                $this->exactRecipeCommand(
                    $context,
                    'php spark aiops:execution-engine:recipe '
                    . '--approve --recipe-id='
                ),
                'The exact draft recipe requires contributor approval.',
            ],
            'recipe_execution_required' => [
                $this->exactRecipeCommand(
                    $context,
                    'php spark aiops:execution-engine:recipe-run '
                    . '--recipe-id='
                ),
                'The exact approved recipe is ready for a non-mutating dry run.',
            ],
            'recipe_mutation_execution_required' => [
                $this->exactRecipeCommand(
                    $context,
                    'php spark aiops:execution-engine:recipe-run '
                    . '--run --approve-mutation --recipe-id='
                ),
                'The exact mutation-eligible recipe completed its '
                . 'non-mutating dry run and requires explicit source '
                . 'mutation execution before validation or review.',
            ],
            'recipe_mutation_successor_required' => [
                'php spark aiops:operator:run-next '
                . '--target-worktree='
                . escapeshellarg(
                    $this->canonicalWorktree($context)
                ),
                'The exact mutation-eligible recipe reached validation '
                . 'without positive applying mutation provenance. '
                . 'Preserve the zero-only execution, do not rerun the '
                . 'same recipe, and route a bounded successor through '
                . 'the source-scope-aware operator.',
            ],
            'recipe_execution_in_progress' => [
                'php spark aiops:execution-engine:state',
                'The exact approved recipe execution is already in progress.',
            ],
            'recipe_validation_required' => [
                'php spark aiops:execution-engine:validate --run',
                'The exact recipe execution completed and requires validation.',
            ],
            'recipe_review_required' => [
                'ai finish --dry-run',
                'The exact recipe execution is validated and ready for review.',
            ],
            'resolved_recovery_successor_required' => [
                'php spark aiops:operator:run-next '
                . '--target-worktree='
                . escapeshellarg(
                    $this->canonicalWorktree($context)
                ),
                'The exact failed zero-change execution has resolved '
                . 'recovery evidence without same-recipe retry authority. '
                . 'Preserve the failed recipe and route the bounded successor '
                . 'through the source-scope-aware operator.',
            ],
            'pr_draft_review_required' => [
                'ai review',
                'The exact branch PR is draft and requires review/readiness '
                . 'before closeout may advance.',
            ],
            'pr_checks_pending' => [
                $this->exactPrChecksCommand($context),
                'The exact PR has unfinished checks. CI is the immediate '
                . 'prerequisite.',
            ],
            'pr_checks_failed' => [
                $this->exactPrChecksCommand($context),
                'The exact PR has failing checks. Inspect and correct that '
                . 'failure before finish or merge.',
            ],
            'pr_checks_unavailable' => [
                $this->exactPrViewCommand($context),
                'The PR exists but check state cannot yet be proven.',
            ],
            'pr_state_unavailable' => [
                'gh auth status',
                'GitHub PR state cannot currently be proven.',
            ],
            'pr_head_mismatch' => [
                $this->exactPrViewCommand($context),
                'The exact PR head differs from the validated feature HEAD.',
            ],
            'pr_blocked' => [
                $this->exactPrViewCommand($context),
                'The PR is not currently clean and merge-ready.',
            ],
            'pr_finish_eligible' => [
                'ai finish',
                'The exact PR head is clean and all provable checks pass. '
                . 'Proceed through governed finish and explicit owner merge.',
            ],
            'pr_merged_convergence_required' => [
                'git -C /apps/TBI/repos/timothyburks '
                . 'fetch origin main --prune',
                'The PR is merged. Reconcile canonical main and terminal '
                . 'mission state before declaring completion.',
            ],
            'recipe_execution_failed' => [
                $this->exactRecoveryCommand(
                    $context
                ),
                'The exact recipe execution failed or entered recovery.',
            ],
            'mutation_approval_required' => [$this->exactMutationApprovalCommand($context), 'Source mutation requires explicit mutation approval.'],
            'stale_recipe_baseline' => [
                $this->exactBaselineReconciliationCommand($context),
                'The recipe baseline no longer matches origin/main; reconcile the exact lane before recipe regeneration.',
            ],
            'origin_main_advanced' => [
                $this->exactBaselineReconciliationCommand($context),
                'The approved baseline is stale; reconcile the exact config/worktree before any lower-priority workflow action.',
            ],
            'origin_main_refresh_failed' => [
                'git fetch --no-tags origin '
                . '+refs/heads/main:refs/remotes/origin/main',
                'The bounded exact origin/main refresh failed. '
                . 'Retry only the exact fetch, then rerun ai check; '
                . 'do not grant mutation authority.',
            ],
            'origin_main_non_ancestor' => [
                'git log --graph --oneline --decorate '
                . '--all --max-count=40',
                'Fresh origin/main is not a linear descendant of the '
                . 'approved history. Human history inspection is '
                . 'required; do not rebase, reset, or auto-reconcile.',
            ],
            'model_not_certified' => [$this->exactCertifyCommand($context), 'The effective source-patch model is not certified on the exact node.'],
            'uncertified_source_patch_model' => [$this->exactCertifyCommand($context), 'The source-patch model is not certified.'],
            'effective_certified_model_mismatch' => [$this->exactCertifyCommand($context), 'Preferred and effective model identities do not match certification.'],
            'malformed_json' => ['php spark aiops:execution-engine:recover --class=malformed_json', 'Response JSON was not parseable as a single pure document.'],
            'malformed_json_envelope' => ['php spark aiops:execution-engine:recover --class=malformed_json', 'Response JSON envelope is malformed.'],
            'markdown_fenced_json' => ['php spark aiops:execution-engine:recover --class=markdown_fenced_json', 'Exactly one fenced JSON document can be decoded after repair.'],
            'mixed_prose' => ['php spark aiops:execution-engine:recover --class=mixed_prose', 'Mixed prose and machine payload must be classified explicitly.'],
            'mixed_prose_and_json' => ['php spark aiops:execution-engine:recover --class=mixed_prose', 'Mixed prose and JSON must not enter generic recovery.'],
            'malformed_unified_diff' => ['php spark aiops:ollama-source-patch:self-test --repair-diff', 'Unified diff structure failed deterministic parsing.'],
            'protected_patch_path' => ['php spark aiops:ollama-source-patch:self-test --protected-paths', 'Patch targets a protected path and must be regenerated.'],
            'git_apply_check_failure' => ['php spark aiops:ollama-source-patch:self-test --git-apply-check', 'Generated diff failed pre-apply verification.'],
            'git_apply_failure' => [$this->exactPatchCheckCommand($context), 'Approved patch failed during application and must be reviewed.'],
            'timeout' => ['php spark aiops:execution-engine:recover --class=timeout', 'Model/runtime timeout has bounded retries.'],
            'model_timeout' => ['php spark aiops:execution-engine:recover --class=timeout', 'Model timeout has bounded retries.'],
            'http_failure' => ['php spark aiops:execution-engine:recover --class=http_failure', 'HTTP failure requires endpoint evidence and bounded retry.'],
            'model_http_failure' => ['php spark aiops:execution-engine:recover --class=http_failure', 'Model HTTP failure requires endpoint evidence and bounded retry.'],
            'empty_response' => ['php spark aiops:execution-engine:recover --class=empty_response', 'Empty model response is a specific retryable class.'],
            'empty_model_response' => ['php spark aiops:execution-engine:recover --class=empty_response', 'Empty model response is a specific retryable class.'],
            'validation_regression' => ['php spark aiops:execution-engine:validate', 'Validation regression must replay the failing command.'],
            'known_baseline_validation_failure' => ['php spark aiops:execution-engine:validate --baseline', 'Baseline validation failure must be separated from implementation regression.'],
            'missing_command' => ['php spark aiops:command-surface', 'The requested command is missing from the wrapper or Spark command surface.'],
            'spark_command_not_found' => ['php spark list | rg aiops', 'Spark command was not found in runtime validation.'],
            'runtime_command_not_found' => ['php spark aiops:command-surface', 'Runtime command was not found.'],
            'recovery_loop' => ['php spark aiops:execution-engine:recover --stop-loop', 'Recovery loop signature repeated past the allowed attempts.'],
            'recovery_loop_detected' => ['php spark aiops:execution-engine:recover --stop-loop', 'Recovery loop signature repeated past the allowed attempts.'],
            'concurrent_lane' => ['php spark aiops:branch-locks:cleanup --dry-run', 'Another lane owns this repository/worktree/branch tuple.'],
            'concurrent_lane_conflict' => ['php spark aiops:branch-locks:cleanup --dry-run', 'Another lane owns this tuple.'],
            'stale_wrapper' => ['php spark aiops:wrapper:sync --check', 'Installed wrapper differs from the canonical repository wrapper.'],
            'installed_wrapper_drift' => ['php spark aiops:wrapper:sync --check', 'Installed wrapper differs from the canonical repository wrapper.'],
            'wrapper_checksum_mismatch' => ['php spark aiops:wrapper:sync --check', 'Wrapper checksum mismatch must be reviewed before continuing.'],
            'missing_test_dependencies' => ['gq-ai01: composer install && vendor/bin/phpunit', 'Runtime test dependencies are intentionally not installed in Codex cloud.'],
            'stale_completed_mission' => ['php spark aiops:thought-worktree:resume --force-new-lane', 'Completed mission state is stale for the current lane.'],
            'stale_mission_state_after_command_completion' => ['php spark aiops:thought-worktree:resume --force-new-lane', 'Completed mission state is stale for the current lane.'],
            'no_source_controlled_diff' => ['ai do "<implementation objective>"', 'Implementation objectives require a source-controlled diff before finish.'],
            'finish_invoked_too_early' => ['php spark aiops:command-workflow finish --explain-gates', 'Finish gates failed before expensive validation.'],
            'worktree_other_contributor' => [
                'ai inventory --health',
                'HANDOFF_REQUIRED: another contributor owns the exact worktree; do not repair or inspect it through unsafe Git operations.',
            ],
            'worktree_protected_runtime' => [
                'ai inventory --health',
                'SAFETY_STOP: protected runtime/release paths are never repair-eligible.',
            ],
            'worktree_class1_gate_incomplete' => [
                'ai context',
                'SAFETY_STOP: exact Class-1 repair preconditions are incomplete; produce a plan only.',
            ],
            'worktree_class1_repair_eligible' => [
                'ai check',
                'Exact Class-1 repair gates are complete; mutation still requires a separate governed approved execution.',
            ],
            'worktree_health_safety_stop' => [
                'php spark aiops:worktree:doctor',
                'Worktree health evidence is unsafe for automatic mutation; keep diagnosis read-only.',
            ],
            'worktree_repair_transient' => [
                'php spark aiops:worktree:doctor',
                'Transient worktree repair diagnosis may retry only within the bounded retry contract.',
            ],
            'worktree_repair_loop_detected' => [
                'ai check',
                'Repeated worktree repair signature reached its maximum attempts; stop automatic recovery.',
            ],
            'merged_or_archived_worktree' => [
                'git -C /apps/TBI/repos/timothyburks '
                . 'fetch origin main --prune',
                'The mission is terminal. Preserve it as read-only evidence '
                . 'and converge canonical main.',
            ],
        ];
        $next = $map[$class][0] ?? 'ai check';
        $why = $map[$class][1] ?? 'This class has a bounded diagnostic action instead of a generic recovery loop.';

        $automaticRecoveryClasses = [
            'timeout',
            'model_timeout',
            'http_failure',
            'model_http_failure',
            'empty_response',
            'empty_model_response',
            'git_apply_check_failure',
            'malformed_json',
            'markdown_fenced_json',
            'stale_recipe_baseline',
            'origin_main_advanced',
            'worktree_repair_transient',
        ];

        $zeroAttemptClasses = [
            'recovery_loop',
            'recovery_loop_detected',
            'worktree_other_contributor',
            'worktree_protected_runtime',
            'worktree_class1_gate_incomplete',
            'worktree_class1_repair_eligible',
            'worktree_health_safety_stop',
            'worktree_repair_loop_detected',
            'origin_main_non_ancestor',
            'recipe_store_unreadable',
            'recipe_store_invalid',
            'pr_checks_failed',
            'pr_checks_unavailable',
            'pr_state_unavailable',
            'pr_head_mismatch',
            'pr_blocked',
        ];

        return [
            'class' => $class, 'reason' => str_replace('_', ' ', $class), 'next_command' => $next, 'why' => $why,
            'preconditions' => 'Run from the exact repository worktree; do not expose secrets; do not mutate production.',
            'expected_result' => 'The workflow reaches a single clearer state or a specific approval gate.',
            'fallback' => 'If the command fails, inspect writable/aiops/command-journal and run the command-workflow smoke.',
            'rollback' => 'Revert source changes with git restore and remove generated writable/aiops artifacts if needed.',
            'automatic_recovery_allowed' =>
                in_array(
                    $class,
                    $automaticRecoveryClasses,
                    true
                ),
            'maximum_attempts' =>
                in_array(
                    $class,
                    $zeroAttemptClasses,
                    true
                )
                    ? 0
                    : 2,
            'loop_detection_signature' => hash('sha256', $class . '|' . ($context['worktree'] ?? '') . '|' . ($context['branch'] ?? '')),
            'evidence' => $context['evidence'] ?? $class,
        ];
    }

    /**
     * Build a read-only inspection command for the exact
     * recipe-store representation that blocked context discovery.
     *
     * @param array<string, mixed> $context
     */
    private function recipeStoreInspectionCommand(
        array $context
    ): string {
        $path = trim(
            (string) (
                $context[
                    'recipe_store_error_path'
                ]
                ?? ''
            )
        );

        if ($path === '') {
            return 'php spark aiops:worktree:doctor';
        }

        return 'stat -- '
            . escapeshellarg($path)
            . ' && namei -l '
            . escapeshellarg($path);
    }

    /**
     * Build an exact worktree transition without placeholders or an
     * empty `cd` target.
     *
     * @param array<string, mixed> $context
     */
    private function missionWorktreeCommand(array $context): string
    {
        $worktree = trim(
            (string) ($context['mission_worktree'] ?? '')
        );

        if ($worktree === '') {
            return 'php spark aiops:inventory --limit=20';
        }

        return 'cd '
            . escapeshellarg($worktree)
            . ' && ai check';
    }

    /**
     * Build an exact branch transition without placeholders.
     *
     * @param array<string, mixed> $context
     */
    private function missionBranchCommand(array $context): string
    {
        $branch = trim(
            (string) ($context['mission_branch'] ?? '')
        );

        if ($branch === '') {
            return 'ai check';
        }

        return 'git switch '
            . escapeshellarg($branch)
            . ' && ai check';
    }


    /**
     * @param array<string,mixed> $context
     */
    private function exactPrChecksCommand(
        array $context
    ): string {
        $number = trim(
            (string) (
                $context['pr_number']
                ?? ''
            )
        );

        if (
            $number === ''
            || preg_match('/^[0-9]+$/', $number)
                !== 1
        ) {
            return 'gh pr checks';
        }

        return 'gh pr checks '
            . escapeshellarg($number);
    }

    /**
     * @param array<string,mixed> $context
     */
    private function exactPrViewCommand(
        array $context
    ): string {
        $number = trim(
            (string) (
                $context['pr_number']
                ?? ''
            )
        );

        $fields =
            'number,state,isDraft,mergeStateStatus,'
            . 'headRefOid,mergedAt,url';

        if (
            $number === ''
            || preg_match('/^[0-9]+$/', $number)
                !== 1
        ) {
            return 'gh pr view --json '
                . escapeshellarg($fields);
        }

        return 'gh pr view '
            . escapeshellarg($number)
            . ' --json '
            . escapeshellarg($fields);
    }

    /**
     * Build a recipe command only when an exact persisted
     * recipe identifier is available.
     *
     * @param array<string, mixed> $context
     */
    private function exactRecipeCommand(
        array $context,
        string $prefix
    ): string {
        $recipeId = trim(
            (string) (
                $context['recipe_id']
                ?? ''
            )
        );

        if ($recipeId === '') {
            return 'ai check';
        }

        return $prefix
            . escapeshellarg($recipeId);
    }

    /**
     * Build bounded recovery guidance using the exact recipe
     * and execution identities.
     *
     * @param array<string, mixed> $context
     */
    private function exactRecoveryCommand(
        array $context
    ): string {
        $recipeId = trim(
            (string) (
                $context['recipe_id']
                ?? ''
            )
        );

        if ($recipeId === '') {
            return 'ai check';
        }

        $executionId = trim(
            (string) (
                $context['execution_id']
                ?? ''
            )
        );

        $message = 'Recover recipe '
            . $recipeId;

        if ($executionId !== '') {
            $message .= ' execution '
                . $executionId;
        }

        return 'php spark '
            . 'aiops:execution-engine:recover '
            . '--recipe-id='
            . escapeshellarg($recipeId)
            . ' --message='
            . escapeshellarg($message);
    }

    /**
     * Build an Ollama certification command only when the exact node
     * identity is known. Model is appended when available.
     *
     * @param array<string, mixed> $context
     */
    private function exactCertifyCommand(array $context): string
    {
        $node = trim((string) ($context['node'] ?? ($context['worker_node'] ?? '')));

        if ($node === '') {
            return 'php spark tbi:ollama:routes:audit';
        }

        $command = 'php spark tbi:ollama:certify ' . escapeshellarg($node);
        $model = trim((string) (
            $context['effective_model']
            ?? ($context['model'] ?? '')
        ));

        if ($model !== '') {
            $command .= ' --model=' . escapeshellarg($model);
        }

        return $command;
    }

    /**
     * Build a patch verification command only when the exact patch
     * path is known.
     *
     * @param array<string, mixed> $context
     */
    private function exactPatchCheckCommand(array $context): string
    {
        $patch = trim((string) (
            $context['patch_path']
            ?? ($context['patch'] ?? '')
        ));

        if ($patch === '') {
            return 'git status --short --untracked-files=all';
        }

        return 'git apply --check ' . escapeshellarg($patch) . ' && ai check';
    }

    /**
     * Build an objective-persisting recipe command from the exact
     * mission objective. The recipe command requires an authoritative
     * objective at writable/aiops/objectives/latest.json and writes one
     * only when --prompt is supplied.
     *
     * @param array<string, mixed> $context
     */
    private function exactObjectiveCommand(array $context): string
    {
        $objective = trim((string) ($context['mission_objective'] ?? ''));
        $worktree  = trim((string) (
            $context['mission_worktree']
            ?? ($context['worktree'] ?? '')
        ));

        if ($objective === '' || $worktree === '') {
            return 'php spark aiops:thought-worktree:status';
        }

        return 'php spark aiops:execution-engine:recipe --purpose=coding --prompt='
            . escapeshellarg($objective)
            . ' --target-worktree='
            . escapeshellarg($worktree);
    }

    /**
     * Build a mutation-approval command only when the exact config
     * and worktree identities are known.
     *
     * @param array<string, mixed> $context
     */
    private function exactMutationApprovalCommand(array $context): string
    {
        $configId = trim((string) ($context['config_id'] ?? ''));
        $worktree = trim((string) (
            $context['mission_worktree']
            ?? ($context['worktree'] ?? '')
        ));

        if ($configId === '' || $worktree === '') {
            return 'php spark aiops:thought-worktree:status';
        }

        return 'php spark aiops:thought-worktree:force-mutation --config='
            . escapeshellarg($configId)
            . ' --worktree='
            . escapeshellarg($worktree)
            . ' --reason='
            . escapeshellarg('Owner-approved implementation')
            . ' --approve';
    }

    /** Build an exact governed baseline reconciliation command. */
    private function exactBaselineReconciliationCommand(
        array $context
    ): string {
        $configId = trim((string) ($context['config_id'] ?? ''));
        $worktree = trim((string) (
            $context['mission_worktree']
            ?? ($context['worktree'] ?? '')
        ));

        if ($configId === '') {
            return 'php spark aiops:thought-worktree:status';
        }

        $command = 'php spark aiops:thought-worktree:baseline-reconcile'
            . ' --config=' . escapeshellarg($configId);

        if ($worktree !== '') {
            $command .= ' --worktree=' . escapeshellarg($worktree);
        }

        return $command . ' --approve';
    }

    /**
     * @param array<string, mixed> $context
     */
    private function canonicalWorktree(
        array $context
    ): string {
        $candidate = trim((string) (
            $context['worktree']
            ?? (getcwd() ?: ROOTPATH)
        ));

        $root = trim((string) shell_exec(
            'git -C '
            . escapeshellarg($candidate)
            . ' rev-parse --show-toplevel 2>/dev/null'
        ));

        return rtrim(
            $root !== '' ? $root : $candidate,
            '/'
        );
    }


}
