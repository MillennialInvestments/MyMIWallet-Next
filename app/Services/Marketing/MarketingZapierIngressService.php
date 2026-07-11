<?php

declare(strict_types=1);

namespace App\Services\Marketing;

use App\Models\Marketing\MarketingZapierIngressIdempotencyModel;
use App\Models\Marketing\MarketingZapierIngressModel;
use DateTimeImmutable;
use RuntimeException;
use Throwable;

final class MarketingZapierIngressService
{
    private ?MarketingZapierIngressModel $inboundWebhookModel;
    private ?MarketingZapierIngressIdempotencyModel $idempotencyModel;

    public function __construct(
        ?MarketingZapierIngressModel $inboundWebhookModel = null,
        ?MarketingZapierIngressIdempotencyModel $idempotencyModel = null
    ) {
        $this->inboundWebhookModel = $inboundWebhookModel;
        $this->idempotencyModel = $idempotencyModel;
    }

    /**
     * Validate the full contract without accessing the database.
     *
     * @return array{status_code:int,body:array<string,mixed>}
     */
    public function preview(
        string $source,
        string $idempotencyKey,
        array $payload
    ): array {
        $prepared = $this->prepare(
            $source,
            $idempotencyKey,
            $payload
        );

        if (! $prepared['ok']) {
            return $prepared['result'];
        }

        return [
            'status_code' => 202,
            'body' => [
                'status' => 'accepted_preview',
                'data' => [
                    'source' => $prepared['source'],
                    'idempotency_key' => $prepared['idempotency_key'],
                    'request_hash' => $prepared['request_hash'],
                ],
                'error' => null,
                'meta' => [
                    'persisted' => false,
                    'external_calls' => false,
                    'ts' => date('c'),
                ],
            ],
        ];
    }

