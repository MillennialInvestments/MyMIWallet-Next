<?php namespace App\Libraries\Traits;

use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\Tokenization\WhitespaceTokenizer;
use NlpTools\Tokenizers\WhitespaceTokenizer as NlpWhitespaceTokenizer;

trait TextProcessor
{
    
    public function cleanTitle(string $rawTitle): string
    {
        $clean = $rawTitle;
        $clean = str_replace(['_', '-'], ' ', $clean);          // Replace underscores and dashes with spaces
        $clean = preg_replace('/\s+/', ' ', $clean);             // Collapse multiple spaces
        $clean = html_entity_decode($clean, ENT_QUOTES | ENT_HTML5, 'UTF-8'); // Decode HTML entities
        $clean = preg_replace('/[^\w\s.,!?\'"()-]/u', '', $clean); // Remove weird characters except punctuation
        $clean = trim($clean);
    
        // Optional: Title-case it if all lowercase smashed together
        if (strlen($clean) < 150 && !preg_match('/[a-z]\s[A-Z]/', $clean)) {
            $clean = ucwords(strtolower($clean));
        }
    
        return $clean;
    }
    
    public function extractKeywords($text)
    {
        try {
            if (empty($text) || !is_string($text)) {
                log_message('error', 'extractKeywords(): Invalid input — expecting non-empty string, got: ' . gettype($text));
                return [];
            }
    
            $tokenizer = new WhitespaceTokenizer();
            $tokens = $tokenizer->tokenize((string)$text);
    
            if (empty($tokens) || !is_array($tokens)) {
                log_message('error', 'extractKeywords(): Tokenization failed or returned empty array.');
                return [];
            }
    
            $documents = [$tokens];
            $tfidf = new TfIdfTransformer();
    
            try {
                $tfidf->transform($documents);
            } catch (\Throwable $e) {
                log_message('error', 'extractKeywords(): TF-IDF transformation failed — ' . $e->getMessage());
                return [];
            }
    
            // Generate score map
            $scores = [];
            foreach ($tokens as $token) {
                $scores[$token] = ($scores[$token] ?? 0) + 1;
            }
    
            arsort($scores);
            return array_slice(array_keys($scores), 0, 10);
        } catch (\Throwable $e) {
            log_message('error', 'extractKeywords() Exception: ' . $e->getMessage());
            return [];
        }
    }
    
    public function formatHashtags(array $keywords): string
    {
        return implode(' ', array_map(fn($word) => '#' . ucfirst(trim($word)), $keywords));
    }
    
