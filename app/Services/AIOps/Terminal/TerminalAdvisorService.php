<?php

namespace App\Services\AIOps\Terminal;

use App\Services\AIOps\CommandWorkflow\WorkflowContextService;
use App\Services\AIOps\CommandWorkflow\WorkflowTransitionService;

class TerminalAdvisorService
{
    private ContributorTerminalSettingsService $settings;
    private WorkflowContextService $context;
    private WorkflowTransitionService $transitions;

    public function __construct(
        ?ContributorTerminalSettingsService $settings = null,
        ?WorkflowContextService $context = null,
        ?WorkflowTransitionService $transitions = null
    ) {
        $this->settings = $settings ?? new ContributorTerminalSettingsService();
        $this->context = $context ?? new WorkflowContextService();
        $this->transitions = $transitions ?? new WorkflowTransitionService();
    }

    public function advise(string $cwd, string $transcript = ''): array
    {
        $effective = $this->settings->effective();
        $advisor = is_array($effective['advisor'] ?? null) ? $effective['advisor'] : [];
        $snapshot = $this->context->snapshot($cwd);
        $transition = $this->transitions->build($snapshot);
        $parsed = $this->parseTranscript($transcript);

        if (($parsed['next_command'] ?? '') !== '') {
            $transition['next_command'] = $parsed['next_command'];
        }

        if (($parsed['reason'] ?? '') !== '') {
            $transition['reason'] = $parsed['reason'];
        }

        $repeat = $this->recordState(
            (string) ($transition['material_state_hash'] ?? ''),
            (string) ($transition['next_command'] ?? '')
        );
        $repeatThreshold = max(2, (int) ($advisor['repeat_state_threshold'] ?? 3));
        $lostDetected = (bool) ($advisor['lost_detection'] ?? true)
            && $repeat['repeat_count'] >= $repeatThreshold;

        $failureClass = (string) ($snapshot['failure_class'] ?? 'unknown');
        $mission = is_array($snapshot['mission'] ?? null) ? $snapshot['mission'] : [];
        $branch = (string) ($snapshot['branch'] ?? '');
        $changed = (int) ($snapshot['source_status_count'] ?? 0);
        $missionExact = (bool) ($snapshot['mission_exact_match'] ?? false);
        $mutation = (bool) ($snapshot['mutation_permission'] ?? false);
        $baseline = (string) ($snapshot['baseline_drift'] ?? 'unknown');
        $reaction = (string) ($transition['reaction_policy'] ?? '');
        $ownerGate = $reaction === WorkflowTransitionService::REACTION_OWNER_APPROVAL_REQUIRED;

        $summary = $this->plainSummary(
            $failureClass,
            $branch,
            $changed,
            $missionExact,
            $mutation,
            $baseline,
            $ownerGate
        );

        $next = trim((string) ($transition['next_command'] ?? 'ai check'));
        $why = trim((string) ($transition['reason'] ?? ($snapshot['guidance']['why'] ?? '')));
        $options = $this->safeOptions($snapshot, $next, $ownerGate);
        $objective = trim((string) (
            $snapshot['objective_text']
            ?? $mission['objective']
            ?? $mission['thought']
            ?? $mission['title']
            ?? ''
        ));

        return [
            'schema' => 'tbi_aiops_terminal_advisor_v1',
            'enabled' => (bool) ($advisor['enabled'] ?? true),
            'contributor' => (string) ($snapshot['contributor'] ?? getenv('USER') ?: 'unknown'),
            'repository' => (string) ($snapshot['repository'] ?? ''),
            'worktree' => (string) ($snapshot['worktree'] ?? $cwd),
            'branch' => $branch,
            'changed_files' => $changed,
            'mission_exact_match' => $missionExact,
            'mission_lifecycle' => (string) ($snapshot['mission_lifecycle'] ?? 'missing'),
            'mission_phase' => (string) ($snapshot['mission_phase'] ?? 'missing'),
            'mission_task' => (string) ($snapshot['mission_task'] ?? 'missing'),
            'objective' => $objective,
            'failure_class' => $failureClass,
            'baseline_state' => $baseline,
            'mutation_permission' => $mutation,
            'reaction_policy' => $reaction,
            'owner_gate' => $ownerGate,
            'summary' => $summary,
            'next_command' => $next,
            'why' => $why,
            'safe_options' => $options,
            'lost_detected' => $lostDetected,
            'repeat_count' => $repeat['repeat_count'],
            'report_line' => $this->reportLine($snapshot, $failureClass, $next),
            'transcript_status' => $parsed['status'] ?? '',
        ];
    }

