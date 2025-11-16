+141
-0

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
        $text = miw_news_normalize_mime_fragments($text);

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

if (! function_exists('miw_news_normalize_mime_fragments')) {
    /**
     * Decode common MIME / quoted-printable fragments that sometimes leak into titles.
     */
    function miw_news_normalize_mime_fragments(string $text): string
    {
        $cleaned = $text;

        // Decode MIME encoded-words (=?UTF-8?Q?...?= or ?B?).
        if (preg_match('/=\?[^?]+\?[QBqb]\?[^?]+\?=/', $cleaned)) {
            if (function_exists('iconv_mime_decode')) {
                $flags = defined('ICONV_MIME_DECODE_CONTINUE_ON_ERROR') ? ICONV_MIME_DECODE_CONTINUE_ON_ERROR : 0;
                $decoded = @iconv_mime_decode($cleaned, $flags, 'UTF-8');
                if ($decoded !== false && $decoded !== '') {
                    $cleaned = $decoded;
                }
            } elseif (function_exists('mb_decode_mimeheader')) {
                $decoded = @mb_decode_mimeheader($cleaned);
                if (is_string($decoded) && $decoded !== '') {
                    $cleaned = $decoded;
                }
            }
        }

        // Clean stray "?utf-.. ?Q?" fragments left behind by broken encodings.
        if (stripos($cleaned, '?utf-') !== false) {
            $cleaned = preg_replace('/\?utf-?[a-z0-9\-]*\?[qb]\?/i', ' ', $cleaned);
        }
        $cleaned = str_replace('?=', ' ', $cleaned);

        // Attempt to rebuild hexadecimal byte fragments that lost their "=" markers (e.g., "E2 80 99").
        $cleaned = preg_replace_callback(
            '/((?:\b[0-9A-F]{2}\b\s+){1,})([0-9A-F]{2})([a-z]*)/i',
            static function (array $matches): string {
                $parts = preg_split('/\s+/', trim($matches[1]));
                if ($parts === false) {
                    return $matches[0];
                }
                $parts[] = $matches[2];
                if (count($parts) < 2) {
                    return $matches[0];
                }
                $containsAlpha = false;
                foreach ($parts as $part) {
                    if (preg_match('/[A-F]/i', $part)) {
                        $containsAlpha = true;
                        break;
                    }
                }
                if (! $containsAlpha) {
                    return $matches[0];
                }
                $hex = implode('', $parts);
                if ($hex === '' || strlen($hex) % 2 !== 0) {
                    return $matches[0];
                }
                $binary = @hex2bin($hex);
                if ($binary === false) {
                    return $matches[0];
                }

                return $binary . ($matches[3] ?? '');
            },
            $cleaned
        );

        // Decode quoted-printable remnants (e.g., =E2=80=99 for apostrophes).
        if (strpos($cleaned, '=') !== false) {
            $qp = quoted_printable_decode($cleaned);
            if (is_string($qp) && $qp !== '') {
                $cleaned = $qp;
            }
        }

        if (function_exists('iconv')) {
            $normalized = @iconv('UTF-8', 'UTF-8//IGNORE', $cleaned);
            if ($normalized !== false && $normalized !== '') {
                $cleaned = $normalized;
            }
        }

        // Tidy stray question marks left over from malformed MIME fragments.
        $cleaned = preg_replace('/([,;:])\?/', '$1', $cleaned);
        $cleaned = preg_replace_callback(
            '/\?\s+(s|re|ve|ll|d|m|t)\b/i',
            static fn (array $match): string => "'" . $match[1],
            $cleaned
        );

        return preg_replace('/\s+/', ' ', trim($cleaned));
    }
}