    public static function sanitize(string $text): string
    {
        $text = quoted_printable_decode($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = strip_tags($text);
        $text = preg_replace('/\s{2,}/', ' ', $text);
        return trim(mb_convert_encoding($text, 'UTF-8', mb_detect_encoding($text, 'UTF-8, ISO-8859-1', true)));
    }

    public static function splitIntoSentences(string $content): array
    {
        $content = preg_replace('/\s+/', ' ', trim($content));
        $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', $content, -1, PREG_SPLIT_NO_EMPTY);
        return array_filter($sentences, fn($s) => strlen(trim($s)) > 0);
    }

    public static function summarize(string $text, string $method = 'tfidf', int $numSentences = 3): string
    {
        $text = self::sanitize($text);
        $sentences = self::splitIntoSentences($text);

        if (count($sentences) < 2) return $text;

        $documents = array_filter(array_map(function ($sentence) {
            $tokens = self::tokenize($sentence);
            return is_array($tokens) && count($tokens) > 0 ? $tokens : null;
        }, $sentences));

        if (empty($documents)) return '';

        try {
            $tfIdf = new TfIdfTransformer();
            if (empty($documents) || !is_array($documents) || !isset($documents[0])) {
                log_message('error', '❌ TextProcessor L54 - Invalid documents for TF-IDF: ' . print_r($documents, true));
                return null;
            }            
            $tfIdf->transform($documents);            

            $scores = [];
            foreach ($documents as $i => $tokens) {
                $scores[$i] = array_reduce($tokens, function ($carry, $token) {
                    return $carry + (is_numeric($token) ? floatval($token) : (strlen($token) > 3 ? 1.2 : 0.8));
                }, 0.0);
            }

            arsort($scores);
            $top = array_slice(array_keys($scores), 0, $numSentences);
            sort($top); // preserve original order
            return implode(' ', array_intersect_key($sentences, array_flip($top)));
        } catch (\Throwable $e) {
            log_message('error', '[TextProcessor] Summarization failed: ' . $e->getMessage());
            return '';
        }
    }

    public function summarizeText($text)
    {
        try {
            if (empty($text) || !is_string($text)) {
                log_message('error', 'summarizeText(): Invalid input — expecting non-empty string, got: ' . gettype($text));
                return null;
            }
    
            // Split into sentences
            $sentences = $this->splitIntoSentences($text);
            if (empty($sentences) || !is_array($sentences)) {
                log_message('error', 'summarizeText(): No valid sentences found after split.');
                return null;
            }
    
            // Prepare documents array
            $documents = array_map(function ($sentence) {
                return is_string($sentence) ? $sentence : '';
            }, $sentences);
    
            // Tokenize documents
            $tokenizer = new WhitespaceTokenizer();
            $tokenized = array_map(function ($doc) use ($tokenizer) {
                return $tokenizer->tokenize((string)$doc);
            }, $documents);
    
            if (empty($tokenized) || !is_array($tokenized[0])) {
                log_message('error', 'summarizeText(): Tokenization failed or returned empty array.');
                return null;
            }
    
            // TF-IDF transformation
            $tfidf = new TfIdfTransformer();
            $tfidf->transform($tokenized);
    
            // Score sentences
            $scores = [];
            foreach ($tokenized as $i => $tokens) {
                $score = 0;
                foreach ($tokens as $token) {
                    $score += is_numeric($token) ? (float)$token : 1;
                }
                $scores[$i] = $score;
            }
    
            arsort($scores);
            $topIndexes = array_slice(array_keys($scores), 0, 3);
            $summary = implode(' ', array_map(function ($index) use ($sentences) {
                return $sentences[$index];
            }, $topIndexes));
    
            return $summary;
        } catch (\Throwable $e) {
            log_message('error', 'summarizeText() Exception: ' . $e->getMessage());
            return null;
        }
    }

    public static function tokenize($text): array
    {
        $text = strtolower(strip_tags($text));
        return preg_split('/\W+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function tokenizeWithNlp($text): array
    {
        $tokenizer = new NlpWhitespaceTokenizer();
        return $tokenizer->tokenize($text);
    }


    /** NEW MIGRATED METHODS (from your MyMIMarketing) */

    public static function buildSimilarityMatrix(array $sentences, array $wordFrequencies = []): array
    {
        $matrix = [];
        $sentenceCount = count($sentences);
        for ($i = 0; $i < $sentenceCount; $i++) {
            for ($j = 0; $j < $sentenceCount; $j++) {
                if ($i !== $j) {
                    $sentenceI = $sentences[$i] ?? null;
                    $sentenceJ = $sentences[$j] ?? null;
                    if (empty($sentenceI) || empty($sentenceJ)) {
                        log_message('error', "buildSimilarityMatrix(): Missing sentence at index {$i} or {$j}.");
                        continue;
                    }
                    $matrix[$i][$j] = self::calculateSimilarity($sentenceI, $sentenceJ, $wordFrequencies);
                }
            }
        }
        return $matrix;
    }
    
    public static function calculateFleschKincaidGrade(string $text): float
    {
        $text = self::sanitize($text);
        $sentenceCount = max(substr_count($text, '.') + substr_count($text, '!') + substr_count($text, '?'), 1);
        $wordCount = max(str_word_count($text), 1);
        $syllableCount = preg_match_all('/[aeiouy]+/i', $text);
    
        $grade = (0.39 * ($wordCount / $sentenceCount)) + (11.8 * ($syllableCount / $wordCount)) - 15.59;
        $grade = max(0, round($grade, 2));
    
        log_message('debug', "✅ calculateFleschKincaidGrade() - Grade Level: {$grade}");
        return $grade;
    }
    
    public static function calculateLexicalRichness(string $text): float
    {
        $text = self::sanitize($text);
        $words = preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
        if (empty($words)) {
            return 0.0;
        }
    
        $uniqueWords = array_unique($words);
        $ratio = count($uniqueWords) / count($words);
        $richness = min(100.0, round($ratio * 100, 2));
    
        log_message('debug', "✅ calculateLexicalRichness() - Richness Score: {$richness}");
        return $richness;
    }

    public static function calculateSimilarity(string $sentence1, string $sentence2, array $wordFrequencies = []): float
    {
        $sentence1 = strtolower($sentence1);
        $sentence2 = strtolower($sentence2);
        $words1 = array_unique(str_word_count($sentence1, 1));
        $words2 = array_unique(str_word_count($sentence2, 1));

        $commonWords = array_intersect($words1, $words2);
        $score = 0;
        foreach ($commonWords as $word) {
            $score += (float)($wordFrequencies[$word] ?? 1);
        }

        $logWordCount1 = count($words1) > 0 ? log(count($words1)) : 0;
        $logWordCount2 = count($words2) > 0 ? log(count($words2)) : 0;

        if ($logWordCount1 + $logWordCount2 == 0) {
            return 0;
        }
        return $score / ($logWordCount1 + $logWordCount2);
    }

    public static function calculateWordFrequencies(string $content, array $stopWords = []): array
    {
        $frequencies = [];
        $words = preg_split('/\s+/', strtolower($content));
        foreach ($words as $word) {
            if (!in_array($word, $stopWords) && strlen($word) > 1) {
                $frequencies[$word] = ($frequencies[$word] ?? 0) + 1;
            }
        }
        arsort($frequencies);
        return $frequencies;
    }

    public static function cleanHtml(string $html): string
    {
        $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
        $html = preg_replace('#<noscript(.*?)>(.*?)</noscript>#is', '', $html);
        return strip_tags($html);
    }

    public static function cleanSummary(string $summary): string
    {
        $summary = preg_replace('/[\x00-\x1F\x7F]/u', '', $summary); // Remove ASCII control chars
        $summary = preg_replace('/\s+/', ' ', $summary);
        $summary = trim($summary);
        if (strlen($summary) < 50) {
            log_message('warning', 'cleanSummary(): Summary too short after cleaning.');
        }
        return $summary;
    }

    public static function combineScores(
        float $featureScore,
        float $keywordScore,
        float $pageRankScore,
        float $semanticDiversityScore
    ): float {
        // Defensive casting
        $featureScore = is_numeric($featureScore) ? (float) $featureScore : 0.0;
        $keywordScore = is_numeric($keywordScore) ? (float) $keywordScore : 0.0;
        $pageRankScore = is_numeric($pageRankScore) ? (float) $pageRankScore : 0.0;
        $semanticDiversityScore = is_numeric($semanticDiversityScore) ? (float) $semanticDiversityScore : 0.0;

        $combinedScore = (0.4 * $featureScore) + (0.2 * $keywordScore) + (0.3 * $pageRankScore) + (0.1 * $semanticDiversityScore);

        log_message('debug', '✅ Combined Score calculated: ' . $combinedScore);
        return $combinedScore;
    }
    
    public static function compressText(string $text, string $level = 'normal'): string
    {
        $wordLimits = [
            'micro' => 50,
            'mini' => 100,
            'normal' => 200,
        ];
    
        $text = self::sanitize($text);
        $limit = $wordLimits[strtolower($level)] ?? 200;
        $words = preg_split('/\s+/', $text);
    
        if (count($words) <= $limit) {
            return $text;
        }
    
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    }
    
    public static function contentQualityCheck(string $content): bool
    {
        $text = self::sanitize($content);
        return strlen($text) >= 100 && substr_count($text, ' ') >= 5;
    }

    public static function debugTokenizedContent(string $text): array
    {
        $tokens = self::tokenizeSmart($text, 'nlp');
        log_message('debug', '✅ debugTokenizedContent() - Tokenized output: ' . print_r($tokens, true));
        return $tokens;
    }

    public static function debugCosineSimilarity(string $text1, string $text2): float
    {
        try {
            $tokenizer = new \NlpTools\Tokenizers\WhitespaceTokenizer();
            $tokens1 = $tokenizer->tokenize($text1);
            $tokens2 = $tokenizer->tokenize($text2);

            $cosine = new \NlpTools\Similarity\CosineSimilarity();
            $similarity = $cosine->similarity($tokens1, $tokens2);

            log_message('debug', "✅ debugCosineSimilarity() - Similarity between texts: {$similarity}");
            return $similarity;
        } catch (\Throwable $e) {
            log_message('error', '❌ debugCosineSimilarity() Exception: ' . $e->getMessage());
            return 0.0;
        }
    }

    public static function debugTfIdfMatrix(array $documents): array
    {
        try {
            if (empty($documents)) {
                log_message('error', '❌ debugTfIdfMatrix() - Empty documents array.');
                return [];
            }

            $vectorizer = new \Phpml\FeatureExtraction\TokenCountVectorizer(new WhitespaceTokenizer());
            $vectorizer->fit($documents);
            $vectorizer->transform($documents);

            $vocab = $vectorizer->getVocabulary();
            $tfidf = new TfIdfTransformer();
            $tfidf->fit($documents);
            $tfidf->transform($documents);

            log_message('debug', '✅ debugTfIdfMatrix() - TF-IDF vocab: ' . print_r($vocab, true));
            log_message('debug', '✅ debugTfIdfMatrix() - TF-IDF transformed docs: ' . print_r($documents, true));

            return ['vocab' => $vocab, 'tfidf_documents' => $documents];
        } catch (\Throwable $e) {
            log_message('error', '❌ debugTfIdfMatrix() Exception: ' . $e->getMessage());
            return [];
        }
    }

    public static function decodeMimeHeaderSafe(string $string): string
    {
        try {
            return mb_decode_mimeheader($string);
        } catch (\Throwable $e) {
            log_message('error', 'decodeMimeHeaderSafe() failed: ' . $e->getMessage());
            return $string;
        }
    }

    public static function decodeSpecialCharacters(string $text): string
    {
        return html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    public static function detectLanguage(string $text): string
    {
        if (!function_exists('mb_detect_language')) {
            // Manual fallback: rough English detection
            if (preg_match('/[a-zA-Z]{5,}/', $text)) {
                return 'en';
            }
            return 'unknown';
        }
    
        $lang = mb_detect_language($text);
        return $lang ?? 'unknown';
    }    

    public static function expandSemanticKeywords(array $keywords): array
    {
        // Primitive semantic expansion (expandable later with WordNet API or synonyms API)
        $expansions = [
            'investment' => ['finance', 'trading', 'wealth', 'portfolio'],
            'crypto' => ['blockchain', 'bitcoin', 'ethereum', 'token'],
            'stock' => ['equity', 'shares', 'market', 'securities'],
            'budget' => ['spending', 'saving', 'planning', 'expenses'],
            'retirement' => ['401k', 'pension', 'savings', 'IRA'],
        ];
    
        $expanded = [];
    
        foreach ($keywords as $word) {
            $expanded[] = $word;
            if (isset($expansions[strtolower($word)])) {
                $expanded = array_merge($expanded, $expansions[strtolower($word)]);
            }
        }
    
        return array_unique($expanded);
    }
    
    public static function extractEntities(string $text): array
    {
        $text = self::sanitize($text);
        $entities = [
            'people' => [],
            'companies' => [],
            'tickers' => [],
            'locations' => [],
        ];
    
        // Simple heuristic patterns (can upgrade later to regex NLP or 3rd-party NER models)
        $lines = preg_split('/[\r\n]+/', $text);
        foreach ($lines as $line) {
            // Extract Tickers like ($AAPL), ($MSFT)
            if (preg_match_all('/\$\b[A-Z]{1,5}\b/', $line, $matches)) {
                $entities['tickers'] = array_merge($entities['tickers'], array_map(fn($t) => trim($t, '$'), $matches[0]));
            }
    
            // Extract Possible Company Names: "Apple Inc.", "Microsoft Corporation", etc.
            if (preg_match_all('/\b([A-Z][a-z]+\s(?:[A-Z][a-z]+\s)?(Inc|Corporation|LLC|Ltd|Group|Holdings|Systems))\b/', $line, $matches)) {
                $entities['companies'] = array_merge($entities['companies'], $matches[1]);
            }
    
            // Extract Possible People Names (Firstname Lastname, capitalized)
            if (preg_match_all('/\b([A-Z][a-z]+\s[A-Z][a-z]+)\b/', $line, $matches)) {
                $entities['people'] = array_merge($entities['people'], $matches[1]);
            }
    
            // Extract Simple Locations (e.g., New York, San Francisco)
            if (preg_match_all('/\b([A-Z][a-z]+(?:\s[A-Z][a-z]+)?)\b/', $line, $matches)) {
                foreach ($matches[1] as $match) {
                    if (preg_match('/City|Town|County|State|Province|Region/', $match)) {
                        $entities['locations'][] = $match;
                    }
                }
            }
        }
    
        // Final cleaning
        foreach ($entities as &$group) {
            $group = array_values(array_unique($group));
        }
    
        return $entities;
    }
    
    public static function extractTopKeywords(string $content, int $limit = 10): array
    {
        $keywordScores = self::getTopKeywordScores($content, $limit);
        return array_keys($keywordScores);
    }

    public static function fallbackHeadline(string $summary): string
    {
        $summary = trim(strip_tags($summary));
        $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', $summary, -1, PREG_SPLIT_NO_EMPTY);

        if (!empty($sentences)) {
            $headline = trim($sentences[0]);
            return mb_strlen($headline) > 120 ? mb_substr($headline, 0, 117) . '...' : $headline;
        }

        return mb_substr($summary, 0, 100) . '...';
    }

    public static function filterBoilerplateNoise(string $text): string
    {
        $text = self::sanitize($text);
    
        // Common newsletter boilerplate phrases to detect and truncate
        $patterns = [
            '/unsubscribe\s*here/i',
            '/view\s+in\s+browser/i',
            '/manage\s+your\s+preferences/i',
            '/privacy\s+policy/i',
            '/terms\s+of\s+service/i',
            '/update\s+profile/i',
            '/stop\s+receiving\s+emails/i',
            '/sent\s+via\s+/i',
            '/powered\s+by\s+/i',
        ];
    
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $match, PREG_OFFSET_CAPTURE)) {
                $text = substr($text, 0, $match[0][1]);
                break;
            }
        }
    
        return trim($text);
    }
    
    public static function formatBlogPost(string $headline, string $summary): string
    {
        return <<<HTML
        <h2>{$headline}</h2>
        <p>{$summary}</p>
        <p>Discover more at <a href="https://www.mymiwallet.com" target="_blank">MyMI Wallet</a>.</p>
HTML;
    }

    public static function formatEmailBlast(string $subject, string $summary): string
    {
        return <<<TEXT
        Subject: {$subject}

        {$summary}

        Explore more financial tools and insights at https://www.mymiwallet.com
TEXT;
    }

    public static function formatSocialPost(string $headline, string $summary, string $platform = 'generic'): string
    {
        $hashtags = '#MyMIWallet #InvestSmart #FinancialWellness';

        switch (strtolower($platform)) {
            case 'twitter':
            case 'x':
                $shortSummary = self::safeSubstring($summary, 180);
                return "{$headline} — {$shortSummary}...\nhttps://www.mymiwallet.com\n{$hashtags}";
            case 'facebook':
            case 'linkedin':
                return "{$headline}\n\n{$summary}\n\nLearn more: https://www.mymiwallet.com\n\n{$hashtags}";
            case 'discord':
                return "**{$headline}**\n\n{$summary}\n\n👉 <https://www.mymiwallet.com>";
            default:
                return "{$headline}\n\n{$summary}\nhttps://www.mymiwallet.com";
        }
    }

    public static function formatDiscordPost(string $headline, string $summary): string
    {
        return "**{$headline}**\n\n{$summary}\n\n🔗 Visit: <https://www.mymiwallet.com>";
    }

    public static function generateContentOutline(string $summary): array
    {
        $sentences = self::splitIntoSentencesSmart($summary);
        if (empty($sentences)) {
            return [];
        }
    
        $outline = [
            'H1' => $sentences[0] ?? 'Main Topic',
            'H2' => [],
            'bullet_points' => [],
            'questions_to_answer' => [],
        ];
    
        foreach (array_slice($sentences, 1) as $sentence) {
            if (stripos($sentence, 'how') !== false || stripos($sentence, 'what') !== false || stripos($sentence, 'why') !== false) {
                $outline['questions_to_answer'][] = $sentence;
            } elseif (strlen($sentence) < 100) {
                $outline['bullet_points'][] = $sentence;
            } else {
                $outline['H2'][] = $sentence;
            }
        }
    
        return $outline;
    }
    
    public static function generateFallbackKeywords(string $text): array
    {
        $words = preg_split('/\W+/', strtolower(strip_tags($text)), -1, PREG_SPLIT_NO_EMPTY);
        $freq = array_count_values(array_filter($words, fn($w) => strlen($w) > 4));
        arsort($freq);
        return array_keys(array_slice($freq, 0, 10));
    }

    public static function generateFallbackSummary(string $content): ?string
    {
        $sentences = self::splitIntoSentences($content);
        if (empty($sentences)) {
            log_message('warning', 'No valid sentences found in fallback summary generation.');
            return null;
        }
        $summary = implode(' ', array_slice($sentences, 0, 3));
        return strip_tags(trim($summary));
    }

    public static function generateFallbackSummaryText(string $content): string
    {
        $sentences = self::splitIntoSentencesSmart($content);
        if (empty($sentences)) {
            log_message('warning', 'generateFallbackSummaryText(): No sentences found.');
            return '';
        }
        return implode(' ', array_slice($sentences, 0, 3));
    }

    public static function generateContentFingerprint(string $text): string
    {
        $text = self::sanitize($text);
        $text = strtolower(preg_replace('/[^a-z0-9]+/i', '', $text));
        return hash('sha256', $text);
    }
    
    public static function generateSeoMeta(string $text): array
    {
        $text = self::sanitize($text);
        $title = self::fallbackHeadline($text);
        $description = self::safeSubstring($text, 160);
        $keywords = implode(',', self::extractTopKeywords($text, 8));
    
        return [
            'meta_title' => $title,
            'meta_description' => $description,
            'meta_keywords' => $keywords,
        ];
    }
    
    public static function getTopKeywordScores(string $content, int $max = 10): array
    {
        if (!is_string($content)) {
            log_message('error', 'getTopKeywordScores(): Content must be a string.');
            return [];
        }

        $content = self::normalizeUtf8($content);
        $sentences = self::splitIntoSentencesSmart($content);

        if (empty($sentences)) {
            log_message('error', 'getTopKeywordScores(): No valid sentences to process.');
            return [];
        }

        $tokenized = array_filter(array_map(function ($sentence) {
            $sentence = trim(strip_tags($sentence));
            $tokens = preg_split('/\W+/', strtolower($sentence), -1, PREG_SPLIT_NO_EMPTY);
            return array_filter($tokens, fn($w) => strlen($w) > 2);
        }, $sentences));

        if (empty($tokenized) || !isset($tokenized[0]) || !is_array($tokenized[0])) {
            log_message('error', 'getTopKeywordScores(): Tokenized input invalid.');
            return [];
        }

        try {
            $vectorizer = new \Phpml\FeatureExtraction\TokenCountVectorizer(new WhitespaceTokenizer());
            $vectorizer->fit($tokenized);
            $vectorizer->transform($tokenized);

            $vocab = $vectorizer->getVocabulary();
            $invertedVocab = array_flip($vocab);

            $tfidf = new TfIdfTransformer();
            $tfidf->fit($tokenized);
            $tfidf->transform($tokenized);
        } catch (\Throwable $e) {
            log_message('error', 'getTopKeywordScores(): TF-IDF processing failed — ' . $e->getMessage());
            return [];
        }

        $scores = [];
        foreach ($tokenized as $doc) {
            foreach ($doc as $index => $value) {
                if (isset($invertedVocab[$index]) && is_numeric($value)) {
                    $word = $invertedVocab[$index];
                    $scores[$word] = ($scores[$word] ?? 0) + (float)$value;
                }
            }
        }

        if (empty($scores)) {
            log_message('error', 'getTopKeywordScores(): No scores generated after transformation.');
            return [];
        }

        arsort($scores);
        return array_slice($scores, 0, $max, true); // Return with their scores
    }

    public static function normalizeUtf8(string $text): string
    {
        return mb_convert_encoding($text, 'UTF-8', mb_detect_encoding($text, 'UTF-8, ISO-8859-1', true));
    }

    public static function pageRank(array $matrix, float $dampingFactor = 0.85, int $maxIterations = 100, float $tolerance = 1e-6): array
    {
        $numSentences = count($matrix);
        if ($numSentences === 0) {
            return [];
        }

        $pagerank = array_fill(0, $numSentences, 1 / $numSentences);
        $tempRank = array_fill(0, $numSentences, 0);

        for ($iter = 0; $iter < $maxIterations; $iter++) {
            for ($i = 0; $i < $numSentences; $i++) {
                $tempRank[$i] = (1 - $dampingFactor) / $numSentences;
                for ($j = 0; $j < $numSentences; $j++) {
                    if ($i !== $j && isset($matrix[$j][$i])) {
                        $matrixRowSum = array_sum($matrix[$j]);
                        if ($matrixRowSum !== 0) {
                            $tempRank[$i] += $dampingFactor * ($matrix[$j][$i] * $pagerank[$j] / $matrixRowSum);
                        }
                    }
                }
            }
            $diff = 0;
            for ($i = 0; $i < $numSentences; $i++) {
                $diff += abs($tempRank[$i] - $pagerank[$i]);
            }
            if ($diff < $tolerance) {
                break;
            }
            $pagerank = $tempRank;
        }
        return $pagerank;
    }

    public static function previewFirstSentences(string $text, int $limit = 5): array
    {
        $sentences = self::splitIntoSentencesSmart($text);
        $preview = array_slice($sentences, 0, $limit);
        log_message('debug', '✅ previewFirstSentences() - First sentences: ' . print_r($preview, true));
        return $preview;
    }

    public static function removeInvisibleCharacters(string $str): string
    {
        $nonDisplayables = [];
        foreach (['%0[0-8bcef]', '%1[0-9a-f]', '%7f', '%C2%A0'] as $pattern) {
            $nonDisplayables[] = '/'.$pattern.'/i';
        }
        $str = preg_replace($nonDisplayables, '', $str);
        $str = preg_replace('/[\x00-\x1F\x7F]/', '', $str);
        return $str;
    }

    public static function repairBrokenUtf8(string $text): string
    {
        if (!mb_detect_encoding($text, 'UTF-8', true)) {
            $text = utf8_encode($text);
        }
        return mb_convert_encoding($text, 'UTF-8', 'UTF-8');
    }

    public static function safeGetSentence(array $sentences, int $index): string
    {
        return $sentences[$index] ?? '';
    }

    public static function safeSubstring(string $text, int $length = 200): string
    {
        $text = trim(strip_tags($text));
        if (strlen($text) <= $length) {
            return $text;
        }
        return mb_substr($text, 0, $length - 3) . '...';
    }

    public static function sanitizeRawEmailContent(string $html): string
    {
        try {
            if (!is_string($html)) return '';
            $decoded = quoted_printable_decode($html);
            $decoded = preg_replace('/=\r?\n/', '', $decoded);
            $decoded = str_replace(['=3D', '=20'], ['=', ' '], $decoded);
            $text = strip_tags($decoded);
            $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5);
            $text = preg_replace('/\s+/', ' ', $text);
            $text = trim($text);
            if (strlen($text) < 100 || substr_count($text, ' ') < 5) {
                log_message('error', 'sanitizeRawEmailContent(): Sanitized text too short or unreadable.');
                return '';
            }
            return $text;
        } catch (\Throwable $e) {
            log_message('error', 'sanitizeRawEmailContent() Exception: ' . $e->getMessage());
            return '';
        }
    }