    /**
     * Validate, deduplicate and persist a controlled intake record.
     *
     * @return array{status_code:int,body:array<string,mixed>}
     */
    public function process(
        string $source,
        string $idempotencyKey,
        array $payload
    ): array {
        $prepared = $this->prepare(
            $source,
            $idempotencyKey,
            $payload
        );

        if (! $prepared['ok']) {
            return $prepared['result'];
        }

        $source = $prepared['source'];
        $idempotencyKey = $prepared['idempotency_key'];
        $normalized = $prepared['payload'];
        $requestHash = $prepared['request_hash'];

        $storageKey = hash(
            'sha256',
            $source . '|' . $idempotencyKey
        );

        $idempotencyModel = $this->getMarketingZapierIngressIdempotencyModel();
        $webhookModel = $this->getMarketingZapierIngressModel();

        $existingIdempotency = $idempotencyModel->findByKeyHash($storageKey);

        if ($existingIdempotency !== null) {
            if (
                isset($existingIdempotency['request_hash'])
                && hash_equals(
                    (string) $existingIdempotency['request_hash'],
                    $requestHash
                )
            ) {
                return $this->duplicateResult(
                    $source,
                    $idempotencyKey,
                    $requestHash
                );
            }

            return $this->errorResult(
                409,
                'idempotency_conflict',
                'The idempotency key was previously used for a different payload.'
            );
        }

        $existingWebhook = $webhookModel->findBySourceAndKey(
            $source,
            $idempotencyKey
        );

        if ($existingWebhook !== null) {
            return $this->duplicateResult(
                $source,
                $idempotencyKey,
                $requestHash,
                isset($existingWebhook['id'])
                    ? (int) $existingWebhook['id']
                    : null
            );
        }

        $db = db_connect();
        $db->transBegin();

        try {
            $now = date('Y-m-d H:i:s');
            $ttlDays = max(
                1,
                (int) (
                    config('Marketing')->zapierIngress['idempotency_ttl_days']
                    ?? 7
                )
            );

            $idempotencyId = $idempotencyModel->insert([
                'key_hash' => $storageKey,
                'request_hash' => $requestHash,
                'status_code' => null,
                'response_json' => null,
                'state' => 'processing',
                'created_at' => $now,
                'updated_at' => $now,
                'expires_at' => date(
                    'Y-m-d H:i:s',
                    strtotime('+' . $ttlDays . ' days')
                ),
            ], true);

            if (! is_numeric($idempotencyId)) {
                throw new RuntimeException(
                    'Unable to create the idempotency reservation.'
                );
            }

            $payloadJson = json_encode(
                $normalized,
                JSON_THROW_ON_ERROR
                | JSON_UNESCAPED_SLASHES
                | JSON_UNESCAPED_UNICODE
            );

            $ingressId = $webhookModel->insert([
                'source' => $source,
                'idempotency_key' => $idempotencyKey,
                'request_hash' => $requestHash,
                'raw_payload_hash' => (string) $normalized['raw_payload_hash'],
                'payload_json' => $payloadJson,
                'received_at' => $now,
                'processed_at' => null,
                'status' => 'accepted',
                'notes' => 'GT-NH-005 controlled Zapier ingress intake.',
            ], true);

            if (! is_numeric($ingressId)) {
                throw new RuntimeException(
                    'Unable to create the inbound webhook record.'
                );
            }

            $body = [
                'status' => 'accepted',
                'data' => [
                    'ingress_id' => (int) $ingressId,
                    'source' => $source,
                    'idempotency_key' => $idempotencyKey,
                    'request_hash' => $requestHash,
                ],
                'error' => null,
                'meta' => [
                    'persisted' => true,
                    'generated_content' => false,
                    'distribution_queued' => false,
                    'external_calls' => false,
                    'ts' => date('c'),
                ],
            ];

            $updated = $idempotencyModel->update(
                (int) $idempotencyId,
                [
                    'status_code' => 202,
                    'response_json' => json_encode(
                        $body,
                        JSON_THROW_ON_ERROR
                        | JSON_UNESCAPED_SLASHES
                        | JSON_UNESCAPED_UNICODE
                    ),
                    'state' => 'completed',
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );

            if (! $updated) {
                throw new RuntimeException(
                    'Unable to complete the idempotency reservation.'
                );
            }

            if ($db->transStatus() === false) {
                throw new RuntimeException(
                    'The ingress database transaction failed.'
                );
            }

            $db->transCommit();

            return [
                'status_code' => 202,
                'body' => $body,
            ];
        } catch (Throwable $e) {
            $db->transRollback();

            $existing = $idempotencyModel->findByKeyHash($storageKey);

            if (
                $existing !== null
                && isset($existing['request_hash'])
                && hash_equals(
                    (string) $existing['request_hash'],
                    $requestHash
                )
            ) {
                return $this->duplicateResult(
                    $source,
                    $idempotencyKey,
                    $requestHash
                );
            }

            log_message(
                'error',
                '[MARKETING_ZAPIER_INGRESS_FAILED] {exception}: {message}',
                [
                    'exception' => $e::class,
                    'message' => $e->getMessage(),
                    'source' => $source,
                    'idempotency_key_hash' => hash(
                        'sha256',
                        $idempotencyKey
                    ),
                ]
            );

            return $this->errorResult(
                500,
                'ingress_persistence_failed',
                'The ingress record could not be persisted.'
            );
        }
    }

    /**
     * @return array<string,mixed>
     */
    private function prepare(
        string $source,
        string $idempotencyKey,
        array $payload
    ): array {
        $source = strtolower(trim($source));
        $idempotencyKey = trim($idempotencyKey);

        if (
            $source === ''
            || strlen($source) > 100
            || preg_match('/^[a-z0-9._:-]+$/', $source) !== 1
        ) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_source',
                    'The source identity is invalid.'
                ),
            ];
        }

        if (
            strlen($idempotencyKey) < 8
            || strlen($idempotencyKey) > 191
            || preg_match(
                '/^[A-Za-z0-9._:-]+$/',
                $idempotencyKey
            ) !== 1
        ) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_idempotency_key',
                    'The idempotency key is invalid.'
                ),
            ];
        }

        $required = [
            'source_type',
            'source_name',
            'source_domain',
            'feed_url',
            'item_guid',
            'title',
            'summary',
            'canonical_url',
            'published_at',
            'retrieved_at',
            'author',
            'categories',
            'raw_payload_hash',
        ];

        $missing = [];

        foreach ($required as $field) {
            if (! array_key_exists($field, $payload)) {
                $missing[] = $field;
                continue;
            }

            $value = $payload[$field];

            if (is_array($value)) {
                if ($value === []) {
                    $missing[] = $field;
                }

                continue;
            }

            if (
                ! is_scalar($value)
                || trim((string) $value) === ''
            ) {
                $missing[] = $field;
            }
        }

        if ($missing !== []) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'missing_required_fields',
                    'Required ingress fields are missing.',
                    ['fields' => $missing]
                ),
            ];
        }

        $feedUrl = $this->normalizeUrl(
            (string) $payload['feed_url']
        );
        $canonicalUrl = $this->normalizeUrl(
            (string) $payload['canonical_url']
        );

        if ($feedUrl === null || $canonicalUrl === null) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_url',
                    'feed_url and canonical_url must be valid HTTP or HTTPS URLs.'
                ),
            ];
        }

        try {
            $publishedAt = new DateTimeImmutable(
                (string) $payload['published_at']
            );
        } catch (Throwable) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_published_at',
                    'published_at must contain a valid date and time.'
                ),
            ];
        }

        try {
            $retrievedAt = new DateTimeImmutable(
                (string) $payload['retrieved_at']
            );
        } catch (Throwable) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_retrieved_at',
                    'retrieved_at must contain a valid date and time.'
                ),
            ];
        }

        $rawPayloadHash = strtolower(trim(
            (string) $payload['raw_payload_hash']
        ));

        if (preg_match('/^[a-f0-9]{64}$/', $rawPayloadHash) !== 1) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_raw_payload_hash',
                    'raw_payload_hash must be a 64-character SHA-256 hash.'
                ),
            ];
        }

        $categories = $payload['categories'] ?? [];

        if (is_string($categories)) {
            $categories = explode(',', $categories);
        }

        if (! is_array($categories)) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_categories',
                    'categories must be an array or comma-separated string.'
                ),
            ];
        }

        $categories = array_values(array_unique(array_filter(array_map(
            static fn ($value): string => trim(
                mb_substr((string) $value, 0, 100)
            ),
            $categories
        ))));

        if ($categories === []) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_categories',
                    'categories must contain at least one value.'
                ),
            ];
        }

        $metadata = $payload['metadata'] ?? [];

        if (! is_array($metadata)) {
            return [
                'ok' => false,
                'result' => $this->errorResult(
                    422,
                    'invalid_metadata',
                    'metadata must be a JSON object.'
                ),
            ];
        }

        $normalized = [
            'source_type' => $this->limit(
                (string) ($payload['source_type'] ?? 'rss'),
                50
            ),
            'source_name' => $this->limit(
                (string) $payload['source_name'],
                200
            ),
            'source_domain' => $this->limit(
                (string) (
                    $payload['source_domain']
                    ?? parse_url($canonicalUrl, PHP_URL_HOST)
                    ?? ''
                ),
                255
            ),
            'feed_url' => $feedUrl,
            'item_guid' => $this->limit(
                (string) $payload['item_guid'],
                500
            ),
            'title' => $this->limit(
                (string) $payload['title'],
                500
            ),
            'canonical_url' => $canonicalUrl,
            'published_at' => $publishedAt->format(DATE_ATOM),
            'retrieved_at' => $retrievedAt->format(DATE_ATOM),
            'author' => $this->limit(
                (string) ($payload['author'] ?? ''),
                255
            ),
            'summary' => $this->limit(
                (string) ($payload['summary'] ?? ''),
                10000
            ),
            'content' => $this->limit(
                (string) ($payload['content'] ?? ''),
                50000
            ),
            'categories' => $categories,
            'raw_payload_hash' => $rawPayloadHash,
            'metadata' => $metadata,
        ];

        $canonicalPayload = $this->canonicalize($normalized);
        $encodedPayload = json_encode(
            $canonicalPayload,
            JSON_THROW_ON_ERROR
            | JSON_UNESCAPED_SLASHES
            | JSON_UNESCAPED_UNICODE
        );

        return [
            'ok' => true,
            'source' => $source,
            'idempotency_key' => $idempotencyKey,
            'payload' => $canonicalPayload,
            'request_hash' => hash('sha256', $encodedPayload),
        ];
    }

    private function normalizeUrl(string $value): ?string
    {
        $value = trim($value);

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return null;
        }

        $scheme = strtolower(
            (string) parse_url($value, PHP_URL_SCHEME)
        );

        if (! in_array($scheme, ['http', 'https'], true)) {
            return null;
        }

        return $value;
    }

    private function normalizeOptionalDate(mixed $value): string
    {
        if ($value === null || trim((string) $value) === '') {
            return date(DATE_ATOM);
        }

        try {
            return (new DateTimeImmutable(
                (string) $value
            ))->format(DATE_ATOM);
        } catch (Throwable) {
            return date(DATE_ATOM);
        }
    }

    private function limit(string $value, int $length): string
    {
        return trim(mb_substr($value, 0, $length));
    }

    private function canonicalize(mixed $value): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        if (array_is_list($value)) {
            return array_map(
                fn ($item) => $this->canonicalize($item),
                $value
            );
        }

        ksort($value);

        foreach ($value as $key => $item) {
            $value[$key] = $this->canonicalize($item);
        }

        return $value;
    }

    /**
     * @param array<string,mixed> $extra
     *
     * @return array{status_code:int,body:array<string,mixed>}
     */
    private function errorResult(
        int $statusCode,
        string $code,
        string $message,
        array $extra = []
    ): array {
        return [
            'status_code' => $statusCode,
            'body' => [
                'status' => 'error',
                'data' => $extra === [] ? null : $extra,
                'error' => [
                    'code' => $code,
                    'message' => $message,
                ],
                'meta' => [
                    'ts' => date('c'),
                ],
            ],
        ];
    }

    /**
     * @return array{status_code:int,body:array<string,mixed>}
     */
    private function duplicateResult(
        string $source,
        string $idempotencyKey,
        string $requestHash,
        ?int $ingressId = null
    ): array {
        return [
            'status_code' => 200,
            'body' => [
                'status' => 'duplicate',
                'data' => [
                    'ingress_id' => $ingressId,
                    'source' => $source,
                    'idempotency_key' => $idempotencyKey,
                    'request_hash' => $requestHash,
                ],
                'error' => null,
                'meta' => [
                    'persisted' => false,
                    'external_calls' => false,
                    'ts' => date('c'),
                ],
            ],
        ];
    }

    private function getMarketingZapierIngressModel(): MarketingZapierIngressModel
    {
        return $this->inboundWebhookModel
            ??= new MarketingZapierIngressModel();
    }

    private function getMarketingZapierIngressIdempotencyModel(): MarketingZapierIngressIdempotencyModel
    {
        return $this->idempotencyModel
            ??= new MarketingZapierIngressIdempotencyModel();
    }
}