    private function plainSummary(
        string $failureClass,
        string $branch,
        int $changed,
        bool $missionExact,
        bool $mutation,
        string $baseline,
        bool $ownerGate
    ): string {
        if (in_array($failureClass, ['merged_or_archived_worktree', 'stale_completed_mission'], true)) {
            return 'This worktree is finished or archived. Treat it as read-only and choose another active lane.';
        }

        if ($failureClass === 'missing_persisted_mission') {
            return 'You are in a repository, but AIOps does not see an active mission bound to this exact worktree yet.';
        }

        if ($failureClass === 'dirty_main') {
            return 'You are on the protected main branch with local changes. Do not continue implementation here; move the work into a governed feature lane.';
        }

        if ($ownerGate) {
            return 'The technical work is at an approval boundary. AIOps can explain the state, but an owner/reviewer action is required before it can continue.';
        }

        if ($missionExact) {
            $text = 'You are in the correct governed feature worktree for the active mission.';
            $text .= $changed > 0
                ? ' AIOps sees ' . $changed . ' changed source path' . ($changed === 1 ? '' : 's') . ' in this lane.'
                : ' The worktree is currently clean.';

            if ($baseline !== 'in_bounds') {
                $text .= ' The current baseline state is ' . $baseline . ', so the next action must respect that gate.';
            } elseif ($mutation) {
                $text .= ' The mission has governed mutation authority inside its approved boundary.';
            }

            return $text;
        }

        if (in_array($branch, ['main', 'master'], true)) {
            return 'You are on the canonical branch. This is a good place to inspect, sync, or start a new objective, but implementation should happen in a feature worktree.';
        }

        return 'AIOps can see this Git lane, but the current mission/worktree identity is not an exact active match. Use the recommended next action before changing source.';
    }

    private function safeOptions(array $snapshot, string $next, bool $ownerGate): array
    {
        $options = [];

        if ($next !== '') {
            $options[] = [
                'label' => 'Recommended next action',
                'command' => $next,
                'kind' => $ownerGate ? 'owner_gate' : 'recommended',
            ];
        }

        if (! $ownerGate && (bool) ($snapshot['mission_exact_match'] ?? false)) {
            $options[] = [
                'label' => 'Let AIOps continue bounded work automatically',
                'command' => 'ai autopilot',
                'kind' => 'autopilot',
            ];
        }

        $options[] = [
            'label' => 'Explain this terminal again',
            'command' => 'ai guide',
            'kind' => 'read_only',
        ];
        $options[] = [
            'label' => 'Show contributor settings',
            'command' => 'ai settings show',
            'kind' => 'read_only',
        ];

        return array_slice($options, 0, 4);
    }

    private function parseTranscript(string $text): array
    {
        if (trim($text) === '') {
            return [];
        }

        $result = [];

        if (preg_match('/^STATUS:\s*(.+)$/mi', $text, $match) === 1) {
            $result['status'] = trim($match[1]);
        }

        if (preg_match('/^NEXT:\s*(.+)$/mi', $text, $match) === 1) {
            $result['next_command'] = trim($match[1]);
        }

        if (preg_match('/^WHY:\s*(.+)$/mi', $text, $match) === 1) {
            $result['reason'] = trim($match[1]);
        }

        return $result;
    }

    private function recordState(string $materialHash, string $next): array
    {
        $home = rtrim((string) (getenv('HOME') ?: ''), '/');
        $dir = $home !== ''
            ? $home . '/.tbi-aiops/terminal'
            : WRITEPATH . 'aiops/terminal/contributor';
        $path = $dir . '/advisor-state.json';
        $previous = [];

        if (is_file($path)) {
            $decoded = json_decode((string) file_get_contents($path), true);
            $previous = is_array($decoded) ? $decoded : [];
        }

        $same = $materialHash !== ''
            && $materialHash === (string) ($previous['material_state_hash'] ?? '')
            && $next === (string) ($previous['next_command'] ?? '');
        $repeat = $same ? ((int) ($previous['repeat_count'] ?? 0) + 1) : 1;
        $payload = [
            'schema_version' => 1,
            'updated_at_utc' => gmdate(DATE_ATOM),
            'material_state_hash' => $materialHash,
            'next_command' => $next,
            'repeat_count' => $repeat,
        ];

        if ((! is_dir($dir) && ! mkdir($dir, 0700, true) && ! is_dir($dir)) === false) {
            @chmod($dir, 0700);
            @file_put_contents(
                $path,
                json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL,
                LOCK_EX
            );
            @chmod($path, 0600);
        }

        return $payload;
    }

    private function reportLine(array $snapshot, string $failureClass, string $next): string
    {
        return sprintf(
            'Contributor=%s | Repo=%s | Branch=%s | Phase=%s | Task=%s | Changed=%d | State=%s | Next=%s',
            (string) ($snapshot['contributor'] ?? 'unknown'),
            (string) ($snapshot['repository'] ?? 'unknown'),
            (string) ($snapshot['branch'] ?? 'unknown'),
            (string) ($snapshot['mission_phase'] ?? 'missing'),
            (string) ($snapshot['mission_task'] ?? 'missing'),
            (int) ($snapshot['source_status_count'] ?? 0),
            $failureClass,
            $next
        );
    }
}
