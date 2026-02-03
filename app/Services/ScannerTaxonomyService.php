<?php

declare(strict_types=1);

namespace App\Services;

class ScannerTaxonomyService
{
    /**
     * @return array{scanner_name_raw: string, scanner_key: string, scanner_family: string|null, timeframe: string|null, signal: string, tags: array<int, string>}
     */
    public function build(string $rawName, string $subject = '', string $body = ''): array
    {
        $normalizedRaw = trim($rawName);
        $scannerKey = $this->slugify($normalizedRaw !== '' ? $normalizedRaw : $subject);
        $scannerFamily = $this->inferFamily($normalizedRaw !== '' ? $normalizedRaw : $subject);
        $timeframe = $this->inferTimeframe($normalizedRaw, $subject, $body);
        $signal = $this->inferSignal($normalizedRaw, $subject, $body);
        $tags = $this->extractTags($subject . ' ' . $body);

        return [
            'scanner_name_raw' => $normalizedRaw !== '' ? $normalizedRaw : ($subject !== '' ? $subject : 'Unknown Scanner'),
            'scanner_key' => $scannerKey !== '' ? $scannerKey : 'scanner_unknown',
            'scanner_family' => $scannerFamily,
            'timeframe' => $timeframe,
            'signal' => $signal,
            'tags' => $tags,
        ];
    }

    private function slugify(string $value): string
    {
        $value = strtolower($value);
        $value = preg_replace('/[^a-z0-9]+/', '_', $value);
        return trim((string) $value, '_');
    }

    private function inferFamily(string $name): ?string
    {
        $clean = preg_replace('/^\d+\s*-\s*/', '', trim($name));
        $clean = preg_replace('/\s+/', ' ', (string) $clean);
        $clean = str_ireplace(['mymi', 'scanner', 'scan'], '', (string) $clean);
        $clean = trim((string) $clean);
        if ($clean === '') {
            return null;
        }

        $parts = array_values(array_filter(explode(' ', $clean)));
        $familyParts = array_slice($parts, 0, 2);
        $family = implode('', array_map(static fn (string $part): string => ucfirst(strtolower($part)), $familyParts));

        return $family !== '' ? $family : null;
    }

    private function inferTimeframe(string $name, string $subject, string $body): ?string
    {
        $haystack = strtoupper($name . ' ' . $subject . ' ' . $body);
        if (preg_match('/\b(1M|3M|5M|10M|15M|30M|45M|1H|2H|4H|6H|1D|DAILY)\b/', $haystack, $match)) {
            return strtoupper($match[1]);
        }
        if (preg_match('/\b(\d+)\s*(MIN|MINUTE|MINUTES)\b/i', $haystack, $match)) {
            return strtoupper($match[1] . 'M');
        }
        if (preg_match('/\b(\d+)\s*(HR|HOUR|HOURS)\b/i', $haystack, $match)) {
            return strtoupper($match[1] . 'H');
        }
        if (preg_match('/\b(DAILY|WEEKLY|MONTHLY)\b/i', $haystack, $match)) {
            return strtoupper($match[1] === 'DAILY' ? '1D' : $match[1]);
        }

        return null;
    }

    private function inferSignal(string $name, string $subject, string $body): string
    {
        $haystack = strtolower($name . ' ' . $subject . ' ' . $body);
        if (str_contains($haystack, 'sell') || str_contains($haystack, 'short')) {
            return 'SELL';
        }
        if (str_contains($haystack, 'buy') || str_contains($haystack, 'long')) {
            return 'BUY';
        }
        if (str_contains($haystack, 'news') || str_contains($haystack, 'press release')) {
            return 'NEWS';
        }

        return 'SCAN';
    }

    /**
     * @return array<int, string>
     */
    private function extractTags(string $text): array
    {
        $tags = [];
        if (preg_match_all('/TAG\s*=\s*([A-Za-z0-9_\-]+)/i', $text, $matches)) {
            foreach ($matches[1] as $tag) {
                $tags[] = strtoupper(trim($tag));
            }
        }

        return array_values(array_unique($tags));
    }
}