    public static function sanitizeShortContent(string $text): string
    {
        $text = strip_tags(html_entity_decode($text, ENT_QUOTES | ENT_HTML5));
        $text = preg_replace('/\s+/', ' ', trim($text));
        if (strlen($text) < 100 || substr_count($text, ' ') < 5) {
            log_message('error', 'sanitizeShortContent(): Content too short or low quality. Preview: ' . substr($text, 0, 100));
            return '';
        }
        return $text;
    }

    public static function scoreKeywordRelevance(string $keyword, string $content): int
    {
        $keyword = strtolower($keyword);
        $text = strtolower(strip_tags($content));
        $words = str_word_count($text, 1);
        $totalWords = count($words);

        if ($totalWords === 0) {
            return 0;
        }

        $matches = array_count_values($words)[$keyword] ?? 0;
        $score = min(100, round(($matches / $totalWords) * 500)); // Scales up to 100 max

        return $score;
    }

    public static function scoreContentRichness(string $content): float
    {
        $content = self::sanitize($content);
        $wordCount = str_word_count($content);
        $sentenceCount = max(1, substr_count($content, '.') + substr_count($content, '!') + substr_count($content, '?'));

        $richness = ($wordCount / $sentenceCount) * (strlen($content) / 1000);
        $richnessScore = min(100, round($richness, 2));
        log_message('debug', "✅ scoreContentRichness() - Score: {$richnessScore}");
        return $richnessScore;
    }

