<?php

if (! function_exists('miw_news_preview')) {
    /**
     * Generate a short, cleaned news preview for dashboard cards.
     *
     * @param string|null $text     Raw or pre-summarized content.
     * @param int         $maxChars Maximum length for preview (including ellipsis).
     */
    function miw_news_preview(?string $text, int $maxChars = 240): string
    {
        if ($text === null) {
            return '';
        }

        // Remove HTML tags and decode entities.
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Remove repetitive symbols and bullet noise.
        $text = preg_replace('/[\*\#\=\[\]\|_]+/', ' ', $text);
        $text = preg_replace('/\s+/', ' ', trim($text));

        // Remove orphaned integers often used as footnote markers.
        $text = preg_replace('/\b(\d{1,3})\b(?![%\d])/', '', $text);
        $text = preg_replace('/\s+/', ' ', trim($text));

        if ($text === '') {
            return '';
        }

        $limit = max(50, $maxChars);
        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        $slice = mb_substr($text, 0, $limit);
        $lastDot = mb_strrpos($slice, '.');
        if ($lastDot !== false && $lastDot > $limit * 0.4) {
            $slice = mb_substr($slice, 0, $lastDot + 1);
        }

        $slice = rtrim($slice, " \t\n\r\0\x0B,.!?;:");

        return $slice . '...';
    }
}
