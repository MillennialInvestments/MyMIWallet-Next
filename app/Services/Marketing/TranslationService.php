<?php

namespace App\Services\Marketing;

class TranslationService
{
    public function detectLanguage(string $text): string
    {
        $sample = mb_substr(trim($text), 0, 5000);
        if ($sample === '') {
            return 'en';
        }

        // Minimal heuristic fallback if langdetect package is not available.
        if (preg_match('/[\x{0400}-\x{04FF}]/u', $sample)) {
            return 'ru';
        }
        if (preg_match('/[\x{4E00}-\x{9FFF}]/u', $sample)) {
            return 'zh';
        }
        if (preg_match('/[\x{0600}-\x{06FF}]/u', $sample)) {
            return 'ar';
        }

        return 'en';
    }

    public function translate(string $text, string $targetLang = 'en'): string
    {
        $text = trim($text);
        if ($text === '') {
            return '';
        }

        $sourceLang = $this->detectLanguage($text);
        if ($sourceLang === $targetLang) {
            return $text;
        }

        $url = rtrim((string) env('LIBRETRANSLATE_URL', 'https://libretranslate.de'), '/') . '/translate';

        try {
            $response = service('curlrequest')->post($url, [
                'form_params' => [
                    'q' => $text,
                    'source' => $sourceLang,
                    'target' => $targetLang,
                    'format' => 'text',
                ],
                'timeout' => 15,
                'http_errors' => false,
            ]);

            $decoded = json_decode((string) $response->getBody(), true);
            if (is_array($decoded) && !empty($decoded['translatedText'])) {
                return (string) $decoded['translatedText'];
            }
        } catch (\Throwable $e) {
            log_message('error', 'TranslationService::translate failed: ' . $e->getMessage());
        }

        return $text;
    }
}