    public static function scoreKeywordDensity(string $keyword, string $content): float
    {
        $keyword = strtolower(trim($keyword));
        $content = strtolower(strip_tags($content));

        $totalWords = str_word_count($content);
        $keywordCount = substr_count($content, $keyword);

        if ($totalWords === 0) {
            return 0.0;
        }

        $density = ($keywordCount / $totalWords) * 100;
        log_message('debug', "✅ scoreKeywordDensity() - Density: {$density}% for '{$keyword}'");
        return round($density, 2);
    }
    
    public static function scoreReadability(string $text): float
    {
        $text = self::sanitize($text);
        $sentences = preg_split('/[.!?]+/', $text, -1, PREG_SPLIT_NO_EMPTY);
        $words = str_word_count($text, 0);
        $characters = strlen(str_replace(' ', '', $text));
        $sentenceCount = max(count($sentences), 1);
        $wordCount = max($words, 1);

        $averageSentenceLength = $wordCount / $sentenceCount;
        $averageWordLength = $characters / $wordCount;

        $readabilityScore = 206.835 - (1.015 * $averageSentenceLength) - (84.6 * $averageWordLength);
        $readabilityScore = max(0, min(100, $readabilityScore)); // Clamp between 0-100
        log_message('debug', "✅ scoreReadability() - Score: {$readabilityScore}");
        return round($readabilityScore, 2);
    }

