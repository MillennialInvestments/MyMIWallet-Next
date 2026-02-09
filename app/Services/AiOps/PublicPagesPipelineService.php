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
        ];
    }
}
