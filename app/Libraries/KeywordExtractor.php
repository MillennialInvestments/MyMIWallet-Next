<?php

namespace App\Libraries;

class KeywordExtractor
{
    /**
     * Extract keywords from text by combining RAKE + TF-IDF from Python bridge.
     *
     * @return array<int, string>
     */
    public function getKeywords(string $text): array
    {
        $text = trim($text);
        if ($text === '') {
            return [];
        }

        $phpRake = $this->extractRakeInPhp($text);
        $pythonKeywords = $this->extractKeywordsFromPython($text);

        $scored = [];

        foreach ($phpRake as $rank => $keyword) {
            $normalized = $this->normalizeKeyword($keyword);
            if ($normalized === '') {
                continue;
            }
            $scored[$normalized] = ($scored[$normalized] ?? 0) + (1.0 / ($rank + 1));
        }

        foreach ($pythonKeywords as $rank => $keyword) {
            $normalized = $this->normalizeKeyword($keyword);
            if ($normalized === '') {
                continue;
            }
            $scored[$normalized] = ($scored[$normalized] ?? 0) + (2.0 / ($rank + 1));
        }

        if ($scored === []) {
            return array_values(array_slice(array_map(fn ($kw) => $this->normalizeKeyword($kw), $phpRake), 0, 15));
        }

        arsort($scored);

        return array_slice(array_keys($scored), 0, 15);
    }

    /**
     * Simple RAKE-ish extractor in PHP for fallback use.
     *
     * @return array<int, string>
     */
    private function extractRakeInPhp(string $text): array
    {
        $stopwords = [
            'the', 'is', 'in', 'at', 'of', 'a', 'to', 'for', 'and', 'on', 'with', 'by', 'an', 'from', 'or', 'as',
            'be', 'this', 'that', 'it', 'are', 'was', 'were', 'will', 'can', 'has', 'have', 'had', 'about', 'into',
        ];

        $pattern = '/\b(?:' . implode('|', array_map('preg_quote', $stopwords)) . ')\b/i';
        $parts = preg_split('/[\.,;:\!\?\n\r\t]+/', strtolower($text)) ?: [];

        $phrases = [];
        foreach ($parts as $part) {
            $candidate = trim((string) preg_replace($pattern, '|', $part));
            foreach (explode('|', $candidate) as $phrase) {
                $phrase = trim(preg_replace('/\s+/', ' ', $phrase ?? ''));
                if ($phrase === '' || strlen($phrase) < 3) {
                    continue;
                }
                $wordCount = str_word_count($phrase);
                if ($wordCount === 0 || $wordCount > 5) {
                    continue;
                }
                $phrases[] = $phrase;
            }
        }

        $scores = [];
        foreach ($phrases as $phrase) {
            $scores[$phrase] = ($scores[$phrase] ?? 0) + str_word_count($phrase);
        }

        arsort($scores);

        return array_keys(array_slice($scores, 0, 20, true));
    }

    /**
     * @return array<int, string>
     */
    private function extractKeywordsFromPython(string $text): array
    {
        $script = ROOTPATH . 'scripts/marketing/keyword_pipeline.py';
        if (!is_file($script)) {
            return [];
        }

        $tmpFile = tempnam(WRITEPATH, 'kw_');
        if ($tmpFile === false) {
            return [];
        }

        file_put_contents($tmpFile, $text);

        $command = sprintf(
            'python3 %s %s 2>/dev/null',
            escapeshellarg($script),
            escapeshellarg($tmpFile)
        );

        $output = shell_exec($command) ?: '';
        @unlink($tmpFile);

        $decoded = json_decode(trim($output), true);
        if (!is_array($decoded) || !isset($decoded['keywords']) || !is_array($decoded['keywords'])) {
            return [];
        }

        return array_values(array_filter(array_map('strval', $decoded['keywords'])));
    }

    private function normalizeKeyword(string $keyword): string
    {
        $keyword = strtolower(trim($keyword));
        $keyword = preg_replace('/[^a-z0-9\s\-]/i', '', $keyword) ?? '';
        $keyword = preg_replace('/\s+/', ' ', $keyword) ?? '';

        return trim($keyword);
    }
}