    public static function scoreSemanticDiversity(string $text): float
    {
        try {
            $sentences = self::splitIntoSentencesSmart($text);
            if (count($sentences) < 2) {
                return 10.0;
            }

            $tokenizer = new NlpWhitespaceTokenizer();
            $tokensList = array_map(fn($s) => $tokenizer->tokenize($s), $sentences);

            $cosine = new \NlpTools\Similarity\CosineSimilarity();
            $totalScore = 0.0;
            $comparisons = 0;

            for ($i = 0; $i < count($tokensList) - 1; $i++) {
                for ($j = $i + 1; $j < count($tokensList); $j++) {
                    $similarity = $cosine->similarity($tokensList[$i], $tokensList[$j]);
                    $totalScore += (1 - $similarity); // Diversity is 1 - similarity
                    $comparisons++;
                }
            }

            if ($comparisons === 0) {
                return 0.0;
            }

            $diversityScore = ($totalScore / $comparisons) * 100;
            $diversityScore = min(100.0, round($diversityScore, 2));
            log_message('debug', "✅ scoreSemanticDiversity() - Diversity Score: {$diversityScore}");
            return $diversityScore;
        } catch (\Throwable $e) {
            log_message('error', '❌ scoreSemanticDiversity() Exception: ' . $e->getMessage());
            return 0.0;
        }
    }

