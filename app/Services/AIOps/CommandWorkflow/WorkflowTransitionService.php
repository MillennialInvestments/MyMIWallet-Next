<?php

namespace App\Services\AIOps\CommandWorkflow;

/**
 * Authoritative transition contract shared by
 * ai check/status/next/continue/do/finish.
 */
class WorkflowTransitionService
{
    public const REACTION_POLICY_SCHEMA =
        'tbi_aiops_reaction_policy_v1';

    public const REACTION_AUTO_READ_ONLY =
        'AUTO_READ_ONLY';

    public const REACTION_AUTO_SAFE_PREPARATION =
        'AUTO_SAFE_PREPARATION';

    public const REACTION_OWNER_APPROVAL_REQUIRED =
        'OWNER_APPROVAL_REQUIRED';

    public const REACTION_EXTERNAL_WAIT =
        'EXTERNAL_WAIT';

    public const REACTION_HARD_STOP =
        'HARD_STOP';

    public const REACTION_PROHIBITED =
        'PROHIBITED';

    public const REACTION_COMPLETE =
        'COMPLETE';

    public function build(
        array $context,
        string $previousCommand = '',
        string $previousResult = '',
        ?array $guidanceOverride = null
    ): array {
        $guide = $guidanceOverride
            ?? ($context['guidance'] ?? []);

        $material = $this->materialState(
            $context,
            $guide
        );

        $materialStateHash = hash(
            'sha256',
            json_encode(
                $material,
                JSON_UNESCAPED_SLASHES
            )
        );

        $class = trim(
            (string) (
                $guide['class']
                ?? ''
            )
        );

        $command = trim(
            (string) (
                $guide['next_command']
                ?? 'ai check'
            )
        );

        $requiresApproval =
            $this->requiresApproval(
                $class
            );

        $destructive =
            $this->destructive(
                $command
            );

        $reactionPolicy =
            $this->reactionPolicy(
                $class,
                $command,
                $requiresApproval,
                $destructive
            );

        return [
            'schema' =>
                'tbi_aiops_authoritative_transition_v1',

            'transition_id' =>
                'aitx-'
                . substr(
                    $materialStateHash,
                    0,
                    20
                ),

            'material_state_hash' =>
                $materialStateHash,

            'created_at' => date(DATE_ATOM),

            'repository' =>
                $material['repository'],

            'worktree' =>
                $material['worktree'],

            'branch' =>
                $material['branch'],

            'head' =>
                $material['head'],

            'origin_main' =>
                $material['origin_main'],

            'config_id' =>
                $material['config_id'],

            'mission_id' =>
                $material['mission_id'],

            'objective_id' =>
                $material['objective_id'],

            'objective_hash' =>
                $material['objective_hash'],

            'recipe_id' =>
                $material['recipe_id'],

            'recipe_baseline' =>
                $material['recipe_baseline'],

            'execution_id' =>
                $material['execution_id'],

            'recovery_id' =>
                $material['recovery_id'],

            'pull_request_number' =>
                $material['pull_request_number'],

            'pull_request_state' =>
                $material['pull_request_state'],

            'pull_request_head' =>
                $material['pull_request_head'],

            'current_state' =>
                $context['state_name']
                ?? ($guide['class'] ?? 'unknown'),

            'previous_command' =>
                $previousCommand,

            'previous_result' =>
                $previousResult,

            'next_command' =>
                $guide['next_command']
                ?? 'ai check',

            'reason' =>
                $guide['why']
                ?? ($guide['reason'] ?? ''),

            'preconditions' =>
                $guide['preconditions'] ?? '',

            'expected_result' =>
                $guide['expected_result'] ?? '',

            'failure_response' =>
                $guide['fallback'] ?? '',

            'rollback' =>
                $guide['rollback'] ?? '',

            'reaction_policy_schema' =>
                self::REACTION_POLICY_SCHEMA,

            'reaction_policy' =>
                $reactionPolicy,

            'requires_approval' =>
                $requiresApproval,

            'destructive' =>
                $destructive,
        ];
    }

