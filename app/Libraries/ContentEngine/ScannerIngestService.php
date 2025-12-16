<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use App\Config\ContentEngine as ContentEngineConfig;
use App\Models\ContentScannerIngestModel;
use App\Models\ContentScannerRowModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;
use RuntimeException;

class ScannerIngestService
{
    protected ContentEngineConfig $config;
    protected ContentScannerIngestModel $ingestModel;
    protected ContentScannerRowModel $rowModel;
    protected BaseConnection $db;

    public function __construct(?ContentEngineConfig $config = null)
    {
        $this->config = $config ?? config(ContentEngineConfig::class);
        $this->ingestModel = model(ContentScannerIngestModel::class);
        $this->rowModel = model(ContentScannerRowModel::class);
        $this->db = Database::connect();
    }

    /**
     * Validate and persist a scanner payload.
     */
    public function ingest(array $payload, string $source = 'manual_chatgpt'): array
    {
        $this->guardPayloadSize($payload);
        $this->validatePayload($payload);

        $hash = hash('sha256', json_encode($payload));
        if ($existing = $this->ingestModel->where('payload_hash', $hash)->first()) {
            return [
                'ingest_id' => (int) $existing['id'],
                'row_count' => (int) $existing['row_count'],
                'status'    => $existing['status'],
                'duplicate' => true,
            ];
        }

        $rows = $payload['rows'];
        $normalizedRows = [];
        foreach ($rows as $row) {
            $normalizedRows[] = $this->normalizeRow((array) $row);
        }

        $quoteTs = $payload['quote_ts'] ?? null;
        $quoteTs = $quoteTs ? date('Y-m-d H:i:s', strtotime((string) $quoteTs)) : null;

        $this->db->transBegin();
        try {
            $ingestId = $this->ingestModel->insert([
                'scan_name'    => (string) ($payload['scan_name'] ?? 'unknown'),
                'quote_ts'     => $quoteTs,
                'payload_hash' => $hash,
                'source'       => $source,
                'row_count'    => count($normalizedRows),
                'status'       => 'received',
            ]);

            if (! $ingestId) {
                throw new RuntimeException('Unable to create ingest record.');
            }

            foreach ($normalizedRows as $row) {
                $row['ingest_id'] = $ingestId;
                $row['created_at'] = date('Y-m-d H:i:s');
                $this->rowModel->insert($row);
            }

            $this->db->transCommit();

            return [
                'ingest_id' => (int) $ingestId,
                'row_count' => count($normalizedRows),
                'status'    => 'received',
            ];
        } catch (\Throwable $e) {
            $this->db->transRollback();
            $this->ingestModel->insert([
                'scan_name'    => (string) ($payload['scan_name'] ?? 'unknown'),
                'quote_ts'     => $quoteTs,
                'payload_hash' => $hash,
                'source'       => $source,
                'row_count'    => count($normalizedRows ?? []),
                'status'       => 'failed',
            ]);
            throw $e;
        }
    }

    protected function validatePayload(array $payload): void
    {
        if (empty($payload['rows']) || ! is_array($payload['rows'])) {
            throw new RuntimeException('Invalid payload: rows array is required.');
        }

        if (empty($payload['scan_name'])) {
            throw new RuntimeException('Invalid payload: scan_name is required.');
        }
    }

    protected function guardPayloadSize(array $payload): void
    {
        $size = strlen(json_encode($payload));
        if ($size > $this->config->maxPayloadBytes) {
            throw new RuntimeException('Payload too large for ingest.');
        }
    }

    protected function normalizeRow(array $row): array
    {
        $normalized = [
            'raw_json' => json_encode($row),
        ];

        foreach ($row as $key => $value) {
            $mappedKey = $this->config->aliasMap[$key] ?? null;
            if (! $mappedKey) {
                continue;
            }

            if ($mappedKey === 'symbol') {
                $normalized['symbol'] = strtoupper((string) $value);
                continue;
            }

            if (in_array($mappedKey, $this->config->numericFields, true)) {
                $normalized[$mappedKey] = is_numeric($value) ? (float) $value : null;
                continue;
            }

            $normalized[$mappedKey] = $value;
        }

        // Default symbol
        if (empty($normalized['symbol']) && ! empty($row['symbol'])) {
            $normalized['symbol'] = strtoupper((string) $row['symbol']);
        }

        return $normalized;
    }
}