<?php

namespace App\Libraries\SecureTransfer;

/** Shared hashing for audit entries: row_hash = sha256(prev_hash "\n" canonical entry). */
final class AuditChain
{
    public const GENESIS = '0000000000000000000000000000000000000000000000000000000000000000';
    public const FIELDS = ['event', 'user_id', 'wallet', 'transfer_id', 'ip', 'user_agent', 'detail', 'created_at'];

    /** Keeps only known fields, with fixed types and lengths. */
    public static function normalize(string $event, array $entry): array
    {
        $detail = $entry['detail'] ?? [];
        return [
            'event' => $event,
            'user_id' => isset($entry['user_id']) && $entry['user_id'] !== null ? (int) $entry['user_id'] : null,
            'wallet' => isset($entry['wallet']) && $entry['wallet'] !== '' ? substr((string) $entry['wallet'], 0, 64) : null,
            'transfer_id' => isset($entry['transfer_id']) && $entry['transfer_id'] !== '' ? substr((string) $entry['transfer_id'], 0, 32) : null,
            'ip' => isset($entry['ip']) && $entry['ip'] !== '' ? substr((string) $entry['ip'], 0, 45) : null,
            'user_agent' => isset($entry['user_agent']) && $entry['user_agent'] !== '' ? mb_substr((string) $entry['user_agent'], 0, 255) : null,
            'detail' => is_string($detail) ? $detail : TransferCrypto::canonicalJson(is_array($detail) ? $detail : []),
            'created_at' => (int) ($entry['created_at'] ?? time()),
        ];
    }

    public static function hash(string $prevHash, array $row): string
    {
        $fields = [];
        foreach (self::FIELDS as $f) {
            $v = $row[$f] ?? null;
            $fields[$f] = ($f === 'user_id' || $f === 'created_at') && $v !== null ? (int) $v : $v;
        }
        return hash('sha256', $prevHash . "\n" . json_encode($fields, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }
}
