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
     *   owner?: string,
     *   status?: string
     * } $data
     * @return array{
     *   id: string,
     *   domain: string,
     *   severity: string,
     *   title: string,
     *   evidence: array<int|string, mixed>,
     *   suggested_fix: array<int, string>|string,
     *   ai_prompt: string,
     *   owner: string,
     *   status: string
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
            'owner' => $data['owner'] ?? 'human',
            'status' => $data['status'] ?? 'open',
        ];

        $issue['id'] = self::hash($issue);

        return $issue;
    }

    /**
     * @param array<string, mixed> $issue
     */
    public static function hash(array $issue): string
    {
        $payload = [
            'domain' => $issue['domain'] ?? '',
            'severity' => $issue['severity'] ?? '',
            'title' => $issue['title'] ?? '',
            'evidence' => $issue['evidence'] ?? [],
        ];

        return sha1(json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }
}
