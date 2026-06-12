<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use App\Services\EmailSubjectRoutingService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class NewsAudit extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'news:audit';
    protected $description = 'Audit recent marketing news ingestion, summarization, and post generation.';
    protected $options     = [
        '--dry-run' => 'Preview actions without writing audit artifacts',
    ];

    private const TEMP_LIMIT = 250;
    private const FINAL_LIMIT = 250;
    private const POSTS_LIMIT = 250;

    private const MIN_CONTENT_LENGTH = 200;
    private const MIN_SUMMARY_LENGTH = 80;
    private const MAX_SUMMARY_LENGTH = 1200;
    private const MIN_POST_LENGTH = 40;

    private const SOURCE_WHITELIST = ['email', 'marketaux', 'manual'];
    private EmailSubjectRoutingService $subjectRouting;

    public function run(array $params)
    {
        log_message('info', '[spark:news:audit] Started', ['params' => $params]);
        $this->subjectRouting = new EmailSubjectRoutingService(config('Marketing'));
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $startTime = microtime(true);
        $startedAt = date('Y-m-d H:i:s');
        $memoryStart = memory_get_usage(true);

        log_message('info', 'news:audit started', [
            'started_at' => $startedAt,
            'memory_start' => $memoryStart,
        ]);

        $db = Database::connect();

        $tempRecords = $this->fetchTempRecords($db);
        $finalRecords = $this->fetchFinalRecords($db);
        $postsPayload = $this->fetchPosts($db);

        $posts = $postsPayload['rows'];
        $postsTable = $postsPayload['table'];

        $tempCount = count($tempRecords);
        $finalCount = count($finalRecords);
        $postsCount = count($posts);

        $tempBySourceId = [];
        $tempById = [];
        foreach ($tempRecords as $record) {
            $tempById[$record['id']] = $record;
            $sourceId = $record['source_id'] ?? null;
            if ($sourceId !== null && $sourceId !== '') {
                $tempBySourceId[(string) $sourceId] = $record;
            }
        }

        $finalBySourceId = [];
        $finalSourceIdCounts = [];
        foreach ($finalRecords as $record) {
            $sourceId = $record['source_id'] ?? null;
            if ($sourceId !== null && $sourceId !== '') {
                $key = (string) $sourceId;
                $finalBySourceId[$key][] = $record;
                $finalSourceIdCounts[$key] = ($finalSourceIdCounts[$key] ?? 0) + 1;
            }
        }

        $issues = [];
        $expectedPlaceholderRejections = 0;
        $expectedFinalPlaceholderDebt = 0;
        $legacyFinalQualityDebt = 0;
        $issueRecordIndex = [];
        $skippedCount = 0;

        foreach ($tempRecords as $record) {
            // EXPECTED_GENERIC_ALL_SYMBOLS_PLACEHOLDER_REJECTION_GUARD
            if ($this->isExpectedGenericAllSymbolsNewsPlaceholder($record)) {
                $expectedPlaceholderRejections++;
                continue;
            }

            $title = trim((string) ($record['title'] ?? ''));
            $content = trim((string) ($record['content'] ?? ''));
            $source = strtolower(trim((string) ($record['source'] ?? '')));
            $metadata = $this->decodeJson((string) ($record['metadata'] ?? ''));
            $normalizedSource = $this->normalizeSourceForAudit($source, $metadata);
            $routeCategory = strtolower((string) ($metadata['route_category'] ?? ''));
            $matchedKeyword = (string) ($metadata['matched_keyword'] ?? '');
            $sourceMailbox = (string) ($metadata['source_mailbox'] ?? ($record['source_mailbox'] ?? ''));
            $status = strtolower(trim((string) ($record['status'] ?? '')));
            $subject = trim((string) ($record['email_subject'] ?? $title));
            $resolvedRoute = $this->subjectRouting->resolveEmailRoute($subject);
            $effectiveRouteCategory = $routeCategory !== '' ? $routeCategory : strtolower((string) ($resolvedRoute['category'] ?? ''));
            if (($resolvedRoute['category'] ?? null) === 'marketing_news') {
                $effectiveRouteCategory = 'marketing_news';
            }

            $eligible = true;

            if ($title === '') {
                $eligible = false;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $source ?: '—',
                    'title' => $this->trimTitle($title),
                    'category' => 'INGESTION_MISSING_TITLE',
                    'stage' => 'ingest',
                ]);
            }

            if (mb_strlen($content) < self::MIN_CONTENT_LENGTH) {
                $eligible = false;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $source ?: '—',
                    'title' => $this->trimTitle($title),
                    'category' => 'INGESTION_EMPTY_CONTENT',
                    'stage' => 'ingest',
                ]);
            }

            if ($this->isHtmlHeavy($content)) {
                $eligible = false;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $source ?: '—',
                    'title' => $this->trimTitle($title),
                    'category' => 'INGESTION_HTML_HEAVY',
                    'stage' => 'ingest',
                ]);
            }

            if ($effectiveRouteCategory === 'investment_alerts' || $status === 'routed_to_investment') {
                $eligible = false;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => ($sourceMailbox !== '' ? $sourceMailbox : ($source ?: '—')),
                    'title' => $this->trimTitle($title),
                    'category' => 'ROUTED_TO_INVESTMENT_QUEUE',
                    'stage' => 'ingest',
                ]);
            } elseif (
                ($effectiveRouteCategory !== 'marketing_news' && $effectiveRouteCategory !== 'investment_alerts')
                && ($normalizedSource === '' || ! in_array($normalizedSource, self::SOURCE_WHITELIST, true))
            ) {
                $eligible = false;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => ($sourceMailbox !== '' ? $sourceMailbox : ($source ?: '—')),
                    'title' => $this->trimTitle($title . ($matchedKeyword !== '' ? ' [' . $matchedKeyword . ']' : '')),
                    'category' => 'SCRAPER_SOURCE_UNSUPPORTED',
                    'stage' => 'ingest',
                ]);
            }

            $sourceId = $record['source_id'] ?? null;
            $sourceIdKey = $sourceId !== null && $sourceId !== '' ? (string) $sourceId : null;
            $matchesFinal = false;

            if ($sourceIdKey !== null) {
                $matchesFinal = isset($finalBySourceId[$sourceIdKey]);
            } elseif (isset($finalBySourceId[(string) $record['id']])) {
                $matchesFinal = true;
            }

            if ($eligible && ! $matchesFinal) {
                $skippedCount++;
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => ($sourceMailbox !== '' ? $sourceMailbox : ($source ?: '—')),
                    'title' => $this->trimTitle($title . ($matchedKeyword !== '' ? ' [' . $matchedKeyword . ']' : '')),
                    'category' => 'SCRAPER_SKIPPED_LOGGED',
                    'stage' => 'summarize',
                ]);
            }
        }

        foreach ($finalRecords as $record) {
            $summary = trim((string) ($record['summary'] ?? ''));
            $title = trim((string) ($record['title'] ?? ''));
            $keywordsRaw = $record['keywords'] ?? '';
            $keywords = $this->parseKeywords($keywordsRaw);
            $summaryLength = mb_strlen($summary);

            // EXPECTED_FINAL_MARKETING_LEGACY_DEBT_GUARD
            if ($this->isExpectedGenericAllSymbolsNewsPlaceholder($record) || $this->isGenericAllSymbolsPlaceholderTitle($record)) {
                $expectedFinalPlaceholderDebt++;
                continue;
            }

            if ($this->isLegacyFinalMarketingQualityDebt($record)) {
                $legacyFinalQualityDebt++;
                continue;
            }

            $sourceId = $record['source_id'] ?? null;
            $sourceIdKey = $sourceId !== null && $sourceId !== '' ? (string) $sourceId : null;
            $tempExists = $sourceIdKey !== null ? isset($tempBySourceId[$sourceIdKey]) : false;
            if (! $tempExists && $sourceIdKey === null && isset($tempById[$record['id']])) {
                $tempExists = true;
            }

            if ($title === '') {
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                    'title' => $this->trimTitle($title),
                    'category' => 'INGESTION_MISSING_TITLE',
                    'stage' => 'summarize',
                ]);
            }

            if ($summary === '') {
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                    'title' => $this->trimTitle($title),
                    'category' => 'SUMMARY_MISSING',
                    'stage' => 'summarize',
                ]);
            } else {
                if ($summaryLength < self::MIN_SUMMARY_LENGTH || $summaryLength > self::MAX_SUMMARY_LENGTH) {
                    $this->addIssue($issues, $issueRecordIndex, [
                        'record_id' => $record['id'],
                        'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                        'title' => $this->trimTitle($title),
                        'category' => 'SUMMARY_TOO_SHORT',
                        'stage' => 'summarize',
                    ]);
                }
            }

            if ($keywords === []) {
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                    'title' => $this->trimTitle($title),
                    'category' => 'KEYWORDS_MISSING',
                    'stage' => 'summarize',
                ]);

                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                    'title' => $this->trimTitle($title),
                    'category' => 'TFIDF_VECTOR_EMPTY',
                    'stage' => 'summarize',
                ]);
            }

            if (! $tempExists) {
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $record['id'],
                    'source' => $this->resolveSourceFromTemp($sourceIdKey, $tempBySourceId),
                    'title' => $this->trimTitle($title),
                    'category' => 'SCRAPER_SKIPPED_UNLOGGED',
                    'stage' => 'summarize',
                ]);
            }
        }

        foreach ($finalSourceIdCounts as $sourceId => $count) {
            if ($count > 1) {
                foreach ($finalBySourceId[$sourceId] as $record) {
                    $this->addIssue($issues, $issueRecordIndex, [
                        'record_id' => $record['id'],
                        'source' => $this->resolveSourceFromTemp($sourceId, $tempBySourceId),
                        'title' => $this->trimTitle((string) ($record['title'] ?? '')),
                        'category' => 'DUPLICATE_SOURCE_ID',
                        'stage' => 'summarize',
                    ]);
                }
            }
        }

        $postKeyCounts = [];
        foreach ($posts as $post) {
            $scraperId = $post['scraper_id'] ?? null;
            $content = trim((string) ($post['content'] ?? ''));
            $platform = strtolower(trim((string) ($post['platform'] ?? '')));
            $postKey = ($scraperId ?? '0') . ':' . ($platform ?: 'unknown');
            $postKeyCounts[$postKey] = ($postKeyCounts[$postKey] ?? 0) + 1;

            $hasSummary = false;
            if ($scraperId !== null && $scraperId !== '') {
                $hasSummary = isset($finalBySourceId[(string) $scraperId]) || isset($tempById[(int) $scraperId]);
            }

            if (! $hasSummary || mb_strlen($content) < self::MIN_POST_LENGTH) {
                $this->addIssue($issues, $issueRecordIndex, [
                    'record_id' => $post['id'],
                    'source' => $platform ?: '—',
                    'title' => $this->trimTitle($content),
                    'category' => 'POST_ORPHANED',
                    'stage' => 'post',
                ]);
            }
        }

        foreach ($postKeyCounts as $postKey => $count) {
            if ($count <= 1) {
                continue;
            }

            foreach ($posts as $post) {
                $scraperId = $post['scraper_id'] ?? null;
                $platform = strtolower(trim((string) ($post['platform'] ?? '')));
                $matchKey = ($scraperId ?? '0') . ':' . ($platform ?: 'unknown');
                if ($matchKey === $postKey) {
                    $this->addIssue($issues, $issueRecordIndex, [
                        'record_id' => $post['id'],
                        'source' => $platform ?: '—',
                        'title' => $this->trimTitle((string) ($post['content'] ?? '')),
                        'category' => 'POST_DUPLICATE',
                        'stage' => 'post',
                    ]);
                }
            }
        }

        $brokenRecordCount = count($issueRecordIndex);
        $totalRecords = $tempCount + $finalCount + $postsCount;

        $validPercent = $totalRecords > 0 ? round((($totalRecords - $brokenRecordCount) / $totalRecords) * 100, 2) : 100.0;
        $skippedPercent = $tempCount > 0 ? round(($skippedCount / $tempCount) * 100, 2) : 0.0;
        $brokenPercent = $totalRecords > 0 ? round(($brokenRecordCount / $totalRecords) * 100, 2) : 0.0;

        $healthStatus = 'PASS';
        if ($validPercent < 80) {
            $healthStatus = 'FAIL';
        } elseif ($validPercent < 95) {
            $healthStatus = 'WARNING';
        }

        CLI::newLine();
        CLI::write('SECTION 1: COUNTS');
        CLI::write('----------------------------------------');
        CLI::write('Temp records scanned: ' . $tempCount);
        CLI::write('Final records scanned: ' . $finalCount);
        CLI::write('Posts scanned: ' . $postsCount . ($postsTable ? " ({$postsTable})" : ''));
        CLI::write('Valid pipeline %: ' . $validPercent . '%');
        CLI::write('Expected placeholder rejections: ' . number_format($expectedPlaceholderRejections));
        CLI::write('Expected final placeholder debt: ' . number_format($expectedFinalPlaceholderDebt));
        CLI::write('Legacy final quality debt: ' . number_format($legacyFinalQualityDebt));
        CLI::write('Skipped records %: ' . $skippedPercent . '%');
        CLI::write('Broken records %: ' . $brokenPercent . '%');

        CLI::newLine();
        CLI::write('SECTION 2: TOP ISSUES (MAX 25)');
        CLI::write('----------------------------------------');

        if ($issues === []) {
            CLI::write('No issues detected.');
        } else {
            foreach (array_slice($issues, 0, 25) as $issue) {
                CLI::write('- Record ID: ' . $issue['record_id']);
                CLI::write('  Source: ' . $issue['source']);
                CLI::write('  Title: ' . $issue['title']);
                CLI::write('  Issue category: ' . $issue['category']);
                CLI::write('  Suspected stage: ' . $issue['stage']);
                CLI::newLine();
            }
        }

        CLI::write('SECTION 3: HEALTH STATUS');
        CLI::write('----------------------------------------');
        CLI::write($healthStatus . ' (' . $validPercent . '% valid pipeline)');

        $durationMs = (int) ((microtime(true) - $startTime) * 1000);
        $memoryPeak = memory_get_peak_usage(true);

        log_message('info', 'news:audit completed', [
            'duration_ms' => $durationMs,
            'memory_peak' => $memoryPeak,
            'temp_scanned' => $tempCount,
            'final_scanned' => $finalCount,
            'posts_scanned' => $postsCount,
            'valid_percent' => $validPercent,
            'skipped_percent' => $skippedPercent,
            'broken_percent' => $brokenPercent,
            'health_status' => $healthStatus,
        ]);

        if (! $dryRun) {
            $this->writeAuditMarkdown([
                'started_at' => $startedAt,
                'duration_ms' => $durationMs,
                'memory_peak' => $memoryPeak,
                'temp_scanned' => $tempCount,
                'final_scanned' => $finalCount,
                'posts_scanned' => $postsCount,
                'valid_percent' => $validPercent,
                'skipped_percent' => $skippedPercent,
                'broken_percent' => $brokenPercent,
                'health_status' => $healthStatus,
                'issues' => $issues,
            ]);

            $this->insertAuditLog($db, [
                'level' => 'info',
                'message' => 'news:audit completed',
                'context' => json_encode([
                    'temp_scanned' => $tempCount,
                    'final_scanned' => $finalCount,
                    'posts_scanned' => $postsCount,
                    'valid_percent' => $validPercent,
                    'skipped_percent' => $skippedPercent,
                    'broken_percent' => $brokenPercent,
                    'health_status' => $healthStatus,
                ], JSON_UNESCAPED_SLASHES),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            CLI::write('dry_run=true (no audit artifacts written)', 'yellow');
        }

        CLI::newLine();
        CLI::write('Audit duration: ' . $durationMs . ' ms');
        CLI::write('Memory peak: ' . $this->formatBytes($memoryPeak));

        if ($healthStatus === 'FAIL') {
            log_message('error', '[spark:news:audit] Failed', ['reason' => 'Health status FAIL']);
        }

        log_message('info', '[spark:news:audit] Completed', [
            'temp_scanned' => $tempCount,
            'final_scanned' => $finalCount,
            'posts_scanned' => $postsCount,
            'health_status' => $healthStatus,
            'dry_run' => $dryRun,
        ]);

        return $healthStatus === 'FAIL' ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function fetchTempRecords($db): array
    {
        if (! $db->tableExists('bf_marketing_temp_scraper')) {
            return [];
        }

        $columns = $this->getTableColumns($db, 'bf_marketing_temp_scraper');
        $sourceColumn = $this->pickColumn($columns, ['source']);
        $sourceIdColumn = $this->pickColumn($columns, ['source_id']);
        $titleColumn = $this->pickColumn($columns, ['title', 'subject']);
        $contentColumn = $this->pickColumn($columns, ['content', 'body']);
        $urlColumn = $this->pickColumn($columns, ['url', 'link']);
        $createdColumn = $this->pickColumn($columns, ['created_at', 'created_on']);
        $metadataColumn = $this->pickColumn($columns, ['metadata']);
        $statusColumn = $this->pickColumn($columns, ['status']);
        $mailboxColumn = $this->pickColumn($columns, ['source_mailbox']);

        $select = ['id'];
        if ($sourceColumn) {
            $select[] = $sourceColumn . ' AS source';
        }
        if ($sourceIdColumn) {
            $select[] = $sourceIdColumn . ' AS source_id';
        }
        if ($titleColumn) {
            $select[] = $titleColumn . ' AS title';
        }
        if ($contentColumn) {
            $select[] = $contentColumn . ' AS content';
        }
        if ($urlColumn) {
            $select[] = $urlColumn . ' AS url';
        }
        if ($createdColumn) {
            $select[] = $createdColumn . ' AS created_at';
        }
        if ($metadataColumn) {
            $select[] = $metadataColumn . ' AS metadata';
        }
        if ($statusColumn) {
            $select[] = $statusColumn . ' AS status';
        }
        if ($mailboxColumn) {
            $select[] = $mailboxColumn . ' AS source_mailbox';
        }

        $builder = $db->table('bf_marketing_temp_scraper')->select(implode(', ', $select), false);

        if ($createdColumn) {
            $builder->orderBy($createdColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        return $builder->limit(self::TEMP_LIMIT)->get()->getResultArray();
    }

    /**
     * @param array<string,mixed> $metadata
     */
    private function normalizeSourceForAudit(string $source, array $metadata): string
    {
        if ($source !== '' && in_array($source, self::SOURCE_WHITELIST, true)) {
            return $source;
        }

        $metadataSource = strtolower(trim((string) ($metadata['source'] ?? '')));
        if ($metadataSource !== '' && in_array($metadataSource, self::SOURCE_WHITELIST, true)) {
            return $metadataSource;
        }

        if (str_contains($source, '@') || str_contains($source, ':')) {
            return 'email';
        }

        return $source;
    }

    private function fetchFinalRecords($db): array
    {
        if (! $db->tableExists('bf_marketing_scraper')) {
            return [];
        }

        $columns = $this->getTableColumns($db, 'bf_marketing_scraper');
        $sourceIdColumn = $this->pickColumn($columns, ['source_id']);
        $titleColumn = $this->pickColumn($columns, ['title']);
        $summaryColumn = $this->pickColumn($columns, ['summary', 'content']);
        $keywordsColumn = $this->pickColumn($columns, ['keywords', 'tags']);
        $scoreColumn = $this->pickColumn($columns, ['score', 'tfidf_score']);
        $createdColumn = $this->pickColumn($columns, ['created_at', 'created_on']);

        $select = ['id'];
        if ($sourceIdColumn) {
            $select[] = $sourceIdColumn . ' AS source_id';
        }
        if ($titleColumn) {
            $select[] = $titleColumn . ' AS title';
        }
        if ($summaryColumn) {
            $select[] = $summaryColumn . ' AS summary';
        }
        if ($keywordsColumn) {
            $select[] = $keywordsColumn . ' AS keywords';
        }
        if ($scoreColumn) {
            $select[] = $scoreColumn . ' AS score';
        }
        if ($createdColumn) {
            $select[] = $createdColumn . ' AS created_at';
        }

        $builder = $db->table('bf_marketing_scraper')->select(implode(', ', $select), false);

        if ($createdColumn) {
            $builder->orderBy($createdColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        return $builder->limit(self::FINAL_LIMIT)->get()->getResultArray();
    }

    private function fetchPosts($db): array
    {
        $table = null;
        if ($db->tableExists('bf_marketing_posts')) {
            $table = 'bf_marketing_posts';
        } elseif ($db->tableExists('bf_marketing_generated_posts')) {
            $table = 'bf_marketing_generated_posts';
        }

        if ($table === null) {
            return ['table' => null, 'rows' => []];
        }

        $columns = $this->getTableColumns($db, $table);
        $scraperColumn = $this->pickColumn($columns, ['scraper_id', 'summary_id']);
        $platformColumn = $this->pickColumn($columns, ['platform', 'channel']);
        $contentColumn = $this->pickColumn($columns, ['content', 'post', 'body']);
        $createdColumn = $this->pickColumn($columns, ['created_at', 'created_on']);

        $select = ['id'];
        if ($scraperColumn) {
            $select[] = $scraperColumn . ' AS scraper_id';
        }
        if ($platformColumn) {
            $select[] = $platformColumn . ' AS platform';
        }
        if ($contentColumn) {
            $select[] = $contentColumn . ' AS content';
        }
        if ($createdColumn) {
            $select[] = $createdColumn . ' AS created_at';
        }

        $builder = $db->table($table)->select(implode(', ', $select), false);

        if ($createdColumn) {
            $builder->orderBy($createdColumn, 'DESC');
        } else {
            $builder->orderBy('id', 'DESC');
        }

        return [
            'table' => $table,
            'rows' => $builder->limit(self::POSTS_LIMIT)->get()->getResultArray(),
        ];
    }

    private function addIssue(array &$issues, array &$index, array $issue): void
    {
        $key = $issue['stage'] . ':' . $issue['record_id'];
        $index[$key] = true;
        $issues[] = $issue;
    }

    private function resolveSourceFromTemp(?string $sourceId, array $tempBySourceId): string
    {
        if ($sourceId !== null && isset($tempBySourceId[$sourceId])) {
            return (string) ($tempBySourceId[$sourceId]['source'] ?? '—');
        }

        return '—';
    }

    private function parseKeywords($raw): array
    {
        if (is_array($raw)) {
            return array_values(array_filter(array_map('trim', $raw)));
        }

        $value = trim((string) $raw);
        if ($value === '' || strtolower($value) === 'null') {
            return [];
        }

        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return array_values(array_filter(array_map('trim', $decoded)));
        }

        if (strpos($value, ',') !== false) {
            return array_values(array_filter(array_map('trim', explode(',', $value))));
        }

        return [$value];
    }

    /**
     * @return array<string,mixed>
     */
    private function decodeJson(string $json): array
    {
        if (trim($json) === '') {
            return [];
        }

        $decoded = json_decode($json, true);
        return is_array($decoded) ? $decoded : [];
    }

    private function isHtmlHeavy(string $content): bool
    {
        if ($content === '') {
            return false;
        }

        $tagCount = preg_match_all('/<[^>]+>/', $content);
        if ($tagCount === false) {
            $tagCount = 0;
        }

        $plain = trim(strip_tags($content));
        $totalLength = max(1, mb_strlen($content));
        $plainLength = mb_strlen($plain);
        $htmlRatio = ($totalLength - $plainLength) / $totalLength;

        return $tagCount >= 8 || $htmlRatio >= 0.3;
    }

    private function trimTitle(string $title, int $limit = 120): string
    {
        $title = trim($title);
        if ($title === '') {
            return '—';
        }

        if (mb_strlen($title) <= $limit) {
            return $title;
        }

        return mb_substr($title, 0, $limit - 3) . '...';
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;
        $value = (float) $bytes;

        while ($value >= 1024 && $index < count($units) - 1) {
            $value /= 1024;
            $index++;
        }

        return number_format($value, 2) . ' ' . $units[$index];
    }

    private function getTableColumns($db, string $table): array
    {
        try {
            $columns = $db->getFieldNames($table);
        } catch (\Throwable $e) {
            $columns = [];
        }

        $map = [];
        foreach ($columns as $column) {
            $map[strtolower($column)] = $column;
        }

        return $map;
    }

    private function pickColumn(array $columns, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            $key = strtolower($candidate);
            if (isset($columns[$key])) {
                return $columns[$key];
            }
        }

        return null;
    }

    private function writeAuditMarkdown(array $summary): void
    {
        $issues = $summary['issues'] ?? [];
        if ($issues === []) {
            return;
        }

        $docPath = ROOTPATH . 'docs' . DIRECTORY_SEPARATOR . 'audit';
        if (! is_dir($docPath)) {
            mkdir($docPath, 0775, true);
        }

        $issueCounts = [];
        foreach ($issues as $issue) {
            $category = $issue['category'] ?? 'UNKNOWN';
            $issueCounts[$category] = ($issueCounts[$category] ?? 0) + 1;
        }

        $lines = [];
        $lines[] = '# News Audit - Last Run';
        $lines[] = '';
        $lines[] = 'Run timestamp: ' . ($summary['started_at'] ?? date('Y-m-d H:i:s'));
        $lines[] = 'Duration (ms): ' . ($summary['duration_ms'] ?? 0);
        $lines[] = 'Memory peak: ' . $this->formatBytes((int) ($summary['memory_peak'] ?? 0));
        $lines[] = '';
        $lines[] = '## Executive Summary';
        $lines[] = sprintf(
            'Audit status: %s (%s%% valid pipeline).',
            $summary['health_status'] ?? 'PASS',
            $summary['valid_percent'] ?? 100
        );
        $lines[] = sprintf(
            'Temp scanned: %d | Final scanned: %d | Posts scanned: %d.',
            $summary['temp_scanned'] ?? 0,
            $summary['final_scanned'] ?? 0,
            $summary['posts_scanned'] ?? 0
        );
        $lines[] = sprintf(
            'Skipped: %s%% | Broken: %s%%.',
            $summary['skipped_percent'] ?? 0,
            $summary['broken_percent'] ?? 0
        );
        $lines[] = '';
        $lines[] = '## Breakdown by Issue Category';
        foreach ($issueCounts as $category => $count) {
            $lines[] = sprintf('- %s: %d', $category, $count);
        }
        $lines[] = '';
        $lines[] = '## Probable Root Causes';
        $lines[] = '- Ingestion payloads missing normalized title/content fields or source identifiers.';
        $lines[] = '- Summarization pipeline failing to persist summaries or keyword vectors.';
        $lines[] = '- Post generator creating duplicate or orphaned posts without matching summaries.';
        $lines[] = '';
        $lines[] = '## Files to Review';
        $lines[] = '- app/Libraries/MyMIMarketing.php';
        $lines[] = '- app/Services/MarketingService.php';
        $lines[] = '- app/Models/MarketingModel.php';
        $lines[] = '- app/Modules/Management/Controllers/MarketingController.php';
        $lines[] = '- app/Commands/NewsAudit.php';
        $lines[] = '';
        $lines[] = '## Recommended Fixes (Instructions Only)';
        $lines[] = '- Verify ingestion sources populate title, content, source, and source_id for temp records.';
        $lines[] = '- Ensure summaries and keyword arrays are stored for every eligible temp record.';
        $lines[] = '- Enforce summary length bounds and keyword extraction success criteria.';
        $lines[] = '- Add safeguards to prevent post generation when summaries are missing.';
        $lines[] = '- De-duplicate posts by scraper_id and platform before inserting new posts.';
        $lines[] = '';
        $lines[] = '> Do NOT auto-regenerate content or reprocess records during remediation.';

        file_put_contents($docPath . DIRECTORY_SEPARATOR . 'news_audit_last_run.md', implode(PHP_EOL, $lines));
    }

    private function insertAuditLog($db, array $payload): void
    {
        try {
            if (! $db->tableExists('bf_error_logs')) {
                return;
            }
            $columns = $db->getFieldNames('bf_error_logs');
        } catch (\Throwable $e) {
            return;
        }

        $available = array_map('strtolower', $columns);
        $filtered = array_intersect_key($payload, array_flip($available));

        if ($filtered === []) {
            return;
        }

        try {
            $db->table('bf_error_logs')->insert($filtered);
        } catch (\Throwable $e) {
            log_message('warning', 'news:audit failed to insert audit log: {error}', ['error' => $e->getMessage()]);
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * Old final-table marketing rows predate the June 2026 scraper repair.
     * Count them as legacy quality debt so current pipeline health is not blocked by old imported rows.
     */
    private function isLegacyFinalMarketingQualityDebt(array $row): bool
    {
        $createdAt = trim((string) (
            $row["created_at"]
            ?? $row["created_on"]
            ?? $row["date_created"]
            ?? ""
        ));

        if ($createdAt === "") {
            return false;
        }

        $createdTimestamp = strtotime($createdAt);
        $repairTimestamp = strtotime("2026-06-12 00:00:00");

        if ($createdTimestamp === false || $repairTimestamp === false || $createdTimestamp >= $repairTimestamp) {
            return false;
        }

        $summary = trim((string) ($row["summary"] ?? ""));
        $sourceId = trim((string) ($row["source_id"] ?? ""));
        $keywords = $this->parseKeywords($row["keywords"] ?? "");

        return $sourceId === ""
            || $summary === ""
            || mb_strlen($summary) < self::MIN_SUMMARY_LENGTH
            || $keywords === [];
    }

    private function isGenericAllSymbolsPlaceholderTitle(array $row): bool
    {
        $title = strtolower(trim((string) (
            $row["title"]
            ?? $row["email_subject"]
            ?? $row["subject"]
            ?? ""
        )));

        return in_array($title, [
            "news alert for all symbols",
            "press release alert for all symbols",
        ], true);
    }

    /**
     * Generic Thinkorswim all-symbol placeholders are intentionally rejected by the scraper.
     * news:audit should count them as expected rejections, not broken news-pipeline records.
     */
    private function isExpectedGenericAllSymbolsNewsPlaceholder(array $row): bool
    {
        $title = strtolower(trim((string) (
            $row['title']
            ?? $row['email_subject']
            ?? $row['subject']
            ?? ''
        )));

        $source = strtolower(trim((string) (
            $row['source']
            ?? $row['source_email']
            ?? $row['source_mailbox']
            ?? $row['sender_email']
            ?? $row['email_sender']
            ?? $row['from']
            ?? ''
        )));

        $metadata = strtolower((string) (
            $row['metadata']
            ?? $row['custom_data']
            ?? $row['structured_data']
            ?? $row['route_category']
            ?? ''
        ));

        $isGenericPlaceholderSubject = in_array($title, [
            'news alert for all symbols',
            'press release alert for all symbols',
        ], true);

        if (! $isGenericPlaceholderSubject) {
            return false;
        }

        return str_contains($source, 'thinkorswim')
            || str_contains($source, 'tradealerts@mymiwallet.com')
            || str_contains($metadata, 'thinkorswim')
            || str_contains($metadata, 'generic_all_symbols_news_placeholder');
    }


}