    public static function scoreTitleStrength(string $title): float
    {
        $title = trim(strip_tags($title));
        $length = mb_strlen($title);
        $wordCount = str_word_count($title);

        if ($length < 20 || $wordCount < 3) {
            return 25.0; // Very weak
        }
        if ($length > 80) {
            return 40.0; // Too long
        }

        $score = 50.0;
        if (preg_match('/[!?\-]/', $title)) {
            $score += 15.0;
        }
        if (preg_match('/[0-9]/', $title)) {
            $score += 10.0;
        }
        if (preg_match('/\b(best|top|guide|review|update|important|critical|new|alert)\b/i', $title)) {
            $score += 15.0;
        }

        return min(100.0, $score);
    }

    public static function smartStopWords(): array
    {
        return [
            "a", "about", "above", "after", "again", "against", "all", "am", "an", "and",
            "any", "are", "aren't", "as", "at", "be", "because", "been", "before", "being",
            "below", "between", "both", "but", "by", "can't", "cannot", "could", "couldn't",
            "did", "didn't", "do", "does", "doesn't", "doing", "don't", "down", "during",
            "each", "few", "for", "from", "further", "had", "hadn't", "has", "hasn't", "have",
            "haven't", "having", "he", "he'd", "he'll", "he's", "her", "here", "here's", "hers",
            "herself", "him", "himself", "his", "how", "how's", "i", "i'd", "i'll", "i'm", "i've",
            "if", "in", "into", "is", "isn't", "it", "it's", "its", "itself", "let's", "me", "more",
            "most", "mustn't", "my", "myself", "no", "nor", "not", "of", "off", "on", "once", "only",
            "or", "other", "ought", "our", "ours", "ourselves", "out", "over", "own", "same", "shan't",
            "she", "she'd", "she'll", "she's", "should", "shouldn't", "so", "some", "such", "than",
            "that", "that's", "the", "their", "theirs", "them", "themselves", "then", "there", "there's",
            "these", "they", "they'd", "they'll", "they're", "they've", "this", "those", "through", "to",
            "too", "under", "until", "up", "very", "was", "wasn't", "we", "we'd", "we'll", "we're", "we've",
            "were", "weren't", "what", "what's", "when", "when's", "where", "where's", "which", "while",
            "who", "who's", "whom", "why", "why's", "with", "won't", "would", "wouldn't", "you", "you'd",
            "you'll", "you're", "you've", "your", "yours", "yourself", "yourselves"
        ];
    }

