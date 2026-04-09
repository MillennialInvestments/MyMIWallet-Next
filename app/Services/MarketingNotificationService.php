<?php

namespace App\Services;

use Config\Database;

class MarketingNotificationService
{
    public function getNotificationById(int $id): ?array
    {
        $row = Database::connect()->table('bf_marketing_notifications')->where('id', $id)->get()->getRowArray();

        return $row ?: null;
    }

    public function normalizeNotification(array $notification): array
    {
        $raw = (string) ($notification['translated_text'] ?? $notification['raw_text'] ?? $notification['content'] ?? '');
        $summary = trim((string) ($notification['summary'] ?? ''));

        if ($summary === '') {
            $summary = mb_substr(trim(strip_tags($raw)), 0, 500);
        }

        $keywords = $notification['keywords'] ?? [];
        if (! is_array($keywords)) {
            $decoded = json_decode((string) $keywords, true);
            if (is_array($decoded)) {
                $keywords = $decoded;
            } else {
                $keywords = array_filter(array_map('trim', explode(',', (string) $keywords)));
            }
        }

        return [
            'id' => (int) ($notification['id'] ?? 0),
            'title' => trim((string) ($notification['title'] ?? $notification['source_name'] ?? '')),
            'content' => trim(strip_tags($raw)),
            'summary' => $summary,
            'keywords' => array_values(array_map('strval', array_filter($keywords))),
            'source_url' => (string) ($notification['source_url'] ?? ''),
            'status' => (string) ($notification['status'] ?? 'pending'),
            'created_at' => $notification['created_at'] ?? null,
        ];
    }
}
