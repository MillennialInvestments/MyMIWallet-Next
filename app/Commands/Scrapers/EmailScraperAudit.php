<?php

namespace App\Commands\Scrapers;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use App\Services\ScraperOpsService;
use CodeIgniter\CLI\CLI;
use Config\Database;
use RuntimeException;

class EmailScraperAudit extends SafeBaseCommand
{
    protected $group       = 'Marketing';
    protected $name        = 'marketing:scraper:audit-emails';
    protected $description = 'Audit recent trade and news emails against the expected scraper schema.';
    protected $usage       = 'marketing:scraper:audit-emails [limit] [--limit=25]';
    protected $options     = [
        '--limit' => 'Number of emails to scan (default: 25).',
    ];

    private const DEFAULT_LIMIT = 25;

    private const TRADE_TABLE = 'bf_investment_scraper';
    private const TRADE_FINAL_TABLE = 'bf_investment_trade_alerts';
    private const NEWS_TABLE = 'bf_marketing_temp_scraper';
    private const NEWS_FINAL_TABLE = 'bf_marketing_scraper';

    private const STATUS_VISIBLE = ['processed', 'approved', 'published', 'live'];
    private const FALLBACK_FAILURE = 'FALLBACK_APPLIED';

    public function run(array $params)
    {
        log_message('info', '[spark:scraper:audit-emails] Started', ['params' => $params]);

        [$args, $flags] = $this->parseParams($params);
        $limit = $this->resolveLimit($params, $args, $flags);

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, null);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $schemaPath = ROOTPATH . 'docs/scrapers/email_expected_schema.yaml';
        if (! is_file($schemaPath)) {
            CLI::error('Missing schema file: ' . $schemaPath);
            return 1;
        }

        try {
            $schema = $this->loadSchema($schemaPath);
        } catch (RuntimeException $e) {
            CLI::error('Failed to parse schema file: ' . $e->getMessage());
            return 1;
        }