    public static function splitIntoSentencesSmart(string $content): array
    {
        $content = preg_replace('/\s+/', ' ', trim($content));
        $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', $content, -1, PREG_SPLIT_NO_EMPTY);
        return array_values(array_filter($sentences, function ($s) {
            $s = trim(strip_tags($s));
            return strlen($s) >= 10 && substr_count($s, ' ') >= 2;
        }));
    }

    public static function summarizeByCompressionLevel(string $text, string $level = 'normal'): string
    {
        $level = strtolower($level);
        $maxWords = match ($level) {
            'micro' => 50,
            'mini' => 100,
            'normal' => 200,
            default => 200,
        };
        
        $sentences = self::splitIntoSentencesSmart($text);
        if (empty($sentences)) {
            log_message('error', 'summarizeByCompressionLevel(): No valid sentences found.');
            return '';
        }
    
        $summary = [];
        $currentWordCount = 0;
    
        foreach ($sentences as $sentence) {
            $words = str_word_count($sentence);
            if ($currentWordCount + $words > $maxWords) {
                break;
            }
            $summary[] = $sentence;
            $currentWordCount += $words;
        }
    
        return implode(' ', $summary);
    }
    
    public static function summarizeMultipleArticles(array $articles): string
    {
        $allContent = '';
        foreach ($articles as $article) {
            $content = $article['content'] ?? '';
            $allContent .= ' ' . strip_tags($content);
        }
    
        if (empty(trim($allContent))) {
            log_message('error', 'summarizeMultipleArticles() received empty content.');
            return 'No content available to summarize.';
        }
    
        return self::summarizeTextRank($allContent);
    }
    
