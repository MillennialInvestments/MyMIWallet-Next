<?php

declare(strict_types=1);

namespace App\Services\PublicPages;

class SchemaGenerator
{
    public function generate(string $type, array $pageData): array
    {
        $type = strtolower(trim($type));
        $schemas = [];

        if (in_array($type, ['howto', 'howitworks', 'hybrid'], true)) {
            $schemas[] = $this->buildArticleSchema($pageData);
        }

        if ($type === 'news_digest') {
            $schemas[] = $this->buildNewsArticleSchema($pageData);
        }

        if ($type === 'glossary') {
            $schemas[] = $this->buildDefinedTermSchema($pageData);
        }

        if ($type === 'review') {
            $schemas[] = $this->buildProductSchema($pageData);
            $schemas[] = $this->buildReviewSchema($pageData);
        }

        $faq = $this->buildFaqSchema($pageData);
        if ($faq !== null && in_array($type, ['hybrid', 'howto', 'howitworks', 'review', 'news_digest', 'glossary'], true)) {
            $schemas[] = $faq;
        }

        if ($type === 'hybrid') {
            $itemList = $this->buildNewsItemListSchema($pageData);
            if ($itemList !== null) {
                $schemas[] = $itemList;
            }
        }

        return array_values(array_filter($schemas));
    }

    private function buildArticleSchema(array $pageData): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => (string) ($pageData['title'] ?? ''),
            'description' => (string) ($pageData['summary'] ?? ''),
            'datePublished' => (string) ($pageData['published_at'] ?? date('c')),
        ];
    }

    private function buildNewsArticleSchema(array $pageData): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'NewsArticle',
            'headline' => (string) ($pageData['title'] ?? ''),
            'description' => (string) ($pageData['summary'] ?? ''),
            'datePublished' => (string) ($pageData['published_at'] ?? date('c')),
        ];
    }

    private function buildDefinedTermSchema(array $pageData): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'DefinedTerm',
            'name' => (string) ($pageData['title'] ?? ''),
            'description' => (string) ($pageData['summary'] ?? ''),
            'termCode' => (string) ($pageData['slug'] ?? ''),
        ];
    }

    private function buildProductSchema(array $pageData): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => (string) ($pageData['title'] ?? ''),
            'description' => (string) ($pageData['summary'] ?? ''),
        ];
    }

    private function buildReviewSchema(array $pageData): array
    {
        $prosCons = $pageData['pros_cons'] ?? [];
        $pros = isset($prosCons['pros']) && is_array($prosCons['pros']) ? $prosCons['pros'] : [];
        $cons = isset($prosCons['cons']) && is_array($prosCons['cons']) ? $prosCons['cons'] : [];

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Review',
            'name' => (string) ($pageData['title'] ?? ''),
            'reviewBody' => trim((string) ($pageData['summary'] ?? '') . "\n\nThis review is for educational purposes only and not financial advice."),
            'positiveNotes' => ['@type' => 'ItemList', 'itemListElement' => array_slice(array_values($pros), 0, 10)],
            'negativeNotes' => ['@type' => 'ItemList', 'itemListElement' => array_slice(array_values($cons), 0, 10)],
            'itemReviewed' => [
                '@type' => 'Product',
                'name' => (string) ($pageData['title'] ?? ''),
            ],
        ];
    }

    private function buildFaqSchema(array $pageData): ?array
    {
        $entries = $this->extractFaqEntries($pageData);
        if ($entries === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(static function (array $entry): array {
                return [
                    '@type' => 'Question',
                    'name' => $entry['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $entry['answer'],
                    ],
                ];
            }, $entries),
        ];
    }

    private function buildNewsItemListSchema(array $pageData): ?array
    {
        $newsItems = $pageData['news_items'] ?? [];
        if (! is_array($newsItems) || $newsItems === []) {
            return null;
        }

        $elements = [];
        foreach (array_slice($newsItems, 0, 5) as $index => $item) {
            $title = trim((string) ($item['title'] ?? ''));
            if ($title === '') {
                continue;
            }
            $elements[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $title,
                'url' => (string) ($item['source_ref'] ?? ''),
            ];
        }

        if ($elements === []) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => $elements,
        ];
    }

    private function extractFaqEntries(array $pageData): array
    {
        $entries = [];
        $faqRaw = $pageData['faq_json'] ?? null;
        if (is_string($faqRaw) && trim($faqRaw) !== '') {
            $decoded = json_decode($faqRaw, true);
            if (is_array($decoded)) {
                foreach ($decoded as $item) {
                    $q = trim((string) ($item['question'] ?? ''));
                    $a = trim((string) ($item['answer'] ?? ''));
                    if ($q !== '' && mb_strlen($a) >= 30) {
                        $entries[] = ['question' => $q, 'answer' => $a];
                    }
                }
            }
        }

        if ($entries === []) {
            $html = (string) ($pageData['html'] ?? '');
            if (preg_match('/Frequently Asked Questions|\bFAQ\b/i', $html) === 1) {
                preg_match_all('/<h[23][^>]*>(.*?)<\/h[23]>\s*<p[^>]*>(.*?)<\/p>/is', $html, $matches, PREG_SET_ORDER);
                foreach ($matches as $match) {
                    $q = trim(strip_tags((string) ($match[1] ?? '')));
                    $a = trim(strip_tags((string) ($match[2] ?? '')));
                    if ($q !== '' && mb_strlen($a) >= 30) {
                        $entries[] = ['question' => $q, 'answer' => $a];
                    }
                }
            }
        }

        return array_slice($entries, 0, 10);
    }
}