        try {
            $db = Database::connect();

            $tradeRecords = $this->fetchTableRecords($db, self::TRADE_TABLE, $limit);
            $newsRecords = $this->fetchTableRecords($db, self::NEWS_TABLE, $limit);

            $records = array_merge($tradeRecords, $newsRecords);
            usort($records, fn ($a, $b) => ($b['__audit_timestamp'] ?? 0) <=> ($a['__audit_timestamp'] ?? 0));
            $records = array_slice($records, 0, $limit);

            $tradeIds = array_column($tradeRecords, 'id');
            $newsIds = array_column($newsRecords, 'id');
            $finalTradeMap = $this->fetchFinalMap($db, self::TRADE_FINAL_TABLE, 'source_scraper_id', $tradeIds);
            $finalNewsMap = $this->fetchFinalMap($db, self::NEWS_FINAL_TABLE, 'source_id', $newsIds);

            $duplicateMap = $this->buildDuplicateMap($records);

            $summary = [
                'total_scanned' => count($records),
                'trade_count' => 0,
                'news_count' => 0,
                'passed' => 0,
                'failed' => 0,
                'fallbacks_applied' => 0,
            ];

            $failureBreakdown = [];
            $reportRecords = [];

            foreach ($records as $record) {
                $category = $this->resolveCategory($record);
                if ($category === 'trade') {
                    $summary['trade_count']++;
                } else {
                    $summary['news_count']++;
                }

                $schemaSpec = $schema[$category] ?? [];
                $context = [
                    'schema' => $schema,
                    'final_trade_map' => $finalTradeMap,
                    'final_news_map' => $finalNewsMap,
                    'duplicate_map' => $duplicateMap,
                ];

                $audit = $this->auditRecord($record, $category, $schemaSpec, $context);
                $reportRecords[] = $audit;

                if ($audit['status'] === 'passed' || $audit['status'] === 'passed_with_fallbacks') {
                    $summary['passed']++;
                } else {
                    $summary['failed']++;
                    foreach ($audit['failures'] as $failure) {
                        $type = $failure['failure_type'] ?? 'UNKNOWN';
                        $failureBreakdown[$type] = ($failureBreakdown[$type] ?? 0) + 1;
                    }
                }

                if (! empty($audit['fallbacks_applied'])) {
                    $summary['fallbacks_applied'] = ($summary['fallbacks_applied'] ?? 0) + 1;
                    $failureBreakdown[self::FALLBACK_FAILURE] = ($failureBreakdown[self::FALLBACK_FAILURE] ?? 0) + 1;
                }
            }

            $report = [
                'run' => [
                    'timestamp' => date('Y-m-d H:i:s'),
                    'limit' => $limit,
                    'tables' => [self::TRADE_TABLE, self::NEWS_TABLE],
                    'schema_path' => $schemaPath,
                ],
                'summary' => $summary,
                'failure_breakdown' => $failureBreakdown,
                'records' => $reportRecords,
            ];

            $service = new ScraperOpsService();
            $report['fix_plan'] = $service->generateScraperFixPlan($report);

            $summaryLines = [
                '# Email Scraper Audit',
                '',
                '- Timestamp: ' . $resolved['timestamp'],
                '- Total scanned: ' . ($summary['total_scanned'] ?? 0),
                '- Trade emails: ' . ($summary['trade_count'] ?? 0),
                '- News emails: ' . ($summary['news_count'] ?? 0),
                '- Passed: ' . ($summary['passed'] ?? 0),
                '- Failed: ' . ($summary['failed'] ?? 0),
                '- Fallbacks applied: ' . (int) ($summary['fallbacks_applied'] ?? 0),
                '',
                '## Failure Breakdown',
            ];

            if (empty($failureBreakdown)) {
                $summaryLines[] = '- None';
            } else {
                foreach ($failureBreakdown as $type => $count) {
                    $summaryLines[] = sprintf('- %s: %d', $type, $count);
                }
            }

            $summaryMarkdown = implode(PHP_EOL, $summaryLines) . PHP_EOL;
            $report['artifact_dir'] = $resolved['dir'];

            if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summaryMarkdown, $report)) {
                return EXIT_ERROR;
            }

            CLI::write('Email Scraper Audit Summary', 'yellow');
            CLI::write(sprintf('Total scanned: %d', $summary['total_scanned']));
            CLI::write(sprintf('Trade emails: %d', $summary['trade_count']));
            CLI::write(sprintf('News emails: %d', $summary['news_count']));
            CLI::write(sprintf('Passed: %d', $summary['passed']));
            CLI::write(sprintf('Failed: %d', $summary['failed']));
            CLI::write(sprintf('Fallbacks applied: %d', (int) ($summary['fallbacks_applied'] ?? 0)));
            CLI::newLine();

            CLI::write('Failure breakdown:', 'yellow');
            if (empty($failureBreakdown)) {
                CLI::write('- None');
            } else {
                foreach ($failureBreakdown as $type => $count) {
                    CLI::write(sprintf('- %s: %d', $type, $count));
                }
            }

            CLI::newLine();
            CLI::write('Report written to: ' . $resolved['dir'], 'green');

            return 0;
        } catch (RuntimeException $e) {
            CLI::error('Audit failed: ' . $e->getMessage());
            return 1;
        }
    }

    private function resolveLimit(array $params, array $args, array $flags): int
    {
        if (! empty($args[0]) && ctype_digit((string) $args[0])) {
            return max(1, (int) $args[0]);
        }

        foreach ($params as $param) {
            if (str_starts_with($param, '--limit=')) {
                $value = (int) substr($param, 8);
                return max(1, $value);
            }
        }

        return self::DEFAULT_LIMIT;
    }

    private function loadSchema(string $path): array
    {
        $contents = trim((string) file_get_contents($path));
        if ($contents === '') {
            throw new RuntimeException('Schema file is empty.');
        }

        $json = json_decode($contents, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
            return $json;
        }

        if (function_exists('yaml_parse')) {
            $yaml = yaml_parse($contents);
            if (is_array($yaml)) {
                return $yaml;
            }
        }

        throw new RuntimeException('Schema file is not valid JSON/YAML.');
    }

    private function fetchTableRecords($db, string $table, int $limit): array
    {
        $columns = $this->getTableColumns($db, $table);
        if (empty($columns)) {
            return [];
        }

        $dateColumn = $this->pickColumn($columns, [
            'scraped_at',
            'email_date',
            'created_on',
            'created_at',
            'modified_on',
            'modified_at',
        ]);

        $builder = $db->table($table);
        if ($dateColumn !== null) {
            $builder->orderBy($dateColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        $rows = $builder->limit($limit)->get()->getResultArray();
        foreach ($rows as &$row) {
            $row['__audit_table'] = $table;
            $row['__audit_date_column'] = $dateColumn;
            $row['__audit_date'] = $dateColumn ? ($row[$dateColumn] ?? null) : null;
            $row['__audit_timestamp'] = $this->coerceTimestamp($row['__audit_date']);
        }

        return $rows;
    }

    private function getTableColumns($db, string $table): array
    {
        try {
            $fields = $db->getFieldData($table);
        } catch (\Throwable $e) {
            log_message('error', 'EmailScraperAudit could not read table {table}: {error}', [
                'table' => $table,
                'error' => $e->getMessage(),
            ]);
            return [];
        }

        $columns = [];
        foreach ($fields as $field) {
            $columns[] = $field->name;
        }

        return $columns;
    }

    private function pickColumn(array $columns, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            foreach ($columns as $column) {
                if (strcasecmp($column, $candidate) === 0) {
                    return $column;
                }
            }
        }

        return null;
    }

    private function coerceTimestamp($value): int
    {
        if ($value === null || $value === '') {
            return 0;
        }

        $timestamp = strtotime((string) $value);
        return $timestamp !== false ? $timestamp : 0;
    }

    private function resolveCategory(array $record): string
    {
        $table = $record['__audit_table'] ?? '';
        $emailType = strtolower(trim((string) ($record['email_type'] ?? '')));
        $typeField = strtolower(trim((string) ($record['type'] ?? '')));

        if ($table === self::NEWS_TABLE) {
            return 'news';
        }

        if ($emailType === 'news' || str_contains($typeField, 'news') || str_contains($typeField, 'newsletter')) {
            return 'news';
        }

        return 'trade';
    }

    private function auditRecord(array $record, string $category, array $schemaSpec, array $context): array
    {
        $table = $record['__audit_table'] ?? 'unknown';
        $identifier = $this->buildIdentifier($record);
        $failures = [];
        $fallbacksApplied = [];
        $schemaGlobal = $context['schema']['global'] ?? [];

        if (empty($schemaSpec)) {
            $failures[] = $this->buildFailure('SCHEMA_INVALID', 'Schema definition missing for category.', $table);
        }

        $record = $this->normalizeRecord($record);
        $fallbackSchema = $schemaGlobal;
        if (! empty($schemaSpec['default_fallbacks'])) {
            $fallbackSchema['default_fallbacks'] = array_merge(
                $schemaGlobal['default_fallbacks'] ?? [],
                $schemaSpec['default_fallbacks']
            );
        }
        $record = $this->applyFallbacks($record, $fallbackSchema);
        $fallbacksApplied = $record['_fallbacks_applied'] ?? [];
        $record = $this->applyDerivedFields($record, $schemaSpec);

        $categoryRules = $schemaSpec['category_rules'] ?? [];
        if (! empty($categoryRules)) {
            if (! empty($categoryRules['table']) && $table !== $categoryRules['table']) {
                $failures[] = $this->buildFailure('CATEGORY_MISSING', 'Record stored in unexpected table.', $table);
            }

            if (! empty($categoryRules['type_contains'])) {
                $typeValue = (string) ($record['type'] ?? '');
                if ($typeValue !== '' && ! $this->containsAny($typeValue, $categoryRules['type_contains'])) {
                    $failures[] = $this->buildFailure('CATEGORY_MISSING', 'Type field does not match expected category.', $table);
                }
            }

            if (! empty($categoryRules['email_type'])) {
                $emailType = (string) ($record['email_type'] ?? '');
                if ($emailType !== '' && ! in_array(strtolower($emailType), array_map('strtolower', $categoryRules['email_type']), true)) {
                    $failures[] = $this->buildFailure('CATEGORY_MISSING', 'email_type does not match expected category.', $table);
                }
            }

            if (! empty($categoryRules['source'])) {
                $sourceValue = (string) ($record['source'] ?? '');
                if ($sourceValue !== '' && ! in_array(strtolower($sourceValue), array_map('strtolower', $categoryRules['source']), true)) {
                    $failures[] = $this->buildFailure('CATEGORY_MISSING', 'source field does not match expected category.', $table);
                }
            }
        }

        $missingFields = [];
        foreach ($schemaSpec['required_fields'] ?? [] as $field) {
            if ($this->resolveRequiredFieldValue($record, $field) === null && ! in_array($field, $fallbacksApplied, true)) {
                $missingFields[] = $field;
            }
        }
        if ($missingFields !== []) {
            $failures[] = $this->buildFailure('SCHEMA_INVALID', 'Missing required fields: ' . implode(', ', $missingFields), $table);
        }

        $content = $this->resolveContent($record);
        $minLength = (int) ($schemaSpec['minimum_content_length'] ?? ($schemaGlobal['min_content_length'] ?? 0));
        $maxLength = (int) ($schemaSpec['maximum_content_length'] ?? ($schemaGlobal['max_content_length'] ?? 0));
        if ($minLength > 0 && mb_strlen($content) < $minLength) {
            $failures[] = $this->buildFailure('SCHEMA_INVALID', 'Content below minimum length.', $table);
        }
        if ($maxLength > 0 && mb_strlen($content) > $maxLength) {
            $failures[] = $this->buildFailure('SCHEMA_INVALID', 'Content exceeds maximum length.', $table);
        }

        $metadataIssues = [];
        foreach ($schemaSpec['required_metadata'] ?? [] as $field) {
            if (! $this->hasValue($record, $field)) {
                $metadataIssues[] = $field;
            }
        }
        if ($metadataIssues !== []) {
            $failureType = array_intersect($metadataIssues, ['symbols', 'keywords', 'summary']) ? 'PARSE_FAILED' : 'SCHEMA_INVALID';
            $failures[] = $this->buildFailure($failureType, 'Missing metadata: ' . implode(', ', $metadataIssues), $table);
        }

        $sanitizeHtml = $schemaSpec['sanitize_html'] ?? ($schemaGlobal['sanitize_html'] ?? false);
        if ($sanitizeHtml && $content !== '' && $this->isUnsafeContent($content, $schemaSpec['safety_rules']['disallow_tags'] ?? [])) {
            $failures[] = $this->buildFailure('UNSAFE_CONTENT', 'Unsafe HTML or script content detected.', $table);
        }

        $validationFailure = $this->applyValidationRules($record, $schemaSpec);
        if ($validationFailure !== null) {
            $failures[] = $validationFailure;
        }

        $derivedFailure = $this->validateDerivedFields($record, $schemaSpec);
        if ($derivedFailure !== null) {
            $failures[] = $derivedFailure;
        }

        $status = strtolower(trim((string) ($record['status'] ?? '')));
        $requiresPresentation = $status === '' || in_array($status, self::STATUS_VISIBLE, true);
        if ($requiresPresentation) {
            $presentationMissing = [];
            $presentationRequirements = $schemaSpec['presentation_requirements']['dashboard_required']
                ?? $schemaSpec['presentation_requirements']
                ?? [];
            foreach ($presentationRequirements as $field) {
                if (! $this->hasValue($record, $field) && $this->resolveRequiredFieldValue($record, $field) === null) {
                    $presentationMissing[] = $field;
                }
            }
            if ($presentationMissing !== []) {
                $failures[] = $this->buildFailure('UI_BREAK_RISK', 'Missing presentation fields: ' . implode(', ', $presentationMissing), $table);
            }
        }

        if ($identifier !== null) {
            $duplicateCount = $context['duplicate_map'][$identifier] ?? 0;
            if ($duplicateCount > 1) {
                $failures[] = $this->buildFailure('DUPLICATE_DETECTED', 'Duplicate identifier detected.', $table);
            }
        }

        $dbInsertFailure = $this->detectInsertFailure($record, $category, $context);
        if ($dbInsertFailure !== null) {
            $failures[] = $dbInsertFailure;
        }

        $presentationPayload = $this->buildPresentationPayload(
            $record,
            $schemaSpec['presentation_requirements']['dashboard_required'] ?? $schemaSpec['presentation_requirements'] ?? []
        );

        $status = $failures === [] ? 'passed' : 'failed';
        if (! empty($fallbacksApplied)) {
            $failures[] = $this->buildFailure(self::FALLBACK_FAILURE, 'Applied default fallbacks: ' . implode(', ', $fallbacksApplied), $table);
            if ($status === 'passed') {
                $status = 'passed_with_fallbacks';
            }
        }

        return [
            'id' => $record['id'] ?? null,
            'table' => $table,
            'category' => $category,
            'identifier' => $identifier,
            'status' => $status,
            'failures' => $failures,
            'presentation_payload' => $presentationPayload,
            'fallbacks_applied' => $fallbacksApplied,
        ];
    }

    private function detectInsertFailure(array $record, string $category, array $context): ?array
    {
        $status = strtolower(trim((string) ($record['status'] ?? '')));
        if (! in_array($status, self::STATUS_VISIBLE, true)) {
            return null;
        }

        $id = $record['id'] ?? null;
        if (! $id) {
            return $this->buildFailure('DB_INSERT_FAILED', 'Record missing ID for downstream lookup.', $record['__audit_table'] ?? 'unknown');
        }

        if ($category === 'trade') {
            $map = $context['final_trade_map'] ?? [];
            if (! isset($map[$id])) {
                return $this->buildFailure('DB_INSERT_FAILED', 'No matching trade alert found for processed email.', $record['__audit_table'] ?? 'unknown');
            }
        }

        if ($category === 'news') {
            $map = $context['final_news_map'] ?? [];
            if (! isset($map[$id])) {
                return $this->buildFailure('DB_INSERT_FAILED', 'No matching marketing summary found for processed email.', $record['__audit_table'] ?? 'unknown');
            }
        }

        return null;
    }

    private function buildPresentationPayload(array $record, array $fields): array
    {
        $payload = [];
        foreach ($fields as $field) {
            $payload[$field] = $record[$field] ?? null;
        }
        return $payload;
    }

    private function buildIdentifier(array $record): ?string
    {
        foreach (['email_identifier', 'message_hash'] as $field) {
            $value = trim((string) ($record[$field] ?? ''));
            if ($value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function buildDuplicateMap(array $records): array
    {
        $counts = [];
        foreach ($records as $record) {
            $identifier = $this->buildIdentifier($record);
            if ($identifier !== null) {
                $counts[$identifier] = ($counts[$identifier] ?? 0) + 1;
            }
        }

        return $counts;
    }

    private function fetchFinalMap($db, string $table, string $column, array $ids): array
    {
        if (empty($ids)) {
            return [];
        }

        $columns = $this->getTableColumns($db, $table);
        if (! in_array($column, $columns, true)) {
            return [];
        }

        $rows = $db->table($table)
            ->select($column)
            ->whereIn($column, $ids)
            ->get()
            ->getResultArray();

        $map = [];
        foreach ($rows as $row) {
            $value = $row[$column] ?? null;
            if ($value !== null) {
                $map[$value] = true;
            }
        }

        return $map;
    }

    private function resolveContent(array $record): string
    {
        foreach (['body', 'content', 'email_body', 'summary'] as $field) {
            $value = (string) ($record[$field] ?? '');
            if ($value !== '') {
                return $value;
            }
        }

        return '';
    }

    private function hasValue(array $record, string $field): bool
    {
        if (! array_key_exists($field, $record)) {
            return false;
        }

        $value = $record[$field];
        if (is_string($value)) {
            return trim($value) !== '';
        }

        if (is_array($value)) {
            return ! empty($value);
        }

        return $value !== null && $value !== '';
    }

    private function normalizeRecord(array $record): array
    {
        $subject = $this->resolveRequiredFieldValue($record, 'subject');
        if ($subject !== null && empty($record['subject'])) {
            $record['subject'] = $subject;
        }

        $body = $this->resolveRequiredFieldValue($record, 'body');
        if ($body !== null && empty($record['body'])) {
            $record['body'] = $body;
        }

        $receivedAt = $this->resolveRequiredFieldValue($record, 'received_at');
        if ($receivedAt !== null && empty($record['received_at'])) {
            $record['received_at'] = $receivedAt;
        }

        return $record;
    }

    private function resolveRequiredFieldValue(array $record, string $field): ?string
    {
        $aliases = [
            'subject' => ['subject', 'email_subject', 'title'],
            'body' => ['body', 'email_body', 'content', 'summary'],
            'received_at' => ['received_at', 'email_date', 'created_on', 'created_at', 'scraped_at', 'modified_on', 'modified_at'],
            'title' => ['title', 'email_subject'],
            'summary' => ['summary', 'content'],
            'source' => ['source', 'email_sender', 'source_email'],
            'category' => ['category', 'type'],
        ];

        $candidates = $aliases[$field] ?? [$field];
        foreach ($candidates as $candidate) {
            if (array_key_exists($candidate, $record)) {
                $value = $record[$candidate];
                if (is_string($value) && trim($value) === '') {
                    continue;
                }
                if ($value !== null && $value !== '') {
                    return is_string($value) ? trim($value) : (string) $value;
                }
            }
        }

        return null;
    }

    private function applyFallbacks(array $record, array $schema): array
    {
        $record['_fallbacks_applied'] = $record['_fallbacks_applied'] ?? [];
        $fallbacks = $schema['default_fallbacks'] ?? [];

        foreach ($fallbacks as $key => $fallback) {
            if (! isset($record[$key]) || trim((string) $record[$key]) === '') {
                $record[$key] = $fallback;
                $record['_fallbacks_applied'][] = $key;
            }
        }

        return $record;
    }

    private function applyDerivedFields(array $record, array $schemaSpec): array
    {
        $derived = $schemaSpec['derived_fields'] ?? [];

        if (isset($derived['symbol'])) {
            $symbol = trim((string) ($record['symbol'] ?? ''));
            if ($symbol === '') {
                $symbolsRaw = (string) ($record['symbols'] ?? '');
                $symbolList = array_filter(array_map('trim', explode(',', $symbolsRaw)));
                if (! empty($symbolList)) {
                    $symbol = strtoupper($symbolList[0]);
                }
            }

            if ($symbol === '' && isset($derived['symbol']['fallback'])) {
                $symbol = (string) $derived['symbol']['fallback'];
                $record['_fallbacks_applied'][] = 'symbol';
            }

            if ($symbol !== '') {
                $record['symbol'] = $symbol;
            }
        }

        if (isset($derived['action'])) {
            $action = strtoupper(trim((string) ($record['action'] ?? '')));
            if ($action === '') {
                $content = strtoupper($this->resolveContent($record));
                foreach ($derived['action']['allowed'] ?? [] as $allowed) {
                    if ($allowed !== '' && str_contains($content, $allowed)) {
                        $action = $allowed;
                        break;
                    }
                }
            }
            if ($action !== '') {
                $record['action'] = $action;
            }
        }

        if (isset($derived['title'])) {
            $title = trim((string) ($record['title'] ?? ''));
            if ($title === '') {
                $subject = $this->resolveRequiredFieldValue($record, 'subject');
                if ($subject !== null) {
                    $title = $subject;
                }
            }
            if ($title === '' && isset($derived['title']['fallback'])) {
                $title = (string) $derived['title']['fallback'];
                $record['_fallbacks_applied'][] = 'title';
            }
            if ($title !== '') {
                $record['title'] = $title;
            }
        }

        if (isset($derived['keywords'])) {
            $keywords = $record['keywords'] ?? null;
            if (is_string($keywords)) {
                $record['keywords_list'] = $this->parseKeywords($keywords);
            } elseif (is_array($keywords)) {
                $record['keywords_list'] = $keywords;
            }
        }

        return $record;
    }

    private function validateDerivedFields(array $record, array $schemaSpec): ?array
    {
        $derived = $schemaSpec['derived_fields'] ?? [];

        if (isset($derived['symbol']) && ($derived['symbol']['required'] ?? false)) {
            if (! $this->hasValue($record, 'symbol')) {
                return $this->buildFailure('SCHEMA_INVALID', 'Derived symbol missing after fallback.', $record['__audit_table'] ?? 'unknown');
            }
        }

        if (isset($derived['title']) && ($derived['title']['required'] ?? false)) {
            if (! $this->hasValue($record, 'title')) {
                return $this->buildFailure('SCHEMA_INVALID', 'Derived title missing after fallback.', $record['__audit_table'] ?? 'unknown');
            }
        }

        if (isset($derived['keywords'])) {
            $minCount = (int) ($derived['keywords']['min_count'] ?? 0);
            if ($minCount > 0) {
                $keywords = $record['keywords_list'] ?? [];
                if (count($keywords) < $minCount) {
                    return $this->buildFailure('PARSE_FAILED', 'Insufficient keywords derived for news record.', $record['__audit_table'] ?? 'unknown');
                }
            }
        }

        if (isset($derived['action']['allowed']) && $this->hasValue($record, 'action')) {
            $allowed = array_map('strtoupper', $derived['action']['allowed']);
            $action = strtoupper((string) ($record['action'] ?? ''));
            if ($action !== '' && ! in_array($action, $allowed, true)) {
                return $this->buildFailure('SCHEMA_INVALID', 'Derived action not in allowed list.', $record['__audit_table'] ?? 'unknown');
            }
        }

        return null;
    }

    private function applyValidationRules(array $record, array $schemaSpec): ?array
    {
        $rules = $schemaSpec['validation_rules'] ?? [];
        if (isset($rules['body_contains_any'])) {
            $content = strtoupper($this->resolveContent($record));
            $subject = strtoupper((string) ($record['subject'] ?? ''));
            $combined = trim($subject . ' ' . $content);
            $matches = false;
            foreach ($rules['body_contains_any'] as $needle) {
                if ($needle !== '' && str_contains($combined, strtoupper($needle))) {
                    $matches = true;
                    break;
                }
            }
            if (! $matches && preg_match('/\b[A-Z]{1,5}\b/', $combined) === 1) {
                $matches = true;
            }
            if (! $matches) {
                return $this->buildFailure('PARSE_FAILED', 'Body does not include required trade keywords.', $record['__audit_table'] ?? 'unknown');
            }
        }

        if (isset($rules['min_sentence_count'])) {
            $content = $this->resolveContent($record);
            $sentences = preg_split('/[.!?]+/', $content, -1, PREG_SPLIT_NO_EMPTY);
            $count = is_array($sentences) ? count($sentences) : 0;
            if ($count < (int) $rules['min_sentence_count']) {
                return $this->buildFailure('SCHEMA_INVALID', 'News content lacks minimum sentence count.', $record['__audit_table'] ?? 'unknown');
            }
        }

        return null;
    }

    private function parseKeywords(string $keywordsRaw): array
    {
        $trimmed = trim($keywordsRaw);
        if ($trimmed === '') {
            return [];
        }

        $decoded = json_decode($trimmed, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return array_values(array_filter(array_map('trim', $decoded)));
        }

        return array_values(array_filter(array_map('trim', explode(',', $trimmed))));
    }

    private function containsAny(string $value, array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($needle === '') {
                continue;
            }
            if (stripos($value, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

    private function isUnsafeContent(string $content, array $disallowTags): bool
    {
        if (preg_match('/<\s*(script|iframe|style|object|embed)/i', $content)) {
            return true;
        }

        foreach ($disallowTags as $tag) {
            if ($tag !== '' && preg_match('/<\s*' . preg_quote($tag, '/') . '\b/i', $content)) {
                return true;
            }
        }

        if (preg_match('/onerror=|onload=|javascript:/i', $content)) {
            return true;
        }

        return false;
    }

    private function buildFailure(string $type, string $rootCause, string $table): array
    {
        return [
            'failure_type' => $type,
            'root_cause_guess' => $rootCause,
            'affected_table' => $table,
            'recommended_fix' => $this->recommendFix($type),
        ];
    }

    private function recommendFix(string $type): string
    {
        return match ($type) {
            'CATEGORY_MISSING' => 'Verify category rules and fallback mappings for email_type/type/source.',
            'PARSE_FAILED' => 'Adjust parsing logic to extract symbols/keywords from current email formats.',
            'SCHEMA_INVALID' => 'Backfill missing required fields or add schema guards before insert.',
            'UNSAFE_CONTENT' => 'Harden HTML sanitization and strip unsafe tags before storage.',
            'DB_INSERT_FAILED' => 'Inspect downstream inserts into final tables and log DB errors.',
            'UI_BREAK_RISK' => 'Add defaults for missing UI fields before rendering.',
            'DUPLICATE_DETECTED' => 'Strengthen dedupe keys and enforce idempotent inserts.',
            self::FALLBACK_FAILURE => 'Review fallback fields and backfill source data to avoid defaults.',
            default => 'Review audit output and adjust scraper pipeline.',
        };
    }
}