    public static function smartReformatSummaryForBulletPoints(string $summary): array
    {
        $sentences = self::splitIntoSentencesSmart($summary);
        $bullets = [];
    
        foreach ($sentences as $sentence) {
            $cleaned = ucfirst(trim(strip_tags($sentence)));
            if (!empty($cleaned)) {
                $bullets[] = "- {$cleaned}";
            }
        }
    
        return $bullets;
    }
    
    public static function summarizeTextRank(string $content, int $maxSentences = 5): string
    {
        $sentences = self::splitIntoSentencesSmart($content);
        if (empty($sentences)) {
            log_message('error', 'summarizeTextRank(): No valid sentences found.');
            return '';
        }

        $wordFrequencies = self::calculateWordFrequencies($content);
        $similarityMatrix = self::buildSimilarityMatrix($sentences, $wordFrequencies);
        $scores = self::pageRank($similarityMatrix);

        arsort($scores);
        $topIndexes = array_slice(array_keys($scores), 0, $maxSentences);
        sort($topIndexes);

        $summary = implode(' ', array_map(fn($i) => $sentences[$i] ?? '', $topIndexes));
        return trim($summary);
    }

    public static function tokenizeSmart(string $text, string $method = 'nlp'): array
    {
        if ($method === 'nlp') {
            $tokenizer = new NlpWhitespaceTokenizer();
            return $tokenizer->tokenize($text);
        } else {
            return preg_split('/\W+/', strtolower(strip_tags($text)), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        }
    }

}
?>
