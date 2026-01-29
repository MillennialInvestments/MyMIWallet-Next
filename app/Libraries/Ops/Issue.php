<?php

declare(strict_types=1);

namespace App\Libraries\Ops;

final class Issue
{
    /**
     * @param array{
     *   domain: string,
     *   severity: string,
     *   title: string,
     *   evidence?: array<int|string, mixed>,
     *   suggested_fix?: array<int, string>|string,
     *   ai_prompt?: string,
     *   codex_prompt?: string,
     *   chatgpt_prompt?: string,
     *   owner?: string,
     *   status?: string,
     *   auto_queue?: bool
     * } $data
     * @return array{
     *   id: string,
     *   task_key: string,
     *   domain: string,
     *   severity: string,
     *   title: string,
     *   evidence: array<int|string, mixed>,
     *   suggested_fix: array<int, string>|string,
     *   ai_prompt: string,
     *   codex_prompt: string,
     *   chatgpt_prompt: string,
     *   owner: string,
     *   status: string,
     *   auto_queue: bool
     * }
     */
    public static function build(array $data): array
    {
        $issue = [
            'domain' => $data['domain'],
            'severity' => strtoupper($data['severity']),
            'title' => $data['title'],
            'evidence' => $data['evidence'] ?? [],
            'suggested_fix' => $data['suggested_fix'] ?? [],
            'ai_prompt' => $data['ai_prompt'] ?? '',
            'codex_prompt' => $data['codex_prompt'] ?? '',
            'chatgpt_prompt' => $data['chatgpt_prompt'] ?? '',
            'owner' => $data['owner'] ?? 'human',
            'status' => $data['status'] ?? 'open',
            'auto_queue' => (bool) ($data['auto_queue'] ?? false),
        ];

        $issue['id'] = self::hash($issue);
        $issue['task_key'] = $issue['id'];

        return $issue;
    }

    /**
     * @param array<string, mixed> $issue
     */
    public static function hash(array $issue): string
    {
        $payload = [
            'domain' => $issue['domain'] ?? '',
            'title' => $issue['title'] ?? '',
            'primary_evidence' => self::primaryEvidence($issue['evidence'] ?? []),
        ];

        return sha1(json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }

    /**
     * @param array<int|string, mixed> $evidence
     */
    private static function primaryEvidence(array $evidence): string
    {
        if (isset($evidence['file'])) {
            return sprintf('%s:%s', (string) $evidence['file'], (string) ($evidence['constructor_line'] ?? ''));
        }

        if (isset($evidence['matches']) && is_array($evidence['matches'])) {
            return (string) ($evidence['matches'][0] ?? '');
        }

        if (isset($evidence['failures'])) {
            return json_encode($evidence['failures'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        if (isset($evidence['issues'])) {
            return json_encode($evidence['issues'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        $first = $evidence === [] ? '' : reset($evidence);

        if (is_scalar($first)) {
            return (string) $first;
        }

        return json_encode($first, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
