<?php

namespace App\Services;

use Config\Marketing;

class EmailSubjectRoutingService
{
    public function __construct(private ?Marketing $marketingConfig = null)
    {
        $this->marketingConfig ??= config('Marketing');
    }

    /**
     * @return array{
     *     category:?string,
     *     keyword:?string,
     *     normalized_subject:string,
     *     reason:string
     * }
     */
    public function resolveEmailRoute(string $subject): array
    {
        $subject = trim($subject);
        $normalized = mb_strtolower($subject);
        if ($normalized === '') {
            return [
                'category' => null,
                'keyword' => null,
                'normalized_subject' => '',
                'reason' => 'empty_subject',
            ];
        }

        $marketingKeywords = $this->marketingConfig->getMarketingNewsKeywords();
        foreach ($marketingKeywords as $keyword) {
            if ($this->containsKeyword($normalized, $keyword)) {
                return [
                    'category' => 'marketing_news',
                    'keyword' => $keyword,
                    'normalized_subject' => $normalized,
                    'reason' => 'matched_marketing_news_keyword',
                ];
            }
        }

        $hasMarketingPhrase = $this->containsKeyword($normalized, 'press release')
            || $this->containsKeyword($normalized, 'news release')
            || $this->containsKeyword($normalized, 'news alert');

        if (! $hasMarketingPhrase) {
            $investmentKeywords = $this->marketingConfig->getInvestmentAlertKeywords();
            foreach ($investmentKeywords as $keyword) {
                if ($this->containsKeyword($normalized, $keyword)) {
                    return [
                        'category' => 'investment_alerts',
                        'keyword' => $keyword,
                        'normalized_subject' => $normalized,
                        'reason' => 'matched_investment_alert_keyword',
                    ];
                }
            }
        }

        return [
            'category' => null,
            'keyword' => null,
            'normalized_subject' => $normalized,
            'reason' => 'no_route_match',
        ];
    }

    private function containsKeyword(string $normalizedSubject, string $keyword): bool
    {
        $needle = mb_strtolower(trim($keyword));
        if ($needle === '') {
            return false;
        }

        return str_contains($normalizedSubject, $needle);
    }
}