    public function assertCurrent(
        array $transition,
        array $context
    ): array {
        $current = $this->build(
            $context,
            $transition['previous_command'] ?? '',
            $transition['previous_result'] ?? ''
        );

        $errors = [];

        foreach (
            [
                'repository',
                'worktree',
                'branch',
                'head',
                'origin_main',
                'config_id',
                'mission_id',
                'objective_id',
                'objective_hash',
                'recipe_id',
                'recipe_baseline',
                'execution_id',
                'recovery_id',
                'pull_request_number',
                'pull_request_state',
                'pull_request_head',
                'material_state_hash',
            ]
            as $field
        ) {
            $expected = (string) (
                $transition[$field]
                ?? ''
            );

            if (
                $expected !== ''
                && $expected !== (string) (
                    $current[$field]
                    ?? ''
                )
            ) {
                $errors[] =
                    $field . '_mismatch';
            }
        }

        if (
            ($transition['transition_id'] ?? '')
            !== ($current['transition_id'] ?? '')
        ) {
            $errors[] =
                'stale_or_substituted_transition';
        }

        if (
            ($context['baseline_drift'] ?? '')
            === 'origin_main_advanced'
            && ! $this->baselineRecoveryTransition(
                $transition
            )
        ) {
            $errors[] =
                'origin_main_advanced';
        }

        $recoveryState = strtolower(
            trim(
                (string) (
                    $context['recovery_state']
                    ?? 'none'
                )
            )
        );

        if (
            ! in_array(
                $recoveryState,
                [
                    '',
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
            $errors[] =
                'unresolved_recovery';
        }

        return array_values(
            array_unique($errors)
        );
    }

    public function repeatedFailedTransition(
        array $previous,
        array $current
    ): bool {
        $previousResult = strtolower(
            trim(
                (string) (
                    $previous['previous_result']
                    ?? ''
                )
            )
        );

        if (
            ! in_array(
                $previousResult,
                [
                    'blocked',
                    'fail',
                    'failed',
                    'failure',
                    'error',
                ],
                true
            )
        ) {
            return false;
        }

        $previousHash = trim(
            (string) (
                $previous['material_state_hash']
                ?? ''
            )
        );

        $currentHash = trim(
            (string) (
                $current['material_state_hash']
                ?? ''
            )
        );

        if (
            $previousHash === ''
            || $currentHash === ''
        ) {
            return false;
        }

        return hash_equals(
            $previousHash,
            $currentHash
        )
            && (string) (
                $previous['next_command']
                ?? ''
            ) === (string) (
                $current['next_command']
                ?? ''
            );
    }

    public function readLatest(string $root): array
    {
        $path =
            rtrim($root, '/')
            . '/writable/aiops/transitions/latest.json';

        if (! is_file($path)) {
            return [];
        }

        $decoded = json_decode(
            (string) file_get_contents($path),
            true
        );

        return is_array($decoded)
            ? $decoded
            : [];
    }

    public function writeLatest(
        string $root,
        array $transition
    ): void {
        $dir =
            rtrim($root, '/')
            . '/writable/aiops/transitions';

        if (! is_dir($dir)) {
            mkdir(
                $dir,
                0775,
                true
            );
        }

        file_put_contents(
            $dir . '/latest.json',
            json_encode(
                $transition,
                JSON_PRETTY_PRINT
                    | JSON_UNESCAPED_SLASHES
            ) . PHP_EOL,
            LOCK_EX
        );
    }

    private function materialState(
        array $context,
        array $guide
    ): array {
        return [
            'repository' =>
                (string) (
                    $context['repository']
                    ?? ''
                ),

            'worktree' =>
                (string) (
                    $context['worktree']
                    ?? ''
                ),

            'branch' =>
                (string) (
                    $context['branch']
                    ?? ''
                ),

            'head' =>
                (string) (
                    $context['head']
                    ?? ''
                ),

            'origin_main' =>
                (string) (
                    $context['origin_main']
                    ?? ''
                ),

            'config_id' =>
                (string) (
                    $context['config_id']
                    ?? ''
                ),

            'mission_id' =>
                (string) (
                    $context['mission']['mission_id']
                    ?? ''
                ),

            'objective_id' =>
                (string) (
                    $context['objective']['objective_id']
                    ?? ''
                ),

            'objective_hash' =>
                (string) (
                    $context['objective']
                        ['normalized_objective_hash']
                    ?? ''
                ),

            'recipe_id' =>
                (string) (
                    $context['recipe']['recipe_id']
                    ?? ''
                ),

            'recipe_baseline' =>
                (string) (
                    $context['recipe']
                        ['baseline_commit']
                    ?? ''
                ),

            'execution_id' =>
                (string) (
                    $context['execution']['execution_id']
                    ?? (
                        $context['execution']['record']
                            ['execution_id']
                        ?? ''
                    )
                ),

            'recovery_id' =>
                (string) (
                    $context['recovery']['recovery_id']
                    ?? (
                        $context['recovery']['plan_id']
                        ?? ''
                    )
                ),

            'pull_request_number' =>
                (string) (
                    $context['pull_request']['number']
                    ?? ''
                ),

            'pull_request_state' =>
                (string) (
                    $context['pull_request_state']
                    ?? (
                        $context['pull_request']['state']
                        ?? ''
                    )
                ),

            'pull_request_head' =>
                (string) (
                    $context['pull_request']['head']
                    ?? ''
                ),

            'baseline_drift' =>
                (string) (
                    $context['baseline_drift']
                    ?? ''
                ),

            'recovery_state' =>
                (string) (
                    $context['recovery_state']
                    ?? 'none'
                ),

            'guidance_class' =>
                (string) (
                    $guide['class']
                    ?? ''
                ),

            'next_command' =>
                (string) (
                    $guide['next_command']
                    ?? 'ai check'
                ),
        ];
    }

    private function reactionPolicy(
        string $class,
        string $command,
        bool $requiresApproval,
        bool $destructive
    ): string {
        if ($class === 'objective_complete') {
            return self::REACTION_COMPLETE;
        }

        if (
            in_array(
                $class,
                [
                    'origin_main_advanced',
                    'stale_recipe_baseline',
                ],
                true
            )
            && $this->safeBaselineReconciliationCommand(
                $command
            )
        ) {
            return self::REACTION_AUTO_SAFE_PREPARATION;
        }

        if (
            $class === 'pr_merged_convergence_required'
        ) {
            return self::REACTION_AUTO_SAFE_PREPARATION;
        }

        if (
            $requiresApproval
            || in_array(
                $class,
                [
                    'recipe_review_required',
                    'pr_finish_eligible',
                    'merge_approval_required',
                    'production_approval_required',
                ],
                true
            )
        ) {
            return self::REACTION_OWNER_APPROVAL_REQUIRED;
        }

        if (
            in_array(
                $class,
                [
                    'recipe_execution_in_progress',
                    'ci_pending',
                    'pr_checks_pending',
                    'pr_checks_unavailable',
                    'pr_state_unavailable',
                ],
                true
            )
        ) {
            return self::REACTION_EXTERNAL_WAIT;
        }

        if (
            in_array(
                $class,
                [
                    'recovery_loop',
                    'recovery_loop_detected',
                    'origin_main_non_ancestor',
                    'worktree_other_contributor',
                    'worktree_protected_runtime',
                    'worktree_health_safety_stop',
                    'worktree_repair_loop_detected',
                    'concurrent_lane',
                    'concurrent_lane_conflict',
                    'stale_completed_mission',
                    'stale_mission_state_after_command_completion',
                    'control_plane_version_skew',
                    'ci_failed',
                    'stale_smoke_contract',
                    'source_patch_context_insufficient',
                    'pr_checks_failed',
                    'pr_head_mismatch',
                    'pr_blocked',
                ],
                true
            )
        ) {
            return self::REACTION_HARD_STOP;
        }

        if ($destructive) {
            return self::REACTION_PROHIBITED;
        }

        if (
            in_array(
                $class,
                [
                    'model_not_certified',
                    'uncertified_source_patch_model',
                    'effective_certified_model_mismatch',
                    'worktree_class1_gate_incomplete',
                ],
                true
            )
            || $this->readOnlyCommand(
                $command
            )
        ) {
            return self::REACTION_AUTO_READ_ONLY;
        }

        if (
            in_array(
                $class,
                [
                    'objective_missing',
                    'recipe_missing',
                    'recipe_mutation_successor_required',
                    'recipe_execution_required',
                    'recipe_validation_required',
                    'missing_vendor',
                    'missing_env',
                    'missing_writable_paths',
                    'stale_wrapper',
                    'installed_wrapper_drift',
                    'wrapper_checksum_mismatch',
                    'worktree_repair_transient',
                ],
                true
            )
            || $this->safePreparationCommand(
                $command
            )
        ) {
            return self::REACTION_AUTO_SAFE_PREPARATION;
        }

        return self::REACTION_HARD_STOP;
    }

    /**
     * Return true only for the exact governed linear baseline
     * reconciliation command emitted by WorkflowFailureClassifier.
     */
    private function safeBaselineReconciliationCommand(
        string $command
    ): bool {
        if (
            $command === ''
            || preg_match(
                '/[;&|`<>\r\n]/',
                $command
            ) === 1
        ) {
            return false;
        }

        return preg_match(
            "#^php spark "
            . "aiops:thought-worktree:"
            . "baseline-reconcile"
            . " --config='[^'\\r\\n]+'"
            . "(?: --worktree='[^'\\r\\n]+')?"
            . " --approve$#",
            $command
        ) === 1;
    }

    /**
     * A transition may execute through the stale baseline only when
     * that transition is itself the exact bounded repair.
     *
     * @param array<string, mixed> $transition
     */
    private function baselineRecoveryTransition(
        array $transition
    ): bool {
        $class = trim(
            (string) (
                $transition['current_state']
                ?? ''
            )
        );

        if (
            ! in_array(
                $class,
                [
                    'origin_main_advanced',
                    'stale_recipe_baseline',
                ],
                true
            )
        ) {
            return false;
        }

        return $this->safeBaselineReconciliationCommand(
            trim(
                (string) (
                    $transition['next_command']
                    ?? ''
                )
            )
        );
    }

    private function readOnlyCommand(
        string $command
    ): bool {
        return preg_match(
            '/^(git (status|diff|log|show|rev-parse|merge-base)\\b'
            . '|gh (pr (view|checks)|auth status)\\b'
            . '|ai (check|next|inventory|review|context)\\b'
            . '|php spark aiops:worktree:doctor\\b'
            . '|php spark aiops:command-workflow context\\b)/',
            $command
        ) === 1;
    }

    private function safePreparationCommand(
        string $command
    ): bool {
        if (
            str_contains(
                $command,
                '--approve'
            )
            || str_contains(
                $command,
                '--approve-mutation'
            )
        ) {
            return false;
        }

        return preg_match(
            '/^(php spark aiops:execution-engine:recipe\\b'
            . '|php spark aiops:execution-engine:recipe-run\\b'
            . '|php spark aiops:execution-engine:validate\\b'
            . '|composer install\\b'
            . '|mkdir -p writable\/aiops\\b)/',
            $command
        ) === 1;
    }

    private function requiresApproval(
        string $class
    ): bool {
        return in_array(
            $class,
            [
                'recipe_approval_required',
                'mutation_approval_required',
                'pr_finish_eligible',
                'merge_approval_required',
                'production_approval_required',
            ],
            true
        );
    }

    private function destructive(
        string $command
    ): bool {
        return preg_match(
            '/\b(rm|reset --hard|clean -fd|push|merge|deploy)\b/',
            $command
        ) === 1;
    }
}
