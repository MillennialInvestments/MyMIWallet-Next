<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use App\Libraries\MyMIMarketing;
use App\Models\MarketingModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;

class PublicPagesPipelineService
{
    private BaseConnection $db;
    private MarketingModel $marketingModel;
    private MyMIMarketing $marketing;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->marketingModel = new MarketingModel();
        $this->marketing = new MyMIMarketing();
    }

    public function fetchDbSources(string $queryKey): array
    {
        $preset = $this->db->table('bf_public_pages_query_presets')->where('query_key', $queryKey)->where('enabled', 1)->get()->getRowArray();
        if (! $preset || empty($preset['sql_template'])) {
            return [];
        }

        $rows = $this->db->query($preset['sql_template'])->getResultArray();
        $sources = [];
        foreach ($rows as $idx => $row) {
            $sources[] = [
                'source_type' => 'db',
                'source_ref' => $queryKey,
                'title' => $row['title'] ?? ('DB Source ' . ($idx + 1)),
                'content_raw' => json_encode($row),
                'content_clean' => $this->cleanContent(implode("\n", array_map('strval', $row))),
                'meta_json' => json_encode(['preset' => $preset['label'] ?? $queryKey]),
            ];
        }

        return $sources;
    }

    public function fetchGoogleSources(string $query): array
    {
        $sources = [];
        $records = $this->marketingModel->getRecentSummariesByKeyword($query);
        foreach ($records as $item) {
            $raw = (string) ($item['primary_content'] ?? $item['secondary_content'] ?? $item['email_message'] ?? '');
            $clean = $this->cleanContent($raw);
            $sources[] = [
                'source_type' => 'url',
                'source_ref' => (string) ($item['promotional_links'] ?? 'marketing_generated_content'),
                'title' => (string) ($item['name'] ?? $item['title'] ?? 'Google/Marketing source'),
                'content_raw' => $raw,
                'content_clean' => $clean,
                'meta_json' => json_encode(['query' => $query]),
            ];
        }

        return $sources;
    }

    public function cleanContent(string $raw): string
    {
        $clean = $this->marketingModel->cleanHtmlEmailContent($raw);
        return (string) $this->marketing->sanitizeRawEmailContent($clean);
    }

    public function buildDraft(array $page, array $sources): array
    {
        $isHybrid = strtolower((string) ($page['type'] ?? '')) === 'hybrid';
        if ($isHybrid) {
            return $this->buildHybridDraft($page, $sources);
        }

        $usable = array_values(array_filter($sources, static function (array $source): bool {
            return str_word_count((string) ($source['content_clean'] ?? '')) >= 300;
        }));

        $combined = trim(implode("\n\n", array_column($usable, 'content_clean')));
        $combinedWords = str_word_count($combined);
        $summaryData = $this->marketing->summarizeContent($combined);
        $summaryText = is_array($summaryData) ? (string) ($summaryData['summary'] ?? '') : (string) $summaryData;
        $keywords = $this->marketingModel->extractKeywords($combined);

        $html = '<article class="public-page">'
            . '<h1>' . esc($page['title']) . '</h1>'
            . '<p><strong>Topic:</strong> ' . esc((string) $page['topic_keywords']) . '</p>'
            . '<section><h2>Overview</h2><p>' . nl2br(esc($summaryText)) . '</p></section>'
            . '<section><h2>Deep Dive</h2><p>' . nl2br(esc($combined)) . '</p></section>'
            . '</article>';

        return [
            'draft_title' => $page['title'],
            'draft_html' => $html,
            'draft_summary' => $summaryText,
            'draft_keywords' => implode(', ', array_slice($keywords, 0, 12)),
            'word_count' => $combinedWords,
            'usable_sources' => count($usable),
            'news_items' => [],
        ];
    }

    private function buildHybridDraft(array $page, array $sources): array
    {
        $evergreen = [];
        $newsItems = [];

        foreach ($sources as $source) {
            $clean = trim((string) ($source['content_clean'] ?? ''));
            if ($clean === '') {
                continue;
            }

            if (str_word_count($clean) < 100) {
                continue;
            }

            if ((string) ($source['source_type'] ?? '') === 'db') {
                $evergreen[] = $clean;
                continue;
            }

            $newsItems[] = [
                'title' => (string) ($source['title'] ?? 'Update'),
                'content' => $clean,
                'source_ref' => (string) ($source['source_ref'] ?? ''),
                'created_at' => (string) ($source['created_at'] ?? date('Y-m-d H:i:s')),
            ];
        }

        $newsItems = array_slice($newsItems, 0, 5);
        $evergreenText = trim(implode("\n\n", $evergreen));
        $newsText = trim(implode("\n\n", array_map(static fn(array $item): string => $item['title'] . "\n" . $item['content'], $newsItems)));
        $fullText = trim($evergreenText . "\n\n" . $newsText);

        $summaryData = $this->marketing->summarizeContent($fullText);
        $summaryText = is_array($summaryData) ? (string) ($summaryData['summary'] ?? '') : (string) $summaryData;
        $keywords = $this->marketingModel->extractKeywords($fullText);

        $html = '<article class="public-page hybrid-page">'
            . '<h1>' . esc($page['title']) . '</h1>'
            . '<section><h1>Evergreen Core Content</h1><p>' . nl2br(esc($evergreenText !== '' ? $evergreenText : $summaryText)) . '</p></section>'
            . '<hr>'
            . '<section><h2>Latest News &amp; Updates</h2>';

        foreach ($newsItems as $item) {
            $html .= '<article class="hybrid-news-item">'
                . '<h3>' . esc($item['title']) . '</h3>'
                . '<p>' . nl2br(esc($item['content'])) . '</p>'
                . '</article>';
        }

        if ($newsItems === []) {
            $html .= '<p>No current updates available.</p>';
        }

        $html .= '</section></article>';

        return [
            'draft_title' => $page['title'],
            'draft_html' => $html,
            'draft_summary' => $summaryText,
            'draft_keywords' => implode(', ', array_slice($keywords, 0, 12)),
            'word_count' => str_word_count($fullText),
            'usable_sources' => count($evergreen) + count($newsItems),
            'news_items' => $newsItems,
        ];
    }
}
